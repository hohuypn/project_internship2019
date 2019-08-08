<?php 
/**
 * 
 */
class User extends Model
{
	// Start with administrator

	// Count quantity user to registered
	public function registeredUser()
	{
		$db = parent::connect();

		$sql = $db->query("SELECT id, count(id) as quantity_user FROM users");
		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		return $result;
	}

	// Count quantity to visit page
	public function visitedUser()
	{
		$db = parent::connect();
		$sql = $db->query("SELECT id, count(id) as quantity_user FROM users WHERE user_role = '0'");
		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		return $result;
	}

    // Get information about the customer to show into list customer page
	public function getallCustomer(){
		$db = parent::connect();
		
		$sql = $db->query("SELECT * FROM users WHERE user_role = '0'");
		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		return $result;
	}

	// Get information about the seller to show into list seller page
	public function getallSeller(){
		$db = parent::connect();
		if (isset($_SESSION['usernameseller'])) {
			$sql = $db->query("SELECT * FROM users WHERE user_role = '2' AND username='$_SESSION[usernameseller]'");
			$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
			return $result;
		}
		
	}

	public function getallSellerforAdmin(){
		$db = parent::connect();

		$sql = $db->query("SELECT * FROM users WHERE user_role = '2'");
		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		return $result;
	}

	// Get information of an administrator to show into administrator profile page
	public function getallAdministrator($username){
		$db = parent::connect();
		$sql = $db->query("SELECT * FROM users WHERE user_role = '1' AND username='$username'");
		$result = mysqli_fetch_assoc($sql);
		return $result;
	}

	// Show information about comment of user
	public function getallComment()
	{
		# code...
	}


	// Login with account administrator
	public function loginAdmin($username, $password)
	{
		$db = parent::connect();
		$sql = $db->query("SELECT * FROM users WHERE username = '$username' AND password = '$password' AND user_role = '1'");
		$result = mysqli_fetch_assoc($sql);
		return $result;
	}

	// Create function to update information administrator
	public function updateAdmin($id, $first_name, $last_name, $phone, $email, $address, $image){
		$db = parent::connect();

		$sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', phone = '$phone', email = '$email', address = '$address', image = '$image' WHERE id = '$id'";
		$result =  mysqli_query($db, $sql);
		return $result;
	}

