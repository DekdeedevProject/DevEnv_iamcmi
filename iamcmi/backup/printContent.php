<!DOCTYPE html>
<?php 
$content = "
<html>
<head>
<style>

@page { margin: 15px; }

@font-face {
font-family: THSarabun;
src: url('../dompdf/lib/fonts/THSarabun.ttf');
}

\@font-face {
font-family: THSarabunBold;
src: url('../dompdf/lib/fonts/THSarabunBold.ttf');
}

@font-face {
font-family: THSarabunBoldItalic;
src: url('../dompdf/lib/fonts/THSarabunBoldItalic.ttf');
}

@font-face {
font-family: THSarabunBoldItalic;
src: url('../dompdf/lib/fonts/THSarabunItalic.ttf');
}


body {
    /* to centre page on screen*/
    margin-left: 15px;
    margin-right: 15px;
    font-family:'THSarabun';
    line-height: 100%;
}

table{
	width: 100%;
	border-collapse: collapse;
    border-spacing: 0px 0px;   
}
td,tr{
	border: 1px solid black;
	border-collapse: collapse;
    border-spacing: 0px 0px;   
}

#tbody {
    border: 1px solid black;
}

#tstd1 {
    border: 1px solid black;
    border-collapse: collapse;
    border-spacing: 0px 0px;
}

#tstd2 {
    text-align: right;
    vertical-align: top;
    color: red;
}

#tstd4 {
    text-align: right;
    vertical-align: top;
    font-size: 18px;
    font-family:'THSarabunBold';
    color: black;
}
#tstd5 {
    text-align: left;
    vertical-align: top;
    font-size: 18px;
    font-family:'THSarabunBold';
    color: black;
}
#tstd6 {
    text-align: right;
    vertical-align: bottom;
    font-size: 18px;
    font-family:'THSarabunBold';
    color: black;
}

div{
	
}
font.largetext{
	line-height: 50%;
	font-size: 10px;
	font-family:'THSarabunBold';
	text-align: right;
}

p.thheader{
	line-height: 0%;
	text-align: center;
	vertical-align: top;
	font-size: 12px;
	font-family: 'THSarabunBold';
}

font.mediumtext{
	line-height: 200%;
	font-size: 10px;
	text-align: left;
    vertical-align: top;
	font-family:'THSarabunBold';
}

font.smalltext{
	line-height: 100%;
	font-size: 5px;
	text-align: left;
    vertical-align: top;
	font-family:'THSarabunBold';
}

font.smallesttext {
	line-height: 0%;
    text-align: left;
    vertical-align: center;
    font-size: 10px;
    color: red;
}

font.specify{
	color: red;
	line-height: 0%;
}

font.specify{
	color: red;
	line-height: 0%;
}

font.specify_center{
	color: red;
 	text-align: center;
	line-height: 0%;
}

</style>
</head>
<body>
<header>
<table id='theader'>
<tr>
	<td>
	<table id='thd_r1'>
	<tr>
		<td width='35%'>
			<img src='../dompdf/src/Image/seg-logo.jpg' alt='Company Logo' height='80px'>
			<font class='specify_center'>[Branch]</font>
		</td>
		<td width='40%'  id='tbody'>
			<img src='../dompdf/src/Image/logo.jpg' alt='Company Logo' height='100px'>
		</td>
		<td width='25%' id='tstd2'>
			[value? format(6digits)]
		</td>
	</tr>	
	</table>	
	</td>
</tr>
<tr>
	<td>
	<table id='thd_r2'> 
	<tr>
		<td width='65%' rowspan='2'>
		<font class='smallesttext'>".date("Y-m-d")."</font>
		<br>
		<font class='smallesttext'>[value??]</font>
		</td>
		<td width='10%'>
		<font class='largetext'>เลขที่</font>
		</td>
		<td width='25%' >
		<font class='specify'>".$policyNo."</font>
		</td>
	</tr>	
	<tr>
		<td width='10%'>
		<font class='largetext'>วันที่</font>
		</td>
		<td width='25%' >
		<font class='specify'>".date("Y-m-d")."</font>
		</td>
	</tr>	
	</table>		
	</td>
</tr>
</table>
</header>

<table>
<tr>
	<td width='15%'></td>
	<td width='70%'>
		<p class='thheader'>ตารางกรมธรรม์ประกันภัยคุ้มครองผู้ประสบภัยจากรถ/ใบเสร็จรับเงิน/ใบกำกับภาษี</p>
		<p class='thheader'>THE SCHEDULE/RECEIPT/TAX INVOICE</p>
	</td>
	<td>
	<font class='specify'>[Number??]</font>
	</td>
