	<div role="tabpanel">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active">
				<a href="#home" aria-controls="home" role="tab" data-toggle="tab">Sửa thông tin người dùng</a>
			</li>
			<li role="presentation">
				<a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">Đổi mật khẩu</a>
			</li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="home">
				<form method="POST" action="index.php?controller=user&action=update&page=admin">
					<?php foreach ($useredit as $value): ?>
						<div>						
							<label>Họ</label>
							<input type="text" name="last_name" class="form-control" style="width: 50%" value="<?php echo $value['last_name'] ?>" required>					
						</div>
						<div>						
							<label>Tên</label>
							<input type="text" name="first_name" class="form-control" style="width: 50%" value="<?php echo $value['first_name'] ?>" required>					
						</div>
						<div>						
							<label>Ngày sinh</label>
							<input type="date" name="birthday" class="form-control" style="width: 50%" value="<?php echo $value['birthday'] ?>" required>					
						</div>
						<div>						
							<label>Giới tính</label>
							<input type="radio" name="gender" value="Nam" <?php if ($value['gender']=="Nam") { echo "checked";} ?> >Nam
							<input type="radio" name="gender" value="Nữ" <?php if ($value['gender']=="Nữ") { echo "checked";} ?> >Nữ				
						</div>
						<div>						
							<label>Email</label>
							<input type="email" name="email" class="form-control" style="width: 50%" value="<?php echo $value['email'] ?>" required>					
						</div>
						<div>						
							<label>Địa chỉ</label>
							<input type="text" name="address" class="form-control" style="width: 50%" value="<?php echo $value['address'] ?>" required>					
						</div>
						<div>						
							<label>Số điện thoại</label>
							<input type="number" name="phone" class="form-control" style="width: 50%" value="<?php echo $value['phone'] ?>" required>					
						</div>
						<div>						
							<label>Ảnh đại diện</label>
							<input type="file" name="image" class="form-control" style="width: 50%" required>
							<img src="<?php echo $value['image'] ?>" width="100" height="100">					
						</div>
						<div>						
							<label>Tên đăng nhập</label>
							<input type="text" name="username" class="form-control" style="width: 50%" value="<?php echo $value['username'] ?>" required>					
						</div>
						<div class="addCate">
							<input type="hidden" name="id"  value="<?php echo  $value['id'] ?>">
							<input type="submit" name = "editUser"class="btn btn-primary save-submit" value="Cập nhật">
						</div>
					<?php endforeach ?>
				</form>
			</div>
			<div role="tabpanel" class="tab-pane" id="tab">
				<form method="POST" action="index.php?controller=user&action=changePass&page=admin">
					<div>						
						<label>Mật khẩu cũ</label>
						<input type="password" name="oldPassword" class="form-control" style="width: 50%" value="" required>					
					</div>
					<div>						
						<label>Mật khẩu mới</label>
						<input type="password" name="newPassword" class="form-control" style="width: 50%" value="" required>					
					</div>
					<div>						
						<label>Xác nhận mật khẩu mới</label>
						<input type="password" name="confirmPassword" class="form-control" style="width: 50%" value="" required>					
					</div>
					<div class="addCate">
							<input type="hidden" name="id" value="<?php echo $value['id'] ?>"/>
							<input type="submit" name = "changePass"class="btn btn-primary save-submit" value="Cập nhật">
						</div>
				</form>
			</div>
		</div>
	</div>