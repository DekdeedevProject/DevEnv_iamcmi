<?php 
	require_once('config/config.php'); 
	session_start();
?>

<?php 
	$conn = connOpen();
	// $sql = "SELECT POL_MasPolNum, POL_QuoNum
	// 		FROM Policy p1
	// 		WHERE p1.POL_ID_PK= (SELECT COUNT(*) FROM Policy p2);";
	
	$polQuoNum = $_SESSION["polQuoNum"];
	$polUpdatedBy	= $_SESSION["usrName"];

	echo $polIDPK=trim($_POST['payMet4']);
	echo $polIDPK=trim($_POST['payAmt4']);

	$sql = "UPDATE Policy 
			SET POL_Num 			='$polQuoNum', 
				POL_Status_ID_FK	='4', -- POL_Status_ID_FK: 2=Issued
				POL_IssueDate		=CURRENT_TIMESTAMP,
				POL_IssueBy			='$polUpdatedBy',
				POL_UpdatedDate 	=CURRENT_TIMESTAMP,
				POL_UpdatedBy		='$polUpdatedBy'
			WHERE POL_QuoNum='$polQuoNum'"; 
		
	if ($conn->query($sql) === TRUE) {
	   echo "New record created successfully";
	} else {
	   echo "Error: " . $sql . "<br>" . $conn->error;
	}
	connClose($conn);
	// redirect("policyCreateStep2.php")
?>