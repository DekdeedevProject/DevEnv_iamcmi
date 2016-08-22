

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
<title>Home</title>
<!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css" /> -->
<link rel="stylesheet" href="../js/jquery-ui-themes-1.12.0-rc.2/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" href="../css/iamStyle.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
<script src="../js/jquery-1.12.4.js"></script>
<script src="../js/jquery-1.12.4.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../js/jquery-ui-1.12.0-rc.2/jquery-ui.js"></script>
 <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!-- MAIN STYLE SECTION-->
<link href="../assets/plugins/isotope/isotope.css" rel="stylesheet" media="screen" />
<link href="../assets/plugins/fancybox/jquery.fancybox.css" rel="stylesheet" />
<link href="../assets/plugins/IconHoverEffects-master/css/component.css" rel="stylesheet" />
<link href="../assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
<link href="../assets/css/about-achivements.css" rel="stylesheet" />
<link id="mainStyle" href="../assets/css/style.css" rel="stylesheet" />
<!-- END MAIN STYLE SECTION-->

<!-- HEADER SECTION-->
<?php 
// @BEGIN
// @DEKDEEDEV_IAMCMI
// @Falom
// @2016-06-19 SUN 02:08 PM 
include 'config/config.php'; 
include 'header.php'; 
if(isset($_SESSION["polQuoNum"])){ 
unset($_SESSION["polQuoNum"]);
}
// @Falom END 2016-06-19 SUN 02:08 PM 
?>
<!-- END HEADER SECTION-->
</head>
<body>
        <div class="container-fluid confDiv">
            <br><br><br><br>
            <section id="Homepage">
                <div class="row">
                    <br><br>
                    <div data-scrollreveal="wait 0.5s and then ease-in-out 50px" class="col-md-6 col-md-offset-3" style="margin-bottom: 1.5em;">
                        <div class="align-center">
                            <h2 class="main-text">WELCOME TO IAMCMI</h2>

                        </div>
                    </div>
                </div><br><br>
                <div class="row">
                    <div data-scrollreveal="enter from the left" class="col-md-8 col-md-offset-4">
                        <div>
                            <div class="col-xl-12 col-md-12 homeIcon">
                                <!-- <div class="">
                                    <a href="policyCreateStep1.php" onMouseOver="document.MyImage1.src='../img/create-hover.png'; " onMouseOut="document.MyImage1.src='../img/create-icono.png';"><img src="../img/create-icono.png" width="120" height="120"  name="MyImage1"></a> 
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                              
                                    <a href="searchPolicy.php" onMouseOver="document.MyImage2.src='../img/query-hover.png';" onMouseOut="document.MyImage2.src='../img/search-icono.png';"><img src="../img/search-icono.png" width="120" height="120" name="MyImage2"></a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="print.php" onMouseOver="document.MyImage3.src='../img/print-hover.png';" onMouseOut="document.MyImage3.src='../img/print-icono.png';"><img src="../img/print-icono.png" width="120" height="120" name="MyImage3"></a>
                                </div> -->
                                <div class="col-xs-12 col-md-2 col-md-offset3">
                                    <a href="policyCreateStep1.php" onMouseOver="document.MyImage1.src='../img/create-hover.png'; " onMouseOut="document.MyImage1.src='../img/create-icono.png';"><img src="../img/create-icono.png" width="120" height="120"  name="MyImage1"></a>
                                </div>
                                <div class="col-xs-12 col-md-2">
                                    <a href="searchPolicy.php" onMouseOver="document.MyImage2.src='../img/query-hover.png';" onMouseOut="document.MyImage2.src='../img/search-icono.png';"><img src="../img/search-icono.png" width="120" height="120" name="MyImage2"></a>
                                </div>
                                <div class="col-xs-12 col-md-2">
                                    <a href="print.php" onMouseOver="document.MyImage3.src='../img/print-hover.png';" onMouseOut="document.MyImage3.src='../img/print-icono.png';"><img src="../img/print-icono.png" width="120" height="120" name="MyImage3"></a>
                                </div>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
   
     <!--END HOMEPAGE SECTION-->

</body>
<footer>
<!-- FOOTER SECTION-->
<?php 
// @BEGIN
// @DEKDEEDEV_IAMCMI
// @Falom
// @2016-06-19 SUN 02:08 PM 
include 'footer.php'; 
// @Falom END 2016-06-19 SUN 02:08 PM 
?>
<!-- END FOOTER SECTION-->
</footer>
</html>