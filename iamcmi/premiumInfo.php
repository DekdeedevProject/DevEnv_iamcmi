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

         if ($data=='paidStatus') { 
            if($val1=='N'){
            echo "<div class='row'> ";
            echo "<div class='col-md-2' align='left'>สถานะการชำระเงิน:</div> ";
            echo "<div class='col-md-2' id='paidStatus' name='paidStatus'>";
            echo "<input type='radio' name='paidStatus' id='paidStatus' value='N' checked='checked' onchange=\"updateStatus('paidStatus', this.value, '-1')\"/> N ";
            echo "<input type='radio' name='paidStatus' id='paidStatus' value='Y' onchange=\"updateStatus('paidStatus', this.value, '-1')\"/> Y";
            echo "</div>";

            }
            else if($val1=='Y' && $val2=='-1'){
             
            echo "<div class='row'> ";
            echo "<div class='col-md-2' align='left'>สถานะการชำระเงิน:</div> ";
            echo "<div class='col-md-2' id='?' name='?'>";
            echo "<input type='radio' name='paidStatus' id='paidStatus' value='N' onchange=\"updateStatus('paidStatus', this.value, '-1')\" /> N";
            echo "<input type='radio' name='paidStatus' id='paidStatus' value='Y' checked='checked' onchange=\"updateStatus('paidStatus', this.value, '-1')\"/> Y ";  
            echo "</div>";

            echo "</div>";
            echo "<br>";
            echo "<div class='row'> ";
            echo "<div class='col-md-2' align='left' id='?' name='?'>";
            echo "วิธีการชำระเงิน:</div>"; 
            echo "<div class='col-md-2' id='paidStatus' name='paidStatus'>";
            echo "<input type='radio' name='' id='' value='N'/> Cash <br>";
            echo "<input type='radio' name='' id='' value='N'/> Transfer <br>";
            echo "<input type='radio' name='' id='' value='N'/> Credit Card <br>";
            echo "</div>";
            echo "</div>";
              

            }
            else if($val1=='Y' && $val2=='N'){
            echo "<div class='row'> ";
            echo "<div class='col-md-2' align='left'>สถานะการชำระเงิน:</div> ";
            echo "<div class='col-md-2' id='?' name='?'>";
            echo "<input type='radio' name='paidStatus' id='paidStatus' value='N' /> N ";
            echo "<input type='radio' name='paidStatus' id='paidStatus' value='Y' checked='checked' /> Y ";  
            echo "</div>";

            echo "<div class='col-md-2' align='right'>สถานะการอนุมัติ:</div> ";
            echo "<div class='col-md-2' id='?' name='?'>";
            echo "<input type='radio' name='' id='' value='N' checked='checked'/> N ";
            echo "<input type='radio' name='' id='' value='Y' /> Y ";  
            echo "</div>";
            
            echo "</div>"; 
           }
            else if($val1=='Y' && $val2=='Y'){
            echo "<div class='row'> ";
            echo "<div class='col-md-2' align='left'>สถานะการชำระเงิน:</div> ";
            echo "<div class='col-md-2' id='?' name='?'>";
            echo "<input type='radio' name='paidStatus' id='paidStatus' value='N' /> N ";
            echo "<input type='radio' name='paidStatus' id='paidStatus' value='Y' checked='checked' /> Y ";  
            echo "</div>";

            echo "<div class='col-md-2' align='right'>สถานะการอนุมัติ:</div> ";
            echo "<div class='col-md-2' id='?' name='?'>";
            echo "<input type='radio' name='' id='' value='N' /> N ";
            echo "<input type='radio' name='' id='' value='Y' checked='checked'/> Y ";  
            echo "</div>";
              
           }
            else{

            }
             
         } 
         else{
          echo "</select>\n";
         } 


?>