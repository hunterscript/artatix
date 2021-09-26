<nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Menu</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded pcoded pcoded-trigger">
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
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="event.php">
                                        <span class="pcoded-micon "><i class="feather icon-calendar"></i></span>
                                        <span class="pcoded-mtext">Event</span>
                                    </a>
                                </li>
                            </ul>
                           

                         

                        </div>
                    </nav>