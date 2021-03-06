<?php
$polIDPK=$row["POL_ID_PK"];
$polOrgIDFK=$row["POL_Org_ID_FK"];
$polStatusIDFK=$row["POL_Status_ID_FK"];
$polMaspolNum=$row["POL_MasPolNum"];
$polQuoNum=$row["POL_QuoNum"];
$polNum=$row["POL_Num"];
$polCat=$row["POL_Cat"];
$polReFlag=$row["POL_ReFlag"];
$polEffDate=$row["POL_EffDate"];
$polExpDate=$row["POL_ExpDate"];
$polQuoCreateDate=$row["POL_QuoCreateDate"];
$polQuoDate=$row["POL_QuoDate"];
$polProDate=$row["POL_ProDate"];
$polAppReceivedDate=$row["POL_AppReceivedDate"];
$polIssueDate=$row["POL_IssueDate"];
$polIssueBy=$row["POL_IssueBy"];
$polAGTIDFK=$row["POL_AGT_ID_FK"];
$polPRODIDFK=$row["POL_PROD_ID_FK"];
$polPREMIDFK=$row["POL_PREM_ID_FK"];
$polCUSIDFKPHD=$row["POL_CUS_ID_FK_PHD"];
$polCUSAddrIDPHD=$row["POL_CUS_Addr_ID_PHD"];
$polCUSIDFKINS=$row["POL_CUS_ID_FK_INS"];
$polCUSAddrIDINS=$row["POL_CUS_Addr_ID_INS"];
$polVEHIDFK=$row["POL_VEH_ID_FK"];
$polUpdatedDate=$row["POL_UpdatedDate"];
$polUpdatedBy=$row["POL_UpdatedBy"];

$orgIDPK=$row["ORG_ID_PK"];
$orgShortName=$row["ORG_ShortName"];
$orgLongNameTH=$row["ORG_LongName_TH"];
$orgLongNameEN=$row["ORG_LongName_EN"];
$orgPolPrefix=$row["ORG_PolPrefix"];
$orgPolLength=$row["ORG_PolLength"];
$orgUpdateDate=$row["ORG_UpdateDate"];
$orgUpdateBy=$row["ORG_UpdateBy"];

$staIDPK=$row["STA_ID_PK"];
$staNameEN=$row["STA_Name_EN"];
$staNameTH=$row["STA_Name_TH"];
$staDesc=$row["STA_Desc"];
$staUpdatedDate=$row["STA_UpdatedDate"];
$staUpdatedBy=$row["STA_UpdatedBy"];

$agtIDPK=$row["AGT_ID_PK"];
$agtCode=$row["AGT_Code"];
$agtACCIDFK=$row["AGT_ACC_ID_FK"];
$agtUpdatedDate=$row["AGT_UpdatedDate"];
$agtUpdatedBy=$row["AGT_UpdatedBy"];
$agtUpdatedDate=$row["AGT_UpdatedDate"];
$agtUpdatedBy=$row["AGT_UpdatedBy"];

$agtinfPERFname=$row["AGTINF_PER_Fname"];
$agtinfPERLname=$row["AGTINF_PER_Lname"];

$vehIDPK=$row["VEH_ID_PK"];
$vehTARIDFK=$row["VEH_TAR_ID_FK"];
$vehTARvehCodeFK=$row["VEH_TAR_VehCode_FK"];
$vehREDKEYFK=$row["VEH_RED_KEY_FK"];
$vehLicenseNum=$row["VEH_LicenseNum"];
$vehChassisNum=$row["VEH_ChassisNum"];
$vehCapacity=$row["VEH_Capacity"];
$vehSeat=$row["VEH_Seat"];
$vehWeight=$row["VEH_Weight"];
$vehEngineNum=$row["VEH_EngineNum"];
$vehNewCar=$row["VEH_NewCar"];
$vehDriveArea=$row["VEH_DriveArea"];
$vehProvIDFK=$row["VEH_Prov_ID_FK"];
$vehColor=$row["VEH_Color"];
$vehCountry=$row["VEH_Country"];
$vehQuoNumRef=$row["VEH_QuoNumRef"];
$vehUpdatedDate=$row["VEH_UpdatedDate"];
$vehUpdatedBy=$row["VEH_UpdatedBy"];

$tarIDPK=$vehTARIDFK;

