<?php 
/**
 * 
 */
class productController extends adminController
{
	
	public function index()
	{
		$data['product'] = Product::getallforadmin();
		parent::template('views/admin/products/index', $data);
	}
}
 ?>