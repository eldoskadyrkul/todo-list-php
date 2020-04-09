<?php

include_once ('includes/dbconnection.php');

?>
<!DOCTYPE html>
<html>
<?php
include_once ('common/header.php');
?>
<body id="LoginForm">
	<div class="container">
		<div class="login-form">
			<div class="main-div">
				<div class="panel">
					<h2>Admin Login</h2>
					<p>Please enter your username and password</p>
				</div>
				<form id="login" action="login.php" method="post">
					<div class="form-group">
						<input id="username" class="form-control" type="text" name="username" placeholder="Please input username" required="required" autocomplete="off" />
					</div>
					<div class="form-group">
						<input id="password" class="form-control" type="password" name="password" placeholder="Please input password" required="required" autocomplete="off" />
					</div>					
					<div class="form-group">
						<button class="btn btn-primary" type="submit" name="LoginSubmit" id="loginSubmit">Login</button>
					</div>
					<div class="form-group">
						<p class="return">
							<a href="index.php"><i class="fas fa-angle-left"></i>Back to page</a>
						</p>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js'></script>
<?php
include_once ('includes/login.php');	
?>
</html>