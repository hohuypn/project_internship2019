<?php 

	$id = isset($_GET['id']) ? $_GET['id']: ''; 
	if (isset($_SESSION['cart'])) {
		if (isset($_SESSION['cart'][$id])) {
			$_SESSION['cart'][$id]['qty'] += 1;
		}
		else{
			$_SESSION['cart'][$id]['qty'] = 1;
		}
	}
	else{
		var_dump('Giỏ hàng chưa tồn tại');
		$_SESSION['cart'][$id]['qty'] = 1;
	}
?>