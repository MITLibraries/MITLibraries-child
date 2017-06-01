<?php
/**
 * Template Name: Full Width
 *
 * @package MIT_Libraries_Child
 * @since Twenty Twelve 1.0
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header();

get_template_part( 'inc/breadcrumbs', 'child' ); ?>

		<div id="stage" class="inner" role="main">
			
			<?php get_template_part( 'inc/header-child' );
	
	    	// Checks to see if menu has not been assigned. -->
			if ( !has_nav_menu( 'child-nav' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'child-nav',
					'fallback_cb' => false) );			
				
			echo '' ;
				
			} else {
	    	
	    	// Otherwise, if menu has been assigned, get navbar. -->
			get_template_part( 'inc/nav', 'child' );
					
			} 
				
			?>		
				
			<div id="content" class="content">
				
				<?php while ( have_posts() ) : the_post(); ?>
	
					<?php get_template_part( 'inc/content', 'page' ); ?>
	
				<?php endwhile; // End of the loop. ?>
	
			</div><!-- #primary -->
		
		</div>

<?php get_footer(); ?>
