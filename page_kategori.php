<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <title>Artatix - Kategori</title>
    <!-- Library CSS -->
    <?php
    session_start();
    include 'koneksi/koneksi.php';
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
                            <li class="menu-active"><a href="page_kategori.php">Kategori Event</a></li>
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


    <!-- Start Event Card2 Area -->
    <section class="property-area section-gap relative" id="property">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 header-text">
                    <h1>Temukan event disini</h1>
                    <p>
                        Pilih dari kategori atau kata kunci dibawah ini untuk membantu kamu menemukan event sesuai minatmu
                    </p>
                </div>
            </div>

            <!-- Blog Categorie Area -->
            <section class="blog_categorie_area">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-3">
                            <div class="categories_post">
                                <img src="img/blog/cat-post/cat-post-3.jpg" alt="post">
                                <div class="categories_details">
                                    <div class="categories_text">
                                        <a href="blog-details.html">
                                            <h5>Social Life</h5>
                                        </a>
                                        <div class="border_line"></div>
                                        <p>Enjoy your social life together</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="categories_post">
                                <img src="img/blog/cat-post/cat-post-2.jpg" alt="post">
                                <div class="categories_details">
                                    <div class="categories_text">
                                        <a href="blog-details.html">
                                            <h5>Sport</h5>
                                        </a>
                                        <div class="border_line"></div>
                                        <p>Be a part of politics</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="categories_post">
                                <img src="img/blog/cat-post/cat-post-1.jpg" alt="post">
                                <div class="categories_details">
                                    <div class="categories_text">
                                        <a href="blog-details.html">
                                            <h5>Worskshop</h5>
                                        </a>
                                        <div class="border_line"></div>
                                        <p>Let the food be finished</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="categories_post">
                                <img src="img/blog/cat-post/cat-post-3.jpg" alt="post">
                                <div class="categories_details">
                                    <div class="categories_text">
                                        <a href="blog-details.html">
                                            <h5>Social Life</h5>
                                        </a>
                                        <div class="border_line"></div>
                                        <p>Enjoy your social life together</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="categories_post">
                                <img src="img/blog/cat-post/cat-post-2.jpg" alt="post">
                                <div class="categories_details">
                                    <div class="categories_text">
                                        <a href="blog-details.html">
                                            <h5>Sport</h5>
                                        </a>
                                        <div class="border_line"></div>
                                        <p>Be a part of politics</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="categories_post">
                                <img src="img/blog/cat-post/cat-post-1.jpg" alt="post">
                                <div class="categories_details">
                                    <div class="categories_text">
                                        <a href="blog-details.html">
                                            <h5>Worskshop</h5>
                                        </a>
                                        <div class="border_line"></div>
                                        <p>Let the food be finished</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </section>
            <!-- Blog Categorie Area -->

        </div>

        </div>
    </section>
    <!-- End Event Card2 Area -->





    <!-- Start blog Area -->
    <section class="blog-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 header-text">
                    <h1>Discover Event</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <a href="#">
                        <div class="card-image">
                            <img class="#" src="img/s3.jpg" alt="">
                        </div>
                        <div class="single-property">
                            <span class="card-content-span">20 November 2020</span>
                            <h4 class="card-content-h4">Lomba Makan Kerupuk</h4>

                            <p class="card-content-p-location"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;UMY Yogyakarta</p>
                            <hr>
                            <div class="card-content-more_event">
                                <span>Lihat Event</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="#">
                        <div class="card-image">
                            <img class="#" src="img/s3.jpg" alt="">
                        </div>
                        <div class="single-property">
                            <span class="card-content-span">20 November 2020</span>
                            <h4 class="card-content-h4">Lomba Makan Kerupuk</h4>

                            <p class="card-content-p-location"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;UMY Yogyakarta</p>
                            <hr>
                            <div class="card-content-more_event">
                                <span>Lihat Event</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="#">
                        <div class="card-image">
                            <img class="#" src="img/s3.jpg" alt="">
                        </div>
                        <div class="single-property">
                            <span class="card-content-span">20 November 2020</span>
                            <h4 class="card-content-h4">Lomba Makan Kerupuk</h4>

                            <p class="card-content-p-location"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;UMY Yogyakarta</p>
                            <hr>
                            <div class="card-content-more_event">
                                <span>Lihat Event</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="#">
                        <div class="card-image">
                            <img class="#" src="img/s3.jpg" alt="">
                        </div>
                        <div class="single-property">
                            <span class="card-content-span">20 November 2020</span>
                            <h4 class="card-content-h4">Lomba Makan Kerupuk</h4>

                            <p class="card-content-p-location"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;UMY Yogyakarta</p>
                            <hr>
                            <div class="card-content-more_event">
                                <span>Lihat Event</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="#">
                        <div class="card-image">
                            <img class="#" src="img/s3.jpg" alt="">
                        </div>
                        <div class="single-property">
                            <span class="card-content-span">20 November 2020</span>
                            <h4 class="card-content-h4">Lomba Makan Kerupuk</h4>

                            <p class="card-content-p-location"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;UMY Yogyakarta</p>
                            <hr>
                            <div class="card-content-more_event">
                                <span>Lihat Event</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="#">
                        <div class="card-image">
                            <img class="#" src="img/s3.jpg" alt="">
                        </div>
                        <div class="single-property">
                            <span class="card-content-span">20 November 2020</span>
                            <h4 class="card-content-h4">Lomba Makan Kerupuk</h4>

                            <p class="card-content-p-location"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;UMY Yogyakarta</p>
                            <hr>
                            <div class="card-content-more_event">
                                <span>Lihat Event</span>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>
    <!-- End blog Area -->


    <div class="row d-flex justify-content-center">
        <div class="col-md-10 header-text">
            <a href="#" class="genric-btn primary-border circle ">Lihat Event lainnya<span class="lnr"></span></a>
        </div>
    </div>












    <!-- Start city Area 
    <section class="city-area ">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 header-text">
                    <h1>Properties in Various Cities</h1>
                    <p>
                        Who are in extremely love with eco friendly system.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 mb-10">
                    <div class="content">
                        <a href="#" target="_blank">
                            <div class="content-overlay"></div>
                            <img class="content-image img-fluid d-block mx-auto" src="img/p1.jpg" alt="">
                            <div class="content-details fadeIn-bottom">
                                <h2 class="content-title">San Fransisco Properties</h2>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 mb-10">
                    <div class="content">
                        <a href="#" target="_blank">
                            <div class="content-overlay"></div>
                            <img class="content-image img-fluid d-block mx-auto" src="img/p2.jpg" alt="">
                            <div class="content-details fadeIn-bottom">
                                <h2 class="content-title">New York Properties</h2>
                            </div>
                        </a>
                    </div>
                    <div class="row city-bottom">
                        <div class="col-lg-6 col-md-6 mt-30">
                            <div class="content">
                                <a href="#" target="_blank">
                                    <div class="content-overlay"></div>
                                    <img class="content-image img-fluid d-block mx-auto" src="img/p3.jpg" alt="">
                                    <div class="content-details fadeIn-bottom">
                                        <h2 class="content-title">Boston Properties</h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mt-30">
                            <div class="content">
                                <a href="#" target="_blank">
                                    <div class="content-overlay"></div>
                                    <img class="content-image img-fluid d-block mx-auto" src="img/p4.jpg" alt="">
                                    <div class="content-details fadeIn-bottom">
                                        <h2 class="content-title">Elay Properties</h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End city Area -->



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