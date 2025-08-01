<?php
class Admin_model extends CI_Model{
		var $table;
	public function  __construct(){
		parent::__construct();
		$this->load->database();
		$this->table ='admin_master';
	}

/*
	| -------------------------------------------------------------------
	| check unique fields
	| -------------------------------------------------------------------
	|
	*/
	public function isUnique($table, $field, $value,$id='')
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field,$value);
		if($id!='')
		{
			$this->db->where("id != ",$id);
		}
		$query = $this->db->get();
		$data = $query->num_rows();
		return ($data > 0)?FALSE:TRUE;
	}

		/*
	| -------------------------------------------------------------------
	| Insert data
	| -------------------------------------------------------------------
	|
	| general function to insert data in table
	|
	*/
	public function insertData($table, $data)
	{
		
		$result = $this->db->insert($table, $data);
		if($result == 1){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	public function insertData_batch($table, $data)
	{
		
		$this->db->insert_batch($table, $data);
		return true;
	}
	/*
	| -------------------------------------------------------------------
	| Update data
	| -------------------------------------------------------------------
	|
	| general function to update data
	|
	*/
	public function updateData($table, $data, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
		return $this->db->affected_rows();
	}
	
	
	/*
	| -------------------------------------------------------------------
	| Select data
	| -------------------------------------------------------------------
	|
	| general function to get result by passing nesessary parameters
	|
	*/
	public function selectData($table, $fields='*', $where='', $order_by="", $order_type="", $group_by="", $limit="", $rows="", $type='')
	{
		$this->db->select($fields);
		$this->db->from($table);
		if ($where != "") {
			$this->db->where($where);
		}

		if ($order_by != '') {
			$this->db->order_by($order_by,$order_type);
		}

		if ($group_by != '') {
			$this->db->group_by($group_by);
		}

		if ($limit > 0 && $rows == "") {
			$this->db->limit($limit);
		}
		
		if ($rows > 0) {
			$this->db->limit($rows, $limit);
		}


		$query = $this->db->get();

		if ($type == "rowcount") {
			$data = $query->num_rows();
		}else{
			$data = $query->result();
		}

		$query->result();

		return $data;
	}

		/*
	| -------------------------------------------------------------------
	| Role List
	| -------------------------------------------------------------------
	|
	| general function to delete the records
	|
	*/

	public function selectRoleData($table){
		$query = $this->db->get($table);
		if($query!=NULL){
			return $query->result();
		}
		else{
			return false;
		}
	}
	
	/*
	| -------------------------------------------------------------------
	| Single Array creation
	| -------------------------------------------------------------------
	|
	| general function to update data
	|
	*/
	public function singleRecord($table, $field, $where)
	{
		$this->db->select($field);
		$this->db->where($where);
		$query=$this->db->get($table);
		$array = array();

	    foreach($query->result() as $row)
	    {
	        $array[] = $row->$field; // add each user id to the array
	    }

	    return $array;
	}
	
	
		/*
	| -------------------------------------------------------------------
	| Delere data
	| -------------------------------------------------------------------
	|
	| general function to delete the records
	|
	*/
	public function deleteData($table, $data)
	{
		if($this->db->delete($table, $data)){
			return 1;
		}else{
			return 0;
		}
	}
	// Login Admin Panel //
	public function signinApi($table, $fields='*', $where='', $order_by="", $order_type="", $group_by="", $limit="", $rows="", $type='',$and='')
	{
		$this->db->select($fields);
		$this->db->from($table);
		$this->db->join('role_master as role','role.role_id=admin_master.admin_role','left');
		if($where!=''){
			$this->db->where($where);
		}
		if ($order_by != '') {
			$this->db->order_by($order_by,$order_type);
		}
		$query=$this->db->get();
		$data = $query->result();
		return $data;
	}
	
}
?>
