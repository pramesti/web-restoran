<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_data', 'mData');
        
    }
    
    public function index()
    {
        $data['content']='kategori';
        $data['kategori']=$this->mData->getKategori();
        $this->load->view('template', $data);
    }
    
}

/* End of file Kategori.php */
