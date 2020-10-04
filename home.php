<?php
session_start();

if(!isset($_SESSION['username']))
header('location:login.php');

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'mcqport');

$prf="select * from proftable";
$result2= mysqli_query($con,$prf);

if($_SESSION['designation']=='professor'){
    header('location:prof.php');
}
?>

<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script type="text/javascript">
    var count=300;
    var interval= setInterval(function(){
    document.getElementById('count').innerHTML="You have "+count+" Seconds Only.";
    count--;
    if(count===0){

      clearInterval(interval);
      window.location="login.php";
    }
  },1000);
</script>

<script type="text/javascript">

  setInterval(function(){

    document.getElementById('date').innerHTML= Date();
  },1); 
</script>

<style type="text/css">
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

.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}
.button1:hover {
  background-color: #008CBA;
  color: white;
}
body{
  background-color: #C0C0C0;
}
</style>
</head>

<body>
  <div class="container">
  
  <center>
    <h2 style="color: yellow;top: 8px;">MCQ Portal</h2>
  </center>
  <h4 style="color: white;">Hey, <?php echo $_SESSION['username']; ?></h4>
  <a href='logout.php' style="color: white;position: fixed;top: 8px;right: 16px;">LOGOUT</a>
  <h2 id="count" style="background-color: red;color: white; position: fixed; bottom: 8px;right: 16px;font-size: 18px;"></h2>
  <h4 id="date" style="color: white; position: fixed;top: 70px;right: 16px;font-size: 18px;"></h4>
  <form action="scr.php" method="post">
    <?php
    $fetchquery = "SELECT * FROM `ques`";
    $data= mysqli_query($con, $fetchquery);
    $num=mysqli_num_rows($data);

    for($i=1;$i<=$num;$i++){
      $fetchquery = "SELECT * FROM `ques` where qid=$i";
      //$fetchquery = "SELECT * FROM `ques` where qid=$i && rand()<0.1";

      $data= mysqli_query($con, $fetchquery);
      while($row=mysqli_fetch_array($data)){
        ?>
        
          <div class="card">
            

            <h3><?php echo $row['ques'] ?></h3>
          
            <?php
            $fetchquery = "SELECT * FROM `answer` where ans_id=$i";
            $data= mysqli_query($con, $fetchquery);
            while($row=mysqli_fetch_array($data))
              {
                ?>
                <div class="card-body">
                <input style="color: white" type="radio" name="uans[<?php echo $row['ans_id']; ?>]" value="<?php echo $row['aid']; ?>">
                <?php echo $row['ans']; ?>
                </input>
              </div>

                <?php
              }
            }
          }
          ?>
        
      </div>
      <br/><br/>
      <button type="submit" name="submit" value="submit" class="button button1">Submit</button>
      </form>
    </div>
  </body>
</html>
