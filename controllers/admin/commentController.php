<?php 
/**
 * 
 */
class commentController extends adminController
{
	public function index()
	{
		$data['comment'] = Promotion::getallComment();
		parent::template('views/admin/comments/index', $data);
	}
}
 ?>