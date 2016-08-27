<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<!-- MAIN STYLE SECTION-->
<link rel="stylesheet" href="../css/iamStyle.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="../js/jquery-ui-themes-1.12.0-rc.2/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" type="text/css" media="screen" href="../bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
<link href="../assets/plugins/isotope/isotope.css" rel="stylesheet" media="screen" />
<link href="../assets/plugins/fancybox/jquery.fancybox.css" rel="stylesheet" />
<link href="../assets/plugins/IconHoverEffects-master/css/component.css" rel="stylesheet" />
<link href="../assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
<link href="../assets/css/about-achivements.css" rel="stylesheet" />
<link id="mainStyle" href="../assets/css/style.css" rel="stylesheet" />
<!-- END MAIN STYLE SECTION-->
<script src="../js/jquery-1.12.4.js"></script>
<script src="../js/jquery-1.12.4.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../js/jquery-ui-1.12.0-rc.2/jquery-ui.js"></script>
<script type="text/javascript" src="../bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
$(function () {
    $('#datetimepicker4').datetimepicker();
    $('#datetimepicker5').datetimepicker();
    $('#datetimepicker6').datetimepicker();
    $('#datetimepicker7').datetimepicker();
});
// @BEGIN
// @DEKDEEDEV_IAMCMI
// @Falom
// @2016-06-19 SUN 02:08 PM    
		 function dochangeLocation(src, val, provID, distID, subDistID) {
        	var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
		    if (xhttp.readyState == 4 && xhttp.status == 200) {
		     	document.getElementById(src).innerHTML = xhttp.responseText;
		    	}
		  	};
		  	xhttp.open("GET", "location.php?data="+src+"&val="+val+"&provID="+provID+"&distID="+distID+"&subDistID="+subDistID); //สร้าง connection
             xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
             xhttp.send(null); //ส่งค่า
        }

	
	    function dochangeTariff(src, val, tarBody, tarSubBody, tarUsage) {
	    	//alert(src);
        	var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
		    if (xhttp.readyState == 4 && xhttp.status == 200) {
		     	document.getElementById(src).innerHTML = xhttp.responseText;
		    	}
		  	};

		  	 xhttp.open("GET", "tariff.php?data="+src+"&val="+val+"&tarBody="+tarBody+"&tarSubBody="+tarSubBody+"&tarUsage="+tarUsage); //สร้าง connection
             xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
             xhttp.send(null); //ส่งค่า
        }

        function dochangeRedbook(src, val, redMake, redModel, redYear, redDesc ) {
	    	// alert(src);
        	var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
		    if (xhttp.readyState == 4 && xhttp.status == 200) {
		     	document.getElementById(src).innerHTML = xhttp.responseText;
		    	}
		  	};

   			 xhttp.open("GET", "redbook.php?data="+src+"&val="+val+"&redMake="+redMake+"&redModel="+redModel+"&redYear="+redYear+"&redDesc="+redDesc); //สร้าง connection
             xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
             xhttp.send(null); //ส่งค่า
        }

 
        function dochangePolicyInfo(src, val, usrName, usrRole) {
        	// alert(val);
	    	var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
		    if (xhttp.readyState == 4 && xhttp.status == 200) {
		     	document.getElementById(src).innerHTML = xhttp.responseText;
		    	}
		  	};
		     xhttp.open("GET", "policyInfo.php?data="+src+"&val="+val+"&usrName="+usrName+"&usrRole="+usrRole); //สร้าง connection
             xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
             xhttp.send(null); //ส่งค่า
        }

    	function reloadFunc(){
    		
        	vehREDKEYFK = document.getElementById("vehREDKEYFK").value;
        	if(vehREDKEYFK=='-1'){
        	redMake = document.getElementById("redMake").value;
        	window.onLoad=dochangeRedbook('redMake', "",redMake, "", "", "");
          	}
        	else{
        	window.onLoad=dochangeRedbook('vehREDKEY', vehREDKEYFK, "" , "", "", "");   	
        	}
        	
        	tarIDPK = document.getElementById("tarIDPK").value;
        	if(vehREDKEYFK=='-1'){
        	window.onLoad=dochangeTariff('tarBody', "-1", "" , "", "");
        	}
        	else{
        	// alert(tarIDPK);
        	window.onLoad=dochangeTariff('tariffInfo', tarIDPK, "" , "", "");
        	}

			polAGTIDFK = document.getElementById("agtIDPK").value;
        	usrName = document.getElementById("usrName").value;
        	usrRole = document.getElementById("usrRole").value;
        	window.onLoad=dochangePolicyInfo('polAGTIDFK', polAGTIDFK, usrName, usrRole)

        	PHD_perSalu = document.getElementById("PHD_perSaluID").value;
        	window.onLoad=dochangePolicyInfo('PHD_perSalu', PHD_perSalu,"","");
			PHD_perCardType = document.getElementById("PHD_perCardTypeID").value;
			window.onLoad=dochangePolicyInfo('PHD_perCardType', PHD_perCardType,"","");
			PHD_addrContType1 = document.getElementById("PHD_addrContType1ID").value;
			window.onLoad=dochangePolicyInfo('PHD_addrContType1', PHD_addrContType1,"","");

        	provID = document.getElementById("PHD_addrProvID").value;
        	distID =  document.getElementById("PHD_addrDistID").value;
        	subDistID= document.getElementById("PHD_addrSubDistID").value;
        	zipCodeID= document.getElementById("PHD_addrZipCodeID").value ;
        	if(provID=='-1'){
        	window.onLoad=dochangeLocation('PHD_addrProv',"","","","");    
        	}
        	else{
        	window.onLoad=dochangeLocation('PHD_addr',zipCodeID,provID,distID,subDistID);  
        	}
        	 
     		
    	}
// @Falom END 2016-06-19 SUN 02:08 PM 
</script>

<!-- HEADER SECTION-->
<?php 
// @BEGIN
// @DEKDEEDEV_IAMCMI
// @Falom
// @2016-06-19 SUN 02:08 PM 
include 'config/config.php'; 
include 'header.php'; 

