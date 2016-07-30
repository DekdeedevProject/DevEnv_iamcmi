<?php
// include autoloader
include 'config/config.php';
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
// $policyNo=$_POST['policyNo'];
$policyNo="NCMI0000042";
$date=date("Y-m-d H:i:s");
setPolQuoNum($policyNo);
$sqlID			= "PCS1_003";	
$conn 	= connOpen();
$quoQueryResult = executeSql($conn,$sqlID);
if($quoQueryResult){
	$row 		= $quoQueryResult->fetch_assoc();
	include 'config/condition/PCS_CON_002.php';
	include 'printContent.php';
	echo $content;
	// $dompdf = new Dompdf();
	// $dompdf->loadHtml($content); 
	// $dompdf->setPaper('A4', 'portrait');
	// $dompdf->render();
	// $dompdf->stream($policyNo."_".$date,array("Attachment"=>0));
}		
else{
	echo "not have";
}

// echo $content;





// $dompdf->stream();
?>