<?php

$userId = '';
$userId = $this->session->userdata('uid1');
$uname=$this->session->userdata('uname');
//echo $userId;
if($userId == '')
{
  redirect(base_url(''));
}

?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PREM LAL</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('frontendassets');?>/images/plogo.png">
	
	<!-- Include Twitter Bootstrap and jQuery: -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

<!--<script type="text/javascript" src="docs/js/jquery-2.1.3.min.js"></script>-->
  <script type="text/javascript" src="<?php echo base_url('multiselectassets');?>/docs/js/bootstrap.bundle-4.5.2.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url('multiselectassets');?>/dist/js/bootstrap-multiselect.min.js"></script>
	

    <!-- CSS
	href="/css/bootstrap.css"
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('singleassets');?>/css/vendor/bootstrap.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url('singleassets');?>/css/vendor/font-awesome.css"> 
    <!-- Fontawesome Star -->
    <link rel="stylesheet" href="<?php echo base_url('singleassets');?>/css/vendor/fontawesome-stars.css">
    <!-- Ion Icon -->
    <link rel="stylesheet" href="<?php echo base_url('singleassets');?>/css/vendor/ion-fonts.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="<?php echo base_url('singleassets');?>/css/plugins/slick.css">
    <!-- Animation -->
    <link rel="stylesheet" href="<?php echo base_url('singleassets');?>/css/plugins/animate.css">
    <!-- jQuery Ui -->
    <link rel="stylesheet" href="<?php echo base_url('singleassets');?>/css/plugins/jquery-ui.min.css">
    <!-- Lightgallery -->
    <link rel="stylesheet" href="<?php echo base_url('singleassets');?>/css/plugins/lightgallery.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="<?php echo base_url('singleassets');?>/css/plugins/nice-select.css">
    <!-- Timecircles -->
    <link rel="stylesheet" href="<?php echo base_url('singleassets');?>/css/plugins/timecircles.css">
    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from the above) -->
    <!--
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    -->
    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="<?php echo base_url('singleassets');?>/css/style.css">
	<link href="<?php echo base_url('singleassets');?>/css/animate.css" rel="stylesheet" type="text/css" media="all" /> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
.hiraola-social_link a
{
    color:#595959;
}
.header-middle_area
{
    background-color:#030303;
}
.header-bottom_area {
    background-color: #492c10;
}
 .frequently-accordion .card-header a:after {
    content: "\f068";
    font-family: 'Font Awesome 5 Free';
    font-weight: 600;
    position: absolute;
    right: 15px;
    top: 15px;
    color: black;
}
 .frequently-accordion .card-header a.collapsed:before {
    content: "\f067";
    font-family: 'Font Awesome 5 Free';
    font-weight: 600;
    position: absolute;
    right: 15px;
    top: 15px;
    color: black;
}
.subcats{
	padding-bottom: 10px;
	margin-left:20px;
	font-size:20px;
}
.nav-link {
	 color:white; 
	}
	.btn-group{
	width:100%;
	}

.addtocart{
	
	color:#ffffff;
    /* width: 10px; */
    padding: 7px;
    border-radius: 20px;
        margin-right: -13px;
    text-decoration: none;
    background-color: black;
}
.addtocart1:hover{
	color:#ffffff;
	list-style:none;
}
button.btn.btn-default.search {
    background: #85501b;
    /*padding: 7px 7px 7px;*/
	margin-top:10px;
    float: right;
    outline: none;
    border: none;
	
}
.pricebrdown
	{
		padding-top:10px;
	}
 .frequently-accordion .card-header a:after {
    content: "\f068";
    font-family: 'Font Awesome 5 Free';
    font-weight: 600;
    position: absolute;
    right: 15px;
    top: 15px;
    color: black;
}
 .frequently-accordion .card-header a.collapsed:before {
    content: "\f067";
    font-family: 'Font Awesome 5 Free';
    font-weight: 600;
    position: absolute;
    right: 15px;
    top: 15px;
    color: black;
}
.subcats{
	padding-bottom: 10px;
	margin-left:20px;
	font-size:20px;
}

	.btn-group{
	width:100%;
	}

