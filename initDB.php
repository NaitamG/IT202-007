//web.njit.edu/~ng395/IT202-007/initDB.php
<?php
#turn error reporting on
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('config.php');
echo "Loaded Host: " . $host;
<<<<<<< HEAD
$conn_string = "mysql:host=$host;dbname=$database;usename=$username;password=$password;charset=utf8mb4";
=======
$conn_string = "mysql:host=$host;dbname=$database;username=$username;password=$password;charset=utf8mb4";
>>>>>>> e69c68127e3839609828519a116271b60f9c1428
try{
	$db = new PDO($conn_string, $username, $password);
	echo "Connected";
}
catch(Exception $e){
	echo $e->getMessage();
	exit("Something went wrong");
}
?>
