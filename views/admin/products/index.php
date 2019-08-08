<div class="">
	<div class="row">
		<div class="col-xs-12">
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<div class="page-header clearfix">
						<center><h2>DANH SÁCH SẢN PHẨM</h2></center>
					</div>
					<thead>
						<tr>
							<th>ID</th>
							<th>Tên sản phẩm</th>
							<th>Giá sản phẩm</th>
							<th>Số lượng sản phẩm</th>
							<th>Kiểu sản phẩm</th>
							<th>Loại sản phẩm</th>
							<th>Mô tả sản phẩm</th>
							<th style="width: 10%;">Khuyến mãi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($product as $value): ?>
							<tr>
								<td><?php echo $value['id']; ?></td>
								<td><?php echo $value['prod_name']; ?></td>
								<td><?php echo number_format($value['price']);?> đồng</td>                               
								<td><?php echo $value['quantity']; ?></td>
								<td><?php echo $value['product_type']; ?></td>
								<td><?php echo $value['cate_name']; ?></td>
								<td><?php echo $value['description']; ?></td>
								<td>
									<a href="index.php?controller=promotion&action=index&page=admin&id=<?php echo $value['id'] ?>" title="Thêm khuyến mãi cho sản phẩm" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true">
									</a>
									<a href="index.php?controller=promotion&action=viewpromotion&page=admin&id=<?php echo $value['id'] ?>" title="Xem thông tin khuyến mãi" class="btn btn-default"><span class="fa fa-eye" aria-hidden="true">
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