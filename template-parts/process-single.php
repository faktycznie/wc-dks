<?php
$cols = ( !empty($args['grid_class']) ) ? $args['grid_class'] : 'col-12 col-md-3';
$show_step = ( isset($args['show_step']) ) ? $args['show_step'] : true;
$number = ( !empty($args['number']) ) ? $args['number'] : '';

$link = ( !empty($args['link']) ) ? $args['link'] : '#';
$data_attr = ( !empty($args['data_attr']) ) ? $args['data_attr'] : '';

?>
<div class="process__col <?= $cols ?>">
  <div class="process__item card card--process border-0 rounded-right-36 h-100">
      <a class="card-link rounded-right-36" href="<?= $link ?>" <?= $data_attr ?>>
      <div class="card-body d-flex flex-column">
          <?php if( !$show_step ) : ?>
            <span class="card-number color">0<?= $number ?></span>
          <?php endif; ?>
          <div class="card-inner d-flex align-items-center mb-4">
              <?php if( !empty($args['icon']) ) : ?>
              <div class="card-icon me-30">
                  <img src="<?= $args['icon'] ?>" alt="<?= $args['title'] ?>">
              </div>
            <?php elseif( !empty($args['icon_svg']) ) : ?>
            <div class="card-icon card-icon--svg  me-30">
                <?php echo $args['icon_svg'] ?>
            </div>
            <?php endif; ?>
              <h4 class="card-title mb-0"><?= $args['title'] ?></h4>
          </div>
          <p class="card-text"><?= $args['description'] ?></p>
          <div class="mt-auto d-flex justify-content-between">
              <div class="slideup">
                  <span class="d-none d-md-inline-block card-readmore readmore readmore--small arrow-right arrow-sm-right">
                      <?= __('Poznaj szczegóły', 'foreto'); ?>
                  </span>
              </div>
              <span class="card-step text-uppercase fw-bold">
                <?php if( $show_step ) : ?>
                <?= __('Krok', 'foreto') . ' ' . $number ?>
                <?php endif; ?>
              </span>
          </div>
      </div>
      </a>
  </div>
</div>