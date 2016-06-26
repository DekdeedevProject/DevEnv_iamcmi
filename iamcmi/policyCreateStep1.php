<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- <link href="config/bootstrap/css/bootstrap.min.css" rel="stylesheet"
	media="screen">
<script src="config/bootstrap/js/bootstrap.min.js"></script>
<script src="config/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
<link href="config/jquery-ui-1.11.4.custom/jquery-ui.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="../css/iamStyle.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
<script src="../js/jquery-1.12.4.js"></script>
<script src="../js/jquery-1.12.4.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../js/jquery-ui-1.12.0-rc.2/jquery-ui.js"></script>
<link rel="stylesheet" href="../js/jquery-ui-themes-1.12.0-rc.2/themes/smoothness/jquery-ui.css" />

<script type="text/javascript" src="../bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="../bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">


<!-- MAIN STYLE SECTION-->
<link href="../assets/plugins/isotope/isotope.css" rel="stylesheet" media="screen" />
<link href="../assets/plugins/fancybox/jquery.fancybox.css" rel="stylesheet" />
<link href="../assets/plugins/IconHoverEffects-master/css/component.css" rel="stylesheet" />
<link href="../assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
<link href="../assets/css/about-achivements.css" rel="stylesheet" />
<link id="mainStyle" href="../assets/css/style.css" rel="stylesheet" />
<!-- END MAIN STYLE SECTION-->

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

	var tarBody;
	var tarSubBody;
	var tarUsage;
	    function dochangeTariff(src, val) {
	    	//alert(src);
        	var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
		    if (xhttp.readyState == 4 && xhttp.status == 200) {
		     	document.getElementById(src).innerHTML = xhttp.responseText;
		    	}
		  	};

	
		  	switch (src) {
            	case 'tarBody':
            	break;
				case 'tarSubBody':
            	tarBody=val;
            	break;
            	case 'tarUsage':
            	tarSubBody=val;
            	break;
            	case 'tarVehCodePK':
            	tarUsage=val;
            	break;
            	default:
				break;
            } 

		  	 xhttp.open("GET", "tariff.php?data="+src+"&val="+val+"&tarBody="+tarBody+"&tarSubBody="+tarSubBody+"&tarUsage="+tarUsage); //สร้าง connection
             xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
             xhttp.send(null); //ส่งค่า
        }

        var redMake;
		var redModel;
		var redYear;
		var redDesc;
		function dochangeRedbook(src, val) {
	    	// alert(src);
        	var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
		    if (xhttp.readyState == 4 && xhttp.status == 200) {
		     	document.getElementById(src).innerHTML = xhttp.responseText;
		    	}
		  	};

		  	switch (src) {
            	case 'redModel':
            	redMake=val;
				break;
				case 'redYear':
            	redModel=val;
				break;
				case 'redDesc':
            	redYear=val;
				break;
				case 'redKey':
            	redDesc=val;
				break;
			
            	default:
				break;
            } 

            
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

// echo $_SESSION["polQuoNum"];
if(!isset($_SESSION["polQuoNum"])){ 
// echo "<br>NEW FROM HOME PAGE<br>";
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
		include 'config/Condition/PCS_CON_001.php';
		$_SESSION["startSessionDateTime"] 	= date("Y-m-d H:i:s");
		$_SESSION["polQuoNum"]				= getNewPolicyNo($lastPolNo);
		$polQuoNum 		= $_SESSION["polQuoNum"];
		$polEffDate 	= date("Y-m-d H:i:s");
		$polExpDate 	= date("Y-m-d 16:30:00", strtotime("+12 Months"));
	}
}
else{	
// echo "<br>EXISTING FROM RELOAD/SAVED/SUBMITED&Back <br>";
$polQuoNum = $_SESSION["polQuoNum"];
$sqlID			= "PCS1_003";				
$quoQueryResult = executeSql($conn,$sqlID);
	if($quoQueryResult){
	$quoQueryResultSize = $quoQueryResult->num_rows;
		if($quoQueryResultSize==0){
		// echo "WHEN RELOAD PAGE";
		include 'config/Condition/PCS_CON_001.php';
		$polEffDate 	= $_SESSION["startSessionDateTime"] ;
		$polExpDate 	= date("Y-m-d 16:30:00", strtotime("+12 Months"));
		}
		else if($quoQueryResultSize==1){
		// echo "WHEN RECORDS HAS ALREADY SAVED OR SUBMITTED&BACK<br>";
		$row 		= $quoQueryResult->fetch_assoc();
		include 'config/Condition/PCS_CON_002.php';
		}
		else{
		// echo "RECORDS MORE THAN ONE ROW";
		}
	}
}	




// @Falom END 2016-06-19 SUN 02:08 PM 
?>
<!-- END HEADER SECTION-->
<title><?php echo $policyCreate ?></title>
</head>

