<section class="p-lowerFv">

  <<?php echo (is_single() ? 'p' : 'h1'); ?> class="p-lowerFv__title c-pageTitle">
    <?php
    if(is_home()) {
      echo 'ブログ';
    } elseif (is_page()) {
      $parent_slug = '';
      if ($post->post_parent) {
        $parent_slug = get_post($post->post_parent)->post_name;
      }
      if ('store' === $parent_slug) {
        echo get_the_title(wp_get_post_parent_id($post));
      } else {
        the_title();
      }
    } elseif(is_single()) {
      echo get_post_type_object(get_post_type())->label;
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
      } elseif (is_post_type_archive()) {
        echo get_query_var('post_type');
      } elseif (is_tax()) {
        echo get_query_var('term');
      } elseif (is_home()) {
        echo 'blog';
      } elseif (is_single()) {
        echo get_post_type_object(get_post_type())->name;
      } elseif (is_404()) {
        echo 'Not Found';
      }
      ?>
    </span>
  </<?php echo (is_single() ? 'p' : 'h1'); ?>><!-- /.p-lowerFv__title -->
</section><!-- /.p-lowerFv -->
