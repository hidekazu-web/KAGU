<?php
require_once('includes/my_funcs.php');

/**
 * テーマセットアップ
 */
add_action('after_setup_theme', function () {
  add_theme_support('post-thumbnails');
  add_theme_support('automatic-feed-links');
  add_theme_support('title-tag');
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
  wp_enqueue_style('adobefont', 'https://use.typekit.net/rfl8cna.css', array(), '', 'all');
  wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css', array(), '5.8.2', 'all');
  wp_enqueue_style('my', get_template_directory_uri() . '/css/style.css', array(), '1.0.0', 'all');
  wp_enqueue_script('my', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('my-vp', get_template_directory_uri() . '/js/viewport.js', array(), '1.0.0', false); //headタグ内で読み込む

});

/**
 * メニュー
 */
add_action('init', function () {
  register_nav_menus(array(
    'global' => 'ヘッダーメニュー',
    'drawer' => 'ドロワーメニュー',
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
    $title = '「404」ページが見つかりません';
  } else {
  }
  return $title;
});
