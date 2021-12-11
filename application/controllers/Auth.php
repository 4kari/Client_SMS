<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }
    public function index()
    {
        if ($this->session->userdata('level') == 1) {
            redirect('Admin');
        } elseif ($this->session->userdata('level') == 2) {
            redirect('Koordinator');
        } elseif ($this->session->userdata('level') == 3) {
            redirect('Dosen');
        } elseif ($this->session->userdata('level') == 4) {
            redirect('Mahasiswa');
        }
        else{
            redirect('publik');
        }
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->user_model->login($username,$password);
        redirect('Auth');
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');

        $this->session->set_flashdata('pesan', 'Logout berhasil');
        redirect('Auth');
    }
}
