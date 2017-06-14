<!DOCTYPE html>
<html>
<head>
<?php 
include 'config/style_config.php';
include 'config/config.php';
$conn = connOpen();

$sql = "CALL searchOrgAll()";
$result = $conn->query($sql);
$resultSize 	= $result->num_rows;
$resultNo = 1;
?>

<script type="text/javascript">
var flag=0;
$(document).ready(function(){
   // jQuery methods go here...
   $('form').submit(function(event) { 
      if(flag!=1){
        flag=1;
        // show that something is loading
        var formData = {
            'orgIDPK'                  : $('input[name=orgIDPK]').val(),
            'orgShortName'             : $('input[name=orgShortName]').val(),
            'orgLongNameTH'             : $('input[name=orgLongNameTH]').val(),
            'orgLongNameEN'             : $('input[name=orgLongNameEN]').val(),
            'orgPolPrefix'             : $('input[name=orgPolPrefix]').val(),
            'orgPolLength'             : $('input[name=orgPolLength]').val(),
            'orgReservedFrom'             : $('input[name=orgReservedFrom]').val(),
            'orgReservedFrom'             : $('input[name=orgReservedFrom]').val(),
        };
          // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'configOrgUpdate.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode      : true
        })
            // using the done promise callback
            .done(function(data) {

                // log data to the console so we can see
                console.log(data); 

                // here we will handle errors and validation messages
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
        
      }  
    });

});

</script>

</head>
<body>

<h1>Config <span>Organization Information</span></h1>

