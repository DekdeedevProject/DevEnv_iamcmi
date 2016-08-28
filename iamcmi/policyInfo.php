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
    $usrName = $_GET['usrName'];
    $usrRole = $_GET['usrRole'];
    $cond = "";
    if(!empty($_GET['cond'])){
      $cond = $_GET['cond'];
    }

         if ($data=='PHD_perCardType') { 
              $sqlID  = "PCS1_005";   
              $perCardTypeResult  =executeSql($conn,$sqlID);
              if($cond=="view"){
              echo "<select class='form-control' name='PHD_perCardType' id='PHD_perCardType' disabled>\n";
              }
              else{
              echo "<select class='form-control' name='PHD_perCardType' id='PHD_perCardType' required>\n";
              }
              echo "<option value=''>- เลือกประเภทบัตร -</option>\n";
              while($perCardTypeRow = $perCardTypeResult->fetch_assoc()){
                   if($val==$perCardTypeRow["PER_CardType_ID_PK"]){
                    // echo "Please update file for perCardType list";
                   echo "<option value='$perCardTypeRow[PER_CardType_ID_PK]' selected='selected'>$perCardTypeRow[PER_CardType_Name_TH]</option>" ; 
                   }
                   else{
                   echo "<option value='$perCardTypeRow[PER_CardType_ID_PK]' >$perCardTypeRow[PER_CardType_Name_TH]</option>" ;
                   }
              }
             
         } else if ($data=='PHD_addrContType1') { 
              $sqlID  = "PCS1_004";
              $addrContType1Result =executeSql($conn,$sqlID);
              if($cond=="view"){
              echo "<select class='form-control' name='PHD_addrContType1' id='PHD_addrContType1' disabled>\n";
              }
              else{
              echo "<select class='form-control' name='PHD_addrContType1' id='PHD_addrContType1' required>\n";
              }
              echo "<option value=''>- เลือกประเภทเบอร์ติดต่อ -</option>\n";
              while($addrContType1Row = $addrContType1Result->fetch_assoc()){
                if($val==$addrContType1Row["ADDR_ContType_ID_PK"]){
                  echo "<option value='$addrContType1Row[ADDR_ContType_ID_PK]' selected='selected'>$addrContType1Row[ADDR_ContTypeName_TH]</option>" ;
                }
                else{   
                echo "<option value='$addrContType1Row[ADDR_ContType_ID_PK]' >$addrContType1Row[ADDR_ContTypeName_TH]</option>" ;
                }
             } 
         } else if ($data=='PHD_perSalu') { 
             $sqlID  = "PCS1_018";   
              $perSaluResult =executeSql($conn,$sqlID);
              if($cond=="view"){
              echo "<select class='form-control' name='PHD_perSalu' id='PHD_perSalu' disabled>\n";
              }
              else{
              echo "<select class='form-control' name='PHD_perSalu' id='PHD_perSalu' required>\n";
              }
              echo "<option value=''>- เลือกคำนำหน้าชื่อ -</option>\n";
              while($perSaluRow = $perSaluResult->fetch_assoc()){
                if($val==$perSaluRow["PER_Salu_ID_PK"]){
                 echo "<option value='$perSaluRow[PER_Salu_ID_PK]' selected='selected'>$perSaluRow[PER_Salu_TH]</option>" ;
                }
                else{   
                echo "<option value='$perSaluRow[PER_Salu_ID_PK]' >$perSaluRow[PER_Salu_TH]</option>" ;
                }
                
              } 
         } 
         else if ($data=='polAGTIDFK') { 
              setUser($usrName,$usrRole);
              $sqlID  = "PCS1_021";   
              $aCodeResult =executeSql($conn,$sqlID);
              
              if($cond=="view"){
                echo "<select class='form-control' name='polAGTIDFK' id='polAGTIDFK' disabled>\n";
              }
              else{
                echo "<select class='form-control' name='polAGTIDFK' id='polAGTIDFK' required>\n";
              }
              echo "<option value=''>- เลือกรหัสตัวแทน -</option>\n";
              while($aCodeRow = $aCodeResult->fetch_assoc()){
                if($val==$aCodeRow["AGT_ID_PK"]){
                 echo "<option value='$aCodeRow[AGT_ID_PK]' selected='selected'>$aCodeRow[AGT_Code] (agtIDPK:$aCodeRow[AGT_ID_PK])</option>" ;
                }
                else{   
                echo "<option value='$aCodeRow[AGT_ID_PK]' >$aCodeRow[AGT_Code] (agtIDPK:$aCodeRow[AGT_ID_PK])</option>" ;
                }
                
              } 
         }
         else{
          echo "</select>\n";
         } 


?>