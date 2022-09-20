<?php
global $wp;

$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

$r_cat = 0;
$r_industry = 0;

if( get_query_var( 'realization_cat' ) ) {
  $r_cat = get_queried_object()->term_id;
}

if( get_query_var( 'realization_industry' ) ) {
  $r_industry = get_queried_object()->term_id;
}

?>
<div class="sidebar sidebar--realizations">
  <div class="widget widget--r_cat">
    <h3 class="widget__title d-inline-block d-md-block" data-bs-toggle="collapse" href="#collapseCat" role="button" aria-expanded="true" aria-controls="collapseCat"><?= __('Kategorie', 'foreto') ?></h3>
    <h3 class="widget__title d-inline-block d-md-none" data-bs-toggle="collapse" href="#collapseInd" role="button" aria-expanded="true" aria-controls="collapseInd"><?= __('Branże', 'foreto') ?></h3>
    <div id="collapseCat" class="collapse show"><?php do_shortcode('[foreto_terms taxonomy="realization_cat" show_count="0"]') ?></div>
  </div>
  <div class="widget widget--r_industry">
    <h3 class="widget__title d-none d-md-block" data-bs-toggle="collapse" href="#collapseInd" role="button" aria-expanded="true" aria-controls="collapseInd"><?= __('Branże', 'foreto') ?></h3>
    <div id="collapseInd" class="collapse show"><?php do_shortcode('[foreto_terms taxonomy="realization_industry" show_count="0"]') ?></div>
  </div>
  <form class="form-realizations" action="<?= home_url( $wp->request ) ?>/" method="post">
  <input name="paged" type="hidden" value="<?= $paged ?>">
    <input name="r_cat" type="hidden" value="<?= $r_cat ?>">
    <input name="r_industry" type="hidden" value="<?= $r_industry ?>">
  </form>
</div>