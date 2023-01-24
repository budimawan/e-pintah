<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('user/pages/v_pengajuan', $data);
		$this->load->view('template/footer', $data);
			
	}

	public function ajukan()
	{
		$email 		= $this->session->userdata('email');
		$user 		= $this->db->get_where('users', ['email' => $email])->row_array();
		$inst  		= $this->input->post('nama_lengkap2');
		$kel 		= $this->input->post('kel2');
		$kec 		= $this->input->post('kec2');
		$ttl 		= $this->input->post('tempat') . ", " . $this->input->post('ttl'); 
		$status 	= 1 ;
		
		$file_a 	= $_FILES['file_a'];
			if ($file_a = ''){
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Pastikan File_1 Anda Benar !</div>');
				redirect('Pengajuan');
			}else {
				$config['upload_path'] 		=  './assets/file_upload';
				$config['allowed_types']	=  'pdf';
				$config['max_size']         =	2560; // 1MB
				$config['encrypt_name'] 	=	TRUE;
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('file_a')){
					$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert"> Gagal Upload File_1 - (file pdf max size 1023 kb) !</div>');
					redirect('Pengajuan');
				}else{
					$file_a = $this->upload->data('file_name');
					
					//file_b
					$file_b  = $_FILES['file_b'];
						if ($file_b = ''){
						$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Pastikan File_2 Anda Benar !</div>');
						redirect('Pengajuan');
						}else {
							if (!$this->upload->do_upload('file_b')){
								$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Gagal Upload File_2 - (file pdf max size 1023 kb) !</div>');
								redirect('Pengajuan');
							}else{
								$file_b = $this->upload->data('file_name');

								//file_c
								$file_c  = $_FILES['file_c'];
								if ($file_c = ''){
									$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Pastikan File File_3 Anda Benar !</div>');
									redirect('Pengajuan');
								}else{
									if(!$this->upload->do_upload('file_c')){
										$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Gagal Upload File_3 - (file pdf max size 1023 kb) !</div>');
										redirect('Pengajuan');
									}else{
										$file_c = $this->upload->data('file_name');

										// file_d
										$file_d = $_FILES['file_d'];
										if ($file_d = ''){
											$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Pastikan File File_4 Anda Benar !</div>');
											redirect('Pengajuan');
										}else{
											if(!$this->upload->do_upload('file_d')){
												$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Gagal Upload File_4 - (file pdf max size 1023 kb) !</div>');
												redirect('Pengajuan');
											}else{
												$file_d = $this->upload->data('file_name');

												date_default_timezone_set('Asia/Makassar');
												$tgl_ajuan = date('Y-m-d H:i:s');
												$date_update = date('Y-m-d H:i:s');

												$data_a = [
													'email' => $email,
													'instansi' => $inst,
													'kelurahan' => $kel,
													'kecamatan' => $kec,
													'nama_lengkap' => $this->input->post('nama_lengkap'),
													'ttl' => $ttl,
													'negara' => $this->input->post('negara'),
													'ktp_tgl' => $this->input->post('ktp_tgl'),
													'ktp_no' => $this->input->post('ktp_no'),
													'pekerjaan' => $this->input->post('pekerjaan'),
													'alamat' => $this->input->post('alamat'),
													'tgl_ajuan' => $tgl_ajuan,
													'tgl_update' => $date_update,
													'status' => $status,
													// 'koreksi_a' => $koreksi_a,
													// 'email' => $email,				
													'letak_jalan' => $this->input->post('letak_jalan'),
													'letak_kel' => $this->input->post('letak_kel'),
													'letak_kec' => $this->input->post('letak_kec'),
													'letak_kab' => $this->input->post('letak_kab'),
													'letak_prov' => $this->input->post('letak_prov'),
													'luas' => $this->input->post('luas'),
													'su_tgl' => $this->input->post('su_tgl'),
													'su_no' => $this->input->post('su_no'),
													'pb_tgl' => $this->input->post('pb_tgl'),
													'pb_no' => $this->input->post('pb_no'),
													'batas_u' => $this->input->post('batas_u'),
													'batas_t' => $this->input->post('batas_t'),
													'batas_s' => $this->input->post('batas_s'),
													'batas_b' => $this->input->post('batas_b'),
													'cat_a' => $this->input->post('cat_a'),
													'cat_b' => $this->input->post('cat_b'),
													'cat_c' => $this->input->post('cat_c'),
													'file_a' => $file_a,
													'file_b' => $file_b,
													'file_c' => $file_c,
													'file_d' => $file_d
													];

												$this->db->insert('pengajuan_a', $data_a);
												$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Anda telah membuat permohonan. Pengajuan Baru Terkirim!</div>');
													redirect('Pengajuan');
											}
										}
									}
								}
							}
						}
					}
				}
		
	}

	public function download_blanko(){
		force_download('assets/file_blanko/permohonan_hak_pakai.pdf', NULL);
	}

}
