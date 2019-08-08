<?php
/**
 * 
 */
class Product extends Model
{

	// get id to edit
	public function get_edit($id)
	{
		$db=parent::connect();
		$sql = $db->query("SELECT * FROM products WHERE id = '$id'");
		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		return $result;
	}

	// show product into admin page
	public function getallforadmin(){
		$db = parent::connect();
		$sql = $db->query('SELECT products.id, products.prod_name, products.price, products.product_type, products.quantity, products.status, products.description, categories.cate_name 
			FROM products 
			INNER JOIN categories ON products.cate_id = categories.id ORDER BY products.id');
		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		return $result;
	}


	public function getall($username){
		$db = parent::connect();
		$sql = $db->query("SELECT products.id, products.date_add, products.prod_name, products.price, products.product_type, products.quantity,products.sku, products.status, products.description, categories.cate_name, products.user_id,users.username 
			FROM products 
			INNER JOIN categories ON products.cate_id = categories.id
			INNER JOIN users ON products.user_id = users.id WHERE users.username='$username'
			ORDER BY products.id");
		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		return $result;
	}
	// Create function add slide show
	public function insertSlide($image)
	{
		$db = parent::connect();

		$sql = " INSERT INTO slides(image) VALUES ('$image');";
		$result = mysqli_query($db,$sql);
		return $result;
	}

	public function getEditSlide($id)
	{
		$db=parent::connect();
		$sql = $db->query("SELECT * FROM slides WHERE id = '$id'");
		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		return $result;
	}

	public function updateSlide($id, $image)
	{
		$db = parent::connect();

		$sql = "UPDATE slides SET image = '$image' WHERE id = '$id'";
		$result = mysqli_query($db, $sql);
		return $result;
	}

	public function deleteSlide($id)
	{
		$db = parent::connect();

		$sql = "DELETE FROM slides WHERE id = '$id'";
		$result = mysqli_query($db, $sql);
		return $result;
	}

	public function showslide(){
		$db = parent::connect();
		$sql = $db->query('SELECT * FROM slides');
		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		return $result;
	}
	public function showscategory(){
		$db = parent::connect();
		$sql = $db->query('SELECT * FROM categories');
		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		return $result;
	}
	public function showproductindex(){
		$db = parent::connect();
		$sql = $db->query('SELECT products.id,products.prod_name,products.price,  GROUP_CONCAT(images.image) AS image, promotions.price_new FROM products
			LEFT JOIN images ON products.id = images.product_id
			LEFT JOIN promotions ON products.id=promotions.product_id AND promotions.date_start<= CURRENT_DATE AND promotions.date_end>=CURRENT_DATE
			GROUP BY products.id LIMIT 20');
		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		return $result;
	}
	public function getwithcat($cate_id){ //select các sp theo danh mục
		$db = parent::connect();
		$sql = $db->query("SELECT products.id,products.prod_name,products.price,  GROUP_CONCAT(images.image) AS image,products.cate_id, promotions.price_new FROM products
			LEFT JOIN images ON products.id = images.product_id
			LEFT JOIN promotions ON products.id=promotions.product_id AND promotions.date_start<= CURRENT_DATE AND promotions.date_end>=CURRENT_DATE
			WHERE products.cate_id=$cate_id
			GROUP BY products.id ");
		if($sql->num_rows>=3){ //lấy product nào có insert sp lớn hơn 4
			$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
			return $result;
		}
		return array();
		
	}
		public function getwithcate($cate_id){//tìm kiếm theo danh mục
			$db = parent::connect();
			$sql = $db->query("SELECT products.id,products.prod_name,products.price,  GROUP_CONCAT(images.image) AS image,products.cate_id,categories.cate_name, promotions.price_new FROM products
				LEFT JOIN images ON products.id = images.product_id
				LEFT JOIN categories ON products.cate_id = categories.id
				LEFT JOIN promotions ON products.id=promotions.product_id AND promotions.date_start<= CURRENT_DATE AND promotions.date_end>=CURRENT_DATE
				WHERE products.cate_id=$cate_id 
				GROUP BY products.id ");
		if($sql->num_rows>=1){ //lấy product nào có insert sp lớn hơn 4
			$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
			return $result;
		}
		return array();
		
	}

	public function showproducthot(){
		$db = parent::connect();
		$sql = $db->query('SELECT products.id,products.prod_name,products.price,  GROUP_CONCAT(images.image) AS image, promotions.price_new,products.views FROM products
			LEFT JOIN images ON products.id = images.product_id
			LEFT JOIN promotions ON products.id=promotions.product_id AND promotions.date_start<= CURRENT_DATE AND promotions.date_end>=CURRENT_DATE
			GROUP BY products.id
			ORDER BY products.views DESC  LIMIT 12');
		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		return $result;
	}
	public function showproductpromotion(){
		$db = parent::connect();
		$sql = $db->query("SELECT products.id,products.prod_name,products.price,promotions.price_new,GROUP_CONCAT(images.image) AS image FROM products
			LEFT JOIN images ON products.id = images.product_id
			INNER JOIN promotions ON products.id=promotions.product_id AND promotions.date_start<= CURRENT_DATE AND promotions.date_end>=CURRENT_DATE
			GROUP BY products.id
			ORDER BY promotions.price_new DESC");
		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		return $result;
	}
	public function changeView($id){
		$db = parent::connect();
		$sql = $db->query( "UPDATE products SET views = views+1 WHERE products.id='$id'");
		return $sql;
	}
	public function showProductDetail($id){
		$db = parent::connect();
		$sql = $db->query("SELECT products.id,products.prod_name,products.price,products.product_type,products.quantity,products.description,products.cate_id,products.sku,categories.cate_name,GROUP_CONCAT(images.image) AS image, promotions.price_new,products.views FROM products
			LEFT JOIN images ON products.id = images.product_id
			LEFT JOIN categories ON products.cate_id = categories.id
			LEFT JOIN promotions ON products.id=promotions.product_id AND promotions.date_start<= CURRENT_DATE AND promotions.date_end>=CURRENT_DATE
			WHERE products.id = $id 
			GROUP BY products.id");
		$result = mysqli_fetch_assoc($sql);
		return $result;
	}
	public function showProductcate($cate_id,$id){
		$db = parent::connect();
		$sql = $db->query("SELECT products.id,products.prod_name,products.price,promotions.price_new,GROUP_CONCAT(images.image) AS image FROM products
			LEFT JOIN images ON products.id = images.product_id
			INNER JOIN categories ON products.cate_id = categories.id
			LEFT JOIN promotions ON products.id=promotions.product_id AND promotions.date_start<= CURRENT_DATE AND promotions.date_end>=CURRENT_DATE
			WHERE products.cate_id=$cate_id  AND products.id!=$id 
			GROUP BY products.id LIMIT 12");
		$result = mysqli_fetch_all($sql,MYSQLI_ASSOC);
		return $result;
	}
	public function showlistcomment($id){
		$db = parent::connect();
		$sql = $db->query ("SELECT comments.id,comments.product_id,comments.username,comments.message,comments.date,users.image FROM comments 
		LEFT JOIN products ON products.id = comments.product_id
		LEFT JOIN users ON users.username = comments.username
		WHERE products.id = '$id' 
		ORDER BY comments.id DESC");
		$result = mysqli_fetch_all($sql,MYSQLI_ASSOC);
		return $result;
	}
	public function insertcomment($product_id, $username, $message, $date){ //id của sp bình luận
		$db = parent::connect();
		$sql = "INSERT INTO comments(product_id, username, message,date) VALUES ($product_id,'$username','$message','$date')";
		$result = $db->query($sql);
		return $result;
	 }
	public function searchProduct($key){
		$db = parent::connect();
		$query="SELECT products.id,products.prod_name,products.price,  GROUP_CONCAT(images.image) AS image, promotions.price_new FROM products
			LEFT JOIN images ON products.id = images.product_id
			LEFT JOIN promotions ON products.id=promotions.product_id AND promotions.date_start <= CURRENT_DATE AND promotions.date_end >= CURRENT_DATE
			WHERE LOWER(products.prod_name) LIKE '%$key%'		
				GROUP BY products.id";	
		$sql = $db->query($query);
		$result = mysqli_fetch_all($sql,MYSQLI_ASSOC);
		return $result;
	}

	public function selectProductCart($product_id){
		$db = parent::connect();
		$sql = $db->query("SELECT products.id, products.prod_name, products.price, images.image, promotions.price_new FROM products
			LEFT JOIN images ON products.id = images.product_id
			LEFT JOIN promotions ON products.id = promotions.product_id AND promotions.date_start<= CURRENT_DATE AND promotions.date_end>=CURRENT_DATE
			WHERE products.id IN $product_id
			GROUP BY products.id");
		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		return $result;
	}

	//end model for custommer


	public function change_update(){
		$db = parent::connect();
		if (isset($_GET['id'])) {
			$sql =$db->query("UPDATE products SET status='Hết Hàng' WHERE id='$_GET[id]'");
			$result = mysqli_query($sql);
			return $result;
		}
		
	}
	public function add_product($prod_name,$price,$product_type,$date_add,$description,$cate_id,$sku,$status,$image,$quantity,$user_id){
		$db=parent::connect();
		$sql="INSERT INTO products(prod_name,price,product_type,quantity,date_add,description,cate_id,sku,status,user_id) VALUES('$prod_name','$price','$product_type',$quantity,'$date_add','$description','$cate_id','$sku','$status',$user_id)";
		$result=$db->query($sql);
		if ($result) {
			$product_id=$db->insert_id;
			foreach ($image as $key => $value) {
				$sql_image=$db->query("INSERT INTO images(product_id,image) VALUES($product_id,'$value')");
			}
			return $result;
		};
	}

	public function update_product($prod_name,$price,$product_type,$date_add,$description,$cate_id,$sku,$status,$quantity,$image)
	{
		$db=parent::connect();
		if (isset($_GET['id'])) {
			$product_id=$_GET['id'];
			$sql="UPDATE products SET prod_name='$prod_name',price='$price',product_type='$product_type',date_add='$date_add',description='$description', cate_id='$cate_id',sku='$sku',status='$status',quantity=$quantity WHERE id='$_GET[id]'";
			$result=$db->query($sql);
			if (isset($result)) {
				$sql_xoa = "DELETE FROM images WHERE product_id='$_GET[id]'";
				mysqli_query($db,$sql_xoa);
				foreach ($image as $key => $value) {
					$sql_image="INSERT INTO images(product_id,image) VALUES($product_id,'$value')";
					$result_image=$db->query($sql_image);
				}
			}
			return $result;
		}
		

	}

	

	public function delete_product(){
		$db = parent::connect();
		if (isset($_GET['id'])) {
			$product_id= $_GET['id'];
			$sql = "DELETE * FROM products WHERE id='$_GET[id]'";
			mysqli_query($db,$sql);
			if ($result) {
				$sql_xoa = "DELETE * FROM images WHERE product_id='$_GET[id]'";
				mysqli_query($db,$sql_xoa);
			}
			return $result;
		}	

	}

	public function search_seller($prod_name){
		$db=parent::connect();
		if (isset($_REQUEST['timkiem'])){
			$search_product=$db->query("SELECT * FROM products WHERE prod_name LIKE '%$prod_name%'");
			$row = mysqli_fetch_all($search_product,MYSQLI_ASSOC);
			return $row;
		}
	}

	public function count_product()
	{
		$db = parent::connect();
		$getcount = $db->query("SELECT id, count(id) as quantity_product FROM products");
		$result = mysqli_fetch_all($getcount, MYSQLI_ASSOC);
		return $result;
	}

	public function send_email($id){
		$db = parent::connect();
		if (isset($_POST['dathang'])) {
			$sql =" SELECT orders.id, orders.user_id, orders.first_name, orders.last_name,orders.gender,orders.phone, orders.date_order,orders.total,orders.payment,orders.deliveryAddress,orders.note,orders.status,orders.create_at, order_details.product_id,order_details.quantity,order_details.price FROM orders
			 INNER JOIN order_details ON orders.id = order_details.orders_id ORDER BY orders.id WHERE orders.id='$id'";
		$result=$db->query($sql);
		 $diachinhan=" SELECT users.username FROM users INNER JOIN orders.user_id = users.id WHERE users.id ='$id'";
		$result_diachinhan=$db->query($diachinhan);
		$mailSubject ="SHOPPY Cam - Quyet - Huy";
		while ($dong=mysqli_fetch_array($result,MYSQLI_BOTH)) {
			$bodyContent = "Thông tin đơn hàng:<br>---------------<br>Mã Đơn Hàng:".$dong['id']."<br>Mã Khách Hàng: ".$dong['user_id']."<br> Họ : ".$dong['first_name']."Tên: ".$dong['last_name']."<br>Giới tính: ".$dong['gender']."<br>Số điện thoại: ".$dong['phone']."<br>Ngày đặt hàng: ".$dong['date_order']."<br>Tổng số tiền: ".$dong['total']."<br>Hình thức thanh toán: ".$dong['payment']."<br>Địa chỉ giao hàng: ".$dong['deliveryAddress']."<br>Ghi chú: ".$dong['note']."<br>Trạng thái hóa đơn: ".$dong['status']."<br>Ngày tạo hóa đơn: ".$dong['create_at']."<br>Mã sản phẩm: ".$dong['product_id']."<br>Tổng số sản phẩm: ".$dong['quantity']."<br>Giá sản phẩm: ".$dong['price']."<br>----------------------------------<br> Đơn hàng của bạn đã được xác nhận";
		}
		$donhang=parent::sendMail($diachinhan,$mailSubject,$bodyContent);
		}
		return $donhang;
	}

	public function deletCart($id){
		$db = parent::connect();
		
		$sql = $db->query("SELECT products.id,products.prod_name,products.price,products.product_type,products.quantity,products.description,products.cate_id,products.sku,categories.cate_name,GROUP_CONCAT(images.image) AS image, promotions.price_new,products.views FROM products
			LEFT JOIN images ON products.id = images.product_id
			LEFT JOIN categories ON products.cate_id = categories.id
			LEFT JOIN promotions ON products.id=promotions.product_id AND promotions.date_start<= CURRENT_DATE AND promotions.date_end>=CURRENT_DATE
			WHERE products.id = $id 
			GROUP BY products.id");
		$result = mysqli_fetch_assoc($sql);
		return $result;
	}

		


}
?>