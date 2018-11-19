<?php
/**
 *  The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package MIT_Libraries_Child
 * @since 2.2.2
 */

get_header( 'child' ); ?>

<?php get_template_part( 'inc/breadcrumbs', 'category' ); ?>

<div id="stage" class="inner" role="main">

	<?php get_template_part( 'inc/postHead' ); ?>

	<div id="content" class="content has-sidebar">
		<div class="content-main main-content">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h2 class="page-title archive-title">

					<?php

					// if category page.
					if ( ! empty( $cat ) ) :
						printf( 'Category Archives: %s', '<span>' . single_cat_title( '', false ) . '</span>' );

						// if tag page.
						elseif ( is_tag() ) :
							printf( 'Tag Archives: %s', '<span>' . single_tag_title( '', false ) . '</span>' );

							// if archive page.
						elseif ( is_day() ) :
							printf( 'Daily Archives: %s', '<span>' . get_the_date() . '</span>' );
						elseif ( is_month() ) :
							printf( 'Monthly Archives: %s', '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentytwelve' ) ) . '</span>' );
						elseif ( is_year() ) :
							printf( 'Yearly Archives: %s', '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentytwelve' ) ) . '</span>' );
						else :
							printf( 'Archives' );
					endif;
					?>
				</h2>
			</header><!-- .archive-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'inc/content', 'snippet' );

			endwhile;

			twentytwelve_content_nav( 'nav-below' );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- .mainContent -->

		<?php get_sidebar(); ?>

	</div><!-- .allContent -->

</div><!-- #stage -->

<?php get_footer(); ?>
