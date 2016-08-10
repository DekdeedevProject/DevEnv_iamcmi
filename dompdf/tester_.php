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
    margin: 0 0 0 0;
    box-shadow: 0;
  }
}
table{
	border-collapse: collapse;
	width:100%; 
}
table, th, td {
    border: 1px solid black;
}
div {
    font-size:x-small;
}
    </style>
  </head>
  <body>
 <page size="A4">
 <table height="10%">
  	<tr>
  		<td width="30%">
        <img src='../dompdf/src/Image/seg-logo.jpg' alt='Company Logo' height='80px'>
      </td>
  		<td width="50%">
      </td>
  		<td></td>
  	</tr>
    <tr>
      <td colspan="2"><div>
      เลขที่
      <br>
      วันที่
    </div></td>
    <td></td>
   </tr>
    <tr>
    </tr>
  </table>
  <table height="60%">
  	<tr><th colspan="15"><div>
  		สำเนาตารางกรมธรรม์ประกันภัยคุ้มครองผู้ประสยภัยจากรถ/ใบเสร็จ/ใบกำกับภาษี<br>
  		THE SCHEDULE/RECEIPT/TAX INVOICE COPY
  	</div></th></tr>
	<tr>
    <td colspan="3"><div>
      รหัสบริษัท :
      <br>
      Co. Code
    </div></td>
    <td colspan="2"><div>row1</div></td>
    <td colspan="7"><div>
      กรมธรรม์ประกันภัยเลขที่ :
      <br>
      Policy No.
    </div></td>
    <td colspan="3"><div>row2</div></td>
    
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
    <td colspan="6"><div>Item1.1</div></td>
    <td colspan="3"><div>
      อาณาเขตที่คุ้มครอง
      <br>
      Territorial Limit Covered
    </div></td>
  </tr>
  <tr>
    <td><div></div></td>
    <td><div></div></td>
    <td><div></div></td>
    <td><div></div></td>
    <td colspan="2"><div>
      ที่อยู่:
      <br>
      Address
    </div></td>
    <td colspan="6"><div>Item1.2</div></td>
    <td colspan="3" width="25%"><div>
      ประเทศไทย
      <br>
      Thailanc
    </div></td>
  </tr>
	<tr>
    <td colspan="2"><div>
      รายการที่
      <br>
      Item
    </div></td>
    <td><div>
      2.
      <br>
      2.
    </div></td>
    <td><div>
      ระยะเวลาประกันภัย
      <br>
      Period Insured
    </div></td>
    <td colspan="2"><div>
      เริ่มต้นวันที่
      <br>
      From
    </div></td>
    <td colspan="4"><div>รายการที่ 2.</div></td>
    <td><div>
      ถึงวันที่
      <br>
      To
    </div></td>
    <td colspan="2" ><div>รายการที่ 2.</div></td>
     <td width="5%"><div>
      เวลา
      <br>
      at
    </div></td>
    <td width="10%"><div>รายการที่ 2.</div></td>
  </tr>
	<tr>
    <td colspan="2"><div>
      รายการที่
      <br>
      Item
    </div></td>
    <td><div>
      3.
      <br>
      3.
    </div></td>
    <td colspan="12"><div>
      รถที่เอาประกันภัย:
      <br>
      Particulars of Motor Vehicle
    </div></td>
  </tr>
	<tr>
    <th colspan="3"><div>
      รหัส.
      <br>
      Code
    </div></th>
    <th><div>
      ชื่อรถ
      <br>
      Make
    </div></th>
    <th colspan="3"><div>
      เลขทะเบียน
      <br>
      License No.
    </div></th>
    <th colspan="3"><div>
      เลขตัวถัง
      <br>
      Chassis No.
    </div></th>
    <th><div>
      แบบตัวถัง
      <br>
      Body Type
    </div></th>
    <th colspan="4"><div>
      ขนาดเครื่องยนต์/จำนวนที่นั่ง/นำ้หนักรวม
      <br>
      Capacity
    </div></th>
	</tr>
	<tr>
	<td colspan="3"><div>row7.1</div></td>
	<td><div>row7.2</div></td>
	<td colspan="3"><div>row7.3</div></td>
	<td colspan="3"><div>row7.4</div></td>
	<td><div>row7.5</div></td>
	<td colspan="4"><div>row7.6</div></td>
	</tr>
	<tr>
    <td colspan="2"><div>
      รายการที่
      <br>
      Item
    </div></td>
    <td><div>
      4.
      <br>
      4.
    </div></td>
    <td colspan="3"><div>
      จำนวนเงินคุ้มครองผู้ประสบภัย:
      <br>
      Limit of covered 
    </div></td>
    <td colspan="9"><div>รายการที่ 4.</div></td>
  </tr>
  <tr>
   <td colspan="2"><div>
      รายการที่
      <br>
      Item
    </div></td>
    <td><div>
      5.
      <br>
      5.
    </div></td>
    <td colspan="3"><div>
      จำนวนเงินค่าเสียหายเบื้องต้น:
      <br>
      Limit of Preliminary Compensation 
    </div></td>
    <td colspan="9"><div>รายการที่ 5.</div></td>
  </tr>
  <tr>
    <td colspan="2"><div></div></td>
    <td><div></div></td>
    <td colspan="12"><div>
      จำนวนเงินค่าเสียหายเบื้องต้นนี้เป็นส่วนหนึ่งของจำนวนเงินคุ้มครองผู้ประสบภัยตามรายการที่ 4
    </div></td>
  </tr>
  <tr>
    <td colspan="2"><div>
      รายการที่
      <br>
      Item
    </div></td>
    <td><div>
      6.
      <br>
      6.
    </div></td>
    <td colspan="9"><div>
      เบี้ยประกันภัย: (บาท)
      <br>
      Premium (Baht)
    </div></td>
    <td colspan="3"><div>row6.1</div></td>
  </tr>
	<tr>
    <th colspan="4"><div>
      เบี้ยประกันภัย
      <br>
      Premium
    </div></th>
    <th colspan="3"><div>
      ส่วนลดจากการประกันภัยโดยตรง
      <br>
      Premium Discounts
    </div></th>

    <th colspan="3"><div>
      เบี้ยประกันภัยสุทธิ
      <br>
      Net Premium
    </div></th>
    <th><div>
      อากรแสตมป์
      <br>
      Stamps
    </div></th>
    <th><div>
      ภาษีมูลค่าเพิ่ม
      <br>
      VAT
    </div></th>
    <th colspan="3"><div>
      รวมเงิน
      <br>
      Total
    </div></th>
  </tr>
	<tr>
		<td colspan="4"><div>row12.1</div></td>
		<td colspan="3"><div>row12.2</div></td>
		<td colspan="3"><div>row12.3</div></td>
		<td><div>row12.4</div></td>
		<td><div>row12.5</div></td>
		<td colspan="3"><div>row12.6</div></td>
	</tr>
  <tr>
    <td colspan="2"><div>
      รายการที่
      <br>
      Item
    </div></td>
    <td><div>
      7.
      <br>
      7.
    </div></td>
    <td colspan="2"><div>
      การใช้รถ
      <br>
      Use of Motor Vehicle
    </div></td>
    <td colspan="10"><div>รายการที่ 7.</div></td>
  </tr>
	<tr>
    <td width="5%"><div>
      [] 
    </div></td>
    <td colspan="3" width="13%"><div>
      การประกันภัยโดยตรง
      <br>
      Direct Insurance
    </div></td>
    <td width="5%"><div>
      [] 
    </div></td>
    <td colspan="2" width="13%"><div>
      ตัวแทนประกันภัยรายนี้
      <br>
      Agent
    </div></td>
    <td width="5%"><div>
      [] 
    </div></td>
    <td width="13%"><div>
      นายหน้าประกันภัยรายนี้
      <br>
      Broker
    </div></td>
    <td colspan="3"><div>row14</div></td>
    <td colspan="3"><div>
      ใบอนุญาตเลขที่
      <br>
      License No
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
      <td></td>
      <td></td>
      <td width="15%"><div>
        วันทำกรมธรรม์ประกันภัย
        <br>
        Policy issued on
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
        เอกสารนี้ให้ไว้เพื่อแสดงว่ารถหมายเลขทะเบียนที่ ...... ตัวถังรถเลขที่ ......
        <br>
        ได้ทำประกันภัยตามพระราชบัญญัติคุ้มครองผู้ประสบภัยจากรถ พ.ศ. 2535 แล้ว โดยมีระยะเวลาประกันภัยประกันภัย
        <br>
        เริ่มต้นวันที่ ....... ถึงวันที่ ........
        <br>
        ตามกรมธรรม์ประกันภัยเลขที่ .......... ของบริษัท ...........
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