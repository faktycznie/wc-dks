<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $wp_query;

$cat = $wp_query->get_queried_object();
$cat_id = ( !empty($cat->term_id) ) ? $cat->term_id: false;
$addons_cat = get_field('addons_category', $cat);

if( $addons_cat || ! $cat_id ) {
	$url = get_home_url();
	wp_redirect( $url );
	exit;
}

$cat_parent = ( !empty($cat->parent) ) ? $cat->parent : false;
$cat_parent_class = ( empty($cat_parent) ) ? 'category-header--parent' : 'category-header--child';

$cat_thumb_id = get_term_meta($cat_id, 'thumbnail_id', true);
$cat_image = wp_get_attachment_image_src( $cat_thumb_id, 'slider' );
if($cat_image) $cat_image = $cat_image[0];

$cat_gallery = get_field('category_gallery', $cat);
$cat_gallery_class = ( !empty($cat_gallery) ) ? 'category-header__inner--gallery' : '';

$cat_heading = ( get_field('category_heading', $cat) ) ? get_field('category_heading', $cat) : woocommerce_page_title(false);
$cat_link = get_field('category_link', $cat);
$cat_subtitle = get_field('category_subtitle', $cat);

$products_heading = get_field('products_heading', $cat);

$cat_addons = get_field('category_selected_addons', $cat);

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

<div class="category-header mb-80 mb-md-160 <?= $cat_parent_class ?>">
	<div class="category-header__bg-inner">
		<div class="category-header__container container">
			<div class="category-header__inner d-flex flex-column flex-md-row justify-content-between <?= $cat_gallery_class ?>">

				<header class="category-header__description order-2 order-md-1">
					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
						<h1 class="h2 category-header__title mb-4"><?= $cat_heading ?></h1>
					<?php endif; ?>

					<?php
					/**
					 * Hook: woocommerce_archive_description.
					 *
					 * @hooked woocommerce_taxonomy_archive_description - 10
					 * @hooked woocommerce_product_archive_description - 10
					 */
					do_action( 'woocommerce_archive_description' );
					?>
					<?php if($cat_link) : ?>
					<div class="category-header__button pt-5">
						<a class="btn btn-primary d-block d-sm-inline-block" href="<?= $cat_link ?>"><?= __('Sprawdź ofertę', 'foreto'); ?></a>
					</div>
					<?php endif; ?>
				</header>

				<?php if( foreto_is_parent_category() ) : ?>
				<div class="category-header__arrow bg pe-5 d-none d-md-block order-2">
					<svg xmlns="http://www.w3.org/2000/svg" width="224.621" height="446.414" viewBox="0 0 224.621 446.414">
						<path id="Path_3383" data-name="Path 3383" d="M964-235.317l222.5,222.5,222.5-222.5" transform="translate(-11.402 -963.293) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
					</svg>
				</div>
				<?php endif; ?>

				<?php if($cat_image || $cat_gallery) : ?>
				<div class="category-header__photo order-1 order-md-3 <?= $cat_gallery_class ?>">
						<?php if( $cat_gallery ) : ?>
							<div class="category-header__slider mb-4 mb-lg-0">
								<div class="category-header__swiper swiper">
									<div class="category-header__swiper-wrapper swiper-wrapper">
										<?php foreach( $cat_gallery as $item) :
											$item['thumbnail'] = $item['sizes']['realizations'];
											?>
											<div class="category-header__slide swiper-slide">
												<img src="<?= $item['thumbnail'] ?>" class="rounded-right" alt="" loading="lazy">
											</div>
										<?php endforeach; ?>
									</div>
									<div class="category-header__arrows category-header__arrows--prev swiper-button-prev"></div>
									<div class="category-header__arrows category-header__arrows--next swiper-button-next"></div>
								</div>
								<div class="category-header__pagination swiper-pagination swiper-pagination--orange mt-5"></div>
							</div>
						<?php else : ?>
							<img class="rounded-slider" src="<?= $cat_image ?>" alt="<?php woocommerce_page_title(); ?>" loading="lazy">
						<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="category-header__bg bg bg--left">
		<?php if( foreto_is_parent_category() ) : ?>
		<svg xmlns="http://www.w3.org/2000/svg" width="100.398" height="227.26" viewBox="0 0 100.398 227.26">
			<g id="Group_1605" data-name="Group 1605" transform="translate(-3988.239 -1871.133)">
				<path id="Path_3324" data-name="Path 3324" d="M964-235.317l49.8,49.8,49.8-49.8" transform="translate(3852.613 1034.799) rotate(90)" fill="#f47920"/>
				<path id="Path_3382" data-name="Path 3382" d="M964-235.317l98.277,98.277,98.276-98.277" transform="translate(3852.613 907.84) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
			</g>
		</svg>
		<?php else : ?>
			<svg xmlns="http://www.w3.org/2000/svg" width="176.232" height="416.69" viewBox="0 0 176.232 416.69">
				<g id="Group_1605" data-name="Group 1605" transform="translate(18.707 -435.961)">
					<path id="Path_3324" data-name="Path 3324" d="M0,116.436,116.436,0,232.872,116.436" transform="translate(114.11 619.779) rotate(90)" fill="#f5f5f5"/>
					<path id="Path_3325" data-name="Path 3325" d="M0,174.11,174.11,0,348.22,174.11" transform="translate(156.11 436.668) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
				</g>
			</svg>
		<?php endif; ?>
	</div>
	<?php if( foreto_is_parent_category() ) : ?>
	<div class="category-header__bg bg bg--right">
		<svg xmlns="http://www.w3.org/2000/svg" width="176.231" height="349.634" viewBox="0 0 176.231 349.634">
			<path id="Path_3325" data-name="Path 3325" d="M964-235.317l174.11,174.11,174.11-174.11" transform="translate(236.024 1312.927) rotate(-90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
		</svg>
	</div>
	<?php endif; ?>
