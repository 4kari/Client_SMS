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
                // json_decode($this->curl->simple_post('http://10.5.12.26/user/api/Mahasiswa/',$data,array(CURLOPT_BUFFERSIZE => 10)),true);
                var_dump(json_decode($this->curl->simple_post('http://localhost/microservice/user/api/Mahasiswa/',$data,array(CURLOPT_BUFFERSIZE => 10)),true));
                echo "mahasiswa ditambahkan";
        }else{
            echo "data kosong";
        }
    }

    public function getUserByLv($lvl1='null',$lvl2='null',$lvl3='null',$lvl4='null' ){
        $query ="SELECT u.id,  u.username, u.level_id, l.level as level FROM user u, user_level l WHERE u.level_id = l.id and
        (u.level_id=$lvl1 OR u.level_id=$lvl2 OR u.level_id=$lvl3 OR u.level_id=$lvl4)";
        return $this->db->query($query)->result_array();
    }
    public function getUserByProdi($level, $prodi){
        if ($level==3){
            $query ="SELECT u.id,  u.username, u.level_id, l.level as level FROM user u, user_level l, dosen d WHERE u.level_id = l.id AND d.username = u.id AND d.prodi=$prodi AND u.level_id=$level  
            ORDER BY `u`.`username` ASC";
        }
        if ($level==4){
            $query ="SELECT u.id,  u.username, u.level_id, l.level as level FROM user u, user_level l, mahasiswa m WHERE u.level_id = l.id AND m.username = u.id AND m.prodi=$prodi AND u.level_id=$level  
            ORDER BY `u`.`username` ASC";
        }
        return $this->db->query($query)->result_array();
    }
}
