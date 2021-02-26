<?php

$uid1 = '';
$uid1 = $this->session->userdata('uid');
//echo $uid1;

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url('frontendassets');?>/css/bootstrap1.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url('frontendassets');?>/css/bootstrap1-select.min.css" rel="stylesheet" />


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

<!--<script type="text/javascript" src="docs/js/jquery-2.1.3.min.js"></script>-->
  <script type="text/javascript" src="<?php echo base_url('multiselectassets');?>/docs/js/bootstrap.bundle-4.5.2.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url('multiselectassets');?>/dist/js/bootstrap-multiselect.min.js"></script>
	
    <!-- CSS
	href="/css/bootstrap.css"
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('frontendassets');?>/css/vendor/bootstrap.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url('frontendassets');?>/css/vendor/font-awesome.css"> 
    <!-- Fontawesome Star -->
    <link rel="stylesheet" href="<?php echo base_url('frontendassets');?>/css/vendor/fontawesome-stars.css">
    <!-- Ion Icon -->
    <link rel="stylesheet" href="<?php echo base_url('frontendassets');?>/css/vendor/ion-fonts.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="<?php echo base_url('frontendassets');?>/css/plugins/slick.css">
    <!-- Animation -->
    <link rel="stylesheet" href="<?php echo base_url('frontendassets');?>/css/plugins/animate.css">
    <!-- jQuery Ui -->
    <link rel="stylesheet" href="<?php echo base_url('frontendassets');?>/css/plugins/jquery-ui.min.css">
    <!-- Lightgallery -->
    <link rel="stylesheet" href="<?php echo base_url('frontendassets');?>/css/plugins/lightgallery.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="<?php echo base_url('frontendassets');?>/css/plugins/nice-select.css">
    <!-- Timecircles -->
    <link rel="stylesheet" href="<?php echo base_url('frontendassets');?>/css/plugins/timecircles.css">
    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from the above) -->
    <!--
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    -->
    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="<?php echo base_url('frontendassets');?>/css/style.css">
	<link href="<?php echo base_url('frontendassets');?>/css/animate.css" rel="stylesheet" type="text/css" media="all" /> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.dropdown-menu 
{
	font-size:1.3em;
}

.bootstrap-select.btn-group .dropdown-toggle .filter-option
{
	font-size:1.5em;
}
.bootstrap-select.btn-group .dropdown-toggle .caret
{
	margin-top:-5px;
}
.nopad {
	padding-left: 0 !important;
	padding-right: 0 !important;
}
/*image gallery*/
.image-checkbox {
	cursor: pointer;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	border: 4px solid transparent;
	margin-bottom: 0;
	outline: 0;
}
.image-checkbox input[type="checkbox"] {
	display: none;
}

.image-checkbox-checked {
	border-color: #9e6730;
}
.image-checkbox .fa {
	display:none;
  position: absolute;
  color: #4A79A3;
  background-color: #fff;
  padding: 10px;
  top: 0;
  right: 0;
}
.image-checkbox-checked .fa {
  display: block !important;
}
</style>
	
<style>
.bootstrap-select.btn-group .dropdown-menu.inner
{
	font-size:0.8em;
}
	.input-styles
	{
		padding:10px;
	}
	.card-header{
	    background-color:none;
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
	font-size:19px;
}
button.btn.btn-default.search {
    background: #85501b;
    padding: 7px 7px 7px;
    float: right;
    outline: none;
    border: none;
	
}
.header-logo1{
	/*margin-left:35em;
	margin-top: 18px;*/
}
.backlink{
	
	/*margin-left:10em;
	margin-top:-62px;*/
}
.btnstyle{
	background: #85501b;
	border-color: #393167;
	width:157%
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
.paddclass{
	padding-top:40px;
}
.selectparent{
	font-size:1.5em;
	min-width: 111%;
    height: 32px;
}
/*.gen:hover{
	background-color:#d4d4d4;
}*/
.selectparent1{
	font-size: 1.5em;
	float:left;
	width:55%;
    height: 32px;
}
.selectparent2{
	font-size: 1.5em;
	/* float:right;
    margin-left:41px; */
	width:45%;
	position: absolute;
	left: 100px;
	 height: 32px;
}
.tagweightwidth{
	width:130px;
}
.minmax{
	margin-left:-20px;
}
.pricestat
{
	color:black;
	font-size:1.5em;
	font-weight:400;
}
.catlabels
{
	font-size:1.2em;
	font-weight:500;
}
.form-group .bootstrap-select.btn-group
{
	margin-bottom: 0;
    border: 1px solid rgb(118, 118, 118);
}
 .btn-default:active:hover, .btn-default.focus
 {
	 background-color:white;
	 border-color:none;
 }
.open>.dropdown-toggle.btn-default:hover,.open>.dropdown-toggle.btn-default.focus {
    color: #333;
     background-color: white; 
    border-color: #adadad;
}


.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 10px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  
}

