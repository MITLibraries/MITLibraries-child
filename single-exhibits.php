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
							
							<?php
						foreach((get_the_category()) as $category) {
							echo '<span class="cat-name">' . $category->cat_name . ' Exhibit' . '</span> ';
								}
							?>

						<h2><?php the_title(); ?></h2>
						
							<?php if (get_field('subtitle')) : ?>
						<h3><?php the_field('subtitle'); ?></h3>						
							<?php endif; ?>
							
						<p class="date-span"><?php the_field('start_date'); ?> - <?php the_field('end_date'); ?></p>
						
							<?php if (get_field('sponsored')) : ?>
				        <p class="sponsored-content"><?php the_field('sponsored'); ?></p>
							<?php endif; ?>
										
						</div>
						
						<div class="entry-content">
							<?php the_content(); ?>
						</div>					
								
					
									
					<?php endwhile; // end of the loop. ?>
				</div>
				
				<?php get_sidebar(); ?>					
		</div>
		
</div><!-- end div#stage -->

<?php get_footer(); ?>