	public function changePasswordForAdmin($username, $old_pwd, $new_pwd){
		$db = parent::connect();

		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '".md5($old_pwd)."'";
		$result = $db->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$sql_up = "UPDATE users SET password = '$new_pwd' WHERE id = $row[id]";
			$result=$db->query($sql_up);
			return $result;
		}
		return false;

	}

	public function changePasswordForSeller($id, $old_pass, $new_pass){
		$db = parent::connect();
		$sql = "SELECT password FROM users WHERE id = '$id' LIMIT 1";
		$result = $db->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			if ($old_pass == $row['password']) {
				$sql_update = "UPDATE users SET password = '$new_pass' WHERE id = '$id'";
				if ($db->query($sql_update)) {
					return true;
				}
			} else {
				echo "<script> alert('Mật khẩu cũ không chính xác');
				</script>";
			}
		}

	}

	public function getedit($id)
	{
		$db=parent::connect();
		$sql = $db->query("SELECT * FROM users WHERE id = '$id'");
		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		return $result;
	}

	// Function to coding a user by administrator

	public function add($username, $password, $first_name, $last_name, $birthday, $gender, $email, $address, $phone, $image, $user_role)
	{
		$db = parent::connect();

		$password = password_hash($password, PASSWORD_DEFAULT);
		$sql = "INSERT INTO users( username, password, first_name, last_name, birthday, gender, email, address, phone, image, user_role, code_confirm, created_at)
		VALUES ('$username', '$password', '$first_name', '$last_name', '$birthday', '$gender', '$email', '$address', '$phone','$image', '$user_role', '', NOW());";
		$result = mysqli_query($db,$sql);
		return $result;
	}

	public function update ($id, $username, $first_name, $last_name, $birthday, $gender, $email, $address, $phone){
		$db = parent::connect();
		$sql ="UPDATE users SET username = '$username',  first_name = '$first_name', last_name = '$last_name', birthday = '$birthday', gender = '$gender', email = '$email', address = '$address', phone = '$phone' WHERE id = '$id'";
		$result=$db->query($sql);
		return $result;
	}
	public function updateImage ($id, $username, $first_name, $last_name, $birthday, $gender, $email, $address, $phone, $image){
		$db = parent::connect();
		$sql="UPDATE users SET username = '$username', first_name='$first_name',last_name='$last_name',birthday='$birthday',gender='$gender',email='$email', address='$address', phone='$phone',image='$image' WHERE id = '$id' LIMIT 1";
		$result=$db->query($sql);
		return $result;
	}
	public function changePass($id, $oldPassword, $newPassword){
		$db = parent::connect();

		$hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
		$check_old_pass = "SELECT password FROM users WHERE id = '$id'";
		$result = $db->query($check_old_pass);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			if (password_verify($oldPassword, $row['password'])) {
				$sql = "UPDATE users SET password = '$hashed_password' WHERE id = '$id'";
				if ($db->query($sql)) {
					echo "<script> alert('Thay đổi mật khẩu thành công');
					window.location.replace('index.php?controller=user&action=index&page=admin');</script>";
				}
			} else {
				echo "<script> alert('Mật khẩu cũ không chính xác');
				window.location.replace('index.php?controller=user&action=index&page=admin');</script>";
			}
		}

	}

	public function delete($id)
	{
		$db = parent::connect();

		$sql = "DELETE FROM users WHERE id = '$id'";
		$result = mysqli_query($db, $sql);
		return $result;
	}
	
	// The end administrator
	public function LoginSeller($username,$password){
		$db = parent::connect();
		$sql = $db->query("SELECT * FROM users WHERE  username = '$username' AND user_role = '2' limit 1 ");
		$query = mysqli_fetch_assoc($sql);
		$check = password_verify($password,$query['password']);
		if($check){
			return $query;
		}
		return false;
		
	}

      // model for customer
	public function checkLogin($username,$password){
		$db = parent::connect();
		$sql = $db->query("SELECT * FROM users WHERE  username = '$username' limit 1 ");
		$query = mysqli_fetch_assoc($sql);
		$check = password_verify($password,$query['password']);
		if($check){
			return $query;
		}
		return false;
	}

	public function checkUsername($username){
		$db = parent::connect();
		$get_username = $db->query("SELECT username FROM users WHERE username = '$username' ");
		$result = mysqli_fetch_all($get_username, MYSQLI_ASSOC);
		return $result;
	}
	public function checkEmail($email){
		$db = parent::connect();
		$get_useremail = $db->query("SELECT * FROM users WHERE email = '$email' ");
		$result = mysqli_fetch_all($get_useremail, MYSQLI_ASSOC);
		return $result;
	}
	public function insertUser($username, $password, $first_name, $last_name, $birthday, $gender, $email, $address, $phone, $image, $user_role,$code_confirm){
		$db = parent::connect();
		$password = password_hash($password, PASSWORD_DEFAULT);
		$sql = "INSERT INTO users( username, password, first_name, last_name, birthday, gender, email, address, phone, image, user_role,code_confirm,created_at)
		VALUES ('$username', '$password', '$first_name', '$last_name', '$birthday', '$gender', '$email', '$address', '$phone','$image' ,'$user_role','$code_confirm',NOW());";
		$result = mysqli_query($db,$sql);
				// Xác nhận mail
		if ($result) {
			$user_id=$db->insert_id;
			if (isset($email)) {
				$subject = "Confim Email: ";
				$url_active="http://" . $_SERVER['SERVER_NAME']."/tree/index.php?controller=user&action=activeUser&page=seller&id=$user_id";
				$body='Hi, <br/> <br/>Hãy click vào link bên dưới để chúng tôi biết rằng email của bạn đàng tồn tại và bạn đang sử dụng nó. <br/> <br/> <a href="'.$url_active.'">Kích Vào link để active tài khoản</a>';

				$send=User::sendMail($email,$subject,$body);
				
			}
		}

		return $result;
	}
	public function showProfile($username){
		$db = parent::connect();
		$getcustomer = $db->query("SELECT * FROM users WHERE username = '$username'");
		$result = mysqli_fetch_all($getcustomer, MYSQLI_ASSOC);
		return $result;
	}
	public function getUserById($user_id){
		$db = parent::connect();
		$data= $db->query("SELECT * FROM users WHERE id = $user_id");
		$result = mysqli_fetch_assoc($data);
		return $result;
	}
	public function updateProfile ($username, $first_name, $last_name, $birthday, $gender, $email, $address, $phone){
		$db = parent::connect();
		$username = $_SESSION['username'];
		$sql ="UPDATE users SET first_name='$first_name',last_name='$last_name',birthday='$birthday',gender='$gender',email='$email', address='$address', phone='$phone' WHERE username = '$username' LIMIT 1";
		$result=$db->query($sql);
		return $result;
	}

	public function updateProfileImg ($username, $first_name, $last_name, $birthday, $gender, $email, $address, $phone,$image){
		$db = parent::connect();
		$sql="UPDATE users SET first_name='$first_name',last_name='$last_name',birthday='$birthday',gender='$gender',email='$email', address='$address', phone='$phone',image='$image' WHERE username = '$username' LIMIT 1";
		$result=$db->query($sql);
		return $result;
	}
	public function updatePass($username, $oldPassword, $newPassword){
		$db = parent::connect();
		$username = $_SESSION['username'];
		$hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
		$check_old_pass = "SELECT password FROM users WHERE username = '" . $username . "'  LIMIT 1";
		$result = $db->query($check_old_pass);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$sql = "UPDATE users SET password = '$hashed_password' WHERE username = '$username'";
			$result=$db->query($sql);
			return $result;
		}
		return false;

	}
	public function updateSeller($first_name, $last_name, $phone, $email, $address, $image){
		$db = parent::connect();
		if (isset($_GET['id'])) {
			$sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', phone = '$phone', email = '$email', address = '$address', image = '$image' WHERE id = '$_GET[id]'";
			$result =  mysqli_query($db, $sql);
			return $result;
		}
		
	}

     // end model for customer
	// Send email
	
	public function sendMail($send_to,$subject,$content){
		//if (isset($_POST['send_to'])) {
		include_once('././controllers/PHPMailer/PHPMailerAutoload.php');
		$mail= new PHPMailer;
		$mail->isSMTP();
		$mail->Host = 'tls://smtp.gmail.com:587';
		// $mail->Port = 578;
		// $mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = 'cam.hoqt@gmail.com';
		$mail->Password = "gvkcxucuavgfvywa";
		$mail->FromName="cam.hoqt@gmail.com";
  //#3
		$mail->addAddress($send_to);
		$mail->Subject= $subject;
		$mail->msgHTML($content);

		if (!$mail->send()) {
			$error = "Lỗi: " . $mail->ErrorInfo;
			echo '<p>'.$error.'</p>';
			return false;
		}else{
			return true;

		}
		//}else{
			//echo "Vui lòng nhập dữ liệu";
		//}
	}

	public function active_User(){
		$db = parent::connect();
		if (isset($_GET['username'])) {
			$username = $_GET['username'];
			$sql="SELECT * FROM users WHERE id='$username' ";
			$result=$db->query($sql);
			if ($result) {
				$sql_delete="UPDATE users SET code_confirm ='' WHERE id='$username'";
			}
		}
	}

	public function confirm($id){
		$db = parent::connect();
		$sql="SELECT code_confirm FROM users WHERE id =$id" ;
		$result=$db->query($sql);
		if ($result->num_rows > 0) {
			$sql_update="UPDATE users SET code_confirm='' WHERE id =$id";
			$result_update=$db->query($sql_update);
			return $result_update;
		}
			 return false; 
	}
	
	public function get_id($username){
		$db= parent::connect();
		$sql ="SELECT id FROM users WHERE username ='$username' limit 1";
		$result=$db->query($sql);
		return $result;
	}

}
?>