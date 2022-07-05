<?php include('header.php'); ?>

<div id="booking_container">
    <div class="container">
        <div class="row">

            <div class="col-md-8">

                <div class="intro_title_booking">
                    <h1 class="animated fadeInDown">Leisure Inn</h1>
                    <p class="animated fadeInDown">Accommodation and Country Holidays</p>
                    <a href="#" class="animated fadeInUp button_intro hidden-xs">View Rooms</a>
                    <a href="#" class="animated fadeInUp button_intro outline hidden-xs">Activities</a>
                </div>

            </div>
            <?php include('assets/tour_db_con.php');


// for check_in_date and check_out_date data details
$fetch_booking_details_2 = "SELECT b.check_in_date,b.check_out_date,b.booking_id,b.user_id,u.user_name FROM `booking` b inner join t_user u on b.user_id=u.user_id WHERE check_out_date!='0' AND book_24_hours!='yes' AND booking_status ='booked'";
$res_fetch_booking_details_2 = mysqli_query($con, $fetch_booking_details_2);
if ((mysqli_num_rows($res_fetch_booking_details_2) > 0) ){
  
    while ($row = mysqli_fetch_assoc($res_fetch_booking_details_2)) {
        // $fetch_check_in_date_2 = $row['check_in_date'];
        $fetch_check_out_date_2 = $row['check_out_date'];
        $fetch_booked_user_name_2 = $row['user_name'];
        $fetch_booking_id_2 = $row['booking_id'];
        $date_1_2 = date_create(date("Y/m/d", strtotime("now")));
        $date_2_2 = date_create($fetch_check_out_date_2);
        $diff_2 = date_diff($date_1_2, $date_2_2);
        $c = $diff_2->format("%R%a");
        // echo $c;
        if ($c == "-1") {
            // echo "Your Booking is expired." . $fetch_booked_user_name_2 . "<br>";
            $update_booking_status_2 = "UPDATE `booking` SET `booking_status`='expired' WHERE booking_id=" . $fetch_booking_id_2;
            $res_update_booking_status_2 = mysqli_query($con, $update_booking_status_2);
        } else if ($c == "+0") {
            $e = $c[1] + 1;
            // echo "Your Booking is expired in after " . $e . "  day " . $fetch_booked_user_name_2 . "<br>";
        } else {
            $j = $c[1] + 1;
            // echo "Your Booking is expired in after " . $j . "  days " . $fetch_booked_user_name_2 . "<br>";
        }
    }
}//if
// ------------------------------------------

            
            if (isset($_SESSION['user_name'])){
                $fetch_booking_details = "SELECT u.user_id as 'user_ids',u.user_name,b.check_in_date,b.check_out_date,b.book_24_hours,b.user_id,b.booking_status FROM `booking` b RIGHT JOIN t_user u on b.user_id=u.user_id WHERE u.user_id=" . $_SESSION['user_id']." AND b.booking_status='booked'";
                $res_fetch_booking_details = mysqli_query($con, $fetch_booking_details);
            }
                if (isset($_SESSION['user_name']) && mysqli_num_rows($res_fetch_booking_details) > 0) {
                    $row = mysqli_fetch_assoc($res_fetch_booking_details);
                    $fetch_check_out_date_2 = $row['check_out_date'];
                    if($fetch_check_out_date_2!='0'){
                    $date_1_2 = date_create(date("Y/m/d", strtotime("now")));
                    $date_2_2 = date_create($fetch_check_out_date_2);
                    $diff_2 = date_diff($date_1_2, $date_2_2);
                    $c = $diff_2->format("%R%a");
                    // echo $c;
                    if ($c == "-1") {
                        echo "<h1 class='animated fadeInDown text-light'style='color:white;text-transform:capitalize'>Your last Booking is expired.</h1><br>";
                    } else if ($c == "+0") {
                        $e = $c[1] + 1;
                        echo "<h1 class='animated fadeInDown text-light'style='color:white;text-transform:capitalize'>Your Booking is expired .in after " . $e . "  day </h1><br>";
                    } else {
                        $j = $c[1] + 1;
                        echo "<h3 class='animated fadeInDown ' style='color:white;text-transform:capitalize'>Booking Expire Within " . $j . "  Days </h3><br>";
                    }//else
                }//outer if
             
             }//outer 2 ifs
            
            
                    // echo "Your Booking Expired in ";
                 else {
                    // echo "No";
            ?>
                <?php  if(!isset($_SESSION['user_name'])){echo '<div id="remainingTimek" name="remainingTime" class="text-light text-center" style="text-transform: capitalize;">Please Login to your account first! </div>';}

                ?>
                    <div class="col-md-4">
                        <div id="book">
                            <!-- <div id="res" style="margin-bottom:1.5%;font-weight:500"></div> -->
                            <div id="message-booking" style="margin-bottom:1.5%;font-weight:500"></div>
                            <form role="form" method="post" action="" id="check_avail" autocomplete="off">

                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label>Check in</label>
                                            <input class="date-pick form-control" type="text" id="check_in" name="check_in" placeholder="Check in" >
                                            <span class="input-icon"><i class=" icon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label>Check out</label>
                                            <input class="date-pick form-control" type="text" id="check_out" name="check_out" placeholder="Check out">
                                            <span class="input-icon"><i class=" icon-calendar"></i></span>
                                        </div>
                                    </div>
                                </div><!-- End row -->
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label>No Of Persons</label>
                                            <div class="qty-buttons">
                                                <input type="button" value="-" class="qtyminus" name="adults">
                                                <input type="text" name="adults" id="adults" value="" class="qty form-control" placeholder="0">
                                                <input type="button" value="+" class="qtyplus" name="adults">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label>No Of Rooms</label>
                                            <div class="qty-buttons">
                                                <input type="button" value="-" class="qtyminus" name="children">
                                                <input type="text" name="children" id="children" value="" class="qty form-control" placeholder="0">
                                                <input type="button" value="+" class="qtyplus" name="children">
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End row -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Select Hotel</label>
                                            <select class="form-control" name="room_type" id="room_type">
                                                <option value="">Select Any Hotel</option>
                                                <option value="1">Hunza Grand Hotel</option>
                                                <option value="2">Darwesh Hotel Hunza</option>
                                                <option value="3">Hotel Noor Nama Palace Hunza</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name_booking" id="name_booking" placeholder="Name and Last name">
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email_booking" id="email_booking" placeholder="Your email">
                                    </div>
                                </div> -->
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="submit" value="Book now" class="btn_full" id="submit-booking">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

            <?php }
             ?>
        </div><!-- End row -->
    </div><!-- End container -->
    <div id="general_decor"></div>
