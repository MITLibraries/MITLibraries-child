<?php
	$siteName = get_bloginfo('name');
	// if ($siteName != 'MIT Libraries News') {
	$noChildNav = array("MIT Libraries News", "Document Services");
	if (!in_array($siteName, $noChildNav)) {
?>
	<h3 id="menu--toggle" class="menu--toggle">View Menu</h3>
	<nav id="child-navigation" class="nav-secondary" role="navigation">
		<?php
			if(has_nav_menu()){
				wp_nav_menu(
					array(
						'container' => false
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