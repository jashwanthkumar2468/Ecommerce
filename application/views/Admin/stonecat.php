		<style>
#long {
  height: 500px;
  background-color: blue;
}
.btn-primary{
border: 1px solid white;
}

</style>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Manage Stone Type</h1> 
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Manage Stone Type</li>
		</ol>
	</section> 
	<section class="content">
		<?php if($this->session->flashdata('success')){ ?>
			<div class="alert alert-success text-center"><a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">x</a><?php echo $this->session->flashdata('success'); ?></div>
		<?php } else if($this->session->flashdata('error')) { ?>
			<div class="alert alert-danger text-center"><a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">x</a><?php echo $this->session->flashdata('error'); ?></div>
		<?php } ?>
		<div class="box-header with-border">
						
		<div class="row" style="background-color:#492c10;padding:15px">
		<div class="col-md-2">
					<a style="color:white;font-size: 15px;"class="bumper" id="clickcategory" href="javascript:void(0);"><button class="btn btn-primary"><i class="fa fa-hand-pointer-o" style="font-size:20px;"></i>&nbsp;&nbsp;Stone Category</button></a> 
					</div>
					<div class="col-md-2">
				    <a style="color:white;font-size: 15px;"class="jumper" id="clickstonename" href="javascript:void(0);"><button class="btn btn-primary"><i class="fa fa-hand-pointer-o" style="font-size:20px;"></i>&nbsp;&nbsp;Stone Name</button></a>
				</div>
				<div class="col-md-2">
				    <a style="color:white;font-size: 15px;"class="bumper" id="clickstonecolor" href="javascript:void(0);"><button class="btn btn-primary"><i class="fa fa-hand-pointer-o" style="font-size:20px;"></i>&nbsp;&nbsp;Stone Colors</button></a>
				</div>
				<div class="col-md-2">
				    <a style="color:white;font-size: 15px;"class="bumper" id="clickfinalstone" href="javascript:void(0);"><button class="btn btn-primary"><i class="fa fa-hand-pointer-o" style="font-size:20px;"></i>&nbsp;&nbsp;Add Stones</button></a>
				</div>

			</div>
			</div>
<div id="hidecat" class="hideclasscat" style="display:none">		
		<div class="box box-default">
			<div class="box-header with-border">
			<h3 class="box-title">Add Stone Category</h3>			
			<button class="btn btn-primary pull-right" id="AddBtn"><i class="fa fa-plus"></i> Add Category</button>	
			</div>
			
			<div class="box-body" id="AddBdy" style="display:none">
				<form id="CategoryAddForm" onsubmit="return false;" method="post" enctype='multipart/form-data'>
					<div class="row">
					
						<div class="col-md-3">
							<div class="form-group">
								<label>Status:</label>
								<select id="Status" name="Status" class="form-control">
									<option value="">Select Status</option>
									<option value="1">Open</option>
									<option value="0">Close</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Stone Category Name</label>
								<select class="form-control required" name="stcatname" id="stcatname" />
									<option value="">Select Category</option>
									<option value="DIAMOND">DIAMOND</option>
									<option value="GOLD">GOLD</option>
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label>Sort</label>
								<input type="text" class="form-control required" name="sort" id="sort" placeholder="Enter Sort Order"/>
							</div>
						</div>
							 
					</div> 

					<input type="hidden" id="stcatid" name="stcatid" />
					<input type="hidden" name="Add_Edit_Stone_cat" value="true"/>
					<div class="row">  
						<div class="col-md-3"> 
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
				<h3 class="box-title">Category List</h3>
				<button class="pull-right btn-primary btn" id="search">Search</button>
				<input type="text" class="form-control pull-right" id="skey" style="width:40%">
			</div>
			<div class="box-body">
				<table id="InstallationsTable" class="table table-bordered table-hover table-container">
					<thead>
						<tr>
							<th>Sno</th> 
							<th>Stone Category</th>
							<th>Sort</th>					    
							<th>Status</th>  
							<th>Action</th>  
						</tr> 
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
		<ul id="pagination" class="pagination"></ul>
	</div>
		<!----stone sub category section starts------->
