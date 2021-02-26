<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>frontendassets/css/ziehharmonika.css" />
 <script src="https://vjs.zencdn.net/7.8.4/video.js"></script>
<style>
    .image-upload > input
{
    display: none;
}

.image-upload img
{
    
    cursor: pointer;
}
</style>

<div class="content-wrapper">
	<section class="content-header">
		<h1>Manage Products</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Manage Products</li>
		</ol>
	</section> 
	<section class="content">
		<?php if($this->session->flashdata('success')){ ?>
			<div class="alert alert-success text-center"><a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">x</a><?php echo $this->session->flashdata('success'); ?></div>
		<?php } else if($this->session->flashdata('error')) { ?>
			<div class="alert alert-danger text-center"><a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">x</a><?php echo $this->session->flashdata('error'); ?></div>
		<?php } ?>
		<div class="box box-default">  
			<div class="box-header with-border">
			  
				<h3 class="box-title">Add New Products</h3>
				<button class="btn btn-primary pull-right" id="AddBtn"><i class="fa fa-plus"></i> Add</button>

			</div>
			
			<div class="box-body" id="AddBdy" style="display:none">
				<form id="ProductsAddForm" onsubmit="return false;" method="post" enctype='multipart/form-data'>
					<div class="row">
						<!--<div class="col-md-3">
							<div class="form-group">
								<label>Status:</label>
								<select id="Status" name="Status" class="form-control">
									<option value="">Select Status</option>
									<option value="1">Open</option>
									<option value="0">Close</option>
								</select>
							</div>
						</div>-->
 
						<div class="col-md-6" style="display:none">
							<div class="form-group">
								<label>Select Fixed/Non Fixed</label>
								<select class="form-control required" name="fixednonfixed" id="fixednonfixed">
									<option value="">--Select Options --</option>
									<option value="1">Fixed</option>
									<option value="2">Non Fixed</option>
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label>Select Product Type</label>
								<select class="form-control required" name="ptype" id="ptype">
									<option value="">--Select Options --</option>
									<option value="1">DIAMOND</option>
									<option value="2">GOLD</option>
								</select> 
							</div>
						</div> 
                        <div class="col-md-3">  
							<div class="form-group">
								<label>Tag No</label>
								<input type="text" class="form-control required" name="tagno" id="tagno" placeholder="Enter Tag No."/>
							</div>
						</div>
						 <div class="col-md-3" style="display:none">
							<div class="form-group">
								<label>Counter</label>
								<input type="text" class="form-control required" name="counter" id="counter" placeholder="Enter Counter"/>
							</div>
						</div> 
						 <div class="col-md-3" style="display:none">
							<div class="form-group">
								<label>Party</label>
								<input type="text" class="form-control required" name="party" id="party" placeholder="Enter Party"/> 
							</div>
						</div>
						
						
						<div class="col-md-3">
							<div class="form-group">
								<label>Parent Category:</label>
								<select id="catname" name="catname" class="form-control">
									<option value="">Select Parent Category</option>
									<?php
									foreach($Categories as $cat)
									{
										?>
									<option value="<?php echo $cat['CategoryId']; ?>"><?php echo $cat['CategoryName']; ?></option>
										<?php
									}
									?>
									
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label>Sub Category</label>
								<select id="scatname" name="scatname" class="form-control">
								    
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label>Sub Category List</label>
								<select id="scatlist" name="scatlist" class="form-control">
								    
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">   
								<label>Style/Product</label>  
								<select id="style" name="style" class="form-control required" onchange="selectmodel()">
									<option value="">Select Style/Product</option>
									<?php foreach ($style as $productstyle)
									{
										?>
										<option value="<?php echo $productstyle['Style'];?>"><?php echo $productstyle['Style'];?></option>
									<?php } ?>
								</select> 
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">   
								<label>Model</label>  
								<select id="model" name="model" class="form-control required" >
									<option value="">Select Model</option>
								
								</select>
							</div>
						</div>
						<div class="col-md-3" >
							<div class="form-group"> 
								<label>Select Gender</label>
								<select id="gender" name="gender" class="form-control">
								    <option value="">Please Select Gender</option>
									<option value="MALE">Male</option>
									<option value="FEMALE">Female</option>
								</select>
							</div>
						</div> 
 
						<div class="col-md-3" style="display:none;"> 
							<div class="form-group"> 
								<label>Sort</label>
								<input type="text" class="form-control required" name="sort" id="sort" placeholder="Enter Sort Order"/>
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<label>Product Name</label>
								<input type="text" class="form-control required" name="productname" id="productname" placeholder="Enter Product Name"/>
							</div> 
						</div>
                       <div class="col-md-3" >
							<div class="form-group">
								<label>Premium</label> 
								<select name="ProductCategory" class="form-control required" id="ProductCategory">
								    <option value="">Select Product Type</option> 
								    <option value="PREMIUM">Premium</option>
								    <option value="NON-PREMIUM">Non-Premium</option>
						
								</select>
							</div>
						</div>
						<div class="col-md-3" >
							<div class="form-group">
								<label>Sold/Unsold</label> 
								<select name="sold" class="form-control required" id="sold">
								    <option value="">Select Product Type</option> 
								    <option value="SOLD">Sold</option>
								    <option value="UNSOLD">Unsold</option>
								</select>
							</div>
						</div> 						
						<div class="col-md-3" style="display:None">
							<div class="form-group">
								<label>Model Number</label>
								<input type="text" class="form-control required" name="productmodel" id="productmodel" placeholder="Enter Product Model"/>
							</div>
						</div> 

						<div class="col-md-3" style="display:None"> 
							<div class="form-group">
								<label>Size</label>
								<input type="text" class="form-control required" name="psize" id="psize" placeholder="Enter Product Size"/>
							</div>
						</div>
    
						 <div class="col-md-3">
							<div class="form-group">
								<label>Pcs</label> 
								<input type="text" class="form-control required" name="pcs" id="pcs" placeholder="Enter Quantity"/>
							</div> 
						</div>
						 <!--<div class="col-md-3" style="display:none">
							<div class="form-group"> 
								<label>Stone Style</label> 
								<input type="text" class="form-control required" name="stonestyle" id="stonestyle" placeholder="Enter Stone Style"/>
							</div> 
						</div>
						 <div class="col-md-3" style="display:none;">
							<div class="form-group">
								<label>Stone Model</label> 
								<input type="text" class="form-control required" name="stonemodel" id="stonemodel" placeholder="Enter Stone Style"/>   
							</div> 
						</div>-->
						 <div class="col-md-3" style="display:none;">
							<div class="form-group"> 
								<label>Metal</label> 
								<input type="text" class="form-control required" name="metal" id="metal" placeholder="Enter Metal"/> 
							</div> 
						</div>
						 <div class="col-md-3" style="display:none;">
							<div class="form-group"> 
								<label>HSNC</label> 
								<input type="text" class="form-control required" name="hsnc" id="hsnc" placeholder="Enter HSNC"/>  
							</div> 
						</div>
						  
					     <div class="col-md-12"style="margin-top:10px;margin-bottom:15px;"> 
					        <a href="javascript:void(0);" class="add_button btn btn-primary" title="Add field">Add Stones</a> 
					    </div>
						 <div class="col-md-12">
						   <div class="field_wrapper" style="padding: 10px;margin-bottom:25px;">  
					    
					</div> 
						 </div>
						
						
						<div class="col-md-3">   
							<div class="form-group">   
								<label>Purity Type :</label>  
								<select id="caretsTypes" name="caretsTypes" class="form-control">
									<option value="">Select Caret </option> 
									<?php
									foreach($CaretsType as $Car)    
									{       
										?>   
									<option value="<?php echo $Car['GoldRateId']; ?>"><?php echo $Car['GoldCaret']; ?></option>
										<?php          
									}       
									?>   
									 
								</select>
							</div>
						</div>
						

						<div id="platinum" style="display: none;">
							<div class="col-md-3">
							<div class="form-group">
								<label>Platinum Price</label>
								
									<input type="text" class="form-control required" name="platinumprice" id="platinumprice" placeholder="Platinum Price" value="0" onkeyup="subtract2();"/>
									
								
							</div>
						</div>
						</div>
						<div id="diamond" >
							<div class="col-md-3" style="display:none">
							<div class="form-group"> 
								<label>Diamond Price</label>  
								
									<input type="text" class="form-control required" name="diamondprice" id="diamondprice" placeholder="Diamond Price" value="0" onkeyup="subtract2();"/>
									
								
							</div>
						</div>  
						</div>  
						<div class="col-md-3" id="dwwws" style="display:none">    
							<div class="form-group"> 
								<label>Diamond Weight Cts</label>  
								
									<input type="text" class="form-control required" name="dcts" id="dcts" placeholder="Enter diamond wt Cts" value="0" onkeyup="subtract2();"/>
									
								
							</div> 
						</div>
						<div id="platinumhide">
						
						<div class="col-md-3">
							<div class="form-group">
								<label>Gold Weight In Gms</label>
								
									<input type="text" class="form-control required" name="gms" id="gms" placeholder="Gms" value="0" onkeyup="subtract2();"/>
									
								
							</div>
						</div>
						
						<div class="col-md-3" id="stchange">  
							<div class="form-group">  
								<label >Stone Weight in Gms</label> 
								
									<input type="text" class="form-control required" name="stw" id="stw" placeholder="Gms" value="0" onkeyup="subtract2();"/>
									
								
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">   
								<label>Gross Weight</label>  
								
									<input type="text" class="form-control required" name="grw" id="grw" placeholder="Gms" value="0" onkeyup="subtract2();"/>
									
								
							</div>
						</div>

						<div class="col-md-3">     
							<div class="form-group"> 
								<label>Gold Rate For Gram</label>
								<?php
								if($GoldRate)     
								{
									?>
									<input type="text" class="form-control required" name="grates" id="grates" value="<?php echo $GoldRate['GoldRate']; ?>" placeholder="Certificate Name" onkeyup="subtract2();" readonly/>
									<?php
								}
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label>Gold Price</label>
								
									<input type="text" class="form-control required" name="gprice" id="gprice" placeholder="Gold Price" value="0" onkeyup="subtract2();"/>
									
								
							</div>
						</div>
					</div>
                      <div class="col-md-3">
							<div class="form-group"> 
								<label>Stone Price</label> 
								
									<input type="text" class="form-control required" name="stoneprice" id="stoneprice" placeholder="Gold Price" value="0" onkeyup="subtract2();"/>
									
								
							</div>
						</div>
						<div class="col-md-3"> 
							<div class="form-group">
								<label>Labour Amount</label>
								
									<input type="text" class="form-control required" name="mcharge" id="mcharge" value="0" placeholder="Making Charge" onkeyup="subtract2();"/>
									
								
							</div>
						</div>
						<div class="col-md-3" style="display:none"> 
							<div class="form-group">
								<label>Mak Charge</label>      
								
									<input type="text" class="form-control required" name="mchargeper" id="mchargeper" placeholder="Making Charge" value="0" onkeyup="subtract2();"/>
									
								
							</div> 
						</div> 
						
						<div class="col-md-3"> 
							<div class="form-group">   
								<label> Wastage Percent</label>       
			
									<input type="text" class="form-control required" name="makcharge" id="makcharge" placeholder="Making Charges" onChange="findwastageweight()" value="0" />  
									
							</div> 
						</div> 
						<div class="col-md-3">  
							<div class="form-group">  
								<label> Wastage weight</label>         
								
									<input type="text" class="form-control required" name="makchargeamount" id="makchargeamount" placeholder="Making Charges" onkeyup="subtract2();" value="0" /> 
									
							</div> 
						</div>
 
						<div class="col-md-3">
							<div class="form-group">
								<label>GST</label>
								
									<input type="text" class="form-control required" name="gst" id="gst" placeholder="GST" onkeyup="subtract2();"/>
									
								
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Tax</label>
								
									<input type="text" class="form-control required" name="tax" id="tax" placeholder="Tax Amount" onkeyup="subtract2();"/>
									
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label>Total Price</label>
								
									<input type="text" class="form-control required" name="tprice" id="tprice" placeholder="Total Price" onkeyup="subtract2();"/>
									
								
							</div>
						</div>

						
                       <div class="col-md-3">
							<div class="form-group">
								<label>Product Status:</label>
								<select id="pstatus" name="pstatus" class="form-control">
									<option value="">Select Status</option>
									<option value="1">Enable</option>
									<option value="0">Disable</option>
								</select>
							</div>
						</div>
							
					</div>

					<div id="goldinformation" style="margin-top: 15px;display: none;">
					<div class="row">
						<div class="col-md-12">
							<div class="ziehharmonika">
								<h3 id="gbinfo">Basic Information<div class="collapseIcon">+</div></h3>
								
								<div>
									<input type="hidden" name="gbinfoid" id="gbinfoid" />
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-3">
											<div class="form-group">
												<label>Product Type</label>
												<input type="text" class="form-control required" name="gptype" id="gptype" placeholder="Product Type"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Brands</label>
												<input type="text" class="form-control required" name="gbrands" id="gbrands" placeholder="Brands"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Gender</label>
												<input type="text" class="form-control required" name="ggender" id="ggender" placeholder="Gender"/>
											</div>
										</div>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="ziehharmonika">
								<h3 class="h3click">Metal Information<div class="collapseIcon">+</div></h3>

								<div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-3">
											<div class="form-group">
												<label>Gold Purity</label>
												<input type="text" class="form-control required" name="gpurity" id="gpurity" placeholder="Gold Purity"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Gold Colour</label>
												<input type="text" class="form-control required" name="gcolor" id="gcolor" placeholder="Gold Colour"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Gross Weight (Approx Gms)</label>
												<input type="text" class="form-control required" name="ggweight" id="ggweight" placeholder="Gross Weight (Approx Gms)"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Net Weight (Approx Gms)</label>
												<input type="text" class="form-control required" name="gnweight" id="gnweight" placeholder="Net Weight (Approx Gms)"/>
											</div>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="ziehharmonika">
								<h3 class="h3click">Stone Information<div class="collapseIcon">+</div></h3>

								<div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-3">
											<div class="form-group">
												<label>Stone Weight (Approx Gms)</label>
												<input type="text" class="form-control required" name="gstoneweight" id="gstoneweight" placeholder="Stone Weight (Approx Gms)"/>
											</div>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="ziehharmonika">
								<h3 class="h3click">Certification Details<div class="collapseIcon">+</div></h3>

								<div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-3">
											<div class="form-group">
												<label>Gold Certification</label>
												<input type="text" class="form-control required" name="gcertification" id="gcertification" placeholder="Gold Certification"/>
											</div>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="ziehharmonika">
								<h3 class="h3click">Product Dimension<div class="collapseIcon">+</div></h3>

								<div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-3">
											<div class="form-group">
												<label>Product Size (Indian)</label>
												<input type="text" class="form-control required" name="gproductsize" id="gproductsize" placeholder="Product Size (Indian)"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Product Height (mm)</label>
												<input type="text" class="form-control required" name="gproductheight" id="gproductheight" placeholder="Product Height (mm)"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Product Width (mm)</label>
												<input type="text" class="form-control required" name="gproductwidth" id="gproductwidth" placeholder="Product Width (mm)"/>
											</div>
										</div>
										</div>
									</div>		
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="ziehharmonika">
								<h3 class="h3click">Other Information<div class="collapseIcon">+</div></h3>

								<div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-3">
											<div class="form-group">
												<label>Theme</label>
												<input type="text" class="form-control required" name="gtheme" id="gtheme" placeholder="Theme"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Design Type</label>
												<input type="text" class="form-control required" name="gdesigntype" id="gdesigntype" placeholder="Design Type"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Wearing Style</label>
												<input type="text" class="form-control required" name="gwearingstyle" id="gwearingstyle" placeholder="Wearing Style"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Occasion</label>
												<input type="text" class="form-control required" name="goccasion" id="goccasion" placeholder="Occasion"/>
											</div>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div id="diamondinformation" style="margin-top: 15px;display: none;">
					<div class="row">
						<div class="col-md-12">
							<div class="ziehharmonika">
								<h3 class="h3click">Basic Information<div class="collapseIcon">+</div></h3>

								<div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-3">
											<div class="form-group">
												<label>Product Type</label>
												<input type="text" class="form-control required" name="dptype" id="dptype" placeholder="Product Type"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Brands</label>
												<input type="text" class="form-control required" name="dbrands" id="dbrands" placeholder="Brands"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Item package quantity</label>
												<input type="text" class="form-control required" name="dpqty" id="dpqty" placeholder="Item package quantity"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Gender</label>
												<input type="text" class="form-control required" name="dgender" id="dgender" placeholder="Gender"/>
											</div>
										</div>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="ziehharmonika">
								<h3 class="h3click">Metal Information<div class="collapseIcon">+</div></h3>

								<div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-3">
											<div class="form-group">
												<label>Gold Purity</label>
												<input type="text" class="form-control required" name="dgpurity" id="dgpurity" placeholder="Gold Purity"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Gold Colour</label>
												<input type="text" class="form-control required" name="dgcolor" id="dgcolor" placeholder="Gold Colour"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Gross Weight (Approx Gms)</label>
												<input type="text" class="form-control required" name="dggweight" id="dggweight" placeholder="Gross Weight (Approx Gms)"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Net Weight (Approx Gms)</label>
												<input type="text" class="form-control required" name="dgnweight" id="dgnweight" placeholder="Net Weight (Approx Gms)"/>
											</div>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="ziehharmonika">
								<h3 class="h3click">Diamond Information<div class="collapseIcon">+</div></h3>

								<div>
									<div class="row">
										<div class="col-md-12">

											<div class="col-md-3">
											<div class="form-group">
												<label>Diamond Cut</label>
												<input type="text" class="form-control required" name="dcut" id="dcut" placeholder="Diamond Cut"/>
											</div>
										</div>

											<div class="col-md-3">
											<div class="form-group">
												<label>Diamond Colour</label>
												<input type="text" class="form-control required" name="dcolor" id="dcolor" placeholder="Diamond Colour"/>
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group">
												<label>Diamond Clarity</label>
												<input type="text" class="form-control required" name="dclarity" id="dclarity" placeholder="Diamond Clarity"/>
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group">
												<label>Diamond Carat (Cts)</label>
												<input type="text" class="form-control required" name="dcarat" id="dcarat" placeholder="Diamond Carat (Cts)"/>
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group">
												<label>Diamond Pcs</label>
												<input type="text" class="form-control required" name="dpcs" id="dpcs" placeholder="Diamond Pcs"/>
											</div>
										</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="ziehharmonika">
								<h3 class="h3click">Certification Details<div class="collapseIcon">+</div></h3>

								<div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-3">
											<div class="form-group">
												<label>Gold Certification</label>
												<input type="text" class="form-control required" name="dgcertification" id="dgcertification" placeholder="Gold Certification"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Diamond Certification</label>
												<input type="text" class="form-control required" name="dcertification" id="dcertification" placeholder="Diamond Certification"/>
											</div>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="ziehharmonika">
								<h3 class="h3click">Product Dimension<div class="collapseIcon">+</div></h3>

								<div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-3">
											<div class="form-group">
												<label>Product Size (Indian)</label>
												<input type="text" class="form-control required" name="dproductsize" id="dproductsize" placeholder="Product Size (Indian)"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Product Height (mm)</label>
												<input type="text" class="form-control required" name="dgproductheight" id="dgproductheight" placeholder="Product Height (mm)"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Product Width (mm)</label>
												<input type="text" class="form-control required" name="dgproductwidth" id="dgproductwidth" placeholder="Product Width (mm)"/>
											</div>
										</div>
										</div>
									</div>		
								</div>
							</div>
						</div>
					</div>

					
					<div class="row">
						<div class="col-md-12">
							<div class="ziehharmonika">
								<h3 class="h3click">Other Information<div class="collapseIcon">+</div></h3>

								<div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-3">
											<div class="form-group">
												<label>Theme</label>
												<input type="text" class="form-control required" name="dtheme" id="dtheme" placeholder="Theme"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Design Type</label>
												<input type="text" class="form-control required" name="ddesigntype" id="ddesigntype" placeholder="Design Type"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Wearing Style</label>
												<input type="text" class="form-control required" name="dwearingstyle" id="dwearingstyle" placeholder="Wearing Style"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Occasion</label>
												<input type="text" class="form-control required" name="doccasion" id="doccasion" placeholder="Occasion"/>
											</div>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div id="platinuminformation" style="margin-top: 15px;display: none;">
					<div class="row">
						<div class="col-md-12">
							<div class="ziehharmonika">
								<h3 class="h3click">Basic Information<div class="collapseIcon">+</div></h3>

								<div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-3">
											<div class="form-group">
												<label>Product Type</label>
												<input type="text" class="form-control required" name="pptype" id="pptype" placeholder="Product Type"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Brands</label>
												<input type="text" class="form-control required" name="pbrands" id="pbrands" placeholder="Brands"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Item package quantity</label>
												<input type="text" class="form-control required" name="ppqty" id="ppqty" placeholder="Item package quantity"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Gender</label>
												<input type="text" class="form-control required" name="pgender" id="pgender" placeholder="Gender"/>
											</div>
										</div>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="ziehharmonika">
								<h3 class="h3click">Platinum Information<div class="collapseIcon">+</div></h3>

								<div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-3">
											<div class="form-group">
												<label>Platinum Purity</label>
												<input type="text" class="form-control required" name="ppurity" id="ppurity" placeholder="Platinum Purity"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Platinum Color</label>
												<input type="text" class="form-control required" name="pcolor" id="pcolor" placeholder="Platinum Color"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Platinum Gross Weight (Approx Gms)</label>
												<input type="text" class="form-control required" name="pgweight" id="pgweight" placeholder="Platinum Gross Weight (Approx Gms)"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Platinum Net Weight (Approx Gms)</label>
												<input type="text" class="form-control required" name="pnweight" id="pnweight" placeholder="Platinum Net Weight (Approx Gms)"/>
											</div>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="ziehharmonika">
								<h3 class="h3click">Certification Details<div class="collapseIcon">+</div></h3>

								<div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-3">
											<div class="form-group">
												<label>Platinum Certification</label>
												<input type="text" class="form-control required" name="pcertification" id="pcertification" placeholder="Platinum Certification"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Diamond Certification (If any)</label>
												<input type="text" class="form-control required" name="pdcertification" id="pdcertification" placeholder="Diamond Certification"/>
											</div>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="ziehharmonika">
								<h3 class="h3click">Product Dimension<div class="collapseIcon">+</div></h3>

								<div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-3">
											<div class="form-group">
												<label>Product Size (Indian)</label>
												<input type="text" class="form-control required" name="pproductsize" id="pproductsize" placeholder="Product Size (Indian)"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Product Height (mm)</label>
												<input type="text" class="form-control required" name="pproductheight" id="pproductheight" placeholder="Product Height (mm)"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Product Width (mm)</label>
												<input type="text" class="form-control required" name="pproductwidth" id="pproductwidth" placeholder="Product Width (mm)"/>
											</div>
										</div>
										</div>
									</div>		
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="ziehharmonika">
								<h3 class="h3click">Diamond Information<div class="collapseIcon">+</div></h3>

								<div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-3">
											<div class="form-group">
												<label>Diamond Cut</label>
												<input type="text" class="form-control required" name="pdcut" id="pdcut" placeholder="Diamond Cut"/>
											</div>
										</div>
											<div class="col-md-3">
											<div class="form-group">
												<label>Diamond Colour</label>
												<input type="text" class="form-control required" name="pdcolor" id="pdcolor" placeholder="Diamond Colour"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Diamond Clarity</label>
												<input type="text" class="form-control required" name="pdclarity" id="pdclarity" placeholder="Diamond Clarity"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Diamond Carat (Cts)</label>
												<input type="text" class="form-control required" name="pdcarat" id="pdcarat" placeholder="Diamond Carat (Cts)"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Diamond Pcs</label>
												<input type="text" class="form-control required" name="pdpcs" id="pdpcs" placeholder="Diamond Pcs"/>
											</div>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="ziehharmonika">
								<h3 class="h3click">Other Information<div class="collapseIcon">+</div></h3>

								<div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-3">
											<div class="form-group">
												<label>Theme</label>
												<input type="text" class="form-control required" name="ptheme" id="ptheme" placeholder="Theme"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Design Type</label>
												<input type="text" class="form-control required" name="pdesigntype" id="pdesigntype" placeholder="Design Type"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Wearing Style</label>
												<input type="text" class="form-control required" name="pwearingstyle" id="pwearingstyle" placeholder="Wearing Style"/>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Occasion</label>
												<input type="text" class="form-control required" name="poccasion" id="poccasion" placeholder="Occasion"/>
											</div>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


					<div class="row" style="display:none;">
						<div class="col-md-12"> 
							<div class="form-group">
								<label>Text <span id="ck_text_error"></span></label>
								<textarea class="form-control required" name="text" id="text" placeholder="Certificate Name"/></textarea>
							</div>
						</div>
						
					</div>

					<div class="row">
						<div class="col-md-3">
							<label>Image</label>
							<a href="" id="upload_link">
								<div id="targetOuter">
								<div id="targetLayer"></div>
								<img src="<?php echo base_url(); ?>images/photo.png" class="icon-choose-image imgs" id="imghide">
							</div>
							</a>
							<input type="file" class="form-control required" name="pimage" id="pimage" onchange="showPreview(this);" style="display: none;"/>
						</div>

						<div class="col-md-3">
							<label>Image 1</label>
							<a href="" id="upload_link1">
								<div id="targetOuter">
								<div id="targetLayer1"></div>
								<img src="<?php echo base_url(); ?>images/photo.png" class="icon-choose-image imgs" id="imghide1">
							</div>
							</a>
							<input type="file" class="form-control required" name="pimage1" id="pimage1" onchange="showPreview1(this);" style="display: none;"/>
						</div>

						<div class="col-md-3">
							<label>Image 2</label>
							<a href="" id="upload_link2">
								<div id="targetOuter">
								<div id="targetLayer2"></div>
								<img src="<?php echo base_url(); ?>images/photo.png" class="icon-choose-image imgs" id="imghide2">
							</div>
							</a>
							<input type="file" class="form-control required" name="pimage2" id="pimage2" onchange="showPreview2(this);" style="display: none;"/>
						</div>
							<!---video section starts-------->
      <div class="col-md-3">
         <div class="form-group">
			  <div class="image-upload">
						  <label for="files">Video Upload: 
							<img src="<?php echo base_url() ?>frontendassets/images/video.png"/> 
						  </label>
						  
						  
						 <input type="file" name="files" id="files" multiple />
						<div class="col-md-12" >
						  <div class="row" id="uploaded_images">
							<div class="col-md-3" id="editedvideo">
								<video controls="" style="width: 179px;height:100px;" id="v1">
									
								</video>
							</div>
						  <input type="hidden" id="orderVideo" name="orderVideo[]" value = "">
						  </div>
						</div>
			  </div>
         </div>
        <div class="progress">
          <div class="progress-bar"></div>
        </div>
     </div>				
