<?php
include "auth.php";
error_reporting(0)
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
                                <li class="pcoded pcoded-trigger">
                                    <a href="event.php">
                                        <span class="pcoded-micon "><i class="feather icon-calendar"></i></span>
                                        <span class="pcoded-mtext">Event</span>
                                    </a>
                                </li>
                            </ul>
                    
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <?php
                                    if (isset($_GET['pesan'])) {
                                        if ($_GET['pesan'] == 'simpan') {
                                            echo '<div class="alert alert-success" role="alert">
                                                        Data berhasil di input
                                                    </div>';
                                        }
                                    }

                                    $status = mysqli_query($konek, "SELECT*FROM tbl_user where user_email='$session_useremail'");
                                    if ($status == false) {

                                        die("Terjadi Kesalahan : " . mysqli_error($konek));
                                    }
                                    while ($user = mysqli_fetch_assoc($status)) {

                                        $stat =  $user['uservl_status'];
                                    }



                                    if ($stat == 0) {
                                        echo ' <div class="page-header">

                                                    <div class="row align-items-end">
                                                        <div class="col-lg-12">
                                                            <div class="card text-black">
                                                                <div class="card-block primary">
                                                                    <div class="row align-items-left">
                                                                        <div class="col-lg-9">
                                                                            <div class="page-header-title ">
                                                                                <div class="ion-alert fa-lg text-primary">

                                                                                    &nbsp;<Span>Kamu belum melakukan verifikasi akun,</SPAN>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-2">
                                                                            <a href="user_profil.php?id=' . $user_id . '"><button class="btn  BTN-SM btn-primary">Verifikasi Sekarang</button></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   ';
                                    } else {
                                        echo "";
                                    }
                                    ?>

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
                                                            <option value="opt1">Choose Your Event </option>
                                                            <option value="opt2">Event Aktif</option>
                                                            <option value="opt4">Event Tidak Aktif</option>
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
                                                <?php
                                                $queryuser = mysqli_query($konek, "SELECT*FROM tbl_user where user_email='$session_useremail'");
                                                if ($queryuser == false) {

                                                    die("Terjadi Kesalahan : " . mysqli_error($konek));
                                                }
                                                while ($user = mysqli_fetch_assoc($queryuser)) {

                                                    $user_id =  $user['user_id'];
                                                } ?>
                                                <div class="col-sm-12"><br>

                                                    <div class="row">
                                                        <?php
                                                        $queryevent = mysqli_query($konek, "SELECT*FROM tbl_event WHERE user_id='$user_id' ");
                                                        if ($queryevent == false) {

                                                            die("Terjadi Kesalahan : " . mysqli_error($konek));
                                                        }
                                                        while ($event = mysqli_fetch_assoc($queryevent)) {


                                                        ?>
                                                            <a href="event_detail.php?id=<?php echo $event['event_id']; ?>">
                                                                <div class="col-lg-12 col-xl-3">
                                                                    <div class="card-sub z-depth-1 bg-white">
                                                                        <img class="card-img-top img-fluid" src="../img/event_banner/<?php echo $event['event_picture']; ?>" alt="Card image cap">
                                                                        <div class="card-block">
                                                                            <span class="card_detail_kategori" style="word-wrap:  break-word"><?php echo $event['event_category']; ?></span><br><br>
                                                                            <h6 class="card-content-h6"><?php echo $event['event_name']; ?></h6>
                                                                            <hr>
                                                                            <span class="card_detail_admin card-position">Tanggal & Waktu</span><br>
                                                                            <span class="card-content-span"><i class="fa fa-calendar "></i>&nbsp;&nbsp;<?php echo date('d M y', strtotime($event['event_date_start'])); ?> - <?php echo date('d M y', strtotime($event['event_date_finish'])); ?></span><br>
                                                                            <span class="card-content-span"><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?php echo date('H:i', strtotime($event['event_time_start'])); ?> - <?php echo date('H:i', strtotime($event['event_time_finish'])); ?> </span>
                                                                            <div class="card-position">
                                                                                <span class="card_detail_admin">Lokasi</span><br>
                                                                                <span class="card-content-span"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo $event['event_location']; ?></span><br>

                                                                                <a href="event_delete.php?id=<?php echo $event['event_id']; ?>"><button class="btn btn-danger btn-sm card-position"><i class="fa fa-trash"></i></button></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        <?php } ?>
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