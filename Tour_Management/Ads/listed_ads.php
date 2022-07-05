<?php
include "../assets/tour_db_con.php";
$head = "Add new Ads";
$link = "add-ads.php";
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from educhamp.themetrades.com/demo/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:08:15 GMT -->
<!-- admin\admin_partials -->

<head>
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon/png" />
    <!-- fontawsome -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <style>
        .theader tr td,
        th {
            text-transform: capitalize;
        }
    </style>
</head>

<body class="ttr-opened-sidebar ttr-pinned-sidebar">
    <!-- header start -->
    <?php include 'admin_partials/header.php'; ?>
    <!-- header end -->

    <!--left sidebar start -->
    <?php include 'admin_partials/left-sidebar.php'; ?>

    <main class="ttr-wrapper">
        <div class="container-fluid">
            <div class="db-breadcrumb">
                <h4 class="breadcrumb-title"><a href="<?php echo $link; ?>"><?php echo " " . $head; ?> </a></h4>

            </div>
            <div class="row">
                <!-- Your Profile Views Chart -->
                <div class="col-lg-12 m-b30">
                    <div class="widget-box">

                        <div class="container">
                            <div class="row">
                                <h2 class="col-6 ">Manage Ads</h2>

                             
                            </div>
                            <div class="table-responsive">
                                <?php
                                if (isset($_GET['deleted'])) {
                                    echo '<div class=" alert alert-success ">Deleted Successfully</div>';
                                }
                                ?>
                                <table class="table table-bordered table-hover table-striped " style="width:100%">
                                    <thead>
                                        <tr class="theader widget-bg1">
                                            <th class="text-center text-light"  width="20%">#</th>
                                            <th class="text-center text-light"  width="20%">Ad title</th>
                                           
                                            <th class="text-center text-light" width="20%">Ad image</th>
                                            <th class="text-center text-light"  width="20%">Ad description</th>
                                            <th class="text-center text-light"  width="20%">Time Left</th>
                                            <!-- <th class="text-center text-light">Edit</th>
                                            <th class="text-center text-light">Delete</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $res1 = mysqli_query($con, 'SELECT * FROM `ads_compaign`');
                                        $count = 1;
                                        while ($row = mysqli_fetch_assoc($res1)) {
                                        ?>
                                            <tr>
                                                <td class="text-center customerIDCell" id="table_course_id"><?php echo $count; $count++;?></td>

                                                <td class="text-center"><?php echo $row['ad_name']; ?></td>
                                          
                                                <td class="text-center"><img class="img-responsive" style="height:67px;width:100%" title="<?php echo $row['ad_img']; ?>" src="../Ads_img/<?php echo $row['ad_img'];?>" alt=""></td>
                                                <td><?php echo substr($row['ads_description'], 0, 30) . "..."; ?></td>
                                                

                                            </tr>
                                        <?php
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
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
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>

<!-- Mirrored from educhamp.themetrades.com/demo/admin/mailbox.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:11:35 GMT -->

</html>