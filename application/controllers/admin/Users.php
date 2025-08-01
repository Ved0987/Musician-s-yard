<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		admin_login();
	}
	
	public function index()
	{
		$data['users'] = $this->Admin_model->selectData('users','*',array('u_status' => 'active'));
		$this->load->view('admin/users/user-list',$data);
		
	}
	public function user_details($id)
	{
		$data['users'] = $this->Admin_model->selectData('users','*',array('u_id' => $id));
		$this->load->view('admin/users/user-details',$data);
	}
	public function updateStatus()
	{
		$post = $this->input->post();
		$update = $this->Admin_model->updateData('users',array('u_status' => $post['value']),array('u_id'=>$post['id']));
		if($update){
			$this->session->set_flashdata('success',ucfirst($post['value'])." "." successfully!");
			echo 'success';
		}else{
			$this->session->set_flashdata('danger',"Something Went Wrong!!");
			echo 'fail';
		}
}
}