</div><!-- End Booking container -->

<!-- ADs -->
<!-- Set up your HTML -->
<br>
<br>
<div class="owl-carousel  ">

    <!-- // stop those ads with their date limit exceed. -->
    <?php
include('assets/tour_db_con.php');
$fetch_ads_details = "SELECT a.* FROM `ads_compaign`a WHERE ad_Status='working'";
$res_fetch_ads_details = mysqli_query($con, $fetch_ads_details);

if ((mysqli_num_rows($res_fetch_ads_details) > 0) ){
  
  while ($row = mysqli_fetch_assoc($res_fetch_ads_details)) {
        // $fetch_check_in_date_2 = $row['check_in_date'];
        $fetch_ad_start_date = $row['added_on'];
        $fetch_ads_id = $row['ad_id'];
        $ad_date_1 = date_create(date("Y/m/d", strtotime("now")));
        $ad_date_2 = date_create($fetch_ad_start_date);
        $diff_2 = date_diff($ad_date_1, $ad_date_2);
        $c = $diff_2->format("%R%a");
     if ($c == "-1") {
            echo "Your Booking is expired.<br>";
            $update_ads_status = "UPDATE `ads_compaign` SET `ad_status`='stop' WHERE ad_id=" . $fetch_ads_id;
            $res_update_ads_status = mysqli_query($con, $update_ads_status);
          } else if ($c == "+0") {
            $e = $c[1] + 1;
            ?>
            <div class=" text-center">
                <p>
                    <a href="#"><img src="Ads_img/<?php echo $row['ad_img']; ?>" alt="Pic" class="img-responsive styled" style="height:200px;"></a>
                </p>
                <h4><?php echo $row['ad_name']; ?></h4>
                <p>
                    <?php echo $row['ads_description']; ?>
                </p>
            </div>
            <?php
            // echo "Your Booking is expired in after " . $e . "  day <br>";
        } 
    }}
?>



</div>

