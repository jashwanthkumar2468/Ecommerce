
<div class="content-wrapper">
	<section class="content-header">
		<h1>Manage Sub Category</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Manage Sub Category</li>
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
			
				<h3 class="box-title">Add New Sub Category</h3>
				<button class="btn btn-primary pull-right" id="AddBtn"><i class="fa fa-plus"></i> Add</button>

			</div>
			
			<div class="box-body" id="AddBdy" style="display:none">
				<form id="SubCategoryAddForm" onsubmit="return false;" method="post" enctype='multipart/form-data'>
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
								<label>Sub Category Name</label>
								<input type="text" class="form-control required" name="scatname" id="scatname" placeholder="Enter Sub Category Name"/>
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
								<label>Sort</label>
								<input type="text" class="form-control required" name="sort" id="sort" placeholder="Enter Sort Order"/>
							</div>
						</div>

						

							
					</div>

					<div class="row">
						<div class="col-md-6">

							<a href="" id="upload_link">
								<div id="targetOuter">
								<div id="targetLayer"></div>
								<img src="<?php echo base_url(); ?>images/photo.png" class="icon-choose-image imgs" id="imghide">
							</div>
							</a>
							<input type="file" class="form-control required" name="simage" id="simage" onchange="showPreview(this);" style="display: none;"/>
						</div>
					</div>
						
				
					<input type="hidden" id="subcategory_name_id" name="subcategory_name_id" />
					<input type="hidden" name="Add_Edit_Sub_Category" value="true"/>
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
				<h3 class="box-title">Sub Categories List</h3>
				<button class="pull-right btn-primary btn" id="search">Search</button>
				<input type="text" class="form-control pull-right" id="skey" style="width:40%">
			</div>
			<div class="box-body">
				<table id="InstallationsTable" class="table table-bordered table-hover table-container">
					<thead>
						<tr>
							<th>Sno</th>
							<th>Parent Category Name</th>
							<th>Sub Category Name</th>
							<th>Sort</th>
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
<script>
$(function(){
	cpage = 1;
	get_sub_categories(cpage);
	
	$('#search').click(function(){
		get_sub_categories(1);
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
		$('#simage').trigger('click');
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

function get_sub_categories(page)
{
	var skey = $.trim($('#skey').val());
	$.ajax({
		url:"",
		method : "POST",
		data:{'get':'subcategory','page':page,'skey':skey},
		success:function(data){
			data = $.parseJSON(data);
			var html='';
			if(data.subcategory!='')
			{
				var n = 1;
				$.each(data.subcategory, function(i){
					var row = data.subcategory[i];
					var status = '';
					var $n = n++;
				
					if(row.sStatus == '1')
					{
						status = "<span class='label label-success'>Active</span>";
					}
					else if(row.sStatus == '0')
					{
						status = "<span class='label label-danger'>In-Active</span>";
					}

					html+=" <tr><td>"+$n+"</td><td>"+row.catname+"</td><td>"+row.subcattitle+"</td><td>"+row.SubSort+"</td><td>"+status+"</td><td><button class='btn btn-primary btn-xs' onclick='edit("+row.subcategory_name_id+")'><i class='fa fa-pencil'></i></button>&nbsp;&nbsp;&nbsp;<button class='btn btn-danger btn-xs' onclick='del("+row.subcategory_name_id+")'><i class='fa fa-trash'></i></button></td></tr>";
				});
			}
			else
				html+="<td></td><td></td><td>No Results Found..</td><td></td><td></td>";
			$('#InstallationsTable').find('tbody').html(html);
			$('#pagination').html(data.pagination);
			$('#pagination').find('li').click(function(){
				get_sub_categories($(this).attr('page'));
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
			data:{'get':'subcategoryedit','eid':id},
			success:function(data){
				data = $.parseJSON(data);
				var html='';
				if(data.installation!='')
				{
					$('#subcategory_name_id').val(data.subcategory_name_id);
					$('#scatname').val(data.Title);
					$('#catname').val(data.ParentCategory);
					$('#sort').val(data.SubSort);
					$('#imghide').attr('src',data.Image);
					$('#imghide').css('width','200');
					$('#imghide').css('height','200');
					
					$('#Status').val(data.Status);
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
		if(confirm('Do you really want to delete this Installation ?'))
		{
			$.ajax({
				url:"",
				method : "POST",
				data:{'Del':'installation','iid':id},
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
	var scatname 			= $.trim($('#scatname').val());
	var catname 			= $.trim($('#catname').val());
	var sort 				= $.trim($('#sort').val());
	var simage 				= $.trim($('#simage').val());
	var Status				= $.trim($('#Status').val());
	
	
	if(scatname == '')
	{
		invalid = 1;
		$('#scatname').css('border-color','red');
	}
	else
		$('#scatname').css('border-color','');
	if(catname == '')
	{
		invalid = 1;
		$('#catname').css('border-color','red');
	}
	else
		$('#catname').css('border-color','');
	if(Status=='')
	{
		invalid = 1;
		$('#Status').css('border-color','red');
	}
	else
		$('#Status').css('border-color','');
	
	
	if(invalid=='')
	{
		$('#SubCategoryAddForm').removeAttr('onsubmit');
		$('#SubCategoryAddForm').attr('action','');
		$('#SubCategoryAddForm').trigger('submit');
	}
}
</script>