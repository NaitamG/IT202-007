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
	foreach(glob("sql/*.sql") as $filename){
		//echo $filename;
		$sql[$filename] = file_get_contents($filename);
		//echo $sql[$filename];
	}
	ksort($sql);
	
	//connect to db
	$db = new PDO($conn_string, $username, $password);
	//$db->setAttribute(PDO::ATTR_ERRMODE);
	foreach($sql as $key => $value){
		echo "<br>Running: " . $key;
		$stmt = $db->prepare($value);
		$result = $stmt->execute();
		$error = $stmt->errorInfo();
		if($error && $error[0] !== '00000'){
			echo "<br>Error:<pre>" . var_export($error,true) . "</pre><br>";
		}
		echo "<br>$key result: " . ($result>0?"Success":"Fail") . "<br>";
	}

	//commented out the previous code
	/*$db = new PDO($conn_string, $username, $password);
	echo "  Connected";
	// Create Table
	$query = "create table if not exists `TestUsers`(
		`id` int auto_increment not null,
		`username` varchar(30) not null unique,
		`pin` int default 0,
		PRIMARY KEY (`id`)
		) CHARACTER SET utf8 COLLATE utf8_general_ci";
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$stmt = $db->prepare($query);
	print_r($stmt->errorInfo());
	$r = $stmt->execute();
	echo "<br>" . ($r>0?"Created table or already exists":"Failed to create table") . "<br>";
	unset($r);
	
	//insert
	$insert_query = "INSERT INTO `TestUsers`( `username`, `pin`) VALUES ('NaitamG', 4444)";
	$stmt = $db->prepare($insert_query);
	$r = $stmt->execute();
	echo "<br>" . ($r>0?"Successfully Inserted":"Insert Failed") . "<br>";*/
}

catch(Exception $e){
	echo $e->getMessage();
	exit("Something went wrong");
}
?>