<div id="hidestname"  class="hideclasstname" style="display:none">		
			<div class="box box-default" id="pliip">
			<div class="box-header with-border">
			 
				<h3 class="box-title">Add New Stone Name</h3>
				<button class="btn btn-primary pull-right" id="AddBtn1"><i class="fa fa-plus"></i> Add Name</button>

			</div>
			
			<div class="box-body" id="AddBdy1" style="display:none">
				<form id="SubCategoryAddForm" onsubmit="return false;" method="post" enctype='multipart/form-data'>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Stone Parent Category:</label>
								<select id="stcatname1" name="stcatname1" class="form-control">
									<option value="">Select Stone Parent Category</option>
									<?php
									foreach($stoneCategories as $scat)
									{
										?>
									<option value="<?php echo $scat['stcatid']; ?>"><?php echo $scat['stcatname']; ?></option>
										<?php
									}
									?>
									
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Stone Name</label>
								<input type="text" class="form-control required" name="stsubcatname" id="stsubcatname" placeholder="Enter Stone Name"/>
							</div>
						</div>
							 
					</div> 

					<input type="hidden" id="stsubcatid" name="stsubcatid" />
					<input type="hidden" name="Add_Edit_Stone_subcat" value="true"/>
					<div class="row">  
						<div class="col-md-3"> 
							<div class="form-group"><br>
								<button class="btn btn-primary " id="subcatSubmitBtn"><i class="fa fa-check"></i> Submit</button>
								<button class="btn btn-danger " id="subcatCancelBtn"><i class="fa fa-times"></i> Cancel</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Stones</h3>
				<button class="pull-right btn-primary btn" id="search">Search</button>
				<input type="text" class="form-control pull-right" id="skey" style="width:40%">
			</div>
			<div class="box-body">
				<table id="SubInstallationsTable" class="table table-bordered table-hover table-container">
					<thead>
						<tr>
									<th>Sno</th> 
									<th>Stone Category</th>
									<th>Stone Name</th>
									<th>Action</th>  
						</tr> 
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
		<ul id="paginationsub" class="pagination"></ul>
	</div>	
		
		
		<!---------stone  sub cateogry ends--------->
		
		
		<!----------add color,clarity,stone cut starts---------->
<div id="hidecolor"  class="hideclassstcolor" style="display:none">		
		<div class="box box-default" id="pliip1">
			<div class="box-header with-border">
			 
				<h3 class="box-title">Add Stone Colors</h3>
				<button class="btn btn-primary pull-right" id="AddBtncolors"><i class="fa fa-plus"></i> Add Colors</button>

			</div>
			
			<div class="box-body" id="AddBdycolors" style="display:none">
				<form id="colorsAddForm" onsubmit="return false;" method="post" enctype='multipart/form-data'>
					<div class="row">
					
					<div class="col-md-3">
							<div class="form-group">
								<label>Stone Color</label>
								<input type="text" class="form-control required" name="stcolor" id="stcolor" placeholder="Enter Stone Color"/>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Stone Clarity</label>
								<input type="text" class="form-control required" name="stclarity" id="stclarity" placeholder="Enter Stone Clarity"/>
							</div>
						</div><div class="col-md-3">
							<div class="form-group">
								<label>Stone Cut</label>
								<input type="text" class="form-control required" name="stcut" id="stcut" placeholder="Enter Stone Cut"/>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Stone Polish</label>
								<input type="text" class="form-control required" name="stpolish" id="stpolish" placeholder="Enter Stone Polish"/>
							</div>
						</div>
							 
					</div> 

					<input type="hidden" id="Scid" name="Scid" />
					<input type="hidden" name="Add_Edit_Stone_color" value="true"/>
					<div class="row">  
						<div class="col-md-3"> 
							<div class="form-group"><br>
								<button class="btn btn-primary " id="colorSubmitBtn"><i class="fa fa-check"></i> Submit</button>
								<button class="btn btn-danger " id="colorCancelBtn"><i class="fa fa-times"></i> Cancel</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Stone Colors</h3>
				<button class="pull-right btn-primary btn" id="search">Search</button>
				<input type="text" class="form-control pull-right" id="skey" style="width:40%">
			</div>
			<div class="box-body">
				<table id="colInstallationsTable" class="table table-bordered table-hover table-container">
					<thead>
						<tr>
									<th>Sno</th> 
									<th>Stone Color</th>
									<th>Stone Clarity</th>
									<th>Stone Cut</th>
									<th>Stone Polish</th>
									<th>Action</th>  
						</tr> 
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
		
	<ul id="paginationcolors" class="pagination"></ul>
	</div>	
		<!----------add color,clarity,stone cut end---------->
