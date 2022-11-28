<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Login Kasir'
            );
            $this->load->view('auth/login', $data, FALSE);
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $data = array (
                'username' => $username,
                'password' => $password
            );

            $user = $this->db->get_where('tb_users', ['username' => $username])->row_array();

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $session = array(
                        'user' => $user
                    );
                    $this->session->set_userdata($session);
                    redirect(base_url('dashboard'));
                } else {
                    $this->session->set_flashdata("pesan", "<script>alert('Password {$username} salah.')</script>");
                    redirect(base_url('auth'));
                }
            } else {
                $this->session->set_flashdata("pesan", "<script>alert('Username {$username} tidak terdaftar.')</script>");
                redirect(base_url('auth'));
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }
}

/* End of file Auth.php */
