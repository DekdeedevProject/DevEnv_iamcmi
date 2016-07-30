<!DOCTYPE html>
<?php 

$bdCol = '6';
$content = "
<html>
<head>
<style>

@page { margin: 15px; }

@font-face {
font-family: THSarabun;
src: url('dompdf/lib/fonts/THSarabun.ttf');
}

\@font-face {
font-family: THSarabunBold;
src: url('dompdf/lib/fonts/THSarabunBold.ttf');
}

@font-face {
font-family: THSarabunBoldItalic;
src: url('dompdf/lib/fonts/THSarabunBoldItalic.ttf');
}

@font-face {
font-family: THSarabunBoldItalic;
src: url('dompdf/lib/fonts/THSarabunItalic.ttf');
}


body {
    /* to centre page on screen*/
    margin-left: 15px;
    margin-right: 15px;
    font-family:'THSarabun';
}

table {
	border: 0px;
	width: 100%;
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
#tstd3 {
    text-align: left;
    vertical-align: center;
    font-size: 5px;
    color: black;
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

#thheader{
	text-align: center;
	vertical-align: top;
	font-size: 16px;
	font-family: 'THSarabunBold';
}

div{
	color: red;
	text-align: center;
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
			<img src='dompdf/src/Image/seg-logo.jpg' alt='Company Logo' height='80px'>
			<br>
			<div>[Branch]<div>
		</td>
		<td width='40%'  id='tbody'>
			<img src='dompdf/src/Image/logo.png' alt='Company Logo' height='100px'>
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
	<tr id='tstd1'>
		<td width='65%' id='tstd3'>
		[date??]<br>
		[value??]
		</td>
		<td width='10%' id='tstd4'>
		เลขที่<br>
		วันที่
		</td>
		<td width='25%' >
		[Value??]<br>
		[Date??]
		</td>
	</tr>	
	</table>		
	</td>
</tr>
</table>
</header>

<table id='tstd1'>
<tr id='tstd1'>
	<td width='15%'></td>
	<td id='thheader' width='70%'>
		<div>ตารางกรมธรรม์ประกันภัยคุ้มครองผู้ประสบภัยจากรถ/ใบเสร็จรับเงิน/ใบกำกับภาษี</div>
		<div>THE SCHEDULE/RECEIPT/TAX INVOICE</div>
	</td>
	<td width='15%' id='tstd6'>NUMBER</td>
</tr>
<tr id='tstd1'>
	<td colspan='3'>
	<table>
	<tr>
		<td width='25%' >
			รหัสบริษัท : SEI<br>
			Co. Code
		</td>
		<td width='40%' >
			กรมธรรม์ประกันภัยเลขที่ :<br>
			Policy No
		</td>
		<td width='35%'>
			[barcode]<br>
			[barcode number]
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
			รายการที่ 1.<br>
			Item1.
		</td>
		<td>
			ผู้เอาประกันภัย<br>
			The Insured
		</td>
		<td>
			ชื่อ :<br>
			Name
		</td>
		<td>
			[Name??? Salu Firstname + Surname]
		</td>
		<td>
			อาณาเขตที่คุ้มครอง<br>
			Territorial Limit Covered
		</td>
	</tr>
	<tr>
		<td>
			
		</td>
		<td>
			[value??]
		</td>
		<td>
			ที่อยู่ :<br>
			Address
		</td>
		<td>
			[Address1??? ]<br>
			[Address2??? ]<br>
			เลขประจำตัวผู้เสียภาษีอากร: [Tax??? (ถ้ามี) ]
		</td>
		<td>
			ประเทศไทย<br>
			Thailand
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
			รายการที่ 2.<br>
			Item2.
		</td>
		<td>
			ระยะเวลาประกันภัย:<br>
			Period Insured
		</td>
		<td>
			เริ่มต้นวันที่<br>
			From
		</td>
		<td>
			[Date???]
		</td>
		<td>
			ถึงวันที่<br>
			To
		</td>
		<td>
			[Date???]
		</td>
		<td>
			
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
			รายการที่ 3.<br>
			Item3.
		</td>
		<td>
			รถที่เอาประกันภัย:<br>
			Particulars of Motor Vehicle
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td>
			
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
			รหัส.<br>
			Code
		</td>
		<td>
			ชื่อรถ<br>
			Make
		</td>
		<td>
			เลขทะเบียน<br>
			License No.
		</td>
		<td>
			เลขตัวถัว<br>
			Chassis No.
		</td>
		<td>
			แบบตัวถัง<br>
			Body Type
		</td>
		<td>
			ขนาดเครื่องยนต์/จำนวนที่นั่ง/นำ้หนักรวม<br>
			Capacity
		</td>
	</tr>
	<tr>
		<td>
			[code??]
		</td>
		<td>
			[Make??]
		</td>
		<td>
			[License??]
		</td>
		<td>
			[Chassis??]
		</td>
		<td>
			[Body Type??]
		</td>
		<td>
			[Capacity??]
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
			รายการที่ 4.<br>
			Item4.
		</td>
		<td>
			จำนวนเงินคุ้มครองผู้ประสบภัย:<br>
			Limit of Covered
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td>
			
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
			รายการที่ 5.<br>
			Item5.
		</td>
		<td>
			จำนวนเงินค่าเสียหายเบื้องต้น:<br>
			Limit of Preliminary Compensation
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td>
			
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
			รายการที่ 6.<br>
			Item6.
		</td>
		<td>
			เบี้ยประกันภัย: (บาท)<br>
			Premium: (Baht)
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td>
			
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
			เบี้ยประกันภัย.<br>
			Premium
		</td>
		<td>
			ส่วนลดจากการประกันภัยโดยตรง<br>
			Premium Discounts
		</td>
		<td>
			เบี้ยประกันภัยสุทธิ<br>
			Net Premium
		</td>
		<td>
			อากรแสตมป์<br>
			Stamps
		</td>
		<td>
			ภาษีมูลค่าเพิ่ม<br>
			VAT
		</td>
		<td>
			รวมเงิน<br>
			Total
		</td>
	</tr>
	<tr>
		<td>
			[code??]
		</td>
		<td>
			[Make??]
		</td>
		<td>
			[License??]
		</td>
		<td>
			[Chassis??]
		</td>
		<td>
			[Body Type??]
		</td>
		<td>
			[Capacity??]
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
			รายการที่ 7.<br>
			Item7.
		</td>
		<td>
			การใช้รถ:<br>
			Use of Motor Vehicle
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td>
			
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
			การประกันภัยโดยตรง<br>
			Direct Insurance
		</td>
		<td>
			[ ]
		</td>
		<td>
			ตัวแทนประกันภัยรายนี้<br>
			Agent
		</td>
		<td>
			[ ]
		</td>
		<td>
			นายหน้าประกันภัยรายนี้<br>
			Broker
		</td>
		<td>
			
		</td>
		<td>
			ใบอนุญาตเลขที่<br>
			License No
		</td>
		<td>
			
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