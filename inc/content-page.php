<?php
/**
 * The template used for displaying
 * page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $isRoot;
?>

<?php

	$pageRoot = getRoot($post);
	$section = get_post($pageRoot);

	$menuName = $section->post_name;
	$sideMenu = wp_get_nav_menu_items($menuName);

	$hideSideNav = get_field("hide_side_nav");

	if ($sideMenu && $hideSideNav == false || is_child_page() && $hideSideNav == false):

?>

	<div class="leftNav">

		<ul>

			<?php
							
				$args = array(
					"child_of" => $pageRoot,
					"title_li" => "",
				);
				
				if ($menu) {
					wp_nav_menu( array( 'menu' => $menuName, 'menu_class' => 'nav-menu' ) ); 
				} else {
					wp_list_pages( $args ); 
				}
			?>

		</ul>

	</div>

<?php endif; ?>

<div class="mainContent group <?php if($sideMenu && $hideSideNav == false || is_child_page() && $hideSideNav == false) { echo 'hasLeftNav'; } ?>">
	
	<div class="entry-content">
		<?php $title = get_the_title(); if ($title != ""): ?>
			<?php if(!is_page('home')) { echo "<h2>".$title."</h2>"; } ?>
		<?php endif; ?>

		<?php the_content(); ?>

		<?php
			$blog_id = get_current_blog_id();

			if (is_page('home') && $blog_id == 22):
				$col1 = get_field('column_1');
				$col2 = get_field('column_2');
			endif;
			
			if ($col1 != '' && $col2 != ''):
		?>

				<div class="flexContainer">
					<div class="flexItem">
						<?php echo $col1; ?>
					</div>
					<div class="flexItem">
						<?php echo $col2; ?>
					</div>
				</div>

		<?php endif; ?>

	</div>
	
	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
	
</div>