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
			
		</div>
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
		
	</div>