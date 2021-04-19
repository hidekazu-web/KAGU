<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <?php get_header(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <?php get_template_part('includes/head'); ?>
  <?php get_template_part('includes/lower_fv'); ?>
  <?php get_template_part('includes/breadcrumb'); ?>

  <main class="l-main">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="p-section p-byPhoneSection">
          <div class="l-container">
            <div class="p-section__title">
              電話でのお問い合わせ<span>by phone</span>
            </div><!-- /.p-section__title-->
            <div class="p-section__main">
              <p class="p-section__lead">弊社に関するご質問がございましたら、お気軽にご相談下さい。 </p><!-- /.p-section__lead -->
              <div class="p-byPhoneSection__box">
                <a href="tel:052-000-0000" class="p-byPhoneSection__telWrap p-phoneBox">
                  <div class="p-phoneBox__main">
                    <div class="p-phoneBox__tel">052-000-0000</div><!-- /.p-phoneBox__tel -->
                    <div class="p-phoneBox__time">受付時間 10:00-17:00</div><!-- /.p-phoneBox__time -->
                  </div><!-- /.p-phoneBox__main -->
                </a><!-- /.p-byPhoneSection__telWrap -->
              </div><!-- /.p-byPhoneSection__box -->
            </div><!-- /.p-section__main -->
          </div><!-- /.l-container l-container--narrow -->
        </div><!-- /.p-section p-byPhoneSection -->

        <div class="p-section p-byMailSection">
          <div class="l-container l-container--semiNarrow p-section__content">
            <div class="p-section__title">メールでのお問い合わせ<span>by e-mail</span></div><!-- /.p-section__title-->
            <div class="p-section__main">
              <p class="p-section__lead">
                家具のご購入、採用について等お気軽にご相談下さい。<br>
                下記フォームに必要事項をご入力の上、お問合せをお願いいたします。
              </p><!-- /.p-section__lead -->
              <?php remove_filter('the_content', 'wpautop'); the_content(); ?>
            </div><!-- /.p-section__main -->
          </div><!-- /.l-container l-container--semiNarrow -->
        </div><!-- /.p-section p-byMailSection -->

      <?php endwhile; ?>
    <?php else : ?>
      <!-- 投稿がないときの処理 -->
      <p>投稿がありません</p>
    <?php endif;  ?>

  </main><!-- /.l-main -->

  <?php get_template_part('includes/cta'); ?>

  <?php get_template_part('includes/foot'); ?>
  <?php get_footer(); ?>
</body>

</html>
