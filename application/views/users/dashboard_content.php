<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

switch ($_GET['content']) {
	case 'home':
		redirect('users/dashboard_admin');
		break;

	case 'user_detail':
		$this->load->view('users/user_detail');
		break;
	
	default:
		$this->load->view('users/homepage');
	// echo "string";
		break;
}