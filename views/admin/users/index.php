<div class="">
	<div class="row">
		<div class="col-xs-12">
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<div class="page-header clearfix">
						<center><h2>DANH SÁCH NGƯỜI DÙNG</h2></center>
						<a href="index.php?controller=user&action=getadd&page=admin" class="btn btn-success" title="Thêm mới người dùng"><span class="glyphicon glyphicon-plus"></span></a>
						</div>
						<thead>
							<tr>
								<th style="text-align: center;">ID</th>
								<th style="text-align: center;">Tên người dùng</th>
								<th style="text-align: center;">Ngày sinh</th>
								<th style="text-align: center;">Giới tính</th>
								<th style="text-align: center;">Email</th>
								<th style="text-align: center;">Địa chỉ</th>
								<th style="text-align: center;">Số điện thoại</th>
								<th style="text-align: center;">Hình ảnh</th>
								<th style="width: 15%; text-align: center;">Chức năng khác</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($user as $value): ?>
								<tr>
									<td style="text-align: center;"><?php echo $value['id']; ?></td>
									<td style="text-align: center;"><?php echo $value['last_name']; ?> <?php echo $value['first_name']; ?></td>
									<td style="text-align: center;"><?php echo $value['birthday']; ?></td>                               
									<td style="text-align: center;"><?php echo $value['gender']; ?></td>
									<td style="text-align: center;"><?php echo $value['email']; ?></td>
									<td style="text-align: center;"><?php echo $value['address']; ?></td>
									<td style="text-align: center;"><?php echo $value['phone']; ?></td>											
									<td style="text-align: center;"> <?php echo "<img  src='" . $value['image'] . "' heigh='100px' width='100px'>" ?></td>
									<td style="text-align: center;">
										<a href="index.php?controller=user&action=edit&page=admin&id=<?php echo $value['id'] ?>" title="Sửa thông tin người dùng" class="btn btn-default">
											<span class="glyphicon glyphicon-edit" aria-hidden="true">
											</a>
										</a>|
										<a href="index.php?controller=user&action=delete&page=admin&id=<?php echo $value['id'] ?>" title="Xóa người dùng" class="btn btn-danger">
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