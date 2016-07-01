<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package MIT_Libraries_Child
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<?php get_template_part( 'inc/breadcrumbs', 'child' ); ?>

		<div id="stage" class="inner group" role="main">

			<?php get_template_part( 'inc/postHead' ); ?>

			<div id="content" class="allContent hasSidebar group">

				<div class="mainContent group">

					<?php if ( have_posts() ) : ?>

						<h2 class="page-title search-title"><?php printf( __( 'Search Results for: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

						<?php twentytwelve_content_nav( 'nav-above' ); ?>

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							
							<?php get_template_part( 'inc/post', 'trimmed' ); ?>

						<?php endwhile; ?>

						<?php twentytwelve_content_nav( 'nav-below' ); ?>

					<?php else : ?>

						<article id="post-0" class="post no-results not-found">

								<h2 class="entry-title search-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h2>

							<div class="entry-content">
								<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentytwelve' ); ?></p>
								<?php get_search_form(); ?>
							</div><!-- .entry-content -->
						</article><!-- #post-0 -->

					<?php endif; ?>

		</div><!-- .mainContent -->
		<?php get_sidebar(); ?>
	</div><!-- .allContent -->
</div><!-- #stage -->
<?php get_footer(); ?>
