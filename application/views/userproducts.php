<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<style>
.selectparent{
	min-width: 110%;
    height: 35px;
}
.selectparent1{
	float:left;
	width:60%;
    height: 35px;
}
.selectparent2{
	
	float:right;
   
	width:60%;
	position: absolute;
	left: 124px;
	 height: 35px;
}
.tagweightwidth{
	width:130px;
}

.price-slider {
  width: auto;
  margin: auto;
  text-align: center;
  position: relative;
 height: 1em;
 color: black;
}
.price-slider svg,
.price-slider input[type=range] {

	margin-left:15px;
	width:90%;
  position: absolute;
  left: 0;
  top:25px;
  bottom: 0;
  color: black;
}

input[type=range]:focus::-ms-fill-upper {
  background: black;
  color: black;
}
input[type=range]::-webkit-slider-runnable-track {
  width: 100%;
  height: 5px;
  cursor: pointer;
  animate: 0.2s;
  background: black;
  color: black;
  border-radius: 1px;
  box-shadow: none;
  border: 0;
}
input[type=range]::-webkit-slider-thumb {
  z-index: 2;
  position: relative;
  box-shadow: 0px 0px 0px #000;
  border: 1px solid #1da1f2;
  height: 18px;
  width: 18px;
  border-radius: 25px;
  background: black;
  color: black;
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: -7px;
}

input[type=range]::-moz-range-track {
  width: 100%;
  height: 5px;
  cursor: pointer;
  animate: 0.2s;
  background: black;
  color: black;
  border-radius: 1px;
  box-shadow: none;
  border: 0;
}
input[type=range]::-moz-range-thumb {
  z-index: 2;
  position: relative;
  box-shadow: 0px 0px 0px #000;
  border: 1px solid #1da1f2;
  height: 18px;
  width: 18px;
  border-radius: 25px;
  background: black;
  color: black;
  cursor: pointer;
}
input[type=range]::-ms-track {
  width: 100%;
  height: 5px;
  cursor: pointer;
  animate: 0.2s;
  background: transparent;
  border-color: transparent;
   color: black;;
}

input[type=range]::-ms-fill-lower,
input[type=range]::-ms-fill-upper {
  background: black;
  color: black;
  border-radius: 1px;
  box-shadow: none;
  border: 0;
}
input[type= ]::-ms-thumb {
  z-index: 2;
  position: relative;
  box-shadow: 0px 0px 0px #000;
  border: 1px solid #1da1f2;
  height: 18px;
  width: 18px;
  border-radius: 25px;
  background: black;
  color: black;
  cursor: pointer;
}
.pricevalues 
{
/*	padding: 5px; */ 
font-size: 17px;
    color: #492c10;
	padding-top: 10px;
	margin-left: 0px;
   /* margin: 5px; */
}
.mrgnclass{
    
    margin-left:-50px
}
.valuedata{

color: #030303;
border: 1px solid #492c10;
}
.productstop{
    font-size: 20px;
    color: #492c10;
    font-weight: 600;
    
}
.pricetop{
    padding-bottom:10px;
    font-size: 20px;
    color: #492c10;
    font-weight: 600;
}
</style>
			 
			 		<!-- //banner-top -->
	<div class="modal fade" id="StatusChng" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" style="padding-top: 1em;
    margin-left: 0px;">&times;</button>
				<h3 class="modal-title text-center" style="margin-right:auto;margin-left:auto;font-size:21px">Premlal</h3>
			</div>
			<div class="modal-body">

				<div class="button-group text-center">
					<button class="btn btn-primary kc-sucess-btn" id="ChangStat">Submit</button>
				</div>    
			</div>    
		</div>  
	</div>     
</div> 
			 <!--------shopping cart  ends--------->
           
       

		<div class="hiraola-content_wrapper">
            <div class="container">   
                <div class="row">  
                   <div class="col-lg-3 order-2 order-lg-1 mrgnclass">  
				      <div>
						 <div class="price-panel" style="padding-top:10px;    margin-bottom: 85px;">
						<span class="pricetop">Price</span>
								<div class="price-slider">
  <input value="0" id="rangemeter" min="0" max="<?php echo round($MaxPrice['price']+200);?>" step="1" type="range" onclick="my()"/>
  <input value="<?php echo round($MaxPrice['price']+200);?>" id="rangemeter" min="0" max="<?php echo round($MaxPrice['price']+200);?>" step="1" type="range" onclick="my()"/>
