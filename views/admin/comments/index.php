<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<div class="page-header clearfix">
			<center><h2>DANH SÁCH BÌNH LUẬN</h2></center>
		</div>
		<div class="row">
			<label>ID</label>
		</div>
		<thead>
			<tr>
				<th>id</th>
				<th>Tên người dùng</th>
				<th>Nội dung</th>
				<th>Thời gian</th>
				<th>Thao tác</th>
			</tr>
		</thead>
		<tbody>
			
			<?php foreach ($comment as $value): ?>
				<tr>
					<td><?php echo $value['id']; ?></td>
					<td><?php echo $value['username']; ?></td>
					<td><?php echo $value['message']; ?></td>
					<td><?php echo $value['date']; ?></td>
					<td>
						<a href="" title="Xóa đơn hàng" class="btn btn-danger">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>                            
	</table>
</div>
</div>