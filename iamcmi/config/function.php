<?php
function getNewPolicyNo($orgPolPrefix, $orgPolLength, $polNo){
$polPrefix = $orgPolPrefix;
$polLength = $orgPolLength;
	
if(!is_null($polNo)){
	$polNo = trim($polNo,$polPrefix)+1;
}
else{
	$polNo = 1;
}

$addZero = $polLength - (strlen($polPrefix) + strlen($polNo));
$newPolNo = $polPrefix;
while($addZero >= 0){
	$newPolNo = $newPolNo."0";
	$addZero--;
}
$polNo = $newPolNo.$polNo;

return $polNo;

}

function redirect($url)
{
   $baseUri;
 echo $baseUri;
 if(headers_sent())
 {
     $string = '<script type="text/javascript">';
     $string .= 'window.location = "' . $baseUri.$url . '"';
     $string .= '</script>';
     echo $string;
 }
 else
 {
 if (isset($_SERVER['HTTP_REFERER']) AND ($url == $_SERVER['HTTP_REFERER']))
     header('Location: '.$_SERVER['HTTP_REFERER']);
 else
     header('Location: '.$baseUri.$url);
  }
  exit;
}

function getAlertMsg($msg){
$message="No message";
switch ($msg) {
	case '1100':
	$message="Saved successfully";
	break;
	case '1200':
	$message="Updated successfully";
	break;
	case '0100':
	$message="Error 001: Save failure!!!";
	break;
	case '0200':
	$message="Error 001: Update failure!!!";
	break;
	default:
	$message=$msg;
	break;
}
echo "<script type='text/javascript'>confirm('$message');</script>";
}

function executeSql($conn,$sqlID){
$sql=getSql($sqlID);	
$result = $conn->query($sql);
if(!$result){	
getAlertMsg("Error (".$sqlID.")");	
}
//return 1=TRUE, 0=FALSE
return $result;
}

