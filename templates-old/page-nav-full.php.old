<?php
/**
 * Template Name: 2/3 Width w/ Nav
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
 
$pageRoot = getRoot($post);
$section = get_post($pageRoot);
$isRoot = $section->ID == $post->ID;


get_header(); ?>

		<?php while ( have_posts() ) : the_post(); ?>
		
		<div id="stage" class="inner row" role="main">
	
			<?php get_template_part("content", "featureimage"); ?>

			<div id="content" class="">
				<?php get_template_part( 'content', 'nav-full' ); ?>
			</div>
			
			
			
		
			<div class="clear"></div>
		
		</div>
		
		<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>