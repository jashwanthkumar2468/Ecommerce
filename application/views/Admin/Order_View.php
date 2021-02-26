
<div class="content-wrapper">
	<section class="content-header">
		<h1>Manage Category</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Manage Category</li>
		</ol>
	</section>
	<section class="content">
		<?php if($this->session->flashdata('success')){ ?>
			<div class="alert alert-success text-center"><a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">x</a><?php echo $this->session->flashdata('success'); ?></div>
		<?php } else if($this->session->flashdata('error')) { ?>
			<div class="alert alert-danger text-center"><a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">x</a><?php echo $this->session->flashdata('error'); ?></div>
		<?php } ?>
		<!--<div class="box box-default" style="border-top: none;">
			<div class="box-header with-border">
			
				<h3 class="box-title">Add New Category</h3>
				<button class="btn btn-primary pull-right" id="AddBtn"><i class="fa fa-plus"></i> Add</button>

			</div>
			
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
		</div>-->
		<div class="box box-default">
			<div class="box-header with-border">

				<div class="responsive_tabs_agileits"> 
				<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li>Order Details</li>
							<li>Payment Details</li>
							<li>Products</li>
							<!-- <li>History</li> --> 
						</ul>
					<div class="resp-tabs-container">
					<!--/tab_one--> 
					   <div class="tab1">
					   	<table id="InstallationsTable1" class="table table-bordered table-hover table-container">
							<thead>
								<!--<tr>
									<th>Order Id</th>
									<th>Customer</th>
									<th>Status</th>
									<th>Total</th>
									<th>Date Added</th> 
									<th>Date Modified</th>
									<th>Action</th>
								</tr>-->
							</thead>
							<tbody>
								


							</tbody>
						</table>
					   </div>
						<!--//tab_one-->
						
						<!--/tab_two-->
					   <div class="tab2">
					   	<table id="InstallationsTable2" class="table table-bordered table-hover table-container">
							<thead>
								<!--<tr>
									<th>Order Id</th>
									<th>Customer</th>
									<th>Status</th>
									<th>Total</th>
									<th>Date Added</th> 
									<th>Date Modified</th>
									<th>Action</th>
								</tr>-->
							</thead>
							<tbody>
								
							</tbody>
						</table>
					   </div>
						<!--//tab_two-->

						<!--tab_three-->
						<div class="tab3">
						<div class="row">
								<div class="col-md-12">
					   	<table id="InstallationsTable3" class="table table-bordered table-hover table-container">
							<thead>
								<tr>
									<th>Product Image</th>
									<th>Product</th>
									<th>Model</th>
									<th>Quantity</th>
									<th>Unit Price</th>
									<th>Total</th>
								</tr>
							</thead>
						<tbody>
								
							</tbody>
						</table>
					   </div>
					   <div class="col-md-8"></div>
								<div class="col-md-4">
										<table class="table">
							            <tbody>
							                <tr>
							                    <td class="text-left text-uppercase"><b>Bag SubTotal</b></td>
							                    <td class="text-right"><i class="fa fa-inr"></i> <span class="cartamount net_total"></span></td>
							                </tr>
							        
							            <input type="hidden" name="net_total_value" class="net_total_value">
							            <input type="hidden" name="grandtotal" class="grandtotal" id="grandtotal">
							            <input type="hidden" name="shipp_total" class="shipp_total">
							            
							        <input type="hidden" name="D_address" class="D_address" id="D_address">    
							        </tbody></table>
									</div>
					   </div>
					   </div>
					
					<!--	<div class="tab4">
				<button class="btn btn-primary pull-right" id="AddBtn">Add History</button>
			<div class="box-body" id="AddBdy" style="display:none">
				<form id="HistoryAddForm" onsubmit="return false;" method="post" enctype='multipart/form-data' style="margin-top: 56px;">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Order Status:</label>
								<select id="OrderStatus" name="OrderStatus" class="form-control">
									<option value="">Select Status</option>
									<option value="1">Pending</option>
									<option value="2">Canceled</option>
									<option value="3">Completed</option>
									<option value="0">Delivered</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Notify Customer</label>
								<select id="notifycustomer" name="notifycustomer" class="form-control">
									<option value="">Select Status</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
									
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Comment</label>
								<textarea class="form-control required" name="comment" id="comment" placeholder="comment"/></textarea>
							</div>
						</div>

						

							
					</div>
					<input type="hidden" id="OrderId" name="OrderId" value="<?php echo $OrderId; ?>" />
					<input type="hidden" id="HistoryId" name="HistoryId" />
					<input type="hidden" name="Add_Edit_History" value="true"/>
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
				






				<div class="box-body">
				<table id="InstallationsTable" class="table table-bordered table-hover table-container"  style="margin-top: 50px;">
					<thead>
						<tr>
							<th>Date Added</th>
							<th>Comment</th>
							<th>Status</th>
							<th>Customer Notified</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>


						</div> -->
						<!--//tab_four-->
						   
					</div>
				</div>	
			</div>




















				<!--<h3 class="box-title">Categories List</h3>
				<button class="pull-right btn-primary btn" id="search">Search</button>
				<input type="text" class="form-control pull-right" id="skey" style="width:40%">-->
			</div>
			<!--<div class="box-body">
				<table id="InstallationsTable" class="table table-bordered table-hover table-container">
					<thead>
						<tr>
							<th>Order Id</th>
							<th>Customer</th>
							<th>Status</th>
							<th>Total</th>
							<th>Date Added</th> 
							<th>Date Modified</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>-->
		</div>
		<ul id="pagination" class="pagination"></ul>
	</section>