<!---video section ends-------->
						
						

					</div>

					
						
						
				
					<input type="hidden" id="ProductId" name="ProductId" />
					<input type="hidden" name="Add_Edit_Products" value="true"/>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group"><br>
								<button class="btn btn-primary " id="SubmitBtn"><i class="fa fa-check"></i> Submit</button>
								<button class="btn btn-danger " id="CancelBtn"><i class="fa fa-times"></i> Cancel</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Products List</h3>
				<button class="pull-right btn-primary btn" id="search">Search</button>
				<input type="text" class="form-control pull-right" id="skey" style="width:40%">
				<div class="col-md-2">
					<button class="btn btn-primary"  type="button" data-toggle="modal" data-target="#myModalExcel"  >Import</button> 
				</div> 
			</div>
			<div class="box-body">
				<table id="InstallationsTable" class="table table-bordered table-hover table-container">
					<thead>
						<tr>
							<th>Sno</th>
							<th>Image</th>
							<th>Product Name</th>
							<th>Tag No</th>
							<th>Price</th> 
							<th>Pieces</th>
							<th>Status</th>
							<th>Actions</th> 
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
		<ul id="pagination" class="pagination"></ul>
	</section>
</div>
<div class="modal fade" id="myModalExcel" role="dialog">
							<div class="modal-dialog modal-sm">
							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title">Import Your Excel</h4>
								</div>
								<div class="modal-body"> 
								  <form id="excel_import_form" name="excel_import_form" onsubmit="return false;">
									<div class="form-group">
										<a href="<?php echo base_url('documents\samples\results.xlsx'); ?>">Download sample Excel</a>
									</div>
									<div class="form-group">
										<input type="file" class="form-control" id="import_file" name="import_file" > 
										<input type="hidden"  id="Role" name="Role"  value="import_file_flag"> 
									</div>
									<div class="fomr-group">
										<button type="submit" class="btn btn-primary btn-block" >Import</button>
										<p id="alert_mssg"></p>
									</div>
								  </form>
								</div>
								<div class="modal-footer">
								  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							  </div>
							</div>
						  </div>
