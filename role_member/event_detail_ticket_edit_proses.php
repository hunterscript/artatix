

<?php

include "auth.php";

$tkt_id				= $_POST["tkt_id"];
$tkt_category		= $_POST["tkt_category"];
$tkt_stock			= $_POST["tkt_stock"];
$tkt_price			= $_POST["tkt_price"];
$tkt_date_start		= $_POST["tkt_date_start"];
$tkt_date_finish	= $_POST["tkt_date_finish"];
$tkt_desc			= $_POST["tkt_desc"];
$tkt_status			= $_POST["tkt_status"];
$event_id			= $_POST["event_id"];

if($edit = mysqli_query($konek, "UPDATE tbl_ticket SET  
	tkt_category	='$tkt_category',
	tkt_stock		='$tkt_stock',
	tkt_price		='$tkt_price',
	tkt_date_start	='$tkt_date_start',
	tkt_date_finish	='$tkt_date_finish',
	tkt_desc		='$tkt_desc', 
	tkt_status		='$tkt_status'

 WHERE tkt_id='$tkt_id'")){
	header('Location: event_detail.php?id=' . $event_id);
	exit();
}
die("Terdapat Kesalahan : ". mysqli_error($konek));

?>





