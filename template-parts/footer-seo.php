<?php

$selected = ( !empty($args['ids']) ) ? $args['ids'] : false;
$per_page = ( !empty($selected) ) ? -1 : 4;

$args = array(
  'post_type' => 'seo',
  'posts_per_page' => $per_page,
  'post__in' => $selected
);

if( !empty($selected) ) $args['orderby'] = 'post__in';

$seo_query = new WP_Query( $args );

if( $seo_query->have_posts() ) { ?>
<section class="seo pt-80 pb-80 pt-md-160 pb-md-160">
  <div class="seo_container container">
    <div class="seo__items">
      <div class="row">
        <div class="col-12 col-md-3">
          <ul class="nav nav-pills nav-pills--seo flex-column" id="seo" role="tablist">
            <?php 
            $i = 0;
            while ( $seo_query->have_posts() ) : $seo_query->the_post();
              $i++;
              $active = ( $i == 1 ) ? ' active' : '';
              $aria = ( $i == 1 ) ? 'true' : 'false';
            ?>
              <li class="nav-item nav-item--seo" role="presentation">
                <button class="nav-link btn-link <?= $active ?> text-uppercase" id="seo-<?= $i ?>-tab" data-bs-toggle="tab" data-bs-target="#seo-<?= $i ?>" type="button" role="tab" aria-controls="seo-<?= $i ?>" aria-selected="<?= $aria ?>"><?= get_the_title() ?></button>
              </li>
            <?php endwhile; wp_reset_postdata(); ?>
          </ul>
        </div>
        <div class="col-12 col-md-9">
          <div class="tab-content">
            <?php 
            $j = 0;
            while ( $seo_query->have_posts() ) : $seo_query->the_post();
              $j++;
              $active = ( $j == 1 ) ? ' active' : '';
              $aria = ( $j == 1 ) ? 'true' : 'false';
              ?>
              <div class="tab-pane tab-pane--seo <?= $active ?>" id="seo-<?= $j ?>" role="tabpanel" aria-labelledby="seo-<?= $j ?>-tab">
                <button class="btn btn-link btn-collapse text-uppercase" data-bs-toggle="collapse" data-bs-target="#seo-acc-<?= $j ?>" aria-expanded="false" aria-controls="seo-acc-<?= $j ?>">
                  <?= get_the_title(); ?>
                </button>
                <div class="collapse" id="seo-acc-<?= $j ?>">
                  <?php the_content(); ?>
                </div>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>