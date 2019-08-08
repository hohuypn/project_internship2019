<?php 
/**
 * 
 */
class productController extends customerController
{
	public function index()
	{
		$data['select_slide']= Product::showslide();
		$data['select_cate']= Product::showscategory();
		$data['select_product']= Product::showproductindex();
		$data['select_producthot']= Product::showproducthot();
		$data['select_productpromotion']= Product::showproductpromotion();
		parent::template('views/customer/product/index',$data);
	}

	public function product(){
		$data['select_slide']= Product::showslide();
		$data['select_cate']=$categories= Product::showscategory();
		foreach ($categories as $key => $value) {
			$product=Product::getwithcat($value['id']);
			$data['select_cate'][$key]['product']=$product;
		}
		parent::template('views/customer/product/product',$data);
	}
	public function productdetail(){
		if (isset($_GET['id'])) {
			$data['select_productdetail']=Product::showProductDetail($_GET['id']);
			$data['select_productview']=Product::changeView($_GET['id']);
			$data['select_productcate']=Product::showProductcate($data['select_productdetail']['cate_id'],$_GET['id']);
			$data['select_cate']= Product::showscategory();
			$data['select_productpromotion']= Product::showproductpromotion();
			$data['select_comment']=Product::showlistcomment($_GET['id']);
			parent::template('views/customer/product/productDetail',$data);
		}

	}
	public function productCate(){
		if (isset($_GET['id'])) {
			$data['select_slide']= Product::showslide();
			$data['select_cate']=$categories= Product::showscategory();
			$product=Product::getwithcate($_GET['id']);
			$data['select_cate']['']['product']=$product;
			parent::template('views/customer/product/productCate',$data);
		}
	}

	public function aboutUs(){
		$data['select_cate']= Product::showscategory();
		parent::template('views/customer/product/aboutUs',$data);
	}
	public function contactUs(){
		$data['select_cate']= Product::showscategory();
		parent::template('views/customer/product/contactUs',$data);
	}
	public function addcomment(){
			if (isset($_POST['product_id'])) {
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				$id = $_POST['product_id'];
				$username = $_SESSION['username'];
				$message = $_POST['message'];
				$date= date('Y-m-d H:i:s');
				Product::insertcomment($id,$username,$message,$date);
				$select_comment=Product::showlistcomment($id);
				include "views/customer/product/comment_ajax.php";die;
			}
		die;
	}
	// public function listcomment(){
	// 	if (isset($_GET['id'])) {
	// 		$data['select_comment']=Product::showlistcomment($_GET['id']);
	// 	}	
	// 	//parent::template('views/customer/product/productDetail',$data);
	// }

	public function findproduct(){
		$key=$_POST['tukhoa'];
		$select_find=Product::searchProduct(strtolower($key));
		include_once 'views/customer/product/productFind.php';
	}

	



}

?>