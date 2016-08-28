<?php 
session_start();
if (!isset($_SESSION["usrName"])) {
	session_destroy();
	redirect("Login.php");
}
else{	
// $conn 	= connOpen();

include 'config/config.php'; ?>
<title><?php echo $policyCreate ?></title>

<?php 
$conn= connOpen();
if(!isset($_SESSION["polQuoNum"])){ 
	echo $polQuoNum = $_SESSION["polQuoNum"];
}
else{	
// echo "<br>EXISTING FROM RELOAD/SAVED/SUBMITED&Back <br>";
echo $polQuoNum = $_SESSION["polQuoNum"];
setPolQuoNum($polQuoNum);
$sqlID			= "PCS1_003";				
$quoQueryResult = executeSql($conn,$sqlID);
	if($quoQueryResult){
	$quoQueryResultSize = $quoQueryResult->num_rows;
		if($quoQueryResultSize==0){
			echo $sql = "DELETE FROM policyReserve
					WHERE POL_RES_QuoNo='".$polQuoNum."';";
			$qresult = $conn->query($sql);
			if ( $qresult == TRUE) {
				echo "DELETE SUCCESSFULLY";
			}	
			else{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			redirect("home.php");
		}
		else if($quoQueryResultSize==1){
			
			
		}
		else{
		// echo "RECORDS MORE THAN ONE ROW";
		}
	}
}	
}
?>
