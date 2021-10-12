<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mahasiswa_model extends CI_Model
{
    public function data_diri($username){
        // $data = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/Mahasiswa/', array(CURLOPT_BUFFERSIZE => 10)),true);
        $data = json_decode($this->curl->simple_get('http://localhost/microservice/user/api/Mahasiswa/', array(CURLOPT_BUFFERSIZE => 10)),true);
        for ($i=0;$i<count($data['data']);$i++){
            if ($data['data'][$i]['username']==$username){
                $data['data']=$data['data'][$i];
                break;
            }
        }
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
////error gajelas////
        $skripsi = json_decode($this->curl->simple_get('http://localhost/microservice/skripsi/api/Skripsi_mhs/',array('nim'=>$nim), array(CURLOPT_BUFFERSIZE => 10)),true);
        // $skripsi = json_decode($this->curl->simple_get('http://10.5.12.21/skripsi/api/skripsi_mhs/',array('nim'=>$nim), array(CURLOPT_BUFFERSIZE => 10)),true);

        return $skripsi['data'];
    }
}