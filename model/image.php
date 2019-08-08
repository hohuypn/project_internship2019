<?php 
/**
 * 
 */
class Image extends Model
{
	public function index($product_id){
		$db = parent::connect();
		$get_image=$db->query("SELECT images.id,images.image,products.prod_name FROM images LEFT JOIN products ON products.id = images.product_id WHERE images.product_id=$product_id ");
		$row = mysqli_fetch_all($get_image,MYSQLI_ASSOC);
		return $row;
	}

	public function delete(){
		$db = parent::connect();
		if (isset($_GET[id])) {
			$sql_xoa = "DELETE FROM images WHERE id = '$_GET[id]'";
			mysqli_query($db,$sql_xoa);
			header('location:index.php?controller=image&action=index&page=seller');
		} 
	}


}
 ?>