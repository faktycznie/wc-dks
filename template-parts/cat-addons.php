<?php

$cat = $wp_query->get_queried_object();
$offers_heading = get_field('addons_heading', $cat);

$args = array(
  'taxonomy'     => "product_cat",
  'hide_empty'   => true,
  'child_of'     => 44, // Dodatki ID
);

$product_categories = get_terms($args);

if( !empty($product_categories) ) { ?>
<section class="offers pb-40 pb-md-160">
  <div class="offers_container container">

    <header class="offers_title">
      <h2 class="offers__h2 h2 text-md-center pb-5 m-0"><?= $offers_heading ?></h2>
    </header>

    <div class="offers__items">

      <ul class="nav nav-tabs justify-content-center" id="offers" role="tablist">
        <?php 
        $i = 0;
        foreach($product_categories as $parent) {
          $active_class = ( ++$i == 1 ) ? ' active' : '';
          ?>
          <li class="nav-item nav-item--cats" role="presentation">
            <button class="nav-link <?= $active_class; ?>" id="offers-<?= $parent->slug ?>-tab" data-bs-toggle="tab" data-bs-target="#offers-<?= $parent->slug ?>" type="button" role="tab" aria-controls="offers-<?= $parent->slug ?>" aria-selected="false"><?= $parent->name ?></button>
          </li>
        <?php } ?>
      </ul>

      <div class="tab-content">
        <?php 
        $y = 0;
        foreach($product_categories as $parent) {
          $active_class = ( ++$y == 1 ) ? ' active' : '';

          $args = array(
            'limit' => -1,
            'status' => 'publish',
            'category'    => array($parent->slug),
            'orderby' => 'menu_order',
            'order' => 'ASC'
          );
           
          $addons = wc_get_products( $args );
          
          ?>
          <div class="tab-pane tab-pane--cats <?= $active_class ?>" id="offers-<?= $parent->slug ?>" role="tabpanel" aria-labelledby="offers-<?= $parent->slug ?>-tab">
            <div class="row gx-3 gy-5 gy-sm-3">
              <?php foreach($addons as $addon) {
                $addon_id = $addon->get_id();
                $addon_type = get_field('addons_type', $addon_id);
                if( 'query' == $addon_type || 'default' == $addon_type ) continue;
                get_template_part( 'template-parts/cat-addons', 'single', $addon );
              } 
              ?>
            </div>
          </div>
        <?php } ?>
      </div>

    </div>
  </div>
</section>
<?php } ?>