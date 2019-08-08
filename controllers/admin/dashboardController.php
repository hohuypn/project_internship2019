<?php 
/**
 * 
 */
class dashboardController extends adminController
{
	public function index()
	{
		// Thao tác từ Model
		$data['registered_user'] = User::registeredUser();
		$data['visited_user'] = User::visitedUser();
		$data['ordered'] = Order::countOrder();
		parent::template('views/admin/dashboards/index', $data); // Thao tác với view
	}


	// Function get data into administrator profile
	public function profile()
	{
		$username=$_SESSION['usernameAdmin'];
		$data['value'] = User::getallAdministrator($username);
		parent::template('views/admin/dashboards/profile', $data);
	}

 	// Function to update data the administrator
	public function updateprofile()
	{
		$id = $_POST['id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$image = $_FILES['images']['name'];
		move_uploaded_file($_FILES['images']['tmp_name'], 'public/asset/admin/images/'.$_FILES['images']['name']);
		if ($first_name && $last_name && $phone && $email && $email && $address !== "") {
			$data = User::updateAdmin($id, $first_name, $last_name, $phone, $email, $address, $image);
			if ($data==1) {
				echo "<script>
				alert('Bạn đã cập nhật thành công!');
				window.location.replace('index.php?controller=dashboard&action=profile&page=admin');
				</script>";
			}else{
				echo "<script>
				alert('Bạn đã cập nhật thất bại!');
				window.location.replace('index.php?controller=dashboard&action=profile&page=admin');
				</script>";
			}
		}
	}
	

	// Function to get an error when you create function to failed
	public function error()
	{
		include_once 'views/admin/dashboards/error.php';
	}
	
	public function changePassword(){
		if (isset($_POST['doimatkhau'])) {
			$username=$_SESSION['usernameAdmin'];
			$id = $_POST['id'];
			$old_pwd = $_POST['password_old'];
			$new_pwd = $_POST['password_new'];
			$confirm_pwd = $_POST['password_confirm'];
			if ($new_pwd == $confirm_pwd) {
				$data = User::changePasswordForAdmin($username, $old_pwd, md5($new_pwd));
				if ($data) {
					echo "<script> alert('Đổi mật khẩu thành công');
					window.location.href='index.php?controller=dashboard&action=profile&page=admin';</script>";
				}
				else{
					echo "<script> alert('Đổi mật khẩu không thành công');
					window.location.href='index.php?controller=dashboard&action=profile&page=admin';</script>";
				}
			}else{
				echo "<script> alert('Xác nhận mật khẩu không khớp');
				window.location.replace('index.php?controller=dashboard&action=profile&page=admin');
				</script>";
			} 
		}
	}
}
?>