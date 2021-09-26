<?php
include "auth.php";


$tkt_id                 = $_POST["tkt_id"];
$tkt_category           = $_POST["tkt_category"];
$tkt_stock              = $_POST["tkt_stock"];
$tkt_price              = $_POST["tkt_price"];
$tkt_fee                = $_POST["tkt_fee"];
$tkt_date_start         = $_POST["tkt_date_start"];
$tkt_date_finish        = $_POST["tkt_date_finish"];
$tkt_desc               = $_POST["tkt_desc"];
$tkt_status               = $_POST["tkt_status"];
$event_id               = $_POST["event_id"];





if ($add = mysqli_query($konek, "INSERT INTO tbl_ticket (  tkt_id, tkt_category, tkt_stock, tkt_price, tkt_date_start, tkt_date_finish, tkt_desc, tkt_status, tkt_fee, event_id)
	VALUES(	
			'$tkt_id',
			'$tkt_category',
            '$tkt_stock',
            '$tkt_price',
            '$tkt_date_start',
            '$tkt_date_finish',
            '$tkt_desc',
            '$tkt_status',
            '$tkt_fee',
			'$event_id')")) {
    header('Location: event_detail.php?id=' . $event_id .'&pesan=success');
    
    exit();
}
die("Terdapat kesalahan : " . mysqli_error($konek));
?>
