		<div id="sticky-posts-2" class="widget-1 widget-first widget-last widget-odd hide-title widget widget_ultimate_posts" role="complementary">
		<?php

		$custom_query_args = array( 'post_type' => 'post',  'posts_per_page' => 5 );
		if ( is_category() ) {

  			$cur_cat = get_cat_ID( single_cat_title("",false) ); 
			$category = &get_category($cur_cat);
			$cat_slug = $category->slug;
			$custom_query_args[ 'category_name' ] = $cat_slug;	
		}
		// Get current page and append to custom query parameters array
		$custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

		// Instantiate custom query
		$custom_query = new WP_Query( $custom_query_args );

		$temp_query = $wp_query;
		$wp_query   = NULL;
		$wp_query   = $custom_query;

		 if ( $custom_query->have_posts() ) : ?>


		<div class="upw-posts hfeed">
		<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

		<?php $current_post = ($post->ID == $current_post_id && is_single()) ? 'active' : '';

		$custom_fields = get_fields($current_post_id); ?>

		<article <?php post_class( $current_post ); ?>>

		  <header>

		
			  <h4 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark">
				  <?php the_title(); ?>
				</a>
			  </h4>
		
		  </header>
		  
		  <div class="upw-content">
			  
			<?php if ( $custom_fields ) : ?>
			  <?php $custom_field_name = explode( ',', $custom_fields ); ?>
			  <div class="entry-custom-fields">
				<?php foreach ( $custom_field_name as $name ) :
				  $name = trim( $name );
				  $custom_field_values = get_post_meta( $post->ID, $name, true );
				  if ( $custom_field_values ) : ?>
					<span class="custom-field custom-field-<?php echo $name; ?>">
					  <?php
					  if ( ! is_array( $custom_field_values ) ) {

						// For custom fields named "event_date", we pass the value through an additional parsing step.
						if ( 'event_date' === $name ) {
						  $event_date = date_parse_from_format( 'Ymd', $custom_field_values );
						  $custom_field_values = date( 'F j, Y', mktime( 0, 0, 0, $event_date['month'],$event_date['day'],$event_date['year'] ) );
						}

						echo $custom_field_values;

					  } else {
						$last_value = end( $custom_field_values );
						foreach ( $custom_field_values as $value ) {
						  echo $value;
						  if ( $value != $last_value ) { echo ', '; }
						}
					  }
					  ?>
					</span>
				  <?php endif;
				endforeach; ?>
			  </div>
			<?php endif; ?>

			<div class="entry-summary">
				<?php if ( get_first_post_image() ) : ?>
				<img src="<?php echo get_first_post_image(); ?>" width="200" >
				<?php endif; ?>
			  <p>
				<?php echo custom_excerpt(100,'...'); ?>
		
			  </p>
			</div>
		

		  <footer>
			  
				<div class="entry-meta">
					<time class="published" datetime="<?php echo get_the_time( 'c' ); ?>"><?php echo get_the_time( 'F j, Y' ); ?></time>
							
		  	</div>
		</footer>
		  
		  </div>

		</article>
	  <?php endwhile; ?>
	   <?php endif; ?>
<?php
// Reset postdata
wp_reset_postdata();

// Custom query loop pagination
previous_posts_link( 'Newer Posts' );
echo("&nbsp;");
next_posts_link( 'Older Posts', $custom_query->max_num_pages );

// Reset main query object
$wp_query = NULL;
$wp_query = $temp_query;




		?>
		</div>
		</div>