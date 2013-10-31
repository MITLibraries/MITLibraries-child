<?php

add_action( 'after_setup_theme', 'remove_child_theme_support', 22);

function remove_child_theme_support() {
  remove_theme_support('custom-background');
  remove_theme_support('static-front-page');
}

function betterBreadcrumbs() {

  global $post;

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
  'width'         => 960,
  'height'        => 200,
  // 'default-image' => get_template_directory_uri() . '/images/header.jpg',
  'uploads'       => true,
  );

  add_theme_support( 'custom-header', $args );

}

// add_theme_support( 'custom-header' );

register_nav_menu( 'child', __( 'Child Site Menu', 'twentytwelve' ) );

if (function_exists('add_theme_support')) { add_theme_support('post-thumbnails'); }

add_image_size('headerImage', 960, 200, true);