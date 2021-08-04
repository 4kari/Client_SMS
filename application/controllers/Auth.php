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
            redirect('admin');
        // } elseif ($this->session->userdata('level') == 2) {
        //     redirect('admin');
        // } elseif ($this->session->userdata('level') == 3) {
        //     redirect('dosen');
        } elseif ($this->session->userdata('level') == 4) {
            redirect('mahasiswa');
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
        // mengecek user didalam database

        // cek jika user ada
        // if ($user) {
        //     // cek password
        //     if (password_verify($password, $user['password'])) {
        //         $data = [
        //             'username' => $user['username'],
        //             'level_id' => $user['level_id'],
        //         ];
        //         $this->session->set_flashdata('pesan', 'Login sukses!');
        //         $this->session->set_userdata($data);
        //         redirect('Auth');
        //     } else {
        //         $this->session->set_flashdata('pesan', 'Password salah!');
        //         redirect('Auth');
        //     }
        // } else {
        //     $this->session->set_flashdata('pesan', 'User belum terdaftar!');
        //     redirect('Auth');
        // }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');

        $this->session->set_flashdata('pesan', 'Logout berhasil');
        redirect('Auth');
    }

    public function block()
    {
        $leveluser = $this->session->userdata('level_id');
        $data['level'] = $this->db->get_where('user_level', ['id' => $leveluser])->row_array();
        $this->load->view('Auth/block', $data);
    }
    public function cek_level(){
        if ($this->session->userdata('level_id') == 1) {
            redirect('administrator');
        // } elseif ($this->session->userdata('level_id') == 2) {
        //     redirect('admin');
        // } elseif ($this->session->userdata('level_id') == 3) {
        //     redirect('dosen');
        // } elseif ($this->session->userdata('level_id') == 4) {
        //     redirect('mahasiswa');
        }
    }
}
