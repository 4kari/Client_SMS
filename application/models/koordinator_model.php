<?php
defined('BASEPATH') or exit('No direct script access allowed');

class koordinator_model extends CI_Model
{
    public function data_diri($username){
        $data = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/dosen/', array(CURLOPT_BUFFERSIZE => 10)),true);
        for ($i=0;$i<count($data['data']);$i++){
            if ($data['data'][$i]['username']==$username){
                $data['data']=$data['data'][$i];
                break;
            }
        }
        return $data['data'];
    }
    public function getDosen()
    {
        // $dosen = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/Dosen/'),true);
        $dosen = json_decode($this->curl->simple_get('http://localhost/microservice/user/api/Dosen/'),true);
        return $dosen['data'];
    }
    public function getMahasiswa()
    {
        // $mhs = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/Mahasiswa/'),true);
        $mhs = json_decode($this->curl->simple_get('http://localhost/microservice/user/api/Mahasiswa/'),true);
        return $mhs['data'];
    }
    public function getTopik()
    {
        // $mhs = json_decode($this->curl->simple_get('http://10.5.12.21/skripsi/api/Topik/'),true);
        $skripsi = json_decode($this->curl->simple_get('http://localhost/microservice/skripsi/api/Skripsi/'),true);
        $data=[];
        if ($skripsi){
            for ($i=0;$i<count($skripsi['data']);$i++){
                if ($skripsi['data'][$i]['status']==0){
                    array_push($data,$skripsi['data'][$i]);
                }
            }
        }
        return $data;
    }
}