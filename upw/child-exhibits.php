<?php
/**
 * Custom template to display Exhibit post excerpts when using ultimate posts widget
 *
 * @package MIT_Libraries_Child
 * @since 2.0.0
 */

	$exhibitThumb = get_field( 'exhibit_thumbnail_image' );

?>

<?php if ( $instance['before_posts'] ) : ?>
  <div class="upw-before">
    <?php echo wpautop( $instance['before_posts'] ); ?>
  </div>
<?php endif; ?>

<div class="upw-posts hfeed exhibits-feed">

  <?php if ( $upw_query->have_posts() ) : ?>

      <?php while ( $upw_query->have_posts() ) : $upw_query->the_post(); ?>

        <?php $current_post = ($post->ID == $current_post_id && is_single()) ? 'active' : ''; ?>

    <article <?php post_class( $current_post ); ?>>

        <header>
	          
	        <?php
	            $categories = get_the_term_list( $post->ID, 'category', '', ', ' );
	            if ( $instance['show_cats'] && $categories ) :
			?>
              <div class="entry-categories">
                <div class="entry-cats-list"><?php
foreach ( (get_the_category()) as $category ) {
	echo '<span class="category-bg"><span class="category-init">' . (substr( $category->cat_name,0,1 ))  . '</span></span>' . '<span class="catName">' . $category->cat_name . ' Exhibit' . '</span> ';
}
?></div>
              </div>
            <?php endif; ?>

        </header>
          
        <div class="upw-content category-post">
	          
	        <div class="category-image">
	           <?php if ( current_theme_supports( 'post-thumbnails' ) && $instance['show_thumbnail'] && has_post_thumbnail() ) : ?>
              <div class="entry-image">
                <a href="<?php the_permalink(); ?>" rel="bookmark">
                  <?php the_post_thumbnail( $instance['thumb_size'] ); ?>
               </a>
              </div>
            
            <?php endif; ?>
	        </div>

			<div class="category-post-content">
            <?php if ( get_the_title() && $instance['show_title'] ) : ?>
              <h4 class="entry-title">
                <a href="<?php the_permalink(); ?>" rel="bookmark">
                  <?php the_title(); ?>
                </a>
              </h4>
            <?php endif; ?>
	                     
          <?php if ( $instance['show_excerpt'] ) : ?>
            <div class="entry-summary">
              <p>
                <?php echo get_the_excerpt(); ?>
                <?php if ( $instance['show_readmore'] ) : ?>
                  <a href="<?php the_permalink(); ?>" class="more-link"><?php echo $instance['excerpt_readmore']; ?></a>
                <?php endif; ?>
              </p>
            </div>
          <?php elseif ( $instance['show_content'] ) : ?>
            <div class="entry-content">
              <?php the_content() ?>
            </div>
          <?php endif; ?>
          
          <?php if ( $custom_fields ) : ?>
              <?php $custom_field_name = explode( ',', $custom_fields ); ?>
              <div class="entry-custom-fields">
                <?php foreach ( $custom_field_name as $name ) :
				  $name = trim( $name );
				  $custom_field_values = get_post_meta( $post->ID, $name, true );
				  if ( $custom_field_values ) : ?>
                    <span class="custom-field custom-field-<?php echo $name; ?>">
                      <?php
					  if ( ! is_array( $custom_field_values ) ) {

						// For custom fields named "event_date", we pass the value through an additional parsing step.
						if ( 'end_date' === $name ) {
						  // Generally speaking, we need to reformat a _string_ in YYYYMMDD format into 'December 10, 2014'.
						  $event_date = date_parse_from_format( 'Ymd', $custom_field_values );
						  // Because PHP sucks, we have to make this array into a timestamp, and then into the string we desire.
						  $custom_field_values = date( 'F j, Y', mktime( 0, 0, 0, $event_date['month'],$event_date['day'],$event_date['year'] ) );
						}

						if ( 'end_date' === $name ) { ?>
	                       <div class="exhibit-ends">
	                       	<?php echo 'Ends ' . $custom_field_values; } ?>
	                       </div>
                      
                       <?php

					  } else {
						$last_value = end( $custom_field_values );
						foreach ( $custom_field_values as $value ) {
						  echo $value;
						  if ( $value != $last_value ) { echo ' , '; }
						}
					  }
					  ?>
                    </span>
                  <?php endif;
				endforeach; ?>
              </div> <!---- End of .entry-custom-fields ---->
            <?php endif; ?>
          
          </div> <!---- End of .category-post-content ---->
          
        </div> <!---- End of .upw-content + .category-post ---->

    </article>

      <?php endwhile; ?>

  <?php else : ?>

    <p class="upw-not-found">
      <?php _e( 'No posts found.', 'upw' ); ?>
    </p>

  <?php endif; ?>

</div> <!---- End of .upw-posts + .exhibits-feed ---->

<?php if ( $instance['after_posts'] ) : ?>
  <div class="upw-after">
    <?php echo wpautop( $instance['after_posts'] ); ?>
  </div>
<?php endif; ?>
