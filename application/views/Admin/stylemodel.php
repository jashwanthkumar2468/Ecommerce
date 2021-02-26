
<div class="content-wrapper">
	<section class="content-header">
		<h1>Manage Style & Model</h1> 
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Manage Style & Model</li>
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
			 
				<h3 class="box-title">Add Style & Model</h3>
		
				<button class="btn btn-primary pull-right" id="AddBtn" style="margin-left:10px;"><i class="fa fa-plus"></i> Add New</button>
				
				<button class="btn btn-primary pull-right" id="AddBtn1" style="margin-left:10px;"><i class="fa fa-plus"></i> Edit Old</button>
					
				<a href="<?php echo base_url('EcoDashAdmin');?>/MakingCharges"><button class="btn btn-primary pull-right" ><i class="fa fa-arrow-right"></i> Making Charges</button></a>	

			</div>
			<!-- second form --->
			
			
			
			<div class="box-body" id="AddBdy1" style="display:none">
			<!--check styles data -->
			  <?php if(!empty($style))
			    { ?>
				 <form id="NewmodelAddForm" onsubmit="return false;" method="post"   enctype='multipart/form-data'>
					<div class="row">
					
						<div class="col-md-3">
							<div class="form-group"> 
								<label>Style</label>
								<select class="form-control required" name="style" id="style">
								<option value="">Select Style</option>
								  <?php foreach($style as $stylename)
								  {
									?>
									<option value="<?php echo $stylename['Style'];?>">  <?php echo $stylename['Style'];?></option>
								  <?php
								  } ?>
								  </select>
							</div>
						</div>
						
                         <div class="col-md-3">
							<div class="form-group"> 
								<label>Model</label>
								<input type="text" class="form-control required" name="model" id="model" placeholder="Enter model"/> 
							</div>
						</div>							 
					</div> 
					
					<input type="hidden" id="StyleId" name="StyleId" />
					<input type="hidden" name="Add_Edit_style_model" value="true"/>
					<div class="row">  
						<div class="col-md-3"> 
							<div class="form-group"><br>
								<button class="btn btn-primary " id="SubmitBtn1"><i class="fa fa-check"></i> Submit</button>
								<button class="btn btn-danger " id="CancelBtn1"><i class="fa fa-times"></i> Cancel</button>
							</div>
						</div>
					</div>
				</form>
				<?php }
				else
				{
					echo '<h4 style="color:red;">Please add atleast one style</h4>';
					}
				?>
			</div>
			<!-- second form ---->
			
			
			<div class="box-body" id="AddBdy" style="display:none">
				<form id="CategoryAddForm" onsubmit="return false;" method="post" enctype='multipart/form-data'>
					<div class="row">
					
						<div class="col-md-3">
							<div class="form-group"> 
								<label>Style Name</label>
								<input type="text" class="form-control required" name="stylename" id="stylename" placeholder="Enter Style Name"/> 
							</div>
						</div>
						
                         <div class="col-md-3">
							<div class="form-group"> 
								<label>Model Name</label>
								<input type="text" class="form-control required" name="modelname" id="modelname" placeholder="Enter model name"/> 
							</div>
						</div>
							 
					</div> 
						
					<input type="hidden" id="StyleModelId" name="StyleModelId" />
					<input type="hidden" name="Add_Edit_Style_Model" value="true"/>
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
				<h3 class="box-title">Style & Model List</h3>
				<button class="pull-right btn-primary btn" id="search">Search</button>
				<input type="text" class="form-control pull-right" id="skey" style="width:40%">
			</div>
			<div class="box-body">
				<table id="InstallationsTable" class="table table-bordered table-hover table-container">
					<thead>
						<tr>
									<th>Sno</th> 
									<th>Style</th>
									<th>Model</th>					    
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
	//get_stonetype(cpage);
	get_stylemodel(cpage);
	
	$('#search').click(function(){   
		//get_stonetype(1); 
		get_stylemodel(1); 
	}); 
	////primary form ////
	$('#SubmitBtn').click(function(){
		vaidate_from();
	});
	$('#CancelBtn').click(function(){
		window.location.reload();
	});
	
	$('#AddBtn').click(function(){
		$('#AddBdy').show();
		$('#AddBdy1').hide();
		$('#AddBtn').hide();
		$('#AddBtn1').show();
	});
	
	///secondary form /////
	$('#SubmitBtn1').click(function(){
		vaidate_from1();
	});
	$('#CancelBtn1').click(function(){
		window.location.reload();
	});
	
	$('#AddBtn1').click(function(){
		$('#AddBdy1').show();
		$('#AddBdy').hide();
		$('#AddBtn1').hide();
		$('#AddBtn').show();
	});
	
});



