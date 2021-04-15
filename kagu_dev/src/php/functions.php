<?php
require_once('includes/my_funcs.php');

/**
 * テーマセットアップ
 */
add_action('after_setup_theme', function () {
  add_theme_support('post-thumbnails');
  add_theme_support('automatic-feed-links');
  add_theme_support('title-tag');
  // add_theme_support('custom-logo'); // カスタムロゴを使用可能にする
  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    )
  );
});

/**
 * CSS, JavaScript
 */
add_action('wp_enqueue_scripts', function () {
  // wp_enqueue_style('adobefont', 'https://use.typekit.net/rfl8cna.css', array(), '', 'all');
  wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css', array(), '5.8.2', 'all');
  wp_enqueue_style('Quicksand', 'https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;700&display=swap', array(), '', 'all');
  wp_enqueue_style('NotoSansJP', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap', array(), '', 'all');
  wp_enqueue_style('NotoSerifJP', 'https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;500;700&display=swap', array(), '', 'all');
  wp_enqueue_style('my', get_template_directory_uri() . '/css/style.css', array('fontawesome', 'Quicksand', 'NotoSansJP', 'NotoSerifJP'), '1.0.0', 'all');

  wp_enqueue_script('my', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);

});

/**
 * メニュー
 */
add_action('init', function () {
  register_nav_menus(array(
    'global' => 'ヘッダーメニュー',
    // 'drawer' => 'ドロワーメニュー',
    'footer' => 'フッターメニュー'
  ));
});

/* the_archive_title 余計な文字を削除 */
add_filter('get_the_archive_title', function ($title) {
  if (is_category()) {
    $title = single_cat_title('', false);
  } elseif (is_tag()) {
    $title = single_tag_title('', false);
  } elseif (is_tax()) {
    $title = single_term_title('', false);
  } elseif (is_author()) { // 作者アーカイブの場合
    $title = get_the_author();
  } elseif (is_post_type_archive()) {
    $title = post_type_archive_title('', false);
  } elseif (is_date()) {
    $title = get_the_time('Y年n月');
    // } elseif (is_date()) { // 日付アーカイブの場合
    //   $title = '';
    //   if (get_query_var('year')) {
    //     $title .= get_query_var('year') . '年';
    //   }
    //   if (get_query_var('monthnum')) {
    //     $title .= get_query_var('monthnum') . '月';
    //   }
    //   if (get_query_var('day')) {
    //     $title .= get_query_var('day') . '日';
    //   }
  } elseif (is_search()) {
    $title = '検索結果：' . esc_html(get_search_query(false));
  } elseif (is_404()) {
    $title = '404';
  } else {
  }
  return $title;
});


/**
 * SCF オプションページ
 * @param string $page_title ページのtitle属性値
 * @param string $menu_title 管理画面のメニューに表示するタイトル
 * @param string $capability メニューを操作できる権限(manage_options とか)
 * @param string $menu_slug オプションページのスラッグ。ユニークな値にすること
 * @param string|null $icon_url メニューに表示するアイコンのURL
 * @param int $position メニューの位置
 */
SCF::add_options_page('販売店', '販売店の登録', 'publish_pages', 'register_store', '', 10);
SCF::add_options_page('展示場', '展示場の登録', 'publish_pages', 'register_showroom', '', 10);


/**
 * 標準投稿メニューを非表示
 */
// add_action('admin_menu', function () {
//   global $menu;
//   remove_menu_page('edit.php');
// });


/**
 * カスタムメニューのCSS Classをaタグに付与する
 * https://twotone.me/web/1879/
 */
// add_filter('walker_nav_menu_start_el', 'add_class_on_link', 10, 4);
// function add_class_on_link($item_output, $item)
// {
//   $css_class = esc_attr($item->classes[0]);
//   if ($css_class) {
//     return preg_replace('/(<a.*?)/', '$1' . " class='" . $css_class . "'", $item_output);
//   } else {
//     return $item_output;
//   }
// }

// add_filter('nav_menu_link_attributes', 'myfn', 10, 2);
// function myfn($atts, $item)
// {
//   if (strpos($item, 'ONLINE STORE')) {
//     $atts['class'] = 'c-btn';
//   }
//   return $atts;
// }
