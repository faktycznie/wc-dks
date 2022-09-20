<?php

get_header();
?>

<main class="main pt-80">
  <div class="main__container container">
    <div class="row gx-5">
      <div class="col-12">
        <div class="latest">
          <div class="latest__items">
            <div class="row gx-3 gy-3">
              <?php if( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-12">
                  <div class="latest__item card card--blog border-0 rounded-0">
                    <div class="card-body px-0 py-3 p-md-4 d-flex flex-column">
                      <h4 class="h4 card-title"><?php the_title(); ?></h4>
                      <div class="card-excerpt"><?php the_content(); ?></div>
                    </div>
                  </div>
                </div>
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

      </div>
    </div>
  </div>
</main>

<?php
get_template_part( 'template-parts/contact' );
get_template_part( 'template-parts/footer-seo' );

get_footer();