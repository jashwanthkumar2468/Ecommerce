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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

<!--<script type="text/javascript" src="docs/js/jquery-2.1.3.min.js"></script>-->
  <!--<script type="text/javascript" src="<?php echo base_url('multiselectassets');?>/docs/js/bootstrap.bundle-4.5.2.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url('multiselectassets');?>/dist/js/bootstrap-multiselect.min.js"></script>--->
	
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




<!------ Include the above in your HEAD tag ---------->



	
	<style>
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
	min-width: 110%;
    height: 28px;
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
			 <!--------shopping cart  ends--------->
			 
       		<div class="container">
	   <div class="row">
	   
	   <div class="col-md-4 paddclass">
			   <div class="backlink" style="float:left;">
			   <a href="<?php echo base_url("EcoDashAdmin/RegisteredUsers")?>"> <button class="btn btn-info btnstyle" style="font-size: 20px;"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</button></a>
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
			   <a href="javascript:void(0)">
				<button type="submit" class="btn btn-default search" aria-label="Left Align">
					<i class="ion-bag" aria-hidden="true" style="font-size:23px;color:white;" id="cartC"> <?php echo $count_cart; ?></i>
				 </a>
			   </div>
	   </div>
	   </div>
	   </div>

	   
	
		<div class="hiraola-content_wrapper" style="padding-top: 49px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 order-2 order-lg-1">
					<div class="frequently-accordion">
		
                            <div id="accordion">
							<?php 
							
							foreach($mainmenu as $mcat)
								{
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
										$a=$mcat['CategoryName'];
										
										foreach($submenu as $subcat)
										{
											if($subcat['CategoryName']==$a)
											{?>
          <li class="subcats" style="list-style:none;"><i class="fa fa-long-arrow-right" aria-hidden="true" style="font-size:15px;"></i><a href="javascript:void(0);"  style="color: black;text-decoration: none;font-size:16px;" onclick="getproducts('<?php echo $subcat["SubCategoryId"];?>','<?php echo $mcat['CategoryId'];?>') "> <?php echo $subcat['SubCategoryName'];?><?php if($subcat['Title']=='Men') {   ?>&nbsp;&nbsp;<img style="width:11%;" src="<?php echo base_url('images')?>/ma.png"> <?php } else {if($subcat['Title']=='Women') { ?>&nbsp;&nbsp;<img style="width:11%;" src="<?php echo base_url('images')?>/female.png"> <?php  } } ?>
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
                    </div>
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="shop-toolbar">
						<div class="container">
					<div class="row" >
					<div class="col-md-3">
							<div class="input-styles" >
							 <label for="male">Enter Tag No:</label>
								<input type="" name="tagno" id="tagno"placeholder="Enter Tag No" onkeyup="getfiletr()"/>
							</div>
							</div>
							
							<div class="col-md-3">
                            <div class="input-styles" >
							 <label for="weight">Enter Weight:</label>
								<input type="" name="weight" id="weight"placeholder="Enter Weight" onkeyup="getfiletr()"/>
								</div>
								</div>
							<div class="col-md-3">
							<div class="input-styles">			
        <label for="price-min">Price:</label>
		<div>
        <input type="text" placeholder="min" onkeyup="getfiletr()" id="minprice" name="minprice" style="float:left;width:60%">
        <input type="text" id="maxprice" name="maxprice" placeholder="max"onkeyup="getfiletr()" style="float:right;width:45%;position: absolute;
    left: 124px;">
		</div>
      </div>
	  </div>
						<div class="col-md-3">
							<div class="input-styles" >
							<label>Category:</label>
						<select name="selectparent" id="selectparent"onChange="getfiletr()"class="selectparent">
						<option value="">SelecedCategory</option>
						<option value="1">Diamond</option>
						<option value="2">Gold</option>
						<option value="3">Platinum</option>
						
						
						</select>
		
		
							</div>
							</div>
							
							</div>
							</div>
						
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
                                            <!--<a href="single-product.html">-->
			<img class="primary-img" src="<?php echo $pd['Image'];?>" alt=" Product Image">
											
                                                <!---<img class="primary-img" src="<?php echo $pd['Image'];?>" alt=" Product Image">--->
          <!--<img class="secondary-img" src="<?php echo $pd['Image'];?>" alt=" Product Image">
                                            </a>---->
                                            <div class="add-actions">
                                                <ul>
  <li><a class="hiraola-add_cart" href="javascript:void(0)" onclick="ccart(<?php echo $pd['ProductId'];?>,<?php echo $auid ;?>)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Cart"><i class="ion-bag"></i></a></li>
 
  <!---<li><a class="hiraola-add_compare" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare This Product"><i class="ion-ios-shuffle-strong"></i></a>
   </li>
  <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quick View"><i class="ion-eye"></i></a></li>---->
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="hiraola-product_content">
                                            <div class="product-desc_info">
              <h5><a class="product-name" href="javascript:void(0)">
			  <?php echo $pd["ProductName"]; ?></a></h5>
                                         <div class="price-box">
        <span class="new-price"><?php echo "Rs ". $pd["TotalPrice"]; ?></span>
                                                </div>
                                                <div class="additional-add_action">
                                                    <ul>
            <li class="addtocart1"><a style="color:#ffffff;text-decoration:none" class="hiraola-add_compare addtocart" href="javascript:void(0)" onclick="ccart(<?php echo $pd['ProductId'];?>,<?php echo $auid ;?>)"data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Wishlist">Add&nbsp;<i class="ion-bag"></i></a></li>
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
		
		
		   <!-- Main JS -->
    <script src="<?php echo base_url('frontendassets');?>/js/main.js"></script> 
<!--<script src="<?php echo base_url('frontendassets');?>/js/wow.min.js"></script>-->
 
<script>
	 	$( document ).ready(function() {
    cartCount();
});
</script>
	<script>
	

	
		var base_url = "<?php echo base_url(); ?>";
	/////filetr function starts here///////////
     function getfiletr(){
		 var tagno=$.trim($("#tagno").val()); 
		 var weight=$.trim($("#weight").val()); 
		 var minprice=$.trim($("#minprice").val()); 
		 var maxprice=$.trim($("#maxprice").val()); 
		 var selectparent=$.trim($("#selectparent").val());
		if(tagno == '' && weight == '' && minprice == '' && maxprice == '' && selectparent == '')
		{
			$('#productview').show();  
			$('#individualProducts').hide(); 
			$('#FilteredProducts').hide();
		}
	


			
		 var uid= '<?php echo $auid;?>';
          $.ajax({	
		url:"<?php echo base_url(); ?>EcoDashAdmin/FilterSide",
		method : "POST", 
		data:{'get':'getFilterProducts','uid':uid,'tagno':tagno,'weight':weight,'minprice':minprice,'maxprice':maxprice,'selectparent':selectparent},
		success:function(data){
			//alert(catId); 
			data = $.parseJSON(data);       
			var html='<div class="shop-product-wrap grid gridview-3 row">';   
			if(data.getFilterProducts!='') 
			{
						 	
				var n = 1; 
				$.each(data.getFilterProducts, function(i){
					var row = data.getFilterProducts[i];
					html+='<div class="col-lg-4"><div class="slide-item"><div class="single_product"><div class="product-img"><img class="primary-img" src="'+row.Image+'" alt="Product Image"><div class="add-actions"><ul><li><a class="hiraola-add_cart" href="javascript:void(0)" onclick="ccart('+row.ProductId+','+uid+')"data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Cart"><i class="ion-bag"></i></a></li></ul></div></div><div class="hiraola-product_content"><div class="product-desc_info"><h5><a class="product-name" href="javascript:void(0)">'+row.ProductName+'</a></h5><div class="price-box"><span class="new-price">Rs '+row.TotalPrice+'</span></div><div class="additional-add_action"><ul><li class="addtocart1"><a style="color:#ffffff;text-decoration:none;" class="hiraola-add_compare addtocart" href="javascript:void(0)"  onclick="ccart('+row.ProductId+','+uid+')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Wishlist">Add &nbsp;<i class="ion-bag"></i></a></li></ul></div></div></div></div></div></div>';
					
					

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
				$.each(data.getSidePro1, function(i){
					var row = data.getSidePro1[i];
					html+='<div class="col-lg-4"><div class="slide-item"><div class="single_product"><div class="product-img"><img class="primary-img" src="'+row.Image+'" alt="Product Image"><div class="add-actions"><ul><li><a class="hiraola-add_cart" href="javascript:void(0)" onclick="ccart('+row.ProductId+','+jid+')"data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Cart"><i class="ion-bag"></i></a></li></ul></div></div><div class="hiraola-product_content"><div class="product-desc_info"><h5><a class="product-name" href="javascript:void(0)">'+row.ProductName+'</a></h5><div class="price-box"><span class="new-price">Rs '+row.TotalPrice+'</span></div><div class="additional-add_action"><ul><li class="addtocart1"><a style="color:#ffffff;text-decoration:none;" class="hiraola-add_compare addtocart" href="javascript:void(0)"  onclick="ccart('+row.ProductId+','+jid+')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Wishlist">Add &nbsp;<i class="ion-bag"></i></a></li></ul></div></div></div></div></div></div>';
					
					

				});
				html+'</div>';
			}  
			else
				html+='<div class="col-lg-4"><div class="slide-item">Sorry, You dont have permission to view product..</div></div>';
			
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
				
				$.each(data.getSidePro, function(i){
					var row = data.getSidePro[i];
					html+='<div class="col-lg-4"><div class="slide-item"><div class="single_product"><div class="product-img"><img class="primary-img" src="'+row.Image+'" alt="Product Image"><div class="add-actions"><ul><li ><a class="hiraola-add_cart" href="javascript:void(0)" onclick="ccart('+row.ProductId+','+uid+')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Cart"><i class="ion-bag"></i></a></li></ul></div></div><div class="hiraola-product_content"><div class="product-desc_info"><h6><a class="product-name" href="javascript:void(0)">'+row.ProductName+'</a></h6><div class="price-box"><span class="new-price">Rs '+row.TotalPrice+'</span></div><div class="additional-add_action"><ul><li class="addtocart1"><a style="color:#ffffff;text-decoration:none" class="hiraola-add_compare addtocart" href="javascript:void(0)" onclick="ccart('+row.ProductId+','+uid+')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Wishlist">ADD &nbsp;<i class="ion-bag"></i></a></li></ul></div></div></div></div></div></div>';

				});
				html+'</div>';
			}  
			else
				html+='<div class="col-lg-4"><div class="slide-item">Sorry, You dont have permission to view product...</div></div>';
			
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
		$.ajax({
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
		});
	}
}
function cartCount()
{
    var a='<?php echo $auid; ?>';

	$.ajax({
			url:"<?php echo base_url(); ?>EcoDashAdmin/cartcount",
			type:"POST",
			data:{'cartcount':'cartcount','uid':a},
			success:function(data)
			{
				var data = $.parseJSON(data);
				
				html='<i class="ion-bag" aria-hidden="true" style="font-size:23px;color:white;" id="cartC"> '+data+'</i>';
				
				 $("#cartC").replaceWith(html);
	
			}
	})
}


		
</script>