<script type="text/javascript" src="<?php echo base_url() ?>frontendassets/js/ziehharmonika.js"></script>
<script src="<?php echo  base_url(); ?>ckeditor/ckeditor.js"></script>
<script type="text/javascript">
	CKEDITOR.replace('text')
</script>
<script type="text/javascript">
	$(document).ready(function() {
		
	$('.ziehharmonika').find('.collapseIcon').trigger('click');
		$('.ziehharmonika').ziehharmonika({
			collapsible: true,
			prefix: '' 
			
		});


	});
</script>
</script>
<script>
$(function(){
	cpage = 1;
	get_products(cpage);
	
	$('#search').click(function(){
		get_products(1);
	});
	
	$('#SubmitBtn').click(function(){
		vaidate_from();
	});
	$('#CancelBtn').click(function(){
		window.location.reload();
	});
	
	$('#AddBtn').click(function(){
		$('#AddBdy').show();
		$('#editedvideo').hide();
		$('#AddBtn').hide();
	});
	$('#Status').change(function(){
		if($(this).val() == '0')
			$('#descdiv').show();
		else
			$('#descdiv').hide();
	});

	$('#upload_link').on('click',function(e){
		e.preventDefault();
		$('#pimage').trigger('click');
	});

	$('#upload_link1').on('click',function(e){
		e.preventDefault();
		$('#pimage1').trigger('click');
	});

	$('#upload_link2').on('click',function(e){
		e.preventDefault();
		$('#pimage2').trigger('click');
	});

	$('#ptype').change(function(){

		if($(this).val() == '1')
		{
		//	$('#goldinformation').show(); 
		//	$('#jcaratid').show(); 
		//	$('#diamondinformation').hide();
		//	$('#platinuminformation').hide(); 
		$('#dwwws').hide(); 
		$('#stchangedia').hide();  
		}

		if($(this).val() == '2')
		{
			$('#diamond').show();   
          
			
			 
			$('#stchangedia').show();
		//	$('#goldinformation').hide();   
		//	$('#jcaratid').hide(); 
			//  $('#diamondinformation').show();   
		//	$('#platinuminformation').hide();
		} 
		else
		{
			$('#diamond').hide();
		}

		if($(this).val() == 3)
		{
			$('#grates').val(0); 
			//$('#jcaratid').hide(); 
			$('#platinumhide').hide(); 
			$('#diamond').show(); 
			$('#platinum').show();

			//$('#goldinformation').hide();
			//$('#diamondinformation').hide();
			//$('#platinuminformation').show();
		}
		else
		{
			$('#grates').val(<?php echo $GoldRate['GoldRate']; ?>);
			$('#platinumhide').show();
			$('#platinum').hide();
		}

	});


	$('#gbinfo').click(function(){
		$('#gbinfoid').val(1);
	});

	$('#catname').change(function(){
		var catname = $.trim($('#catname').val());
		if(catname != '')
		{
			$.ajax({
				url:"",
				type:"POST",
				data:{'get':'scategory','catname':catname},
				beforesend:function() {},
				complete:function() {},
				success:function(data)
				{
					data = $.parseJSON(data);
					var html = '<option value="0">Select Sub Category</option>';
					$.each(data,function(i){
						var scat = data[i];
						html+="<option value='"+scat.subcategory_name_id+"'>"+scat.Title+"</option>";
					});

					$('#scatname').html(html);
				}
			});
		}
	});
	
	
	$('#caretsTypes').change(function(){
		var caretsTypes = $.trim($('#caretsTypes').val());
		//alert(caretsTypes);
		
		if(catname != '') 
		{
			$.ajax({
				url:"", 
				type:"POST",
				data:{'get':'caretsTypesV','caretsTypesid':caretsTypes},
				beforesend:function() {}, 
				complete:function() {},
				success:function(data) 
				{
					data = $.parseJSON(data);   
					$('#grates').val(data.GoldRate);   
					//console.log(data); 
				}
			});
		}
	}); 
	

	$('#catname').change(function(){
		var catname = $.trim($('#catname').val());
		if(catname != '')
		{
			$.ajax({
				url:"",
				type:"POST",
				data:{'get':'scategory','catname':catname},
				beforesend:function() {},
				complete:function() {},
				success:function(data)
				{
					data = $.parseJSON(data);
					var html = '<option value="0">Select Sub Category</option>';
					$.each(data,function(i){
						var scat = data[i];
						html+="<option value='"+scat.subcategory_name_id+"'>"+scat.Title+"</option>";
					});

					$('#scatname').html(html);
				}
			});
		}
	});

	$('#scatname').change(function(){
		var scatname = $.trim($('#scatname').val());
		if(scatname != '')
		{
			$.ajax({
				url:"",
				type:"POST",
				data:{'get':'scategorylist','scatname':scatname},
				beforesend:function() {},
				complete:function() {},
				success:function(data)
				{
					data = $.parseJSON(data);
					var html = '<option value="">--Select Sub Category List--</option>';
					$.each(data,function(i){
						var scatli = data[i];
						html+="<option value="+scatli.SubCategoryId+">"+scatli.SubCategoryName+"</option>";
					});
					$('#scatlist').html(html);
				}
			});
		}
	});

});

