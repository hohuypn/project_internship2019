<div class="registration-form">
    <div class="row">
     <div class="xem_anh" style="float: left;">
<a href="index.php?controller=product&action=index&page=seller"> <button type="button" class="btn btn-primary">Quay lại danh sách sản phẩm</button></a> 
</div>
  </div>
            <form method="post" action="index.php?controller=product&action=create&page=seller" enctype="multipart/form-data">
                <h3 class="text-center">Thêm Thông tin sản phẩm</h3>
                <div class="form-group">
                <div class="row">
                    <div class="col-2"> <center>Tên sản phẩm</center> </div>
                    <div class="col-10"><center><input class="form-control item" type="text" name="prod_name"   placeholder="Tên sản phẩm" required></div>
                </div>
                </div>
                <div class="form-group">
                <div class="row">
                    <div class="col-2"> <center>Giá sản phẩm</center> </div>
                    <div class="col-10"><center><input class="form-control item" type="number" name="price"   placeholder="Giá" required pattern=[0-9]{1-15}></div>
                </div>
                </div>
                <div class="form-group">
                <div class="row">
                    <div class="col-2"> <center>Chất liệu</center> </div>
                    <div class="col-10"><center><input class="form-control item" type="text" name="product_type"  placeholder="Chất liệu" required></center></div>
                </div>
                </div>
                <div class="form-group">
                <div class="row">
                    <div class="col-2"> <center>Ngày Đăng</center> </div>
                    <div class="col-10"><center><input class="form-control item" type="date" name="date_add"  placeholder="Ngày đăng" required></center></center></div>
                </div>
                </div>
                <div class="form-group">
                <div class="row">
                    <div class="col-2"> <center>Miêu tả</center> </div>
                    <div class="col-10"> <center><input class="form-control item" type="text" name="description"  placeholder="Miêu tả" required></center></div>
                </div>
                </div>
                
                <div class="form-group">
                <div class="row">
                    <div class="col-2"><center>Mã Loại hàng</center> </div>
                    <div class="col-10">
                        <select name="cate_id" class="form-control" required>
                    <?php foreach ($select_cate as $dong ) {
                    ?>
                             <option value="<?php echo $dong['id'] ;?>" ><?php echo $dong['cate_name'] ;?></option>
                     <?php }?>
                    </select>
                </div>
                </div>
                </div>
            
                <div class="form-group">
                <div class="row">
                    <div class="col-2"><center>Mã sản phẩm</center> </div>
                    <div class="col-10"><center><input class="form-control item" type="text" name="sku"  placeholder="Mã sản phẩm" required></center></div>
                </div>
                </div>
                <div class="form-group">
                <div class="row">
                    <div class="col-2"><center>Tình trạng</center> </div>
                    <div class="col-10"><center><input class="form-control item" type="text" name="status"  placeholder="tình trạng" required></center></div>
                </div>
                </div>
                <div class="form-group">
                    <div class="row">
                     <div class="col-2"> <center>Hình sản phẩm</center> </div>
                     <div class="col-10">
                         <input name="hinhanh[]" type="file" multiple="multiple" />
                     </div>
                 </div>
             </div>
                  <div class="form-group">
                <div class="row">
                    <div class="col-2"> <center>Số lượng</center> </div>
                    <div class="col-10"><center><input class="form-control item" type="text" name="quantity"  placeholder="Tổng số lượng" required></center></center></div>
                </div>
                </div>
                    
                </div>
                <div class="form-group">
                <div class="row">
                    <div class="col-2"> <center>User id</center> </div>
                    <?php foreach ($select_user_id as $key) {
                    ?>
                    <div class="col-10"><center><input class="form-control item" type="text" name="user_id"  value="<?php echo $key['id'];?>" required></center>
                    <?php }?>
                </div>
                </div>
                </div>
                    
                </div>
                <div class="form-group">
                    <center><button class="btn btn-primary btn-block create-account" type="submit" name="themsp">Submit</button></center>
                </div>
            </form>
        </div>