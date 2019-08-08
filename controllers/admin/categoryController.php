<?php 
/**
 * 
 */
class categoryController extends adminController
{
	// Show data category
	public function index()
	{
		$data['category'] = Category::getall();
		parent::template('views/admin/categories/index', $data);
	}
	// Get tenmplate of insert category
	public function add()
	{
		parent::template('views/admin/categories/add');
	}

	// Function to insert category
	public function InsertCate()
	{
		if(isset($_POST['addCate'])){
			$cate_name = $_POST['cate_name'];
			if ($cate_name  !== "" ) {
				$addCate = Category::insertCategory($cate_name);
				if($addCate){
					header('location: index.php?controller=category&action=index&page=admin');
				}else{
					echo "Thêm danh mục không thành công";
				}
			}else{
				echo "Dữ liệu trống";
			}
		}
	}

	// Get id to show category want update
	public function edit()
	{
		if (isset($_GET['id'])) {
			$data['cateselect'] = Category::get_edit($_GET['id']);
			parent::template('views/admin/categories/edit',$data);
		}
	}

	// Function to update category
	public function update()
	{
		if(isset($_POST['editCate'])){
			$cate_name = $_POST['cate_name'];
			$id = $_POST['id'];
			if ($cate_name !== "" ) {
				$data = Category::update($id, $cate_name);
				if ($data) {
					header('location: index.php?controller=category&action=index&page=admin');
				}
				else{
					echo "Cập nhật chưa thành công";
				}
			}else{
				echo "Cập nhật không thành công";
			}
		}
	}

	// Function to delete category
	public function delete(){
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$data = Category::delete($id);
			if ($data) {
				echo "<script> alert('Xóa thành công');
					window.location.href('index.php?controller=category&action=index&page=admin');</script>";
			}
			else{
				echo "<script> alert('Xóa không thành công');
					window.location.href('index.php?controller=category&action=index&page=admin');</script>";
			}
		}
	}
}
?>