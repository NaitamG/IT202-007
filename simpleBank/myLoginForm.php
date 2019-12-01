<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['username']) && isset($_POST['passwrod'])) {
	 try {
    		$user = $_POST['username'];
    		$pass = $_POST['password'];
    
    		require('config.php');
    
    		$connection_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
    		$db = new PDO ($connection_string, $username, $password);
    
    		$select_query = "SELECT * FROM `SimpleBank` WHERE username = :username";
    		$stmt = $db->prepare($select_query);
    		$r = $stmt->execute(array(":username"=> $user));
    		$results = $stmt->fetch(PDO::FETCH_ASSOC);
    		echo $stmt->errorInfo();
    
    		if ($results && count($results) > 0) {
      			if (password_verify($pass, $results['pin'])) {
        			echo "Password verified.";
       				$user = array("id"=> $results['id'], "name"=> $results['username']);
        			$_SESSION['user'] = $user;
        			echo "<pre>" . var_export($user, true) . "</pre>";
        			header("Location: loggedIn.html");
      			}
      			else {
        			echo "Invalid password";
      			}
    		}
    
    		else {
      			echo "User does not exist, need to create an account first!";
    		}
  	}
  	catch(Exception $e) {
    		echo $e->getMessage();
    		exit("It doesn't work");
  	}
}
?>

<html>
<body>
  <header>
		<div class="container">
        <!-- This is the main header -->    
		<h2>
      Simple Bank<br>Login Page  
    </h2>
    </div>
   </header>
   <!-- This is the formating and styling of the form -->
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
       margin: 10px 485px;
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
     
     input[type=reset]
     {
       margin: 0 auto;
       text-align: center;
       position: relative;
       width: 300px;
       background-color: #96ceb4;
       font-size: 15px;
       color: black;
       padding: 14px 20px;
       margin: 10px 485px;
       border: none;
       border-radius:30px;
       cursor: pointer;
     }
     
     input[type=text] {
       width: 20%;
       padding: 12px 20px;
       margin: 5px 510px;
       display: inline-block;
       border: 1px solid #ccc;
       border-radius: 10px;
       box-sizing: border-box;
     }
     
     input[type=password] {
       width: 20%;
       padding: 12px 20px;
       margin: 5px 510px;
       display: inline-block;
       border: 1px solid #ccc;
       border-radius: 10px;
       box-sizing: border-box;
     }
     
     a
     {
       text-align:center;
     }
    </style>
    
  <form action="" method="post">
    <p><input type="text" name = "username" placeholder="Type your Username"/></p>
  
    <p><input type="password" name="password" placeholder="Type your Password"/></p>
  
    <input type="submit" name="submit"  value="Login"/>
    <input type="reset" value="Clear form"/>
  </form>
  <a href="validateRegistration.php">Create a new account</a></div><style="text-align:center;"></style>
  
</body>
</html>

