<html>
<body bgcolor='#333333'>
</body>
</html>
<?php
session_start();
if ($_SESSION['xrole'] != 'user')
{
	header("Location: main.php");
	exit();
}
?>

<?php

	include 'db_connect.php';
	$depos=$_POST["depos"];
	$time = $_POST["time"];
	$day = $_POST["day"];

	$sql = "SELECT * FROM  myacct WHERE acct = '$xacct'";
	$result = mysql_query($sql)
		or die("SQL select statement failed");
	while ($row = mysql_fetch_array($result))
	{
	$acct = $row["acct"];
	$depo= $row["depo"];	
	}
	$bal = $depo+$depos;

	$sql2 = "UPDATE myacct SET depo = '$bal' WHERE acct = '$xacct'";
	$result2 = mysql_query($sql2);
	
	$sql3 = "INSERT INTO event(acct, depo, event, time, day)
		VALUES ('$xacct', '$depos', 'Deposit', '$time', '$day')";
	$result3 = mysql_query($sql3);

	if ($result3){
		header("Location: myacct.php");	
		}
		else{
		die(mysql_error());
		}
?>
