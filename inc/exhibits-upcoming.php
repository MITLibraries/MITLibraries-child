<?php
/**
 * The sub-template used by page-exhibits-feed.php, category-rotch-library.php and category-maihaugen-gallery.php for displaying Past Exhibits.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $isRoot;

?>

<?php // Get today's date in the right format
$todaysDate = date( 'm/d/Y H:i:s' );
?>


			<div class="exhibits-feed">
				<div class="entry-categories">
	                <div class="entry-cats-list">
		                <?php
						foreach((get_the_category()) as $category) {
							echo '<a href="/exhibits/about-alternate/">' . '<span class="category-bg"><span class="category-init">' . (substr( $category->cat_name,0,1 ))  . '</span></span>' . '<span class="cat-name">' . $category->cat_name . ' Exhibit' . '</span>' . '</a>';
						}
						?>
					</div>
              	</div>
              	
              	<div class="category-post">
					<div class="category-image" style="background-image: url('<?php get_stylesheet_directory_uri(); the_field( 'exhibit_thumbnail_image' ); ?>');">
					</div>
					<div class="category-post-content">
						<h4><a class="exhibit-title" href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
			            <div class="entry-summary">
			              <p><?php custom_excerpt( 35, '...' ) ?></p>
						</div>
						<div class="exhibit-ends">
							Starts <?php the_field( 'start_date' ); ?>
						</div>
					</div>
            	</div>

              	<?php if (get_field( 'sponsored' )) : ?>
	              	<div class="sponsored-excerpt">
					<?php the_field( 'sponsored' ); ?>
					</div>
				<?php endif; ?>

			</div>