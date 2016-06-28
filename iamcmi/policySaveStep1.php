<?php 
require_once('config/config.php'); 
session_start();
$conn = connOpen();
$polQuoCreateDate=$_SESSION["startSessionDateTime"];
$polQuoNum=$_SESSION["polQuoNum"];
echo "polQuoNum: ".$polQuoNum."<br>";
$polUpdatedBy=$_SESSION["usrName"];

setPolQuoNum($polQuoNum);
$sqlID = "PSS1_001";					
$polSearchResult = executeSql($conn,$sqlID);	
if($polSearchResult){
$polSearchSize = $polSearchResult->num_rows;
echo "polSearchSize: ".$polSearchSize."<br>";
include 'config/Condition/PSS_CON_001.php';
	if($polSearchSize==0){
		// getAlertMsg("CREATE NEW POLICY");
		//Policyholder Information		
		$sqlID ="PSS1_003";
		setPolicyHolderInfo(
		// $perIDPK,
		$perSalu,
		$perFName,
		$perMName,
		$perLName,
		$perDOB,
		$perCardType,
		$perCardNo,
		$perExpDate,
		$perUpdatedDate,
		$perUpdatedBy
		);
		$perInsertResult = executeSql($conn,$sqlID);
			if ($perInsertResult){
			$perIDPK = $conn->insert_id;
			}

		$sqlID ="PSS1_005";
		setAddressInfo(
		// $addrIDPK,
		$addrLine1,
		$addrLine2,
		$addrSubDist,
		$addrDist,
		$addrProv,
		$addrZipCode,
		$addrGeo,
		$addrEmail,
		$addrContType1,
		$addrContNum1,
		$addrContType2,
		$addrContNum2,
		$addrUpdatedDate,
		$addrUpdatedBy
		);
		$addrInsertResult = executeSql($conn,$sqlID);
			if ($addrInsertResult){
			$addrIDPK = $conn->insert_id;
			}
		// POL_Status_ID_FK: 1=Quote in Progress	
		//Save process

		$sqlID ="PSS1_007";
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
		$premQuoNumRef,
		$premUpdatedDate,
		$premUpdatedBy
		);
		$premInsertResult = executeSql($conn,$sqlID);
			if ($premInsertResult){
			$premIDPK = $conn->insert_id;
			}	

		$sqlID ="PSS1_006";
		setVehicalInfo(
		// $vehIDPK,
		$vehTARIDFK,
		$vehTARVehCodeFK,
		$vehREDKEYFK,
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
		$vehQuoNumRef,
		$vehUpdatedDate,
		$vehUpdatedBy
		);
		$vehInsertResult = executeSql($conn,$sqlID);
			if ($vehInsertResult){
			$vehIDPK = $conn->insert_id;
			}	

	$sqlID ="PSS1_002";
	setPolicyInfo(
	// $polIDPK,	
	$polMasPolNum,
	$polQuoNum,
	$polNum,
	$polCat,
	$polReFlag,
	$polStatusIDFK,
	$polEffDate,
	$polExpDate,
	$polQuoCreateDate,
	$polQuoDate,
	$polProDate,
	$polAppReceivedDate,
	$polIssueDate,
	$polIssueBy,
	$polPRODIDFK,
	$polPREMIDFK=$premIDPK,
	$polCUSIDFKPHD=$perIDPK,
	$polCUSAddrIDPHD=$addrIDPK,
	$polCUSIDFKINS=$perIDPK,
	$polCUSAddrIDINS=$addrIDPK,
	$polVEHIDFK=$vehIDPK,
	$polUpdatedDate,
	$polUpdatedBy
	);
	$polInsertResult = executeSql($conn,$sqlID);
	//return 1=TRUE 0=FALSE
		if ($polInsertResult) {
		// getAlertMsg("Save successfully (PSS1_101)");
		}
	}
	else{
	echo "UPDATE EXISTING POLICY";	
	include 'config/Condition/PSS_CON_002.php';

	echo $polPREMIDFK=trim($_POST['polPREMIDFK']);
	echo $polCUSIDFKPHD=trim($_POST['polCUSIDFKPHD']);
	echo $polCUSIDFKINS=trim($_POST['polCUSIDFKINS']);
	echo $polCUSAddrIDPHD=trim($_POST['polCUSAddrIDPHD']);
	echo $polCUSAddrIDINS=trim($_POST['polCUSAddrIDINS']);
	echo $polVEHIDFK=trim($_POST['polVEHIDFK']);
	echo $vehIDPK=$polVEHIDFK;
	echo $perIDPK=$polCUSIDFKPHD;
	echo $addrIDPK=$addrIDPK;
	echo $premIDPK=$polPREMIDFK;

	$sqlID ="PSS1_008";
	$policyUpdateResult = executeSql($conn,$sqlID);
	}
}

//redirect("policyCreateStep1.php");
if($_POST['btn']=="save"){
// redirect("policyCreateStep1.php");		
echo "<a href='policyCreateStep1.php'><input type='Button' value='Next' class='btn btn-primary btn-md'/></a>";	
}
else{
// redirect("policyCreateStep2.php");
echo "<a href='policyCreateStep2.php'><input type='Button' value='Next' class='btn btn-primary btn-md'/></a>";
}
connClose($conn);

?>