<body onload="myFunction(
		<?php echo $addrProv;?>,
		<?php echo $addrDist;?>,
		<?php echo $addrSubDist;?>,
		<?php echo $addrZipCode;?>,
		
		<?php echo $perCardType;?>,
		<?php echo $addrContType1;?>,
		<?php echo $perSalu;?>
	)">
	<form action="policySaveStep1.php" method="post">
		
		<div class="container">
			<div class="page-header" style="background-color: #E0EEEE;">
				<h1 style="display: -webkit-inline-box;">&nbsp;พ. ร. บ.</h1>
			</div>
			<div class="row titleInsured">
				<div class="col-md-12">
					<div>
						<h4 style="display: -webkit-inline-box;padding-left: 5px; color:white;"><b>ข้อมูลกรรมธรรม์</b></h4>
					</div>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-2" align="left">เลขกรมธรรม์ :</div>
				<div class="col-md-2">
					<input type="text" class="form-control" placeholder="" id="polQuoNum" name="polQuoNum" readonly value='<?php echo $_SESSION["polQuoNum"]; ?>' >
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-2" align="left">วันที่เริ่มคุ้มครอง :</div>
				<div class="col-md-3">
					<div class="date" id="datetimepicker">						
						<div id="datetimepicker4" class="input-group date"> 
			               <input type="text" class="form-control" data-format="dd-MM-yyyy HH:mm:ss" placeholder="วันที่เริ่มคุ้มครอง" 
							id="polEffDate" name="polEffDate" value='<?php echo $polEffDate; ?>' required>
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
				             <input type="text" class="form-control" data-format="dd-MM-yyyy HH:mm:ss"  placeholder="วันสิ้นสุดความคุ้มครอง" 
								id="polExpDate" name="polExpDate" value='<?php echo $polExpDate ?>' required>
							 <div class="add-on"> 
				                <i class="glyphicon glyphicon-calendar cld"></i> 
				             </div> 
				        </div>
					</div>
				</div>
			</div><br>
			<div class="row titleInsured">
				<div class="col-md-12">
					<div>
						<h4 style="display: -webkit-inline-box;padding-left: 5px; color:white;"><b>ข้อมูลรถ</b></h4>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-2" align="left">ยี่ห้อ :</div>
				<div class="col-md-2" name="redMake" id="redMake">
				<input type="hidden" name="redMakeName" id="redMakeName" value='<?php echo $redMake ?>' required/>
					
					<select class="form-control">
						<option>กรุณาเลือก</option>
					</select>
				</div>
				<div class="col-md-2" align="right">รุ่น :</div>
				<div class="col-md-2" name="redModel" id="redModel">
				<input type="hidden" name="redModelName" id="redModelName" value='<?php echo $redModel ?>' required/>
					<select class="form-control">
						<option>กรุณาเลือก</option>
					</select>
				</div>
				<div class="col-md-2" align="right">ปี :</div>
				<div class="col-md-2" name="redYear" id="redYear">
				<input type="hidden" name="redYearName" id="redYearName" value='<?php echo $redYear ?>' required/>
					<select class="form-control">
						<option>กรุณาเลือก</option>
					</select>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-2" align="left">รุ่นย่อย :</div>
				<div class="col-md-2" name="redDesc" id="redDesc" >
				<input type="hidden" name="redDescName" id="redDescName" value='<?php echo $redDesc ?>' required/>	
					<select class="form-control">
						<option>กรุณาเลือก</option>
					</select>
				</div>
				
				<div class="col-md-2" align="right">รหัสรถ :</div>
				<div class="col-md-2" id="redKey">
					<input type="text" id="redKey" name="redKey" class="form-control" placeholder="รหัสรถ" value='<?php echo $redKey ?>' required/>
					<div class="col-md-2" align="right"><a href="#">+Add+</a></div>
				</div>
				<div class="col-md-2" align="right">รหัสตัวแทน :</div>
				<div class="col-md-2">
					<input type="text" class="form-control" id="AgreeCode"
						placeholder="รหัสตัวแทน" required>
				</div>
			</div>
			<br>
			<div class="row">
				<!-- <div class="col-md-2" align="left">การขับเคลื่อน :</div>
				<div class="col-md-2" name="tarPower" id="tarPower">
				<select class="form-control">
						<option>กรุณาเลือก</option>
				</select>		
				</div> -->

				<div class="col-md-2" align="left">ประเภท :</div>
				<div class="col-md-2" name="tarBody" id="tarBody">
				<input type="hidden" name="tarBodyName" id="tarBodyName" value='<?php echo $tarBodyNameTH ?>' required/>
				<select class="form-control">
						<option>กรุณาเลือก</option>
				</select>	
				</div>
				
				<div class="col-md-2" align="right">ประเภทย่อย :</div>
				<div class="col-md-2" name="tarSubBody" id="tarSubBody" >
				<input type="hidden" name="tarSubBodyName" id="tarSubBodyName" value='<?php echo $tarSubBodyNameTH ?>' required/>
				<select class="form-control">
						<option>กรุณาเลือก</option>
				</select>	
				</div>
				<div class="col-md-2" align="right">การใช้งาน :</div>
				<div class="col-md-2" name="tarUsage" id="tarUsage">
				<input type="hidden" name="tarUsageName" id="tarUsageName" value='<?php echo $tarUsageNameTH ?>' required/>
				<select class="form-control">
						<option>กรุณาเลือก</option>
				</select>	
				</div>		
			</div>
			<br>
			<span id="tarVehCodePK" name="tarVehCodePK">
			<div class="row" >
				
				<div class="col-md-2" align="left">รหัสรถ :</div>
				<div class="col-md-2" >
					<input type="text" id="tarVehCodePK" name="tarVehCodePK" class="form-control" placeholder="Vehical Code" value='<?php echo $tarVehCodePK ?>' required>
				</div>
			</div>	
			<br>
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
						placeholder="เบี้ยสุทธิ" required >
				</div>
				<div class="col-md-2" align="right">ภาษีมูลค่าเพิ่ม :</div>
				<div class="col-md-2">
					<input type="hidden" class="form-control" id="premStdVat" name="premStdVat" value='<?php echo $premStdVat ?>'>	
					<input type="text" class="form-control" id="premVat" name="premVat" value='<?php echo $premVat ?>'
						placeholder="ภาษีมูลค่าเพิ่ม" required >
				</div>
				<div class="col-md-2" align="right">อากรสแตมป์ :</div>
				<div class="col-md-2">
					<input type="hidden" class="form-control" id="premStdStampDuty" name="premStdStampDuty" value='<?php echo $premStdStampDuty ?>'>
					<input type="text" class="form-control" id="premStampDuty" name="premStampDuty" value='<?php echo $premStampDuty ?>'
						placeholder="อากรสแตมป์" required >
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-2" align="left">เบี้ยรวม:</div>
				<div class="col-md-2">
					<input type="hidden" class="form-control" id="premStdTotal" name="premStdTotal" value='<?php echo $premStdTotal ?>'>	
					<input type="text" class="form-control" id="premTotal" name="premTotal" value='<?php echo $premTotal ?>'
						placeholder="เบี้ยรวม" required >
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
						<input type="checkbox" name="" value="">&nbsp;&nbsp; <span class="txtIs">Insured same as policyholder</span>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
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
			<br>
			<div class="row">
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
			<br>
			<div class="row">				
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
			</div>
			<br>
			<div class="row">
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
			<br>
			<div class="row">
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
			<br>
			<div class="row">
				<div class="col-md-2" align="left">รหัสไปรษณีย์ :</div>
				<div class="col-md-2" id="addrZipCode" name="addrZipCode">
					<select class="form-control" id="addrZipCode" name="addrZipCode">
						<option>กรุณาเลือก</option>
					</select>		
				</div>
			</div>
			<br>
			<div class="row">
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
			<br>
			<div class="row">
				<div class="col-md-12" align="center">
					<a href="policySaveStep1.php"></a><button class="btn btn-primary btn-md" name="btn" id="btn" value="save">Save</button></a>
					<input type="Reset" class="btn btn-primary btn-md"/>
					<input type="Submit" class="btn btn-primary btn-md" name="btn" id="btn" value="Submit"/>
					<input type="hidden" id="polPREMIDFK" name="polPREMIDFK" value="<?php echo $polPREMIDFK; ?>"/>
					<input type="hidden" id="polCUSIDFKPHD" name="polCUSIDFKPHD" value="<?php echo $polCUSIDFKPHD; ?>"/>
					<input type="hidden" id="polCUSIDFKINS" name="polCUSIDFKINS" value="<?php echo $polCUSIDFKINS; ?>"/>
					<input type="hidden" id="polCUSAddrIDPHD" name="polCUSAddrIDPHD" value="<?php echo $polCUSAddrIDPHD; ?>"/>
					<input type="hidden" id="polCUSAddrIDINS" name="polCUSAddrIDINS" value="<?php echo $polCUSAddrIDINS; ?>"/>
					<input type="hidden" id="polVEHIDFK" name="polVEHIDFK" value="<?php echo $polVEHIDFK; ?>"/>
					<input type="hidden" id="tarIDPK" name="tarIDPK" value="<?php echo $tarIDPK; ?>"/>
					<input type="hidden" id="vehIDPK" name="vehIDPK" value="<?php echo $vehIDPK; ?>"/>
					<input type="hidden" id="perIDPK" name="perIDPK" value="<?php echo $perIDPK; ?>"/>
					<input type="hidden" id="addrIDPK" name="addrIDPK" value="<?php echo $addrIDPK; ?>"/>
				</div>
			</div>
		</div>
	</form>
</body>	
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