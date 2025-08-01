<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->seller_session=@$this->session->userdata['seller_session'];
		seller_login();
	}
	
	public function index()
	{
		$get = $this->input->get();
		if($get){
			$status = $get['status'];
			$data['order'] = $this->Admin_model->selectData('order_master','*',array('s_id' => $this->seller_session['s_id'],'o_status'=>$status));
			$data['filteStatus'] = $get['status'];
		}else{
			$data['order'] = $this->Admin_model->selectData('order_master','*',array('s_id' => $this->seller_session['s_id']));
		}
		$this->load->view('seller/order/order-list',$data);
	}
	public function orderDetails($id='')
	{
		$s_id = $this->seller_session['s_id'];
		$data['order_master'] = $this->Admin_model->selectData('order_master','*',array('o_id' => $id));
		$data['user_details'] = $this->Admin_model->selectData('users','*',array('u_id' => $data['order_master'][0]->u_id));
		$data['order_items'] = $this->Admin_model->selectData('order_items','*',array('o_id' => $id));
		foreach ($data['order_items'] as $key => $value) {
				$data['order_items'][$key]->product = $this->Admin_model->selectData('product','*',array('p_id' => $value->p_id));
			$data['order_items'][$key]->product_img = $this->Admin_model->selectData('product_photo','*',array('p_id' => $value->p_id));
		}
		$this->load->view('seller/order/order-details',$data);
	}

	public function updateStatus()
	{
		$post = $this->input->post();
		$update = $this->Admin_model->updateData('order_master',array('o_status' => $post['value']),array('o_id'=>$post['id']));
		if($update){
			$this->session->set_flashdata('success',ucfirst($post['value'])." "." successfully!");
			echo 'success';
		}else{
			$this->session->set_flashdata('danger',"Something Went Wrong!!");
			echo 'fail';
		}
	}
}
