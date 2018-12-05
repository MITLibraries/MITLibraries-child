<?php
/**
 *
 * This is the template that displays the news page
 *
 * @package MIT_Libraries_Child
 * @since Twenty Twelve 1.0
 */

get_header( 'child' ); ?>

<?php get_template_part( 'inc/breadcrumbs', 'sitename' ); ?>
		
<div id="stage" class="inner" role="main">

	<?php get_template_part( 'inc/postHead' ); ?>

	<div id="content" class="content has-sidebar">
		<div class="content-main main-content">

				<?php while ( have_posts() ) : the_post();?>

					<?php get_template_part( 'inc/post', 'trimmed' ); ?>
			
				<?php endwhile; // End of the loop. ?>

				<?php twentytwelve_content_nav( 'nav-below' ); ?>
			</div>
				
				<?php get_sidebar(); ?>				
		</div>
</div>

<?php get_footer(); ?>
