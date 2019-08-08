<?php 
class imageController extends sellerController
{
	
	public function index()
	{
		$product_id=$_GET['product_id'];
		$data['select_image'] = Image::index($product_id);
		parent::template('views/seller/image/index',$data);
	}
	
	public function upload(){
		if (isset($_POST['themanh'])) {
			$product_id = $_POST['product_id'];
			$hinhanh = $_FILES['hinhanh']['name'];
			$total = count($_FILES['hinhanh']['name']);

			for( $i=0 ; $i < $total ; $i++ ) {
				$tmpFilePath = $_FILES['hinhanh']['tmp_name'][$i];
				if ($tmpFilePath != ""){
					$newFilePath = "public/asset/seller/images/" . $_FILES['hinhanh']['name'][$i];
					if(move_uploaded_file($tmpFilePath, $newFilePath)) {
					}
					$data['them_image'] = Image::add($product_id, $hinhanh);
				}
			}
		}
	}
	public function delete(){
		$data['xoa_image'] = Image::delete();
	}
}
?>