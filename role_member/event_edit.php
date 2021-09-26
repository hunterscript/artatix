<?php
include "auth.php";
?>

<?php
$event_id = $_GET["id"];

$queryevent = mysqli_query($konek, "SELECT*FROM tbl_event where event_id='$event_id'");
if ($queryevent == false) {
    die("Terjadi Kesalahan : " . mysqli_error($konek));
}
while ($event_edit = mysqli_fetch_array($queryevent)) {

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
                                                            <li class="breadcrumb-item"><a href="#!">Event Edit</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div> <br>
                                            <!-- Page body start -->
                                            <div class="page-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <form action="event_edit_proses.php" method="POST" enctype="multipart/form-data">
                                                            <!-- Basic Form Inputs card start -->
                                                            <div class="card">
                                                                <div class="card-block">
                                                                    <h4 class="sub-title">Event</h4>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Event Name</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="hidden" name="event_id" class="form-control" placeholder="Your Event Name" value="<?= $event_edit['event_id']; ?>">
                                                                            <input type="text" name="event_name" class="form-control" placeholder="Your Event Name" value="<?= $event_edit['event_name']; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Event Category</label>
                                                                        <div class="col-sm-10">
                                                                            <select name="event_category" class="form-control" value="<?= $event_edit['event_category']; ?>">
                                                                                <option value="Sport">Sport</option>
                                                                                <option value="Music">Music</option>
                                                                                <option value="Lifestyle">Lifestyle</option>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Upload Your Banner<br><small>1920 x 800</small></label>

                                                                        <div class="col-sm-10">
                                                                            <img src="../img/event_banner/<?= $event_edit['event_picture']; ?>" width="100">
                                                                            <span><?= $event_edit['event_picture']; ?></span>
                                                                            <input type="file" name="event_picture" class="form-control" value="<?= $event_edit['event_picture']; ?>">

                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Event Description</label>
                                                                        <div class="col-sm-10">
                                                                            <textarea rows="5" cols="5" class="form-control" name="event_description" id="event_description"><?= $event_edit['event_description']; ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Location</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control" name="event_location" value="<?= $event_edit['event_location']; ?>">
                                                                        </div>
                                                                    </div>



                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Type of Event</label>
                                                                    <div class="col-sm-10">
                                                                        <select name="event_jenis" class="form-control">
                                                                            <option <?php if($event_edit['event_jenis'] == 0) echo 'selected' ?> value="0">Private</option>
                                                                            <option <?php if($event_edit['event_jenis'] == 1) echo 'selected' ?> value="1">Public</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                    <input type="hidden" class="form-control" value="NOT ACTIVE" name="event_status" readonly>


                                                                </div>
                                                                <div class="card-block">
                                                                    <h4 class="sub-title">Date & Time</h4>
                                                                    <div class="form-group row input-daterange">
                                                                        <label class="col-sm-2 col-form-label">Choose Date</label>
                                                                        <div class="col-sm-5">
                                                                            <div class=" input-group">
                                                                                <input type="text" class="input-sm form-control" name="event_date_start" placeholder="" value="<?php echo $event_edit["event_date_start"]; ?>">

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-5">
                                                                            <div class=" input-group">
                                                                                <input type="text" class="input-sm form-control" name="event_date_finish" placeholder=" Selesai" value="<?php echo $event_edit['event_date_finish']; ?>">

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Choose Time</label>
                                                                        <div class="col-sm-5">
                                                                            <div class='input-group date' id='datetimepicker31'>
                                                                                <input type='time-local' class="form-control" name="event_time_start" placeholder=" Mulai" value="<?= date('H:i', strtotime($event_edit['event_time_start'])); ?>">
                                                                                <span class="input-group-addon ">
                                                                                    <span class="fa fa-clock-o"></span>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-5">
                                                                            <div class='input-group date' id='datetimepicker32'>
                                                                                <input type='text' class="form-control" name="event_time_finish" placeholder=" Selesai" value="<?= date('H:i', strtotime($event_edit['event_time_start'])); ?>">
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
                                                                            <textarea rows="5" cols="5" class="form-control" name="event_sk" id="event_sk"><?= $event_edit['event_sk']; ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col">

                                                                        </div>
                                                                        <div class="col-sm-10">

                                                                        </div>
                                                                        <div class="col">
                                                                            <button type="submit" class="btn btn-square btn-primary form-control">Save</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Basic Form Inputs card end -->
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
    <?php } ?>
    <!-- Library Scripts -->
    <?php
    include "../bundle_script.php";
    ?>
    <script>
        CKEDITOR.replace('event_description');
        CKEDITOR.replace('event_sk');

        function formatToDate($date){

            let slice = $date.split("-");
            let dd = slice[2];
            let mm = slice[1];
            let yyyy = slice[0];

            if(mm == 1) mm = 'Jan';
            else if(mm == 2) mm = 'Feb';
            else if(mm == 3) mm = 'Mar';
            else if(mm == 4) mm = 'Apr';
            else if(mm == 5) mm = 'May';
            else if(mm == 6) mm = 'Jun';
            else if(mm == 7) mm = 'Jul';
            else if(mm == 8) mm = 'Aug';
            else if(mm == 9) mm = 'Sep';
            else if(mm == 10) mm = 'Oct';
            else if(mm == 11) mm = 'Nov';
            else if(mm == 12) mm = 'Dec';

            return dd + ' ' + mm + ' ' + yyyy;
        }

        $(document).ready(function() {
            let now = formatToDate($('[name=event_date_start]').val());
            let end = formatToDate($('[name=event_date_finish]').val());
            console.log(now);
            $('.input-daterange').datepicker({
                startDate: new Date(),
                format: "dd M yyyy",
            });
            $('[name=event_date_start]').val(now);
            $('[name=event_date_finish]').val(end);
            
        });
    </script>
    </body>

    </html>