<?php
    include "auth.php";

// menangkap data yang di kirim dari form
$event_id           = $_POST["event_id"];
$event_name         = $_POST["event_name"];
$event_category     = $_POST["event_category"];

$event_picture       = $_FILES['event_picture']['name'];

$event_description  = $_POST["event_description"];
$event_location     = $_POST["event_location"];
$event_date_start   = $_POST["event_date_start"] == null ? null : date("Y-m-d", strtotime($_POST["event_date_start"]));
$event_date_finish  = $_POST["event_date_finish"] == null ? null : date("Y-m-d", strtotime($_POST["event_date_finish"]));
$event_time_start   = $_POST["event_time_start"];
$event_time_finish  = $_POST["event_time_finish"];
$event_status       = $_POST["event_status"];
$event_jenis        = $_POST["event_jenis"];
 
// update data ke database
$insert = "event_name='$event_name', 
	event_category='$event_category', 
	event_picture='$event_picture',
	 event_description='$event_description', 
	 event_location='$event_location',";
if(isset($event_date_start)){
$insert .= "event_date_start='$event_date_start',";
}


if(isset($event_date_finish)){
$insert .= "event_date_finish='$event_date_finish',";
}

$insert .= "event_time_start='$event_time_start', 
	 event_date_finish='$event_date_finish',
	 event_jenis='$event_jenis'";

if ($dt = mysqli_query($konek,"UPDATE tbl_event SET ".$insert." WHERE event_id='$event_id'"));
 {
	header('Location: event_detail.php?id=' . $event_id.'&pesan=success_edit_event');
  move_uploaded_file($_FILES['event_picture']['tmp_name'],'../img/event_banner/'.$event_picture);
  exit();
  
}
die("Terdapat kesalahan : " . mysqli_error($konek));
 
?>