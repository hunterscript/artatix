<?php
include "auth.php";
?>


<?php

$period_id = $_GET["id"];

// TKT001
$query2 = mysqli_query($konek, "SELECT max(tkt_id) as tktTerbesar FROM tbl_ticket");
$data2 = mysqli_fetch_array($query2);
$tktTerbesar = $data2['tktTerbesar'];

$urutan2 = (int) substr($tktTerbesar, 3, 3);

$urutan2++;

$huruf2 = "TKT";
$tktTerbesar = $huruf2 . sprintf("%03s", $urutan2);
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
                                        <div class="card">
                                            <div class="card-block box-list p-l-40">
                                                <?php

                                                $queryperiod = mysqli_query($konek, "SELECT * FROM tbl_period where period_id = '$period_id'");
                                                if ($queryperiod == false) {
                                                    die("Terjadi Kesalahan : " . mysqli_error($konek));
                                                }
                                                while ($period = mysqli_fetch_array($queryperiod)) {
                                                ?>
                                                    <h4 class="sub-title "># <?php echo $period['period_name'];  ?></h4>

                                                <?php
                                                    $period_id =   $period['period_id'];
                                                } ?>

                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <button type="button" class="btn btn-primary btn-sm waves-effect" data-toggle="modal" data-target="#ModalAddTicket"><i class="fa fa-plus"></i>Add Ticket</button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <?php

                                                    $qureyticket = mysqli_query($konek, "SELECT * FROM tbl_ticket WHERE period_id = '$period_id'");
                                                    if ($qureyticket == false) {
                                                        die("Terjadi Kesalahan : " . mysqli_error($konek));
                                                    }
                                                    while ($ticket = mysqli_fetch_array($qureyticket)) {
                                                    ?>

                                                        <div class="col-lg-3">
                                                            <div class="p-20 z-depth-bottom-0 waves-effect" data-toggle="tooltip" data-placement="top" title="Ticket">

                                                                <span class="text-sm-left"></span><b> <?php echo $ticket['tkt_category']; ?></b> <br>
                                                                <span class="text-sm-left">Item : </span> <?php echo $ticket['tkt_item']; ?><br>
                                                                <span class="text-sm-left">Size : </span> <?php echo $ticket['tkt_size']; ?><br>
                                                                <span class="text-sm-left">QTY : </span> <?php echo $ticket['tkt_stock']; ?><br>
                                                                <span class="text-sm-left">Price: </span> <?php echo $ticket['tkt_price']; ?><br>
                                                                <span class="text-sm-left">Admin Fee: </span> <?php echo $ticket['tkt_ppn']; ?><br>
                                                                <?php
                                                                $ticket_id          = $ticket['tkt_id'];
                                                                $ticket_category    = $ticket['tkt_category'];
                                                                $ticket_item        = $ticket['tkt_item'];
                                                                $ticket_size        = $ticket['tkt_size'];
                                                                $ticket_stock       = $ticket['tkt_stock'];
                                                                $ticket_price       = $ticket['tkt_price'];
                                                                $ticket_ppn         = $ticket['tkt_ppn'];
                                                                ?>
                                                                <button type="button" class="text-sm-right btn btn-primary btn-sm waves-effect p-l-100" data-toggle="modal" data-target="#ModalEditTicket<?php echo $ticket_id ?>"><i class="fa fa-pencil"></i></button>
                                                                <a href="event_detail_ticket_delete.php?id=<?php echo $ticket['tkt_id']; ?>">
                                                                    <button type="button" class="btn btn-light btn-sm waves-effect p-l-100"><i class="fa fa-trash"></i></button>
                                                                </a>
                                                            </div>

                                                            <!-- EDIT Ticket -->
                                                            <div class="modal fade" id="ModalEditTicket<?php echo $ticket_id ?>" tabindex="-1" role="dialog">
                                                                <div class="modal-dialog" role="document">
                                                                    <form action="event_detail_ticket_edit_proses.php" name="modal_popup" enctype="multipart/form-data" method="post">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Edit Ticket</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <input type="hidden" name="tkt_id" class="form-control" value="<?php echo $ticket_id ?>">

                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-4 col-form-label">Kategori ticket</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" class="form-control" name="tkt_category" value="<?php echo $ticket_category ?>">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-4 col-form-label">Item Bonus</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" class="form-control" name="tkt_item" value="<?php echo $ticket_item ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-4 col-form-label">Size</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" class="form-control" name="tkt_size" value="<?php echo $ticket_size ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-4 col-form-label">Qty</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" class="form-control" name="tkt_stock" value="<?php echo $ticket_stock ?>">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-4 col-form-label">Harga</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" class="form-control" name="tkt_price" value="<?php echo $ticket_price ?>">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-8">
                                                                                        <input type="hidden" class="form-control" name="tkt_ppn" value="0">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-8">
                                                                                        <input type="hidden" class="form-control" name="period_id" value="<?php echo $period_id ?>">
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } ?>
                                                </div>

                                            </div>

                                        </div>


                                        <!-- ADD Ticket -->
                                        <div class="modal fade" id="ModalAddTicket" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <form action="event_detail_ticket_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Add Ticket</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="HIDDEN" name="tkt_id" class="form-control" value="<?php echo $tktTerbesar; ?>">

                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Kategori ticket</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="tkt_category">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Item Bonus</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="tkt_item">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Size</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="tkt_size">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Qty</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="tkt_stock">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Harga</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="tkt_price">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-sm-8">
                                                                    <input type="hidden" class="form-control" name="tkt_ppn" value="0">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-8">
                                                                    <input type="hidden" class="form-control" name="period_id" value="<?php echo $period_id ?>">
                                                                </div>
                                                            </div>

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
