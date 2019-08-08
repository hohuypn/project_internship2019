<div class="app-title">
  <div>
    <h1><i class="fa fa-th-list"></i> Danh Sách Đơn Hàng</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb side">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">Tables</li>
    <li class="breadcrumb-item active"><a href="#">Danh Sách Hóa Đơn</a></li>
  </ul>
</div>
<div class="row">
  <div class="col-11"><div class="them_sp" style="float: left;">
    <a href="index.php?controller=product&action=index&page=seller"> <button type="button" class="btn btn-primary">Quay lại trang sản phẩm đã đăng</button></a> 
  </div></div>
  
  
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
           <th>ID</th>
           <th>user_id</th>
            <th>email</th>
           <th>first_name</th>
           <th>last_name</th>
           <th>Giới tính</th>
           <th>Số điện thoại</th>
           <th>Ngày Đặt Hàng</th>
           <th>Tổng Tiền</th>
           <th>Hình Thức Thành Toán</th>
           <th>Địa chỉ giao hàng</th>
           <th>Khi chú</th>
            <th>Ngày tạo hóa đơn</th>
           <th>Mã sản phẩm</th>
           <th>Số lượng sản phẩm</th>
           <th>Giá</th>
           <th>Ngày tạo hóa đơn</th>
           <th>Tình trạng</th>
           <th colspan="3">Quản lý</th>
         </tr>
       </thead>
       <tbody>
        <?php foreach ($select_order as $dong) {
          # code...
         ?>
         <tr>
          <td><?php echo $dong['id'] ?></td>
          <td><?php echo $dong['user_id'] ?></td>
          <td><?php echo $dong['email'] ?></td>
          <td><?php echo $dong['first_name'] ?></td>
          <td><?php echo $dong['last_name'] ?></td>
          <td><?php echo $dong['gender'] ?></td>
          <td><?php echo $dong['phone'] ?></td>
          <td><?php echo $dong['date_order'] ?></td>
          <td><?php echo $dong['total'] ?></td>
          <td><?php echo $dong['payment'] ?></td>
          <td><?php echo $dong['deliveryAddress'] ?></td>
          <td><?php echo $dong['note'] ?></td>
          <td><?php echo $dong['created_at'] ?></td>
          <td><?php echo $dong['product_id'] ?></td>
          <td><?php echo $dong['quantity'] ?></td>
          <td><?php echo $dong['price'] ?></td>
          <td><?php echo $dong['created_at'] ?></td>
           <td><?php echo $dong['status'] ?></td>
          <td style="text-align: center;">
            <a href="index.php?controller=order&action=change_status&page=seller&id=<?php echo $dong['id'] ?>" title="Sửa thông tin sản phẩm" class="btn btn-default">
             
              <i class="fa fa-check-square-o" aria-hidden="true"></i>
              </a> |
              <a href="index.php?controller=order&action=change_shiper&page=seller&id=<?php echo $dong['id'] ?>" title="đang ship hàng" class="btn btn-default">
               <i class="fa fa-truck" aria-hidden="true"></i>
              </a> |
              <a onclick="return confirm('Bạn có chắc chẵn muốn xóa không?')" href="index.php?controller=order&action=delete&page=seller&id=<?php echo $dong['id'] ?>" title="Xóa thông tin sản phẩm" class="btn btn-danger">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
              </a> 
              
            </td>
          </tr>
     <?php } ?>
      </tbody>                            
    </table>
  </div>
</div>
</div>