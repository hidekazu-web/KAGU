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
        <article class="p-entry">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

              <div class="p-entry__header">
                <div class="p-entry__meta">
                  <time datetime="<?php the_time('c'); ?>" class="p-entry__date p-entry__date--published c-beforeIcon c-beforeIcon--clock"><?php the_time(get_option('date_format')); ?></time><!-- /.p-entry__date -->
                  <?php if (get_the_modified_time('c') !== get_the_time('c')) : ?>
                    <time datetime="<?php the_modified_time('c') ?>" class="p-entry__date p-entry__date--updated c-beforeIcon c-beforeIcon--updated"><?php the_modified_time(get_option('date_format')); ?></time><!-- /.p-entry__date -->
                  <?php endif; ?>
                  <?php
                  $taxonomy_name = array_keys(get_the_taxonomies())[0];
                  if (get_the_terms(get_the_ID(), $taxonomy_name)) :
                  ?>
                    <a href="<?php echo esc_url(get_term_link(get_the_terms(get_the_ID(), $taxonomy_name)[0], $taxonomy_name)); ?>" class="p-entry__label c-label c-label--brown"><?php echo esc_html(get_the_terms(get_the_ID(), $taxonomy_name)[0]->name); ?></a><!-- /.p-entry__label -->
                  <?php endif; ?>
                </div><!-- /.p-entry__meta -->
                <h1 class="p-entry__title"><?php the_title(); ?></h1><!-- /.p-entry__title -->
                <?php if (has_post_thumbnail()) : ?>
                  <figure class="p-entry__img c-img">
                    <?php the_post_thumbnail('large'); ?>
                  </figure><!-- /.p-entry__img -->
                <?php endif; ?>
              </div><!-- /.p-entry__header -->

              <div class="p-entry__body">
                <?php the_content(); ?>

                <?php
                // 改ページを有効にするための記述
                wp_link_pages(
                  array(
                    'before' => '<nav class="p-entry__links">',
                    'after' => '</nav>',
                    'link_before' => '',
                    'link_after' => '',
                    'next_or_number' => 'number',
                    'separator' => '',
                  )
                );
                ?>

              </div><!-- /.p-entry__body -->

            <?php endwhile; ?>
          <?php else : ?>
            <!-- 投稿がないときの処理 -->
            <p>投稿がありません</p>
          <?php endif;  ?>
        </article><!-- /.p-entry -->
        <div class="single__footer">
          <a href="<?php echo get_post_type_archive_link(get_post_type()); ?>" class="c-beforeIcon c-beforeIcon--arrowLeft"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?>一覧に戻る</a><!-- /.c-beforeIcon -->
        </div><!-- /.single__footer -->
      </div><!-- /.l-container l-container--narrow p-section__content -->
    </section><!-- /.p-section -->

  </main><!-- /.l-main -->

  <?php get_template_part('includes/cta'); ?>
  <?php get_template_part('includes/foot'); ?>
  <?php get_footer(); ?>
</body>

</html>
