"use strict";
const { src, dest, series, watch, lastRun, parallel } = require("gulp");
const replace = require('gulp-replace');
const rename = require('gulp-rename');
const changed = require('gulp-changed');
const prettify = require("gulp-prettify");
const fs = require('fs');
const path = require('path');
const data = require('gulp-data');
const del = require("del");

/* sass */
const sass = require("gulp-dart-sass");
const plumber = require("gulp-plumber");
const notify = require("gulp-notify");
const sassGlob = require("gulp-sass-glob");
// const mqpacker = require("css-mqpacker");  // メディアクエリをまとめる
const mmq = require("gulp-merge-media-queries");  // メディアクエリをまとめる
const gulpStylelint = require("gulp-stylelint");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const cssdeclsort = require("css-declaration-sorter");
const header = require("gulp-header");

/* html */
const htmlmin = require("gulp-htmlmin");
const htmlbeautify = require("gulp-html-beautify");

/* pug */
const pug = require('gulp-pug');
const pugPHPFilter = require('pug-php-filter');
/* ejs */
const ejs = require("gulp-ejs");

/* js */
const concat = require("gulp-concat");
const order = require("gulp-order");
const uglify = require("gulp-uglify");
const saveLicense = require('uglify-save-license');
const babel = require('gulp-babel');

/* typescript */
const typescript = require("gulp-typescript");

/* webpack */
const webpackStream = require("webpack-stream");
const webpack = require("webpack");
const webpackConfig = require("./webpack.config"); /* webpackの設定ファイルの読み込み */

/* imagemin */
const imagemin = require("gulp-imagemin");
const imageminPngquant = require("imagemin-pngquant");
const imageminMozjpeg = require("imagemin-mozjpeg");
const imageminSvgo = require("imagemin-svgo");

/* browser-sync */
const browserSync = require("browser-sync").create();

// 開発と本番で処理を分ける
// 今回はhtmlのところで使用
const mode = require("gulp-mode")({
  modes: ["production", "development"],
  default: "development",
  verbose: false
});

// html or php
const sitemode = require("gulp-mode")({
  modes: ["html", "php"],
  default: "html",
  verbose: false
});

const themes = 'kagu';

const PATHS = {
  pug: {
    src: "./src/pug/**/!(_)*.pug",
    watch: "./src/pug/**/*.pug",
    dest: "./dist",
  },
  php: {
    src: "./src/php/**/*.{php,png,ico}",
    watch: "./src/php/**/*.php",
    destwp: "../public/wp-content/themes/" + themes,
  },
  ejs: {
    src: "./src/ejs/**/!(_)*.ejs",
    watch: "./src/ejs/**/*.ejs",
    dest: "./dist"
  },
  styles: {
    src: "./src/sass/**/*.scss",
    dest: "./dist/",
    destwp: "../public/wp-content/themes/" + themes,
    mapwp: "../public/wp-content/themes/" + themes + "/map",
    map: "./dist/map"
  },
  ts: {
    src: "./src/typescript/**/*.ts",
    dest: "./dist/js"
  },
  js: {
    src: "./src/js/**/*.js",
    dest: "./dist/js/",
    destwp: "../public/wp-content/themes/" + themes + "/js",
    mapwp: "../public/wp-content/themes/" + themes + "/js/map",
    map: "./dist/js/map",
    core: "src/js/core/**/*.js",
    app: "src/js/app/**/*.js"
  },
  image: {
    src: "./src/img/**/*.{jpg,jpeg,png,gif,svg,ico}",
    dest: "./dist/img",
    destwp: "../public/wp-content/themes/" + themes + "/img",
  },
  json: {
    src: "./src/data",
  },
};

// methods
function errorHandler(err, stats) {
  if (err || (stats && stats.compilation.errors.length > 0)) {
    const error = err || stats.compilation.errors[0].error;
    notify.onError({ message: "<%= error.message %>" })(error);
    this.emit("end");
  }
}

