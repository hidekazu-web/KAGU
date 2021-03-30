<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <?php get_header(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <?php get_template_part('includes/head'); ?>
  <?php get_template_part('includes/lower_fv'); ?>

  <main class="l-main">

    <section class="p-section">
      <div class="l-container l-container--narrow p-section__content">
        <div class="p-col p-col--col4">
          <a href="<?php echo get_post_type_archive_link('news'); ?>" class="p-col__item c-btn">すべて</a><!-- /.p-col__item c-btn -->
          <?php $terms = get_terms('news_tax', array(
            'hide_empty' => false,
          ));
          if ($terms) : ?>
            <?php foreach ($terms as $term) : ?>
              <a href="<?php echo esc_html(get_term_link($term, 'news_tax')); ?>" class="p-col__item c-btn"><?php echo esc_html($term->name); ?></a><!-- /.p-col__item c-btn -->
            <?php endforeach; ?>
          <?php endif; ?>
        </div><!-- /.p-col p-col--col4 -->

        <div class="p-section__main">
          <?php if (have_posts()) : ?>
            <ul class="p-postList">
              <?php while (have_posts()) : the_post(); ?>

                <li class="p-postList__item">
                  <a href="<?php the_permalink(); ?>" class="p-newsSection__itemLink">
                    <article class="p-post p-post--col">
                      <div class="p-post__meta">
                        <time class="p-post__date" datetime="<?php echo get_the_date('c') ?>"><?php echo get_the_date(get_option('date_format')); ?></time><!-- /.p-post__date -->
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'news_tax');
                        if ($terms[0]) :
                        ?>
                          <span class="p-post__label c-label"><?php echo esc_html($terms[0]->name); ?></span><!-- /.p-post__label -->
                        <?php endif; ?>
                      </div><!-- /.p-post__meta -->
                      <h3 class="p-post__title"><?php the_title(); ?></h3><!-- /.p-post__title -->
                    </article><!-- /.p-post p-post--col -->
                  </a>
                </li><!-- /.p-postList__item -->

              <?php endwhile; ?>
            </ul><!-- /.p-postList -->
          <?php else : ?>
            <!-- 投稿がないときの処理 -->
            <p>投稿がありません</p>
          <?php endif;  ?>
        </div><!-- /.p-section__main -->

        <?php if (paginate_links()) : ?>
          <!-- pagination -->
          <div class="pagination">
            <?php echo wp_kses_post(
              paginate_links(
                array(
                  'end_size' => 0,
                  'mid_size' => 1,
                  'prev_next' => true,
                  'prev_text' => '<i class="fas fa-angle-left"></i>',
                  'next_text' => '<i class="fas fa-angle-right"></i>',
                )
              )
            );
            ?>
          </div><!-- /.pagination -->
        <?php endif; ?>

      </div><!-- /.l-container l-container--narrow -->
    </section><!-- /.p-section -->

  </main><!-- /.l-main -->

  <?php get_template_part('includes/cta'); ?>

  <?php get_template_part('includes/foot'); ?>
  <?php get_footer(); ?>
</body>

</html>
