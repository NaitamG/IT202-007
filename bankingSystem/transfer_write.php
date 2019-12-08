<html>
<body bgcolor='#333333'>
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
	$acct=$_POST["acct"];
	$depos=$_POST["depos"];
	$time = $_POST["time"];
	$day = $_POST["day"];

	$sql = "SELECT * FROM  myacct WHERE acct = '$acct'";
	$result = mysql_query($sql)
		or die("SQL select statement failed");
	while ($row = mysql_fetch_array($result))
	{
	$acct = $row["acct"];
	$depo= $row["depo"];
	}
	$bal = $depo+$depos;

	$sql2 = "UPDATE myacct SET depo = '$bal' WHERE acct = '$acct'";
	$result2 = mysql_query($sql2);

	$sql2 = "SELECT * FROM  myacct WHERE acct = '$xacct'";
	$result2 = mysql_query($sql2) or die("SQL select statement failed");
	while ($row = mysql_fetch_array($result2))
	{
	$depo= $row["depo"];
	}
	$bal2 = $depo - $depos;

	$sql2 = "UPDATE myacct SET depo = '$bal2' WHERE acct = '$xacct'";
	$result2 = mysql_query($sql2);
	
	$sql3 = "INSERT INTO event(acct, depo, event, time, day)
		VALUES ('$xacct', '$depos', 'Transfer', '$time', '$day')";
	$result3 = mysql_query($sql3);

	if ($result3){
		header("Location: myacct.php");	
		}
		else{
		die(mysql_error());
		}
?>
</body>
</html>
