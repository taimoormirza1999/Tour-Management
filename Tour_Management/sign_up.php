<?php
include_once('assets/tour_db_con.php');
$msg = "";
$newmsg = "";
// $msgClass = "";
session_start();
// echo $_SESSION['user_name'];
if (isset($_POST['submit'])) {
	$uname = $_POST['uname'];
	$email = $_POST['email'];
	$mobilenumber = $_POST['mobilenumber'];

	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];

	// check empty inputs
	if (isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['mobilenumber'])  && isset($_POST['password']) && isset($_POST['cpassword'])) {
		// check username length
		if (strlen($uname) < 1 && strlen($uname) < 9) {
			$msg = "Company name length must be between 5 and 8 characters!";
		}
		// check m_number length
		else if (strlen($mobilenumber) != 11) {
			$msg = "Invalid Mobile Number! ";
		}
		// check password length
		else if (strlen($password) < 8 && strlen($password) < 15) {
			$msg = "Password length must be between 8 and 15 characters!";
		}
		// check password and confirm password
		else if ($password != $cpassword) {
			$msg = "Password and Confirm Password does not matched!";
		} else {
			// checking existing user
			$match_query = "SELECT * FROM `t_user` WHERE `user_name`='$uname' or `user_email`='$email' or  `m_number`= '$mobilenumber'";
			$result_match_query = mysqli_query($con, $match_query);
			// existing user exist
			if (mysqli_num_rows($result_match_query) > 0) {
				$msg = "Sorry, This  account is already exists!";
			} else {
				// existing user does exist
				$query = "INSERT INTO `t_user`(`user_name`, `password`, `m_number`, `user_email`) VALUES('$uname',
	'$password',
	'$mobilenumber',
	'$email'
	
	)";
				if (mysqli_query($con, $query)) {
					$newmsg = "Done";
					header("location: login.php");
				}
			}
		}
	} else {
		$newmsg = "Error Occured!";
	}
} //button clicked



?>
<!DOCTYPE html>
<html>


<!-- Mirrored from www.einfosoft.com/templates/admin/spice/source/sign_up.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Feb 2022 06:12:29 GMT -->



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
		<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
		<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
		<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
		<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
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

<body>
<div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100" style="position:relative">
			<?php  if ($msg){?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="position:absolute;width:80%;">
  <strong>
	  <?php  echo "$msg"?>
</strong>
  
</div>
<?php  } ?>
				<form class="login100-form validate-form" method="POST" autocomplete="off" action="<?php $_SERVER['PHP_SELF']; ?>">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-flower"></i>
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Registration
					</span>

					<div class="row">
						<div class="col-lg-6 p-t-20">
							<div class="wrap-input100 validate-input" data-validate="Enter username">
								<input class="input100" type="text" name="uname" value="<?php echo isset($_POST['uname']) ? $uname : ''; ?>" placeholder="Company Name">
								<span class="focus-input100" data-placeholder="&#xf293;"></span>
							</div>
						</div>
						<div class="col-lg-6 p-t-20">
							<div class="wrap-input100 validate-input" data-validate="Enter email">
								<input class="input100" type="email" name="email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>" placeholder="Email">
								<span class="focus-input100" data-placeholder="&#xf207;"></span>
							</div>
						</div>
						<div class="col-lg-6 p-t-20">
							<div class="wrap-input100 validate-input" data-validate="Enter Mobile Number">
								<input class="input100" type="number" name="mobilenumber" value="<?php echo isset($_POST['mobilenumber']) ? $mobilenumber : ''; ?>" placeholder="number" style="">
								<span class="focus-input100" data-placeholder="&#xf2b4;"></span>
							</div>
						</div>
					
						<div class="col-lg-6 p-t-20">
							<div class="wrap-input100 validate-input" data-validate="Enter password">
								<input class="input100" type="password" name="password" value="<?php echo isset($_POST['password']) ? $password : ''; ?>" placeholder="Password">
								<span class="focus-input100" data-placeholder="&#xf191;"></span>
							</div>
						</div>
						<div class="col-lg-6 p-t-20">
							<div class="wrap-input100 validate-input" data-validate="Enter password again">
								<input class="input100" type="password" name="cpassword" value="<?php echo isset($_POST['cpassword']) ? $cpassword : ''; ?>" placeholder="Confirm password">
								<span class="focus-input100" data-placeholder="&#xf191;"></span>
							</div>
						</div>

					</div>

					<div class="container-login100-form-btn mt-1">
						<button class="login100-form-btn" name="submit" style="background-color:green">
							Sign Up
						</button>
					</div>
					<div class="text-center pt-3">
						<a class="txt1" href="login.php">
							Already have Account? Login here!
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- start js include path -->
	<script src="assets/plugins/jquery/jquery.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/pages/extra_pages/login.js"></script>
	<!-- end js include path -->
</body>


<!-- Mirrored from www.einfosoft.com/templates/admin/spice/source/sign_up.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Feb 2022 06:12:29 GMT -->

</html>