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
    $tarBody = trim($_GET['tarBody']);
    $tarSubBody = trim($_GET['tarSubBody']);
    $tarUsage = trim($_GET['tarUsage']);
         if ($data=='tarPower') { 
              // $sqlID = "PCS1_013";
              // $tarPowerResult = executeSql($conn,$sqlID);
              // $tarPowerSize = $tarPowerResult->num_rows;
              // echo "<select class='form-control' name='tarPower' id='tarPower' onChange=\"dochangeTariff('tarBody', this.value, '', '', '')\">\n";
              // echo "<option value='0'>- เลือกการขับเคลื่อน -</option>\n";
              // while($tarPowerRow = $tarPowerResult->fetch_assoc()){
              //   echo "<option value='$tarPowerRow[TAR_PowerName_TH]' >$tarPowerRow[TAR_PowerName_TH]</option>" ;
              // }
         } else if ($data=='tarBody') {
              setTariffID("","","","");
              $sqlID = "PCS1_014";
              $tarBodyResult = executeSql($conn,$sqlID);
              echo "<select class='form-control' name='tarBody' id='tarBody' onChange=\"dochangeTariff('tarSubBody', '', this.value, '', '')\">\n";
              echo "<option value='0'>- เลือกประเภท -</option>\n";
              while($tarBodyRow = $tarBodyResult->fetch_assoc()){
                echo "<option value='$tarBodyRow[TAR_BodyName_TH]' >$tarBodyRow[TAR_BodyName_TH]</option>" ;
              }
         } else if ($data=='tarSubBody') {
              setTariffID("",$tarBody,"","");
              $sqlID = "PCS1_015";
              $tarSubBodyResult = executeSql($conn,$sqlID);
              echo "<select class='form-control' name='tarSubBody' id='tarSubBody' onChange=\"dochangeTariff('tarUsage', '', '".$tarBody."', this.value, '')\">\n";
              echo "<option value='0'>- เลือกประเภทย่อย -</option>\n";
              while($tarSubBodyRow = $tarSubBodyResult->fetch_assoc()){   
                echo "<option value='$tarSubBodyRow[TAR_SubBodyName_TH]' >$tarSubBodyRow[TAR_SubBodyName_TH]</option>" ;
              }
         }
         else if ($data=='tarUsage') {
              setTariffID("",$tarBody,$tarSubBody,"");
              $sqlID = "PCS1_016";
              $tarUsageResult = executeSql($conn,$sqlID);
              echo "<select class='form-control' name='tarUsage' id='tarUsage' onChange=\"dochangeTariff('vehTARvehCodeFK', '', '".$tarBody."', '".$tarSubBody."', this.value)\">\n";
              echo "<option value='0'>- เลือกการใช้งาน -</option>\n";
              while($tarUsageRow = $tarUsageResult->fetch_assoc()){
                echo "<option value=\"$tarUsageRow[TAR_UsageName_TH]\" >$tarUsageRow[TAR_UsageName_TH]</option> \n" ;
              }
         }
         else if ($data=='tariffInfo') {
              setTariffID($val,"","","");
              $sqlID = "PCS1_013";
              $tarResult = executeSql($conn,$sqlID);
              $tarRow = $tarResult->fetch_assoc();
              $tarBody = $tarRow["TAR_BodyName_TH"];
              $tarSubBody = $tarRow["TAR_SubBodyName_TH"];
              $tarUsage = $tarRow["TAR_UsageName_TH"];
              echo "<div class='row'>";
              echo "<div class='col-md-2' align='left'>ประเภท :</div>";
              echo "<div class='col-md-2' name='tarBody' id='tarBody'>";
 
              setTariffID("","","","");
              $sqlID = "PCS1_014";
              $tarBodyResult = executeSql($conn,$sqlID);
              echo "<select class='form-control' name='tarBody' id='tarBody' onChange=\"dochangeTariff('tarSubBody', '', this.value, '', '')\">\n";
              echo "<option value='0'>- เลือกประเภท -</option>\n";
              $tarBody = $tarRow["TAR_BodyName_TH"];
              while($tarBodyRow = $tarBodyResult->fetch_assoc()){
                if(trim($tarBody)==trim($tarBodyRow["TAR_BodyName_TH"])){
                echo "<option value='$tarBodyRow[TAR_BodyName_TH]' selected='selected'>$tarBodyRow[TAR_BodyName_TH]</option>" ;
                }
                else{
                echo "<option value='$tarBodyRow[TAR_BodyName_TH]' >$tarBodyRow[TAR_BodyName_TH]</option>" ;
                } 
              }  


              echo  "</select>"; 
              echo  "</div>";
              echo  "<div class='col-md-2' align='right'>ประเภทย่อย :</div>";
              echo  "<div class='col-md-2' name='tarSubBody' id='tarSubBody' >";
              setTariffID("",$tarBody,"","");
              $sqlID = "PCS1_015";
              $tarSubBodyResult = executeSql($conn,$sqlID);
              $tarSubBody = $tarRow["TAR_SubBodyName_TH"];
              echo "<select class='form-control' name='tarSubBody' id='tarSubBody' onChange=\"dochangeTariff('tarUsage', '', '".$tarBody."', this.value, '')\">\n";
              echo "<option value='0'>- เลือกประเภทย่อย -</option>\n";
              while($tarSubBodyRow = $tarSubBodyResult->fetch_assoc()){   
                if(trim($tarSubBody)==trim($tarSubBodyRow["TAR_SubBodyName_TH"])){
                echo "<option value='$tarSubBodyRow[TAR_SubBodyName_TH]' selected='selected'>$tarSubBodyRow[TAR_SubBodyName_TH]</option>" ;
                }
                else{
                  echo "<option value='$tarSubBodyRow[TAR_SubBodyName_TH]' >$tarSubBodyRow[TAR_SubBodyName_TH]</option>" ;
                } 
              }
              echo "</select>";
              echo "</div>";
              
              echo "<div class='col-md-2' align='right'>การใช้งาน :</div>";
              echo "<div class='col-md-2' name='tarUsage' id='tarUsage'>";
              setTariffID("",$tarBody,$tarSubBody,"");
              $sqlID = "PCS1_016";
              $tarUsageResult = executeSql($conn,$sqlID);
              $tarUsage = $tarRow["TAR_UsageName_TH"];
              echo "<select class='form-control' name='tarUsage' id='tarUsage' onChange=\"dochangeTariff('vehTARvehCodeFK', '', '".$tarBody."', '".$tarSubBody."', this.value)\">\n";
              echo "<option value='0'>- เลือกการใช้งาน -</option>\n";
              while($tarUsageRow = $tarUsageResult->fetch_assoc()){
                if(trim($tarUsage)==trim($tarUsageRow["TAR_UsageName_TH"])){
                echo "<option value=\"$tarUsageRow[TAR_UsageName_TH]\" selected='selected'>$tarUsageRow[TAR_UsageName_TH]</option> \n" ;
                }
                else{
                echo "<option value=\"$tarUsageRow[TAR_UsageName_TH]\" >$tarUsageRow[TAR_UsageName_TH]</option> \n" ;
                } 
              }  
              echo "</div>";    
              echo "</div>";
         }
         else if ($data=='vehTARvehCodeFK'){
              setTariffID("",$tarBody,$tarSubBody,$tarUsage);
              $sqlID = "PCS1_017";
              $tarVehCodeResult = executeSql($conn,$sqlID);
              $tarVehCodeRow = $tarVehCodeResult->fetch_assoc();
              $tarVehCodePK=$tarVehCodeRow["TAR_VehCode_PK"];
              $vehTARIDFK=$tarVehCodeRow["TAR_ID_PK"];
              $premNet=sprintf('%0.2f', $tarVehCodeRow["TAR_Prem"]);
              $premVat=sprintf('%0.2f', $tarVehCodeRow["TAR_Vat"]);
              $premStampDuty=sprintf('%0.2f', $tarVehCodeRow["TAR_StampDuty"]);
              $premTotal=sprintf('%0.2f', $tarVehCodeRow["TAR_TotalPrem"]);
              $premStdNet=$premNet;
              $premStdVat=$premVat;
              $premStdStampDuty=$premStampDuty;
              $premStdTotal=$premTotal;
              ?>
              <div class="row" >
                <div class="col-md-2" align="left">รหัสรถ :</div>
                <div class="col-md-2" >
                  
                  <input type="hidden" class="form-control" id="vehTARIDFK" name="vehTARIDFK" value='<?php echo $vehTARIDFK ?>' required readonly>
                  <input type="text" class="form-control" placeholder="รหัสรถ" id="vehTARvehCodeFK" name="vehTARvehCodeFK" value='<?php echo $tarVehCodePK ?>' required readonly>
                  
                </div>
              </div>  
              <br>
              </div>
              <br>
              <div class="row titleInsured">
                <div class="col-md-12" align="left">
                  <div>
                    <h4 style="display: -webkit-inline-box;padding-left: 5px; color:white;"><b>เบี้ยประกัน</b></h4>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-2" align="left">เบี้ยสุทธิ :</div>
                <div class="col-md-2">
                  <input type="text" class="form-control" id="premNet" name="premNet" value='<?php echo $premNet ?>' readonly required>
                  <input type="hidden" class="form-control" id="premStdNet" name="premStdNet" value='<?php echo $premStdNet ?>' >  
                </div>
                <div class="col-md-2" align="right">ภาษีมูลค่าเพิ่ม :</div>
                <div class="col-md-2">
                  <input type="text" class="form-control" id="premVat" name="premVat" value='<?php echo $premVat ?>' required readonly>
                  <input type="hidden" class="form-control" id="premStdVat" name="premStdVat" value='<?php echo $premStdVat ?>'>  
                </div>
                <div class="col-md-2" align="right">อากรสแตมป์ :</div>
                <div class="col-md-2">
                  <input type="text" class="form-control" id="premStampDuty" name="premStampDuty" value='<?php echo $premStampDuty ?>' readonly required>
                  <input type="hidden" class="form-control" id="premStdStampDuty" name="premStdStampDuty" value='<?php echo $premStdStampDuty ?>'>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-2" align="left">เบี้ยรวม:</div>
                <div class="col-md-2">
                  <input type="text" class="form-control" id="premTotal" name="premTotal" value='<?php echo $premTotal ?>' readonly required>
                  <input type="hidden" class="form-control" id="premStdTotal" name="premStdTotal" value='<?php echo $premStdTotal ?>'>    
                </div>        
              </div>
              <?php
         }
         else{
          echo "</select>\n";
         } 
?>