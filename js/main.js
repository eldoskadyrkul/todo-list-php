$(document).ready(function(e)
{
	
	$('#loginSubmit').click(function(e) {
		e.preventDefault();
		var txtUsername = $('#username').val().trim();
		var txtPassword = $('#password').val().trim();

		$('.error').remove();

		if (txtUsername.length < 1) {
			$('#username').after('<span class="error">This field is required</span>')
		}
		if (txtPassword.length < 1) {
			$('#password').after('<span class="error">This field is required</span>')
		}
		
	})
});