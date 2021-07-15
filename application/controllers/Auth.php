<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->cek_level();
        $data['pass'] = $this->session->userdata('captchaword');

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('captcha', 'captcha', 'trim|callback_check_captcha|required');

        if ($this->form_validation->run() == false) {

            $data['judul'] = 'Halaman Login';
            $data['img'] = $this->create_captcha();
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // mengecek user didalam database
        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        // cek jika user ada
        if ($user) {
            // cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'level_id' => $user['level_id'],
                    'nama' => $user['nama'],
                    'email' => $user['email']
                ];



                $this->session->set_userdata($data);

                if ($user['level_id'] == 1) {
                    redirect('administrator');
                } else if ($user['level_id'] == 2) {
                    redirect('admin');
                } else if ($user['level_id'] == 3) {
                    redirect('dosen');
                } else if ($user['level_id'] == 4) {
                    redirect('mahasiswa');
                }
            } else {
                $this->session->set_flashdata('pesan', 'Password salah!');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', 'User belum terdaftar!');
            redirect('auth');
        }
    }

    public function create_captcha()
    {
        $options = array(
            'img_path' => './captcha/',
            'img_url' => base_url('captcha/'),
            'img_width' => '295',
            'img_height' => '50',
            'pool' => '123456789',
            'word_length'   => 4,
            'expiration' => 7200
        );

        $cap = create_captcha($options);
        $image = $cap['image'];
        // var_dump($cap['word']);

        $this->session->set_userdata('captchaword', $cap['word']);

        return $image;
    }

    public function refresh_captcha()
    {
        $options = array(
            'img_path' => './captcha/',
            'img_url' => base_url('captcha/'),
            'img_width' => '295',
            'img_height' => '50',
            'pool' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            'word_length'   => 4,
            'expiration' => 7200
        );

        $cap = create_captcha($options);
        $image = $cap['image'];

        $this->session->set_userdata('captchaword', $cap['word']);

        echo $cap['image'];
        return $image;
    }

    public function check_captcha()
    {
        if ($this->input->post('captcha') == $this->session->userdata('captchaword')) {
            return true;
        } else {
            $this->form_validation->set_message('check_captcha', 'Captcha is wrong');
            return false;
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level_id');
        $this->session->unset_userdata('keyword');

        $this->session->set_flashdata('pesan', 'Logout berhasil');
        redirect('auth');
    }

    public function block()
    {
        $leveluser = $this->session->userdata('level_id');
        $data['level'] = $this->db->get_where('user_level', ['id' => $leveluser])->row_array();
        $this->load->view('auth/block', $data);
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
