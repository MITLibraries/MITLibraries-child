<?php
/**
 * Child themes functions and definitions.
 *
 * @package MIT_Libraries_Child
 * @since Twenty Twelve 1.0
 */

$siteName = get_bloginfo( 'name' );

/**
 * Remove theme support for custom backgrounds
 */
function remove_child_theme_support() {
	remove_theme_support( 'custom-background' );
}
add_action( 'after_setup_theme', 'remove_child_theme_support' );

/**
 * Add theme-specific scripts
 */
function enqueue_my_scripts() {
	// We need the jquery library.
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', array( 'jquery' ), '1.9.1', true );
	// All the bootstrap javascript goodness.
	wp_enqueue_script( 'bootstrap-js', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js', array( 'jquery' ), true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_my_scripts' );

/**
 * Add theme-specific stylesheets
 *
 * @link http://mor10.com/challenges-new-method-inheriting-parent-styles-wordpress-child-themes/
 */
function enqueue_my_styles() {
	// First we enqueue style libraries.
	wp_enqueue_style( 'bootstrap', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css' );
	// Then enqueues the child stylesheet with a dependency on the parent style, which _should_ enforce correct load order.
	wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'libraries-global' ), '2.2.4' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_my_styles' );

/**
 * Define betterChildBreadcrumbs function
 */
function betterChildBreadcrumbs() {

	global $post;

	if ( is_search() ) {
		echo '<span>Search</span>';
	}

	if ( ! is_child_page() && is_page() || is_category() || is_single() ) {
		echo '<span>'.the_title().'</span>';
		return;
	}

	if ( is_child_page() ) {
		$parentLink = get_permalink( $post->post_parent );
		$parentTitle = get_the_title( $post->post_parent );
		$startLink = '<a href="';
		$endLink = '">';
		$closeLink = '</a>';
		$parentBreadcrumb = $startLink.$parentLink.$endLink.$parentTitle.$closeLink;
		$pageTitle = get_the_title( $post );
		$pageLink = get_permalink( $post );
		$childBreadcrumb = $startLink.$pageLink.$endLink.$pageTitle.$closeLink;
	}

	if ( '' !== $parentBreadcrumb ) {echo '<span>'.$parentBreadcrumb.'</span>';}
	if ( '' !== $childBreadcrumb ) {echo '<span>' . esc_html( $pageTitle ) . '</span>';}

}

/**
 * Define custom header image size
 */
function customHeader() {

	$args = array(
		'width'         => 1250,
		'height'        => 800,
		'uploads'       => true,
	);

	add_theme_support( 'custom-header', $args );

}
add_action( 'after_setup_theme', 'customHeader' );

/**
 * Remove widget areas inherited from parent theme
 */
function remove_parent_widgets() {

	// Unregister some of the TwentyTwelve sidebars.
	unregister_sidebar( 'sidebar-1' );
	unregister_sidebar( 'sidebar-2' );
	unregister_sidebar( 'sidebar-3' );
}
add_action( 'widgets_init', 'remove_parent_widgets', 11 );

/**
 * Registers the Widgetized Area Below the Content.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_child_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'twentytwelve' ),
			'id' => 'sidebar',
			'description' => __( 'Appears on posts and pages', 'twentytwelve' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s" role="complementary">',
			'after_widget' => '</aside>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name' => __( 'Below Content Widget Area', 'twentytwelve' ),
			'id' => 'sidebar-two',
			'description' => __( 'Appears when using the Front Page or Widgetized Page templates', 'twentytwelve' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s" role="complementary">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'twentytwelve_child_widgets_init' );

if ( ! function_exists( 'register_child_nav' ) ) {
	/**
	 * Define register_child_nav function
	 */
	function register_child_nav() {
		register_nav_menu( 'child-nav', 'Child Nav' );
	}
	add_action( 'init', 'register_child_nav' );
}

// Gets post cat slug and looks for single-[cat slug].php and applies it.
add_filter(
	'single_template',
	function( $the_template ) {
		foreach ( (array) get_the_category() as $cat ) {
			if ( file_exists( get_stylesheet_directory() . "/single-{$cat->slug}.php" ) ) {
				return get_stylesheet_directory() . "/single-{$cat->slug}.php";
			}
		}
		return $the_template;
	}
);

if ( function_exists( 'add_theme_support' ) ) { add_theme_support( 'post-thumbnails' ); }

add_image_size( 'headerImage', 1250, 800, true );
add_image_size( 'exhibit_thumbnail_image', 800, 600, true );
set_post_thumbnail_size( 1024, 9999 ); // Unlimited height, soft crop.

if ( ! function_exists( 'my_mce_buttons_2' ) ) :
	/**
	 * Add in a core button that's disabled by default
	 *
	 * @param array $buttons array of buttons.
	 */
	function my_mce_buttons_2( $buttons ) {
		$buttons[] = 'hr';

		return $buttons;
	}

add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );
endif;

