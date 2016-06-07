<div class="header-section group <?php if(is_front_page()) { echo 'hasImage'; } ?>">
		<?php if(is_front_page()): ?>
			<div class="child-header-tall">
				<div class="page-header-home">
						<h1 class="child-page-title"><?php bloginfo(); ?></h1>
						<p class="child-tagline"><?php bloginfo('description'); ?></p>
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

				<div class="header-bg-image-high">
					<img class="header-image-high" src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />

				</div>

			</div>

		<?php elseif(is_category()): ?>

			<div class="child-header-short">
				<div class="page-header-internal">
					<div class="child-page-title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></div>
				</div>
				<div class="header-bg-image-short">
					<img class="header-image-short" src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
				</div>
			</div>

		<?php else: ?>

			<div class="child-header-short">
				<div class="page-header-internal">
					<div class="child-page-title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></div>
				</div>
				<div class="header-bg-image-short">
					<?php if(get_the_post_thumbnail()): ?>
					<img class="header-image-short" src="<?php echo( get_the_post_thumbnail() ); ?>" />
					<?php else: ?>
					<img class="header-image-short" src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
					<?php endif; ?>
				</div>
			</div>

		<?php endif; ?>
</div>


<?php get_template_part("inc/nav", "child"); ?>