<div class="container margin_60 padd_bottom_20">
    <div class="main_title">
        <span></span>
        <h2>We love Country Holidays</h2>
        <p class="mt-5">
            Accommodation coupled with a cozy yet lavish Winterfell Restaurant with Countryside Activities.
        </p>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="box_home">
                <i class="icon_set_2_icon-104"></i>
                <h3>Cozy and Charming rooms</h3>
                <p>
                    Every room is designed prioritizing Comfort & Luxury in mind. Our cozy rooms equipped with all the modern facilities will give you the feel of the warm hospitality which we provide.
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box_home">
                <i class="icon_set_2_icon-108"></i>
                <h3>Relax in a beautiful contest</h3>
                <p>
                    Away from the hustle of the crowd, Leisure Inn is situated in the peaceful area, where you can relax and enjoy your time without worrying about the rush of the city.
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box_home">
                <i class="icon_set_1_icon-40"></i>
                <h3>Enjoy country side activities</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                </p>
            </div>
        </div>
    </div><!-- End row -->
</div><!-- End container -->

<div class="bg_gray add_bottom_60">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="img_zoom">
                    <a href="room_details.html"><img src="img/singleroom.jpg" alt="" class="img-responsive"></a>
                </div>
                <h3>Single Room <span class="price_home">PKR 10,000<em>Per night</em></span></h3>
                <p>
                    Single room has a queen size bed with a private external bathroom. A balcony with the view of our private garden is the cherry on top.
                </p>
                <p>
                    <a href="#" class="btn_1">Read more</a>
                </p>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="img_zoom">
                    <a href="room_details.html"><img src="img/double.jfif" alt="" class="img-responsive"></a>
                </div>
                <h3>Double Room <span class="price_home">PKR 15,000<em>Per night</em></span></h3>
                <p>
                    The Twin Room has a 2 single beds with a comfortable chairs and tables for private meetings. This room has a private entrance with a sweet little garden of its own.
                </p>
                <p>
                    <a href="#" class="btn_1">Read more</a>
                </p>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="img_zoom">
                    <a href="room_details.html"><img src="img/kingsize.jfif" alt="" class="img-responsive"></a>
                </div>
                <h3>King double Room <span class="price_home">PKR 18,000<em>Per night</em></span></h3>
                <p>
                    The King Double Room is an inter connecting accommodation featuring a living room & private balcony. Suite comes with a mini bar, tea/coffee maker and all modern amenities.
                </p>
                <p>
                    <a href="#" class="btn_1">Read more</a>
                </p>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
</div>

<div class="container add_bottom_60">
    <div class="main_title add_bottom_45">
        <span></span>
        <h2>Other stuff you may consider</h2>
        <p>
            We have alot to surprise you with!
        </p>
    </div>
    <div class="row">
        <div class="col-md-8" id="strip_activities">
            <ul>
                <li>
                    <img src="img/Horse-Riding-real-1.png" width="125" height="125" alt="" class="img-circle styled">
                    <h4>Take a ride on a Horse</h4>
                    <p>
                        Gilgit is one of the most popular destinations to enjoy adventure sports in Pakistan. Gilgit Baltistan is famous for safaris. Horse riding is the most exciting activity. Horse riding is used as vehicle services everywhere.
                </li>
                <li><img src="img/Pakistani_Food_Karahi_Beef.jpg" width="125" height="125" alt="" class="img-circle styled">
                    <h4>Discover typical Food </h4>
                    <p>
                        Discover delicious typical food consists of a series of selective food and drink intake practiced by the people of northern Pakistan that is argued by some to be unique and have long lasting effects.. </p>
                </li>
                <li><img src="img/food-real-2.jpg" width="125" height="125" alt="" class="img-circle styled">
                    <h4>Learn to cook delicious food</h4>
                    <p>
                        Knowing how to cook is a one of the most useful skills we can learn. If we can cook, we can eat healthy and delicious dishes with fresh ingredients instead of having to buy unhealthy fast food or expensive pre-cooked or frozen meals. Cooking our own meals is not only healthy and cheap, but it can also be fun. </p>
                </li>
                <li><img src="img/farmactivities.jpg" width="125" height="125" alt="" class="img-circle styled">
                    <h4>Farm activities</h4>
                    <p>
                        A farm holiday eases your stress, and brings with it infectious laughter. You don’t need a yoga instructor to give your family a break from the hustle and bustle of everyday life. Bring the kids along to one of most welcoming visitor farms, the whole family is sure to have a wonderful time! </p>
                </li>
            </ul>
        </div>
        <div class="col-md-4">
            <div class="box_style_1 text-center">
                <p><img src="img/icon-confirmed-2.jfif" height="100" width="300" alt=""></p>
                <p>
                    Located in Rahwali Cannt, Gujranwala. <br>
                    A restaurant, Medi Spa and laundry facilities are available at this hotel.
                    Free WI-Fi in public areas and free self-parking are also provided. Additionally, car service, city tour, a computer station, and free newspapers are on-site.
                </p>

            </div><!-- End box_style_1 -->

            <a class="box_style_1 weahter" href="about.html">
                <i class="icon-light-up"></i> View Weahter forecast </a>
            <!-- End  weather-->

            <div id="banner">
                <h3><span>-30% OFF</span>This week only for all rooms!</h3>
            </div><!-- End banner -->

        </div>
    </div><!-- End row -->
