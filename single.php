<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package foreto
 */

get_header();

$social = array(
  'social_items' => foreto_get_option('blog_social')
);

?>
<main class="main mb-64 mb-md-160">
  <div class="main__container container container-inner-small">
    <div class="single-entry">
    <?php while ( have_posts() ) : the_post(); ?>
      <header class="single-entry__header d-flex flex-column flex-md-row justify-content-md-between mb-4 mb-md-5">
        <div class="single-entry__header-inner">
          <?php the_title('<h1 class="h2 single-entry__title mb-2">', '</h1>') ?>
          <div class="single-entry__meta d-flex flex-wrap gx-3">
              <span class="single-entry__date"><?= get_post_time('d.m.Y') ?></span>
              <span class="single-entry__categories"><?php the_category(', ') ?></span>
              <span class="single-entry__readtime">
                <svg xmlns="http://www.w3.org/2000/svg" width="14.138" height="14.138" viewBox="0 0 14.138 14.138">
                  <g id="time" transform="translate(-2.25 -2.25)">
                    <path d="M9.319,16.388a7.069,7.069,0,1,1,7.069-7.069A7.069,7.069,0,0,1,9.319,16.388Zm0-13.128a6.059,6.059,0,1,0,6.059,6.059A6.059,6.059,0,0,0,9.319,3.26Z" transform="translate(0 0)" fill="#69737a"/>
                    <path d="M19.7,15.449l-2.823-2.823V7.875h1.01v4.332l2.525,2.53Z" transform="translate(-8.061 -3.1)" fill="#69737a"/>
                  </g>
                </svg>
                <?= foreto_readingtime( get_the_content() ) ?>
              </span>
              <span class="single-entry__meta-author">
                <svg xmlns="http://www.w3.org/2000/svg" width="10.917" height="14.426" viewBox="0 0 10.917 14.426">
                  <g id="Group_1299" data-name="Group 1299" transform="translate(-380.762 -988)">
                    <path d="M17.667,25.831H16.575V24.089a2.739,2.739,0,0,0-2.729-2.742H10.571a2.739,2.739,0,0,0-2.729,2.742v1.742H6.75V24.089a3.834,3.834,0,0,1,3.821-3.839h3.275a3.834,3.834,0,0,1,3.821,3.839Z" transform="translate(374.012 976.594)" fill="#69737a"/>
                    <path d="M13.964,3.347a2.742,2.742,0,1,1-2.742,2.742,2.742,2.742,0,0,1,2.742-2.742m0-1.1A3.839,3.839,0,1,0,17.8,6.089,3.839,3.839,0,0,0,13.964,2.25Z" transform="translate(372.256 985.75)" fill="#69737a"/>
                  </g>
                </svg>
                <?php the_author() ?>
              </span>
          </div>
        </div>
        <div class="single-entry__social"><?php get_template_part('template-parts/post-social', null, $social) ?></div>
      </header>

      <?php if( has_post_thumbnail() ) : ?>
      <div class="single-entry__photo break-container rounded-right overflow-hidden mb-40 mb-md-64">
        <?php the_post_thumbnail(); ?>
      </div>
      <?php endif; ?>

      <div class="single-entry__content">
        <?php the_content() ?>
      </div>

      <div class="next-step mt-80">
        <div class="card card--newsletter overflow-hidden rounded-0">
            <div class="card-body">
              <h4 class="card-title mb-5">
                <span><?= __('Jaki następny krok chcesz podjąć?', 'foreto'); ?></span><br>
                <?= __('Jesteśmy do Twojej dyspozycji.', 'foreto'); ?>
              </h4>
              <div class="next-step__action d-inline-flex flex-column flex-md-row align-items-md-center">
                <a class="next-step__link h5 m-0 d-flex align-items-center arrow-right-link color" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="21.334" height="16" viewBox="0 0 21.334 16">
                  <path id="video-camera-line" d="M23.333,8.893a1.407,1.407,0,0,0-.773-1.267,1.333,1.333,0,0,0-1.42.1L18,9.733v-2.4A1.333,1.333,0,0,0,16.667,6h-12A2.667,2.667,0,0,0,2,8.667V19.333A2.667,2.667,0,0,0,4.667,22h12A1.333,1.333,0,0,0,18,20.667v-2.4l3.093,2a1.38,1.38,0,0,0,1.467.133,1.407,1.407,0,0,0,.773-1.293ZM21.953,19.18a.176.176,0,0,1-.127-.04l-5.16-3.293v4.82h-12a1.333,1.333,0,0,1-1.333-1.333V8.667A1.333,1.333,0,0,1,4.667,7.333h12v4.82l5.2-3.333A.09.09,0,0,1,22,8.893V19.107a.073.073,0,0,1-.047.073Z" transform="translate(-2 -6)" fill="#f47920"/>
                </svg>
                  <?= __('Chcę konsultację online', 'foreto') ?>
                </a>
                <a class="next-step__link h5 m-0 d-inline-flex align-items-center" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="15.633" height="20.048" viewBox="0 0 15.633 20.048">
                    <g transform="translate(-380.762 -992.034)">
                      <path d="M22.383,28.242H20.819V25.747a3.922,3.922,0,0,0-3.908-3.927h-4.69a3.922,3.922,0,0,0-3.908,3.927v2.495H6.75V25.747a5.491,5.491,0,0,1,5.471-5.5h4.69a5.491,5.491,0,0,1,5.471,5.5Z" transform="translate(374.012 983.84)" fill="#f47920"/>
                      <path d="M15.592,3.812a3.905,3.905,0,1,1-3.905,3.905,3.905,3.905,0,0,1,3.905-3.905m0-1.562a5.467,5.467,0,1,0,5.467,5.467A5.467,5.467,0,0,0,15.592,2.25Z" transform="translate(372.985 989.784)" fill="#f47920"/>
                    </g>
                  </svg>
                  <?= __('Chcę spotkać się z doradcą', 'foreto') ?>
                </a>
                <a class="next-step__link h5 m-0 d-inline-flex align-items-center" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14.992" height="20.989" viewBox="0 0 14.992 20.989">
                    <g id="document" transform="translate(-6.75 -2.251)">
                      <path d="M21.517,7.723,16.27,2.476a.68.68,0,0,0-.524-.225h-7.5a1.5,1.5,0,0,0-1.5,1.5V21.741a1.5,1.5,0,0,0,1.5,1.5H20.243a1.5,1.5,0,0,0,1.5-1.5V8.247a.681.681,0,0,0-.225-.524ZM15.745,4.049l4.2,4.2h-4.2Zm4.5,17.691H8.249V3.75h6v4.5a1.5,1.5,0,0,0,1.5,1.5h4.5Z" fill="#f47920"/>
                      <path d="M11.25,24.75h9v1.5h-9Z" transform="translate(-1.502 -7.507)" fill="#f47920"/>
                      <path d="M11.25,18h9v1.5h-9Z" transform="translate(-1.502 -5.255)" fill="#f47920"/>
                    </g>
                  </svg>
                  <?= __('Chcę wycenę', 'foreto') ?>
                </a>
              </div>
            </div>
        </div>
        <div class="next-step__bg bg bg--left">
          <svg xmlns="http://www.w3.org/2000/svg" width="25.865" height="51.731" viewBox="0 0 25.865 51.731">
            <path d="M964-235.317l25.865,25.865,25.865-25.865" transform="translate(235.317 1015.731) rotate(-90)" fill="#e2e2e2"/>
          </svg>
        </div>
        <div class="next-step__bg bg bg--right">
          <svg xmlns="http://www.w3.org/2000/svg" width="74.227" height="147.039" viewBox="0 0 74.227 147.039">
            <path d="M964-235.317l73.166,73.166,61.734-61.734,11.432-11.432" transform="translate(-161.443 -963.646) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="1"/>
          </svg>
        </div>
      </div>

      <div class="single-entry__author author d-flex flex-column flex-md-row align-items-center mt-80">
        <div class="author__photo flex-shrink-0"><?= get_avatar( get_the_author_meta('user_email'), 160 ) ?></div>
        <div class="author__content">
          <p class="author__name h4 mb-4 text-center text-md-start"><?php the_author() ?></p>
          <p class="author__bio"><?= get_the_author_meta('user_description') ?></p>
        </div>
      </div>

      <?php
        $cat = get_the_category();
        $current_cat_id = $cat[0]->cat_ID;
        $pagelist = get_posts("category=".$current_cat_id."&sort_column=menu_order&sort_order=asc");
        
        $pages = array();
        foreach ($pagelist as $page) {
          $pages[] += $page->ID;
        }

        $current = array_search($post->ID, $pages);
        $prevID = ( !empty($pages[$current-1]) ) ? $pages[$current-1] : 0;
        $nextID = ( !empty($pages[$current+1]) ) ? $pages[$current+1] : 0;

        if( $prevID || $nextID ) :
      ?>
      <nav class="post-pagination mt-40 mt-md-80" role="navigation">
        <div class="post-pagination__links d-flex">
            <?php if (!empty($prevID)) : ?>
              <div class="post-pagination__prev d-flex flex-column">
                <span class="post-pagination__label mb-2"><?= __('Poprzedni artykuł', 'foreto') ?></span>
                <a class="post-pagination__link post-pagination__link--prev arrow-left-link" rel="prev" href="<?php echo get_permalink($prevID); ?>" title="<?php echo get_the_title($prevID); ?>"><?php echo get_the_title($prevID); ?></a>
              </div>
            <?php endif;
            if (!empty($nextID)) : ?>
            <div class="post-pagination__next d-flex flex-column ms-auto">
              <span class="post-pagination__label mb-2"><?= __('Kolejny artykuł', 'foreto') ?></span>
              <a class="post-pagination__link post-pagination__link--next arrow-right-link" rel="next" href="<?php echo get_permalink($nextID); ?>" title="<?php echo get_the_title($nextID); ?>"><?php echo get_the_title($nextID); ?></a>
            </div>
            <?php endif ?>
        </div>
      </nav>
      <?php endif ?>

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
get_template_part( 'template-parts/footer-seo' );

get_footer();