<!---Final stones Adding starts--------------------->	
<div id="hidecat" class="hideclassfinal" style="display:none">		
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Add Stones</h3>			
				<button class="btn btn-primary pull-right" id="AddBtnfinal"><i class="fa fa-plus"></i> Add Stone</button>	
			</div>
			
			<div class="box-body" id="AddBdyfinal" style="display:none">
				<form id="stonefinalAddForm" onsubmit="return false;" method="post" enctype='multipart/form-data'>
					<div class="row">	
						<div class="col-md-3">
							<div class="form-group">
								<label>Parent Category:</label>
								<select id="stoneparent" name="stoneparent" class="form-control">
									<option value="">Select Stone Parent Category</option>
									<?php
									foreach($stoneCategories as $scatp)
									{
										?>
									<option value="<?php echo $scatp['stcatname']; ?>"><?php echo $scatp['stcatname']; ?></option>
										<?php
									}
									?>
									
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Stone Name:</label>
									<select id="stonename" name="stonename" class="form-control">
									</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label>Stone Color:</label>
							<select id="stoneclrs" name="stoneclrs" class="form-control">
									<option value="">Stone Color</option>
									<?php
									foreach($stoneclrs as $stncls)
									{
										?>
									<option value="<?php echo $stncls['stonecolor']; ?>"><?php echo $stncls['stonecolor']; ?></option>
										<?php
									}
									?>
									
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Stone Clarity:</label>
								<select id="stoneclrty" name="stoneclrty" class="form-control">
									<option value="">Stone Clarity</option>
									<?php
									foreach($stoneclrs as $stnclarity)
									{
										?>
									<option value="<?php echo $stnclarity['stoneclarity']; ?>"><?php echo $stnclarity['stoneclarity']; ?></option>
										<?php
									}
									?>
									
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Stone Cut:</label>
							<select id="stonecut" name="stonecut" class="form-control">
									<option value="">Stone Cut</option>
									<?php
									foreach($stoneclrs as $stncut)
									{
										?>
									<option value="<?php echo $stncut['stonecut']; ?>"><?php echo $stncut['stonecut']; ?></option>
										<?php
									}
									?>
									
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Stone Polish:</label>
								<select id="stoneplsh" name="stoneplsh" class="form-control">
									<option value="">Stone Polish</option>
									<?php
									foreach($stoneclrs as $stnplsh)
									{
										?>
									<option value="<?php echo $stnplsh['stonepolish']; ?>"><?php echo $stnplsh['stonepolish']; ?></option>
										<?php
									}
									?>
									
								</select>
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<label>Stone Price:</label>
								<input type="text" name="stoneprice" id="stoneprice" class="form-control" placeholder="Enter Stone Price">
							</div>
						</div>
							 
					</div> 

					<input type="hidden" id="Fsid" name="Fsid" />
					<input type="hidden" name="Add_Edit_Stone_final" value="true"/>
					<div class="row">  
						<div class="col-md-3"> 
							<div class="form-group"><br>
								<button class="btn btn-primary " id="SubmitBtnstfinal"><i class="fa fa-check"></i> Submit</button>
								<button class="btn btn-danger " id="stfinalCancelBtn"><i class="fa fa-times"></i> Cancel</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Stones List</h3>
				<button class="pull-right btn-primary btn" id="search">Search</button>
				<input type="text" class="form-control pull-right" id="skey" style="width:40%">
			</div>
			<div class="box-body">
				<table id="finalInstallationsTable" class="table table-bordered table-hover table-container">
					<thead>
						<tr>
									<th>Sno</th> 
									<th>Stone Category</th>
									<th>Stone Name</th>					    
									<th>Stone Color</th>  
									<th>Stone Clarity</th>  
									<th>Stone Cut</th>  
									<th>Stone Polish</th>  
									<th>Stone Price</th>  
									<th>Action</th>  
						</tr> 
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
		<ul id="finalpagination" class="pagination"></ul>
	</div>
	
