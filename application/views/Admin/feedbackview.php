<div class="content-wrapper">
	<section class="content-header">
		<h1>FeedBack</h1> 
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">FeedBack</li>
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
			 
				<h3 class="box-title">Add FeedBack</h3>
				<button class="btn btn-primary pull-right" id="AddBtn"><i class="fa fa-plus"></i> Add</button>

			</div>
			
			<div class="box-body" id="AddBdy" style="display:none">
				<form id="CategoryAddForm" onsubmit="return false;" method="post" enctype='multipart/form-data'>
					<div class="row">
					
						<div class="col-md-3">
							<div class="form-group"> 
								<label>Name</label>
								<input type="text" class="form-control required" name="name" id="name" placeholder="Enter Name" value="<?php echo $uname;  ?>" readonly> 
							</div>
						</div>
						
                         <!--<div class="col-md-3">
							<div class="form-group"> 
								<label>FeedBack</label>
								<input type="text" class="form-control required" name="fback" id="fback" placeholder="Enter FeedBack Here"/> 
							</div>
						</div>------->
						
                        <div class="col-md-3">
							<div class="form-group"> 
							    <label>FeedBack</label>
								    <textarea class="form-control required" name="fback"  rows="4" cols="50" id="fback" placeholder="Enter FeedBack Here"/>
								    </textarea>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group"> 
							    <label>FeedBack</label>
								    <input type="date" class="form-control required" name="remainder" id="remainder">
							</div>
						</div>
					</div> 

					
						
						
					<input type="hidden" id="fbid" name="fbid" />
					<input type="hidden" name="Add_Edit_feedback_view" value="true"/>
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
				<h3 class="box-title">FeedBack List</h3>
				<button class="pull-right btn-primary btn" id="search">Search</button>
				<input type="text" class="form-control pull-right" id="skey" style="width:40%">
			</div>
			<div class="box-body">
				<table id="InstallationsTable" class="table table-bordered table-hover table-container">
					<thead>
						<tr>
									<th>Sno</th> 
									<th>Name</th>
									<th>FeedBack</th>
									<th>Remainder Date</th>
									<th>Date</th>					    
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
	get_fbview(cpage);
	
	$('#search').click(function(){   
		get_fbview(1); 
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

function get_fbview(page)
{
	var skey = $.trim($('#skey').val());
	$.ajax({
		url:"",
		method : "POST",
		data:{'get':'get_fbview','page':page,'skey':skey},
		success:function(data){
			data = $.parseJSON(data);
			var html='';
			
			if(data.get_fbview!='')
			{
				var n = 1;
				$.each(data.get_fbview, function(i){
					var row = data.get_fbview[i];
					var $n = n++;
					
					var remainder=formatDate(row.remainder);

					html+=" <tr><td>"+$n+"</td><td>"+row.u_name+"</td><td>"+row.feedback+"</td><td>"+remainder+"</td><td>"+row.date+"</td><td><button style='height:25px;width:24px;border: 1px solid black;'; class='btn btn-primary btn-xs' onclick='edit("+row.fbid+")'><i class='fa fa-pencil' ></i></button>&nbsp;&nbsp;&nbsp;<button style='height:25px;width:24px;background:#492c10;color:white;border:1px solid #492c10;border-radius:3px';class='btn btn-danger btn-xs' onclick='del("+row.fbid+")'><i class='fa fa-trash'></i></button></td></tr>";
				});
			}
			else
				html+="<td></td><td></td><td>No Results Found..</td><td></td><td></td>";
			$('#InstallationsTable').find('tbody').html(html);
			$('#pagination').html(data.pagination);
			$('#pagination').find('li').click(function(){
				get_fbview($(this).attr('page'));
			});
		}
	});
}
function formatDate (input) {
  var datePart = input.match(/\d+/g),
  year = datePart[0].substring(0,4), // get only two digits
  month = datePart[1], day = datePart[2];

  return day+'/'+month+'/'+year;
}






function edit(id)
{
	id = $.trim(id);
	if(id!='')
	{
		$.ajax({
			url:"",
			method : "POST",
			data:{'get':'fb_edit','eid':id},
			success:function(data){
				data = $.parseJSON(data); 
				var html='';  
				if(data.installation!='')
				{
					$('#fbid').val(data.fbid);
					$('#name').val(data.u_name);
					$('#fback').val(data.feedback);		
					$('#remainder').val(data.remainder);		
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
		if(confirm('Do you really want to delete this FeedBack ?'))
		{
			$.ajax({
				url:"",
				method : "POST",
				data:{'Del':'Del_fb','iid':id},
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
	var name 			= $.trim($('#name').val());
	var fback 			= $.trim($('#fback').val());
	//alert(name);
	//alert(fback);
	
	
	
	if(name == '')
	{
		invalid = 1;
		$('#name').css('border-color','red');
	}
	else
		$('#name').css('border-color','');

	if(fback == '')
	{
		invalid = 1;
		$('#fback').css('border-color','red');
	}
	else
		$('#fback').css('border-color','');
	
	
	if(invalid=='')
	{
		$('#CategoryAddForm').removeAttr('onsubmit');
		$('#CategoryAddForm').attr('action','');
		$('#CategoryAddForm').trigger('submit');
	} 
}
</script>