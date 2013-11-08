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

	$divOpen = '<div class="todayHours">';
	$spanOpen = '<span>';
	$spanClose = '</span>';
	$todaysHours = "<span>Today's Hours:</span>";
	$timeOpen = '<span class="time">';
	$timeClose = '<span>';
	$divClose = '</div>';

	echo $divOpen.$spanOpen.$todaysHours.$spanClose.$spanOpen.$hoursToday.$spanClose.$spanOpen.'<a href="/hours">See all hours</a>'.$spanClose.$divClose;

	switch_to_blog($current_blog_id);
	
?>