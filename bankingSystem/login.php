<html>
<body bgcolor='#999999'>
<?php
session_start();

$acct = $_POST["acct"];
$pword = $_POST["pword"];

include 'db_connect.php';

$sql = "SELECT * FROM login WHERE acct= '$acct'";

$result = mysqli_query($db, $sql) or die(mysqli_error($db));

//$num = mysqli_num_rows($result);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$hash = $row['pword'];
var_export($result);

if(!$row){  
  return false;
}
else {
  if(password_verify($pword, $hash)){
    $acct=$row["acct"];
		$name=$row["name"];
		$role=$row["role"];

  
		$_SESSION['aacct']=$acct;
		$_SESSION['name']=$name;
		$_SESSION['role']=$role;

	  header("Location: myacct.php");
  }
  else {
 	  mysqli_close($db);
	  header("Location: main.php");
  }
}

?>
</body>
</html>