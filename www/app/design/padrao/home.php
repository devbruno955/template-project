﻿<!DOCTYPE html>
<html lang="pt-BR">

<meta charset="utf-8">

<!-- Mirrored from brotherslab.thesoftking.com/html/realcon/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 18 Aug 2019 16:35:07 GMT -->
<head>

        <script type="text/javascript">

var WEB_ROOT    = "<?php echo WEB_ROOT; ?>";
var URLWEB      = "<?php echo $ROOTPATH?>";
var CITY_ID     = "<?php echo $city['id']?>";
var ID_PARCEIRO = "<?php echo $_REQUEST['idparceiro']?>";
</script>



    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> RealCon - Real Estate Property Business HTML Template </title>
    <!-- favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- bootstrap -->
    <link rel='stylesheet' href="<?=$ROOTPATH?>/app/design/realcon/assets/css/bootstrap.min.css">
    <!-- fontawesome icon  -->
    <link rel='stylesheet' href="<?=$ROOTPATH?>/app/design/realcon/assets/css/fontawesome.min.css">
    <!-- animate.css -->
    <link rel='stylesheet' href="<?=$ROOTPATH?>/app/design/realcon/assets/css/animate.css">
    <!-- Owl Carousel -->
    <link rel='stylesheet' href="<?=$ROOTPATH?>/app/design/realcon/assets/css/owl.carousel.min.css">
    <!-- flaticon -->
    <link rel='stylesheet' href="<?=$ROOTPATH?>/app/design/realcon/assets/fonts/flaticon.css">
    <!-- magnific popup -->
    <link rel='stylesheet' href="<?=$ROOTPATH?>/app/design/realcon/assets/css/magnific-popup.css">
    <!-- stylesheet -->
    <link rel='stylesheet' href="<?=$ROOTPATH?>/app/design/realcon/assets/css/style.css">
    <!-- responsive -->
    <link rel='stylesheet' href="<?=$ROOTPATH?>/app/design/realcon/assets/css/responsive.css">

    <!-- Bloco de CDNs
<script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
<script src='https://code.jquery.com/jquery-migrate-1.4.1.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script> -->

<!-- fim do novo Layout -->
 
<!-- JS -->
<script type="text/javascript" src="<?=$ROOTPATH?>/js/jquery-1.7.1.min.js" ></script>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/jquery.cookie.js" ></script>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/mascara.js" ></script>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/countdown/jquery.countdown.js" ></script>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/slider.js" ></script>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/funcoes.js"></script> 
<script type="text/javascript" src="<?=$ROOTPATH?>/js/corner.js"></script>   
<script type="text/javascript" src="<?=$ROOTPATH?>/js/menu/menu.js"></script>   
<script type="text/javascript" src="<?=$ROOTPATH?>/js/SearchPlace.js"></script>  
<script type="text/javascript" src="<?=$ROOTPATH?>/js/SubmitContact.js"></script>     
<script type="text/javascript" src="<?=$ROOTPATH?>/js/FormSearch.js"></script>
<script type="text/javascript" src="<?php echo $ROOTPATH; ?>/js/AddFavorite.js" ></script>   
<script type="text/javascript" src="<?=$ROOTPATH?>/js/colorbox/jquery.colorbox-min.js"></script>


</head>

