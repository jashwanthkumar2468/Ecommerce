<div class="content-wrapper">
	<section class="content-header">
		<h1>Manage Certificates</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Manage Certificates</li>
		</ol>
	</section>
	<section class="content">
		<?php if($this->session->flashdata('Success')){ ?>
			<div class="alert alert-success text-center"><a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">x</a><?php echo $this->session->flashdata('Success'); ?></div>
		<?php } else if($this->session->flashdata('Error')) { ?>
			<div class="alert alert-danger text-center"><a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">x</a><?php echo $this->session->flashdata('Error'); ?></div>
		<?php } ?>
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Add New Certificate</h3>
				<button class="btn btn-primary pull-right" id="AddBtn"><i class="fa fa-plus"></i> Add</button>
			</div>
			<div class="box-body" id="AddBdy" style="display:none">
				<form id="InstallationAddForm" onsubmit="return false;" method="post" enctype='multipart/form-data'>
					<div class="row">
							
						<div class="col-md-3">
							<div class="form-group">
								<label>Caret Type</label>
								<input type="text" class="form-control required" name="carettype" id="carettype" placeholder="Caret Name"/> 
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<label>Gold Rate</label>
								<input type="text" class="form-control required" name="grate" id="grate" placeholder="Certificate Name"/>
							</div>
						</div>
						
					</div>
					
					<input type="hidden" name="Add_Edit_Gold" value="true"/>
					<input type="hidden" name="GoldRateId" id="GoldRateId"/>
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
				<h3 class="box-title"></h3>
				<button class="pull-right btn-primary btn" id="search">Search</button>
				<input type="text" class="form-control pull-right" id="skey" style="width:40%">
			</div>
			<div class="box-body">
				<table id="InstallationsTable" class="table table-bordered table-hover table-container">
					<thead>
						<tr>
							<th>S NO</th>
							<th>Gold Caret</th> 
							<th>Gold Rate</th>
							<th>Updated Date</th>
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
<div class="modal fade" id="StatusChng" role="dialog">
	<div class="modal-dialog" style="width:320px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title text-center">Change Status</h3>
			</div>
			<div class="modal-body">
				<form id="addnotesstat_form">
					<div class="form-group">
								<label>Gold Rate</label>
								<input type="text" class="form-control" name="tgrate" id="tgrate" placeholder="Enter Today Gold Rate"/>
							</div>

					<input type="hidden" name="GoldPriceId" id="GoldPriceId"/>

				</form>
				<div class="button-group text-center">
					<button class="btn btn-primary kc-sucess-btn" id="ChangStat">Submit</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(function(){
	cpage = 1;
	get_ceritficate(cpage);
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
	
	$('#search').click(function(){
		get_ceritficate(1);
	});

	$('#ChangStat').click(function(){
		var invalid = '';
		 var tgrate = $.trim($('#tgrate').val());
		 var GoldPriceId = $.trim($('#GoldPriceId').val());

		 if(tgrate == '')
		 {
		 	invalid = 1;
		 	$('#tgrate').css('border-color','red');
		 }
		 else
		 	$('#tgrate').css('border-color','');
		 if(invalid == '')
		 {
		 	$.ajax({
		 		url:"",
		 		type:"POST",
		 		data:{'update':'goldrateprice','GoldPriceId':GoldPriceId,'tgrate':tgrate},
		 		success:function(data)
		 		{
		 			var data = $.parseJSON(data);
		 			if(data.err == '0')
		 			{
		 				alert(''+data.msg);
		 				window.location.reload();
		 				$('#StatusChng').modal('hide');
		 			}
		 			else
		 				alert(''+data.msg);
		 		}
		 	});
		 }

	});
});

