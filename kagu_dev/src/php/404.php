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

    <section class="p-section p-404">
      <div class="p-section__content l-container l-container--narrow">

        <div class="p-404__head">
          <h2 class="p-section__title">
            お探しのページが<br class="u-hidden--pc u-hidden--tab" aria-hidden="true" />見つかりませんでした
          </h2><!-- /.p-section__title -->
        </div>
        <div class="p-section__main p-404__body">
          <p class="p-404__text">申し訳ありませんが、お探しのページが存在しないか、アクセスできません。<br>入力されたURLが正しいかご確認ください。</p>
        </div><!-- /.p-section__main -->
        <div class="p-404__foot"><a class="c-btn" href="<?php echo esc_html(home_url()); ?>">トップページに戻る</a></div>

      </div><!-- /.p-section__content l-container -->
    </section><!-- /.p-section p-404 -->

  </main><!-- /.l-main -->

  <?php get_template_part('includes/cta'); ?>

  <?php get_template_part('includes/foot'); ?>
  <?php get_footer(); ?>
</body>

</html>
