<!DOCTYPE html>
<?php include 'config/config.php'; ?>

<html>
<head>
<!-- HEADER SECTION-->
<title><?php echo $homeTitle; ?></title>

<?php 
include 'header.php'; 
if(isset($_SESSION["polQuoNum"])){ 
unset($_SESSION["polQuoNum"]);
}
?>

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
<link href="../assets/plugins/isotope/isotope.css" rel="stylesheet" media="screen" />
<link href="../assets/plugins/fancybox/jquery.fancybox.css" rel="stylesheet" />
<link href="../assets/plugins/IconHoverEffects-master/css/component.css" rel="stylesheet" />
<link href="../assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
<link href="../assets/css/about-achivements.css" rel="stylesheet" />
<link id="mainStyle" href="../assets/css/style.css" rel="stylesheet" />
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
<?php include 'footer.php'; ?>
<!-- END FOOTER SECTION-->
</footer>
</html>