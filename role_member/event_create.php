<?php
include "auth.php";
 error_reporting(0);
?>


<?php
$detectStatus = mysqli_fetch_assoc(mysqli_query($konek, "SELECT * FROM tbl_user WHERE user_email='$session_useremail'"));
if($detectStatus['uservl_status'] == 0){
    $user_id = $detectStatus['user_id'];
    header("location: user_profil.php?id=$user_id&pesan=need_verif");
}

$query = mysqli_query($konek, "SELECT max(event_id) as kodeTerbesar FROM tbl_event");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
// mengambil angka dari kode barang terbesar, menggunakan fungsi substr dan diubah ke integer dengan (int)
$urutan = (int) substr($kodeBarang, 3, 3);
// nomor yang diambil akan ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
// membuat kode barang baru
// string sprintf("%03s", $urutan); berfungsi untuk membuat string menjadi 3 karakter
// misalnya string sprintf("%03s", 22); maka akan menghasilkan '022'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya PC
$huruf = "EVN";
$kodeBarang = $huruf . sprintf("%03s", $urutan);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Member | Dashboard</title>
    <script src="../ckeditor/ckeditor.js"></script>
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

                            </ul>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <?php
                                        if(isset($_GET['pesan'])){
                                            if($_GET['pesan'] == 'simpan'){
                                                echo '<div class="alert alert-success" role="alert">
                                                        Data berhasil di input
                                                    </div>';
                                            }elseif($_GET['pesan'] == 'gagal_ektensi'){
                                                echo '<div class="alert alert-danger" role="alert">
                                                        Ektensi File harus berupa gambar!
                                                    </div>';
                                            }elseif($_GET['pesan'] == 'gagal_ukuran'){
                                                echo '<div class="alert alert-danger" role="alert">
                                                        Ukuran gambar terlalu besar!
                                                    </div>';
                                            }
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
                                                        <li class="breadcrumb-item"><a href="event.php">Event</a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#">Event Create</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> <br>
                                        <!-- Page body start -->
                                        <div class="page-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <form action="P" method="POST" enctype="multipart/form-data">
                                                        <!-- Basic Form Inputs card start -->
                                                        <div class="card">
                                                            <div class="card-block">
                                                                <h4 class="sub-title">Event</h4>

                                                                <input type="hidden" name="event_id" class="form-control" value="<?php echo $kodeBarang ?>" readonly>
                                                                <input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id  ?>" readonly>


                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Event Name</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="event_name" class="form-control" placeholder="Your Event Name">

                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Event Category</label>
                                                                    <div class="col-sm-10">
                                                                        <select class="js-example-basic-multiple col-sm-12" name="category[]" multiple="multiple" placeholder="Choose Your Category">
                                                                            <option value="Sport">Sport</option>
                                                                            <option value="Lifestyle">Lifestyle</option>
                                                                            <option value="Festival">Festival </option>
                                                                            <option value="Conference">Conference </option>
                                                                            <option value="Attraction">Attraction </option>
                                                                            <option value="Exhbition">Exhbition </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Upload Your Banner<br><small><I>uk : 1062 x 427<br> maxsize : 2mb</I></small></label>

                                                                    <div class="col-sm-10">
                                                                        <input type="file" name="event_picture" class="form-control" multiple="multiple">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Event Description</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea rows="5" cols="5" class="form-control" name="event_description" id="event_description"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Location</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                                                                            <input type="text" class="form-control" placeholder="Location" name="event_location">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Type of Event</label>
                                                                    <div class="col-sm-10">
                                                                        <select name="event_jenis" class="form-control">
                                                                            <option value="0">Private</option>
                                                                            <option value="1">Public</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <input type="hidden" class="form-control" value="0" name="event_status" readonly>


                                                            </div>
                                                            <div class="card-block">
                                                                <h4 class="sub-title">Date & Time</h4>
                                                                <div class="form-group row input-daterange">
                                                                    <label class="col-sm-2 col-form-label">Choose Date</label>
                                                                    <div class="col-sm-5">
                                                                        <div class="input-group">
                                                                            <input type="text" class="input-sm form-control" name="event_date_start" id="event_date_start" placeholder=" Start" autocomplete="off">
                                                                            <span class="input-group-addon ">
                                                                                <span class="fa fa-calendar"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-5">
                                                                        <div class="input-group">
                                                                            <input type="text" class="input-sm form-control" name="event_date_finish" id="event_date_finish" placeholder=" Finish" autocomplete="off">
                                                                            <span class="input-group-addon ">
                                                                                <span class="fa fa-calendar"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Choose Time</label>
                                                                    <div class="col-sm-5">
                                                                        <div class='input-group date' id='datetimepicker31'>
                                                                            <input type='time-local' class="form-control" name="event_time_start" id="event_time_start" placeholder=" Start" autocomplete="off">
                                                                            <span class="input-group-addon ">
                                                                                <span class="fa fa-clock-o"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-5">
                                                                        <div class='input-group date' id='datetimepicker32'>
                                                                            <input type='text' class="form-control" name="event_time_finish" id="event_time_start" placeholder=" Finish" autocomplete="off">
                                                                            <span class="input-group-addon ">
                                                                                <span class="fa fa-clock-o"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <h4 class="sub-title">Term & Condition</h4>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Required*</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea rows="5" cols="5" class="form-control" name="event_sk" id="event_sk"></textarea>
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
    <script>
        CKEDITOR.replace('event_description');
        CKEDITOR.replace('event_sk');

        $(document).ready(function() {
            $('.input-daterange').datepicker({
                startDate: new Date(),
                format: "dd M yyyy",
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
</body>

</html>