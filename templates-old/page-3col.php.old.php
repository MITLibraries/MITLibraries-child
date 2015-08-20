<?php
/**
 * Template Name: 3 Column (left col, content, sidebar)
 *
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
		
		<div id="stage" class="inner column3 tertiaryPage row" role="main">
	
			<?php get_template_part("content", "featureimage"); ?>
			
			<div id="content" class="span12">
				
				<?php get_template_part( 'content', 'page' ); ?>
				
			</div>
			
			
			
		
			<div class="clear"></div>
		
		</div>
		
		<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>