function showPreview(objFileInput) {
		if (objFileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
			$("#targetLayer").html('<img src="'+e.target.result+'" width="200px" height="200px" class="upload-preview" />');
			//$("#targetLayer").css('opacity','0.7');
			//$(".icon-choose-image").css('opacity','0.5');
        }
		fileReader.readAsDataURL(objFileInput.files[0]);
		$('#imghide').hide();
		$('#targetLayers').hide();
    }

}

function showPreview1(objFileInput) {
		if (objFileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
			$("#targetLayer1").html('<img src="'+e.target.result+'" width="200px" height="200px" class="upload-preview" />');
			//$("#targetLayer").css('opacity','0.7');
			//$(".icon-choose-image").css('opacity','0.5');
        }
		fileReader.readAsDataURL(objFileInput.files[0]);
		$('#imghide1').hide();
		$('#targetLayers').hide();
    }

}

function showPreview2(objFileInput) {
		if (objFileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
			$("#targetLayer2").html('<img src="'+e.target.result+'" width="200px" height="200px" class="upload-preview" />');
			//$("#targetLayer").css('opacity','0.7');
			//$(".icon-choose-image").css('opacity','0.5');
        }
		fileReader.readAsDataURL(objFileInput.files[0]);
		$('#imghide2').hide();
		$('#targetLayers').hide();
    }

}

