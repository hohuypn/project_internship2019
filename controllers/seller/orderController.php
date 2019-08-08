<?php 
class orderController extends sellerController
{
	
	public function index()
	{
		if (isset($_SESSION['usernameseller'])) {
			$username = $_SESSION['usernameseller'];
		}
		$data['select_order'] = Order::getall($username);
		parent::template('views/seller/order/index',$data);
	}
	public function delete(){
		$data['xoa_order'] = Order::delete();
	}

	public function change_status(){
		if (isset($_GET['id'])) {
			$data['change'] = Order::change_update();
			$send_to="cam.ho.thi@student.passerellesnumeriques.org";
	 		$mailSubject="E-commercial website";
	 		$bodyContent="Xin chào quý khách!! Hóa đơn của quý khách đã được xác nhận";
	 		$send=User::sendMail($send_to,$mailSubject,$bodyContent);
	 		echo "<script>
					alert('Bạn đã gửi mail xác nhận đến khách hàng thành công');
					</script>";
			parent::template('views/seller/order/index',$data);
			
		}
	}
	function change_shiper(){
		if (isset($_GET['id'])) {
			$data['change'] = Order::doing_ship();
			parent::template('views/seller/order/index',$data);
		}
	}
	 public function total_order(){
	 	$data['order']=Order::count_order();
		parent::template('views/seller/report/index',$data);
	 }
	 	
}
?>