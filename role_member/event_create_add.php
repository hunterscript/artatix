﻿<?php
session_start();
include "../koneksi/koneksi.php";

$limit = 2 * 1024 * 1024;
$ekstensi =  array('png','jpg','jpeg');

$namafile = $_FILES['event_picture']['name'];
$tmp = $_FILES['event_picture']['tmp_name'];
$tipe_file = pathinfo($namafile, PATHINFO_EXTENSION);
$ukuran = $_FILES['event_picture']['size'];

$user_id            = $_POST["user_id"];
$event_id           = $_POST["event_id"];
$event_name         = $_POST["event_name"];

$event_category      = implode(", ", $_POST['category']);
$event_picture       = $_FILES['event_picture']['name'];

$event_description  = $_POST["event_description"];
$event_location     = $_POST["event_location"];
$event_date_start   = date("Y-m-d", strtotime($_POST["event_date_start"]));
$event_date_finish  = date("Y-m-d", strtotime($_POST["event_date_finish"]));
$event_time_start   = $_POST["event_time_start"];
$event_time_finish  = $_POST["event_time_finish"];
$event_status       = $_POST["event_status"];
$event_sk           = $_POST["event_sk"];
$event_jenis        = $_POST["event_jenis"];
$link               = strtolower(str_replace(' ','-',$_POST["event_name"]));

if($ukuran > $limit){
  header("location: event_create.php?pesan=gagal_ukuran");		
}else{
  if(!in_array($tipe_file, $ekstensi)){
    header("location: event_create.php?pesan=gagal_ektensi");			
  }else{		
    // move_uploaded_file($tmp, 'file/'.date('d-m-Y').'-'.$namafile);
    $event_picture = rand().'-'.$namafile;
    $add = mysqli_query($konek, "INSERT INTO tbl_event ( 
                                                              user_id,
                                                              event_id,
                                                              event_name,
                                                              event_category,
                                                              event_picture,
                                                              event_description,
                                                              event_location,
                                                              event_date_start, 
                                                              event_date_finish, 
                                                              event_time_start, 
                                                              event_time_finish, 
                                                              event_status,
                                                              event_sk,
                                                              event_jenis,
                                                              link)
      VALUES('$user_id',
            '$event_id',
            '$event_name',
            '$event_category',
            '$event_picture',
            '$event_description',
            '$event_location',
            '$event_date_start',
            '$event_date_finish',
            '$event_time_start',
            '$event_time_finish',
            '$event_status',
            '$event_sk',
            '$event_jenis',
            '$link')");
    if($add){
      header("Location: event.php");
      move_uploaded_file($tmp, '../img/event_banner/'.$event_picture);
      header("location: event.php?pesan=simpan");
      exit();
    }
  }
}

die("Terdapat kesalahan : " . mysqli_error($konek));
?>