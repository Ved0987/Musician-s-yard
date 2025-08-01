<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->seller_session=@$this->session->userdata['seller_session'];
		seller_login();
	}
	
	public function index()
	{
		$post = $this->input->post();
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
						$update = $this->Admin_model->updateData('seller',array('s_path'=>$config['upload_path'],'s_profile'=>$data['upload_data']['file_name']),array('s_id '=>$this->seller_session['s_id']));
					}
				}
		if($post){
			$update = $this->Admin_model->updateData('seller',$post,array('s_id'=> $this->seller_session['s_id']));
			if($update){
				$this->session->set_flashdata('success',"Profile Update");
			}

			redirect('seller-profile');
		}else{
			$data['sellerDetails'] = $this->Admin_model->selectData('seller','*',array('s_id' => $this->seller_session['s_id']));
			$this->load->view('seller/profile',$data);
		}
	}
}
