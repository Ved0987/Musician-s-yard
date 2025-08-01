<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Custom_model');
		$this->load->model('Admin_model');
	}
	
	public function index()
	{
		$get = $this->input->get();
		if($get){
			$data['get'] = $get['menu'];
			$data['product'] = $this->Admin_model->selectData('product','*',array('p_status' => 'active','p_menu' => $get['menu']));
		}else{
			$data['get'] = '';
			$data['product'] = $this->Admin_model->selectData('product','*',array('p_status' => 'active'));
		}
		$data['menuFilter'] = $this->Admin_model->selectData('menu','*',array('m_status'=>'active'));
		foreach ($data['product'] as $key => $value) {
			$data['product'][$key]->product_img = $this->Admin_model->selectData('product_photo','p_photo',array('p_id' => $value->p_id));
		}
		$this->load->view('user/shop',$data);
	}
}
