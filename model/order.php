<?php
class Order extends Model
{

	public function getall($username){
		$db = parent::connect();
		$sql ="SELECT orders.id,orders.user_id,orders.first_name,orders.last_name,orders.gender,orders.phone, orders.date_order, orders.total,orders.payment,orders.deliveryAddress,orders.note,orders.status, orders.created_at, order_details.order_id, order_details.product_id,order_details.quantity,order_details.price,users.email
		FROM orders 
		LEFT JOIN order_details ON orders.id = order_details.order_id
		LEFT JOIN products ON products.id=order_details.product_id
		LEFT JOIN users ON products.user_id = users.id 
		WHERE users.username ='$username'
		ORDER BY orders.id";
		$result=$db->query($sql);
		$result1 = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $result1;
	}
	// Admin count quantity user to order product
	public function countOrder()
	{
		$db = parent::connect();

		$sql = "SELECT id, COUNT(id) AS quantity FROM orders";
		$result = $db->query($sql);
		return $result;
	}

	public function get_email($id){
		$db= parent::connect();
		$sql="SELECT users.email, orders.user_id, orders.id FROM users,orders
		INNER JOIN orders ON orders.user_id = users.id WHERE orders.id='$id'";
		$result =$db->query($sql);
		return $result;
	}

	public function getallpageAdmin(){
		$db = parent::connect();

		$sql = $db->query("SELECT orders.id, users.username, orders.first_name, orders.last_name, orders.gender, orders.phone, orders.date_order, orders.total, orders.payment, orders.deliveryAddress, orders.note FROM orders
			LEFT JOIN users ON orders.user_id=users.id
			ORDER BY orders.id DESC");
		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		return $result;
	}
	public function select_order_detail_admin($order_id){
		$db = parent::connect();
		$sql = $db->query("SELECT order_details.quantity,order_details.price,products.prod_name,GROUP_CONCAT(images.image) as image FROM order_details
			LEFT JOIN products ON order_details.product_id=products.id
			LEFT JOIN images ON products.id = images.product_id
			WHERE order_details.order_id=$order_id
			GROUP BY products.id
			");
		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		return $result;
	}


	public function deleteOrderforAdmin($id){
		$db = parent::connect();

		$sql = "DELETE FROM orders WHERE id='$id'";
		$result =  mysqli_query($db, $sql);
		if ($result) {
			$sql1 = "DELETE FROM order_details WHERE order_id='$id'";
			$result1 = mysqli_query($db, $sql1);
		}
		return $result;
	}

	// Coding for customer add to cart

	public function addToCart($user_id, $first_name, $last_name, $gender, $phone, $total, $payment, $deliveryAddress, $note, $created_at)
	{
		$db = parent::connect();

		$sql = $db->query("INSERT INTO orders(user_id, first_name, last_name, gender, phone, total, payment, deliveryAddress, note, status,created_at,updated_at) VALUES('$user_id', '$first_name', '$last_name', '$gender', '$phone', '$total', '$payment', '$deliveryAddress', '$note', '','$created_at','')");
		$db->query($sql);
		$insert_id = $db->insert_id;
		return $insert_id;
	}

	public function adddetail($order_id, $product_id, $quantity, $price, $created_at)
	{
		$db =  parent::connect();

		$sql = $db->query("INSERT INTO order_details(order_id, product_id, quantity, price, created_at, updated_at) VALUES('$order_id', '$product_id', '$quantity', '$price','$created_at','')");
		return $sql; 
	}
	public function updatetotal($order_id, $total){
		$db=parent::connect();
		$sql="UPDATE orders SET total=$total WHERE id=$order_id";
		$result=$db->query($sql);
		return $result;
	}

	function updateQuantity($id, $quantity){
		$db = parent::connect();
		$sql = "UPDATE products SET quantity = quantity - '$quantity' WHERE id = '$id'";
		$result = $db->query($sql);
	}
	// The end coding for custmomer add to cart

	//  function delete(){
	// 	$db = parent::connect();
	// 	if (isset($_GET['id'])) {
	// 		$sql_xoa = "DELETE FROM orders WHERE id = '$_GET[id]'";
	// 		mysqli_query($db,$sql_xoa);
	// 		header('location:index.php?controller=order&action=index&page=seller');
	// 	} 
	// }

	function change_update(){
		$db = parent::connect();
		if (isset($_GET['id'])) {
			$sql_sua = "UPDATE orders SET status = 'Hóa đơn đã được gửi' WHERE id = '$_GET[id]'";
			mysqli_query($db,$sql_sua);
			header('location:index.php?controller=order&action=index&page=seller');
		}
	}
	public function doing_ship(){
		$db = parent::connect();
		if (isset($_GET[id])) {
			$sql_sua = "UPDATE orders SET status = 'Hàng đang gửi' WHERE id = '$_GET[id]'";
			mysqli_query($db,$sql_sua);

			header('location:index.php?controller=order&action=index&page=seller');
		}
	}

	public function count_order()
	{
		$db = parent::connect();
		$getcount = $db->query("SELECT id, count(id) as quantity_order FROM orders");
		$result = mysqli_fetch_all($getcount, MYSQLI_ASSOC);
		return $result;
	}
	public function send_order()
	{
		$db = parent::connect();
		$getcount = $db->query("SELECT id, count(id) as send_order FROM orders WHERE status ='Hóa đơn đã được gửi'");
		$result = mysqli_fetch_all($getcount, MYSQLI_ASSOC);
		return $result;
	}
	public function shipper_order()
	{
		$db = parent::connect();
		$getcount = $db->query("SELECT id, count(id) as shipper_order FROM orders WHERE status ='Hàng đang gửi'");
		$result = mysqli_fetch_all($getcount, MYSQLI_ASSOC);
		return $result;
	}

	public function send_email($id){

		$db=parent::connect();
		$sql ="SELECT orders.id, orders.user_id, orders.first_name, orders.last_name,orders.gender,orders.phone, orders.date_order,orders.total,orders.payment,orders.deliveryAddress,orders.note,orders.status,orders.create_at, order_details.product_id,order_details.quantity,order_details.price FROM orders
		INNER JOIN order_details ON orders.id = order_details.orders_id ORDER BY orders.id WHERE orders.id='$id'";
		$result=$db->query($sql);
		return $result; 
	}


} 
?>