</div>

<?php

$args = array(
		'parent' => $cat_id
);

$terms = get_terms( 'product_cat', $args );

if( is_product_category() && $terms ) {

			$terms_items = array();

			foreach ( $terms as $term ) {

				$term_item = array();
				$term_thumb_id = get_term_meta($term->term_id, 'thumbnail_id', true);

				if( !empty(wp_get_attachment_image_src( $term_thumb_id, 'news' )) ) {
					$term_item['photo'] = array('sizes' => array('news' => wp_get_attachment_image_src( $term_thumb_id, 'news' )[0]));
				}
				$term_item['link'] = get_term_link( $term );
				$term_heading = get_field('category_heading', $term);
				$term_item['title'] = ( !empty($term_heading) ) ? $term_heading : $term->name;
				$term_short_desc = get_field('category_short_description', $term);
				$term_item['description'] = ( !empty($term_short_desc) ) ? $term_short_desc : $term->description;

				$terms_items[] = $term_item;
			}

			echo '<div id="categories">';
				get_template_part( 'template-parts/news', null, array(
					'news_heading' => $cat_subtitle,
					'news' => $terms_items
				) );
			echo '</div>';

			if( foreto_is_parent_category() ) {
				$process_heading = foreto_get_option('process_heading');
				$process_items = foreto_get_option('process_items');
				$process_class = '';
			} else {
				$process_heading = get_field('process_heading', $cat);
				$process_items = get_field('process_items', $cat);
				$process_class = 'col-12 col-md-4';
			}

			get_template_part( 'template-parts/process', null, array(
				'process_heading' => $process_heading,
				'process_items' => $process_items,
				'grid_class' => $process_class
			) );

			$realizations_heading = get_field('realizations_heading', $cat);
			$realizations_description = get_field('realizations_description', $cat);
			$realizations_link = get_field('realizations_link', $cat);
			$realizations_gallery = get_field('realizations_gallery', $cat);

			get_template_part( 'template-parts/realizations', null, array(
				'realizations_heading'      => $realizations_heading,
				'realizations_description' => $realizations_description,
				'realizations_link'         => $realizations_link,
				'realizations_gallery'      => $realizations_gallery
			) );

} elseif ( woocommerce_product_loop() ) {

?>
<div id="products" class="products-list pb-80 pb-md-160">
	<div class="products-list__container container-left">

		<?php if($products_heading) : ?>
		<header class="products-list__title pb-40 pb-md-80">
			<h2 class="products-list__h2 h2 text-md-center m-0">
				<?= $products_heading ?>
			</h2>
		</header>
		<?php endif; ?>

<?php

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );

		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
?>
	</div>
</div>

<?php if( !empty($cat_addons) ) : //! DOKONCZYC ?>
<div class="cat-addons">
	<div class="cat-addons__container container">
		<?php get_template_part( 'template-parts/cat-addons' ); ?>
	</div>
</div>
<?php endif ?>

<?php

$realizations_heading = get_field('realizations_heading', $cat);
$realizations_description = get_field('realizations_description', $cat);
$realizations_link = get_field('realizations_link', $cat);
$realizations_gallery = get_field('realizations_gallery', $cat);

get_template_part( 'template-parts/realizations', null, array(
	'realizations_heading'      => $realizations_heading,
	'realizations_description' => $realizations_description,
	'realizations_link'         => $realizations_link,
	'realizations_gallery'      => $realizations_gallery
) );

$testimonial_items = get_field('testimonial_items');
get_template_part( 'template-parts/testimonials', null, array(
  'ids' => $testimonial_items
) );

} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	?>
	<div class="container">
		<?php do_action( 'woocommerce_no_products_found' ); ?>
	</div>
	<?php
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );

get_template_part( 'template-parts/contact' );

$seo_items = get_field('seo_items');
get_template_part( 'template-parts/footer-seo', null, array(
  'ids' => $seo_items
) );

get_footer( 'shop' );

