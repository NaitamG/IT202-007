<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>
<head>
<style>
  html {
  background-size: cover;
  height: 100%;
  overflow: hidden;
}
  form {border :3px solid red ;
      border-style: solid;
      border-color: #1F7ED2 ;
      width:300px;
      margin:auto;
      overflow:hidden; 
      padding : 10px;  
      border-radius:auto;
      text-align: center;
   }

input[type=submit], input[type=reset] {
    background-color: #ccc;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius:6px;
    color: #fff;
    font-family: 'Oswald';
    font-size: 15px;
    text-decoration: none;
    cursor: pointer;
    border:none;
    content-align: center;
}

.header{
    padding:20px;
    text-align: center;
    
}
</style>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
	$('#register_form').submit(function(event){
		if(this.password.value.length == 0 || this.confirm.value.length == 0){
			alert("Please enter a password and confirm it");
			return false;
		}
		let isOk = this.password.value == this.confirm.value;
		if(!isOk){
			alert("Password and Confirm password don't match");
		}
		return isOk;
	});
});
</script>
</head>
<body>
	<form id="register_form" method="POST"/>
		<input type="text" placeholder="Username" name="username" required>
		<input type="password" placeholder="Create Password" name="password" required>
		<input type="password" placeholder="Confirm Password" name="confirm" required>
    <br>
    <br>
		<input type="submit" value="Register"/>
    <input name="reset" type='reset' value='Reset'/>
	</form>
</body>
</html>
<?php
	if(isset($_POST['username']) 
		&& isset($_POST['password'])
		&& isset($_POST['confirm'])){
			
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$confirm = $_POST['confirm'];
   
		if($pass != $confirm){
				echo "Passwords don't match";
				exit();
		}
		//do further validation?
		try{
			//do hash of password
			$hash = password_hash($pass, PASSWORD_BCRYPT);
			include 'db_connect.php';
			$stmt = $db->prepare("INSERT into `Users` (`username`, `password`) VALUES(:username, :password)");
			$result = $stmt->execute(
				array(":username"=>$user,
					":password"=>$hash
				)
			);
			print_r($stmt->errorInfo());
			
      echo "Successfully Registered!";
      header("Location: login.php");
			//echo var_export($result, true);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
?>
