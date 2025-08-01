<?php
function is_user_login()
{
	$CI =& get_instance();
	$session = $CI->session->userdata('user_session');
      // print_r($session); exit();
	if (isset($session['user_id'])) {
		redirect(base_url());   
	}
}
function user_login()
{
	$CI =& get_instance();
	$session = $CI->session->userdata('user_session');
      // print_r($session); exit();
	if (!isset($session['user_id'])) {
		redirect(base_url().'login');   
	}
}

function is_admin_login()
{
	$CI =& get_instance();
	$session = $CI->session->userdata('admin_session');
      // print_r($session); exit();
	if (isset($session['admin_id'])) {
		// update path name
		redirect('dashboard');   
	}
}
function is_seller_login()
{
	$CI =& get_instance();
	$session = $CI->session->userdata('seller_session');
      // print_r($session); exit();
	if (isset($session['s_id'])) {
		// update path name
		redirect('seller-dashboard');   
	}
}

function admin_login()
{
	$CI =& get_instance();
	$session = $CI->session->userdata('admin_session');
	if (!isset($session['admin_id'])) {
		redirect('admin');
	}
}
function seller_login()
{
	$CI =& get_instance();
	$session = $CI->session->userdata('seller_session');
	if (!isset($session['s_id'])) {
		redirect('seller-login');
	}
}
function get_active_tab_class($tab)
{
	$CI =& get_instance();
	if ($CI->router->fetch_class() == $tab) {
		return 'active';
	}
}
function getDateFormat($date='', $type='') {
	if($type == 'time'){
		return date('d-M-Y h:i A', strtotime($date));
	} else {
		return date('d-M-Y', strtotime($date));
	}
}
function check_cart($id)
{
	if($id == ''){
		return false;
	}
	$temp = $id;
	$ci =& get_instance();
	$ci->load->model('Admin_model');
	$session = $ci->session->userdata('user_session');
	$in_cart = $ci->Admin_model->selectData('cart','*',array('u_id'=>$session['user_id']));
		foreach ($in_cart as $key => $value) {
			if($value->p_id == $temp){
				unset($temp);
				$data = array('c_id' => $value->c_id,'qty' => $value->qty);
				return $data;
			}
		}
}
?>