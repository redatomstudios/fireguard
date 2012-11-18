<?php if(!preg_match('/Android|iPhone|BlackBerry/i', $_SERVER['HTTP_USER_AGENT'])) { ?>
<style>
body {
	background: url('Media/Graphics/BG_Gradient.png') center top no-repeat;
}
</style>
<?php } ?>
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
		<div class="dialog centered" id="inputs" style="margin-top: 20px;">
			<?php echo form_open('home/login', array('id' => 'access')) ?>
				<?php echo form_input(array('id' => "email", 'name' => "Email", 'value' => "Email", 'data-hint' => "E-mail")) ?>
				<?php echo form_password(array('id' => "password", 'name' => "Password", 'value' => "********", 'data-hint' => "********")) ?>
				<input type="hidden" name="type" id="submitType" value="s"/>
				<div class="buttonSet">
					<input type="submit" value="Sign Up" id="submitButton" class="accept"/>
					<input type="button" value="Cancel" class="reject" id="cancelButton"/>
				</div>
			<?php echo form_close() ?>
		</div>
		<br class="clearFix" />
	</div>
</div>
<script>
jQuery(document).ready(function(){
	
	if(document.getElementById('email'))
		if(document.getElementById('email').value != 'Email') {
			document.getElementById('email').value = 'Email';
		}

	$('input[type="text"], input[type="password"]').focus(function(){
		var cElement = $(this)[0];
		if(cElement.value.toLowerCase() == "email" || cElement.value.toLowerCase() == "password") {
			cElement.value = '';
			cElement.style.color = "#000";
		}
	}).blur(function(){
		var cElement = $(this)[0];
		if(cElement.value == "") {
			cElement.value = cElement.name;
			cElement.style.color = "rgba(0, 0, 0, 0.3)";
		}
	});

	$('div#signup').click(function(){
		$('#splashButtons').hide();
		$('#password').hide();
		document.getElementById('submitButton').value = 'Sign Up';
		document.getElementById('submitType').value = 's';
		$('#inputs').show();
	});

	$('div#login').click(function(){
		$('#splashButtons').hide();
		$('#password').show();
		document.getElementById('submitButton').value = 'Login';
		document.getElementById('submitType').value = 'l';
		$('#inputs').show();
	});

	$('#cancelButton').click(function(){
		$('#inputs').hide();
		$('#splashButtons').show();
	});

	$('form#access').submit(function(e) {
		e.preventDefault();
		var errorMessages = [];
		if(!emailRegex.test(document.getElementById('email').value)) {
			errorMessages.push(['Please enter a valid email address.', 0]);
		}
		if(document.getElementById('submitType').value == 'l') {
			if(document.getElementById('password').value.length <= 5)
				errorMessages.push(['Password is too short.', 0]);
		}
		if(errorMessages.length == 0) {
			this.submit();
		} else {
			$.each(errorMessages, function(index, value){
				stackNotify(value[0], value[1]);
			});
			openNotification();
		}
	});
});
</script>