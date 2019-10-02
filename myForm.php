<?php
//helper
fuciton getName({
	if(isset($_GET['name'])){
		echo "<p>Hello, " . $_GET['name'] . "</p.";
	}
}
?>
<html>
<head></head>
<body>
<?php getName();?.
<form mode="GET" action="#">
<input name="name" tpye="type" placeholder="Enter you name"/>
<input type="submit" values="Try it"/>
</form>
</body>
</html>

		
