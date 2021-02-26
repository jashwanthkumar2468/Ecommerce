<style>
.selectgender{
	    width: inherit;
    height: 37px;
	    padding-left: 53px;
		color:#595959;
}
</style>
		
		<div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Register Here</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Login &amp; Register</li>
                    </ul>
                </div>
            </div>
        </div>
		<div class="hiraola-login-register_area">
            <div class="container">
                <div class="row">
                     
                    <div id="signup" class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                       <form id="InstallationAddForm_E" onsubmit="return false;" method="post" enctype='multipart/form-data'>
                            <div class="login-form">
                                <h4 class="login-title">Register</h4>
                                <div class="row">
                                    <div class="col-md-4 col-12 mb--20">
                                        <label>First Name</label>
                                        <input type="text" id="firstname" name="firstname" placeholder="First Name">
                                    </div>
                                    <div class="col-md-4 col-12 mb--20">
                                        <label>Last Name</label>
                                        <input type="text" id="lastname" name="lastname"placeholder="Last Name">
                                    </div>
                                  
                                    <div class="col-md-4 col-12 mb--20">
                                         <label>Mobile Number</label>
                                        <div class="input">
                                          
											<input class="telwidth" style="width:80%" type="text" id="phoneField1" name="phoneField1" class="phone-field"/>
				                        </div>  
                                    </div>
                              
                                    <div class="col-md-4">
                                        <label>Email Address*</label>
                                        <input type="email" id="email" name="email" placeholder="Email Address">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Password</label>
                                        <input type="password" id="password" name="password" placeholder="Password">
                                    </div>
									<div class="col-md-4">
                                        <label>Confirm Password</label>
                                        <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password">
                                    </div>
									<div class="col-md-3">
                                        <label>Gender</label>
                                        <select id="gender" name="gender" class="selectgender" style="border: 1px solid #e5e5e5;border-radius:4px;">
										<option value="">Select Gender</option>
										<option value="1">Male</option>
										<option value="2">Female</option>
										
                                        </select>
                                    </div>
									
									
								<?php 
								
								foreach ($category as $cat)
								{
									?>
									<div class="col-md-3" style="padding-bottom:15px;">
                                        <label><?php echo $cat['CategoryName'];?></label>
                                        <div class="example">
                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#example-enableClickableOptGroups<?php echo $cat['CategoryId'];?>').multiselect({
                                                    enableClickableOptGroups: true
                                                });
                                            });
                                        </script>
                                        <span class="multiselect-native-select">
										
										<select id="example-enableClickableOptGroups<?php echo $cat['CategoryId'];?>" class="all<?php echo $cat['CategoryId'];?>" multiple="multiple" name="selection[]" >
										<div id="all">
                                            <optgroup label="ALL" >
											<?php foreach($subcategory1 as $subcat)
											{
												if($subcat['CategoryId']==$cat['CategoryId'])
												{  ?>
                                                <option value="<?php echo $subcat['subcategory_name_id'];?>"><?php echo $subcat['Title'];?></option>
											<?php }
											
											}?>
                                            </optgroup>
											</div>
                                        </select>
										
										</span>
										</div>
                                    </div>
						  <?php } ?>
							<div class="col-md-12 col-12 mb--20">
                                        <label>Enter Details </label>
                                        <textarea  placeholder="Describe yourself here..." id="details" name="detailinformation" rows="5" cols="50" style="width:100%;border: 1px solid #e5e5e5"/>
										</textarea>
                            </div>
								<input type="hidden" name="Add_Editors" value="true"/>
								
									<div class="col-md-4">
									<div style="padding-top:5px;">
									<div style="float:left;width:50%;">
										  <label style="">Security Code </label>
										  <label style=""><?php echo $cap['image']; ?>
											</label>
											</div>
											<div style="float:right;width:50%;">
										  <label style="float:left;width:50%;">Enter Details </label>
										  <input type="text" class="form-control" placeholder="Captcha Here" id="recap" name="recap" style="height:auto;line-height:19px;">
										<input type="hidden" name="rcaptcha" id="rcaptcha" value="<?php echo $cap['word']; ?>"></div>
									</div>
									</div>
									<div class="col-md-8">
										  <button class="hiraola-register_btn " id="SubmitBtn1" style="float:left;margin-top:40px;"> Register</button>
									</div>
                                    </div>
								
                                </div>
                            </div>
                        </form>
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
</body>
  
    <!-- Main JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/main.js"></script> 
