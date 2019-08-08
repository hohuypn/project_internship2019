<?php 
/**
 * 
 */
class userController extends customerController
{
 	// controller for customer

	public function addUser(){
		if (isset($_POST['dangki'])) {
			$last_name = $_POST['ho'];
			$first_name = $_POST['ten'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$gender = $_POST['gender'];
			$birthday = $_POST['birthday'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$user_role = $_POST['user_role'];
			$image = "";
			$confirm_code=md5(uniqid(rand()));
			$confirmpassword = $_POST['confirmpassword'];
			if ($image == "public/asset/customer/avatars/" || $image == "") {
				$image = 'public/asset/customer/avatars/acount.png';
			}
			if ($confirmpassword == $password) {
				$check_username=User::checkUsername($username);
				if (count($check_username)<=0) {
					$check_email=User::checkEmail( $email);
					if (count($check_email)<=0) {
						$data=User::insertUser($username, $password, $first_name, $last_name, $birthday, $gender, $email,$address, $phone, $image,$user_role,$confirm_code);
						if ($user_role==0) {
							$_SESSION['username'] = $username;
							$_SESSION['image'] = 'public/asset/customer/avatars/acount.png';
							echo "<script>
							alert('Bạn đăng ký thành công');
							window.location.replace('index.php?controller=product&action=index&page=customer');
							</script>";die;
						}else{
							echo "<script>
							alert('Đăng ký người bán hàng thành công. Vui lòng login và sử dụng dịch vụ!!!');
							window.location.replace('index.php?controller=product&action=index&page=customer');
							</script>";die;
						}
						}else echo "<script>
						alert('Mail đã tồn tại!!!');
						window.location.replace('index.php?controller=product&action=index&page=customer');
						</script>";
					}else echo "<script> alert('User name đã tồn tại');</script>";
				}else echo "<script> alert('Nhập lại mật khẩu không chính xác');</script>";
			}
			die;
		} 
		public function Login(){
			if (isset($_POST['login'])) {
				$username =$_POST['username'];
				$password = $_POST['password'];
				if ($username!="" and $password!="") {
					$login= User::checkLogin($username, $password);
					if ($login) {
						$_SESSION['username']= $login['username'];
						$_SESSION['image'] = $login['image'];
						$_SESSION['user_id'] = $login['id'];
						echo "<script>
						alert('Bạn đăng nhập thành công! chào mừng bạn $username đến mua sắm cùng Shop ');
						window.location.replace('index.php?controller=product&action=index&page=customer');
						</script>";
					}else{
						echo "<script>
						alert('Bạn đăng nhập không thành công! Sai mật khẩu hoặc username ');
						window.location.replace('index.php?controller=product&action=index&page=customer');
						</script>";					
					}
				}
			} 	
		}
		public function logout(){
			session_unset();
			session_destroy();
			header('Location: index.php?controller=product&action=index&page=customer');
		}

		public function profile(){
			if (isset($_SESSION['username'])) {
				$username = $_SESSION['username'];
				$data['select_acount']=User::showProfile($username);
				$data['select_cate']=Category::getall();
				parent::template('views/customer/customer/index',$data);
			}
		}

		public function updateProfile(){
			if (isset($_POST['update'])||isset($_SESSION['username'])) {
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
						$_SESSION['image']=$image;
						$data['select_update']=User::updateProfileImg($username,$first_name,$last_name,$birthday,$gender,$email,$address,$phone,$image);
					}
				}else{
					$data['select_update']=User::updateProfile($username,$first_name,$last_name,$birthday,$gender,$email,$address,$phone);
				}
				if ($data['select_update']) {
					echo "<script>
					alert('Bạn đã cập nhật thành công');window.location.replace('index.php?controller=user&action=profile&page=customer');
					</script>";
				}else{
					echo "<script>
					alert('Update Failed!!');</script>"; 
				// window.location.replace('index.php?controller=user&action=profile&page=customer');
					var_dump($data['select_update']);
				}
			}
		}

		public function updatePass(){
			if (isset($_POST['updatePass'])|| isset($_SESSION['username'])) {
				$errConfirm = "";
				$errOldPass = "";
				$username = $_SESSION['username'];

				if ($_POST['newPassword'] != $_POST['confirmPassword']) {
					echo "<script> alert('Nhập Lại Mật Khẩu Không Chính Xác');window.location.replace('index.php?controller=user&action=updatePass&page=customer');</script>";
				}else{
					$data['select_updatepass']=User::updatePass($username,$_POST['oldPassword'], $_POST['newPassword']);
					echo "<script> alert('Cập Nhật Password Thành Công');
					window.location.replace('index.php?controller=user&action=profile&page=customer');</script>";

					if ($errOldPass !="") {
						echo "<script> alert('Mật Khẩu Cũ Không Chính Xác');
						window.location.replace('index.php?controller=user&action=profile&page=customer');</script>";
					}
				} 
			}
		}

	// end controller for customer
	}
	?>