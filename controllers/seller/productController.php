<?php 
/**
 * 
 */
class productController extends sellerController
{
	public function index()
	{
		if (isset($_SESSION['usernameseller'])) {
			$username = $_SESSION['usernameseller'];
		}
		$data['select_product'] = Product::getall($username);
		parent::template('views/seller/product/index',$data);
	}
	// Lấy form thêm
	public function add()
	{
		if (isset($_SESSION['usernameseller'])) {
			$username = $_SESSION['usernameseller'];
		}
	   		
		 $data['select_cate'] =Category::getall();
		 $data['select_user_id'] = User::get_id($username);
		parent::template('views/seller/product/add',$data); // xoa $data
	}

	public function indeximage()
	{
		$data['select_product'] = Product::getimage();
		parent::template('views/seller/product/add_images',$data);
	}
	// Thực hiện thêm sản phẩm
	public function create()
	{
		if(isset($_POST['themsp'])){
			$image = array();
			if(isset($_FILES['hinhanh']) &&!empty($_FILES['hinhanh']['name'])){
				$file_upload = $_FILES['hinhanh'];
				foreach ($file_upload['name'] as $key => $value) {
					$tmpFilePath = $_FILES['hinhanh']['tmp_name'][$key];
					if ($tmpFilePath != ""){
						$newFilePath = "public/asset/seller/images/" . $_FILES['hinhanh']['name'][$key];
						if(move_uploaded_file($tmpFilePath, $newFilePath)) {
							$image[] = $newFilePath;
						}
					}
				}
			}
			$tensp = $_POST['prod_name'];
			$gia = $_POST['price'];
			$chatlieu = $_POST['product_type'];
			$ngaythem = $_POST['date_add'];
			$mieuta = $_POST['description'];
			$maloai = $_POST['cate_id'];
			$masp = $_POST['sku'];
			$tinhtrang = $_POST['status'];
			$soluong = $_POST['quantity'];
			$user_id=$_POST['user_id'];
				$themsp =Product::add_product($tensp, $gia, $chatlieu, $ngaythem, $mieuta, $maloai, $masp, $tinhtrang,$image,$soluong,$user_id);
				if($themsp){
					header('location:index.php?controller=product&action=index&page=seller');
				}else{
					echo " Không Thành công";
				}
			
			}
		}
	
// lấy form thêm ảnh
	public function add_images()
	{
		parent::template('views/seller/product/add_images');
	}
	// Lấy form edit
	public function edit()
	{
		if (isset($_GET['id'])) {
			$data['select_product'] = Product::get_edit($_GET['id']);
			 $data['select_cate'] = Category::getall();
			parent::template('views/seller/product/edit',$data); // xoa $data
		}else {
			echo "Show ko thành công";
		}
	}
	public function update()
	{
		if(isset($_POST['suasp'])){
			$image = array();
			if(isset($_FILES['hinhanh']) &&!empty($_FILES['hinhanh']['name'])){
				$file_upload = $_FILES['hinhanh'];
				foreach ($file_upload['name'] as $key => $value) {
					$tmpFilePath = $_FILES['hinhanh']['tmp_name'][$key];
					if ($tmpFilePath != ""){
						$newFilePath = "public/asset/seller/images/" . $_FILES['hinhanh']['name'][$key];
						if(move_uploaded_file($tmpFilePath, $newFilePath)) {
							$image[] = $newFilePath;
						}
					}
				}
			}
			$tensp = $_POST['prod_name'];
			$gia = $_POST['price'];
			$chatlieu = $_POST['product_type'];
			$ngaythem = $_POST['date_add'];
			$mieuta = $_POST['description'];
			$maloai = $_POST['cate_id'];
			$masp = $_POST['sku'];
			$tinhtrang = $_POST['status'];
			$soluong = $_POST['quantity'];
			
				$data['sua_product']=Product::update_product($tensp, $gia, $chatlieu, $ngaythem, $mieuta, $maloai, $masp, $tinhtrang,$soluong,$image);
				header('location:index.php?controller=product&action=index&page=seller');
			}else{
				echo " Không Thành công";
			}
		
	}
	public function change_status()
	{
		if (isset($_GET['id'])) {
			$id =$_GET['id'];
			$data= Product::change_update($id);
			header('location:index.php?controller=product&action=index&page=seller');
		}
	}	
	public function delete(){
		if (isset($_GET['id'])) {
			$data= Product::delete_product();
		header('location: index.php?controller=product&action=index&page=seller');
		}
		
	}
	public function delete_order(){
		$data['xoa_order'] = Product::delete_order();
	}
	public function search()
	{
		if (isset($_POST['prod_name'])) {
			$prod_name=$_POST['prod_name'];
			$data['search_product']=Product::search_seller($prod_name);
			parent::template('views/seller/product/search',$data);
		}
	}
	public function send_email(){
		if (isset($_GET['id'])) {
			$thongtinhoadon=Product::send_email($_GET['id']);
		}
		
	}
}
?>