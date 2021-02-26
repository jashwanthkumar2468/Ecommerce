<style>
.main {
    width: auto;
    margin: 0 auto;
    text-align: left;
	max-width: 1366px !important;
}
.catalog-product-view ul.resp-tabs-list {
    width: 100%;
    float: none;
    display: flex;
}
ul.resp-tabs-list {
    margin: 0;
    padding: 0;
    font-family: Tahoma, Geneva, sans-serif;
}
.catalog-product-view .resp-tabs-list li {
    font-size: 13px;
    display: block;
    padding: 15px 0;
    margin: 0 5px 0 0;
    list-style: none;
    cursor: pointer;
    float: none;
    color: #000;
    border-bottom: 0;
    position: relative;
    font-weight: bold;
    text-align: center;
    top: 1px;
    min-height: 17px;
    border: none;
    font-family: 'Muli', sans-serif;
}
.catalog-product-view .activeTab {
    background: #f3f3f3;
}
.resp-tabs-container {
    padding: 0;
    background-color: #fff;
    clear: left;
}
.product-detail-info {
	padding:0px;
    background: url(//www.malabargoldanddiamonds.com/skin/frontend/malabar/default/images/tab_content_bg.jpg) repeat;
}
.catalog-product-view #leftparentdiv, .catalog-product-view #rightparentdiv {
    background: #f3f3f3;
    padding-top: 20px;
}
.f-left, .left {
    float: left !important;
}
.product-detail-info div.accordion {
    padding: 0 15px;
}
.catalog-product-view .product-detail-info div.accordion .product-detail-info-head {
    border-bottom: 0;
    cursor: pointer;
    float: left;
    padding: 5px 0;
    width: 100%;
    color: #000;
    font-family: 'Muli', sans-serif;
    line-height: 1.35;
    margin: 0 0 5px;
    font-size: 12px;
    font-weight: bold;
}
.product-detail-info ul {
    float: left;
    width: 100%;
    margin-bottom: 10px;
    
}
.product-detail-info ul {
   
}
.catalog-product-view .product-detail-info ul li {
    border-bottom: 1px solid #e4e4e4;
    padding: 10px 0;
    font-family:"Lato", sans-serif;
}
.product-detail-info ul li {
    padding: 10px 10px;
    border-bottom: 1px solid #d3cbb6;
    float: left;
    width: 100%;
}
.product-detail-info-head {
	font-weight: bold;
	padding:10px;
	 
} 

.videomain{
	width: 350px;
    height: 200px;
    border: 1px solid #492c10;
}
.mrgclass{
	
	margin-left: 20rem; 
}

