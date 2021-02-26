
		<!---  Products of related Category Start ----->
		
		 <!-- Begin Hiraola's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2><?php echo $parentcategoryName['CategoryName']; ?></h2>
                    <ul>
                        <li><a href="<?php echo base_url('');?>">Home</a></li>
                        <li class="active"><?php echo $subcategoryName['title']; ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Hiraola's Breadcrumb Area End Here -->

        <!-- Begin Hiraola's Content Wrapper Area -->
        <div class="hiraola-content_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shop-toolbar">
                            
                        <div class="shop-product-wrap grid gridview-3 row">
                            
                          
                            <?php 
                            if(empty($products))
                              {
                                  ?><h4 style="text-align:center;">No Products Found........</h4> 
                                  <?php
                              }                            
                            
                            else
                            
                            {
                            foreach ($products as $prd) { ?>
                            <div class="col-md-3">
                                <div class="slide-item">
                                    <div class="single_product">
                                        <div class="product-img">
                                            <a href="<?php echo base_url('SingleProduct/'.$prd['ProductId']) ;?>">
                                                <img class="primary-img" src="<?php echo $prd['Image']; ?>" alt="Hiraola's Product Image">
                                                
                                            </a>
											 <!-- <div class="add-actions">
                                                <ul>
                                                    <li><a class="hiraola-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                                    </li>
                                                    <li><a class="hiraola-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                            class="ion-ios-shuffle-strong"></i></a>
                                                    </li>
                                                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                            class="ion-eye"></i></a></li>
                                                </ul>
                                            </div>-->
                                           
                                           
                                        </div>
                                        <div class="hiraola-product_content">
                                            <div class="product-desc_info">
                                                <h6><a class="product-name" href="<?php echo base_url('SingleProduct/'.$prd['ProductId']) ;?>"><?php echo $prd['ProductName'];?></a></h6>
                                        <?php if($this->session->userdata('uid1')) 
                                        {?>
                                                <div class="price-box">
                                                    <span class="new-price">Rs : <?php echo $prd['TotalPrice'];?></span>
                                                </div>
                                                <?php } ?>
                                               <!-- <div class="additional-add_action">
                                                    <ul>
                                                        <li><a class="hiraola-add_compare" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                                class="ion-android-favorite-outline"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>-->
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            <?php }  }?>
							
							
							<!----- end ---->
                            
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
		
		
		
		
		
		
		<!---  Products Of related category End ------->
		
		
		
		
		
		
		
		
		 <!-- Begin Hiraola's Footer Area -->
        <div class="hiraola-footer_area">
            <div class="footer-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 wow  animated" data-wow-delay="0.9s" style="visibility: visible; animation-delay: 0.9s; animation-name: fadeInDown;">
                            <div class="footer-widgets_info">
                                <div class="footer-widgets_logo"> 
                                    <a href="<?php echo base_url();?>">
                                        <img src="<?php echo base_url('frontendassets');?>/images/plogo.png" alt="Hiraola's Footer Logo">
                                    </a>
                                </div>
                               
                                <div class="hiraola-social_link">
                                    <ul>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com" data-toggle="tooltip" target="_blank" title="Facebook">
                                                <i class="fab fa-facebook" style="color:white;"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="https://twitter.com" data-toggle="tooltip" target="_blank" title="Twitter">
                                                <i class="fab fa-twitter-square" style="color:white;"></i>
                                            </a>
                                        </li>
                                        <li class="google-plus">
                                            <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="Google Plus">
                                                <i class="fab fa-google-plus" style="color:white;"></i>
                                            </a>
                                        </li>
                                        <li class="instagram">
                                            <a href="https://rss.com" data-toggle="tooltip" target="_blank" title="Instagram">
                                                <i class="fab fa-instagram" style="color:white;"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 wow  animated" data-wow-delay="0.9s" style="visibility: visible; animation-delay: 0.9s; animation-name: fadeInDown;">
                            <div class="footer-widgets_area">
                                <div class="row">
                                    <div class="col-md-3">
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
                                    <div class="col-md-3">
                                        <div class="instagram-container footer-widgets_area">
                                            <div class="footer-widgets_title">
                                                <h6 style="color:white;">Sign Up For Newslatter</h6>
                                            </div>
                                            <div class="widget-short_desc">
                                                <p style="color:white;">Subscribe to our newsletters now and stay up-to-date with new collections</p>
                                            </div>
                                            <div class="newsletter-form_wrap">
                                                <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="newsletters-form validate" target="_blank" novalidate>
                                                    <div id="mc_embed_signup_scroll">
                                                        <div id="mc-form" class="mc-form subscribe-form">
                                                            <input id="mc-email" class="newsletter-input" type="email" autocomplete="off" placeholder="Enter your email" />
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
            <div class="footer-bottom_area wow  animated" data-wow-delay="0.9s" style="visibility: visible; animation-delay: 0.9s; animation-name: fadeInLeft;">
                <div class="container">
                    <div class="footer-bottom_nav">
                        <div class="row">
                           
                           
                            <div class="col-lg-12">
                                <div class="copyright">
                                    <span style="color:white;">Copyright &copy; 2020 <a href="#">Prem Raj Jewellery.</a> All rights reserved. Designed By <a href="https://skybell.in">SKYBELL</a></span>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Footer Area End Here -->
        <!-- Begin Hiraola's Modal Area -->
        <div class="modal fade modal-wrapper" id="exampleModalCenter">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-inner-area sp-area row">
                            <div class="col-lg-5 col-md-5">
                                <div class="sp-img_area">
                                    <div class="sp-img_slider-2 slick-img-slider hiraola-slick-slider arrow-type-two" data-slick-options='{
                                                        "slidesToShow": 1,
                                                        "arrows": false,
                                                        "fade": true,
                                                        "draggable": false,
                                                        "swipe": false,
                                                        "asNavFor": ".sp-img_slider-nav"
                                                        }'>
                                        <div class="single-slide red">
                                            <img src="<?php echo base_url('frontendassets');?>/images/single-product/large-size/1.jpg" alt="Hiraola's Product Image">
                                        </div>
                                        <div class="single-slide orange">
                                            <img src="<?php echo base_url('frontendassets');?>/images/single-product/large-size/2.jpg" alt="Hiraola's Product Image">
                                        </div>
                                        <div class="single-slide brown">
                                            <img src="<?php echo base_url('frontendassets');?>/images/single-product/large-size/3.jpg" alt="Hiraola's Product Image">
                                        </div>
                                        <div class="single-slide umber">
                                            <img src="<?php echo base_url('frontendassets');?>/images/single-product/large-size/4.jpg" alt="Hiraola's Product Image">
                                        </div>
                                    </div>
                                    <div class="sp-img_slider-nav slick-slider-nav hiraola-slick-slider arrow-type-two" data-slick-options='{
                                   "slidesToShow": 4,
                                    "asNavFor": ".sp-img_slider-2",
                                   "focusOnSelect": true
                                  }' data-slick-responsive='[
                                                        {"breakpoint":1201, "settings": {"slidesToShow": 2}},
                                                        {"breakpoint":768, "settings": {"slidesToShow": 3}},
                                                        {"breakpoint":577, "settings": {"slidesToShow": 3}},
                                                        {"breakpoint":481, "settings": {"slidesToShow": 2}},
                                                        {"breakpoint":321, "settings": {"slidesToShow": 2}}
                                                    ]'>
                                        <div class="single-slide red">
                                            <img src="<?php echo base_url('frontendassets');?>/images/single-product/small-size/1.jpg" alt="Hiraola's Product Thumnail">
                                        </div>
                                        <div class="single-slide orange">
                                            <img src="<?php echo base_url('frontendassets');?>/images/single-product/small-size/2.jpg" alt="Hiraola's Product Thumnail">
                                        </div>
                                        <div class="single-slide brown">
                                            <img src="<?php echo base_url('frontendassets');?>/images/single-product/small-size/3.jpg" alt="Hiraola's Product Thumnail">
                                        </div>
                                        <div class="single-slide umber">
                                            <img src="<?php echo base_url('frontendassets');?>/images/single-product/small-size/4.jpg" alt="Hiraola's Product Thumnail">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-6 col-md-6">
                                <div class="sp-content">
                                    <div class="sp-heading">
                                        <h5><a href="#">Light Inverted Pendant Quis Justo Condimentum</a></h5>
                                    </div>
                                    <div class="rating-box">
                                        <ul>
                                            <li><i class="fa fa-star-of-david"></i></li>
                                            <li><i class="fa fa-star-of-david"></i></li>
                                            <li><i class="fa fa-star-of-david"></i></li>
                                            <li><i class="fa fa-star-of-david"></i></li>
                                            <li><i class="fa fa-star-of-david"></i></li>
                                        </ul>
                                    </div>
                                    <div class="price-box">
                                        <span class="new-price">Rs82.84</span>
                                        <span class="old-price">Rs93.68</span>
                                    </div>
                                    <div class="essential_stuff">
                                        <ul> 
                                            <li>EX Tax:<span>Rs453.35</span></li>
                                            <li>Price in reward points:<span>400</span></li>
                                        </ul>
                                    </div>
                                    <div class="list-item">
                                        <ul>
                                            <li>10 or more Rs81.03</li>
                                            <li>20 or more Rs71.09</li>
                                            <li>30 or more Rs61.15</li>
                                        </ul>
                                    </div>
                                    <div class="list-item last-child">
                                        <ul>
                                            <li>Brand<a href="javascript:void(0)">Buxton</a></li>
                                            <li>Product Code: Product 15</li>
                                            <li>Reward Points: 100</li>
                                            <li>Availability: In Stock</li>
                                        </ul>
                                    </div>
                                    <div class="color-list_area">
                                        <div class="color-list_heading">
                                            <h4>Available Options</h4>
                                        </div>
                                        <span class="sub-title">Color</span>
                                        <div class="color-list">
                                            <a href="javascript:void(0)" class="single-color active" data-swatch-color="red">
                                                <span class="bg-red_color"></span>
                                                <span class="color-text">Red (+Rs3.61)</span>
                                            </a>
                                            <a href="javascript:void(0)" class="single-color" data-swatch-color="orange">
                                                <span class="burnt-orange_color"></span>
                                                <span class="color-text">Orange (+Rs2.71)</span>
                                            </a>
                                            <a href="javascript:void(0)" class="single-color" data-swatch-color="brown">
                                                <span class="brown_color"></span>
                                                <span class="color-text">Brown (+Rs0.90)</span>
                                            </a>
                                            <a href="javascript:void(0)" class="single-color" data-swatch-color="umber">
                                                <span class="raw-umber_color"></span>
                                                <span class="color-text">Umber (+Rs1.81)</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="quantity">
                                        <label>Quantity</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="1" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </div>
                                    <div class="hiraola-group_btn">
                                        <ul>
                                            <li><a href="<?php echo base_url();?>" class="add-to_cart">Cart To Cart</a></li>
                                            <li><a href="<?php echo base_url();?>"><i class="ion-android-favorite-outline"></i></a></li>
                                            <li><a href="<?php echo base_url();?>"><i class="ion-ios-shuffle-strong"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="hiraola-tag-line">
                                        <h6>Tags:</h6>
                                        <a href="javascript:void(0)">Ring</a>,
                                        <a href="javascript:void(0)">Necklaces</a>,
                                        <a href="javascript:void(0)">Braid</a>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Modal Area End Here -->
    </div>
    <!-- JS