function getSql($sqlID){
$sql="";
	switch ($sqlID) {
	case 'LOGIN_001':
	$accUser=$GLOBALS['accUser'];
	$accPass=$GLOBALS['accPass'];
	$sql = "	SELECT * 
			FROM Account
			WHERE ACC_User='".$accUser."' 
			AND ACC_Pass='".$accPass."';";
	break;

	case 'PCS1_020':
	$polOrgIDFK = $GLOBALS['polOrgIDFK'];
	$sql = "SELECT * 
			FROM Organization
			WHERE ORG_ID_PK='".$polOrgIDFK."'
			LIMIT 1;";
	break;

	case 'PCS1_021':
	$usrName = $GLOBALS['usrName'];
	$usrRole = $GLOBALS['usrRole'];
    $sql = "SELECT *
				FROM agent
				JOIN account
					ON AGT_ACC_ID_FK=ACC_ID_PK
				WHERE ACC_User='".$usrName."' AND ACC_Role='".$usrRole."';";
	break;

	case 'PCS1_022':
	$orgIDPK=$GLOBALS['orgIDPK'];
    $sql = "SELECT *
			FROM organization
			WHERE ORG_ID_PK='".$orgIDPK."'";
	break;

	case 'PCS1_023':
	$polStatusIDFK=$GLOBALS['polStatusIDFK'];
    $sql = "SELECT *
			FROM t_status
			WHERE STA_ID_PK='".$polStatusIDFK."'";
	break;

	case 'PCS1_024':
	$redKey=$GLOBALS['redKey'];
    $sql = "SELECT *
			FROM t_redbook
			WHERE RED_Key='".$redKey."'";
	break;
	
	case 'PCS1_001':
	$polOrgIDFK = $GLOBALS['polOrgIDFK'];
	$sql = "SELECT POL_ID_PK, POL_QuoNum, POL_Org_ID_FK 
			FROM policy
			WHERE POL_Org_ID_FK='".$polOrgIDFK."'
			ORDER BY POL_ID_PK DESC
			LIMIT 1;";
	break;

	case 'PCS1_002':
	$sql 	= "	SELECT * 
				FROM T_provinces
				ORDER BY PROVINCE_NAME;";
	break;

	case 'PCS1_003':
	$polQuoNum = $GLOBALS['polQuoNum'];
	$sql = "SELECT * 
			FROM policy 
			INNER JOIN organization
				ON POL_Org_ID_FK=ORG_ID_PK
			INNER JOIN t_status
				ON POL_Status_ID_FK=STA_ID_PK
			INNER JOIN agent
				ON POL_AGT_ID_FK=AGT_ID_PK
			INNER JOIN vehical 
				ON POL_VEH_ID_FK=VEH_ID_PK	
			INNER JOIN t_redbook
				ON VEH_RED_KEY_FK=RED_KEY	
			-- INNER JOIN T_PolStatus 
			-- 	ON POL_Status_ID_PK=POL_Status_ID_FK 
			-- INNER JOIN Vehical 
			-- 	ON VEH_ID_PK=POL_VEH_ID_FK	
			-- INNER JOIN Personal 
			-- 	ON PER_ID_PK=POL_CUS_ID_FK_INS 
			-- INNER JOIN Address 
			-- 	ON ADDR_ID_PK=POL_CUS_Addr_ID_INS	
			-- INNER JOIN Redbook
			-- 	ON RED_KEY=VEH_RED_KEY_FK
			-- INNER JOIN T_Tariff
			-- 	ON TAR_ID_PK=VEH_TAR_ID_FK
			-- INNER JOIN Premium
			-- 	ON PREM_ID_PK=POL_PREM_ID_FK	
			WHERE POL_QuoNum='".$polQuoNum."';";
	break;
	case 'PSS1_001':
	$polQuoNum = $GLOBALS['polQuoNum'];
	$sql = "SELECT * 
			FROM policy 
			WHERE POL_QuoNum='".$polQuoNum."';";
	break;

	case 'PSS1_002':
	$polIDPK=$GLOBALS['polIDPK'];
	$polOrgIDFK=$GLOBALS['polOrgIDFK'];
	$polStatusIDFK=$GLOBALS['polStatusIDFK'];
	$polMaspolNum=$GLOBALS['polMaspolNum'];
	$polQuoNum=$GLOBALS['polQuoNum'];
	$polNum=$GLOBALS['polNum'];
	$polCat=$GLOBALS['polCat'];
	$polReFlag=$GLOBALS['polReFlag'];
	$polEffDate=$GLOBALS['polEffDate'];
	$polExpDate=$GLOBALS['polExpDate'];
	$polQuoCreateDate=$GLOBALS['polQuoCreateDate'];
	$polQuoDate=$GLOBALS['polQuoDate'];
	$polProDate=$GLOBALS['polProDate'];
	$polAppReceivedDate=$GLOBALS['polAppReceivedDate'];
	$polIssueDate=$GLOBALS['polIssueDate'];
	$polIssueBy=$GLOBALS['polIssueBy'];
	$polAGTIDFK=$GLOBALS['polAGTIDFK'];
	$polPRODIDFK=$GLOBALS['polPRODIDFK'];
	$polPREMIDFK=$GLOBALS['polPREMIDFK'];
	$polCUSIDFKPHD=$GLOBALS['polCUSIDFKPHD'];
	$polCUSAddrIDPHD=$GLOBALS['polCUSAddrIDPHD'];
	$polCUSIDFKINS=$GLOBALS['polCUSIDFKINS'];
	$polCUSAddrIDINS=$GLOBALS['polCUSAddrIDINS'];
	$polVEHIDFK=$GLOBALS['polVEHIDFK'];
	$polUpdatedDate=$GLOBALS['polUpdatedDate'];
	$polUpdatedBy=$GLOBALS['polUpdatedBy'];
	echo $sql ="	INSERT INTO policy (
				POL_Org_ID_FK,
				POL_Status_ID_FK,
				POL_MasPolNum,
				POL_QuoNum,
				POL_Num,
				POL_Cat,
				POL_ReFlag,
				POL_EffDate,
				POL_ExpDate,
				POL_QuoCreateDate,
				POL_QuoDate,
				POL_ProDate,
				POL_AppReceivedDate,
				POL_IssueDate,
				POL_IssueBy,
				POL_AGT_ID_FK,
				POL_PROD_ID_FK,
				POL_PREM_ID_FK,
				POL_CUS_ID_FK_PHD,
				POL_CUS_Addr_ID_PHD,
				POL_CUS_ID_FK_INS,
				POL_CUS_Addr_ID_INS,
				POL_VEH_ID_FK,
				POL_UpdatedDate,
				POL_UpdatedBy
			)
			VALUES (		
				'$polOrgIDFK',
				'$polStatusIDFK',
				'$polMaspolNum',
				'$polQuoNum',
				'$polNum',
				'$polCat',
				'$polReFlag',
				'$polEffDate',
				'$polExpDate',
				'$polQuoCreateDate',
				$polQuoDate,
				'$polProDate',
				'$polAppReceivedDate',
				'$polIssueDate',
				'$polIssueBy',
				'$polAGTIDFK',
				'$polPRODIDFK',
				'$polPREMIDFK',
				'$polCUSIDFKPHD',
				'$polCUSAddrIDPHD',
				'$polCUSIDFKINS',
				'$polCUSAddrIDINS',
				'$polVEHIDFK',
				$polUpdatedDate,
				'$polUpdatedBy'
			)"; 
	break;

	case 'PCS1_004':
	$sql 	= "	SELECT * 
				FROM T_AddrContType
				ORDER BY ADDR_ContType_ID_PK;";
	break;

	case 'PCS1_005':
	$sql 	= "	SELECT * 
				FROM T_PerCardType
				ORDER BY PER_CardType_ID_PK;";
	break;

	case 'PSS1_003':
	$perSalu 	= 	$GLOBALS['perSalu'];
	$perFName 	=	$GLOBALS['perFName'];
	$perMName 	=	$GLOBALS['perMName'];
	$perLName   =	$GLOBALS['perLName'];
	$perDOB 	= 	$GLOBALS['perDOB'];
	$perCardType= 	$GLOBALS['perCardType'];
	$perCardNo 	= 	$GLOBALS['perCardNo'];
	$perExpDate =	$GLOBALS['perExpDate'];
	$perUpdatedDate =	$GLOBALS['perUpdatedDate'];
	$perUpdatedBy	= 	$GLOBALS['polUpdatedBy'];
	$sql =" INSERT INTO Personal (
				PER_Salu,
				PER_FName,
				PER_MName,
				PER_LName,
				PER_DOB,
				PER_CardType,
				PER_CardNo,
				PER_ExpDate,
				PER_UpdatedDate,
				PER_UpdatedBy
			)
			VALUES (
				'$perSalu',
				'$perFName',
				'$perMName',
				'$perLName',
				'$perDOB',
				'$perCardType',
				'$perCardNo',
				'$perExpDate',
				'$perUpdatedDate',
				'$perUpdatedBy'
			)"; 
	break;

	case 'PSS1_004':
	$cusIDFKINS = $GLOBALS['cusIDFKINS'];
	$cusIDFKPHD = $GLOBALS['cusIDFKINS'];
	$cusAddrIDINS = $GLOBALS['cusAddrIDINS'];
	$cusAddrIDPHD = $GLOBALS['cusAddrIDINS'];
	$polIDPK = $GLOBALS['polIDPK'];
	$polVehIDFK=$GLOBALS['polVehIDFK'];
	$sql ="	UPDATE policy
			SET CUS_ID_FK_INS='$cusIDFKINS',
				CUS_Addr_ID_INS='$cusAddrIDINS',
				CUS_ID_FK_PHD='$cusIDFKPHD',
				CUS_Addr_ID_PHD='$cusAddrIDPHD',
				VEH_ID_FK='$polVehIDFK'
			WHERE POL_ID_PK='$polIDPK'";
	break;

	case 'PSS1_005':
	$addrLine1=$GLOBALS['addrLine1'];
	$addrLine2=$GLOBALS['addrLine2'];
	$addrSubDist=$GLOBALS['addrSubDist'];
	$addrDist=$GLOBALS['addrDist'];
	$addrProv=$GLOBALS['addrProv'];
	$addrZipCode=$GLOBALS['addrZipCode'];
	$addrGeo=$GLOBALS['addrGeo'];
	$addrEmail=$GLOBALS['addrEmail'];
	$addrContType1=$GLOBALS['addrContType1'];
	$addrContNum1=$GLOBALS['addrContNum1'];
	$addrContType2=$GLOBALS['addrContType2'];
	$addrContNum2=$GLOBALS['addrContNum2'];
	$addrUpdatedDate=$GLOBALS['addrUpdatedDate'];
	$addrUpdatedBy=$GLOBALS['addrUpdatedBy'];

	$sql =" INSERT INTO Address (
			ADDR_Line1, 
			ADDR_Line2, 
			ADDR_SubDist, 
			ADDR_Dist, 
			ADDR_Prov, 
			ADDR_ZipCode, 
			ADDR_Geo, 
			ADDR_Email, 
			ADDR_ContType1, 
			ADDR_ContNum1,
			ADDR_ContType2, 
			ADDR_ContNum2, 
			ADDR_UpdatedDate,
			ADDR_UpdatedBy
		)
		VALUES (
  			'$addrLine1', 
  			'$addrLine2', 
  			'$addrSubDist', 
  			'$addrDist', 
  			'$addrProv', 
  			'$addrZipCode', 
  			'$addrGeo', 
  			'$addrEmail', 
  			'$addrContType1', 
  			'$addrContNum1',
  			'$addrContType2', 
  			'$addrContNum2', 
  			'$addrUpdatedDate',
  			'$addrUpdatedBy'
		)"; 
	break;
	case 'PSS1_006':
	echo "PSS1_006";
	$vehIDPK=$GLOBALS['vehIDPK'];
	$vehTARIDFK=$GLOBALS['vehTARIDFK'];
	$vehTARVehCodeFK=$GLOBALS['vehTARVehCodeFK'];
	$vehREDKEYFK=$GLOBALS['vehREDKEYFK'];
	$vehLicenseNum=$GLOBALS['vehLicenseNum'];
	$vehChassisNum=$GLOBALS['vehChassisNum'];
	$vehCapacity=$GLOBALS['vehCapacity'];
	$vehSeat=$GLOBALS['vehSeat'];
	$vehWeight=$GLOBALS['vehWeight'];
	$vehEngineNum=$GLOBALS['vehEngineNum'];
	$vehNewCar=$GLOBALS['vehNewCar'];
	$vehDriveArea=$GLOBALS['vehDriveArea'];
	$vehProvIDFK=$GLOBALS['vehProvIDFK'];
	$vehColor=$GLOBALS['vehColor'];
	$vehCountry=$GLOBALS['vehCountry'];
	$vehQuoNumRef=$GLOBALS['vehQuoNumRef'];
	$vehUpdatedDate=$GLOBALS['vehUpdatedDate'];
	$vehUpdatedBy=$GLOBALS['vehUpdatedBy'];

	echo $sql="INSERT INTO vehical (
			VEH_TAR_ID_FK,
			VEH_TAR_VehCode_FK,
			VEH_RED_KEY_FK,
			VEH_LicenseNum,
			VEH_ChassisNum,
			VEH_Capacity,
			VEH_Seat,
			VEH_Weight,
			VEH_EngineNum,
			VEH_NewCar,
			VEH_DriveArea,
			VEH_Prov_ID_FK,
			VEH_Color,
			VEH_Country,
			VEH_QuoNumRef,
			VEH_UpdatedDate,
			VEH_UpdatedBy
		)
		VALUES (
			'$vehTARIDFK',
			'$vehTARVehCodeFK',
			'$vehREDKEYFK',
			'$vehLicenseNum',
			'$vehChassisNum',
			'$vehCapacity',
			'$vehSeat',
			'$vehWeight',
			'$vehEngineNum',
			'$vehNewCar',
			'$vehDriveArea',
			'$vehProvIDFK',
			'$vehColor',
			'$vehCountry',
			'$vehQuoNumRef',
			$vehUpdatedDate,
			'$vehUpdatedBy'
		)"; 
	break;

	case 'PSS1_007':
	// $premIDPK=$GLOBALS['premIDPK'];
	$premStdNet=$GLOBALS['premStdNet'];
	$premStdVat=$GLOBALS['premStdVat'];
	$premStdStampDuty=$GLOBALS['premStdStampDuty'];
	$premStdTotal=$GLOBALS['premStdTotal'];
	$premPercentVat=$GLOBALS['premPercentVat'];
	$premPerDiscount=$GLOBALS['premPerDiscount'];
	$premDiscountFlag=$GLOBALS['premDiscountFlag'];
	$premDiscount=$GLOBALS['premDiscount'];
	$premNet=$GLOBALS['premNet'];
	$premStampDuty=$GLOBALS['premStampDuty'];
	$premVat=$GLOBALS['premVat'];
	$premTotal=$GLOBALS['premTotal'];
	$premQuoNumRef=$GLOBALS['premQuoNumRef'];
	$premOutstanding=$GLOBALS['premOutstanding'];
	$premPaid=$GLOBALS['premPaid'];
	$premPaidStatus=$GLOBALS['premPaidStatus'];
	$premPaidStatusAprv=$GLOBALS['premPaidStatusAprv'];
	$premPaidBalance=$GLOBALS['premPaidBalance'];
	$premPaidDate=$GLOBALS['premPaidDate'];
	$premUpdatedDate=$GLOBALS['premUpdatedDate'];
	$premUpdatedBy=$GLOBALS['premUpdatedBy'];
	echo $sql =" INSERT INTO Premium (
				PREM_StdNet,
				PREM_StdVat,
				PREM_StdStampDuty,
				PREM_StdTotal,
				PREM_PercentVat,
				PREM_PerDiscount,
				PREM_DiscountFlag,
				PREM_Discount,
				PREM_Net,
				PREM_StampDuty,
				PREM_Vat,
				PREM_Total,
				PREM_QuoNumRef,
				PREM_Outstanding,
				PREM_Paid,
				PREM_PaidStatus,
				PREM_PaidStatusAprv,
				PREM_PaidBalance,
				PREM_PaidDate,
				PREM_UpdatedDate,
				PREM_UpdatedBy
			)
			VALUES (
				'$premStdNet',
				'$premStdVat',
				'$premStdStampDuty',
				'$premStdTotal',
				'$premPercentVat',
				'$premPerDiscount',
				'$premDiscountFlag',
				'$premDiscount',
				'$premNet',
				'$premStampDuty',
				'$premVat',
				'$premTotal',
				'$premQuoNumRef',
				'$premOutstanding',
				'$premPaid',
				'$premPaidStatus',
				'$premPaidStatusAprv',
				'$premPaidBalance',
				'$premPaidDate',
				'$premUpdatedDate',
				'$premUpdatedBy'
			)"; 
	break;

	case 'PSS1_008':
	$polIDPK=$GLOBALS['polIDPK'];
	$polOrgIDFK=$GLOBALS['polOrgIDFK'];
	$polStatusIDFK=$GLOBALS['polStatusIDFK'];
	$polMaspolNum=$GLOBALS['polMaspolNum'];
	$polQuoNum=$GLOBALS['polQuoNum'];
	$polNum=$GLOBALS['polNum'];
	$polCat=$GLOBALS['polCat'];
	$polReFlag=$GLOBALS['polReFlag'];
	$polEffDate=$GLOBALS['polEffDate'];
	$polExpDate=$GLOBALS['polExpDate'];
	$polQuoCreateDate=$GLOBALS['polQuoCreateDate'];
	$polQuoDate=$GLOBALS['polQuoDate'];
	$polProDate=$GLOBALS['polProDate'];
	$polAppReceivedDate=$GLOBALS['polAppReceivedDate'];
	$polIssueDate=$GLOBALS['polIssueDate'];
	$polIssueBy=$GLOBALS['polIssueBy'];
	$polAGTIDFK=$GLOBALS['polAGTIDFK'];
	$polPRODIDFK=$GLOBALS['polPRODIDFK'];
	$polPREMIDFK=$GLOBALS['polPREMIDFK'];
	$polCUSIDFKPHD=$GLOBALS['polCUSIDFKPHD'];
	$polCUSAddrIDPHD=$GLOBALS['polCUSAddrIDPHD'];
	$polCUSIDFKINS=$GLOBALS['polCUSIDFKINS'];
	$polCUSAddrIDINS=$GLOBALS['polCUSAddrIDINS'];
	$polVEHIDFK=$GLOBALS['polVEHIDFK'];
	$polUpdatedDate=$GLOBALS['polUpdatedDate'];
	$polUpdatedBy=$GLOBALS['polUpdatedBy'];

	$vehREDKEYFK= $GLOBALS['vehREDKEYFK'] ;
	echo $sql ="	UPDATE policy 
				JOIN vehical
				ON POL_VEH_ID_FK=VEH_ID_PK
				SET 
				POL_Org_ID_FK='$polOrgIDFK',
				POL_Status_ID_FK='$polStatusIDFK',
				POL_MasPolNum='$polMaspolNum',
				POL_QuoNum='$polQuoNum',
				POL_Num='$polNum',
				POL_Cat='$polCat',
				POL_ReFlag='$polReFlag',
				POL_EffDate='$polEffDate',
				POL_ExpDate='$polExpDate',
				POL_QuoCreateDate='$polQuoCreateDate',
				POL_QuoDate=$polQuoDate,
				POL_ProDate='$polProDate',
				POL_AppReceivedDate='$polAppReceivedDate',
				POL_IssueDate='$polIssueDate',
				POL_IssueBy='$polIssueBy',
				POL_AGT_ID_FK='$polAGTIDFK',
				POL_PROD_ID_FK='$polPRODIDFK',
				POL_PREM_ID_FK='$polPREMIDFK',
				POL_CUS_ID_FK_PHD='$polCUSIDFKPHD',
				POL_CUS_Addr_ID_PHD='$polCUSAddrIDPHD',
				POL_CUS_ID_FK_INS='$polCUSIDFKINS',
				POL_CUS_Addr_ID_INS='$polCUSAddrIDINS',
				POL_VEH_ID_FK='$polVEHIDFK',
				POL_UpdatedDate=$polUpdatedDate,
				POL_UpdatedBy='$polUpdatedBy',

				VEH_RED_KEY_FK='$vehREDKEYFK'
			WHERE  POL_ID_PK='".$polIDPK."' AND POL_QuoNum='".$polQuoNum."';
	";
	break;

	case 'PCS1_006':
	$sql 	= "	SELECT DISTINCT(RED_Make) 
				FROM t_redbook
				ORDER BY RED_Make;";
	break;

	case 'PCS1_007':
	$redMake=$GLOBALS['redMake'];
	$sql 	= "	SELECT DISTINCT(RED_Model) 
				FROM t_redbook
				WHERE RED_Make='".$redMake."'
				ORDER BY RED_Model;";
	break;

	case 'PCS1_008':
	$redMake=$GLOBALS['redMake'];
	$redModel=$GLOBALS['redModel'];
	$sql 	= "	SELECT DISTINCT(RED_Year)
				FROM t_redbook
				WHERE RED_Make='".$redMake."' AND RED_Model='".$redModel."'
				ORDER BY RED_Year;";
	break;

	case 'PCS1_009':
	$redMake=$GLOBALS['redMake'];
	$redModel=$GLOBALS['redModel'];
	$redYear=$GLOBALS['redYear'];
	$sql 	= "	SELECT DISTINCT(RED_Desc)
				FROM t_redbook
				WHERE RED_Make='".$redMake."' AND RED_Model='".$redModel."' AND RED_Year='".$redYear."'
				ORDER BY RED_Desc;";
	break;
	case 'PCS1_019':
	$redMake=$GLOBALS['redMake'];
	$redModel=$GLOBALS['redModel'];
	$redYear=$GLOBALS['redYear'];
	$redDesc=$GLOBALS['redDesc'];
	$sql 	= "SELECT *
				FROM t_redbook
				WHERE RED_Make='".$redMake."' AND RED_Model='".$redModel."' AND RED_Year='".$redYear."' AND RED_Desc='".$redDesc."'
				;";
	break;			
	case 'PCS1_010':
	$provID=$GLOBALS['provID'];
	$sql 	= "SELECT *
				FROM T_districts
				WHERE PROVINCE_ID='".$provID."'
				ORDER BY DISTRICT_NAME;";
	break;

	case 'PCS1_011':
	$provID=$GLOBALS['provID'];
	$distID=$GLOBALS['distID'];
	$sql 	= "	SELECT *
				FROM T_subdistricts
				WHERE PROVINCE_ID='".$provID."' AND DISTRICT_ID='".$distID."'
				ORDER BY SUBDISTRICT_NAME;";
	break;

	case 'PCS1_012':
	$subDistID=$GLOBALS['subDistID'];
	$sql 	= "	SELECT *
				FROM T_zipcodes
				WHERE subdistrict_code='".$subDistID."'
				ORDER BY zipcode;";
	break;

	case 'PCS1_013':
	$sql 	= " SELECT DISTINCT(TAR_PowerName_TH)
				FROM T_Tariff
				ORDER BY TAR_PowerName_TH;";
	break;

	case 'PCS1_014':
	$tarPower=$GLOBALS['tarPower'];
	$tarBody=$GLOBALS['tarBody'];
	$tarSubBody=$GLOBALS['tarSubBody'];
	$tarUsage=$GLOBALS['tarUsage'];
	$sql 	= "	SELECT DISTINCT(TAR_BodyName_TH)
				FROM T_Tariff
				ORDER BY TAR_BodyName_TH;";
	break;

	case 'PCS1_015':
	$tarPower=$GLOBALS['tarPower'];
	$tarBody=$GLOBALS['tarBody'];
	$sql 	= "	SELECT DISTINCT(TAR_SubBodyName_TH)
				FROM T_Tariff
				WHERE TAR_BodyName_TH='".$tarBody."'
				ORDER BY TAR_SubBodyName_TH;";
	break;

	case 'PCS1_016':
	$tarPower=$GLOBALS['tarPower'];
	$tarBody=$GLOBALS['tarBody'];
	$tarSubBody=$GLOBALS['tarSubBody'];
	$sql 	= "	SELECT DISTINCT(TAR_UsageName_TH)
				FROM T_Tariff
				WHERE TAR_BodyName_TH='".$tarBody."' AND TAR_SubBodyName_TH='".$tarSubBody."'
				ORDER BY TAR_UsageName_TH;";
	break;

	case 'PCS1_017':
	$tarPower=$GLOBALS['tarPower'];
	$tarBody=$GLOBALS['tarBody'];
	$tarSubBody=$GLOBALS['tarSubBody'];
	$tarUsage=$GLOBALS['tarUsage'];
	$sql 	= "	SELECT *
				FROM T_Tariff
				WHERE TAR_BodyName_TH='".$tarBody."' AND TAR_SubBodyName_TH='".$tarSubBody."' AND TAR_UsageName_TH='".$tarUsage."'
				;";
	break;
	case 'PCS1_018':
	$sql 	= "	SELECT *
				FROM T_PerSaluType
				ORDER BY PER_Salu_TH
				;";
	break;

	case 'SPO_001':
	$sql = "SELECT * 
			FROM policy 
			INNER JOIN T_PolStatus 
				ON POL_Status_ID_PK=POL_Status_ID_FK 
			INNER JOIN Vehical 
				ON VEH_ID_PK=POL_VEH_ID_FK	
			INNER JOIN Personal 
				ON PER_ID_PK=POL_CUS_ID_FK_INS 
			INNER JOIN Address 
				ON ADDR_ID_PK=POL_CUS_Addr_ID_INS	
			INNER JOIN Redbook
				ON RED_KEY=VEH_RED_KEY_FK
			INNER JOIN T_Tariff
				ON TAR_ID_PK=VEH_TAR_ID_FK
			INNER JOIN Premium
				ON PREM_ID_PK=POL_PREM_ID_FK	
			INNER JOIN Agent
				ON POL_AGT_ID_FK=AGT_ID_PK	
			ORDER BY POL_ID_PK DESC;";
	break;

	case 'SPO_002':
	$sBy 	= $GLOBALS['sBy'];
	$sDesc 	= $GLOBALS['sDesc'];
	$sql = "SELECT * 
			FROM policy 
			INNER JOIN T_PolStatus 
				ON POL_Status_ID_PK=POL_Status_ID_FK 
			INNER JOIN Vehical 
				ON VEH_ID_PK=POL_VEH_ID_FK	
			INNER JOIN Personal 
				ON PER_ID_PK=POL_CUS_ID_FK_INS 
			INNER JOIN Address 
				ON ADDR_ID_PK=POL_CUS_Addr_ID_INS	
			INNER JOIN Redbook
				ON RED_KEY=VEH_RED_KEY_FK
			INNER JOIN T_Tariff
				ON TAR_VehCode_PK=VEH_TAR_VehCode_FK
			INNER JOIN Premium
				ON PREM_ID_PK=POL_PREM_ID_FK
			WHERE ".$sBy." LIKE '%".$sDesc."%'	
			ORDER BY POL_ID_PK DESC;";
	break;

	case 'SFN_001':
	$sql = "SELECT 	POL_AGT_ID_FK,
					AGT_Code as SFN_AgentCode,
					COUNT(POL_QuoNum) as SFN_TotalQuo,
					SUM(PREM_Total) as SFN_TotalPrem,
					SUM(PREM_Outstanding) as SFN_OutstadPrem, 
					SUM(PREM_Paid) as SFN_PaidPrem,
					SUM(PREM_PaidBalance) as SFN_PaidBal
			FROM policy 
			INNER JOIN Agent
				ON POL_AGT_ID_FK=AGT_ID_PK
			INNER JOIN T_PolStatus 
				ON POL_Status_ID_PK=POL_Status_ID_FK 
			INNER JOIN Vehical 
				ON VEH_ID_PK=POL_VEH_ID_FK	
			INNER JOIN Personal 
				ON PER_ID_PK=POL_CUS_ID_FK_INS 
			INNER JOIN Address 
				ON ADDR_ID_PK=POL_CUS_Addr_ID_INS	
			INNER JOIN Redbook
				ON RED_KEY=VEH_RED_KEY_FK
			INNER JOIN T_Tariff
				ON TAR_VehCode_PK=VEH_TAR_VehCode_FK
			INNER JOIN Premium
				ON PREM_ID_PK=POL_PREM_ID_FK	
			GROUP BY POL_AGT_ID_FK	
			ORDER BY POL_AGT_ID_FK;
			";
	break;

	default:
	$sql="";
	break;
	}	