<table class="responstable">
  
  <tr>
  	<th>No.</th>
    <th data-th="Details"><span>ORG_ShortName</span></th>
    <th>ORG_LongName</th>
    <th>ORG_PolPrefix</th>
    <th>ORG_PolLength</th>
    <th>ORG_ReservedFrom</th>
    <th>ORG_ReservedTo</th>
    <th>Edit</th>
    <th>Remove</th>
  </tr>
  <?php
  $resultID;
  if ($result->num_rows > 0) {
  	while($resultRow = $result->fetch_assoc()) {
  	if(empty($_POST['orgIDPK'])){
    echo"
  	<tr>
      <td>".$resultNo++."</td>
      <td>".$resultRow["ORG_ShortName"]."</td>
      <td>".$resultRow["ORG_LongName_TH"]." - ".$resultRow["ORG_LongName_EN"]."</td>
      <td>".$resultRow["ORG_PolPrefix"]."</td>
      <td>".$resultRow["ORG_PolLength"]."</td>
      <td>".$resultRow["ORG_ReservedFrom"]."</td>
      <td>".$resultRow["ORG_ReservedTo"]."</td>
      
      <form id='form' action='configOrganization.php' method='POST'>
      <td>
          <input type='hidden' name='orgIDPK' value='".$resultRow["ORG_ID_PK"]."'>
          <button name='btn' id='btn' value='edit'><a href='#'><img src='../assets/img/config_edit.png' alt='Edit' width='30' height='30' border='0'></a></button>
      </form>
      </td>

      <td>
      <form id='form' action='configOrgUpdate.php' method='POST'>
      <input type='hidden' name='orgIDPK' value='".$resultRow["ORG_ID_PK"]."'>
      <input type='hidden' name='orgShortName' value='".$resultRow["ORG_ShortName"]."'>
      <input type='hidden' name='orgLongNameTH' value='".$resultRow["ORG_LongName_TH"]."'>
      <input type='hidden' name='orgLongNameEN' value='".$resultRow["ORG_LongName_EN"]."'>
      <input type='hidden' name='orgPolPrefix' value='".$resultRow["ORG_PolPrefix"]."'>
      <input type='hidden' name='orgPolLength' value='".$resultRow["ORG_PolLength"]."'>
      <input type='hidden' name='orgReservedFrom' value='".$resultRow["ORG_ReservedFrom"]."'>
      <input type='hidden' name='orgReservedTo' value='".$resultRow["ORG_ReservedTo"]."'>
          <button name='btn' id='btn' value='remove'><a href='#'><img src='../assets/img/config_remove.png' alt='Remove' width='30' height='30' border='0'></a></button>
      </form>
      </td>

     </tr>
    ";
    
    }
    else{
      if($_POST['orgIDPK'] == $resultRow['ORG_ID_PK']){
        echo"
        <tr>
            <form id='form' action='configOrgUpdate.php' method='POST'>
            <input type='hidden' name='orgIDPK' value='".$resultRow["ORG_ID_PK"]."'>

            <td>".$resultNo++."</td>
            <td><input name='orgShortName' id='orgShortName' value='".$resultRow["ORG_ShortName"]."' required></td>
            <td><input name='orgLongNameTH' id='orgLongNameTH' value='".$resultRow["ORG_LongName_TH"]."' required>
            <input name='orgLongNameEN' id='orgLongNameEN' value='".$resultRow["ORG_LongName_EN"]."'></td>
            <td><input name='orgPolPrefix' id='orgPolPrefix' value='".$resultRow["ORG_PolPrefix"]."' required></td>
            <td><input name='orgPolLength' id='orgPolLength' type='number' min='0' max='10' value='".$resultRow["ORG_PolLength"]."' required></td>
            <td><input name='orgReservedFrom' id='orgReservedFrom' value='".$resultRow["ORG_ReservedFrom"]."' required></td>
            <td><input name='orgReservedTo' id='orgReservedTo' value='".$resultRow["ORG_ShortName"]."' required></td>
            <td>  
            <button name='btn' id='btn' value='save'><a href='#'><img src='#.png' alt='Cancel' width='30' height='30' border='0'></a></button>
            </form>
            <br/>
            <a href='configOrganization.php'>
            <img src='#.png' alt='Cancel' width='30' height='30' border='0'>
            </a>
            </td>
            <td></td>
        ";  
      }
      else
      {
        echo"
        <tr>
            <td>".$resultNo++."</td>
            <td>".$resultRow["ORG_ShortName"]."</td>
            <td>".$resultRow["ORG_LongName_TH"]." - ".$resultRow["ORG_LongName_EN"]."</td>
            <td>".$resultRow["ORG_PolPrefix"]."</td>
            <td>".$resultRow["ORG_PolLength"]."</td>
            <td>".$resultRow["ORG_ReservedFrom"]."</td>
            <td>".$resultRow["ORG_ReservedTo"]."</td>
            <td></td>
            <td></td>
        ";  
      }
    }
      $resultID = $resultRow["ORG_ID_PK"]+1;
  	}
  }
  else{


  }

  if(empty($_POST['orgIDPK'])){
   ?>  
      <tr>
      <form id="form" action="configOrgUpdate.php" method="POST">
      <td><?php echo $resultNo++; ?></td>
      <input type="hidden" name="orgIDPK" value="<?php echo $resultID; ?>">
      <td><input type="text" name="orgShortName" id="orgShortName" placeholder="Short Name" required></td>
      <td><input type="text" name="orgLongNameTH" id="orgLongNameTH" placeholder="Long Name in Thai" required>
        <input type="text" name="orgLongNameEN" id="orgLongNameEN" placeholder="Long Name in Eng"></td>
      <td><input type="text" name="orgPolPrefix" id="orgPolPrefix" placeholder="Prefix" required></td>
      <td><input name="orgPolLength" id="orgPolLength" type="number" min="0" max="10" required></td>
      <td><input name="orgReservedFrom" id="orgReservedFrom" placeholder="Reserved From" required></td>
      <td><input name="orgReservedTo" id="orgReservedTo" placeholder="Reserved To" required></td>
      <td>
        <button name="btn" id="btn" value="insert"><img src="../assets/img/config_add.png" alt="Add" width="30" height="30" border="0"></button>
      </td>
      <td>
        <a href="#"><img src="../assets/img/config_reset.png" alt="Reset" width="30" height="30" border="0"></a>
      </td>
      </form>
      </tr>
     <?php    
    }  
  ?>



  

</table>
</body>	
<footer>
<?php
	$conn = connClose($conn);
?>
</footer>

</html>