$redIDPK=$row["RED_ID_PK"];
$redKey=$row["RED_Key"];
$redMake=$row["RED_Make"];
$redModel=$row["RED_Model"];
$redYear=$row["RED_Year"];
$redDesc=$row["RED_Desc"];
$redAvgWholesale=$row["RED_AvgWholesale"];
$redAvgRetail=$row["RED_AvgRetail"];
$redGoodWholesale=$row["RED_GoodWholesale"];
$redGoodRetail=$row["RED_GoodRetail"];
$redNewPrice=$row["RED_NewPrice"];
$redGroup=$row["RED_Group"];
$redType=$row["RED_Type"];
$redJanpaneseCar=$row["RED_JanpaneseCar"];
$redECO=$row["RED_ECO"];
$redUpdatedDate=$row["RED_UpdatedDate"];
$redUpdatedBy=$row["RED_UpdatedBy"];

$premIDPK=$row["PREM_ID_PK"];
$premStdNet=number_format((float)$row["PREM_StdNet"], 2, '.', '');
$premStdVat=number_format((float)$row["PREM_StdVat"], 2, '.', '');
$premStdStampDuty=number_format((float)$row["PREM_StdStampDuty"], 2, '.', '');
$premStdTotal=number_format((float)$row["PREM_StdTotal"], 2, '.', '');
$premPercentVat=$row["PREM_PercentVat"];
$premPerDiscount=$row["PREM_PerDiscount"];
$premDiscountFlag=$row["PREM_DiscountFlag"];
$premDiscount=$row["PREM_Discount"];
$premNet=number_format((float)$row["PREM_Net"], 2, '.', '');
$premStampDuty=number_format((float)$row["PREM_StampDuty"], 2, '.', '');
$premVat=number_format((float)$row["PREM_Vat"], 2, '.', '');
$premTotal=number_format((float)$row["PREM_Total"], 2, '.', '');
$premQuoNumRef=$row["PREM_QuoNumRef"];
$premOutstanding=$row["PREM_Outstanding"];
$premPaid=$row["PREM_Paid"];
$premPaidStatus=$row["PREM_PaidStatus"];
$premPaidStatusAprv=$row["PREM_PaidStatusAprv"];
$premAprvComment=$row["PREM_AprvComment"];
$premPayMethod=$row["PREM_PayMethod"];
$premPayeeName=$row["PREM_PayeeName"];
$premPaidBalance=$row["PREM_PaidBalance"];
$premPaidDate=$row["PREM_PaidDate"];
$premUpdatedDate=$row["PREM_UpdatedDate"];
$premUpdatedBy=$row["PREM_UpdatedBy"];


// $PHD_perSaluIDPK=$row["PER_Salu_ID_PK"];
$PHD_perSaluTH=$row["PHDSalu_PER_Salu_TH"];
$PHD_perSaluEN=$row["PHDSalu_PER_Salu_EN"];

$PHD_perIDPK=$row["PHD_PER_ID_PK"];
$PHD_perSalu=$row["PHD_PER_Salu"];
$PHD_perFName=$row["PHD_PER_FName"];
$PHD_perMName=$row["PHD_PER_MName"];
$PHD_perLName=$row["PHD_PER_LName"];
$PHD_perDOB=$row["PHD_PER_DOB"];
$PHD_perCardType=$row["PHD_PER_CardType"];
$PHD_perCardNo=$row["PHD_PER_CardNo"];
$PHD_perExpDate=$row["PHD_PER_ExpDate"];
$PHD_perUpdatedDate=$row["PHD_PER_UpdatedDate"];
$PHD_perUpdatedBy=$row["PHD_PER_UpdatedBy"];

$PHD_addrIDPK=$row["PHD_ADDR_ID_PK"];
$PHD_addrLine1=$row["PHD_ADDR_Line1"];
$PHD_addrLine2=$row["PHD_ADDR_Line2"];
$PHD_addrSubDist=$row["PHD_ADDR_SubDist"];
$PHD_addrDist=$row["PHD_ADDR_Dist"];
$PHD_addrProv=$row["PHD_ADDR_Prov"];
$PHD_addrZipCode=$row["PHD_ADDR_ZipCode"];
$PHD_addrGeo=$row["PHD_ADDR_Geo"];
$PHD_addrEmail=$row["PHD_ADDR_Email"];
$PHD_addrContType1=$row["PHD_ADDR_ContType1"];
$PHD_addrContNum1=$row["PHD_ADDR_ContNum1"];
$PHD_addrContType2=$row["PHD_ADDR_ContType2"];
$PHD_addrContNum2=$row["PHD_ADDR_ContNum2"];
$PHD_addrUpdatedDate=$row["PHD_ADDR_UpdatedDate"];
$PHD_addrUpdatedBy=$row["PHD_ADDR_UpdatedBy"];

$PHD_addrSubDistNameTH=$row["PHD_ADDR_SubdistNameTH"];
$PHD_addrDistrictNameTH=$row["PHD_ADDR_DistrictNameTH"];
$PHD_addrProvNameTH=$row["PHD_ADDR_ProvNameTH"];

?>

