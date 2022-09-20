<?php

$offers_heading = foreto_get_option('offers_heading');

$args = array(
  'taxonomy'     => "product_cat",
  'hide_empty'   => false,
  'parent'       => 0, //only top-level
  'exclude' => 44, //addons
);

$product_categories = get_terms($args);
$i = 0;
$j = 0;
if( !empty($product_categories) ) { ?>
<section id="offers" class="offers pb-80 pb-md-160">
  <div class="offers_container container">

    <header class="offers_title">
      <h2 class="offers__h2 h2 text-md-center pb-5 m-0"><?= $offers_heading ?></h2>
    </header>

    <div class="offers__items">

      <ul class="nav nav-tabs justify-content-center" id="offers" role="tablist">

        <?php /* <li class="nav-item nav-item--desktop" role="presentation">
          <button class="nav-link active" id="offers-all-tab" data-bs-toggle="tab" data-bs-target="#offers-all" type="button" role="tab" aria-controls="offers-all" aria-selected="true"><?= __('Wszystkie', 'foreto'); ?></button>
        </li> */ ?>

        <?php foreach($product_categories as $parent) {
          if($parent->slug == 'uncategorized') continue;
          $i++;
          $active_class = ( $i === 1 ) ? 'active' : '';
          $active_aria = ( $i === 1 ) ? 'true' : 'false';
          $addons_cat = get_field('addons_category', $parent);
          if($addons_cat) continue;
          ?>
          <li class="nav-item nav-item--cats" role="presentation">
            <button class="nav-link <?= $active_class ?>" id="offers-<?= $parent->slug ?>-tab" data-bs-toggle="tab" data-bs-target="#offers-<?= $parent->slug ?>" type="button" role="tab" aria-controls="offers-<?= $parent->slug ?>" aria-selected="<?= $active_aria ?>"><?= $parent->name ?></button>
          </li>
        <?php } ?>
      </ul>

      <div class="tab-content">

        <?php /* <div class="tab-pane active" id="offers-all" role="tabpanel" aria-labelledby="offers-all-tab">
          <div class="row gx-3 gy-5">
          <?php
            $all_args = array(
              'taxonomy'     => "product_cat",
              'orderby'=>'name'
            );
  
            $all_cats = get_terms($all_args);

            foreach($all_cats as $cat) {
              if($cat->slug == 'uncategorized' || $cat->parent === 0) continue;
              $addons_cat = get_field('addons_category', $cat);
              if($addons_cat) continue;
              ?>
              <div class="col-sm-6 col-md-4">
                <?php get_template_part( 'template-parts/offers', 'single', $cat ); ?>
              </div>
              <?php
            } ?>
            <div class="col-sm-6 col-md-4">
              <?php get_template_part( 'template-parts/offers', 'last'); ?>
            </div>
          </div>
        </div> */ ?>

        <?php foreach($product_categories as $parent) {
          if($parent->slug == 'uncategorized') continue;
          $j++;
          $active_class = ( $j === 1 ) ? 'active' : '';

          $child_args = array(
            'taxonomy'     => "product_cat",
            'hide_empty'   => false,
            'parent'       => $parent->term_id
          );

          $child_cats = get_terms($child_args);

          ?>
          <div class="tab-pane tab-pane--cats <?= $active_class ?>" id="offers-<?= $parent->slug ?>" role="tabpanel" aria-labelledby="offers-<?= $parent->slug ?>-tab">
            <div class="row gx-3 gy-5 gy-sm-3">
              <?php foreach($child_cats as $cat) {
                if($cat->slug == 'uncategorized') continue;
                ?>
                <div class="col-sm-6 col-md-4">
                  <?php get_template_part( 'template-parts/offers', 'single', $cat ); ?>
                </div>
                <?php
              } ?>
              <div class="col-sm-6 col-md-4">
                <?php get_template_part( 'template-parts/offers', 'last'); ?>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>

    </div>
  </div>
</section>
<?php } ?>