<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_data extends CI_Model {
    
    public function insertPelanggan()
    {
        $data= array(
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        if ($this->db->insert('pelanggan', $data)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getPelanggan()
    {
        $result = $this->db->get('pelanggan')->result();
        return $result;
    }
    
    public function getPelangganbyId($id = 0)
    {
        $result = $this->db->where('id_pelanggan', $id)->get('pelanggan')->row();
        return $result;
    }
    public function loginUser()
    {
        $result = $this->db->where('username', $this->input->post('username'))->where('password', $this->input->post('password'))->get('user');
        if ($result->num_rows()) {
            
            $admin = array(
                'id_user' => $result->row()->id_user,
                'nama_user' => $result->row()->nama_user,
                'level' => $result->row()->id_level
            );
            $this->session->set_userdata( $admin );            
            return true;
        } else {
            return false;
        }
    }
    public function getPelangganLogin()
    {
        if ($this->loginUser()) {
            return true;
        } else {       
            $result = $this->db->where('username', $this->input->post('username'))->where('password', $this->input->post('password'))->get('pelanggan');
            if ($result->num_rows()) {
                
                $pelanggan = array(
                    'id_pelanggan' => $result->row()->id_pelanggan,
                    'nama_pelanggan' => $result->row()->nama_pelanggan,
                    'alamat' => $result->row()->alamat,
                    'telp' => $result->row()->telp,
                    'level' => 0
            );
            $this->session->set_userdata( $pelanggan );            
            return true;
        } else {
            return false;
        }
    }
        
    }
    public function insertKategori()
    {
        $data= array(
            'nama_kategori' => $this->input->post('nama_kategori')
        );
        
        if ($this->db->insert('kategori', $data)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getKategori()
    {
        $result = $this->db->get('kategori')->result();
        return $result;
    }
    
    public function insertMasakan()
    {
        $data= array(
            'nama_masakan' => $this->input->post('nama_masakan'),
            'harga' => $this->input->post('harga'),
            'id_kategori' => $this->input->post('kategori'),
            'status_masakan' => $this->input->post('status_masakan'),
            'gambar' => $this->input->post('gambar')
        );
        if ($this->db->insert('masakan', $data)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getMasakan()
    {
        $result = $this->db->join('kategori', 'kategori.id_kategori = masakan.id_kategori')->get('masakan')->result();
        return $result;
    }
    
    public function getMasakanbyId($id = 0)
    {
        $result = $this->db->join('kategori', 'kategori.id_kategori = masakan.id_kategori')->where('id_masakan', $id)->get('masakan ')->row();
        return $result;
    }
    
    public function addToCart($id = 0)
    {
        $masakan = $this->getMasakanbyId($id);
        $data = array(
            'id'      => $masakan->id_masakan,
            'qty'     => 1,
            'price'   => $masakan->harga,
            'name'    => $masakan->nama_masakan,
            'options' => array('kategori' => $masakan->id_kategori, 'status_masakan' => $this->input->post('status_masakan'), 'gambar' => $masakan->gambar)
        );
        
        if ($this->cart->insert($data)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function removeFromCart($id = 0)
    {
        if ($this->cart->remove($id)) {
            return true;
        } else {
            return false;            
        }        
    }
    
    public function checkout()
    {
        $order = array(
            'id_pelanggan' => $this->session->userdata('id_pelanggan'),
            'tanggal' => date('YYYY-MM-dd'),
            'no_meja' => $this->input->post('no_meja'),
            'keterangan' => $this->input->post('keterangan'),
            'total_bayar' => $this->cart->total()
        );
        $this->db->insert('order', $order);
        $id_order = $this->db->insert_id();
        
        if($id_order) {
            foreach ($this->cart->contents() as $items) {
                $det_order = array(
                    'id_order' => $id_order, 
                    'id_masakan' => $items['id'],
                    'total_item' => $items['qty'],
                    'subtotal' => $items['subtotal']
                );
                $this->db->insert('detail_order', $det_order);
            }
            $this->cart->destroy();
            return true;
        } else {
            return false;
        }
        
    }

    public function getTransaksi()
    {
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = order.id_pelanggan');
        
        $order = $this->db->get('order')->result();
        return $order;
    }

    public function getDetailOrder($id = 0)
    {
        $this->db->join('masakan', 'masakan.id_masakan = detail_order.id_masakan');
        $this->db->where('id_order', $id);
        return $this->db->get('detail_order')->result(); 
    }
    public function Verifikasi($id, $status)
    {
        $verifikasi = array(
            'id_user' => $this->session->userdata('id_user'),
            'status_order' => $status
        );
        if($this->db->where('id_order', $id)->update('order', $verifikasi)) {
            return true;
        } else {
            return false;
        }
    }

    public function hapus($table, $id)
    {
        if($this->db->where('id_'.$table, $id)->delete($table)) {
            return true;
        } else {
            return false;
        }
    }

    public function edit_data($table, $id)
    {
        $data = $this->input->post();
        $this->db->where('id_'.$table, $id);
        return $this->db->update($table, $data);
    }

    public function getById($table, $id)
    {
        $this->db->where('id_'.$table, $id);
        return $this->db->get($table)->row();
    }
}

/* End of file Model_data.php */
