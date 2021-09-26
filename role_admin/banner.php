<?php
include "auth.php";


// PRD001
$query = mysqli_query($konek, "SELECT max(banner_id) as bnrTerbesar FROM tbl_banner");
$data = mysqli_fetch_array($query);
$bnrTerbesar = $data['bnrTerbesar'];

$urutan = (int) substr($bnrTerbesar, 3, 3);

$urutan++;

$huruf = "BNR";
$bnrTerbesar = $huruf . sprintf("%03s", $urutan);




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
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Menu</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu">
                                    <a href="index.php">
                                        <span class="pcoded-micon active"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>

                            </ul>

                            <div class="pcoded-navigatio-lavel">Management</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu pcoded-trigger">
                                    <a href="event.php">
                                        <span class="pcoded-micon"><i class="feather icon-calendar"></i></span>
                                        <span class="pcoded-mtext">Event</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="active">
                                            <a href="banner.php">
                                                <span class="pcoded-mtext">Banner Utama</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="event.php">
                                                <span class="pcoded-mtext">Semua</span>
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

                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                                        <span class="pcoded-mtext">User</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="icon-font-awesome.htm">
                                                <span class="pcoded-mtext">Admin</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="icon-font-awesome.htm">
                                                <span class="pcoded-mtext">End User</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="icon-font-awesome.htm">
                                                <span class="pcoded-mtext">Member</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="row align-items-end">
                                            <div class="col-lg-4">
                                                <div class="d-inline">
                                                    <button type="button" class="btn btn-primary btn-square waves-effect  z-bottom-0 card-position" data-toggle="modal" data-target="#default-Modal">Add Banner</button>
                                                </div>
                                            </div>

                                            <!-- Modal large-->

                                            <div class="modal fade" id="default-Modal" tabindex="-1" role="dialog">
                                                <div class="modal-dialog " role="document">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Add Banner</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="banner_add.php" method="POST" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Banner Image<br> <small>1109 x 326</small></label>

                                                                        <div class="col-sm-8">

                                                                            <input type="hidden" class="form-control" name="banner_id" value="<?php echo $bnrTerbesar; ?>">
                                                                            <input type="file" name="banner_picture" class="form-control" multiple="multiple">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Event</label>
                                                                        <div class="col-sm-8">

                                                                            <select name="event_id" class="form-control">
                                                                                <?php
                                                                                $tktevent = mysqli_query($konek, "SELECT*FROM tbl_event");
                                                                                while ($data = mysqli_fetch_array($tktevent)) {
                                                                                ?>
                                                                                    <option value="<?= $data['event_id'] ?>"><?= $data['event_name'] ?></option>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Status</label>
                                                                        <div class="col-sm-8">

                                                                            <select name="banner_status" class="form-control">

                                                                                <option value="Active">Active</option>
                                                                                <option value="Not Active">Not Active</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">

                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <br>

                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table class="table table-striped table-bordered nowrap">
                                                                <?php
                                                                include "dt_banner.php";
                                                                ?>
                                                            </table>
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
            </div>
        </div>
        <!-- Library Scripts -->
        <?php
        include "../bundle_script.php";
        ?>

        </script>
</body>

</html>