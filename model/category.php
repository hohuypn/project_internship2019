<?php 
/**
 * 
 */
class Category extends Model
{
	public function getall()
	{
		$db = parent::connect();
		$sql = $db->query("SELECT * FROM categories");
		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		return $result;
	}

	public function insertCategory($cate_name)
	{
		$db = parent::connect();
		$sql = "INSERT INTO categories(cate_name)
		VALUES ('$cate_name');";
		$result = mysqli_query($db, $sql);
		return $result;
	}

	public function get_edit($id)
	{
		$db=parent::connect();
		$sql = $db->query("SELECT * FROM categories WHERE id = '$id'");
		$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		return $result;
	}

	public function update($id, $cate_name)
	{
		$db = parent::connect();

		$sql = "UPDATE categories SET cate_name = '$cate_name' WHERE id = '$id'";
		$result = mysqli_query($db, $sql);
		return $result;
	}

	public function delete($id)
	{
		$db = parent::connect();

		$sql = "DELETE FROM categories WHERE id = '$id'";
		$result = mysqli_query($db, $sql);
		return $result;
	}
}
 ?>