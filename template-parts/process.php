<?php

$process_heading = $args['process_heading'];
$process_heading_type = !empty($args['process_heading_type']) ? $args['process_heading_type'] : 'h2';
$process_items = $args['process_items'];
$process_link = foreto_get_option('process_more_link');
$cols = ( !empty($args['grid_class']) ) ? $args['grid_class'] : 'col-12 col-md-3';

if( !empty($process_items) ) {

?>
<section class="process pt-md-160 pb-80 pb-md-160">
  <div class="process__container container">

    <?php if( $process_heading ) : ?>
    <header class="process__title pb-40 pb-md-80">
      <<?=$process_heading_type?> class="process__h2 h2 text-md-center m-0">
        <?= $process_heading ?>
      </<?=$process_heading_type?>>
    </header>
    <?php endif; ?>

    <div class="process__items">
      <div class="process__row row gx-3 gy-5 gy-sm-4">
        <?php 
        $i = 0;
        foreach($process_items as $item) { $i++;
          $item['grid_class'] = $cols;
          $item['number'] = $i;
          get_template_part('template-parts/process', 'single', $item);
        } ?>
      </div>
    </div>
    <?php if($process_link) : ?>
    <div class="process__button text-center pt-5">
      <a class="btn btn-primary d-block d-sm-inline-block" href="<?= $process_link ?>"><?= __('Dowiedz się więcej', 'foreto'); ?></a>
    </div>
    <?php endif; ?>
  </div>
</section>
<?php } ?>