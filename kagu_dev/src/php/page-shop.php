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
            <div class="p-section__main">
              <div class="p-storeListSection__mapArea p-storeMap">
                <figure class="p-storeMap__img c-img"><img src="<?php echo get_template_directory_uri(); ?>/img/store_shop/map.png" alt="全国販売店マップ"></figure><!-- /.p-storeMap__img c-img -->
                <a href="#hokkaido" class="c-mapBtn p-storeMap__btn p-storeMap__btn--hokkaido">北海道</a><!-- /.c-mapBtn -->
                <a href="#tohoku" class="c-mapBtn p-storeMap__btn p-storeMap__btn--tohoku">東北</a><!-- /.c-mapBtn -->
                <a href="#hokuriku" class="c-mapBtn p-storeMap__btn p-storeMap__btn--hokuriku">北陸</a><!-- /.c-mapBtn -->
                <a href="#kanto" class="c-mapBtn p-storeMap__btn p-storeMap__btn--kanto">関東</a><!-- /.c-mapBtn -->
                <a href="#tokai" class="c-mapBtn p-storeMap__btn p-storeMap__btn--tokai">東海・甲信</a><!-- /.c-mapBtn -->
                <a href="#kinki" class="c-mapBtn p-storeMap__btn p-storeMap__btn--kinki">近畿</a><!-- /.c-mapBtn -->
                <a href="#shikoku" class="c-mapBtn p-storeMap__btn p-storeMap__btn--shikoku">四国</a><!-- /.c-mapBtn -->
                <a href="#chugoku" class="c-mapBtn p-storeMap__btn p-storeMap__btn--chugoku">中国</a><!-- /.c-mapBtn -->
                <a href="#kyusyu" class="c-mapBtn p-storeMap__btn p-storeMap__btn--kyusyu">九州・沖縄</a><!-- /.c-mapBtn -->
              </div><!-- /.p-storeListSection__mapArea -->

              <?php
              $shop_array = array(
                'hokkaido' => array(),
                'tohoku' => array(),
                'hokuriku' => array(),
                'kanto' => array(),
                'tokai' => array(),
                'kinki' => array(),
                'shikoku' => array(),
                'chugoku' => array(),
                'kyusyu' => array(),
              );

              $shops = scf::get_option_meta('register_store', 'repeat_shop');
              if ($shops) {
                foreach ($shops as $shop) {
                  array_push($shop_array[$shop['shop_area']], $shop);
                }
              }
              ?>
              <?php foreach ($shop_array as $shop_list) :
                if ($shop_list) :
                  switch ($shop_list[0]['shop_area']) {
                    case 'hokkaido':
                      $area = '北海道';
                      break;
                    case 'tohoku':
                      $area = '東北';
                      break;
                    case 'hokuriku':
                      $area = '北陸';
                      break;
                    case 'kanto':
                      $area = '関東';
                      break;
                    case 'tokai':
                      $area = '東海・甲信';
                      break;
                    case 'kinki':
                      $area = '近畿';
                      break;
                    case 'shikoku':
                      $area = '四国';
                      break;
                    case 'chugoku':
                      $area = '中国';
                      break;
                    case 'kyusyu':
                      $area = '九州・沖縄';
                      break;

                    default:
                      break;
                  }
              ?>
                  <div id="<?php echo $shop_list[0]['shop_area']; ?>" class="p-storeListSection__areaWrap">
                    <h3 class="c-lv3Heading"><?php echo esc_html($area); ?></h3><!-- /.c-lv3Heading -->
                    <ul class="p-storeList">
                      <?php foreach($shop_list as $shop) : ?>
                        <li class="p-storeList__item p-storeItem">
                          <div class="p-storeItem__body">
                            <div class="p-storeItem__title"><?php echo esc_html($shop['shop_title']); ?></div><!-- /.p-storeItem__title -->
                            <address class="p-storeItem__address">
                              <span class="p-storeItem__post">&#12306;<?php echo esc_html($shop['shop_postalCode']); ?></span><!-- /.p-storeItem__post -->
                              <span class="p-storeItem__add"><?php echo esc_html($shop['shop_address']); ?></span><!-- /.p-storeItem__add -->
                            </address><!-- /.p-storeItem__address -->
                            <div class="p-storeItem__contact">
                              <span class="p-storeItem__tel">TEL:<?php echo esc_html($shop['shop_tel']); ?></span><!-- /.p-storeItem__tel -->
                              <span class="p-storeItem__fax">FAX:<?php echo esc_html($shop['shop_fax']); ?></span><!-- /.p-storeItem__fax -->
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
            </div>
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
