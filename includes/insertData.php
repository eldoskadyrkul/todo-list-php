<?php

include ('dbconnection.php');
session_start();

if (isset($_POST['submit'])) {

	// Variable
	$user_name = mysqli_real_escape_string($con, $_POST['username']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$text = mysqli_real_escape_string($con, $_POST['text_task']);
	$status = mysqli_real_escape_string($con, $_POST['status_task']);

	// SQL query
	$sql = "INSERT INTO `task`(`username`, `email`, `text`, `status`) VALUES ('" .$user_name. "', '" .$email. "', '" .$text. "', '".$status."')";

	// Check SQL query
	if (mysqli_query($con, $sql) === true) {
		echo "<script>$('#AddSubmit').after('<p class='text-success'>The data is completed.</p>');</script>";
	}

	
}
