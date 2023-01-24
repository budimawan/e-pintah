<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periksapengajuan extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model("Pengajuan_model");
		is_logged_in();
	}

	public function index() {
		$this->load->model('Pengajuan_model', 'list');

		$ses = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

		$data2['pengajuan'] = $this->list->listPeriksa();
		$data['pengajuan_list'] = $this->db->get_where('pengajuan_a', ['email' => $this->session->userdata('email')])->result_array();
		// var_dump($data);die();

		$this->load->view('template/header', $data);
		$this->load->view('admin/pages/v_periksa', $data2);
		$this->load->view('template/footer', $data);

	}

	public function hapus($id) {
		$session = $this->session->userdata('email');
		$user = $this->db->get_where('pengajuan_a', ['id' => $id])->row_array();
		$user = $user['email'];

		if ($session == $user) {

			$file = $this->Pengajuan_model->getFileByID($id)->row();
			$file_a = './assets/file_upload/' . $file->file_a;
			$file_b = './assets/file_upload/' . $file->file_b;
			$file_c = './assets/file_upload/' . $file->file_c;

			if (is_readable($file_a) && unlink($file_a)) {

				if (is_readable($file_b) && unlink($file_b)) {

					if (is_readable($file_c) && unlink($file_c)) {

						$this->Pengajuan_model->hapusData($id);
						$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Pengajuan Berhasil Dihapus!</div>');
						redirect('pengajuanterkirim');

					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Data Pengajuan Gagal Dihapus! (file_3) </div>');
						redirect('pengajuanterkirim');
					}

				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Data Pengajuan Gagal Dihapus! (file_2) </div>');
					redirect('pengajuanterkirim');
				}

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Data Pengajuan Gagal Dihapus! (file_1) </div>');
				redirect('pengajuanterkirim');
			}
		} else {
			$this->load->view('blocked');
		}
	}

	public function periksa($id) {
		$session = $this->session->userdata('email');
		$user = $this->db->get_where('pengajuan_a', ['id' => $id])->row_array();
		$user = $user['email'];

		$data['user'] = $this->db->get_where('users', ['email' => $session])->row_array();
		// $this->db->order_by('nama_lengkap', 'ASC');
		$data2['pengajuan'] = $this->db->get_where('pengajuan_a', ['id' => $id])->row_array();

		if ($session != $user) {
			$this->load->view('template/header', $data);
			$this->load->view('admin/pages/v_periksa_pengajuan', $data2);
			$this->load->view('template/footer', $data);

		} else {
			$this->load->view('blocked');
		}
	}

	public function koreksiPengajuan() {
		$id = $this->input->post('id');
		$koreksi_a = $this->input->post('koreksi_a');
		$koreksi_b = $this->input->post('koreksi_b');
		$koreksi_c = $this->input->post('koreksi_c');

		$r_koreksi_a = $this->input->post('r_koreksi_a');
		$r_koreksi_b = $this->input->post('r_koreksi_b');
		$r_koreksi_c = $this->input->post('r_koreksi_c');

		if ($r_koreksi_a != "valid" || $r_koreksi_b != "valid" || $r_koreksi_c != "valid") {
			$status = 3;
		} else {
			$status = 2;
		}

		$status_periksa = "Sudah Diperiksa";
		$data_a = [
			'status_periksa' => $status_periksa,
			'status' => $status,
			'koreksi_a' => $koreksi_a,
			'koreksi_b' => $koreksi_b,
			'koreksi_c' => $koreksi_c,
		];
		$this->db->where('id', $id);
		$this->db->update('pengajuan_a', $data_a);

		$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Anda telah memeriksa  permohonan!</div>');
		redirect('Periksapengajuan');
	}

	public function lihat($id) {
		// $this->id = $id;
		$session = $this->session->userdata('email');
		$user = $this->db->get_where('pengajuan_a', ['id' => $id])->row_array();
		$user = $user['email'];

		$data['user'] = $this->db->get_where('users', ['email' => $session])->row_array();
		$data2['pengajuan'] = $this->db->get_where('pengajuan_a', ['id' => $id])->row_array();

		if ($session != $user) {
			$this->load->view('template/header', $data);
			$this->load->view('admin/pages/v_lihat_pengajuan', $data2);
			$this->load->view('template/footer', $data);

		} else {
			$this->load->view('blocked');
		}
	}

	public function cetakpdf($id) {
		

	}

	public function download_file($id) {
		$file2 = 'assets/file_upload/' . $id;
		force_download($file2, NULL);
	}

}
