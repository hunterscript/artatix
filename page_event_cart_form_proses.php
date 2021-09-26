<?php
session_start();

if ($_SESSION['user_level'] == "") {
	header("location:page_login.php");
}

$cst_id			    = $_POST["cst_id"];
$cst_name		    = $_POST["cst_name"];
$cst_identity		= $_POST["cst_identity"];
$cst_no_id			= $_POST["cst_no_id"];
$cst_email			= $_POST["cst_email"];
$cst_notelp			= $_POST["cst_notelp"];

$trans_id			= $_POST["trans_id"];
$cart_id			= $_POST["cart_id"];
$cst_id			    = $_POST["cst_id"];
$event_id			= $_POST["event_id"];

$trans_total		= $_POST["trans_total"];
$trans_date 		= date("Y-m-d", strtotime($_POST["trans_date"]));

$konek = new mysqli("localhost", "root", "", "artatix");
$konek->begin_transaction();
$order = $konek->query("INSERT INTO tbl_customer 
						(cst_id,cst_name,cst_identity,cst_no_id,cst_email,cst_notelp) 
						VALUES ('$cst_id', 
								'$cst_name',
								'$cst_identity',
								'$cst_no_id',
								'$cst_email',
								'$cst_notelp')");
$order_id = $konek->insert_id;
$order_detail = $konek->query("INSERT INTO tbl_transaction 
						(trans_id,cart_id,cst_id,trans_total, trans_date)
						VALUES ('$trans_id',
								'$cart_id', 
								'$cst_id',
								'$trans_total',
								'$trans_date')");
if(!$order_detail){
	$konek->rollback();
}else{
	$konek->commit();
	header('Location: page_event_invoice_transaction.php?id=' . $trans_id);
	exit();	
}
// header('Location: page_event_invoice?id=' . $event_id);
?>