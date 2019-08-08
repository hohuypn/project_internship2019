<?php 
class reportController extends sellerController
{
	
	public function index()
	{
		$data['count_order']= Order::count_order();
		$data['send_order']= Order::send_order();
		$data['shipper_order']= Order::shipper_order(); 
		$data['count_product']= Product::count_product();
		parent::template('views/seller/report/index',$data);
	}
	
	public function calendar()
	{
		parent::template('views/seller/report/calendar');
	}
	public function login()
	{
		parent::template('views/seller/report/login');
	}
	public function mail()
	{
		parent::template('views/seller/report/mail');
	}
	public function error()
	{
		include_once 'views/seller/report/error.php';
	}
	public function profile()
	{
		
		$data['select_user'] = User::getallSeller();
		parent::template('views/seller/report/profile',$data);
	}
	

}
 ?>