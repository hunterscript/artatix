<?php
session_start();

if ($_SESSION['user_level'] == "") {
	header("location:page_login.php");
}
$error = true;
try{

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
	$error = false;
}catch(Exception $e){

	$error = true;
	return $e;
}

if($error){
	return header("Location: " . $_SERVER["HTTP_REFERER"].'&error=Data Tidak Lengkap');
}

$konek = new mysqli("localhost", "root", "", "prj_artatix");
$error = true;
try{
	$checkQuery = mysqli_query($konek, "SELECT tkt_date_start,tkt_date_finish FROM tbl_cart LEFT JOIN tbl_ticket ON tbl_cart.tkt_id=tbl_ticket.tkt_id WHERE tbl_cart.cart_id='$cart_id'");
	$now = DateTime::createFromFormat(('Y-m-d'),date('Y-m-d'),new DateTimeZone('UTC'));  
	while ($cart = mysqli_fetch_array($checkQuery)){
        if(strtotime($cart['tkt_date_start']) <= $now->getTimestamp() && strtotime($cart['tkt_date_finish']) > $now->getTimestamp()){
        	$error = false;
        }
	}
}catch(Exception $e){
	$error = true;
}

if($error){
	return header("Location: " . $_SERVER["HTTP_REFERER"].'&error=Tiket Sudah Kadaluarsa');
}


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