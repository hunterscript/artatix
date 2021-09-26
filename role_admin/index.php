<?php
include "auth.php";

error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | Dashboard</title>
    <!-- Library CSS -->
    <?php
    include "../bundle_css.php";
    ?>

</head>

<body>



    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <?php
            include "../role_member/navbar.php";
            ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php
                        include 'sidebar_dash.php';
                    ?>

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <?php
                                        if(isset($_GET['pesan'])){
                                            if($_GET['pesan'] == "success"){
                                                echo "<div class='alert alert-success' role='alert'>Berhasil Login! Selamat Datang $session_useremail</div>";
                                            }
                                        }
                                    ?>
                                    <div class="page-body">

                                        <div class="row">

                                            <!-- statustic-card start -->
                                            <div class="col-xl-3 col-md-6">
                                                <?php
                                                $dtuser_needverification = mysqli_query($konek, "SELECT*FROM tbl_user WHERE uservl_status='0'");
                                                $count_dt = mysqli_num_rows($dtuser_needverification);
                                                ?>
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-yellow f-w-600"><?= $count_dt ?> User</h4>
                                                                <span class="text-muted ">Need Validation</span>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-user-plus f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-yellow">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <a href="user_verification.php">
                                                                    <h6 class="text-white m-b-0">Check</h6>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-arrow-right text-white f-16"></i>
                                                            </div></a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <?php
                                                $dtuser_event = mysqli_query($konek, "SELECT*FROM tbl_event WHERE event_status='0' and event_jenis='0'");
                                                $count_event = mysqli_num_rows($dtuser_event);
                                                ?>
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-green f-w-600"><?= $count_event ?> Event</h4>
                                                                <span class="text-muted ">New Event</span>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-user-plus f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-green">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <a href="event.php">
                                                                    <h6 class="text-white m-b-0">Check</h6>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-arrow-right text-white f-16"></i>
                                                            </div></a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Library Scripts -->
    <?php
    include "../bundle_script.php";
    ?>

    </script>
</body>

</html>