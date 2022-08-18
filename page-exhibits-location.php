<?php
/**
 * Template Name: Exhibits | Location Index
 *
 * @package MIT_Libraries_Child
 * @since Twenty Twelve 1.0
 *
 * This template displays relevant exhibits for a given location, specified
 * in page content by assigning the page to a given category.
 *
 * To use this template:
 * 1. Create a Page record. The title and body are irrelevant and are not
 *    displayed by this template.
 * 2. Assign the Page a single Category value for the location you wish to
 *    display (For example, "Rotch Library"). PLEASE NOTE: assigning multiple
 *    Category values to the Page should be avoided - only the first value
 *    returned by get_the_category() will be used.
 * 3. Set the Page to display using this page template.
 * 4. The page will now show Exhibit records which share the same category.
 */

get_header( 'child' );

// Pages using this template should have one and only one category value. If
// the page is placed in multiple categories, then the first term returned here
// will determine which sets of exhibits get displayed.
$categories    = get_the_category();
$location_name = $categories[0]->name;
?>

	<?php get_template_part( 'inc/breadcrumbs', 'child' ); ?>

	<div id="stage" class="inner" role="main">

	<?php get_template_part( 'inc/postHead' ); ?>

		<div id="content" class="content has-sidebar">

			<div class="main-content">

			<?php

			$current_query = new WP_Query(
				array(
					'post_type'           => 'exhibits',  // Only query exhibits.
					'category_name'       => $location_name,
					'posts_per_page'      => 10,
					'ignore_sticky_posts' => false,
					'meta_key'            => 'start_date',
					'orderby'             => 'start_date',
					'order'               => 'DESC',      // Descending, so later events first.
					'meta_query'          => array( // The meta_query is an array of query items.
						'relation' => 'AND',
						array(
							'key'     => 'start_date',     // Which meta to query.
							'value'   => gmdate( 'Y-m-d' ),  // Value for comparison.
							'compare' => '<=',             // Method of comparison.
							'type'    => 'DATE',
						),
						array( // Either exhibits with a future end date, or with no end date.
							'relation' => 'OR',
							array(
								'key'     => 'end_date',       // Which meta to query.
								'value'   => gmdate( 'Y-m-d' ),  // Value for comparison.
								'compare' => '>=',             // Method of comparison.
								'type'    => 'DATE',
							),
							array(
								'key'     => 'end_date',       // Which meta to query.
								'value'   => '',  // Value for comparison.
								'compare' => '=',             // Method of comparison.
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
				'post_type'      => 'exhibits',  // Only query exhibits.
				'category_name'  => $location_name,
				'meta_key'       => 'start_date',
				'posts_per_page' => 10,
				'orderby'        => 'start_date',
				'order'          => 'ASC',        // Descending, so later events first.
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
				'post_type'      => 'exhibits',  // Only query exhibits.
				'category_name'  => $location_name,
				'meta_key'       => 'end_date',
				'posts_per_page' => 5,
				'orderby'        => 'end_date',
				'order'          => 'DESC',      // Descending, so later events first.
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
			<!-- END OF UPCOMING EXHIBITS LOOP -->
			<a class="button-secondary exhibits-button" href="/exhibits/past-exhibits/">View all past exhibits</a>

		</div>  <!-- main-content --> 

		<?php get_sidebar(); ?>

		</div>   <!-- content --> 

	</div>   <!-- stage --> 

<?php get_footer(); ?>
