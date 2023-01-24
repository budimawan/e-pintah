<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index(){
		$email = $this->session->userdata('email');
		$user = $this->db->get_where('users', ['email' => $email])->row_array();
		if ($this->session->userdata('email')){
			if ($user['role_id'] == 1){
						redirect('user');
					}
					else if ($user['role_id'] == 2){
						redirect('admin');
					} 
					else if ($user['role_id'] == 3){
						redirect('superadmin');
					}
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Email', 'trim|required');
		if ($this->form_validation->run() == false){
			$data['title'] = 'Login Page';
			$this->load->view('login', $data);	

		}
		else{
			$this->_login();
		}

	}

	private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('users', ['email' => $email])->row_array();
		// var_dump($user);
		// die;

		//cek usernya ada or not
		if ($user){
			//cek user aktif
			if ($user['is_active'] == 1){
				if (password_verify($password, $user['password'])){
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id'],
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1){
						redirect('user');
					}
					else if ($user['role_id'] == 2){
						redirect('admin');
					} 
					else if ($user['role_id'] == 3){
						redirect('superadmin');
					}
					
				}
				else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
					redirect('auth');
				}
			}
			else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum aktifasi</div>');
				redirect('auth');
			}
		}
		else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar!</div>');
			redirect('auth');
		}

	} 

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah keluar dari sistem!</div>');
			redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('blocked');
	}

}