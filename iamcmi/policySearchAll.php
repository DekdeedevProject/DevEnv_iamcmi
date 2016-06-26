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

<!-- HEADER SECTION-->
<?php 
// @BEGIN
// @DEKDEEDEV_IAMCMI
// @Falom
// @2016-06-19 SUN 02:08 PM 
include 'config/config.php'; 
include 'header.php'; 
unset($_SESSION["polQuoNum"]);

if(isset($_POST['sBy']) && isset($_POST['sDesc'])){
$sBy = trim($_POST['sBy']);
$sDesc = trim($_POST['sDesc']);

if($sDesc==""){
$sDesc = "null";
}
// echo "<br>sBy: ". $sBy;
// echo "<br>sDesc: ". $sDesc;

$sqlID = "PSA_002";
setSearchCriteria($sBy,$sDesc);
$searchResult 	= executeSql($conn,$sqlID);
	if($searchResult){

	}
}
else{
$sqlID = "PSA_001";
$searchResult 	= executeSql($conn,$sqlID);

	if($searchResult){

	}
}
$searchResultSize = $searchResult->num_rows;
// @Falom END 2016-06-19 SUN 02:08 PM 
?>
<!-- END HEADER SECTION-->
</head>
<title><?php echo $policySearch; ?></title>
<body>
		<form action="policySearchAll.php" id="cmi" method="POST">
		<div class="container">
			<div class="page-header">
				<h1>พ ร บ.</h1>
			</div>
			<ul class="nav nav-tabs">
				<li class="active"><a href="#">Search Criteria</a></li>
			</ul>
			<div class="row">
				<div class="col-md-12">
					<br>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-12" align="left">
					Search by: 
					<select name="sBy" id="sBy">
						<option name="sBy" id="sBy" value="0">กรุณาเลือก</option>
						<option name="sBy" id="sBy" value="POL_QuoNum">Policy No.</option>
						<option name="sBy" id="sBy" value="POL_StatusName_EN">Status</option>
					</select>	
					<input type="text" name="sDesc"/>
					<input type="Submit" class="btn btn-primary btn-md" value="Search"/>
					<a href="policySearchAll.php"><input type="Button" value="Reset" class="btn btn-primary btn-md"/></a>
				</form>		
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<br>
				</div>
			</div>
		
			<fieldset>
			<ul class="nav nav-tabs">
				<li class="active"><a href="policySearchAll.php">Policy Information</a></li>
				<li class="active"><a href="financeSearch.php">Finance Information</a></li>
			</ul>
			<div class="row">
				<div class="col-md-2">
					<?php echo "<br>Found ".$searchResultSize." records"; ?>
					<b><br></b>
				</div>
			</div>
			<table border="0" align="left">
			<tr>
				<th>No.</th>
				<th>Policy No.</th>
				<th>Effective Date</th>
				<th>Policy Status</th>
				<th>Total Premium</th>
				<th>Payment Status</th>
				<th></th>
			</tr>
			<?php 
					if ($searchResult->num_rows > 0) {
				    // output data of each row
					$no=1;
				    while($searchRow = $searchResult->fetch_assoc()) {
				        ?>
				    <tr>
				   
				    	<td><?php echo $no++; ?></td>
						<td><?php echo $searchRow["POL_QuoNum"] ?></td>
						<td><?php echo $searchRow["POL_EffDate"] ?></td>
						<td><?php echo $searchRow["POL_StatusName_EN"] ?></td>
						<td><?php echo "xxx.xx" ?></td>
						<td><?php echo "Paid/Outstanding" ?></td>
						<td>
						<form action="policySearchCheck.php" id="cmi" method="GET">	
							<input type="hidden" name="polStatusIDFK" id='<?php echo $searchRow["POL_Status_ID_FK"] ?>' value='<?php echo $searchRow["POL_Status_ID_FK"] ?>'/>
							<input type="hidden" name="polQuoNum" id='<?php echo $searchRow["POL_ID_PK"] ?>' value='<?php echo $searchRow["POL_QuoNum"] ?>'/>
							<input type="Submit"/>
						</form>	
						</td>
					</tr>
				    	<?php	
				    	}
					} else {
						?>
					    
				 	<tr>
				    	<td><?php echo "0 results"; ?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<?php
					}
				?>
			</table>
			</fieldset>
		</div>
	</form>
<footer>

</footer>	
</html>