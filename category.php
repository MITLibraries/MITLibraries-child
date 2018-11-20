<?php
/**
 *  The template for displaying Category pages.
 *
 * Used to display archive-type pages for posts in a category.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package MIT_Libraries_Child
 * @since Twenty Twelve 1.0
 */

$pageRoot = getRoot( $post );
$section = get_post( $pageRoot );
$isRoot = $section->ID == $post->ID;


get_header( 'child' ); ?>

<?php get_template_part( 'inc/breadcrumbs', 'category' ); ?>

<div id="stage" class="inner" role="main">

	<?php get_template_part( 'inc/postHead' ); ?>
		
	<div id="content" class="content has-sidebar">
		<div class="content-main main-content">
				
		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'twentytwelve' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
			</header><!-- .archive-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

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
