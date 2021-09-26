<?php
    include "auth.php";
?>

<?php 
$banner_id	= $_GET["id"];

	
if($delete = mysqli_query ($konek, "DELETE FROM tbl_banner 
WHERE tbl_banner.`banner_id`='$event_id'")){
    header('Location: banner.php');
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));


?>