<?php 
include 'config/config.php'; 
$conn = connOpen();
session_start();
unset($_SESSION["polQuoNum"]);
echo "QuoNo: ".$_GET['polQuoNum'];
echo "QuoStatus: ".$status=$_GET['polStatusIDFK'];
switch ($status) {
	case '1':
	//Status: Quote in Progress
	$_SESSION["polQuoNum"] = $_GET['polQuoNum'];
	redirect("policyS1_Create.php");
	// echo "<a href='policyS2_Payment.php'><input type='Button' value='Next' class='btn btn-primary btn-md'/></a>";
	break;
	case '2':
	//Status: Policy Issued
	$_SESSION["polQuoNum"] = $_GET['polQuoNum'];
	redirect("policyS3_Issue.php");
	// echo "<a href='policyS3_Issue.php'><input type='Button' value='Next' class='btn btn-primary btn-md'/></a>";
	break;
	case '3':
	// redirect("#.php");
	// echo "<a href='#.php'><input type='Button' value='Next' class='btn btn-primary btn-md'/></a>";
	break;
	case '4':
	case '5':
	case '6':
	//Status: Payment in Progress
	$_SESSION["polQuoNum"] = $_GET['polQuoNum'];
	redirect("policyS2_Payment.php");
	// echo "<a href='policyS2_Payment.php'><input type='Button' value='Next' class='btn btn-primary btn-md'/></a>";
	break;

	default:
	redirect("home.php");
	// echo "<a href='home.php'><input type='Button' value='Next' class='btn btn-primary btn-md'/></a>";
	break;
}


?>