<br/><br/>
<span class="pricevalues">RS
    <input type="number" id="minval" class="valuedata" value="0" min="0" max="<?php echo round($MaxPrice['price']+200)?>" onchange="my();"> RS
    <input type="number" id="maxval" class="valuedata" value="<?php echo round($MaxPrice['price']+200);?>" min="0" max="<?php echo round($MaxPrice['price']+200);?>" onchange="my()"></span>
</div>
						</div>
						
						</div>
					<div class="frequently-accordion" style="margin-top:115px;">
					
                            <div id="accordion" style="width:91%"> 
							<?php     
							
							foreach($mainmenu as $mcat)  
								{ 
									?>
                                <div class="card actives">
                                    <div class="card-header" id="headingOne" style="background:white;">
                                        <h5 class="mb-0" style="color: black;font-size: 18px;">
              <a href="javascript:void(0)" style="
    color: black;
    font-size: 17px;text-decoration: none;
" class="collapsed" data-toggle="collapse" data-target="#collapseOne<?php echo $mcat['CategoryId'];?>" aria-expanded="false" aria-controls="collapseOne" onclick="getproductsparent1(<?php echo $mcat['CategoryId'];?>)">
                                                <?php echo $mcat['CategoryName'];?>
                                            </a>
                                        </h5>
                                    </div>
            <div id="collapseOne<?php echo $mcat['CategoryId'];?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
                            <div class="card-body">
										<?php
										$a=$mcat['CategoryName'];
										
										foreach($submenu as $subcat)
										{
											if($subcat['CategoryName']==$a)
											{?>
          <li class=" subcats" style="list-style:none;"> <i class="fa fa-long-arrow-right" aria-hidden="true" style="font-size:15px;"></i> <a href="javascript:void(0);" style="
    color: black;text-decoration: none;font-size:16px;" onclick="getproducts('<?php echo $subcat["subcategory_name_id"];?>','<?php echo $this->session->userdata('uid1') ;?>','<?php echo $mcat['CategoryId'];?>') "> <?php echo $subcat['Title'];?><?php if($subcat['Title']=='Men') {   ?>&nbsp;&nbsp;<img style="width:11%;" src="<?php echo base_url('images')?>/ma.png"> <?php } else {if($subcat['Title']=='Women') { ?>&nbsp;&nbsp;<img style="width:11%;" src="<?php echo base_url('images')?>/female.png"> <?php  } } ?>
   </a></li>
		
										<?php
										}	
										
										}
										?>
                                        </div>
                                    </div>
                                </div>
								<?php } ?>
								
                            </div>
							
							
							
                        </div>  
						
						
						
                       
					<!-- price range filter starts -->
			
					<!-- price range filter ends -->
					
						
                    </div>
					
					
                    <div class="col-lg-9 order-1 order-lg-2">
                         <div class="shop-toolbar">
						 <span class="productstop">Products</span>
						 <?php if(!empty($staffinfo))
						 {
						     ?>
						 
    						 <span class="productstop" style="font-size:16px;">For more Assistance Call : <span style="font-size:14px;color:blue;"><?php echo $staffinfo['staffnumber'];?></span>
    		                 </span>
    		              <?php } ?>
						<!--<div class="container">
					<div class="row" >
					 <div class="col-md-3"> 
							<div class="form-group">
								<label>Main Category</label>  
							<select name="selectparent" id="selectparent" onChange="getfiletr()" class="selectparent" style="color: #888888;">
							<option value=""  style="color: #888888;">Select Category</option>
							<?php foreach($mainmenu as $mcat)
								{ 
									?>
									<option value="<?php echo $mcat['CategoryId']; ?>" id="<?php echo $mcat['CategoryId'];  ?>" style="    color: #888888;"><?php echo $mcat['CategoryName'] ?></option>
									
									<?php
								}
									?>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Sub Category:</label>
							<select name="selectsub" id="selectsub" onChange="getfiletr()" class="selectparent" style="color: #888888;">
							<option value="" id="selectsubca"  style="color: #888888;">Select Sub Category</option>
							<?php foreach ($mainmenu as $mcat)
							{
								?><option value="" id="<?php echo $mcat['CategoryId'];?>" style="font-weight:bold;color:#85501b;"><?php echo $mcat['CategoryName'];?></option>
								<?php foreach($submenu as $scat)
								{
									if($mcat['CategoryId']==$scat['CategoryId'])
									{
										
								?>
							
							
							<option value="<?php echo $scat['SubCategoryId'];?>" id="<?php echo $scat['CategoryId'];?>" style="color: #888888;"><?php echo $scat['SubCategoryName'];?></option>
							
							<?php } } } ?>
							</select>
						</div>
					</div>
					<div class="col-md-3" style=
					"display:none;">
						<div class="form-group">
							<label>Sub Category List:</label>
							<select name="selectsublist" id="selectsublist" onChange="getfiletr()" class="selectparent" style="color: #888888;">
							<option value="">Select Sub List</option>
							
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Select Gender</label>
							<select name="gender" id="selectgender" onChange="getfiletr()" class="selectparent" style="color: #888888;">
							<option value="" style="color: #888888;">Select Gender</option>
							<option value="1" style="color: #888888;">Male</option>
							<option value="2" style="color: #888888;">Female</option>
							
							</select>
						</div>
					</div>
					<div class="col-md-3" style="display:none">
								<div class="form-group">
								 <label for="male">Enter Tag No:</label>
									<input type="" name="tagno" id="tagno"placeholder="Enter Tag No" onkeyup="getfiletr()" class="selectparent">
								</div>
						</div>
							
							<div class="col-md-3" style="display:none">
								<div class="form-group">
								 <label for="weight">Enter Weight:</label>
									<input type="" name="weight" id="weight" placeholder="Enter Weight" onkeyup="getfiletr()" class="selectparent">
									</div>
								</div>
							<!--<div class="col-md-3">
									<div class="form-group">			
									<label for="price-min">Price:</label>
									<div>
									<input type="text" class="selectparent1" placeholder="min" onkeyup="getfiletr()" id="minprice" name="minprice">
									<input type="text" class="selectparent2" id="maxprice" name="maxprice" placeholder="max"onkeyup="getfiletr()">
									</div>
								  </div>
	                          </div>
						
							
							</div>
							</div>-->
						
                        </div>
						<div id="productview">
                        <div class="shop-product-wrap grid gridview-3 row">
              <!----- loop starts here   --------->            
            <?php  foreach($products as $pd)
			 {
				 ?>
						  <div class="col-lg-4">
                                <div class="slide-item">
                                    <div class="single_product">
                                        <div class="product-img">
                                            <a href="<?php echo base_url('products/'.$pd['ProductId']) ;?>">
			<img class="primary-img" src="<?php echo $pd['Image'];?>" alt=" Product Image">
											
                                                <!---<img class="primary-img" src="<?php echo $pd['Image'];?>" alt=" Product Image">
          <!--<img class="secondary-img" src="<?php echo $pd['Image'];?>" alt=" Product Image">--->
                                            </a>
                                            	<?php if($pd['gender1']=='1')
							{ ?>
							<span class="sticker">Male</span> 
					        <?php }
					        else if($pd['gender1']=='2')
					        {?>	<span class="sticker">Female</span>
					        <?php } ?>
                                            <div class="add-actions">
                                                <ul>
  <li><a class="hiraola-add_cart" href="javascript:void(0)" onclick="ccart(<?php echo $pd['ProductId'];?>,'<?php echo $this->session->userdata('uid1') ;?>')"data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Cart"><i class="ion-bag"></i></a></li>
 
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="hiraola-product_content">
                                            <div class="product-desc_info">
              <h5><a class="product-name" style="font-size: 16px;
    color: black;" href="<?php echo base_url('products/'.$pd['ProductId']) ;?>">
			  <?php echo $pd["ProductName"]; ?></a></h5>
									<?php if($pd['pricestatus']!=0)
									{ ?>
                                         <div class="price-box">
        <span class="new-price"><?php echo "Rs ". $pd["TotalPrice"]; ?></span>
                                                </div>
									<?php } else { ?>
									<div class="price-box">
        <span class="new-price">&nbsp;</span>
                                                </div>
									<?php } ?>
                                                <div class="additional-add_action">
                                                    <ul>
       <!--  <li class="addtocart1"><a style="color:#ffffff;text-decoration:none" onclick="ccart(<?php echo $pd['ProductId'];?>,'<?php echo $this->session->userdata('uid1') ;?>')"class="hiraola-add_compare addtocart" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Wishlist">Add &nbsp;<i class="ion-bag"></i></a></li> -->
                                                    </ul>
                                                </div>
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
							<?php  }  ?>
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
		
		<div class="hiraola-footer_area">
            <div class="footer-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 wow  animated animated" data-wow-delay="0.9s" style="visibility: visible; animation-delay: 0.9s; animation-name: fadeInDown;">
                            <div class="footer-widgets_info">
                                <div class="footer-widgets_logo"> 
                                    <a href="<?php echo base_url('');?>">
                                        <img src="<?php echo base_url('frontendassets');?>/images/plogo.png" alt="Hiraola's Footer Logo">
                                    </a>
                                </div>
                               
                                <div class="hiraola-social_link">
                                    <ul>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com" data-toggle="tooltip" target="_blank" title="" data-original-title="Facebook">
                                                <i class="fab fa-facebook" style="color:white;"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="https://twitter.com" data-toggle="tooltip" target="_blank" title="" data-original-title="Twitter">
                                                <i class="fab fa-twitter-square" style="color:white;"></i>
                                            </a>
                                        </li>
                                        <li class="google-plus">
                                            <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="" data-original-title="Google Plus">
                                                <i class="fab fa-google-plus" style="color:white;"></i>
                                            </a>
                                        </li>
                                        <li class="instagram">
                                            <a href="https://rss.com" data-toggle="tooltip" target="_blank" title="" data-original-title="Instagram">
                                                <i class="fab fa-instagram" style="color:white;"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 wow  animated animated" data-wow-delay="0.9s" style="visibility: visible; animation-delay: 0.9s; animation-name: fadeInDown;">
                            <div class="footer-widgets_area">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="footer-widgets_title">
                                            <h6 style="color:white;">Product</h6>
                                        </div>
                                        <div class="footer-widgets">
                                            <ul>
                                                <li><a href="#" style="color:white;">Gold</a></li>
                                                <li><a href="#" style="color:white;">Diamond</a></li> 
                                                <li><a href="#" style="color:white;">Platinum</a></li>
                                                <li><a href="#" style="color:white;">Contact us</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="footer-widgets_info">
                                            <div class="footer-widgets_title">
                                                <h6 style="color:white;">About Us</h6>
                                            </div>
                                            <div class="widgets-essential_stuff">
                                                <ul>
                                                    <li class="hiraola-address" style="color:white;"><i class="ion-ios-location" style="color:white;"></i><span style="color:white;">Address:</span> Rashtrapati Rd, near Voltas Limited, Avulamanda, Kalasiguda, Secunderabad, Telangana 500003</li>
                                                    <li class="hiraola-phone" style="color:white;"><i class="ion-ios-telephone" style="color:white;"></i><span style="color:white;">Call Us:</span> <a href="tel://+123123321345">+123 321 345</a>
                                                    </li>
                                                    <li class="hiraola-email" style="color:white;"><i class="ion-android-mail" style="color:white;"></i><span style="color:white;">Email:</span> <a href="mailto://info@yourdomain.com">info@yourdomain.com</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="instagram-container footer-widgets_area">
                                            <div class="footer-widgets_title">
                                                <h6 style="color:white;">Sign Up For Newslatter</h6>
                                            </div>
                                            <div class="widget-short_desc">
                                                <p style="color:white;">Subscribe to our newsletters now and stay up-to-date with new collections</p>
                                            </div>
                                            <div class="newsletter-form_wrap">
                                                <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="newsletters-form validate" target="_blank" novalidate="">
                                                    <div id="mc_embed_signup_scroll">
                                                        <div id="mc-form" class="mc-form subscribe-form">
                                                            <input id="mc-email" class="newsletter-input" type="email" autocomplete="off" placeholder="Enter your email">
                                                            <button class="newsletter-btn" id="mc-submit">
                                                                <i class="ion-android-mail" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom_area wow  animated animated" data-wow-delay="0.9s" style="visibility: visible; animation-delay: 0.9s; animation-name: fadeInLeft;">
                <div class="container">
                    <div class="footer-bottom_nav">
                        <div class="row">
                           
                           
                            <div class="col-lg-12">
                                <div class="copyright">
                                    <span style="color:white;">Copyright © 2020 <a href="#">Prem Raj Jewellery.</a> All rights reserved. Designed By <a href="https://skybell.in">SKYBELL</a></span>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
		
		   <!-- Main JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/main.js"></script> 
