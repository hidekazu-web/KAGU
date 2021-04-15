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

        <section class="p-section">
          <div class="l-container p-section__content p-alternate">
            <div id="shop" class="p-alternate__item p-storePageItem">
              <figure class="p-alternate__itemPrimary p-storePageItem__img">
                <div class="c-img">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/store/img_store.jpg" alt="ストアマップ">
                </div><!-- /.c-img -->
              </figure><!-- /.p-alternate__itemPrimary -->
              <div class="p-alternate__itemSecondary p-storePageItem__body">
                <h2 class="p-storePageItem__title p-alternate__itemTitle">販売店</h2><!-- /.p-storePageItem__heading -->
                <p class="p-storePageItem__text p-alternate__itemText">KAGUの販売店をご覧いただけます。<br>お客様の「実物を見たい！」を叶えるため、北海道から九州まで、どこにでもKAGUはあります。</p><!-- /.p-storePageItem__text -->
                <div class="p-alternate__itemFooter">
                  <a href="<?php echo esc_html(home_url('/store/shop')); ?>" class="c-btn p-storePageItem__link">販売店一覧へ</a><!-- /.c-btn p-storePageItem__link -->
                </div><!-- /.p-alternate__itemFooter -->
              </div><!-- /.p-alternate__itemSecondary -->
            </div><!-- /.p-alternate__item -->
            <div id="showroom" class="p-alternate__item p-storePageItem">
              <figure class="p-alternate__itemPrimary p-storePageItem__img">
                <div class="c-img">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/store/img_showroom.jpg" alt="ショールームイメージ">
                </div><!-- /.c-img -->
              </figure><!-- /.p-alternate__itemPrimary -->
              <div class="p-alternate__itemSecondary p-storePageItem__body">
                <h2 class="p-storePageItem__title p-alternate__itemTitle">展示場</h2><!-- /.p-storePageItem__heading -->
                <p class="p-storePageItem__text p-alternate__itemText">KAGUの家具は全国のショールームにてご覧いただけます。<br>事前にご予約いただきますと、スタッフがショールームをご案内致します。</p><!-- /.p-storePageItem__text -->
                <div class="p-alternate__itemFooter">
                  <a href="<?php echo esc_html(home_url('/store/showroom')); ?>" class="c-btn p-storePageItem__link">展示場一覧へ</a><!-- /.c-btn p-storePageItem__link -->
                </div><!-- /.p-alternate__itemFooter -->
              </div><!-- /.p-alternate__itemSecondary -->
            </div><!-- /.p-alternate__item -->
          </div><!-- /.l-container p-section__content -->
        </section><!-- /.p-section -->
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
