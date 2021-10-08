<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{
    public function login($username, $password){
        $data = [
            'username' => $username,
            'password' => $password
        ];
        $user = json_decode($this->curl->simple_post('http://localhost/microservice/user/api/Login/',$data, array(CURLOPT_BUFFERSIZE => 10)),true);
        // $user = json_decode($this->curl->simple_post('http://10.5.12.26/user/api/Login/',$data, array(CURLOPT_BUFFERSIZE => 10)),true);
        if ($user['status']){
            $this->session->set_userdata($user['data']);
            $this->session->set_flashdata('pesan', 'Login sukses!');
        }else{
            $this->session->set_flashdata('pesan', 'Login gagal!');
        }
    }
    public function getUsers()
    {
        // $user = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/User/'),true);
        $user = json_decode($this->curl->simple_get('http://localhost/microservice/user/api/User/'),true);
        return $user['data'];
    }
    public function getLevel(){
        // $level = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/Level/'),true);
        $level = json_decode($this->curl->simple_get('http://localhost/microservice/user/api/Level/'),true);
        return $level['data'];
    }
    //prodi
    public function getProdi()
    {
        // $prodi = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/Prodi/'),true);
        $prodi = json_decode($this->curl->simple_get('http://localhost/microservice/user/api/Prodi/'),true);
        return $prodi['data'];
    }

    //dosen
    public function getDosen()
    {
        // $dosen = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/Dosen/'),true);
        $dosen = json_decode($this->curl->simple_get('http://localhost/microservice/user/api/Dosen/'),true);
        return $dosen['data'];
    }
    public function addDosen()
    {
        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        if ($nip && $nama){
            $data = [
                'nip' => $nip,
                'nama' => $nama
            ];
            // json_decode($this->curl->simple_post('http://10.5.12.26/user/api/Dosen/',$data,array(CURLOPT_BUFFERSIZE => 10)),true);
            json_decode($this->curl->simple_post('http://localhost/microservice/user/api/Dosen/',$data,array(CURLOPT_BUFFERSIZE => 10)),true);
        }
    }

    //mahasiswa
    public function getMahasiswa()
    {
        // $mhs = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/Mahasiswa/'),true);
        $mhs = json_decode($this->curl->simple_get('http://localhost/microservice/user/api/Mahasiswa/'),true);
        if($mhs){return $mhs['data'];}
        else{return null;}
    }
    public function addMahasiswa()
    {
        $nim=$this->input->post('nim');
        $nama=$this->input->post('nama');
        
        if($nim && $nama){
            $data = [
                'nim'=>$nim,
                'nama'=>$nama
            ];
            // json_decode($this->curl->simple_post('http://10.5.12.26/user/api/Mahasiswa/',$data,array(CURLOPT_BUFFERSIZE => 10)),true);
            json_decode($this->curl->simple_post('http://localhost/microservice/user/api/Mahasiswa/',$data,array(CURLOPT_BUFFERSIZE => 10)),true);
            echo "mahasiswa ditambahkan";
        }else{
            echo "data kosong";
        }
    }
}