// HTML===========================================
// pug
function pugFiles() {
  const locals = {
    'site': JSON.parse(fs.readFileSync(PATHS.json.src + '/site.json'))
  };
  const option = {
    locals: locals,
    basedir: 'src',
    pretty: true,
    filters: {
      php: pugPHPFilter
    }
  };
  return src(PATHS.pug.src)
    .pipe(sitemode.html(plumber({ errorHandler: errorHandler })))
    .pipe(sitemode.html(data(function (file) {
      locals.relativePath = path.relative(file.base, file.path.replace(/.pug$/, '.html'));
      return locals;
    })))
    .pipe(sitemode.html(pug(option)))
    .pipe(sitemode.html(mode.production(
      htmlmin({
        // htmlの圧縮
        collapseWhitespace: true,  // true:インデントなし false:インデントなし
        preserveLineBreaks: true,  // true:改行あり false:改行なし
        minifyJS: true,
        removeComments: true
      })
    )))
    .pipe(sitemode.html(mode.development(htmlbeautify())))
    // .pipe(sitemode.php(rename({ extname: '.php' })))
    .pipe(sitemode.html(dest(PATHS.pug.dest)))
    // .pipe(sitemode.php(dest(PATHS.pug.destwp)))
    .pipe(sitemode.html(browserSync.reload({ stream: true })));
}

// php
function phpFunc() {
  return src(PATHS.php.src)
    .pipe(sitemode.php(dest(PATHS.php.destwp)));
}

// ejs
function ejsFunc() {
  return src(PATHS.ejs.src)
    .pipe(plumber({ errorHandler: errorHandler }))
    .pipe(ejs({}, {}, { ext: '.html' }))
    .pipe(rename({ extname: ".html" }))
    .pipe(mode.production(
      // 本番環境のみ
      htmlmin({
        // htmlの圧縮
        collapseWhitespace: true,
        preserveLineBreaks: true,
        minifyJS: true,
        removeComments: true
      })
    ))
    .pipe(mode.development(
      htmlbeautify()
    ))
    .pipe(replace(/[\s\S]*?(<!DOCTYPE)/, "$1"))
    .pipe(dest(PATHS.ejs.dest))
    .pipe(browserSync.reload({ stream: true }));
};

// style===========================================
// scss
function sassFunc() {
  return src(PATHS.styles.src, { sourcemaps: true })
    .pipe(plumber({ errorHandler: errorHandler }))
    .pipe(sassGlob())
    .pipe(mode.development(sass({
      outputStyle: "expanded",
      // importer: packageImporter({
      //   extensions: [".scss", ".css"]
      // })
    })))
    .pipe(mode.production(sass({ outputStyle: 'compressed' })))
    .pipe(postcss([
      autoprefixer({
        grid: true,
        cascade: false
      })
    ]))
    .pipe(postcss([cssdeclsort({ order: "smacss" })]))
    // .pipe(postcss([mqpacker()])) // メディアクエリをまとめる
    .pipe(mmq())
    .pipe(
      gulpStylelint({
        fix: true,
      })
    )
    .pipe(replace(/@charset "UTF-8";/g, ''))
    .pipe(header('@charset "UTF-8";\n\n'))
    // .pipe(dest(PATHS.styles.dest))
    // .pipe(
    //   rename(function (path) {
    //     if (/^style_/.test(path.basename)) {
    //       path.basename = "style_latest";
    //     }
    //   })
    // )
    .pipe(sitemode.html(mode.development(dest(PATHS.styles.dest, { sourcemaps: "./map" }))))
    .pipe(sitemode.html(mode.production(dest(PATHS.styles.dest))))
    .pipe(sitemode.php(mode.development(dest(PATHS.styles.destwp, { sourcemaps: "./map" }))))
    .pipe(sitemode.php(mode.production(dest(PATHS.styles.destwp))))
    // .pipe(browserSync.reload({ stream: true }));
    .pipe(browserSync.stream());
};


// scripts===========================================
// typescript
function ts() {
  return src(PATHS.ts.src)
    .pipe(plumber({ errorHandler: errorHandler }))
    .pipe(
      typescript({
        target: "ES6"
      })
    )
    .js.pipe(dest(PATHS.ts.dest));
}

