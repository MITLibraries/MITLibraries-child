<?php
/**
 *
 * This is the template that displays the news page
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
 
$pageRoot = getRoot( $post );
$section = get_post( $pageRoot );
$isRoot = $section->ID == $post->ID;

get_header(); ?>

<?php get_template_part( 'inc/breadcrumbs' ); ?>

<div class="betterBreadcrumbs hidden-phone" role="navigation" aria-label="breadcrumbs">
  <span><a href="/">Libraries home</a></span>
  <span><?php bloginfo(); ?></span>
</div>

		
<div id="stage" class="inner group" role="main">

	<?php get_template_part( 'inc/postHead' ); ?>
			
		<div id="content" class="allContent hasSidebar group">
			<div id="mainContent" class="mainContent">		

				<?php while ( have_posts() ) : the_post();?>

					<?php get_template_part( 'inc/post', 'trimmed' ); ?>
			
				<?php endwhile; // end of the loop. ?>

			</div>
				
				<?php get_sidebar(); ?>				
		</div>
</div>

<?php get_footer(); ?>