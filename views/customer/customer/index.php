<?php 
if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
	$image = $_SESSION['image'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>PROFILE</title>
	<meta charset="UTF-8">
</head>
<body>
	<div class="profile">
		<div class="container" >
			<div class="content" id="sanphamtimkem">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="background-color:  #f2f2f2; height: 500px">
					<div class="acount">
						<div class="row" style="padding-top: 20px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<img src="<?php echo $_SESSION['image']; ?>" > <!--  show avatar user -->
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-10" >
								<p><b><?php echo $username; ?></b></p> <!-- show tên của user -->
								<span><i class="fa fa-pencil-square-o "></i></span>
								<p>Sửa hồ sơ</p>
							</div>
						</div>
					</div>
					<ul>
						<li class="dropdown ">
							<span><i class="fa  fa-user-circle-o" ></i></span> Tài khoản của tôi
							<ul class="">
								<li><a href="#profile" data-toggle="tab" aria-expanded="true" class="active">Hồ sơ</a></li>
								<li><a href="#changePass" data-toggle="tab" aria-expanded="true">Đổi mật khẩu</a></li>
							</ul>
						</li>
						<li><a href="#order" data-toggle="tab" aria-expanded="true"><span><i class="fa fa-list-alt" ></i></span> Đơn mua</a></li>
						<li><a href="#" data-toggle="tab" aria-expanded="true"><span><i class="fa fa-bell-o" ></i></span>Thông Báo</a></li>
					</ul>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
					<div class="info">
						<div class="tab-content">
							<div id="profile" class="tab-pane active" >
								<h4>&emsp;Hồ Sơ Của Tôi</h4>
								<hr>
								<?php foreach ($select_acount as $key) {
									?> 
									<form method="POST" action="index.php?controller=user&action=updateProfile&page=customer" enctype="multipart/form-data">
										<div class="row">
											<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" >
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 home">
													<input type="text" name="last_name" class="form-control" placeholder="Họ" value="<?php echo $key['last_name'] ?>" required>
												</div>
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 home">
													<input type="text" name="first_name" class="form-control" placeholder="Tên" value="<?php echo $key['first_name'] ?>" required><br>
												</div>
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home">
													<input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $key['email'] ?>" required><br>
												</div>
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home">
													<input type="text" name="address" class="form-control" placeholder="Địa chỉ" value="<?php echo $key['address'] ?>" required><br>
												</div>
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home">
													<input type="text" name="phone" class="form-control" placeholder="Số điện thoại" value="<?php echo $key['phone'] ?>" required><br>
												</div>
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home">
													<input type="radio" name="gender" value="Nam" <?php if ($key['gender']=="Nam") { echo "checked";} ?> >Male
													<input type="radio" name="gender" value="Nữ" <?php if ($key['gender']=="Nữ") { echo "checked";} ?> >Female
												</div><br>
												<div class="col-md-12 home" >
													<input type="date" name="birthday" class="form-control" value="<?php echo $key['birthday']; ?>"><br>
												</div>
												<div class="col-md-12 home" >
													<input type="text" name="username" class="form-control" value="<?php echo $key['username']; ?>"><br>
												</div>
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home">
													<div class="col-sm-5"></div>
													<div class="col-sm-7">
														<input type="hidden" name="username"  value="<?php echo  $_SESSION['username'] ?>">
														<button type="submit" class="btn" name="update" >UPDATE</button></div>
													</div>
												</div>
												<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
													<img class="image" src="<?php echo $_SESSION['image']; ?>" width="180" height="180" style="border-radius: 50%;">
													<input type="file" name="file" class="form-control home">
												</div>
											</div>
										</form><br>
									<?php } ?>
								</div>
								<div id="changePass" class="tab-pane fade">
									<h4> &emsp;Đổi Mật Khẩu</h4>
									<hr>
									<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
									</div>
									<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
										<form method="POST" action="index.php?controller=user&action=updatePass&page=customer">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-2 home">
												Mật Khẩu Cũ:
											</div>
											<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 home">
												<input type="password" name="oldPassword" class="form-control" required><br>
												
											</div>
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 home">
												Mật Khẩu Mới:
											</div>
											<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 home">
												<input type="password" name="newPassword" class="form-control" required><br>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 home">
												Xác Nhận Mật Khẩu Mới:
											</div>
											<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 home">
												<input type="password" name="confirmPassword" class="form-control" required><br>
												
											</div>
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home">
												<div class="col-sm-6"></div>
												<div class="col-sm-6"><button type="submit" class="btn" name="updatePass">UPDATE</button></div>
											</div>
										</form>
									</div>
								</div>
								<div id="order" class="tab-pane fade">
									<div class="tablist row">
										<ul role="tablist" class="nav nav-tabs small">
											<li class=" nav-item active col-lg-4 col-md-3 col-sm-3 col-xs-3">
												<a href="#order" data-toggle="tab" aria-expanded="true"><h4>Chờ Xử Lí</h4></a>
											</li>

											<li class=" nav-item col-lg-4 col-md-3 col-sm-3 col-xs-3">
												<a href="#ordering" data-toggle="tab" aria-expanded="true"><h4>Đang Giao</h4></a>
											</li>
											<li class="nav-item col-lg-4 col-md-3 col-sm-3 col-xs-3">
												<a href="#ordered" data-toggle="tab" aria-expanded="true"><h4><h4>Đã Giao</h4></a>
											</li>
										</ul>
									</div>
									<div class="tab-content">
										<div id="order" class="tab-pane active">
											<!-- gọi lại và show ra những sp chưa đc xử lí  -->
											<p>Giỏ hàng của bạn chưa có gì</p>
										</div>
										<div id="ordering" class="tab-pane fade">
											<!-- gọi lại và show ra những sp đã đc xử lí và đang đc giao -->
											<p>Giỏ hàng của bạn chưa có gì</p>
										</div>

										<div id="ordered" class="tab-pane fade">
											<!-- gọi lại và show ra những sp đã đc giao mà người dùng đã bấm nút đã nhận -->
											<p>Giỏ hàng của bạn chưa có gì</p>
										</div>
										<div id="orderCancel" class="tab-pane fade">
											<!-- gọi lại và show ra những sp đã hủy -->
											<p><?php echo $_SESSION['cart']; ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</body>
	</html>