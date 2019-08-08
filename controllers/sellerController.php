<?php 
/**
 * 
 */
class sellerController
{
	 public function before(){
	// Kiểm nếu không phải khác getLogin và action khác login thì chuyển hướng trang sang trang Đăng nhập
	if($_GET['action']!='getLogin' && $_GET['action']!='Login' && $_GET['action']!='activeUser'){
			if(!isset($_SESSION['usernameseller'])){
			header('location: index.php?controller=product&action=index&page=customer');
		}
		}
	}

	public function template($view,$data=null)
	{
		if($data!=null){
			extract($data);
		}
		ob_start();
		include $view.'.php';
		$content=ob_get_clean();//content cho thằng template gọi nội dung đổ ra view
		include "views/seller/template.php";
	}
}
 ?>