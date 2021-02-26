<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
input[type=checkbox], input[type=radio]{
	
	margin-left: -22px;
}
	

.subcats{
	padding-bottom: 10px;
	margin-left:20px;
	font-size:20px;
}

	.btn-group{
	width:100%;
	}



</style>

<div class="modal fade" id="Statusfback" role="dialog">
	<div class="modal-dialog" style="width:320px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title text-center">Change Feedback Status</h3>
			</div>
			<div class="modal-body">
				<form id="addnotesstat_form">
					<div class="form-group">
								<label>Feedback</label>
								<input type="text" class="form-control" name="fback" id="fback" placeholder="Enter User Login Time"/>
							</div>

					<input type="hidden" name="fbackid" id="fbackid"/>

				</form>
				<div class="button-group text-center">
					<button class="btn btn-primary kc-sucess-btn" id="Changfback">Submit</button>
				</div>
			</div>
			
		</div>
	</div>
</div>



<div class="content-wrapper">
	<section class="content-header">
		<h1>User LIst </h1> 
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">User LIst </li>
		</ol> 
	</section>    
	<section class="content">
		<?php if($this->session->flashdata('success')){ ?>
			<div class="alert alert-success text-center"><a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">x</a><?php echo $this->session->flashdata('success'); ?></div>
		<?php } else if($this->session->flashdata('error')) { ?>
			<div class="alert alert-danger text-center"><a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">x</a><?php echo $this->session->flashdata('error'); ?></div>
		<?php } ?>
		<div class="box box-default">
			<!-----<div class="box-header with-border">
			  
				<h3 class="box-title">Add New Staff Member</h3>
				<button class="btn btn-primary pull-right" id="AddBtn"><i class="fa fa-plus"></i> Add</button>

			</div>-------->
			
			<div class="box-body" id="AddBdy" style="display:none">
			
				<form id="staffmemAddForm" onsubmit="return false;" method="post" enctype='multipart/form-data'>
					<div class="row">  
					     
						<div class="col-md-3">
							<div class="form-group">   
								<label>Name</label>
								<input type="text" class="form-control required" name="name" id="name"   placeholder="Enter Name"/> 
							</div>
						</div> 
                          <div class="col-md-3">
							<div class="form-group">   
								<label>Number</label>  
								<input type="text" class="form-control required" name="number" id="number"  placeholder="Enter Number"/> 
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">   
								<label>Email</label>
								<input type="email" class="form-control required" name="email" id="email"  placeholder="Enter email"/> 
							</div>
						</div>
						 
						<div class="col-md-3">
							<div class="form-group">   
								<label>Password</label>  
								<input type="password" class="form-control required" name="password" id="password"  placeholder="Enter Password"/> 
							</div>
						</div>

						

							 
					</div> 

					 
						
						  
					<input type="hidden" id="staffid" name="staffid" />  
					<input type="hidden" name="Add_Edit_staff_mem" value="true"/> 
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
				<h3 class="box-title">Staff Members List</h3>
				<button class="pull-right btn-primary btn" id="search">Search</button>
				<input type="text" class="form-control pull-right" id="skey" style="width:40%">
			</div>
			<div class="box-body">
				<table id="InstallationsTable" class="table table-bordered table-hover table-container">
					<thead>
						<tr>
							<th>Sno</th> 
							<th>User Name</th>
							<th>Assign Products</th>
							<th>Give Feedback</th>
							 <!--<th>Update Feedback</th> 
							 <th>Feedback</th>---> 
							
							
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
/*
	$('#feedbacksubmit').click(function(){
		 var invalid = '';
		 var feedback = $.trim($('#feedback').val());
		 var feedbackuserid = $.trim($('#fedebakId').val());

		 if(feedback == '')
		 {
		 	invalid = 1;
		 	$('#feedback').css('border-color','red');
		 }
		 else
		 	$('#feedback').css('border-color','');
		 if(invalid == '')
		 {
		 	$.ajax({
		 		url:"",
		 		type:"POST",
		 		data:{'update':'feedbackform','feedbackuserid':feedbackuserid,'feedback':feedback},
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

function feedbackopen(id)
{
	id = $.trim(id);
	
	$('#fedebakId').val(id);
	$('#StatusChng').modal('show');
}*/
</script>




