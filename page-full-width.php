<?php
/**
 * Template Name: Full Width
 *
 * @package MIT_Libraries_Child
 * @since Twenty Twelve 1.0
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header( 'child' );

get_template_part( 'inc/breadcrumbs', 'child' ); ?>

		<div id="stage" class="inner" role="main">
			
			<?php get_template_part( 'inc/postHead' ); ?>
			
			<div id="content" class="content">
				<?php while ( have_posts() ) : the_post(); ?>
	
					<?php get_template_part( 'inc/content', 'widgetized' ); ?>
	
				<?php endwhile; // End of the loop. ?>
	
			</div><!-- #primary -->
		
		</div>

<?php get_footer(); ?>
