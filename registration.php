<!DOCTYPE html>
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//This validation is for the server
function checkPasswords(){
	if(isset($_POST['password']) && isset($_POST['confirm'])){
		if($_POST['password'] == $_POST['confirm']){
			echo "<br>Passwords Matched!<br>";
		}
		else{
			echo "<br>Passwords didn't match!<br>";
		}
	}
}
?>
<html>
<head>
<script>
//This validation is for the client/the form
function isEmpty() {
  if(
}
function validate(){
  var form = document.forms[0];
  //This is for pass conf
	var password = form.password.value;
	var conf = form.confirm.value;
  
	console.log(password);
	console.log(conf);
	let pv = document.getElementById("validation.password");
	let succeeded = true;
	if(password == conf){
		
		pv.style.display = "none";
		form.confirm.className= "noerror";	
	}
	else{
		pv.style.display = "block";
		pv.innerText = "Passwords don't match";
		//form.confirm.focus();
		form.confirm.className = "error";
		//form.confirm.style = "border: 1px solid red;";
		succeeded = false;
	}
  //validation of emails
	var email = form.email.value;
	var ev = document.getElementById("validation.email");
	//this won't show if type="email" since browser handles
	//better validation. Change to type="text" to test
	if(email.indexOf('@') > -1){
		ev.style.display = "none";
	}
	else{
		ev.style.display = "block";
		ev.innerText = "Please enter a valid email address";
		succeeded = false;
	}
  
  //validation for the dropdown
  var sel = document.getElementById("dd");
  if (sel.value == "") {
  alert("Please select an option!");
  return false;
  }
  return true;
}
function checkIfEmpty() {
  //Validation for empty email
  if (document.getElementById('email').value == "" || document.getElementById('emailconfirm').value == ""){
    alert('Please enter an email address'); 
    return false; 
  }
  //Validation for empty password
  if (document.getElementById('password').value == ""|| document.getElementById('confirm').value == ""){
    alert('Please enter a password');  
    return false; 
  }
}
</script>
<style>
input { border: 1px solid black; }
.error {border: 1px solid red;}
.noerror {border: 1px solid black;}
</style>
</head>
<body>
<div style="margin-left: 50%; margin-right:50%;">
<form method="POST" action="#" onsubmit="return checkIfEmpty();">
<input name="name" type="text" placeholder="Enter your name"/>
<input name="email" type="text" id="email" placeholder="name@example.com"/>
<input name="emailconfirm" type="text" id="emailconfirm" placeholder="Re-Enter email"/>
<span id="validation.email" style="display:none;"></span>
<input type="password" name="password" id="password" placeholder="Enter password"/>
<input type="password" name="confirm" id="confirm" placeholder="Re-Enter password"/>
<span style="display:none;" id="validation.password"></span>
<select id="dd">
  <option value=""></option>
  <option value="GoalKeeper">GoalKeeper</option>
  <option value="Right Fullback">Right Fullback</option>
  <option value="Left Fullback">Left Fullback</option>
  <option value="Center Back">Center Back</option>
  <option value="Center Back 2">Center Back 2</option>
  <option value="Defending/ Holding Midfielder">Defending/ Holding Midfielder</option>
  <option value="Right Winger">Right Winger</option>
  <option value="Center/Box-to-box Midfielder">Center/Box-to-box Midfielder</option>
  <option value="Striker">Striker</option>
  <option value="Attacking Midfielder/Playmaker">Attacking Midfielder/Playmaker</option>
  <option value="Left Winger">Left Winger</option>
</select>
<input type="submit" value="Try it" onclick="return validate();"/>
</form>
</div>
</body>
</html>
<?php checkPasswords();?>
<?php
if(isset($_POST)){
	echo "<br><pre>" . var_export($_POST, true) . "</pre><br>";
}
?>