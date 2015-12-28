<?php
/**
 *
 * This is the template that displays sub-exhibits that are linked dynamically
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

$pageRoot = getRoot($post);
$section = get_post($pageRoot);
$isRoot = $section->ID == $post->ID;


get_header(); ?>

<?php get_template_part('inc/breadcrumbs', 'child') ?>

<div id="stage" class="inner group" role="main">

	<?php get_template_part('inc/postHead'); ?>

		<div id="content" class="allContent hasSidebar group">

				<div id="mainContent" class="mainContent group">
					<?php while ( have_posts() ) : the_post(); ?>

					<div class="post">
						<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<!--<small>Posted <?php the_time('F jS, Y') ?> by <?php the_author() ?> </small>-->

						<div class="entry entry-content">
							<?php the_content('Read the rest of this entry &raquo;'); ?>
						</div>

					</div>

					<div class="nextprev">
<span class="prev"><?php previous_post('&lsaquo; %', '', 'yes', 'no'); ?></span>
<span class="next"><?php next_post('% &rsaquo;', '', 'yes', 'no'); ?></span>
</div>



					<?php endwhile; // end of the loop. ?>
				</div>

				<?php get_sidebar(); ?>
		</div>

</div><!-- end div#stage -->

<?php get_footer(); ?>
