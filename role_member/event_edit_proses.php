﻿<?php
    include "auth.php";

// menangkap data yang di kirim dari form
$event_id           = $_POST["event_id"];
$event_name         = $_POST["event_name"];
$event_category     = $_POST["event_category"];

$event_picture       = $_FILES['event_picture']['name'];

$event_description  = $_POST["event_description"];
$event_location     = $_POST["event_location"];
$event_date_start   = $_POST["event_date_start"];
$event_date_finish  = $_POST["event_date_finish"];
$event_time_start   = $_POST["event_time_start"];
$event_time_finish  = $_POST["event_time_finish"];
$event_status       = $_POST["event_status"];
 
// update data ke database
if ($dt = mysqli_query($konek,"UPDATE tbl_event SET 
	event_name='$event_name', 
	event_category='$event_category', 
	event_picture='$event_picture',
	 event_description='$event_description', 
	 event_location='$event_location', 
	 event_date_start='$event_date_start', 
	 event_date_finish='$event_date_finish', 
	 event_time_start='$event_time_start', 
	 event_date_finish='$event_date_finish'  WHERE event_id='$event_id'"));
 {
	header('Location: event_detail.php?id=' . $event_id.'&pesan=success_edit_event');
  move_uploaded_file($_FILES['event_picture']['tmp_name'],'../img/event_banner/'.$event_picture);
  exit();
  
}
die("Terdapat kesalahan : " . mysqli_error($konek));
 
?>