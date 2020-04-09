<?php

include '../includes/editData.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TODO LIST</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/fonts.css">
</head>
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
							<input id="txtUsername" type="text" value='<?=$res['username'] ?>' name="username" class="form-control" placeholder="Input an username" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="user">Email</label>
							<input id="txtEmail" type="email" value='<?=$res['email'] ?>' name="email" class="form-control" placeholder="Input an email" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="user">Text</label>
							<input id="txtText" type="text" value='<?=$res['text'] ?>' name="text_task" class="form-control" placeholder="Input a text" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="user">Status</label>
							<p><input id="txtStatus" type="checkbox" value='Completed' name="status_task" class="form-check" style="display: inline; margin: 0 18px 0 0;">Completed</p>
							<p><input id="txtStatus" type="checkbox" value='Edited by admin' name="status_task" class="form-check" style="display: inline; margin: 0 18px 0 0;">Edited by admin</p>
						</div>
						<div class="form-group">
							<input id="txtID" type="hidden" value='<?=$res['id']?>' name="id" class="form-check">
						</div>	
						<div class="form-group">
							<input type="submit" name="submit" class="btn btn-primary" id="EditSubmit" value="Send">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js'></script>
</body>
</html>