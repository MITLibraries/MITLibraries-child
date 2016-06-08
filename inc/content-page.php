<?php
/**
 * The template used for displaying
 * page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<div class="main-content content-main">
	
	<div class="entry-content">
		<?php $title = get_the_title(); if ( $title != '' ) : ?>
			<?php if ( !is_front_page() ) { echo '<h1>'.$title.'</h1>'; } ?>
		<?php endif; ?>

		<?php the_content(); ?>
	</div>

</div>