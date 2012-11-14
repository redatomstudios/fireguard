<!DOCTYPE html>
<html>
	<head>
		<title>Personnel Management System :: Heatmap Beta</title>
		<?php echo link_tag('CSS/main.css') ?>
		<script src="<?= base_url() ?>JS/jquery-1.8.2.min.js"></script>
		<script src="<?= base_url() ?>JS/h2o.js"></script>
		<?php if(isset($_GET['n'])) { ?>
		<script>
		jQuery(document).ready(function($){
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