</tr>
<tr id='tstd1'>
	<td colspan='3'>
	<table>
	<tr>
		<td>
			<font class='mediumtext'>รหัสบริษัท : </font>
			<font class='specify'>".$orgShortName."</font>
			<br>
			<font class='smalltext'>Company Code</font>
		</td>
		<td>
			<font class='mediumtext'>กรมธรรม์ประกันภัยเลขที่ :</font>
			<font class='specify'>".$policyNo."</font>
			<br>
			<font class='smalltext'>Policy No</font>
		</td>
		<td>
			<font class='specify'>[Barcode??]</font>
			<br>
			<font class='specify'>[Barcode No??]</font>
		</td>
	</tr>
	</table>
	</td>
</tr>
<tr id='tstd1'>
	<td colspan='3'>
	<table>
	<tr>
		<td>
			<font class='mediumtext'>รายการที่ 1.<br></font>
			<font class='smalltext'>Item1.</font>
		</td>
		<td>
			<font class='mediumtext'>ผู้เอาประกันภัย<br></font>
			<font class='smalltext'>The Insured</font>
		</td>
		<td>
			<font class='mediumtext'>ชื่อ :<br></font>
			<font class='smalltext'>Name</font>
		</td>
		<td>
			<font class='specify'>".$PHD_perSaluTH." ".$PHD_perFName." ".$PHD_perLName."<p>
		</td>
		<td>
			<font class='mediumtext'>อาณาเขตที่คุ้มครอง<br></font>
			<font class='smalltext'>Territorial Limit Covered</font>
		</td>
	</tr>
	<tr>
		<td>
			
		</td>
		<td>
			<font class='specify'>[Value??]</font>
		</td>
		<td>
			<font class='mediumtext'>ที่อยู่ :<br></font>
			<font class='smalltext'>Address</font>
		</td>
		<td>
			<font class='specify'>".$PHD_addrLine1." ".$PHD_addrLine2."</font>
			<br>
			<font class='specify'>".$PHD_addrSubDist." ".$PHD_addrDist." ".$PHD_addrProv." ".$PHD_addrZipCode."</font>
			<br>
			<font class='specify'>เลขประจำตัวผู้เสียภาษีอากร: [Tax??? (ถ้ามี) ]</font>
		</td>
		<td>
			<font class='mediumtext'>ประเทศไทย<br></font>
			<font class='smalltext'>Thailand</font>
		</td>
	</tr>
	</table>
	</td>
</tr>
<tr>
	<td colspan='3'>
	<table>
	<tr>
		<td>
			<font class='mediumtext'>รายการที่ 2.</font>
			<br>
			<font class='smalltext'>Item2.</font>
		</td>
		<td>
			<font class='mediumtext'>ระยะเวลาประกันภัย:</font>
			<br>
			<font class='smalltext'>Period Insured</font>
		</td>
		<td>
			<font class='mediumtext'>เริ่มต้นวันที่</font>
			<br>
			<font class='smalltext'>From</font>
		</td>
		<td>
			<font class='specify'>".$polEffDate."</font>
		</td>
		<td>
			<font class='mediumtext'>ถึงวันที่</font>
			<br>
			<font class='smalltext'>To</font>
		</td>
		<td>
			<font class='specify'>".$polExpDate."</font>
		</td>
	</tr>
	</table>
	</td>
</tr>
<tr id='tstd1'>
	<td colspan='3'>
	<table>
	<tr>
		<td>
			<font class='mediumtext'>รายการที่ 3.</font>
			<br>
			<font class='smalltext'>Item3.</font>
		</td>
		<td>
			<font class='mediumtext'>รถที่เอาประกันภัย:</font>
			<br>
			<font class='smalltext'>Particulars of Motor Vehicle</font>
		</td>
	</tr>
	</table>
	</td>
</tr>
<tr id='tstd1'>
	<td colspan='3'>
	<table>
	<tr>
		<td>
			<font class='mediumtext'>รหัส.</font>
			<br>
			<font class='smalltext'>Code</font>
		</td>
		<td>
			<font class='mediumtext'>ชื่อรถ</font>
			<br>
			<font class='smalltext'>Make</font>
		</td>
		<td>
			<font class='mediumtext'>เลขทะเบียน</font>
			<br>
			<font class='smalltext'>License No.</font>
		</td>
		<td>
			เ<font class='mediumtext'>ลขตัวถัว</font>
			<br>
			<font class='smalltext'>Chassis No.</font>
		</td>
		<td>
			<font class='mediumtext'>แบบตัวถัง</font>
			<br>
			<font class='smalltext'>Body Type</font>
		</td>
		<td>
			<font class='mediumtext'>ขนาดเครื่องยนต์/จำนวนที่นั่ง/นำ้หนักรวม</font>
			<br>
			<font class='smalltext'>Capacity</font>
		</td>
	</tr>
	<tr>
		<td>
			<font class='specify'>".$vehTARvehCodeFK."</font>
		</td>
		<td>
			<font class='specify'>".$redMake."</font>
		</td>
		<td>
			<font class='specify'>".$vehLicenseNum."</font>
		</td>
		<td>
			<font class='specify'>".$vehChassisNum."</font>
		</td>
		<td>
			<font class='specify'>[Body Type??]</font>
		</td>
		<td>
			<font class='specify'>".$vehCapacity."/".$vehSeat."/".$vehWeight."</font>
		</td>
	</tr>
	</table>
	</td>
