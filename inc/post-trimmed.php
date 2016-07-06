<?php
/**
 * The template for displaying a trimmed post.
 *
 * @package MIT_Libraries_Child
 * @since 2.0.0
 */

	$postID = get_the_ID();

	if ( is_home() ) {
		$postHeader = '<h2 id="post-'.$postID.'">';
		$closeTag = '</h2>';
	}

	if ( is_search() || is_category() ) {
		$postHeader = '<h3 id="post-'.$postID.'">';
		$closeTag = '</h3>';
	}

?>

<div class="post">

	<?php echo $postHeader; ?><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a><?php echo $closeTag; ?>
	<small>Posted <?php the_time( 'F jS, Y' ) ?> by <?php the_author() ?> </small>
	
	<div class="entry">
		<?php the_content( 'Read the rest of this entry &raquo;' ); ?>
	</div>

	<p class="postmetadata">Posted in <?php the_category( ', ' ) ?> 

	 <?php edit_post_link( '(Edit)' ); ?> </p>

</div>
