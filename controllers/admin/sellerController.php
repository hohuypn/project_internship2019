<?php 
/**
 * 
 */
class sellerController extends adminController
{
	
	public function index()
	{
		$data['seller'] = User::getallSellerforAdmin();
		parent::template('views/admin/sellers/index', $data);
	}

	public function getadd()
	{
		parent::template('views/admin/sellers/add');
	}

	public function add(){
		if (isset($_POST['addSeller'])) {
			$last_name = $_POST['last_name'];
			$first_name = $_POST['first_name'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$gender = $_POST['gender'];
			$birthday = $_POST['birthday'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$user_role = $_POST['user_role'];
			$image = "";
			$confirmpassword = $_POST['confirmpassword'];
			if ($image == "public/asset/admin/images/" || $image == "") {
				$image = 'http://ssl.gstatic.com/accounts/ui/avatar_2x.png';
			}
			if ($confirmpassword ==$password) {
				$data['add_User']=User::add($username, $password, $first_name, $last_name, $birthday, $gender, $email, $address, $phone, $image, $user_role);
				if ($data['check_username']= User::checkUsername($username)) {
					if ($data['check_email']= User::checkEmail( $email)) {
						if ($user_role=='0') {
							$_SESSION['username'] = $username;
							$_SESSION['image'] = 'http://ssl.gstatic.com/accounts/ui/avatar_2x.png';
							echo "<script>
							alert('Thêm mới người dùng thành công');
							window.location.replace('index.php?controller=seller&action=index&page=admin');
							</script>";
						}
					}else echo "<script> alert('Email đã được đăng ký');</script>";
				}else echo "<script> alert('User name đã tồn tại');</script>";
			}else echo "<script> alert('Nhập lại mật khẩu không chính xác');</script>";
			
		}
		
	}

	public function edit()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$data['selleredit'] = User::getedit($id);
			parent::template('views/admin/sellers/edit', $data);
		}
	}

	public function update()
	{
		if (isset($_POST['editSeller'])||isset($_SESSION['username'])) {
			$id = $_POST['id'];
			$username = $_SESSION['username'];
			$first_name =$_POST['first_name'];
			$last_name =$_POST['last_name'];
			$birthday = $_POST['birthday'];
			$gender = $_POST['gender'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$image = $_SESSION['image'];
			if (isset($_FILES['file'])) {
				if ($_FILES['file']['error'] > 0)
					echo "Upload lỗi rồi!";
				else {
					move_uploaded_file($_FILES["file"]["tmp_name"], "public/asset/customer/avatars/" . $_FILES["file"]["name"]);
					$image = 'public/asset/customer/avatars/'.$_FILES["file"]["name"];
					$_SESSION['image'] = $image;
					$data['select_update'] = User::updateProfileImg($id, $username, $first_name, $last_name, $birthday, $gender, $email, $address, $phone, $image);
				}
			}else{
				$data['select_update'] = User::update($id ,$username, $first_name, $last_name, $birthday, $gender, $email, $address, $phone);
			}
			if ($data['select_update']) {
				echo "<script>
				alert('Bạn đã update thành công');window.location.replace('index.php?controller=seller&action=index&page=admin');
				</script>";
			}else{
				echo "<script>
				alert('Cập nhật bị lỗi!!');</script>";
			}
		}
	}

	public function changePass(){
		if (isset($_POST['changePass'])) {
			$errConfirm = "";
			$errOldPass = "";
			$id = $_POST['id'];

			if ($_POST['newPassword'] != $_POST['confirmPassword']) {
				echo "<script> alert('Xác nhận mật khẩu không trùng khớp');window.location.replace('index.php?controller=seller&action=edit&page=admin');</script>";
			}else{
				$data = User::changePass($id,$_POST['oldPassword'], $_POST['newPassword']);
				header('index.php?controller=seller&action=index&page=admin');
				
				if ($errOldPass !="") {
					echo "<script> alert('Mật khẩu cũ không chính xác');</script>";
				}
			} 
		}
	}

	public function delete(){
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$data = User::delete($id);
			if ($data) {
				header("location: index.php?controller=seller&action=index&page=admin");
			}
			else{
				echo "<script> alert('Xóa không thành công');
				window.location.reload('index.php?controller=seller&action=index&page=admin');</script>";
			}
		}
	}
}
 ?>