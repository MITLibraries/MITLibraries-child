<?php
/**
 * The template for displaying Category pages.
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

get_header(); ?>

	<?php get_template_part( 'inc/breadcrumbs', 'category' ); ?>

		<div id="stage" class="inner group" role="main">
			
			 

			<?php get_template_part( 'inc/postHead' ); ?>


			<div id="content" class="allContent hasSidebar group ">

				<div class="mainContent group">

					<?php if ( is_category() ) {
						echo '<h2>';
						single_cat_title();
						echo '</h2>';
						}
					?>
					<?php if ( have_posts() ) : ?>

						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', 'cpt' ); ?>

						<span class="post-page-nav">
							<?php
							endwhile;
							child_numeric_posts_nav();

						?>
						</span>

						<?php else : ?>
							<?php get_template_part( 'content', 'none' ); ?>
						<?php endif; ?>

				</div><!-- end div.mainContent -->
				
			<?php get_sidebar(); ?>

			</div><!-- end div#content -->

		</div><!-- #stage -->




<?php get_footer(); ?>