</tr>
<tr id='tstd1'>
	<td colspan='3'>
	<table>
	<tr>
		<td>
			<font class='mediumtext'>รายการที่ 4.</font>
			<br>
			<font class='smalltext'>Item4.</font>
		</td>
		<td>
			<font class='mediumtext'>จำนวนเงินคุ้มครองผู้ประสบภัย: </font>
			<br>
			<font class='smalltext'>Limit of Covered</font>
		</td>
	</tr>
	</table>
	</td>
</tr>
<tr id='tstd1'>
	<td colspan='3'>
	<table>
	<tr>
		<td>
			<font class='mediumtext'>รายการที่ 5.</font>
			<br>
			<font class='smalltext'>Item5.</font>
		</td>
		<td>
			<font class='mediumtext'>จำนวนเงินค่าเสียหายเบื้องต้น: </font>
			<br>
			<font class='smalltext'>Limit of Preliminary Compensation</font>
		</td>
	</tr>
	</table>
	</td>
</tr>
<tr id='tstd1'>
	<td colspan='3'>
	<table>
	<tr>
		<td>
			<font class='mediumtext'>รายการที่ 6.</font>
			<br>
			<font class='smalltext'>Item6.</font>
		</td>
		<td>
			<font class='mediumtext'>เบี้ยประกันภัย: (บาท)</font>
			<br>
			<font class='smalltext'>Premium: (Baht)</font>
		</td>
	</tr>
	</table>
	</td>
</tr>
<tr id='tstd1'>
	<td colspan='3'>
	<table>
	<tr>
		<td>
			<font class='mediumtext'>เบี้ยประกันภัย</font>
			<br>
			<font class='smalltext'>Premium</font>
		</td>
		<td>
			<font class='mediumtext'>ส่วนลดจากการประกันภัยโดยตรง</font>
			<br>
			<font class='smalltext'>Premium Discounts</font>
		</td>
		<td>
			<font class='mediumtext'>เบี้ยประกันภัยสุทธิ</font>
			<br>
			<font class='smalltext'>Net Premium</font>
		</td>
		<td>
			<font class='mediumtext'>อากรแสตมป์</font>
			<br>
			<font class='smalltext'>Stamps</font>
		</td>
		<td>
			<font class='mediumtext'>ภาษีมูลค่าเพิ่ม</font>
			<br>
			<font class='smalltext'>VAT</font>
		</td>
		<td>
			<font class='mediumtext'>รวมเงิน</font>
			<br>
			<font class='smalltext'>Total</font>
		</td>
	</tr>
	<tr>
		<td>
			<font class='specify_center'>".$premStdTotal."</font>
		</td>
		<td>
			<font class='specify_center'>".$premDiscount."</font>
		</td>
		<td>
			<font class='specify_center'>".$premNet."</font>
		</td>
		<td>
			<font class='specify_center'>".$premStampDuty."</font>
		</td>
		<td>
			<font class='specify_center'>".$premVat."</font>
		</td>
		<td>
			<font class='specify_center'>".$premTotal."</font>
		</td>
	</tr>
	</table>
	</td>
</tr>
<tr id='tstd1'>
	<td colspan='3'>
	<table>
	<tr>
		<td>
			<font class='mediumtext'>รายการที่ 7.</font>
			<br>
			<font class='smalltext'>Item7.</font>
		</td>
		<td>
			<font class='mediumtext'>การใช้รถ:</font>
			<br>
			<font class='smalltext'>Use of Motor Vehicle</font>
		</td>
		<td>
			<font class='specify'>[value??]</font>
		</td>
	</tr>
	</table>
	</td>
</tr>
<tr id='tstd1'>
	<td colspan='3'>
	<table>
	<tr>
		<td>
			[ ]
		</td>
		<td>
			<font class='mediumtext'>การประกันภัยโดยตรง</font>
			<br>
			<font class='smalltext'>Direct Insurance</font>
		</td>
		<td>
			[ ]
		</td>
		<td>
			<font class='mediumtext'>ตัวแทนประกันภัยรายนี้</font>
			<br>
			<font class='smalltext'>Agent</font>
		</td>
		<td>
			[ ]
		</td>
		<td>
			<font class='mediumtext'>นายหน้าประกันภัยรายนี้</font>
			<br>
			<font class='smalltext'>Broker</font>
		</td>
		<td>
			<font class='specify'>[value???]</font>
		</td>
		<td>
			<font class='mediumtext'>ใบอนุญาตเลขที่</font>
			<br>
			<font class='smalltext'>License No</font>
		</td>
		<td>
			<font class='specify'>[value???]</font>
		</td>
	</tr>
	</table>
	</td>
</tr>
</table>
<br/>
<footer>
<p> footer <p>
</footer>
</body>
</html>
";
?>