<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

switch ($_GET['content']) {
	case 'home':
		redirect('users/dashboard_admin');
		break;

	case 'seller_read':
		$this->load->view('admin/seller_read');
		break;

	case 'seller_add':
		$this->load->view('admin/seller_add');
		break;

	case 'seller_detail':
		$this->load->view('admin/seller_detail');
		break;

	case 'seller_edit':
		$this->load->view('admin/seller_edit');
		break;

	//=============================================

	case 'buyer_read':
		$this->load->view('admin/buyer_read');
		break;

	case 'buyer_add':
		$this->load->view('admin/buyer_add');
		break;

	case 'buyer_detail':
		$this->load->view('admin/buyer_detail');
		break;

	case 'buyer_edit':
		$this->load->view('admin/buyer_edit');
		break;
	
	default:
		echo 'Menu Home';
		break;
}