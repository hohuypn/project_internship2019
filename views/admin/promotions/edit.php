<div class="">
	<div class="row">
		<div class="col-xs-12">
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<div class="page-header clearfix">
						<center><h2>THÔNG TIN SỬA KHUYẾN MÃI</h2></center>
					</div>
					<form action="index.php?controller=promotion&action=update&page=admin" method="POST">
						<table class="table table-bordered table-hover">
							<?php foreach ($promotionselect as $value): ?>
								<thead>
									<tr>
										<th>Mã khuyến mãi</th>
										<td><input type="number" name="product_id" class="form-control" value="<?php echo $value['id'] ?>" required></td>
									</tr>
									<tr>
										<th>Giá cũ</th>
										<td><input type="number" name="price_old" class="form-control" min="10000" value="<?php echo $value['price_old'] ?>" placeholder="Nhập giá cũ" required></td>
									</tr>
									<tr>
										<th>Giá mới</th>
										<td><input type="number" name="price_new" class="form-control" min="10000" placeholder="Nhập giá mới" required></td>
									</tr>
									<tr>
										<th>Ngày kết thúc</th>
										<td><input type="date" name="date_end" class="form-control" required></td>
									</tr>
								</thead>
							</table>
							<div class="Save"><input type="submit" name="updatePromotion" value="Save" class="btn save-submit"></div>
						<?php endforeach ?>
						<input type="hidden" name="id" value="<?php echo $value['id'] ?>">
					</form>                          
				</table>
			</div>
		</div>
	</div>
</div>