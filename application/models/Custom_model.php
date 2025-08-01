<?php
class Custom_model extends CI_Model{
	var $table;
	public function  __construct(){
		parent::__construct();
		$this->load->database();
		$this->table ='admin_master';
	}

	public function seleteHomeProduct()
	{
		$this->db->order_by('rand()');
		$this->db->limit(10);
		$query = $this->db->get('product');
		return $query->result_array();
	}

	public function getOrders($id='')
	{
		// code...
	}
}
?>