/* Hide the browser's default checkbox */
.container .checks1 {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 3px;
  left: 8px;
  height: 18px;
  width: 18px;
  background-color: #eee; 
border-radius: 15px;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #85501b;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 7px;
  top: 4px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

   </style>
    <!--<link rel="stylesheet" href="assets/css/style.min.css">-->
</head>
<body class="template-color-1">
    <div class="main-wrapper">
        <!-- Begin Loading Area -->
        <!--<div class="loading">
            <div class="text-center middle">
                <div class="loadimg">
                 
					<img src="<?php echo base_url('frontendassets');?>/images/plogo.png" class="img img-responsive" > 
                </div>
            </div>
        </div>----->
      
                    </div>
             
			 
			 <!--------shopping cart  starts--------->
			 
			 		<!-- //banner-top -->

			 <!--------shopping cart  ends--------->
							
		<div class="container">
	   <div class="row">
	   
	   <div class="col-md-4 paddclass">
			   <div class="backlink" style="float:left;">
			   <?php 
			   if($staffid==0)
			   {
				   ?>
			   <a href="<?php echo base_url("EcoDashAdmin/RegisteredUsers")?>"> <button class="btn btn-info btnstyle" style="font-size: 20px;"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</button></a>
			   <?php 
			   }
			   else
			   {
				?>
					<a href="<?php echo base_url("EcoDashAdmin/StaffMem")?>">
						<button class="btn btn-info btnstyle" style="font-size: 20px;">
							<i class="fa fa-arrow-left"></i>
							&nbsp;&nbsp;Back
						</button>
					</a>
				   <?php
			   }?>
			   </div>
	   </div>
	   <div class="col-md-4">
				<div class="header-logo1">
				 <a href="http://localhost/Premlal/">
				<img src="<?php echo base_url();?>/frontendassets/images/plogo.png" alt="Hiraola's Header Logo" >
				  </a>       
				</div> 
        </div> 
		
        <div class="col-md-4 paddclass">
				<div class="backlink" style="float:right;" >
				<?php 
				if($staffid==0)
				{
				?>
				<a href="<?php echo base_url('EcoDashAdmin/ShoppingCart/'.$auid.'');?>">
					<button type="submit" class="btn btn-default search" aria-label="Left Align">
					<i class="ion-bag" aria-hidden="true" style="font-size:23px;color:white;" id="cartC"> <?php echo $count_cart; ?></i>
				</a>
				<?php 
				}
				else
				{
					?>
				<a href="<?php echo base_url('EcoDashAdmin/ShoppingCart/a'.$auid.'');?>">
					<button type="submit" class="btn btn-default search" aria-label="Left Align">
					<i class="ion-bag" aria-hidden="true" style="font-size:23px;color:white;" id="cartC"> <?php echo $count_cart; ?></i>
				</a>	
				<?php 
				}
				?>
			   </div>
	   </div>
	   </div>
	   </div>						
	
	
	
		<div class="hiraola-content_wrapper" style="padding-top: 49px;">
            <div class="container">
                <div class="row">
                    <!---<div class="col-lg-3 order-2 order-lg-1">
					<div class="frequently-accordion">
		
                            <div id="accordion">
							<?php 
							
							//foreach($mainmenu as $mcat)
							//	{
									?>
                                <div class="card actives">
                                    <div class="card-header" id="headingOne" style="background:white;">
                                        <h5 class="mb-0" style="
    color: black;
    font-size: 18px;
">
               <a href="javascript:void(0)"  style="
    color: black;
    font-size: 18px;text-decoration: none;
"  class="collapsed" data-toggle="collapse" data-target="#collapseOne<?php echo $mcat['CategoryId'];?>" aria-expanded="false" aria-controls="collapseOne" onclick="getproductsparent(<?php echo $mcat['CategoryId'];?>)">
                                                <?php echo $mcat['CategoryName'];?>
                                            </a>
                                        </h5>
                                    </div>
            <div id="collapseOne<?php echo $mcat['CategoryId'];?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
                            <div class="card-body">
										<?php
										//$a=$mcat['CategoryName'];
										
										//foreach($submenu as $subcat)
										//{
											if($subcat['CategoryName']==$a)
											//{?>
          <li class="subcats" style="list-style:none;"><i class="fa fa-long-arrow-right" aria-hidden="true" style="font-size:15px;"></i><a href="javascript:void(0);"  style="color: black;text-decoration: none;font-size:16px;" onclick="getproducts('<?php echo $subcat["SubCategoryId"];?>','<?php echo $mcat['CategoryId'];?>') "> <?php echo $subcat['SubCategoryName'];?><?php if($subcat['Title']=='Men') {   ?>&nbsp;&nbsp;<img style="width:11%;" src="<?php echo base_url('images')?>/ma.png"> <?php } else {if($subcat['Title']=='Women') { ?>&nbsp;&nbsp;<img style="width:11%;" src="<?php echo base_url('images')?>/female.png"> <?php  } } ?>
          </a></li>
								<?php
										//}	
										
										//}
										?>
                                        </div>
                                    </div>
                                </div>
								<?php //} ?>
								
                            </div>
							
							
							
                        </div>
                    </div>------------>
                    <div class="col-lg-12 order-1 order-lg-2">
                          <div class="shop-toolbar">
						<div class="container">
					<div class="row" >
					 <div class="col-md-3"> 
							<div class="form-group">
								<label class="catlabels">Main Category</label>  
							<select name="selectparent" id="selectparent" onChange="getfiletr()" class="selectparent" data-live-search="true">
							<option value="">Select Category</option>
							<?php foreach($mainmenu as $mcat)
								{ 
									?>
									<option data-tokens="<?php echo $mcat['CategoryName'] ?>" value="<?php echo $mcat['CategoryId']; ?>" id="<?php echo $mcat['CategoryId'];  ?>" ><?php echo $mcat['CategoryName'] ?></option>
									
									<?php
								}
									?>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="catlabels">Sub Category:</label>
							<select name="selectsub" id="selectsub" onChange="getfiletr()" class="selectpicker selectparent" style="color: #888888;" data-live-search="true">
							<option value="" id="selectsubca" >Select Sub Category</option>
							<?php foreach ($mainmenu as $mcat)
							{
								?><option value="" id="<?php echo $mcat['CategoryId'];?>" style="font-weight:bold;color:#85501b;" data-tokens="<?php echo $mcat['CategoryName'];?>"><?php echo $mcat['CategoryName'];?></option>
								<?php foreach($submenu as $scat)
								{
									if($mcat['CategoryId']==$scat['CategoryId'])
									{
										
								?>
							
							
							<option value="<?php echo $scat['subcategory_name_id'];?>" id="<?php echo $scat['CategoryId'];?>" ><?php echo $scat['Title'];?></option>
							
							<?php } } } ?>
							</select>
						</div>
					</div>
					<div class="col-md-3" >
						<div class="form-group">
							<label class="catlabels">Sub Category List:</label>
							<select name="selectsublist" list="CktPlayers" id="selectsublist" onChange="getfiletr()" class="selectparent" data-live-search="true" >
							<option value="">Select Sub List</option>
							
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="catlabels">Select Gender</label>
							<select name="gender" id="selectgender" onChange="getfiletr()" class="selectparent gen" style="hover:background-color:black;">
							<option value="">Select Gender</option>
							<option value="1">Male</option>
							<option value="2">Female</option>
							
							</select>
						</div>
					</div>
					<div class="col-md-3">
								<div class="form-group">
								 <label for="male" class="catlabels">Description:</label>
									<input type="" name="description" id="description"placeholder="Enter Description" onkeyup="getfiletr()" class="selectparent" >
								</div>
						</div>
							
							<div class="col-md-3">
								<div class="form-group">
								 <label for="weight" class="catlabels">Enter Weight:</label>
									<input type="" name="weight" id="weight"placeholder="Enter Weight" onkeyup="getfiletr()" class="selectparent" >
									</div>
								</div>
							<div class="col-md-2 ">
									<div class="form-group">			
									<label for="price-min" class="catlabels">Price:</label>
									<div>
									<input type="text" class="selectparent1" placeholder="min" onkeyup="getfiletr()" id="minprice" name="minprice">
									<input type="text" class="selectparent2" id="maxprice" name="maxprice" placeholder="max"onkeyup="getfiletr()">
									</div>
								  </div>
	                        </div>
	                        <?php 
	                        if($staffid!=0)
	                        {
	                        if($staffproducttype['ProductCategory']=='Both')
	                        { ?>
	                        <div class="col-md-2">
						        <div class="form-group">
							        <label class="catlabels">Product Type</label>
							                <select name="ProductCategory" id="selectproductcategory" onChange="getfiletr()" class="selectparent gen" style="hover:background-color:black;">
							                    <option value="">Select Product Type          </option>
							                    <option value="Premium">Premium</option>
							                    <option value="Non-Premium">Non-Premium</option>
							                </select>
						        </div>
					        </div>
					        <?php }
					        }?>
							<div class="col-md-2">  
							<!--<input type="checkbox" class="checkbox_selector" /> -->
						<div id="checkbox_selector" class="btn btn-primary checkbox_selector" style="font-size:12px;background:#85501b;color:white;height:30px;padding: 4px;border: 1px solid #888888;float: left;margin-top: 23px;margin-right: 10px;margin-left:0px;width:45%;font-weight:500;">Select All</div> 
							<div class="form-group">
								<label for="price-min" ></label>
									<div>
			<button onclick="loginclick()" id="myDiv" style="font-size:12px;background:#85501b;color:white;height:30px;display:none;padding: 4px;border: 1px solid #888888;margin-top: 9px;margin-right: 10px;width:40%;font-weight:500;">Submit</button>
									</div>
								</div>
							</div>
							
							
							</div>
							</div>
						
                        </div>
						
						
						<div id="productview">
                        <div class="shop-product-wrap grid gridview-3 row">
              <!----- loop starts here   --------->            
             <?php  
			 if(!empty($products))
			 {
				 foreach($products as $pd)
				{
					?>
					<div class="col-lg-3">
                        <div class="slide-item">
                            <div class="single_product">
								<label class="image-checkbox">
                                    <div class="product-img">
                                         
				<img class="primary-img" src="<?php echo $pd['Image'];?>" alt=" Product Image">	
					<input type="checkbox" name="check[]" value="<?php echo $pd['ProductId'];?>" id="checks1" class="checkBoxClass">
						<i class="fa fa-check hidden"></i>
			
			<?php if($pd['gender1']=='1')
							{ ?>
							<span class="sticker">Male</span> 
					        <?php }
					        else if($pd['gender1']=='2')
					        {?>	<span class="sticker">Female</span>
					        <?php } ?>
                                            <!--<div class="add-actions">
                                                <ul>
  <li><a class="hiraola-add_cart" href="javascript:void(0)" onclick="ccart(<?php echo $pd['ProductId'];?>,<?php echo $auid ;?>)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Cart"><i class="ion-bag"></i></a></li>
 
  
                                                </ul>
                                            </div>-->
                                        </div>
										</label>
                                        <div class="hiraola-product_content">
                                            <div class="product-desc_info">
              <h5><a class="product-name" href="javascript:void(0)" style="text-decoration:none;">
			  <?php echo $pd["ProductName"]; ?></a></h5>
			  <?php 
			  if($staffid!=0)
			  {
			  if($pd['pricestatus']==1)
			  {?>
			    <div class="price-box">
                <span class="new-price"><?php echo "Rs ". $pd["TotalPrice"]; ?></span>
               
                </div> <?php 
			      
			  }
			  }
			  else
			  {?>
			      <div class="price-box">
                <span class="new-price"><?php echo "Rs ". $pd["TotalPrice"]; ?></span>
               
                </div><?php
			  }
                 ?>
						<?php 
												if($staffid==0)
												{
													?>
                                                <div class="additional-add_action">
                                                    <ul>								
														<li class="addtocart1"><label class="container"><input type="checkbox" name="check1[]" value="1" id="checks1" class="checks1" checked style="display:inline;" ><label class="pricestat" >Show</label><span class="checkmark"></span></label></li>
                                                    </ul>
                                                </div>
												<?php } 
												else
												{ 
												?>
												<div class="additional-add_action" style="display:none">
													<ul>								
														<li class="addtocart1"><input type="checkbox" name="check1[]" value="1" id="checks1" checked style="display:inline;" ><label class="pricestat" >Show</label></li>
                                                    </ul>
                                                </div>
												<?php 
												}
                                             ?>
                                            </div>
                                        </div>
										
                                    </div>
									
                                </div>
                              
                            </div>
							<?php  } 
			 }	
			 else
			 {
				 ?>
				 <div class="col-lg-4"><div class="slide-item" style="font-size:1.6em;" >Sorry, there are no products..</div></div>
				 <?php
			 }
			 ?>
                         <!-------loop end here ---------->
                           </div>
                        </div>
						
						<!--ajax div starts-->
						<div id="individualProducts">
						
                       </div>
					   <div id="FilteredProducts">
						
                       </div>
					   <!--ajax div ends-->
					   
                    </div>
                </div>
            </div>
        </div>
		
		
		   <!-- Main JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/main.js"></script> 
<!--<script src="<?php echo base_url('frontendassets');?>/js/wow.min.js"></script>-->
	<div class="modal fade" id="StatusChng1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" style="padding-top: 1em;
    margin-left: 0px;">&times;</button>
				<h3 class="modal-title text-center" style="margin-right:auto;margin-left:auto;">Premlal</h3>
			</div>
			<div class="modal-body">

				<div class="button-group text-center">
					<button class="btn btn-primary kc-sucess-btn" id="ChangStat">Submit</button>
				</div>    
			</div>    
		</div>  
	</div>     
</div> 
<script>
	 	$( document ).ready(function() {
    cartCount();
});
	
</script>
<script>
// image gallery
// init the state from the input
 var jash = []; 
function check(){
	var x, i;
  x = document.querySelectorAll(".image-checkbox-checked");
 //alert(x.length);  
      if(x.length >=1){ 
		  document.getElementById("myDiv").style.display = "block";
	  }else{        
		  document.getElementById("myDiv").style.display = "none";
	  }
} 
$(".image-checkbox").each(function () {
  if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
	  
    $(this).addClass('image-checkbox-checked');

  }
  else {
    $(this).removeClass('image-checkbox-checked');
  }
});

