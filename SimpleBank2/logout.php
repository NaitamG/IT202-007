<!DOCTYPE HTML>
<style>
</style>

<?php
session_set_cookie_params (0, "/~ng395/IT202-007/SimpleBank2/", "web,njit.edu");
session_start(); 
echo "sidvalue is "; 
echo $sidvalue = session_id();
echo  $sidvalue; 
  
  $_SESSION = array();
  
    session_destroy();
    echo '<h1><center><b>Succefully logout</b></center></h1>';
    setcookie ("PHPSESSID", "", time()-3600, '~ng395/IT202-007/SimpleBank2/', "",0,0); 
    header ("refresh:7;url= 'https://web.njit.edu/~ng395/IT202-007/SimpleBank2/form.html'");
    exit();
?>

</html>
