<!DOCTYPE html>
<html>
	<head>
		<title>Personnel Management System :: Heatmap Beta</title>
		<?= ( preg_match('/Android|iPhone|BlackBerry/i', $_SERVER['HTTP_USER_AGENT']) ? link_tag('CSS/main_mobile.css') : link_tag('CSS/main.css') ) ?>
		<script src="<?= base_url() ?>JS/jquery-1.8.2.min.js"></script>
		<script src="<?= base_url() ?>JS/h2o.js"></script>
		<?php if(isset($_GET['n'])) { ?>
		<script>
		jQuery(document).ready(function($){
			// NOTIFICATIONS: format is MESSAGE|TYPE
			// USE ; TO DELIMIT MULTIPLE MESSAGE. I.E.:
			// MESSAGE1|TYPE;MESSAGE2|TYPE;etc.
		<?php 
			$notifications = explode(';', $_GET['n']);
			foreach($notifications as $message) {
				$message = explode('|', $message);
				echo 'stackNotify("'.$message[0].'", '.(sizeof($message) == 2 ? $message[1] : 0).');
'; // Populate the message stack
			}
		?>
		openNotification(); // Fire notification system, and BOOM!
		});
		</script>
		<?php } ?>
	<body>
		<div id="bodyWrap">