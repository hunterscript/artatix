<?php
session_start();
include "koneksi/koneksi.php";
?>



<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <title>Artatix - Home</title>
    <!-- Library CSS -->
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav2.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->


    <!-- Library Scripts -->
    <?php
    include "bundle_css_enduser.php";
    ?>
</head>

<body>
    <!-- Start Header Area -->
    <header class="default-header border-bottom">
        <div class="main-menu">
            <div class="container">
                <div class="row align-items-center justify-content-between d-flex">
                    <div id="logo">
                        <div class="container">
                            <a href="index.php"><img src="img/logo/Artatix2.png" width="130" height="30" alt="" title="" /></a>
                        </div>
                    </div>
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li class="menu-active"><a href="index.php">Home</a></li>
                            <li><a href="page_kategori.php">Kategori Event</a></li>
                            <li><a href="page_contact.php">Hubungi Kami</a></li>
                            <?php
                            if (isset($_SESSION['user_level'])) {
                                $id_u = $_SESSION['user_id'];
                                $queryName = mysqli_query($konek, "SELECT user_email FROM tbl_user WHERE user_id='$id_u'");

                                $name = mysqli_fetch_object($queryName);

                                if ($_SESSION['user_level'] === 'admin') {
                                    echo '<li><a href="role_admin/index.php">' . $name->user_email . '</a></li>';
                                } elseif ($_SESSION['user_level'] === 'member') {
                                    echo '<li><a href="role_member/index.php">' . $name->user_email . '</a></li>';
                                } else {
                                    echo '<li><a href="page_login.php">Login</a></li>';
                                }
                            } else {
                                echo '<li><a href="page_login.php">Login</a></li>';
                            }
                            ?>
                        </ul>
                    </nav>
                    <!--######## #nav-menu-container -->
                </div>
            </div>
        </div>
    </header><br>
    <!-- End Header Area -->
    <!-- Set up your HTML -->
    <div class="white-space-20"></div>


    <section class="home-banner-area relative" id="home">
        <div class="container">

            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "sended") {
                    echo "<div class='alert alert-danger' role='alert'>Email Verifikasi Telah terkirim. silahkan cek email anda!</div>";
                } elseif ($_GET['pesan'] == "email_not_exists") {
                    echo "<div class='alert alert-danger' role='alert'>Email Belum terdaftar!</div>";
                }
            }
            ?>


            <div class="section-top-border">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <h3>Create new password</h3>
                        <small>Please Choose strong password</small>
                        <form action="mail.php" method="post">
                            <div class="mt-4">
                                <input type="text" name="user_password" class="single-input" placeholder="Password">
                            </div>
                            <br>
                            <a href="#"><button type="submit" name="btn_email" class="genric-btn primary large circle">Change Password</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Start Event Card2 Area --->




    <!-- ========================= FOOTER ========================= -->
    <!-- Library Scripts -->
    <?php
    include "footer.php";
    ?>

    <!-- ========================= FOOTER END // ========================= -->


    <!-- Library Scripts -->
    <?php
    include "bundle_script_enduser.php";
    ?>



    <!--End of Tawk.to Script-->
</body>

</html>