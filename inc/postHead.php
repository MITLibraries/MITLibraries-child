<div class="siteTitle group">

	<h1><?php bloginfo(); ?></h1>

	<?php

		global $blog_id;
		$current_blog_id = $blog_id;

		$siteURL = get_bloginfo('url');

		// If a location site, switch out to main site to get location ids
		if ($blog_id == 22) {

			get_template_part('inc/locationHours');

		}

	?>

</div>

<?php if (has_post_thumbnail()): ?>

	<div class="headerImage">
		<?php echo the_post_thumbnail('headerImage'); ?>
	</div>	

<?php else:
		$defaultHeader = get_header_image();
		if ($defaultHeader != ''):
?>
			<div class="headerImage">
				<img src="<?php header_image(); ?>" alt="" />
			</div>
		<?php endif; ?>
		
<?php endif; ?>		
			
<?php get_template_part("nav", "child"); ?>