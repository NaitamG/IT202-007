<?php
session_start();
if ($_SESSION['xrole'] != 'user')
{
	header("Location: main.php");
	exit();
}
?>
<html>
<head>
<script language="JavaScript">
		function validated(){

			var depos = document.s.depos.value;
			var depo = document.s.depo.value;
			var deposint = parseInt(depos);
			var depos2 = depos <= 9;
			var bal = depo-depos;
			
			if(depos==""){	
				window.alert("Please enter transfer value!");
				document.s.depos.focus();
				return false;
			}
			if(isNaN(deposint)){	
				window.alert("Please enter transfer value!");
				document.s.depos.focus();
				return false;
			}
			if(depos2){	
				window.alert("Transfer value must not less than $10!");
				return false;
			}
			if(bal < 10){	
				window.alert("Sorry, your balance is not enough. Minimum balance in your account must not less than $10!");
				return false;
			}
}
</script>
</head>
<body bgcolor='#999999'>
<br><br><br><br><br><br>
<?php

$acct2=$_POST["acct2"];

include 'db_connect.php';
$sql = "SELECT acct, card, name FROM  myacct WHERE acct='$acct2'";
$result = mysql_query($sql) or die("SQL select statement failed");
$row = mysql_fetch_array($result);  
if (mysql_num_rows($result)){
			$acct=$row["acct"];
			$card=$row["card"];
			$name=$row["name"];
?> 
<form action='transfer_write.php' method='post'  name='s' onsubmit='return validated()';>
  <table width="50%" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#000000">
    <tr align="center"> 
      <td colspan="3"><font color="#00FF00" size="1" face="verdana">Welcome to your Banking System!</font></td>
    </tr>
    <tr> 
      <td width="20%">&nbsp;</td>
      <td width="61%">&nbsp;</td>
      <td width="19%">&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td align="center"><font color="#00FF00" size="1" face="verdana">Account Number</font> 
		<br> <font color="#00FF00" size="2" face="arial"><b><?php echo"$acct"; ?></b></font>
		<input type='hidden' name='acct' value='<?php echo"$acct"; ?>'>
      </td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td align="center"><font color="#00FF00" size="1" face="verdana">Identity Card</font><br>
	  <font color="#00FF00" size="2" face="arial"><b><?php echo"$card"; ?></b></font> 
      </td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td align="center"><font color="#00FF00" size="1" face="verdana">Name</font> 
        <br> <font color="#00FF00" size="2" face="arial"><b><?php echo"$name"; ?></b></font> 
      </td>
      <td>
	  <?php	
			$day=date("j M Y");
			$time=date( "g:i:sa");
			echo "<input type='hidden' name='day' value='$day'>";
			echo "<input type='hidden' name='time' value='$time'>";
		?>
	  <?php
	}
	else
	{
		echo "<script language='JavaScript'>";
		echo "window.alert('Account number not exist.')";
		echo "</script>"; 
		echo "<meta http-equiv='REFRESH' content='0; url=transfer.php'>";
	}
		$sql2 = "SELECT depo FROM  myacct WHERE acct='$xacct'";
		$result2 = mysql_query($sql2) or die("SQL select statement failed");
		$row = mysql_fetch_array($result2);
		if (mysql_num_rows($result2)){
		$depo=$row["depo"];
		echo "<input type='hidden' name='depo' value='$depo'>";
	}
?>
	  </td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td align="center"> <font color="#00FF00" size="2" face="arial"><b>$ </b></font> 
        <input type='text' name='depos' size=30 maxlength=10> </td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td align="center">&nbsp; </td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <table width="50%" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#000000">
  <tr> 
    <td width="55%" align="right">
       <input type='submit' value='Transfer'></form>
      </td>
	  <td width="45%">
	<form action='transfer.php' method='post'>
        <input type='submit' value='Back'>
      </form></td>
  </tr>
 </table>
</body>
</html>
