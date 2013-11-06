<?php
	$siteName = get_bloginfo('name');
	if ($siteName != 'MIT Libraries News') {
?>
	<nav id="child-navigation" class="main-navigation blogNav childNav" role="navigation">
		<h3 class="menu-toggle"><?php _e( 'Child Menu', 'twentytwelve' ); ?></h3>
		<?php wp_nav_menu( array( 'theme_location' => 'child', 'menu_class' => 'nav-menu' ) ); ?>
	</nav><!-- #site-navigation -->
<?php } ?>