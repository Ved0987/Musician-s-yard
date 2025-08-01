<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Custom_model');
		$this->load->model('Admin_model');
		$this->admin_session=@$this->session->userdata['user_session'];
		user_login();
	}
	
	public function index()
	{
		$u_id= $this->admin_session['user_id'];
		$data['getCart'] = $this->Admin_model->selectData('cart','*',array('u_id'=>$u_id));
		foreach ($data['getCart'] as $key => $value) {
			$data['getCart'][$key]->product = $this->Admin_model->selectData('product','*',array('p_id' => $value->p_id));
			$data['getCart'][$key]->product_img = $this->Admin_model->selectData('product_photo','*',array('p_id' => $value->p_id));
		}
		$this->load->view('user/cart',$data);
	}
}
