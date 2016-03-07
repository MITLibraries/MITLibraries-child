<?php

$siteName = get_bloginfo('name');

add_action( 'after_setup_theme', 'remove_child_theme_support');

function remove_child_theme_support() {
	remove_theme_support('custom-background');
}

function enqueue_my_scripts() {
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', array('jquery'), '1.9.1', true); // we need the jquery library
	wp_enqueue_script( 'bootstrap-js', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js', array('jquery'), true); // all the bootstrap javascript goodness
}
add_action('wp_enqueue_scripts', 'enqueue_my_scripts');
function enqueue_my_styles() {
	wp_enqueue_style( 'bootstrap', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' );
}



add_action('wp_enqueue_scripts', 'enqueue_my_styles');



function betterChildBreadcrumbs() {

	global $post;

	if(is_search()) {
		echo "<span>Search</span>";
	}

	if(!is_child_page() && is_page() || is_category() || is_single()) {
		echo "<span>".the_title()."</span>";
		return;
	}

	if(is_child_page()) {
		$parentLink = get_permalink($post->post_parent);
		$parentTitle = get_the_title($post->post_parent);
		$startLink = '<a href="';
		$endLink = '">';
		$closeLink = '</a>';
		$parentBreadcrumb = $startLink.$parentLink.$endLink.$parentTitle.$closeLink;
		$pageTitle = get_the_title($post);
		$pageLink = get_permalink($post);
		$childBreadcrumb = $startLink.$pageLink.$endLink.$pageTitle.$closeLink;
	}

	if ($parentBreadcrumb !="") {echo "<span>".$parentBreadcrumb."</span>";}
	if ($childBreadcrumb != "") {echo "<span>".$pageTitle."</span>";}

}

add_action( 'after_setup_theme', 'customHeader' );

function customHeader() {

	$args = array(
		'width'         => 2000,
		'height'        => 1020,
		'uploads'       => true
	);

	add_theme_support( 'custom-header', $args );

}

function remove_parent_widgets(){

	// Unregister some of the TwentyTwelve sidebars
	unregister_sidebar( 'sidebar-1' );
	unregister_sidebar( 'sidebar-2' );
	unregister_sidebar( 'sidebar-3' );
}
add_action( 'widgets_init', 'remove_parent_widgets', 11);

/**
 * Registers the Widgetized Area Below the Content.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_child_widgets_init() {
	register_sidebar( array(
			'name' => __( 'Main Sidebar', 'twentytwelve' ),
			'id' => 'sidebar',
			'description' => __( 'Appears on posts and pages', 'twentytwelve' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s" role="complementary">',
			'after_widget' => '</aside>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		) );

	register_sidebar( array(
			'name' => __( 'Below Content Widget Area', 'twentytwelve' ),
			'id' => 'sidebar-two',
			'description' => __( 'Appears when using the Widgetized Page template', 'twentytwelve' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s" role="complementary">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
}
add_action( 'widgets_init', 'twentytwelve_child_widgets_init' );

// Register Child Nav
if(!function_exists('register_child_nav')) {
	function register_child_nav() {
		register_nav_menu('child-nav', 'Child Nav');
	}
	add_action( 'init', 'register_child_nav' );
}

//Gets post cat slug and looks for single-[cat slug].php and applies it
add_filter('single_template', create_function(
		'$the_template',
		'foreach( (array) get_the_category() as $cat ) {
		if ( file_exists(STYLESHEETPATH . "/single-{$cat->slug}.php") )
		return STYLESHEETPATH . "/single-{$cat->slug}.php"; }
	return $the_template;' )
);

/**
 * Load all custom post_types if home page or search results.
 */
function search_filter($query) {
	if ( !is_admin() && $query->is_main_query() ) {
		if ($query->is_home() || $query->is_search() ) {
			$query->set('post_type', array( 'maihaugen', 'rotch', 'online' ) );
		}
	}
}
add_action('pre_get_posts','search_filter');




if (function_exists('add_theme_support')) { add_theme_support('post-thumbnails'); }

add_image_size('headerImage', 2000, 1020, true);
add_image_size('exhibit_thumbnail_image', 800, 600, true);
set_post_thumbnail_size( 1024, 9999 ); // Unlimited height, soft crop

if (!function_exists('my_mce_buttons_2')):
	function my_mce_buttons_2($buttons) {
		/**
		 * Add in a core button that's disabled by default
		 */
		$buttons[] = 'hr';

		return $buttons;
	}

add_filter('mce_buttons_2', 'my_mce_buttons_2');
endif;

function add_custom_types_to_tax( $query ) {
	if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {

		// Get all your post types
		$post_types = get_post_types();

		$query->set( 'post_type', $post_types );
		return $query;
	}
}
add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );

// pagination for posts
function child_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/** Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

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
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/** Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/** Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/** Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/** Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}

// Allows for custom excerpt lengths
function custom_excerpt($new_length = 20, $new_more = '...') {
  add_filter('excerpt_length', function () use ($new_length) {
    return $new_length;
  }, 999);
  add_filter('excerpt_more', function () use ($new_more) {
    return $new_more;
  });
  $output = get_the_excerpt();
  $output = apply_filters('wptexturize', $output);
  $output = apply_filters('convert_chars', $output);
  $output = '<p>' . $output . '</p>';
  echo $output;
}

// Get URL of first image in a post
function get_first_post_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  //Defines a default image
  if(empty($first_img)){ 
    $first_img = "";
  }
  return $first_img;
} 