<!---Final stones Adding ends--------------------->		
		
		
	</section>
</div>
<script>
$(function(){
	cpage = 1;
	get_stonecattype(cpage);
	get_stonesubtype(cpage);
	get_stonecolor(cpage);
	get_finalstone(cpage);
	
	$('#search').click(function(){   
		get_stonecattype(1); 
	}); 
	
	$('#search').click(function(){   
		get_stonesubtype(1); 
	}); 
	$('#search').click(function(){   
		get_stonecolor(1); 
	}); 
	
	
	$('#SubmitBtn').click(function(){
		vaidate_from();
	});
	$('#subcatSubmitBtn').click(function(){
		subcat_vaidate_from();
	});
	$('#colorSubmitBtn').click(function(){
		colors_vaidate_from();
	});
	$('#SubmitBtnstfinal').click(function(){
		stonefinal_vaidate_from();
	});
	
	$('#CancelBtn').click(function(){
		window.location.reload();
	});
	$('#subcatCancelBtn').click(function(){
		window.location.reload();
	});
	$('#colorCancelBtn').click(function(){
		window.location.reload();
	});
	$('#stfinalCancelBtn').click(function(){
		window.location.reload();
	});
	
	
	$('#clickcategory').click(function(){
		$('.hideclasscat').show();
		$('.hideclassstcolor').hide();
		$('.hideclasstname').hide();
		$('.hideclassfinal').hide();
		
		//$('#AddBtn').hide();
		//$('#hidestname').hide();
		//$('#hidecolor').hide();
		
	});
	$('#clickstonename').click(function(){
		$('.hideclasstname').show();
		$('.hideclasscat').hide();
		$('.hideclassstcolor').hide();
		$('.hideclassfinal').hide();
		//$('#AddBtn').hide();
		//$('#hidestname').hide();
		//$('#hidecolor').hide();
		
	});
	$('#clickstonecolor').click(function(){
		$('.hideclassstcolor').show();
		$('.hideclasscat').hide();
		$('.hideclasstname').hide();
		$('.hideclassfinal').hide();
		//$('#AddBtn').hide();
		//$('#hidestname').hide();
		//$('#hidecolor').hide();
		
	});
	$('#clickfinalstone').click(function(){
		$('.hideclassfinal').show();
		$('.hideclasscat').hide();
		$('.hideclassstcolor').hide();
		$('.hideclasstname').hide();
		//$('#AddBtn').hide();
		//$('#hidestname').hide();
		//$('#hidecolor').hide();
		
	});
	
	$('#AddBtn').click(function(){
		$('#AddBdy').show();
		$('#AddBtn').hide();
		$('#hidestname').hide();
		$('#hidecolor').hide();
		
	});
	$('#AddBtnfinal').click(function(){
		$('#AddBdyfinal').show();
		$('#AddBtnfinal').hide();
		$('#hidestname').hide();
		$('#hidecolor').hide();
		
	});
	$('#AddBtn1').click(function(){
		$('#AddBdy1').show();
		$('#AddBtn1').hide();
		$('#hidecolor').hide();
		$('#hidecat').hide();
	});
	
	$('#AddBtncolors').click(function(){
		$('#AddBdycolors').show();
		$('#AddBtncolors').hide();
		$('#hidestname').hide();
		$('#hidecat').hide();
		
	});
	
	$('#Status').change(function(){
		if($(this).val() == '0')
			$('#descdiv').show();
		else
			$('#descdiv').hide();
	});

	$('#upload_link').on('click',function(e){
		e.preventDefault();
		$('#cimage').trigger('click');
	});
});

	$('#stoneparent').change(function(){
		var stoneparent = $.trim($('#stoneparent').val());
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

					$('#stonename').html(html);
				}
			});
		}
	});










