<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function validate(){
	if(isset($_POST['email']) && isset($_POST['confirmEmail'])){
		if($_POST['email'] == $_POST['confirmEmail']){
			echo "<br>Emails Matched!<br>";
		}
		else{
			echo "<br>Emails didn't match!<br>";
		}
	}
}
function checkPasswords(){
	if(isset($_POST['password']) && isset($_POST['confirmPassword'])){
		if($_POST['password'] == $_POST['confirmPassword']){
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

function validateForm() {
    var email = document.forms["f"]["email"].value;
    var cEmail = document.forms["f"]["confirmEmail"].value;
    var pass = document.forms["f"]["password"].value;
    var cPass = document.forms["f"]["confirmPassword"].value;
    var user = document.forms["f"]["username"].value;
    if (email == null || email == "", cEmail == null || cEmail == "", pass == null || pass == "", cPass == null || cPass == "", user == null || user == "") {
      alert("Please Fill All Required Field");
      return false;
    }
}

</script>
</head>

<body>
<form name="f" method="POST" action="" onsubmit="return validateForm();">
<input type="email" id="email" name="email" placeholder="Email"/>
  
<input type="email" id="confirmEmail" name="confirmEmail" placeholder="Confirm Email"/>
 
<input type="password" id="password" name="password" placeholder="Password"/>

<input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password"/>

<input type="text" id="username" name="username" placeholder="Username"/>


<input type="submit" value="Try it"/>
</form>
</body>
</html>

<?php 
validate();
checkPasswords();
?>

<?php
if(isset($_POST)){
	echo "<br><pre>" . var_export($_POST, true) . "</pre><br>";
}
?>