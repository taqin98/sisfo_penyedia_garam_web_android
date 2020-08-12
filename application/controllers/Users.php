<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->library('session');
	}

	public function index()
	{
		// $this->load->view('welcome_message');
		$this->load->view('welcome');
	}

	public function login()
	{
		$user = $this->input->post('username', TRUE);
		$pass = $this->input->post('password', TRUE);

		var_dump($user, $pass);
		// echo "string";

		$query = $this->db->get_where('users',array('username'=>$user,'password' => md5($pass)));

		if($query->num_rows() == 1) {
            //ambil data user berdasar username
            $row  = $this->db->query('SELECT username, level, information FROM users where username = "'.$user.'"');
            $user     = $row->row();
            $data_username   = $user->username;
            $data_userlevel   = $user->level;
            $data_status   = $user->information;

            //set session user
            $this->session->set_userdata('username', $data_username);
            $this->session->set_userdata('id_login', uniqid(rand()));
            $this->session->set_userdata('level', $data_userlevel);
            $this->session->set_userdata('status', $data_status);
            
            switch ($data_userlevel) {
				case 1:
					# code...
					//redirect ke halaman dashboard
					redirect('users/dashboard_admin');
					break;
				case 2:
					//redirect ke halaman dashboard
					redirect('users/dashboard_seller');
					break;
				case 3:
					//redirect ke halaman dashboard
					redirect('users/dashboard_user');
					break;
				
			}

        }else{
 
             //jika tidak ada, set notifikasi dalam flashdata.
             $this->session->set_flashdata('sukses','Username atau password anda salah, silakan coba lagi.. ');
 
             //redirect ke halaman login
             redirect('users/index');
        }
        return false;
      
	}

	public function logout() {
         $this->session->unset_userdata('username');
         $this->session->unset_userdata('id_login');
         $this->session->unset_userdata('id');
         $this->session->set_flashdata('sukses','Anda berhasil logout');
         redirect(site_url('users/index'));
    }

	public function dashboard_user(){
		//cek session username
         if($this->session->userdata('username') == '') {
 
             //set notifikasi
             $this->session->set_flashdata('gagal','Anda belum login');
 
             //alihkan ke halaman login
             redirect(site_url('users/index'));
         } else {
            $this->session->set_flashdata('sukses','Selamat Datang di GaramApp');
         	$this->load->view('users/dashboard_user');
         }
	}

	public function dashboard_seller(){
		//cek session username
         if($this->session->userdata('username') == '') {
 
             //set notifikasi
             $this->session->set_flashdata('sukses','Anda belum login');
 
             //alihkan ke halaman login
             redirect(site_url('users/index'));
         } else {
            $this->session->set_flashdata('sukses','Selamat Datang di GaramApp');
         	$this->load->view('seller/dashboard_seller');
         }
	}

	public function dashboard_admin(){
		//cek session username
         if($this->session->userdata('username') == '') {
 
             //set notifikasi
             $this->session->set_flashdata('sukses','Anda belum login');
 
             //alihkan ke halaman login
             redirect(site_url('users/index'));
         } else {
            $this->session->set_flashdata('sukses','Selamat Datang di GaramApp');
         	$this->load->view('admin/dashboard_admin');
         }
	}

	public function seller_add()
	{
		$hash = md5($this->input->post('password', TRUE));
		$user_data = array(
			'user_id' => $this->input->post('userid', TRUE),
			'email' => $this->input->post('email', TRUE),
			'username' => $this->input->post('username', TRUE),
			'password' => $hash,
			'level' => 2,
			'information' => 'seller',
			'profile_id' => $this->input->post('profileid', TRUE)
		);

		$profile_data = array(
			'profile_id' => $this->input->post('profileid', TRUE),
			'full_name' => $this->input->post('fullname', TRUE),
			'address' => $this->input->post('alm', TRUE),
			'telepon' => $this->input->post('hp', TRUE),
			'lng' => $this->input->post('lng', TRUE),
			'lat' => $this->input->post('lat', TRUE)
		);

		$stok_data = array(
			'user_id' => $this->input->post('userid', TRUE),
			'stok' => $this->input->post('stok', TRUE)
		);

		$query = $this->db->get_where('users',array('email'=> $this->input->post('email', TRUE)) );
		if ($query->num_rows() == 1) {
			$this->session->set_flashdata('validation','Email Sudah digunakan');
         	return redirect(site_url('users/dashboard_admin?content=seller_add'));
		} else {
			$this->db->insert('users', $user_data);
			$this->db->insert('profile', $profile_data);
			$this->db->insert('garam_stock', $stok_data);

			$this->session->set_flashdata('notification','Data Berhasil ditambahkan');
			return redirect(site_url('users/dashboard_admin?content=seller_read'));
		}

	}

	public function seller_delete($userid)
	{
		$query = $this->db->get_where('users',array('user_id'=> $userid));
		$profileid = $query->result()[0]->profile_id;

		$query = $this->db->delete('users', array('user_id' => $userid));
		if ($query) {
			$this->db->delete('garam_stock', array('user_id' => $userid));
			$this->db->delete('profile', array('profile_id' => $profileid));

			$this->session->set_flashdata('notification','Data berhasil dihapus');
			return redirect(site_url('users/dashboard_admin?content=seller_read'));
		} else {
			$this->session->set_flashdata('notification','Data Gagal dihapus');
			return redirect(site_url('users/dashboard_admin?content=seller_read'));
		}
	}

	public function seller_update()
	{
		$hash = md5($this->input->post('password', TRUE));
		$user_data = array(
			'user_id' => $this->input->post('userid', TRUE),
			'email' => $this->input->post('email', TRUE),
			'username' => $this->input->post('username', TRUE),
			'password' => $hash,
			'level' => $this->input->post('level', TRUE),
			'information' => $this->input->post('info', TRUE),
			'profile_id' => $this->input->post('profileid', TRUE)
		);

		$profile_data = array(
			'profile_id' => $this->input->post('profileid', TRUE),
			'full_name' => $this->input->post('fullname', TRUE),
			'address' => $this->input->post('alm', TRUE),
			'telepon' => $this->input->post('hp', TRUE),
			'lng' => $this->input->post('lng', TRUE),
			'lat' => $this->input->post('lat', TRUE)
		);

		$stok_data = array(
			'user_id' => $this->input->post('userid', TRUE),
			'stok' => $this->input->post('stok', TRUE)
		);

		$this->db->where('user_id', $this->input->post('userid', TRUE));
		$this->db->update('users', $user_data);

		$this->db->where('profile_id', $this->input->post('profileid', TRUE));
		$this->db->update('profile', $profile_data);

		$this->db->where('user_id', $this->input->post('userid', TRUE));
		$this->db->update('garam_stock', $stok_data);

		if ($this->db->error()['message'] == ''){
			$this->session->set_flashdata('notification','Data berhasil diupdate');
			return redirect(site_url('users/dashboard_admin?content=seller_read'));
		}else{
			$this->session->set_flashdata('notification','Data gagal diupdate');
			return redirect(site_url('users/dashboard_admin?content=seller_read'));
		}
	}

	public function buyer_add()
	{
		$hash = md5($this->input->post('password', TRUE));
		$user_data = array(
			'user_id' => $this->input->post('userid', TRUE),
			'email' => $this->input->post('email', TRUE),
			'username' => $this->input->post('username', TRUE),
			'password' => $hash,
			'level' => 3,
			'information' => 'user',
			'profile_id' => $this->input->post('profileid', TRUE)
		);

		$profile_data = array(
			'profile_id' => $this->input->post('profileid', TRUE),
			'full_name' => $this->input->post('fullname', TRUE),
			'address' => $this->input->post('alm', TRUE),
			'telepon' => $this->input->post('hp', TRUE)
		);

		$query = $this->db->get_where('users',array('email'=> $this->input->post('email', TRUE)) );
		if ($query->num_rows() == 1) {
			$this->session->set_flashdata('validation','Email Sudah digunakan');
         	return redirect(site_url('users/dashboard_admin?content=buyer_add'));
		} else {
			$this->db->insert('users', $user_data);
			$this->db->insert('profile', $profile_data);

			$this->session->set_flashdata('notification','Data Berhasil ditambahkan');
			return redirect(site_url('users/dashboard_admin?content=buyer_read'));
		}

	}

	public function buyer_delete($userid)
	{
		$query = $this->db->get_where('users',array('user_id'=> $userid));
		$profileid = $query->result()[0]->profile_id;

		$query = $this->db->delete('users', array('user_id' => $userid));
		if ($query) {
			$this->db->delete('profile', array('profile_id' => $profileid));

			$this->session->set_flashdata('notification','Data berhasil dihapus');
			return redirect(site_url('users/dashboard_admin?content=buyer_read'));
		} else {
			$this->session->set_flashdata('notification','Data Gagal dihapus');
			return redirect(site_url('users/dashboard_admin?content=buyer_read'));
		}
	}

	public function buyer_update()
	{
		$hash = md5($this->input->post('password', TRUE));
		$user_data = array(
			'user_id' => $this->input->post('userid', TRUE),
			'email' => $this->input->post('email', TRUE),
			'username' => $this->input->post('username', TRUE),
			'password' => $hash,
			'level' => $this->input->post('level', TRUE),
			'information' => $this->input->post('info', TRUE),
			'profile_id' => $this->input->post('profileid', TRUE)
		);

		$profile_data = array(
			'profile_id' => $this->input->post('profileid', TRUE),
			'full_name' => $this->input->post('fullname', TRUE),
			'address' => $this->input->post('alm', TRUE),
			'telepon' => $this->input->post('hp', TRUE)
		);


		$this->db->where('user_id', $this->input->post('userid', TRUE));
		$this->db->update('users', $user_data);

		$this->db->where('profile_id', $this->input->post('profileid', TRUE));
		$this->db->update('profile', $profile_data);

		if ($this->db->error()['message'] == ''){
			$this->session->set_flashdata('notification','Data berhasil diupdate');
			return redirect(site_url('users/dashboard_admin?content=buyer_read'));
		}else{
			$this->session->set_flashdata('notification','Data gagal diupdate');
			return redirect(site_url('users/dashboard_admin?content=buyer_read'));
		}
	}


}
