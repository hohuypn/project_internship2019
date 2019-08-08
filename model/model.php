<?php 
class Model 
{
	protected function connect()
	{
		$mysqli = new mysqli("localhost", "inter_project", "BKWkrLqj8MlCUbqA", "inter_project");
		if ($mysqli->connect_errno) {
			return false;
		}
		$mysqli->set_charset("utf8");
		return $mysqli;
	}

	// Send email
	public function sendMail($send_to,$subject,$content){
		include_once('././controllers/PHPMailer/PHPMailerAutoload.php');
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Host = 'tls://smtp.gmail.com:587';
		// $mail->Port = 578;
		// $mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = 'cam.hoqt@gmail.com';
		$mail->Password = "gvkcxucuavgfvywa";
		$mail->FromName="cam.hoqt@gmail.com";
		$mail->Subject = $subject;
		$mail->addAddress($send_to);
		$mail->msgHTML($content);
		if (!$mail->send()) {
			 $error = "Lỗi: " . $mail->ErrorInfo;
    		echo '<p>'.$error.'</p>';
			# code...
		}else{
			echo "<script>
					alert('Bạn đã gửi mail thành công ');
					window.location.replace('index.php?controller=email&action=getform&page=seller');
					</script>";

		}
	}
	
}
?>