function get_stonecattype(page)
{
	var skey = $.trim($('#skey').val());
	$.ajax({
		url:"",
		method : "POST",
		data:{'get':'get_stonetypecat','page':page,'skey':skey},
		success:function(data){
			data = $.parseJSON(data);
			var html='';
			if(data.get_stonetypecat!='')
			{
				var n = 1;
				$.each(data.get_stonetypecat, function(i){
					var row = data.get_stonetypecat[i];
					var status = '';
					var $n = n++;
					if(row.Status == '1')
						status = "<span class='label label-success'>Active</span>";
					else
						status = "<span class='label label-danger'>In-Active</span>";
					 

					html+=" <tr><td>"+$n+"</td><td>"+row.stcatname+"</td><td>"+row.Sort+"</td><td>"+status+"</td><td><button class='btn btn-primary btn-xs' onclick='edit("+row.stcatid+")'><i class='fa fa-pencil'></i></button>&nbsp;&nbsp;&nbsp;<button class='btn btn-danger btn-xs' onclick='delcat("+row.stcatid+")'><i class='fa fa-trash'></i></button></td></tr>";
				});
			}
			else
				html+="<td></td><td></td><td>No Results Found..</td><td></td><td></td>";
			$('#InstallationsTable').find('tbody').html(html);
			$('#pagination').html(data.pagination);
			$('#pagination').find('li').click(function(){
				 $('#hidestname').hide();
		         $('#hidecolor').hide();
				get_stonecattype($(this).attr('page'));
				
			});
		}
	});
}

