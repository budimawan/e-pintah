<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qr_code_model extends CI_Model{

	function qr($kodeqr)
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
