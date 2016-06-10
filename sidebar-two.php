<?php
/**
 * The sidebar template that controls the widgetized area below content.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	
<?php if ( is_active_sidebar( 'sidebar-two' ) ) : ?>

	<div id="below" class="widget-area" role="complementary">

		<?php

			dynamic_sidebar( 'sidebar-two' );

		?>

	</div><!-- #secondary -->

<?php endif; ?>
