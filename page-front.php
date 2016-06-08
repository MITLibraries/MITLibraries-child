<?php
/**
 *
 * Template Name: Front Page

 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<?php if ( is_front_page() ) {

		get_template_part( 'inc/breadcrumbs','sitename' );

		} else {

		get_template_part( 'inc/breadcrumbs', 'child' );

		}

	?>

		<div id="stage" class="inner" role="main">

			<?php get_template_part( 'inc/postHead' ); ?>

			<?php while ( have_posts() ) : the_post(); ?>

			<?php if ( is_active_sidebar( 'sidebar' ) ) { ?>

				<div id="content" class="content has-sidebar">

				<?php get_template_part( 'inc/content', 'front' ); ?>

				<?php get_sidebar(); ?>

			</div>

			<?php } else { ?>

			<div id="content" class="content">

				<?php get_template_part( 'inc/content', 'front' ); ?>

			</div>

			<?php } ?>

		</div><!-- end div#stage -->

	<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
