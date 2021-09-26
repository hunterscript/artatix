<?php

session_start();
include "koneksi/koneksi.php";
error_reporting(0);

$cart_id = $_GET['id'];
?>


<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <title>Artatix - Event Detail</title>
    <!-- Library CSS -->
    <?php
    include "bundle_css_enduser.php";
    ?>
</head>


<body>


    <!-- Start Header Area -->
    <header class="default-header border-bottom">
        <div class="main-menu">
            <div class="container">
                <div class="row align-items-center justify-content-between d-flex">
                    <div id="logo">
                        <div class="container">
                            <a href="index.php"><img src="img/logo/Artatix2.png" width="130" height="30" alt="" title="" /></a>
                        </div>
                    </div>
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li class="menu-active"><a href="index.php">Home</a></li>
                            <li><a href="page_kategori.php">Kategori Event</a></li>
                            <li><a href="page_kontak_kami.php">Hubungi Kami</a></li>
                            <?php require_once 'auth-navbar.php' ?>

                        </ul>
                    </nav>
                    <!--######## #nav-menu-container -->
                </div>
            </div>
        </div>
    </header>
    <!-- End Header Area -->
    <div class="white-space-50"></div>
    <!-- Start Event Card Area -->
    <section class="home-banner-area relative" id="home">
        <div class="container">
            <?php if ($_SESSION['message'] != "") : ?>
                <div class="row">
                    <aside class="col-lg-8">
                        <div class="alert alert-success">
                            <?= $_SESSION['message'] ?>
                        </div>
                    </aside>
                </div>
                <?php $_SESSION['message'] = "" ?>
            <?php endif ?>

            <?php
            $querycart = mysqli_query($konek, "SELECT tbl_event.event_id, tbl_event.event_name, tbl_event.event_category, tbl_event.event_picture, tbl_event.event_description, tbl_event.event_location, tbl_event.event_date_start, tbl_event.event_date_finish, tbl_event.event_time_start, tbl_event.event_time_finish, tbl_event.event_sk, tbl_event.event_status, tbl_event.event_jenis, tbl_ticket.tkt_id, tbl_ticket.tkt_category, tbl_ticket.tkt_stock, tbl_ticket.tkt_price, tbl_ticket.tkt_date_start, tbl_ticket.tkt_desc, tbl_cart.cart_id, tbl_cart.cart_qty FROM tbl_ticket INNER JOIN tbl_event ON tbl_ticket.event_id=tbl_event.event_id INNER JOIN tbl_cart ON tbl_ticket.tkt_id=tbl_cart.tkt_id WHERE tbl_cart.cart_id='$cart_id'  ");
            if ($querycart == false) {
                die("Terjadi Kesalahan : " . mysqli_error($konek));
            }
            while ($cart = mysqli_fetch_array($querycart)) { ?>

                <div class="row">
                    <aside class="col-lg-12">
                        <div class="card ">

                            <div class="row m-b-20 p-l-35 position-margin-10 ">

                                <div class="col-md-12">
                                    <h1><a href="#" class="title text-dark"><?= $cart['event_name'] ?></a></h1>
                                    <span class="card-content-span"><?= $cart['event_category'] ?></span>
                                    <hr>
                                </div>
                                <div class="col-6 col-md-4">
                                    <span class="card-content-more_event">Tanggal & Waktu</span><br><br>
                                    <span class="card-content-span"><i class="fa fa-calendar">&nbsp;&nbsp;</i><?= date('d M Y', strtotime($cart['event_date_start']));  ?> - <?= date('d M Y', strtotime($cart['event_date_finish']));  ?></span><br>
                                    <span class="card-content-span"><i class="fa fa-clock-o">&nbsp;&nbsp;</i><?= date('H:i', strtotime($event['event_time_start'])); ?> - <?= date('H:i', strtotime($event['event_time_finish'])); ?> </span>
                                </div>
                                <div class="col-5 col-md-3">
                                    <span class="">Lokasi</span><br><br>
                                    <span class="card-content-span"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?= $cart['event_location'] ?></span><br>
                                </div>
                                <div class="col-6 col-md-2">

                                </div>
                            </div>
                        </div>
                    </aside>

                    <aside class="col-lg-8">
                        <div class="card">
                            <table class="table  table-shopping-cart">
                                <thead class="text-muted">
                                    <tr class="small text-uppercase">
                                       
                                        <th scope="col" width="120">Price (Unit)</th>
                                        <th scope="col" width="120">Class</th>
                                        <th scope="col" width="120">Quantity</th>

                                        <th scope="col" class="text-right" width="200"> </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        
                                        <td style="width:35%;">
                                            <div class="price-wrap">
                                                <var class="price text-horizontal-middle">IDR <?= number_format($cart['tkt_price']) ?></var>
                                            </div> <!-- price-wrap .// -->
                                        </td>
                                        <td style="width:20%;">
                                            <figure class="itemside align-items-right">
                                                <figcaption class="info">
                                                    <p class="small text-muted"><?= $cart['tkt_category'] ?></p>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td style="width:7%;">
                                         

                                            <p class="small text-muted"><?= $cart['cart_qty'] ?></p>
                                           
                                        </td>
                                       

                                        </td>
                                        
                                    </tr>

                                </tbody>

                            </table>

                            <div class="card-body border-top">
                                <div class="row">
                                    <div class="col-md-10"></div>
                                    <div class="col-md-2">
                                        <!-- <button type="submit" class="btn  btn-outline-secondary" class="text-left" name="save">Save</button> -->
                                    </div>
                                </div> <!-- card-body.// -->
                            </div>
                        </div> <!-- card.// -->
                        <?php  $total_price=$cart['cart_qty']*$cart['tkt_price'] ?>
                    </aside> <!-- col.// -->
                    <aside class="col-lg-4">

                        <div class="card">
                            <div class="card-body">
                                <dl class="dlist-align">
                                    <dt>Total price:</dt>
                                    <dd class="text-right">IDR <?= number_format($total_price) ?></dd>
                                </dl>

                                <dl class="dlist-align">
                                    <dt>Total:</dt>
                                    <dd class="text-right text-dark b"><strong>IDR <?= number_format($total_price + $admin_price) ?></strong></dd>
                                </dl>
                                <hr>

                                <a href="page_event_cart_form.php?id=<?= $cart_id?>" class="genric-btn primary btn-block circle"> Lanjut Pesan -> </a>

                            </div> <!-- card-body.// -->
                        </div> <!-- card.// -->

                    </aside> <!-- col.// -->
                <?php } ?>
                
                </div>
    </section>
    <!-- End Event Card Area -->


    <section class="white-space">

    </section>

    <!-- ========================= FOOTER ========================= -->
    <!-- Library Scripts -->
    <?php
    include "footer.php";
    ?>

    <!-- ========================= FOOTER END // ========================= -->


    <!-- Library Scripts -->
    <?php
    include "bundle_script_enduser.php";
    ?>



    <!--End of Tawk.to Script-->
</body>

</html>