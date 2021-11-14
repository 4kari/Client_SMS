<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dosen_model extends CI_Model
{
    public function data_diri($username){
        // $data = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/Dosen/', array(CURLOPT_BUFFERSIZE => 10)),true);
        $data = json_decode($this->curl->simple_get('http://localhost/microservice/user/api/Dosen/', array('nip'=>$username),array(CURLOPT_BUFFERSIZE => 10)),true);
        return $data['data'];
    }
    public function getSkripsiB($nip){
        $skripsi = json_decode($this->curl->simple_get('http://localhost/microservice/skripsi/api/Skripsi/',array('nip'=>$nip), array(CURLOPT_BUFFERSIZE => 10)),true);
        // $skripsi = json_decode($this->curl->simple_get('http://10.5.12.21/skripsi/api/skripsi/',array('nim'=>$nim), array(CURLOPT_BUFFERSIZE => 10)),true);
        if ($skripsi){
            return $skripsi['data'];
        }else{
            return null;
        }
    }
    public function getPosting($nip){
        $posting = json_decode($this->curl->simple_get('http://localhost/microservice/diskusi/api/Posting/',array('nip'=>$nip), array(CURLOPT_BUFFERSIZE => 10)),true);
        // $posting[$i] = json_decode($this->curl->simple_get('http://10.5.12.56/diskusi/api/Posting/',array('nip'=>$nip), array(CURLOPT_BUFFERSIZE => 10)),true);
        if ($posting){
            return($posting['data']);
        }else{
            return NULL;
        }
    }
    public function getValidasi(){
        $validasi = json_decode($this->curl->simple_get('http://localhost/microservice/skripsi/api/Validasi/', array(CURLOPT_BUFFERSIZE => 10)),true);
        // $validasi = json_decode($this->curl->simple_get('http://10.5.12.21/skripsi/api/Validasi/', array(CURLOPT_BUFFERSIZE => 10)),true);
        if($validasi){
            return($validasi['data']);
        }else{
            return null;
        }
        
    }
    public function getBimbingan($id){
        $posting = json_decode($this->curl->simple_get('http://localhost/microservice/diskusi/api/Posting/',array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10)),true);
        // $posting[$i] = json_decode($this->curl->simple_get('http://10.5.12.56/diskusi/api/Posting/',array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10)),true);
        if ($posting){
            return($posting['data'][0]);
        }else{
            return NULL;
        }
    }
    public function getKomentar($id){
        $komentar = json_decode($this->curl->simple_get('http://localhost/microservice/diskusi/api/komentar/',array('id_post'=>$id), array(CURLOPT_BUFFERSIZE => 10)),true);
        // $komentar = json_decode($this->curl->simple_get('http://10.5.12.56/diskusi/api/komentar/', array('id_post'=>$id), array(CURLOPT_BUFFERSIZE => 10)),true);
        if($komentar){
            return $komentar['data'];
        }else{
            return null;
        }
    }
    public function addKomentar(){
        $data=[
			'id_post' => $this->input->post('id'),
			'pesan' => $this->input->post('pesan'),
            'pengirim' => $this->session->userdata['username'],
            'waktu' => time()
		];
        json_decode($this->curl->simple_post('http://localhost/microservice/diskusi/api/komentar/',$data, array(CURLOPT_BUFFERSIZE => 10)),true);
        // json_decode($this->curl->simple_post('http://10.5.12.56/diskusi/api/komentar/',$data, array(CURLOPT_BUFFERSIZE => 10)),true);
    }
    public function validasi($data){
        $validasi = json_decode($this->curl->simple_get('http://localhost/microservice/skripsi/api/Validasi/',array('id'=>$data['id']), array(CURLOPT_BUFFERSIZE => 10)),true)['data'];
        // $validasi = json_decode($this->curl->simple_get('http://10.5.12.21/skripsi/api/Validasi/',array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10)),true)['data'];
        $validasi[0][$data['sebagai']]=$data['nip'];
        // put
        json_decode($this->curl->simple_put('http://localhost/microservice/skripsi/api/Validasi/',$validasi[0], array(CURLOPT_BUFFERSIZE => 10)),true);
        // json_decode($this->curl->simple_put('http://10.5.12.21/skripsi/api/Validasi/',$validasi[0][0], array(CURLOPT_BUFFERSIZE => 10)),true);
    }
}