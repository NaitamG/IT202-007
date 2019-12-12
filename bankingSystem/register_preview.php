<html>
<head>
</head>
<body bgcolor='#999999'>
<?php

include 'db_connect.php';
$acct = $_REQUEST["acct"];
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
    <td colspan="3"><font color="#00FF00" size="2" face="verdana">You have been Registered!</font></td>
  </tr>
  <tr> 
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td width="37%" align="right"><font color="#00FF00" size="2" face="arial"><b>Account Number</b></font></td>
    <td width="7%" align="center"><font color="#00FF00" size="2" face="arial">:</font></td>
    <td width="56%"><font color="#00FF00" size="2" face="arial"><b><?php echo"$acct   (Copy This)"; ?></b></font></td>
  </tr>
  <tr> 
    <td align="right"><font color="#00FF00" size="2" face="arial"><b>Identity Card</b>
      </font></td>
    <td align="center"><font color="#00FF00" size="2" face="arial">:</font><br> 
    </td>
    <td><font color="#00FF00" size="2" face="arial"><b><?php echo"$card"; ?></b></font></td>
  </tr>
  <tr> 
    <td align="right"><font color="#00FF00" size="2" face="arial"><b>Full Name</b></font></td>
    <td align="center"><font color="#00FF00" size="2" face="arial">:</font><br> 
    </td>
    <td><font color="#00FF00" size="2" face="arial"><b><?php echo"$name"; ?></b></font></td>
  </tr>
  <tr> 
    <td align="right"><font color="#00FF00" size="2" face="arial"><b>Day</b></font></td>
    <td align="center"><font color="#00FF00" size="2" face="arial">:</font><br> 
    </td>
    <td><font color="#00FF00" size="2" face="arial"><b><?php echo"$day"; ?></b></font></td>
  </tr>
  <tr> 
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center"> 
    <td colspan="3"> <form action='main.php' method='post'>
        <input type='submit' value='Proceed'>
      </form></td>
  </tr>
</table>
<?php
	}
?>
</body>
</html>