$orgIDPK=1;		
setOrgIDPK($orgIDPK);
$sqlID	= "PCS1_022";	
$orgResult 	= executeSql($conn,$sqlID);
if($orgResult){
setPolOrgIDFK($orgIDPK);	
}

if(!isset($_SESSION["polQuoNum"])){ 
echo "<br>NEW FROM HOME PAGE<br>";
$sqlID	= "PCS1_001";	
$polResult 	= executeSql($conn,$sqlID);
	if($polResult){
	$polResultSize 	= $polResult->num_rows;
		if( $polResultSize == 1 ){
		$polResultRow 	= $polResult->fetch_assoc();
		$lastPolNo 		= $polResultRow["POL_QuoNum"];
		// echo "<br>LAST EXISTING POLICY NUMBER:".$lastPolNo."<br>";
		}
		else{
		// echo "NEW DB POLICY NUMBER: <br>";
		}
		include 'config/condition/PCS_CON_001.php';
		$_SESSION["startSessionDateTime"] 	= date("Y-m-d H:i:s");

		if($orgResult){
		$orgResultRow 	= $orgResult->fetch_assoc();
		$orgIDPK		=$orgResultRow["ORG_ID_PK"];
		$orgShortName 	=$orgResultRow["ORG_ShortName"];
		$orgPolPrefix 	=$orgResultRow["ORG_PolPrefix"];
		$orgPolLength 	=$orgResultRow["ORG_PolLength"];
		}
		$_SESSION["polQuoNum"]				= getNewPolicyNo($orgPolPrefix, $orgPolLength, $lastPolNo);
		$polQuoNum 		= $_SESSION["polQuoNum"];
		$polOrgIDFK 	= $orgIDPK;

		setPolStatusIDFK($polStatusIDFK);
		$sqlID	= "PCS1_023";	
		$staResult 	= executeSql($conn,$sqlID);
		if($staResult){
		$staResultRow 	= $staResult->fetch_assoc();
		$staIDPK	= $staResultRow["STA_ID_PK"];
		$staNameEN	= $staResultRow["STA_Name_EN"];
		$staNameTH	= $staResultRow["STA_Name_TH"];
		$staDesc	= $staResultRow["STA_Desc"];
		}
	}
}
else{	
echo "<br>EXISTING FROM RELOAD/SAVED/SUBMITED&Back <br>";
$polQuoNum = $_SESSION["polQuoNum"];
setPolQuoNum($polQuoNum);
$sqlID			= "PCS1_003";				
$quoQueryResult = executeSql($conn,$sqlID);
	if($quoQueryResult){
	$quoQueryResultSize = $quoQueryResult->num_rows;
		if($quoQueryResultSize==0){
		echo "WHEN RELOAD PAGE";
		include 'config/condition/PCS_CON_001.php';
		if($orgResult){
		$orgResultRow 	= $orgResult->fetch_assoc();
		$orgIDPK		=$orgResultRow["ORG_ID_PK"];
		$orgShortName 	=$orgResultRow["ORG_ShortName"];
		$orgPolPrefix 	=$orgResultRow["ORG_PolPrefix"];
		$orgPolLength 	=$orgResultRow["ORG_PolLength"];
		}
		$polOrgIDFK     = $orgIDPK;
		$polEffDate 	= $_SESSION["startSessionDateTime"] ;
		$polExpDate 	= date("Y-m-d 16:30:00", strtotime("+12 Months"));
		setPolStatusIDFK($polStatusIDFK);
		$sqlID	= "PCS1_023";	
		$staResult 	= executeSql($conn,$sqlID);
		if($staResult){
		$staResultRow 	= $staResult->fetch_assoc();
		$staIDPK	= $staResultRow["STA_ID_PK"];
		$staNameEN	= $staResultRow["STA_Name_EN"];
		$staNameTH	= $staResultRow["STA_Name_TH"];
		$staDesc	= $staResultRow["STA_Desc"];
		}
		}
		else if($quoQueryResultSize==1){
		echo "WHEN RECORDS HAS ALREADY SAVED OR SUBMITTED&BACK<br>";
		$row 		= $quoQueryResult->fetch_assoc();
		include 'config/condition/PCS_CON_002.php';
		}
		else{
		echo "RECORDS MORE THAN ONE ROW";
		}
	}
}	
// @Falom END 2016-06-19 SUN 02:08 PM 
?>
<!-- END HEADER SECTION-->
<title><?php echo $policyCreate ?></title>
</head>

<!-- onload="myFunction(
	<?php echo $addrProv;?>,
	<?php echo $addrDist;?>,
	<?php echo $addrSubDist;?>,
	<?php echo $addrZipCode;?>,
	<?php echo $perCardType;?>,
	<?php echo $addrContType1;?>,
	<?php echo $perSalu;?>
)" -->