function subtract2()
{
	getwastage();
	var gms = document.getElementById('gms').value;   
	var diamondprice = document.getElementById('diamondprice').value;
	var platinumprice = document.getElementById('platinumprice').value;
	var grates = document.getElementById('grates').value;
	var gprice = document.getElementById('gprice').value;
	var mcharge = document.getElementById('mcharge').value;
	var gst = document.getElementById('gst').value;
	var stow = document.getElementById('stw').value;
	var tax = document.getElementById('tax').value;   
	var tprice = document.getElementById('tprice').value; 
    var stoneprice = document.getElementById('stoneprice').value;
   // var dcts = document.getElementById('dcts').value;
	var makchargeamount = document.getElementById('makchargeamount').value;
	//alert(parseFloat(dcts)/5); 
	var StW = parseFloat(grates);  
	var GoldRate = parseFloat(gms)*parseFloat(grates);   
    var grossWeight  = parseFloat(gms) + parseFloat(stow) ;    
	var PlatinumTotal = parseFloat(platinumprice);      
 
	var DiamondGold = (parseFloat(diamondprice))+parseFloat(gprice)+parseFloat(PlatinumTotal);
	console.log(DiamondGold); 
    var wastageCh   = (parseFloat(mcharge));   
	var perMcharge = parseFloat(makchargeamount);  
	var goldb = (((parseFloat(gms)+parseFloat(makchargeamount))*parseFloat(grates))+parseFloat(mcharge)+parseFloat(stoneprice)); 
	//alert(goldb);    
     var  golda = (goldb)*(parseFloat(gst)/100);
	 //alert(golda); 
	  //alert(golda+goldb + 'Total');
var totprice= (golda+goldb); 
  // alert(totprice); 	     
	//console.log(perMcharge);                
	var Tax = (((parseFloat(gms)+parseFloat(makchargeamount))*parseFloat(grates))+parseFloat(stoneprice)+parseFloat(mcharge))*parseFloat(gst)/100;  
        
	var TotalPrice = (((parseFloat(gms)+parseFloat(makchargeamount))*parseFloat(grates))+parseFloat(stoneprice)+parseFloat(mcharge))+Tax;

	if(!isNaN(gms)) 
	{
		document.getElementById('grw').value = parseFloat(grossWeight) ; 
	}
	
	if(!isNaN(GoldRate))   
	{  
		document.getElementById('gprice').value = GoldRate; 
		
		document.getElementById('mchargeper').value = perMcharge;  
	}  
	if(!isNaN(StW))
	{ 
		document.getElementById('grw').value = grossWeight; 
	}
 
	if(!isNaN(Tax))
	{
		document.getElementById('tax').value = Tax;
	}

	if(!isNaN(totprice))
	{
		document.getElementById('tprice').value = totprice;
	}
	
}

function get_products(page)
{
	var skey = $.trim($('#skey').val());
	$.ajax({
		url:"",
		method : "POST",
		data:{'get':'allproducts','page':page,'skey':skey},
		success:function(data){
			data = $.parseJSON(data);
			var html='';
			if(data.products!='')
			{
				var n = 1;
				$.each(data.products, function(i){
					var row = data.products[i];
					var status = '';
					var $n = n++;
					if(row.ProductStatus == '1')
						status = "<span class='label label-success'>Enable</span>";
					else
						status = "<span class='label label-danger'>Disable</span>";
					

					html+=" <tr><td>"+$n+"</td><td><img src="+row.Image+" style='height:75px;width:75px'></td><td>"+row.ProductName+"</td><td>"+row.tagno+"</td><td>"+row.TotalPrice+"</td><td>"+row.Quantity+"</td><td>"+status+"</td><td><button class='btn btn-primary btn-xs' onclick='edit("+row.ProductId+")'><i class='fa fa-pencil'></i></button>&nbsp;&nbsp;&nbsp;<button class='btn btn-danger btn-xs' onclick='del("+row.ProductId+")'><i class='fa fa-trash'></i></button></td></tr>";
				});
			}
			else
				html+="<td></td><td></td><td>No Results Found..</td><td></td><td></td>";
			$('#InstallationsTable').find('tbody').html(html);
			$('#pagination').html(data.pagination);
			$('#pagination').find('li').click(function(){
				get_products($(this).attr('page'));
			});
		}
	});
}

function edit(id)
{
	id = $.trim(id);
	if(id!='')
	{
		$.ajax({
			url:"",
			method : "POST",
			data:{'get':'productlist','pid':id},
			success:function(data){
				data1 = $.parseJSON(data);
				var html='';
				var fieldHTML = '';
				if(data1.products!='')
				{
					 stoneedit(id);  
					$('#ProductId').val(data1.prodid);
					$('#fixednonfixed').val(data1.FixedNonFixed);
					$('#caretsTypes').val(data1.caretsTypesId);
					$('#ptype').val(data1.ProductTypeForFixedNonFixed);
					$('#tagno').val(data1.tagno);
					$('#counter').val(data1.counter);
					$('#party').val(data1.party);    
					$('#productname').val(data1.ProductName);
					$('#productmodel').val(data1.Model); 
					$('#ProductCategory').val(data1.ProductCategory); 
					$('#sold').val(data1.Stock); 
					
					$('#metal').val(data1.metal);
					$('#hsnc').val(data1.hsnc);
					$('#psize').val(data1.ProductSize); 
					$('#sort').val(data1.Sort);
					$('#pcs').val(data1.Quantity);
					$('#gms').val(data1.gms);  
					$('#stw').val(data1.stw);    
					$('#grw').val(data1.grw);
					$('#stoneprice').val(data1.stoneprice); 
					$('#grates').val(data1.TodayGoldRate); 
					$('#gprice').val(data1.GoldPrice);
					$('#mcharge').val(data1.MakingCahrges);
					$('#mchargeper').val(data1.MakingChargesPer);
					$('#gst').val(data1.Gst);  
					$('#tax').val(data1.Tax);
					$('#tprice').val(data1.TotalPrice);
					
					$('#pstatus').val(data1.ProductStatus);                     
					$('#catname').val(data1.prcat);       
					alert('Are You Sure TO Edit...');  
                    $('#makcharge').val(data1.wastagepercentage); 	
                      $('#makchargeamount').val(data1.makchargeamount);		
                    $('#gender').val(data1.gender1);           
					                   
                   // $('#jcarat').val(data1.jcaratj);       
				
					// $('#caratname').val(data1.caratname);  
					$('#piecename').val(data1.piecename);
					$('#style').val(data1.stonestyle);								
					$('#catname').trigger('change');  
					getmodelvals(data1.stonestyle,data1.stonemodel);
					var catname = $.trim($('#catname').val());
					if(catname!='')
					{
						
						$.ajax({
							url:"",
							type:"POST",
							data:{'get':'scategory','catname':catname},
							beforesend:function() {},
							complete:function() {},
							success:function(data)
							{
								data = $.parseJSON(data);
								var html = '<option value="">Select Sub Category</option>';
								$.each(data,function(i){ 
									var scat = data[i];
									//alert(scat.Title); 
									html+="<option value='"+scat.subcategory_name_id+"'>"+scat.Title+"</option>";
								});

								$('#scatname').html(html);
								$('#scatname').val(data1.subcatid);
								getscat(data1.subcatid,data1.SubCategoryList);  
								
								
							}
						});
					}


					//Gold Information For Edit

					if(data1.ProductTypeForFixedNonFixed == '1')
					{
						$('#goldinformation').hide();
						$('#platinuminformation').hide();
						$('#diamondinformation').hide(); 
                        $('#dwwws').hide();  
		                $('#stchangedia').hide(); 
						$('#diamond').hide();
						//Gold Basic Information
						$('#gptype').val(data1.GoldProductType);
						$('#gbrands').val(data1.Brands);
						$('#ggender').val(data1.gbgender);

						//Metal Information

						$('#gpurity').val(data1.gmpurity);
						$('#gcolor').val(data1.gmcolor);
						$('#ggweight').val(data1.gmgweight);
						$('#gnweight').val(data1.gmnweight);

						//Certification Details

						$('#gcertification').val(data1.gcgcertificate);

						//Stone Information

						$('#gstoneweight').val(data1.StoneWeight);

						//Product Dimension

						$('#gproductsize').val(data1.GoldProductSize);
						$('#gproductheight').val(data1.GoldProductHeight);
						$('#gproductwidth').val(data1.GoldProductWidth);

						//Other Information

						$('#gtheme').val(data1.gtheme);
						$('#gdesigntype').val(data1.gdtype);
						$('#gwearingstyle').val(data1.gwstyle);
						$('#goccasion').val(data1.goccason);
					}

					//Diamond Information For Edit

					if(data1.ProductTypeForFixedNonFixed == '2')
					{
						$('#diamondinformation').hide();
						$('#goldinformation').hide();
						$('#platinuminformation').hide();
                        $('#dwwws').hide(); 
		                $('#stchangedia').hide(); 
						//Diamond Basic Information 
						$('#dptype').val(data1.DimondProductType);  
						$('#diamondprice').val(data1.DiamondPrice);      
                        $('#dcts').val(data1.dcts);		 				
						$('#dbrands').val(data1.DiamondBrnds);
						$('#dpqty').val(data1.DiamondItemPackagingQty);
						$('#dgender').val(data1.dbgender);

						//Diamond Gold Metal Weight

						$('#dgpurity').val(data1.dgmgpurity);
						$('#dgcolor').val(data1.dgmgcolor);
						$('#dggweight').val(data1.dgmggweight);
						$('#dgnweight').val(data1.dgmgnweight);

						//Diamond Information

						$('#dcut').val(data1.dicut);
						$('#dcolor').val(data1.dicolor);
						$('#dclarity').val(data1.diclarity);
						$('#dcarat').val(data1.dicarat);
						$('#dpcs').val(data1.dipieces);

						//Certification Details

						$('#dgcertification').val(data1.dcgcertificate);
						$('#dcertification').val(data1.dcdcertificate);

						//Product Dimension

						$('#dproductsize').val(data1.DiamondProductSize);
						$('#dgproductheight').val(data1.DiamondProductHeight);
						$('#dgproductwidth').val(data1.DiamondProductWidth);

						//Other Information

						$('#dtheme').val(data1.dgogtheme);
						$('#ddesigntype').val(data1.dgogdtype);
						$('#dwearingstyle').val(data1.dgogwstyle);
						$('#doccasion').val(data1.dgogoccasion);
					}

					//Platinum Information For Edit

					if(data1.ProductTypeForFixedNonFixed == '3')
					{
						$('#platinuminformation').hide();
						$('#goldinformation').hide();
						$('#diamondinformation').hide();

						//Platinum Basic Information
						$('#pptype').val(data1.PlatinumProductType);
						$('#pbrands').val(data1.PlatinumBrnds);
						$('#ppqty').val(data1.PlatinumItemPackagingQty);
						$('#pgender').val(data1.pbgender);

						//Platinum Information

						$('#ppurity').val(data1.PlatinumPurity);
						$('#pcolor').val(data1.PlatinumColor);
						$('#pgweight').val(data1.PlatinumWeight);
						$('#pnweight').val(data1.PlatinumNetWeight);

						//Certification Details

						$('#pcertification').val(data1.PlatinumCertificate);
						$('#pdcertification').val(data1.PlatinumDiamondCertification);

						//Product Dimension

						$('#pproductsize').val(data1.PlatinumProductSize);
						$('#pproductheight').val(data1.PlatinumProductHeight);
						$('#pproductwidth').val(data1.PlatinumProductWidth);

						//Diamond Information

						$('#pdcut').val(data1.pdidcut);
						$('#pdcolor').val(data1.pdidcolor);
						$('#pdclarity').val(data1.pdidclarity);
						$('#pdcarat').val(data1.pdidcarat);
						$('#pdpcs').val(data1.pdidpiecess);

						//Other Information

						$('#ptheme').val(data1.pgoptheme);
						$('#pdesigntype').val(data1.pgopdtype);
						$('#pwearingstyle').val(data1.pgopwstyle);
						$('#poccasion').val(data1.pgopoccasion);

					}
					
					
					CKEDITOR.instances['text'].setData(data1.descr);


					$('#imghide').attr('src',data1.photo);
					$('#imghide').css('width','200');
					$('#imghide').css('height','200');
 
					$('#imghide1').attr('src',data1.Image1);
					$('#imghide1').css('width','200');
					$('#imghide1').css('height','200');

					$('#imghide2').attr('src',data1.Image2);
					$('#imghide2').css('width','200');
					$('#imghide2').css('height','200');
					
					
					$('#files').attr('file',data1.video);
					$('#files').css('width','200');
					$('#files').css('height','200');
					
					$('#orderVideo').attr('file',data1.video);
					$('#orderVideo').css('width','200');
					$('#orderVideo').css('height','200');
					$('#editedvideo').show();
					$("#v1").html('<source src="'+base_url+'/fileuploads/'+data1.video+'" type="video/mp4"></source>' );
					$('#Status').val(data1.Status);  
					$('#AddBdy').show();
				}
			}  
		});
	}
} 
function getmodelvals(style,model)
{
	//alert('hii'); 
	selectmodel(style,model); 
	//alert(name); 
	
}

