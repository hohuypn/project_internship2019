<?php 
/**
 * 
 */
class promotionController extends adminController
{

	// Function to show form insert promotion for product
	public function index()
	{
		if (isset($_GET['id'])) {
			$data['id_product'] = Product::get_edit($_GET['id']);
			parent::template('views/admin/promotions/index', $data);
		}
	}
	// Function to insert data for promotion table
	public function add()
	{
		if(isset($_POST['adPromotion'])){
			$product_id = $_POST['product_id'];
			$price_new = $_POST['price_old'];
			$price_old = $_POST['price_new'];
			$date_end = $_POST['date_end'];
			if ($product_id && $price_old && $price_new && $date_end !== "" ) {
				$add = Promotion::insert($product_id, $price_old, $price_new, date('Y-m-d'), $date_end);
				if($add){
					echo "Không thành công";
				}else{
					header("location: index.php?controller=product&action=index&page=admin");
				}
			}else{
				echo "Dữ liệu trống";
			}
		}
	}
	// Funtion to show promotion of product by id
	public function viewpromotion()
	{
		if (isset($_GET['id'])) {
			$data['view_promotion'] = Promotion::getall($_GET['id']);
			parent::template('views/admin/promotions/view', $data);
		}		
	}
	public function edit()
	{
		if (isset($_GET['id'])) {
			$data['promotionselect'] = Promotion::get_edit($_GET['id']);
			parent::template('views/admin/promotions/edit',$data);
		}
	}
	public function update()
	{
		if(isset($_POST['updatePromotion'])){
			$id = $_POST['id'];
			$price_old = $_POST['price_old'];
			$price_new = $_POST['price_new'];
			$date_end = $_POST['date_end'];
			if ($cate_name !== "" ) {
				$data = Promotion::update($id, $price_new, $price_old, date('Y-m-d'), $date_end);
				if ($data) {
					header('location: index.php?controller=product&action=index&page=admin');
				}
				else{
					echo "Cập nhật chưa thành công";
				}
			}else{
				echo "Cập nhật không thành công";
			}
		}
	}
	public function delete(){
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$data = Promotion::delete($id);
			if ($data) {
				echo "<script> alert('Xóa thành công');
					window.location.reload('index.php?controller=product&action=index&page=admin');</script>";
			}
			else{
				echo "<script> alert('Xóa không thành công');
					window.location.reload('index.php?controller=promotion&action=index&page=admin');</script>";
			}
		}
	}
}
?>