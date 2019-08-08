<?php 
	if(isset($_GET['page'])){
		$page=$_GET['page'];
	}else{
		$page='customer';
	}
	if(isset($_GET['controller'])){
		if(isset($_GET['action'])){
			$controller=$_GET['controller'];
			$action=$_GET['action'];

		}else{
			$controller=$_GET['controller'];
			$action='index';
		}
	}else{
		$controller='student';
		$action='index';
	}
	if(file_exists('controllers/'.$page.'/'.$controller.'Controller.php')){
		include 'controllers/controller.php';
		include 'controllers/'.$page.'Controller.php';
			$check_before=get_class_methods($page.'Controller');
			if(in_array('before', $check_before)){
				$controller_name=$page.'Controller';
				$get_controller=new $controller_name();
				$get_controller->before();
			}
		include 'controllers/'.$page.'/'.$controller.'Controller.php';
		$controller_name=$controller.'Controller';
		$get_controller=new $controller_name();
		$get_controller->{$action}();
	}else{
		header('location: index.php?controller=report&action=error&page=seller');die;
	}
?>