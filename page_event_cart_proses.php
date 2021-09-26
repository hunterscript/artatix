<?php

session_start();
include "koneksi/koneksi.php";
error_reporting(0);

	$tkt_id				= $_POST["tkt_id"];
	$cart_id    		= $_POST["cart_id"];
    $event_id    		= $_POST["event_id"];
    $cart_qty    		= $_POST["cart_qty"];
    



	if ($add = mysqli_query($konek, "INSERT INTO tbl_cart ( tkt_id,
                                                            event_id,
															cart_id,
															cart_qty
															)
	VALUES(	'$tkt_id',
            '$event_id',
            '$cart_id',
			'$cart_qty')"))  {
    header('Location: page_event_cart_list.php?id=' . $cart_id);
    
    exit();
}
die("Terdapat kesalahan : " . mysqli_error($konek));
?>

    


