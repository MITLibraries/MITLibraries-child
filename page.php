<?php
/**
 * Template Name: Standard Child
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package MIT_Libraries_Child
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<?php if ( is_front_page() ) {

		get_template_part( 'inc/breadcrumbs','sitename' );

		} else {

		get_template_part( 'inc/breadcrumbs', 'child' );

		}

	?>

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
				
			while ( have_posts() ) : the_post(); ?>

			<?php if ( is_active_sidebar( 'sidebar' ) ) { ?>

				<div id="content" class="content has-sidebar">

				<?php get_template_part( 'inc/content', 'page' ); ?>

				<?php get_sidebar(); ?>

			</div>

			<?php } else { ?>

			<div id="content" class="content">

				<?php get_template_part( 'inc/content', 'page' ); ?>

			</div>

			<?php } ?>

		</div><!-- end div#stage -->

	<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