function get_ceritficate(page)
{
	var skey = $.trim($('#skey').val());
	$.ajax({
		url:"",
		method : "POST",
		data:{'get':'gold','page':page,'skey':skey},
		success:function(data){
			data = $.parseJSON(data);
			var html='';
			if(data.gold!='')
			{
				var n = 1;
				$.each(data.gold, function(i){
					var row = data.gold[i];
					var status = '';
					if(row.Status == '1')
						status = "<button class='btn btn-xs btn-success' onclick='active("+row.GoldRateId+")'>Active</button>";
					else
						status = "<button class='btn btn-xs btn-danger' onclick='inactive("+row.GoldRateId+")'>In-Active</button>";
					$n = n++;
					html+=" <tr><td>"+$n+"</td><td>"+row.GoldCaret+"</td><td>"+row.GoldRate+"</td><td>"+row.Date+"</td><td>"+status+"</td><td><button class='btn btn-warning btn-xs' onclick='updaterate("+row.GoldRateId+")'>Update Today Gold Rate</button></td></tr>";
				}); 
			}
			else 
				html+="<td></td><td></td><td>No Results Found..</td><td></td><td></td>";
			$('#InstallationsTable').find('tbody').html(html);
			$('#pagination').html(data.pagination);
			$('#pagination').find('li').click(function(){
				get_ceritficate($(this).attr('page'));
			});
		}
	});
}

function updaterate(id)
{
	id = $.trim(id);
	if(id!='')
	{
		$.ajax({
			url:"",
			type:"POST",
			data:{'get':'goldprice','id':id},
			success:function(data)
			{
				var html = '';
				var data = $.parseJSON(data);
				if(data.goldprice != '')
				{
					$('#tgrate').val(data.GoldRate);

				}
			}
		});
	}
	$('#GoldPriceId').val(id);
	$('#StatusChng').modal('show');
}

function del(id)
{
	id = $.trim(id);
	if(id!='')
	{
		if(confirm('Do you really want to delete this Request ?'))
		{
			$.ajax({
				url:"",
				method : "POST",
				data:{'Del':'cer_ficate','rid':id},
				success:function(data){
					window.location.reload();
				}
			});
		}
	}
}

function reset()
{
	$('#Name').val('');
	$('#Phone').val('');
	$('#Location').val('');
	$('#Email').val('');
	$('#Date').val('');
	$('#Status').val('');
	$('#Name').css('border-color','');
	$('#Phone').css('border-color','');
	$('#Location').css('border-color','');
	$('#Email').css('border-color','');
	$('#Date').css('border-color','');
	$('#Status').css('border-color','');
	$('#AddBdy').hide();
	$('#AddBtn').show();
}

function vaidate_from()
{
	var invalid				= '';
	var grate 				= $.trim($('#grate').val());
	var carettype 				= $.trim($('#carettype').val());
	
	
	
	if(grate == '')
	{
		invalid = 1;
		$('#grate').css('border-color','red');
	}
	else
		$('#grate').css('border-color','');
	
	if(carettype == '')
	{
		invalid = 1;
		$('#carettype').css('border-color','red');
	}
	else
		$('#carettype').css('border-color','');
	
	
	
	if(invalid=='')
	{
		$('#InstallationAddForm').removeAttr('onsubmit');
		$('#InstallationAddForm').attr('action','');
		$('#InstallationAddForm').trigger('submit');
	}
}
function active(id)
{
	id = $.trim(id);
	if(id!='')
	{
		if(confirm("Do you really want to change this Status!"))
		{
			$.ajax({
				url:"",
				type:"POST",
				data:{'update':'cerstatus','id':id,'Status':'0'},
				success: function(data)
				{
					get_ceritficate();
				}
			});
		}
	}
}
function inactive(id)
{
	id = $.trim(id);
	if(id!='')
	{
		if(confirm("Do you really want to change this Status!"))
		{
			$.ajax({
				url:"",
				type:"POST",
				data:{'update':'cerstatus','id':id,'Status':'1'},
				success: function(data)
				{
					get_ceritficate();
				}
			});
		}
	}
}
</script>