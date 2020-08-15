<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

switch ($_GET['content']) {
	case 'home':
		redirect('users/dashboard_admin');
		break;

	case 'seller_detail':
		$this->load->view('users/seller_detail');
		break;

	case 'seller_list':
		$this->load->view('users/seller_list');
		break;

	case 'user_detail':
		$this->load->view('users/user_detail');
		break;

	case 'user_edit':
		$this->load->view('users/user_edit');
		break;
	
	default:
		$this->load->view('users/homepage');
	// echo "string";
		break;
}