function getscat(id,SubCategoryList)
{
	var id=id;
	//alert(id); 
	$('#scatname').val(id);
	
	//$('#scatname').trigger('change');
                                 console.log(document.getElementById('scatname').value) 
								var scatname = $.trim(id);
									if(scatname != '')
									{  
										$.ajax({
											url:"", 
											type:"POST",
											data:{'get':'scategorylist','scatname':scatname},
											beforesend:function() {}, 
											complete:function() {},
											success:function(data)
											{  
												data2 = $.parseJSON(data); 
												//console.log(data2);  
												var html = '<option value="">--Select Sub Category List--</option>';
												$.each(data2,function(i){
													var scatli = data2[i]; 
													//console.log(scatli);
													html+="<option value="+scatli.SubCategoryId+">"+scatli.SubCategoryName+"</option>";
												});
												$('#scatlist').html(html);
												$('#scatlist').val(SubCategoryList); 
$('#scatname').val(id);												
											}
										});
									} 
}

function stoneedit(id) 
{
	id = $.trim(id);
	//alert(id); 
	if(id!='')  
	{
		$.ajax({
			url:"", 
			method : "POST", 
			data:{'get':'stonessedit','iid':id},    
			success:function(data){
				data = $.parseJSON(data);  
				var html=''; 
				var fieldHTML = '';
				var stonecolor='';
				var stoneparent='';
				var stonename='';
				var stonecut='';
				var stoneclarity='';
				var stonepolish='';
				var stoneprice='';
				var stoneweight='';
				var totalamount = '';
				 
				if(data.err=='0')      
				{     
				    var i=0;
				    $.each(data.stonessget,function(i){         
				       var row1 = data.stonessget[i]; 
						i++;
					  fieldHTML+= '<div class="row" style="margin-bottom:15px;"><div class="col-md-2"><label>Parent Category:</label><select id="stoneparenta'+i+'" name="stoneparent[]" class="form-control" onchange="stoneparentchange('+i+');"><option value="">Select Stone Parent Category</option><?php foreach($stoneCategories as $scatp){?><option value="<?php echo $scatp['stcatname']; ?>"><?php echo $scatp['stcatname']; ?></option><?php }?></select></div><div class="col-md-2"><div class="form-group"><label>Stone Name:</label><select id="stonenamea'+i+'" name="stonename[]" class="form-control" onchange="getstoneprice('+i+');"></select></div></div><div class="col-md-2"><div class="form-group"><label>Stone Color:</label><select id="stoneclrsa'+i+'" name="stoneclrs[]" class="form-control" onchange="getstoneprice('+i+');"><option value="">Stone Color</option><?php foreach($stoneclrs as $stncls){ ?><option value="<?php echo $stncls['stonecolor']; ?>"><?php echo $stncls['stonecolor']; ?></option><?php } ?> </select></div></div><div class="col-md-2"><div class="form-group"><label>Stone Clarity:</label><select id="stoneclrtya'+i+'" name="stoneclrty[]" class="form-control" onchange="getstoneprice('+i+');"><option value="">Stone Clarity</option><?php foreach($stoneclrs as $stnclarity){ ?><option value="<?php echo $stnclarity['stoneclarity']; ?>"><?php echo $stnclarity['stoneclarity']; ?></option><?php }?></select></div></div><div class="col-md-2"><div class="form-group"><label>Stone Cut:</label><select id="stonecuta'+i+'" name="stonecut[]" class="form-control" onchange="getstoneprice('+i+');"><option value="">Stone Cut</option><?php foreach($stoneclrs as $stncut){ ?><option value="<?php echo $stncut['stonecut']; ?>"><?php echo $stncut['stonecut']; ?></option><?php } ?></select></div></div><div class="col-md-2"><div class="form-group"><label>Stone Polish:</label><select id="stoneplsha'+i+'" name="stoneplsh[]" class="form-control" onchange="getstoneprice('+i+');"><option value="">Stone Polish</option><?php foreach($stoneclrs as $stnplsh){?><option value="<?php echo $stnplsh['stonepolish']; ?>"><?php echo $stnplsh['stonepolish']; ?></option><?php } ?></select></div></div><div class="col-md-2"><input type="text" class="form-control required gaps qty" name="qty[]" id="qtya'+i+'" value="'+row1.Qty+'" placeholder="Enter Wt in Cts"/></div><div class="col-md-2"><input type="text" class="form-control required gaps price" name="price[]" id="pricea'+i+'" value="'+row1.Price+'" placeholder="Stone Price" readonly/><input type="hidden" class="form-control" name="stoneid[]" id="stoneida'+i+'" value="'+row1.stonesid+'" /></div><div class="col-md-2"><input type="text" class="form-control required gaps amount" name="amount[]" id="amounta'+i+'" value="'+row1.Amount+'" placeholder="Total Amount"/></div><a href="javascript:void(0);" class="remove_button btn btn-danger" title="Remove field">Remove</a></div>'; //New input field html
						
					  
					 // alert(i);					
				    $('.field_wrapper').html(fieldHTML);
					stoneparent = row1.stonecat;
					  stonename = row1.StnName;
					  
					 // selectstonename(i,stonename);
					 //alert(stonename);
					  $('#stonenamea'+i).val(stonename);
					  stonecolor 	= row1.StnColor;
					  stoneclarity 	= row1.StnClarity;
					  stonecut 		= row1.StnCut;
					  stonepolish 	= row1.StnPolish;
					 //alert(stonecolor);
					
					stoneparentfunction(i,stoneparent,stonename,stonecolor,stoneclarity,stonecut,stonepolish);
					$('#stonenamea'+i).val(stonename);
					$('#stoneclrsa'+i).val(stonecolor);
					
					$('#stoneclrtya'+i).val(stoneclarity);
					$('#stonecuta'+i).val(stonecut);
					$('#stoneplsha'+i).val(stonepolish);
					//$('#qty'+i).val(stoneweight);
					//$('#price'+i).val(stoneprice);
					//$('#amount'+i).val(totalamount);
					 
				    });   

					
				} 
			}
		});
	}   
}

