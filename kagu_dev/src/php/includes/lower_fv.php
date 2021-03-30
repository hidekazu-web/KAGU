<section class="p-lowerFv">

  <h1 class="p-lowerFv__title c-lv1Heading">
    <?php if (is_page()) {
      the_title();
    } else {
      the_archive_title();
    } ?>
    <span>
      <?php
      if (is_page()) {
        if (scf::get('sub_title')) {
          echo scf::get('sub_title');
        } else {
          echo $post->post_name;
        }
      } ?>
    </span>
  </h1><!-- /.p-lowerFv__title -->

  <div class="l-container">
    <div class="p-breadcrumb">
      <?php if (function_exists('bcn_display')) {
        bcn_display();
      } ?>
    </div><!-- /.p-breadcrumb -->
  </div><!-- /.l-container -->

</section><!-- /.p-lowerFv -->
