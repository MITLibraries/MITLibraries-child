<?php
/**
 * The sub-template used by page-exhibits-feed.php, category-rotch-library.php
 * and category-maihaugen-gallery.php for displaying Past Exhibits.
 *
 * @package MIT_Libraries_Child
 * @since 2.0.0
 */

global $isRoot;

?>

<?php
// Get today's date in the right format.
$todaysDate = date( 'm/d/Y H:i:s' );
?>


			<div class="exhibits-feed">
				<div class="entry-categories">
					<div class="entry-cats-list">
						<?php foreach ( (get_the_category()) as $category ) { ?>
							<a href="/exhibits/about/"><span class="category-bg"><span class="category-init"><?php echo esc_attr( substr( $category->cat_name,0,1 ) ); ?></span></span><span class="cat-name"><?php echo esc_attr( $category->cat_name ); ?> Exhibit</span></a>
						<?php } ?>
					</div>
				</div>
              	
				<div class="category-post">
					<div class="category-image" style="background-image: url('<?php get_stylesheet_directory_uri();
the_field( 'exhibit_thumbnail_image' ); ?>');">
					</div>
					<div class="category-post-content">
						<h4><a class="exhibit-title" href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
						<div class="entry-summary">
							<p><?php custom_excerpt( 35, '...' ) ?></p>
						</div>
						<div class="exhibit-ends">
							Opens <?php the_field( 'start_date' ); ?>
						</div>
					</div>
				</div>

				<?php if ( get_field( 'sponsored' ) ) : ?>
				<div class="sponsored-excerpt">
					<?php the_field( 'sponsored' ); ?>
				</div>
				<?php endif; ?>
			</div>
