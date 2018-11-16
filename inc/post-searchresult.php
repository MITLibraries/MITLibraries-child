<?php
/**
 * The template for displaying a post as a search result. - DEPRECATED for content-search
 *
 * @package MIT_Libraries_Child
 * @since 2.2.1
 */

$post_id = get_the_ID();

if ( is_home() ) {
	$header_open = '<h2 id="post-' . $post_id . '">';
	$header_close = '</h2>';
}

if ( is_search() || is_category() ) {
	$header_open = '<h3 id="post-' . $post_id . '">';
	$header_close = '</h3>';
}

$allowed = array(
	'h2' => array(
		'id' => array(),
	),
	'h3' => array(
		'id' => array(),
	),
);

?>

<div class="post">

	<?php echo wp_kses( $header_open, $allowed ); ?>
		<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
			<?php the_post_thumbnail( array( 50, 50 ) ); ?>
			<?php the_title(); ?>
		</a>
	<?php echo wp_kses( $header_close, $allowed ); ?>
	
	<?php edit_post_link( '(Edit)' ); ?> </p>

</div>
