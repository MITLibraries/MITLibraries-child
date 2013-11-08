<?php

	global $blog_id;
	$current_blog_id = $blog_id;
	$siteName = get_bloginfo('name');

	switch_to_blog(1);

	if ($siteName == 'Document Services') {
		// get_the_ID(447);
		$locationId = 1028;
	}

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