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
			
			
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">FeedBack List</h3>
				
			</div>
			<div class="box-body">
				<table id="InstallationsTable" class="table table-bordered table-hover table-container">
					<thead>
						<tr>
									<th>Sno</th> 
									<th>Name</th>
									<th>Staff Name</th>
									<th>FeedBack</th>					    
									<th>Date</th>					    
									
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
					

					html+=" <tr><td>"+$n+"</td><td>"+row.u_name+"</td><td>"+row.name+"</td><td>"+row.feedback+"</td><td>"+row.date+"</td></tr>";
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