<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <?php get_header(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <?php get_template_part('includes/head'); ?>

  <main class="l-main">

    <section class="p-section">
      <div class="l-container l-container--slim">
        <div class="l-flex l-flex--col4">
          <a href="<?php echo get_post_type_archive_link('news'); ?>" class="l-flex__item c-btn">すべて</a><!-- /.l-flex__item c-btn -->
          <?php $terms = get_terms('news_tax', array(
            'hide_empty' => false,
          ));
          if ($terms) : ?>
            <?php foreach ($terms as $term) : ?>
              <a href="<?php echo esc_html(get_term_link($term, 'news_tax')); ?>" class="l-flex__item c-btn"><?php echo esc_html($term->name); ?></a><!-- /.l-flex__item c-btn -->
            <?php endforeach; ?>
          <?php endif; ?>
        </div><!-- /.l-flex l-flex--col4 -->
      </div><!-- /.l-container l-container--slim -->
    </section><!-- /.p-section -->

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
