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

var returnStatement = "";
var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Matching Password';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Not Matching';
  }
}
</script>
<body><?php getName();?>

<form method="GET" action="#">
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
    $msg = "";
    if(isset($_POST['submit'])) {
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];
      
      if ($password != $confirm_password){
        $msg = "Please Match Your Passwords!";
      }
    echo "
      <script type=\"text/javascript\">
        var e = document.getElementById('testForm'); e.action='test.php'; e.submit();
      </script>";
     }
?>

