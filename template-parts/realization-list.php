<?php

$paged = !empty($args['paged']) ? $args['paged'] : 1;
$r_cat = !empty($args['r_cat']) ? $args['r_cat'] : 0;
$r_industry = !empty($args['r_industry']) ? $args['r_industry'] : 0;

$taxes = [];

if( !empty($r_cat) ) {
  $taxes[] = array(
    'taxonomy' => 'realization_cat',
    'field'    => 'term_id',
    'terms'    => $r_cat,
  );
}

if( !empty($r_industry) ) {
  $taxes[] = array(
    'taxonomy' => 'realization_industry',
    'field'    => 'term_id',
    'terms'    => $r_industry,
  );
}

$query_args = array(
    'post_type' => 'realization',
    'paged'     => $paged,
    'tax_query' => $taxes,
);

$query = new WP_Query( $query_args );
?>
<?php if( $query->have_posts() ) : ?>
  <div class="latest__items">
    <div class="latest__row row gy-5">
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>

    <?php get_template_part( 'template-parts/latest-blog', 'single', array(
      'grid_class' => 'col-12',
      'card_class' => 'card--realization',
      'img_size'   => 'realizations-list'
    ) ); ?>

    <?php endwhile; // end of the loop. 
    wp_reset_postdata();
    ?>
    </div>
  </div>
  <nav class="latest__pagination pagination mt-40 mt-md-80">
    <?php foreto_pagination($query); ?>
  </nav>
<?php else : ?>
  <h3><?= __('Brak wpisów.', 'foreto') ?></h3>
<?php endif; ?>