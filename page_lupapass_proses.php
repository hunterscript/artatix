<?php
session_start();
error_reporting(0);
include "koneksi/koneksi.php";

include 'plugin/src/PHPMailer.php';
include 'plugin/src/Exception.php';

// var_dump(new PHPMailer());die();

$konek = mysqli_connect("localhost", "root", "", "artatix");
$email = $_POST["user_email"];

$sql = "SELECT * FROM tbl_user WHERE user_email = '$email'";
$result = mysqli_query($konek, $sql);
if (mysqli_num_rows($result) > 0) {
	//
} else {
	echo "Email does not exists";
}

if (mysqli_num_rows($result) > 0) {
	$password = time() . md5($email);
} else {
	echo "Email does not exists";
}
$sql = "UPDATE tbl_user SET user_password='$password' WHERE email='$email'";
mysqli_query($konek, $sql);

$message = "<p>Please click the link below to reset your password</p>";
$message .= "<a href='http://localhost/tutorials/add-a-reset-password-option/reset-password.php?email=$email&reset_token=$reset_token'>";
$message .= "Reset password";
$message .= "</a>";