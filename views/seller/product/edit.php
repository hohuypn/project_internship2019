<div class="registration-form">
    <div class="row">
     <div class="xem_anh" style="float: left;">
<a href="index.php?controller=product&action=index&page=seller"> <button type="button" class="btn btn-primary">Quay lại danh sách sản phẩm</button></a> 
</div>
  </div>
     <?php foreach ($select_product as $dong) {
         ?>
            <form method="post" action="index.php?controller=product&action=update&page=seller&id=<?php echo $dong['id'] ?>" enctype="multipart/form-data">

                <h3 class="text-center">Chỉnh Sửa Thông Tin Sản Phẩm</h3>
               
                <div class="form-group">
                <div class="row">
                    <div class="col-2"> <center>Tên sản phẩm</center> </div>
                    <div class="col-10"><center><input class="form-control item" type="text" name="prod_name" value="<?php echo $dong['prod_name'] ?>" required></div>
                </div>
                </div>
                <div class="form-group">
                <div class="row">
                    <div class="col-2"> <center>Giá sản phẩm</center> </div>
                    <div class="col-10"><center><input class="form-control item" type="number"  name="price" value="<?php echo $dong['price'] ?>" required pattern=[0-9]{1-15} ></div>
                </div>
                </div>
                <div class="form-group">
                <div class="row">
                    <div class="col-2"> <center>Chất liệu</center> </div>
                    <div class="col-10"><center><input class="form-control item" type="text" name="product_type" value="<?php echo $dong['product_type'] ?>" required></center></div>
                </div>
                </div>
                <div class="form-group">
                <div class="row">
                    <div class="col-2"> <center>Ngày đăng bài</center> </div>
                    <div class="col-10"><center><input class="form-control item" type="text" name="date_add" value="<?php echo $dong['date_add'] ?>" required ></center></center></div>
                </div>
                </div>
                <div class="form-group">
                <div class="row">
                    <div class="col-2"> <center>Miêu tả</center> </div>
                    <div class="col-10"> <center><input class="form-control item" type="text" name="description" value="<?php echo $dong['description'] ?>" required  ></center></div>
                </div>
                </div>
                
                 <div class="form-group">
                <div class="row">
                    <div class="col-2"><center>Mã Loại hàng</center> </div>
                    <div class="col-10"> <select name="cate_id" required>
                    <?php foreach ($select_cate as $key ) {
                        # code...
                    ?>
                             <option value="<?php echo $key['id'] ;?>" "><?php echo $key['cate_name'] ;?></option>
                     <?php }?>
                    </select>
                </div>
                </div>
                </div>
                <div class="form-group">
                <div class="row">
                    <div class="col-2"><center>Mã sản phẩm</center> </div>
                    <div class="col-10"><center><input class="form-control item" type="text" name="sku" value="<?php echo $dong['sku'] ?>" required ></center></div>
                </div>
                </div>
                <div class="form-group">
                <div class="row">
                    <div class="col-2"><center>Tình trạng</center> </div>
                    <div class="col-10"><center><input class="form-control item" type="text" name="status" value="<?php echo $dong['status'] ?>" required ></center></div>
                </div>
                </div>
                <div class="form-group">
                <div class="row">
                    <div class="col-2"> <center>Tổng số lượng</center> </div>
                    <div class="col-10"> <center><input class="form-control item" type="number" name="quantity" value="<?php echo $dong['quantity'] ?>"  required  ></center></div>
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
                    <center><button class="btn btn-primary btn-block create-account" type="submit" name="suasp" value="<?php echo $dong['id'] ?>">Submit</button></center>
                </div>
            </form>
             <?php } ?>
        </div>
