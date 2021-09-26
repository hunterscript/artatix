<?php
include "auth.php";
error_reporting(0);
?>

<?php


$event_id = $_GET["id"];



// PRD001
$query = mysqli_query($konek, "SELECT max(period_id) as prdTerbesar FROM tbl_period");
$data = mysqli_fetch_array($query);
$prdTerbesar = $data['prdTerbesar'];

$urutan = (int) substr($prdTerbesar, 3, 3);

$urutan++;

$huruf = "PRD";
$prdTerbesar = $huruf . sprintf("%03s", $urutan);



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
                            </ul> <?php
                                    $qry_evntname = mysqli_query($konek, "SELECT*FROM tbl_event where event_id='$event_id'");
                                    if ($qry_evntname == false) {
                                        die("Terjadi Kesalahan : " . mysqli_error($konek));
                                    }
                                    while ($eventname = mysqli_fetch_array($qry_evntname)) {
                                    ?>
                                <div class="pcoded-navigatio-lavel"> <?= $eventname['event_name'] ?></div>
                            <?php } ?>
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
                                            <a href="report_event.php?id=<?= $event_id; ?>">

                                                <span class="pcoded-mtext">Data Pemesan</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="report_event.php">
                                                <span class="pcoded-mtext">Sales</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="report_event.php">
                                                <span class="pcoded-mtext">Data Pemesan</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="report_event.php">
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
                                                <div class="col-xl-4 col-md-6"><br>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="card">
                                                        <?php
                                                        $queryevent = mysqli_query($konek, "SELECT*FROM tbl_event where event_id='$event_id'");
                                                        if ($queryevent == false) {
                                                            die("Terjadi Kesalahan : " . mysqli_error($konek));
                                                        }
                                                        while ($event = mysqli_fetch_array($queryevent)) {
                                                        ?>

                                                            <div class="carousel slide">
                                                                <div class="carousel-inner" role="listbox">
                                                                    <div class="carousel-item active">
                                                                        <img class="d-block img-fluid w-100" src="../img/event_banner/<?= $event['event_picture']; ?>" alt="First slide">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-12 col-lg-12"><br>
                                                                <div class="row m-b-20 p-l-35 ">
                                                                    <div class="col col-md-10">
                                                                        <h6 class="card-content-h6"><?= $event['event_name']; ?></h6>
                                                                        <?php if ($event['event_jenis'] == 0) {
                                                                            echo ' <p class="text-c-pink" </i><b> PRIVATE</b></p>';
                                                                        } else {
                                                                            echo ' <p class="text-c-green  " </i><b>PUBLIC</b></p>';
                                                                        } ?>
                                                                    </div>
                                                                    <div class="col col-md-2">
                                                                        <a href="event_edit.php?id=<?= $event['event_id']; ?>"><span class="card_detail_kategori"><button class="btn btn-succes btn-xs"><i class="fa fa-pencil"></i>Edit Event</button></span></a>
                                                                    </div>

                                                                </div>
                                                                <hr>
                                                                <div class="row m-b-20 p-l-35 ">
                                                                    <div class="col-6 col-md-5">
                                                                        <span class="card_detail_admin card-position">Tanggal & Waktu</span><br>
                                                                        <span class="card-content-span"><i class="fa fa-calendar "></i>&nbsp;&nbsp;<?= date('d M y', strtotime($event['event_date_start'])); ?> - <?= date('d M y', strtotime($event['event_date_finish'])); ?></span><br>
                                                                        <span class="card-content-span"><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?= date('H:i', strtotime($event['event_time_start'])); ?> - <?= date('H:i', strtotime($event['event_time_finish'])); ?> </span>
                                                                    </div>
                                                                    <div class="col-6 col-md-5">
                                                                        <span class="card_detail_admin">Lokasi</span><br>
                                                                        <span class="card-content-span"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?= $event['event_location']; ?></span><br>
                                                                    </div>
                                                                    <div class="col-6 col-md-2">
                                                                        <span class="card_detail_admin">Event Status</span><br>
                                                                        <?php if ($event['event_status'] == 0) {
                                                                            echo ' <p class="text-c-pink" </i><b> DRAFT</b></p>';
                                                                        } else {
                                                                            echo ' <p class="text-c-green  " </i><b>ACCEPTED</b></p>';
                                                                        } ?></span><br>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <!-- Material tab card start -->
                                                            <div class="card">
                                                                <div class="card-block">
                                                                    <!-- Row start -->
                                                                    <div class="row m-b-30 ">
                                                                        <div class="col-lg-12 col-xl-12">
                                                                            <div class="sub-title m-b-20 p-l-35">Detail Event</div>
                                                                            <!-- Nav tabs -->
                                                                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                                                                <li class="nav-item">
                                                                                    <a class="nav-link active" data-toggle="tab" href="#EventTicket" role="tab">Ticket</a>
                                                                                    <div class="slide"></div>
                                                                                </li>
                                                                                <!-- <li class="nav-item">
                                                                                    <a class="nav-link" data-toggle="tab" href="#AdditionalForm" role="tab">Additional Form</a>
                                                                                    <div class="slide"></div>
                                                                                </li> -->
                                                                            </ul>
                                                                            <!-- Tab panes -->
                                                                            <div class="tab-content card-block">
                                                                                <div class="tab-pane active" id="EventTicket" role="tabpanel">
                                                                                    <button type="button" class="btn btn-primary btn-sm waves-effect" data-toggle="modal" data-target="#ModalAddSingleTicket"><i class="fa fa-plus"></i>Add Ticket</button>
                                                                                    <?php
                                                                                    // TKT001
                                                                                    $query2 = mysqli_query($konek, "SELECT max(tkt_id) as tktTerbesar FROM tbl_ticket");
                                                                                    $data2 = mysqli_fetch_array($query2);
                                                                                    $tktTerbesar = $data2['tktTerbesar'];

                                                                                    $urutan2 = (int) substr($tktTerbesar, 3, 3);

                                                                                    $urutan2++;

                                                                                    $huruf2 = "TKT";
                                                                                    $tktTerbesar = $huruf2 . sprintf("%03s", $urutan2);
                                                                                    ?>
                                                                                    <!-- Add Single Ticket -->
                                                                                    <div class="modal fade" id="ModalAddSingleTicket" tabindex="-1" role="dialog">
                                                                                        <div class="modal-dialog" role="document">
                                                                                            <form action="event_detail_ticket_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                        <h4 class="modal-title">Add Ticket</h4>
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                            <span aria-text="true">&times;</span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                                                                                        <input type="hidden" name="tkt_id" class="form-control" value="<?= $tktTerbesar ?>">
                                                                                                        <div class="form-group row">
                                                                                                            <label class="col-sm-4 col-form-label">Category Ticket</label>
                                                                                                            <div class="col-sm-8">
                                                                                                                <input type="text" name="tkt_category" class="form-control" placeholder="e.g VIP, GOLD , PLATINUM . . . . ">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-group row">
                                                                                                            <label class="col-sm-4 col-form-label">Stok</label>
                                                                                                            <div class="col-sm-8">
                                                                                                                <input type="number" name="tkt_stock" class="form-control" value="100">
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="form-group row">
                                                                                                            <label class="col-sm-4 col-form-label">Price</label>
                                                                                                            <div class="col-sm-8">
                                                                                                                <input type="text" name="tkt_price" class="form-control" placeholder="RP 100.000">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-group row">
                                                                                                            <label class="col-sm-4 col-form-label">Start Date</label>
                                                                                                            <div class="col-sm-8">
                                                                                                                <div class="input-daterange input-group" id="datepicker12">
                                                                                                                    <input type="text" class="input-sm form-control" name="tkt_date_start" placeholder=" Start Date">
                                                                                                                    <span class="input-group-addon ">
                                                                                                                        <span class="fa fa-calendar"></span>
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-group row">
                                                                                                            <label class="col-sm-4 col-form-label">End Date</label>
                                                                                                            <div class="col-sm-8">
                                                                                                                <div class="input-daterange input-group" id="datepicker11">
                                                                                                                    <input type="text" class="input-sm form-control" name="tkt_date_finish" placeholder="End Date ">
                                                                                                                    <span class="input-group-addon ">
                                                                                                                        <span class="fa fa-calendar"></span>
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="form-group row">
                                                                                                            <label class="col-sm-4 col-form-label">Ticket Description</label>
                                                                                                            <div class="col-sm-8">
                                                                                                                <textarea rows="5" cols="5" class="form-control" name="tkt_desc"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-group row">
                                                                                                            <label class="col-sm-4 col-form-label">Ticket Status</label>
                                                                                                            <div class="col-sm-8">
                                                                                                                <select name="tkt_status" class="form-control">
                                                                                                                    <option value="0">Not Active</option>
                                                                                                                    <option value="1">Active</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <input type="hidden" name="event_id" class="form-control" value="<?= $event_id ?>">
                                                                                                    </div>
                                                                                                    <div class="modal-footer">

                                                                                                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- Add Single Ticket END -->




                                                                                    <div class="row">
                                                                                        <?php

                                                                                        $queryticket = mysqli_query($konek, "SELECT*FROM tbl_ticket WHERE event_id='$event_id'");
                                                                                        if ($queryticket == false) {
                                                                                            die("Terjadi Kesalahan : " . mysqli_error($konek));
                                                                                        }
                                                                                        while ($ticket = mysqli_fetch_array($queryticket)) {
                                                                                            $ticket_id  = $ticket['tkt_id'];

                                                                                        ?>
                                                                                            <div class="col-lg-5 p-t-10">
                                                                                                <div class="p-l-20 p-r-20 p-t-20 z-depth-bottom-0 waves-effect" data-toggle="tooltip" data-placement="top" title="">


                                                                                                    <div class="form-group ">

                                                                                                        <div class="col">
                                                                                                            <h6 class=""><i class="fa fa-ticket fa-lg"></i>&nbsp;&nbsp;<b><?= $ticket['tkt_category']; ?></b></h6></i>
                                                                                                            <hr>
                                                                                                            <span class="card-content-span"> - &nbsp; Qty : &nbsp;&nbsp;<?= $ticket['tkt_stock']; ?></span><br>
                                                                                                            <span class="card-content-span"> - &nbsp; Price : &nbsp;&nbsp;<?= $ticket['tkt_price']; ?></span><br>
                                                                                                            <span class="card-content-span"> - &nbsp; Date : &nbsp;&nbsp;<?= $ticket['tkt_date_start']; ?> - <?= $ticket['tkt_date_finish']; ?> </span><br>
                                                                                                            <span class="card-content-span"> - &nbsp; Description : &nbsp;&nbsp;<?= $ticket['tkt_desc']; ?></span><br>
                                                                                                            <?php if ($ticket['tkt_status'] == 0) {
                                                                                                                echo ' <p class="text-c-pink" </i><b> NOT ACTIVE</b></p>';
                                                                                                            } else {
                                                                                                                echo ' <p class="text-c-green  " </i><b>ACTIVE</b></p>';
                                                                                                            } ?></span>
                                                                                                            <hr>
                                                                                                            <span class="card-content-span"><i class="fa fa-pencil btn-secondary btn-sm card-position" data-toggle="modal" data-target="#ModalEditSingleTicket<?= $ticket_id; ?>"></i></button></a><span>
                                                                                                            <a href="event_detail_ticket_delete.php?id=<?= $ticket_id; ?>&event_id=<?= $event_id; ?>"<span class="card-content-span"><i class="fa fa-trash btn-danger btn-sm card-position" ></i></button></a><span>
                                                                                                        </div>

                                                                                                    </div><br>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- Modal Single Ticket Edit -->
                                                                                            <div class="modal fade" id="ModalEditSingleTicket<?= $ticket_id; ?>" tabindex="-1" role="dialog">
                                                                                                <div class="modal-dialog" role="document">

                                                                                                    <form action="event_detail_ticket_edit_proses.php" name="modal_popup" enctype="multipart/form-data" method="post">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                <h4 class="modal-title">Edit Ticket</h4>
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                    <span aria-text="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body">

                                                                                                                <div class="form-group row">
                                                                                                                    <label class="col-sm-4 col-form-label">Category Ticket</label>
                                                                                                                    <div class="col-sm-8">
                                                                                                                        <input type="text" name="tkt_category" class="form-control" value="<?= $ticket['tkt_category']; ?>">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-group row">
                                                                                                                    <label class="col-sm-4 col-form-label">Stok</label>
                                                                                                                    <div class="col-sm-8">
                                                                                                                        <input type="number" name="tkt_stock" class="form-control" value="<?= $ticket['tkt_stock']; ?>">
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="form-group row">
                                                                                                                    <label class="col-sm-4 col-form-label">Price</label>
                                                                                                                    <div class="col-sm-8">
                                                                                                                        <input type="text" name="tkt_price" class="form-control" value="<?= $ticket['tkt_price']; ?>">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-group row">
                                                                                                                    <label class="col-sm-4 col-form-label">Ticket Date</label>
                                                                                                                    <div class="col-sm-8">
                                                                                                                        <div class="input-daterange input-group" id="datepicker12">
                                                                                                                            <input type="text" class="input-sm form-control" name="tkt_date_start" placeholder="" value="<?= $ticket['tkt_date_start']; ?>">
                                                                                                                            <span class="input-group-addon ">
                                                                                                                                <span class="fa fa-calendar"></span>
                                                                                                                            </span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-group row">
                                                                                                                    <label class="col-sm-4 col-form-label">End Date</label>
                                                                                                                    <div class="col-sm-8">
                                                                                                                        <div class="input-daterange input-group" id="datepicker11">
                                                                                                                            <input type="text" class="input-sm form-control" name="tkt_date_finish" value="<?= $ticket['tkt_date_start']; ?>">
                                                                                                                            <span class="input-group-addon ">
                                                                                                                                <span class="fa fa-calendar"></span>
                                                                                                                            </span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-group row">
                                                                                                                    <label class="col-sm-4 col-form-label">Ticket Description</label>
                                                                                                                    <div class="col-sm-8">
                                                                                                                        <textarea rows="5" cols="5" class="form-control" name="tkt_desc" value="<?= $ticket['tkt_desc']; ?>"><?= $ticket['tkt_desc']; ?></textarea>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-group row">
                                                                                                                    <label class="col-sm-4 col-form-label">Ticket Status</label>
                                                                                                                    <div class="col-sm-8">
                                                                                                                        <select name="tkt_status" class="form-control">
                                                                                                                          
                                                                                                                            <option value="0">Not Active</option>
                                                                                                                            <option value="1">Active</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <input type="hidden" name="event_id" class="form-control" value="<?= $event_id ?>">
                                                                                                                <input type="hidden" name="tkt_id" class="form-control" value="<?= $ticket_id; ?>">
                                                                                                            </div>
                                                                                                            <div class="modal-footer">

                                                                                                                <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>

                                                                                            <!-- Modal Single Ticket Edit -->
                                                                                    <?php }
                                                                                    } ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tab-pane" id="AdditionalForm" role="tabpanel">
                                                                                    <button type="button" class="btn btn-primary btn-sm waves-effect" data-toggle="modal" data-target="#ModalAdditionalForm"><i class="fa fa-plus"></i>Add Form</button>
                                                                                    <div class="modal fade" id="ModalAdditionalForm" tabindex="-1" role="dialog">
                                                                                        <div class="modal-dialog" role="document">

                                                                                            <form action="expandform_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                        <h4 class="modal-title">Add Additional Form</h4>
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                            <span aria-text="true">&times;</span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    <div class="modal-body">


                                                                                                        <div class="form-group row">
                                                                                                            <label class="col-sm-4 col-form-label">Add Question</label>
                                                                                                            <div class="col-sm-8">
                                                                                                                <textarea rows="5" cols="5" class="form-control" name="" placeholder="e.g are you traveling this week ? "></textarea>
                                                                                                            </div>
                                                                                                        </div>



                                                                                                        <input type="hidden" name="event_id" class="form-control" value="<?= $event_id ?>">
                                                                                                        <input type="hidden" name="tkt_id" class="form-control" value="<?= $ticket_id; ?>">
                                                                                                    </div>
                                                                                                    <div class="modal-footer">

                                                                                                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Row end -->

                                                                </div>
                                                            </div>
                                                            <!-- Material tab card end -->
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