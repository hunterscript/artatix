<?php
//koneksi data base
session_start();
include "koneksi/koneksi.php";


$user_id             = $_POST["user_id"];
$user_email         = $_POST["user_email"];
$user_password         = md5($_POST["user_password"]);
$user_nmlengkap        = $_POST["user_nmlengkap"];
$user_notelp         = $_POST["user_notelp"];
$user_level         = $_POST["user_level"];
$uservl_status      = $_POST["uservl_status"];

$queryValidate = mysqli_query($konek, "SELECT user_email FROM tbl_user WHERE user_email='$user_email'");
$validate = mysqli_num_rows($queryValidate);

if($validate == 1){
    header("location: page_register.php?pesan=email_terdaftar");
}else{
    $queryinsert = "INSERT INTO  tbl_user (
    user_id,
    user_email,
    user_password,
    user_nmlengkap,
    user_notelp,
    user_level,
    uservl_status )
     VALUES (
     '$user_id',
     '$user_email',
     '$user_password',
     '$user_nmlengkap',
     '$user_notelp',
     '$user_level',
     '$uservl_status')";
    
    //menyimpan data ke database
    mysqli_query($konek, $queryinsert);
    header("Location: page_register.php?pesan=success");
}

