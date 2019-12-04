<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_data', 'mData');
        
    }
    
    public function index()
    {
        if($this->session->userdata['level'] == 2) 
        { redirect('pembelian');}
        $data['content'] = 'menu';
        $data['kategori']=$this->mData->getKategori();
        $data['menu']=$this->mData->getMasakan();
        $this->load->view('template', $data);
        
    }
    
}

/* End of file Menu.php */
