<html>
<body bgcolor='#333333'>
<?php
	
	include 'db_connect.php';
	
	$sql = "SELECT * FROM  acct_no WHERE used='no' order by id  LIMIT 0,1";
	$result = mysql_query($sql)
		or die("SQL select statement failed");
	$row = mysql_fetch_array($result); 
	if (mysql_num_rows($result)){

	$acct = $row["acct"];
	$card = $_POST["card"];
	$name = $_POST["name"];
	$pword = $_POST["pword"];
	$depo= $_POST["depo"];
	$time = $_POST["time"];
	$day = $_POST["day"];

	$sql2 = "INSERT INTO myacct(acct, card, name, depo, day)
		VALUES ('$acct', '$card', '$name', '$depo', '$day')";

	$result2 = mysql_query($sql2)
			or die("
		<script language='JavaScript'>
		window.alert('Sorry, you already register!')
		</script>
		<meta http-equiv='REFRESH' content='0; url=register.php'>
		");

	$sql3 = "INSERT INTO login(acct, card, name, pword, role)
		VALUES ('$acct', '$card', '$name',  MD5('$pword'), 'user')";

	$result3 = mysql_query($sql3)
			or die("
		<script language='JavaScript'>
		window.alert('Sorry, you already register!')
		</script>
		<meta http-equiv='REFRESH' content='0; url=register.php'>

		");

	$sql4 = "INSERT INTO event(acct, depo, event, time, day)
		VALUES ('$acct', '$depo', 'Deposit',  '$time', '$day')";

	$result4 = mysql_query($sql4);

	$sql5 = "UPDATE acct_no SET used = 'yes' WHERE acct = '$acct'";
	$result5 = mysql_query($sql5);

	if ($result5){
		header("Location: register_preview.php?acct=$acct");	
		}
		else{
		die(mysql_error());
		}
	}
	else{
	echo "<script language='JavaScript'>
		window.alert('System error, Ask administration for further detail!')
		</script>
		<meta http-equiv='REFRESH' content='0; url=main.php'>";
	}
?>
</body>
</html>
