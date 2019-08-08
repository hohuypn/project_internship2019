<?php 
/**
 * 
 */
class orderController extends adminController
{
	// Function to get data order into order page
	public function index()
	{
		$data['order'] = Order::getallpageAdmin();
		parent::template('views/admin/orders/index', $data);
	}
	public function getorderdetail(){
		if(isset($_POST['order_id'])){
			$order_id=$_POST['order_id'];
			$select_order_detail=Order::select_order_detail_admin($order_id);
			include "views/admin/orders/productdetail.php";
			die;
		}
	}
	public function delete()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$data = Order::deleteOrderforAdmin($id);
			if ($data) {
				echo "<script> alert('Xóa đơn hàng thành công');
				window.location.replace('index.php?controller=order&action=index&page=admin');</script>";
			}
			else{
				echo "<script> alert('Xóa đơn hàng không thành công');
				window.location.replace('index.php?controller=order&action=index&page=admin');</script>";
			}
		}
	}
}
?>