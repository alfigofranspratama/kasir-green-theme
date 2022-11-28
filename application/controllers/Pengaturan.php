<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
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
        $this->form_validation->set_rules('nama_toko', 'nama toko', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $user = $this->session->userdata('user');
            $data = array(
                'title' => 'Pengaturan',
                'user' => $user,
                'content' => 'content/pengaturan'
            );
            $this->load->view('layouts', $data, FALSE);
        } else {
            $user = $this->session->userdata('user');
            $nama_toko = $this->input->post('nama_toko');
            $telepon = $this->input->post('telepon');
            $alamat = $this->input->post('alamat');
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            if (!empty($password)) {
                $update = array(
                    'nama_toko' => $nama_toko,
                    'telepon' => $telepon,
                    'alamat' => $alamat,
                    'username' => $username,
                    'password' => password_hash($password, PASSWORD_DEFAULT)
                );
            } else {
                $update = array(
                    'nama_toko' => $nama_toko,
                    'telepon' => $telepon,
                    'alamat' => $alamat,
                    'username' => $username,
                );
            }

            $this->db->where('id_users', $user['id_users']);
            $this->db->update('tb_users', $update);
            $this->session->set_flashdata("pesan", "<script>alert('Data berhasil di Simpan silahkan login kembali')</script>");
            redirect(base_url('auth'));
        }
    }
}

/* End of file Pengaturan.php */
