<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
	}
	
	public function index()
	{
		$post = $this->input->post();
		if($post){
			$post['s_password'] = md5($post['s_password']);
			$post['s_status'] = 'pending';
			unset($post['s_cpassword']);
			$sellerId = $this->Admin_model->insertData('seller',$post);
			if($sellerId){
				// u_photo
				if(isset($_FILES['s_profile'])){
					$config = array();
					$config['upload_path']          = 'uploads/seller/seller_'.$sellerId.'';
					$config['allowed_types']        = 'pdf|jpg|png';
					if (!is_dir('./uploads/seller/seller_'.$sellerId.''))
					{
						mkdir('uploads/seller/seller_'.$sellerId.'', 0777, true);
					}
					$this->load->library('upload', $config,'s_profile');
					$this->s_profile->initialize($config);
					if ( ! $this->s_profile->do_upload('s_profile'))
					{
						$error = array('error' => $this->s_profile->display_errors());
					}
					else
					{
						$data = array('upload_data' => $this->s_profile->data());
						$update = $this->Admin_model->updateData('seller',array('s_path'=>$config['upload_path'],'s_profile'=>$data['upload_data']['file_name']),array('s_id '=>$sellerId));
					}
				}
				$this->session->set_flashdata('success',"Account created successfully.. ");
				redirect(base_url().'seller-login');  				
			}else{
				$this->session->set_flashdata('danger',"Something Went Wrong!! ");
			redirect(base_url());
			}
		}else{
		$this->load->view('user/seller-registration');
		}
	}

	public function checkEmail()
	{
			$email = $this->input->post('s_email');
			$data = $this->Admin_model->selectData('seller',"*",array('s_email' => $email,'s_status'=>'active'));
			if(count($data)>0){
				echo 'false';
			}else{
				echo 'true';
			}
	}
}
