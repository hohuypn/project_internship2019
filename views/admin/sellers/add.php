<div role="tabpanel">
	<h3>Thêm thông tin người bán hàng</h3>
	<hr>

	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="home">

			<form method="POST" action="index.php?controller=seller&action=add&page=admin">
				<div>						
					<label>Họ</label>
					<input type="text" name="last_name" class="form-control" style="width: 50%" value="" required>					
				</div>
				<div>						
					<label>Tên</label>
					<input type="text" name="first_name" class="form-control" style="width: 50%" value="" required>					
				</div>
				<div>						
					<label>Ngày sinh</label>
					<input type="date" name="birthday" class="form-control" style="width: 50%" value="" required>					
				</div>
				<div>						
					<label>Giới tính</label>
					<input type="radio" name="gender" value="Nam" checked="checked">Nam
					<input type="radio" name="gender" value="Nữ"  >Nữ				
				</div>
				<div>						
					<label>Email</label>
					<input type="email" name="email" class="form-control" style="width: 50%" value="" required>					
				</div>
				<div>						
					<label>Địa chỉ</label>
					<input type="text" name="address" class="form-control" style="width: 50%" value="" required>					
				</div>
				<div>						
					<label>Số điện thoại</label>
					<input type="number" name="phone" class="form-control" style="width: 50%" value="" required>					
				</div>
				<div>						
					<label>Vai trò </label>
					<input type="radio" name="user_role" value="2" checked="checked">Người bán hàng 				
				</div>
				<div>						
					<label>Tên đăng nhập</label>
					<input type="text" name="username" class="form-control" style="width: 50%" value="" required>					
				</div>
				<div>						
					<label>Mật khẩu</label>
					<input type="password" name="password" class="form-control" style="width: 50%" value="" required>					
				</div>
				<div>						
					<label>Xác nhận mật khẩu</label>
					<input type="password" name="confirmpassword" class="form-control" style="width: 50%" value="" required>					
				</div>
				<div class="addCate" style="padding-left: 1%;">
					<input type="submit" name = "addSeller"class="btn btn-primary save-submit" value="Thêm">
				</div>
			</form>

		</div>
	</div>
</div>