<script src="<?php echo base_url('frontendassets');?>/js/wow.min.js"></script>
 
<script>
		 new WOW().init();
		 
</script>
 <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script>
var base_url = "<?php echo base_url(); ?>"; 
$(function(){
	var base_url = "<?php echo base_url();?>"
	$('#SubmitBtn1').click(function(){
		vaidate_from_editors();
	}); 
	
});
	


function vaidate_from_editors()
{
	var invalid				= '';
	//var cid				= $.trim($('#cid').val());
	var firstname               = $.trim($('#firstname').val()); 
	var lastname              = $.trim($('#lastname').val()); 
	var email              = $.trim($('#email').val()); 
	var password              = $.trim($('#password').val()); 
	var cpassword             = $.trim($('#cpassword').val()); 
	var gender             = $.trim($('#gender').val()); 
	var captcha             = $.trim($('#recap').val()); 
	var rcaptcha             = $.trim($('#rcaptcha').val()); 
	
	var all1 = $(".all1").val();
	var all2 = $(".all2").val();
	var all3 = $(".all3").val();
	var phone=$.trim($('#phoneField1').val());
	var ccode=$.trim($('#ccode').val());
	
	if(ccode=='')
	{
	    invalid = 1;
	    alert("Please select country");
	}
	
	if(phone=='')
	{
	    invalid = 1;
	    alert('Please Enter Mobile Number');
	   $('#phoneField1').css('border-color','red');
	}
	else
		$('#phoneField1').css('border-color',''); 
	if(password!=cpassword)
	{
		invalid = 1;
		alert('Password Not Matched');
	}
	if(all1 == null && all2 == null && all3 == null)
	{
		invalid = 1;
		alert("Please Select One Category");
		
	}
	
	
	if(firstname == '')
	{
		invalid = 1;
		$('#firstname').css('border-color','red');
	}
	else
		$('#firstname').css('border-color',''); 
	
	
	if(lastname == '')
	{
		invalid = 1;
		$('#lastname').css('border-color','red');
	}
	else
		$('#lastname').css('border-color',''); 
	
	if(email == '')
	{
		invalid = 1;
		$('#email ').css('border-color','red');
	}
	else
		$('#email ').css('border-color',''); 
	
	if(password == '')
	{
		invalid = 1;
		$('#password').css('border-color','red');
	}
	else
		$('#password').css('border-color',''); 
	
	if(cpassword == '')
	{
		invalid = 1;
		$('#cpassword').css('border-color','red');
	}
	else
		$('#cpassword').css('border-color',''); 
	
	if(gender == '')
	{
		invalid = 1;
		$('#gender').css('border-color','red');
	}
	else
		$('#gender').css('border-color','');
	
	if(captcha!=rcaptcha)
	{
		invalid = 1;
		$('#recap').css('border-color','red');
	}
	else
	{
		$('#recap').css('border-color','');
	}	
	 
	if(invalid=='') 
	{
		$('#InstallationAddForm_E').removeAttr('onsubmit'); 
		$('#InstallationAddForm_E').attr('action','');
		$('#InstallationAddForm_E').trigger('submit');
	}
}

function vaidate_login_editors()
{
	var invalid1				= '';
	//var cid				= $.trim($('#cid').val());
	
	var pwd1              = $.trim($('#pwd1').val()); 
	var email1              = $.trim($('#email1').val()); 
	//alert(email1);
	if(email1 == '')
	{
		invalid1 = 1;
		$('#email1 ').css('border-color','red');
	}
	else
		$('#email1 ').css('border-color',''); 
	
	if(pwd1 == '')
	{
		invalid1 = 1;
		$('#pwd1').css('border-color','red');
	}
	else
		$('#pwd1').css('border-color',''); 
	
	
	 
	if(invalid1=='') 
	{
		$('#InstallationAddForm_E1').removeAttr('onsubmit'); 
		$('#InstallationAddForm_E1').attr('action','');
		$('#InstallationAddForm_E1').trigger('submit');
	}
}


</script>
</html> 
		
		
		