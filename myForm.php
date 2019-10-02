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
<?php getName();?>
<form mode="GET" action="#">
<input name="name" tpye="text" placeholder="Enter you name"/>
<input name="number" tpye="text" placeholder="Enter you number"/>
<input name="password" type="password" placeholder="Enter a FAKE password"/>
<input type="radio" name="radio" value="Yes"/>
<input type="radio" name="radio" value="No"/>
<input type="checkbox" values="check"/>
<textarea name="text'></textarea>
<inut type="data" name="date"/>
<input type="submit" values="Try it"/>
</form>
</body>
</html>

<?php
if(isset($_GET)){
	echo "<br><pre>" . var_export($_GET, true) . "</pre><br>";
}
		
