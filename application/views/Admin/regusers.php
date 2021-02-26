<div class="content-wrapper">
	<section class="content-header">
		<h1>User Details</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">User Details</li>
		</ol>
	</section>
	<section class="content">
		<?php if($this->session->flashdata('Success')){ ?>
			<div class="alert alert-success text-center"><a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">x</a><?php echo $this->session->flashdata('Success'); ?></div>
		<?php } else if($this->session->flashdata('Error')) { ?>
			<div class="alert alert-danger text-center"><a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">x</a><?php echo $this->session->flashdata('Error'); ?></div>
		<?php } ?>
		
		<div class="box box-default">
			
			<div class="box-body">
				<table id="InstallationsTable" class="table table-bordered table-hover table-container">
					<thead>
						<tr>
							<th>S NO</th>
							<th>First Name</th> 
							<th>Last Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Status</th>
							<th>TimeUpdate</th>
							<th>RequestedCategories</th>
							<th>Assign Staff</th>
							<th>Feedback</th>
							<th>Contact</th>
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
				<h3 class="modal-title text-center">Change Login Status</h3>
			</div>
			<div class="modal-body">
				<form id="addnotesstat_form">
					<div class="form-group">
								<label>Login Time</label>
								<input type="text" class="form-control" name="logintime" id="logintime" placeholder="Enter User Login Time"/>
							</div>

					<input type="hidden" name="LoginUserId" id="LoginUserId"/>

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
		 var logintime = $.trim($('#logintime').val());
		 var LoginUserId = $.trim($('#LoginUserId').val());

		 if(logintime == '')
		 {
		 	invalid = 1;
		 	$('#logintime').css('border-color','red');
		 }
		 else
		 	$('#logintime').css('border-color','');
		 if(invalid == '')
		 {
		 	$.ajax({
		 		url:"",
		 		type:"POST",
		 		data:{'update':'changelogintime','LoginUserId':LoginUserId,'logintime':logintime},
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
		data:{'get':'userdetails','page':page,'skey':skey},
		success:function(data){
			data = $.parseJSON(data);
			var html='';
			if(data.userdetails!='')
			{
				var n = 1;
				$.each(data.userdetails, function(i){
					var row = data.userdetails[i];
					
					var status='Active';
					var a="";
					  if(row.admin_status=='1')
					  {
						  var a="<button id='btnstyle' style=''class='btn btn-success btn-xs' onclick='editstatus_dnk("+row.uid +","+row.admin_status+")''>&nbsp;Active</button>";
						 
						//var status='InActive..';
						
						
					  }
					  else
					  {
						 var a="<button id='btnstyle' style='background-color:#204079;'class='btn btn-danger btn-xs' onclick='editstatus_dnk("+row.uid +","+row.admin_status+")''> &nbsp;InActive</button>";  
						  
					  }
					//var status = '';
					
					$n = n++;
					html+=" <tr><td>"+$n+"</td><td>"+row.firstname+"</td><td>"+row.lastname+"</td><td>"+row.email+"</td><td>"+row.number+"</td><td>"+a+"</td><td><button style='background: #204079;border-color: #204079;'class='btn btn-warning btn-xs' onclick='updaterate("+row.uid+")'><i class='fa fa-check'>&nbsp;Update</i></button>&nbsp;&nbsp;"+row.Login_time+"</td><td><a href='<?php echo base_url('EcoDashAdmin/UserCategories/"+row.uid+"'); ?>'><button class='btn btn-warning btn-xs'style='background: #204079;border-color: #204079;'><i class='fa fa-eye'>&nbsp;View</i></button></a></td><td><a href='<?php echo base_url('EcoDashAdmin/AssignedUsers'); ?>'><button class='btn btn-warning btn-xs'style='background: #204079;border-color: #204079;'><i class='fa fa-eye'>&nbsp;View</i></button></a></td><td><a href='<?php echo base_url('EcoDashAdmin/adminfeedbackview/"+row.uid+"'); ?>'><button class='btn btn-warning btn-xs'style='background: #204079;border-color: #204079;'><i class='fa fa-eye'>&nbsp;View</i></button></a></td><td>	<a href='https://wa.me/+"+row.countrycode+row.number+"' style='color:black'><i class='fa fa-whatsapp' style='font-weight:bold;color:green;font-size:20px;padding-right:5px;' aria-hidden='true'></i> "+row.number+"</a></td></tr>";
					
					
					
					
					
					
			
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
			data:{'get':'Loginusert','id':id},
			success:function(data)
			{
				
				var html = '';
				var data = $.parseJSON(data);
				
				if(data.Loginusert != '')
				{
					//alert("data gotted");
					var ad=$('#logintime').val(data.Login_time);
//alert(ad);
				}
			}
		});
	}
	$('#LoginUserId').val(id);
	$('#StatusChng').modal('show');
}
function editstatus_dnk(id,sid)  
{ 
	Statusid=$.trim(sid);
	statusid1 = $.trim(id); 
	
	 if(statusid1!='')
	  {
		if(confirm('Do you want to change this status'))
		{ 
		
			$.ajax({
				url:"",  
				method : "POST",  
				data:{'Edit':'userstatus','statusid1':statusid1,'statusid':Statusid},    
				success:function(data){
					
					window.location.reload(); 
					
				}
			});
		}
	  }
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