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
		is_seller_login();
		$post = $this->input->post();
		if($post){
			$admin = $this->Admin_model->selectData('seller','*',array('s_email' => $post['s_email'],'s_password' => md5($post['s_password'])));
			if (count($admin) > 0) {	
				if($admin[0]->s_status == 'active'){
					$this->session->unset_userdata('seller_session');		
					$data = array('s_id' => $admin[0]->s_id,
						's_email' => $admin[0]->s_email,
						's_fname' => $admin[0]->s_fname);
					$this->session->set_userdata('seller_session',$data);
					$this->session->set_flashdata('success',"Login successfully!");
					redirect('seller-dashboard');
				}else if($admin[0]->s_status == 'inactive'){
					$this->session->set_flashdata('danger',"Your Account is Inactive by Admin");
					redirect('seller-login');
				}else if($admin[0]->s_status == 'pending'){
					$this->session->set_flashdata('danger',"Your Account is Pending for Approval..");
					redirect('seller-login');
				}
				
			}else{
				$this->session->set_flashdata('danger',"Invalid user id or password!");
				redirect('seller-login');
			}
		}else{
			$this->load->view('seller/login');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('seller_session');
		$this->session->set_flashdata('success',"Logout successfully!");
		redirect('seller-login');

	}
}
