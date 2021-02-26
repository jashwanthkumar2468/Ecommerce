
<div class="content-wrapper">
	<section class="content-header">
		<h1>Manage Orders</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Manage Orders</li>
		</ol>
	</section>
	<section class="content">
		<?php if($this->session->flashdata('success')){ ?>
			<div class="alert alert-success text-center"><a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">x</a><?php echo $this->session->flashdata('success'); ?></div>
		<?php } else if($this->session->flashdata('error')) { ?>
			<div class="alert alert-danger text-center"><a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">x</a><?php echo $this->session->flashdata('error'); ?></div>
		<?php } ?>
		<div class="box box-default" style="border-top: none;">
			<!--<div class="box-header with-border">
			
				<h3 class="box-title">Add New Category</h3>
				<button class="btn btn-primary pull-right" id="AddBtn"><i class="fa fa-plus"></i> Add</button>

			</div>-->
			
			<div class="box-body" id="AddBdy" style="display:none">
				<form id="CategoryAddForm" onsubmit="return false;" method="post" enctype='multipart/form-data'>
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
								<label>Category Name</label>
								<input type="text" class="form-control required" name="catname" id="catname" placeholder="Enter Category Name"/>
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
							<input type="file" class="form-control required" name="cimage" id="cimage" onchange="showPreview(this);" style="display: none;"/>
						</div>
					</div>
						
				   
					<input type="hidden" id="CategoryId" name="CategoryId" />
					<input type="hidden" name="Add_Edit_Category" value="true"/>
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
				<!--<button class="btn btn-primary pull-left" onclick="printinvoice();"><i class='fa fa-cash'></i>Print Invoice</button>-->
				<button class="pull-right btn-primary btn" id="search">Search</button>
				<input type="text" class="form-control pull-right" id="skey" style="width:40%">
			</div>

			<div class="box-body">
				<table id="InstallationsTable" class="table table-bordered table-hover table-container">
					<thead>
						<tr>
							<th><input type="checkbox" id="selectall"></th>
							<th>Order Id</th>
							<th>Customer Name</th>
							<!--<th>Status</th>-->
							<th>Total</th>
							<th>Payment Through</th>
							<th>Date Added</th>
						    <!--<th>Delivery Status</th> -->
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
<div>
  <div class="modal fade" id="SendRequirementtoall" role="dialog">
  <div class="modal-dialog" style="width:320px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <div id="error"></div><h6 class="modal-title text-center">Send SMS to All Active Users</h6>
       
      </div>
      <div class="modal-body">
        <form id="addnotesstat_form">
          <div class="form-group">
            <textarea name="usersms" id="usersms" class="form-control" maxlength="160" rows="5"  placeholder="Max length is 160 characters."></textarea>
           <input type="text" id="sms" id="sms" value="" style="display:none"> 
          </div> 
        </form> 
        <div class="button-group text-center">
          <button class="btn btn-primary" id="SendsmsallClick">Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>
 
