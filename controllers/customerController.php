<?php /**
 * 
 */
class customerController 
{
	public function before(){
		if(!isset($_SESSION['cat_list'])){
			$select_cate=Product::showscategory();
			$_SESSION['cat_list']=$select_cate;
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
		include "views/customer/template.php";
	}

} ?>