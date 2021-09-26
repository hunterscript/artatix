<?php
include "auth.php";
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
                    <?php
                    include 'sidebar_dash.php';
                    ?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">

                                                    <div class="card-header">
                                                        <h5>Data Peserta Event</h5>
                                                        <span> Lomba Makan Kerupuk</span>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">

                                                            <table id="excel-bg" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Nama</th>
                                                                        <th>Email</th>
                                                                        <th>No WA</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>


                                                                    </tr>
                                                                </thead>
                                                                <?php
                                                                $result = mysqli_query($konek, "SELECT tbl_transaction.`trans_id`, tbl_customer.`cst_name`, tbl_customer.`cst_email`, tbl_customer.`cst_notelp`,
                                                                                                tbl_transaction.`trans_qty`, tbl_ticket.`tkt_category`, tbl_ticket.`tkt_item`, tbl_pay.`pay_status`
                                                                                                FROM tbl_transaction
                                                                                                INNER JOIN tbl_customer
                                                                                                ON tbl_customer.`cst_id`=tbl_transaction.`cst_id`
                                                                                                INNER JOIN tbl_ticket
                                                                                                ON tbl_ticket.`tkt_id`=tbl_transaction.`tkt_id`
                                                                                                INNER JOIN tbl_pay
                                                                                                ON tbl_pay.`pay_id`=tbl_transaction.`pay_id`
                                                                                                WHERE tbl_transaction.`trans_id`='TRS001'");
                                                                while ($r_pmsanan = mysqli_fetch_array($result)) {
                                                                ?>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td><?php echo $r_pmsanan['cst_name']; ?></td>
                                                                            <td><?php echo $r_pmsanan['cst_email']; ?></td>
                                                                            <td><?php echo $r_pmsanan['cst_notelp']; ?></td>
                                                                            <td>Checkin</td>
                                                                            <td><a href="#">Edit</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>2</td>
                                                                            <td>Hani</td>
                                                                            <td>hanistn27@gmail.com</td>
                                                                            <td>085711573434</td>
                                                                            <td>Belum Checkin</td>
                                                                            <td><a href="#">Edit</td>
                                                                        </tr>



                                                                    </tbody>
                                                                <?php } ?>
                                                                <tfoot>

                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Excel - Cell Background end -->
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