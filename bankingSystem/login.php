<html>
<body bgcolor='#333333'>
</body>
</html>

<?php
	session_start();
	$acct=$_POST["acct"];
	$pword=$_POST["pword"];

	include 'db_connect.php';

	$sql="SELECT * FROM login WHERE acct='$acct' AND pword=MD5('$pword')";
	$result=mysql_query($sql);
	$row = mysql_fetch_array($result); 
	if (mysql_num_rows($result))
	{
		$acct=$row["acct"];
		$name=$row["name"];
		$role=$row["role"];
		
		$_SESSION['xacct']=$acct;
		$_SESSION['xname']=$name;
		$_SESSION['xrole']=$role;

	header("Location: myacct.php");
	}
	else
	{
	mysql_close($conn);
	header("Location: main.php");
	
	}
?>