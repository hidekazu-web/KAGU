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

        <section class="p-section p-storeListSection">
          <div class="l-container l-container--slim p-section__content">
            <h2 class="c-lv2Heading p-section__title"><?php the_title(); ?><span><?php echo get_post($post->post_parent)->post_name; ?></span></h2><!-- /.c-lv2Heading p-section__title -->

            <?php
            $shop_array = array(
              'aichi' => array(),
              'tokyo' => array(),
            );

            $shops = scf::get_option_meta('register_showroom', 'repeat_showroom');
            if ($shops) {
              foreach ($shops as $shop) {
                array_push($shop_array[$shop['area']], $shop);
              }
            }
            ?>
            <?php foreach ($shop_array as $shop_list) :
              if ($shop_list) :
                switch ($shop_list[0]['area']) {
                  case 'aichi':
                    $area = '愛知県';
                    break;
                  case 'tokyo':
                    $area = '東京都';
                    break;

                  default:
                    break;
                }
            ?>
                <div id="<?php echo $shop_list[0]['area']; ?>" class="p-storeListSection__areaWrap">
                  <h3 class="c-lv3Heading"><?php echo esc_html($area); ?></h3><!-- /.c-lv3Heading -->
                  <ul class="p-storeList">
                    <?php foreach ($shop_list as $shop) : ?>
                      <li class="p-storeList__item p-storeItem">
                        <div class="p-storeItem__body">
                          <figure class="p-storeItem__img c-imgWrap"><img src="<?php echo wp_get_attachment_image_src($shop['image'], 'medium')[0] ?>" alt=""></figure><!-- /.p-storeItem__img c-imgWrap -->
                          <div class="p-storeItem__title"><?php echo esc_html($shop['title']); ?></div><!-- /.p-storeItem__title -->
                          <address class="p-storeItem__address">
                            <div class="p-storeItem__post"><?php echo esc_html($shop['postalCode']); ?></div><!-- /.p-storeItem__post -->
                            <div class="p-storeItem__add"><?php echo esc_html($shop['address']); ?></div><!-- /.p-storeItem__add -->
                          </address><!-- /.p-storeItem__address -->
                          <div class="p-storeItem__tel"><?php echo esc_html($shop['tel']); ?></div><!-- /.p-storeItem__tel -->
                          <div class="p-storeItem__fax"><?php echo esc_html($shop['fax']); ?></div><!-- /.p-storeItem__fax -->
                          <div class="p-storeItem__footer">
                            <a href="<?php echo esc_html($shop['map_link']); ?>" target="_blank" rel="noopener noreferrer" class="c-btn c-btn--outerLink">Google Mapで見る</a><!-- /.c-btn c-btn--outerLink -->
                          </div><!-- /.p-storeItem__footer -->
                        </div><!-- /.p-storeItem__body -->
                      </li><!-- /.p-storeList__item -->
                    <?php endforeach; ?>
                  </ul><!-- /.p-storeList -->
                </div><!-- /.p-storeListSection__areaWrap -->
            <?php endif;
            endforeach; ?>
          </div><!-- /.l-container l-container--slim p-section__content -->
        </section><!-- /.p-section p-storeListSection -->

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
