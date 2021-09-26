<?php
include "auth.php";
?>



<?php
$ticket_id = $_GET["id"];



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
                            </ul>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <br>
                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <?php
                                                $query = mysqli_query($konek, "SELECT * FROM tbl_ticket WHERE tkt_id = '$ticket_id'");

                                                while ($data = mysqli_fetch_array($query)) {
                                                ?>
                                                    <form action="event_detail_ticket_edit_proses.php" method="POST" enctype="multipart/form-data">
                                                        <!-- Basic Form Inputs card start -->
                                                        <div class="card">
                                                            <div class="card-block">
                                                                <h4 class="sub-title">Edit Ticket</h4>

                                                                <input type="text" class="form-control" value="<?php echo $data['tkt_id'] ?>" name='tkt_id' readonly>


                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Kategori Event</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="tkt_category" class="form-control" value="<?php echo $data['tkt_category'] ?>" placeholder="Your Event Name">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Item Bonus</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="tkt_item" class="form-control" value="<?php echo $data['tkt_item'] ?>" placeholder="Your Event Name">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Size</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="tkt_size" class="form-control" value="<?php echo $data['tkt_size'] ?>" placeholder="Your Event Name">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Qty</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="tkt_stock" class="form-control" value="<?php echo $data['tkt_stock'] ?>" placeholder="Your Event Name">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Harga</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="tkt_price" class="form-control" value="<?php echo $data['tkt_price'] ?>" placeholder="Your Event Name">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">PPN</label>
                                                                    <div class="col-sm-10">

                                                                        <input type="HIDDEN" name="event_id" class="form-control" value="<?php echo $data['event_id'] ?>" readonly>

                                                                        <input type="HIDDEN" name="period_id" class="form-control" value="<?php echo $data['period_id'] ?>" readonly>
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


                                                    </form>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page body end -->
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
