<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package foreto
 */

get_header();

$realization_author = get_field('author', get_the_ID());

$case_studies = get_field('case_studies', get_the_ID());

$realization_review_logo = get_field('review_logo', get_the_ID());
$realization_review_desc = get_field('review', get_the_ID());
$realization_review_author = get_field('review_author', get_the_ID());
$realization_review_author_job = get_field('review_author_job', get_the_ID());

$content_parts = foreto_get_page_parts();

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
              <span class="single-entry__meta-author">
                <?= $realization_author ?>
              </span>
              <span class="single-entry__categories"><?= foreto_get_the_category_list() ?></span>
          </div>
        </div>
      </header>

      <?php if($case_studies) : ?>
      <div id="realizationProcess" class="process">
        <div class="process__items">
          <div class="process__row row gx-3 gy-5 gy-sm-4">
          <?php 
            $i = 0;
            foreach($case_studies as $item) : $i++;
              $data_attr = ( $i == 1 ) ? 'data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="caseStep' . $i . '"' : 'data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="caseStep' . $i . '"';
              get_template_part('template-parts/process', 'single', array(
                'title'       => $item['short_title'],
                'description' => $item['short_description'],
                'show_step' => 0,
                'number' => $i,
                'data_attr' => $data_attr,
                'link'      => '#caseStep' . $i,
                'card_class' => 'card--process-realization'
              ));
            endforeach; ?>
          </div>
        </div>
        <div class="process__case case-studies pt-80">
          <div class="case-studies__items">
            <?php 
              $j = 0;
              foreach($case_studies as $item) : $j++;
                $collpase_class = ( $j == 1 ) ? 'collapse show' : 'collapse';
              ?>
                <div id="caseStep<?= $j ?>" class="case-studies__item <?= $collpase_class ?>" data-bs-parent="#realizationProcess">
                  <header class="case-studies__header d-flex align-items-end mb-4 mb-md-5">
                    <div class="case-studies__number color">0<?= $j ?></div>
                    <h1 class="case-studies__h1 h2 mb-0"><?= $item['title'] ?></h1>
                  </header>
                  <article class="single-entry__content case-studies__content">
                    <?php 
                      if( !empty($content_parts[$j-1]) ) echo $content_parts[$j-1];
                    ?>
                  </article>
                </div>
              <?php endforeach; ?>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <?php if( $realization_review_desc ) : ?>
      <div class="mt-80">
        <h2 class="mb-4"><?= __('Opinia klienta', 'foreto') ?></h2>
        <div class="single-entry__author author d-flex flex-column flex-md-row align-items-center">
          <?php if( $realization_review_logo ) : ?>
          <div class="author__photo flex-shrink-0">
            <img src="<?= $realization_review_logo ?>" alt="" loading="lazy">
          </div>
          <?php endif; ?>
          
          <div class="author__content">
            <p class="author__bio"><?= $realization_review_desc ?></p>
            <p class="author__name h5"><?= $realization_review_author ?></p>
            <p class="author__job"><?= $realization_review_author_job ?></p>
          </div>
        </div>
      </div>
      <?php endif; ?>

    <?php endwhile; ?>
    </div>
  </div>
</main>
<?php
get_template_part( 'template-parts/footer-seo' );

get_footer();
