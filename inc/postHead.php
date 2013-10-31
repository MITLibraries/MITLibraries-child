<?php

	global $blog_id;
	$current_blog_id = $blog_id;

	//switch to the main blog which will have an id of 1
	switch_to_blog(1);

	if($current_blog_id = 22) {

		$locationID = 452;

		$hasHours = hasHours($locationId, date("Y-m-d"));
		$hoursToday = getHoursToday($locationId);
		switch_to_blog($current_blog_id);

	}

	else {
		echo "<h1>this is not the main site, or the function is not working</h1>";
	}

?>

<div class="siteTitle">

	<h1><?php bloginfo(); ?></h1>

	<div class="todayHours">
		<span>Today's Hours:</span>
		<span><strong>9am-5pm (by appointment only)</strong></span>
	</div>

</div>
	
<?php if (has_post_thumbnail()): ?>

	<div class="headerImage">
		<?php echo the_post_thumbnail('headerImage'); ?>
	</div>	

	<?php else: ?>

	<?php
		$defaultHeader = header_image();
		if ($defaultHeader != "") {
	?>
	
		<div class="headerImage">
			<img src="<?php header_image(); ?>" alt="" />
		</div>

	<?php } ?>	
	
<?php endif; ?>		
			
<?php get_template_part("nav", "child"); ?>