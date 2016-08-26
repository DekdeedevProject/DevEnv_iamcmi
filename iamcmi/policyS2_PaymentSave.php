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

	echo $btn=trim($_POST['btn']);

	if($btn=="Save"){//Save Payment Information
		$premPaid=trim($_POST['payAmt4']);
		$premOutstanding=trim($_POST['premPaidBalance']) + $premPaid;
		$premPaidStatus;
		$premPaidStatusAprv;
		$premPayMethod=trim($_POST['payMet4']);
		$premPayeeName=trim($_POST['premPayeeName']);
		$premPaidBalance=trim($_POST['premPaidBalance']) + $premPaid;
		$premPaidDate='CURRENT_TIMESTAMP';
		$premUpdatedDate='CURRENT_TIMESTAMP';
		$premUpdatedBy="Admin";

		$polStatusIDFK="4";
		$premPaidStatus="P";



		$sql = "UPDATE Policy 
			JOIN premium
			ON POL_PREM_ID_FK=PREM_ID_PK 
			SET POL_Status_ID_FK	='$polStatusIDFK', -- POL_Status_ID_FK: 2=Issued
				POL_UpdatedDate 	=CURRENT_TIMESTAMP,
				POL_UpdatedBy		='$polUpdatedBy',
				PREM_Outstanding	='$polUpdatedBy',
				PREM_Outstanding='$premOutstanding',
				PREM_Paid='$premPaid',
				PREM_PaidStatus='$premPaidStatus',
				PREM_PayMethod='$premPayMethod',
				PREM_PayeeName='$premPayeeName',
				PREM_PaidBalance='$premPaidBalance',
				PREM_PaidDate='$premPaidDate',
				PREM_UpdatedDate='$premUpdatedDate',
				PREM_UpdatedBy='$premUpdatedBy'
			WHERE POL_QuoNum='$polQuoNum'"; 
		
		if ($conn->query($sql) === TRUE) {
		   echo "New record created successfully";
		} else {
		   echo "Error: " . $sql . "<br>" . $conn->error;
		}
		connClose($conn);

	}else if($btn=="Issue"){
		$polStatusIDFK="2";

		$sql = "UPDATE policy 
			SET POL_Num 			='$polQuoNum', 
				POL_Status_ID_FK	='$polStatusIDFK', -- POL_Status_ID_FK: 2=Issued
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

		redirect("policyCreateStep3.php");

	}else if($btn=="Approve"){
		$polStatusIDFK="6";
		$premPaidStatusAprv="Y";
		$premAprvComment="Test";
		$sql = "UPDATE policy 
			JOIN premium
			ON POL_PREM_ID_FK=PREM_ID_PK 
			SET POL_Status_ID_FK	='$polStatusIDFK', -- POL_Status_ID_FK: 2=Issued
				POL_UpdatedDate 	=CURRENT_TIMESTAMP,
				POL_UpdatedBy		='$polUpdatedBy',
				PREM_PaidStatusAprv='$premPaidStatusAprv',
				PREM_AprvComment='$premAprvComment',
				PREM_UpdatedDate='$premUpdatedDate',
				PREM_UpdatedBy='$premUpdatedBy'
			WHERE POL_QuoNum='$polQuoNum'"; 
		
		if ($conn->query($sql) === TRUE) {
		   echo "New record created successfully";
		} else {
		   echo "Error: " . $sql . "<br>" . $conn->error;
		}
		connClose($conn);

	}else if($btn=="Submit Payment"){//Submit Payment Information
		$polStatusIDFK="5";
		$premOutstanding=trim($_POST['premOutstanding']);
		$premPaid=trim($_POST['premPaid']);
		$premPaidStatus="Y";
		$premPayMethod=trim($_POST['premPayMethod']);
		$premPayeeName=trim($_POST['premPayeeName']);
		$premPaidBalance=trim($_POST['premPaidBalance']);
		$premPaidDate=trim($_POST['premPaidDate']);
		
		if(!empty($_POST['premPayMethod'])){
			$sql = "UPDATE policy 
			JOIN premium
			ON POL_PREM_ID_FK=PREM_ID_PK 
			SET POL_Status_ID_FK	='$polStatusIDFK', -- POL_Status_ID_FK: 2=Issued
				POL_UpdatedDate 	=CURRENT_TIMESTAMP,
				POL_UpdatedBy		='$polUpdatedBy',
				PREM_Outstanding='$premOutstanding',
				PREM_Paid='$premPaid',
				PREM_PaidStatus='$premPaidStatus',
				PREM_PayMethod='$premPayMethod',
				PREM_PayeeName='$premPayeeName',
				PREM_PaidBalance='$premPaidBalance',
				PREM_PaidDate=CURRENT_TIMESTAMP,
				PREM_UpdatedDate=CURRENT_TIMESTAMP,
				PREM_UpdatedBy='$polUpdatedBy'
			WHERE POL_QuoNum='$polQuoNum'"; 

			if ($conn->query($sql) === TRUE) {
			   echo "New record created successfully";
			} else {
			   echo "Error: " . $sql . "<br>" . $conn->error;
			}
			connClose($conn);
		}

		


	}else{
		echo "nothing happen";
	}

	redirect("policyCreateStep2.php")
?>