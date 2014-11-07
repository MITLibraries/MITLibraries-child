<?php
/*
	global $blog_id;
	$current_blog_id = $blog_id;

  // if the Doc. Services site
	if ($blog_id == 24) {
		$locationId = 1028;
	}
	
	switch_to_blog(1);

	$hasHours = hasHours($locationId, date("Y-m-d"));
	$hoursToday = getHoursToday($locationId);
	*/
?>

	<div class="todayHours">
		<span>Today's Hours:</span>
		<span data-location-hours="Document Services"></span>
		<span><a href="/hours">See all hours</a></span>
	</div>
	
<?php // switch_to_blog($current_blog_id); ?>