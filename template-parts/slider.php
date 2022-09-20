<?php

$slides_ids = get_posts(array(
  'fields'          => 'ids',
  'posts_per_page'  => -1,
  'post_type'       => 'wp_image_markers'
));

$slide_i = 0;
$slider_heading = get_field('slider_heading');
$slider_heading_type = get_field('slider_heading_type') ? get_field('slider_heading_type') : 'h1';

$slide_heading_type = get_field('slide_heading_type') ? get_field('slider_heading_type') : 'h3';

if( !empty($slides_ids) ) {
?>
<section class="slider mb-80 mb-md-160">
  <div class="container slider__container">
    <div class="slider__inner d-flex">
      <div class="slider__photo">
        <div class="slider__swiper swiper">
          <div class="slider__swiper-wrapper swiper-wrapper">
            <?php foreach( $slides_ids as $slide_id ) { ?>
              <div class="swiper-slide">
                <?php do_shortcode('[wp_image_markers id="' . $slide_id . '"]'); ?>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

      <div class="slider__side">
        <<?=$slider_heading_type?> class="slider__maintitle"><?= $slider_heading ?></<?=$slider_heading_type?>>
        <div class="slider__pagination swiper-pagination"></div>
        <div class="slider__descriptions">
          <?php foreach( $slides_ids as $slide_id ) {
            $slide_title = get_field( 'title', $slide_id );
            $slide_desc = get_field( 'description', $slide_id );
            $slide_link = get_field( 'link', $slide_id );
            $slide_active = ( $slide_i === 0 ) ? 'slider__description--active' : '';
            ?>
            <div class="slider__description <?=$slide_active; ?> slide-<?= $slide_i++; ?>">
              <<?=$slide_heading_type?> class="slider__title"><?= $slide_title; ?></<?=$slide_heading_type?>>
              <p class="slider__content"><?= $slide_desc; ?></p>
              <?php if($slide_link) : ?>
              <a class="btn btn-primary d-block d-sm-inline-block" href="<?= $slide_link; ?>"><?php _e('Zobacz więcej', 'foreto'); ?></a>
              <?php endif; ?>
            </div>
          <?php } ?>
        </div>
      </div>

    </div>
  </div>
</section>
<?php } ?>