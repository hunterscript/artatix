<?php
include "auth.php";
$user_id2 = $_GET["id"];


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

            <nav class="pcoded-navbar">
                <div class="pcoded-inner-navbar main-menu">
                    <div class="pcoded-navigatio-lavel">Menu</div>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded">
                            <a href="index.php">
                                <span class="pcoded-micon "><i class="feather icon-home"></i></span>
                                <span class="pcoded-mtext">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                    <div class="pcoded-navigatio-lavel">Management</div>
                    <ul class="pcoded-item">
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-calendar"></i></span>
                                <span class="pcoded-mtext">Event</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="Active">
                                    <a href="admin_event_all.php">
                                        <span class="pcoded-mtext active">Semua</span>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)">

                                <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
                                <span class="pcoded-mtext">Report</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class=" ">
                                    <a href="icon-font-awesome.htm">
                                        <span class="pcoded-mtext">Report Event</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="icon-font-awesome.htm">
                                        <span class="pcoded-mtext">Report Revenue</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-command"></i></span>
                                <span class="pcoded-mtext">Withdraw</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class=" ">
                                    <a href="icon-font-awesome.htm">
                                        <span class="pcoded-mtext">Status</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="pcoded-hasmenu active">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon "><i class="feather icon-user"></i></span>
                                <span class="pcoded-mtext">User</span>
                            </a>

                        </li>
                    </ul>

                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Menu</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded">
                                    <a href="index.php">
                                        <span class="pcoded-micon "><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigatio-lavel">Management</div>
                            <ul class="pcoded-item">
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-calendar"></i></span>
                                        <span class="pcoded-mtext">Event</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="admin_event_all.php">
                                                <span class="pcoded-mtext ">Semua</span>
                                            </a>
                                        </li>


                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">

                                        <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
                                        <span class="pcoded-mtext">Report</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="icon-font-awesome.htm">
                                                <span class="pcoded-mtext">Report Event</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="icon-font-awesome.htm">
                                                <span class="pcoded-mtext">Report Revenue</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <!-- <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-command"></i></span>
                                        <span class="pcoded-mtext">Withdraw</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="icon-font-awesome.htm">
                                                <span class="pcoded-mtext">Status</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li> -->


                                <li class="pcoded-hasmenu active">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fa fa-user"></i></span>
                                        <span class="pcoded-mtext">User</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="Active ">
                                            <a href="user.php">
                                                <span class="pcoded-mtext">All User</span>
                                            </a>
                                        </li>

                                    </ul>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="user_verification.php">
                                                <span class="pcoded-mtext">Need Verification</span>
                                            </a>
                                        </li>

                                    </ul>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="user_verified.php">
                                                <span class="pcoded-mtext">Verified</span>
                                            </a>
                                        </li>

                                    </ul>


                                </li>
                            </ul>

                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <div class="d-inline">
                                                        <h4>Verification User</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="page-header-breadcrumb">
                                                    <ul class="breadcrumb-title">
                                                        <li class="breadcrumb-item">
                                                            <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="user_verification.php">User Verification</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->

                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <form action="user_verification_edit_proses.php" method="POST" enctype="multipart/form-data">
                                                    <!-- Basic Form Inputs card start -->

                                                    <?php

                                                    $queryuservl = mysqli_query($konek, "SELECT
                                                    tbl_user.user_id,
                                                    tbl_user.user_email,
                                                    tbl_user.user_password,
                                                    tbl_user.user_nmlengkap,
                                                    tbl_user.user_notelp,
                                                    tbl_user.user_level,
                                                    tbl_user.uservl_status,
                                                    tbl_user_vl.uservl_id,
                                                    tbl_user_vl.uservl_img_identity1,
                                                    tbl_user_vl.uservl_number_identity1,
                                                    tbl_user_vl.uservl_name_identity1,
                                                    tbl_user_vl.uservl_address_identity1,
                                                    tbl_user_vl.uservl_img_identity2,
                                                    tbl_user_vl.uservl_number_identity2,
                                                    tbl_user_vl.uservl_name_identity2,
                                                    tbl_user_vl.uservl_address_identity2
                                                FROM
                                                    tbl_user
                                                INNER JOIN tbl_user_vl ON tbl_user.user_id = tbl_user_vl.user_id WHERE tbl_user.user_id='$user_id2' ;");
                                                    if ($queryuservl == false) {
                                                        die("Terjadi Kesalahan : " . mysqli_error($konek));
                                                    }
                                                    while ($uservl = mysqli_fetch_array($queryuservl)) {
                                                        $id = $uservl['user_id'];
                                                    ?>
                                                        <div class="card">
                                                            <div class="card-block">
                                                                <div class="form-group row">
                                                                    <h6 class=" col-sm-7 ">1st Identity *</h6>
                                                                    <h6 class="col-sm-4">Status : <?php if ($uservl['uservl_status'] == 0) {
                                                                                                        echo ' 
                                                                            <p class="text-c-pink f-w-500" </i><b> NEED VERIFICATION</b></p>';
                                                                                                    } else {
                                                                                                        echo ' 
                                                                            <p class="text-c-green  f-w-500" </i><b>VERIFIED</b></p>';
                                                                                                    }
                                                                                                    ?>
                                                                    </h6>

                                                                </div>
                                                                <hr>
                                                                <form action="user_verification_edit_proses.php" method="post" enctype="multipart/form-data">


                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Name </label>
                                                                        <div class="col-sm-5">
                                                                            :&nbsp; <?= $uservl['uservl_name_identity1'] ?>

                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Id Number </label>
                                                                        <div class="col-sm-5">
                                                                            :&nbsp; <?= $uservl['uservl_number_identity1'] ?>

                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Address</label>
                                                                        <div class="col-sm-5">
                                                                            :&nbsp; <?= $uservl['uservl_address_identity1'] ?>
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">image </label>
                                                                        <div class="col-sm-5">
                                                                            :&nbsp; <img src="../img/verification/identity1/<?php echo $uservl['uservl_img_identity1']; ?>" width="400" height="240">
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <h6>2nd Identity </h6>

                                                                    <div class="form-group row">

                                                                        <label class="col-sm-2 col-form-label">Identity Name </label>
                                                                        <div class="col-sm-5">
                                                                            :&nbsp; <?= $uservl['uservl_name_identity2'] ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Id Number </label>
                                                                        <div class="col-sm-5">
                                                                            :&nbsp; <?= $uservl['uservl_number_identity2'] ?>
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Address</label>
                                                                        <div class="col-sm-5">
                                                                            :&nbsp; <?= $uservl['uservl_address_identity2'] ?>
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">image Identity</label>
                                                                        <div class="col-sm-5">
                                                                            :&nbsp; <img src="../img/verification/identity2/<?= $uservl['uservl_img_identity2']; ?>" width="400" height="240">
                                                                        </div>

                                                                    </div>
                                                                    <br>
                                                                    <h6>Verification Account</h6>
                                                                    <div class="form-group row">

                                                                        <div class="col-sm-5">
                                                                            <select name="uservl_status" class="form-control">
                                                                                <option value="">-- Choose --</option>
                                                                                <option value="1">Verified</option>
                                                                                <option value="0">Need Verification</option>
                                                                            </select>
                                                                        </div>

                                                                        <input type="hidden" name="user_id" class="form-control" value="<?= $id ?>">

                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col">

                                                                        </div>
                                                                        <div class="col-sm-10">

                                                                        </div>
                                                                        <div class="col">
                                                                            <button type="submit" class="btn  btn-primary form-control">Save</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>

                                                    <?php } ?>
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