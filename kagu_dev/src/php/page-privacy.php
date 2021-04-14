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

    <div class="p-section">
      <div class="l-container l-container--narrow p-section__content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="p-privacy">
              <div class="p-privacy__body">
                <?php the_content(); ?>

                <div class="p-privacy__list p-privacyList">
                  <?php
                  $privacy_items = scf::get('privacy_items');
                  if ($privacy_items) :
                    foreach ($privacy_items as $index => $privacy_item) :
                  ?>
                      <div class="p-privacyList__item">
                        <h2 class="p-privacyList__title"><span><?php echo $index + 1; ?>.</span><?php echo $privacy_item['privacy_title']; ?></h2><!-- /.p-privacyList__title -->
                        <p class="p-privacyList__text"><?php echo nl2br($privacy_item['privacy_text']); ?></p><!-- /.p-privacyList__text -->
                      </div><!-- /.p-privacyList__item -->
                  <?php endforeach;
                  endif; ?>

                </div><!-- /.p-privacyList -->
              </div><!-- /.p-privacy__body -->

              <div class="p-privacy__footer">
                <div class="p-privacy__date">
                  <?php if (get_the_modified_time()) : ?>
                    <time datetime="<?php echo the_modified_time('c'); ?>"><?php echo the_modified_time('Y年n月j日'); ?></time>改定
                  <?php else : ?>
                    <time datetime="<?php echo the_time('c'); ?>"><?php echo the_time('Y年n月j日'); ?></time>改定
                  <?php endif; ?>
                </div><!-- /.p-privacy__date -->
                <div class="p-privacy__company">株式会社KAGU</div><!-- /.p-privacy__company -->
              </div><!-- /.p-privacy__footer -->
            </div><!-- /.p-privacy -->

          <?php endwhile; ?>
        <?php else : ?>
          <!-- 投稿がないときの処理 -->
          <p>投稿がありません</p>
        <?php endif;  ?>
      </div><!-- /.l-container l-container--narrow p-section__content -->
    </div><!-- /.p-section -->

  </main><!-- /.l-main -->

  <?php get_template_part('includes/cta'); ?>

  <?php get_template_part('includes/foot'); ?>
  <?php get_footer(); ?>
</body>

</html>
