<?php
  $htype = ( !empty($args['heading_type']) ) ? $args['heading_type'] : 'h3';
?>
<div class="news__item card card--news border-0 rounded-0 overflow-hidden mb-40 mb-md-160">
  <div class="d-flex flex-column flex-md-row justify-content-between">
    <?php if( !empty($args['thumbnail']) ) { ?>
    <div class="news__photo hover-zoom rounded-right">
      <?php if( !empty($args['link']) ) : ?>
      <a href="<?= $args['link'] ?>">
      <?php endif; ?>
        <img src="<?= $args['thumbnail'] ?>" class="img-fluid" alt="<?= $args['title'] ?>">
      <?php if( !empty($args['link']) ) : ?>
      </a>
      <?php endif; ?>
    </div>
    <?php } ?>
    <div class="news__content d-flex">
      <div class="card-body py-3 px-0 p-md-0 my-auto">
        <?php if( !empty($args['icon']) ) : ?>
        <div class="card-icon mb-3 mb-md-4">
            <img src="<?= $args['icon'] ?>" alt="<?= $args['title'] ?>">
        </div>
        <?php elseif( !empty($args['icon_svg']) ) : ?>
        <div class="card-icon card-icon--svg mb-3 mb-md-4">
          <?php echo $args['icon_svg'] ?>
        </div>
        <?php endif; ?>
        <<?=$htype?> class="card-title h3 mb-3 mb-md-4"><?= $args['title'] ?></<?=$htype?>>
        <p class="card-text"><?= $args['description'] ?></p>
        <?php if( !empty($args['link']) ) : ?>
        <a class="news__readmore readmore readmore--small arrow-right arrow-sm-right" href="<?= $args['link'] ?>"><?= __('Zobacz więcej', 'foreto'); ?></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>