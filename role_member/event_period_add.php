﻿<?php
include "auth.php";
if(isset($_POST['save_multiple']))
{
	$period_id			= $_POST["period_id"];
	$period_name		= $_POST["period_name"];
	$period_date		= date("Y-m-d", strtotime($_POST["period_date"]));
	$period_status		= $_POST["period_status"];
	$ticket				= $_POST["ticket"];
	$event_id			= $_POST["event_id"];	


	foreach ($ticket as $rowticket) 
	{
		echo $rowticket;
		$add ="INSERT INTO tbl_period ( 
				period_id,
				period_name,
				period_date,
				period_status,
				tkt_id)
					VALUES(
					'$period_id',
					'$period_name',
					'$period_date',
					'$period_status',
					'$rowticket')";
		$query_run = mysqli_query($konek,$add);

	}
}

?>