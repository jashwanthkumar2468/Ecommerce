
<div class="content-wrapper">
	<section class="content-header">
		<h1>Assigned Users</h1> 
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Assigned Users </li>
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
			  
				<h3 class="box-title">Add</h3>
				<button class="btn btn-primary pull-right" id="AddBtn"><i class="fa fa-plus"></i> Add</button>

			</div>
			
			<div class="box-body" id="AddBdy" style="display:none">
			
				<form id="assinedmemAddForm" onsubmit="return false;" method="post" enctype='multipart/form-data'>
					<div class="row">  
					     
						<div class="col-md-3" id="hidename1">
							<div class="form-group">   
								<label>Select Name</label>  
								<select id="selestname" name="selestname"class="form-control required">
								<option value="">Select Name</option>
								<?php
									foreach($user as $userinfo)
									{
										
										?>
		<option id="selestnamed" value="<?php echo $userinfo['uid'];  ?>"><?php echo $userinfo['firstname']; ?>
		
		
		</option>
										<?php
										
									}
									?>
								</select>
							</div>
						</div> 
						
						<div class="col-md-3"  id="hidename" style="display:none">
							<div class="form-group">   
								<label>Select Name</label>  
								<select id="selestname1" name="selestname1"class="form-control required">
								<option value="">Select Name</option>
							
								<!--<option id="selestnamed" value="ddd">ww</option>
								<option id="selestnamed" value="ddd">ww</option>
								<option id="selestnamed" value="ddd">ww</option>----->
								<?php
									foreach($useredit as $userinfoedit)
									{
										
										?>
		<option id="selestnamed" value="<?php echo $userinfoedit['uid'];  ?>"><?php echo $userinfoedit['firstname']; ?>
		
		
		</option>
										<?php
										
									}
									?>
								</select>
							</div>
						</div> 
						
						
                          <div class="col-md-3">
							<div class="form-group">   
								<label>Select Staff</label>  
								<select id="selestuser" name="selestuser" class="form-control required">
								<option value="">Select Staff</option>
								<?php
									foreach($staffmem as $staff)
									{
										?>
									<option value="<?php echo $staff['staffid']; ?>"><?php echo $staff['name']; ?></option>
										<?php
									}
									?>
								</select>
								
							</div>
						</div>
						

							 
					</div> 

					 
						
						  
					<input type="hidden" id="staffid" name="staffid" />  
					<input type="hidden" name="Add_Edit_assign_mem" value="true"/> 
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
				<h3 class="box-title">Assigned Users</h3>
				<button class="pull-right btn-primary btn" id="search">Search</button>
				<input type="text" class="form-control pull-right" id="skey" style="width:40%">
			</div>
			<div class="box-body">
				<table id="InstallationsTable" class="table table-bordered table-hover table-container">
					<thead>
						<tr>
							<th>Sno</th> 
							<th>Name</th> 
						    <th>Assigned Users</th>
							
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
	get_assignedmem(cpage);  
	
	$('#search').click(function(){   
		get_assignedmem(1); 
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
		$('#hidename').hide();
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

function get_assignedmem(page)
{
	var skey = $.trim($('#skey').val());
	$.ajax({
		url:"",
		method : "POST",
		data:{'get':'get_assignedmem','page':page,'skey':skey},
		success:function(data){
			data = $.parseJSON(data);
			var html='';
			if(data.get_assignedmem!='')
			{ 
				var n = 1;
				$.each(data.get_assignedmem, function(i){ 
					var row = data.get_assignedmem[i];
					var status = '';
					var $n = n++; 
					if(row.Status == '1')  
						status = "<span class='label label-success'>Active</span>";
					else 
						status = "<span class='label label-danger'>In-Active</span>";   
					  
   
					html+=" <tr><td>"+$n+"</td><td>"+row.firstname+"</td><td>"+row.name+"</td><td><button class='btn btn-primary btn-xs' onclick='edit("+row.aid+")'><i class='fa fa-pencil'></i></button>&nbsp;&nbsp;&nbsp;<button class='btn btn-danger btn-xs' onclick='del("+row.aid+")'><i class='fa fa-trash'></i></button></td></tr>";
				});
			} 
			else
				html+="<td></td><td></td><td>No Results Found..</td><td></td><td></td>";
			$('#InstallationsTable').find('tbody').html(html);
			$('#pagination').html(data.pagination);  
			$('#pagination').find('li').click(function(){ 
				get_assignedmem($(this).attr('page'));
			}); 
		}
	});
}

function edit(id)
{
	$('#hidename').show();  
	$('#hidename1').hide(); 

	
	id = $.trim(id);
	//alert(id);
	//$('#selestname').placeholder = "Type name here..";
	if(id!='')
	{
		
		//$('#selestnamed').css('display','none'); 
		$.ajax({
			
			url:"",
			method : "POST",  
			data:{'get':'assignedit','eid':id},
			success:function(data){
				data = $.parseJSON(data); 
				var html='';  
				if(data.installation!='')
				{
					$('#staffid').val(data.aid);   
					
					$('#selestuser').val(data.assignedusers);
					$('#selestname1').val(data.name);
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
				data:{'Del':'del_assign_mem','iid':id},    
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
	var selestname 			= $.trim($('#selestname').val());
	var selestuser 			= $.trim($('#selestuser').val());
	var selestname1 			= $.trim($('#selestname1').val());
	///var email 			= $.trim($('#email').val());
	//var password			= $.trim($('#password').val());
	
	if(selestuser == '')
	{ 
		invalid = 1;
		$('#selestuser').css('border-color','red');
	}
	else 
		$('#selestuser').css('border-color','');  
		
	
	if(selestname1 == '')
	{ 
		if(selestname == '')
		{ 
			invalid = 1;
			$('#selestname').css('border-color','red');
		}
		else 
			$('#selestname').css('border-color','');
	}else{
		if(selestname1 == '')
	{ 
		invalid = 1;
		$('#selestname1').css('border-color','red');
	}
	else 
		$('#selestname1').css('border-color','');
		
	}

	if(invalid=='')
	{
		$('#assinedmemAddForm').removeAttr('onsubmit');
		$('#assinedmemAddForm').attr('action','');
		$('#assinedmemAddForm').trigger('submit');
	} 
}
</script>

<script>
								function findValue()
								{
	                              var mmin = $.trim($('#mmin').val());
								 				  
									if(mmin != '')   
									{
										$.ajax({ 
											url:"",    
											method:"POST",    
											data:{'get':'getmmin','mmin':mmin},
											
											success:function(data)
											{     
											     data2 = $.parseJSON(data);
												  if(data2.err=='1'){ 
                                                    		$('#mmin').val('');		
                                                        $('#mmin').focus();	 														
													  alert("Sorry, Min Value is already between previous value");  
													  
												  }   
												   
											}  
										});
									}
                                }
								
								
								function findValuemax()
								{ 
	                             
								  var mmax = $.trim($('#mmax').val());
											            //  alert(mmin);  				  
									if(mmax != '')   
									{
										$.ajax({ 
											url:"",    
											method:"POST",    
											data:{'get':'getmmax','mmax':mmax},
											 
											success:function(data) 
											{     
											     data2 = $.parseJSON(data);  
												 if(data2.err=='2'){   
												        $('#mmax').val('');		 
                                                        $('#mmax').focus();	
													  alert("Sorry, Max Value is already between previous value"); 
													   
												  }   
											} 
										});
									}
                                }
</script>