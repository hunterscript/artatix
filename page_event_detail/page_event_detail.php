<?php
session_start();
include "../koneksi/koneksi.php";

$event_id = $_GET["id"];

?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <title>Artatix - Event Detail</title>
    <!-- Library CSS -->
    <?php
    include "../bundle_css_enduser.php";
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
                            <a href="index.php"><img src="<?= $root ?>img/logo/Artatix2.png" width="130" height="30" alt="" title="" /></a>
                        </div>
                    </div>
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li class="menu-active"><a href="<?= $root ?>index.php">Home</a></li>
                            <li><a href="<?= $root ?>page_kategori.php">Kategori Event</a></li>
                            <li><a href="<?= $root ?>page_contact.php">Hubungi Kami</a></li>
                            <?php require_once '../auth-navbar.php' ?>
                        </ul>
                    </nav>
                    <!--######## #nav-menu-container -->
                </div>
            </div>
        </div>
    </header>

    <!-- Start Event Card Area -->



    <section class="relative">

        <div class="container  ">
            <div class="row ">
                <div class="col-md-12 white-space-50">


                    <?php
                    $queryevent = mysqli_query($konek, "SELECT
                                            tbl_event.event_id,
                                            tbl_event.event_name,
                                            tbl_event.event_category,
                                            tbl_event.event_picture,
                                            tbl_event.event_description,
                                            tbl_event.event_location,
                                            tbl_event.event_date_start,
                                            tbl_event.event_date_finish,
                                            tbl_event.event_time_start,
                                            tbl_event.event_time_finish,
                                            tbl_event.event_sk,
                                            tbl_event.event_status,
                                            tbl_event.event_jenis,
                                            tbl_ticket.tkt_id,
                                            tbl_ticket.tkt_category,
                                            tbl_ticket.tkt_stock,
                                            tbl_ticket.tkt_price,
                                            tbl_ticket.tkt_date_start,
                                            tbl_ticket.tkt_desc,
                                            tbl_ticket.tkt_status
                                        FROM
                                            tbl_ticket
                                        INNER JOIN tbl_event ON tbl_event.event_id = tbl_ticket.event_id
                                        WHERE
                                            tbl_event.event_id = '$event_id'");

                    $counter = mysqli_num_rows($queryevent);
                    if($counter == 0){
                        $queryevent = mysqli_query($konek, "SELECT
                                            tbl_event.event_id,
                                            tbl_event.event_name,
                                            tbl_event.event_category,
                                            tbl_event.event_picture,
                                            tbl_event.event_description,
                                            tbl_event.event_location,
                                            tbl_event.event_date_start,
                                            tbl_event.event_date_finish,
                                            tbl_event.event_time_start,
                                            tbl_event.event_time_finish,
                                            tbl_event.event_sk,
                                            tbl_event.event_status,
                                            tbl_event.event_jenis,
                                            tbl_ticket.tkt_id,
                                            tbl_ticket.tkt_category,
                                            tbl_ticket.tkt_stock,
                                            tbl_ticket.tkt_price,
                                            tbl_ticket.tkt_date_start,
                                            tbl_ticket.tkt_desc,
                                            tbl_ticket.tkt_status
                                        FROM
                                            tbl_ticket
                                        INNER JOIN tbl_event ON tbl_event.event_id = tbl_ticket.event_id
                                        WHERE
                                            tbl_event.link = '$event_id'");
                    }
                    if ($queryevent == false) {
                        die("Terjadi Kesalahan : " . mysqli_error($konek));
                    }
                    while ($event = mysqli_fetch_assoc($queryevent)) {

                        $event_picture      =  $event['event_picture'];
                        $event_name         =  $event['event_name'];
                        $event_category     =  $event['event_category'];
                        $event_desc         =  $event['event_description'];
                        $event_date_start   =   date('d M y', strtotime($event['event_date_start']));
                        $event_date_finish  =   date('d M y', strtotime($event['event_date_finish']));
                        $event_time_start   =   date('H:i', strtotime($event['event_time_start']));
                        $event_time_finish  =   date('H:i', strtotime($event['event_time_finish']));
                        $event_location     =  $event['event_location'];
                        $event_jenis     =  $event['event_jenis'];
                        
                    }
                    ?>

                    <div class="card">
                        <section>
                            <img class="img-fluid" src="<?= $root ?>img/event_banner/<?php echo $event_picture; ?>" alt="">

                            <div class="row m-b-20 p-l-35 ">
                                <div class="col-md-12"><br>
                                    <h3><?php echo $event_name; ?></h3>
                                    <span class="card-content-span">&nbsp;<?php echo $event_category; ?></span>
                                    <hr>
                                </div>
                                <div class="col-6 col-md-9">
                                    <span class="card_detail_admin card-position">Tanggal & Waktu</span><br>
                                    <span class="card-content-span"><i class="fa fa-calendar "></i>&nbsp;&nbsp;<?php echo $event_date_start ?> - <?php echo $event_date_finish ?></span><br>
                                    <span class="card-content-span"><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?php echo $event_time_start ?> - <?php echo $event_time_finish ?> </span>
                                </div>
                                <div class="col-5 col-md-3">
                                    <span class="card_detail_admin">Lokasi</span><br>
                                    <span class="card-content-span"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo $event_location ?></span><br>
                                </div>
                                <div class="col-6 col-md-2">

                                </div>
                            </div>

                    </div>
                </div>
                <?php
                $query = mysqli_query($konek, "SELECT max(cart_id) as cartTerbesar FROM tbl_cart");
                $data = mysqli_fetch_array($query);
                $kodeCart = $data['cartTerbesar'];
                // mengambil angka dari kode barang terbesar, menggunakan fungsi substr dan diubah ke integer dengan (int)
                $urutan = (int) substr($kodeCart, 3, 3);
                // nomor yang diambil akan ditambah 1 untuk menentukan nomor urut berikutnya
                $urutan++;
                // membuat kode barang baru
                // string sprintf("%03s", $urutan); berfungsi untuk membuat string menjadi 3 karakter
                // misalnya string sprintf("%03s", 22); maka akan menghasilkan '022'
                // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya PC
                $huruf = "CRT";
                $kodeCart = $huruf . sprintf("%03s", $urutan);
                ?>
                <div class="col-md-8">
                    <div class="card">
                        <div class="tabset">
                            <input type="radio" name="tabset" id="tab1" aria-controls="deskripsi" checked>
                            <label for="tab1">Deskripsi Event</label>
                            <input type="radio" name="tabset" id="tab2" aria-controls="kategori">
                            <label for="tab2">Kategori Ticket</label>

                            <div class="tab-panels">
                                <section id="deskripsi" class="tab-panel">
                                    <div class="container">
                                        <p class="card-text-detail"><?= $event_category ?>
                                        </p>
                                    </div>
                                   
                                    <div class="container">
                                    <hr>
                                    <label>Deskripsi Event</label><br>
                                    <?= $event_desc ?>
                                    </div>
                                </section>

                                <section id="kategori" class="tab-panel">
                                    <div class="container">
                                        <div class="row">
                                            <?php
                                            $queryticket = mysqli_query($konek, "SELECT
                                            tbl_event.event_id,
                                            tbl_event.event_name,
                                            tbl_event.event_category,
                                            tbl_event.event_picture,
                                            tbl_event.event_description,
                                            tbl_event.event_location,
                                            tbl_event.event_date_start,
                                            tbl_event.event_date_finish,
                                            tbl_event.event_time_start,
                                            tbl_event.event_time_finish,
                                            tbl_event.event_sk,
                                            tbl_event.event_status,
                                            tbl_event.event_jenis,
                                            tbl_ticket.tkt_id,
                                            tbl_ticket.tkt_category,
                                            tbl_ticket.tkt_stock,
                                            tbl_ticket.tkt_price,
                                            tbl_ticket.tkt_date_start,
                                            tbl_ticket.tkt_date_finish,
                                            tbl_ticket.tkt_desc,
                                            tbl_ticket.tkt_status
                                        FROM
                                            tbl_ticket
                                        INNER JOIN tbl_event ON tbl_event.event_id = tbl_ticket.event_id
                                        WHERE
                                            tbl_event.event_id = '$event_id'  AND tbl_ticket.tkt_status='1' ");
                                            $counter = mysqli_num_rows($queryticket);
                                            if($counter == 0){
                                                $queryticket = mysqli_query($konek, "SELECT
                                                tbl_event.event_id,
                                                tbl_event.event_name,
                                                tbl_event.event_category,
                                                tbl_event.event_picture,
                                                tbl_event.event_description,
                                                tbl_event.event_location,
                                                tbl_event.event_date_start,
                                                tbl_event.event_date_finish,
                                                tbl_event.event_time_start,
                                                tbl_event.event_time_finish,
                                                tbl_event.event_sk,
                                                tbl_event.event_status,
                                                tbl_event.event_jenis,
                                                tbl_ticket.tkt_id,
                                                tbl_ticket.tkt_category,
                                                tbl_ticket.tkt_stock,
                                                tbl_ticket.tkt_price,
                                                tbl_ticket.tkt_date_start,
                                                tbl_ticket.tkt_date_finish,
                                                tbl_ticket.tkt_desc,
                                                tbl_ticket.tkt_status
                                            FROM
                                                tbl_ticket
                                            INNER JOIN tbl_event ON tbl_event.event_id = tbl_ticket.event_id
                                            WHERE
                                                tbl_ticket.tkt_status='1' AND tbl_event.link = '$event_id'");
                                            }
                                            if ($queryticket == false) {
                                                die("Terjadi Kesalahan : " . mysqli_error($konek));
                                            }
                                            while ($ticket = mysqli_fetch_array($queryticket)) { 
                                                ?>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <form action="page_event_cart_proses.php?id=<?= $kodeCart ?>" method="POST" enctype="multipart/form-data">
                                                        <div class="border radius">
                                                            <div class="card-body">
                                                                <h4 class="card-title" title="View Product"><?= $ticket["tkt_category"] ?></h4>
                                                                <span>Harga : <?= $ticket["tkt_price"] ?></spanp><br>
                                                                    <span>QTY : <?= $ticket["tkt_stock"] ?></span><br>
                                                                    <span>Description : <?= $ticket["tkt_desc"] ?></span><br>
                                                                    <p>Sale : <?= $ticket["tkt_date_start"] ?> - <?= $ticket["tkt_date_finish"] ?> </p>
                                                                    <?php 
                                                                        if(strtotime($ambilevent['tkt_date_start']) <= $now->getTimestamp() && strtotime($ambilevent['tkt_date_finish']) > $now->getTimestamp())
                                                                        {
                                                                     ?>
                                                                    <div class="row">

                                                                        <div class="col">
                                                                            <?php
                                                                                if($ticket['tkt_stock'] > 0){
                                                                            ?>
                                                                            <div class=" default-select" id="default-select">
                                                                                <select name="cart_qty">
                                                                                    <option value="1 ">1</option>
                                                                                    <option value="2 ">2</option>

                                                                                </select>
                                                                            </div>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </div>
                                                                        <div class="col">
                                                                            <input type="hidden" name="cart_id" value="<?= $kodeCart ?>">
                                                                            <input type="hidden" name="tkt_id" value="<?= $ticket["tkt_id"] ?>">
                                                                            <input type="hidden" name="event_id" value="<?= $ticket["event_id"] ?>">
                                                                            <button type="submit" class="genric-btn primary circle">
                                                                                <?php
                                                                                    if($ticket['tkt_stock'] > 0){
                                                                                        echo "Add";
                                                                                    }else{
                                                                                        echo "Out of stock";
                                                                                    }
                                                                                ?>
                                                                            </button>
                                                                        </div>
                                                                    <?php }?>
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                            </div>
                        <?php } ?>
    </section>

    </div>
    </div>

    </div>
    </div>
    </section>
    </div>
    <!-- ========================= FOOTER ========================= -->
    <!-- Library Scripts -->
    <?php
    include "../footer.php";
    ?>

    <!-- ========================= FOOTER END // ========================= -->


    <!-- Library Scripts -->
    <?php
    include "../bundle_script_enduser.php";
    ?>



    <!--End of Tawk.to Script-->
</body>

</html>