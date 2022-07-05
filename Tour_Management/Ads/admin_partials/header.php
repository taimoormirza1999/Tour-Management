<?php
// session_start();
// if(!isset($_SESSION["Alogedin"])==true){
// header("location:login.php"); 
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- META ============================================= -->
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />

    <!-- DESCRIPTION -->

    <!-- OG -->
    

    <!-- FAVICONS ICON ============================================= -->
    <!-- <link rel="icon" href="../error-404.php" type="image/x-icon" /> -->
    

    <!-- PAGE TITLE HERE ============================================= -->
    <title>Leisure Inn</title>

    <!-- MOBILE SPECIFIC ============================================= -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="icon" href="../partials/favicon.png" type="image/x-icon/png" /> -->
    <!-- Favicons-->
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->

    <!-- All PLUGINS CSS ============================================= -->
    <link rel="stylesheet" type="text/css" href="assets/css/assets.css"> 
    <link rel="stylesheet" type="text/css" href="assets/vendors/calendar/fullcalendar.css">


    <!-- TYPOGRAPHY ============================================= -->
    <link rel="stylesheet" type="text/css" href="assets/css/typography.css">

    <!-- SHORTCODES ============================================= -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css"> -->

    <!-- STYLESHEETS ============================================= -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
    <link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">
    <style>
        .ttr-sidebar{width:250px;
        border-top-right-radius:2% ;}
            .ttr-logo .ttr-logo-desktop{
                padding:10% 15%;
            }
            button.btn.dropdown-toggle.btn-default:hover{color:black!important;
}
.ttr-notify-header::after, .widget-bg1, .ttr-search-bar, .ttr-header, .ovpr-dark:after, .pricingtable-main, .account-head:after {
    background: linear-gradient(45deg, #86b535 0%,#212529 100%);
}

.next-prev-btn{
    text-align: right!important;
}
@media (max-width: 768px) {
 
    .ttr-logo .ttr-logo-mobile {
        height: 60%!important;
        width: 100%!important;
    }
    .col-6 {
  
    flex: 0 0 100%;
    max-width: 100%;
}
}
        </style>
   
</head>
<body>
    
    <!-- header start -->
   
     

    
    <header class="ttr-header">
        <div class="ttr-header-wrapper">
            <!--sidebar menu toggler start -->
            <div class="ttr-toggle-sidebar ttr-material-button">
                <i class="ti-close ttr-open-icon"></i>
                <i class="ti-menu ttr-close-icon"></i>
            </div>
            <!--sidebar menu toggler end -->
            <!--logo start -->
            <div class="ttr-logo-box">
                <div>
                    <a href="../index.php" class="ttr-logo">
                        <img class="ttr-logo-mobile" alt="" src="../lg-removebg.png" width="30" height="20">
                        <img class="ttr-logo-desktop" alt="" src="../lg-removebg.png" width="160" height="20">
                    </a>
                </div>
            </div>
            <!--logo end -->
            <div class="ttr-header-menu">
                <!-- header left menu start -->
                <ul class="ttr-header-navigation">
                    <li>
                        <a href="../index.php" class="ttr-material-button ttr-submenu-toggle">HOME</a>
                    </li>
                   
                </ul>
                <!-- header left menu end -->
            </div>
            <div class="ttr-header-right ttr-with-seperator">
                <!-- header right menu start -->
                <ul class="ttr-header-navigation">
                    <li>
                        <a href="#" class="ttr-material-button ttr-search-toggle"><i class="fa fa-search"></i></a>
                    </li>
                    <li>
                        <a href="#" class="ttr-material-button ttr-submenu-toggle"><i class="fa fa-bell"></i></a>
                        <div class="ttr-header-submenu noti-menu">
                            <div class="ttr-notify-header">
                                <span class="ttr-notify-text-top"> 
                                    <?php
                                //    include "../partials/db_con.php";
                                //  $getpending_bank_slip_status = mysqli_query($con, 'SELECT * FROM `stu_bank_slip` WHERE sb_status="pending"');
                                //  echo mysqli_num_rows( $getpending_bank_slip_status );

                                ?> 
                                New</span>
                                <span class="ttr-notify-text"> Notification</span>
                            </div>
                            <!-- <div class="noti-box-list">
                                <ul>
                                   
                                </ul>
                            </div> -->
                        </div>
                    </li>
                    <li title="<?php  
                    // echo $_SESSION["name"];?>">
                        <a href="#" class="ttr-material-button ttr-submenu-toggle"><span class="ttr-user-avatar"><img alt="" src="../img/avatar2.jpg" width="32" height="32"></span></a>
                        <div class="ttr-header-submenu">
                            <ul>
                                <li><a ><?php  
                                echo $_SESSION["user_name"];?></a></li>
                                <!-- <li><a href="user-profile.php">Change Password</a></li> -->
                                <!-- <li><a href="mailbox.php">Messages</a></li> -->
                                <li><a href="../logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="ttr-hide-on-mobile">
                        <a href="#" class="ttr-material-button"><i class="ti-layout-grid3-alt"></i></a>
                        <div class="ttr-header-submenu ttr-extra-menu">
                            <a href="#">
                                <i class="fa fa-music"></i>
                                <span>Musics</span>
                            </a>
                            <a href="#">
                                <i class="fa fa-youtube-play"></i>
                                <span>Videos</span>
                            </a>
                            <a href="#">
                                <i class="fa fa-envelope"></i>
                                <span>Emails</span>
                            </a>
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Reports</span>
                            </a>
                            <a href="#">
                                <i class="fa fa-smile-o"></i>
                                <span>Persons</span>
                            </a>
                            <a href="#">
                                <i class="fa fa-picture-o"></i>
                                <span>Pictures</span>
                            </a>
                        </div>
                    </li>
                </ul>
                <!-- header right menu end -->
            </div>
            <!--header search panel start -->
            <div class="ttr-search-bar">
                <form class="ttr-search-form">
                    <div class="ttr-search-input-wrapper">
                        <input type="text" name="qq" placeholder="search something..." class="ttr-search-input">
                        <button type="submit" name="search" class="ttr-search-submit"><i class="ti-arrow-right"></i></button>
                    </div>
                    <span class="ttr-search-close ttr-search-toggle">
						<i class="ti-close"></i>
					</span>
                </form>
            </div>
            <!--header search panel end -->
        </div>
    </header>
</body>
</html>