function get_stonesubtype(page)
{
	var skey = $.trim($('#skey').val());
	$.ajax({
		url:"",
		method : "POST",
		data:{'get':'get_stonetypesubcat','page':page,'skey':skey},
		success:function(data){
			data = $.parseJSON(data);
			var html='';
			if(data.get_stonetypesubcat!='')
			{
				
				var n = 1;
				$.each(data.get_stonetypesubcat, function(i){
					var row = data.get_stonetypesubcat[i];
				//alert(row.stcatname);
					var $n = n++;
					
					 

					html+=" <tr><td>"+$n+"</td><td>"+row.stcatname+"</td><td>"+row.stsubcatname+"</td><td><button class='btn btn-primary btn-xs' onclick='editsub("+row.stsubcatid+")'><i class='fa fa-pencil'></i></button>&nbsp;&nbsp;&nbsp;<button class='btn btn-danger btn-xs' onclick='delsubcat("+row.stsubcatid+")'><i class='fa fa-trash'></i></button></td></tr>";
				});
			}
			else
				html+="<td></td><td></td><td>No Results Found..</td><td></td><td></td>";
			$('#SubInstallationsTable').find('tbody').html(html);
			$('#paginationsub').html(data.pagination);
			$('#paginationsub').find('li').click(function(){
				$('#hidecat').hide();
		        $('#hidecolor').hide();
				get_stonesubtype($(this).attr('page'));
			});
		}
	});
}
function get_stonecolor(page)
{
	var skey = $.trim($('#skey').val());
	$.ajax({
		url:"",
		method : "POST",
		data:{'get':'get_stonecolor','page':page,'skey':skey},
		success:function(data){
			data = $.parseJSON(data);
			var html='';
			if(data.get_stonecolor!='')
			{
				var n = 1;
				$.each(data.get_stonecolor, function(i){
					var row = data.get_stonecolor[i];
					var status = '';
					var $n = n++;
					
					 

					html+=" <tr><td>"+$n+"</td><td>"+row.stonecolor+"</td><td>"+row.stoneclarity+"</td><td>"+row.stonecut+"</td><td>"+row.stonepolish+"</td><td><button class='btn btn-primary btn-xs' onclick='editstcolor("+row.Scid+")'><i class='fa fa-pencil'></i></button>&nbsp;&nbsp;&nbsp;<button class='btn btn-danger btn-xs' onclick='delstonecolors("+row.Scid+")'><i class='fa fa-trash'></i></button></td></tr>";
				});
			}
			else
				html+="<td></td><td></td><td>No Results Found..</td><td></td><td></td>";
			$('#colInstallationsTable').find('tbody').html(html);
			$('#paginationcolors').html(data.pagination);
			$('#paginationcolors').find('li').click(function(){
				$('#hidestname').hide();
		        $('#hidecat').hide();
				get_stonecolor($(this).attr('page'));
			});
		}
	});
}
function get_finalstone(page)
{
	var skey = $.trim($('#skey').val());
	$.ajax({
		url:"",
		method : "POST",
		data:{'get':'get_finalstones','page':page,'skey':skey},
		success:function(data){
			data = $.parseJSON(data);
			var html='';
			if(data.get_finalstones!='')
			{
				var n = 1;
				$.each(data.get_finalstones, function(i){
					var row = data.get_finalstones[i];
					var status = '';
					var $n = n++;
					
					 

					html+=" <tr><td>"+$n+"</td><td>"+row.ParentCat+"</td><td>"+row.StnName+"</td><td>"+row.StnColor+"</td><td>"+row.StnClarity+"</td><td>"+row.StnCut+"</td><td>"+row.StnPolish+"</td><td>"+row.StnPrice+"</td><td><button class='btn btn-primary btn-xs' onclick='editfinalstone("+row.Fsid+")'><i class='fa fa-pencil'></i></button>&nbsp;&nbsp;&nbsp;<button class='btn btn-danger btn-xs' onclick='delfinalstone("+row.Fsid+")'><i class='fa fa-trash'></i></button></td></tr>";
				});
			}
			else
				html+="<td></td><td></td><td>No Results Found..</td><td></td><td></td>";
			$('#finalInstallationsTable').find('tbody').html(html);
			$('#finalpagination').html(data.pagination);
			$('#finalpagination').find('li').click(function(){
				$('#hidestname').hide();
		        $('#hidecat').hide();
				get_finalstone($(this).attr('page'));
			});
		}
	});
}
function editfinalstone(id)
{
	   $('#hidestname').hide();
		$('#hidecat').hide();
	id = $.trim(id);
	//alert(id);
	
	
	
	if(id!='')
	{
		$.ajax({
			url:"",
			method : "POST",
			data:{'get':'finalstoneedit','eid':id},
			success:function(data){
				data = $.parseJSON(data); 
				var html='';  
				if(data.installation!='')
				{
					
					$('#Fsid').val(data.Fsid);
					//alert(data.Fsid);
				    $('#stoneparent').val(data.ParentCat);
					//alert(data.StnName);
					$('#stonename').val(data.StnName);
					var stoneparent = $.trim($('#stoneparent').val());
					if(stoneparent!='')
					{
						
						$.ajax({
							url:"",
							type:"POST",
							data:{'get':'stname','stoneparent':stoneparent},
							beforesend:function() {},
							complete:function() {},
							success:function(data)
							{
								data = $.parseJSON(data);
								//var html = '<option value="">Select Stone Name Edit</option>';
								$.each(data,function(i){ 
									var scat = data[i];
									html+="<option value='"+scat.stsubcatid+"'>"+scat.stsubcatname+"</option>";
								});

								$('#stonename').html(html);
							
							}
						});
					}				
					$('#stoneclrs').val(data.StnColor);					
					$('#stoneplsh').val(data.StnPolish);					
					$('#stoneprice').val(data.StnPrice);					
					$('#stoneclrty').val(data.StnClarity);					
					$('#stonecut').val(data.StnCut);					
					$('#AddBdyfinal').show();
				}
			}
		});
	}
} 

function editstcolor(id)
{
	   $('#hidestname').hide();
		$('#hidecat').hide();
	id = $.trim(id);
	//alert(id);
	if(id!='')
	{
		$.ajax({
			url:"",
			method : "POST",
			data:{'get':'stoncoloreedit','eid':id},
			success:function(data){
				data = $.parseJSON(data); 
				var html='';  
				if(data.installation!='')
				{
					$('#Scid').val(data.Scid);
					//alert(data.Scid);
					$('#stcolor').val(data.stonecolor);
					$('#stclarity').val(data.stoneclarity);
					$('#stcut').val(data.stonecut);					
					$('#stpolish').val(data.stonepolish);					
					$('#AddBdycolors').show();
				}
			}
		});
	}
} 


