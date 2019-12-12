<?php
session_start();
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>
<head></head>
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
<body>
<div class="header">
  <h1><b><center>Simple Bank Login Page</center></b></h1>
</div>
	<form method="POST"/>
		<input type="text" placeholder ="Username" name="username" required> 
    <input type="text" placeholder ="Full Name" name="name" required>
		<input type="password" placeholder="Password" name="password" required>
    <br>
    <br>
		<input type="submit" value="Login"/>
    <input name="reset" type='reset' value='Reset'/>
    <br>
    <a href='register_new.php'>Register New Account</a>
	</form>
</body>
</html>
<?php
	if(isset($_POST['username']) && isset($_POST['password'])){
 
		$user = $_POST['username'];
		$pass = $_POST['password'];
    $name = $_POST['name'];  

		try{
			include 'db_connect.php';
			$stmt = $db->prepare("select id, username, password from `Users` where username = :username LIMIT 1");
			$stmt->execute(array(":username"=>$user));
			$results = $stmt->fetch(PDO::FETCH_ASSOC);
			//echo var_export($results, true);
			if($results && count($results) > 0){
				if(password_verify($pass, $results['password'])){
					//echo "Welcome, your account number is, " . $results["username"];
					//echo "[" . $results["id"] . "]";
					$user = array("id"=> $results['id'],
								"name"=> $results['username']
								);
        $_SESSION["user"] = $user;
					//TODO refactor
					/*$sql = "select value from `System_Properties` where `key` = :key";
					$stmt = $db->prepare($sql);
					$r = $stmt->execute(array(":key"=>"admins"));
					$result = $stmt->fetch(PDO::FETCH_ASSOC);
					$user["isAdmin"] = false;
					echo var_export($result, true);
					if($result){
						if(strpos($result['value'], ($user["id"]."")) !== false){
							$user["isAdmin"] = true;
						}
					}
					else{
						echo $stmt->errorInfo();
					}*/
					//$_SESSION['user']['name'] = $user;
          
					//echo var_export($_SESSION, true);
					header("Location: dashboard.php");
					
				}
				else{
					echo "Invalid password";
				}
			}
			else{
					echo "Invalid username";
			}
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
?>
