<?php
function getName(){
	if(isset($_GET['name'])){
		echo "<p>Hello, " . $_GET['name'] . "</p>";
	}
}
?>
<html>
<head></head>
<body><?php getName();?>
<form mode="GET" action="#">
<input name="name" type="text" placeholder="Enter you name"/>
<input name="number" type="number" placeholder="Enter you number"/>
<input name="password" type="password" placeholder="Enter a FAKE password"/>

<label for="Yes">Yes</label>
<input type="radio" name="radio" value="Yes"/>
<lable for="No">No</lable>
<input type="radio" name="radio" value="No"/>
<!-- this is a comment -->
<select name="dropdown">
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
  
</select>
<input type="checkbox" values="check"/>
<textarea name="text'></textarea>
<inut type="data" name="date"/>
<input type="submit" value="Try it"/>
</form>
</body>
</html>

<?php
if(issset($_GET)){
	echo "<br><pre>" . var_export($_GET, true) . "</pre><br>";
}
?>
