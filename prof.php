<?php session_start();
?>
<html>
<head>
	<style type="text/css">
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
	<script type="text/javascript">
  	setInterval(function(){
    document.getElementById('date').innerHTML= Date();
  },1); 
</script>
</head>
<body>
	<h4 id="date" style="color: white;position: fixed;bottom: 4px;right: 16px;font-size: 18px;"></h4>
<center><h2 style="color: yellow">All Candidate Marks</h2></center>
<table>
	<tr>
    <th>Name</th>
    <th>Question Attempted</th>
    <th>All Candidate Marks</th>
  </tr>
<?php 

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con, 'mcqport');

$datafetch1 = "SELECT * FROM `marks`";
$mdata1= mysqli_query($con,$datafetch1);
//$row2=mysqli_fetch_array($mdata1);
$num=mysqli_num_rows($mdata1);

for($i=1;$i<=$num;$i++){
$datafetch = "SELECT * FROM `marks` where sid=$i";
$mdata= mysqli_query($con,$datafetch);
$row1=mysqli_fetch_array($mdata);
?>  
  <tr>
    <td><?php echo $row1['name'] ?></td>
    <td><?php echo $row1['numberofquestionselected'] ?></td>
    <td><?php echo $row1['totalmarks'] ?></td>
  </tr>
 
<?php
}?>
</table>
<br />
<center><a href='logout.php' style="color: white;">LOGOUT</a></center>
</body>
</html>