<?php
/**
 * Template Name: Exhibits | Home Page
 * Used to display archive-type pages for posts in a category.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<?php // Get today's date in the right format
$todaysDate = date( 'm/d/Y H:i:s' );
?>
	<?php

		get_template_part( 'inc/breadcrumbs','sitename' );

	?>
			
		<div id="stage" class="inner" role="main">
			
			<?php get_template_part( 'inc/postHead' ); ?>

			<div id="content" class="content has-sidebar">

				<div class="main-content">
					
					<?php

						$sticky = get_option( 'sticky_posts' );
						rsort( $sticky );
						$sticky = array_slice( $sticky, 0, 5 );
						$query = new WP_Query( array('post_type' => 'exhibits', 'posts_per_page' => -1, 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) );
						while ( $query->have_posts() ) : $query->the_post(); ?>
						 
						<?php get_template_part( 'inc/exhibits-current' ); ?>

						<?php wp_reset_postdata(); ?>
						<?php endwhile;

					?>
					
				<a class="button-secondary exhibits-button" href="/exhibits/current-upcoming-past-exhibits/">View all exhibits</a>

				</div><!-- end .main-content -->
				
				<?php get_sidebar(); ?>

			</div><!-- end #content -->

		</div><!-- #stage -->
		



<?php get_footer(); ?>
