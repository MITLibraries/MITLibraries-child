<?php
/**
 * The sub-template used by page-exhibits-home.php, page-exhibits-feed.php,
 * category-rotch-library.php and category-maihaugen-gallery.php for
 * displaying Current Exhibits.
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

							<a href="<?php echo esc_url( $cat_link ); ?>"><span class="category-bg"><span class="category-init"><?php echo esc_attr( substr( get_field( 'location' ),0,1 ) ); ?></span></span><span class="cat-name"><?php the_field( 'location' ) ?> Exhibit</span></a>
					
					</div>
		</div>

		<div class="category-post">
					<div class="category-image" style="background-image: url('<?php get_stylesheet_directory_uri();
the_field( 'exhibit_thumbnail_image' ); ?>');">
					</div>
					<div class="category-post-content">
						<h4><a class="exhibit-title" href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
						<div class="entry-summary">
						 <?php if ( get_field( 'excerpt' ) ) { ?>
			               	<p><?php the_field( 'excerpt' ); ?></p>
					     <?php  } else { ?>
			              	<p><?php custom_excerpt( 35, '...' ) ?></p>
			            <?php } ?>
						</div>
						<div class="exhibit-ends">

						<?php 
						$today = new DateTime(date( 'Y-m-d' ));
						$start = new DateTime(get_field( 'start_date' ));
						$end = new DateTime(get_field( 'end_date' ));
						
						if ( $end < $today ) { ?>	
							Ended <?php the_field( 'end_date' ); ?>
						<?php } elseif ($start > $today ) { ?>
							Opens <?php the_field( 'start_date' ); ?>
						<?php } else { ?>	
							<?php the_field( 'start_date' ); ?> - <?php the_field( 'end_date' ); 			
						 } ?>
						</div>
					</div>
				</div>

				<?php if ( get_field( 'sponsored' ) ) : ?>
					<div class="sponsored-excerpt">
					<?php the_field( 'sponsored' ); ?>
					</div>
				<?php endif; ?>

			</div>
