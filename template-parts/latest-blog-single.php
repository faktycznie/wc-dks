<?php

$cols = ( !empty($args['grid_class']) ) ? $args['grid_class'] : 'col-12 col-md-4';
$img_size = ( !empty($args['img_size']) ) ? $args['img_size'] : 'latest-blog';
$card_class = ( !empty($args['card_class']) ) ? $args['card_class'] : '';

?>
<div class="<?= $cols ?>">
  <div class="latest__item card card--blog border-0 rounded-0 <?= $card_class ?>">
    <?php if(has_post_thumbnail()) { ?>
      <div class="card-photo hover-zoom hover-opacity">
        <a href="<?php the_permalink() ?>">
          <?php the_post_thumbnail($img_size, array('class' => 'card-img-top')); ?>
        </a>
      </div>
    <?php } ?>
    <div class="card-body px-0 py-3 p-md-4 d-flex flex-column">
      <div class="card-category mb-3"><?= foreto_get_the_category_list() ?></div>
      <h4 class="h4 card-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
      <div class="card-excerpt"><?php the_excerpt(); ?></div>
    </div>
  </div>
</div>