<?php
session_start();
include "../assets/tour_db_con.php";
$d_message = "";
$success = false;

if (isset($_POST['add_ads']) && isset($_FILES['c_img'])) {
    $ads_name = mysqli_escape_string($con, $_POST['c_name']);
    $ads_desc = mysqli_escape_string($con, $_POST['c_desc']);

    $ads_img_name = 'Ads_' . uniqid() . '_' . $_FILES['c_img']['name'];

    // $ads_img_size = $_FILES['c_img']['size'];
    $ads_img_tmp_name = $_FILES['c_img']['tmp_name'];

    // $res=false;
    $path = "../Ads_img/" . $ads_img_name;
    $move_file = move_uploaded_file($ads_img_tmp_name, $path);
    $insert_q = "INSERT INTO `ads_compaign`(`ad_name`, `ad_img`, `ads_description`, `user_id`) VALUES ('$ads_name' ,'$ads_img_name','$ads_desc',26);";
    $res = mysqli_query($con, $insert_q);
    if (isset($_POST['add_ads'])) {
        $success = true;
        $d_message = "Ads Published Successfully !";
    } else {
        $d_message = "An error occured !";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../partials/favicon.png" required type="image/x-icon/png" />
    <style>
        .shadow_grey {
            box-shadow: 2px slid grey;
        }
    </style>

</head>

<body class="ttr-opened-sidebar ttr-pinned-sidebar ">
    <!-- header start -->
    <?php include 'admin_partials/header.php'; ?>
    <!-- header end -->
    <!--left sidebar start -->
    <?php include 'admin_partials/left-sidebar.php'; ?>
    <!-- left sidebar end -->
    <!-- Left sidebar menu end -->

    <!--Main container start -->
    <main class="ttr-wrapper">
        <div class="container-fluid">
            <?php
            if ($success == true && $res && isset($_POST['add_ads']) && $move_file && isset($_POST['c_name'])) {
                echo ' <div class="alert alert-success"  style="position:absolute;right:2.2%;">' . $d_message . ' </div>';
            } else if ($success == false &&  isset($_POST['add_ads']) && isset($_POST['c_name'])) {
                echo ' <div class="alert alert-danger" style="position:absolute;right:2.2%;">' . $d_message . ' </div>';
            }
            ?>
            <div class="db-breadcrumb">
                <h5 class="breadcrumb-title text-dark shadow-lg " style="background:transparent;">Booking Details</h5>

            </div>

            <div class="row">
                <!-- Your Profile Views Chart -->
                <div class="col-lg-12 ">
                    <!-- <div class="widget-box"> -->
                        <div id="remainingTime" name="remainingTime" class="text-light text-right  widget-bg1 "> </div>
                        <div class="widget-inner">
                            <?php
                            $userid = $_SESSION['user_id'];
                            $fetch = "SELECT h.hotel_name,b.* FROM `booking` b inner join `hotel` h on b.hotel_id=h.hotel_id WHERE b.user_id=".$userid." AND booking_status ='booked'";
                            $res = mysqli_query($con, $fetch);
                            $booking_id = "";
                            $number_of_rooms = "";
                            $number_of_person = "";
                            $hotel_name = "";
                            $booking_status = "";
                            $check_in_date = "";
                            $check_out_date = "";
                            if (mysqli_num_rows($res) > 0) {
                                $row = mysqli_fetch_assoc($res);
                                $booking_id = $row['booking_id'];
                                $number_of_rooms = $row['no_of_rooms'];
                                $number_of_person = $row['no__of_person'];

                                $hotel_name = $row['hotel_name'];
                                $booking_status = $row['booking_status'];
                                $check_in_date = $row['check_in_date'];
                                $check_out_date = $row['check_out_date'];
                            ?>
                                <div class="row" style="display:flex;justify-content: center;">
                                    <div class="col-md-7 col-lg-7 col-xl-7 col-sm-7 col-12 ">
                                        <div class="widget-card widget-bg1 shadow-lg">
                                            <div class="wc-item">
                                                <img class="img-responsive shadow-lg" style="height: 250px;width: 100%;padding:2%;border-radius:15px;" src="../img/room_photo/roomdetails_1.jfif" alt="">
                                               

                                                <!-- row start -->
                                                <div class="row">
                                                 <div class="col-md-6 col-12">
                                                 <div class="col-12"> <span class="text-light mt-1">
                                                            <strong class="" style="font-size:14px"> Booking Number</strong>
                                                        </span></div>
                                                    <div class="col-12"> <span class="wc-des mt-1 lead " style="text-align:justify; width:100%;">
                                                            <?php echo 'lei'.$booking_id; ?>
                                                        </span></div>
                                                 </div>

                                                 <div class="col-md-6 col-12">
                                                 <div class="col-12"> <span class="text-light mt-1">
                                                        <strong class="" style="font-size:14px"> Hotel</strong>
                                                    </span></div>
                                                <div class="col-12"> <span class="wc-des mt-1 lead " style="text-align:center; width:100%;">
                                                        <?php echo $hotel_name; ?>
                                                    </span></div>
                                                 </div>
                                                </div>
                                                <!-- row -->


                                                <!-- row start -->
                                                <div class="row">
                                                 <div class="col-md-6 col-12">
                                                 <div class="col-12"> <span class="text-light mt-1">
                                                            <strong class="" style="font-size:14px"> Rooms Booked</strong>
                                                        </span></div>
                                                    <div class="col-12"> <span class="wc-des mt-1 lead " style="text-align:justify; width:100%;">
                                                            <?php echo $number_of_rooms; ?>
                                                        </span></div>
                                                 </div>

                                                 <div class="col-md-6 col-12">
                                                 <div class="col-12"> <span class="text-light mt-1">
                                                        <strong class="" style="font-size:14px"> Number of Persons</strong>
                                                    </span></div>
                                                <div class="col-12"> <span class="wc-des mt-1 lead " style="text-align:center; width:100%;">
                                                        <?php echo $number_of_person; ?>
                                                    </span></div>
                                                 </div>
                                                </div>
                                                <!-- row -->
                                                <!-- row start -->
                                                <div class="row">
                                                 <div class="col-md-6 col-12">
                                                 <div class="col-12"> <span class="text-light mt-1">
                                                            <strong class="" style="font-size:14px">Booking Entry Date:</strong>
                                                        </span></div>
                                                    <div class="col-12"> <span class="wc-des mt-1 lead " style="text-align:justify; width:100%;">
                                                            <?php echo $check_in_date; ?>
                                                        </span></div>
                                                 </div>

                                                 <div class="col-md-6 col-12">
                                                 <div class="col-12"> <span class="text-light mt-1">
                                                        <strong class="" style="font-size:14px"> Booking Expired Date:</strong>
                                                    </span></div>
                                                <div class="col-12"> <span class="wc-des mt-1 lead " style="text-align:center; width:100%;">
                                                        <?php echo $check_out_date; ?>
                                                    </span></div>
                                                 </div>
                                                </div>
                                                <!-- row -->
                                             
                                            </div>

                                        </div>
                                    </div>

                                </div>
                        </div>

                    <?php

}else{
    ?>
    <div class="row bg-light shadow-lg" style="border-radius:7px;padding:4%;">
    <div name="remainingTime" class=" col-md-6 col-12  ">No Booking is registered! </div>
    <div  name="remainingTime" class="col-md-6 col-12  text-right text-muted"><a href="../index.php">Add New Booking</a> </div>
    </div>
                                <?php
                                
                            } ?>

                    </div>
                </div>
            </div>
            <!-- Your Profile Views Chart END-->
        </div>
        <!-- </div> -->
    </main>
    <div class="ttr-overlay"></div>

    <!-- External JavaScripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/vendors/bootstrap/js/popper.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
    <script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
    <script src="assets/vendors/counter/waypoints-min.js"></script>
    <script src="assets/vendors/counter/counterup.min.js"></script>
    <script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
    <script src="assets/vendors/masonry/masonry.js"></script>
    <script src="assets/vendors/masonry/filter.js"></script>
    <script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
    <script src='assets/vendors/scroll/scrollbar.min.js'></script>
    <script src="assets/js/functions.js"></script>
    <script src="assets/vendors/chart/chart.min.js"></script>
    <script src="assets/js/admin.js"></script>

    <script>
        $(document).ready(function() {

            var count = 0;

            function Timer(duration, display) {
                var timer = duration,
                    hours, minutes, seconds;
                setInterval(function() {
                    hours = parseInt((timer / 3600) % 24, 10)
                    minutes = parseInt((timer / 60) % 60, 10)
                    seconds = parseInt(timer % 60, 10);

                    hours = hours < 10 ? "0" + hours : hours;
                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;
                    if (seconds >= 0 && count == 0) {
                        display.text(hours + ":" + minutes + ":" + seconds);
                        --timer;

                    } else {
                        count++;
                        // alert("ends at"+count + " times count");
                        if (count == 1) {
                            alert(count + " times count");
                            $.post("../booking.php", {
                                    acton: 'Booking',
                                    check_in: 'Tan',
                                    check_out: 'Tan',
                                    adults: 2,
                                    children: 2,
                                    room_type: 2
                                },
                                function(data, status) {
                                    alert("Data: " + data + "\nStatus: " + status);
                                    // $('#submit-booking').text('Your booking has been confirmed.');
                                });
                        }
                    } //else

                }, 1000);
            }

            $('#count_submit').click(function(e) {
                e.preventDefault();
                // alert("Helo");
                var twentyFourHours = 3;
                var display = $('#remainingTime');

                Timer(twentyFourHours, display);
            });


        });
    </script>
</body>



</html>