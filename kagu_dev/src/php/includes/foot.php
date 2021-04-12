<footer class="l-footer">
  <div class="l-container p-footer">
    <div class="p-footer__main">
      <div class="p-footer__left">
        <div class="p-footer__logo"><a href="<?php echo esc_html(home_url('/')); ?>"><?php get_template_part('includes/site-logo'); ?></a></div><!-- /.p-footer__logo -->
        <div class="p-footer__companyName">株式会社<?php bloginfo('name'); ?></div><!-- /.p-footer__companyName -->
        <address class="p-footer__address">愛知県名古屋市〇〇区〇〇町 XX-X</address><!-- /.p-footer__address -->
        <div class="p-footer__tel"><span class="p-footer__telPrefix">TEL.</span>052-000-0000</div><!-- /.p-footer__tel -->
      </div><!-- /.p-footer__left -->
      <div class="p-footer__right">
      <?php
        wp_nav_menu(
          array(
            'depth' => 2,
            'theme_location' => 'footer',
            'container' => '',
            'container' => 'nav',
            'container_class' => 'p-footer__nav',
            'menu_class' => 'p-footer__navList',
          )
        );
        ?>
      </div><!-- /.p-footer__right -->
    </div><!-- /.p-footer__main -->
    <div class="p-footer__footer">
      <a href="<?php echo esc_html(home_url('/privacy')) ?>" class="p-footer__privacyLink">プライバシーポリシー</a>
      <p class="p-footer__copy"><small>&copy; 2020 <?php bloginfo('name'); ?> inc.</small></p><!-- /.p-footer__copy -->
    </div><!-- /.p-footer__footer -->
  </div><!-- /.l-container p-footer -->
</footer><!-- /.footer -->

<a href="#" class="c-totop js-totop"></a><!-- /.totop -->
