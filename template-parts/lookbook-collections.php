<?php

$collections_heading = $args['collections_heading'];
$collections_descripton = $args['collections_descripton'];
$collections_items = $args['collections_items'];

?>
<div class="lb-collections pb-md-80">
  <div class="lb-collections__container container">

    <header class="lb-collections__title">
      <h2 class="lb-collections__h2 h2 text-md-center mb-3">
        <?= $collections_heading ?>
      </h2>
    </header>

    <div class="lb-collections__description text-md-center mb-40 mb-md-80">
    <?= $collections_descripton ?>
    </div>

    <div class="lb-collections__items ">
        <?php foreach($collections_items as $item) : ?>
          <div class="lb-collections__item collection-item mb-40 mb-md-160">
            <div class="collection-item__header rounded-right">
              <p class="collection-item__subtitle mb-1"><?= __('Autorska kolekcja', 'foreto'); ?></p>
              <h2 class="collection-item__title text-uppercase"><?= $item['name'] ?></h2>
            </div>
            <div class="d-none d-lg-block">
              <div class="collection-item__gallery collection-gallery">
                <?php 
                $i = 0;
                foreach($item['gallery'] as $gal) : $i++; ?>
                  <div class="collection-gallery__item item-<?= $i ?>">
                    <img src="<?= $gal['sizes']['lookbook'] ?>" alt="" loading="lazy">
                  </div>
                <?php endforeach; ?>
                <div class="collection-gallery__item item-last">
                  <?php get_template_part( 'template-parts/offers', 'last', array(
                    'title' => __('<span>Zainspiruj</span> się', 'foreto'),
                    'link'  => $item['link']
                  )); ?>
                </div>
              </div>
            </div>
            <div class="collection-item__slider d-block d-lg-none">
              <div class="collection-item__swiper swiper">
                <div class="collection-item__swiper-wrapper swiper-wrapper">
                <?php 
                $i = 0;
                foreach($item['gallery'] as $gal) : $i++; ?>
                  <div class="collection-item__slide swiper-slide item-<?= $i ?>">
                    <img src="<?= $gal['sizes']['collections'] ?>" alt="" loading="lazy">
                  </div>
                <?php endforeach; ?>
                </div>
                <div class="collection-item__pagination swiper-pagination swiper-pagination--orange mt-5"></div>
              </div>
            </div>
            <a class="btn btn-primary d-block d-lg-none mt-4" href="<?= $item['link'] ?>"><?= __('<span>Zainspiruj</span> się', 'foreto') ?></a>
            <div class="collection-item__next d-none d-xxl-flex flex-column">
                <?= __('Kolejna kolekcja', 'foreto') ?>
                <div class="arrow-long-left mt-4"></div>
            </div>
          </div>
        <?php endforeach; ?>
    </div>
  </div>
</div>