<body> 
    
    <!-- preloader begin
    <div class="preloader">
        <div class="loader">Loading...</div>
    </div>-->
    <!-- preloader end -->

    <!-- header begin -->
    <header class="header-area">
        <!-- header top begin -->
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-7 col-lg-12">
                        <div class="support-bar">
                            <ul>
                                <li>
                                    <p><span><i class="fas fa-phone"></i></span>+1 514-286-4242</p>
                                </li>
                                <li>
                                    <p><span><i class="far fa-envelope"></i></span>example@example.com</p>
                                </li>
                                <li>
                                    <p><span><i class="fas fa-question"></i></span>Ask Your Question</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="connect-bar">
                            <div class="social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                            <div class="connect">
                                <a href="#">Login</a>
                                <a href="#">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header top end -->

        <!-- header bottom begin -->
        <div class="header-bottom">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-xl-2 col-lg-2 col-6 d-flex align-items-center">
                        <div class="logo">
                            <a href="index.html"><img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-6 d-xl-none d-lg-none d-md-block d-sm-block d-block">
                        <button class="menu-button navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                        </button>
                    </div>
                    <div class="col-xl-8 col-lg-10 col-12 d-flex align-items-center">
                        <nav class="main-menu navbar navbar-expand-lg navbar-light">
                            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                                <ul class="navbar-nav mt-2 mt-lg-0 justify-content-end">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="01" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Home <i class="fas fa-angle-down"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="01">
                                            <a class="dropdown-item" href="index.html">Homepage 1</a>
                                            <a class="dropdown-item" href="https://brotherslab.thesoftking.com/html/realcon/demo/index-2.html">Homepage 2</a>
                                            <a class="dropdown-item" href="https://brotherslab.thesoftking.com/html/realcon/demo/index-3.html">Homepage 3</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="02" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Properties <i class="fas fa-angle-down"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="02">
                                            <a class="dropdown-item" href="https://brotherslab.thesoftking.com/html/realcon/demo/property-listing.html">Proprety Listing</a>
                                            <a class="dropdown-item" href="https://brotherslab.thesoftking.com/html/realcon/demo/single-property.html">Single Property</a>
                                            <a class="dropdown-item" href="https://brotherslab.thesoftking.com/html/realcon/demo/properties-sidebar.html">Property Sidebar</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="03" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Agents <i class="fas fa-angle-down"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="03">
                                            <a class="dropdown-item" href="https://brotherslab.thesoftking.com/html/realcon/demo/agent-grid.html">Agent Grid</a>
                                            <a class="dropdown-item" href="https://brotherslab.thesoftking.com/html/realcon/demo/agent-details.html">Agent Details</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="04" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Pages <i class="fas fa-angle-down"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="04">
                                            <a class="dropdown-item" href="https://brotherslab.thesoftking.com/html/realcon/demo/about.html">About</a>
                                            <a class="dropdown-item" href="https://brotherslab.thesoftking.com/html/realcon/demo/gallery.html">Gallery</a>
                                            <a class="dropdown-item" href="https://brotherslab.thesoftking.com/html/realcon/demo/privacy-and-policy.html">Privacy Policy</a>
                                            <a class="dropdown-item" href="https://brotherslab.thesoftking.com/html/realcon/demo/faq.html">FAQ</a>
                                            <a class="dropdown-item" href="https://brotherslab.thesoftking.com/html/realcon/demo/error.html">404</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="05" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Blog <i class="fas fa-angle-down"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="05">
                                            <a class="dropdown-item" href="https://brotherslab.thesoftking.com/html/realcon/demo/blog-details.html">Blog Details</a>
                                            <a class="dropdown-item" href="https://brotherslab.thesoftking.com/html/realcon/demo/blog-grid.html">Blog Grid</a>
                                            <a class="dropdown-item" href="https://brotherslab.thesoftking.com/html/realcon/demo/blog-left-sidebar.html">Blog L-Sidebar</a>
                                            <a class="dropdown-item" href="https://brotherslab.thesoftking.com/html/realcon/demo/blog-right-sidebar.html">Blog R-Sidebar</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="https://brotherslab.thesoftking.com/html/realcon/demo/contact.html">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="col-xl-2 col-lg-2 align-items-center">
                        <div class="submit-button">
                            <a href="#">Submit Property</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header bottom end -->
    </header>
    <!-- header end -->


    <!-- banner begin -->
    <div class="banner-area">
        <div class="banner-inner">
            <!-- banner carousel begin -->
            <div class="banner-carousel" id="banner-carousel">
                <div class="single-banner-item slider-bg-1">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-8 col-md-12">
                                <h1>Let us Guide You Home.</h1>
                                <p>Our experienced agents have the knowledge and skills to<br/> guide you to your new home.</p>
                                <a href="#">Talk to an Agent</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-banner-item slider-bg-1">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-8 col-md-12">
                                <h1>Let us Guide You Home.</h1>
                                <p>Our experienced agents have the knowledge and skills to<br/> guide you to your new home.</p>
                                <a href="#">Talk to an Agent</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-banner-item slider-bg-1">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-8 col-md-12">
                                <h1>Let us Guide You Home.</h1>
                                <p>Our experienced agents have the knowledge and skills to<br/> guide you to your new home.</p>
                                <a href="#">Talk to an Agent</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- banner carousel end -->

            <!-- Barra de pesquisa nativa do tema -->

            <?php require_once(DIR_BLOCO . "/bloco_busca_realcon.php"); ?>

            <?php //require_once(DIR_BLOCO . "/bloco_busca_home.php"); ?>

            <!-- fim da barra de pesquisa nativa -->
        </div>
    </div>
    <!-- banner end -->


    <!-- feature begin -->
    <div class="feature-area">
            <div class="container"><div class="row justify-content-center">
                <div class="col-xl-8 col-md-8">
                    <div class="section-title">
                        <h2>How It Works</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                            alteration in some form by injected humour randomised words believable.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-feature">
                        <div class="part-icon">
                            <i class="flaticon-home"></i>
                        </div>
                        <div class="part-text">
                            <h3>Sell Property</h3>
                            <p>There are many variations of passages of Lorem a Ipsum available to but the majority have suffered alteration in some for my believable.</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-feature">
                        <div class="part-icon">
                            <i class="flaticon-real-state-seller"></i>
                        </div>
                        <div class="part-text">
                            <h3>Expert Agents</h3>
                            <p>There are many variations of passages of Lorem a Ipsum available to but the majority have suffered alteration in some for my believable.</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-feature">
                        <div class="part-icon">
                            <i class="flaticon-list"></i>
                        </div>
                        <div class="part-text">
                            <h3>Daily Listings</h3>
                            <p>There are many variations of passages of Lorem a Ipsum available to but the majority have suffered alteration in some for my believable.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- feature end -->


    <!-- feature properties begin -->
    <div class="feature-properties">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-md-8">
                    <div class="section-title">
                        <h2>Featured Properties</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form by injected humour randomised words believable.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-property">
                        <div class="part-img">
                            <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/feature-property-1.jpg" alt="">
                            <div class="content-on-img">
                                <div class="cat-list">
                                    <a href="#">For rent</a>
                                    <a href="#">Modern villa</a>
                                </div>
                                <div class="price-n-time">
                                    <h3>$6000<span><i class="far fa-calendar-alt"></i> 4 months</span></h3>
                                </div>
                            </div>
                        </div>
                        <div class="part-details">
                            <div class="title-nd-place">
                                <h4><a href="#">Villa with Pool for Rent</a></h4>
                                <p> Dr. Elbert K. St Claire III, East 65th Street, New York</p>
                            </div>
                            <div class="rent-info">
                                <ul>
                                    <li><span><i class="flaticon-bed"></i></span>5 bed</li>
                                    <li><span><i class="flaticon-bathtub"></i></span>baths</li>
                                    <li><span><i class="flaticon-school-material"></i></span>1300 SqFt</li>
                                </ul>
                            </div>
                            <div class="posted-info">
                                <div class="poster">
                                    <div class="poster-img">
                                        <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/poster-1.jpg" alt="">
                                    </div>
                                    <div class="poster-name">
                                        <h5>John Silver</h5>
                                    </div>
                                </div>
                                <div class="icon">
                                    <a href="#"><i class="fas fa-share-alt"></i></a>
                                    <a href="#"><i class="fas fa-heart"></i></a>
                                    <a href="#"><i class="fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-property">
                        <div class="part-img">
                            <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/feature-property-2.jpg" alt="">
                            <div class="content-on-img">
                                <div class="cat-list">
                                    <a href="#">For rent</a>
                                    <a href="#">Modern villa</a>
                                </div>
                                <div class="price-n-time">
                                    <h3>$6000<span><i class="far fa-calendar-alt"></i> 4 months</span></h3>
                                </div>
                            </div>
                        </div>
                        <div class="part-details">
                            <div class="title-nd-place">
                                <h4><a href="#">Modern apartment in the city</a></h4>
                                <p> Dr. Elbert K. St Claire III, East 65th Street, New York</p>
                            </div>
                            <div class="rent-info">
                                <ul>
                                    <li><span><i class="flaticon-bed"></i></span>5 bed</li>
                                    <li><span><i class="flaticon-bathtub"></i></span>baths</li>
                                    <li><span><i class="flaticon-school-material"></i></span>1300 SqFt</li>
                                </ul>
                            </div>
                            <div class="posted-info">
                                <div class="poster">
                                    <div class="poster-img">
                                        <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/poster-1.jpg" alt="">
                                    </div>
                                    <div class="poster-name">
                                        <h5>John Silver</h5>
                                    </div>
                                </div>
                                <div class="icon">
                                    <a href="#"><i class="fas fa-share-alt"></i></a>
                                    <a href="#"><i class="fas fa-heart"></i></a>
                                    <a href="#"><i class="fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-property">
                        <div class="part-img">
                            <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/feature-property-3.jpg" alt="">
                            <div class="content-on-img">
                                <div class="cat-list">
                                    <a href="#">For rent</a>
                                    <a href="#">Modern villa</a>
                                </div>
                                <div class="price-n-time">
                                    <h3>$6000<span><i class="far fa-calendar-alt"></i> 4 months</span></h3>
                                </div>
                            </div>
                        </div>
                        <div class="part-details">
                            <div class="title-nd-place">
                                <h4><a href="#">Minimalist and bright flat</a></h4>
                                <p> Dr. Elbert K. St Claire III, East 65th Street, New York</p>
                            </div>
                            <div class="rent-info">
                                <ul>
                                    <li><span><i class="flaticon-bed"></i></span>5 bed</li>
                                    <li><span><i class="flaticon-bathtub"></i></span>baths</li>
                                    <li><span><i class="flaticon-school-material"></i></span>1300 SqFt</li>
                                </ul>
                            </div>
                            <div class="posted-info">
                                <div class="poster">
                                    <div class="poster-img">
                                        <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/poster-1.jpg" alt="">
                                    </div>
                                    <div class="poster-name">
                                        <h5>John Silver</h5>
                                    </div>
                                </div>
                                <div class="icon">
                                    <a href="#"><i class="fas fa-share-alt"></i></a>
                                    <a href="#"><i class="fas fa-heart"></i></a>
                                    <a href="#"><i class="fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-property">
                        <div class="part-img">
                            <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/feature-property-4.jpg" alt="">
                            <div class="content-on-img">
                                <div class="cat-list">
                                    <a href="#">For rent</a>
                                    <a href="#">Modern villa</a>
                                </div>
                                <div class="price-n-time">
                                    <h3>$6000<span><i class="far fa-calendar-alt"></i> 4 months</span></h3>
                                </div>
                            </div>
                        </div>
                        <div class="part-details">
                            <div class="title-nd-place">
                                <h4><a href="#">Two storey modern flat</a></h4>
                                <p> Dr. Elbert K. St Claire III, East 65th Street, New York</p>
                            </div>
                            <div class="rent-info">
                                <ul>
                                    <li><span><i class="flaticon-bed"></i></span>5 bed</li>
                                    <li><span><i class="flaticon-bathtub"></i></span>baths</li>
                                    <li><span><i class="flaticon-school-material"></i></span>1300 SqFt</li>
                                </ul>
                            </div>
                            <div class="posted-info">
                                <div class="poster">
                                    <div class="poster-img">
                                        <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/poster-1.jpg" alt="">
                                    </div>
                                    <div class="poster-name">
                                        <h5>John Silver</h5>
                                    </div>
                                </div>
                                <div class="icon">
                                    <a href="#"><i class="fas fa-share-alt"></i></a>
                                    <a href="#"><i class="fas fa-heart"></i></a>
                                    <a href="#"><i class="fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-property">
                        <div class="part-img">
                            <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/feature-property-5.jpg" alt="">
                            <div class="content-on-img">
                                <div class="cat-list">
                                    <a href="#">For rent</a>
                                    <a href="#">Modern villa</a>
                                </div>
                                <div class="price-n-time">
                                    <h3>$6000<span><i class="far fa-calendar-alt"></i> 4 months</span></h3>
                                </div>
                            </div>
                        </div>
                        <div class="part-details">
                            <div class="title-nd-place">
                                <h4><a href="#">Place perfect for nature lovers</a></h4>
                                <p> Dr. Elbert K. St Claire III, East 65th Street, New York</p>
                            </div>
                            <div class="rent-info">
                                <ul>
                                    <li><span><i class="flaticon-bed"></i></span>5 bed</li>
                                    <li><span><i class="flaticon-bathtub"></i></span>baths</li>
                                    <li><span><i class="flaticon-school-material"></i></span>1300 SqFt</li>
                                </ul>
                            </div>
                            <div class="posted-info">
                                <div class="poster">
                                    <div class="poster-img">
                                        <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/poster-1.jpg" alt="">
                                    </div>
                                    <div class="poster-name">
                                        <h5>John Silver</h5>
                                    </div>
                                </div>
                                <div class="icon">
                                    <a href="#"><i class="fas fa-share-alt"></i></a>
                                    <a href="#"><i class="fas fa-heart"></i></a>
                                    <a href="#"><i class="fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-property">
                        <div class="part-img">
                            <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/feature-property-6.jpg" alt="">
                            <div class="content-on-img">
                                <div class="cat-list">
                                    <a href="#">For rent</a>
                                    <a href="#">Modern villa</a>
                                </div>
                                <div class="price-n-time">
                                    <h3>$6000<span><i class="far fa-calendar-alt"></i> 4 months</span></h3>
                                </div>
                            </div>
                        </div>
                        <div class="part-details">
                            <div class="title-nd-place">
                                <h4><a href="#">Summer house with a pole</a></h4>
                                <p> Dr. Elbert K. St Claire III, East 65th Street, New York</p>
                            </div>
                            <div class="rent-info">
                                <ul>
                                    <li><span><i class="flaticon-bed"></i></span>5 bed</li>
                                    <li><span><i class="flaticon-bathtub"></i></span>baths</li>
                                    <li><span><i class="flaticon-school-material"></i></span>1300 SqFt</li>
                                </ul>
                            </div>
                            <div class="posted-info">
                                <div class="poster">
                                    <div class="poster-img">
                                        <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/poster-1.jpg" alt="">
                                    </div>
                                    <div class="poster-name">
                                        <h5>John Silver</h5>
                                    </div>
                                </div>
                                <div class="icon">
                                    <a href="#"><i class="fas fa-share-alt"></i></a>
                                    <a href="#"><i class="fas fa-heart"></i></a>
                                    <a href="#"><i class="fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="container">
                    <div class="col-xl-12 col-lg-12">
                        <div class="load-more-button">
                            <button>Load More</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- feature properties end -->


    <!-- testimonial begin -->
    <div class="testimonial-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-md-8">
                    <div class="section-title">
                        <h2>Our Clients' Words</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form by injected humour randomised words believable.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="testimonial-slider">
                    <div class="col-xl-6 col-lg-6">
                        <div class="single-testimonial">
                            <div class="part-text">
                                <div class="icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <p>There are many variations of passages of Lorem to Ipsum the available but the majority have suffered to alteration in by injected dummy text.</p>
                            </div>
                            <div class="part-details">
                                <div class="part-img">
                                    <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/poster-1.jpg" alt="">
                                </div>
                                <div class="part-name">
                                    <h3>Jamie Hunt,</h3>
                                    <h4>Creative Artist@Adobe</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6">
                        <div class="single-testimonial">
                            <div class="part-text">
                                <div class="icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <p>There are many variations of passages of Lorem to Ipsum the available but the majority have suffered to alteration in by injected dummy text.</p>
                            </div>
                            <div class="part-details">
                                <div class="part-img">
                                    <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/poster-1.jpg" alt="">
                                </div>
                                <div class="part-name">
                                    <h3>Jamie Hunt,</h3>
                                    <h4>Creative Artist@Adobe</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6">
                        <div class="single-testimonial">
                            <div class="part-text">
                                <div class="icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <p>There are many variations of passages of Lorem to Ipsum the available but the majority have suffered to alteration in by injected dummy text.</p>
                            </div>
                            <div class="part-details">
                                <div class="part-img">
                                    <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/poster-1.jpg" alt="">
                                </div>
                                <div class="part-name">
                                    <h3>Jamie Hunt,</h3>
                                    <h4>Creative Artist@Adobe</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6">
                        <div class="single-testimonial">
                            <div class="part-text">
                                <div class="icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <p>There are many variations of passages of Lorem to Ipsum the available but the majority have suffered to alteration in by injected dummy text.</p>
                            </div>
                            <div class="part-details">
                                <div class="part-img">
                                    <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/poster-1.jpg" alt="">
                                </div>
                                <div class="part-name">
                                    <h3>Jamie Hunt,</h3>
                                    <h4>Creative Artist@Adobe</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6">
                        <div class="single-testimonial">
                            <div class="part-text">
                                <div class="icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <p>There are many variations of passages of Lorem to Ipsum the available but the majority have suffered to alteration in by injected dummy text.</p>
                            </div>
                            <div class="part-details">
                                <div class="part-img">
                                    <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/poster-1.jpg" alt="">
                                </div>
                                <div class="part-name">
                                    <h3>Jamie Hunt,</h3>
                                    <h4>Creative Artist@Adobe</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- testimonial end -->


    <!-- big feature begin -->
    <div class="big-feature-area">
        <div class="container">
            <div class="row d-flex">
                <div class="col-xl-7 col-lg-6 d-flex align-items-center">
                    <div class="heading">
                        <h2>Buy or sell your house in few Seconds with Benaa</h2>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 d-flex align-items-center">
                    <div class="button-links">
                        <a href="#">submit property</a>
                        <a href="#">browse properties</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- big feature end -->


    <!-- popular category begin -->
    <div class="popular-category-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-md-8">
                    <div class="section-title">
                        <h2>Popular Categories</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form by injected humour randomised words believable.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-category">
                        <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/popular-category.jpg" alt="">
                        <div class="content-on-img">
                            <div class="part-text">
                                <h3>Amazing Villa</h3>
                                <a href="#">3 Properties</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-category">
                        <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/popular-category-2.jpg" alt="">
                        <div class="content-on-img">
                            <div class="part-text">
                                <h3>Family House</h3>
                                <a href="#">5 Properties</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-category">
                        <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/popular-category-3.jpg" alt="">
                        <div class="content-on-img">
                            <div class="part-text">
                                <h3>Apartment</h3>
                                <a href="#">5 Properties</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-category">
                        <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/popular-category-4.jpg" alt="">
                        <div class="content-on-img">
                            <div class="part-text">
                                <h3>Beach House</h3>
                                <a href="#">3 Properties</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-category">
                        <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/popular-category-5.jpg" alt="">
                        <div class="content-on-img">
                            <div class="part-text">
                                <h3>Mount House</h3>
                                <a href="#">5 Properties</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-category">
                        <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/popular-category-6.jpg" alt="">
                        <div class="content-on-img">
                            <div class="part-text">
                                <h3>Frank Mount</h3>
                                <a href="#">5 Properties</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular category end -->


    <!-- limelight feature begin -->
    <div class="limelight-feature">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-feature">
                        <div class="part-icon">
                            <i class="flaticon-heart"></i>
                        </div>
                        <div class="part-text">
                            <h3>Great Features</h3>
                            <p>There are many variations of passages of Lorem Ipsum the available but the majority dummy now dummy now.
                            dummy text the available.</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-feature">
                        <div class="part-icon">
                            <i class="flaticon-property"></i>
                        </div>
                        <div class="part-text">
                            <h3>Submit Property</h3>
                            <p>There are many variations of passages of Lorem Ipsum the available but the majority dummy now dummy now.
                            dummy text the available.</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-feature">
                        <div class="part-icon">
                            <i class="flaticon-settings"></i>
                        </div>
                        <div class="part-text">
                            <h3>Page Builder</h3>
                            <p>There are many variations of passages of Lorem Ipsum the available but the majority dummy now dummy now.
                            dummy text the available.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- limelight feature end -->


    <!-- team area begin -->
    <div class="team-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-md-8">
                    <div class="section-title">
                        <h2>Meet our Agents</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form by injected humour randomised words believable.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-member">
                        <div class="part-img">
                            <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/member-1.jpg" alt="">
                        </div>
                        <div class="part-text">
                            <h3>Bethany Kertzmann</h3>
                            <h4>Founder & CEO</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration dummy text.</p>
                        </div>
                        <div class="part-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-member">
                        <div class="part-img">
                            <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/member-2.jpg" alt="">
                        </div>
                        <div class="part-text">
                            <h3>Angela Mayer</h3>
                            <h4>Web Designer</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration dummy text.</p>
                        </div>
                        <div class="part-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-member">
                        <div class="part-img">
                            <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/member-3.jpg" alt="">
                        </div>
                        <div class="part-text">
                            <h3>Edward Powlowski</h3>
                            <h4>Web Developer</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration dummy text.</p>
                        </div>
                        <div class="part-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- team area end -->


    <!-- video area begin -->
    <div class="video-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10">
                    <div class="part-video">
                        <a class="venobox mfp-iframe" href="https://www.youtube.com/watch?v=pw3hU0CpTNs"><i class="fas fa-play"></i></a>
                        <h2>advertisment punchline: building greece</h2>
                        <p>There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some<br/> form, by injected humour randomised words which don't look even slightly believable. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- video area end -->


    <!-- blog begin -->
    <div class="blog-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-md-8">
                    <div class="section-title">
                        <h2>Most Recent Blog</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form by injected humour randomised words believable.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-blog">
                        <div class="part-img">
                            <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/blog-1.jpg" alt="">
                            <div class="content-on-img">
                                <a href="#">Corporate Office</a>
                            </div>
                        </div>
                        <div class="part-text">
                            <span>February 25,2018</span>
                            <h3><a href="#">Complete Corporate Office near that to sabestian villa</a></h3>
                            <p>There are many variations of passages a dumm to about Lorem Ipsum available but the majority the an have suffered alteration in some form to that  and  injected humour or randomised.</p>
                        </div>
                        <div class="part-admin">
                            <ul>
                                <li>
                                    <h4><span><i class="fas fa-user"></i></span>Robert Johnson</h4>
                                </li>
                                <li>
                                    <h4><span><i class="far fa-comments"></i></span>015</h4>
                                </li>
                                <li>
                                    <h4><span><i class="far fa-heart"></i></span>475</h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-blog">
                        <div class="part-img">
                            <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/blog-2.jpg" alt="">
                            <div class="content-on-img">
                                <a href="#">City sabestian</a>
                            </div>
                        </div>
                        <div class="part-text">
                            <span>February 25,2018</span>
                            <h3><a href="#">Law firm opened near to that gonig to sabestian villa</a></h3>
                            <p>There are many variations of passages a dumm to about Lorem Ipsum available but the majority the an have suffered alteration in some form to that  and  injected humour or randomised.</p>
                        </div>
                        <div class="part-admin">
                            <ul>
                                <li>
                                    <h4><span><i class="fas fa-user"></i></span>Robert Johnson</h4>
                                </li>
                                <li>
                                    <h4><span><i class="far fa-comments"></i></span>015</h4>
                                </li>
                                <li>
                                    <h4><span><i class="far fa-heart"></i></span>475</h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-blog">
                        <div class="part-img">
                            <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/blog-3.jpg" alt="">
                            <div class="content-on-img">
                                <a href="#">Guest House</a>
                            </div>
                        </div>
                        <div class="part-text">
                            <span>February 25,2018</span>
                            <h3><a href="#">Complete Corporate Office near that to sabestian villa</a></h3>
                            <p>There are many variations of passages a dumm to about Lorem Ipsum available but the majority the an have suffered alteration in some form to that  and  injected humour or randomised.</p>
                        </div>
                        <div class="part-admin">
                            <ul>
                                <li>
                                    <h4><span><i class="fas fa-user"></i></span>Robert Johnson</h4>
                                </li>
                                <li>
                                    <h4><span><i class="far fa-comments"></i></span>015</h4>
                                </li>
                                <li>
                                    <h4><span><i class="far fa-heart"></i></span>475</h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog end -->


    <!-- brand begin-->
    <div class="brand-area">
        <div class="container">
            <div class="col-xl-12 col-lg-12 px-0">
                <div class="brand-carousel" id="brand-carousel">
                    <div class="single-brand-logo">
                        <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/01.png" alt="brangs logo">
                    </div>
                    <div class="single-brand-logo">
                        <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/02.png" alt="brangs logo">
                    </div>
                    <div class="single-brand-logo">
                        <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/03.png" alt="brangs logo">
                    </div>
                    <div class="single-brand-logo">
                        <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/04.png" alt="brangs logo">
                    </div>
                    <div class="single-brand-logo">
                        <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/02.png" alt="brangs logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand end -->


    <!-- footer begin -->
    <footer class="footer-area">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="single-foot">
                            <h3>Our Services</h3>
                            <ul class="useful-links">
                                <li><a href="#"><span><i class="fas fa-angle-right"></i></span>My Properties</a></li>
                                <li><a href="#"><span><i class="fas fa-angle-right"></i></span>Create Property</a></li>
                                <li><a href="#"><span><i class="fas fa-angle-right"></i></span>Research Market Analyst</a></li>
                                <li><a href="#"><span><i class="fas fa-angle-right"></i></span>Register</a></li>
                                <li><a href="#"><span><i class="fas fa-angle-right"></i></span>Quality Property Services</a></li>
                                <li><a href="#"><span><i class="fas fa-angle-right"></i></span>Management Service Agreements</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="single-foot">
                            <h3>Our Support</h3>
                            <ul class="useful-links">
                                <li><a href="#"><span><i class="fas fa-angle-right"></i></span>Help & Support</a></li>
                                <li><a href="#"><span><i class="fas fa-angle-right"></i></span>Contact Us</a></li>
                                <li><a href="#"><span><i class="fas fa-angle-right"></i></span>I Need Support</a></li>
                                <li><a href="#"><span><i class="fas fa-angle-right"></i></span>Telephone Functions</a></li>
                                <li><a href="#"><span><i class="fas fa-angle-right"></i></span>Our Company</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="single-foot">
                            <h3>Contact Us</h3>
                            <p>There are many variations of passages
                            Lorem Ipsum available but the majority
                            have suffered alteration.</p>
                            <ul class="live-contact">
                                <li><span><i class="far fa-envelope"></i></span>info@example.com</li>
                                <li><span><i class="fas fa-phone"></i></span>+00- 254-025-2162</li>
                                <li><span><i class="fas fa-map-marker-alt"></i></span>PO Box 16122 Collins Street<br/>West Victoria 8007 Australia</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="single-foot">
                            <h3>Newsletter</h3>
                            <p>Subscribe to our newsletter and get
                            all the cool news.</p>
                            <form class="newsletter">
                                <input type="text" placeholder="Enter Your Email">
                                <button type="submit"><i class="fas fa-paper-plane"></i></button>
                            </form>
                            <div class="social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="logo">
                            <img src="https://brotherslab.thesoftking.com/html/realcon/demo/assets/img/footer-logo.png" alt="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="copyright">
                            <p>© 2018 RealCon. All rights reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->


    <!-- jquery -->
    <script src="<?=$ROOTPATH?>/app/design/realcon/assets/js/jquery.js"></script>
    <!-- bootstrap -->
    <script src="<?=$ROOTPATH?>/app/design/realcon/assets/js/bootstrap.min.js"></script>
    <!-- owl carousel -->
    <script src="<?=$ROOTPATH?>/app/design/realcon/assets/js/owl.carousel.js"></script>
    <!-- magnific popup -->
    <script src="<?=$ROOTPATH?>/app/design/realcon/assets/js/jquery.magnific-popup.js"></script>
    <!-- rangeslider -->
    <script src="<?=$ROOTPATH?>/app/design/realcon/assets/js/rangeslider.js"></script>
    <!-- way poin js-->
    <script src="<?=$ROOTPATH?>/app/design/realcon/assets/js/waypoints.min.js"></script>
    <!-- wow js-->
    <script src="<?=$ROOTPATH?>/app/design/realcon/assets/js/wow.min.js"></script>
    <!-- counterup js-->
    <script src="<?=$ROOTPATH?>/app/design/realcon/assets/js/jquery.counterup.min.js"></script>
    <!-- main -->
    <script src="<?=$ROOTPATH?>/app/design/realcon/assets/js/main.js"></script>

    




</body>

    


<!-- Mirrored from brotherslab.thesoftking.com/html/realcon/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 18 Aug 2019 16:35:12 GMT -->
</html>