return $sql;
}


$accUser;
$accPass;

$sBy;
$sDesc;

$provID;
$distID;
$subDistID;

$polIDPK;
$polOrgIDFK;
$polStatusIDFK;
$polMaspolNum;
$polQuoNum;
$polNum;
$polCat;
$polReFlag;
$polEffDate;
$polExpDate;
$polQuoCreateDate;
$polQuoDate;
$polProDate;
$polAppReceivedDate;
$polIssueDate;
$polIssueBy;
$polAGTIDFK;
$polPRODIDFK;
$polPREMIDFK;
$polCUSIDFKPHD;
$polCUSAddrIDPHD;
$polCUSIDFKINS;
$polCUSAddrIDINS;
$polVEHIDFK;
$polUpdatedDate;
$polUpdatedBy;

$polStatusIDPK;
$polStatusNameEN;
$polStatusNameTH;
$polStatusDesc;
$polStatusUpdatedDate;
$polStatusUpdatedBy;

$orgIDPK;
$orgShortName;
$orgLongNameTH;
$orgLongNameEN;
$orgPolPrefix;
$orgPolLength;
$orgUpdateDate;
$orgUpdateBy;

$vehIDPK;
$vehTARIDFK;
$vehTARVehCodeFK;
$vehREDKEYFK;
$vehLicenseNum;
$vehChassisNum;
$vehCapacity;
$vehSeat;
$vehWeight;
$vehEngineNum;
$vehNewCar;
$vehDriveArea;
$vehProvIDFK;
$vehColor;
$vehCountry;
$vehQuoNumRef;
$vehUpdatedDate;
$vehUpdatedBy;

