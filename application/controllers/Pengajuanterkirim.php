<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuanterkirim extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model("Pengajuan_model");
		// $this->load->model("Qr_code_model");
		is_logged_in();
	}

	public function index() {
		$this->load->model('Pengajuan_model', 'list');

		$ses = $this->session->userdata('email');
		// echo $ses; die();
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

		$data2['pengajuan'] = $this->list->listPengajuan();
		$data['pengajuan_list'] = $this->db->get_where('pengajuan_a', ['email' => $this->session->userdata('email')])->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('user/pages/v_riwayat', $data2);
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
			$file_d = './assets/file_upload/' . $file->file_d;

			if (is_readable($file_a) && unlink($file_a)) {

				if (is_readable($file_b) && unlink($file_b)) {

					if (is_readable($file_c) && unlink($file_c)) {

						if (is_readable($file_d) && unlink($file_d)) {

							$this->Pengajuan_model->hapusData($id);
							$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Pengajuan Berhasil Dihapus!</div>');
							redirect('pengajuanterkirim');
						} else {
							$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Data Pengajuan Gagal Dihapus! (file_4) </div>');
							redirect('pengajuanterkirim');
						}

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

	public function edit($id) {
		$session = $this->session->userdata('email');
		$user = $this->db->get_where('pengajuan_a', ['id' => $id])->row_array();
		$user = $user['email'];

		$data['user'] = $this->db->get_where('users', ['email' => $session])->row_array();
		$data2['pengajuan'] = $this->db->get_where('pengajuan_a', ['id' => $id])->row_array();

		if ($session == $user) {
			$this->load->view('template/header', $data);
			$this->load->view('user/pages/v_edit_pengajuan', $data2);
			$this->load->view('template/footer', $data);

		} else {
			$this->load->view('blocked');
		}
	}

	public function editPengajuan() {

		$id = $this->input->post('id');
		$user = $this->db->get_where('pengajuan_a', ['id' => $id])->row_array();
		$filedb_a = $user['file_a'];
		$filedb_b = $user['file_b'];
		$filedb_c = $user['file_c'];
		$filedb_d = $user['file_d'];
		$file_frm_a = $this->input->post('file_a');
		$file_frm_b = $this->input->post('file_b');
		$file_frm_c = $this->input->post('file_c');
		$file_frm_d = $this->input->post('file_d');

		$config['upload_path'] = './assets/file_upload';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 2560; // 1MB
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		//file_1
		$file_a = $_FILES['file_a'];
		if ($file_frm_a != $filedb_a) {
			if (!$this->upload->do_upload('file_a')) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Gagal Upload File_1 - (file pdf max size 1023 kb) !</div>');
				redirect('Pengajuanterkirim');
			} else {
				$file_replace_a = $this->upload->data('file_name');
				//hapus_dokumen_lama
				$file_hapus_a = './assets/file_upload/' . $filedb_a;
				unlink($file_hapus_a);
			}
		}if ($file_frm_a == $filedb_a) {
			$file_replace_a = $filedb_a;
		}

		//file_2
		$file_b = $_FILES['file_b'];
		if ($file_frm_b != $filedb_b) {
			if (!$this->upload->do_upload('file_b')) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Gagal Upload File_2 - (file pdf max size 1023 kb) !</div>');
				redirect('Pengajuanterkirim');
			} else {
				$file_replace_b = $this->upload->data('file_name');
				//hapus_dokumen_lama
				$file_hapus_b = './assets/file_upload/' . $filedb_b;
				unlink($file_hapus_b);
			}
		}if ($file_frm_b == $filedb_b) {
			$file_replace_b = $filedb_b;
		}

		//file_3
		$file_c = $_FILES['file_c'];
		if ($file_frm_c != $filedb_c) {
			if (!$this->upload->do_upload('file_c')) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Gagal Upload File_3 - (file pdf max size 1023 kb) !</div>');
				redirect('Pengajuanterkirim');
			} else {
				$file_replace_c = $this->upload->data('file_name');
				//hapus_dokumen_lama
				$file_hapus_c = './assets/file_upload/' . $filedb_c;
				unlink($file_hapus_c);
			}
		}if ($file_frm_c == $filedb_c) {
			$file_replace_c = $filedb_c;
		}

		//file_4
		$file_d = $_FILES['file_d'];
		if ($file_frm_d != $filedb_d) {
			if (!$this->upload->do_upload('file_d')) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Gagal Upload File_3 - (file pdf max size 1023 kb) !</div>');
				redirect('Pengajuanterkirim');
			} else {
				$file_replace_d = $this->upload->data('file_name');
				//hapus_dokumen_lama
				$file_hapus_d = './assets/file_upload/' . $filedb_d;
				unlink($file_hapus_c);
			}
		}if ($file_frm_d == $filedb_d) {
			$file_replace_d = $filedb_d;
		}

		//replace_di_daatabase
		$ttl = $this->input->post('tempat') . ", " . $this->input->post('ttl');
		date_default_timezone_set('Asia/Makassar');
		$date_update = date('Y-m-d H:i:s');
		$status_periksa = "Belum Diperiksa";
		$status = 1;
		$data_a = [
			'instansi' => $this->input->post('nama_lengkap2'),
			'kelurahan' => $this->input->post('kel2'),
			'kecamatan' => $this->input->post('kec2'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'ttl' => $ttl,
			'negara' => $this->input->post('negara'),
			'ktp_tgl' => $this->input->post('ktp_tgl'),
			'ktp_no' => $this->input->post('ktp_no'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'alamat' => $this->input->post('alamat'),
			'tgl_update' => $date_update,
			'status_periksa' => $status_periksa,
			'status' => $status,
			// 'koreksi' => $koreksi,
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
			'file_a' => $file_replace_a,
			'file_b' => $file_replace_b,
			'file_c' => $file_replace_c,
			'file_d' => $file_replace_d,
		];
		// var_dump($data_a);
		// die();
		$this->db->where('id', $id);
		$this->db->update('pengajuan_a', $data_a);
		$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Anda telah mengubah permohonan!</div>');
		redirect('Pengajuanterkirim');
	}

	public function lihat($id) {
		// $this->id = $id;
		$session = $this->session->userdata('email');
		$user = $this->db->get_where('pengajuan_a', ['id' => $id])->row_array();
		$user = $user['email'];

		$data['user'] = $this->db->get_where('users', ['email' => $session])->row_array();
		$data2['pengajuan'] = $this->db->get_where('pengajuan_a', ['id' => $id])->row_array();

		if ($session == $user) {
			$this->load->view('template/header', $data);
			$this->load->view('user/pages/v_lihat_pengajuan', $data2);
			$this->load->view('template/footer', $data);

		} else {
			$this->load->view('blocked');
		}
	}

	public function cetakpdf($id) {
		//////----------membuat encripsi dari data base----------//////

		//ambil_data_dari_db_untuk_di_encripsi
		$session = $this->session->userdata('email');
		$user = $this->db->get_where('pengajuan_a', ['id' => $id])->row_array();

		// $user_ = $user['email'];
		// 	if($user['status']==2){
		// 		$pengajuan = "VERIFIED";
		// 	}else{
		// 		$pengajuan = "UNVERIFIED";
		// 	}

		// $tgl_ajuan = $user['tgl_ajuan'];
		// $e= explode(' ', $tgl_ajuan);
		// $tgl = ($e[0]);
		// $jam = ($e[1]);
		// $plainText = $tgl . "_" . $user['ktp_no'] . "_" . $user['luas'] . "_" . $pengajuan;
		$noreg = "PENGHAT.00" . base64_encode($user['id']) . $user['id'] . "11";
		$plainText = $noreg;
		// echo "Code Registrasi " . $plainText;die();

		//memulai_proses_encripsi
		$key_str = "12345678";
		$data_str = $plainText;
		$kunci = array();
		$data = array();
		//merubah / convert string dari key_str dan data_str ke ASCII masuk dalam array kunci dan data
		for ($a = 0; $a < strlen($key_str); $a++) {
			$kunci[] = ord($key_str{$a}); //ord akan convert string satu persatu ke ASCII
		}
		for ($b = 0; $b < strlen($data_str); $b++) {
			$data[] = ord($data_str{$b}); //sama dengan for pertama, convert to ASCII
		}
		//membuat kunci 256bit
		for ($knc = 0; $knc < 256; $knc++) {
			$state[] = $knc; //membuat array kunci sampai 256
		}

		//tahap saling menukar nilai data ke indek lain
		$len = count($kunci);
		$index1 = $index2 = 0; //inisial index1 dan index2 awal sebagai pointer
		for ($hitung = 0; $hitung < 256; $hitung++) {
			$index2 = ($kunci[$index1] + $state[$hitung] + $index2) % 256;
			$tmp = $state[$hitung]; // mengirim state indek hitung ke variabel smentara
			$state[$hitung] = $state[$index2];
			$state[$index2] = $tmp; //mengirim nilai dari tmp ke state index2
			$index1 = ($index1 + 1) % $len;
		}

		//enkripsi dengan rc4
		$len = count($data); //data dihitung panjang indeksnya
		$ix = $iy = 0; //inisial 2 variabel sebagai pointer
		for ($hitung1 = 0; $hitung1 < $len; $hitung1++) {
			$ix = ($ix + 1) % 256;
			$iy = ($state[$ix] + $iy) % 256;
			$tmp = $state[$ix]; //menyetor data ke variabel sementara
			$state[$ix] = $state[$iy]; //menukar data
			$state[$iy] = $tmp; //menukar data
			$data[$hitung1] ^= $state[($state[$ix] + $state[$iy]) % 256]; //operasi ekslusiv or (XOR) yang hasilnya akan di masukkan ke dalam data index hitung1
		}

		$data_str = "";
		for ($i = 0; $i < $len; $i++) {
			$data_str .= chr($data[$i]);
		}
		$str = base64_encode($data_str);

		//convert_array_to_string
		// $data_a = $data;
		// $pd = count($data_a)-1;
		// $gs = NULL;
		// 	for($a=0; $a<=$pd; $a++){
		// 		$myJSON = json_encode($data_a[$a]);
		// 			$gs = $gs . " " . $myJSON;
		// 			$str = $gs;
		// 	}
		// $str_ = $str;
		// $pattern = '/ /i';
		// $str = substr(preg_replace($pattern, '_', $str_), 1);//chipertext sudah menjadi string

		//////----------membuat QR dari string chipertext----------//////

		//generateQR
		$this->load->library('ciqrcode');

		$config['cacheable'] = TRUE;
		$config['cachedir'] = './assets';
		$config['erorlog'] = './assets';
		$config['imagedir'] = './assets/QRCODE/';
		$config['encrypt_name'] = TRUE;
		$config['quality'] = TRUE;
		$config['size'] = '1024';
		$config['balck'] = array(224, 225, 225);
		$config['white'] = array(70, 130, 180);
		$this->ciqrcode->initialize($config);

		$image_name = "qr_" . $user['id'] . "__" . $user['status'] . '.png'; //image_name
		$params['data'] = $str;
		$params['level'] = 'H';
		$params['size'] = 5;
		$params['savename'] = FCPATH . $config['imagedir'] . $image_name;
		$this->ciqrcode->generate($params);

		// $data['title'] = 'Halaman Gnerate';
		// $data['img'] = $image_name;
		// $this->load->view('coba_qr', $data);

		$s_db = ['chipertext' => $str,
			'qr_image_name' => $image_name];
		$this->db->where('id', $id);
		$this->db->update('pengajuan_a', $s_db); //update data base memasukkan string chipertext dan nama image QRCode

		//generatePDFs
		// $this->load->library('pdfgenerator');
		$data['user'] = $this->db->get_where('users', ['email' => $session])->row_array();
		$data2['pengajuan'] = $this->db->get_where('pengajuan_a', ['id' => $id])->row_array();
		// var_dump ($data2); die();
		$html = $this->load->view('cetak_hat/blngk_download_permohonan_hat.html', $data2);
		// $html = $this->load->view('cetak_hat/blngk_download_permohonan_hat.html', $data2, true);
		// return $html;
		// $this->pdfgenerator->generate($html,'Blanko_Permohonan_HAT');
	}

	public function download_file($id) {
		$file2 = 'assets/file_upload/' . $id;
		force_download($file2, NULL);
	}

}
