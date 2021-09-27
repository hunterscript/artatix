<?php
session_start();
include "koneksi/koneksi.php";
  // include "pswd.php";

if($_SESSION['user_email_google']){
	// google user login
	$sess_email = $_SESSION['user_email_google'];
	$queryG = mysqli_query($konek, "SELECT * FROM tbl_user WHERE user_email='$sess_email'");
	$dataGoogle = mysqli_fetch_assoc($queryG);
	if($dataGoogle) {
		$_SESSION['user_email'] = $dataGoogle['user_email'];
		$_SESSION['user_id'] 	= $dataGoogle['user_id'];
		$_SESSION['users_id'] 	= $dataGoogle['user_id'];
		
		$_SESSION['user_level'] = "member";
		header("location: role_member/index.php?pesan=success");
	}
} else {	
	$user_email = $_POST["user_email"];
	$user_password = md5($_POST["user_password"]);

	$query = mysqli_query ($konek, "SELECT * FROM tbl_user WHERE user_email='$user_email' AND user_password='$user_password'");
	// Validasi Login
	$val = mysqli_num_rows($query);
	
	if ($val > 0){
		
		$data = mysqli_fetch_assoc($query);
	
		if($data['user_level'] == "admin"){
			$_SESSION['user_email'] = $user_email;
			$_SESSION['user_id'] 	= $data['user_id'];
			$_SESSION['users_id'] 	= $data['user_id'];
	
			$_SESSION['user_level'] = "admin";
			
			header("location: role_admin/index.php?pesan=success");
	
		}elseif ($data['user_level'] == "member") {
			$_SESSION['user_email'] = $user_email;
			$_SESSION['user_id'] 	= $data['user_id'];
			$_SESSION['users_id'] 	= $data['user_id'];
			
			$_SESSION['user_level'] = "member";
			header("location: role_member/index.php?pesan=success");
		}
	
	} else {
		header("location: page_login.php?pesan=gagal");
	}
}


?>