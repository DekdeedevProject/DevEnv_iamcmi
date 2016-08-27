<!DOCTYPE html>
<html>
<head>
<!-- HEADER SECTION-->
<?php include 'config/config.php'; ?>
<title><?php echo $confirmPayment ?></title>

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
	
	var premPayMethod = document.getElementById('premPayMethod').value;
	updateStatus("payMet4", premPayMethod, "");
	updateStatus("payApprSta5", "", "");

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
<?php 
include 'header.php'; 

$polQuoNum = $_SESSION["polQuoNum"];
?>
<!-- END HEADER SECTION-->
<title><?php echo $policyCreate ?></title>
</head>
<body onload="start()">
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
				<br>
				<br>
				<br>
				<div class="row">
			<form action="policyS2_PaymentSave.php" method="POST">
			<?php
			if(!empty($_POST['btn'])){
					
				$btn=trim($_POST['btn']);
				if($btn=="Submit Payment"){
					$premPaid=trim($_POST['payAmt4']);
					$premPayMethod=$_POST['payMet4'];
					$premPaidBalance=trim($_POST['premPaidBalance']);
					$premOutstanding=trim($_POST['premPaidBalance']) + $premPaid;
					$premPayeeName=trim($_POST['premPayeeName']);
					$premPaidBalance=trim($_POST['premPaidBalance']) + $premPaid;
					$premPaidDate='CURRENT_TIMESTAMP';

					?>
					<input type="hidden" id="btn" name="btn" value='<?php echo $btn; ?>'/>	
					<input type="hidden" id="premPaid" name="premPaid" value='<?php echo $premPaid; ?>'/>	
					<input type="hidden" id="premPaidBalance" name="premPaidBalance" value='<?php echo $premPaidBalance; ?>'/>	
					<input type="hidden" id="premOutstanding" name="premOutstanding" value='<?php echo $premOutstanding; ?>'/>	
					<input type="hidden" id="premPayMethod" name="premPayMethod" value='<?php echo $premPayMethod; ?>'/>	
					<input type="hidden" id="premPayeeName" name="premPayeeName" value='<?php echo $premPayeeName; ?>'/>
					<input type="hidden" id="premPaidBalance" name="premPaidBalance" value='<?php echo $premPaidBalance; ?>'/>	
					<input type="hidden" id="premPaidDate" name="premPaidDate" value='<?php echo $premPaidDate; ?>'/>	
					<?php

					if($premOutstanding<0){
					?>
					<div class="col-md-12" align="center">
						<?php
							echo "กรรมธรรม์เลขที่ ".$polQuoNum." มีเบี้ยคงค้างชำระ ".$premOutstanding." บาท<br>";
							echo "ไม่สามารถดำเนินการต่อได้<br><br>";
						?>
					</div>
					<div class="col-md-12" align="center">
						<a href="policyS2_Payment.php"><button type="button" class="btn btn-primary btn-md">Back</button></a>
					</div>
					</div>
					<?php
					}
					else{
					?>
					<div class="col-md-12" align="center">
						<?php
							echo "ยืนยันการชำระเบี้ยกรรมธรรม์เลขที่ ".$polQuoNum;
						?>
					</div>
					<div class="col-md-12" align="center">
						<a href="policyS2_Payment.php"><button type="button" class="btn btn-primary btn-md">Cancel</button></a>
						<input type="Submit" class='btn btn-primary btn-md' value="Confirm"/>
					</div>
					</div>
					<?php
					}
				}
				else if($btn=="Approve"){
					$premPaidStatusAprv=trim($_POST['payApprSta5']);
					$premAprvComment=trim($_POST['premAprvComment']);
					?>
					<div class="col-md-12" align="center">
						<?php
							echo "ยืนยันการอนุมัติกรรมธรรม์เลขที่ ".$polQuoNum."<br><br>";
						?>
					</div>
					<div class="col-md-12" align="center">
						<input type="hidden" id="btn" name="btn" value='<?php echo $btn; ?>'/>	
						<input type="hidden" id="premPaidStatusAprv" name="premPaidStatusAprv" value='<?php echo $premPaidStatusAprv; ?>'/>	
						<input type="hidden" id="premAprvComment" name="premAprvComment" value='<?php echo $premAprvComment; ?>'/>	
						<a href="policyS2_Payment.php"><button type="button" class="btn btn-primary btn-md">Cancel</button></a>
						<input type="Submit" class='btn btn-primary btn-md' value="Confirm"/>
					</div>
					</div>

					<?php
				}
				else if($btn=="Issue"){
					?>
					<div class="col-md-12" align="center">
						<?php
							echo "ยืนยันการออกกรรมธรรม์เลขที่ ".$polQuoNum."<br><br>";
						?>
					</div>
					<div class="col-md-12" align="center">
						<input type="hidden" id="btn" name="btn" value='<?php echo $btn; ?>'/>	
						<a href="policyS2_Payment.php"><button type="button" class="btn btn-primary btn-md">Cancel</button></a>
						<input type="Submit" class='btn btn-primary btn-md' value="Confirm"/>
					</div>
					</div>
					<?php
				}
				else if($btn=="Update"){
					echo $premPaidStatusAprv=trim($_POST['payApprSta5']);
					echo $premAprvComment=trim($_POST['premAprvComment']);
					
					?>
					<div class="col-md-12" align="center">
						<?php
							echo "Update ".$polQuoNum."<br><br>";
						?>
					</div>
					<div class="col-md-12" align="center">
						<input type="hidden" id="btn" name="btn" value='<?php echo $btn; ?>'/>	
						<a href="policyS2_Payment.php"><button type="button" class="btn btn-primary btn-md">Cancel</button></a>
						<input type="Submit" class='btn btn-primary btn-md' value="Confirm"/>
					</div>
					</div>
					<?php
				}
				else{

				}	
			}
			else{
				echo "Error data not found!!!!";
			}	
			?>	
			</form>
				
				
			</div>
			<br>
		</div>
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