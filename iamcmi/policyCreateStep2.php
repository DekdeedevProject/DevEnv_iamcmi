<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
<title>Home</title>
<!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css" /> -->
<link rel="stylesheet" href="../js/jquery-ui-themes-1.12.0-rc.2/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" href="../css/iamStyle.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
<script src="../js/jquery-1.12.4.js"></script>
<script src="../js/jquery-1.12.4.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../js/jquery-ui-1.12.0-rc.2/jquery-ui.js"></script>
 <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!-- MAIN STYLE SECTION-->
<link href="../assets/plugins/isotope/isotope.css" rel="stylesheet" media="screen" />
<link href="../assets/plugins/fancybox/jquery.fancybox.css" rel="stylesheet" />
<link href="../assets/plugins/IconHoverEffects-master/css/component.css" rel="stylesheet" />
<link href="../assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
<link href="../assets/css/about-achivements.css" rel="stylesheet" />
<link id="mainStyle" href="../assets/css/style.css" rel="stylesheet" />
<!-- END MAIN STYLE SECTION-->
<script type="text/javascript">


function updateStatus(src, val1, val2){
	var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
		    if (xhttp.readyState == 4 && xhttp.status == 200) {
		     	document.getElementById(src).innerHTML = xhttp.responseText;
		    	}
		  	};
		  	 xhttp.open("GET", "premiumInfo.php?data="+src+"&val1="+val1+"&val2="+val2); //สร้าง connection
             xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
             xhttp.send(null); //ส่งค่า
}

function reloadFunc(){
	src='paidStatus';
	val1 = document.getElementById("paidStatusID").value;
	val2 = document.getElementById("paidStatusApprID").value;
	updateStatus(src, val1, val2);
}

function myFunction() {
	var d = new Date();
	document.getElementById('curDate').value= d.toString();
}
function start(){
	reloadFunc();
	myFunction();
}
</script>
<!-- HEADER SECTION-->
<?php 
// @BEGIN
// @DEKDEEDEV_IAMCMI
// @Falom
// @2016-06-19 SUN 02:08 PM 
include 'config/config.php'; 
include 'header.php'; 


$polQuoNum = $_SESSION["polQuoNum"];
setPolQuoNum($polQuoNum);
$sqlID			= "PCS1_003";
$quoQueryResult = executeSql($conn,$sqlID);
	if($quoQueryResult){
	$quoQueryResultSize = $quoQueryResult->num_rows;
		if($quoQueryResultSize==0){
		echo "INCORRECT REDIRECT TO HOME PAGE";
		// redirect("home.php");		
		echo "<a href='home.php'><input type='Button' value='Home' class='btn btn-primary btn-md'/></a>";
		}
		else if($quoQueryResultSize==1){
		echo "WHEN RECORDS HAS ALREADY SAVED OR SUBMITTED&BACK<br>";
		$row 		= $quoQueryResult->fetch_assoc();
		include 'config/condition/PCS_CON_002.php';
		}
		else{
		echo "INCORRECT RECORDS MORE THAN ONE ROW";
		}
	}
// @Falom END 2016-06-19 SUN 02:08 PM 

