<?php
session_start();
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*if(!isset($_SESSION['user'])) {
  header("Location: login.php");
}*/

include_once("partials/header.php");
include_once("helpers/functions.php");

//This checks if the account is already created or not
function checkAccount($account) {
  include 'db_connect.php';
  $query = "SELECT count(*) AS t FROM Transactions WHERE AccountSource = :acct OR AccountDest = :acct";
  $s = $db->prepare($query);
  $r = $s->execute(array(":acct"=>$account));
  $r= $s->fetch(PDO::FETCH_ASSOC);
  $numOfAcct = $r['t'];
  
  return $numOfAcct == 0;
}

//This will print all the accounts of the user
/*function accountsCreated($account) {
  include 'db_connect.php';
  $query = "SELECT count(*) AS t FROM accounts WHERE user_id = :userId AND accountNumber = :acct";
  $s = $db->prepare($query);
  $r = $s->execute(array(":acct"=>$account, ";userId"=> $user_id));
  $r= $s->fetch(PDO::FETCH_ASSOC);
  $row = $r['t'];
  if($row > 0) {
    while($row = $r['t']) {
      echo "<tr><td>" . $row["user_id"] . "</td><td>" . $row["accountNumber"] .;
    }
  }
}*/

//This will print all transaction history
function transactionHistory($account) {
  include 'db_connect.php';
  $query = "SELECT * FROM transactions WHERE accountNumber = :acct";
  $s = $db->prepare($query);
  $r = $s->execute(array(":acct"=>$account));
  $details = $s->fetch(PDO::FETCH_ASSOC);
  return $details; //do echo var_export($details) to see data structure.
  
}

//This makes a new account 
function userToAccount($account) {
  include 'db_connect.php';
  $user_id = $_SESSION['user']['id'];
  $query = "INSERT INTO `accounts`(`user_id`, `accountNumber`) VALUES (:user_id, :account)";
  $s = $db->prepare($query);
  $r = $s->execute(array(":account"=>$account, ":user_id"=> $user_id));
  return $r;
}

//This will delete the account that was created
/*function deleteAccount($account) {
  include 'db_connect.php';
  $query = "DELETE FROM accounts WHERE accountNumber = :acct";
  $s = $db->prepare($query);
  $r = $s->execute(array(":acct"=>$account));
  return $r;
{
*/

//This does the deposit, withdraw, and transfer actions for the user
function do_bank_action($account1, $account2, $amountChange, $type){
	include 'db_connect.php';
  //getting the total of the first account
  $query_total_1 = "SELECT SUM (NVL(Amount, 0)) as total FROM `Transactions` WHERE AccountSource = :a1total";
  $s1 = $db->prepare($query_total_1);
  $r1 = $s1->execute(array(":a1total"=>$amountChange));
  $result_total_1 = $s1->fetch(PDO::FETCH_ASSOC);
	$a1total = $result_total_1["total"];
 // firgure out the total amount in the transaction table
 if(!$result_total_1) {
   $a1total = 0;
 }
  //getting the total of the first account
  $query_total_2 = "SELECT SUM (NVL(Amount, 0)) as total FROM `Transactions` WHERE AccountSource = :a2total";
  $s2 = $db->prepare($query_total_2);
  $r2 = $s2->execute(array(":a2total"=>$amountChange));
  $result_total_2 = $s2->fetch(PDO::FETCH_ASSOC);
	$a2total = $result_total_2["total"];
 
 if(!$result_total_2) {
   $a2total = 0;
 }
	$query = "INSERT INTO `Transactions` (`AccountSource`, `AccountDest`, `Amount`, `Type`, `Total`) 
	VALUES(:p1a1, :p1a2, :p1change, :type, :a1total), 
			(:p2a1, :p2a2, :p2change, :type, :a2total)";
	
	$stmt = $db->prepare($query);
	$stmt->bindValue(":p1a1", $account1);
	$stmt->bindValue(":p1a2", $account2);
	$stmt->bindValue(":p1change", $amountChange);
	$stmt->bindValue(":type", $type);
	$stmt->bindValue(":a1total", $a1total);
	//flip data for other half of transaction
	$stmt->bindValue(":p2a1", $account2);
	$stmt->bindValue(":p2a2", $account1);
	$stmt->bindValue(":p2change", ($amountChange*-1));
	$stmt->bindValue(":type", $type);
	$stmt->bindValue(":a2total", $a2total);
	$result = $stmt->execute();
	//echo var_export($result, true);
	//echo var_export($stmt->errorInfo(), true);
	return $result;
}
?>
<html>

<style>
html {
  background-size: cover;
  height: 100%;
  overflow: hidden;
}
  form {border :3px solid red ;
      border-style: solid;
      border-color: #1F7ED2 ;
      width:300px;
      margin:auto;
      overflow:hidden; 
      padding : 10px;  
      border-radius:auto;
      text-align: center;
   }

input[type=submit], input[type=reset] {
    background-color: #ccc;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius:6px;
    color: #fff;
    font-family: 'Oswald';
    font-size: 15px;
    text-decoration: none;
    cursor: pointer;
    border:none;
    content-align: center;
}

.header{
    padding:20px;
    text-align: center;
    
}
</style>
<body>
<form method="POST">
	<input type="text" name="account1" placeholder="Account Number">
	<!-- If our sample is a transfer show other account field-->
	<?php if($_GET['type'] == 'transfer') : ?>
	<input type="text" name="account2" placeholder="Other Account Number">
	<?php endif; ?>
	
	<input type="number" name="amount" placeholder="$0.00"/>
	<input type="hidden" name="type" value="<?php echo $_GET['type'];?>"/>
	
	<!--Based on sample type change the submit button display-->
  <br>
  <br>
	<input type="submit" value="Move Money"/>
  <br>
<a href='home.php'>Back</a>
</form>
</body>
<html>

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
			do_bank_action($_POST['account1'], $_POST['account2'], ($amount * -1), $type);
			break;
    case 'newAccount':
     if (checkAccount($_POST['account1'])) {
       do_bank_action("000000000000", $_POST['account1'], ($amount * -1), $type);
       if(userToAccount($_POST['account1'])) {
         echo "Succesfully Created the Account!";
         echo " You have $" . $amount . " in this account";
       }
       
       else {
         echo "Something went wrong.";
       }
     }
     else {
       echo "Pick a new Account.";
     }
     break;
    /*case 'deleteAccount':
      if (!checkAccount($_POST['account1'])) {
        do_bank_action("000000000000", $_POST['account1'], ($amount * -1), $type);
        if(){
        
        }
        function deleteAccount($account);
        break;
      }
      
      case 'accountsCreated':
        accountsCreated($_POST['account1']);
        break;*/
      case 'transactionHistory':
        transactionHistory($_POST['account1']);
        break;
	}
}
?>
