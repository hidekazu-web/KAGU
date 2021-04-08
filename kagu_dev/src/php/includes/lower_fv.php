<section class="p-lowerFv">

  <h1 class="p-lowerFv__title c-pageTitle">
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
</section><!-- /.p-lowerFv -->