$perIDPK;
$perSalu;
$perFName;
$perMName;
$perLName;
$perDOB;
$perCardType;
$perCardNo;
$perExpDate;
$perUpdatedDate;
$perUpdatedBy;

$addrIDPK;
$addrLine1;
$addrLine2;
$addrSubDist;
$addrDist;
$addrProv;
$addrZipCode;
$addrGeo;
$addrEmail;
$addrContType1;
$addrContNum1;
$addrContType2;
$addrContNum2;
$addrUpdatedDate;
$addrUpdatedBy;

$tarIDPK;
$tarVehCodePK;
$tarPowerNameEN;
$tarPowerNameTH;
$tarBodyNameTH;
$tarBodyNameEN;
$tarSubBodyNameTH;
$tarSubBodyNameEN;
$tarUsageNameTH;
$tarUsageNameEN;
$tarCCMin;
$tarCCMax;
$tarSeatMin;
$tarSeatMax;
$tarTonMin;
$tarTonMax;
$tarPrem;
$tarVat;
$tarStampDuty;
$tarTotalPrem;
$tarUpdatedDate;
$tarUpdatedBy;

$tarPower;
$tarBody;
$tarSubBody;
$tarUsage;

$redIDPK;
$redKey;
$redMake;
$redModel;
$redYear;
$redDesc;
$redAvgWholesale;
$redAvgRetail;
$redGoodWholesale;
$redGoodRetail;
$redNewPrice;
$redGroup;
$redType;
$redJanpaneseCar;
$redECO;
$redUpdatedDate;
$redUpdatedBy;

