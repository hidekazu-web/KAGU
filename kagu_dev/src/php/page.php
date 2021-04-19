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
                <h1 class="p-entry__title"><?php the_title(); ?></h1><!-- /.p-entry__title -->
                <?php if (has_post_thumbnail()) : ?>
                  <figure class="p-entry__img c-img">
                    <?php the_post_thumbnail('large'); ?>
                  </figure><!-- /.p-entry__img -->
                <?php endif; ?>
              </div><!-- /.p-entry__header -->

              <div class="p-entry__body">
                <?php the_content(); ?>
              </div><!-- /.p-entry__body -->

            <?php endwhile; ?>
          <?php else : ?>
            <!-- 投稿がないときの処理 -->
            <p>投稿がありません</p>
          <?php endif;  ?>
        </article><!-- /.p-entry -->
      </div><!-- /.l-container l-container--narrow p-section__content -->
    </section><!-- /.p-section -->

  </main><!-- /.l-main -->

  <?php get_template_part('includes/cta'); ?>

  <?php get_template_part('includes/foot'); ?>
  <?php get_footer(); ?>
</body>

</html>
