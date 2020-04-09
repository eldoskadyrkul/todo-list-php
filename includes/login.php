<?php
ini_set('error_reporting', E_ALL);
$_SESSION['Message'] = '';
$_SESSION['ID_USER'] = '';
include ("includes/dbconnection.php");

if (isset($_SESSION['ID_USER'])) {
    if (isset($_POST['LoginSubmit'])) {
    	CheckPassword();
    }
} else {
    header('Location: index.php');
}

function CheckPassword() {
    include ("includes/dbconnection.php");
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $pwd = mysqli_real_escape_string($con, $_POST['password']);
    $new_password = md5($pwd);
    $sql_query = "SELECT `id_user`, `username`, `password` FROM `user` WHERE `username` = '$username' and `password` = '$new_password'";
    $data = mysqli_query($con, $sql_query);
    if (mysqli_num_rows($data) > 0) {
        while ($row = mysqli_fetch_assoc($data)) {
            echo "<script>$('#loginSubmit').after('<p>Success. Please enter an <a href=admin/index.php>admin panel</a></p>');</script>";
            $_SESSION['ID_USER'] = $row['id_user'];
        }
    } else {
        echo "<script>$('#loginSubmit').after('<p>Sorry, you do not incorrect username or password. Try again</p>');</script>";
    }
}
?>