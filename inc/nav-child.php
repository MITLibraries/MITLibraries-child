<?php
	$siteName = get_bloginfo('name');
	// if ($siteName != 'MIT Libraries News') {
	$noChildNav = array("MIT Libraries News", "Document Services");
	if (!in_array($siteName, $noChildNav)) {
?>
	<nav id="child-navigation" class="main-navigation blogNav nav-secondary" role="navigation">
		<h3 class="menu-toggle"><?php _e( 'Child Menu', 'twentytwelve' ); ?></h3>
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'child',
					'container' => 'nav',
					'container_class' => 'nav-main',
				)
			);
		?>
	</nav><!-- #site-navigation -->
<?php } ?>