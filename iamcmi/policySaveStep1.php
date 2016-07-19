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
		// $sqlID ="PSS1_003";
		// setPolicyHolderInfo(
		// // $perIDPK,
		// $perSalu,
		// $perFName,
		// $perMName,
		// $perLName,
		// $perDOB,
		// $perCardType,
		// $perCardNo,
		// $perExpDate,
		// $perUpdatedDate,
		// $perUpdatedBy
		// );
		// $perInsertResult = executeSql($conn,$sqlID);
		// 	if ($perInsertResult){
		// 	$perIDPK = $conn->insert_id;
		// 	}

		// $sqlID ="PSS1_005";
		// setAddressInfo(
		// // $addrIDPK,
		// $addrLine1,
		// $addrLine2,
		// $addrSubDist,
		// $addrDist,
		// $addrProv,
		// $addrZipCode,
		// $addrGeo,
		// $addrEmail,
		// $addrContType1,
		// $addrContNum1,
		// $addrContType2,
		// $addrContNum2,
		// $addrUpdatedDate,
		// $addrUpdatedBy
		// );
		// $addrInsertResult = executeSql($conn,$sqlID);
		// 	if ($addrInsertResult){
		// 	$addrIDPK = $conn->insert_id;
		// 	}
		// // POL_Status_ID_FK: 1=Quote in Progress	
		// //Save process

		// $sqlID ="PSS1_007";
		// setPremiumInfo(
		// // $premIDPK,
		// $premStdNet,
		// $premStdVat,
		// $premStdStampDuty,
		// $premStdTotal,
		// $premPercentVat,
		// $premPerDiscount,
		// $premDiscountFlag,
		// $premDiscount,
		// $premNet,
		// $premStampDuty,
		// $premVat,
		// $premTotal,
		// $premQuoNumRef,
		// $premOutstanding,
		// $premPaid,
		// $premPaidStatus,
		// $premPaidStatusAprv,
		// $premPaidBalance,
		// $premPaidDate,
		// $premUpdatedDate,
		// $premUpdatedBy
		// );
		// $premInsertResult = executeSql($conn,$sqlID);
		// 	if ($premInsertResult){
		// 	$premIDPK = $conn->insert_id;
		// 	}	

	$sqlID ="PSS1_006";
	setVehicalInfo(
	$vehIDPK="",
	$vehTARIDFK="",
	$vehTARvehCodeFK="",
	$vehREDKEYFK=$redKey,
	$vehLicenseNum="",
	$vehChassisNum="",
	$vehCapacity="",
	$vehSeat="",
	$vehWeight="",
	$vehEngineNum="",
	$vehNewCar="",
	$vehDriveArea="",
	$vehProvIDFK="",
	$vehColor="",
	$vehCountry="",
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
	$polPREMIDFK,
	$polCUSIDFKPHD,
	$polCUSAddrIDPHD,
	$polCUSIDFKINS,
	$polCUSAddrIDINS,
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

		$vehREDKEYFK=$redKey
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
