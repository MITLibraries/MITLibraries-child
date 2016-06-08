<?php
/**
 * The template used for displaying
 * page content in page-front.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $isRoot;
?>


<div class="main-content content-main">
	
	<div class="entry-content">
		
				<?php
				$sticky = get_option( 'sticky_posts' );
				rsort( $sticky );
				$sticky = array_slice( $sticky, 0, 5 );
				$the_query = new WP_Query( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) );
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
				?>
				
				<div class="excerpt-post">
					<img class="excerpt-post__fig"  src="<?php echo get_first_post_image(); ?>" width="200" >
					<div class="excerpt-post__body">
		                <h3><a href="<?php echo the_permalink();?>"><?php echo get_the_title();?></a></h3>
		                <?php custom_excerpt( 20, '...' ) ?>
					</div>
				</div>
				
				<?php } wp_reset_postdata(); ?>

		<?php the_content(); ?>
		
		</div>
	
		
</div>