============================================ -->
    <!-- jQuery JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Modernizer JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Popper JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/vendor/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/vendor/bootstrap.min.js"></script>
    <!-- Slick Slider JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/plugins/slick.min.js"></script>
    <!-- Countdown JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/plugins/countdown.js"></script>
    <!-- Barrating JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/plugins/jquery.barrating.min.js"></script>
    <!-- Counterup JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/plugins/jquery.counterup.js"></script>
    <!-- Nice Select JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/plugins/jquery.nice-select.js"></script>
    <!-- Sticky Sidebar JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/plugins/jquery.sticky-sidebar.js"></script>
    <!-- Jquery-ui JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/plugins/jquery-ui.min.js"></script>
    <script src="<?php echo base_url('frontendassets');?>/js/plugins/jquery.ui.touch-punch.min.js"></script>
    <!-- Lightgallery JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/plugins/lightgallery.min.js"></script>
    <!-- Scroll Top JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/plugins/scroll-top.js"></script>
    <!-- Theia Sticky Sidebar JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/plugins/theia-sticky-sidebar.min.js"></script>
    <!-- Waypoints JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/plugins/waypoints.min.js"></script>
    <!-- Instafeed JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/plugins/instafeed.min.js"></script>
    <!-- ElevateZoom JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/plugins/jquery.elevatezoom-3.0.8.min.js"></script>
    <!-- Timecircles JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/plugins/timecircles.js"></script>
    <!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->
    <!--
<script src="<?php echo base_url('frontendassets');?>/js/vendor/vendor.min.js"></script>
<script src="<?php echo base_url('frontendassets');?>/js/plugins/plugins.min.js"></script>
-->
    <!-- Main JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/main.js"></script> 
<script src="<?php echo base_url('frontendassets');?>/js/wow.min.js"></script>
 
<script>
		 new WOW().init();
		</script>
</html>