</style> 
			 	<div class="modal fade" id="StatusChng" role="dialog">
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
		
			<div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2><?php echo $submenunames['CategoryName'];?></h2>
                    <ul>
                        <li><a href="<?php echo base_url('Welcome/userproducts');?>">Home</a></li>
                        <li class="active"><?php echo $submenunames['SubCategoryName'];?></li>
                    </ul>
                </div>
            </div>
        </div> 
         <!-- ElevateZoom JS -->
    
        <!-- Begin Hiraola's Single Product Area -->
        <div class="sp-area" style="padding-bottom:1em;">
            <div class="container">
                <div class="sp-nav">
                    <div class="row">
                        <div class="col-lg-5 col-md-5">
                            <div class="sp-img_area">
                                <div class="zoompro-border">
                                    <img class="zoompro" src="<?php echo $singleproduct['Image'];?>" data-zoom-image="<?php echo $singleproduct['Image'];?>" alt="Hiraola's Product Image" />
                                </div>
                                 <div id="gallery" class="sp-img_slider">
                                    <a class="active" data-image="<?php echo $singleproduct['Image'];?>" data-zoom-image="<?php echo $singleproduct['Image'];?>">
                                        <img src="<?php echo $singleproduct['Image'];?>" alt="Hiraola's Product Image">
                                    </a>
                                    <a data-image="<?php echo $singleproduct['Image1'];?>" data-zoom-image="<?php echo $singleproduct['Image1'];?>">
                                        <img src="<?php echo $singleproduct['Image1'];?>" alt="Hiraola's Product Image">
                                    </a>
                                    <a data-image="<?php echo $singleproduct['Image2'];?>" data-zoom-image="<?php echo $singleproduct['Image2'];?>">
                                        <img src="<?php echo $singleproduct['Image2'];?>" alt="Hiraola's Product Image">
                                    </a>
                               
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="sp-content">
                                <div class="sp-heading">
                                    <h5 style="padding-bottom:10px;font-weight:700;"><?php echo $singleproduct['ProductName']; ?></h5>
                                </div>
                              
                                <div class="sp-essential_stuff">
                                    <ul>
										<li>Product Code:&nbsp;<?php echo $singleproduct['tagno']; ?></li>
										<li>Availability: In Stock</li>
										<!--<li><h4 style="color:#007bff;font-size:27px;">Rs: <?php echo $singleproduct['TotalPrice']; ?></h4></li>-->
										
             <!--                                       <div id="price_breakup_popup" class="price_breakup_popup" style="">-->
													<!--<span class="price_breakup_title">Price Breakup</span>-->
													<!--<ul class="pricebrdown">-->
             <!--                                           <li id="pb_metalprice">-->
													<!--		<div class="breakup_content">-->
													<!--		<span>Gold</span><span>Rs. <?php echo $singleproduct['TodayGoldRate']; ?></span>-->
													<!--		</div>-->
													<!--	</li> -->
													<!--	<li id="pb_diamondcharge">-->
													<!--		<div class="breakup_content">-->
													<!--			<span>Diamond</span>-->
																<!--<span class="orig_diamond_charge strikeoutprice">Rs. 4473.00</span>-->
													<!--			<span class="offer_new_price">Rs. <?php echo $singleproduct['DiamondPrice']; ?></span>-->
													<!--		</div>-->
													<!--	</li>-->
             <!--                                           <li id="pb_makingcharge">-->
													<!--		<div class="breakup_content">-->
													<!--			<span>MakingCharges</span><span class="orig_making_charge">Rs. <?php echo $singleproduct['MakingChargesPer']; ?></span>-->
													<!--		</div>-->
													<!--	</li>-->
             <!--                                           <li id="pb_vat">-->
													<!--		<div class="breakup_content"><span>Tax</span><span>Rs. <?php echo $singleproduct['Tax']; ?></span></div>-->
													<!--	</li>-->
                                                       
             <!--                                       </ul>-->
													<!--<hr class="pdp-hr-price-breakup">  -->
													<!--</div>-->
										
										  
                                    </ul>
                                </div>
								<div class="row" style="margin-top:-10px;margin-bottom:20px;">
									<div class="col-md-3">
										<div class="product-size_box">
											<span>Size</span>
											<select class="myniceselect nice-select" style="border-radius:0px;">
												<option value="1">S</option>
												<option value="2">M</option>
												<option value="3">L</option>
												<option value="4">XL</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="qty-btn_area" style="padding-top:23px;">
									   <!-- <ul>
											<li><a class="qty-cart_btn" href="javascript:void(0)" onclick="ccart(<?php echo $singleproduct['ProductId'];?>,'<?php echo $userId ;?>')">Add To Cart</a></li>
										   
										</ul>-->
										</div>
									</div>
								</div>
                                <div class="contact-box">
									<div class="contact-box-container">
										<p class="contact-text" style="color: #9e3030; font-weight: bold;">Any Questions ? Please contact us at</p>
										<div class="contact-box-text">    
											<!--<p >-->
											<!--   <i class="ion-ios-telephone" style="font-weight:bold;color:green;font-size:20px;"  aria-hidden="true"></i> <a href="tel:+91 9032771453">+91 9032771453 </a></p>-->
											<p >
											<i class="fab fa-whatsapp" style="font-weight:bold;color:green;font-size:20px;padding-right:5px;"  aria-hidden="true"></i> 	<a href="https://wa.me/+919032771453?text=<?php echo base_url('SingleProduct').'/'.$singleproduct['ProductId'];?>">+91 9032771453</a>
											</p>                                    
										</div>
									</div>
								</div>
								<div class="hiraola-social_link">
									<ul>
										<li class="facebook">
											<a href="https://www.facebook.com" data-toggle="tooltip" target="_blank" title="Facebook">
												<i class="fab fa-facebook"></i>
											</a>
										</li>
										<li class="twitter">
											<a href="https://twitter.com" data-toggle="tooltip" target="_blank" title="Twitter">
												<i class="fab fa-twitter-square"></i>
											</a>
										</li>
										<li class="youtube">
											<a href="https://www.youtube.com" data-toggle="tooltip" target="_blank" title="Youtube">
												<i class="fab fa-youtube"></i>
											</a>
										</li>
										<li class="google-plus">
											<a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="Google Plus">
												<i class="fab fa-google-plus"></i>
											</a>
										</li>
										<li class="instagram">
											<a href="https://rss.com" data-toggle="tooltip" target="_blank" title="Instagram">
												<i class="fab fa-instagram"></i>
											</a>
										</li>
									</ul>
								</div>
								<div class="row">	
          <div class="col-md-4">
           </div>		  
                          <div class="col-md-8 mrgclass">
								<div class="video">
								<video controls class="videomain">
                                <source src="<?php echo base_url('fileuploads');?>/<?php echo$singleproduct['video'];?>" type="video/mp4">
                                </video>
								</div>
							</div>
	    </div>
								
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Single Product Area End Here -->
		<div class="row" style="padding-top:10px;">
		<div class="container-fluid" style="background-color:#f3f3f3;padding-bottom:40px;">
			<div class="col-md-12" style="padding:0px;">
				<h5 class="product-details-head" style="text-transform:uppercase;text-align:center;padding: 20px 10px 18px 15px;">Product   Details</h5>
			</div>
			<div class="product-detail-info show_product_detail col-md-12">
				<div id="leftparentdiv" class="col-xs-12 col-md-12">
					<div class="row" style="background-color:#f3f3f3">
						<div class="accordion col-md-4">
							<div class="product-detail-info-head" >Basic Information</div>
					<ul>
																				<li><span class="f-left col-md-6">Product Type</span>
					<span class="f-right col-md-6 product_type"><?php echo $submenunames['SubCategoryName'];?></span></li>
																									<li><span class="f-left col-md-6">Brands</span>
					<span class="f-right col-md-6 brand">Premlal</span></li>
																																													<li><span class="f-left col-md-6">Item package quantity</span>
					<span class="f-right col-md-6 item_package_quantity"><?php echo $singleproduct['Quantity'];?></span></li>
																									<li><span class="f-left col-md-6">Gender</span>
					<span class="f-right col-md-6 gender"><?php if( $singleproduct['gender1']==1)
					{
					echo 'Male';
					}
					else
					{
					echo 'Female';
					}?></span></li>
																																																																											</ul>
                    					</div>
										
					<div class="accordion col-md-4">
										 <div class="product-detail-info-head">Metal Information</div>
					<ul>
																				<li><span class="f-left col-md-6">Gold Purity</span>
					<span class="f-right col-md-6 gold_purity"><?php echo $singleproduct['GoldCaret'];?></span></li>
																									<li><span class="f-left col-md-6">Metal Colour</span>
					<span class="f-right col-md-6 gold_colour">Yellow</span></li>
																									<li><span class="f-left col-md-6">Gross Weight ( g )</span>
					<span class="f-right col-md-6 gross_gold_weight"><?php echo $singleproduct['grw'];?></span></li>
																									<li><span class="f-left col-md-6">Net Weight ( g )</span>
					<span class="f-right col-md-6 net_gold_weight"><?php echo $singleproduct['gms'];?></span></li>
																																																							</ul>
                    					</div>

				
					<div class="accordion col-md-4">
										 <div class="product-detail-info-head">Stone Information</div>
					<ul>
																														<li><span class="f-left col-md-6">Stone Weight ( g )</span>
					<span class="f-right col-md-6 stone_weight"><?php echo $singleproduct['stw'];?></span></li>
																																													</ul>
                    					</div>
				
			
			
			</div>
			</div>
			</div>
			</div>
			</div>
		
		
       

		
