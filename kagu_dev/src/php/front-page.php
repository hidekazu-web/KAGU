<!DOCTYPE html>
<html <?php language_attributes('html'); ?>>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <?php get_header(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <?php get_template_part('includes/head'); ?>

  <main class="l-main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <section class="p-section p-fv">
          <?php $fv_images = scf::get('fv-images');
          if ($fv_images) : ?>
            <div class="swiper-container p-fv__slider">
              <div class="swiper-wrapper p-fv__slideWrapper">
                <?php foreach ($fv_images as $image) : ?>
                  <div class="swiper-slide p-fv__slideImg"><img srcset="<?php echo wp_get_attachment_image_src($image['fv-image-sp'], 'medium_large')[0]; ?> 959w, <?php echo wp_get_attachment_image_src($image['fv-image'], 'full')[0]; ?> 1500w" src="<?php echo wp_get_attachment_image_src($image['fv-image'], 'full')[0]; ?>"></div>
                <?php endforeach; ?>
              </div>
              <!-- If we need pagination -->
              <div class="swiper-pagination"></div>
            </div>
          <?php endif; ?>
          <div class="l-container p-fv__container">
            <p class="p-fv__text">自分らしさを<br class="u-hidden--pc">レイアウトする</p><!-- /.p-fv__text -->
          </div><!-- /.l-container -->
        </section><!-- /.p-section p-fv -->

        <section class="p-section p-newsSection">
          <div class="l-container l-container--narrow p-section__content c-box">
            <?php $post_object = get_post_type_object('news'); ?>
            <h2 class="p-section__title c-lv2Heading"><?php echo esc_html($post_object->label); ?><span><?php echo esc_html($post_object->name); ?></span></h2><!-- /.p-section__title -->
            <?php
            $args = array(
              'post_type' => 'news',
              'post_status' => 'publish',
              'posts_per_page' => 4,
              'order' => 'DESC',
              'orderby' => 'date',
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) : ?>
              <ul class="p-newsSection__list p-section__main c-box__inner p-col p-col--col2">
                <?php
                while ($the_query->have_posts()) : $the_query->the_post();
                ?>

                  <li class="p-col__item">
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
                  </li><!-- /.p-post-->

                <?php endwhile;
                wp_reset_postdata(); ?>
              </ul><!-- /.p-newsSection__list -->
            <?php else : ?>
              <!-- 投稿がないときの処理 -->
              <p>投稿がありません</p>
            <?php endif;  ?>
            <div class="p-newsSection__footer">
              <a href="<?php echo esc_html(get_post_type_archive_link('news')); ?>" class="c-btn"><?php echo esc_html($post_object->label); ?>一覧</a><!-- /.btn -->
            </div><!-- /.p-newsSection__footer -->
          </div><!-- /.l-container l-container--narrow p-newsSection__content c-box -->
        </section><!-- /.p-section p-newsSection -->

        <section class="p-section p-furnitureSection">
          <div class="l-container p-section__content">
            <h2 class="p-section__title c-lv2Heading">取り扱い家具<span>furniture</span></h2><!-- /.p-section__title -->
            <div class="p-alternate p-section__main">
              <div class="p-alternate__item p-furnitureSection__item">
                <figure class="p-alternate__item-primary"><img src="" alt=""></figure><!-- /.p-alternate__item-primary -->
                <div class="p-alternate__item-secondary">
                  <h3 class="p-furnitureSection__itemTitle">テーマで探す</h3><!-- /.p-furnitureSection__itemTitle -->
                  <p class="p-furnitureSection__itemText">モダン、ナチュラル、北欧、ヴィンテージ、和風、ハワイアン、アメリカン、ミニマルなど、テーマごとに家具をお探しいただけます。</p><!-- /.p-furnitureSection__itemText -->
                  <a href="" class="c-btn">取扱い家具の一覧へ</a><!-- /.c-btn -->
                </div><!-- /.p-alternate__item-secondary -->
              </div><!-- /.p-alternate__item -->
              <div class="p-alternate__item p-furnitureSection__item">
                <figure class="p-alternate__item-primary"><img src="" alt=""></figure><!-- /.p-alternate__item-primary -->
                <div class="p-alternate__item-secondary">
                  <h3 class="p-furnitureSection__itemTitle">カラーで探す</h3><!-- /.p-furnitureSection__itemTitle -->
                  <p class="p-furnitureSection__itemText">レッド、ブルー、グリーン、イエロー、オレンジ、ピンク、パープル、ベージュ・アイボリー、ブラウン、ブラック、グレー、ホワイトなど、好みのカラーごとに家具をお探しいただけます。</p><!-- /.p-furnitureSection__itemText -->
                  <a href="" class="c-btn">取扱い家具の一覧へ</a><!-- /.c-btn -->
                </div><!-- /.p-alternate__item-secondary -->
              </div><!-- /.p-alternate__item -->
              <div class="p-col p-col--col3">
                <div class="p-card p-furnitureSection__item">
                  <figure class="p-card__img"><img src="" alt=""></figure><!-- /.p-card__img -->
                  <div class="p-card__body">
                    <h3 class="p-card__title p-furnitureSection__itemTitle">シーンで探す</h3><!-- /.p-card__title p-furnitureSection__itemTitle -->
                    <p class="p-card__text p-furnitureSection__itemText">「リビング」や「ダイニング」、「寝室・ベッドルーム」、「キッチン」、「玄関・エントランス」、「書斎・ホームオフィス」などのシーンから、それぞれのシーンで使用する家具をお探しいただけます。</p><!-- /.p-card__text p-furnitureSection__itemText -->
                    <a href="" class="c-btn c-btn--outerLink">ONLINE STORE</a>
                  </div><!-- /.p-card__body -->
                </div><!-- /.p-card p-furnitureSection__item -->
                <div class="p-card p-furnitureSection__item">
                  <figure class="p-card__img"><img src="" alt=""></figure><!-- /.p-card__img -->
                  <div class="p-card__body">
                    <h3 class="p-card__title p-furnitureSection__itemTitle">ブランドで探す</h3><!-- /.p-card__title p-furnitureSection__itemTitle -->
                    <p class="p-card__text p-furnitureSection__itemText">他では出会えないソファやチェアが見つかります。<br>当社ブランド以外でも、セレクトラインアップの中で多数のブランドをお取扱いしております。</p><!-- /.p-card__text p-furnitureSection__itemText -->
                    <a href="" class="c-btn c-btn--outerLink">ONLINE STORE</a>
                  </div><!-- /.p-card__body -->
                </div><!-- /.p-card p-furnitureSection__item -->
                <div class="p-card p-furnitureSection__item">
                  <figure class="p-card__img"><img src="" alt=""></figure><!-- /.p-card__img -->
                  <div class="p-card__body">
                    <h3 class="p-card__title p-furnitureSection__itemTitle">素材で探す</h3><!-- /.p-card__title p-furnitureSection__itemTitle -->
                    <p class="p-card__text p-furnitureSection__itemText">チークやパイン、マホガニーやウォールナットなどの木材から、ファブリックやラタンなどの布・繊維、ステンレスやロートアイアンのような金属まで、あらゆる素材を使用した家具を取り揃えております。</p><!-- /.p-card__text p-furnitureSection__itemText -->
                    <a href="" class="c-btn c-btn--outerLink">ONLINE STORE</a>
                  </div><!-- /.p-card__body -->
                </div><!-- /.p-card p-furnitureSection__item -->
              </div><!-- /.p-col p-col--col3 -->
            </div><!-- /.p-alternate -->
          </div><!-- /.l-container p-section__content -->
        </section><!-- /.p-section p-furnitureSection -->

        <section class="p-section p-shopSection">
          <div class="l-container p-section__content">
            <div class="p-media">
              <figure class="p-media__img"><img src="" alt=""></figure><!-- /.p-media__img -->
              <div class="p-media__body">
                <div class="p-media__title">販売店・展示場一覧</div><!-- /.p-media__title -->
                <div class="p-media__text">KAGUの販売店をご覧いただけます。<br>また、KAGUの家具は全国のショールームにてご覧いただけます。</div><!-- /.p-media__text -->
                <div class="p-media__footer">
                  <a href="" class="p-media__link c-afterIcon c-afterIcon--arrow">販売店・展示場一覧を見る</a><!-- /.p-media__link -->
                </div><!-- /.p-media__footer -->
              </div><!-- /.p-media__body -->
            </div><!-- /.p-media -->
            <div class="p-media">
              <figure class="p-media__img"><img src="" alt=""></figure><!-- /.p-media__img -->
              <div class="p-media__body">
                <div class="p-media__title">ONLINE STORE</div><!-- /.p-media__title -->
                <div class="p-media__text">KAGUの家具はオンラインストアでもご購入いただけます。</div><!-- /.p-media__text -->
                <div class="p-media__footer">
                  <a href="" target="_blank" rel="noopener noreferrer" class="p-media__link c-afterIcon c-afterIcon--outerLink">オンラインストアを見る</a><!-- /.p-media__link -->
                </div><!-- /.p-media__footer -->
              </div><!-- /.p-media__body -->
            </div><!-- /.p-media -->
          </div><!-- /.l-container p-section__content -->
        </section><!-- /.p-section p-shopSection -->

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
