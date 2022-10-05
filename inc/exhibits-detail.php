<?php
/**
 * The sub-template used by page-exhibits-home.php, page-exhibits-feed.php,
 * category-rotch-library.php and category-maihaugen-gallery.php for
 * displaying Current Exhibits.
 *
 * @package MIT_Libraries_Child
 * @since 2.0.0
 */

$location_info = get_exhibit_location();
?>

<div class="exhibits-feed">
	<div class="entry-categories">
		<div class="entry-cats-list">
			<span class="category-bg"><span class="category-init"><?php echo esc_html( $location_info['initial'] ); ?></span></span><span class="cat-name"><?php echo esc_html( $location_info['name'] ); ?> Exhibit</span>
		</div>
	</div>
	<div class="category-post">
		<div class="category-image" style="background-image: url('<?php get_stylesheet_directory_uri(); ?>
			<?php the_field( 'exhibit_thumbnail_image' ); ?>');">
		</div>
		<div class="category-post-content">
			<h4><a class="exhibit-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<div class="entry-summary">
				<?php if ( get_field( 'excerpt' ) ) { ?>
					<p><?php the_field( 'excerpt' ); ?></p>
				<?php } else { ?>
					<p><?php custom_excerpt( 35, '...' ); ?></p>
				<?php } ?>
			</div>
			<div class="exhibit-ends">
				<?php
				$today = new DateTime( gmdate( 'Y-m-d' ) );
				$start = new DateTime( get_field( 'start_date' ) );
				$end = new DateTime( get_field( 'end_date' ) );
				if ( $end < $today ) {
					?>
					Ended <?php the_field( 'end_date' ); ?>
				<?php } elseif ( $start > $today ) { ?>
					Opens <?php the_field( 'start_date' ); ?>
				<?php } else { ?>
					<?php the_field( 'start_date' ); ?> - <?php the_field( 'end_date' ); ?>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php if ( get_field( 'sponsored' ) ) : ?>
		<div class="sponsored-excerpt">
		<?php the_field( 'sponsored' ); ?>
		</div>
	<?php endif; ?>
</div>
