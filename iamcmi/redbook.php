<?php
    header("content-type: text/html; charset=utf-8");
    header ("Expires: Wed, 21 Aug 2013 13:13:13 GMT");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");

    
    include 'config/config.php'; 
    $conn   = connOpen();
    $data = $_GET['data'];
    $val = $_GET['val'];    
    $redMake = $_GET['redMake'];
    $redModel = $_GET['redModel'];
    $redYear = $_GET['redYear'];
    $redDesc = $_GET['redDesc'];

         if ($data=='redMake') { 
              $sqlID = "PCS1_006";
              $redMakeResult = executeSql($conn,$sqlID);
              echo "<select class='form-control' name='redMake' id='redMake' onChange=\"dochangeRedbook('redModel', '', this.value, '', '', '')\">\n";
              echo "<option value='0'>- เลือกยี่ห้อ -</option>\n";
              while($redMakeRow = $redMakeResult->fetch_assoc()){
                echo "<option value='$redMakeRow[RED_Make]' >$redMakeRow[RED_Make]</option>" ;
              }
         } else if ($data=='redModel') {
              setRedbookID($redMake,$redModel,$redYear,$redDesc);
              $sqlID = "PCS1_007";
              $redModelResult = executeSql($conn,$sqlID);
              echo "<select class='form-control' name='redModel' id='redModel' onChange=\"dochangeRedbook('redYear', '', '".$redMake."', this.value, '', '')\">\n";
              echo "<option value='0'>- เลือกรุ่น -</option>\n";
              while($redModelRow = $redModelResult->fetch_assoc()){
                  echo "<option value='$redModelRow[RED_Model]' >$redModelRow[RED_Model]</option>" ;
              }
         } else if ($data=='redYear') {
              setRedbookID($redMake,$redModel,$redYear,$redDesc);
              $sqlID = "PCS1_008";
              $redYearResult = executeSql($conn,$sqlID);
              echo "<select class='form-control' name='redYear' id='redYear' onChange=\"dochangeRedbook('redDesc', '', '".$redMake."', '".$redModel."', this.value,'')\">\n";
              echo "<option value='0'>- เลือกปี -</option>\n";
              while($redYearRow = $redYearResult->fetch_assoc()){
                 echo "<option value='$redYearRow[RED_Year]' >$redYearRow[RED_Year]</option> \n" ;
              }
         }
         else if ($data=='redDesc') {
              setRedbookID($redMake,$redModel,$redYear,$redDesc);
              $sqlID = "PCS1_009";
              $redDescResult = executeSql($conn,$sqlID);
              echo "<select class='form-control' name='redDesc' id='redDesc' onChange=\"dochangeRedbook('redKey', '', '".$redMake."', '".$redModel."', '".$redYear."',this.value)\">\n";
              echo "<option value='0'>- เลือกรุ่นย่อย -</option>\n";
              while($redDescRow = $redDescResult->fetch_assoc()){
                 echo "<option value=\"$redDescRow[RED_Desc]\" >$redDescRow[RED_Desc]</option> \n" ;   
              }
         }
         else if ($data=='redKey') {
              setRedbookID($redMake,$redModel,$redYear,$redDesc);
              $sqlID = "PCS1_019";
              $redKeyResult = executeSql($conn,$sqlID);
              $redKeyRow = $redKeyResult->fetch_assoc();
              echo "<input type='text' class='form-control' name='redKey' id='redKey' value=\"$redKeyRow[RED_Key] \" readonly>\n";
              echo "<div class='col-md-2' align='right'><a href='#'>+Add+</a></div>";
         }
         else if ($data=='vehREDKEY') {
              $redKey = $val;
              setRedKey($redKey);
              $sqlID = "PCS1_024";
              $redResult = executeSql($conn,$sqlID);
              $redRow = $redResult->fetch_assoc();
              
              $redMake=$redRow["RED_Make"];
              $redModel=$redRow["RED_Model"];
              $redYear=$redRow["RED_Year"];
              $redDesc=$redRow["RED_Desc"];
         

              echo "<div class='row'>";
              echo "<div class='col-md-2' align='left'>ยี่ห้อ :</div>";
              echo "<div class='col-md-2' id='redMake' name='redMake'>";
              $sqlID = "PCS1_006";
              $redMakeResult = executeSql($conn,$sqlID);
              echo "<select class='form-control' name='redMake' id='redMake' onChange=\"dochangeRedbook('redModel', '', this.value, '', '', '')\">\n";
              echo "<option value='0'>- เลือกยี่ห้อ -</option>\n";
              while($redMakeRow = $redMakeResult->fetch_assoc()){
                if($redMake==$redMakeRow["RED_Make"]){
                  echo "<option value='$redMakeRow[RED_Make]' selected='selected'>$redMakeRow[RED_Make]</option>" ;
                }
                else{
                  echo "<option value='$redMakeRow[RED_Make]' >$redMakeRow[RED_Make]</option>" ;
                } 
              }
              echo "</select>";
              echo "</div>";

              echo "<div class='col-md-2' align='right'>รุ่นรถ :</div>";
              echo "<div class='col-md-2' id='redModel' name='redModel'>";
              setRedbookID($redMake,$redModel,$redYear,$redDesc);
              $sqlID = "PCS1_007";
              $redModelResult = executeSql($conn,$sqlID);
              echo "<select class='form-control' name='redModel' id='redModel' onChange=\"dochangeRedbook('redYear', '', '".$redMake."', this.value, '', '')\">\n";
              echo "<option value='0'>- เลือกรุ่น -</option>\n";
              while($redModelRow = $redModelResult->fetch_assoc()){
                if($redModel==$redModelRow["RED_Model"]){
                  echo "<option value='$redModelRow[RED_Model]' selected='selected'>$redModelRow[RED_Model]</option>" ;
                }
                else{
                  echo "<option value='$redModelRow[RED_Model]' >$redModelRow[RED_Model]</option>" ;
                } 
              }
              echo "</select>";
              echo "</div>";

              echo "<div class='col-md-2' align='right'>ปี :</div>";
              echo "<div class='col-md-2' id='redYear' name='redYear'>";
              setRedbookID($redMake,$redModel,$redYear,$redDesc);
              $sqlID = "PCS1_008";
              $redYearResult = executeSql($conn,$sqlID);
              echo "<select class='form-control' name='redYear' id='redYear' onChange=\"dochangeRedbook('redDesc', '', '".$redMake."', '".$redModel."', this.value,'')\">\n";
              echo "<option value='0'>- เลือกปี -</option>\n";
              while($redYearRow = $redYearResult->fetch_assoc()){
                if($redYear==$redYearRow["RED_Year"]){
                  echo "<option value='$redYearRow[RED_Year]' selected='selected'>$redYearRow[RED_Year]</option>" ;
                }
                else{
                 echo "<option value='$redYearRow[RED_Year]' >$redYearRow[RED_Year]</option> \n" ;
                } 
              }    
              echo "</select>";    
              echo "</div>";
              echo "</div>";
              echo "<br>";

              echo "<div class='row'>";
              echo "<div class='col-md-2' align='left'>รายละเอียดรถ :</div>";
              echo "<div class='col-md-2' id='redDesc' name='redDesc'>";
              setRedbookID($redMake,$redModel,$redYear,$redDesc);
              $sqlID = "PCS1_009";
              $redDescResult = executeSql($conn,$sqlID);
              echo "<select class='form-control' name='redDesc' id='redDesc' onChange=\"dochangeRedbook('redKey', '', '".$redMake."', '".$redModel."', '".$redYear."',this.value)\">\n";
              echo "<option value='0'>- เลือกรุ่นย่อย -</option>\n";
              while($redDescRow = $redDescResult->fetch_assoc()){
                if($redDesc==$redDescRow["RED_Desc"]){
                  echo "<option value='$edDescRow[RED_Desc]' selected='selected'>$redDescRow[RED_Desc]</option>" ;
                }
                else{
                 echo "<option value=\"$redDescRow[RED_Desc]\" >$redDescRow[RED_Desc]</option> \n" ;   
                }
              }
              echo "</select>";
              echo "</div>";
                
              echo "<div class='col-md-2' align='right'>รหัสรุ่นรถ :</div>";
              echo "<div class='col-md-2' id='redKey'>";
              echo "<input type='text' class='form-control' id='redKey' name='redKey' value=\"$val\" required randonly>";
              echo "<div class='col-md-2' align='right'>";
              echo "<a href='javascript:void(0);' NAME='Add Redbook' title=' My title here '  
                          onClick=' window.open('addRedbook.php','','width=550,height=170,left=150,top=200,toolbar=1,status=1')'> 
                          +add+
                          </a>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
              echo "<br>";
              
         }

         else{
          echo "</select>\n";
         } 
?>