<?php
/**
 * Template Name: Exhibits Display
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
$todaysDate = date('m/d/Y H:i:s');
?>

	<?php get_template_part('inc/breadcrumbs', 'child'); ?>

		<div id="stage" class="inner" role="main">
			
			<?php get_template_part('inc/postHead'); ?>

			<div id="content" class="content has-sidebar">

				<div class="main-content">
					
					<?php
						 $query = new WP_Query( array('post_type' => 'exhibits', 'posts_per_page' => -1 ) );
						 while ( $query->have_posts() ) : $query->the_post(); ?>
						 
						 <?php get_template_part( 'inc/content', 'exhibits' ); ?>

						<?php wp_reset_postdata(); ?>
						<?php endwhile; ?>

				</div><!-- end div.mainContent -->
				
				<?php get_sidebar(); ?>

			</div><!-- end div#content -->

		</div><!-- #stage -->
		



<?php get_footer(); ?>