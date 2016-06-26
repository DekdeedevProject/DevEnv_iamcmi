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
              $sqlID = "PCS1_013";
              $tarPowerResult = executeSql($conn,$sqlID);
              $tarPowerSize = $tarPowerResult->num_rows;
              echo "<select class='form-control' name='tarPower' id='tarPower' onChange=\"dochangeTariff('tarBody', this.value)\">\n";
              echo "<option value='0'>- เลือกการขับเคลื่อน -</option>\n";
              while($tarPowerRow = $tarPowerResult->fetch_assoc()){
                if($tarBody==$tarPowerRow["TAR_PowerName_TH"]){
                   echo "<option value='$tarPowerRow[TAR_PowerName_TH]' selected='selected' >$tarPowerRow[TAR_PowerName_TH]</option>" ;
                }
                else{
                   echo "<option value='$tarPowerRow[TAR_PowerName_TH]' >$tarPowerRow[TAR_PowerName_TH]</option>" ;
                }
                  
              }
         } else if ($data=='tarBody') {
              setTariffID("","","","");
              $sqlID = "PCS1_014";
              $tarBodyResult = executeSql($conn,$sqlID);
              echo "<select class='form-control' name='tarBody' id='tarBody' onChange=\"dochangeTariff('tarSubBody', this.value)\">\n";
              echo "<option value='0'>- เลือกประเภท -</option>\n";
              while($tarBodyRow = $tarBodyResult->fetch_assoc()){
                if($val==$tarBodyRow["TAR_BodyName_TH"]){
                 echo "<option value='$tarBodyRow[TAR_BodyName_TH]' selected='selected' >$tarBodyRow[TAR_BodyName_TH]</option>" ;
                }
                else{
                  echo "<option value='$tarBodyRow[TAR_BodyName_TH]' >$tarBodyRow[TAR_BodyName_TH]</option>" ;
                }
                   
              }
         } else if ($data=='tarSubBody') {
              setTariffID("",$tarBody,"","");
              $sqlID = "PCS1_015";
              $tarSubBodyResult = executeSql($conn,$sqlID);
              $tarSubBody = trim($_GET['tarSubBody']);
             echo "<select class='form-control' name='tarSubBody' id='tarSubBody' onChange=\"dochangeTariff('tarUsage', this.value)\">\n";
              echo "<option value='0'>- เลือกประเภทย่อย -</option>\n";
              
             while($tarSubBodyRow = $tarSubBodyResult->fetch_assoc()){   
                if($tarSubBody==$tarSubBodyRow["TAR_SubBodyName_TH"]){
                 echo "<option value='$tarSubBodyRow[TAR_SubBodyName_TH]' selected='selected' >$tarSubBodyRow[TAR_SubBodyName_TH]</option>" ;
                }
                else{
                  echo "<option value='$tarSubBodyRow[TAR_SubBodyName_TH]' >$tarSubBodyRow[TAR_SubBodyName_TH]</option>" ;
                }    
              }
         }
         else if ($data=='tarUsage') {
              setTariffID("",$tarBody,$tarSubBody,"");
              $sqlID = "PCS1_016";
              $tarUsageResult = executeSql($conn,$sqlID);
              $tarUsage = trim($_GET['tarUsage']);
              echo "<select class='form-control' name='tarUsage' id='tarUsage' onChange=\"dochangeTariff('tarVehCodePK', this.value)\">\n";
              echo "<option value='0'>- เลือกการใช้งาน -</option>\n";
              while($tarUsageRow = $tarUsageResult->fetch_assoc()){
                if($tarUsage==$tarUsageRow["TAR_UsageName_TH"]){
                   echo "<option value=\"$tarUsageRow[TAR_UsageName_TH]\" selected='selected'>$tarUsageRow[TAR_UsageName_TH]</option> \n" ;
                }
                else{  
                   echo "<option value=\"$tarUsageRow[TAR_UsageName_TH]\" >$tarUsageRow[TAR_UsageName_TH]</option> \n" ;
                }   
              }
         }
         else if ($data=='tarVehCodePK'){
              setTariffID("",$tarBody,$tarSubBody,$tarUsage);
              $sqlID = "PCS1_017";
              $tarVehCodeResult = executeSql($conn,$sqlID);
              $tarVehCodeRow = $tarVehCodeResult->fetch_assoc();
              $tarVehCodePK=$tarVehCodeRow["TAR_VehCode_PK"];
              $tarIDPK=$tarVehCodeRow["TAR_ID_PK"];
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
                  <input type="text" class="form-control" placeholder="Vehical Code" id="tarVehCodePK" name="tarVehCodePK" value='<?php echo $tarVehCodePK ?>' required>
                  <input type="hidden" class="form-control" id="tarIDPK" name="tarIDPK" value='<?php echo $tarIDPK ?>' >
                </div>
              </div>  
              <br>
              <div class="row">
                <div class="col-md-2" align="left">ความจุ :</div>
                <div class="col-md-2">
                  <input type="text" class="form-control" id="vehCapacity" name="vehCapacity" value=""
                    placeholder="ความจุ" required>
                </div>
                <div class="col-md-2" align="right">น้ำหนัก :</div>
                <div class="col-md-2">
                  <input type="text" class="form-control" id="vehWeight" name="vehWeight" value=""
                    placeholder="น้ำหนัก" required>
                </div>
                <div class="col-md-2" align="right">จำนวนที่นั่ง :</div>
                <div class="col-md-2">
                  <input type="text" class="form-control" id="vehSeat" name="vehSeat" value=""
                    placeholder="จำนวนที่นั่ง" required>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-2" align="left">เลขตัวถัง :</div>
                <div class="col-md-2">
                  <input type="text" class="form-control" id="vehChassisNum" name="vehChassisNum" value=""
                    placeholder="เลขตัวถัง" required>
                </div>
                <div class="col-md-2" align="right">ทะเบียนรถ:</div>
                <div class="col-md-2">
                  <input type="text" class="form-control" id="vehLicenseNum" name="vehLicenseNum" value=""
                    placeholder="ทะเบียนรถ" required>
                </div>
                
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
                  <input type="text" class="form-control" id="premNet" name="premNet" value='<?php echo $premNet ?>'
                    placeholder="เบี้ยสุทธิ" required>
                  <input type="hidden" class="form-control" id="premStdNet" name="premStdNet" value='<?php echo $premStdNet ?>' >  
                </div>
                <div class="col-md-2" align="right">ภาษีมูลค่าเพิ่ม :</div>
                <div class="col-md-2">
                  <input type="text" class="form-control" id="premVat" name="premVat" value='<?php echo $premVat ?>'
                    placeholder="ภาษีมูลค่าเพิ่ม" required>
                  <input type="hidden" class="form-control" id="premStdVat" name="premStdVat" value='<?php echo $premStdVat ?>'>  
                </div>
                <div class="col-md-2" align="right">อากรสแตมป์ :</div>
                <div class="col-md-2">
                  <input type="text" class="form-control" id="premStampDuty" name="premStampDuty" value='<?php echo $premStampDuty ?>'
                    placeholder="อากรสแตมป์" required>
                  <input type="hidden" class="form-control" id="premStdStampDuty" name="premStdStampDuty" value='<?php echo $premStdStampDuty ?>'>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-2" align="left">เบี้ยรวม:</div>
                <div class="col-md-2">
                  <input type="text" class="form-control" id="premTotal" name="premTotal" value='<?php echo $premTotal ?>'
                    placeholder="เบี้ยรวม" required>
                  <input type="hidden" class="form-control" id="premStdTotal" name="premStdTotal" value='<?php echo $premStdTotal ?>'>    
                </div>        
              </div>
              <?php
         }
         else{
          echo "</select>\n";
         } 
?>