<?php

$realizations_heading = $args['realizations_heading'];
$realizations_description = $args['realizations_description'];
$realizations_link = $args['realizations_link'];
$realizations_gallery = $args['realizations_gallery'];

if( !empty($realizations_gallery) ) {
?>
<section class="realizations pt-80 pb-80 overflow-hidden">
  <div class="realizations__container container-left">

    <div class="realizations__inner d-flex flex-wrap align-items-center justify-content-between">

      <div class="d-block d-lg-none">
        <h3 class="realizations__title mb-4"><?= $realizations_heading ?></h3>
      </div>
      
      <div class="realizations__slider order-lg-2 mb-4 mb-lg-0">
        <div class="realizations__swiper swiper">
          <div class="realizations__swiper-wrapper swiper-wrapper">
            <?php foreach( $realizations_gallery as $item) : ?>
              <div class="realizations__slide swiper-slide">
                <?php
                $item['thumbnail'] = $item['image']['sizes']['realizations'];
                get_template_part( 'template-parts/collections', 'single', $item );
                ?>
              </div>
            <?php endforeach; ?>
          </div>
          <div class="realizations__arrows realizations__arrows--prev swiper-button-prev"></div>
          <div class="realizations__arrows realizations__arrows--next swiper-button-next"></div>
          <div class="realizations__pagination swiper-pagination swiper-pagination--orange mt-5"></div>
        </div>
      </div>

      <div class="realizations__description order-lg-1">
        <h3 class="realizations__title d-none d-lg-block mb-4"><?= $realizations_heading ?></h3>
        <p class="realizations__content"><?= $realizations_description; ?></p>
        <a class="btn btn-primary d-block d-sm-inline-block mt-4" href="<?= $realizations_link; ?>"><?php _e('Zobacz więcej', 'foreto'); ?></a>
      </div>

    </div>
  </div>
</section>
<?php } ?>