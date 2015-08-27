<?php
/**
 *
  * Template Name: Standard Child

 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
 
$pageRoot = getRoot($post);
$section = get_post($pageRoot);
$isRoot = $section->ID == $post->ID;


get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>
	
	<?php if ( is_front_page()) { ?>
	
	 <div class="betterBreadcrumbs hidden-phone" role="navigation" aria-label="breadcrumbs">
      <span><a href="/">Libraries home</a></span>
      <span><?php bloginfo(); ?></span>
    </div>
    
    <?php } else { ?>
		
		<?php get_template_part('inc/breadcrumbs', 'child'); ?>

			<?php } ?>
		

		<div id="stage" class="inner group" role="main">

			<?php get_template_part('inc/postHead'); ?>
			
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
			
				<div id="content" class="allContent hasSidebar group">

				<?php get_template_part( 'inc/content', 'page' ); ?>

				<?php get_sidebar(); ?>

			</div>
			
			<?php } else { ?> 
			
			<div id="content" class="allContent group">

				<?php get_template_part( 'inc/content', 'page' ); ?>

			</div>
			
			<?php } ?>
		
		</div><!-- end div#stage -->
		
	<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>