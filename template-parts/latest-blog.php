<?php

$latest_heading = foreto_get_option('latest_heading');

$latest = new WP_Query( array(
  'posts_per_page' => 3,
)); 

if ( $latest->have_posts() ) { ?>
  <section class="latest pt-80 pt-md-160 pb-80 pb-md-160">
    <div class="latest__container container">

      <header class="latest__title pb-40 pb-md-80">
        <h2 class="latest__h2 h2 text-md-center m-0 px-md-5">
          <?= $latest_heading ?>
        </h2>
      </header>

      <div class="latest__items mx-auto">
        <div class="row gx-3 gy-3">
          <?php while ( $latest->have_posts() ) : $latest->the_post(); ?>
          <?php get_template_part( 'template-parts/latest-blog', 'single' ); ?>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
      <div class="latest__button text-center pt-5">
        <a class="btn btn-primary d-block d-sm-inline-block" href="<?= get_post_type_archive_link( 'post' ) ?>"><?= __('Zobacz więcej', 'foreto'); ?></a>
      </div>
    </div>
  </section>
<?php } ?>