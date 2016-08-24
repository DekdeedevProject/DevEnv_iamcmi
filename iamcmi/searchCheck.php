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
	redirect("policyCreateStep1.php");
	// echo "<a href='policyCreateStep2.php'><input type='Button' value='Next' class='btn btn-primary btn-md'/></a>";
	break;
	case '2':
	//Status: Policy Issued
	$_SESSION["polQuoNum"] = $_GET['polQuoNum'];
	redirect("policyCreateStep3.php");
	// echo "<a href='policyCreateStep3.php'><input type='Button' value='Next' class='btn btn-primary btn-md'/></a>";
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
	redirect("policyCreateStep2.php");
	// echo "<a href='policyCreateStep2.php'><input type='Button' value='Next' class='btn btn-primary btn-md'/></a>";
	break;

	default:
	redirect("home.php");
	// echo "<a href='home.php'><input type='Button' value='Next' class='btn btn-primary btn-md'/></a>";
	break;
}


?>