</div>
<div id="invoicediv"></div>
<script type="text/javascript" src="<?php echo base_url(); ?>backendassets/js/md5.js"></script>
<script>
$(function(){
	cpage = 1;
	get_orders(cpage);
	
	$('#search').click(function(){
		get_orders(1);
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

	$('#selectall').click(function(){
		$('input:checkbox').not(this).prop('checked',this.checked);
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

function get_orders(page)
{
	var skey = $.trim($('#skey').val());
	$.ajax({
		url:"",
		method : "POST",
		data:{'get':'orders','page':page,'skey':skey},
		success:function(data){
			data = $.parseJSON(data);
			var html='';
			if(data.orders!='')
			{
				var n = 1;
				$.each(data.orders, function(i){
					var row = data.orders[i];
					var status = '';
					var $n = n++;
					if(row.orStatus == '1')
						status = "<span class='label label-warning'>Pending</span>";
					else if(row.orStatus == '2')
						status = "<span class='label label-danger'>Canceled</span>";
					else if(row.orStatus == '3')
						status = "<span class='label label-success'>Completed</span>";
					else if(row.orStatus == '0')
						status = "<span class='label label-success'>Delivered</span>";
						else if(row.orStatus == '9')
						status = "<span class='label label-success'>Delivered</span>";
					

					html+=" <tr><td><input type='checkbox' name=chk id='invoiceids' value="+row.OrderId+"></td><td>"+row.OrderId+"</td><td>"+row.Username+"</td><td>"+row.ttranamount+"</td><td>"+row.TypeOfPay+"</td><td>"+row.odate+"</td><td><a href='"+base_url+'EcoDashAdmin/Order_View/'+row.OrderId+"'><button class='btn btn-primary btn-xs'>View Order Details</button></a>&nbsp;&nbsp;&nbsp;<a href='"+base_url+'EcoDashAdmin/Invoice/'+row.OrderId+"' target='_blank'><button class='btn btn-success btn-xs'>Print Invoice</button></a></td></tr>";
				});
			}
			else
				html+="<td></td><td></td><td>No Results Found..</td><td></td><td></td>";
			$('#InstallationsTable').find('tbody').html(html);
			$('#pagination').html(data.pagination);
			$('#pagination').find('li').click(function(){
				get_orders($(this).attr('page'));
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
			data:{'get':'categoryedit','eid':id},
			success:function(data){
				data = $.parseJSON(data);
				var html='';
				if(data.installation!='')
				{
					$('#CategoryId').val(data.CategoryId);
					$('#catname').val(data.CategoryName);
					$('#sort').val(data.Sort);
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
		if(confirm('Do you really want to delete this Order ?'))
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

function update(id)
{
	id = $.trim(id);
	if(id!='')
	{
		if(confirm('Do you really want to update order status to Delivered ?'))
		{
			$.ajax({
				url:"",
				method : "POST",
				data:{'Update':'installation','iid':id},
				success:function(data){
					window.location.reload();
				}
			});
		}
	}
}

function sendsmstocus(id){
	$("#sms").val(id); 
	  $('#SendRequirementtoall').modal('show');
}
$(function(){

          $('#SendsmsallClick').click(function(){
             
          var usersms = $.trim($('#SendRequirementtoall').find('#usersms').val());
		  var id = $.trim($('#SendRequirementtoall').find('#sms').val());
		  //alert(id); 
          var invalid = ''; 
          
          
          if(usersms == '')
          {
            invalid = 1;
            $('#SendRequirementtoall').find('#usersms').css('border','1px solid red');
          }
          else
            $('#SendRequirementtoall').find('#usersms').css('border','');
          
          if(invalid == '')
          {
            $('#SendRequirementtoall').find('#SendsmstoallClick').prop('disabled',true);
            $.ajax({
              type: 'POST',  
              url: "",
              data: {'smstoalluser':'true','sms':usersms,'id':id},
              beforesend: function() {}, 
              complete: function() {}, 
              success: function(data) {
                 
                  alert('SMS Sent Successfully');
                  $('#SendRequirementtoall').modal('hide');
                  //window.location.reload();
                
                //$('#SendsmstoallClick').prop('disabled',false);
                
              }
            });
          }
      });


        });


function vaidate_from()
{
	var invalid				= '';
	var catname 			= $.trim($('#catname').val());
	var sort 				= $.trim($('#sort').val());
	var cimage 				= $.trim($('#cimage').val());
	var Status				= $.trim($('#Status').val());
	
	
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
		$('#CategoryAddForm').removeAttr('onsubmit');
		$('#CategoryAddForm').attr('action','');
		$('#CategoryAddForm').trigger('submit');
	}
}

function printinvoice()
{
	var orderids = [];
	$('input[name=chk]:checked').each(function(){
		var v = $(this).val();
		orderids.push(v);
	});

	if(orderids.length>0) 
	{
		var form = "<form action='invoicegenerate' method='post' id='invoicegen' target='_blank'><input type='hidden' name='multi[]' value='"+orderids+"'/></form>";
		$('#invoicediv').html(form);
		$('#invoicegen').trigger('submit');
	}
	else
	{
		alert("Please select any one order");
	}
}
</script>