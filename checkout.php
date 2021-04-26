<?php
 $con=mysqli_connect('localhost','root','','socko');

 if(!isset($_SESSION))
{
session_start();
}
$user='';

if($_SESSION['username']){

$user=$_SESSION['username'];

}
else{
header("location:login.php");
}

if(isset($_POST['pay']))
{
    //echo "success";
    $mode=$_POST['mode'];
    $location=$_POST['location'];
    $home=$_POST['apartment'];
    $amount=$_POST['amount'];
    $transaction=$_POST['transaction'];
     $customer_id=$_POST['customer_id'];


   // $customer=$con->insert_id;

    $sql="INSERT INTO `location`(`location_name`,`location_house_name`, `location_customer_id`) 
             VALUES ('$location','$home','$customer_id')";

$result=mysqli_query($con,$sql);

if($result)
{
    $sql="INSERT INTO `payment`(`payment_amount`, `payment_ref`, `payment_mode`)
           VALUES ('$amount','$transaction','$mode')";

$result=mysqli_query($con,$sql);

if($result){
    echo "success";
    Print '<script>alert("Transaction completed successfully .");window.location.assign("index.php");</script>';
		
			exit();
            
}
else{
    echo "error";

    Print '<script>alert("oops! An error occured \n Please try again later..");window.location.assign("home_check.php");</script>';
		
			exit();
}

}

 }


?>