<?php

$testimonials_heading = foreto_get_option('testimonials_heading');

$selected = ( !empty($args['ids']) ) ? $args['ids'] : false;
$per_page = ( !empty($selected) ) ? -1 : 3;

$args = array(
  'post_type' => 'testimonial',
  'posts_per_page' => $per_page,
  'post__in' => $selected
);

if( !empty($selected) ) $args['orderby'] = 'post__in';

$testimonial_query = new WP_Query( $args );
$p = 0;

if ( $testimonial_query->have_posts() ) { 
?>
<section class="testimonials pt-40 pt-md-80 pb-40 pb-md-80">
  <div class="testimonials__container container">

    <header class="testimonials__title pb-40 pb-md-80">
      <h2 class="testimonials__h2 h2 text-md-center m-0 px-5">
        <?= $testimonials_heading ?>
      </h2>
    </header>

    <div class="testimonials__items mx-auto swiper swiper--testimonials">
      <div class="testimonials__inner swiper-wrapper">
        <?php while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post(); $p++; 
          $author = get_field('author');
        ?>
          <div class="testimonials__item-inner swiper-slide px-5">
            <div class="testimonials__item mx-auto card card--testimonials border-0 rounded-right">
                <div class="card-body d-flex gap-5 flex-column flex-md-row align-items-center align-items-md-start">
                    <?php if( has_post_thumbnail() ) : ?>
                    <div class="card-logo">
                      <?php the_post_thumbnail() ?>
                    </div>
                    <?php endif; ?>

                    <div class="card-content">
                      <p class="card-text"><?= get_the_content() ?></p>
                      <?php if($author) : ?>
                      <p class="card-text fw-bold m-0"><?= $author ?></p>
                      <?php endif; ?>
                      <p class="card-text m-0"><?= get_the_title() ?></p>
                    </div>
                </div>
            </div>
          </div>
        <?php endwhile;
        wp_reset_postdata(); ?>
      </div>
      <div class="testimonials__arrows testimonials__arrows--prev swiper-button-prev"></div>
      <div class="testimonials__arrows testimonials__arrows--next swiper-button-next"></div>
      <div class="testimonials__pagination swiper-pagination swiper-pagination--orange mt-5"></div>
    </div>
    <div class="testimonials__button text-center pt-5 px-5">
      <a class="btn btn-primary d-block d-sm-inline-block" href="<?= get_post_type_archive_link('testimonial') ?>"><?= __('Zobacz więcej', 'foreto'); ?></a>
    </div>
  </div>
  <div class="testimonials__bg bg bg--left">
    <svg class="d-none d-md-block" xmlns="http://www.w3.org/2000/svg" width="306.225" height="609.621" viewBox="0 0 306.225 609.621">
      <path id="Path_3326" data-name="Path 3326" d="M0,304.1,304.1,0l304.1,304.1" transform="translate(304.811 0.707) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
    </svg>
    <svg class="d-md-none" xmlns="http://www.w3.org/2000/svg" width="27.263" height="51.698" viewBox="0 0 27.263 51.698">
      <path id="Path_3323" data-name="Path 3323" d="M0,25.142,25.142,0,50.284,25.142" transform="translate(25.849 0.707) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
    </svg>
  </div>
  <div class="testimonials__bg bg bg--right">
    <svg class="d-none d-md-block" xmlns="http://www.w3.org/2000/svg" width="262.361" height="524.722" viewBox="0 0 262.361 524.722">
      <path id="Path_3316" data-name="Path 3316" d="M964-235.317,1226.361,27.044l262.361-262.361" transform="translate(27.044 -964) rotate(90)" fill="#fff"/>
    </svg>
    <svg class="d-md-none" xmlns="http://www.w3.org/2000/svg" width="82.624" height="227.804" viewBox="0 0 82.624 227.804">
      <g id="Group_1594" data-name="Group 1594" transform="translate(-304.376 -29.204)">
        <path id="Path_3309" data-name="Path 3309" d="M0,0,82.624,82.624,165.248,0" transform="translate(387 91.76) rotate(90)" fill="#fff"/>
        <path id="Path_3316" data-name="Path 3316" d="M0,0,55.6,55.6,111.2,0" transform="translate(378.436 29.911) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
      </g>
    </svg>
  </div>
</section>
<?php } ?>