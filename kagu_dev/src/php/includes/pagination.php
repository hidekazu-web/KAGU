<?php if (paginate_links()) : ?>

  <div class="p-pagination">
    <?php
    echo
      paginate_links(
        array(
          'end_size' => 1,
          'mid_size' => 1,
          'prev_next' => true,
          'prev_text' => '&lt;',
          'next_text' => '&gt;',
        )
      );
    ?>
  </div>

<?php endif; ?>