function edit(id)
{
	    $('#hidestname').hide();
		$('#hidecolor').hide();
	
	id = $.trim(id);
	//alert(id);
	if(id!='')
	{
		$.ajax({
			url:"",
			method : "POST",
			data:{'get':'stoncateedit','eid':id},
			success:function(data){
				data = $.parseJSON(data); 
				var html='';  
				if(data.installation!='')
				{
					$('#stcatid').val(data.stcatid);
					//alert(data.stcatid);
					$('#stcatname').val(data.stcatname);
					$('#Status').val(data.Status);
					$('#sort').val(data.Sort);					
					$('#AddBdy').show();
				}
			}
		});
	}
} 


function editsub(id)
{
	    $('#hidecat').hide();
		$('#hidecolor').hide();
	id = $.trim(id);
	if(id!='')
	{
		$.ajax({
			url:"",
			method : "POST",
			data:{'get':'stonsubeedit','eid':id},
			success:function(data){
				data = $.parseJSON(data); 
				var html='';  
				if(data.installation!='')
				{
					$('#stsubcatid').val(data.stsubcatid);
					$('#stcatname1').val(data.parentcat);
					$('#stsubcatname').val(data.stsubcatname);					
					$('#AddBdy1').show();
				}
			}
		});
	}
} 

function delfinalstone(id)
{
	id = $.trim(id);
	if(id!='')
	{
		if(confirm('Do you really want to delete this Stone ?'))
		{
			$.ajax({
				url:"",
				method : "POST",
				data:{'Del':'Del_finalstone','iid':id},
				success:function(data){  
					window.location.reload();
				}
			});
		}
	}
}
function delcat(id)
{
	id = $.trim(id);
	if(id!='')
	{
		if(confirm('Do you really want to delete this Stone Category ?'))
		{
			$.ajax({
				url:"",
				method : "POST",
				data:{'Del':'Del_stonecat','iid':id},
				success:function(data){  
					window.location.reload();
				}
			});
		}
	}
}
function delsubcat(id)
{
	id = $.trim(id);
	if(id!='')
	{
		if(confirm('Do you really want to delete this Stone Name ?'))
		{
			$.ajax({
				url:"",
				method : "POST",
				data:{'Del':'Del_stonesubcat','iid':id},
				success:function(data){  
					window.location.reload();
				}
			});
		}
	}
}
function delstonecolors(id)
{
	id = $.trim(id);
	if(id!='')
	{
		if(confirm('Do you really want to delete this Stone ?'))
		{
			$.ajax({
				url:"",
				method : "POST",
				data:{'Del':'Del_stonecolors','iid':id},
				success:function(data){  
					window.location.reload();
				}
			});
		}
	}
}
function vaidate_from()
{
	var invalid				= '';
	var stcatname 			= $.trim($('#stcatname').val());
	var Status 			= $.trim($('#Status').val());
	
	if(stcatname == '')
	{
		invalid = 1;
		$('#stcatname').css('border-color','red');
	}
	else
		$('#stcatname').css('border-color','');

	if(Status == '')
	{
		invalid = 1;
		$('#Status').css('border-color','red');
	}
	else
		$('#Status').css('border-color','');
	
	
	if(invalid=='')
	{
		$('#CategoryAddForm').removeAttr('onsubmit');
		$('#CategoryAddForm').attr('action','');
		$('#CategoryAddForm').trigger('submit');
	} 
}
</script>
<script>

