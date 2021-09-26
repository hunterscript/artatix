<?php
include "auth.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | Dashboard</title>
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
                    <?php
                    include 'sidebar_dash.php';
                    ?>
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
                                                            <?php
                                                                include_once '../koneksi/koneksi.php';
                                                                $QueryEvent = mysqli_query($konek, "SELECT event_name FROM tbl_event");
                                                                while($EventList = mysqli_fetch_assoc($QueryEvent)){
                                                                    echo '<option value="opt1">'.$EventList["event_name"].'</option>';
                                                                }
                                                            ?>
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
                                                    <a href="#">
                                                        <div class="card text-black">
                                                            <div class="card-block">
                                                                <div class="row align-items-center">
                                                                    <div class="col">
                                                                        <p class="m-b-5">Pendapatan</p>
                                                                        <h4 class="m-b-0">RP 999.999.999</h4>
                                                                    </div>
                                                                    <div class="col col-auto text-right">
                                                                        <i class="feather icon-credit-card f-50 "></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-xl-4 col-md-6">
                                                    <a href="#">
                                                        <div class="card text-black">
                                                            <div class="card-block">
                                                                <div class="row align-items-center">
                                                                    <div class="col">
                                                                        <p class="m-b-5">Ticket Terjual</p>
                                                                        <h4 class="m-b-0">42</h4>
                                                                    </div>
                                                                    <div class="col col-auto text-right">
                                                                        <i class="fa fa-ticket f-50 "></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-xl-4 col-md-6">
                                                    <a href="#">
                                                        <div class="card text-black">
                                                            <div class="card-block">
                                                                <div class="row align-items-center">
                                                                    <div class="col">
                                                                        <p class="m-b-5">Transaksi</p>
                                                                        <h4 class="m-b-0">RP 999.999.999</h4>
                                                                    </div>
                                                                    <div class="col col-auto text-right">
                                                                        <i class="icofont icofont-money-bag f-50 "></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Excel - Cell Background end -->
                                            <div class="table-responsive">
                                                <table class="table">

                                                    <caption>List of users</caption>
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">First</th>
                                                            <th scope="col">Last</th>
                                                            <th scope="col">Handle</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>@mdo</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>Jacob</td>
                                                            <td>Thornton</td>
                                                            <td>@fat</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">3</th>
                                                            <td>Larry</td>
                                                            <td>the Bird</td>
                                                            <td>@twitter</td>
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
    <!-- Library Scripts -->
    <?php
    include "../bundle_script.php";
    ?>

    </script>
</body>

</html>