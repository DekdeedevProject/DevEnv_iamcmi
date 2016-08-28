<!DOCTYPE html>
<html>
<head>
<!-- HEADER SECTION-->
<?php include 'config/config.php'; ?>
<title><?php echo $policyPrint; ?></title>
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

<script type="text/javascript">
$.fn.pageMe = function(opts){
    var $this = this,
        defaults = {
            perPage: 7,
            showPrevNext: false,
            numbersPerPage: 5,
            hidePageNumbers: false
        },
        settings = $.extend(defaults, opts);
    
    var listElement = $this;
    var perPage = settings.perPage; 
    var children = listElement.children();
    var pager = $('.pagination');
    
    if (typeof settings.childSelector!="undefined") {
        children = listElement.find(settings.childSelector);
    }
    
    if (typeof settings.pagerSelector!="undefined") {
        pager = $(settings.pagerSelector);
    }
    
    var numItems = children.size();
    var numPages = Math.ceil(numItems/perPage);

    pager.data("curr",0);
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
    }
    
    var curr = 0;
    while(numPages > curr && (settings.hidePageNumbers==false)){
        $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo(pager);
        curr++;
    }
  
    if (settings.numbersPerPage>1) {
       $('.page_link').hide();
       $('.page_link').slice(pager.data("curr"), settings.numbersPerPage).show();
    }
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
    }
    
    pager.find('.page_link:first').addClass('active');
    pager.find('.prev_link').hide();
    if (numPages<=1) {
        pager.find('.next_link').hide();
    }
  	pager.children().eq(1).addClass("active");
    
    children.hide();
    children.slice(0, perPage).show();
    
    pager.find('li .page_link').click(function(){
        var clickedPage = $(this).html().valueOf()-1;
        goTo(clickedPage,perPage);
        return false;
    });
    pager.find('li .prev_link').click(function(){
        previous();
        return false;
    });
    pager.find('li .next_link').click(function(){
        next();
        return false;
    });
    
    function previous(){
        var goToPage = parseInt(pager.data("curr")) - 1;
        goTo(goToPage);
    }
     
    function next(){
        goToPage = parseInt(pager.data("curr")) + 1;
        goTo(goToPage);
    }
    
    function goTo(page){
        var startAt = page * perPage,
            endOn = startAt + perPage;
        
        children.css('display','none').slice(startAt, endOn).show();
        
        if (page>=1) {
            pager.find('.prev_link').show();
        }
        else {
            pager.find('.prev_link').hide();
        }
        
        if (page<(numPages-1)) {
            pager.find('.next_link').show();
        }
        else {
            pager.find('.next_link').hide();
        }
        
        pager.data("curr",page);
       
        if (settings.numbersPerPage>1) {
       		$('.page_link').hide();
       		$('.page_link').slice(page, settings.numbersPerPage+page).show();
    	}
      
      	pager.children().removeClass("active");
        pager.children().eq(page+1).addClass("active");
    
    }
};

$(document).ready(function(){
    
  $('#myTable').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:10});
    
});
</script>

<?php 
include 'header.php'; 
unset($_SESSION["polQuoNum"]);

if(isset($_POST['sBy']) && isset($_POST['sDesc'])){
$sBy = trim($_POST['sBy']);
$sDesc = trim($_POST['sDesc']);

if($sDesc==""){
$sDesc = "null";
}
// echo "<br>sBy: ". $sBy;
// echo "<br>sDesc: ". $sDesc;

$sqlID = "SPO_002";
setSearchCriteria($sBy,$sDesc);
$searchResult 	= executeSql($conn,$sqlID);
	if($searchResult){

	}
}
else{
$sqlID = "SPO_001";
$searchResult 	= executeSql($conn,$sqlID);

	if($searchResult){

	}
}
$searchResultSize = $searchResult->num_rows;
// @Falom END 2016-06-19 SUN 02:08 PM 
?>
<!-- END HEADER SECTION-->
</head>
<body>
		<form action="printPolicy.php" id="cmi" method="POST">
		<div class="container">
			<div class="page-header">
				<h1>พ ร บ.</h1>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<br>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-12" align="left">
					Policy No: 
					<input type="text" name="policyNo"/>
					<input type="Submit" class="btn btn-primary btn-md" value="Print"/>
				</form>		
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<br>
				</div>
			</div>
		</div>
	</form>
	
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