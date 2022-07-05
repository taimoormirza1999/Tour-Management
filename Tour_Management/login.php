<?php
include_once('assets/tour_db_con.php');
// for 24 hours
$fetch_booking_details = "SELECT b.check_in_date,b.booking_id,b.user_id,u.user_name FROM `booking` b inner join t_user u on b.user_id=u.user_id WHERE check_out_date='0' AND book_24_hours='yes' AND booking_status ='booked'";
$res_fetch_booking_details = mysqli_query($con, $fetch_booking_details);

$fetch_check_in_date = "";
$fetch_booking_id = "";
$fetch_booked_user_name = "";
if ((mysqli_num_rows($res_fetch_booking_details) > 0) ){
  
    while ($row = mysqli_fetch_assoc($res_fetch_booking_details)) {
        $fetch_check_in_date = $row['check_in_date'];
        $fetch_booked_user_name = $row['user_name'];
        $fetch_booking_id = $row['booking_id'];
        $date1 = date_create($fetch_check_in_date);
        $date2 = date_create(date("Y/m/d", strtotime("now")));
        $diff = date_diff($date2, $date1);
        $c = $diff->format("%R%a");
        // echo $c;
        if ($c == "-1") {
            // echo "Your Booking is expired." . $fetch_booked_user_name . "<br>";
            $update_booking_status = "UPDATE `booking` SET `booking_status`='expired' WHERE booking_id=" . $fetch_booking_id;
            $res_update_booking_status = mysqli_query($con, $update_booking_status);
        } else if ($c == "+0") {
            $e = $c[1] + 1;
            // echo "Your Booking is expired in after " . $e . "  day " . $fetch_booked_user_name . "<br>";
        } else {
            $j = $c[1] + 1;
            // echo "Your Booking is expired in after " . $j . "  days " . $fetch_booked_user_name . "<br>";
        }
    }
}//if

?>
<!-- Login Page Working  -->
<?php

session_start();
$msg="";$roomnumber="";
$newmsg="";
// echo $_SESSION['user_id'];

if(isset($_POST['submit'])){
	$uname = isset($_POST['uname']) ? $_POST['uname'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';


	$query="SELECT `user_name`,`password`,`user_id` FROM `t_user` WHERE `user_email`='$uname' AND `password`='$password'";
	$query_result =mysqli_query($con,$query);
	if(mysqli_num_rows($query_result)>0){
		$result=mysqli_fetch_assoc($query_result);
		$_SESSION['user_name'] =$result['user_name'];
		$_SESSION['user_id'] =$result['user_id'];
		// echo $result['user_id'];
	
		header("location: index.php");
		// echo $result['uname'];
			}else{
				$msg="Invalid Username and Password.";
			}
	}
	else{
	
	}

 ?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="farm activities, itineraries, farm holidays, country holidays, bed and breakfast, hotel, country hotel" />
    <meta name="description" content="Country Holidays - Premium site template for a country accommodation.">
    <meta name="author" content="Ansonika">
    <title>Leisure Inn</title>
	
	<!-- icons -->
	<!-- <link href="Login_front-end/font-awesome.min.css" rel="stylesheet" type="text/css" /> -->
	<link rel="stylesheet" href="Login_front-end/Material_design/css/material-design-iconic-font.min.css">
	<!-- bootstrap -->
	<link href="Login_front-end/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- style -->
	<link rel="stylesheet" href="Login_front-end/extra_pages.css">
  <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

	<style>

.page-background {
    background-image: url('bg_1.jpg')!important;
}
.container-login100::before {background-color: rgb(255 255 255 / 40%);}
.wrap-login100 {background: -webkit-linear-gradient(top, rgb(0 0 0 / 90%), #b3d7ff);

	width: 474px;
    border-radius: 5%;
    padding: 34px 55px 34px 55px;}
	.txt2{
		font-weight: 600;
		font-style: italic;
		/* text-decoration: underline; */
		transition:1.2s ease-in-out;
	}
	.underline{
		text-decoration: underline;
	}
	</style>
</head>

<body>
	<div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100" style="position:relative">
			<?php  if ($msg){?>
            <div class="alert alert-danger alert-dismissible fade show " role="alert" style="position:absolute;width:80%;">
  <strong>
	  <?php  echo "$msg"?>
</strong>
  
</div>
<?php  } ?>
				<form class="login100-form validate-form" method="POST"autocomplete="off"  action="<?php $_SERVER['PHP_SELF'];?>" >
					<span class="login100-form-logo">
						<i class="zmdi zmdi-flower"></i>
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="uname"  value="<?php echo isset($_POST['uname'])? $uname:'';?>" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password"  value="<?php echo isset($_POST['password'])? $password:'';?>" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="text-right pt-0">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit" value="Login">
							Login
						</button>
					</div>
					
					<div class="text-center pt-2">
						<a class="txt2" href="sign_up.php">
							<span class="txt1"> Don't have an account?</span> <span class="underline">Register now</span>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- start js include path -->
	<!-- <script src="../admin_db/spice/source/assets/plugins/jquery/jquery.min.js"></script> -->
	<!-- bootstrap -->
	<!-- <script src="../admin_db/spice/source/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="../admin_db/spice/source/assets/js/pages/extra_pages/login.js"></script> -->
	<!-- end js include path -->
</body>


<!-- Mirrored from www.einfosoft.com/templates/admin/spice/source/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Feb 2022 06:12:03 GMT -->
</html>
