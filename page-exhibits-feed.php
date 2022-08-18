<?php
/**
 * Template Name: Exhibits | Current, Upcoming & Past
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

			$current_query = new WP_Query(
				array(
					'posts_per_page'      => 10,
					'ignore_sticky_posts' => false,
					'post_type'           => 'exhibits',  // Only query exhibits.
					'meta_key'            => 'start_date',  // Load up the event_date meta.
					'orderby'             => 'start_date',
					'order'               => 'DESC',      // Descending, so later events first.
					'meta_query'          => array( // The meta_query is an array of query items.
						array(
							'key'     => 'start_date',     // Which meta to query.
							'value'   => gmdate( 'Y-m-d' ),  // Value for comparison.
							'compare' => '<=',             // Method of comparison.
							'type'    => 'DATE',
						),
						array(
							'relation' => 'OR',
							array(
								'key'     => 'end_date',        // Which meta to query.
								'value'   => gmdate( 'Y-m-d' ), // Value for comparison.
								'compare' => '>=',              // Method of comparison.
								'type'    => 'DATE',
							),
							array(
								'key'     => 'end_date',       // Which meta to query.
								'value'   => '',               // Value for comparison.
								'compare' => '=',              // Method of comparison.
								'type'    => 'CHAR',
							),
						),
					), // End meta_query array.
				) // End array.
			); // Close WP_Query constructor call.
			?>

			<div class="exhibits-feed-section">
			
				<h3 class="title-sub">Current Exhibits</h3>
						 
				<?php
				if ( $current_query->have_posts() ) :
					while ( $current_query->have_posts() ) :
						$current_query->the_post(); // Loop for current exhibits.

						get_template_part( 'inc/exhibits-detail' );

					endwhile;

						wp_reset_postdata();

				else :
					?>
		 
					<p><?php esc_html_e( 'There are no current exhibit announcements at this time. New exhibits are added throughout the year, so please check back.' ); ?></p>
		 
				<?php endif; ?>
					   
			</div>

		<!-- END OF CURRENT EXHIBITS LOOP -->
		   

		<?php

		$future_query = new WP_Query(
			array(
				'post_type'      => 'exhibits',    // Only query exhibits.
				'meta_key'       => 'start_date',  // Load up the event_date meta.
				'orderby'        => 'start_date',
				'order'          => 'ASC',
				'posts_per_page' => 10,       // Descending, so later events first.
				'meta_query'     => array(
					array(
						'key'     => 'start_date',     // Which meta to query.
						'value'   => gmdate( 'Y-m-d' ),  // Value for comparison.
						'compare' => '>',             // Method of comparison.
						'type'    => 'DATE',
					), // The meta_query is an array of query items.
				), // End meta_query array.
			) // End array.
		); // Close WP_Query constructor call.
		?>
			
			<div class="exhibits-feed-section">
				
				<h3 class="title-sub">Upcoming Exhibits</h3>
				 
				<?php
				if ( $future_query->have_posts() ) :
					while ( $future_query->have_posts() ) :
						$future_query->the_post(); // Loop for future exhibits.

						get_template_part( 'inc/exhibits-detail' );

					endwhile;

					wp_reset_postdata();

				else :
					?>
	 
					<p><?php esc_html_e( 'There are no upcoming exhibit announcements at this time. New exhibits are added throughout the year, so please check back.' ); ?></p>
	 
				<?php endif; ?>
		
			</div>
		
		
			<!-- END OF UPCOMING EXHIBITS LOOP -->
			 
			 
			<?php

			$past_query = new WP_Query(
				array(
					'post_type'      => 'exhibits',  // Only query events.
					'meta_key'       => 'end_date',  // Load up the event_date meta.
					'orderby'        => 'end_date',
					'order'          => 'DESC',      // Descending, so later events first.
					'posts_per_page' => 5,
					'meta_query'     => array(
						array(
							'key'     => 'end_date',       // Which meta to query.
							'value'   => gmdate( 'Y-m-d' ),  // Value for comparison.
							'compare' => '<',              // Method of comparison.
							'type'    => 'DATE',
						), // The meta_query is an array of query items.
					), // End meta_query array.
				) // End array.
			); // Close WP_Query constructor call.
			?>

			<div class="exhibits-feed-section">
			
				<h3 class="title-sub">Past Exhibits</h3>
				 
				<?php
				while ( $past_query->have_posts() ) :
					$past_query->the_post(); // Loop for events.

					get_template_part( 'inc/exhibits-detail' );

					wp_reset_postdata(); // Restore global post data stomped by the_post().

				endwhile; // End of the loop.
				?>

			</div>

			<a class="button-secondary exhibits-button" href="/exhibits/past-exhibits/">View all past exhibits</a>

		<!-- END OF PAST EXHIBITS LOOP -->
	
		
		
		</div>  <!-- main-content --> 
	
		<?php get_sidebar(); ?>
	
		</div>   <!-- content --> 
			
	</div>   <!-- stage --> 
	 
<?php get_footer(); ?>
