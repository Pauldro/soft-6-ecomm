<?php $config->styles->append($config->urls->templates.'styles/test.css'); ?>
<?php include('./_head.php'); ?>

<div class="container page">
	<div class="row category-page">
		<div class="col-md-12">
			<h1><a href="<?php echo $page->parent->url; ?>">Products</a> > <?= $page->title; ?></h1>
		</div>
	</div>
	
	<h2>Orders</h2>
	<div class="list-group">
		<div href="#" class="list-group-item hidden-xs">
			<div class="row heading-row">
				<div class="col-sm-1">Details</div>
				<div class="col-sm-2">Date</div>
				<div class="col-sm-3">Order Number</div>
				<div class="col-sm-2">Customer PO</div>
				<div class="col-sm-1">Total</div>
				<div class="col-sm-1">Status</div>
				<div class="col-sm-1">Tracking</div>
			</div>
		</div>
		<div href="#" class="list-group-item">
			<div class="row">
				<div class="col-xs-6 col-sm-push-1 col-sm-2 form-group">
					<div class="visible-xs-block title-label">Date</div>
					09/25/2017
				</div>
				<div class="col-xs-6 col-sm-3 form-group">
					<div class="visible-xs-block title-label">Order Number</div>
					<span class="pull-right">123456789</span>
				</div>
				<div class="col-xs-6 col-sm-2 form-group">
					<div class="visible-xs-block title-label">Customer PO</div>
					4dsaffdsa5
				</div>
				<div class="col-xs-6 col-sm-2 text-right form-group">
					<div class="visible-xs-block title-label">Order Total</div>
					129.99
				</div>
				<div class="col-xs-6 col-sm-1 form-group">
					<div class="visible-xs-block title-label">Order Status</div>
					Shipped
				</div>
				<div class="col-xs-6 col-sm-1 form-group">
					<div class="visible-xs-block title-label">Tracking</div>
					<a href="#"><i class="fa fa-truck" aria-hidden="true"></i></a>
				</div>
				<div class="col-xs-12 col-sm-1 col-sm-pull-11">
					<a href="#" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
		<div class="list-group-item panel-group-item">
			<div class="panel panel-primary order-panel">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-6 col-sm-push-1 col-sm-2 form-group">
							<div class="visible-xs-block title-label">Date</div>
							09/25/2017
						</div>
						<div class="col-xs-6 col-sm-3 form-group">
							<div class="visible-xs-block title-label">Order Number</div>
							<span class="pull-right">123456789</span>
						</div>
						<div class="col-xs-6 col-sm-2 form-group">
							<div class="visible-xs-block title-label">Customer PO</div>
							4dsaffdsa5
						</div>
						<div class="col-xs-6 col-sm-2 form-group text-right">
							<div class="visible-xs-block title-label">Order Total</div>
							129.99
						</div>
						<div class="col-xs-6 col-sm-1 form-group">
							<div class="visible-xs-block title-label">Order Status</div>
							Shipped
						</div>
						<div class="col-xs-6 col-sm-1 form-group">
							<div class="visible-xs-block title-label">Tracking</div>
							<a href="#"><i class="fa fa-truck" aria-hidden="true"></i></a>
						</div>
						<div class="col-xs-12 col-sm-1 col-sm-pull-11">
							<a href="#" class="btn btn-default"><i class="fa fa-minus" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row hidden-xs">
						<div class="col-sm-1"></div>
						<div class="col-sm-3">ItemID / Description</div>
						<div class="col-sm-2">Price</div>
						<div class="col-sm-1">Qty</div>
						<div class="col-sm-1">Shipped</div>
						<div class="col-sm-2">Item Total</div>
						<div class="col-sm-1">Re-order</div>
					</div>
					<hr class="hidden-xs">
					<div class="row">
						<div class="col-sm-1"> </div>
						<div class="col-sm-6 col-sm-3 form-group">
							<div class="visible-xs-block title-label">ItemID / Description</div>
							C71585 <br>
							Spectrum - Medium Violet Red
						</div>
						<div class="col-xs-3 col-sm-2 form-group text-right">
							<div class="visible-xs-block title-label">Price</div>
							$24.99
						</div>
						<div class="col-xs-3 col-sm-1 form-group text-right">
							<div class="visible-xs-block title-label">Qty</div>
							1
						</div>
						<div class="col-xs-3 col-sm-1 form-group text-right">
							<div class="visible-xs-block title-label">Shipped</div>
							0
						</div>
						<div class="col-xs-3 col-sm-2 form-group text-right">
							<div class="visible-xs-block title-label">Total</div>
							$24.99
						</div>
						<div class="col-xs-6 col-sm-1">
							<div class="visible-xs-block title-label">Re-order</div>
							<button class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div href="#" class="list-group-item">
			<div class="row">
				<div class="col-xs-6 col-sm-push-1 col-sm-2 form-group">
					<div class="visible-xs-block title-label">Date</div>
					09/25/2017
				</div>
				<div class="col-xs-6 col-sm-3 form-group">
					<div class="visible-xs-block title-label">Order Number</div>
					<span class="pull-right">123456789</span>
				</div>
				<div class="col-xs-6 col-sm-2 form-group">
					<div class="visible-xs-block title-label">Customer PO</div>
					4dsaffdsa5
				</div>
				<div class="col-xs-6 col-sm-2 text-right form-group">
					<div class="visible-xs-block title-label">Order Total</div>
					129.99
				</div>
				<div class="col-xs-6 col-sm-2 form-group">
					<div class="visible-xs-block title-label">Order Status</div>
					Shipped
				</div>
				<div class="col-xs-12 col-sm-1 col-sm-pull-11">
					<a href="#" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>

	<h3>option 2</h3>
	<hr>
	<div class="panel panel-success">
	    <div class="panel-heading">
	        <h3 class="panel-title">Orders</h3>
	    </div>
		<div class="table-responsive">
			<table class="table table-striped table-condensed">
	            <thead>
	                <tr>
	                    <th>Details</th> <th>Date</th> <th>Order Number</th> <th colspan="2">Customer PO</th> <th>Order Total</th>  <th>Status</th>
	                </tr>
	            </thead>
	            <tbody>
	                <tr>
	                    <td><a href="#" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
	                    <td>09/25/2017</td>
	                    <td>123456789</td>
	                    <td colspan="2">Customer PO</td>
						<td class="text-right">129.99</td>
	                    <td>Shipped</td>
	                </tr>
	                <tr class="bg-primary">
	                    <td><a href="#" class="btn btn-default"><i class="fa fa-minus" aria-hidden="true"></i></a></td>
	                    <td>09/25/2017</td>
	                    <td>123456789</td>
	                    <td colspan="2">Customer PO</td>
						<td class="text-right">129.99</td>
	                    <td>Shipped</td>
	                </tr>
					<tr>
						<th></th> <th>ItemID / Description</th> <th>Price</th> <th>Qty</th> <th>Shipped</th> <th>Item Total</th> <th>Re-order</th>
					</tr>
					<tr>
						<td></td> <td>C71585 <br>Spectrum - Medium Violet Red</td> 
						<td class="text-right">$ 24.99</td> <td class="text-right">1</td> <td class="text-right">0</td> <td class="text-right">$ 24.99</td> 
						<td>
							<div class="col-sm-1"> <button class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i></button> </div>
						</td>
					</tr>
					<tr>
	                    <td><a href="#" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
	                    <td>09/25/2017</td>
	                    <td>123456789</td>
	                    <td colspan="2">Customer PO</td>
						<td class="text-right">129.99</td>
	                    <td>Shipped</td>
	                </tr>
	            </tbody>
	        </table>
		</div>
	</div>
	<h3>option 3</h3>
	<hr>
	<h2>Orders</h2>
	<div class="list-group">
		<div href="#" class="list-group-item">
			<div class="row">
				<div class="col-sm-2 form-group">
					<div class="heading-row">Order Date</div>
					09/25/2017
				</div>
				<div class="col-sm-1 form-group">
					<div class="heading-row">Order #</div>
					<span class="pull-right">123456789</span>
				</div>
				<div class="col-sm-2 form-group">
					<div class="heading-row">Customer PO</div>
					4dsaffdsa5
				</div>
				<div class="col-sm-2 text-right form-group">
					<div class="heading-row">Order Total</div>
					$ 129.99
				</div>
				<div class="col-sm-1 form-group">
					<div class="heading-row">Status</div>
					Shipped
				</div>
				<div class="col-sm-2 form-group">
					<div class="heading-row">Ship To</div>
					Ron Becker
				</div>
				<div class="col-sm-1 form-group">
					<div class="heading-row">Tracking</div>
					<a href="#"><i class="fa fa-truck" aria-hidden="true"></i></a>
				</div>
				<div class="col-sm-1 form-group">
					<div class="heading-row">View Details</div>
					<a href="#">View Details</a>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<h2>Order # 123456789 Details</h2>
	<div class="list-group">
		<div class="list-group-item">
			<div class="row">
				<div class="col-sm-6">
					<b>Shipping Address</b><br>
					Pedro Gomez <br>
					8628 Eagle Creek Circle <br>
					Savage, MN 55378 <br>
					United States 
				</div>
				<div class="col-sm-6">
					<table class="table table-condensed">
						<tr> <td><b>Order Summary</b></td> <td></td> </tr>
						<tr> <td>Item(s) Subtotal:</td> <td>$ 24.99</td> </tr>
						<tr> <td>Shipping &amp; Handling:</td> <td>$ 0.00</td> </tr>
						<tr> <td>Total before tax:</td> <td>$ 24.99</td> </tr>
						<tr> <td>Estimated tax to be collected:</td> <td>$ 0.76</td> </tr>
						<tr> <td>Total:</td> <td>$ 25.74</td> </tr>
					</table>
				</div>
			</div>
		</div>
		<div class="list-group-item">
			<div class="row hidden-xs">
				<div class="col-sm-1"></div>
				<div class="col-sm-3">ItemID / Description</div>
				<div class="col-sm-2">Price</div>
				<div class="col-sm-1">Qty</div>
				<div class="col-sm-1">Shipped</div>
				<div class="col-sm-2">Item Total</div>
				<div class="col-sm-1">Re-order</div>
			</div>
			<hr class="hidden-xs">
			<div class="row">
				<div class="col-sm-6 col-sm-3 form-group">
					<div class="visible-xs-block title-label">ItemID / Description</div>
					C71585 <br>
					Spectrum - Medium Violet Red
				</div>
				<div class="col-xs-3 col-sm-2 form-group text-right">
					<div class="visible-xs-block title-label">Price</div>
					$24.99
				</div>
				<div class="col-xs-3 col-sm-1 form-group text-right">
					<div class="visible-xs-block title-label">Qty</div>
					1
				</div>
				<div class="col-xs-3 col-sm-1 form-group text-right">
					<div class="visible-xs-block title-label">Shipped</div>
					0
				</div>
				<div class="col-xs-3 col-sm-2 form-group text-right">
					<div class="visible-xs-block title-label">Total</div>
					$24.99
				</div>
				<div class="col-xs-6 col-sm-1">
					<div class="visible-xs-block title-label">Re-order</div>
					<button class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
				</div>
			</div>
		</div>
	</div>
</div>


<?php include('./_foot.php'); // include footer markup ?>
