<?php
/**
 * The template for displaying Category pages.
 *
 * Used to display archive-type pages for posts in a category.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

$pageRoot = getRoot($post);
$section = get_post($pageRoot);
$isRoot = $section->ID == $post->ID;

get_header(); ?>

	<?php get_template_part('inc/breadcrumbs', 'child'); ?>

		<div id="stage" class="inner group" role="main">

			<?php get_template_part('inc/postHead'); ?>

			<div id="content" class="allContent hasSidebar group ">

				<div class="mainContent group">

					<?php if (is_category()) {
						echo '<h2 class="categoryName">';
						single_cat_title('Category: ');
						echo '</h2>';
						}
					?>

					<?php if ( have_posts() ) : ?>

						<?php	while ( have_posts() ) : the_post(); ?>

							<div class="post">

								<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
								<small>Posted <?php the_time('F jS, Y') ?> by <?php the_author() ?> </small>
								
								<div class="entry">
									<?php the_content('Read the rest of this entry &raquo;'); ?>
								</div>
						
								<p class="postmetadata">Posted in <?php the_category(', ') ?> 

								 <?php edit_post_link('(Edit)'); ?> </p>

							</div>

						<?php 
							endwhile;
							twentytwelve_content_nav( 'nav-below' );
						?>

						<?php else : ?>
							<?php get_template_part( 'content', 'none' ); ?>
						<?php endif; ?>

				</div><!-- end div.mainContent -->
				
			<?php get_sidebar(); ?>

			</div><!-- end div#content -->

		</div><!-- #stage -->



<?php get_footer(); ?>