<header class="l-header">
  <div class="l-container">
    <div class="p-header">
      <h1 class="p-header__logo"><a href="/"><img src="./img/header-logo.png" alt="ロゴ"></a></h1>
      <header class="header">
        <?php
        wp_nav_menu(
          array(
            'depth' => 1,
            'theme_location' => 'global',
            'container' => 'nav',
            'container_class' => 'header-nav',
            'menu_class' => 'header-nav-list',
            'menu_item_class' => 'header-nav-item',
          )
        );
        ?>
        <!-- /.header-nav-->
      </header>
      <!-- /.header-->

      <!-- <nav class="p-header__nav drawer-content for-drawer" id="drawer-content1" aria-hidden="true">
        <ul>
          <li><a href="#">MENU1</a></li>
          <li><a href="#">MENU2</a></li>
          <li><a href="#">MENU3</a></li>
          <li><a href="#">MENU4</a></li>
          <li><a href="#">MENU5</a></li>
        </ul>
      </nav> -->
      <!-- /.header-nav-->
      <!-- <div class="p-header__drawer">
        <button class="drawer-icon js-drawer for-drawer" type="button" data-target="for-drawer" aria-controls="drawer-content1" aria-expanded="false"><span class="drawer-bars"><span class="drawer-bar"></span></span></button>
        <div class="drawer-bg for-drawer js-drawer" data-target="for-drawer" aria-controls="drawer-content1" aria-expanded="false"></div>
      </div> -->
      <!-- /.header-drawer-->
    </div>
    <!-- /.header-content-->
  </div>
  <!-- /.header-inner-->
</header>
<!-- /.header-->
