<div class="">
	<div class="row">
		<div class="col-xs-12">
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<div class="page-header clearfix">
						<center><h2>THÔNG TIN KHUYẾN MÃI</h2></center>
					</div>
					<thead>
						<tr>
							<th>ID</th>
							<th>Tên sản phẩm</th>
							<th>Giá cũ</th>
							<th>Giá mới</th>
							<th>Ngày bắt đầu khuyến mãi</th>
							<th>Ngày kết thúc khuyến mãi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($view_promotion as $value): ?>
							<tr>
								<td><?php echo $value['id']; ?></td>
								<td><?php echo $value['prod_name']; ?></td>
								<td><?php echo $value['price_old']; ?></td>           
								<td><?php echo $value['price_new']; ?></td>
								<td><?php echo $value['date_start']; ?></td>
								<td><?php echo $value['date_end']; ?></td>
								<td>
									<a href="index.php?controller=promotion&action=edit&page=admin&id=<?php echo $value['id'] ?>" title="Sửa thông tin khuyến mãi sản phẩm" class="btn btn-default">
										<span class="glyphicon glyphicon-edit" aria-hidden="true">
										</a>
									</a>|
									<a href="index.php?controller=promotion&action=delete&page=admin&id=<?php echo $value['id'] ?>" title="Xóa khuyến mãi sản phẩm" class="btn btn-danger">
										<span class="glyphicon glyphicon-trash" aria-hidden="true">
										</a>
									</a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>                            
				</table>
			</div>
		</div>
	</div>
</div>