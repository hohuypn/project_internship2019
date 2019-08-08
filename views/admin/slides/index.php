<div class="">
	<div class="row">
		<div class="col-xs-12">
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<div class="page-header clearfix">
						<center><h2>DANH SÁCH SLIDE SHOW</h2></center>
						<a href="index.php?controller=slide&action=add&page=admin" class="btn btn-success" title="Thêm mới danh mục sản phẩm"><span class="glyphicon glyphicon-plus"></span></a>
					</div>
					<thead>
						<tr>
							<th>ID</th>
							<th>Ảnh</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($slide as $value): ?>
							<tr>
								<td><?php echo $value['id']; ?></td>
								<td><img src="<?php echo $value['image'] ?>" width="100" height="100"/></td>
								<td>
									<a href="index.php?controller=slide&action=edit&page=admin&id=<?php echo $value['id'] ?>" title="Sửa slide" class="btn btn-default">
										<span class="glyphicon glyphicon-edit" aria-hidden="true">
										</a>
									</a>|
									<a href="index.php?controller=slide&action=delete&page=admin&id=<?php echo $value['id'] ?>" title="Xóa slide" class="btn btn-danger">
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