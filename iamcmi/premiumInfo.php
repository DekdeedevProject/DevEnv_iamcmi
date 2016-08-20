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
            echo "<select class='form-control' name='payMet4' id='payMet4' >\n";
            echo "<option value='0'>- เลือก payMet4 -</option>\n";
            echo "<option value='1'>เงินสด</option>\n";
            echo "<option value='2'>โอนเงิน</option>\n";
         } 
         else if ($data=='payApprSta5') { 
            echo "<select class='form-control' name='payApprSta5' id='payApprSta5' >\n";
            echo "<option value='0'>- เลือก payApprSta5 -</option>\n";
            echo "<option value='1'>0</option>\n";
            echo "<option value='2'>1</option>\n";
         } 
         else{
          echo "</select>\n";
         } 


?>