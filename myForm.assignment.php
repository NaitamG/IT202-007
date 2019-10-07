<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function getName(){
	if(isset($_GET['name'])){
		echo "<p>Hello, " . $_GET['name'] . "</p>";
	}
}
?>

<html>
<head></head>
<script>

function check() {
  if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Matching Password';
    return true;
  } 
  else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Not Matching';
    return false;
  }
}
</script>
<body><?php getName();?>

<form method="GET" action="#" onsubmit="return check();">
<label>Name :
  <input name="name" type="text" placeholder="Enter your name"/>
  <br>
  
<label>Username :
  <input name="username" id="username" type="username"/>
  <br>
  
<label>Password :
  <input name="password" id="password" type="password" onkeyup='check();' />
  <br>
  
<label>Confirm Password :
  <input type="password" name="confirm_password" id="confirm_password"  onkeyup='check();' /> 
  <span id='message'></span>

<input type="submit" value ="Submit" />
</form>
</body>
</html>

<?php
  if(isset($_GET)){
	  echo "<br><pre>" . var_export($_GET, true) . "</pre><br>";
  }
?>

