<?php 
/**
 * 
 */
class orderController extends customerController
{
	
	public function index()
	{
		parent::template('views/customer/orders/index');
	}

	public function cart()
	{
		if (isset($_POST['id']) && isset($_POST['num'])) {
			$id = $_POST['id'];
			$num = $_POST['num'];
			$data = Product::showProductDetail($id);
			if($data['price_new']!=''){
				$price=$data['price_new'];
			}else{
				$price=$data['price'];
			}
			$cart=array('id'=>$id,'price'=>$price,'quantity'=>$num);
			if (isset($_SESSION['cart'])) {
				if(isset($_SESSION['cart'][$id])){
					$_SESSION['cart'][$id]['quantity']+=$num;
				}else{
					$_SESSION['cart'][$id]=$cart;
				}
			}else{
				$_SESSION['cart'][$id]=$cart;
			}
			echo count($_SESSION['cart']);
			die;
		}
		echo 0;die;
	}
	public function showcart(){
		$data['orders']=array();
		if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
			echo "<script>
			alert('Giỏ hàng còn trống, vui lòng quay lại trang chủ!');
			window.location.replace('index.php?controller=product&action=index&page=customer');
			</script>";
		}else{
			if(isset($_SESSION['cart'])){
				$cart=$_SESSION['cart'];
				$product_id='(';
				foreach ($cart as $key => $value) {
					$product_id .= $value['id'].',';
				}
				$product_id=substr($product_id,0,-1);
				$product_id.=')';
				$product_cart=Product::selectProductCart($product_id);
				foreach ($product_cart as $key => $value) {
					$product_cart[$key]['quantity_order']=$cart[$value['id']]['quantity'];
					$product_cart[$key]['price_order']=$cart[$value['id']]['price'];

				}
				$data['orders']=$product_cart;
			}
		}
		
		parent::template('views/customer/orders/cart',$data);

	}

	public function checkout()
	{
		if (isset($_SESSION['user_id'])) {
			$user_id = $_SESSION['user_id'];
			$data['infor'] = User::getUserById($user_id);
			$data['orders']=array();
			if(isset($_SESSION['cart'])){
				$cart=$_SESSION['cart'];
				$product_id='(';
				foreach ($cart as $key => $value) {
					$product_id .= $value['id'].',';
				}
				$product_id=substr($product_id,0,-1);
				$product_id.=')';
				$product_cart=Product::selectProductCart($product_id);
				foreach ($product_cart as $key => $value) {
					$product_cart[$key]['quantity_order']=$cart[$value['id']]['quantity'];
					$product_cart[$key]['price_order']=$cart[$value['id']]['price'];

				}
				$data['orders']=$product_cart;
			}
			parent::template('views/customer/orders/checkout', $data);
		}else{
			echo "<script>
			alert('Vui lòng đăng nhập để đặt hàng!');
			window.location.replace('index.php?controller=product&action=index&page=customer');
			</script>";
		}
	}


	public function addCartToDatabase()
	{
		if (isset($_POST['addcarttodb'])) {
			if (isset($_SESSION['user_id'])) {
				$user_id = $_SESSION['user_id'];

				$cart  = $_SESSION['cart'];

				$payment=$_POST['payment_method'];
				$first_name = $_POST['first_name'];
				$last_name = $_POST['last_name'];
				$gender = $_POST['gender'];
				$deliveryAddress = $_POST['address'];
				$phone = $_POST['phone'];
				$note = $_POST['notes'];
				$data = Order::addToCart($user_id, $first_name, $last_name, $gender, $phone, 0, $payment, $deliveryAddress, $note,date('Y-m-d'));
				$total=0;
				foreach ($cart as $key => $value) {
					Order::adddetail($data, $value['id'], $value['quantity'], $value['price'], date('Y-m-d'));
					$total += $value['price'];
				}
				$data =  Order::updatetotal($data,$total);

				foreach ($cart as $key => $value) {
					Order::updateQuantity($value['id'], $value['quantity']);
				}
				if ($data) {
					echo "<script>
					alert('Đặt hàng thành công!');
					window.location.replace('index.php?controller=order&action=checkout&page=customer');
					</script>";	
				}else{
					echo "<script>
					alert('Đặt hàng không thành công!');
					window.location.replace('index.php?controller=order&action=checkout&page=customer');
					</script>";	
				}
			}
			unset($_SESSION['cart']);
		}
	}
	public function delete()
	{
		if(isset($_GET['id'])){
			$id=intval($_GET['id']); 
			if(isset($_SESSION['cart'][$id])){ 
				unset($_SESSION['cart'][$id]);
				header("location: index.php?controller=order&action=showcart&page=customer");
			}
		}
	}
}
?>