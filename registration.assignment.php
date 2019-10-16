<html>
<head>
<script>
function IfEmpty(valueOfElement){
 return (valueOfElement.trim().length == 0);
}
function isEmail(Element){
	if(Element.type == "email"){
		return Element.value.indexOf('@') > -1;
	}
	return true;
}
function validate(Element, Name){
	var valid = true;
	if(Name.length > 0){
		let other = document.forms[0][Name];
		let v1 = Element.value;
		let v2 = other.value;
   
		if(ifEmpty(v1)){
			valid = false;
			console.log("Value 1 is empty");
		}
		if(ifEmpty(v2)){
			valid = false;
			console.log("Value 2 is empty");
		}
		if(v1 != v2){
			valid = false;
			console.log("Value 1 and value 2 don't match");
		}
		if(!isEmail(Element)){
			valid = false;
			console.log("This email is not a valid email");
		}
		if(!isEmail(other)){
			valid = false;
			console.log("Confirm email is not a valid email");
		}
	}
	else{
		let valueOfElement = Element.value;
		if(ifEmpty(valueOfElement)){
			valid = false;
			console.log("Value is empty");
		}
		if(!isEmail(Element)){
			valid = false;
			console.log("Input is not valid email");
		}
	}
	if(!valid){
		alert("You have left empty information or the email/password doesn't match");
	}
}
</script>
</head>

<body>
<form onsubmit="return false;">

<input type="email" name="email" placeholder="Email" onchange="validate(this, '');"/>

<input type="email" name="confirmemail" placeholder="Confirm Email" onchange="validate(this,'email');"/>

<input type="password" name="password" onchange="validate(this, '');" />

<input type="password" name="confirmpassword" onchange="validate(this, 'password');"/>

<input type="text" name="username" placeholder="Username" onchange="validate(this, '');"/>


<select name="position" id="dd" onchange="validate(this,'test1');">
  <option value=""></option>
  <option value="GoalKeeper">GoalKeeper</option>
  <option value="Right Fullback">Right Fullback</option>
  <option value="Left Fullback">Left Fullback</option>
  <option value="Center Back">Center Back</option>
  <option value="Center Back 2">Center Back 2</option>
  <option value="Defending/ Holding Midfielder">Defending/ Holding Midfielder</option>
  <option value="Right Winger">Right Winger</option>
  <option value="Center/Box-to-box Midfielder">Center/Box-to-box Midfielder</option>
  <option value="Striker">Striker</option>
  <option value="Attacking Midfielder/Playmaker">Attacking Midfielder/Playmaker</option>
  <option value="Left Winger">Left Winger</option>
</select>
<input type="submit" value"Try it"/>
</form>
</body>
</html>


<?php
checkPasswords();
if(isset($_POST)){
	echo "<br><pre>" . var_export($_POST, true) . "</pre><br>";
}
?>
