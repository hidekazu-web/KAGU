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

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <section class="p-section p-recruitSection">
          <div class="l-container l-container--narrow p-section__content">
          <div class="p-section__title">募集要項<span>requirements</span></div><!-- /.p-section__title-->
            <div class="p-section__main">
              <div class="p-recruitSection__body">
                <?php $items = scf::get('recruit_guidelines');
                if ($items) :
                ?>
                  <dl class="p-recruitSection__table p-defList">
                    <?php foreach ($items as $item) : ?>
                      <div class="p-defList__row">
                        <dt class="p-defList__head"><?php echo esc_html($item['item']); ?></dt>
                        <dd class="p-defList__content">
                          <div class="p-defList__text"><?php echo esc_html($item['text']); ?></div><!-- /.p-defList__text -->
                          <?php if ($item['sub_text']) : ?>
                            <div class="p-defList__subText"><?php echo esc_html($item['sub_text']); ?></div><!-- /.p-defList__subText -->
                          <?php endif; ?>
                        </dd>
                      </div>
                    <?php endforeach; ?>
                  </dl><!-- /.p-recruitSection__table p-defList -->
                <?php endif; ?>
              </div><!-- /.p-recruitSection__body -->
              <div class="p-recruitSection__footer">
                <a href="<?php echo esc_html(home_url('/contact')); ?>" class="c-btn">応募する</a><!-- /.c-btn -->
              </div><!-- /.p-recruitSection__footer -->
            </div><!-- /.p-section__main -->
          </div><!-- /.l-container l-container--narrow -->
        </section><!-- /.p-section p-recruitSection -->
        <?php the_content(); ?>

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