</div>

<div class="modal fade" id="StatusChng" role="dialog">
	<div class="modal-dialog" style="width:320px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<!--<h3 class="modal-title text-center">Change Status</h3>-->
			</div>
			<div class="modal-body">
				<!--<form id="addnotesstat_form">
					<div class="form-group">
								<label>Gold Rate</label>
								<input type="text" class="form-control" name="tgrate" id="tgrate" placeholder="Enter Today Gold Rate"/>
							</div>

					<input type="hidden" name="GoldPriceId" id="GoldPriceId"/>

				</form>
				<div class="button-group text-center">
					<button class="btn btn-primary kc-sucess-btn" id="ChangStat">Submit</button>
				</div>-->
			</div>
		</div>
	</div>
</div>


<link href="<?php echo base_url(); ?>frontendassets/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<script src="<?php echo base_url(); ?>frontendassets/js/easy-responsive-tabs.js"></script>
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion           
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>

<script>
$(function(){
	cpage = 1;
	get_order_details();
	get_payment_details();
	
	get_order_product_details1(); 
	get_order_history(cpage); 
	
	$('#search').click(function(){
		get_order_details(1);
	});
	
	$('#SubmitBtn').click(function(){
		validate_from();
	});
	$('#CancelBtn').click(function(){
		$('#AddBdy').hide();
		$('#AddBtn').show();
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

	/*$('#upload_link').on('click',function(e){
		e.preventDefault();
		$('#cimage').trigger('click');
	});*/
});

/*function showPreview(objFileInput) {
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

}*/

function validate_from()
{
	var invalid = '';
	var HistoryId = $.trim($('#HistoryId').val());
	var OrderStatus = $.trim($('#OrderStatus').val());
	var notifycustomer = $.trim($('#notifycustomer').val());
	var comment = $.trim($('#comment').val());

	if(OrderStatus == '')
	{
		invalid = 1;
		$('#OrderStatus').css('border-color','red');
	}
	else
		$('#OrderStatus').css('border-color','');
	if(notifycustomer == '')
	{
		invalid = 1;
		$('#notifycustomer').css('border-color','red');
	}
	else
		$('#notifycustomer').css('border-color','');
	if(comment == '')
	{
		invalid = 1;
		$('#comment').css('border-color','red');
	}
	else
		$('#comment').css('border-color','');

	if(invalid == '')
	{
		$.ajax({
			url:"",
			type:"POST",
			data:{'Add_Edit_History':'true','HistoryId':HistoryId,'OrderStatus':OrderStatus,'notifycustomer':notifycustomer,'comment':comment},
			success:function(data)
			{
				var data = $.parseJSON(data);
				if(data.err == '0')
				{
					alert(''+data.msg);
					$('#AddBdy').hide();
					$('#AddBtn').show();
					get_order_history(1);

				}

				
			}
		});
	}
}

function get_order_history(page)
{
	$.ajax({
		url:"",
		method:"POST",
		data:{'get':'orderhistory','page':page},
		success:function(data)
		{
			var data = $.parseJSON(data);
			var html = '';
			if(data.orderhistory != '')
			{
				var n = 1;
				$.each(data.orderhistory, function(i){
					var row = data.orderhistory[i];
					var $n = n++;

					if(row.OrderStatus == '1')
						hstatus = "<span class='label label-warning'>Pending</span>";
					else if(row.OrderStatus == '2')
						hstatus = "<span class='label label-danger'>Canceled</span>";
					else if(row.OrderStatus == '3')
						hstatus = "<span class='label label-success'>Complted</span>";
					else if(row.OrderStatus == '0')
						hstatus = "<span class='label label-success'>Delivered</span>";

					html+= "<tr>";
					html+= "<td>"+row.Date+"</td>";
					html+= "<td>"+row.Comment+"</td>";
					html+= "<td>"+hstatus+"</td>";
					html+= "<td>"+row.NotifyCustomer+"</td>";
				});	
			}
			else
				html+= "<td></td><td></td><td>No History Found</td><td></td>";
			$('#InstallationsTable').find('tbody').html(html);
			$('#pagination').html(data.pagination);
			$('#pagination').find('li').click(function(){
				get_order_history($(this).attr('page'));
			});
		}
	});
}


function get_order_details()
{
	
	$.ajax({
		url:"",
		method : "POST",
		data:{'get':'orders_details'},
		success:function(data){
			data = $.parseJSON(data);
			var html='';
			if(data.orders!='')
			{
					
					if(data.osstatus == '1')
						status = "<span class='label label-warning'>Pending</span>";
					else
						status = "<span class='label label-success'>Delivered</span>";
					

					html+=" <tr><td>Order Id</td><td># "+data.OrderId+"</td></tr>";
					html+=" <tr><td>Invoice No</td><td>"+data.OrderId+"</td></tr>";
					html+=" <tr><td>Store Name</td><td>Gangadhar Jewellery</td></tr>";
					html+=" <tr><td>Store URL</td><td>"+base_url+"</td></tr>"; 
					html+=" <tr><td>Customer</td><td>"+data.Username+"</td></tr>";
					
					html+=" <tr><td>Telephone</td><td>"+data.Mobile+"</td></tr>";
					html+=" <tr><td>Total</td><td>"+data.TotalTransAmount+"</td></tr>";
					html+=" <tr><td>Order Status</td><td>"+status+"</td></tr>"; 
					
					html+=" <tr><td>Date Added</td><td>"+data.Date+"</td></tr>";  
					html+=" <tr><td>Modified Date</td><td>"+data.ModifiedDate+"</td></tr>";

			    
			}
			else
				html+="<td></td><td></td><td>No Results Found..</td><td></td><td></td>";
			$('#InstallationsTable1').find('tbody').html(html);
			
		}

	});
	
}

function get_payment_details()
{
	$.ajax({
		url:"",
		method : "POST",
		data:{'get':'orders_details'},
		success:function(data){
			data = $.parseJSON(data);
			var html='';
			if(data.orders!='')
			{
				html+=" <tr><td>Full Name</td><td>"+data.Username+"</td></tr>";
				html+=" <tr><td>Full Address</td><td>"+data.UserAddress+" "+data.City+" "+data.State+" "+data.AreaPincode+"</td></tr>";
				html+=" <tr><td>City</td><td>"+data.City+"</td></tr>";
				html+=" <tr><td>Post Code</td><td>"+data.AreaPincode+"</td></tr>";
				html+=" <tr><td>Region / State</td><td>"+data.State+"</td></tr>";
				html+=" <tr><td>Country</td><td>India</td></tr>";
				html+=" <tr><td>Payment Method</td><td>"+data.TypeOfPay+"</td></tr>";

			    
			}
			else
				html+="<td></td><td></td><td>No Results Found..</td><td></td><td></td>";
			$('#InstallationsTable2').find('tbody').html(html);
			
		}

	});
}

function get_order_product_details1()
{ 
	$.ajax({
		url:"",
		method : "POST", 
		data:{'get':'orders_details_products'},
		success:function(data){
			data = $.parseJSON(data);
			var html='';
			if(data.orders!='') 
			{
				$.each(data.orders,function(i){ 
					var v = data.orders[i];
					html+=" <tr>"; 
					html+=" <td><a href='javascript:void' onclick='viewimage("+v.Oid+")'><img src="+v.Image+" style='width:75px;height:75px'></button></td>"
					html+=" <td>"+v.ProductName+"</td>";
					
					html+=" <td>"+v.Model+"</td>"; 
					html+=" <td>"+v.Qty+"</td>"; 
					html+=" <td>"+v.ProductPrice+"</td>";     
					html+=" <td><b class='total'></b></td>";
					html+=" <td><input type='hidden' name='qty[]' class='qtys' value='"+v.Qty+"' ></td>";
					html+=" <input type='hidden' name='price[]' class='price' value="+v.ProductPrice+">";
					html+= '<input type="hidden" name="subtotal[]" class="subtotal" value='+v.ProductPrice+'>';
					html+=" <input type='hidden' name='net_total_value[]' class='net_total_value' >";
					
					html+=" <input type='hidden' name='shipp_total[]' class='shipp_total' >";
					html+=" </tr>";
				}); 
			}   
			else
				html+="<td></td><td></td><td>No Results Found..</td><td></td><td></td>";
			$('#InstallationsTable3').find('tbody').html(html);
			var net_total = 0;
		    var shippingp = 0;
	        $('.qtys').each(function(){
                        var row = $(this).parent().parent();
                            var price  = row.find('.price').val();
                            //var ships = row.find('.ship').val();
                            var total = price * $(this).val()-0;
                            //var sp = 1 * ships;       
                            row.find('.subtotal').val(total); 
                            row.find('.total').html(total);
                            //row.find('.ships').val(ships);
                            });

            $('.subtotal').each(function(){
            net_total += ($(this).val()-0); 

            });

            $('.net_total').html("<strong>Rs." +net_total+"</strong>");
           // $('.shippingcharges_class').html(50);
            $('.net_total_value').val(net_total);
           // $('.shipp_total').val(50);

           // var shp_tot = $.trim($('.shipp_total').val());
            var net_total_value = $.trim($('.net_total_value').val());
            var tota_net_value = (0.18*parseFloat(net_total))+parseFloat(net_total);

            $('.net_totals').html(tota_net_value);
            //$('.grandtotal').val(tota_net_value);
            
            $("body").delegate(".qty","keyup",function(event){
                        event.preventDefault();
                        var row = $(this).parent().parent();
                        var price = row.find('.price').val();
                        //var ships = row.find('.ship').val();
                        var qty = row.find('.qty').val();
                        if (isNaN(qty)) {
                            qty = 1;
                        };
                        if (qty < 1) {
                            qty = 1;
                        };
                        var total = price * qty;
                        row.find('.subtotal').val(total);
                        row.find('.total').html(total);
                        //row.find('.ships').val(ships);
                        var net_total=0;
                        var shippingp =0;
                        $('.subtotal').each(function(){
                            net_total += ($(this).val()-0);
                        });

                        $('.ships').each(function(){
                            shippingp += ($(this).val()-0);
                        });
                        
                        $('.net_total').html("<strong>Rs." +net_total+"</strong>");
                        $('.shippingcharges_class').html(50);
                        $('.net_total_value').val(net_total);
                        $('.shipp_total').val(50);

                        var shp_tot = $.trim($('.shipp_total').val());
                        var net_total_value = $.trim($('.net_total_value').val());
                        var tota_net_value = parseFloat(shp_tot)+parseFloat(net_total_value);

                        $('.net_totals').html(tota_net_value);
                        $('.grandtotal').val(tota_net_value);

                    });
		}

	});
} 

function viewimage(id)
{
	id = $.trim(id);
	if(id!='')
	{
		$.ajax({
			url:"",
			type:"POST",
			data:{'get':'imageview','id':id},
			success:function(data)
			{
				var data = $.parseJSON(data);
				if(data.image!='')
				{
					$('.modal-body').html("<img src="+data.Image+" style='height: 300px;width: 300px;'>");
				}
			}
		});
		$('#StatusChng').modal('show');
	}
	
}




</script>

<style type="text/css">
	.resp-tabs-list li {
    display: inline-block;
    padding: 4px 20px;
    margin: 0;
    list-style: none;
    cursor: pointer;
    float: left;
    color: #2A2B2F;
    width: 25%;
    text-align: center;
    font-size: 15px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    width: 200px;
}
.resp-tab-active {
    background-color: #ebdebc;
}
.resp-tab-active {
    border-bottom: 4px solid #ebdebc;
    margin-bottom: -1px !important;
    position: relative;
    background: #ebdebc;
}

.resp-tab-active:before {
    content: '';
    position: absolute;
    width: 0;
    height: 0;
    border-top: 10px solid #ebdebc;
    border-left: 10px solid rgba(69, 42, 21, 0);
    border-right: 10px solid rgba(199, 57, 57, 0);
    left: 45%;
    top: 103%;
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -o-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -ms-transition: 0.5s all;
}
</style>