.addtocart{
	
	color:#ffffff;
    /* width: 10px; */
    padding: 7px;
    border-radius: 20px;
        margin-right: -13px;
    text-decoration: none;
    background-color: #85501b;
}
.addtocart1:hover{
	color:#ffffff;
	list-style:none;
}
button.btn.btn-default.search {
    background: #85501b;
    padding: 7px 7px 7px;
    float: right;
    outline: none;
    border: none;
	
}
.price_breakup_popup {
    display: block !important;
    left: 0rem !important;
    top: 19rem !important;
    right: unset !important;
    text-align: left;
    z-index: 0;
    width: 100% !important;
    position: static;
    margin-top: 0;
    margin-bottom: 0;
    height: auto;
}
.price_breakup_popup span.price_breakup_title {
    font-size: 1rem !important;
    color:#9e6730 !important;
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    font-weight: bold;
}
.price_breakup_popup li .breakup_content {
    background: #fff !important;
    width: 100% !important;
    border-right: 1px solid #eee;
    padding-right: 20px;
    padding-left: 0;
	display: flex;
    flex-direction: column;
	    min-height: 40px;
}
.price_breakup_popup li div {
    float: left;
    /*background: #f5f1e6;*/
    padding: 2px 5px;
    /*width: 70px;*/
    text-align: center;
   /* min-height: 25px; */
}
.price_breakup_popup li .breakup_content span {
    font-size: 13px;
    font-family: "Lato", sans-serif;
    font-weight: bold;
}
.price_breakup_popup li .breakup_content span:first-child {
    margin-bottom: 6px;
    margin-top: 5px;
    font-weight: bold;
    font-size: 15px;
}
.price_breakup_popup li div span {
    display: block;
    font-size: 10px;
    
}
.price_breakup_popup ul {
    display: flex !important;
}
.price_breakup_popup li {
    float: none !important;
    color: #000 !important;
    font-family: "Lato", sans-serif;
    padding: 0 10px;
	margin-right: 1px;
    position: relative;
}
.contact-box {
    /*padding-left: 10px;*/
    flex-basis: 40%;
}
.contact-box-text {
    flex-basis: 50%;
    text-align: center;
	display: flex;
}
.contact-box .contact-call {
    background-image: url(<?php echo base_url('frontendassets');?>/images/icon-call.svg);
	width: 25% !important;
    padding-left: 12px;
    background-position: 0px 5px;
    background-repeat: no-repeat;
    background-size: 15px 20px;
    font-family: 'Muli', sans-serif;
    font-size: 14px;
    font-weight: bold;
    margin-right: 10px;
	padding: 5px 0;
	margin: 0 0 10px;
}
.contact-box .contact-whatsapp {
    background-image: url(<?php echo base_url('frontendassets');?>/images/icon-whatsapp.svg);
	width: 25% !important;
    padding-left: 12px;
    background-position: 0px 5px;
    background-repeat: no-repeat;
    background-size: 15px 20px;
    font-family: 'Muli', sans-serif;
    font-size: 14px;
    font-weight: bold;
    margin-right: 10px;
	padding: 5px 0;
	margin: 0 0 10px;
	
}
.contact-box .contact-box-text p a {
    
    font-weight: bold;
    font-family: "Lato", sans-serif;
    color: #000;
}
.sp-area .sp-nav .sp-content .sp-essential_stuff > ul > li > a{
    font-weight:bold;
    color:black;
}
.sp-area .sp-nav .sp-content .sp-essential_stuff > ul > li
{
    font-weight:600;
}
.template-color-1 .sp-area .sp-nav .sp-content .sp-essential_stuff > ul > li > a
{
color:black;
}

  
   </style>
    <!--<link rel="stylesheet" href="assets/css/style.min.css">-->
