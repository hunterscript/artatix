<?php
include "auth.php";
?>

<?php

$user_id = $_GET["id"];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Member | Dashboard</title>
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
            include "navbar.php";
            ?>



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
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded pcoded-trigger">
                                    <a href="event.php">
                                        <span class="pcoded-micon "><i class="feather icon-calendar"></i></span>
                                        <span class="pcoded-mtext">Event</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">

                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">

                                        <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
                                        <span class="pcoded-mtext">Report</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="report_event.php">
                                                <span class="pcoded-mtext">Report Event</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="report_event.php">
                                                <span class="pcoded-mtext">Report Checkin</span>
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
                                                        <h4>User Profile Edit</h4>
                                                        <span>Kamu bisa update profil disini</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="page-header-breadcrumb">
                                                    <ul class="breadcrumb-title">
                                                        <li class="breadcrumb-item">
                                                            <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="user_profil.php?id=<?php echo $user_id ?>">User Profile</a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!">User Profile Edit</a>
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
                                                <?php
                                                $queryuser = mysqli_query($konek, "SELECT*FROM tbl_user where user_id='$user_id'");
                                                if ($queryuser == false) {
                                                    die("Terjadi Kesalahan : " . mysqli_error($konek));
                                                }
                                                while ($user = mysqli_fetch_array($queryuser)) {
                                                ?>
                                                    <form action="user_profil_edit_proses.php" method="POST" enctype="multipart/form-data">
                                                        <!-- Basic Form Inputs card start -->

                                                        <div class="card">
                                                            <div class="card-block">
                                                                <h4 class="sub-title"> Profile</h4>

                                                                <input type="hidden" class="form-control" value="<?php echo $user['user_id']; ?>" name="user_id" readonly>


                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" value="<?php echo $user['user_nmlengkap']; ?>" name="user_nmlengkap" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Email</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" readonly value="<?php echo $user['user_email']; ?>" name="user_email">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">No Telepon</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" value="<?php echo $user['user_notelp']; ?>" name="user_notelp">
                                                                    </div>

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
                                                            </div>
                                                        </div>

                                                    </form>
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