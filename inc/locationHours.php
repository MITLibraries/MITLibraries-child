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

	<div class="hours-today">
		<span>Today's Hours: <strong data-location-hours="Document Services"></strong></span>
		<br>
		<a href="/hours" class="link-hours-all">See all hours <i class="icon-arrow-right"></i></a>
	</div>
	
<?php // switch_to_blog($current_blog_id); ?>