<div class="hiraola-footer_area" >
            <div class="footer-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 wow  animated animated" data-wow-delay="0.9s" style="visibility: visible; animation-delay: 0.9s; animation-name: fadeInDown;">
                            <div class="footer-widgets_info">
                                <div class="footer-widgets_logo"> 
                                    <a href="http://localhost/Premlal/">
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
                                                <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="newsletters-form validate" target="_blank" novalidate="">
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
<script src="<?php echo base_url('frontendassets');?>/js/wow.min.js"></script>
 
<script>
		 new WOW().init();
		 
</script>			 

    <!-- JS
============================================ -->

    <!-- jQuery JS -->
    <script src="<?php echo base_url('singleassets');?>/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url('singleassets/js/');?>plugins/jquery.elevateZoom-3.0.8.min.js"></script>
    <!-- Modernizer JS -->
    <script src="<?php echo base_url('singleassets');?>/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Popper JS -->
    <script src="<?php echo base_url('singleassets');?>/js/vendor/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="<?php echo base_url('singleassets');?>/js/vendor/bootstrap.min.js"></script>

    <!-- Slick Slider JS -->
    <script src="<?php echo base_url('singleassets');?>/js/plugins/slick.min.js"></script>
    <!-- Countdown JS -->
    <script src="<?php echo base_url('singleassets');?>/js/plugins/countdown.js"></script>
    <!-- Barrating JS -->
    <script src="<?php echo base_url('singleassets');?>/js/plugins/jquery.barrating.min.js"></script>
    <!-- Counterup JS -->
    <script src="<?php echo base_url('singleassets');?>/js/plugins/jquery.counterup.js"></script>
    <!-- Nice Select JS -->
    <script src="<?php echo base_url('singleassets');?>/js/plugins/jquery.nice-select.js"></script>
    <!-- Sticky Sidebar JS -->
    <script src="<?php echo base_url('singleassets');?>/js/plugins/jquery.sticky-sidebar.js"></script>
    <!-- Jquery-ui JS -->
    <script src="<?php echo base_url('singleassets');?>/js/plugins/jquery-ui.min.js"></script>
    <script src="<?php echo base_url('singleassets');?>/js/plugins/jquery.ui.touch-punch.min.js"></script>
    <!-- Lightgallery JS -->
    <script src="<?php echo base_url('singleassets');?>/js/plugins/lightgallery.min.js"></script>
    <!-- Scroll Top JS -->
    <script src="<?php echo base_url('singleassets');?>/js/plugins/scroll-top.js"></script>
    <!-- Theia Sticky Sidebar JS -->
    <script src="<?php echo base_url('singleassets');?>/js/plugins/theia-sticky-sidebar.min.js"></script>
    <!-- Waypoints JS -->
    <script src="<?php echo base_url('singleassets');?>/js/plugins/waypoints.min.js"></script>
    <!-- Instafeed JS -->
    <script src="<?php echo base_url('singleassets');?>/js/plugins/instafeed.min.js"></script>
   
    <!-- Timecircles JS -->
    <script src="<?php echo base_url('singleassets');?>/js/plugins/timecircles.js"></script>
    
    <!-- Main JS -->
    <script src="<?php echo base_url('singleassets');?>/js/main.js"></script>
<script>
$("#pricebreak").click(function(){
	
       //$("#price_breakup_popup").toggle();
        
    });
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
						$('#StatusChng').find('.modal-body').html('<h4 style="color:green">'+data.msg+'</h4>');

						$('.close').click(function(){
							//window.location.reload();
							cartCount(); 
						});
					}   
					else
					{
						$('#StatusChng').modal('show');
						$('#StatusChng').find('.modal-body').html('<h4 style="color:red">'+data.msg+'</h4>');
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

</script>



</body>

</html>