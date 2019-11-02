<?php
  include("config.php");
  $user = $_POST['username'];
  $pass = $_POST['password'];
  
  //Connection to database
  $db = mysqli_connect($hostname, $username, $password, $project);

  if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL " . mysqli_connect_error();
    exit();
  }
  echo "<br>connection successful<br>";
  
  mysqli_select_db($db, $database);
  $s = " select * from LoginForm where Username = '$user' and Password = '$pass'";
  ($t = mysqli_query($db, $s)) or die(mysqli_error($db));
  $rows = mysqli_num_rows($t);
  
  //Validate 
  if($rows == 0)
  { 
  echo("Invalid Username or Password, Try Again");
  }
  else{
  echo "You are Successfully Logged In";
  }
?>