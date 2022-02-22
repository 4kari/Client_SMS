<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{
    // protected $ipSkripsi='http://10.5.12.24/skripsi/api/';
    // protected $ipPenjadwalan='http://10.5.12.82/penjadwalan/api/';
    // protected $ipDiskusi='http://10.5.12.56/diskusi/api/';
    // protected $ipUser='http://10.5.12.18/user/api/';

    protected $ipSkripsi='http://localhost:8080/microservice/skripsi/api/';
    protected $ipPenjadwalan='http://localhost:8080/microservice/penjadwalan/api/';
    protected $ipDiskusi='http://localhost:8080/microservice/diskusi/api/';
    protected $ipUser='http://localhost:8080/microservice/user/api/';
    
    public function login($username, $password){
        $data = [
            'username' => $username,
            'password' => $password
        ];
        $user = json_decode($this->curl->simple_post($this->ipUser.'Login/',$data, array(CURLOPT_BUFFERSIZE => 10)),true);
        if ($user['status']){
            $this->session->set_userdata($user['data']);
            $this->session->set_flashdata('pesan', 'Login sukses!');
        }else{
            $this->session->set_flashdata('pesan', 'Login gagal!');
        }
    }
    public function getUsers()
    {
        $user = json_decode($this->curl->simple_get($this->ipUser.'User/'),true);
        return $user['data'];
    }
    public function getLevel(){
        $level = json_decode($this->curl->simple_get($this->ipUser.'Level/'),true);
        return $level['data'];
    }
    //prodi
    public function getProdi()
    {
        $prodi = json_decode($this->curl->simple_get($this->ipUser.'Prodi/'),true);
        return $prodi['data'];
    }

    //dosen
    public function getDosen()
    {
        $dosen = json_decode($this->curl->simple_get($this->ipUser.'Dosen/'),true);
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
            json_decode($this->curl->simple_post($this->ipUser.'Dosen/',$data,array(CURLOPT_BUFFERSIZE => 10)),true);
        }
    }
    function delDosen($nip)
	{
        $data=['nip'=>$nip];
        json_decode($this->curl->simple_delete($this->ipUser.'Dosen/',$data,array(CURLOPT_BUFFERSIZE => 10)),true);
	}
    //mahasiswa
    public function getMahasiswa()
    {
        $mhs = json_decode($this->curl->simple_get($this->ipUser.'Mahasiswa/'),true);
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
            json_decode($this->curl->simple_post($this->ipUser.'Mahasiswa/',$data,array(CURLOPT_BUFFERSIZE => 10)),true);
            echo "mahasiswa ditambahkan";
        }else{
            echo "data kosong";
        }
    }
    function delMahasiswa($nim)
	{
        $data=['nim'=>$nim];
        json_decode($this->curl->simple_delete($this->ipUser.'Dosen/',$data,array(CURLOPT_BUFFERSIZE => 10)),true);
	}
    public function UpUser($data){
        json_decode($this->curl->simple_put($this->ipUser.'user/',$data,array(CURLOPT_BUFFERSIZE => 10)),true);
    }
    
}
