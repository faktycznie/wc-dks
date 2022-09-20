<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$product_type = foreto_get_product_type(get_the_ID());
$product_addon = ( $product_type ) ? $product_type : false;
$product_class = ( $product_addon ) ? 'product--addon' : '';

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

	<div id="product-<?php the_ID(); ?>" <?php wc_product_class( $product_class, $product ); ?>>

		<div class="product__header product-header">
			<div class="product-header__container container">
				<div class="product-header__inner">
					<div class="product-header__gallery">
						<?php
						/**
						 * Hook: woocommerce_before_single_product_summary.
						 *
						 * @hooked woocommerce_show_product_sale_flash - 10
						 * @hooked woocommerce_show_product_images - 20
						 */
						do_action( 'woocommerce_before_single_product_summary' );
						?>
					</div>

					<div class="product-header__summary d-flex flex-column">
						
						<?php
						/**
						 * Hook: woocommerce_single_product_summary.
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 * @hooked WC_Structured_Data::generate_product_data() - 60
						 */
						do_action( 'woocommerce_single_product_summary' );
						?>

						<div class="product-header__content">
							<?php the_content(); ?>
						</div>

						<?php if( ! $product_addon ) : ?>
						<div class="product-header__button pt-5">
								<a class="btn btn-primary d-block d-sm-inline-block" href="#"><?= __('Spersonalizuj swój produkt', 'foreto'); ?></a>
						</div>
						<?php endif; ?>

					</div>
				</div>
			</div>

			<div class="product-header__bg bg bg--right">
				<svg class="d-none d-md-block" xmlns="http://www.w3.org/2000/svg" width="205.817" height="458.038" viewBox="0 0 205.817 458.038">
					<g transform="translate(-3927.93 -1494.669)">
						<path d="M964-235.317l174.11,174.11,174.11-174.11" transform="translate(3866.724 640.487) rotate(90)" fill="#f5f5f5"/>
						<path d="M964-235.317l174.11,174.11,174.11-174.11" transform="translate(3897.723 531.376) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
					</g>
				</svg>
				<svg class="d-md-none" xmlns="http://www.w3.org/2000/svg" width="55.403" height="135.844" viewBox="0 0 55.403 135.844">
					<g transform="translate(-227.2 -227.467)">
						<path d="M0,0,54.7,54.7,109.392,0" transform="translate(281.896 253.919) rotate(90)" fill="#f5f5f5"/>
						<path d="M0,0,40.22,40.22,80.441,0" transform="translate(281.896 228.174) rotate(90)" fill="none" stroke="#e2e2e2" stroke-width="2"/>
					</g>
				</svg>
			</div>

		</div>

		<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
		?>

	</div>


<?php do_action( 'woocommerce_after_single_product' ); ?>
