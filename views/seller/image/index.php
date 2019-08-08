<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Danh Sách Hình Ảnh Sản Phẩm Đã Post Lên</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active"><a href="#">Danh Sách Sản Phẩm Đã Post Lên</a></li>
  </ul>
</div>
<div class="row">
     <div class="xem_anh" style="float: left;">
<a href="index.php?controller=product&action=index&page=seller"> <button type="button" class="btn btn-primary">Quay lại danh sách sản phẩm</button></a> 
</div>
  </div>
</div>
<div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
               <!-- <th>ID</th> -->
               <th>Sản phẩm</th>
               <th>Ảnh</th>
               <th colspan="1">Quản lý</th>
           </tr>
       </thead>
       <tbody>
        <?php foreach ($select_image as $dong) {
        
         ?>
          <tr>
           <!-- <td><?php echo $dong['id'] ?></td> -->
            <td><?php echo $dong['prod_name'] ?></td>
            <td><img src="<?php echo $dong['image'] ?>" width="150" height="150" /></td>
            <td style="text-align: center;">
              <a onclick="return confirm('Bạn có chắc chẵn muốn xóa không?')" href="index.php?controller=image&action=delete&page=seller&id=<?php echo $dong['id'] ?>" title="Xóa thông tin sản phẩm" class="btn btn-danger">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
              </a> | 
            </td>
        </tr>
      <?php } ?>
    </tbody>
</table>
</div>
</div>
</div>
