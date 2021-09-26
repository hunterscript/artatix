<?php
    include "auth.php";
?>



<?php
$tkt_id		 = $_GET["id"];
$event_id		 = $_GET["event_id"];

if($delete = mysqli_query ($konek, "DELETE FROM tbl_ticket   WHERE tkt_id='$tkt_id'"))

{
	
	header('Location: event_detail.php?id=' . $event_id);
	exit();

}
die ("Terdapat Kesalahan : ".mysqli_error($konek));
