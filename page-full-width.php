<?php
/**
 Template Name: Full Width
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

$pageRoot = getRoot($post);
$section = get_post($pageRoot);
$isRoot = $section->ID == $post->ID;

get_header();

get_template_part('inc/breadcrumbs', 'child'); ?>

		<div id="stage" class="inner group" role="main">
			
			<?php get_template_part('inc/postHead'); ?>
			
			<div id="content">
				<?php while ( have_posts() ) : the_post(); ?>
	
					<?php get_template_part( 'inc/content', 'page' ); ?>
	
				<?php endwhile; // End of the loop. ?>
	
			</div><!-- #primary -->
		
		</div>

<?php get_footer(); ?>
