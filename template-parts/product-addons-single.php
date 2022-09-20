<?php

// echo '<pre>';
// print_r($args);
// echo '</pre>';

$item = $args;

$cols = ( !empty($args['grid_class']) ) ? $args['grid_class'] : 'col-12 col-md-3';

?>
<div class="products-addon__item <?= $cols ?>">
  <div class="card card--addon border-0 rounded-0 h-100">
        <?php if( !empty($item['thumbnail']) ) : ?>
        <div class="hover-zoom">
          <img src="<?= $item['thumbnail'] ?>" class="card-img-top" alt="<?= $item['name'] ?>">
        </div>
        <?php endif; ?>
        <div class="card-body px-0">
        <h5 class="card-title"><a href="<?= $item['url'] ?>" class="stretched-link arrow-right arrow-right--hidden"><?= $item['name'] ?></a></h5>
    </div>
  </div>
</div>