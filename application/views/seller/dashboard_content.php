<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

switch ($_GET['content']) {
	case 'seller_detail':
		$this->load->view('seller/seller_detail');
		break;

	case 'seller_edit':
		$this->load->view('seller/seller_edit');
		break;
	
	case 'seller_list':
		$this->load->view('seller/seller_list');
		break;
	
	default:
		$this->load->view('seller/homepage');
		break;
}