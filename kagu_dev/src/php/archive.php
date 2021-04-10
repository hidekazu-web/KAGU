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

    <section class="p-section">
      <div class="l-container l-container--narrow p-section__content">
        <div class="p-section__main">
          <?php if (have_posts()) : ?>
            <?php get_template_part('includes/post-list'); ?>
          <?php else : ?>
            <!-- 投稿がないときの処理 -->
            <p>投稿がありません</p>
          <?php endif;  ?>
        </div><!-- /.p-section__main -->
      </div><!-- /.l-container l-container--narrow -->
      <?php get_template_part('includes/pagination'); ?>
    </section><!-- /.p-section -->

  </main><!-- /.l-main -->

  <?php get_template_part('includes/cta'); ?>

  <?php get_template_part('includes/foot'); ?>
  <?php get_footer(); ?>
</body>

</html>
