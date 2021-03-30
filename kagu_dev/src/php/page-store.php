<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <?php get_header(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <?php get_template_part('includes/head'); ?>
  <?php get_template_part('includes/lower_fv'); ?>

  <main class="l-main">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <section class="p-section">
          <div class="l-container p-section__content p-alternate">
            <div class="p-alternate__item p-storePageItem">
              <figure class="p-alternate__item-primary c-imgWrap p-storePageItem__img"><img src="" alt=""></figure><!-- /.p-alternate__item-primary -->
              <div class="p-alternate__item-secondary p-storePageItem__body">
                <h2 class="p-storePageItem__title">販売店</h2><!-- /.p-storePageItem__heading -->
                <p class="p-storePageItem__text">KAGUの販売店をご覧いただけます。<br>お客様の「実物を見たい！」を叶えるため、北海道から九州まで、どこにでもKAGUはあります。</p><!-- /.p-storePageItem__text -->
                <a href="" class="c-btn p-storePageItem__link">販売店一覧へ</a><!-- /.c-btn p-storePageItem__link -->
              </div><!-- /.p-alternate__item-secondary -->
            </div><!-- /.p-alternate__item -->
            <div class="p-alternate__item p-storePageItem">
              <figure class="p-alternate__item-primary c-imgWrap p-storePageItem__img"><img src="" alt=""></figure><!-- /.p-alternate__item-primary -->
              <div class="p-alternate__item-secondary p-storePageItem__body">
                <h2 class="p-storePageItem__title">展示場</h2><!-- /.p-storePageItem__heading -->
                <p class="p-storePageItem__text">KAGUの家具は全国のショールームにてご覧いただけます。<br>事前にご予約いただきますと、スタッフがショールームをご案内致します。</p><!-- /.p-storePageItem__text -->
                <a href="" class="c-btn p-storePageItem__link">展示場一覧へ</a><!-- /.c-btn p-storePageItem__link -->
              </div><!-- /.p-alternate__item-secondary -->
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
