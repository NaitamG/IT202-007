<?php
session_start();

if ($_SESSION['xrole'] != 'user')
{
	header("Location: main.php");
	exit();
}
?>
<html>
<body bgcolor='#999999'>
<?php
include 'db_connect.php'; 
$acct = $_SESSION['xacct'];
$sql = "SELECT * FROM  myacct WHERE acct='$acct'";
$result = mysqli_query($db, $sql) or die(mysqli_error($db));

while ($row = mysqli_fetch_array($result))  {
			$acct=$row["acct"];
			$card=$row["card"];
			$name=$row["name"];
			$day=$row["day"];
?>
<br><br><br><br><br><br><br><br>
  
<table width="50%" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#000000">
  <tr align="center"> 
    <td colspan="3"><font color="#00FF00" size="1" face="verdana">Welcome to your Banking System!</font></td>
  </tr>
  <tr> 
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td width="33%" align="right"><font color="#00FF00" size="2" face="arial"><b>Account Number</b></font></td>
    <td width="6%" align="center"><font color="#00FF00" size="2" face="arial">:</font></td>
    <td width="61%"><font color="#00FF00" size="2" face="arial"><b><?php echo"$acct"; ?></b></font></td>
  </tr>
  <tr> 
    <td align="right"><font color="#00FF00" size="2" face="arial"><b>Identity Card</b></font></td>
    <td align="center"><font color="#00FF00" size="2" face="arial">:</font><br></td>
    <td><font color="#00FF00" size="2" face="arial"><b><?php echo"$card"; ?></b></font></td>
  </tr>
  <tr> 
    <td align="right"><font color="#00FF00" size="2" face="arial"><b>Full Name</b></font></td>
    <td align="center"><font color="#00FF00" size="2" face="arial">:</font><br></td>
    <td><font color="#00FF00" size="2" face="arial"><b><?php echo"$name"; ?></b></font></td>
  </tr>
  <tr> 
    <td align="right"><font color="#00FF00" size="2" face="arial"><b>Member Since</b></font></td>
    <td align="center"><font color="#00FF00" size="2" face="arial">:</font></td>
    <td><font color="#00FF00" size="2" face="arial"><b><?php echo"$day"; ?></b></font></td>
  </tr>
  <tr> 
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
	<table width="50%" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#000000">
    <tr align="center"><td>
    <table width="40%" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#000000">
    <tr align="center"> 
      <td>
	  <form action='balance.php' method='post'>
	  <input type='submit' value='Check Balance'></form></td><td>
	  <form action='deposit.php' method='post'>
	  <input type='submit' value='Deposit'></form></td><td>
	  <form action='withdrawal.php' method='post'>
	  <input type='submit' value='Withdrawal'></form></td><td>
	  <form action='transfer.php' method='post'>
      <input type='submit' value='Transfer'></form></td><td>
	  <form action='main.php' method='post'>
      <input type='submit' value='Quit'></form>
	  </td>
    </tr>
	</table>
	 </td></tr>
	</table>
<?php
	}
?>
</body>
</html>
