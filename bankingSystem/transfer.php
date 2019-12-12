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

			var acct2 = document.s.acct2.value;
			var myacct = document.s.myacct.value;
			
			if(acct2==""){	
				window.alert("Please enter account number!");
				document.s.acct2.focus();
				return false;
			}
			if(acct2==myacct){	
				window.alert("You are not allow to transfer to your own account!");
				return false;
			}
}
</script>
</head>
<body bgcolor='#999999'>
<br><br><br><br><br><br><br><br>
<form action='transfer2.php' method='post'  name='s' onsubmit='return validated()';>
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
	  <font color="#00FF00" size="2" face="arial"> 
        <input type='text' name='acct2' size=30 maxlength=20><b>
        <input type='hidden' name='myacct' value='<?php echo"$xacct"; ?>'>
        </font><br> </td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td align="center"> <font color="#00FF00" size="2" face="arial">&nbsp;</font> 
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
    <td width="52%" align="right">
       <input type='submit' value='Confirm'></form>
      </td>
	  <td width="48%">
	<form action='myacct.php' method='post'>
        <input type='submit' value='Back'>
      </form></td>
  </tr>
 </table>
</body>
</html>