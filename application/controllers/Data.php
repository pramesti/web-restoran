<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_data', 'mData');
        
    }
    
    public function index()
    {
    }

    public function insertKategori()
    {
        if ($this->mData->insertKategori()) {
            redirect('kategori','refresh');
        } else {
            redirect('kategori','refresh');
        }
    }

    public function insertMasakan()
    {
        if ($this->mData->insertMasakan()) {
            redirect('menu','refresh');
        } else {
            redirect('menu','refresh');
        }
    }

    public function insertPelanggan()
    {
        if ($this->mData->insertPelanggan()) {
            redirect('login','refresh');
        } else {
            redirect('register','refresh');
        }
    }

    public function addToCart($id)
    {
        if ($this->mData->addToCart($id)) {
            redirect('menu','refresh');
        } else {
            redirect('menu','refresh');
        }
    }

    public function removeFromCart($id)
    {
        if ($this->mData->removeFromCart($id)) {
            redirect('menu','refresh');
        } else {
            redirect('menu','refresh');
        }
    }

    public function checkout()
    {
        if ($this->mData->checkout()) {
            redirect('menu','refresh');
        } else {   
            redirect('menu','refresh');
        }
    }
    public function verifikasi($id, $status)
    {
        if ($this->mData->verifikasi($id, $status)) {
            redirect('pembelian','refresh');
        } else {   
            redirect('pembelian','refresh');
        }
    }

    public function delete($table, $id)
    {
        if ($this->mData->hapus($table, $id)) {
            redirect($table,'refresh');
        } else {   
            redirect($table,'refresh');
        }        
    }


    public function edit($table = '', $id = '')
    {
        $data['content'] = 'edit';
        $data['kategori']=$this->mData->getKategori();
        $data['editable'] = $this->mData->getById($table, $id);
        $data['input'] = array_keys(get_object_vars($data['editable']));
        $this->load->view('template', $data);
    }

    public function simpanEdit($table, $id)
    {
        if($this->mData->edit_data($table, $id)) {
            if ($table == 'masakan') redirect('menu');
            else redirect($table);
        } else {
            redirect('edit/'.$table.'/'.$id, 'refresh');
        }
    }
    
}

/* End of file Data.php */
