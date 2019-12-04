<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_data', 'mData');
        
    }

    public function index()
    {
        $data['content'] = 'pembelian';
        $data['pembelian']=$this->mData->getTransaksi();
        $this->load->view('template', $data);
    }



}

/* End of file Pembelian.php */
