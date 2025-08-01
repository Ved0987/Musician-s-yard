<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Custom_model');
		$this->load->model('Admin_model');

	}
	
	public function index()
	{
		$data['homeProduct'] = $this->Custom_model->seleteHomeProduct();
		foreach ($data['homeProduct'] as $key => $value) {
			$data['homeProduct'][$key]['photos'] = $this->Admin_model->selectData('product_photo','ph_id,p_photo',array('p_id'=>$value['p_id']));
		}
		$this->load->view('user/home',$data);
	}
}
