<?php
    session_start();
    
    include 'google_config.php';

    if(isset($_GET['code'])){
        $gclient->authenticate($_GET['code']);
        $_SESSION['token'] = $gclient->getAccessToken();
    }

    if (isset($_SESSION['token'])) {
        $gclient->setAccessToken($_SESSION['token']);
    }

    if ($gclient->getAccessToken()) {
        include 'koneksi/koneksi.php';

        // Get user profile data from google
        $gpuserprofile = $google_oauthv2->userinfo->get();

        $nama = $gpuserprofile['given_name']." ".$gpuserprofile['family_name']; // Ambil nama dari Akun Google
        $email = $gpuserprofile['email']; // Ambil email Akun Google nya

        $sqlLogin = mysqli_query($konek, "SELECT * FROM tbl_user WHERE user_email='$email'");
        $sqlLogin = mysqli_fetch_assoc($sqlLogin);

        if(!empty($sqlLogin)){
            $_SESSION['user_email_google'] = $sqlLogin['user_email'];
            header('location: page_login_vl.php');
        }else{
            $query = mysqli_query($konek, "SELECT max(user_id) as kodeTerbesar FROM tbl_user");
            $data = mysqli_fetch_array($query);
            $kodeUser = $data['kodeTerbesar'];
            $urutan = (int) substr($kodeUser, 3, 3);
            $urutan++;
            $huruf = "USR";
            $kodeUser = $huruf . sprintf("%03s", $urutan);

            // var_dump($nama, $email, $kodeUser);die();

            $g_regis = mysqli_query($konek, "INSERT INTO tbl_user(user_id, user_email, user_nmlengkap, user_notelp, user_level, uservl_status)
                                    VALUES ('$kodeUser', '$email', '$nama', 0, 'member', 0)");
            if($g_regis){
                $_SESSION['user_email_google'] = $sqlLogin['user_email'];
                header('location: page_login_vl.php');
            } else{
                echo "Terjadi kesalahan:".mysqli_error($konek);
            }
        }
    }
?>