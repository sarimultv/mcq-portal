<html>
<head>
<title>Login and Registration</title>
<style type="text/css">
body{
		border: solid;
	}
.formf input {
  vertical-align: middle;
  margin: 5px 10px 5px 0;
  padding: 10px;
  background-color: #fff;
  border: 1px solid #ddd;
}
.formf select {
  border: 1px solid #ddd;
}
.formf button {
  padding: 10px 20px;
  background-color: dodgerblue;
  border: 1px solid #ddd;
  color: white;
  cursor: pointer;
}

.formf button:hover {
  background-color: royalblue;
}
.formf label {
  margin: 5px 10px 5px 0;
}
body{
  background-color: #808080;
}
</style>

<script type="text/javascript">
  setInterval(function(){
    document.getElementById('date').innerHTML= Date();
  },1); 
</script>

<script type="text/javascript">
	function passcheck(){
		var s= document.getElementById("passwords").value;
		var b= document.getElementById("passwords1").value;
		// if(s==""){
		// 	document.getElementById("messages").innerHTML="** Please provide passwords";
		// 	return false;
		// }
		// if(s.length<5 || s.length>10){
		// 	document.getElementById("messages").innerHTML="** Please provide passwords of minimum length 5 and less than 10";
		// 	return false;
		// }
		if(s!=b){
			document.getElementById("messages").innerHTML="** passwords didn't match";
			return false;
		}
		regx=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{5,10}$/;
		if(regx.test(s)){
		return true;
		 }
		else{
		document.getElementById("messages").innerHTML="** Password should be between 5 to 10 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character";
		return false;
		}
	}
</script>
<script type="text/javascript">
	function emailcheck(){
		var e= document.frm.email.value;
		if(e.indexOf('@')<=0){
			document.getElementById("messages1").innerHTML="** invalid email";
			return false;
		}
		if(e.charAt(e.length-4)!='.'){
			document.getElementById("messages1").innerHTML="** invalid email";
			return false;
		}
	}
</script>
</head>
<body><center>
<div>
	<h2 style="color: yellow;">MCQ Portal</h2>
	<h4 id="date" style="color: white"></h4>
<div>
<h2 style="color: white">:: LOG IN ::</h2>
<form action="val.php" method="post" class="formf">
<div>
<input type="text" placeholder="Enter Name" name="user" required />
<input type="password" placeholder="Enter Password" name="password" required />
<br/><br/>
<label for="Designation" style="color: white">Enter Your Designation</label>
<select id="Designation" name="designation">
	<option value="student">Student</option>
    <option value="professor">Professor</option>
  </select>
</div>
<br/>
<button type="submit">LOGIN</button>
</form>
</div>

<hr />

<div>
<h2 style="color: white">:: REGISTER YOURSELF ::</h2>
<form action="reg.php" method="post" onsubmit="return emailcheck()" name="frm" class="formf">
<div>
<input type="text" placeholder="Enter Name" name="user" required />
<input type="text" placeholder="Enter Email" id="emails" name="email" value="" /><br />
<span id="messages1"></span>
<br />
<input type="password" id="passwords" placeholder="Enter Password" name="password"/>
<input type="password" id="passwords1" placeholder="Confirm Password" name="password"/><br />
<span id="messages"></span>
<br/>
<label for="Designation" style="color: white">Enter Your Designation</label>
<select id="Designation" name="designation">
    <option value="professor">Professor</option>
    <option value="student">Student</option>
  </select>
</div>
<br />
<button type="submit" onclick="return passcheck()">REGISTER</button>
</form>
</div>
</div>
</center>
</body>
</html>