<?php 
/**
 * 
 */
class slideController extends adminController
{
	
	public function index()
	{
		$data['slide'] = Product::showslide();
		parent::template('views/admin/slides/index', $data);
	}

	public function add()
	{
		parent::template('views/admin/slides/add');
	}

	public function insert()
	{
		if(isset($_POST['addslide'])){
			$image='public/asset/customer/slide/'.$_FILES['images']['name'];
			move_uploaded_file($_FILES['images']['tmp_name'], 'public/asset/customer/slide/'.$_FILES['images']['name']);
			if ($image !== "" ) {
				$data = Product::insertSlide($image);
				echo "<script>
				alert('Thêm ảnh thành công! ');
				window.location.replace('index.php?controller=slide&action=index&page=admin');
				</script>";
			}else{
				echo " Không Thành công";
			}
			
		}
	}

	public function edit()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$data['editslide'] = Product::getEditSlide($id);
			parent::template('views/admin/slides/edit', $data);
		}
	}
	public function update()
	{
		if(isset($_POST['editslides'])){
			$id = $_POST['id'];
			$image='public/asset/customer/slide/'.$_FILES['images']['name'];
			move_uploaded_file($_FILES['images']['tmp_name'], 'public/asset/customer/slide/'.$_FILES['images']['name']);
			if ($image !== "" ) {
				$data = Product::updateSlide($id, $image);
				echo "<script>
				alert('Cập nhật ảnh thành công! ');
				window.location.replace('index.php?controller=slide&action=index&page=admin');
				</script>";
			}else{
				echo " Không Thành công";
			}
			
		}
	}

	public function delete(){
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$data = Product::deleteSlide($id);
			if ($data) {
				header("location: index.php?controller=slide&action=index&page=admin");
			}
			else{
				echo "<script> alert('Xóa không thành công');
				window.location.reload('index.php?controller=slide&action=index&page=admin');</script>";
			}
		}
	}
}
?>