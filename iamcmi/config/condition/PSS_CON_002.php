<?php

	$polMasPolNum="";
$polQuoNum=$_SESSION["polQuoNum"];
$polNum="";
$polCat="N/A";
$polReFlag="N/A";
$polStatusIDFK="1";
$polEffDate=trim($_POST['polEffDate']);
$polExpDate=trim($_POST['polExpDate']);
$polQuoCreateDate=$_SESSION["startSessionDateTime"];
$polQuoDate=date("Y-m-d H:i:s");
$polProDate="0000-00-00 00:00:00";
$polAppReceivedDate="0000-00-00 00:00:00";
$polIssueDate="0000-00-00 00:00:00";
$polIssueBy="";
$polPRODIDFK="1";
$polPREMIDFK=trim($_POST['polPREMIDFK']);
$polCUSIDFKPHD=trim($_POST['polCUSIDFKPHD']);
$polCUSAddrIDPHD=trim($_POST['polCUSAddrIDPHD']);
$polCUSIDFKINS=trim($_POST['polCUSIDFKINS']);
$polCUSAddrIDINS=trim($_POST['polCUSAddrIDINS']);
$polVEHIDFK=trim($_POST['polVEHIDFK']);
$polUpdatedDate=date("Y-m-d H:i:s");
$polUpdatedBy=$_SESSION["usrName"];
$vehIDPK=trim($_POST['vehIDPK']);
$vehTARIDFK=trim($_POST['tarIDPK']);
$vehTARVehCodeFK=trim($_POST['tarVehCodePK']);
$vehREDKEYFK=trim($_POST['redKey']);
$vehLicenseNum=trim($_POST['vehLicenseNum']);
$vehChassisNum=trim($_POST['vehChassisNum']);
$vehCapacity=trim($_POST['vehCapacity']);
$vehSeat=trim($_POST['vehSeat']);
$vehWeight=trim($_POST['vehWeight']);
$vehEngineNum="N/A";
$vehNewCar="N/A";
$vehDriveArea="N/A";
$vehProvIDFK="-1";
$vehColor="N/A";
$vehCountry="N/A";
$vehQuoNumRef=$_SESSION["polQuoNum"];
$vehUpdatedDate=date("Y-m-d H:i:s");
$vehUpdatedBy=$_SESSION["usrName"];
$perIDPK=trim($_POST['perIDPK']);
$perSalu=trim($_POST['perSalu']);
$perFName=trim($_POST['perFName']);
$perMName="N/A";
$perLName=trim($_POST['perLName']);
$perDOB=date("Y-m-d",strtotime($_POST['perDOB']));
$perCardType=trim($_POST['perCardType']);
$perCardNo=trim($_POST['perCardNo']);
$perExpDate=date("Y-m-d",strtotime($_POST['perExpDate']));
$perUpdatedDate=date("Y-m-d H:i:s");
$perUpdatedBy=$_SESSION["usrName"];
$addrIDPK=trim($_POST['addrIDPK']);
$addrLine1=trim($_POST['addrLine1']);
$addrLine2=trim($_POST['addrLine2']);
$addrSubDist=trim($_POST['addrSubDist']);
$addrDist=trim($_POST['addrDist']);
$addrProv=trim($_POST['addrProv']);
$addrZipCode=trim($_POST['addrZipCode']);
$addrGeo="N/A";
$addrEmail=trim($_POST['addrEmail']);
$addrContType1=trim($_POST['addrContType1']);
$addrContNum1=trim($_POST['addrContNum1']);
$addrContType2="-1";
$addrContNum2="N/A";
$addrUpdatedDate=date("Y-m-d H:i:s");
$addrUpdatedBy=$_SESSION["usrName"];
$tarIDPK=trim($_POST['tarIDPK']);
$tarVehCodePK=trim($_POST['tarVehCodePK']);
$redKey=trim($_POST['redKey']);
$redMake=trim($_POST['redMake']);
$redModel=trim($_POST['redModel']);
$redYear=trim($_POST['redYear']);
$redDesc=trim($_POST['redDesc']);
$premStdNet=trim($_POST['premStdNet']);
$premStdVat=trim($_POST['premStdVat']);
$premStdStampDuty=trim($_POST['premStdStampDuty']);
$premStdTotal=trim($_POST['premStdTotal']);
$premPercentVat=7;
$premPerDiscount="0";
$premDiscountFlag="N";
$premDiscount="0";
$premNet=trim($_POST['premNet']);
$premStampDuty=trim($_POST['premStampDuty']);
$premVat=trim($_POST['premVat']);
$premTotal=trim($_POST['premTotal']);
$premQuoNumRef=$_SESSION["polQuoNum"];
$premUpdatedDate=date("Y-m-d H:i:s");
$premUpdatedBy=$_SESSION["usrName"];

?>