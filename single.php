<?php
/**
 *
 * This is the template that displays single posts
 *
 * @package MIT_Libraries_Child
 * @since 2.1.0
 */

get_header();

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

					<span class="meta-header">News</span>

					<h2><?php the_title(); ?></h2>

					<p class="entry-meta"> posted <?php
					the_time( 'F j, Y' );

					$cats = array();
					foreach ( get_the_category( $post_id ) as $cat ) {
						$categ = get_category( $cat );
						array_push( $cats, $categ -> name );
					}

					$post_categories = implode( ', ', $cats );

					echo ' in ' . esc_html( $post_categories );

					?>
					</p>

				</div>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>

				<ul class="post-navigation">
			        <li><?php previous_post_link( '%link', 'Previous Post', 'no' ) ?></li>
			        <li><?php next_post_link( '%link', 'Next Post', 'no' ) ?></li>
		        </ul>
		
			<?php endwhile; // End of the loop. ?>
			
			<?php
		  	$orig_post = $post;
		  	global $post;
		  	$tags = wp_get_post_tags( $current_post_id );
		   	$tagcount = count( $tags );

			if ( $tagcount > 0 ) {
			 	$tag_ids = array();
		  		foreach ( $tags as $individual_tag )
		  			$tag_ids[] = $individual_tag->term_id;
					$args = array(
					  	'tag__in' => $tag_ids,
					  	'post__not_in' => array( $current_post_id ),
					  	'posts_per_page' => 3,
					  	);

			  			$related_query = new WP_Query( $args ); ?>
						if ( $related_query->have_posts() ) :
						?>
						<hr/>
						<div>
						<h3>Related posts</h3>
							<ul>
	 						<?php
	  							while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
	   
									<div class="relatedthumb">
									    <li><a rel="external" href="<?php the_permalink()?>">
									    <?php the_post_thumbnail ( array(100, 100) ); ?> &nbsp;
									    <?php the_title(); ?>
									    </a></li>
									</div>
	     						<?php endwhile; ?>
	    					</ul>
	    				</div>
	      			
		   
			<?php

			}
			$post = $orig_post;
			wp_reset_query();
			?>

			</div>
		<?php get_sidebar(); ?>
	</div>

</div><!-- end div#stage -->


<?php get_footer(); ?>
