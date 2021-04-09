<header id="header" class="l-header">
  <div class="l-header__inner">
    <div class="p-header">
      <<?php echo ((is_home() || is_front_page()) ? 'h1' : 'div'); ?> class="p-header__logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?php get_template_part('includes/site-logo'); ?></a></<?php echo ((is_home() || is_front_page()) ? 'h1' : 'div'); ?>>
      <div id="drawer-content1" class="drawer-content drawer-content--cover for-drawer p-header__content">
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
          <a href="https://note.com/hi_roki/n/ne77175ea9395" target="_blank" rel="noopener noreferrer" class="c-btn p-header__btn p-header__btn--cart"><span class="c-btn__pre"><?php get_template_part('includes/cart-icon'); ?></span><span class="c-btn__body">ONLINE STORE</span></a><!-- /.c-beforeIconBtn  p-header__btn -->
          <a href="<?php echo esc_html(home_url('/contact')); ?>" class="c-btn p-header__btn p-header__btn--mail"><span class="c-btn__pre"><?php get_template_part('includes/mail-icon'); ?></span><span class="c-btn__body">お問い合わせ</span></a><!-- /.c-beforeIconBtn  p-header__btn -->
        </div><!-- /.p-header__cta -->
      </div><!-- /#drawer-content1.drawer-content for-drawer -->


      <div class="p-header__drawer">
        <button class="drawer-icon js-drawer for-drawer" type="button" data-target="for-drawer" aria-controls="drawer-content1" aria-expanded="false"><span class="drawer-bars"><span class="drawer-bar"></span></span></button>
        <div class="drawer-bg for-drawer js-drawer" data-target="for-drawer" aria-controls="drawer-content1" aria-expanded="false"></div>
      </div>
    </div>
  </div>
</header>
