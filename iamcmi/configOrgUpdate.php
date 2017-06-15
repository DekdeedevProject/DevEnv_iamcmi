
<?php 
require_once('config/config.php'); 
// session_start();
$conn = connOpen();
// $updatedBy=$_SESSION["usrName"];


// if( $_REQUEST["orgShortName"] ){

//    $orgShortName = $_REQUEST['orgShortName'];
//    echo "Welcome ". $orgShortName;


//redirect("policS1_Create.php");
// if($_POST['btn']=="Save"){
// redirect("configOrganization.php");		
//echo "<a href='configOrganization.php'><input type='Button' value='Next' class='btn btn-primary btn-md'/></a>";	
// }
// else{
// redirect("configOrganization.php");
// echo "<a href='configOrganization.php'><input type='Button' value='Next' class='btn btn-primary btn-md'/></a>";
// }

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

// validate the variables ======================================================
    // if any of these variables don't exist, add an error to our $errors array
	if (empty($_POST['orgIDPK']))
        $errors['orgIDPK'] = 'ID is duplicated.';

    if (empty($_POST['orgShortName']))
        $errors['orgShortName'] = 'Short Name is required.';

    if (empty($_POST['orgLongNameTH']))
        $errors['orgLongNameTH'] = 'Long Name is required.';

    if (empty($_POST['orgPolPrefix']))
        $errors['orgPolPrefix'] = 'Prefix is required.';

    if (empty($_POST['orgPolLength']))
        $errors['orgPolLength'] = 'Length is required.';

    if (empty($_POST['orgReservedFrom']))
        $errors['orgReservedFrom'] = 'Observe from is required.';

    if (empty($_POST['orgReservedTo']))
        $errors['orgReservedTo'] = 'Observe To is required.';

    if (!empty($_POST['orgPolPrefix']) && !empty($_POST['orgReservedFrom']) && !empty($_POST['orgReservedTo'])){
        $c_orgPolPrefix = trim($_POST['orgPolPrefix']);
        $c_orgReservedFrom = trim($_POST['orgReservedFrom']);
        $c_orgReservedTo = trim($_POST['orgReservedTo']);

        $c_orgReservedFrom_substr = substr($c_orgReservedFrom,0,strlen($c_orgPolPrefix));
        $c_orgReservedTo_substr = substr($c_orgReservedTo,0,strlen($c_orgPolPrefix));

        if(substr_compare(
                $c_orgReservedFrom_substr,
                $c_orgPolPrefix,
                0))
           $errors['orgReservedFrom'] = 'ReservedFrom is not matched with Prefix.';

        if(substr_compare(
                $c_orgReservedTo_substr,
                $c_orgPolPrefix,
                0))
           $errors['orgReservedTo'] = 'ReservedTo is not matched with Prefix.';

        if(!substr_compare(
                $c_orgReservedFrom_substr,
                $c_orgPolPrefix,
                0) &&
            !substr_compare(
                $c_orgReservedTo_substr,
                $c_orgPolPrefix,
                0)){
            echo (int)$c_orgReservedFrom_substr = substr($c_orgReservedFrom,strlen($c_orgPolPrefix)+1,strlen($c_orgReservedFrom));
            echo (int)$c_orgReservedTo_substr = substr($c_orgReservedTo,strlen($c_orgPolPrefix)+1,strlen($c_orgReservedTo));

            if($c_orgReservedFrom_substr >= $c_orgReservedTo_substr) 
                $errors['orgReservedFrom'] = 'ReservedFrom is equal or more than ReservedTo.';
        }
    }

    if (!empty($_POST['orgPolLength']) && !empty($_POST['orgReservedFrom']) && !empty($_POST['orgReservedTo'])){
        $c_orgPolLength = trim($_POST['orgPolLength']);
        $c_orgReservedFrom = trim($_POST['orgReservedFrom']);
        $c_orgReservedTo = trim($_POST['orgReservedTo']);
        
        if(strlen($c_orgReservedFrom) != $c_orgPolLength)
           $errors['orgReservedFrom'] = 'ReservedFrom Length is not matched.';
        
         if(strlen($c_orgReservedTo) != $c_orgPolLength)
           $errors['orgReservedTo'] = 'Length is not matched.';

    }

// return a response ===========================================================

    // if there are any errors in our errors array, return a success boolean of false
    if ( ! empty($errors)) {

        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;

    } else {

        // if there are no errors process our form, then return a message

        // DO ALL YOUR FORM PROCESSING HERE
        // THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)
        echo $_POST['btn'];
        if($_POST['btn']=="insert"){
            $sql = "CALL updateOrg(1,
                ".trim($_POST['orgIDPK']).",
                '".trim($_POST['orgShortName'])."',
                '".trim($_POST['orgLongNameTH'])."',
                '".trim($_POST['orgLongNameEN'])."',
                '".trim($_POST['orgPolPrefix'])."',
                ".trim($_POST['orgPolLength']).",
                '".trim($_POST['orgReservedFrom'])."',
                '".trim($_POST['orgReservedTo'])."');";
        }
        else if($_POST['btn']=="remove"){
            $sql = "CALL updateOrg(2,".$_POST['orgIDPK'].",'','','','',0,'','');";
        }
        else if($_POST['btn']=="save"){
            $sql = "CALL updateOrg(3,
                ".trim($_POST['orgIDPK']).",
                '".trim($_POST['orgShortName'])."',
                '".trim($_POST['orgLongNameTH'])."',
                '".trim($_POST['orgLongNameEN'])."',
                '".trim($_POST['orgPolPrefix'])."',
                ".trim($_POST['orgPolLength']).",
                '".trim($_POST['orgReservedFrom'])."',
                '".trim($_POST['orgReservedTo'])."');";
        }
        else{
            $sql = "";
        }

		$result = $conn->query($sql);

        // show a message of success and provide a true success variable
        $data['success'] = true;
        $data['message'] = 'Success!';
    }

    // return all our data to an AJAX call
    echo json_encode($data);
    // json_encode($data);
    // redirect("configOrganization.php");

connClose($conn);
?>