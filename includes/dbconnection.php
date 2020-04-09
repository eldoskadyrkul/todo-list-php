<?php

$localhost = 'localhost';
$username = 'root';
$password = '';
$database = 'todolist_task';

$con = mysqli_connect($localhost, $username, $password, $database);

if ($con == false) {
	die("Connection failed: " . mysql_error());
} else {
	$msg = "Connection was succesfully";
}
?>