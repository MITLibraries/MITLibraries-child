<?php

	global $blog_id;
	$current_blog_id = $blog_id;

  // if the Doc. Services site
	if ($blog_id == 22) {
		$locationId = 1028;
	}
	
	switch_to_blog(1);

	$hasHours = hasHours($locationId, date("Y-m-d"));
	$hoursToday = getHoursToday($locationId);
?>

	<div class="todayHours">
		<span>Today's Hours:</span>
		<span><?php echo $hoursToday; ?></span>
		<span><a href="/hours">See all hours</a></span>
	</div>

<?php
	
	$docsServices = get_post(1028);
	$docsPhone = get_post_meta(1028, 'phone', true);
	$docsBuilding = get_post_meta(1028, 'building', true);
	$docsSlug = $docsServices->post_name;

	$mapPage = "/locations/#!";
	$slug = $post->post_name;

?>

	<div class="locationInfo">
		<span><?php echo $docsPhone; ?></span>
		<span>show on map: <a href="<?php echo $mapPage.$docsSlug; ?>"><?php echo $docsBuilding ?></a></span>
	</div>
	
<?php switch_to_blog($current_blog_id); ?>