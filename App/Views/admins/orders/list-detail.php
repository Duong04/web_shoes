<section class="order_details section_gap py-2">
		<div class="container">
			<h2 class="mb-3 title_confirmation fs-1 my-2">Order Detail</h2>
			<div class="row order_d_inner px-5">
				<div class="col-lg-4">
					<div class="details_item">
						<h3>Order Info</h3>
						<ul class="nav d-flex flex-column">
                            <li><span>Order Status</span> : <?=$order['order_status']?></li>
							<li><span>Order Note</span> : <?=$order['order_note']?></li>
							<li><span>Subtotal</span> : $<?=round($order['total_amount'])?>.00</li>
							<li><span>Order Date</span> : <?=$order['order_date']?></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h3>Payment</h3>
						<ul class="nav d-flex flex-column">
							<li><span>Payment Method</span> : <?=$order['payment_method']?></li>
							<li><span>Payment Status</span> : <?=$order['payment_status']?></li>
							<li><span>Payment Date</span> : <?=$order['payment_date']?></li>
							<li><span>Total Mmount </span> : $<?=round($order['amount'])?>.00</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h3>Shipping Address</h3>
						<ul class="nav d-flex flex-column">
							<li><span>Shipping Adress</span> : <?=$order['shipping_address']?></li>
                            <li><span>Shipping Money</span> <?=$order['shipping_money'] > 0 ? '$'.$order['shipping_money'].'.00' : 'Free Ship'?></li>
							<li><span>Number Phone</span> : <?=$order['number_phone']?></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="order_details_table rounded-3 p-4">
				<h2>Order Details</h2>
				<div class="table-responsive rounded-3">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
                            <?php foreach ($orderDetails as $item) { ?>
							<tr>
								<td>
                                    <img width="100px" src="<?=$item['product_image']?>" alt="">
									<p><?=$item['product_name']?></p>
								</td>
								<td>
									<h5>x <?=$item['quantity']?></h5>
								</td>
								<td>
									<p>$<?=round($item['price'])?>.00</p>
								</td>
							</tr>
                            <?php } ?>
							<tr>
								<td>
									<h4>Subtotal</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>$<?=round($item['total_amount'])?>.00</p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Shipping</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>Flat rate: $<?=$item['shipping_money']?>.00</p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Total</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>$<?=round($item['total_amount'] + $item['shipping_money'])?>.00</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>