
<div class="content-wrapper">
	<section class="content-header">
		<h1>Weight Chart</h1> 
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Manage Weights</li>
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
			 
				<h3 class="box-title">Add Weight</h3>
				<button class="btn btn-primary pull-right" id="AddBtn"><i class="fa fa-plus"></i> Add</button>

			</div>
			
			<div class="box-body" id="AddBdy" style="display:none">
				<form id="CategoryAddForm" onsubmit="return false;" method="post" enctype='multipart/form-data'>
					<div class="row">
					
						<div class="col-md-3">
							<div class="form-group"> 
								<label>Min Weight</label>
								<input type="text" class="form-control required" name="minweight" id="minweight" placeholder="Enter Min Weight"/> 
							</div>
						</div>
						
                         <div class="col-md-3">
							<div class="form-group"> 
								<label>Max Weight</label>
								<input type="text" class="form-control required" name="maxweight" id="maxweight" placeholder="Enter Max Weight"/> 
							</div>
						</div>
						
 
						

							 
					</div> 

					
						
						
					<input type="hidden" id="WeightId" name="WeightId" />
					<input type="hidden" name="Add_Edit_Weight" value="true"/>
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
				<h3 class="box-title">Stones List</h3>
				<button class="pull-right btn-primary btn" id="search">Search</button>
				<input type="text" class="form-control pull-right" id="skey" style="width:40%">
			</div>
			<div class="box-body">
				<table id="InstallationsTable" class="table table-bordered table-hover table-container">
					<thead>
						<tr>
									<th>Sno</th> 
									<th>Weight</th>			    
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
	get_weight(cpage);
	
	$('#search').click(function(){   
		get_weight(1); 
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
	
});



function get_weight(page)
{
	var skey = $.trim($('#skey').val());
	$.ajax({
		url:"",
		method : "POST",
		data:{'get':'get_weight','page':page,'skey':skey},
		success:function(data){
			data = $.parseJSON(data);
			var html='';
			if(data.get_weight!='')
			{
				var n = 1;
				$.each(data.get_weight, function(i){
					var row = data.get_weight[i];
					var status = '';
					var $n = n++;
					
					html+=" <tr><td>"+$n+"</td><td>"+row.min+"-"+row.max+"</td><td><button class='btn btn-primary btn-xs' onclick='edit("+row.id+")'><i class='fa fa-pencil'></i></button>&nbsp;&nbsp;&nbsp;<button class='btn btn-danger btn-xs' onclick='del("+row.id+")'><i class='fa fa-trash'></i></button></td></tr>";
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
			data:{'get':'weightedit','eid':id},
			success:function(data){
				data = $.parseJSON(data); 
				var html='';  
				if(data.installation!='')
				{
					$('#WeightId').val(data.id);
					$('#minweight').val(data.min);
					$('#maxweight').val(data.max);					
					$('#AddBdy').show();
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
				data:{'Del':'Del_weight','iid':id},
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
	var min 			= $.trim($('#minweight').val());
	var max 			= $.trim($('#maxweight').val());
	//alert(stonename);
	//alert(stoneprice);
	
	
	
	if(min == '')
	{
		invalid = 1;
		$('#minweight').css('border-color','red');
	}
	else
		$('#minweight').css('border-color','');

	if(max == '')
	{
		invalid = 1;
		$('#maxweight').css('border-color','red');
	}
	else
		$('#maxweight').css('border-color','');
	
	
	if(invalid=='')
	{
		$('#CategoryAddForm').removeAttr('onsubmit');
		$('#CategoryAddForm').attr('action','');
		$('#CategoryAddForm').trigger('submit');
	} 
}
</script>