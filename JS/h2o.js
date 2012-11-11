/* Javascript Document */
/* Created by redAtom Studios @ 2012 */

jQuery(document).ready(function($){

	//var banana = new RegExp("\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b", "g");
	var emailRegex = /\S+@\S+\.\S+/;

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
			errorMessages.push('Please enter a valid email address.');
		}
		if(document.getElementById('submitType').value == 'l') {
			if(document.getElementById('password').value.length <= 5)
				errorMessages.push('Password is too short.');
		}
		if(errorMessages.length == 0) {
			this.submit();
		} else {
			console.log(errorMessages);
		}
	})
});