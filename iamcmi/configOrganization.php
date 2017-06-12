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
            'orgPolPrefix'             : $('input[name=orgPolPrefix]').val(),
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
    <th>ORG_PolPrefix</th>
    <th>ORG_PolLength</th>
    <th>ORG_UpdateDate</th>
    <th>Edit</th>
    <th>Remove</th>
  </tr>
  <?php
  $resultID;
  if ($result->num_rows > 0) {
  	while($resultRow = $result->fetch_assoc()) {
  	echo"
  	<tr>
	    <td>".$resultNo++."</td>
	    <td>".$resultRow["ORG_ShortName"]."</td>
	    <td>".$resultRow["ORG_PolPrefix"]."</td>
  		<td>".$resultRow["ORG_PolLength"]."</td>
  		<td>".$resultRow["ORG_UpdateDate"]."</td>
  		<td>
    			<a href='#'><img src='../assets/img/config_edit.png' alt='Edit' width='30' height='30' border='0'></a>
   	  <td>
    			<a href='#'><img src='../assets/img/config_remove.png' alt='Remove' width='30' height='30' border='0'></a>
  		</td>
	   </tr>
  	";
      $resultID = $resultRow["ORG_ID_PK"]+1;
  	}
  }
  else{

  }
  ?>

  <tr>
  	<form id="form" action="configOrgUpdate.php" method="POST">
    <td><?php echo $resultNo++; ?></td>
    <input type="hidden" name="orgIDPK" value="<?php echo $resultID; ?>">
    <td><div id="orgShortNamediv"><input type="text" name="orgShortName" id="orgShortName" placeholder="Short Name"></div></td>
    <td><div id="orgPolPrefixdiv"><input type="text" name="orgPolPrefix" id="orgPolPrefix" placeholder="Prefix"></div></td>
    <td><input type="text" name="#"></td>
    <td><input type="text" name="#"></td>
  	<td>
      <button id="btn" ><img src="../assets/img/config_add.png" alt="Add" width="30" height="30" border="0"></button>
	  </td>
  	<td>
  		<a href="#"><img src="../assets/img/config_reset.png" alt="Reset" width="30" height="30" border="0"></a>
  	</td>
    </form>
   
  </tr>

</table>
</body>	
<footer>
<?php
	$conn = connClose($conn);
?>
</footer>

</html>