function subcat_vaidate_from()
{
	var invalid				= '';
	var stcatname1 			= $.trim($('#stcatname1').val());
	var stsubcatname 			= $.trim($('#stsubcatname').val());
	
	if(stcatname1 == '')
	{
		invalid = 1;
		$('#stcatname1').css('border-color','red');
	}
	else
		$('#stcatname1').css('border-color','');

	if(stsubcatname == '')
	{
		invalid = 1;
		$('#stsubcatname').css('border-color','red');
	}
	else
		$('#stsubcatname').css('border-color','');
	
	
	if(invalid=='')
	{
		$('#SubCategoryAddForm').removeAttr('onsubmit');
		$('#SubCategoryAddForm').attr('action','');
		$('#SubCategoryAddForm').trigger('submit');
	} 
}

function colors_vaidate_from()
{
	var invalid				= '';
	var stcolor 			= $.trim($('#stcolor').val());
	var stclarity 			= $.trim($('#stclarity').val());
	var stcut 			= $.trim($('#stcut').val());
	var stpolish 			= $.trim($('#stpolish').val());
		
	if(stcolor == '')
	{
		invalid = 1;
		$('#stcolor').css('border-color','red');
	}
	else
		$('#stcolor').css('border-color','');

	if(stclarity == '')
	{
		invalid = 1;
		$('#stclarity').css('border-color','red');
	}
	else
		$('#stclarity').css('border-color','');
	if(stcut == '')
	{
		invalid = 1;
		$('#stcut').css('border-color','red');
	}
	else
		$('#stcut').css('border-color','');
	if(stpolish == '')
	{
		invalid = 1;
		$('#stpolish').css('border-color','red');
	}
	else
		$('#stpolish').css('border-color','');
	
	if(invalid=='')
	{
		$('#colorsAddForm').removeAttr('onsubmit');
		$('#colorsAddForm').attr('action','');
		$('#colorsAddForm').trigger('submit');
	} 
}


function stonefinal_vaidate_from()
{
	var invalid				= '';
	var stoneparent 			= $.trim($('#stoneparent').val());
	var stonename 			= $.trim($('#stonename').val());
	var stoneclrs 			= $.trim($('#stoneclrs').val());
	var stoneplsh			= $.trim($('#stoneplsh').val());
	var stonecut		= $.trim($('#stonecut').val());
	var stoneclrty		= $.trim($('#stoneclrty').val());
	var stoneprice		= $.trim($('#stoneprice').val());
		
	if(stoneparent == '')
	{
		invalid = 1;
		$('#stoneparent').css('border-color','red');
	}
	else
		$('#stoneparent').css('border-color','');

	/*if(stonename == '')
	{
		invalid = 1;
		$('#stonename').css('border-color','red');
	}
	else
		$('#stonename').css('border-color','');*/
	if(stoneclrs == '')
	{
		invalid = 1;
		$('#stoneclrs').css('border-color','red');
	}
	else
		$('#stoneclrs').css('border-color','');
	if(stonecut == '')
	{
		invalid = 1;
		$('#stonecut').css('border-color','red');
	}
	else
		$('#stonecut').css('border-color','');
	if(stoneplsh == '')
	{
		invalid = 1;
		$('#stoneplsh').css('border-color','red');
	}
	else
		$('#stoneplsh').css('border-color','');
	
	if(stoneclrty == '')
	{
		invalid = 1;
		$('#stoneclrty').css('border-color','red');
	}
	else
		$('#stoneclrty').css('border-color','');
	
	if(stoneprice == '')
	{
		invalid = 1;
		$('#stoneprice').css('border-color','red');
	}
	else
		$('#stoneprice').css('border-color','');
	
	if(invalid=='')
	{
		$('#stonefinalAddForm').removeAttr('onsubmit');
		$('#stonefinalAddForm').attr('action','');
		$('#stonefinalAddForm').trigger('submit');
	} 
}
</script>

<script>
/*	
$(document).ready(function() {
  $(".jumper").on("click", function( e ) {

    e.preventDefault();

    $("body, html").animate({ 
      scrollTop: $( $(this).attr('href') ).offset().top 
    }, 500);

  });
});

$(document).ready(function() {
  $(".bumper").on("click", function( e ) {

    e.preventDefault();

    $("body, html").animate({ 
      scrollTop: $( $(this).attr('href') ).offset().top 
    }, 500);

  });
});*/
</script>
</script>