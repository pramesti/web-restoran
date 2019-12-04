<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_data', 'mData');
        
    }
    
    public function index()
    {
        $data['content']='pelanggan';
        $data['pelanggan']=$this->mData->getPelanggan();
        $this->load->view('template', $data);
    }
    
}


/* End of file Pelanggan.php */
