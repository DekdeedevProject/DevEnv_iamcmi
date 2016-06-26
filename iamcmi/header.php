<?php 
session_start();
if (!isset($_SESSION["usrName"])) {
	session_destroy();
	redirect("Login.php");
}
else{	
$conn 	= connOpen();
?>	
		<div class="navbar navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="fa fa-bars mobile-bars" style=""></span>
                </button>               
            </div>
            <div class="navbar-brand" href="index.html" >
                    <img src="../img/logo2.png" /> <!-- logo here-->
            </div>
            <div class="navbar-collapse collapse" data-scrollreveal="enter from the right 50px">
                <div align="right" class="logout">
                    User: <?php echo $_SESSION["usrName"]; ?> 
                    Role: <?php echo $_SESSION["usrRole"]; ?> 
                    Current Date: <?php echo date("d-m-Y h:i:sa"); ?>
                    <a href="logout.php">Logout</a>
                </div> 
                <ul class="nav navbar-nav">
                    <li class=""><a href="home.php">Home</a></li><!-- menu links-->
                    <li><a href="policyCreateStep1.php">Create</a></li>  
                    <li><a href="searchPolicy.php">Search</a></li>
                    <li><a href="#print">Print</a></li>
                </ul>
            </div>

        </div>
    </div>
 <?php  
	}
?>