function stoneparentfunction(i,parent,name,stonecolor,stoneclarity,stonecut,stonepolish)
{
	var parent=parent;
	var name=name;
	//alert(i+parent+name);
	$.ajax({
				url:"",
				type:"POST",
				data:{'get':'stname','stoneparent':parent},
				beforesend:function() {},
				complete:function() {},
				success:function(data)
				{
					//alert("ok");
					data = $.parseJSON(data);
				     
					var html = '<option value="">Select Stone Name</option>';
					$.each(data,function(i){
						
						var scat = data[i];
						//alert(scat.stsubcatname); 
						//alert(scat.stsubcatid);
						html+='<option value="'+scat.stsubcatname+'">'+scat.stsubcatname+'</option>';
					});
					
					$('#stonenamea'+i).html(html);
					//alert(name+'name');  
					//alert(stoneclarity); 
						$('#stoneclrtya'+i).val(stoneclarity);
                    $('#stonecuta'+i).val(stonecut); 
                    $('#stoneplsha'+i).val(stonepolish);				   
					selectstonename(name,i,parent,stonecolor,stoneclarity,stonecut,stonepolish);
				
				}  
				    
			});   
	 
					
	
}  

function selectstonename(n,i,p,stonecolor,stoneclarity,stonecut,stonepolish)
{
	//alert('is'+n+' '+p+' '+stoneclarity);  
$('#stonenamea'+i).val(n); 
$('#stoneparenta'+i).val(p);
//$('#stoneclrsa1').val('BLUE'); 
$('#stonenamea'+i).val(n);
//stoneColor(stonecolor,i);   
$('#stoneclrsa'+i).val(stonecolor);   
 

$('#stoneplsha'+i).val(stonepolish);
}
 
function stoneColor(stonec,i)
{
	
}
  
function del(id)
{
	id = $.trim(id);
	if(id!='')
	{
		if(confirm('Do you really want to delete this Installation ?'))
		{
			$.ajax({
				url:"",
				method : "POST",
				data:{'Del':'products_del','did':id},
				success:function(data){
					window.location.reload();
				}
			});
		}
	}
}

function vaidate_from()
{
	ignore: ":hidden"
	var invalid				= '';
	 /* var productname			= $.trim($('#productname').val());
	var productmodel 		= $.trim($('#productmodel').val());
	var pstatus 			= $.trim($('#pstatus').val());
	var catname 			= $.trim($('#catname').val());
	var caretsTypes 			= $.trim($('#caretsTypes').val());
	var gms 				= $.trim($('#gms').val());
	var gprice 				= $.trim($('#gprice').val());
	var mcharge 			= $.trim($('#mcharge').val());
	var tprice 				= $.trim($('#tprice').val());
	var qty 				= $.trim($('#qty').val());
	var pstatus 			= $.trim($('#pstatus').val());
	var fixednonfixed 		= $.trim($('#fixednonfixed').val());
	var ptype 				= $.trim($('#ptype').val());
	var dptype				= $.trim($('#dptype').val());
	
	if(ptype == '')
	{
		invalid = 1;
		$('#ptype').css('border-color','red');
	}
	else
		$('#ptype').css('border-color','');
	if(fixednonfixed == '')
	{
		invalid = 1;
		$('#fixednonfixed').css('border-color','red');
	}
	else
		$('#fixednonfixed').css('border-color','');
	if(productname == '')
	{
		invalid = 1;
		$('#productname').css('border-color','red');
	}
	else
		$('#productname').css('border-color','');
	if(productmodel == '')
	{
		invalid = 1;
		$('#productmodel').css('border-color','red');
	}
	else
		$('#productmodel').css('border-color','');
	if(catname == '')
	{
		invalid = 1;
		$('#catname').css('border-color','red');
	}
	else
		$('#catname').css('border-color','');
	if(gms == '')
	{
		invalid = 1;
		$('#gms').css('border-color','red');
	}
	else
		$('#gms').css('border-color','');
	if(gprice == '')
	{
		invalid = 1;
		$('#gprice').css('border-color','red');
	}
	else
		$('#gprice').css('border-color','');
	if(mcharge == '')
	{
		invalid = 1;
		$('#mcharge').css('border-color','red');
	}
	else
		$('#mcharge').css('border-color','');
	if(gst == '')
	{
		invalid = 1;
		$('#gst').css('border-color','red');
	}
	else
		$('#gst').css('border-color','');
	if(tprice == '')
	{
		invalid = 1;
		$('#tprice').css('border-color','red');
	}
	else
		$('#tprice').css('border-color','');
	if(qty == '')
	{
		invalid = 1;
		$('#qty').css('border-color','red');
	}
	else
		$('#qty').css('border-color','');

	if($.trim(CKEDITOR.instances.text.getData())=='')
	{
		invalid = 1;
		$('#ck_text_error').html('<p style="color:red">Please Enter Description</p>');
	}
	else
		$('#ck_text').css('border-color','');
	if(pstatus == '')
	{
		invalid = 1;
		$('#pstatus').css('border-color','red');
	}
	else
		$('#pstatus').css('border-color',''); */ 
	
	
	if(invalid=='')
	{
		$('#ProductsAddForm').removeAttr('onsubmit');
		$('#ProductsAddForm').attr('action','');
		$('#ProductsAddForm').trigger('submit');
	}
}

</script>


<script>


$(document).ready(function(){ 
	var maxField = 10; //Input fields increment limitation
	var x = 0;
	var addButton = $('.add_button'); //Add button selector 
	var wrapper = $('.field_wrapper'); //Input field wrapper 
	//alert(y); 
    var a = 0; 	
	 //Initial field counter is 1 
	$(addButton).click(function(){ //Once add button is clicked
		if(x < maxField){ //Check maximum number of input fields
			x++; //Increment field counter
			//alert(x); 
			//alert(x);  
			var fieldHTMLj = '<div class="row" style="margin-bottom:15px;"><div class="col-md-2"><label class="jash">Parent Category:</label><select id="stoneparent'+x+'" name="stoneparent[]" class="form-control" onchange="stoneparentchange('+x+');"><option value="">Select Stone Parent Category</option><?php foreach($stoneCategories as $scatp){?><option value="<?php echo $scatp['stcatname']; ?>"><?php echo $scatp['stcatname']; ?></option><?php }?></select></div><div class="col-md-2"><div class="form-group"><label>Stone Name:</label><select id="stonename'+x+'" name="stonename[]" class="form-control" onchange="getstoneprice();"></select></div></div><div class="col-md-2"><div class="form-group"><label>Stone Color:</label><select id="stoneclrs'+x+'" name="stoneclrs[]" class="form-control" onchange="getstoneprice('+x+');"><option value="">Stone Color</option><?php foreach($stoneclrs as $stncls){ ?><option value="<?php echo $stncls['stonecolor']; ?>"><?php echo $stncls['stonecolor']; ?></option><?php } ?> </select></div></div><div class="col-md-2"><div class="form-group"><label>Stone Clarity:</label><select id="stoneclrty'+x+'" name="stoneclrty[]" class="form-control" onchange="getstoneprice('+x+');"><option value="">Stone Clarity</option><?php foreach($stoneclrs as $stnclarity){ ?><option value="<?php echo $stnclarity['stoneclarity']; ?>"><?php echo $stnclarity['stoneclarity']; ?></option><?php }?></select></div></div><div class="col-md-2"><div class="form-group"><label>Stone Cut:</label><select id="stonecut'+x+'" name="stonecut[]" class="form-control" onchange="getstoneprice('+x+');"><option value="">Stone Cut</option><?php foreach($stoneclrs as $stncut){ ?><option value="<?php echo $stncut['stonecut']; ?>"><?php echo $stncut['stonecut']; ?></option><?php } ?></select></div></div><div class="col-md-2"><div class="form-group"><label>Stone Polish:</label><select id="stoneplsh'+x+'" name="stoneplsh[]" class="form-control" onchange="getstoneprice('+x+');"><option value="">Stone Polish</option><?php foreach($stoneclrs as $stnplsh){?><option value="<?php echo $stnplsh['stonepolish']; ?>"><?php echo $stnplsh['stonepolish']; ?></option><?php } ?></select></div></div><div class="col-md-2"><input type="text" class="form-control required gaps qty" name="qty[]" id="qty" placeholder="Enter Wt in Cts"/></div><div class="col-md-2"><input type="text" class="form-control required gaps price" name="price[]" id="price'+x+'" placeholder="Stone Price" readonly/><input type="hidden" class="form-control" name="stoneid[]" id="stoneid'+x+'" /></div><div class="col-md-2"><input type="text" class="form-control required gaps amount" name="amount[]" id="amount'+x+'" placeholder="Total Amount"/></div><a href="javascript:void(0);" class="remove_button btn btn-danger" title="Remove field">Remove</a></div>';
			$(wrapper).append(fieldHTMLj); // Add field html 
		}
	});
	$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
		e.preventDefault();
		$(this).parent('div').remove(); //Remove field html
		x--; //Decrement field counter
	});
	var amount = 0;
	var net_total = 0; 
	$('.sttw').each(function(){ 
   var row = $(this).parent().parent(); 
   var sttw = row.find('.sttw').val(); 
   var price = row.find('.price').val(); 
   
   var amount = sttw ; 
   row.find('.amount').val(amount);
    
   $('.amount').each(function(){
        net_total += ($(this).val()-0);
    });
	//alert(net_total);   
   // $('#stw').val(net_total);   
   subtract2();
   
    
});

