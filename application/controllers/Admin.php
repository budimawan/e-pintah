<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	
	public function index()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('admin/pages/v_home', $data);
		$this->load->view('template/footer', $data);		
	}

	public function gantipassword()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('pas_lama', 'Curent Password', 'required|trim');
		$this->form_validation->set_rules('pas_baru', 'New Password', 'required|trim|min_length[8]', [
			'min_length' => 'Password Baru Minimal 8 Karakter!'
		]);
		$this->form_validation->set_rules('pas_baru2', 'Confirm New Password', 'required|trim|matches[pas_baru]', [
			'matches' => 'Warning, Reapat Password Harus Sama!!'
		]);

		if ($this->form_validation->run() == false){
			$this->load->view('template/header', $data);
			$this->load->view('admin/pages/v_home', $data);
			$this->load->view('template/footer', $data);
		}
		else{
			$pas_lama = $this->input->post('pas_lama');
			$pas_baru = $this->input->post('pas_baru');
			// echo $pas_baru;
			// die();
			if(!password_verify($pas_lama, $data['user']['password'])){
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Password lama salah!</div>');
				redirect('admin');
			} else {
				if ($pas_lama == $pas_baru) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Password baru tidak boleh sama dengan password lama!</div>');
					redirect('admin');
				} else {
					$hash_password_baru = password_hash($pas_baru, PASSWORD_DEFAULT);

					// echo $hash_password_baru;
					// die();

					$this->db->set('password', $hash_password_baru);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('users');
					$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert"><small>Anda telah mengubah permohonan!</small></div>');
					redirect('admin');

				}
			}
		}
	}

	public function updatedatauser()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$id = $data['user']['id'];
		// die();

		$this->form_validation->set_rules('user_name', 'User Name', 'required|trim');
		$this->form_validation->set_rules('full_name', 'User Full Name', 'required|trim');
		$this->form_validation->set_rules('phone', 'User Full Name', 'required|trim');
		$this->form_validation->set_rules('instansi', 'User Instantion', 'required|trim');
		$this->form_validation->set_rules('kel', 'Kelurahan Instansi', 'required|trim');
		$this->form_validation->set_rules('kec', 'Kecamatan Instansi', 'required|trim');

		if ($this->form_validation->run() == false){
			$this->load->view('template/header', $data);
			$this->load->view('user/pages/v_home', $data);
			$this->load->view('template/footer', $data);
		}
		else{
			$foto_lama_db = $data['user']['image'];
			$upload_foto_frm  = $this->input->post('img2');

			$username = $this->input->post('user_name');
			$fullname = $this->input->post('full_name');
			$tlpn = $this->input->post('phone');
			$instn = $this->input->post('instansi');
			$kelurahan = $this->input->post('kel');
			$kecamatan = $this->input->post('kec');

			if($foto_lama_db != $upload_foto_frm){
				$upload_foto 	= $_FILES['img']['name'];

				if ($upload_foto){
					$config['upload_path']		=	'./assets/img/profile';
					$config['allowed_types']	=	'gif|jpg|jpeg|png';
					$config['max_size']			=	2560;
					$config['max_width']        = 	700;
	                $config['max_height']       =  	700;
					$this->load->library('upload', $config);

					if ($this->upload->do_upload('img')){

						$img_old = $data['user']['image'];
						if ($img_old != 'default.jpg') {
							unlink(FCPATH . '/assets/img/profile/' . $img_old);
						}
						$img_new = $this->upload->data('file_name');
					} else {
						echo $this->upload->dispay_errors();
					}
				}
			}else {
				$img_new = $foto_lama_db;
			}			

			$data = [
				'user_name' => $username,
				'full_name' => $fullname,
				'phone' => $tlpn,
				'instansi' => $instn,
				'kel' => $kelurahan,
				'kec' => $kecamatan,
				'image' => $img_new
			];
			$this->db->where('id', $id);
			$this->db->update('users', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Berhasil Update Profil !</div>');
			redirect('admin');
			}
	}
} 