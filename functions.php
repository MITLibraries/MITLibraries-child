<?php

add_action( 'after_setup_theme', 'remove_child_theme_support');

function remove_child_theme_support() {
  remove_theme_support('custom-background');
}

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
  'width'         => 480,
  'height'        => 200,
  'uploads'       => true
  );

  add_theme_support( 'custom-header', $args );

}

// add_theme_support( 'custom-header' );

// de-queue navigation js
add_action('wp_print_scripts','tto_dequeue_navigation');
	function tto_dequeue_navigation() {
		wp_dequeue_script( 'twentytwelve-navigation' );
}
// load the new navigation js
	function tto_custom_scripts()
{

// Register the new navigation script
	wp_register_script( 'lowernav-script', get_stylesheet_directory_uri() . '/js/navigation.js', array(), '1.0', true );

// Enqueue the new navigation script 
	wp_enqueue_script( 'lowernav-script' );
}
add_action( 'wp_enqueue_scripts', 'tto_custom_scripts' );

// Register Child Nav
if(!function_exists('register_child_nav')) {
  function register_child_nav() {
    register_nav_menu('child-nav', 'Child Nav');
  }
  add_action( 'init', 'register_child_nav' );
}

if (function_exists('add_theme_support')) { add_theme_support('post-thumbnails'); }

add_image_size('headerImage', 480, 200, true);

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