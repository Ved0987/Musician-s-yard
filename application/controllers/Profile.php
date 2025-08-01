<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->admin_session=@$this->session->userdata['user_session'];
	}

	public function index()
	{
		$data['details'] = $this->Admin_model->selectData('users','*',array('u_id' => $this->admin_session['user_id']));
		$this->load->view('user/profile-details',$data);
	}

	public function profile_edit()
	{
		$post = $this->input->post();
		if($post){
			$post['u_dob'] = date("Y-m-d", strtotime($post['u_dob']));
			$this->Admin_model->updateData('users',$post,array('u_id' => $this->admin_session['user_id']));
			if(isset($_FILES['u_profile'])){
				$userId = $this->admin_session['user_id'];
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
						$update = $this->Admin_model->updateData('users',array('u_path'=>$config['upload_path'],'u_profile'=>$data['upload_data']['file_name']),array('u_id '=>$this->admin_session['user_id']));
					}
				}
				$this->session->set_flashdata('success',"Data Update Done!");
				redirect('profile');
		}else{
		$data['details'] = $this->Admin_model->selectData('users','*',array('u_id' => $this->admin_session['user_id']));
		$this->load->view('user/profile-edit',$data);
		}
	}

	
}