</div><!-- End container -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 nopadding">
            <div class="features-bg">
                <div class="features-img">
                    <img src="img/countryside2.jpg" height="400" width="800">
                </div>
            </div>
        </div>
        <div class="col-md-6 nopadding">
            <div class="features-content">
                <h3>"Enjoy spectacular countryside"</h3>
                <p>
                    A place like no other, Leisure Inn never fails to amaze its guests with its perfect ambience and coziness. Visit us and witness our warm hospitality.
                    <br>
                    <b>Leisure Inn - Beyond Luxury</b>
                </p>
                <p>
                    <a href="#" class=" btn_1 white">Read more</a>
                </p>
            </div>
        </div>
    </div>
</div><!-- End container-fluid  -->

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-3">
                <h3>Contact Us</h3>
                <ul id="contact_details_footer">
                    <li>Rahwali Cantt Gujranwala<br>Pakistan</li>
                    <li><a href="tel://+92 324 567 88">+92 324 567 88 </a> / <a href="tel://+92 324 567 88">+92 324 567 88</a></li>
                    <li><a href="info@leisureinn.com">info@leisureinn.com</a></li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-2">
                <h3>About</h3>
                <ul>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Rooms</a></li>
                    <li><a href="#">Activities</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">Gallery</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3">
                <h3>Change language</h3>
                <ul>
                    <li><a href="#">English</a></li>
                    <li><a href="#">French</a></li>
                    <li><a href="#">Spanish</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3" id="newsletter">
                <h3>Newsletter</h3>
                <p>Join our newsletter to keep be informed about offers and news.</p>
                <div id="message-newsletter_2"></div>
                <form method="post" action="assets/newsletter.php" name="newsletter_2" id="newsletter_2">
                    <div class="form-group">
                        <input name="email_newsletter_2" id="email_newsletter_2" type="email" value="" placeholder="Your mail" class="form-control">
                    </div>
                    <input type="submit" value="Subscribe" class="btn_1 white" id="submit-newsletter_2">
                </form>
            </div>
        </div><!-- End row -->
        <div class="row">
            <div class="col-md-12">
                <div id="social_footer">
                    <ul>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-google"></i></a></li>
                        <li><a href="#"><i class="icon-instagram"></i></a></li>
                        <li><a href="#"><i class="icon-pinterest"></i></a></li>
                        <li><a href="#"><i class="icon-vimeo"></i></a></li>
                        <li><a href="#"><i class="icon-youtube-play"></i></a></li>
                    </ul>
                    <p>© Leisure Inn 2022</p>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
</footer><!-- End footer -->

<div id="toTop"></div><!-- Back to top button -->

<!-- Common scripts -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="OwlCarousel/owl.carousel.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script>
<!-- <script src="assets/validate.js"></script> -->

<!-- Specific scripts -->
<script src="js/quantity-bt.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<!-- <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>  
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>  
   <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>  -->
