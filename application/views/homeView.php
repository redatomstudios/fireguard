<div id="splash" class="centered centerText">
	<?php echo  img(array('src' => "Media/Branding/Logo.png", 'id' => "splashLogo", 'alt' => "Heatmap Personnel Management System")) ?>
	<div class="overlayText" style="margin: 20px;">
		Service is free while in beta, so what're you waiting for? <br />
		Join in before the slots are filled!
		<br class="clearFix" />
		<div class="relative centered" id="splashButtons">
			<div class="button accept" id="signup">Sign Up</div>
			<div class="button accept" id="login">Login</div>
		</div>
		<div class="dialog centered" id="inputs">
			<?php echo form_open('home/login') ?>
				<?php echo form_input(array('id' => "email", 'name' => "Email", 'value' => "Email")) ?>
				<?php echo form_password(array('id' => "password", 'name' => "Password", 'value' => "Password")) ?>
				<input type="submit" value="Sign Up" id="submitButton" class="accept">
				<input type="button" value="Cancel" class="reject" id="cancelButton">
			<?php echo form_close() ?>
		</div>
		<br class="clearFix" />
	</div>
</div>