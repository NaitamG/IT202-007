<!DOCTYPE html>
<html>
<head>
</head>

<body>
<?php
session_start();

/*if(!isset($_SESSION['user'])) {
  header("Location: login.php");
}*/

include_once("partials/header.php");
include_once("helpers/functions.php");
?>

<div class="content">
        <h2>Choose your transaction action</h2>
        <ol>
                <li><a href="https://web.njit.edu/~ng395/IT202-007/simpleBank/transactions.php?type=newAccount">Create New Account</a></li>
                <li><a href="https://web.njit.edu/~ng395/IT202-007/simpleBank/transactions.php?type=deposit">Deposit Money</a></li>
                <li><a href="https://web.njit.edu/~ng395/IT202-007/simpleBank/transactions.php?type=withdraw">Withdraw Money</a></li>
                <li><a href="https://web.njit.edu/~ng395/IT202-007/simpleBank/transactions.php?type=transfer">Transfer Money</a></li>
        </ol>
    </div>
    
  
  
<style>
 body
        {
            background-color: #dfe4ea;
        }
        .content
        {
            width: 800px;
            padding: 25px 25px;
            margin: 25px auto;
            background-color: #fff;
            border-radius: 20px;
            border: #e3e1e4 1px solid;
        }
        element.style
        {
            width: 780px;
        }
        ul 
        {
            display: block;
            list-style-type: disc;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            padding-inline-start: 40px;
        }
        li 
        {
        margin: 10px 0;
            display: list-item;
    text-align: -webkit-match-parent;
        }
        ol
        {
            display: block;
            list-style-type: decimal;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            padding-inline-start: 40px;
        }
        h1
        {
            text-align: center;
            font-family: Arial;
            font-size: 30px;
            margin: 0px;  
            display: block;
            margin-block-start: 1.33em;
            margin-block-end: 1.33em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold;
        }
        h2
        {
            font-family: Arial;
            font-size: 30px;
            padding: 0;
            margin: 10px;
            display: block;
            font-size: 1.5em;
            margin-block-start: 0.83em;
            margin-block-end: 0.83em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold
        }
        p
        {
            line-height: 130%;
            margin: 10px;
            display: block;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px
        }
        div 
        {
            display: block;
        }
        br
        {
            clear: both;
        }
</style>
  
</body>
</html>