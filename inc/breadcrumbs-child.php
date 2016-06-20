<?php
/**
 * Breadcrumb template for internal (non-front) pages.
 *
 * @package MIT_Libraries_Child
 * @since 2.0.0
 */

?>
<div class="betterBreadcrumbs hidden-phone" role="navigation" aria-label="breadcrumbs">
	<span><a href="/">Libraries home</a></span>
	<span><a href="<?php echo home_url(); ?>"><?php bloginfo(); ?></a></span>
	<?php betterChildBreadcrumbs(); ?>
</div>
