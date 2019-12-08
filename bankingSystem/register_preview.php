<html>
<head>
</head>
<body bgcolor='#333333'>

<?php
include 'db_connect.php';
$sql = "SELECT * FROM  myacct WHERE acct='$acct'";
$result = mysql_query($sql) or die("SQL select statement failed");

while ($row = mysql_fetch_array($result))  {
			$acct=$row["acct"];
			$card=$row["card"];
			$name=$row["name"];
			$day=$row["day"];
   }
?>
<table width="50%" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#000000">
  <tr align="center"> 
    <td colspan="3"><font color="#7FDBFF" size="2" face="verdana">Successfully Registered!</font></td>
  </tr>
  <tr> 
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td width="37%" align="right"><font color="#7FDBFF" size="2" face="arial"><b>Account Number</b></font></td>
    <td width="7%" align="center"><font color="#7FDBFF" size="2" face="arial">:</font></td>
    <td width="56%"><font color="#7FDBFF" size="2" face="arial"><b><?php echo"$acct"; ?></b></font></td>
  </tr>
  <tr> 
    <td align="right"><font color="#7FDBFF" size="2" face="arial"><b>Identity Card</b>
      </font></td>
    <td align="center"><font color="#7FDBFF" size="2" face="arial">:</font><br> 
    </td>
    <td><font color="#7FDBFF" size="2" face="arial"><b><?php echo"$card"; ?></b></font></td>
  </tr>
  <tr> 
    <td align="right"><font color="#7FDBFF" size="2" face="arial"><b>Full Name</b></font></td>
    <td align="center"><font color="#7FDBFF" size="2" face="arial">:</font><br> 
    </td>
    <td><font color="#7FDBFF" size="2" face="arial"><b><?php echo"$name"; ?></b></font></td>
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

</body>
</html>
