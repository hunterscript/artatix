<?php
session_start();
// koneksi database
include "../koneksi/koneksi.php";

// menangkap data yang di kirim dari form
$tkt_id			= $_POST["tkt_id"];
$tkt_fee		= $_POST["tkt_fee"];
$tkt_status 	= $_POST["tkt_status"];

$event_id			= $_POST["event_id"];


// update data ke database
mysqli_query($konek,"UPDATE tbl_ticket SET
													tkt_status='$tkt_status',
													tkt_fee   ='$tkt_fee'
								WHERE tkt_id='$tkt_id'");
 {
header('Location: event_edit.php?id=' . $event_id.'&pesan=ticket_edited');
  exit();

}
die("Terdapat kesalahan : " . mysqli_error($konek));

?>
