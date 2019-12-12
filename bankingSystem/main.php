<?php
session_start();
session_destroy();
?>
<html>
<head>
<title>Untitled Document</title>
<script language="JavaScript">
		function validated(){

			var acct = document.s.acct.value;
			var pword = document.s.pword.value;
			
			if(acct==""){	
				window.alert("Please enter your account number!");
				document.s.acct.focus();
				return false;
			}
			if(pword==""){	
				window.alert("Please enter your password!");
				document.s.pword.focus();
				return false;
			}
}
</script>
</head>

<body bgcolor='#999999'>
<br><br><br><br><br><br><br><br>
<form action='login.php' method='POST' name='s' onsubmit='return validated()';>
<table width="50%" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#000000">
  <tr align="center"> 
    <td colspan="3"><font color="#00FF00" size="1" face="verdana">Simple Bank!</font></td>
  </tr>
  <tr> 
    <td width="20%">&nbsp;</td>
    <td width="61%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td align="center"><font color="#00FF00" size="1" face="verdana">Account No.</font><br>
	<input type='text' name='acct' size=30 maxlength=20></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td align="center"><font color="#00FF00" size="1" face="verdana">Password</font><br>
	<input type='password' name='pword' size=30 maxlength=10></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td align="center"><input name="submit" type='submit' value='Login'>
        <input name="reset" type='reset' value='Reset'></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
      <td align="center"><font color="#00FF00" size="1" face="verdana"><a href='register.php'><font color='#00FF00'>&lt;&lt; 
     Register here &gt;&gt;</font></a></font></td>
    <td>&nbsp;</td>
  </tr>
</table></form>
</body>
</html>