</head>
<body class="template-color-1">
    <div class="main-wrapper">
        <!-- Begin Loading Area -->
     <!--   <div class="loading">-->
     <!--       <div class="text-center middle">-->
     <!--           <div class="loadimg">-->
                 
					<!--<img src="<?php echo base_url('frontendassets');?>/images/plogo.png" class="img img-responsive" > -->
     <!--           </div>-->
     <!--       </div>-->
     <!--   </div>-->
      
                    </div>
                <header class="header-main_area">
            
            <div class="header-middle_area d-none d-lg-block">
                <div class="container">
                    <div class="row"> 
                        <div class="col-lg-5 wow  animated" data-wow-delay="0.9s" style="visibility: visible; animation-delay: 0.9s; animation-name: fadeInDown;">
                            <div class="header-logo">
                                <a href="<?php echo base_url();?>">
                                    <img src="<?php echo base_url('frontendassets');?>/images/plogo.png" alt="Hiraola's Header Logo">
                                </a>       
                            </div>   
                        </div> 
                        <div class="col-lg-7 navbartop hidden-sm wow  animated" data-wow-delay="0.9s" style="visibility: visible; animation-delay: 0.9s; animation-name: fadeInUp;"> 
                           <nav class="navbar navbar-expand-sm ">
							  <ul class="navbar-nav">
								<li class="nav-item">
								  <a class="nav-link" href="#"><?php echo $uname; ?></a>
								</li>
								<li class="nav-item">
								  <a class="nav-link" href="<?php echo base_url('Welcome/SignOut') ; ?>">Sign Out</a>
								</li>
								<li class="nav-item">
								  <a class="nav-link" href="#">About Us</a>
								</li>
								
								<li class="nav-item">
								  <a class="nav-link" href="#">Encircle</a>
								</li>
								<li class="nav-item">
								  <a class="nav-link" href="#">Store Locator</a>
								</li>
							  </ul>
							</nav> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom_area header-sticky stick">
                <div class="container">
                    <div class="row wow  animated" data-wow-delay="0.9s" style="visibility: visible; animation-delay: 0.9s; animation-name: fadeInDown;">
                        <div class="col-md-4 col-sm-4 d-lg-none d-block">
                            <div class="header-logo">
                                <a href="<?php echo base_url();?>">
                                    <img src="<?php echo base_url('frontendassets');?>/images/menu/logo/2.png" alt="Hiraola's Header Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 d-none d-lg-block position-static">
                            <div class="main-menu_area">
                                <nav>
                                    <ul style="margin-bottom:0;">
                                        <li class="dropdown-holder"
                                        ><a href="<?php echo base_url('Uhome'); ?>"> Home</a> </li>
									  <?php foreach($mainmenu as $mcat)
								        {
											?>
										
                                        <li class="dropdown-holder">
										<a href="<?php echo base_url('MainCategory/'.$mcat['CategoryId']) ;?>"><?php  echo $mcat['CategoryName'];?>
										</a>                                   <?php } ?>      
                                        </li>
                                        <!---<li class="megamenu-holder"><a href="hiraola-preview/hiraola/shop-left-sidebar.html">DIAMOND</a>
                                            <ul class="hm-megamenu">
                                                <li><span class="megamenu-title">Women</span>
                                                    <ul>
                                                        <li><a href="hiraola-preview/hiraola/shop-3-column.html">Rings </a></li>
                                                        <li><a href="hiraola-preview/hiraola/shop-left-sidebar.html">Ear Rings</a></li>
                                                        <li><a href="hiraola-preview/hiraola/shop-right-sidebar.html">Pendent</a></li>
                                                        <li><a href="hiraola-preview/hiraola/shop-list-fullwidth.html">Tanmaniya</a></li>
                                                        <li><a href="hiraola-preview/hiraola/shop-list-left-sidebar.html">Bangles</a></li>
                                                       
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span class="megamenu-title">Men</span>      
                                                    <ul>
                                                        <li><a href="index.html">Rings</a></li>
                                                        <li><a href="index.html">Pendent</a>
                                                        </li>
                                                       
                                                    </ul>
                                                </li> 
                                                <li><span class="megamenu-title">Occasions</span>
                                                    <ul>
                                                        <li><a href="hiraola-preview/hiraola/shop-3-column.html">Rings </a></li>
                                                        <li><a href="hiraola-preview/hiraola/shop-left-sidebar.html">Ear Rings</a></li>
                                                        <li><a href="hiraola-preview/hiraola/shop-right-sidebar.html">Pendent</a></li>
                                                        <li><a href="hiraola-preview/hiraola/shop-list-fullwidth.html">Tanmaniya</a></li>
                                                        <li><a href="hiraola-preview/hiraola/shop-list-left-sidebar.html">Bangles</a></li>
                                                       
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item_img"></li>
                                            </ul>
                                        </li>
                                      
                                        
                                        <li><a href="index.html">Gold</a></li>
                                        <li><a href="index.html">Platinum</a></li> 
                                        <li><a href="hiraola-preview/hiraola/shop-left-sidebar.html">Jewellery</a></li>-->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-8 col-sm-8">
                            <div class="header-right_area">
                                <ul style="margin-bottom:0px;">
                                   <!-- <li>
                                <a href="javascript:void(0)" class="wishlist-btn">
                              <i class="ion-android-favorite-outline"></i>
                                        </a>
                                    </li>--->
                                    <li>
                                        <a href="javascript:void(0)" class="mobile-menu_btn toolbar-btn color--white d-lg-none d-block">
                                            <i class="ion-navicon"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Welcome/ShoppingCart');?>">
				  <button type="submit" class="btn btn-default search" aria-label="Left Align" >
					 <i class="ion-bag" aria-hidden="true" style="font-size:23px;color:white;"  id="cartC"></i> <b style="color: white;font-size: 24px;font-weight: 400;"><?php echo $count_cart; ?></b>
					 </button>
				</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			 
			 <!--------shopping cart  starts--------->
			 </header>