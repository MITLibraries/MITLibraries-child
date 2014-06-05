<?php
	$siteName = get_bloginfo('name');
	// if ($siteName != 'MIT Libraries News') {
	$noChildNav = array("MIT Libraries News", "Document Services");
	if (!in_array($siteName, $noChildNav)) {
?>
	<h3 id="menu--toggle" class="menu--toggle">View Menu</h3>
	<nav id="child-navigation" class="nav-secondary" role="navigation">
		<?php
			if(has_nav_menu('child-nav')){
				wp_nav_menu(
					array(
						'theme_location' => 'child-nav',
						'menu' => 'Sub Nav',
						'container_class' => 'menu'
					)
				);
			}
			else {
				wp_page_menu(
					array(
						'depth' => 2
					)
				);
			}
		?>
	</nav><!-- #site-navigation -->
<?php } ?>