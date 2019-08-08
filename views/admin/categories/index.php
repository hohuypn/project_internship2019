<div class="">
	<div class="row">
		<div class="col-xs-12">
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<div class="page-header clearfix">
						<center><h2>DANH SÁCH DANH MỤC SẢN PHẨM</h2></center>
						<a href="index.php?controller=category&action=add&page=admin" class="btn btn-success" title="Thêm mới danh mục sản phẩm"><span class="glyphicon glyphicon-plus"></span></a>
					</div>
					<thead>
						<tr>
							<th>ID</th>
							<th>Tên danh mục</th>
							<th>Trạng thái</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($category as $value): ?>
							<tr>
								<td><?php echo $value['id']; ?></td>
								<td><?php echo $value['cate_name']; ?></td>
								<td style="color: green;">Bật</td>
								<td>
									<a href="index.php?controller=category&action=edit&page=admin&id=<?php echo $value['id'] ?>" title="Sửa thông tin danh mục sản phẩm" class="btn btn-default">
										<span class="glyphicon glyphicon-edit" aria-hidden="true">
										</a>
									</a>|
									<a href="index.php?controller=category&action=delete&page=admin&id=<?php echo $value['id'] ?>" title="Xóa danh mục sản phẩm" class="btn btn-danger">
										<span class="glyphicon glyphicon-trash" aria-hidden="true">
										</a>
									</a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>                            
				</table>
			</table>
		</div>
	</div>
</div>
</div>