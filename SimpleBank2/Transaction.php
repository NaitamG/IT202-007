<?php
 
session_set_cookie_params (0,"/~ng395/IT202-007/SimpleBank2/", "web.njit.edu");
session_start();
if ( !isset($_SESSION["logged"])  && time()-$_SESSION["testing"] > 600 ){ 
  echo "You have not logg in yet <br> "; 
  header ("refresh:5;url= 'https://web.njit.edu/~pps48/A2/form.html'");
  exit(); 
}
else {    
  $UCID = $_SESSION ['UCID'] ;
  
  $inactive  =  time() - $_SESSION['testing'];
  if ($inactive > 600 ){
    session_destroy();
    header ("refresh:5;url= 'https://web.njit.edu/~ng395/IT202-007/SimpleBank2/form.html'");
    exit();
  }
 $_SESSION ['testing'] = time();
}
?>
<!DOCTYPE HTML>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}
li {
    float: left;
}
ab {
  float:right; 
}
ab a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
ab a:hover {
    background-color: #111;
}
li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
li a:hover {
    background-color: #111;
}
</style>
<ul>
<li><a href = "https://web.njit.edu/~ng395/IT202-007/SimpleBank2/Transaction.php">Transaction</a> </li>
<li><a href = "https://web.njit.edu/~ng395/IT202-007/SimpleBank2/Display.php">Display </a> </li>
<ab><a href = "https://web.njit.edu/~ng395/IT202-007/SimpleBank2/logout.php">logout</a> </ab>
</ul>
<span id = "demo"></span><br> 
<form action = "w-or-d.php">
<input type = "text"  name = "amount"  autocomplete ="off"> Enter Amount <br><br>
<select name  = "type" autocomplete = "off"  id = "type">
  <option value = ' '>  Choose one </option>
  <option value = 'D'> Deposit </option>
  <option value = 'W'> Withdraw </option>
  
</select>  <br><br>
<?php include 'radio.php'; ?>
<input type = "hidden" name="mailChoice" id='mailChoice' value='N'  >
<input type = checkbox autocomplete= "off" name="mailChoice" id='mailChoice' value='Y'>  Mail receipt: Check for Yes<br><br>

<input type=checkbox   checked="checked" id="autoStop"> check if dont want Auto Logout <br><br>
<input type = "submit" name = "submit" >
</form>


<script type= "text/javascript">
//  "use strict"
    var timer1;
  
  var ptrA = document.getElementById("autoStop");
    if (ptrA.checked) {
   document.getElementById ("demo").innerHTML = "Auto-ShutDown-Stopped<br>";
      window.clearTimeout(timer1); 
    timer1 = setTimeout (logout,4000);
   }
   else {
   document.getElementById ("demo").innerHTML = dsec + " Auto-ShutDown On<br>";
  }
  
  function resetTimer (){
  
    d= new Date();  // getting time 
    dsec = d.getSeconds();  // comverting time into seconds 
   if (!ptrA.checked) document.getElementById ("demo").innerHTML = "<br>"+dsec + " Auto-ShutDown On<br>";
   else document.getElementById ("demo").innerHTML = "<br>Auto-ShutDown-Stopped<br>"; // posts seconds
    clearTimeout(timer1); 
    timer1 = setTimeout (logout,4000); 
  
  }
  
  function logout(){
      if (ptrA.checked) 
   return;
   else 
    //alert ("No Activity: Auto Logout"); 
    window.location.href = 'https://web.njit.edu/~ng395/IT202-007/SimpleBank2/logout.php'; 
  }
window.onload = resetTimer;
window.onclick = resetTimer;
window.onmousemove = resetTimer;
window.ondbclick = resetTimer;
window.onkeypress = resetTimer;
</script>
</html>
