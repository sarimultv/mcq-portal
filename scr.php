<?php
session_start();

if(!isset($_SESSION['username']))
header('location:login.php');

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con, 'mcqport');

$q= "SELECT * FROM `ques`";
$query=mysqli_query($con, $q);

if(isset($_POST['submit'])){
	if(!empty($_POST['uans'])){
	$c=count($_POST['uans']);
	//echo "Out of 6 questions, attempted is: $c";

	$res=0;
	$i=1;

	$selected =$_POST['uans'];
	//print_r($selected);

	while ($rows=mysqli_fetch_array($query)) {
		//echo $rows['ans_id'];
		$chek= $rows['ans_id']==$selected[$i];
		if($chek){
			$res++;
		}
		$i++;
	}
	//echo "Your total marks is: $res";
}}

$datafetch = "SELECT * FROM `marks`";
$mdata= mysqli_query($con,$datafetch);
$row1=mysqli_fetch_array($mdata);
if($_SESSION['username']==$row1['name']){
  echo "<h3>You have submitted the form once already!</h3>";

}else{
  $name1=$_SESSION['username'];
  $final="INSERT INTO `marks`(`name`, `numberofquestionselected`, `totalmarks`) VALUES ('$name1','$c','$res')";
  mysqli_query($con,$final);

  $datafetch = "SELECT * FROM `marks` where name='$name1'";
  $mdata= mysqli_query($con,$datafetch);
  $row1=mysqli_fetch_array($mdata);


}


?>
<html>
<head>

<script type="text/javascript">
  setInterval(function(){
    document.getElementById('date').innerHTML= Date();
  },1); 
</script>

	<style>
  body{
  background-color: #808080;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: blue;
}
</style>
	</head>
	<body>
    <h4 id="date" style="color: white;"></h4>
		<center><h2>Your Score</h2></center>
		<table>
  <tr>
    <th>Name</th>
    <th>Question Attempted</th>
    <th>Total Marks</th>
  </tr>
  <tr>
    <td><?php echo $row1['name'] ?></td>
    <td><?php echo $row1['numberofquestionselected'] ?></td>
    <td><?php echo $row1['totalmarks'] ?></td>
  </tr>
 </table>
 <br />
 <div>
   <center><a href='logout.php'>LOGOUT</a>
   </center>
</div>
	</body>
</html>