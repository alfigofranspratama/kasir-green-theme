<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user') === NULL) {
            redirect(base_url('auth'));
        }
    }

    public function trx(String $nota)
    {
        $user = $this->session->userdata('user');
        $barang = $this->db->get('tb_barang')->result();
        $keranjang = $this->db->get_where('tb_keranjang', ['id_nota' => $nota])->result();
        $barangKeranjang = $this->db->query("SELECT * FROM tb_barang JOIN tb_keranjang ON tb_keranjang.kode_barang = tb_barang.kode_barang WHERE tb_keranjang.id_nota = '$nota'")->result();

        $total = 0;
        foreach ($keranjang as $row) :
            $total += $row->sub_total;
        endforeach;

        $data = array(
            'title' => 'Kasir',
            'user' => $user,
            'barang' => $barang,
            'total' => $total,
            'keranjang' => $keranjang,
            'barangKeranjang' => $barangKeranjang,
            'content' => 'content/kasir'
        );
        $this->load->view('layouts', $data, FALSE);
    }

    public function keranjang(String $nota)
    {
        $kode_barang = $this->input->post('kode_barang');
        $quantity = $this->input->post('quantity');
        $subtotal = $this->input->post('subtotal');

        $data = array(
            'id_nota' => $nota,
            'kode_barang' => $kode_barang,
            'qty' => $quantity,
            'sub_total' => $subtotal,
        );

        $this->db->insert('tb_keranjang', $data);
        redirect(base_url('kasir/trx/') . $nota);
    }

    public function hapuskeranjang($id_nota, $id_brg)
    {
        $this->db->where('id_nota', $id_nota);
        $this->db->where('kode_barang', $id_brg);
        $this->db->delete('tb_keranjang');
        $this->session->set_flashdata("pesan", "<script>alert('Barang berhasil di hapus dari keranjang')</script>");
        redirect(base_url('kasir/trx/') . $id_nota);
    }

    public function bayar($nota)
    {
        $total = $this->input->post('total');
        $bayar = $this->input->post('bayar');
        $kembali = $bayar - $total;
        date_default_timezone_set("Asia/Jakarta");

        $data = array(
            'kode_nota' => $nota,
            'total' => $total,
            'bayar' => $bayar,
            'kembali' => $kembali,
            'tgl_transaksi' => date("Y-m-d")
        );

        $this->db->insert('tb_transaksi', $data);
        redirect(base_url('kasir/print/' . $nota));
    }
    
    public function print(String $nota)
    {
        $user = $this->session->userdata('user');
        $struk = $this->db->query("SELECT * FROM tb_barang JOIN tb_keranjang ON tb_keranjang.kode_barang = tb_barang.kode_barang WHERE tb_keranjang.id_nota = '$nota'")->result();
        $trx = $this->db->get_where('tb_transaksi', ['kode_nota' => $nota])->row_array();
        $data = array(
            'title' => 'none',
            'user' => $user,
            'struk' => $struk,
            'trx' => $trx,
        );
        $this->load->view('print', $data, FALSE);
        
    }
}

/* End of file Kasir.php */
