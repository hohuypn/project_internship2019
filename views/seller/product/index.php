<div class="app-title">
  <div>
    <h1><i class="fa fa-th-list"></i> Danh Sách Sản Phẩm Đã Post Lên</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb side">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">Tables</li>
    <li class="breadcrumb-item active"><a href="#">Danh Sách Sản Phẩm Đã Post Lên</a></li>
  </ul>
</div>
<div class="row">
  <div class="col-11"><div class="them_sp" style="float: left;">
    <a href="index.php?controller=product&action=add&page=seller"> <button type="button" class="btn btn-primary">Thêm sản phẩm</button></a> 
  </div></div>
  
  
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
           <th>ID</th>
           <th>Tên sản phẩm</th>
           <th>Giá</th>
           <th>Chất liệu</th>
           <th>Ngày Thêm</th>
           <th>Miêu tả</th>
           <th>Mã Loại</th>
           <th>Sku</th>
           <th>Tống số lượng</th>
           <th>Trạng thái</th>
           <th colspan="3">Quản lý</th>
         </tr>
       </thead>
       <tbody>
        <?php foreach ($select_product as $dong) {
         ?>
         <tr>
          <td><?php echo $dong['id'] ?></td>
          <td><?php echo $dong['prod_name'] ?></td>
          <td><?php echo $dong['price'] ?></td>
          <td><?php echo $dong['product_type'] ?></td>
          <td><?php echo $dong['date_add'] ?></td>
          <td><?php echo $dong['description'] ?></td>
          <td><?php echo $dong['cate_name'] ?></td>
          <td><?php echo $dong['sku'] ?></td>
          <td><?php echo $dong['quantity'] ?></td>
          <td><?php echo $dong['status'] ?></td>
          <td style="text-align: center;">
            <a  href="index.php?controller=image&action=index&page=seller&product_id=<?php echo $dong['id'] ?>" title="Xem ảnh của sản phẩm" class="btn btn-success">
                <i class="fa fa-picture-o" aria-hidden="true"></i>
              </a> |
            <a href="index.php?controller=product&action=edit&page=seller&id=<?php echo $dong['id'] ?>" title="Sửa thông tin sản phẩm" class="btn btn-default">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true">
              </a> |
              <a href="index.php?controller=product&action=change_status&page=seller&id=<?php echo $dong['id'] ?>" title="Thay đổi trạng thái sản phẩm" class="btn btn-default">
              <i class="fa fa-check-square-o" aria-hidden="true"></i>
              </a> |
              <a onclick="return confirm('Bạn có chắc chẵn muốn xóa không?')" href="index.php?controller=product&action=delete&page=seller&id=<?php echo $dong['id'] ?>" title="Xóa thông tin sản phẩm" class="btn btn-danger">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
              </a> 
              
            </td>
          </tr>
        <?php }?>
      </tbody>                            
    </table>
  </div>
</div>
</div>