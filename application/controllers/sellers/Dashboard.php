<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->seller_session=@$this->session->userdata['seller_session'];
		seller_login();
	}
	
	public function index()
	{
		$s_id = $this->seller_session['s_id'];
		$totalProducts = $this->Admin_model->selectData('product','*',array('s_id'=>$s_id));
		$data['totalProduct'] = count($totalProducts);
		$activeProducts = $this->Admin_model->selectData('product','*',array('s_id'=>$s_id,'p_status'=>'active'));
		$data['activeProduct'] = count($activeProducts);
		$this->load->view('seller/dashboard',$data);
	}
}
