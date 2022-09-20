<?php
  $hover_class = ( !empty($args['title']) ) ? 'hover-opacity' : '';
  $htype = ( !empty($args['heading_type']) ) ? $args['heading_type'] : 'h3';
?>
<div class="collections__item card card--collections text-white border-0 rounded-0 overflow-hidden">
  <?php if( !empty($args['thumbnail']) ) { ?>
  <div class="collections__photo hover-zoom <?= $hover_class ?> rounded-right">
    <img src="<?= $args['thumbnail'] ?>" class="card-img" alt="<?= $args['title'] ?>">
  </div>
  <?php } ?>
  <div class="card-img-overlay">
    <div class="card-body p-0 d-flex flex-column align-items-center">
      <div class="card-content my-auto text-center text-uppercase">
        <?php if( !empty($args['show_label']) ) : ?>
        <p class="card-text mb-1"><?= __('Kolekcja', 'foreto'); ?></p>
        <?php endif; ?>
        <?php if( !empty($args['title']) ) : ?>
        <<?=$htype?> class="card-title h2"><?= $args['title'] ?></<?=$htype?>>
        <?php endif; ?>
      </div>
      <?php if( !empty($args['link']) ) : ?>
      <a class="stretched-link" href="<?= $args['link'] ?>">
        <span class="card__readmore readmore readmore--small arrow-right arrow-sm-right">
          <?= __('Zobacz więcej', 'foreto'); ?>
        </span>
      </a>
      <?php endif; ?>
    </div>
  </div>
</div>