 <style>
.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
if($Invoice)
{
    ?> 
    
   
<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Order # <?php echo $Invoice['OrderId']; ?></h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Gangadhar Jewellery:</strong><br><br>
    					<p>Address : </p> 
    					<p>Tilak Road, Ramkote, Hyderabad</p>
    					<p>Hyderabad. RR Dist.</p>
    					<p>Gmail : gangadhar@gmail.com </p> 
    				</address>
    			</div>
    			<div class="col-xs-6 text-right"> 
    				<address>
        			<strong>Shipping Address:</strong><br><br>
    				<p>Name: <?php echo $Invoice['Username']; ?></p> 
                     <p>Address: <?php echo $Invoice['UserAddress']; ?></p>  
                     <p>Land Mark: <?php echo $Invoice['Landmark']; ?></p>
                     <p>City: <?php echo $Invoice['City']; ?></p>
                     <p>State: <?php echo $Invoice['State']; ?></p>
                    
                     <p></p>
    				</address> 
    			</div>
    			<hr>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					<?php echo $Invoice['TypeOfPay']; ?><br>
    				</address> 
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					<?php echo $Invoice['Date']; ?><br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed"> 
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead> 
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<?php
    							$total = 0;
    							foreach($Invoice_oid as $invs)
    							{
    							     $total+= $invs['ProductPrice']*$invs['Qty'];
    							    ?>
    							    <tr>
    								<td><?php echo $invs['ProductName']; ?> (<?php echo $invs['Qty']; ?>)</td>
    								<td class="text-center"><?php echo $invs['ProductPrice']; ?></td> 
    								<td class="text-center"><?php echo $invs['Qty']; ?></td>  
    								<td class="text-right"><?php $tot = $invs['ProductPrice']*$invs['Qty']; echo $tot; ?></td>
    								
    							    </tr> 
    							    <?php
    							}
    							?> 
    						 <tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total Price</strong></td>
    								<td class="no-line text-right"><?php echo $total; ?></td>
    							</tr>
    							 
    						</tbody>
    					</table>
    				</div> 
    			</div>
    		</div>
    	</div>
    </div>
</div>
 <?php
}
?>
