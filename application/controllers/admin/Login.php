<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');

	}
	
	public function index()
	{
		is_admin_login();
		$post = $this->input->post();
		if($post){
			$admin = $this->Admin_model->selectData('admin_master','*',array('admin_email' => $post['admin_email'],'admin_password' => md5($post['admin_password'])));
			if (count($admin) > 0) {	
				$this->session->unset_userdata('admin_session');		
				$data = array('admin_id' => $admin[0]->admin_id,
					'admin_email' => $admin[0]->admin_email,
					'admin_name' => $admin[0]->admin_name);
				$this->session->set_userdata('admin_session',$data);
				$this->session->set_flashdata('success',"Login successfully!");
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('danger',"Invalid user id or password!");
				redirect('admin');
			}
		}else{
			$this->load->view('admin/login');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('admin_session');
		$this->session->set_flashdata('success',"Logout successfully!");
		redirect('admin');
	}
}
