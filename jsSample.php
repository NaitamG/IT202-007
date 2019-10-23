
<html> <!-- Homework assignment-->
<head>
	<script>
	function pageLoaded(){
		var para = document.createElement("div");
    var node = document.createTextNode("new element added");
    para.appendChild(node);
    document.body.appendChild(node);
	}
 // Missing a line about the DOM connection 
	</script>
</head>
<body onload="pageLoaded();">
	<p id="myPara">Just showing that we loaded something...</p>
</body>
</html>