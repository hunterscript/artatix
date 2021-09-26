<?php
include "auth.php";
error_reporting(0);
$id = $_GET['id'];
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



            <!-- Sidebar inner chat end-->
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
                              <?php
                            $qry_evntname = mysqli_query($konek, "SELECT*FROM tbl_event where event_id='$event_id'");
                            if ($qry_evntname == false) {
                                die("Terjadi Kesalahan : " . mysqli_error($konek));
                            }
                            while ($eventname = mysqli_fetch_array($qry_evntname)) {
                            ?>
                                <div class="pcoded-navigatio-lavel"> <?= $eventname['event_name'] ?></div>
                            <?php } ?>
                            <ul class="pcoded-item pcoded-left-item">
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
                                        <li class=" ">
                                            <a href="report_event_sales.php?id=<?= $event_id; ?>">
                                                <span class="pcoded-mtext">Sales Report</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="pcoded-submenu">
                                        <li class="active">
                                            <a href="report_event.php?id=<?= $event_id; ?>">

                                                <span class="pcoded-mtext">Data Pemesan</span>
                                            </a>
                                        </li>
                                    </ul>
                                   

                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="report_checkin.php?id=<?= $event_id; ?>">
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
                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row align-items-end">
                                                <div class="col-lg-4">
                                                    <div class="d-inline">
                                                        <select name="select" class="form-control">
                                                            <?php
                                                                $evntname = mysqli_query($konek, "SELECT event_name FROM tbl_event WHERE event_id='$event_id'");
                                                                while($nama_ev = mysqli_fetch_assoc($evntname)){
                                                            ?>
                                                                <option value="opt1"><?= $nama_ev['event_name'] ?></option>
                                                            <?php } ?>
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
                                    </div>
                                    <br>
                                    <div class="page-body">
                                        
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <h4 class="sub-title">Filter Data</h4>
                                                        <form action="report_event_search.php" method="POST">

                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Payment Status</label>
                                                                <div class="col-sm-9">
                                                                    <select name="pay_id" class="form-control">
                                                                        <option value="0">Waiting</option>
                                                                        <option value="1">Succesful</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Period Ticket</label>
                                                                <div class="col-sm-9">
                                                                    <select name="pay_id" class="form-control">
                                                                        <option value="0">Period 1</option>
                                                                        <option value="1">Period 2</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Date</label>
                                                                <div class="col-sm-9">
                                                                    <div class="input-daterange input-group" id="datepicker11">
                                                                        <input type="text" class="input-sm form-control" name="event_date_start" placeholder=" Start">
                                                                        <span class="input-group-addon ">
                                                                            <span class="fa fa-calendar"></span>
                                                                        </span>
                                                                    </div>
                                                                    <div class="input-daterange input-group" id="datepicker11">
                                                                        <input type="text" class="input-sm form-control" name="event_date_start" placeholder=" Start">
                                                                        <span class="input-group-addon ">
                                                                            <span class="fa fa-calendar"></span>
                                                                        </span>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary">Search</button>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="#">
                                                    <div class="card text-black">
                                                        <div class="card-block">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <p class="m-b-5">Total Pemesan</p>
                                                                    <h4 class="m-b-0">100 Orang</h4>
                                                                </div>
                                                                <div class="col col-auto text-right">
                                                                    <i class="feather icon-users f-50 "></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                        
                                                <a href="#">
                                                    <div class="card text-black">
                                                        <div class="card-block">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <p class="m-b-5">Waiting Payment</p>
                                                                    <h4 class="m-b-0">10</h4>
                                                                </div>
                                                                <div class="col col-auto text-right">
                                                                    <i class="fa fa-ticket f-50 "></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                          
                                                <!-- <a href="#">
                                                    <div class="card text-black">
                                                        <div class="card-block">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <p class="m-b-5">Export Data</p>
                                                                   
                                                                </div>
                                                                <div class="col col-auto text-right">
                                                                    <i class="icofont icofont-download f-50 "></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a> -->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Zero config.table start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Data Pemesan</h5>

                                                    </div>
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Tanggal Pemesanan</th>
                                                                        <th>Nama</th>
                                                                        <th>Email</th>
                                                                        <th>No WA</th>
                                                                        <th>Jumlah</th>
                                                                        <th>Harga</th>
                                                                        <th>Total</th>



                                                                    </tr>
                                                                </thead>
                                                                <?php
                                                                $result = mysqli_query($konek, "SELECT
                                                                tbl_transaction.trans_id,
                                                                tbl_transaction.cst_id,
                                                                tbl_transaction.cart_id,
                                                                tbl_transaction.trans_total,
                                                                tbl_transaction.trans_date,
                                                                
                                                                tbl_cart.cart_id,
                                                                tbl_cart.event_id,
                                                                tbl_cart.tkt_id,
                                                                tbl_cart.cart_qty,
                                                                
                                                                tbl_customer.cst_id,
                                                                tbl_customer.cst_name,
                                                                tbl_customer.cst_identity,
                                                                tbl_customer.cst_no_id,
                                                                tbl_customer.cst_email,
                                                                tbl_customer.cst_notelp,
                                                                tbl_ticket.tkt_id,
                                                                tbl_ticket.tkt_category,
                                                                tbl_ticket.tkt_price,
                                                                tbl_ticket.tkt_date_start,
                                                                tbl_ticket.event_id,
                                                                
                                                                tbl_event.event_id,
                                                                tbl_event.event_name,
                                                                tbl_event.event_category,
                                                                tbl_event.event_description,
                                                                tbl_event.event_location,
                                                                tbl_event.event_date_start,
                                                                tbl_event.event_date_finish,
                                                                tbl_event.event_time_start,
                                                                tbl_event.event_time_finish
                                                                
                                                            FROM
                                                                tbl_transaction
                                                                INNER JOIN tbl_cart ON tbl_transaction.cart_id = tbl_cart.cart_id
                                                            INNER JOIN tbl_event ON tbl_cart.event_id = tbl_event.event_id
                                                            INNER JOIN tbl_ticket ON tbl_cart.tkt_id = tbl_ticket.tkt_id
                                                            INNER JOIN tbl_customer ON tbl_transaction.cst_id = tbl_customer.cst_id
                                                        WHERE tbl_event.event_id='$id '");
                                                                while ($r_pmsanan = mysqli_fetch_array($result)) {
                                                                    $no++;
                                                                ?>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><?= $no ?></td>
                                                                            <td><?php echo $r_pmsanan['trans_date']; ?></td>
                                                                            <td><?php echo $r_pmsanan['cst_name']; ?></td>
                                                                            <td><?php echo $r_pmsanan['cst_email']; ?></td>
                                                                            <td><?php echo $r_pmsanan['cst_notelp']; ?></td>
                                                                            <td><?php echo $r_pmsanan['cart_qty']; ?></td>
                                                                            <td><?php echo $r_pmsanan['tkt_price']; ?></td>
                                                                            <td><?= $hasil_rupiah = "Rp " . number_format($r_pmsanan['tkt_price'] * $r_pmsanan['cart_qty'], 0, ',', '.'); ?></td>

                                                                        </tr>


                                                                    </tbody>
                                                                <?php } ?>
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