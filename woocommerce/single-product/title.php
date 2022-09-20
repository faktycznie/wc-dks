<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce\Templates
 * @version    1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$prod_heading = get_field('product_heading', get_the_ID());
$prod_subtitle = get_field('product_subtitle', get_the_ID());

if( $prod_heading ) {
	echo '<h1 class="h2 product-header__title entry-title mb-3 mb-md-5">' . $prod_heading . '</h1>';
} else {
	the_title( '<h1 class="h2 product-header__title entry-title mb-3 mb-md-5">', '</h1>' );
}

if( $prod_subtitle ) {
	echo '<h5 class="product-header__subtitle mb-3">' . $prod_subtitle . '</h5>';
}

