<?php
	echo "<pre>" . var_export($_GET, true) . "</pre>";
	if(isset($_GET['name'])){
		echo "<br>Hello, " . $_GET['name'] . "<br>";
	}
  
	if(isset($_GET['number'])){
		$number = $_GET['number'];
		echo "<br>Make " . $number . " an interger please";
	} 
 
 
  echo "<br>Having two paramters with same name results in the latest value displayed.<br>";
 
  echo "<br>Having special characters as paramters results a string of them being displayed.<br>";
	//TODO
	//handle addition of 2 or more parameters with proper number parsing
	//concatenate 2 or more parameter values and echo them
	//try passing multiple same-named parameters with different values
	//try passing a parameter value with special characters
	//web.njit.edu/~ucid/IT202/handleRequestData.php?parameter1=a&p2=b
?>