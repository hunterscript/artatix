<?php
    include "auth.php";
?>

<?php
	
$period_id			= $_POST["period_id"];
$period_name		= $_POST["period_name"];	
$period_date		= date("Y-m-d", strtotime($_POST["period_date"]));
$period_status		= $_POST["period_status"];	
$event_id			= $_POST["event_id"];



if ($edit = mysqli_query($konek, "UPDATE tbl_period SET

                                                        period_name='$period_name',
                                                        period_date='$period_date', 
                                                        period_status='$period_status',
                                WHERE period_id='$period_id'")) {

header('Location: event_detail.php?id=' . $event_id);

exit();
}
die("Terdapat kesalahan : " . mysqli_error($konek));
?>