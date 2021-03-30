<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <?php get_header(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <?php get_template_part('includes/head'); ?>

  <main class="l-main">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php get_template_part('includes/lower_fv'); ?>

        <section class="p-section p-recruitSection">
          <div class="p-section__title c-lv2Heading">募集要項<span>requirements</span></div><!-- /.p-section__title c-lv2Heading -->
          <div class="l-container l-container--slim p-section__content">
            <div class="p-recruitSection__body">
              <?php $items = scf::get('recruit_guidelines');
              if ($items) :
              ?>
                <table class="p-recruitSection__table p-recruitTable p-table">
                  <?php foreach ($items as $item) : ?>
                    <tr>
                      <th class="p-table__head"><?php echo esc_html($item['item']); ?></th>
                      <td class="p-table__content">
                        <div class="p-table__text"><?php echo esc_html($item['text']); ?></div><!-- /.p-table__text -->
                        <?php if ($item['sub_text']) : ?>
                          <div class="p-table__subText"><?php echo esc_html($item['sub_text']); ?></div><!-- /.p-table__subText -->
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </table><!-- /.p-recruitSection__table p-recruitTable p-table -->
              <?php endif; ?>
            </div><!-- /.p-recruitSection__body -->
            <div class="p-recruitSection__footer">
              <a href="<?php echo esc_html(home_url('/contact')); ?>" class="c-btn">応募する</a><!-- /.c-btn -->
            </div><!-- /.p-recruitSection__footer -->
          </div><!-- /.l-container l-container--slim -->
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