$premIDPK;
$premStdNet;
$premStdVat;
$premStdStampDuty;
$premStdTotal;
$premPercentVat;
$premPerDiscount;
$premDiscountFlag;
$premDiscount;
$premNet;
$premStampDuty;
$premVat;
$premTotal;
$premQuoNumRef;
$premOutstanding;
$premPaid;
$premPaidStatus;
$premPaidStatusAprv;
$premPaidBalance;
$premPaidDate;
$premUpdatedDate;
$premUpdatedBy;

$usrName;
$usrRole;

function setPolicyInfo(
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
$polQuoDate,
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
$polUpdatedDate,
$polUpdatedBy
){
$GLOBALS['polIDPK'] = $polIDPK;
$GLOBALS['polOrgIDFK'] = $polOrgIDFK;
$GLOBALS['polStatusIDFK'] = $polStatusIDFK;
$GLOBALS['polMaspolNum'] = $polMaspolNum;
$GLOBALS['polQuoNum'] = $polQuoNum;
$GLOBALS['polNum'] = $polNum;
$GLOBALS['polCat'] = $polCat;
$GLOBALS['polReFlag'] = $polReFlag;
$GLOBALS['polEffDate'] = $polEffDate;
$GLOBALS['polExpDate'] = $polExpDate;
$GLOBALS['polQuoCreateDate'] = $polQuoCreateDate;
$GLOBALS['polQuoDate'] = $polQuoDate;
$GLOBALS['polProDate'] = $polProDate;
$GLOBALS['polAppReceivedDate'] = $polAppReceivedDate;
$GLOBALS['polIssueDate'] = $polIssueDate;
$GLOBALS['polIssueBy'] = $polIssueBy;
$GLOBALS['polAGTIDFK'] = $polAGTIDFK;
$GLOBALS['polPRODIDFK'] = $polPRODIDFK;
$GLOBALS['polPREMIDFK'] = $polPREMIDFK;
$GLOBALS['polCUSIDFKPHD'] = $polCUSIDFKPHD;
$GLOBALS['polCUSAddrIDPHD'] = $polCUSAddrIDPHD;
$GLOBALS['polCUSIDFKINS'] = $polCUSIDFKINS;
$GLOBALS['polCUSAddrIDINS'] = $polCUSAddrIDINS;
$GLOBALS['polVEHIDFK'] = $polVEHIDFK;
$GLOBALS['polUpdatedDate'] = $polUpdatedDate;
$GLOBALS['polUpdatedBy'] = $polUpdatedBy;
}

