<?php
    header("content-type: text/html; charset=utf-8");
    header ("Expires: Wed, 21 Aug 2013 13:13:13 GMT");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");

    
    include 'config/config.php'; 
    $conn   = connOpen();
    $data = $_GET['data'];
    $val1 = $_GET['val1'];
    $val2 = $_GET['val2'];

         if ($data=='payMet4') { 
            echo "<select class='form-control' name='payMet4' id='payMet4' required>\n";
            echo "<option value=''>- เลือกวิธีการจ่ายเงิน -</option>\n";
            if($val1==1){
            echo "<option value='1' selected>เงินสด</option>\n";
            echo "<option value='2'>โอนเงิน</option>\n";
            }
            else if($val1==2){
            echo "<option value='1' >เงินสด</option>\n";
            echo "<option value='2' selected>โอนเงิน</option>\n";
            }
            else{
            echo "<option value='1'>เงินสด</option>\n";
            echo "<option value='2'>โอนเงิน</option>\n";   
            }
            
         } 
         else if ($data=='payApprSta5') { 
            echo "<select class='form-control' name='payApprSta5' id='payApprSta5' required>\n";
            echo "<option value=''>- เลือกผลการอนุมัติ -</option>\n";
            echo "<option value='1'>0</option>\n";
            echo "<option value='2'>1</option>\n";
         } 
         else{
          echo "</select>\n";
         } 


?>