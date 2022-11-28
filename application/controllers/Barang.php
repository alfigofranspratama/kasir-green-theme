<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user') === NULL) {
            redirect(base_url('auth'));
        }
    }
    

    public function index()
    {
        $this->form_validation->set_rules('nama_barang', 'Kode Barang', 'trim|required', [
            'required' => 'Kolom Wajib di Isi',
        ]);
        $this->form_validation->set_rules('harga_barang', 'Kode Barang', 'trim|required', [
            'required' => 'Kolom Wajib di Isi',
        ]);


        if ($this->form_validation->run() == FALSE) {
            $user = $this->session->userdata('user');
            $barang = $this->db->get('tb_barang')->result();
            $data = array(
                'title' => 'Barang',
                'user' => $user,
                'barang' => $barang,
                'content' => 'content/barang'
            );
            $this->load->view('layouts', $data, FALSE);
        } else {
            $query = $this->db->query("SELECT max(kode_barang) as kodeTerbesar FROM tb_barang")->row_array();
            $kodeBarang = $query['kodeTerbesar'];
            $urutan = (int) substr($kodeBarang, 3, 3);
            $urutan++;
            $huruf = "BRG";
            $kodeBarang = $huruf . sprintf("%03s", $urutan);

            date_default_timezone_set("Asia/Jakarta");
            $nama_barang = $this->input->post('nama_barang');
            $harga_barang = $this->input->post('harga_barang');
            $tgl_input = date("Y-m-d");

            $data = array(
                'kode_barang' => $kodeBarang,
                'nama_barang' => $nama_barang,
                'harga_barang' => $harga_barang,
                'tgl_input' => $tgl_input,
            );

            $this->db->insert('tb_barang', $data);
            $this->session->set_flashdata("pesan", "<script>alert('Barang berhasil di tambahkan')</script>");
            redirect(base_url('barang'));
        }
    }

    public function edit($id)
    {
        $barang = $this->db->get_where('tb_barang', ['id_barang' => $id])->row_array();
        $user = $this->session->userdata('user');
        $data = array(
            'title' => 'Barang',
            'user' => $user,
            'barang' => $barang,
            'content' => 'content/editbarang'
        );
        $this->load->view('layouts', $data, FALSE);
    }

    public function editbrg($id)
    {
        $nama_barang = $this->input->post('nama_barang');
        $harga_barang = $this->input->post('harga_barang');
        $data = array(
            'nama_barang' => $nama_barang,
            'harga_barang' => $harga_barang,
        );

        $this->db->where('id_barang', $id);
        $this->db->update('tb_barang', $data);
        $this->session->set_flashdata("pesan", "<script>alert('Barang berhasil di edit')</script>");
        redirect(base_url('barang'));
    }

    public function hapus($id)
    {
        $this->db->where('id_barang', $id);
        $this->db->delete('tb_barang');
        $this->session->set_flashdata("pesan", "<script>alert('Barang berhasil di hapus')</script>");
        redirect(base_url('barang'));
    }
}

/* End of file Barang.php */
