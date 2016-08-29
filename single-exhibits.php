<?php
/**
 *
 * This is the template that displays single posts
 *
 * @package MIT_Libraries_Child
 * @since 2.1.0
 */

get_header();

get_template_part( 'inc/breadcrumbs', 'child' );

?>

<div id="stage" class="inner" role="main">

	<?php get_template_part( 'inc/postHead' ); ?>

	<div id="content" class="content has-sidebar">

		<div class="content-main main-content">

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="article-head">

					<h2><?php the_title(); ?></h2>

					<p class="entry-meta">
						
						<?php the_field( 'start_date' );?> 
						
						- 
						
						<?php the_field( 'end_date' );

							$cats = array();
						foreach ( get_the_category( $post_id ) as $cat ) {
							$categ = get_category( $cat );
							array_push( $cats, $categ -> name );
						}

						$post_categories = implode( ', ', $cats );

						echo ' in ' . esc_html( $post_categories );

					?>
					
					</p>

				</div>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>

			<?php endwhile; // End of the loop. ?>
		</div>

		<?php get_sidebar(); ?>
	</div>

</div><!-- end div#stage -->

<?php get_footer(); ?>
