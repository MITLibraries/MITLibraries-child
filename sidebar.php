<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
		<div id="secondary" class="widget-area sidebar" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
	<?php } else {
		echo "<strong>Nothing to see here!</strong>";
	}
	 ?>

