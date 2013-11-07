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
			<aside class="widget meta">
				<h2>Meta</h2>
				<?php if (is_user_logged_in(1)) {
					echo '<span><a href="'.wp_logout_url().'">Log out</a></span>'; 
					} else {
					echo '<span><a href="'.wp_login_url().'">Log in</a></span>';
					}
				?>
			</aside>
		</div><!-- #secondary -->
	<?php } ?>

