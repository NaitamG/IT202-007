<?php
  ini_set('display_errors',1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

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
  <body>
    <div class="container">   
      <h2>
        Register a New Account  
      </h2>
    </div>
  <style>
    body
    {
      margin: 8px;
      font-family: Arial;
      font-size: 16px;
      background-color: #c8c3cc;
    }
    h2
    {
      text-align: center;
      color: #000;
      font-family: verdana;
      font-size: 40px;
      display: block;
      font-size: 2em;
      margin-block-start: 2em;
      margin-block-end: 3em;
      margin-inline-start: 0px;
      margin-inline-end: 0px;
      font-weight: bold;
    }
     
    input[type=submit]
    {
      margin: 10px 480px;
      text-align: center;
      position: relative;
      width: 300px;
      background-color: #96ceb4;
      font-size: 15px;
      color: black;
      padding: 14px 20px;
      border: none;
      border-radius:30px;
      cursor: pointer;
    }
     
    input[type=text] 
    {
      width: 20%;
      padding: 12px 20px;
      margin: 5px 500px;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-sizing: border-box;
    }
     
    input[type=password] 
    {
      width: 20%;
      padding: 12px 20px;
      margin: 5px 500px;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-sizing: border-box;
    }
     
    input[type=email] 
    {
      width: 20%;
      padding: 12px 20px;
      margin: 5px 500px;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-sizing: border-box;
    }  
  </style>
</head>

  <form method="POST" onsubmit="return checkPasswords();"/>

    <input id="firstname" type="text" name="firstname" placeholder="First Name" required>

    <input id="lastname" type="text" name="lastname" placeholder="Last Name" required>

    <input id="username" type="text" name="username" placeholder="Username" required>

    <input id="password" type="password" name="password" placeholder="Enter password" required>

    <input id="confirm" type="password" name="confirm" placeholder="Confirm password" required>

    <span style="display:none;" id="validation.password"></span>

    <input type="submit" value="Try it"/>
  </form>
  <a href="myLoginForm.php">Back to Login Page</a>
</body>
</html>

<?php

  if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm'])){
    
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $confirm = $_POST['confirm'];
    
    if($pass != $confirm) {
      echo "Passwords don't match";
      exit();
    }
    
    try {
      $hash = password_hash($pass, PASSWORD_BCRYPT);
      
      include("config.php");
      $connection_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
      $db = new PDO ($connection_string, $username, $password);

      $stmt = $db->prepare("INSERT into `SimpleBank` (`username`, `pin`) VALUES(:username, :password)");

      $result = $stmt->execute(array(":username"=>$user, ":password"=>$hash));
      
      print_r($stmt->errorInfo());
      
      echo var_export($result, true);
    }
    catch(Exception $e) {
      echo $e->getMessage();
    }
  }
?>