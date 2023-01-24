<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_model extends CI_Model{

	public function hapusData($id){	
		
		$this->db->where('id', $id);
		$this->db->delete('pengajuan_a');
	}

	public function listPengajuan(){

		$ses = $this->session->userdata('email');

		$this->db->select('*');
		$this->db->from('pengajuan_a');
		$this->db->join('stpengajuan_status', 'stpengajuan_status.id_status = pengajuan_a.status');
		$this->db->where('pengajuan_a.email', $ses);
		return $this->db->get()->result_array();

	}

	public function listPeriksa(){

		$this->db->select('*');
		$this->db->from('pengajuan_a');
		$this->db->join('stpengajuan_status', 'stpengajuan_status.id_status = pengajuan_a.status');
		// $this->db->where('pengajuan_a.email', $ses);
		return $this->db->get()->result_array();

	}

	public function getFileByID($id){

		return $this->db->get_where('pengajuan_a', array('id'=>$id));

	}

	public function qr($kodeqr)
	{
		if($kodeqr){
			$filename = 'qr/'.$kodeqr;
			if (!file_exists($filename)) { 
					$this->load->library('ciqrcode');
					$params['data'] = $kodeqr;
					$params['level'] = 'H';
					$params['size'] = 10;
					$params['savename'] = FCPATH.'qr/'.$kodeqr.".png";
					return  $this->ciqrcode->generate($params);
			}
		}
	}

}
