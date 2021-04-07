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

        <section class="p-section p-searchTheme">
          <div class="l-container p-section__content">
            <h2 class="p-section__title">テーマで探す<span>SEARCH BY THEME</span></h2><!-- /.p-section__title -->
            <div class="p-section__main p-col p-col--col3">
              <div class="p-searchTheme__item p-col__item">
                <figure class="p-searchTheme__itemImg"><img src="" alt=""></figure><!-- /.p-searchTheme__itemImg -->
                <div class="p-searchTheme__itemTheme"></div><!-- /.p-searchTheme__itemTheme -->
                <a href="https://note.com/hi_roki/n/ne77175ea9395" target="_blank" rel="noopener noreferrer" class="p-searchTheme__link c-afterIcon c-afterIcon--arrow"></a><!-- /.p-searchTheme__link c-afterIcon c-afterIcon--arrow -->
              </div><!-- /.p-searchTheme__item p-col__item -->
            </div><!-- /.p-section__main p-col p-col--col3 -->
          </div><!-- /.l-container p-section__content -->
        </section><!-- /.p-section -->

        <section class="p-section p-searchColor">
          <div class="l-container p-section__content">
            <div class="p-section__title">カラーで探す<span>SEARCH BY COLOR</span></div><!-- /.p-section__title-->
            <div class="p-section__main p-col p-col--col6">
              <div class="p-col__item p-searchColor__item p-searchColor__item--e57373"></div><!-- /.p-col__item p-searchColor__item p-searchColor__item--e57373 -->
            </div><!-- /.p-section__main p-col p-col--col6 -->
          </div><!-- /.l-container p-section__content -->
        </section><!-- /.p-section p-searchColor -->

        <section class="p-section p-searchOther">
          <div class="l-container p-section__content">
            <div class="p-searchOther__item">
              <div class="p-searchOther__itemHeader">シーンで探す</div><!-- /.p-searchOther__itemHeader -->
              <div class="p-searchOther__itemBody">
                <p class="p-searchOther__itemText">「リビング」や「ダイニング」、「寝室・ベッドルーム」、「キッチン」、「玄関・エントランス」、「書斎・ホームオフィス」などのシーンから、それぞれのシーンで使用する家具をお探しいただけます。</p><!-- /.p-searchOther__itemText -->
                <a href="https://note.com/hi_roki/n/ne77175ea9395" target="_blank" rel="noopener noreferrer" class="c-afterIcon c-afterIcon--outerLink">オンラインストアを見る</a>
              </div><!-- /.p-searchOther__itemBody -->
            </div><!-- /.p-searchOther__item -->
          </div><!-- /.l-container p-section__content -->
          <div class="l-container p-section__content">
            <div class="p-searchOther__item">
              <div class="p-searchOther__itemHeader">ブランドで探す</div><!-- /.p-searchOther__itemHeader -->
              <div class="p-searchOther__itemBody">
                <p class="p-searchOther__itemText">他では出会えないソファやチェアが見つかります。<br>当社ブランド以外でも、セレクトラインアップの中で多数のブランドをお取扱いしております。</p><!-- /.p-searchOther__itemText -->
                <a href="https://note.com/hi_roki/n/ne77175ea9395" target="_blank" rel="noopener noreferrer" class="c-afterIcon c-afterIcon--outerLink">オンラインストアを見る</a>
              </div><!-- /.p-searchOther__itemBody -->
            </div><!-- /.p-searchOther__item -->
          </div><!-- /.l-container p-section__content -->
          <div class="l-container p-section__content">
            <div class="p-searchOther__item">
              <div class="p-searchOther__itemHeader">素材で探す</div><!-- /.p-searchOther__itemHeader -->
              <div class="p-searchOther__itemBody">
                <p class="p-searchOther__itemText">チークやパイン、マホガニーやウォールナットなどの木材から、ファブリックやラタンなどの布・繊維、ステンレスやロートアイアンのような金属まで、あらゆる素材を使用した家具を取り揃えております。</p><!-- /.p-searchOther__itemText -->
                <a href="https://note.com/hi_roki/n/ne77175ea9395" target="_blank" rel="noopener noreferrer" class="c-afterIcon c-afterIcon--outerLink">オンラインストアを見る</a>
              </div><!-- /.p-searchOther__itemBody -->
            </div><!-- /.p-searchOther__item -->
          </div><!-- /.l-container p-section__content -->
        </section><!-- /.p-section p-searchOther -->

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
