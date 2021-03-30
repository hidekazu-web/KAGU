<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <?php get_header(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <?php get_template_part('includes/head'); ?>

  <main class="l-main">

    <section class="p-section p-col p-col--col4">
      <a href="<?php echo  ?>" class="p-col__item c-btn"></a><!-- /.p-col__item c-btn -->
    </section><!-- /.p-section p-col p-col--col4 -->

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>


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
