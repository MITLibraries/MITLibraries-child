<?php
/**
 * Template Name: Exhibits |  Past
 *
 * @package MIT_Libraries_Child
 * @since Twenty Twelve 1.0
 */

	get_header( 'child' );
?>

	<?php get_template_part( 'inc/breadcrumbs', 'child' ); ?>

	<div id="stage" class="inner" role="main">

	<?php get_template_part( 'inc/postHead' ); ?>

		<div id="content" class="content has-sidebar">
			
			<div class="main-content">

		 
		<?php
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$past_query = new WP_Query(
	        array(
	          'post_type'   => 'exhibits',  // Only query events.
	          'meta_key'    => 'end_date',  // Load up the event_date meta.
	          'orderby'    	=> 'end_date',
	          'order'       => 'DESC',      // Descending, so later events first.
	          'posts_per_page' => 10,
	          'paged' => $paged,
	          'meta_query'  => array(
	             array(
	              'key'     => 'end_date',       // Which meta to query.
	              'value'   => date( 'Y-m-d' ),  // Value for comparison.
	              'compare' => '<',              // Method of comparison.
	              'type'    => 'DATE',
	            ), // The meta_query is an array of query items.
	           ), // End meta_query array.
	          ) // End array.
	    ); // Close WP_Query constructor call.
	?> 
		
			<div class="exhibits-feed-section">
			
				<h3 class="title-sub">Past Exhibits</h3>
				 
		   		<?php while ( $past_query->have_posts() ) : $past_query->the_post(); // Loop for events.

		      		get_template_part( 'inc/exhibits-detail' );

					wp_reset_postdata(); // Restore global post data stomped by the_post().

			   endwhile; // End of the loop. ?>

			</div>

		<!-- END OF PAST EXHIBITS LOOP -->
			<ul class="post-navigation">
				<li>
					<?php previous_posts_link( 'Newer Posts' ) ?>
				</li>
				<li>
					<?php next_posts_link( 'Older Posts', $past_query->max_num_pages ) ?>
				</li>
			</ul>
	  	</div>  <!-- main-content --> 
	
	  	<?php get_sidebar(); ?>
	
		</div>   <!-- content --> 
			
	</div>   <!-- stage --> 
	 
<?php get_footer(); ?>
