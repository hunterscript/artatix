<?php
    session_start();
    include "../koneksi/koneksi.php";
    if(isset($_SESSION['user_email_google'])){
        $session_useremail = $_SESSION['user_email_google'];
    }elseif ($_SESSION['user_level'] == "" || $_SESSION['user_level'] !== 'member') {
        header("location:../page_login.php?pesan=belum_login");
    }

    $session_userlevel = isset($_SESSION['user_level']);
    $session_useremail = $_SESSION['user_email'];
    $session_userid    = isset($_SESSION['user_id']);
    
?>