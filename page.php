<?php
/**
 * The template for displaying page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package foreto
 */

get_header();

?>
<main class="main mb-64 mb-md-160">
  <div class="main__container container container-inner-small">
    <div class="single-entry">
    <?php while ( have_posts() ) : the_post(); ?>
      <header class="single-entry__header d-flex flex-column flex-md-row justify-content-md-between mb-4 mb-md-5">
        <div class="single-entry__header-inner">
          <?php the_title('<h1 class="h2 single-entry__title mb-2">', '</h1>') ?>
        </div>
      </header>

      <?php if( has_post_thumbnail() ) : ?>
      <div class="single-entry__photo break-container rounded-right overflow-hidden mb-40 mb-md-64">
        <?php the_post_thumbnail(); ?>
      </div>
      <?php endif; ?>

      <div class="single-entry__content">
        <?php the_content() ?>
      </div>

    <?php endwhile; ?>
    </div>
  </div>
	<div class="main__bg bg bg--left">
    <svg class="d-none d-md-block" xmlns="http://www.w3.org/2000/svg" width="223.688" height="370.298" viewBox="0 0 223.688 370.298">
      <g transform="translate(62.545 -92.367)">
        <path d="M0,97.74,97.74,0l97.74,97.74" transform="translate(161.143 267.185) rotate(90)" fill="#f5f5f5"/>
        <path d="M0,174.11,174.11,0,348.22,174.11" transform="translate(112.272 93.074) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
      </g>
    </svg>
	</div>
	<div class="main__bg bg bg--right">
    <svg class="d-none d-md-block" xmlns="http://www.w3.org/2000/svg" width="238.708" height="621.637" viewBox="0 0 238.708 621.637">
      <g transform="translate(270 195.058) rotate(180)">
        <path d="M0,134.184,134.184,0,268.368,134.184" transform="translate(194.25 -73.311) rotate(90)" fill="#f5f5f5"/>
        <path d="M0,236.586,236.586,0,473.172,236.586" transform="translate(268.585 -425.872) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
      </g>
    </svg>
    <svg class="d-block d-md-none" xmlns="http://www.w3.org/2000/svg" width="67.745" height="157.188" viewBox="0 0 67.745 157.188">
      <g transform="translate(-109.709 -374.515)">
        <path d="M0,65,65,0l65,65" transform="translate(109.709 531.703) rotate(-90)" fill="#f5f5f5"/>
        <path d="M0,34.839,34.839,0,69.678,34.839" transform="translate(141.908 444.9) rotate(-90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
      </g>
    </svg>
	</div>

</main>
<?php
$seo_items = get_field('seo_items');
get_template_part( 'template-parts/footer-seo', null, array(
  'ids' => $seo_items
) );

get_footer();
