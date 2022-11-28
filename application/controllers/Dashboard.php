<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
        $data = array (
            'title' => 'Dashboard',
            'user' => $user,
            'content' => 'content/dashboard'
        );
        $this->load->view('layouts', $data, FALSE);
        
    }

}

/* End of file Dashboard.php */

?>