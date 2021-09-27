<?php
    session_start();
    error_reporting(0);
    include "../koneksi/koneksi.php";
    if ($_SESSION['user_level'] == "" || $_SESSION['user_level'] !== 'admin') {
        header("location:../page_login.php?pesan=belum_login");
    } 
    // elseif($_SESSION['user_level'] !== 'admin'){
    //     header("location:../page_login.php");
    // }

    $session_userlevel = $_SESSION['user_level'];
    $session_useremail = $_SESSION['user_email'];
    $session_userid    = $_SESSION['users_id'];
?>