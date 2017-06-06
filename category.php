<?php
/**
 *  The template for displaying Category pages.
 *
 * Used to display archive-type pages for posts in a category.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package MIT_Libraries_Child
 * @since Twenty Twelve 1.0
 */

$pageRoot = getRoot( $post );
$section = get_post( $pageRoot );
$isRoot = $section->ID == $post->ID;


get_header();

get_template_part( 'inc/breadcrumbs', 'category' ); ?>


	<?php while ( have_posts() ) : the_post(); ?>


		<div id="stage" class="inner" role="main">

			<?php get_template_part( 'inc/postHead' ); ?>
				<div id="content" class="content has-sidebar">
				
					<div class="main-content">
	
						<div class="entry-content">

					<?php if ( is_category() ) {
						echo '<h2>';
						single_cat_title();
						echo '</h2>';
						}
					?>
	
				<?php get_template_part( 'inc/content', 'feed' ); ?>
					</div>
				</div>
			<?php get_sidebar(); ?>


			</div>
			
		</div><!-- end div#stage -->
		


	<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
