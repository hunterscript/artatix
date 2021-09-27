<?php
session_start();
error_reporting(0);
include "koneksi/koneksi.php";

// $_SESSION['pay'] = true;
// // set session payment ketika user belum login

$cart_id = $_GET['id'];

$query = mysqli_query($konek, "SELECT max(cst_id) as cstTerbesar FROM tbl_customer");
$data = mysqli_fetch_array($query);
$cstID = $data['cstTerbesar'];
// mengambil angka dari kode barang terbesar, menggunakan fungsi substr dan diubah ke integer dengan (int)
$urutan = (int) substr($cstID, 3, 3);
// nomor yang diambil akan ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
// membuat kode barang baru
// string sprintf("%03s", $urutan); berfungsi untuk membuat string menjadi 3 karakter
// misalnya string sprintf("%03s", 22); maka akan menghasilkan '022'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya PC
$huruf = "CST";
$cstID = $huruf . sprintf("%03s", $urutan);

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
                            <li><a href="index.php">Home</a></li>
                            <li><a href="page_kategori.php">Kategori Event</a></li>
                            <li><a href="page_contact.php">Hubungi Kami</a></li>
                            <?php require_once 'auth-navbar.php' ?>
                        </ul>
                    </nav>
                    <!--######## #nav-menu-container -->
                </div>
            </div>
        </div>
    </header>
    <!-- End Header Area -->
    <div class="white-space-30"></div>
    <!-- Start Event Card Area -->
    <section class="home-banner-area relative" id="home">
        <div class="container">
            <div class="section-top-border">
                <div class="row">
                    <div class="col-lg-8 col-md-8">

                        <?php
                        $queryrow = mysqli_query($konek, "SELECT tbl_event.event_id, tbl_event.event_name, tbl_event.event_category, tbl_event.event_picture, tbl_event.event_description, tbl_event.event_location, tbl_event.event_date_start, tbl_event.event_date_finish, tbl_event.event_time_start, tbl_event.event_time_finish, tbl_event.event_sk, tbl_event.event_status, tbl_event.event_jenis, tbl_ticket.tkt_id, tbl_ticket.tkt_category, tbl_ticket.tkt_stock, tbl_ticket.tkt_price, tbl_ticket.tkt_date_start, tbl_ticket.tkt_desc, tbl_ticket.tkt_fee, tbl_cart.cart_id, tbl_cart.cart_qty FROM tbl_ticket INNER JOIN tbl_event ON tbl_ticket.event_id=tbl_event.event_id INNER JOIN tbl_cart ON tbl_ticket.tkt_id=tbl_cart.tkt_id WHERE tbl_cart.cart_id='$cart_id'  ");
                        if ($queryrow == false) {
                            die("Terjadi Kesalahan : " . mysqli_error($konek));
                        }
                        while ($row = mysqli_fetch_array($queryrow)) {
                            
                            $event_id = $row['event_id'];
                            ?>

                            <h3>Form Reservation</h3>
                            <small>Please Fill the form, to next procees</small>
                            <hr>
                            <form action="page_event_cart_form_proses.php" method="post">

                               
                                <div class="form-group  m-0">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="cst_name" class="form-control">
                                </div>
                                <div class="form-group  m-0">
                                    <label for="sel1">Identitas</label>
                                    <select class="form-control" id="sel1" name="cst_identity">
                                        <option value="KTP">KTP</option>
                                        <option value="SIM">SIM</option>
                                        <option value="KTM">KTM</option>
                                    </select>
                                </div>
                                <div class="form-group m-0">
                                    <label>No Identitas</label>
                                    <input type="number" name="cst_no_id" class="form-control">
                                </div>


                                <div class="form-group m-0">
                                    <label>Email</label>
                                    <input type="email" name="cst_email" class="form-control">
                                </div>

                                <div class="form-group  m-0">
                                    <label>No Whatsapp</label>
                                    <input type="number" name="cst_notelp" class="form-control">
                                </div>
                                <br>

                               
                    </div>
                    <aside class="col-lg-4">
                        <div class="card">
                            <div class="body">

                                <dl class="dlist-align">
                                    <dt>Event:</dt>
                                    <dd class="text-right"><?= $row['event_name'] ?></dd>

                                </dl>
                                <dl class="dlist-align">
                                    <dt>Jumlah:</dt>
                                    <dd class="text-right"><?= $row['cart_qty'] ?></dd>


                                </dl>
                                <dl class="dlist-align">
                                    <dt>Subtotal:</dt>
                                    <dd class="text-right">Rp <?= number_format($row['tkt_price'], 0, ',', '.') ?></dd>
                                </dl>

                                <dl class="dlist-align">
                                    <dt>Transaction Fee:</dt>
                                    <dd class="text-right text-danger">Rp <?= number_format($row['tkt_fee'], 0, ',', '.') ?></dd>
                                </dl>
                                <dl class="dlist-align">
                                    <dt>Bonus Item:</dt>
                                    <dd class="text-right">Kaos</dd>
                                </dl>
                                <hr>
                                <dl class="dlist-align">
                                    <dt>Total:</dt>
                                    <?php $total += $row['tkt_price'] * $row['cart_qty'] + $row['tkt_fee'] ?>
                                    <dd class="text-right text-dark b">
                                        <h5>Rp <?= number_format($total, 0, ',', '.') ?></</h5>
                                    </dd>
                                </dl>

                            </div> <!-- card-body.// -->
                        </div> <!-- card.// -->

                    </aside> <!-- col.// -->

                    <?php
                            $query2 = mysqli_query($konek, "SELECT max(trans_id) as transTerbesar FROM tbl_transaction");
                            $data2 = mysqli_fetch_assoc($query2);
                            $transTerbesar = $data2['transTerbesar'];
                            // mengambil angka dari kode barang terbesar, menggunakan fungsi substr dan diubah ke integer dengan (int)
                            $urutan2 = (int) substr($transTerbesar, 3, 3);
                            // nomor yang diambil akan ditambah 1 untuk menentukan nomor urut berikutnya
                            $urutan2++;
                            // membuat kode barang baru
                            // string sprintf("%03s", $urutan); berfungsi untuk membuat string menjadi 3 karakter
                            // misalnya string sprintf("%03s", 22); maka akan menghasilkan '022'
                            // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya PC
                            $huruf2 = "TRS";
                            $transTerbesar = $huruf2 . sprintf("%03s", $urutan2);

                            date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
                            $date = date(' d-m-Y '); //kombinasi jam dan tanggal
                    ?>
                    <!-- TRANSACTION TABLE -->
                    <input type="hidden" name="trans_id" value="<?= $transTerbesar ?>">
                    <input type="hidden" name="cst_id"value="<?= $cstID ?>">
                    <input type="hidden" name="cart_id" value="<?= $cart_id  ?>">
                    <input type="hidden" name="event_id" value="<?= $event_id  ?>">

                    <input type="hidden" name="trans_total" value="<?= $total ?>">

                    <input type="hidden" name="trans_date" value="<?= $date ?>">

                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="page_event_cart_form_proses.php"><button type="submit" name="tambah" class="genric-btn primary circle">Checkout</button></a>
                    </form>
                </div>

                <script>
                    function myFunction() {
                        alert("Maaf Stok Tidak Cukup!");
                    }
                </script>

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
    if(isset($_GET['error'])){
        echo '<script> alert("'.$_GET['error'].'")</script>';
    }
    ?>

    <!--End of Tawk.to Script-->
</body>

</html>