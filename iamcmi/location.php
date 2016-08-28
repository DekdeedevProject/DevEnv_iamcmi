<?php
    header ("content-type: text/html; charset=utf-8");
    header ("Expires: Wed, 21 Aug 2013 13:13:13 GMT");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");

    
    include 'config/config.php'; 
    $conn   = connOpen();
    $data = $_GET['data'];
    $val = $_GET['val'];
    $provID = $_GET['provID'];
    $distID = $_GET['distID'];
    $subDistID = $_GET['subDistID'];
    $cond = "";
    if(!empty($_GET['cond'])){
      $cond = $_GET['cond'];
    }
    
         if ($data=='PHD_addrProv') { 
              $sqlID  = "PCS1_002";   
              $PHD_addrProvResult =executeSql($conn,$sqlID);
              $PHD_addrProvSize = $PHD_addrProvResult->num_rows;
              echo "<select class='form-control' name='PHD_addrProv' id='PHD_addrProv' onChange=\"dochangeLocation('PHD_addrDist', '', this.value,'','')\" required>\n";
              echo "<option value=''>- เลือกจังหวัด -</option>\n";
              while($PHD_addrProvRow = $PHD_addrProvResult->fetch_assoc()){
                  echo "<option value='$PHD_addrProvRow[PROVINCE_ID]' >$PHD_addrProvRow[PROVINCE_NAME]</option>" ;
              }
         } else if ($data=='PHD_addrDist') {
              setLocationID($provID,0,0);
              $sqlID  = "PCS1_010";   
              $PHD_addrDistResult =executeSql($conn,$sqlID);
              $PHD_addrDistSize = $PHD_addrDistResult->num_rows;
              $distID = $_GET['distID'];
              echo "<select class='form-control' name='PHD_addrDist' id='PHD_addrDist' onChange=\"dochangeLocation('PHD_addrSubDist', '','".$provID."',this.value,'')\" required>\n";
              echo "<option value=''>- เลือกอำเภอ -</option>\n";
              while($PHD_addrDistRow = $PHD_addrDistResult->fetch_assoc()){
                  echo "<option value='$PHD_addrDistRow[DISTRICT_ID]' >$PHD_addrDistRow[DISTRICT_NAME]</option>" ;
              }
         } else if ($data=='PHD_addrSubDist') {
              setLocationID($provID,$distID,0);
              $sqlID  = "PCS1_011";   
              $PHD_addrSubDistResult  =executeSql($conn,$sqlID);
              echo "<select class='form-control' name='PHD_addrSubDist' id='PHD_addrSubDist' onChange=\"dochangeLocation('PHD_addrZipCode', '','".$provID."','".$distID."',this.value)\" required>\n";
              echo "<option value=''>- เลือกตำบล -</option>\n";
              $subDistID = $_GET['subDistID'];
              while($PHD_addrSubDistRow = $PHD_addrSubDistResult->fetch_assoc()){
                   echo "<option value='$PHD_addrSubDistRow[SUBDISTRICT_CODE]' >$PHD_addrSubDistRow[SUBDISTRICT_NAME]</option> \n" ;
              }
         }
         else if ($data=='PHD_addrZipCode') {
              setLocationID($provID,$distID,$subDistID);
              $sqlID  = "PCS1_012";   
              $PHD_addrZipCodeResult  =executeSql($conn,$sqlID);
              //setSubDist();
              echo "<select class='form-control' name='PHD_addrZipCode' id='PHD_addrZipCode'>\n";
              while($PHD_addrZipCodeRow = $PHD_addrZipCodeResult->fetch_assoc()){
                   echo "<option value=\"$PHD_addrZipCodeRow[zipcode]\" >$PHD_addrZipCodeRow[zipcode]</option> \n" ;
              }
         }
         else if ($data=='PHD_addr'){
         echo "  <div class='row'>";
              echo "    <div class='col-md-2' align='left'>จังหวัด :</div>";
              echo "    <div class='col-md-2' id='PHD_addrProv' name='PHD_addrProv'>";  
              $sqlID  = "PCS1_002";   
              $PHD_addrProvResult =executeSql($conn,$sqlID);
              $PHD_addrProvSize = $PHD_addrProvResult->num_rows;
              if($cond=="view"){
              echo "<select class='form-control' name='PHD_addrProv' id='PHD_addrProv' onChange=\"dochangeLocation('PHD_addrDist', '', this.value,'','')\" disabled>\n";              
              }
              else{
              echo "<select class='form-control' name='PHD_addrProv' id='PHD_addrProv' onChange=\"dochangeLocation('PHD_addrDist', '', this.value,'','')\" requireds>\n";              
              }
              echo "<option value=''>- เลือกจังหวัด -</option>\n";
              while($PHD_addrProvRow = $PHD_addrProvResult->fetch_assoc()){
                if($provID==$PHD_addrProvRow["PROVINCE_ID"]){
                   echo "<option value='$PHD_addrProvRow[PROVINCE_ID]' selected='selected'>$PHD_addrProvRow[PROVINCE_NAME]</option>" ;
                }
                else{
                   echo "<option value='$PHD_addrProvRow[PROVINCE_ID]' >$PHD_addrProvRow[PROVINCE_NAME]</option>" ;
                }   
              }
              echo "</select>";
              echo "</div>";

              echo "    <div class='col-md-2' align='right'>แขวง/อำเภอ :</div>";
              echo "    <div class='col-md-2' id='PHD_addrDist' name='PHD_addrDist'>";
              setLocationID($provID,0,0);
              $sqlID  = "PCS1_010";   
              $PHD_addrDistResult =executeSql($conn,$sqlID);
              $PHD_addrDistSize = $PHD_addrDistResult->num_rows;
              $distID = $_GET['distID'];
              if($cond=="view"){
              echo "<select class='form-control' name='PHD_addrDist' id='PHD_addrDist' onChange=\"dochangeLocation('PHD_addrSubDist', '','".$provID."',this.value,'')\" disabled>\n";
              }
              else{
              echo "<select class='form-control' name='PHD_addrDist' id='PHD_addrDist' onChange=\"dochangeLocation('PHD_addrSubDist', '','".$provID."',this.value,'')\" required>\n";
              }
              echo "<option value=''>- เลือกอำเภอ -</option>\n";
              while($PHD_addrDistRow = $PHD_addrDistResult->fetch_assoc()){
                 if($distID==$PHD_addrDistRow["DISTRICT_ID"]){
                   echo "<option value='$PHD_addrDistRow[DISTRICT_ID]' selected='selected'>$PHD_addrDistRow[DISTRICT_NAME]</option>" ;
                }
                else{
                   echo "<option value='$PHD_addrDistRow[DISTRICT_ID]' >$PHD_addrDistRow[DISTRICT_NAME]</option>" ;
                }   
              }
              echo "</select>";
              echo "</div>";

              echo "    <div class='col-md-2' align='right'>เขต/ตำบล :</div>";
              echo "    <div class='col-md-2' id='PHD_addrSubDist' name='PHD_addrSubDist'>";
              setLocationID($provID,$distID,0);
              $sqlID  = "PCS1_011";   
              $PHD_addrSubDistResult  =executeSql($conn,$sqlID);
              if($cond=="view"){
              echo "<select class='form-control' name='PHD_addrSubDist' id='PHD_addrSubDist' onChange=\"dochangeLocation('PHD_addrZipCode', '','".$provID."','".$distID."',this.value)\" disabled>\n";
              }
              else{
              echo "<select class='form-control' name='PHD_addrSubDist' id='PHD_addrSubDist' onChange=\"dochangeLocation('PHD_addrZipCode', '','".$provID."','".$distID."',this.value)\" required>\n";
              }
              echo "<option value=''>- เลือกตำบล -</option>\n";
              $subDistID = $_GET['subDistID'];
              while($PHD_addrSubDistRow = $PHD_addrSubDistResult->fetch_assoc()){
                 if($subDistID==$PHD_addrSubDistRow["SUBDISTRICT_CODE"]){
                   echo "<option value='$PHD_addrSubDistRow[SUBDISTRICT_CODE]' selected='selected'>$PHD_addrSubDistRow[SUBDISTRICT_NAME]</option> \n" ;
                }
                else{
                   echo "<option value='$PHD_addrSubDistRow[SUBDISTRICT_CODE]' >$PHD_addrSubDistRow[SUBDISTRICT_NAME]</option> \n" ;
                }   
              }
              echo "</select>";
              echo "</div>";
              echo "</div>";
              echo "<br>";
              echo "<div class='row'>";
              echo "<div class='col-md-2' align='left'>รหัสไปรษณีย์ :</div>";
              echo "<div class='col-md-2' id='PHD_addrZipCode' name='PHD_addrZipCode'>";
              setLocationID($provID,$distID,$subDistID);
              $sqlID  = "PCS1_012";   
              $PHD_addrZipCodeResult  =executeSql($conn,$sqlID);
              if($cond=="view"){
              echo "<select class='form-control' name='PHD_addrZipCode' id='PHD_addrZipCode' disabled>\n";
              }
              else{
              echo "<select class='form-control' name='PHD_addrZipCode' id='PHD_addrZipCode' required>\n";
              }
              while($PHD_addrZipCodeRow = $PHD_addrZipCodeResult->fetch_assoc()){
                if($val != '-1'){
                 echo "<option value=\"$PHD_addrZipCodeRow[zipcode]\" selected='selected'>$PHD_addrZipCodeRow[zipcode]</option> \n" ;
                }
                else{
                   echo "<option value=\"$PHD_addrZipCodeRow[zipcode]\" >$PHD_addrZipCodeRow[zipcode]</option> \n" ;
                }   
              }
              echo "</select>";
              echo "</div>";


            echo "   </div>";

         }
         else{
          echo "</select>\n";
         } 
?>


