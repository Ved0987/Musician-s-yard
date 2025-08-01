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
		$this->load->library('user_agent');
		if ($this->agent->is_referral())
		{
			echo $this->agent->referrer();
		}
		is_user_login();
		$post = $this->input->post();
		if($post){
			$user = $this->Admin_model->selectData('users','*',array('u_email' => $post['u_email'],'u_password' => md5($post['u_password']),'u_status' => 'active'));
			if (count($user) > 0) {	
				$this->session->unset_userdata('user_session');		
				$data = array('user_id' => $user[0]->u_id,
					'user_email' => $user[0]->u_email,
					'user_name' => $user[0]->u_fname.' '.$user[0]->u_lname);
				$this->session->set_userdata('user_session',$data);
				$this->session->set_flashdata('success',"Login successfully!");
				if(isset($_SESSION['temp_url'])){
						redirect($_SESSION['temp_url']);
					}else{
						redirect('user-login');
					}
			}else{
				$this->session->set_flashdata('danger',"Invalid user id or password!");
				redirect('user-login');
			}
		}else{
			$_SESSION['temp_url']=$this->agent->referrer();
			$this->load->view('user/login');
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('success',"Logout successfully..!");
		redirect(base_url());
	}
}
