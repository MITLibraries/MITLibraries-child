<?php
/**
 * Template Name: Exhibits | Current, Upcoming & Past
 *
 * @package MIT_Libraries_Child
 * @since Twenty Twelve 1.0
 */

get_header();
?>

	<?php get_template_part( 'inc/breadcrumbs', 'child' ); ?>

	<div id="stage" class="inner" role="main">

	<?php get_template_part( 'inc/postHead' ); ?>

		<div id="content" class="content has-sidebar">
			
			<div class="main-content">

		<?php

			$date1 = DateTime::createFromFormat( 'Ymd', get_field( 'end_date' ) );

		$current_query = new WP_Query(
	        array(
			  'posts_per_page' => -1,
			  'ignore_sticky_posts' => false,
	          'post_type'   => 'exhibits',  // Only query exhibits.
	          'meta_key'    => 'end_date',  // Load up the event_date meta.
	          'order_by'    => 'end_date',
	          'order'       => 'desc',      // Descending, so later events first.
	          'meta_query'  => array(
	             array(
	              'key'     => 'end_date',       // Which meta to query.
	              'value'   => date( 'Y-m-d' ),  // Value for comparison.
	              'compare' => '>=',             // Method of comparison.
	              'type'    => 'DATE',
	            ), // The meta_query is an array of query items.
	           ),// End meta_query array.
	          ) // End array.
	        ); // Close WP_Query constructor call.
		?> 
        
        	<div class="exhibits-feed-section">
			
				<h3 class="exhibits">Current Exhibits</h3>   
						 
				<?php if ( $current_query->have_posts() ) :
					while ( $current_query->have_posts() ) : $current_query->the_post(); // Loop for current exhibits.

				       get_template_part( 'inc/exhibits-current' );

				       endwhile;

					   wp_reset_query();

					   else : ?>
		 
					   <p><?php _e( 'There are no current exhibits at this time, but check back often.' ); ?></p>
		 
				<?php endif; ?>
			   		   
			</div>

		<!-- END OF CURRENT EXHIBITS LOOP -->
		   

		<?php

			$date2 = DateTime::createFromFormat( 'Ymd', get_field( 'start_date' ) );

		$future_query = new WP_Query(
	        array(
	          'post_type'   => 'exhibits',    // Only query exhibits.
	          'meta_key'    => 'start_date',  // Load up the event_date meta.
	          'order_by'    => 'start_date',
	          'order'       => 'desc',        // Descending, so later events first.
	          'meta_query'  => array(
	             array(
	              'key'     => 'start_date',     // Which meta to query.
	              'value'   => date( 'Y-m-d' ),  // Value for comparison.
	              'compare' => '>=',             // Method of comparison.
	              'type'    => 'DATE',
	            ), // The meta_query is an array of query items.
	           ),// End meta_query array.
	          ) // End array.
	        ); // Close WP_Query constructor call.
		?> 
			
			<div class="exhibits-feed-section">
				
				<h3 class="exhibits">Upcoming Exhibits</h3>   
				 
				<?php if ( $future_query->have_posts() ) :
					while ( $future_query->have_posts() ) : $future_query->the_post(); // Loop for future exhibits.

			       get_template_part( 'inc/exhibits-current' );

			       endwhile;

				   wp_reset_query();

				   else : ?>
	 
				   <p><?php _e( 'There are no upcoming exhibits at this time, but check back often.' ); ?></p>
	 
				<?php endif; ?>
		
			</div>
		
		
		<!-- END OF UPCOMING EXHIBITS LOOP -->
		 
		 
		<?php

			$date3 = DateTime::createFromFormat( 'Ymd', get_field( 'end_date' ) );

		$past_query = new WP_Query(
	        array(
	          'post_type'   => 'exhibits',  // Only query events.
	          'meta_key'    => 'end_date',  // Load up the event_date meta.
	          'order_by'    => 'end_date',
	          'order'       => 'desc',      // Descending, so later events first.
	          'meta_query'  => array(
	             array(
	              'key'     => 'end_date',       // Which meta to query.
	              'value'   => date( 'Y-m-d' ),  // Value for comparison.
	              'compare' => '<',              // Method of comparison.
	              'type'    => 'DATE',
	            ), // The meta_query is an array of query items.
	           ),// End meta_query array.
	          ) // End array.
	        ); // Close WP_Query constructor call.

		?> 
		
			<div class="exhibits-feed-section">
			
				<h3 class="exhibits">Past Exhibits</h3>   
				 
		   <?php while ( $past_query->have_posts() ) : $past_query->the_post(); // Loop for events.

		       get_template_part( 'inc/exhibits-past' );

		       wp_reset_query(); // Restore global post data stomped by the_post().

			   endwhile; // End of the loop. ?>

			</div>


		<!-- END OF UPCOMING EXHIBITS LOOP -->
    
  		
  		
	  	</div>  <!-- main-content --> 
	
	  	<?php get_sidebar(); ?>
	
		</div>   <!-- content --> 
			
	</div>   <!-- stage --> 
	 
<?php get_footer(); ?>