<script>




$(function(){
	cpage = 1;
	get_staffmem(cpage);  
	
	$('#search').click(function(){   
		get_staffmem(1); 
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


function get_staffmem(page)
{
	var skey = $.trim($('#skey').val());
	$.ajax({
		url:"",
		method : "POST",
		data:{'get':'get_staffmem','page':page,'skey':skey},
		success:function(data){
			data = $.parseJSON(data);
			var html='';
			if(data.get_staffmem!='')
			{ 
				var n = 1;
				$.each(data.get_staffmem, function(i){ 
					var row = data.get_staffmem[i];
					var status = '';
					var $n = n++; 
					if(row.Status == '1')  
						status = "<span class='label label-success'>Active</span>";
					else 
						status = "<span class='label label-danger'>In-Active</span>";   
					  
  
					//html+=" <tr><td>"+$n+"</td><td>"+row.firstname+"</td><td><button style='background: #204079;border-color: #204079;'class='btn btn-warning btn-xs' onclick='updatefback("+row.uid+")'><i class='fa fa-check'>&nbsp;Update</i></button></td><td>"+row.feedback+"</td></tr>";
					
					
					html+="<tr><td>"+$n+"</td><td>"+row.firstname+"</td><td><a href='<?php echo base_url('EcoDashAdmin/StaffUserCategories')?>/"+row.uid+"'><button class='btn btn-warning btn-xs' style='color:white;background: #204079;border-color: #204079;'><i class='fa fa-eye'>&nbsp;View</i></button></a></td><td><a href='<?php echo base_url("EcoDashAdmin/feedbackview")?>/"+row.uid+"/"+row.firstname+"'><button style='background: #204079;border-color: #204079;font-size:13px;' class='btn btn-warning btn-xs' '><i class='fa fa-plus'>&nbsp;Add</i></button></a></td></tr>";
					
				});
			} 
			else
				html+="<td></td><td></td><td>No Results Found..</td><td></td><td></td>";
			$('#InstallationsTable').find('tbody').html(html);
			$('#pagination').html(data.pagination);  
			$('#pagination').find('li').click(function(){ 
				get_staffmem($(this).attr('page'));
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
			data:{'get':'staffedit','eid':id},
			success:function(data){
				data = $.parseJSON(data); 
				var html='';  
				if(data.installation!='')
				{
					$('#staffid').val(data.staffid);   
					$('#name').val(data.name);  
					$('#number').val(data.number);
					$('#email').val(data.email);
					$('#password').val('');
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
		if(confirm('Do you really want to delete this Member ?')) 
		{
			$.ajax({
				url:"",  
				method : "POST",  
				data:{'Del':'Del_staffmem','iid':id},    
				success:function(data){       
					window.location.reload();          
				} 
			}); 
		}
	}
}


function updatefback(id)
{
	id = $.trim(id);
	if(id!='')
	{
		$.ajax({
			url:"",
			type:"POST",
			data:{'get':'feedbackup','id':id},
			success:function(data)
			{
				//alert("datagotted");
				
				var html = '';
				var data = $.parseJSON(data);
				
				if(data.feedbackup!= '')
				{
					//alert("data gotted");
					//var ad=$('#fback').val(data.feedback);
					$('#fback').val(data.feedback);
//alert(ad);
				}
			}
		});
	}
	$('#fbackid').val(id);
	$('#Statusfback').modal('show');
}


$('#Changfback').click(function(){
		 var invalid = '';
		 var fback = $.trim($('#fback').val());
		 var fbackid = $.trim($('#fbackid').val());

		 if(fback == '')
		 {
		 	invalid = 1;
		 	$('#fback').css('border-color','red');
		 }
		 else
		 	$('#fback').css('border-color','');
		 if(invalid == '')
		 {
		 	$.ajax({
		 		url:"",
		 		type:"POST",
		 		data:{'update':'changefback','fbackid':fbackid,'fback':fback},
		 		success:function(data)
		 		{
		 			var data = $.parseJSON(data);
		 			if(data.err == '0')
		 			{
		 				alert(''+data.msg);
		 				window.location.reload();
		 				$('#Statusfback').modal('hide');
		 			}
		 			else
		 				alert(''+data.msg);
		 		}
		 	});
		 }

	});





</script>


