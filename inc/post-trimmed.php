<?php
/**
 * The template for displaying a trimmed post.
 *
 * @package MIT_Libraries_Child
 * @since 2.0.0
 */

	$postID = get_the_ID();

	if ( is_home() ) {
		$postHeader = '<h2 class="article-title" id="post-'.$postID.'">';
		$closeTag = '</h2>';
	}

	if ( is_search() || is_category() ) {
		$postHeader = '<h3 class="article-title" id="post-'.$postID.'">';
		$closeTag = '</h3>';
	}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="article-head">
		<?php echo $postHeader; ?><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a><?php echo $closeTag; ?>
		<p class="entry-meta">Posted <?php the_time( 'F jS, Y' ) ?> by <?php the_author() ?></p>
	</header>
	
	<div class="entry-content">
		<?php the_content( 'Read the rest of this entry &raquo;' ); ?>
	</div>

	<footer class="entry-meta">
		<p class="postmetadata entry-meta">Posted in <?php the_category( ', ' ) ?> 
		<?php edit_post_link( '(Edit)' ); ?> </p>
	</footer>
</article>
