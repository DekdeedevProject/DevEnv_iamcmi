<?php
// include autoloader
ob_start();
include 'config/config.php';
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$policyNo=$_POST['policyNo'];
// $policyNo="NCMI0000042";
$date=date("Y-m-d H:i:s");
setPolQuoNum($policyNo);
$sqlID			= "PCS1_003";	
$conn 	= connOpen();
$quoQueryResult = executeSql($conn,$sqlID);
if($quoQueryResult){
	$row 		= $quoQueryResult->fetch_assoc();
	include 'config/condition/PCS_CON_002.php';
	// include 'printContent.php';
	// echo $content;
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
body {
  background: rgb(204,204,204); 
}
page {
  background: white;
  display: block;
  margin: 0 0 0 0;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
page[size="A4"][layout="portrait"] {
  width: 29.7cm;
  height: 21cm;  
}
page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}
page[size="A3"][layout="portrait"] {
  width: 42cm;
  height: 29.7cm;  
}
page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}
page[size="A5"][layout="portrait"] {
  width: 21cm;
  height: 14.8cm;  
}
@media print {
  body, page {
    margin: 0.25 0 0 0;
    box-shadow: 0;
  }
}
table{
	border-collapse: collapse;
	width:100%;
}
table#tbline {
    border: 1px solid black;
}


/*th, td {
    border: 1px solid black;
}*/
td{
  vertical-align: top;
}
td#tdline_1100 {
    border-top: 1px solid black; 
    border-bottom: 1px solid black;
    /*border-left: 1px solid black;*/
    /*border-right: 1px solid black;*/
}
td#tdline_0100 {
    /*border-top: 1px solid black; */
    border-bottom: 1px solid black;
    /*border-left: 1px solid black;*/
    /*border-right: 1px solid black;*/
}

td#tdline_1111 {
    border-top: 1px solid black; 
    border-bottom: 1px solid black;
    border-left: 1px solid black;
    border-right: 1px solid black;
}

th#thline_1111 {
    border-top: 1px solid black; 
    border-bottom: 1px solid black;
    border-left: 1px solid black;
    border-right: 1px solid black;
}



