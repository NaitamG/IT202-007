<!DOCTYPE html>
<html>
  <head>
  </head>
<body>
  <form method="POST" action="loginFormRegistration.php">
  <p>
    <label> Username: </label>
	  <input type="text" name"username" placeholder="Type your Username"/>
  </p>
  
  <p>
    <label> Password: </label>
	  <input type="password" name="password" placeholder="Type your Password"/>
  </p>
  
    <input type="submit" name="submit"  value="Login"/>
    <input type="reset" value="Clear form"/>
  </form>
</body>
</html>

<?php
require('config.php');
$user = $_POST['username'];
$pass = $_POST['password'];
$conn_string = mysqli_connect($host, $username, $password);
$db = mysqli_select_db($conn_string, $database);
$query = mysqli_query($conn, " select * from `LoginForm` where `Username` = '$uname' and `Password` = '$upass'");
$insert_query = "insert into `LoginForm`( `Username`, `Password`) values (:username, :password)"; 
$rows = mysqli_num_rows($query);

if(isset($_POST['submit'])){
  if(empty($user) || empty($pass)){
    echo "Username or Password is Invalid";
    exit();
  } 
  elseif ($user == $uname && $pass == $upass){
    echo "Login success!! Welcome"; 
    exit();
  }
  else {
    //$reg = " INSERT INTO LoginForm(Username , Password) VALUES (['$user'] , ['$pass'])";
    //mysqli_query($conn, $reg);
    $stmt = $db->prepare($insert_query);
    $r = $stmt->execute(array(":username"=> $user, ":password"=>$pass));
    echo "Unable to Login BUT your Username and Password has been Registered";
    exit();
  }
}
?>