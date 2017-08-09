<?php
/**
 * Template Name: Widgetized Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package MIT_Libraries_Child
 * @since Twenty Twelve 1.0
 */

$pageRoot = getRoot( $post );
$section = get_post( $pageRoot );
$isRoot = $section->ID == $post->ID;


get_header( 'child' );

get_template_part( 'inc/breadcrumbs', 'child' ); ?>


	<?php while ( have_posts() ) : the_post(); ?>

		

		<div id="stage" class="inner" role="main">

			<?php get_template_part( 'inc/postHead' ); ?>
			
			<?php if ( is_active_sidebar( 'sidebar' ) ) { ?>
			
				<div id="content" class="content has-sidebar">
					
					

				<?php get_template_part( 'inc/content', 'widgetized' ); ?>

				<?php get_sidebar(); ?>

			</div>
			
			<?php } else { ?> 
			
			<div id="content" class="content">

				<?php get_template_part( 'inc/content', 'widgetized' ); ?>

			</div>
			
			<?php } ?>
		
		</div><!-- end div#stage -->
		
	<?php endwhile; // End of the loop. ?>


<?php get_footer(); ?>