<!--<script src="<?php echo base_url('frontendassets');?>/js/wow.min.js"></script>-->
 
<!--<script>-->
<!--		 new WOW().init();-->
		 
<!--</script>-->

<script  type="text/javascript" src="<?php echo base_url('frontendassets');?>/function1.js"></script>

 <script>

 function my()
 {
	var a=$('#minval').val();
	var b=$('#maxval').val();
	//alert(a+' AND '+b); 
 }
 </script>
	<script>
	
		var base_url = "<?php echo base_url(); ?>";
		
		
		//var base_url = "<?php echo base_url(); ?>";
	/////filetr function starts here///////////
     function getfiletr(){
		
		// var tagno=$.trim($("#tagno").val()); 
		// var weight=$.trim($("#weight").val()); 
		 var minprice=$.trim($("#minprice").val()); 
		 var maxprice=$.trim($("#maxprice").val()); 
		 var selectparent=$.trim($("#selectparent").val());
		 var selectsub = $.trim($("#selectsub").val());
		 var t2=$.trim($("#selectsub").val());
		
		 
		if(minprice == '' && maxprice == '' && selectparent == '')
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
			//jQuery('#selectsub').children('option[value=""]').css('display','');
			jQuery('#selectsub').children('option[id="'+selectparent+'"]').css('display','');
			 //alert("selectparent is"+selectparent);
			 
			 if(selectparent==t)
			 {
				  $('#selectsub').val(selectsub);
			 }
			 else{
			 $('#selectsub').val('');
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
				 $('#selectsublist').val('');
				 $(".selectsublist option[id='a1']").each(function() {
				$(this).remove();
					});
				 
				 
					}
			 else{
				 // alert("selectparent is"+selectparent);
			  jQuery('#selectsub').children('option').css('display','');
				 $('#selectsub').val(t);
			 }
			}
			
		 }
		 }
         
			var finalparent=$.trim($("#selectparent").val());
		 var finalsubcat = $.trim($("#selectsub").val());
		 var selectlist = $.trim($("#selectsublist").val());
		  var selectgender=$.trim($("#selectgender").val());
		 if(selectlist=='' && finalparent!='' && finalsubcat !='')
		 {
		 getSubCatlist(finalparent,finalsubcat);
		 }
		 
		 
		  var selectsublist = $.trim($("#selectsublist").val());
		  
		var uid='<?php echo $this->session->userdata("uid1");?>';
          $.ajax({	
		url:"<?php echo base_url(); ?>Welcome/UserFilterSide",
		method : "POST", 
		data:{'get':'getFilterProducts','uid':uid,'minprice':minprice,'maxprice':maxprice,'selectparent':finalparent,'selectsub':finalsubcat,'selectsublist':selectsublist,'selectgender':selectgender},
		success:function(data){
			//alert(catId); 
			data = $.parseJSON(data);       
			var html='<div class="shop-product-wrap grid gridview-3 row">';   
			if(data.getFilterProducts!='') 
			{
						 	
				var n = 1; 
				var gender='';
				var showdata='';
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
					if(row.pricestatus=='1')
					{
						showdata='<div class="price-box"><span class="new-price">Rs '+row.TotalPrice+'</span></div>';
					}
					else
					{
						showdata='';
					}
					html+='<div class="col-lg-4"><div class="slide-item"><div class="single_product"><div class="product-img"><a href="'+base_url+'products/'+row.ProductId+'"><img class="primary-img" src="'+row.Image+'" alt="Product Image"></a>'+gender+'<div class="add-actions"><ul><li><a class="hiraola-add_cart" href="javascript:void(0)" onclick="ccart('+row.ProductId+','+uid+')"data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Cart"><i class="ion-bag"></i></a></li></ul></div></div><div class="hiraola-product_content"><div class="product-desc_info"><h5><a class="product-name" href="javascript:void(0)" style="font-size: 16px;color: black;" >'+row.ProductName+'</a></h5>'+showdata+'<div class="additional-add_action"><ul></ul></div></div></div></div></div></div>';
					
					//<li class="addtocart1"><a style="color:#ffffff;text-decoration:none;" class="hiraola-add_compare addtocart" href="javascript:void(0)"  onclick="ccart('+row.ProductId+','+uid+')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Wishlist">Add &nbsp;<i class="ion-bag"></i></a></li>

				});
				html+'</div>';
			}  
			else
				html+='<div class="col-lg-4"><div class="slide-item">Sorry, You dont have permission to view product..</div></div>';
			
			$('#productview').hide();  
			$('#individualProducts').hide(); 
			$('#FilteredProducts').show(); 			
			$('#FilteredProducts').html(html)
			
		}
	});
	  
	 }
	
		//Accordian menu script starts 
	 function getSubCatlist(finalparent,finalsubcat)
	 {
		 var parent=finalparent;
		 var subcat=finalsubcat;
		 if(parent != '' && subcat!='')
		{
			$.ajax({
				url:"<?php echo base_url(); ?>Welcome/UserFilterSide",
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
						html+="<option value='"+scat.subcategory_name_id+"' id='a1'>"+scat.Title+"</option>";
					});

					$('#selectsublist').html(html);
				}
			});
		}
		 
	 }		 
		
		
		
		function getproductsparent1(parentid) 
		{
			
			parentid=$.trim(parentid);
		//	alert(parentid);
			getMin = $('#minval').val();    
            getMax = $('#maxval').val();	  	 
           //	alert(getMax);   
          $.ajax({	
		url:"<?php echo base_url(); ?>EcoDashAdmin/clickparentSide1",
		method : "POST", 
		data:{'get':'getAdminparentProductsSide','parentid':parentid,'min':getMin,'max':getMax},
		success:function(data){
			//alert(catId); 
			data = $.parseJSON(data);       
			var html='<div class="shop-product-wrap grid gridview-3 row">';   
			if(data.getSidePro1!='') 
			{
						 	
				var n = 1; 
				var gender='';
				var showdata='';
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
					if(row.pricestatus=='1')
					{
						showdata='<div class="price-box"><span class="new-price">Rs '+row.TotalPrice+'</span></div>';
					}
					else
					{
						showdata='';
					}
					html+='<div class="col-lg-4"><div class="slide-item"><div class="single_product"><div class="product-img"><a href="'+base_url+'products/'+row.ProductId+'"><img class="primary-img" src="'+row.Image+'" alt="Product Image"></a>'+gender+'<div class="add-actions"><ul><li><a class="hiraola-add_cart" href="javascript:void(0)" onclick="ccart('+row.ProductId+','+row.uid+')"data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Cart"><i class="ion-bag"></i></a></li></ul></div></div><div class="hiraola-product_content"><div class="product-desc_info"><h5><a class="product-name" href="'+base_url+'products/'+row.ProductId+'" style="font-size: 16px;color: black;">'+row.ProductName+'</a></h5>'+showdata+'<div class="additional-add_action"><ul></ul></div></div></div></div></div></div>';
					//<li class="addtocart1"><a style="color:#ffffff;text-decoration:none" onclick="ccart('+row.ProductId+','+row.uid+')"class="hiraola-add_compare addtocart"  href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Wishlist">Add &nbsp;<i class="ion-bag"></i></a></li>

				});
				html+'</div>';
			}  
			else
				html+='<div class="col-lg-4"><div class="slide-item">Sorry, You dont have permission to view product..</div></div>';
			
			$('#productview').hide();  
			$('#individualProducts').show();  
			$('#individualProducts').html(html)  
			
		}
	}); 
		  }
		  
		  
		function getproducts(catId,uid,parentid) 
		{
			catId = $.trim(catId); 
			uid = $.trim(uid);
		//	alert(uid); 
			parentid=$.trim(parentid);
			getMin = $('#minval').val();    
            getMax = $('#maxval').val();
          $.ajax({	
		url:"<?php echo base_url(); ?>Welcome/clickSide1",
		method : "POST", 
		data:{'get':'getAdminProductsSide','catId':catId,'uid':uid,'parentid':parentid,'min':getMin,'max':getMax},
		success:function(data){
			//alert(catId); 
			data = $.parseJSON(data);       
			var html='<div class="shop-product-wrap grid gridview-3 row">';   
			if(data.getSidePro!='') 
			{
						 	
				var n = 1; 
				var gender='';
					var showdata='';
				$.each(data.getSidePro, function(i){
				   
					var row = data.getSidePro[i];
				//	 alert(row.pricestatus); 
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
					if(row.pricestatus=='1')
					{
						showdata='<div class="price-box"><span class="new-price">Rs '+row.TotalPrice+'</span></div>';
					}
					else
					{
						showdata='';
					}
				//	alert(row.pricestatus);
				
					html+='<div class="col-lg-4"><div class="slide-item"><div class="single_product"><div class="product-img"><a href="'+base_url+'products/'+row.ProductId+'"><img class="primary-img" src="'+row.Image+'" alt="Product Image"></a>'+gender+'<div class="add-actions"><ul><li><a class="hiraola-add_cart" href="javascript:void(0)" onclick="ccart('+row.ProductId+','+uid+')"data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Cart"><i class="ion-bag"></i></a></li></ul></div></div><div class="hiraola-product_content"><div class="product-desc_info"><h5><a class="product-name" href="'+base_url+'products/'+row.ProductId+'" style="font-size: 16px;color: black;" >'+row.ProductName+'</a></h5>'+showdata+'<div class="additional-add_action"><ul> </ul></div></div></div></div></div></div><div class="col-lg-4"><div class="slide-item"><div class="single_product"><div class="product-img"><a href="'+base_url+'products/'+row.ProductId+'"><img class="primary-img" src="'+row.Image+'" alt="Product Image"></a>'+gender+'<div class="add-actions"><ul><li><a class="hiraola-add_cart" href="javascript:void(0)" onclick="ccart('+row.ProductId+','+uid+')"data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Cart"><i class="ion-bag"></i></a></li></ul></div></div><div class="hiraola-product_content"><div class="product-desc_info"><h5><a class="product-name" href="'+base_url+'products/'+row.ProductId+'" style="font-size: 16px;color: black;" >'+row.ProductName+'</a></h5>'+showdata+'<div class="additional-add_action"><ul> </ul></div></div></div></div></div></div>';
					
					
					///<li class="addtocart1"><a style="color:#ffffff;text-decoration:none" onclick="ccart('+row.ProductId+','+uid+')"class="hiraola-add_compare addtocart" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Wishlist">Add &nbsp;<i class="ion-bag"></i></a></li>

				});
				html+'</div>';
			}  
			else
				html+='<div class="col-lg-4"><div class="slide-item">Sorry, You dont have permission to view product...</div></div>';
			
			$('#productview').hide();  
			$('#individualProducts').show();  
			$('#individualProducts').html(html)  
			
		}
	}); 
		  }
	
	/////Accordian menu ended
	function ccart(id) 
{
	id = $.trim(id);
	//uid= $.trim(uid);	
	if(id!='')
	{
		$.ajax({
			url:"<?php echo base_url(); ?>Welcome/usercart",
			type:"POST",
			data:{'add':'usercart','id':id},
			success:function(data)
			{
				var data = $.parseJSON(data);  
					if(data.err == '0')
					{
						$('#StatusChng').modal('show');
						$('#StatusChng').find('.modal-body').html('<h4 style="color:green;text-align:center">'+data.msg+'</h4>');

						$('.close').click(function(){
							//window.location.reload();
							cartCount(); 
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
			},
			error:function(data)
			{
				alert('NETWORK:ERROR');
			}
		});
	}
}
function cartCount()
{
	$.ajax({
			url:"<?php echo base_url(); ?>Welcome/cartcount",
			type:"POST",
			data:{'cartcount':'cartcount'},
			success:function(data)
			{
				var data = $.parseJSON(data);
				html='<i class="ion-bag" aria-hidden="true" style="font-size:23px;color:white;" id="cartC"> '+data+'</i>';
				
				 $("#cartC").replaceWith(html);
	
			}
	})
}



		
</script>

