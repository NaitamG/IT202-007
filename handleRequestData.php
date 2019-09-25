<? php
	echo "<pre>" . var_dump($_GET, true) . "</pre";
	
	if(isset($_GET['name'])){
		echo "<br>Hello, " . $_Get['name'] . "<br>";
	}
	//web.njit.edu/~ng395/IT202-007/handleRequestData.php?parameter1=a&p2=b
>?
