<?php
include "auth.php";
$event_id = $_GET["id"];
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
            </div>pe
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
                            <?php
                            $qry_evntname = mysqli_query($konek, "SELECT*FROM tbl_event where event_id='$event_id'");
                            if ($qry_evntname == false) {
                                die("Terjadi Kesalahan : " . mysqli_error($konek));
                            }
                            while ($eventname = mysqli_fetch_array($qry_evntname)) {
                            ?>
                                <div class="pcoded-navigatio-lavel"> <?= $eventname['event_name'] ?></div>
                            <?php } ?>
                            <ul class="pcoded-item ">
                                <li class="pcoded ">
                                    <a href="event.php">
                                        <span class="pcoded-micon "><i class="feather icon-calendar"></i></span>
                                        <span class="pcoded-mtext">Event</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">

                                <li class="pcoded-hasmenu pcoded-trigger">
                                    <a href="javascript:void(0)">

                                        <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
                                        <span class="pcoded-mtext">Report</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="active">
                                            <a href="report_event_sales.php">
                                                <span class="pcoded-mtext">Sales Report</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="report_event.php?id=<?= $event_id; ?>">

                                                <span class="pcoded-mtext">Data Pemesan</span>
                                            </a>
                                        </li>
                                    </ul>


                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="report_event_checkin.php?id=<?= $event_id; ?>">
                                                <span class="pcoded-mtext">Check-in</span>
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
                                    <div class="page-header">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <div class="d-inline">
                                                        <h4>Event</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="page-header-breadcrumb">
                                                    <ul class="breadcrumb-title">
                                                        <li class="breadcrumb-item">
                                                            <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!">Event</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="page-body">
                                            <div class="row align-items-end">
                                                <div class="col-lg-4">
                                                    <div class="d-inline">
                                                        <select name="select" class="form-control">
                                                            <option value="opt1">Lomba Makan Kerupuk</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="page-header-breadcrumb">
                                                        <div class="d-inline">

                                                            <a href="event_create.php"><button class="btn btn-primary btn-square waves-effect  z-bottom-0 card-position">Create Event</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 p-t-20 ">
                                                    <div class="page-header-title">
                                                        <div class="d-inline">
                                                            <h6>Ringkasan</h6>
                                                        </div>
                                                    </div>
                                                    <a href="#">
                                                        <div class="card text-black">
                                                            <div class="card-block">
                                                                <div class="row align-items-center">
                                                                    <div class="col">
                                                                        <p class="m-b-5">Total Penjualan Tiket</p>
                                                                        <h6 class="m-b-0">RP 999.999.999</h4>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="col-xl-3 col-md-6">
                                                    <a href="#">
                                                        <div class="card text-black">
                                                            <div class="card-block">
                                                                <div class="row align-items-center">
                                                                    <div class="col">
                                                                        <p class="m-b-5">Biaya Layanan Penjualan </p>
                                                                        <h6 class="m-b-0">(-) RP 49.000</h4>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <a href="#">
                                                        <div class="card text-primary">
                                                            <div class="card-block">
                                                                <div class="row align-items-center">
                                                                    <div class="col">
                                                                        <p class="m-b-5">Total Pendapatan </p>
                                                                        <h6 class="m-b-0"> RP 999.000.999</h4>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <a href="#">
                                                        <div class="card text-primary">
                                                            <div class="card-block">
                                                                <div class="row align-items-center">
                                                                    <div class="col">
                                                                        <p class="m-b-5">Dana Belum di tarik </p>
                                                                        <h6 class="m-b-0"> RP 80.000</h4>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="col-xl-4 col-md-6  ">
                                                    <div class="page-header-title">
                                                        <div class="d-inline">
                                                            <h6>Riwayat Penarikan</h6>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="page-body">
                                                <!-- Hover table card start -->
                                                <div class="card">

                                                    <div class="card-block table-border-style">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Penarikan Terakhir</th>
                                                                        <th>Rekening</th>
                                                                        <th>Tanggal dan Waktu</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">1</th>
                                                                        <td>Rp 90.000.000</td>
                                                                        <td>BCA - 07333289</td>
                                                                        <td>15 Sep 2021, 14:08</td>
                                                                        <td>
                                                                            <p class="text-c-green  " </i><b>PAID</b></p>
                                                                        </td>
                                                                    </tr>

                                                                </tbody>
                                                                <tfoot>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th> </th>
                                                                    <th>
                                                                        <small>Rekening Tujuan</small><select name="select" class="form-control">
                                                                            <option value="opt1">BCA - 0333289</option>
                                                                        </select>
                                                                        <button class="btn btn-secondary btn-xs btn-square waves-effect ">Tarik Pendapatan</button>
                                                                    </th>
                                                                </tfoot>
                                                            </table>
                                                        </div>


                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row align-items-end">
                                                <div class="page-body">
                                                    <!-- Hover table card start -->
                                                    <div class="col-xl-12 col-md-12  ">
                                                        <div class="page-header-title">
                                                            <div class="d-inline">
                                                                <h6>Penjualan Tiket</h6>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-end">
                                                            <div class="col-lg-4">
                                                                <div class="d-inline">
                                                                    <select name="select" class="form-control">
                                                                        <option value="opt1">VIP</option>
                                                                        <option value="opt1">PLATINUM</option>
                                                                        <option value="opt1">GOLD</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-block table-border-style">
                                                                <div class="table-responsive">
                                                                    <table class="table table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>Nama Tiket</th>
                                                                                <th>Harga Tiket</th>
                                                                                <th>Tiket Terjual</th>
                                                                                <th>Total Penjualan</th>
                                                                                <th>Biaya Layanan</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">1</th>
                                                                                <td>PRESALE 1 - LSNC National Champions</td>
                                                                                <td>Rp 90.000</td>
                                                                                <td>30/100</td>
                                                                                <td>2.700.000</td>
                                                                                <td>49.000</td>
                                                                            </tr>

                                                                        </tbody>

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
            </div>
            <!-- Library Scripts -->
            <?php
            include "../bundle_script.php";
            ?>

            </script>
</body>

</html>