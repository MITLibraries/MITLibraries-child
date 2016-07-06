<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package MIT_Libraries_Child
 * @since Twenty Twelve 1.0
 */

?>

<div class="main-content content-main">
	
	<div class="entry-content">
		<?php
		$title = get_the_title();
		if ( '' !== $title ) :
			if ( ! is_front_page() ) { echo '<h1>' . esc_html( $title ) . '</h1>'; }
		endif;

		the_content();
		?>
	</div>

</div>
