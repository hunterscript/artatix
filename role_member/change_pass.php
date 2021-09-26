<?php
include "auth.php";
?>

<?php
$user_id = $_GET["id"];

$query = mysqli_query($konek, "SELECT max(uservl_id) as kodeUservl FROM tbl_user_vl");
$data = mysqli_fetch_array($query);
$kodeUservl = $data['kodeUservl'];
// mengambil angka dari kode barang terbesar, menggunakan fungsi substr dan diubah ke integer dengan (int)
$urutan = (int) substr($kodeUservl, 3, 3);
// nomor yang diambil akan ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
// membuat kode barang baru
// string sprintf("%03s", $urutan); berfungsi untuk membuat string menjadi 3 karakter
// misalnya string sprintf("%03s", 22); maka akan menghasilkan '022'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya PC
$huruf = "USRVL";
$kodeUservl = $huruf . sprintf("%03s", $urutan);

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
                                                        <h4><?php echo $_SESSION['user_email']; ?></h4>
                                                        <span>Change Password In Here.</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="page-header-breadcrumb">
                                                    <ul class="breadcrumb-title">
                                                        <li class="breadcrumb-item">
                                                            <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!">User Profile</a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!">Change Password</a>
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
                                            <div class="col-lg-12">
                                                <!-- tab header start -->

                                                <!-- tab header end -->
                                                <!-- tab content start -->
                                                <div class="tab-content">
                                                    <!-- tab panel personal start -->
                                                    <div class="tab-pane active" id="personal" role="tabpanel">
                                                        <!-- personal card start -->
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5>Change Password</h5>
                                                            </div>
                                                            <div class="card-block">
                                                                <div class="view-info">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="general-info">
                                                                                <div class="row mt-3">
                                                                                    <!-- end of table col-lg-6 -->
                                                                                    <div class="container">
                                                                                        <div class="col-lg-6 col-12">
                                                                                            <form action="" method="post">
                                                                                                <div class="form-group  mt-2">
                                                                                                    <label>Old Password</label>
                                                                                                    <input type="text" name="old_pass" class="form-control">
                                                                                                </div>
                                                                                                <div class="form-group  mt-2">
                                                                                                    <label>New Password</label>
                                                                                                    <input type="password" name="new_pass" class="form-control">
                                                                                                </dfiv>
                                                                                                <div class="form-group  mt-2">
                                                                                                    <label>Confirm Password</label>
                                                                                                    <input type="password" name="conf_pass" class="form-control">
                                                                                                </div>
                                                                                                <div class="form-group  mt-4">
                                                                                                    <div class="row">
                                                                                                        <div class="col-6">
                                                                                                            <button type="submit" name="btn_change" class="btn  btn-primary btn-sm form-control">Change </button>
                                                                                                        </div>
                                                                                                        <div class="col-6">
                                                                                                            <input type="reset" class="btn  btn-primary btn-sm form-control" value="Reset" />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </form>
                                                                                            <?php
                                                                                                $passQuery = mysqli_query($konek, "SELECT user_password FROM tbl_user WHERE user_id='$user_id'");
                                                                                                $dataPass = mysqli_fetch_assoc($passQuery);

                                                                                                if(isset($_POST['btn_change'])){
                                                                                                    if($dataPass['user_password'] == md5($_POST['old_pass'])){
                                                                                                        $newPass = $_POST['new_pass'];
                                                                                                        $confPass = $_POST['conf_pass'];

                                                                                                        if($newPass == $confPass){
                                                                                                            $newPass = md5($newPass);
                                                                                                            $changeQuery = mysqli_query($konek, "UPDATE tbl_user SET user_password='$newPass' WHERE user_id='$user_id");
                                                                                                            if($changeQuery){
                                                                                                                echo "<script>alert('Password berhasil diganti.')</script>";
                                                                                                            } else {
                                                                                                                echo "<script>alert('gagal merubah password')</script>";
                                                                                                            }
                                                                                                        } else {
                                                                                                            echo "<script>alert('Password Baru tidak sesuai!')</script>";
                                                                                                        }
                                                                                                    } else {
                                                                                                        echo "<script>alert('Password Lama Salah!')</script>";
                                                                                                    }
                                                                                                }
                                                                                            ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- end of table col-lg-6 -->
                                                                                </div>
                                                                                <!-- end of row -->
                                                                            </div>
                                                                            <!-- end of general info -->
                                                                        </div>
                                                                        <!-- end of col-lg-12 -->
                                                                    </div>
                                                                    <!-- end of row -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end of row -->
                                                    </div>
                                                </div>
                                                <!-- end of card-block -->
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