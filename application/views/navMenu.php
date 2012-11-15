<div id="navWrap">
	<nav>
		<ul>
			<li><?php echo anchor('', 'Home', 'title = "Heatseek Overview"') ?></li>
			<li><?php echo anchor('', 'Profile', 'title = "View & Edit Your Profile"') ?></li>
			<li><?php echo anchor('', 'Planner', 'title = "Monthly, Daily and Hourly Planner"') ?></li>
			<li><?php echo anchor('', 'Dashboard', 'title = "Account Settings"') ?></li>
		</ul>
		<br class="clearFix" />
	</nav>
	<div id="navPulldown">
		<?= img(array('src' => 'Media/branding/standalone_light.png', 'width' => '140', 'style' => 'margin: 20px 0;')) ?>
		<br class="clearFix" />
		Click/Tap to open Navigation
	</div>
	<div id="logout">
		<a href='<?php echo base_url() ?>home/logout'><input type='button' class='reject' value='Logout'/></a>
	</div>
	<div id="navTitle">
		Dashboard
	</div>
<br class="clearFix" />
</div>