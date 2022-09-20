<?php
$product = $args; //passed from parent template
$post_id = $product->get_id();
$post_image = get_the_post_thumbnail_url($post_id);
$post_name = $product->get_name();
?>
<div class="col-sm-6 col-lg-4 col-xxl-2">
  <div class="card card--addon border-0 rounded-0 h-100">
    <?php if( !empty($post_image) ) { ?>
      <div class="card-photo hover-zoom">
        <img src="<?= $post_image ?>" class="card-img-top" alt="<?= $post_name ?>">
        <a class="card-details-link " href="<?= get_permalink($post_id) ?>"><span class="arrow-right arrow-right-link">Więcej informacji</span></a>
      </div>
      <?php } ?>
    <div class="card-body px-0">
      <h5 class="card-title"><a href="<?= get_permalink($post_id) ?>" class="stretched-link"><?= $post_name ?></a></h5>
    </div>
  </div>
</div>