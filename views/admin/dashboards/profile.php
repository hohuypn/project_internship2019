<div class="container-pluid bootstrap snippet">
	<h2 style="text-align: center;">TÀI KHOẢN QUẢN TRỊ VIÊN</h2>
	<hr style="width: 70%;"> 
	<div class="row">
			<div class="col-sm-12 col-md-5">
				<form class="form" action="index.php?controller=dashboard&action=updateprofile&page=admin" method="POST" enctype="multipart/form-data">
					<div class="text-center">
						<div class="avatar-upload">
							<div class="avatar-edit">
								<input type='file' name="images" id="image" accept=".png, .jpg, .jpeg" />
								<label for="image"></label>
							</div>
							<div class="avatar-preview">                          
								<div id="imagePreview"
								style="background-image: url('public/asset/admin/images/<?php echo $value['image'] ?>');">
							</div>
						</div>
						<div class="">
							<h4><?php echo $value['last_name'] ?> <?php echo $value['first_name'] ?></h4>
						</div>
					</div>  
				</div>
				<br>
				<div>
					<ul class="nav nav-tabs">
						<li class="active visited-edit" style="padding: 15px;">					
							<a data-toggle="tab" href="#home" id="profile-tabs"><i class="fa fa-pencil-square-o" style="color: red;"></i> Sửa hồ sơ</a>
						</li>
						<li class="visited-switch-pass" style="padding: 15px;">				
							<a data-toggle="tab" href="#settings" id="profile-tabs"><i class="fa fa-refresh" style="color: red;"></i> Đổi mật khẩu</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-sm-12 col-md-7 borders">
				<div class="tab-content">
					<div class="tab-pane active" id="home">
						<form class="form" action="index.php?controller=dashboard&action=updateprofile&page=admin" method="POST">							
							<br>
							<h5 style="text-align: center;" class="ticket-title">Thông tin quản trị viên</h5>
							<br>
							<div class="form-row">
								<div class="form-group col-sm-6">
									<label>Họ</label>
									<input type="text" class="form-control" name="last_name" value="<?php echo $value['last_name'] ?>" required>
								</div>
								<div class="form-group col-sm-6">
									<label>Tên</label>
									<input type="text" class="form-control" name="first_name" value="<?php echo $value['first_name'] ?>" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-sm-12">
									<label>Số điện thoại</label>
									<input type="number" class="form-control" name="phone" value="<?php echo $value['phone'] ?>" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-sm-12">
									<label>Email</label>
									<input type="email" class="form-control" name="email" value="<?php echo $value['email'] ?>" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-sm-12">
									<label>Địa chỉ</label>
									<input type="text" class="form-control" name="address" value="<?php echo $value['address'] ?>">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<br>
									<input type="hidden" name="id" value="<?php echo $value['id'] ?>">
									<div style="text-align: center;"><input style="font-weight: bold;" type="submit" name="update" value="Cập nhật" class="btn save-submit"></div>
								</div>
							</div>
						</form>
					</form>
						<hr>
					</div>
					<div class="tab-pane" id="settings">
						<form class="form" action="index.php?controller=dashboard&action=changePassword&page=admin" method="POST">	
							<input type="hidden" name="_token" value="{{csrf_token()}}">							
							<br>
							<h5 style="text-align: center;" class="ticket-title">Thông tin đổi mật khẩu</h5>
							<br>
							<div class="form-row">
								<div class="form-group col-sm-12">
									<label>Mật khẩu cũ</label>
									<input type="password" class="form-control" name="password_old" placeholder="Nhập mật khẩu cũ" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-sm-12">
									<label>Mật khẩu mới</label>
									<input type="password" class="form-control" name="password_new" placeholder="Nhập mật khẩu mới"  required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-sm-12">
									<label>Xác nhận mật khẩu mới</label>
									<input type="password" class="form-control" name="password_confirm" placeholder="Nhập xác nhận mật khẩu mới"  required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<br>
									<input type="hidden" name="id" value="<?php echo $value['id'] ?>">
									<div style="text-align: center;"><input style="font-weight: bold;" type="submit" name="doimatkhau" value="Lưu thay đổi" class="btn save-submit"></div>
								</div>
							</div>
						</form>
						<hr>
					</div>						
				</div>
			</div>
	</div>
</div>