<?php
include "auth.php";
?>

<?php
$banner_id           = $_POST["banner_id"];
$banner_picture       = $_FILES['banner_picture']['name'];
$event_id            = $_POST["event_id"];

if ($add = mysqli_query($konek, "INSERT INTO tbl_banner (   banner_id,
															banner_picture,
															event_id)
	VALUES(	
			'$banner_id',
			'$banner_picture',
			'$event_id')")) {
    header('Location: banner.php');
    move_uploaded_file($_FILES['banner_picture']['tmp_name'],'../img/home_banner/'.$banner_picture);
    exit();
}
die("Terdapat kesalahan : " . mysqli_error($konek));
?>
