<?php

/** 現在ページのパーマリンクを取得する
 * ループ外で使用可能
 */
function get_current_link()
{
  return (is_ssl() ? 'https' : 'http') . '://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
}

/**
 * サムネイル画像を取得
 */
function put_thumbnail($size = 'large', $default_img = 'noimg.png', $alt = '')
{
  if (has_post_thumbnail()) {
    the_post_thumbnail($size);
  } else {
    echo '<img src="' . esc_url(get_template_directory_uri()) . '\/img\/' . $default_img . '" alt="' . $alt . '">';
  }
}

/**
 * カテゴリーを１つだけ表示
 *
 * @param boolean $anchor aタグで出力するかどうか
 * @param integer $id 投稿id.
 * @return void
 */

function my_the_post_category($anchor = true, $id = 0)
{
  global $post;
  // 引数が渡さなければ投稿IDを見るように設定
  if (0 === $id) {
    $id = $post->ID;
  }

  // カテゴリー一覧を取得
  $this_categories = get_the_category($id);
  if ($this_categories[0]) {
    if ($anchor) { // 引数がtrueならリンク付きで出力
      echo '<a href="' . esc_url(get_category_link($this_categories[0]->term_id)) . '">' . esc_html($this_categories[0]->cat_name) . '</a>';
    } else {  //引数がfalseならカテゴリー名のみ出力
      echo esc_html($this_categories[0]->cat_name);
    }
  }
}

/**
 * タグ一覧を表示
 *
 * @param integer $id 投稿id
 * @return void
 */
function display_tags($id = 0)
{
  global $post;
  if (0 === $id) {
    $id = $post->ID;
  }

  // タグ一覧を取得
  $this_tags = get_the_tags($id);
  if ($this_tags) {
    foreach ($this_tags as $tag) {
      echo '<div class="entry-tag-item"><a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a></div><!-- /entry-tag-item -->';
    }
  }
}

/**
 * ウィジェットの登録
 *
 * @codex http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_sidebar
 */
function my_widget_init()
{
  register_sidebar(
    array(
      'name' => 'サイドバー', // 表示するエリア名
      'id' => 'sidebar', // id
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<div class="widget-title">',
      'after_title' => '</div>'
    )
  );
}
add_action('widgets_init', 'my_widget_init');


define('COUNT_KEY', 'view_counter');
/**
 * カスタムフィールドを使ってアクセス数を取得する（特定記事のアクセス数確認用）
 *
 * @param integer $id 投稿id.
 * @return void
 */
// アクセス数を取得
function get_post_views($id = 0)
{
  global $post;
  // 引数が渡されなければ投稿IDを見るように設定
  if (0 === $id) {
    $id = $post->ID;
  }
  $count_key = COUNT_KEY;
  $count = get_post_meta($id, $count_key, true);

  if ($count === '') {
    delete_post_meta($id, $count_key);
    add_post_meta($id, $count_key, '0');
  }
  return $count;
}

/**
 * アクセスカウンター
 *
 * @return void
 */
function set_post_views()
{
  global $post;
  $count = 0;
  $count_key = COUNT_KEY;

  if ($post) {
    $id = $post->ID;
    $count = get_post_meta($id, $count_key, true);
  }

  if ($count === '') {
    delete_post_meta($id, $count_key);
    add_post_meta($id, $count_key, '1');
  } elseif ($count > 0) {
    if (!is_user_logged_in()) { //管理者（自分）の閲覧を除外
      $count++;
      update_post_meta($id, $count_key, $count);
    }
  }
  // $countが0のままの場合（404や該当記事の検索結果が0件の場合）は何もしない。
}
add_action('template_redirect', 'set_post_views', 10);

/**
 * 検索結果から固定ページを除外する
 *
 * @param string $search SQLのWHERE区の検索条件分
 * @param object $wp_query WP_Queryのオブジェクト
 * @return string $search 条件追加後の検索条件文
 */
function my_posts_search($search, $wp_query)
{
  //検索結果ページ・メインクエリ・管理画面以外の3つの条件が揃った場合
  if ($wp_query->is_search() && $wp_query->is_main_query() && !is_admin()) {
    // 検索結果を投稿タイプに絞る
    $search .= " AND post_type = 'post' ";
  }
  return $search;
}
add_filter('posts_search', 'my_posts_search', 10, 2);

// これでも検索結果を除外可能
// function SearchFilter($query)
// {
//   if (!is_admin() && $query->is_main_query() && $query->is_search()) {
//     $query->set('post_type', 'post');
//   }
// }
// add_action( 'pre_get_posts','SearchFilter' );

/**
 * ボタンのショートコード
 *
 * @param array $atts ショートコードの引数
 * @param string $content ショートコードのコンテンツ
 * @return string ボタンのHTMLタグ
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_shortcode
 */
function my_shortcode($atts, $content = '')
{
  return '<div class="entry-btn"><a class="btn" href="' . $atts['link'] . '">' . $content . '</a></div><!-- /entry-btn -->';
}
add_shortcode('btn', 'my_shortcode');


/**
 * 改行して抜粋を表示する
 */
function break_excerpt($content = null, $len = 54)
{
  if (!$content) {
    return '';
  }
  $content = strip_tags($content, "<br>");
  $content = mb_substr($content, 0, $len);
  while (strrpos($content, "<") > strrpos($content, ">")) {
    $content = mb_substr($content, 0, -1);
  }
  if (substr($content, -6) == "<br />") {
    $content = mb_substr($content, 0, -6);
  } elseif (substr($content, -4) == "<br>") {
    $content = mb_substr($content, 0, -4);
  }
  if (substr($content, -4) == "</p>") {
    $content = mb_substr($content, 0, -4);
    $content .= " ...</p>";
  } else {
    $content .= " ...";
  }
  if (strrpos($content, "<p>") > strrpos($content, "</p>")) {
    $content .= "</p>";
  }
  return $content;
}

/**
 * 改行とpタグを残して抜粋を表示
 * @reference https://thk.kanzae.net/net/wordpress/t632/
 */
function the_break_excerpt($content = null, $length = 54 /* 抜粋文字数(p、br タグを含む文字数) */)
{
  global $more;
  $more = true;    // more タグ無視で指定した文字数まで出力( more で切る場合は false に)

  if (!$content) {
    $content = apply_filters('the_content', get_the_content(""));
  }
  $content = preg_replace("/\r\n|\r|\n/", "", trim($content));

  // <p><br>タグは残して、他のタグを削除
  $content = strip_tags($content, "<p><br>");
  // <img ～>などを<p>で囲ってた場合、<p></p> の形で残るので削除
  $content = str_replace("<p></p>", "", $content);

  $content = mb_substr($content, 0, $length);    //文字列を指定した長さで切り取る

  // <p><br>タグの途中で文字列が切れた場合、中途半端に残ったタグを < が出てくるまで後ろから1文字づつ削除
  while (strrpos($content, "<") > strrpos($content, ">")) {
    $content = mb_substr($content, 0, -1);
  }
  // 最後が<br>だったら削除
  if (substr($content, -6) == "<br />") {
    $content = mb_substr($content, 0, -6);
  } elseif (substr($content, -4) == "<br>") {
    $content = mb_substr($content, 0, -4);
  }

  // 三点リーダー付ける
  if (substr($content, -4) == "</p>") {
    $content = mb_substr($content, 0, -4);
    $content .= " ...</p>";
  } else {
    $content .= " ...";
  }

  // <p>タグの終了タグが無くなってた場合は終了タグを補完
  if (strrpos($content, "<p>") > strrpos($content, "</p>")) {
    $content .= "</p>";
  }

  return $content;
}
