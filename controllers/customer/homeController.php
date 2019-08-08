<?php 
/**
 * 
 */
class homeController extends customerController
{
	
	public function index()
	{
		parent::template('views/customer/homes/index');
	}
}
 ?>