function setPolicyHolderInfo(
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
){
// $GLOBALS['perIDPK']=$perIDPK;
$GLOBALS['perSalu']=$perSalu;
$GLOBALS['perFName']=$perFName;
$GLOBALS['perMName']=$perMName;
$GLOBALS['perLName']=$perLName;
$GLOBALS['perDOB']=$perDOB;
$GLOBALS['perCardType']=$perCardType;
$GLOBALS['perCardNo']=$perCardNo;
$GLOBALS['perExpDate']=$perExpDate;
$GLOBALS['perUpdatedDate']=$perUpdatedDate;
$GLOBALS['perUpdatedBy']=$perUpdatedBy;
}

function setAddressInfo(
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
){
$GLOBALS['addrLine1']=$addrLine1;
$GLOBALS['addrLine2']=$addrLine2;
$GLOBALS['addrSubDist']=$addrSubDist;
$GLOBALS['addrDist']=$addrDist;
$GLOBALS['addrProv']=$addrProv;
$GLOBALS['addrZipCode']=$addrZipCode;
$GLOBALS['addrGeo']=$addrGeo;
$GLOBALS['addrEmail']=$addrEmail;
$GLOBALS['addrContType1']=$addrContType1;
$GLOBALS['addrContNum1']=$addrContNum1;
$GLOBALS['addrContType2']=$addrContType2;
$GLOBALS['addrContNum2']=$addrContNum2;
$GLOBALS['addrUpdatedDate']=$addrUpdatedDate;
$GLOBALS['addrUpdatedBy']=$addrUpdatedBy;
}

