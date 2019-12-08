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
</head>
<body bgcolor='#333333'>
<br><br><br><br>
<table width="50%" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#000000">
  <tr align="center"> 
    <td colspan="3"><font color="#00FF00" size="1" face="verdana">Welcome to your Banking System!</font></td>
  </tr>
  <tr> 
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td> 
            <?php

		include 'db_connect.php';
		$sql = "SELECT * FROM  event WHERE acct='$xacct' ORDER BY id DESC";
		$result = mysql_query($sql);
		echo "<table width='100%' border='1' align='center' bgcolor='#000000'>";
		echo "<tr><td align='center'><font color='#00FF00' size='2' face='arial'><b>No</b></font></td>";
		echo "<td align='center'><font color='#00FF00' size='2' face='arial'><b>Transaction</b></font></td>";
		echo "<td align='center'><font color='#00FF00' size='2' face='arial'><b>Value ($)<b/></font></td>";
		echo "<td align='center'><font color='#00FF00' size='2' face='arial'><b>Date</b></font></td>";
		echo "<td align='center'><font color='#00FF00' size='2' face='arial'><b>Time</b></font></td></tr>";
		$counter=1;
		while ($row = mysql_fetch_array($result))  {
			$acct=$row["acct"];
			$depo=$row["depo"];
			$event=$row["event"];
			$time=$row["time"];
			$day=$row["day"];
			
			echo "<tr><td align='center'><font color='#00FF00' size='1' face='verdana'>$counter</font></td>";
			echo "<td align='center'><font color='#00FF00' size='1' face='verdana'>$event</font></td>";
			echo "<td align='center'><font color='#00FF00' size='1' face='verdana'>$ $depo</font></td>";
			echo "<td align='center'><font color='#00FF00' size='1' face='verdana'>$day</font></td>";
			echo "<td align='center'><font color='#00FF00' size='1' face='verdana'>$time</font></td></tr>";
			$counter++;
			}
			echo "</table>";
			?>
          </td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td align="center">&nbsp;</td>
  </tr>
  <tr> 
    <td align="center"> <form action='myacct.php' method='post'>
        <input type='submit' value='back'>
      </form></td>
  </tr>
</table>
</body>
</html>
