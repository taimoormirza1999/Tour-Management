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
    $userid = $_SESSION['user_id'];
    $added_on = date("Y/m/d", strtotime("now"));
    $insert_q = "INSERT INTO `ads_compaign`(`ad_name`, `ad_img`, `ads_description`, `added_on`, `ad_status`, `user_id`) VALUES ('$ads_name' ,'$ads_img_name','$ads_desc','$added_on','working','$userid');";
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

        .ttr-wrapper{background:url('../img/roomlist-real-1.jpg');
        background-repeat: no-repeat;
    background-size:cover;}
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
                <h5 class="breadcrumb-title text-dark shadow-lg ">Ads Campaign</h5>

            </div>

            <div class="row">
                <!-- Your Profile Views Chart -->
                <div class="col-lg-12 ">

                    <div class="widget-inner ">
                        <?php
                        $userid = $_SESSION['user_id'];
                        $fetch = "SELECT a.*,u.user_name FROM `ads_compaign`a INNER JOIN t_user u on a.user_id=u.user_id where u.user_id=" . $userid . ' AND ad_status="working"';
                        $res = mysqli_query($con, $fetch);
                        $add_title = "";
                        $add_img = "";
                        $add_desc = "";
                        if (mysqli_num_rows($res) > 0) {
                            $row = mysqli_fetch_assoc($res);
                            //   echo $row['user_name'];
                            $add_title = $row['ad_name'];
                            $add_img = $row['ad_img'];
                            $add_desc = $row['ads_description'];
                        ?>
                            <div class="row " style="display:flex;justify-content: center; ">
                                <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6 col-12 ">
                                    <div class="widget-card widget-bg1 shadow-lg">
                                        <div class="wc-item">
                                            <img class="img-responsive " style="height: 200px;width: 100%;padding:2%;border-radius:10px;" src="../Ads_img/<?php echo $add_img; ?>" alt="">
                                            <div class="col-6"> <span class="text-light mt-1">
                                                    <strong class="" style="font-size:14px"> <?php echo "Title"; ?></strong>
                                                </span></div>
                                            <div class="col-6"> <span class="wc-des mt-1">
                                                    <?php echo $add_title; ?>
                                                </span></div>
                                            <div class="col-6"> <span class="text-light mt-1">
                                                    <strong class="" style="font-size:14px"> <?php echo "Description"; ?></strong>
                                                </span></div>


                                            <div class="col-12"> <span class="wc-des mt-1 lead " style="text-align:justify; width:100%;">
                                                    <?php echo $add_desc; ?>
                                                </span></div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                    </div>

                <?php

                        } else {
                ?>
                    <form class="edit-profile " action="<?php echo $_SERVER['PHP_SELF'] ?>" autocomplete="off" method="post" enctype="multipart/form-data">
                        <div class="row col-12 col-md-11">
                            <div class="col-12">
                                <div class="ml-auto ">
                                    <h3 class="text-light" style="font-style: justify; text-transform:capitalize;">Run your ads for 24 hours</h3>
                                </div>
                            </div>
                            <div class="form-group col-6 shadow_grey">
                                <label class="col-form-label text-light">Ads title</label>
                                <div class="shadow">
                                    <input class="form-control" name="c_name" required type="text">
                                </div>
                            </div>


                            <div class="form-group col-6">
                                <label class="col-form-label text-light">Upload Ads Imge</label>
                                <div class="shadow">
                                    <input class="form-control" name="c_img" required type="file" value="">
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <label class="col-form-label text-light">Ads description</label>
                                <div class="shadow">
                                    <textarea class="form-control" name="c_desc"></textarea>
                                </div>
                            </div>

                            <div class="col-12 my-3 shadow-lg">
                                <button type="submit" id="count_submit" name="add_ads" class="text-light btn-secondry widget-bg1 add-item m-r5"><i class="fa fa-fw fa-plus-circle"></i>
                                    Publish Ads</button>
                            </div>

                        </div>

                    <?php } ?>
                </div>

            </div>
            <!-- Your Profile Views Chart END-->
        </div>
        </div>
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

            
            // $('#count_submit').click(function(e) {
               
            // });


        });
    </script>
</body>



</html>