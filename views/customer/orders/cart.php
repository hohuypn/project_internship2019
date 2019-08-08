<div class="container">
	<div id="content">	
		<form action="index.php" method="POST" enctype="multipart/form-data" role="form">
			<div class="table-responsive">
				<!-- Shop Products Table -->
				<table class="shop_table beta-shopping-cart-table" cellspacing="0">
					<thead>
						<tr>
							<th class="product-name">Sản phẩm</th>
							<th class="product-price">Đơn giá</th>
							<th class="product-quantity">Số lượng</th>
							<th class="product-subtotal">Số tiền</th>
							<th class="product-remove">Thao tác</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($orders as $value): ?>
							<tr class="cart_item">
								<td class="product-name">
									<div class="media">
										<img class="pull-left" src="<?php echo $value['image']; ?>" width ="100" height="100">
										<div class="media-body">
											<p class="font-large table-title"><?php echo $value['prod_name']; ?></p>
										</div>
									</div>
								</td>
								<td class="product-price">
									<span class="amount"><?php echo number_format($value['price']); ?> VNĐ</span>
								</td>
								<td class="product-quantity">
									<span class="amount"><?php echo $value['quantity_order']; ?></span>
								</td>
								<td class="product-subtotal">
									<span class="amount"><?php echo number_format($value['price']*$value['quantity_order']); ?> VNĐ</span>
								</td>

								<td class="product-remove">
									<a href="index.php?controller=order&action=delete&page=customer&id=<?php echo $value['id'] ?>" class="remove" title="Xóa sản phẩm khỏi giỏ hàng"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="6" class="actions">
								<a class="beta-btn primary" name="update_cart" href="index.php?controller=product&action=index&page=customer">Cập nhật giỏ hàng <i class="fa fa-chevron-right"></i></a>
								<a class="beta-btn primary" name="proceed" href="index.php?controller=order&action=checkout&page=customer">Tiến hành mua <i class="fa fa-chevron-right"></i></a>
							</td>
						</tr>
					</tfoot>
				</table>
				<!-- End of Shop Table Products -->
			</div>
		</form>
		<div class="clearfix"></div>

	</div> <!-- #content -->
</div> <!-- .container -->