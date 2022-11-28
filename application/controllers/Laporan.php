<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user') === NULL) {
            redirect(base_url('auth'));
        }
    }

    public function index()
    {
        $user = $this->session->userdata('user');
        $laporan = $this->db->get('tb_transaksi')->result();

        if ($this->input->get('dari') && $this->input->get('sampai')) {
            $dari = $this->input->get('dari');
            $sampai = $this->input->get('sampai');
            $laporan = $this->db->query("SELECT * FROM tb_transaksi WHERE tgl_transaksi BETWEEN '$dari' AND '$sampai'")->result();
        }

        $data = array (
            'title' => 'Laporan',
            'user' => $user,
            'laporan' => $laporan,
            'content' => 'content/laporan'
        );
        $this->load->view('layouts', $data, FALSE);
        
    }

}

/* End of file Laporan.php */

?>