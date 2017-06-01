<?php
/**
 * The template for displaying Category pages for Rotch Library on Exhibits site.
 *
 * @package MIT_Libraries_Child
 * @since 2.0.0
 */

get_header();
?>

	<?php get_template_part( 'inc/breadcrumbs', 'category' ); ?>

	<div id="stage" class="inner" role="main">

	<?php get_template_part( 'inc/postHead' ); ?>

		<div id="content" class="content has-sidebar">
			
			<div class="main-content">

		<?php

			$current_query = new WP_Query(
				array(
					'posts_per_page' => -1,
					'ignore_sticky_posts' => false,
					'category_name' => 'rotch-library',
					'meta_key'    => 'start_date',  // Load up the event_date meta.
					'orderby'     => 'start_date',
					'order'       => 'DESC',      // Descending, so later events first.
					'meta_query'  => array(
						array(
							'key'     => 'start_date',     // Which meta to query.
							'value'   => date( 'Y-m-d' ),  // Value for comparison.
							'compare' => '<=',             // Method of comparison.
							'type'    => 'DATE',
						),
						array(
							'key'     => 'end_date',       // Which meta to query.
							'value'   => date( 'Y-m-d' ),  // Value for comparison.
							'compare' => '>=',             // Method of comparison.
							'type'    => 'DATE',
						), // The meta_query is an array of query items.
					), // End meta_query array.
				) // End array.
			); // Close WP_Query constructor call.
		?> 
        
			<div class="exhibits-feed-section">
			
				<h3 class="title-sub">Current Exhibits</h3>
						 
				<?php if ( $current_query->have_posts() ) :
					while ( $current_query->have_posts() ) : $current_query->the_post(); // Loop for current exhibits.

						get_template_part( 'inc/exhibits-current' );

					endwhile;

						wp_reset_postdata();

				else : ?>
		 
					<p><?php esc_html_e( 'There are no current exhibit announcements at this time. New exhibits are added throughout the year, so please check back.' ); ?></p>
		 
				<?php endif; ?>
			   		   
			</div>

		<!-- END OF CURRENT EXHIBITS LOOP -->
		   

		<?php

		$future_query = new WP_Query(
			array(
				'category_name' => 'rotch-library',
				'meta_key'    => 'start_date',  // Load up the event_date meta.
				'orderby'    => 'start_date',
				'order'       => 'ASC',        // Descending, so later events first.
				'meta_query'  => array(
					array(
						'key'     => 'start_date',     // Which meta to query.
						'value'   => date( 'Y-m-d' ),  // Value for comparison.
						'compare' => '>',             // Method of comparison.
						'type'    => 'DATE',
					), // The meta_query is an array of query items.
				), // End meta_query array.
			) // End array.
		); // Close WP_Query constructor call.
		?> 
			
			<div class="exhibits-feed-section">
				
				<h3 class="title-sub">Upcoming Exhibits</h3>
				 
				<?php if ( $future_query->have_posts() ) :
					while ( $future_query->have_posts() ) : $future_query->the_post(); // Loop for future exhibits.

						get_template_part( 'inc/exhibits-upcoming' );

					endwhile;

					wp_reset_postdata();

				else : ?>
	 
					<p><?php esc_html_e( 'There are no upcoming exhibit announcements at this time. New exhibits are added throughout the year, so please check back.' ); ?></p>
	 
				<?php endif; ?>
		
			</div>
		
		
		<!-- END OF UPCOMING EXHIBITS LOOP -->
		 
		 
		<?php

		$past_query = new WP_Query(
			array(
				'category_name' => 'rotch-library',
				'meta_key'    => 'end_date',  // Load up the event_date meta.
				'orderby'    => 'end_date',
				'order'       => 'DESC',      // Descending, so later events first.
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

				get_template_part( 'inc/exhibits-past' );

				wp_reset_postdata(); // Restore global post data stomped by the_post().

			endwhile; // End of the loop. ?>

			</div>


		<!-- END OF UPCOMING EXHIBITS LOOP -->
    
  		
  		
	  	</div>  <!-- main-content --> 
	
	  	<?php get_sidebar(); ?>
	
		</div>   <!-- content --> 
			
	</div>   <!-- stage --> 
	 
<?php get_footer(); ?>
