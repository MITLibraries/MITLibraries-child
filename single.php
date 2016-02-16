<?php
/**
 *
 * This is the template that displays the news page
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
 
$pageRoot = getRoot($post);
$section = get_post($pageRoot);
$isRoot = $section->ID == $post->ID;


get_header(); ?>

<?php get_template_part('inc/breadcrumbs', 'child') ?>
	
<div id="stage" class="inner" role="main">

	<?php get_template_part('inc/postHead'); ?>
			
		<div id="content" class="content has-sidebar">

				<div class="main-content">			
					
					<?php while ( have_posts() ) : the_post(); ?>
					
						<div class="article-head">

						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
						
						</div>
						
						<div class="entry-content">
							<?php the_content('Read the rest of this entry &raquo;'); ?>
						</div>					
								
					
									
					<?php endwhile; // end of the loop. ?>
				</div>
				
				<?php get_sidebar(); ?>					
		</div>
		
</div><!-- end div#stage -->

<?php get_footer(); ?>