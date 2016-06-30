<?php
/**
 * The template used for displaying page content in page-front.php
 *
 * @package MIT_Libraries_Child
 * @since Twenty Twelve 1.0
 */

global $isRoot;
?>


<div class="main-content content-main">
	
	<div class="entry-content">
		
<?php
// Get array of sticky posts.
$sticky = get_option( 'sticky_posts' );

// If no sticky posts, skip this whole section.
if ( count( $sticky ) > 0 ) {

	// Build WP query.
	$args = array(
		'posts_per_page' => 5,
		'post__in' => $sticky,
		'ignore_sticky_posts' => 1,
	);

	// Execute query.
	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) {

		while ( $the_query->have_posts() ) :
			$the_query->the_post();
?>

		<div class="excerpt-post">
			<?php if ( get_first_post_image() ) : ?>
			<img class="excerpt-post__fig" src="<?php echo esc_attr( get_first_post_image() ); ?>" width="200" >
			<?php endif; ?>
			<div class="excerpt-post__body">
				<h3><a href="<?php echo the_permalink();?>"><?php echo get_the_title();?></a></h3>
				<?php custom_excerpt( 20, '...' ) ?>
			</div>
		</div>

<?php
		endwhile;

		wp_reset_postdata();

	} // End "have posts".
} // End "if no sticky posts".

the_content();

if ( is_active_sidebar( 'sidebar-two' ) ) :
	dynamic_sidebar( 'sidebar-two' );
endif;
?>
	
	</div><!-- end div.entry-content -->
		
</div><!-- end div.main-content -->
