<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$product_id = get_the_ID();
$product_type = foreto_get_product_type($product_id);
$product_is_addon = ( $product_type ) ? $product_type : false;
$product_addons = get_field('product_addons', $product_id);
$product_colors = get_field('product_color', $product_id);
get_header( 'shop' ); ?>

<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		//do_action( 'woocommerce_sidebar' );

	if( ! $product_is_addon && (!empty($product_addons) || !empty($product_colors))) : 

	$data = [];

	//colors
	if( !empty($product_colors) ) {
		$colors = new stdClass;
		$colors->id = 0;
		$colors->name = __('Kolor', 'foreto');
		$colors->heading = __('Kolor', 'foreto');
		$colors->description = '';
		$colors->multiple = false;
		$colors->required = true;

		$color_items = [];
		$i = 0;
		foreach($product_colors as $color) {
			$item = new stdClass;
			$item->id = ++$i;
			$item->name = $color['name'];
			$item->bg = $color['color'];
			if($i === 1) $item->isDefault = true;
			$color_items[] = $item;
		}
		$colors->items = $color_items;
		$data[] = $colors;
	}
	
	$args = array(
		'taxonomy'     => "product_cat",
		'hide_empty'   => true,
		'child_of'     => 44, // Dodatki ID
	);

	$product_categories = get_terms($args);
	foreach($product_categories as $term) {

		$cat = new stdClass;
		$cat->id = $term->term_id;
		$cat->name = $term->name;
		$cat->heading = get_field('addons_heading', $term);
		$cat->description = $term->description;
		$cat->multiple = (bool) get_field('addons_multiple', $term);
		$cat->required = (bool) get_field('addons_required', $term);

		$add_default = (bool) get_field('addons_add_default', $term);

		$items = [];

		$args = array(
			'post_type' => 'product',
			'post_status'   => 'publish',
			'tax_query' => array(
				array(
						'taxonomy' => 'product_cat',
						'field'    => 'term_id',
						'terms'    => $term->term_id,
				),
			),
			'post__in' => $product_addons,
			'orderby' => 'post__in'
		);

		$addons = new WP_Query( $args );

		if ( $addons->have_posts() ) {
			while ( $addons->have_posts() ) { $addons->the_post();
				$addon_id = get_the_ID();
				$addon_type = get_field('addons_type', $addon_id);

				$item = new stdClass;
				$item->id = $addon_id;
				$item->name = get_the_title();
				$item->thumbnail = get_the_post_thumbnail_url($addon_id);
				$item->url = get_permalink($addon_id);
				$item->type = ( $addon_type ) ? $addon_type : 'standard';
				$item->isDefault = ( 'default' === $addon_type ) ? true : false;
				$item->value = get_field('addons_form_value', $addon_id);

				if( 'gallery' === $addon_type ) {
					$gallery = [];
					$gallery_ids = get_post_meta( $addon_id, '_product_image_gallery', true );
					$galArr = explode(',', $gallery_ids);

					foreach($galArr as $gid) {
						$gallery[] = wp_get_attachment_url($gid);
					}

					$item->gallery = $gallery;
				}

				$items[] = $item;
			}
			wp_reset_postdata();
		}

		if($add_default) {
			$def = new stdClass;
			$def->id = 0;
			$def->name = __('Domyślny', 'foreto');
			$def->thumbnail = '';
			$def->type = 'default';
			$def->isDefault = true;

			array_unshift($items, $def);
		}

		$cat->items = $items;

		if( !empty($items) ) $data[] = $cat;
	}
?>
<div id="product-addons" data-categories="<?= htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8') ?>"></div>
<?php
endif;

get_template_part( 'template-parts/footer-seo' );

get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
