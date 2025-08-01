<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Custom_model');
		$this->load->model('Admin_model');
		$this->admin_session=@$this->session->userdata['user_session'];

	}
	
	public function index()
	{
		$u_id = $this->admin_session['user_id'];
		$data['order_master'] = $this->Admin_model->selectData('order_master','*',array('u_id' => $u_id));
		$data['user_details'] = $this->Admin_model->selectData('users','*',array('u_id' => $u_id));
		foreach ($data['order_master'] as $key => $value) {
			$data['order_master'][$key]->item = $this->Admin_model->selectData('order_items','*',array('o_id' => $value->o_id));
			foreach ($data['order_master'][$key]->item as $ikey => $ivalue) {
				$data['order_master'][$key]->item[$ikey]->product = $this->Admin_model->selectData('product','*',array('p_id' => $ivalue->p_id));
				$data['order_master'][$key]->item[$ikey]->product_img = $this->Admin_model->selectData('product_photo','*',array('p_id' => $ivalue->p_id));
			}
		}
		$this->load->view('user/order',$data);
	}

	public function orderDetails($id='')
	{
		
		$data['order_master'] = $this->Admin_model->selectData('order_master','*',array('o_id' => $id));
		$data['user_details'] = $this->Admin_model->selectData('users','*',array('u_id' => $data['order_master'][0]->u_id));
		$data['order_items'] = $this->Admin_model->selectData('order_items','*',array('o_id' => $id));
		foreach ($data['order_items'] as $key => $value) {
				$data['order_items'][$key]->product = $this->Admin_model->selectData('product','*',array('p_id' => $value->p_id));
			$data['order_items'][$key]->product_img = $this->Admin_model->selectData('product_photo','*',array('p_id' => $value->p_id));
		}
		$this->load->view('user/order-detail',$data);
	}
}