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
        

             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">  
                <div class="navbar-brand" href="index.html" >
                    <img class="img-header" src="../img/logo2.png" /> <!-- logo here-->
                </div>
            </div>
             <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 big-div" style="padding:0px">
                  <div class="short-div">
                        <div class="col-md-7 col-md-offset-5" align="right">
                            <div  class="logout">
                                User: <?php echo $_SESSION["usrName"]; ?> 
                                Role: <?php echo $_SESSION["usrRole"]; ?> &nbsp;&nbsp;&nbsp;
                                <!--Current Date: <!--?php echo date("d-m-Y h:i:sa"); ?>-->
                                <a href="logout.php">Logout</a>
                            </div> 
                        </div>
                  </div>
                  <div class="short-div">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="fa fa-bars mobile-bars" style=""></span>
                            </button>               
                        </div>              
                        <div class="navbar-collapse collapse" data-scrollreveal="enter from the right 50px">
                            <ul class="nav navbar-nav">
                                <li class=""><a href="home.php">Home</a></li><!-- menu links-->
                                <li><a href="policyS1_Create.php">Create</a></li>  
                                <li><a href="searchPolicy.php">Search</a></li>
                                <li><a href="print.php">Print</a></li>
                                <div class="dropdown">
                                  <li class="dropbtn">Administrator</li>
                                      <div class="dropdown-content">
                                        <a href="#">Link 1</a>
                                        <a href="#">Link 2</a>
                                        <a href="#">Link 3</a>
                                      </div>
                                </div>                              
                            </ul>
                        </div>
                  </div>
            </div>
    </div>
 <?php  
	}
?>