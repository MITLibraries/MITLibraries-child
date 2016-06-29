<?php
/**
 *
 * This is the template that displays single posts
 *
 * @package MIT_Libraries_Parent
 * @since 1.4.0
 */

get_header(); ?>

<?php get_template_part('inc/breadcrumbs', 'child') ?>
	
<div id="stage" class="inner" role="main">

	<?php get_template_part('inc/postHead'); ?>
			
		<div id="content" class="content has-sidebar">

				<div class="content-main main-content">			
					
					<?php while ( have_posts() ) : the_post(); ?>
					
						<div class="article-head">
							 
						<span class="meta-header">News</span>
						
						<h2><?php the_title(); ?></h2>
						
						<p class="entry-meta"> posted <?php 
							the_time('F j, Y'); 
							?> in <span class="non-link"><?php 
							the_category(', '); 
							?></span></p>
						
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