function setVehicalInfo(
$vehIDPK,
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
){		
$GLOBALS['vehIDPK']=$vehIDPK;
$GLOBALS['vehTARIDFK']=$vehTARIDFK;
$GLOBALS['vehTARVehCodeFK']=$vehTARVehCodeFK;
$GLOBALS['vehREDKEYFK']=$vehREDKEYFK;
$GLOBALS['vehLicenseNum']=$vehLicenseNum;
$GLOBALS['vehChassisNum']=$vehChassisNum;
$GLOBALS['vehCapacity']=$vehCapacity;
$GLOBALS['vehSeat']=$vehSeat;
$GLOBALS['vehWeight']=$vehWeight;
$GLOBALS['vehEngineNum']=$vehEngineNum;
$GLOBALS['vehNewCar']=$vehNewCar;
$GLOBALS['vehDriveArea']=$vehDriveArea;
$GLOBALS['vehProvIDFK']=$vehProvIDFK;
$GLOBALS['vehColor']=$vehColor;
$GLOBALS['vehCountry']=$vehCountry;
$GLOBALS['vehQuoNumRef']=$vehQuoNumRef;
$GLOBALS['vehUpdatedDate']=$vehUpdatedDate;
$GLOBALS['vehUpdatedBy']=$vehUpdatedBy;
}

function setPremiumInfo(
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
$premOutstanding,
$premPaid,
$premPaidStatus,
$premPaidStatusAprv,
$premPaidBalance,
$premPaidDate,
$premUpdatedDate,
$premUpdatedBy
){
// $GLOBALS['premIDPK']=$premIDPK;
$GLOBALS['premStdNet']=$premStdNet;
$GLOBALS['premStdVat']=$premStdVat;
$GLOBALS['premStdStampDuty']=$premStdStampDuty;
$GLOBALS['premStdTotal']=$premStdTotal;
$GLOBALS['premPercentVat']=$premPercentVat;
$GLOBALS['premPerDiscount']=$premPerDiscount;
$GLOBALS['premDiscountFlag']=$premDiscountFlag;
$GLOBALS['premDiscount']=$premDiscount;
$GLOBALS['premNet']=$premNet;
$GLOBALS['premStampDuty']=$premStampDuty;
$GLOBALS['premVat']=$premVat;
$GLOBALS['premTotal']=$premTotal;
$GLOBALS['premQuoNumRef']=$premQuoNumRef;
$GLOBALS['premOutstanding']=$premOutstanding;
$GLOBALS['premPaid']=$premPaid;
$GLOBALS['premPaidStatus']=$premPaidStatus;
$GLOBALS['premPaidStatusAprv']=$premPaidStatusAprv;
$GLOBALS['premPaidBalance']=$premPaidBalance;
$GLOBALS['premPaidDate']=$premPaidDate;
$GLOBALS['premUpdatedDate']=$premUpdatedDate;
$GLOBALS['premUpdatedBy']=$premUpdatedBy;
}	

function setRedbookInfo(
	// $redIDPK,
	// $redKey,
	$redMake,
	$redModel,
	$redYear,
	$redDesc
	// $redAvgWholesale,
	// $redAvgRetail,
	// $redGoodWholesale,
	// $redGoodRetail,
	// $redNewPrice,
	// $redGroup,
	// $redType,
	// $redJanpaneseCar,
	// $redECO,
	// $redUpdatedDate,
	// $redUpdatedBy,
){
	// $GLOBALS['redIDPK']=$redIDPK;
	// $GLOBALS['redKey']=$redKey;
	$GLOBALS['redMake']=$redMake;
	$GLOBALS['redModel']=$redModel;
	$GLOBALS['redYear']=$redYear;
	$GLOBALS['redDesc']=$redDesc;
	// $GLOBALS['redAvgWholesale']=$redAvgWholesale;
	// $GLOBALS['redAvgRetail']=$redAvgRetail;
	// $GLOBALS['redGoodWholesale']=$redGoodWholesale;
	// $GLOBALS['redGoodRetail']=$redGoodRetail;
	// $GLOBALS['redNewPrice']=$redNewPrice;
	// $GLOBALS['redGroup']=$redGroup;
	// $GLOBALS['redType']=$redType;
	// $GLOBALS['redJanpaneseCar']=$redJanpaneseCar;
	// $GLOBALS['redECO']=$redECO;
	// $GLOBALS['redUpdatedDate']=$redUpdatedDate;
	// $GLOBALS['redUpdatedBy']=$redUpdatedBy;
}

