<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Custom_model');
		$this->load->model('Admin_model');
		$this->admin_session=@$this->session->userdata['user_session'];
		//user_login();
	}
	
	public function index()
	{
		$u_id= $this->admin_session['user_id'];
		$data['user_details'] = $this->Admin_model->selectData('users','*',array('u_id' => $u_id));
		$data['getCart'] = $this->Admin_model->selectData('cart','*',array('u_id'=>$u_id));
		foreach ($data['getCart'] as $key => $value) {
			$data['getCart'][$key]->product = $this->Admin_model->selectData('product','*',array('p_id' => $value->p_id));
			$data['getCart'][$key]->product_img = $this->Admin_model->selectData('product_photo','*',array('p_id' => $value->p_id));
		}
		// echo '<pre>';print_r($data);exit;
		$this->load->view('user/checkout',$data);		
	}

	public function place_order()
	{
		$u_id= $this->admin_session['user_id'];
		$data['getCart'] = $this->Admin_model->selectData('cart','*',array('u_id'=>$u_id));
		$order_master = array('u_id' => $u_id,
			's_id' => $data['getCart'][0]->s_id,
			'payment_type' => 'COD',
			'o_date' => date('Y-m-d'),
			'o_status' => 'Pending');
		$finalTotal = 0;
		$o_id = $this->Admin_model->insertData('order_master',$order_master);
		if($o_id){
			foreach ($data['getCart'] as $key => $value) {
				$data['getCart'][$key]->product = $this->Admin_model->selectData('product','*',array('p_id' => $value->p_id));
				$qty = intval($value->qty);
				$product_price = intval($value->product[0]->p_price);
				$total_Pd_price = $qty * $product_price;
				$finalTotal = $finalTotal + $total_Pd_price;
				$order_items = array(
					'o_id' => $o_id,
					'p_id' => $value->p_id,
					'qty' => $value->qty,
					'price' => $total_Pd_price);
				$oi_id = $this->Admin_model->insertData('order_items',$order_items);
				$update = $this->Admin_model->updateData('order_master',array('total' => $finalTotal),array('o_id'=>$o_id));
				if($oi_id){
					$this->Admin_model->deleteData('cart',array('u_id',$u_id));
				}
				$this->session->set_flashdata('success',"Order Placed successfully!");
			}
				redirect(base_url());
		}else{
			$this->session->set_flashdata('error',"Something Went Wrong!");
			redirect('checkout');
		}
	}

}