function get_stylemodel(page)
{
	var skey = $.trim($('#skey').val());
	$.ajax({
		url:"",
		method : "POST",
		data:{'get':'get_stylemodel','page':page,'skey':skey},
		success:function(data){
			data = $.parseJSON(data);
			var html='';
			if(data.get_stylemodel!='')
			{
				
				var n = 1;
				$.each(data.get_stylemodel, function(i){
					
					var row = data.get_stylemodel[i];
					var status = '';
					var $n = n++;
					if(row.Status == '1')
						status = "<span class='label label-success'>Active</span>";
					else
						status = "<span class='label label-danger'>In-Active</span>";
					 
					html+=" <tr><td>"+$n+"</td><td>"+row.Style+"</td><td>"+row.Model+"</td><td><button class='btn btn-primary btn-xs' onclick='edit("+row.id+")'><i class='fa fa-pencil'></i></button>&nbsp;&nbsp;&nbsp;<button class='btn btn-danger btn-xs' onclick='del("+row.id+")'><i class='fa fa-trash'></i></button></td></tr>";
				});
			}
			else
				html+="<td></td><td></td><td>No Results Found..</td><td></td><td></td>";
			$('#InstallationsTable').find('tbody').html(html);
			$('#pagination').html(data.pagination);
			$('#pagination').find('li').click(function(){
				get_stonetype($(this).attr('page'));
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
			data:{'get':'stylemodeledit','eid':id},
			success:function(data){
				data = $.parseJSON(data); 
				var html='';  
				if(data.installation!='')
				{
					$('#StyleId').val(data.id);
					$('#style').val(data.Style);
					$('#model').val(data.Model);					
					$('#AddBdy1').show();
				}
			}
		});
	}
} 

function del(id)
{
	id = $.trim(id);
	if(id!='')
	{
		if(confirm('Do you really want to delete this Stone ?'))
		{
			$.ajax({
				url:"",
				method : "POST",
				data:{'Del':'Del_stone','iid':id},
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
	var stylename 			= $.trim($('#stylename').val());
	var modelname 			= $.trim($('#modelname').val());
	alert(stylename);
	alert(modelname);
	
	if(stylename == '')
	{
		invalid = 1;
		$('#stylename').css('border-color','red');
	}
	else
		$('#stylename').css('border-color','');

	if(modelname == '')
	{
		invalid = 1;
		$('#modelname').css('border-color','red');
	}
	else
		$('#modelname').css('border-color','');
	
	
	if(invalid=='')
	{
		$('#CategoryAddForm').removeAttr('onsubmit');
		$('#CategoryAddForm').attr('action','');
		$('#CategoryAddForm').trigger('submit');
	} 
}

function vaidate_from1()
{
	var invalid				= '';
	var stylename 			= $.trim($('#style').val());
	var modelname 			= $.trim($('#model').val());
	alert(stylename);
	alert(modelname);
	
	if(stylename == '')
	{
		invalid = 1;
		$('#style').css('border-color','red');
	}
	else
		$('#style').css('border-color','');

	if(modelname == '')
	{
		invalid = 1;
		$('#model').css('border-color','red');
	}
	else
		$('#model').css('border-color','');
	
	
	if(invalid=='')
	{
		$('#NewmodelAddForm').removeAttr('onsubmit');
		$('#NewmodelAddForm').attr('action','');
		$('#NewmodelAddForm').trigger('submit');
	} 
}
</script>