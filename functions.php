<?php

//require_once('acf.php');
//add_action('acf/init', 'foreto_acf_init');
// function foreto_acf_init() {
// 	acf_update_setting('google_api_key', 'xxx');
// }

if ( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}

add_action( 'after_setup_theme', 'foreto_wp_redirect' );
function foreto_wp_redirect() {
	global $wp;
	if('/wp' == $_SERVER['REQUEST_URI'] || '/wp/' == $_SERVER['REQUEST_URI']) {
		wp_redirect(home_url($wp->request));
		exit;
	}
}

add_action( 'wp_enqueue_scripts', 'foreto_scripts' );
function foreto_scripts() {
		wp_enqueue_style('app_css', get_template_directory_uri() . "/dist/style.bundle.css", 1);
		wp_enqueue_script('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js', [], '5.2.0', 1);
		wp_enqueue_script(
				'app_js',
				get_template_directory_uri() . '/dist/main.bundle.js',
				[],
				wp_get_theme()->get(1),
				true
		);
		wp_localize_script( 'app_js', 'foreto', array( 
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'rest_url' => get_rest_url(),
			//product addons
			'product_addons_heading' => foreto_get_option('product_addons_heading'),
			'product_addons_prev' => __('Wstecz', 'foreto'),
			'product_addons_next' => __('Przejdź dalej', 'foreto'),
			'product_addons_btn' => __('Prześlij zapytanie o produkt', 'foreto'),
			'product_addons_btn_url' => '#',
			'product_addons_more' => __('Więcej informacji', 'foreto'),
			//product contact
			'product_contact_name' => get_field('product_heading', get_the_ID()),
			'product_contact_heading' => foreto_get_option('product_contact_heading'),
			'product_contact_description' => foreto_get_option('product_contact_description'),
			'product_contact_choice' => __('Twój wybór produktu:', 'foreto'),
			'product_contact_quantity' => __('Nakład', 'foreto'),
			'product_contact_quantity_value' => [100, 200, 300, 400],
			'product_contact_format' => __('Format', 'foreto'),
			'product_contact_format_value' => [100, 200, 300, 400],
			'product_contact_email' => __('Firmowy adres mailowy', 'foreto'),
			'product_contact_phone' => __('Numer telefonu', 'foreto'),
			'product_contact_send' => __('Wyślij zapytanie', 'foreto'),
			'product_contact_email_invalid' => __('Błędne pole email', 'foreto'),
			'product_contact_phone_invalid' => __('Błędne pole telefon', 'foreto'),
			'product_contact_addon_required' => __('Wybierz wymagany dodatek: ', 'foreto'),
			//product modal
			'product_modal_heading' => __('Produkt został dodany do zapytania ofertowego', 'foreto'),
			'product_modal_continue' => __('Kontynuuj personalizację', 'foreto'),
			'product_modal_query' => __('Przejdź do zapytania', 'foreto'),
		) );
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

add_action( 'after_setup_theme', 'foreto_content_width', 0 );
function foreto_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'foreto_content_width', 640 );
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

add_action( 'after_setup_theme', 'foreto_setup' );
function foreto_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Foreto, use a find and replace
		* to change 'foreto' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'foreto', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1'       => esc_html__( 'Primary menu', 'foreto' ),
			'offcanvas'    => esc_html__( 'Offcanvas', 'foreto' ),
			'footer'       => esc_html__( 'Footer', 'foreto' ),
			'footer-about' => esc_html__( 'About', 'foreto' ),
			'copyrights'   => esc_html__( 'Copyrights', 'foreto' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_image_size( 'collections', 520, 616 );
	add_image_size( 'latest-blog', 520, 400 );
	add_image_size( 'news', 768, 390 );
	add_image_size( 'news_big', 0, 400 );
	add_image_size( 'realizations', 654, 480 );
	add_image_size( 'dropdown', 300, 240, 1 );
	add_image_size( 'slider', 920, 660 );
	add_image_size( 'lookbook', 0, 692 );
	add_image_size( 'realizations-list', 386, 280 );
	//page collections
	add_image_size( 'collections_big', 0, 760 );
	add_image_size( 'collections_small', 0, 364 );
	
	add_theme_support( 'woocommerce' );

	remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
	remove_action( 'woocommerce_after_shop_loop' , 'woocommerce_result_count', 20 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	//needed for swatches
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
}

//Woocommerce

add_filter( 'wc_product_sku_enabled', '__return_false' );
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

function woocommerce_template_loop_product_title() {
	echo '<h4 class="text-uppercase m-0 mt-3 ' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h4>';
}

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'custom_loop_product_thumbnail', 10 );
function custom_loop_product_thumbnail() {
    global $product;
    $size = 'collections';

    $image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );

    echo $product ? '<div class="woocommerce-loop-product__image">' . $product->get_image( $image_size ) . '</div>' : '';
}

