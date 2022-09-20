<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Foreto
 */

get_header();

$blog = array(
	'grid_class' => 'col-12 col-md-6'
);
?>
<main class="main pt-80 pb-80">
  <div class="main__container container">
		<header class="search-header mb-40 mb-md-60">
			<h1 class="search-header__title h2">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Wyniki wyszukiwania: %s', 'foreto' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
		</header>
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
                <h3><?= __('Nic nie znaleziono', 'foreto') ?></h3>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <nav class="latest__pagination pagination mt-40 mt-md-80">
          <?php foreto_pagination(); ?>
        </nav>

      </div>
      <div class="col-12 col-md-3">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</main>

<?php
get_footer();
