<?php
$hostname = "localhost";
$username = "root";
$password = "root";
$dbName   = "testdb";
// MySQLi Object-Oriented	
$conn = new mysqli($hostname, $username, $password, $dbName,8889) or die("Connection failed: " . $conn->connect_error);
$sql = "CALL searchPolicy()";
$result = $conn->query($sql);
echo $resultSize 	= $result->num_rows;


?>