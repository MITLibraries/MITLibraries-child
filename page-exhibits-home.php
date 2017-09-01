<?php
/**
 * Template Name: Exhibits | Home Page
 * Used to display archive-type pages for posts in a category.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package MIT_Libraries_Child
 * @since Twenty Twelve 1.0
 */

get_header( 'child' ); ?>

<?php // Get today's date in the right format.
$todaysDate = date( 'm/d/Y H:i:s' );
?>
	<?php

		get_template_part( 'inc/breadcrumbs','sitename' );

	?>
			
		<div id="stage" class="inner" role="main">
			
			<?php get_template_part( 'inc/postHead' ); ?>

			<div id="content" class="content has-sidebar">

				<div class="main-content">

					<?php while ( have_posts() ) : the_post();

						the_content();
						wp_reset_postdata();

					endwhile; ?>
					
					<?php

						$query = new WP_Query(
							array(
								'post_type' => 'exhibits',
								'posts_per_page' => 10,
								'category_name' => 'featured',
								'orderby' => 'menu_order',
								'order' => 'ASC',
							)
						);
						while ( $query->have_posts() ) : $query->the_post(); ?>
						 
						<?php get_template_part( 'inc/exhibits-detail' ); ?>

						<?php wp_reset_postdata(); ?>
						<?php endwhile;

					?>
					
				<a class="button-secondary exhibits-button" href="/exhibits/current-upcoming-past-exhibits/">View all exhibits</a>

				</div><!-- end .main-content -->
				
				<?php get_sidebar(); ?>

			</div><!-- end #content -->

		</div><!-- #stage -->
		



<?php get_footer(); ?>
