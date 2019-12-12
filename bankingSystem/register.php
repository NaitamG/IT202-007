<html>
<script language="JavaScript">
		function validated(){

			var card = document.s.card.value;
			var name = document.s.name.value;
			var pword = document.s.pword.value;
			var pword2 = document.s.pword2.value;
			var depo = document.s.depo.value;
			var depoint = parseInt(depo);
			
			if(card==""){	
				window.alert("Please enter your identity card number!");
				document.s.card.focus();
				return false;
			}
			if(name==""){	
				window.alert("Please enter your name!");
				document.s.name.focus();
				return false;
			}
			if(pword==""){	
				window.alert("Please write your password!");
				document.s.pword.focus();
				return false;
			}
			if(pword2==""){	
				window.alert("Please write your password!");
				document.s.pword2.focus();
				return false;
			}
			if(pword !=pword2){	
				window.alert("Password not match!");
				return false;
			}
			if(isNaN(depoint)){	
				window.alert("Please enter deposit!");
				document.s.depo.focus();
				return false;
			}
			if(depo < 200){	
				window.alert("Deposit must not less than $200!");
				return false;
			}
}
</script>
<body bgcolor='#999999'>
<br><br><br><br><br><br><br><br>
<form action='register_write.php' method='post'  name='s' onsubmit='return validated()';>
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
      <td width="22%" align="right"><font color="#00FF00" size="1" face="verdana">Identity Card </font></td>
      <td width="4%" align="center"><font color="#00FF00" size="1" face="verdana">:</font></td>
      <td width="74%"><input type='text' name='card' size=30 maxlength=30></td>
    </tr>
    <tr> 
      <td align="right"><font color="#00FF00" size="1" face="verdana">Full Name</font></td>
      <td align="center"><font color="#00FF00" size="1" face="verdana">:</font></td>
      <td><input type='text' name='name' size=30 maxlength=30></td>
    </tr>
    <tr> 
      <td align="right">PP<font color="#00FF00" size="1" face="verdana">Password</font></td>
      <td align="center"><font color="#00FF00" size="1" face="verdana">:</font></td>
      <td><input type='password' name='pword' size=30 maxlength=10> <font color="#00FF00" size="1" face="verdana">max 10 digit</font> </td>
    </tr>
    <tr> 
      <td align="right"><font color="#00FF00" size="1" face="verdana">Re-Enter Password </font></td>
      <td align="center"><font color="#00FF00" size="1" face="verdana">:</font></td>
      <td><input type='password' name='pword2' size=30 maxlength=10> <font color="#00FF00" size="1" face="verdana">max 10 digit</font></td>
    </tr>
    <tr> 
      <td align="right"><font color="#00FF00" size="1" face="verdana">Deposit ($)</font></td>
      <td align="center"><font color="#00FF00" size="1" face="verdana">:</font></td>
      <td><input type='text' name='depo' size=20 maxlength=10> <font color="#00FF00" size="1" face="verdana">min $200</font> </td>
    </tr>
    <tr> 
      <td align="right">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td> 
        <?php	
			$day=date("j M Y");
			$time=date( "H:i:s");
			echo "<input type='hidden' name='day' value='$day'>";
			echo "<input type='hidden' name='time' value='$time'>";
			?>
      </td>
      <td align="center">&nbsp; </td>
      <td><input name="submit" type='submit' value='Register'> <input name="reset" type='reset' value='Reset'></td>
    </tr>
  </table>
</form>
</body>
</html>