// sync the state to the input
 $(document).on('click','.image-checkbox', function(e){
//$(".image-checkbox").on("click", function (e) { 
	
  $(this).toggleClass('image-checkbox-checked'); 
  check();  
  
  var $checkbox = $(this).find('input[type="checkbox"]');
  $checkbox.prop("checked",!$checkbox.prop("checked"))

  e.preventDefault();
});
</script>
 <script>
      function loginclick() {
   
        // using this page stop being refreshing 
        event.preventDefault();
		var vals = [];
		var vals1 = [];
		$('input:checkbox[name="check[]"]').each(function() 
			{
				if (this.checked) 
				{
				    //alert(this.value); 
					vals.push(this.value); 
				}
				else
				{
					vals.push('0');
				}
			});
			$('input:checkbox[name="check1[]"]').each(function() 
			{
				if (this.checked)
				{
					vals1.push(this.value);
				}
				else
				{
					vals1.push('0');
				}
			});
			
			//break; 
			var uid = '<?php echo $auid ;?>';
			//alert(uid);
			$.ajax({
            type: 'POST',
            url: '',
            data: {'get':'admincartform','products':vals,'price':vals1,'auid':uid},
            success:function(data)
			{
				
				var data = $.parseJSON(data);  
					if(data.err1 == '0') 
					{     
												
						$('#StatusChng1').modal('show');
						$('#StatusChng1').find('.modal-body').html('<h4 style="color:green;text-align:center;">'+data.msg+'</h4>');

						$('.close').click(function(){
							window.location.reload();
							cartCount(); 
						});
					}   
					else 
					{
						if(data.err1 == '1')
						{ 
							
						$('#StatusChng1').modal('show');
						$('#StatusChng1').find('.modal-body').html('<h4 style="color:red">'+data.msg+'</h4>');
						$('.close').click(function(){
							 window.location.reload();
							});
						}
						else
						{
							$('#StatusChng1').modal('show');
							$('#StatusChng1').find('.modal-body').html('<h4 style="color:red;text-align:center;">'+data.msg+'</h4>');
							$('.close').click(function(){
								 window.location.reload();
							});
						}
					}
			},
			else:function(data)
			{
				alert('NETWORK:ERROR');
			}
          });
        }
     
    </script>

		<script>
		var base_url = "<?php echo base_url(); ?>";
	/////filetr function starts here///////////
     function getfiletr(){
		 
		
		 var description=$.trim($("#description").val()); 
		 var weight=$.trim($("#weight").val()); 
		 var minprice=$.trim($("#minprice").val()); 
		 var maxprice=$.trim($("#maxprice").val()); 
		 var selectparent=$.trim($("#selectparent").val());
		 var selectsub = $.trim($("#selectsub").val());
		 var t2=$.trim($("#selectsub").val());
		var staffid='<?php echo $staffid;?>';
		 
		if(description == '' && weight == '' && minprice == '' && maxprice == '' && selectparent == '')
		{
			$('#productview').show();  
			$('#individualProducts').hide(); 
			$('#FilteredProducts').hide();
		}
		if(selectparent=='' && selectsub == '')
		{
			 //alert("selectparent is"+selectparent);
			  jQuery('#selectsub').children('option').css('display','');
				 $('#selectsub').val('');
		}
		 if(t2!= '')
		 {
			var t=$('#selectsub option:selected').attr('id');
			//alert("id is"+t);
			$('#selectparent').val(t);
			jQuery('#selectsub').children('option').css('display','none');
			//jQuery('#selectsub').children('option[value=""]').css('display','');
			jQuery('#selectsub').children('option[id="'+t+'"]').css('display','');
			//$('#selectsublist').val('');
			var t1=$.trim($("#selectparent").val());
			if(t1=='' && selectparent == '')
			{
				
			//alert("parent valueis"+t1);
			}
			else
			{
				//alert("parent valueis"+t1);
			if(t!='')
			{
				if(t1!=""){
					
				jQuery('#selectsub').children('option').css('display','none');jQuery('#selectsub').children('option[id="selectsubca"]').css('display','');
				jQuery('#selectsub').children('option[id="'+t1+'"]').css('display','');
				//alert("sub is"+selectsub);
				if(t==t1)
				{
				$('#selectsub').val(selectsub);
				}
				else{
					$('#selectsub').val('');
				}
					
			}
		
			}
				 
		 }
		 }
		 if(selectparent!='')
		 {
			 $('#selectparent').val(selectparent);
			 jQuery('#selectsub').children('option').css('display','none');
			jQuery('#selectsub').children('option[value=""]').css('display','');
			jQuery('#selectsub').children('option[id="'+selectparent+'"]').css('display','');
			 //alert("selectparent is"+selectparent);
			 
			 if(selectparent==t)
			 {
				  $('#selectsub').val(selectsub);
			 }
			 else{
			 $('#selectsub').val('');
			 jQuery('#selectsub').children('option[value=""]').css('display','');
			 $('#selectsublist').val('');
			 $(".selectsublist option[id='a1']").each(function() {
				$(this).remove();
					});
			 }
				 
		 }else{
		 if(selectparent=="")
		 {
			 if(t1=="")
			 {
				 if(selectsub=='')
				 {
			  //alert("selectparent is"+selectparent);
			  jQuery('#selectsub').children('option').css('display','');
				 $('#selectsub').val('');
				 jQuery('#selectsub').children('option[value=""]').css('display','');
				 $('#selectsublist').val('');
				 $(".selectsublist option[id='a1']").each(function() {
				$(this).remove();
					});
				 
				 
					}
			 else{
				 // alert("selectparent is"+selectparent);
			  jQuery('#selectsub').children('option').css('display','');
			  jQuery('#selectsub').children('option[value=""]').css('display','');
				 $('#selectsub').val(t);
			 }
			}
			
		 }
		 }
         
			var finalparent=$.trim($("#selectparent").val());
		 var finalsubcat = $.trim($("#selectsub").val());
		 var selectlist = $.trim($("#selectsublist").val());
		  var selectgender=$.trim($("#selectgender").val());
		  var selectproductcategory=$.trim($("#selectproductcategory").val());
		 if(selectlist=='' && finalparent!='' && finalsubcat !='')
		 {
			
		 getSubCatlist(finalparent,finalsubcat);
		 }
		 
		 
		  var selectsublist = $.trim($("#selectsublist").val());
		  if(finalparent=='' && finalsubcat=='' && selectsublist=='' && selectgender=='' && selectproductcategory=='' && description=='' && weight=='' && minprice=='' && maxprice=='')
		  {
			   
		  }
		  else
		  {
			 
		 			 
		var uid= '<?php echo $auid;?>';
		var staffid= '<?php echo $staffid;?>';

          $.ajax({	
		url:"<?php echo base_url(); ?>EcoDashAdmin/FilterSide",
		method : "POST", 
		data:{'get':'getFilterProducts','uid':uid,'staffid':staffid,'description':description,'weight':weight,'minprice':minprice,'maxprice':maxprice,'selectparent':finalparent,'selectsub':finalsubcat,'selectsublist':selectsublist,'selectgender':selectgender,'selectproductcategory':selectproductcategory},
		success:function(data){
			//alert(catId); 
			data = $.parseJSON(data);       
			var html='<div class="shop-product-wrap grid gridview-3 row">';   
			if(data.getFilterProducts!='') 
			{
						 	
				var n = 1; 
				var gender='';
				var pricestatus='';
				var pstatus='';
				$.each(data.getFilterProducts, function(i){
					var row = data.getFilterProducts[i];
						if(row.gender1==1)
					{
					    gender='<span class="sticker">Male</span>';
					}
					else
					{
    					   if(row.gender1==2)
    					{
    					    gender='<span class="sticker">Female</span>';
    					}
    					else
    					{
    					    gender='';
    					}
					}
					if(staffid==0)
					{
					    pricestatus='<div class="price-box"><span class="new-price">Rs '+row.TotalPrice+'</span></div><div class="additional-add_action"><ul><li class="addtocart1"><label class="container"><input type="checkbox" name="check1[]" value="1" id="checks1" class="checks1" checked style="display:inline;" ><label class="pricestat" >Show</label><span class="checkmark"></span></label></li></ul></div>';
					}
					else
					{
					   
					    if(row.pricestatus==1)
					    {
					    
					    pricestatus='<div class="price-box" ><span class="new-price">Rs '+row.TotalPrice+'</span></div><div class="additional-add_action"><ul><li class="addtocart1"><label class="container" style="display:none;"><input type="checkbox" name="check1[]" value="1" id="checks1" class="checks1" checked style="display:inline;" ><label class="pricestat" >Show</label><span class="checkmark"></span></label></li></ul></div>';
					}
					else
					{
					   pricestatus='<div class="price-box" style="display:none;" ><span class="new-price">Rs '+row.TotalPrice+'</span></div><div class="additional-add_action"><ul><li class="addtocart1"><label class="container" style="display:none;"><input type="checkbox" name="check1[]" value="1" id="checks1" class="checks1" checked style="display:inline;" ><label class="pricestat" >Show</label><span class="checkmark"></span></label></li></ul></div>'; 
					}
					}
					
					
					html+='<div class="col-lg-3"><div class="slide-item"><div class="single_product"><label class="image-checkbox"><div class="product-img"><img class="primary-img" src="'+row.Image+'" alt="Product Image"><input type="checkbox" name="check[]" value="'+row.ProductId+'" id="checks"><i class="fa fa-check hidden"></i>'+gender+'</div></label><div class="hiraola-product_content"><div class="product-desc_info"><h5><a class="product-name" href="javascript:void(0)" style="text-decoration:none;">'+row.ProductName+'</a></h5>'+pricestatus+'</div></div></div></div></div>';
					
					

				});
				html+'</div>';
			}  
			else
				html+='<div class="col-lg-4"><div class="slide-item" style="font-size:1.6em;" >Sorry, there are no products..</div></div>';
			
			$('#productview').hide();  
			$('#individualProducts').hide(); 
			$('#FilteredProducts').show(); 			
			$('#FilteredProducts').html(html)
			
		}
	});
		 }
	  
	 }
	

	 function getSubCatlist(finalparent,finalsubcat)
	 {
		 var parent=finalparent;
		 var subcat=finalsubcat;
		 if(parent != '' && subcat!='')
		{
			$.ajax({
				url:"<?php echo base_url(); ?>EcoDashAdmin/FilterSide",
				type:"POST",
				data:{'get':'subcategory','pcatname':parent,'scatname':subcat},
				beforesend:function() {},
				complete:function() {},
				success:function(data)
				{
					
					data = $.parseJSON(data);
					var html = '<option value="">Select Sub List</option>';
					$.each(data,function(i){ 
						var scat = data[i]; 
						
						html+="<option value='"+scat.SubCategoryId+"' data-tokens='Rings' id='a1'>"+scat.SubCategoryName+"</option>";
					}); 

					$('#selectsublist').html(html);
				} 
			});
		}
		 
	 }		 
		
		/////filetr function end here///////////		
		
		function getproductsparent(parentid) 
		{
			
		    var	parentid=$.trim(parentid);
			var uid= '<?php echo $auid;?>' 
          $.ajax({	
		url:"<?php echo base_url(); ?>EcoDashAdmin/clickparentSide",
		method : "POST", 
		data:{'get':'getAdminparentProductsSide','parentid':parentid,'uid':uid},
		success:function(data){
			//alert(catId); 
			data = $.parseJSON(data);       
			var html='<div class="shop-product-wrap grid gridview-3 row">';   
			if(data.getSidePro1!='') 
			{
						 	
				var n = 1; 
				var jid = '<?php echo $auid ?>';
				var gender='';
				$.each(data.getSidePro1, function(i){
					var row = data.getSidePro1[i];
						if(row.gender1==1)
					{
					    gender='<span class="sticker">Male</span>';
					}
					else
					{
    					   if(row.gender1==2)
    					{
    					    gender='<span class="sticker">Female</span>';
    					}
    					else
    					{
    					    gender='';
    					}
					}
					html+='<div class="col-lg-3"><div class="slide-item"><div class="single_product"><div class="product-img"><img class="primary-img" src="'+row.Image+'" alt="Product Image">'+gender+'<div class="add-actions"><ul><li><a class="hiraola-add_cart" href="javascript:void(0)" onclick="ccart('+row.ProductId+','+jid+')"data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Cart"><i class="ion-bag"></i></a></li></ul></div></div><div class="hiraola-product_content"><div class="product-desc_info"><h5><a class="product-name" href="javascript:void(0)">'+row.ProductName+'</a></h5><div class="price-box"><span class="new-price">Rs '+row.TotalPrice+'</span></div><div class="additional-add_action"><ul><li class="addtocart1"><a style="color:#ffffff;text-decoration:none;" class="hiraola-add_compare addtocart" href="javascript:void(0)"  onclick="ccart('+row.ProductId+','+jid+')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Wishlist">Add &nbsp;<i class="ion-bag"></i></a></li></ul></div></div></div></div></div></div>';
					
					

				});
				html+'</div>';
			}  
			else
				html+='<div class="col-lg-4"><div class="slide-item" style="font-size:1.6em;">Sorry, there are no products..</div></div>';
			
			$('#productview').hide();  
			$('#FilteredProducts').hide(); 
			$('#individualProducts').show();  
			$('#individualProducts').html(html)  
			
		}
	}); 
		  }
		function getproducts(catId,parentid) 
		{
			catId = $.trim(catId); 
			uid = '<?php echo $auid ?>';
			parentid=$.trim(parentid);
          $.ajax({	
		url:"<?php echo base_url(); ?>EcoDashAdmin/clickSide",
		method : "POST", 
		data:{'get':'getAdminProductsSide','catId':catId,'uid':uid,'parentid':parentid},
		success:function(data){
			//alert(catId); 
			data = $.parseJSON(data);       
			var html='<div class="shop-product-wrap grid gridview-3 row">';   
			if(data.getSidePro!='') 
			{
						 	
				var n = 1; 
				var gender='';
				$.each(data.getSidePro, function(i){
					var row = data.getSidePro[i];
						if(row.gender1==1)
					{
					    gender='<span class="sticker">Male</span>';
					}
					else
					{
    					   if(row.gender1==2)
    					{
    					    gender='<span class="sticker">Female</span>';
    					}
    					else
    					{
    					    gender='';
    					}
					}
					html+='<div class="col-lg-3"><div class="slide-item"><div class="single_product"><div class="product-img"><img class="primary-img" src="'+row.Image+'" alt="Product Image">'+gender+'<div class="add-actions"><ul><li ><a class="hiraola-add_cart" href="javascript:void(0)" onclick="ccart('+row.ProductId+','+uid+')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Cart"><i class="ion-bag"></i></a></li></ul></div></div><div class="hiraola-product_content"><div class="product-desc_info"><h6><a class="product-name" href="javascript:void(0)">'+row.ProductName+'</a></h6><div class="price-box"><span class="new-price">Rs '+row.TotalPrice+'</span></div><div class="additional-add_action"><ul><li class="addtocart1"><a style="color:#ffffff;text-decoration:none" class="hiraola-add_compare addtocart" href="javascript:void(0)" onclick="ccart('+row.ProductId+','+uid+')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Wishlist">ADD &nbsp;<i class="ion-bag"></i></a></li></ul></div></div></div></div></div></div>';

				});
				html+'</div>';
			}  
			else
				html+='<div class="col-lg-4"><div class="slide-item" style="font-size:1.6em;">Sorry, there are no products..</div></div>';
			
			$('#productview').hide();
			$('#FilteredProducts').hide(); 			
			$('#individualProducts').show();  
			$('#individualProducts').html(html)  
			
		}
	}); 
		  }
	
	
	function ccart(id,uid) 
{
	id = $.trim(id);
	uid= $.trim(uid);	
	if(id!='')
	{
	//	alert("added"+id+'And user is'+uid);
		/*$.ajax({
			url:"<?php echo base_url(); ?>EcoDashAdmin/cart",
			type:"POST",
			data:{'add':'Admincart','id':id,'uid':uid},
			success:function(data)
			{
				var data = $.parseJSON(data);  
					if(data.err == '0')
					{
						$('#StatusChng').modal('show');
						$('#StatusChng').find('.modal-body').html('<h4 style="color:green;text-align:center;">'+data.msg+'</h4>');

						$('.close').click(function(){
							//window.location.reload();
							cartCount(); 
						});
					}   
					else 
					{
						if(data.err == '1')
						{
						$('#StatusChng').modal('show');
						$('#StatusChng').find('.modal-body').html('<h4 style="color:red">'+data.msg+'</h4>');
						$('.close').click(function(){
							 //window.location.reload();
							});
						}
						else
						{
							$('#StatusChng').modal('show');
							$('#StatusChng').find('.modal-body').html('<h4 style="color:red;text-align:center;">'+data.msg+'</h4>');
							$('.close').click(function(){
								 //window.location.reload();
							});
						}
					}
			},
			else:function(data)
			{
				alert('NETWORK:ERROR');
			}
		});*/
	}
}
function cartCount()
{
    var a='<?php echo $auid; ?>';

	$.ajax({
			url:"<?php echo base_url(); ?>EcoDashAdmin/cartcount",
			type:"POST",
			data:{'cartcount':'cartcount1','uid':a},
			success:function(data)
			{
				var data = $.parseJSON(data);
				
				html='<i class="ion-bag" aria-hidden="true" style="font-size:23px;color:white;" id="cartC"> '+data+'</i>';
				
				 $("#cartC").replaceWith(html);
	
			}
	})
}

 $('.checkbox_selector').click(function(){
	//	alert('checkall');
		$(".image-checkbox").addClass('image-checkbox-checked');
		//$(".checkBoxClass").prop('checked', $(this).prop('checked'));
		$("#myDiv").css('display','');
		 var clNames = $(".checkBoxClass"); 
		 console.log(clNames); 
		        
		clNames.prop("checked", !clNames.prop("checked")); 
		  
	});    
	   
	/*$('.checkbox_selector').change(function () { 
	$(".image-checkbox").addClass('image-checkbox-checked');
	$("#myDiv").css('display','');
	
	var checkBoxes = $(".checkBoxClass");
	console.log(checkBoxes);     
  checkBoxes.prop("checked", !checkBoxes.prop("checked"));  
});*/
		
</script>

