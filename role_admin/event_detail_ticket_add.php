﻿﻿<?php
	session_start();
	include "../koneksi/koneksi.php";



	$tkt_id				= $_POST["tkt_id"];
	$tkt_category		= $_POST["tkt_category"];
	$tkt_stock			= $_POST["tkt_stock"];
	$tkt_price			= str_replace('.','',str_replace('Rp. ','',$_POST["tkt_price"]));
	$tkt_ppn			= $_POST["tkt_ppn"];
	$event_id			= $_POST["event_id"];
	$period_id			= $_POST["period_id"];
	if ($add = mysqli_query($konek, "INSERT INTO tbl_ticket ( tkt_id,
															tkt_category,
															tkt_item,
															tkt_stock,
															tkt_price,
															tkt_ppn,
															event_id,
															period_id)
	VALUES(	'$tkt_id',
			'$tkt_category',
			'$tkt_item',
			'$tkt_stock',
			'$tkt_price',
			'$tkt_ppn',
			'$event_id',
			'$period_id')"))
	{
		header('Location: event_detail_ticket.php?id=' . $period_id);
	exit();
	
	}
	die("Terdapat kesalahan : " . mysqli_error($konek));
?>