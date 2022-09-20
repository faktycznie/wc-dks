<?php
/*
* Template Name: O nas
*/

get_header();

$about_heading = ( get_field('about_heading', get_the_ID()) ) ? get_field('about_heading', get_the_ID()) : get_the_title();
$about_description = get_the_content();

$about_features = get_field('about_features', get_the_ID());

?>
<div class="page-about mb-80 mb-md-160">
  <div class="page-about__container container">
    <div class="page-about__row d-flex flex-column flex-md-row justify-content-between">
      <div class="page-about__text d-flex flex-column justify-content-md-center">
        <header class="page-about__title mb-3">
          <h1 class="page-about__h1 h2 m-0">
              <?= $about_heading ?>
          </h1>
        </header>
        <div class="page-about__content">
          <?= $about_description ?>
        </div>
      </div>
      <div class="page-about__features features">
        <div class="row gx-3 gy-4 gy-md-3">
        <?php foreach($about_features as $item) : ?>
          <div class="col-12 col-md-6">
            <?php get_template_part( 'template-parts/about-single', null, $item ); ?>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="page-about__bg bg bg--left">
    <svg class="d-none d-md-block" xmlns="http://www.w3.org/2000/svg" width="223.688" height="370.298" viewBox="0 0 223.688 370.298">
      <g transform="translate(62.545 -92.367)">
        <path d="M0,97.74,97.74,0l97.74,97.74" transform="translate(161.143 267.185) rotate(90)" fill="#f5f5f5"/>
        <path d="M0,174.11,174.11,0,348.22,174.11" transform="translate(112.272 93.074) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
      </g>
    </svg>
  </div>
  <div class="page-about__bg bg bg--right">
    <svg xmlns="http://www.w3.org/2000/svg" width="158.064" height="298.544" viewBox="0 0 158.064 298.544">
      <g transform="translate(142.356 108.393) rotate(180)">
        <path d="M0,82.291,82.291,0l82.291,82.291" transform="translate(142.356 -56.189) rotate(90)" fill="#f5f5f5"/>
        <path d="M0,125.158,125.159,0,250.317,125.158" transform="translate(110.158 -189.444) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
      </g>
    </svg>
  </div>
</div>
<?php

$about_items = get_field('about_items', get_the_ID());

get_template_part( 'template-parts/news', null, array(
  'news_slider' => false,
  'news'        => $about_items,
  'img_size'    => 'news_big'
) );


$timeline_heading = get_field('timeline_heading', get_the_ID());
$timeline_heading_type = get_field('timeline_heading_type', get_the_ID()) ? get_field('timeline_heading_type', get_the_ID()) : 'h2';
$timeline_description = get_field('timeline_description', get_the_ID());
$timeline_items = get_field('timeline_items', get_the_ID());
?>
<div class="timeline">
  <div class="timeline__container container container-small">
    <div class="timeline__header text-md-center ">
        <header class="timeline__title mb-3 mb-md-4">
          <<?=$timeline_heading_type?> class="timeline__h2 h2 m-0">
              <?= $timeline_heading ?>
          </<?=$timeline_heading_type?>>
        </header>
        <div class="timeline__desc mb-40 mb-md-160">
          <?= $timeline_description ?>
        </div>
    </div>
    <div class="timeline__items mb-md-80 d-flex flex-column">
      <?php foreach($timeline_items as $item) : ?>
        <div class="timeline__item timeline-item d-flex">
          <div class="timeline-item__year"><?= $item['year'] ?></div>
          <div class="timeline-item__content">
            <h4 class="timeline-item__heading mb-3 mb-md-4"><?= $item['title'] ?></h4>
            <?php if( !empty($item['description']) ) : ?>
            <p class="timeline-item__desc"><?= $item['description'] ?></p>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
      </div>
  </div>
</div>
<?php

get_template_part( 'template-parts/contact' );
$seo_items = get_field('seo_items');
get_template_part( 'template-parts/footer-seo', null, array(
  'ids' => $seo_items
) );

get_footer();