<?php

include 'koneksi/koneksi.php';

use \PHPMailer\PHPMailer\PHPMailer;

use \PHPMailer\PHPMailer\Exception;

require 'plugin/PHPMailer/src/Exception.php';

require 'plugin/PHPMailer/src/PHPMailer.php';

require 'plugin/PHPMailer/src/SMTP.php';

$token = uniqid(true);

$mail = new PHPMailer(true);
$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->Host = 'smtp.mailtrap.io';
$mail->SMTPAuth = true;
//ganti dengan email dan password yang akan di gunakan sebagai email pengirim
$mail->Username = '0e891a49a82924';
$mail->Password = 'bd53f332f3db42';
$mail->SMTPSecure = 'tsl';
$mail->Port = 465;

//ganti dengan email yg akan di gunakan sebagai email pengirim
$mail->setFrom('testerartatix@gmail.com', 'Artatix');
$mail->addAddress($_POST['user_email'], 'TestngAddress');
$mail->isHTML(true);
$mail->Subject = "Aktivasi pendaftaran Member";
$mail->Body = "Selemat, anda berhasil membuat akun. Untuk mengaktifkan akun anda silahkan klik link dibawah ini.
 <a href='http://localhost/artatix/page_lupapass.php?t=".$token."'>http://localhost/artatix/page_lupapass.php?t=".$token."</a>  ";
$mail->send();
header('location: page_lupapass.php?pesan=sended');

if(isset($_POST['btn_email'])){
    if($_POST['user_email'] != ''){
        $email_s = $_POST['user_email'];
        session_start();
        $_SESSION['reset_email'] = $email_s;
        $code = rand();
        mysqli_query($konek, "INSERT INTO tbl_code VALUES ($code, $email_s)");
    }
}

$password = md5($_POST['user_password']);
$email = $_POST["user_email"];

$sql = "SELECT * FROM tbl_user WHERE user_email = '$email'";
$result = mysqli_query($konek, $sql);
if (mysqli_num_rows($result) > 0) {
    
    if(isset($password)){
        $sql = "UPDATE tbl_user SET user_password='$password' WHERE user_email='$email'";
        mysqli_query($konek, $sql);
    }

} else {
	header("location: page_lupapass.php?pesan=email_not_exists");
}