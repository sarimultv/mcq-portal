<?php
session_start();

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'mcqport');

$name =$_POST['user'];
$desi =$_POST['designation'];
$mail =$_POST['email'];
$pass =$_POST['password'];

if($desi=='student'){
	$s="select * from usertable where name='$name'";
}elseif ($desi=='professor') {
	$s="select * from proftable where name='$name'";
}


$result= mysqli_query($con,$s);

$num=mysqli_num_rows($result);

if($num==1){
    echo"User Already Exist";
    //<a href="login.php">Back to Login Page</a>
}elseif ($desi=='student'){
$reg="insert into usertable (name,designation,email,password) values ('$name','$desi','$mail','$pass')";
mysqli_query($con,$reg);
//echo "succ";
header('location:login.php');
}
elseif($desi=='professor') {
	$reg="insert into proftable (name,designation,email,password) values ('$name','$desi','$mail','$pass')";
	mysqli_query($con,$reg);
	//echo "succ";
	header('location:login.php');
}
?>