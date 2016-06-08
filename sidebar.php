<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	
<?php if (is_active_sidebar('sidebar')): ?>

	<div id="secondary" class="widget-area sidebar" role="complementary">

		<?php

			dynamic_sidebar( 'sidebar' );

			// Show Login/Logout for News blog
			$blogName = get_bloginfo('name');
			if($blogName == 'MIT Libraries News'):

		?>

			<aside class="widget admin">
				<h2>Admin</h2>
				<?php if (is_user_logged_in(1)) {
					echo '<span><a href="'.wp_logout_url().'">Log out</a></span>';
					} else {
					echo '<span><a href="'.wp_login_url().'">Log in</a></span>';
					}
				?>
			</aside>

		<?php endif; ?>

	</div><!-- #secondary -->

<?php endif; ?>