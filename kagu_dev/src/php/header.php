<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,user-scalable=no,shrink-to-fit=yes">
<meta name="format-detection" content="telephone=no">
<link rel="preconnect" href="https://fonts.gstatic.com">  <!-- google font -->
<?php if (is_404() || is_page('confirm')) : ?>
  <meta name=”robots” content="noindex, nofollow">
<?php elseif (is_single() || is_page()) : ?>
  <?php if (get_post_meta($post->ID, "noindex", true)) : ?>
    <meta name="robots" content="noindex, nofollow" />
  <?php endif; ?>
<?php endif; ?>
<?php wp_head(); ?>
<?php if(is_user_logged_in()) : ?>
  <style>
    header {
      margin-top: 32px;
    }
  </style>
<?php endif; ?>