<script>
    // $('#submit-booking').hover( function(){
    //     $(this).css("background-color", "yellow"), function(){
    //     $(this).css("background-color", "pink");}

    // });
 var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = mm + '/' + dd + '/' + yyyy;


    $('input.date-pick').datepicker();
    $('#check_in').click(function() {
        $('#check_in').datepicker('setDate', 'today');
    });
    $('#check_out').click(function() {
        $('#check_out').datepicker('setDate', 'today');
    });
    // $('input.date-pick').datepicker({ minDate: -7, maxDate: 1 });
    // $.datepicker.formatDate('dd-mm-yy', dateTypeVar);
    // $('input.date-pick').datepicker({
    //   maxDate: 2,
    //   minDate: -3
    //  });

    $('#message-booking').hide();
    
    $('#message-booking').css('color', 'rgb(253 233 94)');
    $('#remainingTime').css('color', 'rgb(253 233 94)');

    $('#check_in').click(function() {
        $('#message-booking').hide(1000);
    });
    $('#check_out').click(function() {
        $('#message-booking').hide(1000);
    });
    $('#adults').click(function() {
        $('#message-booking').hide(1000);
    });
    $('#children').click(function() {
        $('#message-booking').hide(1000);
    });
    $('#room_type').click(function() {
        $('#message-booking').hide(1000);
    });
    $('#name_booking').click(function() {
        $('#message-booking').hide(1000);
    });
    $('#email_booking').click(function() {
        $('#message-booking').hide(1000);
    });

    //  Submit  Click button
    $('#submit-booking').click(function(e) {
        e.preventDefault();
        'use strict';
        var check_in = $('#check_in').val();
        var check_out = $('#check_out').val();
        var persons = Number($('#adults').val());
        var rooms = Number($('#children').val());
        var selected_Hotel = $('#room_type').val();
        var name_booking = $('#name_booking').val();
        // var email_booking = $('#email_booking').val();
        // Check valid Email
        var validRegex = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$";
        // var previous_check_in="";
        // alert(check_in+" check_in: "+typeof(check_in));
// var todays =new Date()


var t_greater_check_in=today>check_in;
var t_greater_check_out=today>check_out;
        // Check Empty Inputs
        if (check_in === "") {
            $('#message-booking').text("Enter check in date");
            $('#message-booking').show(1000);

        }else if(t_greater_check_in){
            $('#message-booking').text("Check in date is invalid");
            $('#message-booking').show(1000);
        }
        else if (check_out === "") {
            $('#message-booking').text("Enter check out date");
            $('#message-booking').show(1000);
        }else if(t_greater_check_out){
            $('#message-booking').text("Check out date is invalid");
            $('#message-booking').show(1000);
        }
        
        else if (persons <= 0) {
            $('#message-booking').text("Enter number of person");
            $('#message-booking').show(1000);
        } else if (rooms <= 0) {
            $('#message-booking').text("Enter number of rooms");
            $('#message-booking').show(1000);

        } else if (selected_Hotel === "") {
            $('#message-booking').text("Please select listed hotel");
            $('#message-booking').show(1000);
        } else if (name_booking === "") {
            $('#message-booking').text("Enter your name");
            $('#message-booking').show(1000);
        } else if ((name_booking.length >= 0 && name_booking.length <= 5) || name_booking.length >= 16) {
            $('#message-booking').text("name character length must be between 5 and 16 characters");
            $('#message-booking').show(1000);
        }
        //  else if (email_booking === "") {
        //     $('#message-booking').text("Please enter your email address");
        //     $('#message-booking').show(1000);
        // } else if (email_booking.match(validRegex) == null) {
        //     $('#message-booking').text("Please enter valid email address");
        //     $('#message-booking').show(1000);
        // } 
        else {
            $('#submit-booking').attr('disabled', true);
            $('#submit-booking').css('opacity', '0.2');
            $('#submit-booking').text('Please Wait....');

            $.post("booking.php", {
                    acton: 'Booking',
                    check_in: $('#check_in').val(),
                    check_out: $('#check_out').val(),
                    adults: $('#adults').val(),
                    children: $('#children').val(),
                    room_type: $('#room_type').val(),
                    name_booking: $('#name_booking').val(),
                    email_booking: $('#email_booking').val()
                },
                function(data, status) {
                    $("#check_avail").trigger('reset');
                  location.href='index.php';
                    // alert("Data: " + data + "\nStatus: " + status);
                    $('#message-booking').text('Your booking has been confirmed.');
                });

        }
    });


    // owl Carousel
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 4,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true
    });
    $('.play').on('click', function() {
        owl.trigger('play.owl.autoplay', [1000])
    })
    $('.stop').on('click', function() {
        owl.trigger('stop.owl.autoplay')
    })
</script>

</body>

</html>