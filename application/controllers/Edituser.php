<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edituser extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	
	public function index()
	{
		$this->load->model('Users_model', 'users');

		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
			$data2 = $data['user'];
			$data2 = $data2['role_id'];
		$data['roll'] = $this->db->get_where('users_roll', ['id' => $data2])->row_array();

		$data['users'] = $this->users->getUsers();
		$data['roll_id'] = $this->db->get('users_roll')->result_array();  

		$this->form_validation->set_rules('user_role', 'User Role', 'required');
		$this->form_validation->set_rules('user_name', 'User Name', 'required|trim');
		$this->form_validation->set_rules('full_name', 'User Full Name', 'required|trim');
		$this->form_validation->set_rules('email', 'User Email', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => 'email sudah teregistrasi !'
		]);
		$this->form_validation->set_rules('password', 'User Password', 'required|trim|min_length[8]|matches[password2]', [
			'min_length' => 'password minimal 8 karakter!',
			'matches' => 'repat password tidak sama!'
		]);
		$this->form_validation->set_rules('password2', 'User Password', 'required|trim|matches[password]', [
			'matches' => 'repat password tidak sama!'
		]);
		$this->form_validation->set_rules('instansi', 'User Instantion', 'required|trim');
		$this->form_validation->set_rules('kel', 'Kelurahan Instansi', 'required|trim');
		$this->form_validation->set_rules('kec', 'Kecamatan Instansi', 'required|trim');

		date_default_timezone_set('Asia/Makassar');
		$tgl_ajuan = date('Y-m-d H:i:s');
		$tgl_update = date('Y-m-d H:i:s');

		if ($this->form_validation->run() == false){
			$this->load->view('template/header', $data);
			$this->load->view('superadmin/pages/v_edituser', $data);
			$this->load->view('template/footer', $data);
		}
		else{
			$data = [
				'user_name' => $this->input->post('user_name', true),
				'full_name' => $this->input->post('full_name', true),
				'email' => $this->input->post('email', true),
				'image' => "default.jpg",
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role_id' => $this->input->post('user_role', true),
				'instansi' => $this->input->post('instansi', true),
				'kel' => $this->input->post('kel', true),
				'kec' => $this->input->post('kec', true),
				'kab' => "Konawe Selatan",
				'date_created' => $tgl_ajuan,
				'last_update' => $tgl_update,
				'is_active' => $this->input->post('is_active')

			];
			// var_dump($data);
			// die();
			$this->db->insert('users', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New User added!</div>');
					redirect('edituser');
		}		
	}
} 