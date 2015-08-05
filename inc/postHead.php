<div class="title-page flex-container group <?php if(is_front_page()) { echo 'hasImage'; } ?>">

	<div class="box1">
		
		<?php if(is_front_page()): ?>
			<h1 class="child-page-title"><?php bloginfo(); ?></h1>
		<?php else: ?>
			<div class="child-page-title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></div>
		<?php endif; ?>

		<?php

			global $blog_id;
			$current_blog_id = $blog_id;

			$siteName = get_bloginfo('name');
			
			if($siteName == 'Document Services' && is_front_page()) {
				switch_to_blog(1);
				get_template_part('inc/locationInfo');
				switch_to_blog($current_blog_id);
			}

		?>
		
		<?php 
			// If doc. services, switch out to main site to get location ids
			if ($siteName == 'Document Services' && is_front_page()):
				get_template_part('inc/locationHours');
			endif;

		?>

	</div>

	<div class="box2">
		<?php

			$defaultHeader = get_header_image();
			if ($defaultHeader != '' && is_front_page()):

		?>

			<div class="headerImage">
				<img src="<?php header_image(); ?>" alt="" />
			</div>
	
		<?php endif; ?>

	</div>


</div>
			
<?php get_template_part("inc/nav", "child"); ?>