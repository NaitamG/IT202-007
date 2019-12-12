<html>
<body bgcolor='#999999'>
<?php
  
  include 'db_connect.php';
  
	$sql = "SELECT * FROM  acct_no WHERE used='no' order by id  LIMIT 0,1";
  
	$result = mysqli_query($db, $sql) or die(mysqli_error($db));
  var_export($result);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if (mysqli_num_rows($result)){

	$acct = $row['acct'];
	$card = $_POST['card'];
	$name = $_POST['name'];
	$pword = $_POST['pword'];
	$depo= $_POST['depo'];
	$time = $_POST['time'];
	$day = $_POST['day'];

	$sql2 = "INSERT INTO myacct(acct, card, name, depo, day)
		VALUES ('$acct', '$card', '$name', '$depo', '$day')";

	$result2 = mysqli_query($db, $sql2)
			or die("
		<script language='JavaScript'>
		window.alert('Sorry, you already register!')
		</script>
		<meta http-equiv='REFRESH' content='0; url=register.php'>
		");
   $pword = password_hash($pword, PASSWORD_BCRYPT);
   $sql3 = "INSERT INTO login(acct, card, name, pword, role)
		VALUES ('$acct', '$card', '$name',  '$pword', 'user')";

	$result3 = mysqli_query($db, $sql3)
			or die("
		<script language='JavaScript'>
		window.alert('Sorry, you already register!')
		</script>
		<meta http-equiv='REFRESH' content='0; url=register.php'>

		");

	$sql4 = "INSERT INTO event(acct, depo, event, time, day)
		VALUES ('$acct', '$depo', 'Deposit',  '$time', '$day')";

	$result4 = mysqli_query($db, $sql4);

	$sql5 = "UPDATE acct_no SET used = 'yes' WHERE acct = '$acct'";
	$result5 = mysqli_query($db, $sql5);

	if ($result5){
		header("Location: register_preview.php?acct=$acct");	
		}
		else{
		die(mysqli_error());
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