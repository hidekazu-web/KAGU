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

        <section id="themes" class="p-section p-searchTheme">
          <div class="l-container p-section__content">
            <h2 class="p-section__title">テーマで探す<span>SEARCH BY THEME</span></h2><!-- /.p-section__title -->
            <div class="p-section__main p-searchTheme__main">
              <?php $themes = scf::get('themes');
              if ($themes) :
                foreach ($themes as $index => $theme) : ?>
                  <a href="<?php echo $theme['theme_link']; ?>" target="_blank" rel="noopener noreferrer" class="p-searchTheme__item">
                    <?php $img_alt = get_post_meta($theme['theme_img'], '_wp_attachment_image_alt', true); ?>
                    <figure class="p-searchTheme__itemImg"><img src="<?php echo wp_get_attachment_image_src($theme['theme_img'], 'medium')[0]; ?>" alt="<?php echo $img_alt; ?>"></figure><!-- /.p-searchTheme__itemImg -->
                    <div class="p-searchTheme__itemTheme"><?php echo $theme['theme_name']; ?></div><!-- /.p-searchTheme__itemTheme -->
                    <span class="p-searchTheme__link c-afterIcon c-afterIcon--arrowRight">ONLINE STORE</span><!-- /.p-searchTheme__link c-afterIcon c-afterIcon--arrow -->
                  </a><!-- /.p-searchTheme__item -->
              <?php endforeach;
              endif; ?>
            </div><!-- /.p-section__main -->
          </div><!-- /.l-container p-section__content -->
        </section><!-- /.p-section -->

        <section id="color" class="p-section p-searchColor">
          <div class="l-container p-section__content">
            <div class="p-section__title">カラーで探す<span>SEARCH BY COLOR</span></div><!-- /.p-section__title-->
            <div class="p-section__main p-searchColor__main">
              <?php $colors = scf::get('colors');
              if ($colors) :
                foreach ($colors as $index => $color) : ?>
                  <a href="<?php echo $color['color_link']; ?>" target="_blank" rel="noopener noreferrer" class="p-searchColor__item" style="background-color: <?php echo $color['color']; ?>;"></a>
              <?php endforeach;
              endif; ?>
            </div><!-- /.p-section__main p-searchColor__main -->
          </div><!-- /.l-container p-section__content -->
        </section><!-- /.p-section p-searchColor -->

        <section class="p-section p-searchOther">
          <div class="l-container l-container--narrow p-section__content p-searchOther__content">
            <div id="scene" class="p-searchOther__item">
              <h2 class="p-searchOther__itemHeader">シーンで探す</h2><!-- /.p-searchOther__itemHeader -->
              <div class="p-searchOther__itemBody">
                <p class="p-searchOther__itemText">「リビング」や「ダイニング」、「寝室・ベッドルーム」、「キッチン」、「玄関・エントランス」、「書斎・ホームオフィス」などのシーンから、それぞれのシーンで使用する家具をお探しいただけます。</p><!-- /.p-searchOther__itemText -->
                <div class="p-searchOther__itemFooter">
                  <a href="https://note.com/hi_roki/n/ne77175ea9395" target="_blank" rel="noopener noreferrer" class="c-afterIcon c-afterIcon--outerLink p-searchOther__itemLink">オンラインストアを見る</a>
                </div><!-- /.p-searchOther__itemFooter -->
              </div><!-- /.p-searchOther__itemBody -->
            </div><!-- /.p-searchOther__item -->
            <div id="brand" class="p-searchOther__item">
              <h2 class="p-searchOther__itemHeader">ブランドで探す</h2><!-- /.p-searchOther__itemHeader -->
              <div class="p-searchOther__itemBody">
                <p class="p-searchOther__itemText">他では出会えないソファやチェアが見つかります。<br>当社ブランド以外でも、セレクトラインアップの中で多数のブランドをお取扱いしております。</p><!-- /.p-searchOther__itemText -->
                <div class="p-searchOther__itemFooter">
                  <a href="https://note.com/hi_roki/n/ne77175ea9395" target="_blank" rel="noopener noreferrer" class="c-afterIcon c-afterIcon--outerLink p-searchOther__itemLink">オンラインストアを見る</a>
                </div><!-- /.p-searchOther__itemFooter -->
              </div><!-- /.p-searchOther__itemBody -->
            </div><!-- /.p-searchOther__item -->
            <div id="material" class="p-searchOther__item">
              <h2 class="p-searchOther__itemHeader">素材で探す</h2><!-- /.p-searchOther__itemHeader -->
              <div class="p-searchOther__itemBody">
                <p class="p-searchOther__itemText">チークやパイン、マホガニーやウォールナットなどの木材から、ファブリックやラタンなどの布・繊維、ステンレスやロートアイアンのような金属まで、あらゆる素材を使用した家具を取り揃えております。</p><!-- /.p-searchOther__itemText -->
                <div class="p-searchOther__itemFooter">
                  <a href="https://note.com/hi_roki/n/ne77175ea9395" target="_blank" rel="noopener noreferrer" class="c-afterIcon c-afterIcon--outerLink p-searchOther__itemLink">オンラインストアを見る</a>
                </div><!-- /.p-searchOther__itemFooter -->
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
