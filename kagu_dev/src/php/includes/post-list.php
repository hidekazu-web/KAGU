<ul class="p-postList">
  <?php while (have_posts()) : the_post(); ?>

    <li class="p-postList__item">
      <a href="<?php the_permalink(); ?>" class="p-postList__itemLink">
        <article class="p-post">
          <div class="p-post__meta">
            <time class="p-post__date" datetime="<?php echo get_the_date('c') ?>"><?php echo get_the_date(get_option('date_format')); ?></time><!-- /.p-post__date -->
            <?php
            $terms = get_the_terms(get_the_ID(), $args['taxonomy']);
            if ($terms[0]) :
            ?>
              <span class="p-post__label c-label"><?php echo esc_html($terms[0]->name); ?></span><!-- /.p-post__label -->
            <?php endif; ?>
          </div><!-- /.p-post__meta -->
          <h3 class="p-post__title"><?php the_title(); ?></h3><!-- /.p-post__title -->
        </article><!-- /.p-post -->
      </a>
    </li><!-- /.p-postList__item -->

  <?php endwhile; ?>
  <div class="p-postList__footer">
    <?php get_template_part('includes/pagination'); ?>
  </div><!-- /.p-postList__footer -->
</ul><!-- /.p-postList -->
