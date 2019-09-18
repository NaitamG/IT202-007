//web.njit.edu/~ng395/IT202-007/initDB.php
<?php
#turn error reporting on
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('config.php');
echo $host;

$conn_string = "mysql:host=$host;dbname=$database;usename=$username;password=$password;charset=utf8mb4";

try{
	$db = new PDO($conn_string, $username, $password);
	echo "Should have Connected";
}
catch(Exception $e){
	echo $e->getMessage();
	exit("Something went wrong");
}
?>
