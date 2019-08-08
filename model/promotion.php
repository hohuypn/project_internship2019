<?php
/**
  * 
  */
class Promotion extends Model
{
	public function getproduct(){
		$db = parent::connect();
		$sql = $db->query("SELECT products.id, products.prod_name, products.price, products.product_type, products.quantity, products.status, products.description, categories.cate_name 
			FROM products 
			INNER JOIN categories ON products.cate_id = categories.id ORDER BY products.id");
		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		return $result;
	}

	public function insert($product_id, $price_old, $price_new, $date_start, $date_end)
	{
		$db = parent::connect();

		$sql  = $db->query("INSERT INTO promotions(product_id, price_new, price_old, date_start, date_end) VALUES('$product_id', '$price_old', '$price_new', '$date_start', '$date_end');");
		$result = mysqli_query($db, $sql);
		return $result;
	}

	public function getall($id)
	{
		$db = parent::connect();
		$sql = $db->query("SELECT promotions.id, promotions.price_old, promotions.price_new, promotions.date_start, promotions.date_end, products.prod_name
			FROM promotions 
			LEFT JOIN products ON promotions.product_id = products.id WHERE promotions.product_id = '$id' ORDER BY promotions.id");
		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		return $result;
	}
	public function getallComment()
	{
		$db = parent::connect();
		$sql = $db->query ("SELECT comments.id,comments.product_id,comments.username,comments.message,comments.date,users.image FROM comments 
		LEFT JOIN products ON products.id = comments.product_id
		LEFT JOIN users ON users.username = comments.username
		ORDER BY comments.id DESC");
		$result = mysqli_fetch_all($sql,MYSQLI_ASSOC);
		return $result;
	}

	public function get_edit($id)
	{
		$db=parent::connect();
		$sql = $db->query("SELECT * FROM promotions WHERE id = '$id'");
		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		return $result;
	}
	public function update($id, $price_new, $price_old, $date_start, $date_end)
	{
		$db = parent::connect();

		$sql = "UPDATE promotions SET price_new = '$price_new', price_old = '$price_old', date_start = '$date_start', date_end = '$date_end' WHERE id = '$id'";
		$result = mysqli_query($db, $sql);
		return $result;
	}

	public function delete($id)
	{
		$db = parent::connect();

		$sql = "DELETE FROM promotions WHERE id = '$id'";
		$result = mysqli_query($db, $sql);
		return $result;
	}
} 
?>