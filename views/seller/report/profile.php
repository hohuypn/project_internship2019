<?php foreach ($select_user as $dong) {
  # code...
  ?>  
  <div class="container-pluid bootstrap snippet">
    <h2 style="text-align: center;">TÀI KHOẢN SELLER</h2>
    <hr style="width: 70%;"> 
    <div class="row">
      <div class="col-sm-12 col-md-5">
        <br>
        <div>
          <ul class="nav nav-tabs">
            <li class="active visited-edit" style="padding: 15px;">         
              <a data-toggle="tab" href="#edit_seller"><i class="fa fa-pencil-square-o" style="color: red;"></i> Sửa hồ sơ</a>
            </li>
            <li class="visited-switch-pass" style="padding: 15px;">       
              <a data-toggle="tab" href="#setting_seller"><i class="fa fa-refresh" style="color: red;"></i> Đổi mật khẩu</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-sm-12 col-md-7 borders">
        <div class="tab-content">
          <div class="tab-pane active" id="home">

            <form class="form" action="#" method="POST">                
              <br>
              <h5 style="text-align: center;" class="ticket-title">Thông Selller</h5>
              <br>
              <div class="form-row">
                <div class="form-group col-sm-12">
                  <label>Hinh Ảnh</label>
                  <img src="public/asset/seller/images/<?php echo $dong['image'] ?>" width="180"  height="180" style="border-radius: 50%;">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-sm-6">
                  <label>Họ</label>
                  <input type="text" class="form-control" name="last_name" value="<?php echo $dong['last_name'] ?>" required>
                </div>
                <div class="form-group col-sm-6">
                  <label>Tên</label>
                  <input type="text" class="form-control" name="first_name" value="<?php echo $dong['first_name'] ?>" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-sm-12">
                  <label>Số điện thoại</label>
                  <input type="number" class="form-control" name="phone_number" value="<?php echo $dong['phone'] ?>" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-sm-12">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" value="<?php echo $dong['email'] ?>" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-sm-12">
                  <label>Địa chỉ</label>
                  <input type="text" class="form-control" name="address" value="<?php echo $dong['address'] ?>">
                </div>
              </div>
            </form>
            <hr>
          </div>
          <div class="tab-pane" id="edit_seller">
            <form class="form" action="index.php?controller=user&action=update_seller&page=seller&id=<?php echo $dong['id'] ?>" 
              method="POST" enctype="multipart/form-data">      
              <br>
              <h5 style="text-align: center;" class="ticket-title">Chỉnh Sửa Thông Selller</h5>
              <br>
              <div class="form-row">
               <div class="form-group col-sm-3">
                <label>Ảnh cũ</label>
                <img src="public/asset/seller/images/<?php echo $dong['image'] ?>" width="180"  height="180" style="border-radius: 50%;">
              </div>
              <div class="form-group col-sm-9">
               <div class="text-center">
                <div class="avatar-upload">
                  <div class="avatar-edit">
                    <input type='file' name="images" id="image" accept=".png, .jpg, .jpeg" />
                    <label for="image"></label>
                  </div>
                  <div class="avatar-preview">
                    <div id="imagePreview"
                    style="background-image: url(http://ssl.gstatic.com/accounts/ui/avatar_2x.png);">
                  </div>
                </div>
                <div class="">
                  <h4>SELLER</h4>
                </div>
              </div>  
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-sm-6">
            <label>Họ</label>
            <input type="text" class="form-control" name="last_name" value="<?php echo $dong['last_name'] ?>" required>
          </div>
          <div class="form-group col-sm-6">
            <label>Tên</label>
            <input type="text" class="form-control" name="first_name" value="<?php echo $dong['first_name'] ?>" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-sm-12">
            <label>Số điện thoại</label>
            <input type="number" class="form-control" name="phone" value="<?php echo $dong['phone'] ?>" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-sm-12">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $dong['email'] ?>" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-sm-12">
            <label>Địa chỉ</label>
            <input type="text" class="form-control" name="address" value="<?php echo $dong['address'] ?>">
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-12">
            <br>
            <div style="text-align: center;"><input style="font-weight: bold;" type="submit" name="suaseller" value="Cập nhật" class="btn save-submit"></div>
          </div>
        </div>
      </form>
      <hr>
    </div>
    <div class="tab-pane" id="setting_seller">
      <form class="form" action="index.php?controller=user&action=update_password&page=seller&id=<?php echo $dong['id'] ?>" method="POST">                
        <br>
        <h5 style="text-align: center;" class="ticket-title">Thông tin Seller</h5>
        <br>
        <div class="form-row">
          <div class="form-group col-sm-12">
            <label>Mã id</label>
            <input type="text" class="form-control" name="id" value="<?php echo $dong['id'] ?>" maxlength="15" minlength="8"  required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-sm-12">
            <label>Mật khẩu cũ</label>
            <input type="password" class="form-control" name="password_old" maxlength="15" minlength="8"  required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-sm-12">
            <label>Mật khẩu mới</label>
            <input type="password" class="form-control" name="password_new" maxlength="15" minlength="8"  required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-sm-12">
            <label>Xác nhận mật khẩu</label>
            <input type="password" class="form-control" name="password_confirm" maxlength="15" minlength="8" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <br>
            <div style="text-align: center;"><input style="font-weight: bold;" type="submit" name="suapass" value="Đổi" class="btn save-submit"></div>
          </div>
        </div>
      </form>
      <hr>
    </div>            
  </div>
</div>
</div>
</div>
<?php } ?>