function setPolicyUpdate(
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
$polQuoDate,
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
$polUpdatedDate,
$polUpdatedBy,

$vehREDKEYFK
){
$GLOBALS['polIDPK'] = $polIDPK;
$GLOBALS['polOrgIDFK'] = $polOrgIDFK;
$GLOBALS['polStatusIDFK'] = $polStatusIDFK;
$GLOBALS['polMaspolNum'] = $polMaspolNum;
$GLOBALS['polQuoNum'] = $polQuoNum;
$GLOBALS['polNum'] = $polNum;
$GLOBALS['polCat'] = $polCat;
$GLOBALS['polReFlag'] = $polReFlag;
$GLOBALS['polEffDate'] = $polEffDate;
$GLOBALS['polExpDate'] = $polExpDate;
$GLOBALS['polQuoCreateDate'] = $polQuoCreateDate;
$GLOBALS['polQuoDate'] = $polQuoDate;
$GLOBALS['polProDate'] = $polProDate;
$GLOBALS['polAppReceivedDate'] = $polAppReceivedDate;
$GLOBALS['polIssueDate'] = $polIssueDate;
$GLOBALS['polIssueBy'] = $polIssueBy;
$GLOBALS['polAGTIDFK'] = $polAGTIDFK;
$GLOBALS['polPRODIDFK'] = $polPRODIDFK;
$GLOBALS['polPREMIDFK'] = $polPREMIDFK;
$GLOBALS['polCUSIDFKPHD'] = $polCUSIDFKPHD;
$GLOBALS['polCUSAddrIDPHD'] = $polCUSAddrIDPHD;
$GLOBALS['polCUSIDFKINS'] = $polCUSIDFKINS;
$GLOBALS['polCUSAddrIDINS'] = $polCUSAddrIDINS;
$GLOBALS['polVEHIDFK'] = $polVEHIDFK;
$GLOBALS['polUpdatedDate'] = $polUpdatedDate;
$GLOBALS['polUpdatedBy'] = $polUpdatedBy;

$GLOBALS['vehREDKEYFK'] = $vehREDKEYFK;
}

function setLogin($accUser,$accPass){
$GLOBALS['accUser']=$accUser;
$GLOBALS['accPass']=$accPass;
}

function setSearchCriteria(
$sBy,
$sDesc 
){
$GLOBALS['sBy']=$sBy;
$GLOBALS['sDesc']=$sDesc;
}

function setLocationID(
$provID,
$distID,
$subDistID
){
$GLOBALS['provID']=$provID;
$GLOBALS['distID']=$distID;
$GLOBALS['subDistID']=$subDistID;
}

function setTariffID(
$tarPower,
$tarBody,
$tarSubBody,
$tarUsage
){
$GLOBALS['tarPower']=$tarPower;
$GLOBALS['tarBody']=$tarBody;
$GLOBALS['tarSubBody']=$tarSubBody;
$GLOBALS['tarUsage']=$tarUsage;
}

function setRedbookID(
$redMake,
$redModel,
$redYear,
$redDesc
){
$GLOBALS['redMake']=$redMake;
$GLOBALS['redModel']=$redModel;
$GLOBALS['redYear']=$redYear;
$GLOBALS['redDesc']=$redDesc;
}

function setUser($usrName,$usrRole){
$GLOBALS['usrName']=$usrName;
$GLOBALS['usrRole']=$usrRole;
}
function setRedKey($redKey){return $GLOBALS['redKey'] = $redKey;}
function setRedMake($redMake){return $GLOBALS['redMake'] = $redMake;}
function setOrgIDPK($orgIDPK){return $GLOBALS['orgIDPK'] = $orgIDPK;}
function setPolOrgIDFK($polOrgIDFK){return $GLOBALS['polOrgIDFK'] = $polOrgIDFK;}
function setPolVehIDFK($polVehIDFK){return $GLOBALS['polVehIDFK'] = $polVehIDFK;}
function setPolIDPK($polIDPK){return $GLOBALS['polIDPK'] = $polIDPK;}
function setPolQuoNum($polQuoNum){return $GLOBALS['polQuoNum'] = $polQuoNum;}
function setPolStatusIDFK($polStatusIDFK){return $GLOBALS['polStatusIDFK'] = $polStatusIDFK;}
function setCusIDFKINS($cusIDFKINS){return $GLOBALS['cusIDFKINS'] = $cusIDFKINS;}
function setCUSAddrIDINS($cusAddrIDINS){return $GLOBALS['cusAddrIDINS'] = $cusAddrIDINS;}
function setCusIDFKPHD($cusIDFKPHD){return $GLOBALS['cusIDFKPHD'] = $cusIDFKPHD;}
function setAddrLine1($addrLine1){return $GLOBALS['addrLine1']=$addrLine1;}
function setAddrDist($addrDist){return $GLOBALS['addrDist']=$addrDist;}
function setAddrSubDist($addrSubDist){return $GLOBALS['addrSubDist']=$addrSubDist;}
function setAddrProv($addrProv){return $GLOBALS['addrProv']=$addrProv;}
function setAddrZipCode($addrZipCode){return $GLOBALS['addrZipCode']=$addrZipCode;}
function setAddrEmail($addrEmail){return $GLOBALS['addrEmail']=$addrEmail;}
function setAddrContType($addrContType){return $GLOBALS['addrContType']=$addrContType;}
function setAddrContNum($addrContNum){return $GLOBALS['addrContNum']=$addrContNum;}
function setAddrUpdatedBy($addrUpdatedBy){return $GLOBALS['addrUpdatedBy']=$addrUpdatedBy;}

?>