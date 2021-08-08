<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{
    public function login($username, $password){
        $data = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/User/',array('username'=>$username), array(CURLOPT_BUFFERSIZE => 10)),true);
        //hash password
        if ($data!=null){
            if ($data['data']['password']==$password){
                echo "username dan password benar";
                $user=[
                        'username' => $data['data']['username'],
                        'level' => $data['data']['level']
                    ];
                $this->session->set_flashdata('pesan', 'Login sukses!');
                $this->session->set_userdata($user);
            }else{
                $this->session->set_flashdata('pesan', 'Password salah!');
            }
        }else{
            $this->session->set_flashdata('pesan', 'Username tidak ditemukan!');
        }
    }
    public function getUsers()
    {
        $user = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/User/'),true);
        $level = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/Level/'),true);
        $data=$user['data'];
        for ($i=0;$i<count($data);$i++){
            for ($j=0;$j<count($level['data']);$j++){
                if ($data[$i]['level']==$level['data'][$j]['id']){
                    $data[$i]['level']=$level['data'][$j]['level'];
                }
            }
            
        }
        return $data;
    }
    //prodi
    public function getProdi()
    {
        $prodi = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/Prodi/'),true);
        return $prodi['data'];
    }

    //dosen
    public function getDosen()
    {
        $dosen = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/Dosen/'),true);
        return $dosen['data'];
    }
    public function addDosen()
    {
        $nip=$this->input->post('nip');
        $nama=$this->input->post('nama');
        if($nip!="" && $nama!=""){
            $user = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/User/'),true);
            $cek=false;
            for ($i=0;$i<count($user);$i++){
                if($user['data'][$i]['username']==$nip){
                    $cek=true;
                }
            }
            if($cek==false){
                echo "user tidak ditemukan";
                $data=[
                    'username'=>$nip,
                    'password'=>$nip,
                    'level'=>"3"
                ];
                json_decode($this->curl->simple_post('http://10.5.12.26/user/api/user/',$data,array(CURLOPT_BUFFERSIZE => 10)),true);
            }
            $dosen = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/Dosen/',array('nip'=>$nip),array(CURLOPT_BUFFERSIZE => 10)),true);
            if ($dosen==NULL){
                $data=[
                    'nip'=>$nip,
                    'nama'=>$nama,
                    'username'=>$nip,
                    'tanggal_buat'=> date("Y-m-d",time())
                ];
                json_decode($this->curl->simple_post('http://10.5.12.26/user/api/Dosen/',$data,array(CURLOPT_BUFFERSIZE => 10)),true);
                echo "dosen ditambahkan";
            }else{
                echo "data sudah ada";
            }
        }else{
            echo "data kosong";
        }
    }

    //mahasiswa
    public function getMahasiswa()
    {
        $mhs = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/Mahasiswa/'),true);
        return $mhs['data'];
    }
    public function addMahasiswa()
    {
        $nim=$this->input->post('nim');
        $nama=$this->input->post('nama');
        if($nim!="" && $nama!=""){
            $user = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/User/'),true);
            $cek=false;
            for ($i=0;$i<count($user);$i++){
                if($user['data'][$i]['username']==$nim){
                    $cek=true;
                }
            }
            if($cek==false){
                echo "user tidak ditemukan";
                $data=[
                    'username'=>$nim,
                    'password'=>$nim,
                    'level'=>"4"
                ];
                json_decode($this->curl->simple_post('http://10.5.12.26/user/api/user/',$data,array(CURLOPT_BUFFERSIZE => 10)),true);
            }
            $mhs = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/Mahasiswa/',array('nim'=>$nim),array(CURLOPT_BUFFERSIZE => 10)),true);
            if ($mhs==NULL){
                $data=[
                    'nim'=>$nim,
                    'nama'=>$nama,
                    'username'=>$nim,
                    'prodi'=> substr($nim, 4, 3),
                    'tanggal_buat'=> date("Y-m-d",time())
                ];
                json_decode($this->curl->simple_post('http://10.5.12.26/user/api/Mahasiswa/',$data,array(CURLOPT_BUFFERSIZE => 10)),true);
                echo "mahasiswa ditambahkan";
            }else{
                echo "data sudah ada";
            }
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
