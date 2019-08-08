<div class="">
	<div id="content">
		<form action="index.php?controller=order&action=addCartToDatabase&page=customer" method="POST" class="beta-form-checkout">
			<div class="row">
				<div class="col-sm-6">
					<h4 id="dathang">Đặt hàng</h4>
					<div class="space20">&nbsp;</div>
					<div class="form-block">
						<label for="name">Họ*</label>
						<input type="text" name="last_name" placeholder="Nhập họ" value="<?php echo $infor['last_name'] ?>" required>
					</div>
					<div class="form-block">
						<label for="name">Tên*</label>
						<input type="text" name="first_name" placeholder="Nhập tên" value="<?php echo $infor['first_name'] ?>" required>
					</div>
					<div class="form-block">
						<label>Giới tính </label>
						<input  type="radio" class="input-radio" name="gender" value="Nam" checked="checked" style="width: 10%;"><span style="margin-right: 10%">Nam</span>
						<input  type="radio" class="input-radio" name="gender" value="Nữ" style="width: 10%"><span>Nữ</span>
					</div>
					<div class="form-block">
						<label for="adress">Địa chỉ*</label>
						<input type="text" name="address" placeholder="Nhập địa chỉ" value="<?php echo $infor['address'] ?>" required>
					</div>


					<div class="form-block">
						<label for="phone">Điện thoại*</label>
						<input type="text" name="phone" placeholder="Nhập số điện thoại" value="<?php echo $infor['phone'] ?>" required>
					</div>
					<div class="form-block">
						<label for="notes">Ghi chú</label>
						<textarea name="notes" placeholder="Nhập ghi chú"></textarea>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="your-order">
						<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
						<div class="your-order-body" style="padding: 0px 10px">
							<div class="your-order-item">
								<?php 
								$total = 0;
								foreach ($orders as $value): ?>
									<div>
										<!--  one item	 -->
										<div class="media">
											<img src="<?php echo $value['image'] ?>" width="100" class="pull-left">
											<div class="media-body">
												<p class="font-large"><?php echo $value['prod_name']; ?></p>
												<span class="color-gray your-order-info">Số lượng: <?php echo $value['quantity_order']; ?></span>
												<div class="your-order-item">
													<span class="color-gray your-order-info">Giá: </span>
													<div class="pull-right"><h5 class="color-black"><?php echo number_format($value['price']*$value['quantity_order']); $total += $value['price']*$value['quantity_order'] ?> VNĐ</h5></div>
													<div class="clearfix"></div>
												</div>
											</div>
										</div>
										<hr>
										<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								<?php endforeach ?>
							</div>
							<div class="your-order-item">
								<div class="pull-left"><p class="your-order-f18">Tổng tiền: <?php echo number_format($total); ?> VNĐ</p></div>
								<div class="pull-right"><h5 class="color-black"></h5></div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>

						<div class="your-order-body">
							<ul class="payment_methods methods">
								<li class="payment_method_bacs">
									<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
									<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
									<div class="payment_box payment_method_bacs" style="display: block;">
										Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
									</div>						
								</li>

								<li class="payment_method_cheque">
									<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
									<label for="payment_method_cheque">Chuyển khoản </label>
									<div class="payment_box payment_method_cheque" style="">
										Chuyển tiền đến tài khoản sau:
										<br>- Số tài khoản: 123 456 789
										<br>- Chủ TK: Nguyễn A
										<br>- Ngân hàng ACB, Chi nhánh TPHCM
									</div>						
								</li>

							</ul>
						</div>

						<div class="text-center"><button type="submit" class="beta-btn primary" name="addcarttodb" href="#">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
					</div> <!-- .your-order -->
				</div>
			</div>
		</form>
	</div> <!-- #content -->
	</div> <!-- .container -->