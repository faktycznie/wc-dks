<?php
$cat = $args; //passed from parent template
$cat_thumb_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
$cat_image = wp_get_attachment_url( $cat_thumb_id );
?>
<div class="card card--offers border-0 rounded-0 h-100">
  <?php if( !empty($cat_image) ) { ?>
    <div class="card-img hover-zoom rounded-right"><a href="<?= get_term_link($cat->term_id) ?>"><img src="<?= $cat_image ?>" class="card-img-top" alt="<?= $cat->name ?>"></a></div>
  <?php } ?>
  <div class="card-body px-0">
    <h5 class="card-title"><a href="<?= get_term_link($cat->term_id) ?>" class="arrow-right arrow-right--hidden"><span><?= $cat->name ?></span></a></h5>
  </div>
</div>
