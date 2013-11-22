<div class="siteTitle group <?php if(is_front_page()) { echo 'hasImage'; } ?>">

	<h1><?php bloginfo(); ?></h1>

	<?php

		global $blog_id;
		$current_blog_id = $blog_id;

		$siteURL = get_bloginfo('url');

		$defaultHeader = get_header_image();
		if ($defaultHeader != '' && is_front_page()):

	?>

		<div class="headerImage">
			<img src="<?php header_image(); ?>" alt="" />
		</div>
	
	<?php 

		endif;

		// If doc. services, switch out to main site to get location ids
		if ($blog_id == 22 && is_front_page()):
			get_template_part('inc/locationHours');
		endif;

	?>

</div>
			
<?php get_template_part("inc/nav", "child"); ?>