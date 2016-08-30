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
                                <div class="dropdown">
                                  <li class="dropbtn">Policy</li>
                                      <div class="dropdown-content">
                                        <a href="policyS1_Create.php">New Policy</a>
                                        <a href="print.php">Print Policy Schedule</a>
                                      </div>
                                </div>     
                                <div class="dropdown">
                                  <li class="dropbtn">Search</li>
                                      <div class="dropdown-content">
                                        <a href="searchPolicy.php">Policy</a>
                                        <a href="searchPayment.php">Payment</a>
                                        <a href="searchAgent.php">Agent</a>
                                      </div>
                                </div>   
                              <?php
                                if (isset($_SESSION["usrRole"])&&$_SESSION["usrRole"]=="Admin") {
                              ?>
                                <div class="dropdown">
                                  <li class="dropbtn">Administrator</li>
                                      <div class="dropdown-content">
                                        <a href="#">Config Agent</a>
                                        <a href="#">Config Tariff</a>
                                        <a href="#">Config Product</a>
                                        <a href="#">Config Etc.</a>
                                      </div>
                                </div>   
                              <?php
                                } 
                              ?>  
                                                           
                            </ul>
                        </div>
                  </div>
            </div>
    </div>
 <?php  
	}
?>