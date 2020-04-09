<?php
include 'includes/insertData.php';
?>
<!DOCTYPE html>
<html>
<?php
include_once ('common/header.php');
?>
<body>
	 <div class="site">
		<div class="container">
			<div class="header">
				<div class="logo pull-left">
					<span>TODO Task</span>
				</div>	
				<div class="admin">
					<div class="user">
						<i class="fas fa-sign-out-alt"></i>
						<span><a href="index.php">Back</a></span>
					</div>
				</div>
			</div>
			<div class="site-content">
				<div class="form-content">
					<form class="form-border" action="" method="POST">
						<div class="form-group">
							<label for="user">Username</label>
							<input id="txtUsername" type="text" name="username" class="form-control" placeholder="Input an username" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="user">Email</label>
							<input id="txtEmail" type="email" name="email" class="form-control" placeholder="Input an email" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="user">Text</label>
							<input id="txtText" type="text" name="text_task" class="form-control" placeholder="Input a text" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="user">Status</label>
							<input id="txtStatus" type="text" name="status_task" class="form-control" placeholder="Input a status" autocomplete="off">
						</div>	
						<div class="form-group">
							<input type="submit" name="submit" class="btn btn-primary" id="AddSubmit" value="Send">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js'></script>
	<script>
		$(document).ready(function() {
			$('#AddSubmit').click(function(e) {
				e.preventDefault();
				var username = $('#txtUsername').val();
				var email = $('#txtEmail').val();
				var textTodo = $('#txtText').val();
				var status = $('#txtStatus').val();

				if (username.length < 1) {
					$('#txtUsername').after('<span class="error">This field is required</span>');
				}

				if (email.length < 1) {
					$('#txtEmail').after('<span class="error">This field is required</span>');
				}

				if (textTodo.length < 1) {
					$('#txtText').after('<span class="error">This field is required</span>');
				}

				if (status.length < 1) {
					$('#txtStatus').after('<span class="error">This field is required</span>');
				}

				if (username == '' && email == '' && textTodo == '' && status == '') {
					$('#AddSubmit').after('<span class="error">All fields is required</span>');
				} else {
					$.ajax({
						url: "includes/insertData.php",
						method: "POST",
						data: {
							username: username,
							email: email,
							text: textTodo,
							status: status
						},
						success: function(data) {
							$('form').trigger('reset');
							$('#AddSubmit').after('<span class="text-success">The data is completed.</span>');
						}
					});
				}
			});
		});
	</script>
</body>
</html>