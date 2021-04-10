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
        <?php $queried_object = get_queried_object(); // クエリオブジェクトを取得
        ?>
        <div class="p-col p-col--col4">
          <a href="<?php echo get_post_type_archive_link($queried_object->name); ?>" class="p-col__item c-btn c-btn--archive isActive">すべて</a><!-- /.p-col__item c-btn -->
          <?php $terms = get_terms($queried_object->taxonomies, array(
            'hide_empty' => false,
          ));
          if ($terms) : ?>
            <?php foreach ($terms as $term) : ?>
              <a href="<?php echo esc_html(get_term_link($term, $queried_object->taxonomies[0])); ?>" class="p-col__item c-btn c-btn--archive"><?php echo esc_html($term->name); ?></a><!-- /.p-col__item c-btn -->
            <?php endforeach; ?>
          <?php endif; ?>
        </div><!-- /.p-col p-col--col4 -->

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