div {font-size:x-small;}
div.request {color: red;}

    </style>
  </head>
  <body>
 <page size="A4">
 <table height="10%">
  	<tr>
  		<td width="30%">
        <img height='50px'>
      </td>
  		<td width="50%">
      </td>
  		<td></td>
  	</tr>
    <tr align="right">
      <td colspan="2"><div >
      เลขที่<br>
      วันที่
    </div></td>
    <td align="left">
      <div class="request">
      [เลขที่?]
      <br>
      <?php echo date("Y-m-d");?>
    </div>
    </td>
   </tr>
    <tr>
    </tr>
  </table>
  <table id="tbline" height="60%">
  	<tr><th colspan="15"><div>
  		สำเนาตารางกรมธรรม์ประกันภัยคุ้มครองผู้ประสยภัยจากรถ/ใบเสร็จ/ใบกำกับภาษี<br>
  		THE SCHEDULE/RECEIPT/TAX INVOICE COPY
  	</div></th></tr>
	<tr>
    <td id="tdline_1100" colspan="3"><div>
      รหัสบริษัท :
      <br>
      Co. Code
    </div></td>
    <td id="tdline_1100" colspan="2"><div class="request"><?php echo $orgShortName;?></div></td>
    <td id="tdline_1100" colspan="7"><div>
      กรมธรรม์ประกันภัยเลขที่ <font color="red"><?php echo $policyNo; ?></font>
      <br>
      Policy No.
      </div>
    </td>
    <td id="tdline_1100" colspan="3" align="center">
    <div class="request">row1-barcode no</div>
    </td>
  </tr>
	<tr>
     <td colspan="2"><div>
      รายการที่
      <br>
      Item
    </div></td>
    <td><div>
      1.
      1.
    </div></td>
     <td><div>
      ผู้เอาประกันภัย
      <br>
      The Insured
    </div></td>
    <td colspan="2"><div>
      ชื่อ:
      <br>
      Name
    </div></td>
    <td colspan="6"><div class="request"><?php echo $PHD_perSaluTH." ".$PHD_perFName." ".$PHD_perLName; ?></div></td>
    <td colspan="3" align="right"><div>
      อาณาเขตที่คุ้มครอง  
      <br>
      Territorial Limit Covered
    </div></td>
  </tr>
  <tr>
    <td id="tdline_0100" colspan="4"><div></div></td>
    <td id="tdline_0100" colspan="2"><div>
      ที่อยู่:
      <br>
      Address
    </div></td>
    <td id="tdline_0100" colspan="6"><div class="request">
      <?php echo $PHD_addrLine1." ".$PHD_addrLine2; ?>
      <br>
      <?php 
      if($PHD_addrProv=='1'){
      echo "แขวง ".$PHD_addrSubDistNameTH." เขต ".$PHD_addrDistrictNameTH; 
      }
      else{
      echo "ตำบล ".$PHD_addrSubDistNameTH." อำเภอ ".$PHD_addrDistrictNameTH; 
      }

      ?>
      <br>
      <?php echo "จังหวัด ".$PHD_addrProvNameTH." ".$PHD_addrZipCode; ?>
    </div></td>
    <td id="tdline_0100" colspan="3" width="25%" align="right"><div>
      ประเทศไทย
      <br>
      Thailanc
    </div></td>
  </tr>
	<tr>
    <td id="tdline_1100" colspan="2"><div>
      รายการที่
      <br>
      Item
    </div></td>
    <td id="tdline_1100"><div>
      2.
      <br>
      2.
    </div></td>
    <td id="tdline_1100"><div>
      ระยะเวลาประกันภัย
      <br>
      Period Insured
    </div></td>
    <td id="tdline_1100" colspan="2" ><div>
      เริ่มต้นวันที่
      <br>
      From
    </div></td>
    <td id="tdline_1100" colspan="4" ><div class="request"><?php echo $polEffDate; ?></div></td>
    <td><div>
      ถึงวันที่
      <br>
      To
    </div></td>
    <td id="tdline_1100" colspan="2" ><div class="request"><?php echo $polExpDate; ?></div></td>
     <td id="tdline_1100" width="5%"><div></div></td>
    <td id="tdline_1100"width="10%" align="right"><div class="request">
      เวลา 16.30 น.
      <br>
      at 16.30 hours
    </div></td>
  </tr>
	<tr>
    <td  id="tdline_1100" colspan="2"><div>
      รายการที่
      <br>
      Item
    </div></td>
    <td  id="tdline_1100"><div>
      3.
      <br>
      3.
    </div></td>
    <td  id="tdline_1100" colspan="12"><div>
      รถที่เอาประกันภัย:
      <br>
      Particulars of Motor Vehicle
    </div></td>
  </tr>
	<tr>
    <th id="thline_1111" colspan="3"><div>
      รหัส.
      <br>
      Code
    </div></th>
    <th id="thline_1111"><div>
      ชื่อรถ
      <br>
      Make
    </div></th>
    <th id="thline_1111" colspan="3"><div>
      เลขทะเบียน
      <br>
      License No.
    </div></th>
    <th id="thline_1111" colspan="3"><div>
      เลขตัวถัง
      <br>
      Chassis No.
    </div></th>
    <th id="thline_1111"><div>
      แบบตัวถัง
      <br>
      Body Type
    </div></th>
    <th id="thline_1111" colspan="4"><div>
      ขนาดเครื่องยนต์/จำนวนที่นั่ง/นำ้หนักรวม
      <br>
      Capacity
    </div></th>
	</tr>
	<tr>
	<td id="tdline_1111" colspan="3" align="center"><div class="request"><?php echo $vehTARvehCodeFK;?></div></td>
	<td id="tdline_1111" align="center"><div class="request"><?php echo $redMake;?></div></td>
	<td id="tdline_1111" colspan="3" align="center"><div class="request"><?php echo $vehLicenseNum;?></div></td>
	<td id="tdline_1111" colspan="3" align="center"><div class="request"><?php echo $vehChassisNum;?></div></td>
	<td id="tdline_1111" align="center"><div class="request"><?php echo "[Body Type??]";?></div></td>
	<td id="tdline_1111" colspan="4" align="center"><div class="request"><?php echo $vehCapacity." C.C./".$vehSeat." Seats/".$vehWeight." Tonage";?></div></td>
	</tr>
	<tr>
    <td id="tdline_1100" colspan="2"><div>
      รายการที่
      <br>
      Item
    </div></td>
    <td id="tdline_1100"><div>
      4.
      <br>
      4.
    </div></td>
    <td id="tdline_1100" colspan="3"><div>
      จำนวนเงินคุ้มครองผู้ประสบภัย:
      <br>
      Limit of covered 
    </div></td>
    <td id="tdline_1100" colspan="9"><div>
      (1) 80,000บาทต่อหนึ่งคน สำหรับความเสียหายต่อร่างกายหรืออนามัย
      <br> 
      (2) 300,000บาทต่อหนึ่งคน สำหรับการเสียชีวิต หรือทุพพลภาพอย่างถาวร
       <br> 
      (3) 200,000าทถึง 300,000บาทต่อหนึ่งคน สำหรับการสูญเสียอวัยวะตามเงื่อนไขกรมธรรม์ฯ ข้อ3
       <br>
      (4) 200บาทต่อวัน รวมกันไม่เกิน 20วัน สำหรับการชดเชยรายวัน กรณีเข้ารักษาในสถานพยาบาลในฐานะคนไข้ใจ
      <br>
      ทั้งนี้จำนวนเงินคุ้มครองสูงสุด สำหรับ (1)(2)(3)และ(4)รวมกันไม่เกิน 304,000บาท ต่อหนึ่งคน
      <br>
      และรวมกันไม่เกินห้าล้านบาท สำหรับรถที่มที่นั่งไม่เกินเจ็ดคน หรือรถบรรทุกผู้โดยสารรวมทั้งผู้ขับขี่ไม่เกินเจ็ดคน
      <br>
      และไม่เกินสิบล้านบาท สำหรับรถที่มีที่นั่งเกินเจ็ดคน หรือรถบรรทุกผู้โดยสารรวมทั้งผู้ขับขี่เกินเจ็ดคนต่ออุบัติเหตแต่ละครั้ง
    </div></td>
  </tr>
  <tr>
   <td id="tdline_1000" colspan="2"><div>
      รายการที่
      <br>
      Item
    </div></td>
    <td id="tdline_1000"><div>
      5.
      <br>
      5.
    </div></td>
    <td id="tdline_1000" colspan="3"><div>
      จำนวนเงินค่าเสียหายเบื้องต้น:
      <br>
      Limit of Preliminary Compensation 
    </div></td>
    <td id="tdline_1000" colspan="9"><div>
      ความเสียหายต่อร่างกายไม่เกิน 30,000บาท ต่อหนึ่งคน หรือตามที่กฎหมายกำหนด
      <br>
      ความเสียหายต่อร่างกายสำหรับการสูญเสียอวัยวะหรือทุพพลภาพอย่างถาวร 35,000บาทหรือตามที่กฎหมายกำหนด
      <br>
      ความเสียหายต่อชีวิต 35,000บาท ต่อหนึ่งคน หรือตามที่กฎหมายกำหนด
    </div></td>
  </tr>
  <tr>
    <td id="tdline_0100" colspan="2"><div></div></td>
    <td id="tdline_0100"><div></div></td>
    <td id="tdline_0100" colspan="12"><div>
      จำนวนเงินค่าเสียหายเบื้องต้นนี้เป็นส่วนหนึ่งของจำนวนเงินคุ้มครองผู้ประสบภัยตามรายการที่ 4
    </div></td>
  </tr>
  <tr>
    <td id="tdline_1100" colspan="2"><div>
      รายการที่
      <br>
      Item
    </div></td>
    <td id="tdline_1100"><div>
      6.
      <br>
      6.
    </div></td>
    <td id="tdline_1100" colspan="9"><div>
      เบี้ยประกันภัย: (บาท)
      <br>
      Premium (Baht)
    </div></td>
    <td id="tdline_1100" colspan="3" align="right"><div class="request">[Item6-Premium Status?]</div></td>
  </tr>
	<tr>
    <th id="thline_1111" colspan="4"><div>
      เบี้ยประกันภัย
      <br>
      Premium
    </div></th>
    <th id="thline_1111" colspan="3"><div>
      ส่วนลดจากการประกันภัยโดยตรง
      <br>
      Premium Discounts
    </div></th>

    <th id="thline_1111" colspan="3"><div>
      เบี้ยประกันภัยสุทธิ
      <br>
      Net Premium
    </div></th>
    <th id="thline_1111"><div>
      อากรแสตมป์
      <br>
      Stamps
    </div></th>
    <th id="thline_1111"><div>
      ภาษีมูลค่าเพิ่ม
      <br>
      VAT
    </div></th>
    <th id="thline_1111" colspan="3"><div>
      รวมเงิน
      <br>
      Total
    </div></th>
  </tr>
	<tr>
		<td id="tdline_1111" colspan="4" align="center"><div class="request"><?php echo $premStdTotal;?></div></td>
		<td id="tdline_1111" colspan="3" align="center"><div class="request">
		<?php 
		if($premDiscount==0){
			echo "-";
		}
		else{
			echo $premDiscount;
		}	
		?>
		</div></td>
		<td id="tdline_1111" colspan="3" align="center"><div class="request"><?php echo $premNet;?></div></td>
		<td id="tdline_1111" align="center"><div class="request"><?php echo $premStampDuty;?></div></td>
		<td id="tdline_1111" align="center"><div class="request"><?php echo $premVat;?></div></td>
		<td id="tdline_1111" colspan="3" align="center"><div class="request"><?php echo $premTotal;?></div></td>
	</tr>
  <tr>
    <td id="tdline_1100" colspan="2"><div>
      รายการที่
      <br>
      Item
    </div></td>
    <td id="tdline_1100"><div>
      7.
      <br>
      7.
    </div></td>
    <td id="tdline_1100" colspan="2"><div>
      การใช้รถ
      <br>
      Use of Motor Vehicle
    </div></td>
    <td id="tdline_1100" colspan="10"><div class="request">Item7-Vehical Type</div></td>
  </tr>
	<tr>
    <td id="tdline_1100" width="5%"><div>
      <img src="../img/icon_checked.png" height="15px">
    </div></td>
    <td id="tdline_1100" colspan="3"><div>
      การประกันภัยโดยตรง
      <br>
      Direct Insurance
    </div></td>
    <td id="tdline_1100" width="5%"><div>
      <img src="../img/icon_checked.png" height="15px">
    </div></td>
    <td id="tdline_1100" colspan="2" width="13%"><div>
      ตัวแทนประกันภัยรายนี้
      <br>
      Agent
    </div></td>
    <td width="5%"><div>
      <img src="../img/icon_checked.png" height="15px">
    </div></td>
    <td width="13%"><div>
      นายหน้าประกันภัยรายนี้
      <br>
      Broker
    </div></td>
    <td colspan="3"><div class="request">
    <?php echo $agtCode; ?>
    <br>
    [Item7-Agent Name?]
    </div></td>
    <td ><div>
      ใบอนุญาตเลขที่
      <br>
      License No
    </div></td>
    <td colspan="2" align="left"><div class="request">
      Item7-License No
    </div></td>
  </tr>


  </table>
   <table>
    <tr>
      <td width="15%"><div>
        วันทำสัญญาประกันภัย
        <br>
        Agreement made on
      </div></td>
      <td><div class="request">
        Agreement Date
      </div></td>
       <td></td>
      <td width="15%"><div>
        วันทำกรมธรรม์ประกันภัย
        <br>
        Policy issued on
      </div></td>
      <td><div class="request">
      Issued Date
    </div></td>
      <td></td>
    </tr>
    <tr>
      <td colspan="5"><div>
        เพื่อเป็นหลักฐานบริษัทโดยบุคคลผู้มีอำนาจได้ลงลายมือชื่อและประทับตราของบริษัทได้เป็นสำคัญ ณ สำนักงานของบริษัท
        <br>
        As evidence the Company has caused this Policy to be signed by duly authorized persons and the Company's stamp to be affixed at its Office
      </div></td>
    </tr>
  	<tr>
  		<td colspan="2" width="33%"><div><br><br>กรรมการ Director<br><br></div></td>
  		<td width="33%"><div><br><br>กรรมการ Director<br><br></div></td>
  		<td colspan="2" width="34%" ><div><br><br>ผู้รับมอบอำนาจ Authorized Signature / ผู้รับเงิน Cahier<br><br></div></td>
  	</tr>
  </table>
  <table>
    <tr>
      <th colspan="3"><div>
        หลักฐานแสดงการประกันภัยตามพระราชบัญญัติคุ้มครองผู้ประสบภัยจากรถ
        <br>
        เพื่อใช้สำหรับการจดทะเบียนรถใหม่หรือขอเสียภาษีประจำปีต่อนายทะเบียนขนส่ง
      </div></th>
      
      <td colspan="2"><div>
        barcode
      </div></td>
    </tr>
    <br>
    <tr>
       <td colspan="3"><div>
        เอกสารนี้ให้ไว้เพื่อแสดงว่ารถหมายเลขทะเบียนที่ 
        <font color="red">
          <?php echo $vehLicenseNum; ?>
        </font> 
        ตัวถังรถเลขที่ 
        <font color="red">
          <?php echo $vehChassisNum; ?>
        </font> 
        <br>
        ได้ทำประกันภัยตามพระราชบัญญัติคุ้มครองผู้ประสบภัยจากรถ พ.ศ. 2535 แล้ว โดยมีระยะเวลาประกันภัยประกันภัย
        <br>
        เริ่มต้นวันที่ 
        <font color="red">
          <?php echo $polEffDate; ?>
        </font> 
        ถึงวันที่ 
        <font color="red">
          <?php echo $polExpDate; ?>
        </font> 
        <br>
        ตามกรมธรรม์ประกันภัยเลขที่ 
        <font color="red">
          <?php echo $policyNo; ?>
        </font> 
        ของบริษัท
        <font color="red">
          <?php echo $orgLongNameTH; ?>
        </font> 
      </div></td>
      
      <td colspan="2"><div>
      </div></td>
    </tr>
    </tr>
    <tr>
      <td colspan="2" width="33%"><div><br><br>กรรมการ Director<br><br></div></td>
      <td width="33%"><div><br><br>กรรมการ Director<br><br></div></td>
      <td colspan="2" width="34%" ><div><br><br>ผู้รับมอบอำนาจ Authorized Signature / ผู้รับเงิน Cahier<br><br></div></td>
    </tr>
  </table>

</page>
<!-- <page size="A4" layout="portrait"></page>
<page size="A5"></page>
<page size="A5" layout="portrait"></page>
<page size="A3"></page>
<page size="A3" layout="portrait"></page> -->
  
  </body>
</html>

<?php
}		
else{
	echo "not have";
}
?>