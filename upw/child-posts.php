<?php
/**
 * Custom template to display post excerpts when using ultimate posts widget
 *
 * @package MIT_Libraries_Child
 * @since 2.0.0
 */

?>

<?php if ( $instance['before_posts'] ) : ?>
  <div class="upw-before">
    <?php echo wpautop( $instance['before_posts'] ); ?>
  </div>
<?php endif; ?>

<div class="upw-posts hfeed">

  <?php if ( $upw_query->have_posts() ) : ?>

      <?php while ( $upw_query->have_posts() ) : $upw_query->the_post(); ?>

        <?php $current_post = ($post->ID == $current_post_id && is_single()) ? 'active' : ''; ?>

        <article <?php post_class( $current_post ); ?>>

          <header>

            <?php if ( get_the_title() && $instance['show_title'] ) : ?>
              <h4 class="entry-title">
                <a href="<?php the_permalink(); ?>" rel="bookmark">
                  <?php the_title(); ?>
                </a>
              </h4>
            <?php endif; ?>

          </header>
          
          <div class="upw-content">
	          
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
						if ( 'event_date' === $name ) {
						  // Generally speaking, we need to reformat a _string_ in YYYYMMDD format into 'December 10, 2014'.
						  $event_date = date_parse_from_format( 'Ymd', $custom_field_values );
						  // Because PHP sucks, we have to make this array into a timestamp, and then into the string we desire.
						  $custom_field_values = date( 'F j, Y', mktime( 0, 0, 0, $event_date['month'],$event_date['day'],$event_date['year'] ) );
						}

						echo $custom_field_values;

					  } else {
						$last_value = end( $custom_field_values );
						foreach ( $custom_field_values as $value ) {
						  echo $value;
						  if ( $value != $last_value ) { echo ', '; }
						}
					  }
					  ?>
                    </span>
                  <?php endif;
				endforeach; ?>
              </div>
            <?php endif; ?>
            

          <?php if ( $instance['show_excerpt'] ) : ?>
            <div class="entry-summary">
	            <?php if ( get_first_post_image() ) : ?>
				<img src="<?php echo get_first_post_image(); ?>" width="200" >
		        <?php endif; ?>
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

          <footer>
	          
	        <div class="entry-meta">
            
						<?php if ( $instance['show_date'] || $instance['show_author'] || $instance['show_comments'] ) : ?>

							<?php if ( $instance['show_date'] ) : ?>
								<time class="published" datetime="<?php echo get_the_time( 'c' ); ?>"><?php echo get_the_time( $instance['date_format'] ); ?></time>
							<?php endif; ?>

							<?php if ( $instance['show_date'] && $instance['show_author'] ) : ?>
								<span class="sep"><?php _e( '|', 'upw' ); ?></span>
							<?php endif; ?>

							<?php if ( $instance['show_author'] ) : ?>
								<span class="author vcard">
								<?php echo __( 'By', 'upw' ); ?>
									<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author" class="fn">
									<?php echo get_the_author(); ?>
									</a>
								</span>
							<?php endif; ?>

							<?php if ( $instance['show_author'] && $instance['show_comments'] ) : ?>
								<span class="sep"><?php _e( '|', 'upw' ); ?></span>
							<?php endif; ?>

							<?php if ( $instance['show_comments'] ) : ?>
								<a class="comments" href="<?php comments_link(); ?>">
									<?php comments_number( __( 'No comments', 'upw' ), __( 'One comment', 'upw' ), __( '% comments', 'upw' ) ); ?>
								</a>
							<?php endif; ?>

						<?php endif; ?>

						<?php
						  $categories = get_the_term_list( $post->ID, 'category', '', ', ' );
						if ( $instance['show_cats'] && $categories ) :
						?>
							<span class="entry-categories">
								<span class="entry-cats-list"> &middot; <?php echo esc_attr( $categories ); ?></span>
							</span>
						<?php endif; ?>
            
          </div>


            <?php
			$tags = get_the_term_list( $post->ID, 'post_tag', '', ', ' );
			if ( $instance['show_tags'] && $tags ) :
			?>
              <div class="entry-tags">
                <strong class="entry-tags-label"><?php _e( 'Tagged', 'upw' ); ?>:</strong>
                <span class="entry-tags-list"><?php echo $tags; ?></span>
              </div>
            <?php endif; ?>

          </footer>
          
          </div>

        </article>

      <?php endwhile; ?>

  <?php else : ?>

    <p class="upw-not-found">
      <?php _e( 'No posts found.', 'upw' ); ?>
    </p>

  <?php endif; ?>

</div>

<?php if ( $instance['after_posts'] ) : ?>
  <div class="upw-after">
    <?php echo wpautop( $instance['after_posts'] ); ?>
  </div>
<?php endif; ?>
