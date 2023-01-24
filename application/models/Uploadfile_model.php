<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadfile_model extends CI_Model{

	public function _uploadFile(){

		$config['upload_path']          = './upload/product/';
	    $config['allowed_types']        = 'gif|jpg|png|pdf';
	    $config['file_name']            = $this->product_id;
	    $config['overwrite']			= true;
	    $config['max_size']             = 1024; // 1MB
	    // $config['max_width']            = 1024;
	    // $config['max_height']           = 768;

	    $this->load->library('upload', $config);

	    if ($this->upload->do_upload('image')) {
	        return $this->upload->data("file_name");
	    }
	    
	    return "default.jpg";

	}

}