$("body").delegate(".sttw11","keyup",function(event){
   event.preventDefault();
   var row = $(this).parent().parent();
   var sttw = row.find('.sttw').val();
    //var ships = row.find('.ship').val();
   // var qty = row.find('.ssamount').val(); 
    if (isNaN(qty)) {
        qty = 1;
    };
    if (qty < 1) {
        qty = 1;
    };
    var total = sttw;   
    row.find('.sttw').val(total);
    var net_total = 0;  
    var subtotal = 0;
    $('.sttw').each(function(){
        net_total += ($(this).val()-0);

    });
	//alert(net_total);    
    $('#stw').val(net_total/5);   
    subtract2();
});


$("body").delegate(".price","keyup",function(event){
   event.preventDefault();
   var row = $(this).parent().parent();
   var price = row.find('.price').val();
    //var ships = row.find('.ship').val();
    var qty = row.find('.qty').val();
    if (isNaN(qty)) {
        qty = 1;
    };
    if (qty < 1) { 
        qty = 1;
    };
	
	var stw = qty;
	row.find('.qty').val(stw);      
	var net_total1 = 0;  
	 $('.qty').each(function(){
        net_total1 += ($(this).val()-0);
 
    });
    $('#stw').val(net_total1/5);  
	
	
	
    var total = price * qty; 
    row.find('.amount').val(total);
    var net_total = 0;
    var subtotal = 0;
    $('.amount').each(function(){
        net_total += ($(this).val()-0);
 
    });
    $('#stoneprice').val(net_total); 
    
   
    
    subtract2();
});



});  

</script>
<script> 

function stoneparentchange(id)
{
	var stoneparent = $.trim($('#stoneparent'+id).val());
	var id=id;
	//alert(id);
	getstoneprice(id);
		//alert(stoneparent); 
		if(stoneparent != '')
		{
			$.ajax({
				url:"",
				type:"POST",
				data:{'get':'stname','stoneparent':stoneparent},
				beforesend:function() {},
				complete:function() {},
				success:function(data)
				{
					//alert("ok");
					data = $.parseJSON(data);
				
					var html = '<option value="">Select Stone Name</option>';
					$.each(data,function(i){
						var scat = data[i];
						//alert(scat.stsubcatid);
						html+="<option value='"+scat.stsubcatname+"'>"+scat.stsubcatname+"</option>";
					});

					$('#stonename'+id).html(html);
				}
			});
		}
	}
	
	function getstoneprice(id)
	{
		
		var stoneparent 	= $.trim($('#stoneparent'+id).val());
		var stonename   	= $.trim($('#stonename'+id).val());
		var stonecolor	 	= $.trim($('#stoneclrs'+id).val());
		var stoneclarity	= $.trim($('#stoneclrty'+id).val());
		var stonecut		= $.trim($('#stonecut'+id).val());
		var stonepolish	= $.trim($('#stoneplsh'+id).val());
		
		$.ajax({
				url:"",
				type:"POST",
				data:{'get':'stoneprice','stoneparent':stoneparent,'stonename':stonename,'stonecolor':stonecolor,'stoneclarity':stoneclarity,'stonecut':stonecut,'stonepolish':stonepolish},
				beforesend:function() {},
				complete:function() {},
				success:function(data)
				{
					//alert("ok");
					data = $.parseJSON(data);
					if(data)
					{
					$.each(data,function(i){
						var scat = data[i];
						var price = scat['StnPrice'];
						var Fsid = scat['Fsid'];
						$('#stoneid'+id).val(Fsid);
						$('#price'+id).val(price);
					});
					}
					else
					{
						$('#price'+id).val('');
					}
					
				}
			});
		
	}
	
	function selectmodel(style,model)
	{
		var style = $.trim($('#style').val());
		if(style){
			style = style; 
		} 
	
		if(style != '')
		{
			//alert(parentcategory);
			$.ajax({
				url:"",
				type:"POST",
				data:{'get':'stylemodel','style':style},
				beforesend:function() {},
				complete:function() {},
				success:function(data)
				{
					data = $.parseJSON(data);
					var html = '<option value="">Select Model</option>';
					$.each(data,function(i){
						var model = data[i];
						html+="<option value='"+model.Model+"'>"+model.Model+"</option>";
					});

					$('#model').html(html);
					$('#model').val(model);
				}
			});
		}
	}
	
	
	function getwastage()
	{
		
		var parent 	= $.trim($('#catname').val());
		var subcategory   	= $.trim($('#scatname').val());
		var style	 	= $.trim($('#style').val());
		var model	= $.trim($('#model').val());
		var purity		= $.trim($('#caretsTypes').val());
		var goldweight	= $.trim($('#gms').val());
		$.ajax({
				url:"",
				type:"POST",
				data:{'get':'wastage','parent':parent,'subcategory':subcategory,'style':style,'model':model,'purity':purity,'goldweight':goldweight},
				beforesend:function() {},
				complete:function() {},
				success:function(data)
				{
					//alert("ok");
					data = $.parseJSON(data);
					if(data)
					{
					$.each(data,function(i){
						var scat = data[i];
						var wastage = scat['Percentage'];
						
						$('#makcharge').val(wastage);
						findwastageweight();
					});
					}
					else
					{
						$('#makcharge').val('');
					}
					
				}
			});
		
	}
	
	
</script>


<script>
function findwastageweight()
	{ 
	
	    var makcharge = $.trim($('#makcharge').val());
    var goldweight = $.trim($('#gms').val());
		//  alert(mmin);  				  
		if(makcharge != '')   
			{
				var wastageweight= (parseFloat(goldweight))*(parseInt(makcharge)/100);
				//alert(wastageweight);
				$('#makchargeamount').val(wastageweight);
			}
    }
</script>
<script>
   /*video Upload*/
    $('#files').change(function(){
  var files = $('#files')[0].files;
   const size =  
               (files.size / 1024 / 1024).toFixed(2); 
  //alert(size);
            if (size > 5) { 
                $('#file3').val('');
                alert("Video must be between the size of 0-5 MB"); 
               // return false;
            } else{
                 var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg','mp4']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("files[]", files[count]);
   }
  }
  if(error == '')
  {
   $.ajax({
                     xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                        $(".progress-bar").width(percentComplete + '%');
                        $(".progress-bar").html(percentComplete+'%');
                    }
                }, false);
                return xhr;
            },
    url:"<?php echo base_url(); ?>EcoDashAdmin/upload", //base_url() return http://localhost/tutorial/codeigniter/
    method:"POST",
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
         $(".progress-bar").width('0%');
                $('#uploadStatus').html('<img src="images/loading.gif"/>');
           
     $('#uploaded_images').html("<label class='text-success'>Uploading...</label>");
    },
    success:function(data)
    {
      alert("Video Uploaded Successfully");
     $('#uploaded_images').html(data);
     $('#files').val('');
    }
   })
  }
  else
  {
   alert(error);
  }
            }
 
 });
</script>

<script>
$('#excel_import_form').submit(function(){
		var import_file = $('#import_file').val();
		if(import_file == ''){
			$('#import_file').css('border','1px solid red');
		}
		else{
			$('#import_file').css('border','');
			$.ajax({
				url : "",
				data : new FormData(this),
				type : "POST", 
				processData : false, 
				contentType: false,
				success : function(data){
					var data = $.parseJSON(data);
					if(data.msg == 'Successfully Imported')
					{
						alert('Successfully Imported');
						/*alertify.alert('<b style="color:green">Successfully Imported</b>',function(e){
							if(e)
							{
								window.location.reload();
							}
						}); */
					}
					else 
					{ 
						alert('Sorry'); 
						/* alertify.alert('<b style="color:red">'+data.msg+'</b>',function(e){
							if(e)
							{
								window.location.reload();
							}
						}); */ 
					}
				},
			})
		}
	})
</script>
