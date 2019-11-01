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
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
$db = new PDO($conn_string, $username, $password);
$select_query = " select * from `LoginForm` where `Username` = ':username' and `Password` = ':password'"
$stmt = $db->prepare($select_query);
$r = $stmt->execute(array(":username"=> "$user"));
$results = $stmt->fetch(PDO::FETCH_ASSOC);
echo "<pre>" . var_export($results, true) . "</pre>"; 
$rows = mysqli_num_rows($results);

$user = $_POST['username'];
$pass = $_POST['password'];

if(isset($_POST['username']) && isset($_POST['password']){

  if($row['username'] == $user && $row['password'] == $pass ){
    echo "Login success!! Welcome";
    exit();
  }
  else {
    echo "Unable to Login, Invalid Username and/or Password";
  }
}
?>
