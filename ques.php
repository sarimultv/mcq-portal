<?php
session_start();

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'mcqport');

$ques =$_POST['ques'];
$op1 =$_POST['option1'];
$op2 =$_POST['option2'];
$op3 =$_POST['option3'];
$op4 =$_POST['option4'];

$ans =$_POST['ans'];

for($i=1;$i<10;$i++){
$fetchquery = "SELECT * FROM `answer` where ans_id=$i";
$data= mysqli_query($con, $fetchquery);

$row=mysqli_fetch_array($data);

while ($row<10){

	echo $row['aid'];
}}

//while($row=mysqli_fetch_array($data))
// $ansid=$ans+$row['aid'];
// echo $ansid;

// $s1="SELECT * FROM `ques`";
// $s2="SELECT * FROM `answer`";

// $result1= mysqli_query($con,$s1);
// $result2= mysqli_query($con,$s2);

// $num=mysqli_num_rows($result1);
// $num=mysqli_num_rows($result2);

// $reg1="INSERT INTO `ques`(`ques`, `ans_id`) VALUES ('$ques',$ansid)";

// $reg2="INSERT INTO `answer`(`ans`, `ans_id`) VALUES ('$op1')";
// mysqli_query($con,$reg);
// echo "succ";
?>