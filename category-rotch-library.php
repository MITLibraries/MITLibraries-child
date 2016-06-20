<?php
/*
 * The template for displaying Category pages for Rotch Library on Exhibits site.
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
	          'category_name'	=> 'rotch-library',
	          'meta_key'    => 'end_date',  // load up the event_date meta
	          'order_by'    => 'end_date',
	          'order'       => 'desc',         // descending, so later events first
	          'meta_query'  => array(
	             array(        
	              'key'     => 'end_date',  // which meta to query
	              'value'   => date( "Y-m-d" ),  // value for comparison
	              'compare' => '>=',          // method of comparison
	              'type'    => 'DATE'          
	            ) // meta_query is an array of query ites
	           ) // end meta_query array
	          ) // end array
	        ); // close WP_Query constructor call
        ?> 
        
        	<div class="exhibits-feed-section">
			
				<h3 class="exhibits">Current Exhibits</h3>   
						 
		   <?php if($current_query->have_posts()): $current_query->the_post(); { //loop for current exhibits 
		       
		       get_template_part( 'inc/exhibits-current' );
		       
		       } else: {
			       
			       ?>
			       
			       <p>There are no current exhibits at this time, but check back often.</p>
			       
			       <?php } ?>
		       
		       <?php wp_reset_query(); // Restore global post data stomped by the_post(). 
			
		endif; ?>
			   		   
			</div>

		<!---- END OF CURRENT EXHIBITS LOOP --->
		   

		<?php
			
			$date2 = DateTime::createFromFormat( 'Ymd', get_field( 'start_date' ) );
	
		$future_query = new WP_Query(
	        array( 
	          'category_name'	=> 'rotch-library',
	          'meta_key'    => 'start_date',  // load up the event_date meta
	          'order_by'    => 'start_date',
	          'order'       => 'desc',         // descending, so later events first
	          'meta_query'  => array(
	             array(        
	              'key'     => 'start_date',  // which meta to query
	              'value'   => date( "Y-m-d" ),  // value for comparison
	              'compare' => '>=',          // method of comparison
	              'type'    => 'DATE'          
	            ) // meta_query is an array of query ites
	           ) // end meta_query array
	          ) // end array
	        ); // close WP_Query constructor call
		?> 
			
			<div class="exhibits-feed-section">
				
				<h3 class="exhibits">Upcoming Exhibits</h3>   

			<?php if($future_query->have_posts()): $future_query->the_post(); { //loop for upcoming exhibits 
	       
				get_template_part( 'inc/exhibits-upcoming' );
	       
				} else: {
	        
	        ?>
	        
				<p>There are no upcoming exhibits at this time, but check back often.</p>
						
				<?php } ?>       
    
		<?php wp_reset_query(); // Restore global post data stomped by the_post(). 
	
		endif; ?>
		
			</div>
		
		
		<!---- END OF UPCOMING EXHIBITS LOOP ----->
		 
		 
		<?php
			
			$date3 = DateTime::createFromFormat( 'Ymd', get_field( 'end_date' ) );
		
		$past_query = new WP_Query(
	        array( 
	          'category_name'	=> 'rotch-library',
	          'meta_key'    => 'end_date',  // load up the event_date meta
	          'order_by'    => 'end_date',
	          'order'       => 'desc',         // descending, so later events first
	          'meta_query'  => array(
	             array(         
	              'key'     => 'end_date',  // which meta to query
	              'value'   => date( "Y-m-d" ),  // value for comparison
	              'compare' => '<',          // method of comparison
	              'type'    => 'DATE'          
	            ) // meta_query is an array of query ites
	           ) // end meta_query array
	          ) // end array
	        ); // close WP_Query constructor call
	        
		?> 
		
			<div class="exhibits-feed-section">
			
				<h3 class="exhibits">Past Exhibits</h3>   
							 
		   <?php while($past_query->have_posts()): $past_query->the_post(); //loop for events 
		       
		       get_template_part( 'inc/exhibits-past' );
		       
		       wp_reset_query(); // Restore global post data stomped by the_post(). 
			
			   endwhile; // end of the loop. ?>

			</div>


		<!--- END OF UPCOMING EXHIBITS LOOP --->
    
  		
  		
	  	</div>  <!-- main-content --> 
	
	  	<?php get_sidebar(); ?>
	
		</div>   <!-- content --> 
			
	</div>   <!-- stage --> 
	 
<?php get_footer(); ?>