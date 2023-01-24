<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	
	public function index()
	{
		$this->load->view('user/template/header');
		$this->load->view('user/pages/v_riwayat');
		$this->load->view('user/template/footer');
			
	}
}
