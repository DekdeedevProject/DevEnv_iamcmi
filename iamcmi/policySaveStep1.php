<?php 
require_once('config/config.php'); 
session_start();
$conn = connOpen();
include 'config/Condition/PSS_CON_001.php';
$startDatetime=$_SESSION["startSessionDateTime"];
echo $polQuoNum=$_SESSION["polQuoNum"];
$updatedBy=$_SESSION["usrName"];

setPolQuoNum($polQuoNum);
$sqlID = "PSS1_001";					
$polSearchResult = executeSql($conn,$sqlID);	

if($polSearchResult){
$polSearchSize = $polSearchResult->num_rows;
echo "polQuoNum: ".$polQuoNum."<br>";
echo "polSearchSize: ".$polSearchSize."<br>";
	if($polSearchSize==0){
		// // getAlertMsg("CREATE NEW POLICY");
		// //Policyholder Information		
		$sqlID ="PSS1_003";
		setPolicyHolderInfo(
		$PHD_perSalu,
		$PHD_perFName,
		$PHD_perMName,
		$PHD_perLName,
		$PHD_perDOB,
		$PHD_perCardType,
		$PHD_perCardNo,
		$PHD_perExpDate,
		$PHD_perUpdatedDate='CURRENT_TIMESTAMP',
		$PHD_perUpdatedBy=$updatedBy
		);

		$perInsertResult = executeSql($conn,$sqlID);
			if ($perInsertResult){
			$perIDPK = $conn->insert_id;
			}

		$sqlID ="PSS1_005";
		setAddressInfo(
		// $PHD_addrIDPK,
		$PHD_addrLine1,
		$PHD_addrLine2,
		$PHD_addrSubDist,
		$PHD_addrDist,
		$PHD_addrProv,
		$PHD_addrZipCode,
		$PHD_addrGeo,
		$PHD_addrEmail,
		$PHD_addrContType1,
		$PHD_addrContNum1,
		$PHD_addrContType2,
		$PHD_addrContNum2,
		$PHD_addrUpdatedDate='CURRENT_TIMESTAMP',
		$PHD_addrUpdatedBy=$updatedBy
		);
		$addrInsertResult = executeSql($conn,$sqlID);
			if ($addrInsertResult){
			$addrIDPK = $conn->insert_id;
			}

	$sqlID ="PSS1_007";
	if($premDiscountFlag=='Y'){

	}
	else{
	$premNet=$premStdNet;
	$premStampDuty=$premStdVat;
	$premVat=$premStdStampDuty;
	$premTotal=$premStdTotal;
	}
	setPremiumInfo(
	// $premIDPK,
	$premStdNet,
	$premStdVat,
	$premStdStampDuty,
	$premStdTotal,
	$premPercentVat,
	$premPerDiscount,
	$premDiscountFlag,
	$premDiscount,
	$premNet,
	$premStampDuty,
	$premVat,
	$premTotal,
	$premQuoNumRef=$polQuoNum,
	$premOutstanding=-($premTotal),
	$premPaid,
	$premPaidStatus,
	$premPaidStatusAprv,
	$premPaidBalance=$premPaid+$premOutstanding,
	$premPaidDate,
	$premUpdatedDate='CURRENT_TIMESTAMP',
	$premUpdatedBy=$updatedBy
	);
	$premInsertResult = executeSql($conn,$sqlID);
		if ($premInsertResult){
		$premIDPK = $conn->insert_id;
		}	

	$sqlID ="PSS1_006";
	setVehicalInfo(
	$vehIDPK="",
	$vehTARIDFK,
	$vehTARvehCodeFK,
	$vehREDKEYFK=$redKey,
	$vehLicenseNum,
	$vehChassisNum,
	$vehCapacity,
	$vehSeat,
	$vehWeight,
	$vehEngineNum,
	$vehNewCar,
	$vehDriveArea,
	$vehProvIDFK,
	$vehColor,
	$vehCountry,
	$vehQuoNumRef=$polQuoNum,
	$vehUpdatedDate='CURRENT_TIMESTAMP',
	$vehUpdatedBy=$updatedBy
	);
	$vehInsertResult = executeSql($conn,$sqlID);
		if ($vehInsertResult){
		$vehIDPK = $conn->insert_id;
		}	

	$sqlID ="PSS1_002";
	setPolicyInfo(
	// $polPREMIDFK=$premIDPK,
	// $polCUSIDFKPHD=$perIDPK,
	// $polCUSAddrIDPHD=$addrIDPK,
	// $polCUSIDFKINS=$perIDPK,
	// $polCUSAddrIDINS=$addrIDPK,
	$polIDPK,
	$polOrgIDFK,
	$polStatusIDFK,
	$polMaspolNum,
	$polQuoNum,
	$polNum,
	$polCat,
	$polReFlag,
	$polEffDate,
	$polExpDate,
	$polQuoCreateDate=$startDatetime,
	$polQuoDate='CURRENT_TIMESTAMP',
	$polProDate,
	$polAppReceivedDate,
	$polIssueDate,
	$polIssueBy=$updatedBy,
	$polAGTIDFK,
	$polPRODIDFK,
	$polPREMIDFK=$premIDPK,
	$polCUSIDFKPHD=$perIDPK,
	$polCUSAddrIDPHD=$addrIDPK,
	$polCUSIDFKINS=$perIDPK,
	$polCUSAddrIDINS=$addrIDPK,
	$polVEHIDFK=$vehIDPK,
	$polUpdatedDate='CURRENT_TIMESTAMP',
	$polUpdatedBy=$updatedBy
	);
	$polInsertResult = executeSql($conn,$sqlID);
		//return 1=TRUE 0=FALSE
		if ($polInsertResult) {
		getAlertMsg("Save successfully (".$sqlID.")");
		}
	}
	else{
	echo "UPDATE EXISTING POLICY";	

	$sqlID ="PSS1_007";
	if($premDiscountFlag=='Y'){

	}
	else{
	$premNet=$premStdNet;
	$premStampDuty=$premStdVat;
	$premVat=$premStdStampDuty;
	$premTotal=$premStdTotal;
	}
	setPolicyUpdate(
		$polIDPK,
		$polOrgIDFK,
		$polStatusIDFK,
		$polMaspolNum,
		$polQuoNum,
		$polNum,
		$polCat,
		$polReFlag,
		$polEffDate,
		$polExpDate,
		$polQuoCreateDate,
		$polQuoDate='CURRENT_TIMESTAMP',
		$polProDate,
		$polAppReceivedDate,
		$polIssueDate,
		$polIssueBy,
		$polAGTIDFK,
		$polPRODIDFK,
		$polPREMIDFK,
		$polCUSIDFKPHD,
		$polCUSAddrIDPHD,
		$polCUSIDFKINS,
		$polCUSAddrIDINS,
		$polVEHIDFK,
		$polUpdatedDate='CURRENT_TIMESTAMP',
		$polUpdatedBy=$updatedBy,

		$premStdNet,
		$premStdVat,
		$premStdStampDuty,
		$premStdTotal,
		$premPercentVat,
		$premPerDiscount,
		$premDiscountFlag,
		$premDiscount,
		$premNet,
		$premStampDuty,
		$premVat,
		$premTotal,
		$premQuoNumRef=$polQuoNum,
		$premOutstanding=-($premTotal),
		$premPaid,
		$premPaidStatus,
		$premPaidStatusAprv,
		$premPaidBalance=$premPaid+$premOutstanding,
		$premPaidDate,

		$PHD_perIDPK,
		$PHD_perSalu,
		$PHD_perFName,
		$PHD_perMName,
		$PHD_perLName,
		$PHD_perDOB,
		$PHD_perCardType,
		$PHD_perCardNo,
		$PHD_perExpDate,
		$PHD_perUpdatedDate='CURRENT_TIMESTAMP',
		$PHD_perUpdatedBy=$updatedBy,
		$PHD_addrIDPK,
		$PHD_addrLine1,
		$PHD_addrLine2,
		$PHD_addrSubDist,
		$PHD_addrDist,
		$PHD_addrProv,
		$PHD_addrZipCode,
		$PHD_addrGeo,
		$PHD_addrEmail,
		$PHD_addrContType1,
		$PHD_addrContNum1,
		$PHD_addrContType2,
		$PHD_addrContNum2,
		$PHD_addrUpdatedDate='CURRENT_TIMESTAMP',
		$PHD_addrUpdatedBy=$updatedBy,

		$vehTARIDFK,
		$vehTARvehCodeFK,
		$vehREDKEYFK=$redKey,
		$vehLicenseNum,
		$vehChassisNum,
		$vehCapacity,
		$vehSeat,
		$vehWeight

	);
	$sqlID ="PSS1_008";
	$policyUpdateResult = executeSql($conn,$sqlID);
	}
}

//redirect("policyCreateStep1.php");
if($_POST['btn']=="Save"){
// redirect("policyCreateStep1.php");		
echo "<a href='policyCreateStep1.php'><input type='Button' value='Next' class='btn btn-primary btn-md'/></a>";	
}
else{
// redirect("policyCreateStep2.php");
echo "<a href='policyCreateStep2.php'><input type='Button' value='Next' class='btn btn-primary btn-md'/></a>";
}
connClose($conn);

?>