//Custom Taxonomy

function foreto_taxonomies() {

	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
			'name'                       => _x( 'Kategorie główne', 'taxonomy general name', 'textdomain' ),
			'singular_name'              => _x( 'Kategoria główna', 'taxonomy singular name', 'textdomain' ),
			'search_items'               => __( 'Szukaj kategorii', 'textdomain' ),
			'popular_items'              => __( 'Popularne kategorie', 'textdomain' ),
			'all_items'                  => __( 'Wszystkie kategorie', 'textdomain' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edytuj kategorie', 'textdomain' ),
			'update_item'                => __( 'Zaktualizuj kategorie', 'textdomain' ),
			'add_new_item'               => __( 'Dodaj nową kategorie', 'textdomain' ),
			'new_item_name'              => __( 'Nowa nazwa kategorii', 'textdomain' ),
			'separate_items_with_commas' => __( 'Oddziel kategorie przecinkiem', 'textdomain' ),
			'add_or_remove_items'        => __( 'Dodaj lub usuń kategorie', 'textdomain' ),
			'choose_from_most_used'      => __( 'Wybierz główną kategorie', 'textdomain' ),
			'not_found'                  => __( 'Brak.', 'textdomain' ),
			'menu_name'                  => __( 'Główne kategorie', 'textdomain' ),
	);

	$args = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'mcategory' ),
			'show_in_rest'      => true,
	);

	register_taxonomy( 'main_cat', 'post', $args );

	$labels = array(
		'name'                       => _x( 'Branża', 'taxonomy general name', 'textdomain' ),
		'singular_name'              => _x( 'Branża', 'taxonomy singular name', 'textdomain' ),
		'search_items'               => __( 'Szukaj branzy', 'textdomain' ),
		'popular_items'              => __( 'Popularne branze', 'textdomain' ),
		'all_items'                  => __( 'Wszystkie branze', 'textdomain' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edytuj branze', 'textdomain' ),
		'update_item'                => __( 'Zaktualizuj branze', 'textdomain' ),
		'add_new_item'               => __( 'Dodaj nową branze', 'textdomain' ),
		'new_item_name'              => __( 'Nowa nazwa branzy', 'textdomain' ),
		'separate_items_with_commas' => __( 'Oddziel branze przecinkiem', 'textdomain' ),
		'add_or_remove_items'        => __( 'Dodaj lub usuń branze', 'textdomain' ),
		'choose_from_most_used'      => __( 'Wybierz najpopularniejszą branze', 'textdomain' ),
		'not_found'                  => __( 'Brak.', 'textdomain' ),
		'menu_name'                  => __( 'Branże', 'textdomain' ),
	);

	$args = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'industry' ),
			'show_in_rest'      => true,
	);

	register_taxonomy( 'industry', 'post', $args );

	// Realizations
	register_post_type('realization',
		array(
				'labels'      => array(
						'name'          => __( 'Realizacje', 'textdomain' ),
						'singular_name' => __( 'Realizacje', 'textdomain' ),
				),
				'public'      => true,
				'show_in_rest' => true, //gutenberg
				'has_archive' => 'realizations',
				'supports'    => array('title', 'editor', 'thumbnail', 'excerpt'),
				//'rewrite'     => array( 'slug' => 'realizations' ),
				"rewrite" => array( "slug" => "realizations/%realization_cat%", "with_front" => true ),
		)
	);

	$labels = array(
		'name'                       => _x( 'Kategorie (realizacje)', 'taxonomy general name', 'textdomain' ),
		'singular_name'              => _x( 'Kategoria', 'taxonomy singular name', 'textdomain' ),
		'search_items'               => __( 'Szukaj kategorii', 'textdomain' ),
		'popular_items'              => __( 'Popularne kategorie', 'textdomain' ),
		'all_items'                  => __( 'Wszystkie kategorie', 'textdomain' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edytuj kategorie', 'textdomain' ),
		'update_item'                => __( 'Zaktualizuj kategorie', 'textdomain' ),
		'add_new_item'               => __( 'Dodaj nową kategorie', 'textdomain' ),
		'new_item_name'              => __( 'Nowa nazwa kategorii', 'textdomain' ),
		'separate_items_with_commas' => __( 'Oddziel kategorie przecinkiem', 'textdomain' ),
		'add_or_remove_items'        => __( 'Dodaj lub usuń kategorie', 'textdomain' ),
		'choose_from_most_used'      => __( 'Wybierz główną kategorie', 'textdomain' ),
		'not_found'                  => __( 'Brak.', 'textdomain' ),
		'menu_name'                  => __( 'Kategorie', 'textdomain' ),
	);

	$args = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'realizations' ),
			'show_in_rest'      => true,
	);

	register_taxonomy( 'realization_cat', 'realization', $args );

	$labels = array(
		'name'                       => _x( 'Branża', 'taxonomy general name', 'textdomain' ),
		'singular_name'              => _x( 'Branża', 'taxonomy singular name', 'textdomain' ),
		'search_items'               => __( 'Szukaj branzy', 'textdomain' ),
		'popular_items'              => __( 'Popularne branze', 'textdomain' ),
		'all_items'                  => __( 'Wszystkie branze', 'textdomain' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edytuj branze', 'textdomain' ),
		'update_item'                => __( 'Zaktualizuj branze', 'textdomain' ),
		'add_new_item'               => __( 'Dodaj nową branze', 'textdomain' ),
		'new_item_name'              => __( 'Nowa nazwa branzy', 'textdomain' ),
		'separate_items_with_commas' => __( 'Oddziel branze przecinkiem', 'textdomain' ),
		'add_or_remove_items'        => __( 'Dodaj lub usuń branze', 'textdomain' ),
		'choose_from_most_used'      => __( 'Wybierz najpopularniejszą branze', 'textdomain' ),
		'not_found'                  => __( 'Brak.', 'textdomain' ),
		'menu_name'                  => __( 'Branże', 'textdomain' ),
	);

	$args = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'realizations-industry' ),
		'show_in_rest'      => true,
	);

	register_taxonomy( 'realization_industry', 'realization', $args );

	// FAQ
	register_post_type('faq',
		array(
				'labels'      => array(
						'name'          => __( 'FAQ', 'textdomain' ),
						'singular_name' => __( 'FAQ', 'textdomain' ),
				),
				'public'      => true,
				'supports'    => array('title', 'editor'),
				'rewrite'     => array( 'slug' => 'faq' ),
		)
	);

	$labels = array(
		'name'                       => _x( 'Kategorie (faq)', 'taxonomy general name', 'textdomain' ),
		'singular_name'              => _x( 'Kategoria', 'taxonomy singular name', 'textdomain' ),
		'search_items'               => __( 'Szukaj kategorii', 'textdomain' ),
		'popular_items'              => __( 'Popularne kategorie', 'textdomain' ),
		'all_items'                  => __( 'Wszystkie kategorie', 'textdomain' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edytuj kategorie', 'textdomain' ),
		'update_item'                => __( 'Zaktualizuj kategorie', 'textdomain' ),
		'add_new_item'               => __( 'Dodaj nową kategorie', 'textdomain' ),
		'new_item_name'              => __( 'Nowa nazwa kategorii', 'textdomain' ),
		'separate_items_with_commas' => __( 'Oddziel kategorie przecinkiem', 'textdomain' ),
		'add_or_remove_items'        => __( 'Dodaj lub usuń kategorie', 'textdomain' ),
		'choose_from_most_used'      => __( 'Wybierz główną kategorie', 'textdomain' ),
		'not_found'                  => __( 'Brak.', 'textdomain' ),
		'menu_name'                  => __( 'Kategorie', 'textdomain' ),
	);

	$args = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'faq' ),
			'show_in_rest'      => true,
	);

	register_taxonomy( 'faq_cat', 'faq', $args );

	// Testimonials
	register_post_type('testimonial',
		array(
				'labels'      => array(
						'name'          => __( 'Opinie', 'textdomain' ),
						'singular_name' => __( 'Opinia', 'textdomain' ),
				),
				'public'      => true,
				'has_archive' => true,
				'supports'    => array('title', 'editor', 'thumbnail'),
				'rewrite'     => array( 'slug' => 'testimonial' ),
		)
	);

		// SEO
		register_post_type('seo',
		array(
				'labels'      => array(
						'name'          => __( 'SEO', 'textdomain' ),
						'singular_name' => __( 'SEO', 'textdomain' ),
				),
				'public'      => true,
				'supports'    => array('title', 'editor'),
				'rewrite'     => array( 'slug' => 'seo' ),
		)
	);

}

