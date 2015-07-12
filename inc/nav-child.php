<?php
	$siteName = get_bloginfo('name');
	// if ($siteName != 'MIT Libraries News') {
	$noChildNav = array("MIT Libraries News", "Document Services");
	$countPosts = wp_count_posts('page')->publish;
	if (!in_array($siteName, $noChildNav) && $countPosts > 1) {
?>
<!-- Lower Navigation -->
<nav id="child-navigation" class="nav-secondary" role="navigation">
	<h3 class="menu-toggle"><?php _e( 'View Menu', 'twentytwelve' ); ?></h3>
	<div class="skip-link assistive-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a></div>
	<?php wp_nav_menu( array( 'theme_location' => 'child-nav', 'menu_class' => 'Sub Nav', 'container_class' => 'menu', 'fallback_cb' => false ) ); ?>
</nav><!-- #lower-navigation -->

	<?php } ?>