// javascript
function js() {
  return src(PATHS.js.src, { sourcemaps: true })
    .pipe(order([PATHS.js.core, PATHS.js.app], { base: "./" }))
    .pipe(plumber({ errorHandler: errorHandler }))
    .pipe(concat("script.js"))
    .pipe(webpackStream(webpackConfig, webpack))
    // .pipe(babel({
    //   presets: ['@babel/env']
    // }))
    // .pipe(uglify({ output: { comments: saveLicense } }))
    // .pipe(uglify({ output: { comments: /^!/ } }))
    // .pipe(uglify({ output: { comments: 'some' } }))
    // .pipe(
    //   rename({
    //     suffix: ".min"
    //   })
    // )
    .pipe(sitemode.html(mode.development(dest(PATHS.js.dest, { sourcemaps: "./map" }))))
    .pipe(sitemode.html(mode.production(dest(PATHS.js.dest))))
    .pipe(sitemode.php(mode.development(dest(PATHS.js.destwp, { sourcemaps: "./map" }))))
    .pipe(sitemode.php(mode.production(dest(PATHS.js.destwp))))
    .pipe(browserSync.reload({ stream: true }));
};

/* webpack */
function webpackFunc() {
  return webpackStream(webpackConfig, webpack)
    .pipe(dest("./dist"));
};

// image===========================================
const imageminOption = [
  imageminPngquant({ quality: [0.65, 0.8] }),
  imageminMozjpeg({ quality: 85 }),
  // imageminSvgo({ plugins: [{ removeViewbox: false }] }),
  imagemin.gifsicle({
    interlaced: false,
    optimizationLevel: 1,
    colors: 256
  }),
  imagemin.mozjpeg(),
  imagemin.optipng(),
  imagemin.svgo({
    removeViewBox: false
  }),
  imagemin.gifsicle(),
];
function imageminFunc() {
  return src(PATHS.image.src)
    .pipe(plumber({ errorHandler: errorHandler }))
    .pipe(sitemode.html(changed(PATHS.image.dest)))
    .pipe(sitemode.php(changed(PATHS.image.destwp)))
    .pipe(imagemin(imageminOption))
    .pipe(sitemode.html(dest(PATHS.image.dest)))
    .pipe(sitemode.php(dest(PATHS.image.destwp)))
};

/// マップファイル除去 ////////////////////////////////////////////
const cleanMap = () => {
  return del([PATHS.styles.map, PATHS.js.map, PATHS.styles.mapwp, PATHS.js.mapwp], { force: true });
};

/**
 * dist をクリーンアップ
 */
const distClean = () => {
  return del([PATHS.pug.dest, PATHS.php.destwp], { force: true });
}

// server===========================================
const browserSyncOption = {
  // open: false,
  // port: 3000,
  // ui: {
  //   port: 3001  // },
  // server: {
  //   baseDir: PATHS.pug.dest, // output directory,
  //   index: "index.html"
  // }
  proxy: 'https://' + themes + '.local'
};
function browsersync(done) {
  browserSync.init(browserSyncOption);
  done();
}

// browser reload
function browserReload(done) {
  browserSync.reload();
  done();
  console.info("Browser reload completed");
}

// watch
function watchFiles(done) {
  watch(PATHS.pug.watch, series(pugFiles, browserReload));
  watch(PATHS.php.watch, series(phpFunc, browserReload));
  watch(PATHS.ejs.watch, series(ejsFunc, browserReload));
  watch(PATHS.styles.src, sassFunc);
  watch(PATHS.ts.src, ts);
  watch(PATHS.js.src, js);
  watch(PATHS.image.src, series(imageminFunc, browserReload));
  done();
}

// watch
// function watchWpFiles(done) {
//   watch(PATHS.pug.watch, pugFiles);
//   watch(PATHS.styles.src, sassFunc);
//   watch(PATHS.ts.src, ts);
//   watch(PATHS.js.src, js);
//   watch(PATHS.image.src, series(imageminFunc, browserReload));
//   done();
// }

// watchSass
function watchSassFiles(done) {
  watch(PATHS.styles.src, sassFunc);
  done();
}

// commands
exports.default = series(
  distClean,
  parallel(sassFunc, pugFiles, phpFunc, js, imageminFunc),
  series(browsersync, watchFiles)
);

// exports.watchwp = series(
//   parallel(sassFunc, pugFiles, js, imageminFunc),
//   watchWpFiles
// )

exports.watchsass = series(sassFunc, watchSassFiles);

exports.build = series(
  distClean,
  parallel(sassFunc, pugFiles, phpFunc, js, imageminFunc)
);

exports.pug = pugFiles;
exports.ejs = ejsFunc;
exports.sass = sassFunc;
exports.ts = ts;
exports.js = js;
exports.webpack = webpackFunc;
exports.imagemin = imageminFunc;
exports.cleanmap = cleanMap;
exports.distclean = distClean;