/**
 * Adds custom post types to taxonomies
 *
 * @param object $query A wordpress query object.
 */
function add_custom_types_to_tax( $query ) {
	if ( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {

		// Get all your post types.
		$post_types = get_post_types();

		$query->set( 'post_type', $post_types );
		return $query;
	}
}
add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );

/**
 * Pagination for posts
 */
function child_numeric_posts_nav() {

	if ( is_singular() ) {
		return; }

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if ( $wp_query->max_num_pages <= 1 ) {
		return; }

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/** Add current page to the array */
	if ( $paged >= 1 ) {
		$links[] = $paged; }

	/** Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="post-navigation"><ul>' . "\n";

	/** Previous Post Link */
	if ( get_previous_posts_link() ) {
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() ); }

	/** Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) ) {
			echo '<li>…</li>'; }
	}

	/** Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/** Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) ) {
			echo '<li>…</li>' . "\n"; }

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/** Next Post Link */
	if ( get_next_posts_link() ) {
		printf( '<li>%s</li>' . "\n", get_next_posts_link() ); }

	echo '</ul></div>' . "\n";

}

/**
 * Allows for custom excerpt lengths
 *
 * @param int    $new_length The new length of the excerpt.
 * @param scalar $new_more The string to append when trimming the excerpt.
 */
function custom_excerpt( $new_length = 20, $new_more = '...' ) {
	add_filter('excerpt_length', function () use ( $new_length ) {
	return $new_length;
	}, 999);
	add_filter('excerpt_more', function () use ( $new_more ) {
	return $new_more;
	});
	$output = get_the_excerpt();
	$output = apply_filters( 'wptexturize', $output );
	$output = apply_filters( 'convert_chars', $output );
	$output = '<p>' . $output . '</p>';
	echo $output;
}

/**
 * Get URL of first image in a post
 */
function get_first_post_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches );
	$first_img = $matches [1] [0];

	// Defines a default image.
	if ( empty( $first_img ) ) {
	$first_img = '';
	}
	return $first_img;
}

/**
 * Remove native Gallery styling
 */
add_filter( 'use_default_gallery_style', '__return_false' );

add_action( 'customize_register', 'theme_menu_style_customizer' );

/**
 * Add menu style option
 *
 * @param type $wp_customize wp_customize.
 */
function theme_menu_style_customizer( $wp_customize ) {

	$wp_customize->add_section('menu_style_section', array(
		'title' => 'Menu Style',
	));

	$wp_customize->add_setting('menu_style_setting', array(
		'default' => 'Full Menu',
		'type' => 'option',
	));

	$wp_customize->add_control('menu_style_setting', array(
		'label'   => 'Menu Style',
		'section' => 'menu_style_section',
		'type'    => 'radio',
		'choices'    => array(
			'full' => 'Full Menu',
			'slim' => 'Slim No Menu',
		),
	));
}

/**
 * Function to look up exhibit location information
 *
 * Multiple templates in this theme need to display information about the
 * location of an Exhibit record. This can be a bit more complex than might be
 * expected, so we have this helper function to assist.
 *
 * Exhibit locations are recorded using Categories, but they can also be placed
 * in a "Featured" category (which is not a location, and must be ignored).
 *
 * Additionally, there is a catchall category of "Uncategorized", for exhibits
 * in non-standard locations. For these Exhibits, the name to be displayed is
 * found in a custom "uncategorized_location" field.
 *
 * This function:
 * 1. Looks up all categories for the current Exhibit post ID.
 * 2. Rebuilds this list without a "Featured" item, if found. In the process it
 *    extracts only the name and slug for these categories, removing the WP_Term
 *    in favor of a simple Array.
 * 3. Calculates the displayed name for the location, along with a link and
 *    initial which the theme templates expect.
 * 4. Returns these three values (name, link, and initial) in an array.
 */
function get_exhibit_location() {
	// 1. Look up all categories for the current post ID.
	$locations_array = get_the_category();

	// 2. Rebuilt the array without a "Featured" category entry, if found.
	$locations_rebuild = array();
	foreach ( $locations_array as $term ) {
		if ( 'Featured' === $term->name ) {
			continue;
		}
		array_push(
			$locations_rebuild,
			array(
				'name' => $term->name,
				'slug' => $term->slug,
			)
		);
	}

	// 3. Calculate the name, link, and initial from the rebuilt array.
	$location_name = 'Multiple Locations';
	if ( 1 === count( $locations_rebuild ) ) {
		$location_name = $locations_rebuild[0]['name'];
		if ( 'Uncategorized' === $location_name ) {
			$location_name = get_field( 'uncategorized_location' );
		}
	}
	$location_initial = substr( $location_name, 0, 1 );

	// 4. Return those calculated values in an array.
	return array(
		'name'    => $location_name,
		'initial' => $location_initial,
	);
}
