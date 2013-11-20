<div class="siteTitle group">

	<h1><?php bloginfo(); ?></h1>

	<?php

		global $blog_id;
		$current_blog_id = $blog_id;

		$siteURL = get_bloginfo('url');

		// If a location site, switch out to main site to get location ids
		if ($blog_id == 22) {

			get_template_part('inc/locationHours');
			// get_template_part('inc/locationInfo');

		}

	?>

</div>

<?php

	$defaultHeader = get_header_image();
	if ($defaultHeader != ''):

?>
	<div class="headerImage">
		<img src="<?php header_image(); ?>" alt="" />
	</div>

<?php endif; ?>	
			
<?php get_template_part("inc/nav", "child"); ?>