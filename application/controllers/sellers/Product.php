<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		seller_login();
		$this->admin_session=@$this->session->userdata['seller_session'];
	}
	
	public function index()
	{
		$loginid= $this->admin_session['s_id'];
		$data['products'] = $this->Admin_model->selectData('product','*',array('p_status' => 'active','s_id'=>$loginid));
		$this->load->view('seller/product/product-list',$data);
	}
	public function add()
	{
		$post = $this->input->post();
		if($post){
			$loginid= $this->admin_session['s_id'];
			$post['s_id'] = $loginid;
			$post['createdat'] = date('Y-m-d H:i:s');
			$p_id = $this->Admin_model->insertData('product',$post);
			if($p_id){
				$count = count($_FILES['images']['name']);

				for($i=0;$i<$count;$i++){

					if(!empty($_FILES['images']['name'][$i])){

						$_FILES['img_file']['name'] = $_FILES['images']['name'][$i];
						$_FILES['img_file']['type'] = $_FILES['images']['type'][$i];
						$_FILES['img_file']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
						$_FILES['img_file']['error'] = $_FILES['images']['error'][$i];
						$_FILES['img_file']['size'] = $_FILES['images']['size'][$i];

						$config['upload_path'] = 'uploads/product_images'; 
						if (!is_dir('./uploads/product_images'))
						{
							mkdir('uploads/product_images', 0777, true);
						}
						$config['allowed_types'] = 'jpg|jpeg|png|gif';
						$config['max_size'] = '5000';
						$config['file_name'] = $_FILES['images']['name'][$i];

						$this->load->library('upload',$config); 

						if($this->upload->do_upload('img_file')){
							$uploadData = $this->upload->data();
							$filename = $uploadData['file_name'];
							$imgData = array('p_id' => $p_id ,'p_photo' => $filename);
							$this->Admin_model->insertData('product_photo',$imgData);
						}
					}
				}
				$this->session->set_flashdata('success',"Product Added successfully!");
				redirect('seller-product');
			}else{
				$this->session->set_flashdata('error',"Something Went Wrong!");
				redirect('seller-product');
			}

		}else{
			$data['menu'] = $this->Admin_model->selectData('menu','*',array('m_status' => 'active'));
			$this->load->view('seller/product/product-add',$data);
		}
	}
	public function product_details($id)
	{
		$post = $this->input->post();
		if($post){
			$update = $this->Admin_model->updateData('product',$post,array('p_id' => $id));
			$count = count($_FILES['images']['name']);

			for($i=0;$i<$count;$i++){

				if(!empty($_FILES['images']['name'][$i])){

					$_FILES['img_file']['name'] = $_FILES['images']['name'][$i];
					$_FILES['img_file']['type'] = $_FILES['images']['type'][$i];
					$_FILES['img_file']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
					$_FILES['img_file']['error'] = $_FILES['images']['error'][$i];
					$_FILES['img_file']['size'] = $_FILES['images']['size'][$i];

					$config['upload_path'] = 'uploads/product_images'; 
					if (!is_dir('./uploads/product_images'))
					{
						mkdir('uploads/product_images', 0777, true);
					}
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					$config['max_size'] = '5000';
					$config['file_name'] = $_FILES['images']['name'][$i];

					$this->load->library('upload',$config); 

					if($this->upload->do_upload('img_file')){
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];
						$imgData = array('p_id' => $id ,'p_photo' => $filename);
						$this->Admin_model->insertData('product_photo',$imgData);
					}
				}
			}
			if($update){
				$this->session->set_flashdata('success',"Product Edited successfully!");
			}else{
				$this->session->set_flashdata('error',"Something Went Wrong!");
			}
			redirect('seller-product');
		}else{
			$data['product'] = $this->Admin_model->selectData('product','*',array('p_status' => 'active','p_id'=>$id));
			$data['images'] = $this->Admin_model->selectData('product_photo','ph_id,p_photo',array('p_id' => $id));
			$data['menu'] = $this->Admin_model->selectData('menu','*',array('m_status' => 'active'));
			$this->load->view('seller/product/product-edit',$data);
		}
	}
	public function deleteimage()
	{
		$post = $this->input->post();
		$update = $this->Admin_model->deleteData('product_photo',array('ph_id'=>$post['id']));
		if($update){
			$this->session->set_flashdata('success',"Product Photo Removed successfully!");
		}else{
			$this->session->set_flashdata('error',"Something Went Wrong!");
		}
		echo 'success';
	}

	public function product_delete($id='')
	{
		$del = $this->Admin_model->deleteData('product',array('p_id'=>$id));
		if($del){
			$this->Admin_model->deleteData('product_photo',array('p_id'=>$id));
			$this->session->set_flashdata('success',"Product  Removed successfully!");
		}else{
			$this->session->set_flashdata('error',"Something Went Wrong!");
		}
		redirect('seller-product');
	}
}
