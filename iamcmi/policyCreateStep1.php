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
	var provID;
	var distID;
	var subDistID;
	    function dochangeLocation(src, val) {
        	var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
		    if (xhttp.readyState == 4 && xhttp.status == 200) {
		     	document.getElementById(src).innerHTML = xhttp.responseText;
		    	}
		  	};
		  	// alert(val);
		  	switch (src) {
				case 'addrProv':
				provID=val;
				break;
            	case 'addrDist':
            	provID=val;
				break;
				case 'addrSubDist':
            	distID=val;
            	break;
            	case 'addrZipCode':
            	subDistID=val;
            	break;
            	default:
				break;
            } 
            
            // alert("provID:"+provID+" distID:"+distID+"subDistID:"+subDistID);
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

        function dochangePoliycInfo(src, val) {
	    	var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
		    if (xhttp.readyState == 4 && xhttp.status == 200) {
		     	document.getElementById(src).innerHTML = xhttp.responseText;
		    	}
		  	};
		     xhttp.open("GET", "policyInfo.php?data="+src+"&val="+val); //สร้าง connection
             xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
             xhttp.send(null); //ส่งค่า
        }

        function dochangeAgentInfo(src, val, usrName, usrRole) {
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

        function myFunction(addrProv,addrDist,addrSubDist,addrZipCode,perCardType,addrContType1,perSalu){
        	window.onLoad=dochangeLocation('addrProv', -1);   

        	tarBody = document.getElementById("tarBodyName").value;
        	tarSubBody = document.getElementById("tarSubBodyName").value;
        	tarUsage = document.getElementById("tarUsageName").value;
        	redMake = document.getElementById("redMakeName").value;
        	redModel = document.getElementById("redModelName").value;
        	redDesc = document.getElementById("redDescName").value;
        	redYear = document.getElementById("redYearName").value;
        	window.onLoad=dochangeTariff('tarBody', tarBody);
        	window.onLoad=dochangeTariff('tarSubBody', tarBody);
        	window.onLoad=dochangeTariff('tarUsage', tarSubBody);
        	window.onLoad=dochangeRedbook('redMake', redMake);
        	window.onLoad=dochangeRedbook('redModel', redMake); 
        	window.onLoad=dochangeRedbook('redYear', redModel);  
        	window.onLoad=dochangeRedbook('redDesc', redYear);    
        	window.onLoad=dochangePoliycInfo('polAGTIDFK', "Admin");
        	window.onLoad=dochangePoliycInfo('perCardType', perCardType);
        	window.onLoad=dochangePoliycInfo('addrContType1', addrContType1);
        	window.onLoad=dochangePoliycInfo('perSalu', perSalu);

        	provID=addrProv;
        	distID=addrDist;
        	subDistID=addrSubDist;
        	zipCodeID=addrZipCode;

        	window.onLoad=dochangeLocation('addrProv',provID);
        	window.onLoad=dochangeLocation('addrDist',provID);
        	window.onLoad=dochangeLocation('addrSubDist',distID);
        	window.onLoad=dochangeLocation('addrZipCode',subDistID);
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
        	window.onLoad=dochangeAgentInfo('polAGTIDFK', polAGTIDFK, usrName, usrRole)
     
     		
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
		$polEffDate 	= date("Y-m-d H:i:s");
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
						placeholder="ความจุ" required/>
				</div>
				<div class="col-md-2" align="right">น้ำหนัก :</div>
				<div class="col-md-2">
					<input type="text" class="form-control" id="vehWeight" name="vehWeight" value='<?php echo $vehWeight ?>'
						placeholder="น้ำหนัก" required/>
				</div>
				<div class="col-md-2" align="right">จำนวนที่นั่ง :</div>
				<div class="col-md-2">
					<input type="text" class="form-control" id="vehSeat" name="vehSeat" value='<?php echo $vehSeat ?>'
						placeholder="จำนวนที่นั่ง" required/> 
				</div>
			</div>
			<br>

			<div class="row">
				<div class="col-md-2" align="left">เลขตัวถัง :</div>
				<div class="col-md-2">
					<input type="text" class="form-control" id="vehChassisNum" name="vehChassisNum" value='<?php echo $vehChassisNum ?>'
						placeholder="เลขตัวถัง" required>
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
				<div class="col-md-6" align="right">
					<div style="height: 30px;top: 8px; position: relative;">
						<input type="checkbox" name="titleInsured" value="titleInsured">&nbsp;&nbsp; <span class="txtIs">Insured same as policyholder</span>
					</div>
				</div>
			</div>
			<br>

			<!-- <div class="row">
				<div class="col-md-2" align="left">คำนำหน้าชื่อ :</div>
				<div class="col-md-2" id="perSalu" name="perSalu">
					<select class="form-control">
						<option>กรุณาเลือก</option>
					</select>
				</div>
				<div class="col-md-2" align="right">ชื่อ :</div>
				<div class="col-md-2">
					<input type="text" class="form-control" id="perFName" name="perFName" value='<?php echo $perFName ?>'
						placeholder="ชื่อ" required>
				</div>
				<div class="col-md-2" align="right">นามสกุล :</div>
				<div class="col-md-2">
					<input type="text" class="form-control" id="perLName" name="perLName" value='<?php echo $perLName ?>'
						placeholder="นามสกุล" required>
				</div>
			</div>
			<br> -->

			<!-- <div class="row">
				<div class="col-md-2" align="left">วันเกิด :</div>
				<div class="col-md-2">
					<div class="date" id="datetimepicker6">						
						<div id="datetimepicker6" class="input-group date"> 
			               <input type="text" class="form-control" data-format="dd-MM-yyyy" placeholder="วันเกิด" 
							id="perDOB" name="perDOB" value='<?php echo $perDOB; ?>' required>
			                <span class="add-on"> 
			                    <i class="glyphicon glyphicon-calendar cld"></i> 
			                </span> 
            			</div> 
					</div>
				</div>
			</div>
			<br> -->

			<!-- <div class="row">				
				<div class="col-md-2" align="left">ประเภทบัตร :</div>
				<div class="col-md-2" name="perCardType" id="perCardType"> 
					<select class="form-control" required>				
					<option>กรุณาเลือก</option>
					</select>
				</div>
				<div class="col-md-2" align="right">เลขที่บัตร :</div>
				<div class="col-md-2">
					<input type="text" class="form-control" id="perCardNo" name="perCardNo" value='<?php echo $perCardNo ?>'
						placeholder="เลขที่บัตร" required>
				</div>
				<div class="col-md-2" align="right">วันหมดอายุ :</div>
				<div class="col-md-2">
					<div class="date" id="datetimepicker7">						
						<div id="datetimepicker7" class="input-group date"> 
			               <input type="text" class="form-control" data-format="dd-MM-yyyy" placeholder="วันหมดอายุ" 
							id="perExpDate" name="perExpDate" value='<?php echo $perDOB; ?>' required>
			                <span class="add-on"> 
			                    <i class="glyphicon glyphicon-calendar cld"></i> 
			                </span> 
            			</div> 
					</div>
				</div>
			</div> -->
			<br>

			<!-- <div class="row">
				<div class="col-md-2" align="left">บ้านเลขที่1 :</div>
				<div class="col-md-2">
					<input type="text" class="form-control" id="addrLine1" name="addrLine1" value='<?php echo $addrLine1 ?>'
						placeholder="บ้านเลขที่1" required>
				</div>
				<div class="col-md-2" align="right">บ้านเลขที่2 :</div>
				<div class="col-md-2">
					<input type="text" class="form-control" id="addrLine2" name="addrLine2" value='<?php echo $addrLine2 ?>'
						placeholder="บ้านเลขที่2" required>
				</div>
			</div>
			<br> -->

			<!-- <div class="row">
				<div class="col-md-2" align="left">จังหวัด :</div>
				<div class="col-md-2" id="addrProv" name="addrProv">
					<select class="form-control">
						<option>กรุณาเลือก</option>
					</select>
				</div>
				<div class="col-md-2" align="right">แขวง/อำเภอ :</div>
				<div class="col-md-2" id="addrDist" name="addrDist">
					<select class="form-control">
						<option>กรุณาเลือก</option>
					</select>	
				</div>
				<div class="col-md-2" align="right">เขต/ตำบล :</div>
				<div class="col-md-2" id="addrSubDist" name="addrSubDist">
					<select class="form-control">
						<option>กรุณาเลือก</option>	
					</select>	
				</div>
			</div>
			<br> -->

			<!-- <div class="row">
				<div class="col-md-2" align="left">รหัสไปรษณีย์ :</div>
				<div class="col-md-2" id="addrZipCode" name="addrZipCode">
					<select class="form-control" id="addrZipCode" name="addrZipCode">
						<option>กรุณาเลือก</option>
					</select>		
				</div>
			</div>
			<br> -->

			<!-- <div class="row">
				<div class="col-md-2" align="left">อีเมล์ :</div>
				<div class="col-md-2">
					<input type="text" class="form-control" placeholder="อีเมล์" id="addrEmail"  name="addrEmail" value='<?php echo $addrEmail ?>' required>
				</div>
				<div class="col-md-2" align="right">ประเภทเบอร์ติดต่อ:</div>
				<div class="col-md-2" name="addrContType1" id="addrContType1"> 
					<select class="form-control">
						<option>กรุณาเลือก</option>
					</select>
				</div>
				<div class="col-md-2" align="right">เบอร์ติดต่อ:</div>
				<div class="col-md-2">
					<input type="text" class="form-control" id="addrContNum1"
						placeholder="เบอร์ติดต่อ" name="addrContNum1" value='<?php echo $addrContNum1 ?>' required>
				</div>
			</div>
			<br> -->

			<div class="row">
				<div class="col-md-12" align="center">
					<!-- <input type="hidden" id="polOrgIDFK" name="polOrgIDFK" value="<?php echo $polOrgIDFK; ?>"/>
					<input type="hidden" id="polPREMIDFK" name="polPREMIDFK" value="<?php echo $polPREMIDFK; ?>"/>
					<input type="hidden" id="polCUSIDFKPHD" name="polCUSIDFKPHD" value="<?php echo $polCUSIDFKPHD; ?>"/>
					<input type="hidden" id="polCUSIDFKINS" name="polCUSIDFKINS" value="<?php echo $polCUSIDFKINS; ?>"/>
					<input type="hidden" id="polCUSAddrIDPHD" name="polCUSAddrIDPHD" value="<?php echo $polCUSAddrIDPHD; ?>"/>
					<input type="hidden" id="polCUSAddrIDINS" name="polCUSAddrIDINS" value="<?php echo $polCUSAddrIDINS; ?>"/>
					<input type="hidden" id="polVEHIDFK" name="polVEHIDFK" value="<?php echo $polVEHIDFK; ?>"/>
					<input type="hidden" id="vehIDPK" name="vehIDPK" value="<?php echo $vehIDPK; ?>"/>
					<input type="hidden" id="perIDPK" name="perIDPK" value="<?php echo $perIDPK; ?>"/>
					<input type="hidden" id="addrIDPK" name="addrIDPK" value="<?php echo $addrIDPK; ?>"/>
					<input type="hidden" id="addrIDPK" name="addrIDPK" value="<?php echo $polOrgIDFK; ?>"/> -->

					<a href="home.php"><input type="button" class="btn btn-primary btn-md" name="btn" id="btn" value="Cancel"/></a>
					<input type="Reset" class="btn btn-primary btn-md"/>
					<input type="Submit" class="btn btn-primary btn-md" name="btn" id="btn" value="Save"/>
					<input type="Submit" class="btn btn-primary btn-md" name="btn" id="btn" value="Submit"/>

				</div>
			</div>

			polIDPK:<input type="text" placeholder="" id="polIDPK" name="polIDPK" value='<?php echo $polIDPK; ?>' randonly /><br>
			
			polOrgIDFK:<input type="text" placeholder="" id="polOrgIDFK" name="polOrgIDFK" value='<?php echo $polOrgIDFK; ?>' randonly />
			orgIDPK:<input type="text" placeholder="" id="orgIDPK" name="orgIDPK" value='<?php echo $orgIDPK; ?>' randonly />
			orgShortName:<input type="text" placeholder="" id="orgShortName" name="orgShortName" value='<?php echo $orgShortName; ?>' randonly /><br>
			<!-- orgLongNameTH:<input type="text" placeholder="" id="orgLongNameTH" name="orgLongNameTH" value='<?php echo $orgLongNameTH; ?>' randonly /><br> -->
			<!-- orgLongNameEN:<input type="text" placeholder="" id="orgLongNameEN" name="orgLongNameEN" value='<?php echo $orgLongNameEN; ?>' randonly /><br> -->
			<!-- orgPolPrefix:<input type="text" placeholder="" id="orgPolPrefix" name="orgPolPrefix" value='<?php echo $orgPolPrefix; ?>' randonly /><br> -->
			<!-- orgPolLength:<input type="text" placeholder="" id="orgPolLength" name="orgPolLength" value='<?php echo $orgPolLength; ?>' randonly /><br> -->
			
			polStatusIDFK:<input type="text" placeholder="" id="polStatusIDFK" name="polStatusIDFK" value='<?php echo $polStatusIDFK; ?>' randonly />		
			staIDPK:<input type="text" placeholder="" id="staIDPK" name="staIDPK" value='<?php echo $staIDPK; ?>' randonly /><br>
			staNameEN:<input type="text" placeholder="" id="staNameEN" name="staNameEN" value='<?php echo $staNameEN; ?>' randonly />
			staNameTH:<input type="text" placeholder="" id="staNameTH" name="staNameTH" value='<?php echo $staNameTH; ?>' randonly /><br>
			<!-- staDesc:<input type="text" placeholder="" id="staDesc" name="staDesc" value='<?php echo $staDesc; ?>' randonly /><br> -->
			<!-- staUpdatedDate:<input type="text" placeholder="" id="staUpdatedDate" name="staUpdatedDate" value='<?php echo $staUpdatedDate; ?>' randonly /><br> -->
			<!-- staUpdatedBy:<input type="text" placeholder="" id="staUpdatedBy" name="staUpdatedBy" value='<?php echo $staUpdatedBy; ?>' randonly /><br> -->

			polMaspolNum:<input type="text" placeholder="" id="polMaspolNum" name="polMaspolNum" value='<?php echo $polMaspolNum; ?>' randonly /><br>
			polMaspolNum:<input type="text" placeholder="" id="polMaspolNum" name="polMaspolNum" value='<?php echo $polMaspolNum; ?>' randonly /><br>
			polQuoNum:<input type="text" placeholder="" id="polQuoNum" name="polQuoNum" value='<?php echo $polQuoNum; ?>' randonly /><br>
			polNum:<input type="text" placeholder="" id="polNum" name="polNum" value='<?php echo $polNum; ?>' randonly /><br>
			polCat:<input type="text" placeholder="" id="polCat" name="polCat" value='<?php echo $polCat; ?>' randonly /><br>
			polReFlag:<input type="text" placeholder="" id="polReFlag" name="polReFlag" value='<?php echo $polReFlag; ?>' randonly /><br>
			polEffDate:<input type="text" placeholder="วันที่เริ่มคุ้มครอง" id="polEffDate" name="polEffDate" value='<?php echo $polEffDate; ?>' required /><br>
			polExpDate:<input type="text" placeholder="วันสิ้นสุดความคุ้มครอง" id="polExpDate" name="polExpDate" value='<?php echo $polExpDate; ?>' required /><br>
			polQuoCreateDate:<input type="text" placeholder="วันที่สร้างใบเสนอราคา" id="polQuoCreateDate" name="polQuoCreateDate" value='<?php echo $polQuoCreateDate; ?>' randonly /><br>
			polQuoDate:<input type="text" placeholder="วันที่ออกใบเสนอราคา" id="polQuoDate" name="polQuoDate" value='<?php echo $polQuoDate; ?>' randonly /><br>
			polProDate:<input type="text" placeholder="" id="polProDate" name="polProDate" value='<?php echo $polProDate; ?>' randonly /><br>
			polAppReceivedDate:<input type="text" placeholder="" id="polAppReceivedDate" name="polAppReceivedDate" value='<?php echo $polAppReceivedDate; ?>' randonly /><br>
			polIssueDate:<input type="text" placeholder="" id="polIssueDate" name="polIssueDate" value='<?php echo $polIssueDate; ?>' randonly /><br>
			polIssueBy:<input type="text" placeholder="" id="polIssueBy" name="polIssueBy" value='<?php echo $polIssueBy; ?>' randonly /><br>
			
			polAGTIDFK:<input type="text" placeholder="" value='<?php echo $polAGTIDFK; ?>' randonly />
			agtIDPK:<input type="text" placeholder="" id="agtIDPK" name="agtIDPK" value='<?php echo $agtIDPK; ?>' randonly />
			agtCode:<input type="text" placeholder="" id="agtCode" name="agtCode" value='<?php echo $agtCode; ?>' randonly /><br>
			
			polPRODIDFK:<input type="text" placeholder="" id="polPRODIDFK" name="polPRODIDFK" value='<?php echo $polPRODIDFK; ?>' randonly /><br>
			polPREMIDFK:<input type="text" placeholder="" id="polPREMIDFK" name="polPREMIDFK" value='<?php echo $polPREMIDFK; ?>' randonly /><br>
			polCUSIDFKPHD:<input type="text" placeholder="" id="polCUSIDFKPHD" name="polCUSIDFKPHD" value='<?php echo $polCUSIDFKPHD; ?>' randonly /><br>
			polCUSAddrIDPHD:<input type="text" placeholder="" id="polCUSAddrIDPHD" name="polCUSAddrIDPHD" value='<?php echo $polCUSAddrIDPHD; ?>' randonly /><br>
			polCUSIDFKINS:<input type="text" placeholder="" id="polCUSIDFKINS" name="polCUSIDFKINS" value='<?php echo $polCUSIDFKINS; ?>' randonly /><br>
			polCUSAddrIDINS:<input type="text" placeholder="" id="polCUSAddrIDINS" name="polCUSAddrIDINS" value='<?php echo $polCUSAddrIDINS; ?>' randonly /><br>
			
			polVEHIDFK:<input type="text" placeholder="" id="polVEHIDFK" name="polVEHIDFK" value='<?php echo $polVEHIDFK; ?>' randonly />
			vehREDKEYFK:<input type="text" placeholder="" id="vehREDKEYFK" name="vehREDKEYFK" value='<?php echo $vehREDKEYFK; ?>' randonly />
			redIDPK:<input type="text" placeholder="" id="redIDPK" name="redIDPK" value='<?php echo $redIDPK; ?>' randonly />
			redKey:<input type="text" placeholder="" value='<?php echo $redKey; ?>' randonly />
			redMake:<input type="text" value='<?php echo $redMake; ?>' />
			redModel:<input type="text" value='<?php echo $redModel; ?>' />
			redYear:<input type="text" value='<?php echo $redYear; ?>' />
			redDesc:<input type="text" value='<?php echo $redDesc; ?>' /><br>
			
			vehTARvehCodeFK:<input type="text" placeholder="" value='<?php echo $vehTARvehCodeFK; ?>' randonly />
			tarIDPK:<input type="text" placeholder="" value='<?php echo $tarIDPK; ?>' randonly /><br>

			polUpdatedDate:<input type="text" placeholder="N/A" id="polUpdatedDate" name="polUpdatedDate" value='<?php echo $polUpdatedDate; ?>' randonly /><br>
			polUpdatedBy:<input type="text" placeholder="N/A" id="polUpdatedBy" name="polUpdatedBy" value='<?php echo $polUpdatedBy; ?>' randonly /><br>
			
			userName::<input type="text" placeholder="" id="usrName" name="usrName" value='<?php echo $_SESSION["usrName"]; ?>' randonly /><br>
			userName::<input type="text" placeholder="" id="usrRole" name="usrRole" value='<?php echo $_SESSION["usrRole"]; ?>' randonly /><br>
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