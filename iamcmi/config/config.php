<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set("Asia/Bangkok");
require_once('config/function.php'); 

$title = "IAMCMI - ";
$homeTitle = $title."Home";
$loginTitle = $title."Login";
$policyCreate = $title."Create New Policy";
$policySearch = $title."Policy Search";
$redbookUpdate = $title."Update Redbook Information";

function connOpen(){
	$hostname = "localhost";
	$username = "root";
	$password = "root";
	$dbName = "TestDB";
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