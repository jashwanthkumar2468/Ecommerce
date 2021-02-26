

<style>
input[type=checkbox], input[type=radio]{
	
	margin-left: -22px;
}
	.multiselect-container 
	{
		width: 100%; 
		height: 300px; 
		overflow: auto;
		position: absolute;
		will-change: transform; 
		top: 0px; 
		left: 0px;
		transform: 
		translate3d(0px, -302px, 0px);
		
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

<div class="content-wrapper">
	<section class="content-header">
		<h1>Staff Members </h1> 
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Staff Members </li>
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
			  
				<h3 class="box-title">Add New Staff Member</h3>
				<button class="btn btn-primary pull-right" id="AddBtn"><i class="fa fa-plus"></i> Add</button>

			</div>
			
			<div class="box-body" id="AddBdy" style="display:none">
			
				<form id="staffmemAddForm" onsubmit="return false;" method="post" enctype='multipart/form-data'>
					<div class="row">  
					     
						<div class="col-md-3">
							<div class="form-group">   
								<label>Name</label>
								<input type="text" class="form-control required" name="name" id="name"   placeholder="Enter Name"/> 
							</div>
						</div> 
                          <div class="col-md-2">
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
						 
						<div class="col-md-2">
							<div class="form-group">   
								<label>Password</label>  
								<input type="password" class="form-control required" name="password" id="password"  placeholder="Enter Password"/> 
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">   
								<label>Select Product Type</label>  
								<select name="ProductCategory" class="form-control required" id="ProductCategory">
								    <option value=''>Select Product Type</option> 
								    <option value="Premium">Premium</option>
								    <option value="Non-Premium">Non-Premium</option>
								    <option value="Both">Both</option>
								</select>
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
							<th>Name</th> 
						     <th>Number</th>
							 <th>Email </th> 
							 <th>Product Type </th>
							 <th>Assign Users</th>
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
					  
   
					//html+=" <tr><td>"+$n+"</td><td>"+row.name+"</td><td>"+row.number+"</td><td>"+row.email+"</td><td><a href='<?php echo base_url('EcoDashAdmin/StaffCategories/"+row.staffid+"'); ?>'><button class='btn btn-warning btn-xs'style='color:white;background: #204079;border-color: #204079;'><i class='fa fa-eye'>&nbsp;View</i></button></a></td><td><button class='btn btn-primary btn-xs' onclick='edit("+row.staffid+")'><i class='fa fa-pencil'></i></button>&nbsp;&nbsp;&nbsp;<button class='btn btn-danger btn-xs' onclick='del("+row.staffid+")'><i class='fa fa-trash'></i></button></td></tr>";
					
					/*html+=" <tr><td>"+$n+"</td><td>"+row.firstname+"</td><td><a href='<?php echo base_url("EcoDashAdmin/feedbackview")?>/"+row.uid+"/"+row.firstname+"'><button style='background: #204079;border-color: #204079;font-size:14px;padding:7px;'class='btn btn-warning btn-xs' '><i class='fa fa-plus'>&nbsp;Add</i></button></a></td></tr>";*/
					html+=" <tr><td>"+$n+"</td><td>"+row.name+"</td><td>"+row.number+"</td><td>"+row.email+"</td><td>"+row.ProductCategory+"</td><td><a href='<?php echo base_url('EcoDashAdmin/AssignedUsers'); ?>'><button class='btn btn-warning btn-xs'style='background: #204079;border-color: #204079;'><i class='fa fa-eye'>&nbsp;View</i></button></a></td><td><button class='btn btn-primary btn-xs' onclick='edit("+row.staffid+")'><i class='fa fa-pencil'></i></button>&nbsp;&nbsp;&nbsp;<button class='btn btn-danger btn-xs' onclick='del("+row.staffid+")'><i class='fa fa-trash'></i></button></td></tr>";
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
					$('#ProductCategory').val(data.ProductCategory);
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

function vaidate_from()
{
	var invalid				= '';
	var name 			= $.trim($('#name').val());
	var number 			= $.trim($('#number').val());
	var email 			= $.trim($('#email').val());
	var password			= $.trim($('#password').val());
	var ProductCategory			= $.trim($('#ProductCategory').val());
	

	if(name == '')
	{ 
		invalid = 1;
		$('#name').css('border-color','red');
	}
	else 
		$('#name').css('border-color','');  
if(number == '')
	{ 
		invalid = 1;
		$('#number').css('border-color','red');
	}
	else 
		$('#number').css('border-color','');
	if(email == '')
	{ 
		invalid = 1;
		$('#email').css('border-color','red');
	}
	else 
		$('#email').css('border-color','');

	if(password == '')
	{ 
		invalid = 1;
		$('#password').css('border-color','red');
	}
	else 
		$('#password').css('border-color','');
	
	if(ProductCategory == '')
	{ 
		invalid = 1;
		$('#ProductCategory').css('border-color','red');
	}
	else 
		$('#ProductCategory').css('border-color','');  
	
	
	if(invalid=='')
	{
		$('#staffmemAddForm').removeAttr('onsubmit');
		$('#staffmemAddForm').attr('action','');
		$('#staffmemAddForm').trigger('submit');
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
