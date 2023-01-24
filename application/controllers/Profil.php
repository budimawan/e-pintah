<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	
	public function index()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('user/pages/v_profil', $data);
		$this->load->view('template/footer', $data);
			
	}
}
