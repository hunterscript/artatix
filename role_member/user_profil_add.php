<?php
    include "auth.php";
?>

<?php

$limit = 2 * 1024 * 1024;
$ekstensi =  array('png','jpg','jpeg');

	$namafile = $_FILES['uservl_img_identity1']['name'];
	$tmp = $_FILES['uservl_img_identity1']['tmp_name'];
	$tipe_file = pathinfo($namafile, PATHINFO_EXTENSION);
  $ukuran = $_FILES['uservl_img_identity1']['size'];

  $namafile2 = $_FILES['uservl_img_identity2']['name'];
	$tmp2 = $_FILES['uservl_img_identity2']['tmp_name'];
	$tipe_file2 = pathinfo($namafile2, PATHINFO_EXTENSION);
  $ukuran2 = $_FILES['uservl_img_identity2']['size'];
   
  $uservl_id                  = $_POST["uservl_id"];
  $user_id                    = $_POST["user_id"];
  $uservl_img_identity1       = $_FILES['uservl_img_identity1']['name'];
  $uservl_number_identity1    = $_POST["uservl_number_identity1"];
  $uservl_name_identity1      = $_POST["uservl_name_identity1"];
  $uservl_address_identity1   = $_POST["uservl_address_identity1"];
  
  $uservl_img_identity2       = $_FILES['uservl_img_identity2']['name'];
  $uservl_number_identity2    = $_POST["uservl_number_identity2"];
  $uservl_name_identity2      = $_POST["uservl_name_identity2"];
  $uservl_address_identity2   = $_POST["uservl_address_identity2"];

  $uservl_status = $_POST["uservl_status"];

	if($ukuran > $limit && $ukuran2 > $limit){
		header("location: user_profil.php?id=$user_id&pesan=gagal_ukuran");		
	}else{
		if(!in_array($tipe_file, $ekstensi) && !in_array($tipe_file2, $ekstensi)){
			header("location: user_profil.php?id=$user_id&pesan=gagal_ektensi");			
		}else{		
      // move_uploaded_file($tmp, 'file/'.date('d-m-Y').'-'.$namafile);
      $uservl_img_identity1 = rand().'-'.$namafile;
      $uservl_img_identity2 = rand().'-'.$namafile2;
      $sql1 = mysqli_query($konek, "INSERT INTO tbl_user_vl ( uservl_id,
                                                                user_id,
                                                                uservl_img_identity1,
                                                                uservl_number_identity1,
                                                                uservl_name_identity1,
                                                                uservl_address_identity1,
                                                                uservl_img_identity2,
                                                                uservl_number_identity2,
                                                                uservl_name_identity2,
                                                                uservl_address_identity2,
                                                                uservl_status)
                                        VALUES('$uservl_id',
                                              '$user_id',
                                              '$uservl_img_identity1',
                                              '$uservl_number_identity1',
                                              '$uservl_name_identity1',
                                              '$uservl_address_identity1',
                                              '$uservl_img_identity2',
                                              '$uservl_number_identity2',
                                              '$uservl_name_identity2',
                                              '$uservl_address_identity2',
                                              '$uservl_status')");
			if($sql1){
        move_uploaded_file($tmp, '../img/verification/identity1/'.$uservl_img_identity1);
        move_uploaded_file($tmp2, '../img/verification/identity2/'.$uservl_img_identity2);
        header("location: user_profil.php?id=$user_id&pesan=simpan");
        exit();
      }
		}
	}
  die("Terdapat kesalahan : " . mysqli_error($konek));
  ?>
