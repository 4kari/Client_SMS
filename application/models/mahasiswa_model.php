<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mahasiswa_model extends CI_Model
{
    public function data_diri($username){
        // $data = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/Mahasiswa/',array('nim'=>$username), array(CURLOPT_BUFFERSIZE => 10)),true);
        $data = json_decode($this->curl->simple_get('http://localhost/microservice/user/api/Mahasiswa/',array('nim'=>$username), array(CURLOPT_BUFFERSIZE => 10)),true);
        return $data['data'];
    }
    public function getTimeline(){
        $status = $this->getStatus();
        $data=[];
        $index=[0,1,2,3,5];
        for ($i=0;$i<count($status);$i++){
            for ($j=0;$j<count($index);$j++){
                if ($status[$i]['id']==$index[$j]){
                    array_push($data,$status[$i]);
                }
            }
        }
        return $data;
    }
    public function getStatus(){
        // $data = json_decode($this->curl->simple_get('http://10.5.12.21/skripsi/api/status/', array(CURLOPT_BUFFERSIZE => 10)),true);
        $data = json_decode($this->curl->simple_get('http://localhost/microservice/skripsi/api/status/', array(CURLOPT_BUFFERSIZE => 10)),true);
        return $data['data'];
    }
    public function getTopik(){
        // $data = json_decode($this->curl->simple_get('http://10.5.12.21/skripsi/api/topik/', array(CURLOPT_BUFFERSIZE => 10)),true);
        $data = json_decode($this->curl->simple_get('http://localhost/microservice/skripsi/api/topik/', array(CURLOPT_BUFFERSIZE => 10)),true);
        return $data['data'];
    }
    public function getDosen(){
        // $data = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/dosen/', array(CURLOPT_BUFFERSIZE => 10)),true);
        $data = json_decode($this->curl->simple_get('http://localhost/microservice/user/api/dosen/', array(CURLOPT_BUFFERSIZE => 10)),true);
        return $data['data'];
    }
    public function addTopik($topik, $dosen1, $dosen2){
        $username = $this->session->userdata('username');
        $data = [
            "nim" => $username,
            "topik" => $topik,
            "pembimbing_1" => $dosen1,
            "pembimbing_2" => $dosen2,
            "status" => 0
        ];
        $skripsi = $this->getSkripsi($username);
        if (!$skripsi){
            $post = json_decode($this->curl->simple_post('http://localhost/microservice/skripsi/api/skripsi/',$data, array(CURLOPT_BUFFERSIZE => 10)),true);
            // $post = json_decode($this->curl->simple_post('http://10.5.12.21/skripsi/api/skripsi/',$data, array(CURLOPT_BUFFERSIZE => 10)),true);
        }else{
            //gagal
        }
    }
    public function getSkripsi($nim){
        $skripsi = json_decode($this->curl->simple_get('http://localhost/microservice/skripsi/api/Skripsi/',array('nim'=>$nim), array(CURLOPT_BUFFERSIZE => 10)),true);
        // $skripsi = json_decode($this->curl->simple_get('http://10.5.12.21/skripsi/api/skripsi/',array('nim'=>$nim), array(CURLOPT_BUFFERSIZE => 10)),true);
        if ($skripsi){
            return($skripsi['data']);
        }else{
            return NULL;
        }
    }
    public function updateBerkas($data){
        $skripsi = json_decode($this->curl->simple_get('http://localhost/microservice/skripsi/api/Skripsi/',array('id'=>$data['id']), array(CURLOPT_BUFFERSIZE => 10)),true)['data'][0];
        // $skripsi = json_decode($this->curl->simple_get('http://10.5.12.21/skripsi/api/skripsi/',array('id'=>$data['id']), array(CURLOPT_BUFFERSIZE => 10)),true)['data'][0];
        $skripsi['berkas']=$data['berkas'];
        $skripsi = json_decode($this->curl->simple_put('http://localhost/microservice/skripsi/api/Skripsi/',$skripsi, array(CURLOPT_BUFFERSIZE => 10)),true);
        // $skripsi = json_decode($this->curl->simple_put('http://10.5.12.21/skripsi/api/skripsi/',$skripsi, array(CURLOPT_BUFFERSIZE => 10)),true);
    }
    public function getDiskusi($id,$tipe){
        $diskusi = json_decode($this->curl->simple_get('http://localhost/microservice/diskusi/api/Posting/',array('id_skripsi'=>$id), array(CURLOPT_BUFFERSIZE => 10)),true);
        // $skripsi = json_decode($this->curl->simple_get('http://10.5.12.56/diskusi/api/Posting/',array('id_skripsi'=>$id), array(CURLOPT_BUFFERSIZE => 10)),true);
        if ($diskusi){
            foreach($diskusi['data'] as $d){
                if ($d['tipe']==$tipe){
                    return $d;
                }
            }
        }else{
            return NULL;
        }
    }
    public function getKomentar($id){
        $komentar = json_decode($this->curl->simple_get('http://localhost/microservice/diskusi/api/Komentar/',array('id_post'=>$id), array(CURLOPT_BUFFERSIZE => 10)),true);
        // $komentar = json_decode($this->curl->simple_get('http://10.5.12.56/diskusi/api/Komentar/',array('id_post'=>$id), array(CURLOPT_BUFFERSIZE => 10)),true);
        if ($komentar){
            return($komentar['data']);
        }else{
            return NULL;
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
    public function getValidasi($id,$tipe){
        $validasi = json_decode($this->curl->simple_get('http://localhost/microservice/skripsi/api/Validasi/',array('id_skripsi'=>$id), array(CURLOPT_BUFFERSIZE => 10)),true);
        // $validasi = json_decode($this->curl->simple_get('http://10.5.12.21/skripsi/api/Validasi/',array('id_skripsi'=>$id), array(CURLOPT_BUFFERSIZE => 10)),true);
        if ($validasi){
            foreach($validasi['data'] as $v){
                if($v['tipe']==$tipe){return $v;}
            }
        }else{
            return NULL;
        }
    }
    public function ajukanSidang($id,$tipe){
        $validasi = json_decode($this->curl->simple_post('http://localhost/microservice/skripsi/api/Validasi/',array('id_skripsi'=>$id, 'tipe'=>$tipe), array(CURLOPT_BUFFERSIZE => 10)),true);
        // $validasi = json_decode($this->curl->simple_post('http://10.5.12.21/skripsi/api/Validasi/',array('id_skripsi'=>$id, 'tipe'=>$tipe), array(CURLOPT_BUFFERSIZE => 10)),true);
    }
}