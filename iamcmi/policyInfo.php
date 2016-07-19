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

         if ($data=='perCardType') { 
              $sqlID  = "PCS1_005";   
              $perCardTypeResult  =executeSql($conn,$sqlID);
              echo "<select class='form-control' name='perCardType' id='perCardType' >\n";
              echo "<option value='0'>- เลือกประเภทบัตร -</option>\n";
              while($perCardTypeRow = $perCardTypeResult->fetch_assoc()){
                   if($val==$perCardTypeRow["PER_CardType_ID_PK"]){
                    // echo "Please update file for perCardType list";
                   echo "<option value='$perCardTypeRow[PER_CardType_ID_PK]' selected='selected'>$perCardTypeRow[PER_CardType_Name_TH]</option>" ; 
                   }
                   else{
                   echo "<option value='$perCardTypeRow[PER_CardType_ID_PK]' >$perCardTypeRow[PER_CardType_Name_TH]</option>" ;
                   }
              }
             
         } else if ($data=='addrContType1') { 
             $sqlID  = "PCS1_004";   
              $addrContType1Result =executeSql($conn,$sqlID);
              echo "<select class='form-control' name='addrContType1' id='addrContType1' >\n";
              echo "<option value='0'>- เลือกประเภทเบอร์ติดต่อ -</option>\n";
              while($addrContType1Row = $addrContType1Result->fetch_assoc()){
                if($val==$addrContType1Row["ADDR_ContType_ID_PK"]){
                  echo "<option value='$addrContType1Row[ADDR_ContType_ID_PK]' selected='selected'>$addrContType1Row[ADDR_ContTypeName_TH]</option>" ;
                }
                else{   
                echo "<option value='$addrContType1Row[ADDR_ContType_ID_PK]' >$addrContType1Row[ADDR_ContTypeName_TH]</option>" ;
                }
             } 
         } else if ($data=='perSalu') { 
             $sqlID  = "PCS1_018";   
              $perSaluResult =executeSql($conn,$sqlID);
              echo "<select class='form-control' name='perSalu' id='perSalu' >\n";
              echo "<option value='0'>- เลือกคำนำหน้าชื่อ -</option>\n";
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
              echo "<select class='form-control' name='polAGTIDFK' id='polAGTIDFK' >\n";
              echo "<option value='0'>- เลือกรหัสตัวแทน -</option>\n";
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