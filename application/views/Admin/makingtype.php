
<div class="content-wrapper">
	<section class="content-header">
		<h1>Manage Making Charges </h1> 
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Manage Making Charges </li>
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
			  
				<h3 class="box-title">Add New Making Charges </h3>
				<button class="btn btn-primary pull-right" id="AddBtn"><i class="fa fa-plus"></i> Add</button>

			</div>
			
			<div class="box-body" id="AddBdy" style="display:none">
				<form id="CategoryAddForm" onsubmit="return false;" method="post" enctype='multipart/form-data'>
					<div class="row">  
					     
						<div class="col-md-3">
							<div class="form-group">   
								<label>Main Group</label>
								<select id="parentcategory" name="parentcategory" class="form-control required" onchange="selectsub()">
									<option value="">Select Main Group</option>
									<?php
									foreach($parentcategory as $cat)
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
								<label>Sub Group</label>
								<select id="subcategory" name="subcategory" class="form-control required" >
									<option value="">Select Sub Group</option>
									
									
								</select> 
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">   
								<label>Purity</label>  
								<select id="purity" name="purity" class="form-control required" >
									<option value="">Select Purity</option>
									<?php foreach($purity as $goldpurity)
									{
										?>
										<option value="<?php echo $goldpurity['GoldCaret'];?>"><?php echo $goldpurity['GoldCaret'];?></option>
									<?php } ?>
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
						<div class="col-md-3">
							<div class="form-group">   
								<label>Size</label>  
								<input type="text" class="form-control required" name="size" id="size" value="" placeholder="Enter Size"/> 
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">   
								<label>Weight</label>  
								<select id="weight" name="weight" class="form-control required" >
									<option value="">Select weight</option>
								<?php foreach ($weight as $weights)
								{
									?>
									<option value="<?php echo $weights['min'].'-'.$weights['max'];?>"><?php echo $weights['min'].'-'.$weights['max'];?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">   
								<label>Percentage</label>  
								<input type="text" class="form-control required" name="percentage" id="percentage" value="" placeholder="Enter percentage"/> 
							</div>
						</div>
					</div> 
					
					<input type="hidden" id="makId" name="makId" />  
					<input type="hidden" name="Add_Edit_Piece_Type" value="true"/> 
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
				<h3 class="box-title">Making Charges List</h3>
				<button class="pull-right btn-primary btn" id="search">Search</button>
				<input type="text" class="form-control pull-right" id="skey" style="width:40%">
			</div>
			<div class="box-body">
				<table id="InstallationsTable" class="table table-bordered table-hover table-container">
					<thead>
						<tr>
							<th>Sno</th> 
							<th>Item Name </th> 
						     <th>Min Weight</th>
							 <th>Max Weight </th> 
							 <th> Wastage(%) </th>
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
<script>
$(function(){
	cpage = 1;
	get_piecetype(cpage);  
	
	$('#search').click(function(){   
		get_piecetype(1); 
	}); 
	
	$('#SubmitBtn').click(function(){
		vaidate_from();
	});
	$('#CancelBtn').click(function(){
		window.location.reload();
	});
	
	$('#AddBtn').click(function(){
		$('#AddBdy').show();
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
		$('#cimage').trigger('click');
	});
});

function selectsub(name,parent)  
	{
		var parentcategory = $.trim($('#parentcategory').val());
		if(parentcategory){
			parent = parentcategory; 
		} 
		//alert(parent);  
		if(parent != '') 
		{
			//alert(parentcategory);
			$.ajax({
				url:"", 
				type:"POST",
				data:{'get':'subcategory','parentcategory':parent},
				beforesend:function() {},
				complete:function() {},
				success:function(data)
				{
					data = $.parseJSON(data);
					var html = '<option value="">Select Sub Group</option>';
					$.each(data,function(i){
						var scat = data[i];
						//alert(scat.Title); 
						html+="<option value='"+scat.Title+"'>"+scat.Title+"</option>";
					});
 
					$('#subcategory').html(html);
					$('#subcategory').val(name);
				}
			});
		}
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


function get_piecetype(page)
{
	var skey = $.trim($('#skey').val());
	$.ajax({
		url:"",
		method : "POST",
		data:{'get':'get_piecetype','page':page,'skey':skey},
		success:function(data){
			data = $.parseJSON(data);
			var html='';
			if(data.get_piecetype!='')
			{ 
				var n = 1;
				$.each(data.get_piecetype, function(i){ 
					var row = data.get_piecetype[i];
					var status = '';
					var $n = n++; 
					
					html+=" <tr><td>"+$n+"</td><td>"+row.Itemname+"</td><td>"+row.minwt+"</td><td>"+row.maxwt+"</td><td>"+row.Percentage+"</td><td><button class='btn btn-primary btn-xs' onclick='edit("+row.makId+")'><i class='fa fa-pencil'></i></button>&nbsp;&nbsp;&nbsp;<button class='btn btn-danger btn-xs' onclick='del("+row.makId+")'><i class='fa fa-trash'></i></button></td></tr>";
				});
			} 
			else
				html+="<td></td><td></td><td>No Results Found..</td><td></td><td></td>";
			$('#InstallationsTable').find('tbody').html(html);
			$('#pagination').html(data.pagination);  
			$('#pagination').find('li').click(function(){ 
				get_piecetype($(this).attr('page'));
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
			data:{'get':'pieceedit','eid':id},
			success:function(data){
				data = $.parseJSON(data); 
				var html=''; 
				var weight='';				
				if(data.installation!='')
				{
					$('#makId').val(data.makId);   
					$('#parentcategory').val(data.parentcategoryid);
				//	selectsub(data.parencategoryid);					
					
					$('#purity').val(data.purity);
					$('#style').val(data.Style);
				//	selectmodel();
					
					//$('#model').val(data.Model);
					$('#size').val(data.Size);
					weight=data.minwt+'-'+data.maxwt;
					$('#weight').val(weight);
					$('#percentage').val(data.Percentage);
				//	alert(data.subcategoryid);
				    getsub(data.subcategoryid,data.parencategoryid); 
				    getmodelvals(data.Style,data.Model); 
					$('#subcategory').val(data.subcategoryid);
					$('#AddBdy').show();   
				} 
			}
		});
	}
} 


function getsub(name,parent)
{
	//alert('hii'); 
	selectsub(name,parent); 
	//alert(name); 
	
}
function getmodelvals(style,model)
{
	//alert('hii'); 
	selectmodel(style,model); 
	//alert(name); 
	
}

function del(id)
{
	id = $.trim(id);
	if(id!='')
	{
		if(confirm('Do you really want to delete this Piece ?')) 
		{
			$.ajax({
				url:"",  
				method : "POST",  
				data:{'Del':'Del_piece','iid':id},    
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
	var parentcategory		= $.trim($('#parentcategory').val());
	var subcategory		= $.trim($('#subcategory').val());
	var purity		= $.trim($('#purity').val());
	var style		= $.trim($('#style').val());
	var model		= $.trim($('#model').val());
	var size		= $.trim($('#size').val());
	var weight		= $.trim($('#weight').val());
	var percentage		= $.trim($('#percentage').val());
	
	if(parentcategory == '')
	{ 
		invalid = 1;
		$('#parentcategory').css('border-color','red');
	}
	else 
		$('#parentcategory').css('border-color','');  
    
	if(subcategory == '')
	{ 
		invalid = 1;
		$('#subcategory').css('border-color','red');
	}
	else 
		$('#subcategory').css('border-color','');  
    
	if(purity == '')
	{ 
		invalid = 1;
		$('#purity').css('border-color','red');
	}
	else 
		$('#purity').css('border-color','');  
    
	if(style == '')
	{ 
		invalid = 1;
		$('#style').css('border-color','red');
	}
	else 
		$('#style').css('border-color','');  
    
	if(model == '')
	{ 
		invalid = 1;
		$('#model').css('border-color','red');
	}
	else 
		$('#model').css('border-color','');  
    
	if(size == '')
	{ 
		invalid = 1;
		$('#size').css('border-color','red');
	}
	else 
		$('#size').css('border-color','');  
    
	if(weight == '')
	{ 
		invalid = 1;
		$('#weight').css('border-color','red');
	}
	else 
		$('#weight').css('border-color','');  
    
	if(percentage == '')
	{ 
		invalid = 1;
		$('#percentage').css('border-color','red');
	}
	else 
		$('#percentage').css('border-color','');  
    
	if(invalid=='')
	{
		$('#CategoryAddForm').removeAttr('onsubmit');
		$('#CategoryAddForm').attr('action','');
		$('#CategoryAddForm').trigger('submit');
	} 
}
</script>
