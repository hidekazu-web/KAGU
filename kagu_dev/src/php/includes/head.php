<header class="l-header">
  <div class="l-container">
    <div class="p-header">
      <<?php echo ((is_home() || is_front_page()) ? 'h1' : 'div'); ?> class="p-header__logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri() ?>/img/header-logo.png" alt="ロゴ"></a></<?php echo ((is_home() || is_front_page()) ? 'h1' : 'div'); ?>>
      <div id="drawer-content1" class="drawer-content for-drawer p-header__content">
        <?php
        wp_nav_menu(
          array(
            'depth' => 1,
            'theme_location' => 'global',
            'container' => '',
            'container' => 'nav',
            'container_class' => 'p-header__nav',
            'container_id' => 'drawer-content1',
          )
        );
        ?>
        <div class="p-header__cta">
          <a href="https://note.com/hi_roki/n/ne77175ea9395" target="_blank" rel="noopener noreferrer" class="c-beforeIconBtn c-beforeIconBtn--cart p-header__btn">ONLINE STORE</a><!-- /.c-beforeIconBtn  p-header__btn -->
          <a href="<?php echo esc_html(home_url('/contact')); ?>" class="c-beforeIconBtn c-beforeIconBtn--mail p-header__btn">お問い合わせ</a><!-- /.c-beforeIconBtn  p-header__btn -->
        </div><!-- /.p-header__cta -->
      </div><!-- /#drawer-content1.drawer-content for-drawer -->


      <div class="p-header__drawer">
        <button class="drawer-icon js-drawer for-drawer" type="button" data-target="for-drawer" aria-controls="drawer-content1" aria-expanded="false"><span class="drawer-bars"><span class="drawer-bar"></span></span></button>
        <div class="drawer-bg for-drawer js-drawer" data-target="for-drawer" aria-controls="drawer-content1" aria-expanded="false"></div>
      </div>
      <!-- /.header-drawer-->
    </div>
    <!-- /.header-content-->
  </div>
  <!-- /.header-inner-->
</header>
<!-- /.header-->
