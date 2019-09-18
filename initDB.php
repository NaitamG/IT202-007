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
	echo "  Connected";
	// Create Table
	$query = "create table if not exists `TestUsers`(
		`id` int auto_increment not null,
		`username` varchar(30) not null unique,
		`pin` int default 0,
		PRIMARY KEY (`id`)
		) CHARACTER SET utf8 COLLATE utf8_general_ci";
	$stmt = $db->prepare($query);
	$r = $stmt->execute();
	echo "<br>" . ($r>0?"Created table or already exists":"Failed to create table") . "<br>";
	unset($r);
}
catch(Exception $e){
	echo $e->getMessage();
	exit("Something went wrong");
}
?>
