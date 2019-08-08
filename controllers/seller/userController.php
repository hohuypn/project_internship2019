<?php 
/**
 * 
 */
class userController extends sellerController
{
	
	public function profile()
	{

		if (isset($_SESSION['usernameseller'])) {
			$usernameseller= $_SESSION['usernameseller'];
			$data['select_user'] = User::getallSeller();
			parent::template('views/seller/report/profile',$data);
		}
		

		
	}
	
	public function getLogout(){
		if (isset($_SESSION['usernameseller'])) {
			unset($_SESSION['usernameseller']);
			unset($_SESSION['image']);
			header("location: index.php?controller=product&action=index&page=customer");
		}else {
			header("location: index.php?controller=product&action=index&page=customer");
		}
	}

	public function Login(){
		if (isset($_POST['loginseller'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			if ($username != "" and $password != "") {
				$login= User::LoginSeller($username, $password);
				if ($login) {
					if($login['code_confirm']==''){
						$_SESSION['usernameseller']= $login['username'];
						$_SESSION['image'] = $login['image'];
						echo "<script>
						alert('Bạn đăng nhập thành công! chào mừng bạn $username đến với trang dành cho người bán hàng ');
						window.location.replace('index.php?controller=product&action=index&page=seller');
						</script>";die;
					}else{
						echo "<script>
					alert('Tài khoản của bạn chưa xác thực Email, Vui lòng xác thực trước khi sử dụng!');
					window.location.replace('index.php?controller=product&action=index&page=customer');
					</script>";die;	
					}
				}else{
					echo "<script>
					alert('Bạn đăng nhập không thành công! Sai mật khẩu hoặc username ');
					window.location.replace('index.php?controller=product&action=index&page=customer');
					</script>";die;					
				}
			}
		} 	
		die;
	}
	public function update_seller()
	{
		if(isset($_POST['suaseller'])){
			$firstname = $_POST['first_name'];
			$lastname = $_POST['last_name'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$image=$_FILES['images']['name'];
			move_uploaded_file($_FILES['images']['tmp_name'], 'public/asset/seller/images/'.$_FILES['images']['name']);
			if ($firstname && $lastname && $phone && $email && $address!=="" ) {
				$data['sua_seller']=User::updateSeller($firstname, $lastname, $phone, $email, $address,$image);
				echo "<script>
				alert('Bạn cập nhật thành công! ');
				window.location.replace('index.php?controller=report&action=profile&page=seller');
				</script>";
			}else{
				echo " Không Thành công";
			}
		}
	}

	public function update_password()
	{
		if (isset($_POST['suapass'])) {
			$id = $_POST['id'];
			$old_pass = $_POST['password_old'];
			$new_pass = $_POST['password_new'];
			$confirm_pass = $_POST['password_confirm'];
			if ($new_pass == $confirm_pass) {
				$data = User::changePasswordForSeller($new_pass);
				echo "<script>
				alert('Bạn đổi mật khẩu thành công!');
				window.location.replace('index.php?controller=report&action=profile&page=seller');
				</script>";

			}else{
				echo "<script> alert('Xác nhận mật khẩu không khớp');
				</script>";
				
			} 
		}
	}
	public function getform(){

		parent::template('views/seller/emails/email');
	}
	public function send_email(){
		if (isset($_POST['send'])) {
			$send_to = $_POST['send_to'];
			$subject= $_POST['subject'];
			$content = $_POST['content'];
			$data = User::sendMail($send_to,$subject,$content);
			echo "<script>
			alert('Bạn đã gửi mail thành công ');
			window.location.replace('index.php?controller=user&action=getform&page=seller');
			</script>";
		}else{
			echo "Lỗi không gửi được email";
		}
	}

	public function activeUser(){
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$active = User::confirm($id);
			if ($active) {
				echo "<script> alert('Bạn đã xác nhận email thành công');
				window.location.href='index.php?controller=product&action=index&page=customer';</script>";
			}else{
				echo "<script> alert('Xác nhận không thành công');
				window.location.replace('index.php?controller=product&action=index&page=customer');</script>";

			}
		}
		
	}

}
?>