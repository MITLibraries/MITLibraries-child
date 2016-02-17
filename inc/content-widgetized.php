<?php
/**
 * The template used for displaying
 * page content for Widgetized Page
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $isRoot;
?>

<?php

	$pageRoot = getRoot($post);
	$section = get_post($pageRoot);

?>


<div class="main-content">
	
	<div class="entry-content">
		<?php $title = get_the_title(); if ($title != ""): ?>
			<?php if(!is_front_page()) { echo "<h1>".$title."</h1>"; } ?>
		<?php endif; ?>

		<?php the_content(); ?>
		
		<?php dynamic_sidebar( 'sidebar-two' ); ?>

	</div>
	
		
</div>