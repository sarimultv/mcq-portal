<?php
session_start();

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'mcqport');

$name =$_POST['user'];
$desi =$_POST['designation'];
$pass =$_POST['password'];

if($desi=='student'){
	$s="select * from usertable where name='$name' && password='$pass'";
}elseif ($desi=='professor') {
	$s="select * from proftable where name='$name' && password='$pass'";
}


$result= mysqli_query($con,$s);
$num=mysqli_num_rows($result);


if($num==1){
    $_SESSION['username']=$name;
    $_SESSION['designation']=$desi;

    header('location:home.php');
}else{
header('location:login.php');
}
$_SESSION['designation']=$desi;
?>