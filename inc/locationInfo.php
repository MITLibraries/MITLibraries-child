<?php

	$docsServices = get_post(1028);
	$docsPhone = get_post_meta(1028, 'phone', true);
	$docsBuilding = get_post_meta(1028, 'building', true);
	$docsSlug = $docsServices->post_name;

	$mapPage = "/locations/#!";

?>

<div class="locationInfo">
	<span><?php echo $docsPhone; ?></span>
	<span>show on map: <a href="<?php echo $mapPage.$docsSlug; ?>"><?php echo $docsBuilding ?></a></span>
</div>