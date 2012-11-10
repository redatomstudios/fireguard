/* Javascript Document */
/* Created by redAtom Studios @ 2012 */

jQuery(document).ready(function($){
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
		$('#inputs').show();
	});

	$('div#login').click(function(){
		$('#splashButtons').hide();
		$('#password').show();
		document.getElementById('submitButton').value = 'Login';
		$('#inputs').show();
	});

	$('#cancelButton').click(function(){
		$('#inputs').hide();
		$('#splashButtons').show();
	});
});