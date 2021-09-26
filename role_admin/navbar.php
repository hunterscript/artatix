<?php $event_id = $_GET["id"];?>
<nav class="navbar header-navbar pcoded-header ">
    <div class="navbar-wrapper">

        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="feather icon-menu"></i>
            </a>
            <a class="" href="index.php">
                &nbsp;&nbsp;&nbsp;<img class="img-fluid" src="..\img\logo\logo.png" alt="Theme-Logo">
            </a>
            <a class="mobile-options">
                <i class="feather icon-more-horizontal"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i class="feather icon-maximize full-screen"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav-right">


                <li class="user-profile header-notification">
                <?php
                            $queryuser = mysqli_query($konek, "SELECT*FROM tbl_user where user_email='$session_useremail' limit 1");
                            if ($queryuser == false) {
                                die("Terjadi Kesalahan : " . mysqli_error($konek));
                            }
                            while ($user = mysqli_fetch_array($queryuser)) {

                                $user_id =  $user['user_id'];
                            ?>
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <!-- <img src="..\files\assets\images\avatar-4.jpg" class="img-radius" alt="User-Profile-Image"> -->
                            <span><?php echo $user['user_nmlengkap']; ?></span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            
                                <li>
                                   
                                    <a href="user_profil.php?id=<?php echo $user_id; ?>">
                                        <i class="feather icon-user"></i> Profile
                                    </a>
                                <?php } ?>
                                </li>
                                <li>
                                    <a href="../page_logout.php">
                                        <i class="feather icon-log-out"></i> Logout
                                    </a>
                                </li>
                        </ul>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>