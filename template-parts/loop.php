<?php
  $blog = array(
    'grid_class' => 'col-12 col-md-6'
  );

  $main_cats = get_terms( array(
    'taxonomy' => 'main_cat',
    'hide_empty' => false,
  ) );

?>
<main class="main pt-80">
  <div class="main__container container">
    <div class="main-categories">
      <div class="main-categories__row row mb-80">
        <?php foreach( $main_cats as $cat ) : ?>
        <div class="main-categories__item col-12 col-md-3">
          <?php get_template_part( 'template-parts/about', 'single', array(
            'title'       => $cat->name,
            'description' => $cat->description,
            'link'        => get_term_link($cat->term_id)
          ) ); ?>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="row gx-5">
      <div class="col-12 col-md-9">
        <div class="latest">
          <div class="latest__items">
            <div class="row gx-3 gy-3">
              <?php if( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                  <?php get_template_part( 'template-parts/latest-blog', 'single', $blog ); ?>
                <?php endwhile; // end of the loop. ?>
              <?php else : ?>
                <h3><?= __('Brak wpisów.', 'foreto') ?></h3>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <nav class="latest__pagination pagination mt-40 mt-md-80">
          <?php foreto_pagination(); ?>
        </nav>

        <?php get_template_part( 'template-parts/newsletter' ); ?>

      </div>
      <div class="col-12 col-md-3">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</main>