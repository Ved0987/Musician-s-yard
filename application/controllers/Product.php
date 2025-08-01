<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->admin_session=@$this->session->userdata['user_session'];
	}
	
	public function index()
	{
	}
	public function product_details($id='')
	{
		$data['product'] = $this->Admin_model->selectData('product','*',array('p_id'=>$id,'p_status' =>'active'));
		$data['product'][0]->photos = $this->Admin_model->selectData('product_photo','ph_id,p_photo',array('p_id'=>$id));
		$this->load->view('user/product-details',$data);
	}

	public function add_cart()
	{
		$post = $this->input->post();
		$u_id= $this->admin_session['user_id'];
		$data = array('p_id' => $post['p_id'],
			's_id' => $post['s_id'],
			'u_id' => $u_id,
			'qty' => $post['quantity']);
		$c_id = $this->Admin_model->insertData('cart',$data);
		echo json_encode($c_id);
	}

	public function delete_cart()
	{
		$post = $this->input->post();
		$del = $this->Admin_model->deleteData('cart',array('c_id' => $post['c_id']));
		if($del){
			$this->session->set_flashdata('success',"Product Removed successfully!");
		}else{
			$this->session->set_flashdata('error',"Something Went Wrong!");
		}
		echo 'success';
	}
	public function update_cart()
	{
	$post = $this->input->post();
		$update = $this->Admin_model->updateData('cart',array('qty'=>$post['qty']),array('c_id'=>$post['c_id']));
		if($update){
			$this->session->set_flashdata('success',"Quantity Updated successfully!");
		}else{
			$this->session->set_flashdata('error',"Something Went Wrong!");
		}	
		echo 'success';	
	}
}
