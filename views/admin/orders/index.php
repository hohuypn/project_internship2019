<div class="">
	<div class="row">
		<div class="col-xs-12">
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<div class="page-header clearfix">
						<center><h2>DANH SÁCH ĐƠN ĐẶT HÀNG</h2></center>
					</div>
					<div class="row">
						<label>ID</label>
					</div>
					<thead>
						<tr>
							<th style="text-align: center;">ID</th>
							<th style="text-align: center;">Tên người đặt</th>
								<th style="text-align: center;">Tên người mua</th>
								<th style="text-align: center;">Giới tính</th>
								<th style="text-align: center;">Số điện thoại</th>
								<th style="text-align: center;">Ngày giao hàng</th>
								<th style="text-align: center;">Tổng giá</th>
								<th style="text-align: center;">Kiểu trả tiền</th>
								<th style="text-align: center;">Địa chỉ giao hàng</th>
								<th style="text-align: center;">Ghi chú</th>
								<th style="width: 15%;">Chức năng khác</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($order as $value): ?>

								<tr>
									<td ><?php echo $value['id']; ?></td>
									<td><?php echo $value['username']; ?></td>
									<td><?php echo $value['last_name']; ?> <?php echo $value['first_name']; ?></td>
									<td><?php echo $value['gender']; ?></td>
									<td><?php echo $value['phone']; ?></td>
									<td><?php echo $value['date_order']; ?></td>
									<td><?php echo number_format($value['total']); ?> VNĐ</td>
									<td><?php echo $value['payment']; ?></td>
									<td><?php echo $value['deliveryAddress']; ?></td>
									<td><?php echo $value['note']; ?></td>
									<td>
										<a class="btn btn-default" onclick="show_order_product(<?=$value['id']?>)" data-toggle="modal" data-target="#show_order_product"><span class="fa fa-eye" aria-hidden="true"></span></a>
										<a href="index.php?controller=order&action=delete&page=admin&id=<?php echo $value['id'] ?>" title="Xóa đơn hàng" class="btn btn-danger">
											<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
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
	<!-- Modal -->
<div id="show_order_product" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>