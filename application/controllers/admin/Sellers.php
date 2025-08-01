<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sellers extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		admin_login();
	}
	
	public function index()
	{
		$data['sellers'] = $this->Admin_model->selectData('seller','*');
		$this->load->view('admin/sellers/seller-list',$data);
	}

	public function add()
	{
		$post = $this->input->post();
		if($post){
			$post['s_password'] = md5($post['s_password']);
			$post['s_status'] = 'active';
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
				redirect('sellers');  				
			}else{
				$this->session->set_flashdata('danger',"Something Went Wrong!! ");
			redirect('sellers');
			}
		}else{
				$this->load->view('admin/sellers/seller-add');
		}
	}

	public function seller_details($id)
	{
		$data['seller'] = $this->Admin_model->selectData('seller','*',array('s_id' => $id));
		$this->load->view('admin/sellers/seller-details',$data);
	}
	public function updateStatus()
	{
		$post = $this->input->post();
		$update = $this->Admin_model->updateData('seller',array('s_status' => $post['value']),array('s_id'=>$post['id']));
		if($update){
			$this->session->set_flashdata('success',ucfirst($post['value'])." "." successfully!");
			echo 'success';
		}else{
			$this->session->set_flashdata('danger',"Something Went Wrong!!");
			echo 'fail';
		}
	}
}
