<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		admin_login();
	}
	
	public function index()
	{
		$data['menu'] = $this->Admin_model->selectData('menu','*');
		$this->load->view('admin/menu/menu-list',$data);
	}
	public function add()
	{
		$post = $this->input->post();
		if($post){
			$m_id = $this->Admin_model->insertData('menu',$post);
			if($m_id){
				$this->session->set_flashdata('success',"Menu Add successfully!");
				redirect('menu');
			}else{
				$this->session->set_flashdata('danger',"Something Went Wrong");
				redirect('menu');
			}
		}else{
			$this->load->view('admin/menu/menu-add');
		}
	}
	public function edit($id='')
	{
		$post = $this->input->post();
		if($post){
			$m_id = $this->Admin_model->updateData('menu',$post,array('m_id'=>$post['m_id']));
			if($m_id){
				$this->session->set_flashdata('success',"Menu Edit successfully!");
				redirect('menu');
			}else{
				$this->session->set_flashdata('danger',"Something Went Wrong");
				redirect('menu');
			}
		}else{
			$data['menu'] = $this->Admin_model->selectData('menu','*',array('m_id' => $id));
			$this->load->view('admin/menu/menu-edit',$data);
		}
	}
}
