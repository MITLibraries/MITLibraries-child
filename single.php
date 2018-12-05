<?php
/**
 *
 * This is the template that displays single posts
 *
 * @package MIT_Libraries_Child
 * @since 2.1.0
 */

get_header( 'child' );

get_template_part( 'inc/breadcrumbs', 'child' );

?>

<div id="stage" class="inner" role="main">

	<?php get_template_part( 'inc/postHead' ); ?>

	<div id="content" class="content has-sidebar">

		<div class="content-main main-content">

			<?php while ( have_posts() ) : the_post();
				$current_post_id = $post->ID;
				?>

				<div class="article-head">

					<h2 class="entry-title"><?php the_title(); ?></h2>

					<p class="entry-meta">
						Posted on <?php the_date(); ?> in <?php the_category( ', ' ); ?>
					</p>

				</div>

				<div class="entry-content clearfix">
					<?php the_content(); ?>
				</div>

				<ul class="post-navigation">
							<li><?php previous_post_link( '%link', 'Previous', 'no' ); ?></li>
							<li><?php next_post_link( '%link', 'Next', 'no' ); ?></li>
						</ul>
		
			<?php endwhile; // End of the loop. ?>
			
			<?php
				global $post;
				$tags = wp_get_post_tags( $current_post_id );
				$tagcount = count( $tags );

			if ( $tagcount > 0 ) {
				$tag_ids = array();
				foreach ( $tags as $individual_tag ) {
					$tag_ids[] = $individual_tag->term_id;
					$args = array(
						'tag__in' => $tag_ids,
						'post__not_in' => array( $current_post_id ),
						'posts_per_page' => 3,
						);
				}
					$related_query = new WP_Query( $args );

				if ( $related_query->have_posts() ) :
				?>
					<hr/>
					<div>
					<h3>Related posts</h3>
						<ul class="relateds">
						<?php
						while ( $related_query->have_posts() ) : $related_query->the_post(); ?>

							<li class="related">
								<?php the_post_thumbnail( array( 100, 100 ) ); ?>
								<a class="related-title" href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</li>

						<?php endwhile; ?>
						</ul>
					</div>
				<?php endif;?>
			 
			<?php

			}
			wp_reset_query();
			?>

			</div>
		<?php get_sidebar(); ?>
	</div>

</div><!-- end div#stage -->


<?php get_footer(); ?>