add_filter('post_type_link', 'foreto_update_permalink_structure', 10, 2);
function foreto_update_permalink_structure( $post_link, $post ) {
    if ( false !== strpos( $post_link, '%realization_cat%' ) ) {
        $taxonomy_terms = get_the_terms( $post->ID, 'realization_cat' );
        foreach ( $taxonomy_terms as $term ) { 
            if ( ! $term->parent ) {
                $post_link = str_replace( '%realization_cat%', $term->slug, $post_link );
            }
        } 
    }
    return $post_link;
}

function foreto_register_query_vars( $vars ) {
	$vars[] = 'r_cat';
	$vars[] = 'r_industry';
	return $vars;
}
add_filter( 'query_vars', 'foreto_register_query_vars' );


// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'foreto_taxonomies', 0 );

//Widgets
add_action( 'widgets_init', 'foreto_sidebars' );
function foreto_sidebars() {
    register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __( 'Blog Sidebar', 'foreto' ),
            'description'   => __( 'Sidebar area visible on the blog page', 'foreto' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}

//shortcodes
add_shortcode( 'foreto_terms', 'foreto_terms_custom_taxonomy' );
function foreto_terms_custom_taxonomy( $atts ) {

	extract( shortcode_atts( array(
			'taxonomy'   => '',
			'show_count' => 1,
	), $atts ) );

	// arguments for function wp_list_categories
	$args = array( 
		'taxonomy' => $taxonomy,
		'show_count' => (int) $show_count,
		'hide_empty' => 0,
		'title_li' => ''
	);

	echo '<ul class="wp-block-categories-list wp-block-categories">';
	echo wp_list_categories($args);
	echo '</ul>';
}


//Other functions

function foreto_pagination( $query = false ) {
	global $wp_query;
	if( $query ) {
		$wp_query = $query;
	}

	$total_pages = $wp_query->max_num_pages;

	if ($total_pages > 1){
			$current_page = max(1, get_query_var('paged'));

			echo paginate_links(array(
					'base' => @add_query_arg('paged','%#%'),
					'format' => 'page/%#%',
					'current' => $current_page,
					'total' => $total_pages,
					'type'  => 'list',
					'prev_text' => '',
					'next_text' => '',
					'prev_next' => false
			));
	}
}

// Returns hierarchical list of menu items
function foreto_get_menu_array($theme_location) {
	$items = [];
	$theme_locations = get_nav_menu_locations();
	if( !empty($theme_locations[$theme_location]) ) {
		$menu_obj = get_term( $theme_locations[$theme_location], 'nav_menu' );
		if( !empty($menu_obj) ) {
			$menu_name = $menu_obj->name;
			$array_menu = wp_get_nav_menu_items($menu_name);
			if( !empty($array_menu) ) {
				$items = foreto_sort_menu_items($array_menu);
			}
		}
	}
	return $items;
}

// Takes a flat list of wordpress menu items and returns the top level items
// with children sorted into the 'children' element.
function foreto_sort_menu_items($items) {
	return foreto_get_children($items, 0, 0);
}

// This is the inner recursive function - do not use directly
function foreto_get_children($items, $parentId, $depth) {
	$children = array();
	if( !empty($items) ) {
		foreach($items as $id => $child)
		{
				if($child->menu_item_parent == $parentId)
				{
						$child->depth = $depth;
						$child->children = foreto_get_children($items, $child->ID, $depth + 1);
						$children[] = $child;
				}
		}
	}
	return $children;
}

function foreto_terms_hierarchicaly(Array $cats, $parentId = 0) {
	$arr = [];
	foreach ($cats as $i => $cat) {
			if ($cat->parent == $parentId) {
					$cat->children = foreto_terms_hierarchicaly($cats, $cat->term_id);
					$arr[$cat->term_id] = $cat;
			}
	}
	return $arr;
}

require_once('sample_data.php');

function foreto_get_option( $field_name, $default_value = '' ) {
	global $sample_data;
	$value = get_field($field_name, 'option');

	if( $value === null && !empty($default_value) ) {
		$value = $default_value;
	} elseif( $value === null && !empty($sample_data[$field_name]) ) {
		$value = $sample_data[$field_name];
	}
	return $value;
}

function foreto_is_parent_category() {
	global $wp_query;
	$cat = $wp_query->get_queried_object();
	return ( is_product_category() && empty($cat->parent) ) ? true : false;
}

function foreto_minutes( $count ) {
	if ($count=== 1) {
		return sprintf(__('%s minuta', 'foreto'), $count);
	} elseif((($count > 1) && ($count < 5)) || (($count > 20) && (($count % 10 > 1) && ($count % 10 < 5)))) {
		return sprintf(__('%s minuty', 'foreto'), $count);
	} else return sprintf(__('%s minut', 'foreto'), $count);
}

function foreto_readingtime( $content = '', $words_per_minute = 300, $with_gutenberg = true ) {
	// In case if content is build with gutenberg parse blocks
	if ( $with_gutenberg ) {
			$blocks = parse_blocks( $content );
			$contentHtml = '';

			foreach ( $blocks as $block ) {
					$contentHtml .= render_block( $block );
			}

			$content = $contentHtml;
	}

	// Remove HTML tags from string
	$content = wp_strip_all_tags( $content );

	// When content is empty return 0
	if ( !$content ) {
			return foreto_minutes(0);
	}

	// Count words containing string
	$words_count = str_word_count( $content );

	// Calculate time for read all words and round
	$minutes = ceil( $words_count / $words_per_minute );

	return foreto_minutes($minutes);
}

function foreto_get_the_category_list() {
	$post_type = get_post_type();
	if( 'realization' == $post_type ) {
		$html = get_the_term_list( get_the_ID(), 'realization_cat', '', ', ' );
		$html .= ', ';
		$html .= get_the_term_list( get_the_ID(), 'realization_industry', '', ', ' );
		return $html;
	} else {
		return get_the_category_list();
	}
}

function foreto_get_product_type( $product_id ) {
	$product_cats = get_the_terms( $product_id, 'product_cat' );
	$type = false;
	foreach($product_cats as $cat) {
		$addons_cat = get_field('addons_category', $cat);
		if($addons_cat) {
			$type = 'addon';
			break;
		}
	}
	return $type;
}

function foreto_get_page_parts( $content = '' ) {
	if ( empty($content) ) {
		global $post;
		$content = $post->post_content;
	}
	if ( empty($content) ) {
		return false;
	}
	$content = str_replace("\n<!-- wp:nextpage -->\n", '<!-- wp:nextpage -->', $content);
	$content = str_replace("\n<!-- wp:nextpage -->", '<!-- wp:nextpage -->', $content);
	$content = str_replace("<!-- wp:nextpage -->\n", '<!-- wp:nextpage -->', $content);
	$pages = explode('<!-- wp:nextpage -->', $content);

	return $pages;
}


add_action( 'wp_ajax_nopriv_get_realization_data', 'foreto_realizations_ajax_handler' );
add_action( 'wp_ajax_get_realization_data', 'foreto_realizations_ajax_handler' );
function foreto_realizations_ajax_handler() {

	$paged = ( !empty($_POST['paged']) ) ? $_POST['paged'] : 1;
	$r_cat = ( !empty($_POST['r_cat']) ) ? explode(',', $_POST['r_cat']) : 0;
	$r_industry = ( !empty($_POST['r_industry']) ) ? explode(',', $_POST['r_industry']) : 0;

	get_template_part( 'template-parts/realization-list', null, array(
		'paged' => $paged,
		'r_cat' => $r_cat,
		'r_industry' => $r_industry,
	) );

	exit();
}

add_action( 'rest_api_init', function () {
	register_rest_route( 'foreto_mail', '/send', array(
			'methods' => 'POST',
			'callback' => 'foreto_send_mail',
			'permission_callback' => '__return_true'
	) );
} );

function foreto_send_mail( WP_REST_Request $request ) {
	$params = $request->get_json_params();

	if( empty($params['email']) ) {
		return new WP_Error( 'message', __('Pole email jest wymagane.', 'foreto') );
	}

	$email_body = wp_sprintf( 
		__('Wybór produktu: %s<br><br> Nakład: %s<br> Format: %s<br> Adres email: %s<br> Numer telefonu: %s<br>', 'foreto'),
		$params['output'], $params['quantity'], $params['format'], $params['email'], $params['phone'] );

	$ok = empty( $request['is_error'] );
	$email = wp_mail( 
		get_option( 'admin_email' ),
		__('Zapytanie ofertowe', 'foreto'),
		$email_body,
		array( 'Content-Type: text/html; charset=UTF-8', 'From: DKSMART <'.$params['email'].'>')
	);
	$message = ( $email ) ? __('Zapytanie zostało wysłane', 'foreto') : __('Błąd wysyłania formularza', 'foreto');

	if ( $ok ) {
			return new WP_REST_Response( array(
				'success' => $email,
				'request' => $params,
				'message' => $message
		) );
	} else {
			return new WP_Error( 'message', __('Request error', 'foreto') );
	}
}

add_action( 'pre_get_posts', 'foreto_search_filter' );
function foreto_search_filter($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ($query->is_search) {
      $query->set('paged', ( get_query_var('paged') ) ? get_query_var('paged') : 1 );
      $query->set('posts_per_page', 6);
    }
  }
}