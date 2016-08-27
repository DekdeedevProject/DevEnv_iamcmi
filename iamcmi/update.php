<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set("Asia/Bangkok");
require_once('config/function.php'); 

echo "<meta charset='UTF-8'>";
echo "<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
echo "<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'>";

$title = "IAMCMI - ";
$homeTitle = $title."Home";
$loginTitle = $title."Login";
$policyCreate = $title."Create Policy";
$policyPayment = $title."Premium Payment";
$policyIssue = $title."Policy Issuarance";
$confirmPayment = $title."Confirm Payment";
$policySearch = $title."Search Policy";
$redbookUpdate = $title."Update Redbook Information";
$policyPrint = $title."Print Policy";

function connOpen(){
	$hostname = "localhost";
	$username = "root";
	$password = "root";
	$dbName = "testdb";
	// MySQLi Object-Oriented	
	$conn = new mysqli($hostname, $username, $password, $dbName,8889) or die("Connection failed: " . $conn->connect_error);
	$conn->query("set names utf8");
	//echo "Opened connection successfully<br>";	
	
	return $conn;
}
function connClose($conn){
	$conn->close();
	//echo "Closed connection successfully<br>";
}
function testEcho(){
	echo "test echo successfully";
}
?>