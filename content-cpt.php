<?php
/**
 * The template used for displaying archive content for custom post types in category.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $isRoot;

$exhibitThumb = get_field('exhibit_thumbnail_image');
$eventThumb = get_field('event_thumbnail_image');

$subtitle = cf('subtitle');

$startExhibit = get_field('start_date');
$endExhibit = get_field('end_date');

$startEvent = get_field('event_start_date_and_time');
$endEvent = get_field('event_end_date_and_time');
?>


			<div class="category-post">
				<img class="category-post__fig" src="<?php echo $exhibitThumb; ?><?php echo $eventThumb; ?>" height="90" width="90"/>
					<div class="category-post__body">
						<a class="exhibit-title" href="<?php the_permalink(); ?>"><?php the_title();?></a>
						<h3 class="sub-title"><?php echo $subtitle;?></h3>
					<?php if($startExhibit != ""): ?>
						<span class="datespan">(<?php echo $startExhibit; ?> - <?php echo $endExhibit; ?>)</span>
					<?php elseif($startEvent != "" && $endEvent != ""): ?>
						(<?php echo $startEvent; ?> - <?php echo $endEvent; ?>)
						</span>
					<?php elseif($startEvent != "" ): ?>
						<span class="timespan">(<?php echo $startEvent; ?>)
					<?php endif; ?>
						</div>
			</div>


