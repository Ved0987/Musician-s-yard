<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		is_user_login();
	}
	
	public function index()
	{
		$post = $this->input->post();
		if($post){
			$post['u_dob'] = date("Y-m-d", strtotime($post['u_dob']));
			$post['u_password'] = md5($post['u_password']);
			unset($post['u_cpassword']);
			$userId = $this->Admin_model->insertData('users',$post);
			if($userId){
				// u_photo
				if(isset($_FILES['u_profile'])){
					$config = array();
					$config['upload_path']          = 'uploads/users/users_'.$userId.'';
					$config['allowed_types']        = 'pdf|jpg|png';
					if (!is_dir('./uploads/users/users_'.$userId.''))
					{
						mkdir('uploads/users/users_'.$userId.'', 0777, true);
					}
					$this->load->library('upload', $config,'u_profile');
					$this->u_profile->initialize($config);
					if ( ! $this->u_profile->do_upload('u_profile'))
					{
						$error = array('error' => $this->u_profile->display_errors());
					}
					else
					{
						$data = array('upload_data' => $this->u_profile->data());
						$update = $this->Admin_model->updateData('users',array('u_path'=>$config['upload_path'],'u_profile'=>$data['upload_data']['file_name']),array('u_id '=>$userId));
					}
				}
				$this->session->set_flashdata('success',"Account created successfully. Please Verify your account! ");
				redirect(base_url().'user-login');  				
			}
			redirect(base_url());
		}
		$this->load->view('user/registration');
	}
}
