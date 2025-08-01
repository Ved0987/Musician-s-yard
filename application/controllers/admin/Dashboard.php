<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		admin_login();
	}
	
	public function index()
	{
		$data['users'] = $this->Admin_model->selectData('users','*',array('u_status' => 'active'));
		$data['seller'] = $this->Admin_model->selectData('seller','*',array('s_status' => 'active'));
		$data['product'] = $this->Admin_model->selectData('product','*',array('p_status' => 'active'));
		$this->load->view('admin/dashboard',$data);
	}
}
