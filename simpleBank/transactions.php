<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function do_bank_action($account1, $account2, $amountChange, $type){

	require("config.php");
	$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
	$db = new PDO($conn_string, $username, $password);
	//$a1total = "SELECT NVL(SUM(Total), 0) FROM `Transactions` WHERE AccountSource = 123;
	//$a2total = 0;//TODO get total of account 2
	$query = "INSERT INTO `Transactions` (`AccountSource`, `AccountDest`, `Amount`, `Type`, `Total`) 
	VALUES(:p1a1, :p1a2, :p1change, :type, :a1total), 
			(:p2a1, :p2a2, :p2change, :type, :a2total)";
	
	$stmt = $db->prepare($query);
	$stmt->bindValue(":p1a1", $account1);
	$stmt->bindValue(":p1a2", $account2);
	$stmt->bindValue(":p1change", $amountChange);
	$stmt->bindValue(":type", $type);
	$stmt->bindValue(":a1total", $a1total);
	//flip data for other half of transaction`
	$stmt->bindValue(":p2a1", $account2);
	$stmt->bindValue(":p2a2", $account1);
	$stmt->bindValue(":p2change", ($amountChange*-1));
	$stmt->bindValue(":type", $type);
	$stmt->bindValue(":a2total", $a2total);
	$result = $stmt->execute();
	echo var_export($result, true);
	echo var_export($stmt->errorInfo(), true);
	return $result;
}
?>
<!DOCTYPE html>
<html>
<head>
</head>

<body>
<div class="container">   
  <h2>
    Account Summary
  </h2>
</div>
<style>
  body
    {
      margin: 8px;
      font-family: Arial;
      font-size: 16px;
      background-color: #c8c3cc;
    }
  h2
    {
      text-align: center;
      color: #000;
      font-family: verdana;
      font-size: 40px;
      display: block;
      font-size: 2em;
      margin-block-start: 2em;
      margin-block-end: 3em;
      margin-inline-start: 0px;
      margin-inline-end: 0px;
      font-weight: bold;
    }
</style>

<form method="POST">

	<input type="text" name="account1" placeholder="12 Digits Account Number">
 
	<!--If our sample is a transfer show other account field-->
	<?php if($_GET['type'] == 'transfer') : ?>
	<input type="text" name="account2" placeholder="Other Account Number">
	<?php endif; ?>
	
	<input type="number" name="amount" placeholder="$0.00"/>
 
	<input type="hidden" name="type" value="s<?php echo $_GET['type'];?>"/>
	
	<!--Based on sample type change the submit button display-->
	<input type="submit" value="Move Money"/>
</form>
<a href="myLoginForm.php">Back</a>
</body>
</html>


<?php
if(isset($_POST['type']) && isset($_POST['account1']) && isset($_POST['amount'])){
	$type = $_POST['type'];
	$amount = (int)$_POST['amount'];
	switch($type){
		case 'deposit':
			do_bank_action("000000000000", $_POST['account1'], ($amount * -1), $type);
			break;
		case 'withdraw':
			do_bank_action($_POST['account1'], "000000000000", ($amount * -1), $type);
			break;
		case 'transfer':
			//TODO figure it out
			break;
	}
}
?>
