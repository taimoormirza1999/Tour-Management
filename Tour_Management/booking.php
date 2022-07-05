<?php
session_start();

// echo var_dump( $check_in); 
// echo $check_in; 


// echo "<pre>";
// print_r($check_in_arr);
// echo 'Want: '.'2022/03/28 <br>';
if(!isset($_SESSION['user_name'])){
	echo "Please Login to your account first!";
}
else if (isset($_SESSION['user_name']) && isset($_POST['acton']) && $_POST['acton']=='Booking'){
$check_in     = $_POST['check_in'];
$check_out    = $_POST['check_out'];
$person    = $_POST['adults'];
$rooms   = $_POST['children'];
$selected_hotel = $_POST['room_type'];

include_once('assets/tour_db_con.php');
$check_in_arr=explode("/",$check_in);
$new_check_in=$check_in_arr[2].'/'.$check_in_arr[0].'/'.$check_in_arr[1];
$check_out_arr=explode("/",$check_out);
$new_check_out=$check_out_arr[2].'/'.$check_out_arr[0].'/'.$check_out_arr[1];
// echo '****************************************************************' ;
// echo 'GET: check_in'.$new_check_in;
// echo 'GET: check_out'.$new_check_out;
// $query1 = "INSERT INTO `t_user`(`user_name`, `user_email`) VALUES ('$name_booking','$email_booking','$selected_hotel');";
// $result_query1 = mysqli_query($con,$query1);

$user_id=$_SESSION['user_id'];
$query = "INSERT INTO `booking`(`no_of_rooms`, `no__of_person`, `hotel_id`, `user_id`, `check_in_date`, `check_out_date`, `book_24_hours`, `booking_status`) VALUES('$rooms','$person','$selected_hotel','$user_id','$new_check_in','$new_check_out','no','booked')";
$result_query = mysqli_query($con,$query);

if(!($result_query)){
	echo "Failed to insert";
}else {
	echo "Your Booking has been successfully confirmed!";
}


}//booing if
?>