<body onload="reloadFunc()">
	<form action="policySaveStep1.php" method="post">
		<br><br><br><br><br><br>

	    <div class="container" align="center">
	    	<img src="../img/step1.png">
	    </div>
    	<br>

		<div class="container">
			<div class="page-header" style="background-color: #E0EEEE;width: 1175px;left: -20px;position: relative;display: -webkit-box;">
				<h1 style="display: -webkit-inline-box;">&nbsp;พ. ร. บ.</h1>
			</div>
			
			<div class="row titleInsured">
				<div class="col-md-12">
					<div>
						<h4 style="display: -webkit-inline-box;padding-left: 5px; color:white;"><b>ข้อมูลกรรมธรรม์</b></h4>
					</div>
				</div>
			</div>
			<br>
			
			<div class="row">
				<div class="col-md-2" align="left">เลขที่ใบเสนอราคา :</div>
				<div class="col-md-3">
					<input type="text" class="form-control" placeholder="" id="polQuoNum" name="polQuoNum" value='<?php echo $_SESSION["polQuoNum"]; ?>' readonly>
				</div>

				<div class="col-md-3" align="right">รหัสตัวแทน :</div>
				<div class="col-md-3" name="polAGTIDFK" id="polAGTIDFK">
				<input type="hidden" id="polAGTIDFK" name="polAGTIDFK" value='<?php echo $polAGTIDFK; ?>' />
				<select class="form-control">
						<option>กรุณาเลือก</option>
				</select>	
				</div>
			</div>
			<br>

			
			<div class="row">
				<div class="col-md-2" align="left">วันที่เริ่มคุ้มครอง :</div>
				<div class="col-md-3">
					<div class="date" id="datetimepicker">						
						<div id="datetimepicker4" class="input-group date"> 
			               <input type="text" class="form-control" data-format="dd-MM-yyyy HH:mm:ss" 
							placeholder="วันที่เริ่มคุ้มครอง" id="polEffDate" name="polEffDate" value='<?php echo $polEffDate; ?>' required >
			                <span class="add-on"> 
			                    <i class="glyphicon glyphicon-calendar cld"></i> 
			                </span> 
            			</div> 
					</div>
				</div>

				<div class="col-md-3" align="right">วันสิ้นสุดความคุ้มครอง:</div>
				<div class="col-md-3">
					<div class="date" id="datetimepicker">						
						<div id="datetimepicker5" class="input-group date"> 
				             <input type="text" class="form-control" data-format="dd-MM-yyyy HH:mm:ss"  
				             placeholder="วันสิ้นสุดความคุ้มครอง" id="polExpDate" name="polExpDate" value='<?php echo $polExpDate; ?>' required >
							 <div class="add-on"> 
				                <i class="glyphicon glyphicon-calendar cld"></i> 
				             </div> 
				        </div>
					</div>
				</div>
			</div>
			<br>

			<div class="row titleInsured">
				<div class="col-md-12">
					<div>
						<h4 style="display: -webkit-inline-box;padding-left: 5px; color:white;"><b>ข้อมูลรถ</b></h4>
					</div>
				</div>
			</div>
			<br>
			<span id="vehREDKEY" name="vehREDKEY"> 
			<div class="row">
				<div class="col-md-2" align="left">ยี่ห้อ :</div>
				<div class="col-md-2" id="redMake" name="redMake" >
					<input type="hidden" id="redMake" name="redMake" value='<?php echo $redMake; ?>' />
			
					<select class="form-control">
						<option>กรุณาเลือก</option>
					</select>
				</div>
				<div class="col-md-2" align="right">รุ่นรถ :</div>
				<div class="col-md-2" id="redModel" name="redModel">
					<input type="hidden" id="redModel" name="redModel" value='<?php echo $redModel; ?>' />
					<select class="form-control">
						<option>กรุณาเลือก</option>
					</select>
				</div>
				<div class="col-md-2" align="right">ปี :</div>
				<div class="col-md-2" id="redYear" name="redYear">
					<input type="hidden" id="redYear" name="redYear" value='<?php echo $redYear; ?>' />
					<select class="form-control">
						<option>กรุณาเลือก</option>
					</select>
				</div>
			</div>
			<br>

			<div class="row">
				<div class="col-md-2" align="left">รายละเอียดรถ :</div>
				<div class="col-md-2" id="redDesc" name="redDesc">
					<input type="hidden" id="redDesc" name="redDesc" value='<?php echo $redDesc; ?>' />
					<select class="form-control">
						<option>กรุณาเลือก</option>
					</select>
				</div>
				
				<div class="col-md-2" align="right">รหัสรุ่นรถ :</div>
				<div class="col-md-2" id="redKey">
					<input type="text" id="redKey" name="redKey" class="form-control" placeholder="รหัสรุ่นรถ" value='<?php echo $redKey ?>' required readonly>
					<div class="col-md-2" align="right">
						<a href="javascript:void(0);" NAME="Add Redbook" title=" My title here "  
            			onClick=" window.open('addRedbook.php','','width=550,height=170,left=150,top=200,toolbar=1,status=1')"> 
            			+add+
            			</a>
            		</div>
				</div>
			</div>
			<br>
			</span>

			<div class="row">
				<div class="col-md-2" align="left">ความจุ :</div>
				<div class="col-md-2">
					<input type="text" class="form-control" id="vehCapacity" name="vehCapacity" value='<?php echo $vehCapacity ?>'
						placeholder="ความจุ"/>
				</div>
				<div class="col-md-2" align="right">น้ำหนัก :</div>
				<div class="col-md-2">
					<input type="text" class="form-control" id="vehWeight" name="vehWeight" value='<?php echo $vehWeight ?>'
						placeholder="น้ำหนัก" />
				</div>
				<div class="col-md-2" align="right">จำนวนที่นั่ง :</div>
				<div class="col-md-2">
					<input type="text" class="form-control" id="vehSeat" name="vehSeat" value='<?php echo $vehSeat ?>'
						placeholder="จำนวนที่นั่ง" /> 
				</div>
			</div>
			<br>

			<div class="row">
				<div class="col-md-2" align="left">เลขตัวถัง :</div>
				<div class="col-md-2">
					<input type="text" class="form-control" id="vehChassisNum" name="vehChassisNum" value='<?php echo $vehChassisNum ?>'
						placeholder="เลขตัวถัง" >
				</div>
				<div class="col-md-2" align="right">ทะเบียนรถ:</div>
				<div class="col-md-2">
					<input type="text" class="form-control" id="vehLicenseNum" name="vehLicenseNum" value='<?php echo $vehLicenseNum ?>'
						placeholder="ทะเบียนรถ" required>
				</div>
				
			</div>
			<br>

	
			<span name="tariffInfo" id="tariffInfo">
			<input type="hidden" name="tarIDPK" id="tarIDPK" value='<?php echo $tarIDPK ?>' required/>
						
			<div class="row">
				<div class="col-md-2" align="left">ประเภท :</div>
				<div class="col-md-2" name="tarBody" id="tarBody">
				<select class="form-control">
						<option>กรุณาเลือก</option>
				</select>	
				</div>
				
				<div class="col-md-2" align="right">ประเภทย่อย :</div>
				<div class="col-md-2" name="tarSubBody" id="tarSubBody" >
				<select class="form-control">
						<option>กรุณาเลือก</option>
				</select>	
				</div>
				<div class="col-md-2" align="right">การใช้งาน :</div>
				<div class="col-md-2" name="tarUsage" id="tarUsage">
				<select class="form-control">
						<option>กรุณาเลือก</option>
				</select>	
				</div>		
			</div>


			</span>
			<br>	
			
			<span id="vehTARvehCodeFK" name="vehTARvehCodeFK">
			<div class="row" >
				<div class="col-md-2" align="left">รหัสรถ :</div>
				<div class="col-md-2" >
					<input type="text" id="vehTARvehCodeFK" name="vehTARvehCodeFK" class="form-control" placeholder="รหัสรถ" value='<?php echo $vehTARvehCodeFK ?>' required readonly>
				</div>
			</div>	
			<br>
				

			<div class="row titleInsured">
				<div class="col-md-12" align="left">
					<div>
						<h4 style="display: -webkit-inline-box;padding-left: 5px; color:white;"><b>เบี้ยประกัน</b></h4>
					</div>
				</div>
			</div>
			<br>

			<div class="row">
				<div class="col-md-2" align="left">เบี้ยสุทธิ :</div>
				<div class="col-md-2">
					<input type="hidden" class="form-control" id="premStdNet" name="premStdNet" value='<?php echo $premStdNet ?>'>	
					<input type="text" class="form-control" id="premNet" name="premNet" value='<?php echo $premNet ?>'
						placeholder="0.00" required readonly>
				</div>
				<div class="col-md-2" align="right">ภาษีมูลค่าเพิ่ม :</div>
				<div class="col-md-2">
					<input type="hidden" class="form-control" id="premStdVat" name="premStdVat" value='<?php echo $premStdVat ?>'>	
					<input type="text" class="form-control" id="premVat" name="premVat" value='<?php echo $premVat ?>'
						placeholder="0.00" required readonly>
				</div>
				<div class="col-md-2" align="right">อากรสแตมป์ :</div>
				<div class="col-md-2">
					<input type="hidden" class="form-control" id="premStdStampDuty" name="premStdStampDuty" value='<?php echo $premStdStampDuty ?>'>
					<input type="text" class="form-control" id="premStampDuty" name="premStampDuty" value='<?php echo $premStampDuty ?>'
						placeholder="0.00" required readonly>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-2" align="left">เบี้ยรวม:</div>
				<div class="col-md-2">
					<input type="hidden" class="form-control" id="premStdTotal" name="premStdTotal" value='<?php echo $premStdTotal ?>'>	
					<input type="text" class="form-control" id="premTotal" name="premTotal" value='<?php echo $premTotal ?>'
						placeholder="0.00" required readonly>
				</div>				
			</div>
			</span>
			<br>

			<div class="row titleInsured">
				<div class="col-md-6" align="left">
					<div>
						<h4 style="display: -webkit-inline-box;padding-left: 5px; color:white;"><b>ข้อมูลผู้ถือกรมธรรม์</b></h4>
					</div>
				</div>
			</div>
			<br>

			<div class="row">
				<div class="col-md-2" align="left">คำนำหน้าชื่อ :</div>
				<input type="hidden" class="form-control" id="PHD_perSaluID" name="PHD_perSaluID" value='<?php echo $PHD_perSalu ?>'>
				<div class="col-md-2" id="PHD_perSalu" name="PHD_perSalu">
					<select class="form-control">
						<option>กรุณาเลือก</option>
					</select>
				</div>
				<div class="col-md-2" align="right">ชื่อ :</div>
				<div class="col-md-2">
					<input type="text" class="form-control" id="PHD_perFName" name="PHD_perFName" value='<?php echo $PHD_perFName ?>'
						placeholder="ชื่อ" required>
				</div>
				<div class="col-md-2" align="right">นามสกุล :</div>
				<div class="col-md-2">
					<input type="hidden" class="form-control" id="PHD_perMName" name="PHD_perMName" value='<?php echo $PHD_perMName ?>'>
					<input type="text" class="form-control" id="PHD_perLName" name="PHD_perLName" value='<?php echo $PHD_perLName ?>'
						placeholder="นามสกุล" required>
				</div>
			</div>
			<br>

			<div class="row">
				<div class="col-md-2" align="left">วันเกิด :</div>
				<div class="col-md-2">
					<div class="date" id="datetimepicker6">						
						<div id="datetimepicker6" class="input-group date"> 
			               <input type="text" class="form-control" data-format="dd-MM-yyyy" placeholder="วันเกิด" 
							id="PHD_perDOB" name="PHD_perDOB" value='<?php echo $PHD_perDOB; ?>' >
			                <span class="add-on"> 
			                    <i class="glyphicon glyphicon-calendar cld"></i> 
			                </span> 
            			</div> 
					</div>
				</div>
			</div>
			<br>

			<div class="row">				
				<div class="col-md-2" align="left">ประเภทบัตร :</div>
				<input type="hidden" class="form-control" id="PHD_perCardTypeID" name="PHD_perCardTypeID" value='<?php echo $PHD_perCardType ?>'>
				<div class="col-md-2" name="PHD_perCardType" id="PHD_perCardType"> 
					<select class="form-control" required>				
					<option>กรุณาเลือก</option>
					</select>
				</div>
				<div class="col-md-2" align="right">เลขที่บัตร :</div>
				<div class="col-md-2">
					<input type="text" class="form-control" id="PHD_perCardNo" name="PHD_perCardNo" value='<?php echo $PHD_perCardNo ?>'
						placeholder="เลขที่บัตร" required>
				</div>
				<div class="col-md-2" align="right">วันหมดอายุ :</div>
				<div class="col-md-2">
					<div class="date" id="datetimepicker7">						
						<div id="datetimepicker7" class="input-group date"> 
			               <input type="text" class="form-control" data-format="dd-MM-yyyy" placeholder="วันหมดอายุ" 
							id="PHD_perExpDate" name="PHD_perExpDate" value='<?php echo $PHD_perExpDate; ?>' required>
			                <span class="add-on"> 
			                    <i class="glyphicon glyphicon-calendar cld"></i> 
			                </span> 
            			</div> 
					</div>
				</div>
			</div>
			<br>

			<div class="row">
				<div class="col-md-2" align="left">บ้านเลขที่ :</div>
				<div class="col-md-2">
					<input type="text" class="form-control" id="PHD_addrLine1" name="PHD_addrLine1" value='<?php echo $PHD_addrLine1 ?>'
						placeholder="บ้านเลขที่" required>
				</div>
				<div class="col-md-2" align="right">หมู่บ้าน/ซอย/ถนน :</div>
				<div class="col-md-2">
					<input type="text" class="form-control" id="PHD_addrLine2" name="PHD_addrLine2" value='<?php echo $PHD_addrLine2 ?>'
						placeholder="หมู่บ้าน/ซอย/ถนน">
				</div>
			</div>
			<br>
			<span name="PHD_addr" id="PHD_addr">
			<div class="row">
				<div class="col-md-2" align="left">จังหวัด :</div>
				<input type="hidden" class="form-control" id="PHD_addrProvID" name="PHD_addrProvID" value='<?php echo $PHD_addrProv ?>'>
				<div class="col-md-2" id="PHD_addrProv" name="PHD_addrProv">
					<select class="form-control">
						<option>กรุณาเลือก</option>
					</select>
				</div>
				<div class="col-md-2" align="right">เขต/อำเภอ :</div>
				<input type="hidden" class="form-control" id="PHD_addrDistID" name="PHD_addrDistID" value='<?php echo $PHD_addrDist ?>'>
				<div class="col-md-2" id="PHD_addrDist" name="PHD_addrDist">
					<select class="form-control">
						<option>กรุณาเลือก</option>
					</select>	
				</div>
				<div class="col-md-2" align="right">แขวง/ตำบล :</div>
				<input type="hidden" class="form-control" id="PHD_addrSubDistID" name="PHD_addrSubDistID" value='<?php echo $PHD_addrSubDist ?>'>
				<div class="col-md-2" id="PHD_addrSubDist" name="PHD_addrSubDist">
					<select class="form-control">
						<option>กรุณาเลือก</option>	
					</select>	
				</div>
			</div>
			<br>

			<div class="row">
				<div class="col-md-2" align="left">รหัสไปรษณีย์ :</div>
				<input type="hidden" class="form-control" id="PHD_addrZipCodeID" name="PHD_addrZipCodeID" value='<?php echo $PHD_addrZipCode ?>'>
				<div class="col-md-2" id="PHD_addrZipCode" name="PHD_addrZipCode">
					<select class="form-control" id="PHD_addrZipCode" name="PHD_addrZipCode">
						<option>กรุณาเลือก</option>
					</select>		
				</div>
			</div>
			</span>
			<br>

			<div class="row">
				<div class="col-md-2" align="left">อีเมล์ :</div>
				<div class="col-md-2">
					<input type="text" class="form-control" placeholder="อีเมล์" id="PHD_addrEmail"  name="PHD_addrEmail" value='<?php echo $PHD_addrEmail ?>' >
				</div>
				<div class="col-md-2" align="right">ประเภทเบอร์ติดต่อ:</div>
				<input type="hidden" class="form-control" id="PHD_addrContType1ID" name="PHD_addrContType1ID" value='<?php echo $PHD_addrContType1 ?>'>
				<div class="col-md-2" name="PHD_addrContType1" id="PHD_addrContType1"> 
					<select class="form-control">
						<option>กรุณาเลือก</option>
					</select>
				</div>
				<div class="col-md-2" align="right">เบอร์ติดต่อ:</div>
				<div class="col-md-2">
					<input type="text" class="form-control" id="PHD_addrContNum1"
						placeholder="เบอร์ติดต่อ" name="PHD_addrContNum1" value='<?php echo $PHD_addrContNum1 ?>' required>
				</div>
			</div>
			<br>

			<span id="insuredInfo">
			<div class="row titleInsured">
				<div class="col-md-6" align="left">
					<div>
						<h4 style="display: -webkit-inline-box;padding-left: 5px; color:white;"><b>ข้อมูลผู้เอากรมธรรม์</b></h4>
					</div>
				</div>
				<div class="col-md-6" align="right">
					<div style="height: 30px;top: 8px; position: relative;">
						<input type="checkbox" name="titleInsured" value="titleInsured" checked="checked" >&nbsp;&nbsp; <span class="txtIs">Insured same as policyholder</span>
					</div>
				</div>
			</div>
			<br>
			</span>	

			<div class="row">
				<div class="col-md-12" align="center">
					<a href="home.php"><input type="button" class="btn btn-primary btn-md" name="btn" id="btn" value="Cancel"/></a>
					<input type="Reset" class="btn btn-primary btn-md"/>
					<input type="Submit" class="btn btn-primary btn-md" name="btn" id="btn" value="Save"/>
					<input type="Submit" class="btn btn-primary btn-md" name="btn" id="btn" value="Submit for Payment"/>

				</div>
			</div>
	<!-- polIDPK: --><input type="hidden" placeholder="" id="polIDPK" name="polIDPK" value='<?php echo $polIDPK; ?>' randonly /><!-- <br> -->
      
	<!-- polOrgIDFK: --><input type="hidden" placeholder="" id="polOrgIDFK" name="polOrgIDFK" value='<?php echo $polOrgIDFK; ?>' randonly />
	<!-- orgIDPK: --><input type="hidden" placeholder="" id="orgIDPK" name="orgIDPK" value='<?php echo $orgIDPK; ?>' randonly />
	<!-- orgShortName: --><input type="hidden" placeholder="" id="orgShortName" name="orgShortName" value='<?php echo $orgShortName; ?>' randonly />
	<!-- orgLongNameTH: -->
	<!-- <input type="hidden" placeholder="" id="orgLongNameTH" name="orgLongNameTH" value='<?php echo $orgLongNameTH; ?>' randonly /><br> --> 
	<!-- orgLongNameEN: -->
	<!-- <input type="hidden" placeholder="" id="orgLongNameEN" name="orgLongNameEN" value='<?php echo $orgLongNameEN; ?>' randonly /><br> --> 
	<!-- orgPolPrefix: -->
	<!-- <input type="hidden" placeholder="" id="orgPolPrefix" name="orgPolPrefix" value='<?php echo $orgPolPrefix; ?>' randonly /><br> --> 
	<!-- orgPolLength: -->
	<!-- <input type="hidden" placeholder="" id="orgPolLength" name="orgPolLength" value='<?php echo $orgPolLength; ?>' randonly /><br> --> 

    <!-- polStatusIDFK: --><input type="hidden" placeholder="" id="polStatusIDFK" name="polStatusIDFK" value='<?php echo $polStatusIDFK; ?>' randonly />   
	<!-- staIDPK: --><input type="hidden" placeholder="" id="staIDPK" name="staIDPK" value='<?php echo $staIDPK; ?>' randonly />
	<!-- staNameEN: --><input type="hidden" placeholder="" id="staNameEN" name="staNameEN" value='<?php echo $staNameEN; ?>' randonly />
	<!-- staNameTH: --><input type="hidden" placeholder="" id="staNameTH" name="staNameTH" value='<?php echo $staNameTH; ?>' randonly />

    <!-- staDesc:<input type="hidden" placeholder="" id="staDesc" name="staDesc" value='<?php echo $staDesc; ?>' randonly /><br> -->
    <!-- staUpdatedDate:<input type="hidden" placeholder="" id="staUpdatedDate" name="staUpdatedDate" value='<?php echo $staUpdatedDate; ?>' randonly /><br> -->
    <!-- staUpdatedBy:<input type="hidden" placeholder="" id="staUpdatedBy" name="staUpdatedBy" value='<?php echo $staUpdatedBy; ?>' randonly /><br> -->

    <!--polMaspolNum: --><input type="hidden" placeholder="" id="polMaspolNum" name="polMaspolNum" value='<?php echo $polMaspolNum; ?>' randonly /><!--<br>-->
	<!--polMaspolNum: --><input type="hidden" placeholder="" id="polMaspolNum" name="polMaspolNum" value='<?php echo $polMaspolNum; ?>' randonly /><!--<br>-->
	<!--polQuoNum: --><input type="hidden" placeholder="" id="polQuoNum" name="polQuoNum" value='<?php echo $polQuoNum; ?>' randonly /><!--<br>-->
	<!--polNum: --><input type="hidden" placeholder="" id="polNum" name="polNum" value='<?php echo $polNum; ?>' randonly /><!--<br>-->
	<!--polCat: --><input type="hidden" placeholder="" id="polCat" name="polCat" value='<?php echo $polCat; ?>' randonly /><!--<br>-->
	<!--polReFlag: --><input type="hidden" placeholder="" id="polReFlag" name="polReFlag" value='<?php echo $polReFlag; ?>' randonly /><!--<br>-->
	<!--polEffDate: --><input type="hidden" placeholder="วันที่เริ่มคุ้มครอง" id="polEffDate" name="polEffDate" value='<?php echo $polEffDate; ?>' required /><!--<br>-->
	<!--polExpDate: --><input type="hidden" placeholder="วันสิ้นสุดความคุ้มครอง" id="polExpDate" name="polExpDate" value='<?php echo $polExpDate; ?>' required /><!--<br>-->
	<!--polQuoCreateDate: --><input type="hidden" placeholder="วันที่สร้างใบเสนอราคา" id="polQuoCreateDate" name="polQuoCreateDate" value='<?php echo $polQuoCreateDate; ?>' randonly /><!--<br>-->
	<!--polQuoDate: --><input type="hidden" placeholder="วันที่ออกใบเสนอราคา" id="polQuoDate" name="polQuoDate" value='<?php echo $polQuoDate; ?>' randonly /><!--<br>-->
	<!--polProDate: --><input type="hidden" placeholder="" id="polProDate" name="polProDate" value='<?php echo $polProDate; ?>' randonly /><!--<br>-->
	<!--polAppReceivedDate: --><input type="hidden" placeholder="" id="polAppReceivedDate" name="polAppReceivedDate" value='<?php echo $polAppReceivedDate; ?>' randonly /><!--<br>-->
	<!--polIssueDate: --><input type="hidden" placeholder="" id="polIssueDate" name="polIssueDate" value='<?php echo $polIssueDate; ?>' randonly /><!--<br>-->
	<!--polIssueBy: --><input type="hidden" placeholder="" id="polIssueBy" name="polIssueBy" value='<?php echo $polIssueBy; ?>' randonly /><!--<br>-->

	<!--polAGTIDFK:--><input type="hidden" placeholder="" value='<?php echo $polAGTIDFK; ?>' randonly />
	<!--agtIDPK:--><input type="hidden" placeholder="" id="agtIDPK" name="agtIDPK" value='<?php echo $agtIDPK; ?>' randonly />
	<!--agtCode:--><input type="hidden" placeholder="" id="agtCode" name="agtCode" value='<?php echo $agtCode; ?>' randonly /><!--<br>-->

	<!--polPRODIDFK:--><input type="hidden" placeholder="" id="polPRODIDFK" name="polPRODIDFK" value='<?php echo $polPRODIDFK; ?>' randonly /><!--<br>-->
	<!--polPREMIDFK:--><input type="hidden" placeholder="" id="polPREMIDFK" name="polPREMIDFK" value='<?php echo $polPREMIDFK; ?>' randonly /><!--<br>-->
	<!--polCUSIDFKPHD:--><input type="hidden" placeholder="" id="polCUSIDFKPHD" name="polCUSIDFKPHD" value='<?php echo $polCUSIDFKPHD; ?>' randonly /><!--<br>-->
	<!--polCUSAddrIDPHD:--><input type="hidden" placeholder="" id="polCUSAddrIDPHD" name="polCUSAddrIDPHD" value='<?php echo $polCUSAddrIDPHD; ?>' randonly /><!--<br>-->
	<!--polCUSIDFKINS:--><input type="hidden" placeholder="" id="polCUSIDFKINS" name="polCUSIDFKINS" value='<?php echo $polCUSIDFKINS; ?>' randonly /><!--<br>-->
	<!--polCUSAddrIDINS:--><input type="hidden" placeholder="" id="polCUSAddrIDINS" name="polCUSAddrIDINS" value='<?php echo $polCUSAddrIDINS; ?>' randonly /><!--<br>-->

	<!--polVEHIDFK:--><input type="hidden" placeholder="" id="polVEHIDFK" name="polVEHIDFK" value='<?php echo $polVEHIDFK; ?>' randonly />
	<!--vehREDKEYFK:--><input type="hidden" placeholder="" id="vehREDKEYFK" name="vehREDKEYFK" value='<?php echo $vehREDKEYFK; ?>' randonly />
	<!--redIDPK:--><input type="hidden" placeholder="" id="redIDPK" name="redIDPK" value='<?php echo $redIDPK; ?>' randonly />
	<!--redKey:--><input type="hidden" placeholder="" value='<?php echo $redKey; ?>' randonly />
	<!--redMake:--><input type="hidden" value='<?php echo $redMake; ?>' />
	<!--redModel:--><input type="hidden" value='<?php echo $redModel; ?>' />
	<!--redYear:--><input type="hidden" value='<?php echo $redYear; ?>' />
	<!-- redDesc:--><input type="hidden" value='<?php echo $redDesc; ?>' /><!--<br>-->
      
	<!--vehIDPK:--><input type="hidden" placeholder="" id="vehIDPK" name="vehIDPK" value='<?php echo $vehIDPK; ?>' randonly />
	<!--vehTARIDFK:--><input type="hidden" id="vehTARIDFK" name="vehTARIDFK" value='<?php echo $vehTARIDFK ?>' readonly>
	<!--vehTARvehCodeFK:--><input type="hidden" placeholder="" value='<?php echo $vehTARvehCodeFK; ?>' randonly />
	<!--tarIDPK:--><input type="hidden" placeholder="" value='<?php echo $tarIDPK; ?>' randonly /><!--<br>-->

	<!--premIDPK:--><input type="hidden" placeholder="" id="premIDPK" name="premIDPK" value='<?php echo $premIDPK; ?>' randonly /><!--<br>-->
	<!--premStdNet:--><input type="hidden" placeholder="" value='<?php echo $premStdNet; ?>' randonly /><!--<br>-->
	<!--premStdVat:--><input type="hidden" placeholder="" value='<?php echo $premStdVat; ?>' randonly /><!--<br>-->
	<!--premStdStampDuty:--><input type="hidden" placeholder="" value='<?php echo $premStdStampDuty; ?>' randonly /><!--<br>-->
	<!--premStdTotal:--><input type="hidden" placeholder="" value='<?php echo $premStdTotal; ?>' randonly /><!--<br>-->
	<!--premPercentVat:--><input type="hidden" placeholder="" id="premPercentVat" name="premPercentVat" value='<?php echo $premPercentVat; ?>' randonly /><!--<br>-->
	<!--premPerDiscount:--><input type="hidden" placeholder="" id="premPerDiscount" name="premPerDiscount" value='<?php echo $premPerDiscount; ?>' randonly /><!--<br>-->
	<!--premDiscountFlag:--><input type="hidden" placeholder="" id="premDiscountFlag" name="premDiscountFlag" value='<?php echo $premDiscountFlag; ?>' randonly /><!--<br>-->
	<!--premDiscount:--><input type="hidden" placeholder="" id="premDiscount" name="premDiscount" value='<?php echo $premDiscount; ?>' randonly /><!--<br>-->
	<!--premNet:--><input type="hidden" placeholder="" id="premNet" name="premNet" value='<?php echo $premNet; ?>' randonly /><!--<br>-->
	<!--premStampDuty:--><input type="hidden" placeholder="" id="premStampDuty" name="premStampDuty" value='<?php echo $premStampDuty; ?>' randonly /><!--<br>-->
	<!--premVat:--><input type="hidden" placeholder="" id="premVat" name="premVat" value='<?php echo $premVat; ?>' randonly /><!--<br>-->
	<!--premTotal:--><input type="hidden" placeholder="" id="premTotal" name="premTotal" value='<?php echo $premTotal; ?>' randonly /><!--<br>-->
	<!--premQuoNumRef:--><input type="hidden" placeholder="" id="premQuoNumRef" name="premQuoNumRef" value='<?php echo $premQuoNumRef; ?>' randonly /><!--<br>-->
	<!--premOutstanding:--><input type="hidden" placeholder="" id="premOutstanding" name="premOutstanding" value='<?php echo $premOutstanding; ?>' randonly /><!--<br>-->
	<!--premPaid:--><input type="hidden" placeholder="" id="premPaid" name="premPaid" value='<?php echo $premPaid; ?>' randonly /><!--<br>-->
	<!--premPaidStatus:--><input type="hidden" placeholder="" id="premPaidStatus" name="premPaidStatus" value='<?php echo $premPaidStatus; ?>' randonly /><!--<br>-->
	<!--premPaidStatusAprv:--><input type="hidden" placeholder="" id="premPaidStatusAprv" name="premPaidStatusAprv" value='<?php echo $premPaidStatusAprv; ?>' randonly /><!--<br>-->
	<!--premPaidBalance:--><input type="hidden" placeholder="" id="premPaidBalance" name="premPaidBalance" value='<?php echo $premPaidBalance; ?>' randonly /><!--<br>-->
	<!--premPaidDate:--><input type="hidden" placeholder="" id="premPaidDate" name="premPaidDate" value='<?php echo $premPaidDate; ?>' randonly /><!--<br>-->
	<!--premUpdatedDate:--><input type="hidden" placeholder="" id="premUpdatedDate" name="premUpdatedDate" value='<?php echo $premUpdatedDate; ?>' randonly /><!--<br>-->
	<!--premUpdatedBy:--><input type="hidden" placeholder="" id="premUpdatedBy" name="premUpdatedBy" value='<?php echo $premUpdatedBy; ?>' randonly /><!--<br>-->
        
    <!-- polUpdatedDate: --><input type="hidden" placeholder="N/A" id="polUpdatedDate" name="polUpdatedDate" value='<?php echo $polUpdatedDate; ?>' randonly /><!--<br>-->
    <!-- polUpdatedBy: --><input type="hidden" placeholder="N/A" id="polUpdatedBy" name="polUpdatedBy" value='<?php echo $polUpdatedBy; ?>' randonly /><!--<br>-->
      
	<!--PHD_perIDPK:--><input type="hidden" placeholder="" id="PHD_perIDPK" name="PHD_perIDPK" value='<?php echo $PHD_perIDPK; ?>' /><!--<br>-->
	<!--PHD_perSalu:--><input type="hidden" placeholder="" value='<?php echo $PHD_perSalu; ?>' /><!--<br>-->
	<!--PHD_perFName:--><input type="hidden" placeholder="" value='<?php echo $PHD_perFName; ?>' /><!--<br>-->
	<!--PHD_perMName:--><input type="hidden" placeholder="" value='<?php echo $PHD_perMName; ?>' /><!--<br>-->
	<!--PHD_perLName:--><input type="hidden" placeholder="" value='<?php echo $PHD_perLName; ?>' /><!--<br>-->
	<!--PHD_perDOB:--><input type="hidden" placeholder="" value='<?php echo $PHD_perDOB; ?>' /><!--<br>-->
	<!--PHD_perCardType:--><input type="hidden" placeholder="" value='<?php echo $PHD_perCardType; ?>' /><!--<br>-->
	<!--PHD_perCardNo:--><input type="hidden" placeholder="" value='<?php echo $PHD_perCardNo; ?>' /><!--<br>-->
	<!--PHD_perExpDate:--><input type="hidden" placeholder="" value='<?php echo $PHD_perExpDate; ?>' /><!--<br>-->
	<!--PHD_perUpdatedDate:--><input type="hidden" placeholder="" id="PHD_perUpdatedDate" name="PHD_perUpdatedDate" value='<?php echo $PHD_perUpdatedDate; ?>' /><!--<br>-->
	<!--PHD_perUpdatedBy:--><input type="hidden" placeholder="" id="PHD_perUpdatedBy" name="PHD_perUpdatedBy" value='<?php echo $PHD_perUpdatedBy; ?>' /><!--<br>-->
	<!--PHD_addrIDPK:--><input type="hidden" placeholder="" id="PHD_addrIDPK" name="PHD_addrIDPK" value='<?php echo $PHD_addrIDPK; ?>' /><!--<br>-->
	<!--PHD_addrLine1:--><input type="hidden" placeholder="" value='<?php echo $PHD_addrLine1; ?>' /><!--<br>-->
	<!--PHD_addrLine2:--><input type="hidden" placeholder="" value='<?php echo $PHD_addrLine2; ?>' /><!--<br>-->
	<!--PHD_addrSubDist:--><input type="hidden" placeholder="" value='<?php echo $PHD_addrSubDist; ?>' /><!--<br>-->
	<!--PHD_addrDist:--><input type="hidden" placeholder="" value='<?php echo $PHD_addrDist; ?>' /><!--<br>-->
	<!--PHD_addrProv:--><input type="hidden" placeholder="" value='<?php echo $PHD_addrProv; ?>' /><!--<br>-->
	<!--PHD_addrZipCode:--><input type="hidden" placeholder="" value='<?php echo $PHD_addrZipCode; ?>' /><!--<br>-->
	<!--PHD_addrGeo:--><input type="hidden" placeholder="" id="PHD_addrGeo" name="PHD_addrGeo" value='<?php echo $PHD_addrGeo; ?>' /><!--<br>-->
	<!--PHD_addrEmail:--><input type="hidden" placeholder="" value='<?php echo $PHD_addrEmail; ?>' /><!--<br>-->
	<!--PHD_addrContType1:--><input type="hidden" placeholder="" value='<?php echo $PHD_addrContType1; ?>' /><!--<br>-->
	<!--PHD_addrContNum1:--><input type="hidden" placeholder="" value='<?php echo $PHD_addrContNum1; ?>' /><!--<br>-->
	<!--PHD_addrContType2:--><input type="hidden" placeholder="" id="PHD_addrContType2" name="PHD_addrContType2" value='<?php echo $PHD_addrContType2; ?>' /><!--<br>-->
	<!--PHD_addrContNum2:--><input type="hidden" placeholder="" id="PHD_addrContNum2" name="PHD_addrContNum2" value='<?php echo $PHD_addrContNum2; ?>' /><!--<br>-->
	<!--PHD_addrUpdatedDate:--><input type="hidden" placeholder="" id="PHD_addrUpdatedDate" name="PHD_addrUpdatedDate" value='<?php echo $PHD_addrUpdatedDate; ?>' /><!--<br>-->
	<!--PHD_addrUpdatedBy:--><input type="hidden" placeholder="" id="PHD_addrUpdatedBy" name="PHD_addrUpdatedBy" value='<?php echo $PHD_addrUpdatedBy; ?>' /><!--<br>-->

    <!-- userName:: --><input type="hidden" placeholder="" id="usrName" name="usrName" value='<?php echo $_SESSION["usrName"]; ?>' randonly /><!--<br>-->
    <!-- userName:: --><input type="hidden" placeholder="" id="usrRole" name="usrRole" value='<?php echo $_SESSION["usrRole"]; ?>' randonly /><!--<br>-->

			</div>
	</form>

<!-- END BODY SECTION-->	
</body><br><br>
<footer>
<!-- FOOTER SECTION-->
<?php 
// @BEGIN
// @DEKDEEDEV_IAMCMI
// @Falom
// @2016-06-19 SUN 02:08 PM 
include 'footer.php'; 
// @Falom END 2016-06-19 SUN 02:08 PM 
?>
<!-- END FOOTER SECTION-->
</footer>
</html>