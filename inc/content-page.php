<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $isRoot;
?>

	<div id="mainContent" class="mainContent group">
		
		<div class="entry-content">
			<?php $title = get_the_title(); if ($title != ""): ?>
				<h2><?php the_title(); ?></h2>
			<?php endif; ?>

			<?php the_content(); ?>

			<?php
				$blog_id = get_current_blog_id();

				if (is_page('home') && $blog_id == 22):
					$col1 = get_field('column_1');
					$col2 = get_field('column_2');
				endif;
				
				if ($col1 != '' && $col2 != ''):
			?>

					<div class="flexContainer">
						<div class="flexItem">
							<?php echo $col1; ?>
						</div>
						<div class="flexItem">
							<?php echo $col2; ?>
						</div>
			<?php if(!is_page('home')) { echo "<h2>".$title."</h2>"; } ?>
					</div>

			<?php endif; ?>

		</div>
		
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
		
	</div>