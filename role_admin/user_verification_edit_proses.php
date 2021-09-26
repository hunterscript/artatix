<?php
include "auth.php";

// menangkap data yang di kirim dari form
$user_id                  = $_POST["user_id"];
$uservl_status            = $_POST["uservl_status"];


// update data ke database
if ($edit = mysqli_query($konek, "UPDATE tbl_user SET 
                                        uservl_status   ='$uservl_status'
                                
                                WHERE user_id ='$user_id'")); {



     header('Location: user_verification.php?id=' . $user_id);

    exit();
}
die("Terdapat kesalahan : " . mysqli_error($konek));
