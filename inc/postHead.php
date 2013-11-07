<div class="siteTitle">

	<h1><?php bloginfo(); ?></h1>

	<?php if (is_category()) {
		echo '<h2 class="categoryName">';
		single_cat_title('Category: ');
		echo '</h2>';
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