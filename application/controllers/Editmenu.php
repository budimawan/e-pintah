<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editmenu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	

	public function index()
	{
		$this->load->model('Menu_model', 'menu');

		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
			$data2 = $data['user'];
			$data2 = $data2['role_id'];
		$data['roll'] = $this->db->get_where('users_roll', ['id' => $data2])->row_array();


		$data['menu'] = $this->menu->getMenu();
		$data['menu_id'] = $this->db->get('user_menu')->result_array();  

		$this->form_validation->set_rules('menu_id', 'Id Menu', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('url', 'Link Url', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false){
			$this->load->view('template/header', $data);
			$this->load->view('superadmin/pages/v_editmenu', $data);
			$this->load->view('template/footer', $data);
		}
		else{
			$data = [
				'menu_id' => $this->input->post('menu_id'),
				'title' => $this->input->post('title'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')

			];
			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Menu added!</div>');
					redirect('editmenu');
		}

	}


} 