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
    <?php
    $args = array(
      'taxonomy' => 'category'
    );
    ?>

    <section class="p-section">
      <div class="l-container l-container--narrow p-section__content">

        <div class="p-col p-col--col4">
          <a href="<?php echo get_post_type_archive_link('post'); ?>" class="p-col__item c-btn c-btn--archive isActive">すべて</a><!-- /.p-col__item c-btn -->
          <?php $terms = get_terms('category', array(
            'hide_empty' => false,
          ));
          if ($terms) : ?>
            <?php foreach ($terms as $term) : ?>
              <a href="<?php echo esc_html(get_term_link($term, 'category')); ?>" class="p-col__item c-btn c-btn--archive"><?php echo esc_html($term->name); ?></a><!-- /.p-col__item c-btn -->
            <?php endforeach; ?>
          <?php endif; ?>
        </div><!-- /.p-col p-col--col4 -->

        <div class="p-section__main">
          <?php if (have_posts()) : ?>
            <?php get_template_part('includes/post-list', null, $args); ?>
          <?php else : ?>
            <!-- 投稿がないときの処理 -->
            <p>投稿がありません</p>
          <?php endif;  ?>
        </div><!-- /.p-section__main -->
      </div><!-- /.l-container l-container--narrow -->
    </section><!-- /.p-section -->

  </main><!-- /.l-main -->

  <?php get_template_part('includes/cta'); ?>

  <?php get_template_part('includes/foot'); ?>
  <?php get_footer(); ?>
</body>

</html>
