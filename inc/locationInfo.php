<?php

	$docsServices = get_post(1028);
	$docsPhone = get_post_meta(1028, 'phone', true);
	$docsEmail = get_post_meta(1028, 'email', true);
	$docsBuilding = get_post_meta(1028, 'building', true);
	$docsSlug = $docsServices->post_name;

	$mapPage = "/locations/#!";

?>


<div class="info-more">
					<a href="tel:<?php echo $docsPhone; ?>" class="phone"><?php echo $docsPhone ?></a> |
                    	<?php if($docsEmail): ?>
					<a href="mailto:<?php echo $docsEmail; ?>" class="email"><?php echo $docsEmail ?></a> |
                    	<?php endif; ?>
					<a href="<?php echo $mapPage.$docsSlug; ?>">Room: <?php echo $docsBuilding ?> <i class="icon-arrow-right"></i></a>
				</div>