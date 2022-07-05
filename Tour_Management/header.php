<?php     
 session_start();
?>
<!DOCTYPE html>
<html>
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="farm activities, itineraries, farm holidays, country holidays, bed and breakfast, hotel, country hotel" />
    <meta name="description" content="Country Holidays - Premium site template for a country accommodation.">
    <meta name="author" content="Ansonika">
    <title>Leisure Inn</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <!-- Google web fonts -->
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>

    <!-- BASE CSS -->
    <link href="css/base.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="css/date_time_picker.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="OwlCarousel/owl.carousel.min.css" rel="stylesheet">
    <link href="OwlCarousel/owl.theme.default.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>


    <!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

    <!-- <div id="preloader">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div> -->
    <!-- End Preload -->

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

    <!-- Header================================================== -->
    <header>
        <div id="top_header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div id="logo">
                            <a href="index.html"><img src="img/icon-confirmed-2.jfif" width="250" height="50" alt="LeisureInn" data-retina="true"></a>
                        </div>
                    </div>
                    <nav class="col-md-8 col-sm-8 col-xs-8">
                        <a class="cmn-toggle-switch cmn-toggle-switch__rot  open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                        <div class="main-menu">
                            <div id="header_menu">
                                <img src="img/icon-confirmed-2.jfif" width="250" height="50" alt="LeisureInn" data-retina="true">
                            </div>
                            <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="show-submenu">Home <i class="icon-down-open-mini"></i></a>
                                    <ul>
                                        <li><a href="index.html">With Revolution Slider</a></li>
                                        <li><a href="index_2.html">With Video Background</a></li>
                                        <li><a href="index_3.html">With Booking Form</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="show-submenu">Rooms <i class="icon-down-open-mini"></i></a>
                                    <ul>
                                        <li><a href="rooms_list.html">Room list</a></li>
                                        <li><a href="room_details.html">Room details</a></li>
                                        <li><a href="room_booking.html">Room details Booking</a></li>
                                    </ul>
                                </li>
                                <li><a href="about.html">About</a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="show-submenu">Activities <i class="icon-down-open-mini"></i></a>
                                    <ul>
                                        <li><a href="all_activities.html">All activities</a></li>
                                        <li><a href="horses.html">Horses</a></li>
                                        <li><a href="local_food.html">Discover local food</a></li>
                                        <li><a href="cooking.html">Cooking local food</a></li>
                                        <li><a href="farm.html">Farm activities</a></li>
                                    </ul>
                                </li>
                                


                                <li><a href="contacts.html">Contact us</a></li>
                                <?php
                                // session_destroy();
     
          if (isset($_SESSION['user_name'])) {
            $username = $_SESSION['user_name'];
          }else{
            $username ='Login/Register';
          }
          ?>
          <?php if (isset($_SESSION['user_name'])) {  ?>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="show-submenu"><?php echo $username;?><i class="icon-down-open-mini"></i></a>
                                    <ul>
                                        <li><a href="Ads/add-ads.php">Ads Campaign</a></li>
                                        <li><a href="Ads/booking-details.php">Booking Details</a></li>
                                        <li><a href="logout.php">Logout</a></li>
                                    
                                    </ul>
                                </li>
                                <?php } else{?>
                               
                                <li><a href="login.php"><?php echo $username;?></a></li> <?php } ?>
                                
                            </ul>
                        </div><!-- End main-menu -->

                    </nav>
                </div>
            </div>
        </div>
    </header><!-- End Header -->