?>
<!-- END HEADER SECTION-->
<title><?php echo $policyCreate ?></title>
</head>
<body onload="start()">
	<form action="policySaveStep2.php" method="post">
		<br><br><br><br><br><br>

	    <div class="container" align="center">
	    	<img src="../img/step2.png">
	    </div>

    	<br>
		<div class="container">
			<div class="page-header" style="background-color: #E0EEEE;width: 1175px;left: -20px;position: relative;display: -webkit-box;">
				<h1 style="display: -webkit-inline-box;">&nbsp;พ. ร. บ.</h1>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div style="background-color: #EBECE4; height: 30px;">
						<b>ขั้นตอนการชำระเงิน</b>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-3" align="left">เลขกรมธรรม์ :</div>
				<div class="col-md-3">
					<input type="text" class="form-control" id="chas"
						placeholder="Enter Chassis Number" value='<?php echo $polQuoNum; ?>' readonly>
				</div>
				<div class="col-md-3" align="right">สถานะกรมธรรม์ :</div>
				<div class="col-md-3">
					<input type="text" class="form-control" id="polStatus"
						placeholder="Enter Chassis Number" value='<?php echo (-$premPaidBalance); ?>' readonly>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-3" align="left">สถานะการชำระเงิน :</div>
				<div class="col-md-3">
					<input type="text" class="form-control" id="chas"
						placeholder="Enter Chassis Number" value='<?php echo $polQuoNum; ?>' readonly>
				</div>
				<div class="col-md-3" align="right">เบี้ยที่ต้องชำระ :</div>
				<div class="col-md-3">
					<input type="text" class="form-control" id="chas"
						placeholder="Enter Chassis Number" value='<?php echo (-$premPaidBalance); ?>' readonly>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-9" align="right">ยอดคงค้าง :</div>
				<div class="col-md-3">
					<input type="text" class="form-control" id="chas"
						placeholder="Enter Chassis Number" value='<?php echo $polQuoNum; ?>' readonly>
				</div>				
			</div>
			<br>
			<div style="border: 3px; border-style: solid; border-color: #a5a5a5;">
				<div class="row">
					<div class="col-md-12">
						<div style="background-color: #EBECE4; height: 30px;">
							<b>Update payment information</b>
						</div>
					</div>
				</div>
				<div class="row" style="margin:0em 0.5em 0em 0.5em;">
					<br>
					<div class="col-md-3" align="left">Payment Method :</div>
					<div class="col-md-3">
						<input type="text" class="form-control" id="chas"
							placeholder="Enter Chassis Number" value='<?php echo $polQuoNum; ?>' >
					</div>
					<div class="col-md-3" align="right">Transaction Date :</div>
					<div class="col-md-3">
						<input type="text" class="form-control" id="curDate"  readonly>
					</div>
				</div>
				<br>
				<div class="row" style="margin:0em 0.5em 0em 0.5em;">
					<div class="col-md-3" align="left">Payment Amount :</div>
					<div class="col-md-3">
						<input type="text" class="form-control" id="chas"
							placeholder="Enter Chassis Number" value='<?php echo $polQuoNum; ?>' >
					</div>
					<div class="col-md-3" align="right">Payee :</div>
					<div class="col-md-3">
						<input type="text" class="form-control" id="chas"
							placeholder="Enter Chassis Number" value='<?php echo (-$premPaidBalance); ?>' >
					</div>
					</div>
				<br>
			</div>
			<br>
				<div class="row">
					<div class="col-md-3" align="left">Approval Status :</div>
					<div class="col-md-3">
						<input type="text" class="form-control" id="chas"
							placeholder="Enter Chassis Number" value='<?php echo $polQuoNum; ?>' readonly>
					</div>
					<div class="col-md-3" align="right">Approval Remarks :</div>
					<div class="col-md-3">
						<input type="text" class="form-control" id="chas"
							placeholder="Enter Chassis Number" value='<?php echo (-$premPaidBalance); ?>' readonly>
					</div>
				</div>
				<br>

				
			<input type="hidden" id="paidStatusID" name="paidStatusID" value='<?php echo $premPaidStatus; ?>'>
			<input type="hidden" id="paidStatusApprID" name="paidStatusApprID" value='<?php echo $premPaidStatusAprv; ?>'>
		
			<br>
			<div class="row">
				<div class="col-md-12" align="center">
					<?php
						if($premPaidStatusAprv == 'Y'){
							echo "<input type='Submit' class='btn btn-primary btn-md' value='Next'/>";
						}
						else{
							echo "<a href='policyCreateStep1.php'><button type='button' class='btn btn-primary btn-md'>Edit Policy Info.</button></a> ";
							echo "<a href='home.php'><button type='button' class='btn btn-primary btn-md'>Home</button></a> ";					
							echo "<a href='xx.php'><button type='button' class='btn btn-primary btn-md'>Save</button></a> ";
						}
					?>
				</div>
			</div>
		</div>
	</form>
</body><br><br><br>
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