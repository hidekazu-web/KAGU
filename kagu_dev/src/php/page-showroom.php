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

        <section class="p-section p-storeListSection">
          <div class="l-container l-container--narrow p-section__content">
            <h2 class="p-section__title"><?php the_title(); ?><span><?php echo get_post($post->post_parent)->post_name; ?></span></h2><!-- /.p-section__title -->

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
                        <figure class="p-storeItem__img c-img"><img src="<?php echo wp_get_attachment_image_src($shop['image'], 'large')[0] ?>" alt=""></figure><!-- /.p-storeItem__img c-img -->
                        <div class="p-storeItem__body">
                          <div class="p-storeItem__title"><?php echo esc_html($shop['title']); ?></div><!-- /.p-storeItem__title -->
                          <address class="p-storeItem__address">
                            <span class="p-storeItem__post">&#12306;<?php echo esc_html($shop['postalCode']); ?></span><!-- /.p-storeItem__post -->
                            <span class="p-storeItem__add"><?php echo esc_html($shop['address']); ?></span><!-- /.p-storeItem__add -->
                          </address><!-- /.p-storeItem__address -->
                          <div class="p-storeItem__contact">
                            <span class="p-storeItem__tel">TEL:<?php echo esc_html($shop['tel']); ?></span><!-- /.p-storeItem__tel -->
                            <span class="p-storeItem__fax">FAX:<?php echo esc_html($shop['fax']); ?></span><!-- /.p-storeItem__fax -->
                          </div><!-- /.p-storeItem__contact -->
                        </div><!-- /.p-storeItem__body -->
                        <div class="p-storeItem__footer">
                          <a href="<?php echo esc_html($shop['map_link']); ?>" target="_blank" rel="noopener noreferrer" class="c-btn c-btn--outerLink">Google Mapで見る</a><!-- /.c-btn c-btn--outerLink -->
                        </div><!-- /.p-storeItem__footer -->
                      </li><!-- /.p-storeList__item -->
                    <?php endforeach; ?>
                  </ul><!-- /.p-storeList -->
                </div><!-- /.p-storeListSection__areaWrap -->
            <?php endif;
            endforeach; ?>
          </div><!-- /.l-container l-container--narrow p-section__content -->
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
