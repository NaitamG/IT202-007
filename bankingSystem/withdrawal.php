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
$sql = "SELECT * FROM  myacct WHERE acct='$xacct'";
$result = mysql_query($sql) or die("SQL select statement failed");

while ($row = mysql_fetch_array($result))  {
			$acct=$row["acct"];
			$depo=$row["depo"];
?> 
<html>
<head>
<script language="JavaScript">
		function validated(){

			var wdraw = document.s.wdraw.value;
			var wdrawint = parseInt(wdraw);
			var depo = document.s.depo.value;
			var bal = depo-wdraw;
			
			if(wdraw==""){	
				window.alert("Please enter withdrawal value!");
				document.s.wdraw.focus();
				return false;
			}
			if(isNaN(wdrawint)){	
				window.alert("Please enter withdrawal value!");
				document.s.wdraw.focus();
				return false;
			}
			if(wdraw <= 9){	
				window.alert("Withdrawal value must not less than $10!");
				return false;
			}
			if(bal < 10){	
				window.alert("Sorry, your balance is not enough. Minimum balance in your account must not less than $10!");
				return false;
			}
}
</script>
</head>
<body bgcolor='#333333'>
<br><br><br><br><br><br><br><br>
<form action='withdrawal_write.php' method='post'  name='s' onsubmit='return validated()';>
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
      <td align="center"><font color="#00FF00" size="1" face="verdana">Account Number</font><br>
     <font color="#00FF00" size="2" face="arial"><b><?php echo"$acct"; ?><b></b></font><br> </td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td align="center">
      <font color="#00FF00" size="2" face="arial"><b>$ </b></font><input type='text' name='wdraw' size=30 maxlength=10>
	  <input type='hidden' name='depo' value="<?php echo"$depo"; ?>">
	   <?php	
			$day=date("j M Y");
			$time=date( "g:i:sa");
			echo "<input type='hidden' name='day' value='$day'>";
			echo "<input type='hidden' name='time' value='$time'>";
			?>
	  </td>
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
       <input type='submit' value='Withdrawal'></form>
      </td>
	  <td width="45%">
	<form action='myacct.php' method='post'>
        <input type='submit' value='Back'>
      </form></td>
  </tr>
 </table>
<?php
	}
?>
</body>
</html>
