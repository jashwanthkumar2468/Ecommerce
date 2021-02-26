
<div class="content-wrapper">
	<section class="content-header">
		<h1>Manage Piece </h1> 
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Manage Piece </li>
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
			 
				<h3 class="box-title">Add New Piece </h3>
				<button class="btn btn-primary pull-right" id="AddBtn"><i class="fa fa-plus"></i> Add</button>

			</div>
			
			<div class="box-body" id="AddBdy" style="display:none">
				<form id="CategoryAddForm" onsubmit="return false;" method="post" enctype='multipart/form-data'>
					<div class="row">  
					     
						<div class="col-md-3">
							<div class="form-group">   
								<label>Piece</label>
								<input type="text" class="form-control required" name="piecename" id="piecename" placeholder="Enter Piece Name"/> 
							</div>
						</div> 

						
 
						

							 
					</div> 

					
						
						  
					<input type="hidden" id="PieceId" name="PieceId" />  
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
				<h3 class="box-title">Piece List</h3>
				<button class="pull-right btn-primary btn" id="search">Search</button>
				<input type="text" class="form-control pull-right" id="skey" style="width:40%">
			</div>
			<div class="box-body">
				<table id="InstallationsTable" class="table table-bordered table-hover table-container">
					<thead>
						<tr>
							<th>Sno</th> 
							<th>Piece </th> 
						     
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
					if(row.Status == '1')  
						status = "<span class='label label-success'>Active</span>";
					else 
						status = "<span class='label label-danger'>In-Active</span>";  
					  
   
					html+=" <tr><td>"+$n+"</td><td>"+row.piecename+"</td><td><button class='btn btn-primary btn-xs' onclick='edit("+row.PieceId+")'><i class='fa fa-pencil'></i></button>&nbsp;&nbsp;&nbsp;<button class='btn btn-danger btn-xs' onclick='del("+row.PieceId+")'><i class='fa fa-trash'></i></button></td></tr>";
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
				if(data.installation!='')
				{
					$('#PieceId').val(data.PieceId); 
					$('#piecename').val(data.piecename); 
					
					  
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
	var piecename 			= $.trim($('#piecename').val());
	
	
	
	if(piecename == '')
	{ 
		invalid = 1;
		$('#piecename').css('border-color','red');
	}
	else 
		$('#piecename').css('border-color','');  

	
	
	if(invalid=='')
	{
		$('#CategoryAddForm').removeAttr('onsubmit');
		$('#CategoryAddForm').attr('action','');
		$('#CategoryAddForm').trigger('submit');
	} 
}
</script>