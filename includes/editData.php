<?php

include ('dbconnection.php');
if (isset($_GET['task_id'])) {
    $id = $_GET['task_id'];
	if (isset($_POST['submit'])) {

		// Variable
		$task_id = mysqli_real_escape_string($con, $_POST['id']);
		$user_name = mysqli_real_escape_string($con, $_POST['username']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$text = mysqli_real_escape_string($con, $_POST['text_task']);
		$status = mysqli_real_escape_string($con, $_POST['status_task']);

		// SQL query
		$sql = "UPDATE `task` SET `username`='".$user_name."',`email`='".$email."',`text`='".$text."',`status`='".$status."' WHERE `id` =".$task_id."";
		$update = mysqli_query($con, $sql);

		
	}

	$select = mysqli_query($con, "SELECT * FROM `task` WHERE `id` =".$id."");
    $res = mysqli_fetch_array($select);
}
