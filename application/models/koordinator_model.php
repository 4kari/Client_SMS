<?php
defined('BASEPATH') or exit('No direct script access allowed');

class koordinator_model extends CI_Model
{
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
        // $skripsi = json_decode($this->curl->simple_get('http://10.5.12.21/skripsi/api/Skripsi/'),true);
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
    public function updateTopik(){
        $dp1 = $this->input->post("pembimbing_1");
		$dp2 = $this->input->post("pembimbing_2");
        $id = $this->input->post("id");
        $nim = $this->input->post("nim");
        $topik = $this->input->post("topik");
        $status = $this->input->post("status");
        $data=[
            'id' => $id,
            'topik' => $topik,
            'nim' => $nim,
            'pembimbing_1' => $dp1,
            'pembimbing_2' => $dp2,
            'status' => $status
        ];
        // json_decode($this->curl->simple_put('http://10.5.12.26/skripsi/api/Skripsi/',$data,array(CURLOPT_BUFFERSIZE => 10)),true);
        json_decode($this->curl->simple_put('http://localhost/microservice/skripsi/api/Skripsi/',$data,array(CURLOPT_BUFFERSIZE => 10)),true);
    }
    public function valTopik($id){
        // $skripsi = json_decode($this->curl->simple_get('http://10.5.12.21/skripsi/api/Skripsi/',array("id" => $id),array(CURLOPT_BUFFERSIZE => 10)),true);
        $skripsi = json_decode($this->curl->simple_get('http://localhost/microservice/skripsi/api/Skripsi/',array("id" => $id),array(CURLOPT_BUFFERSIZE => 10)),true);
        $skripsi['data']['status']=1;
        // json_decode($this->curl->simple_put('http://10.5.12.21/skripsi/api/Skripsi/',$skripsi['data'],array(CURLOPT_BUFFERSIZE => 10)),true);
        json_decode($this->curl->simple_put('http://localhost/microservice/skripsi/api/Skripsi/',$skripsi['data'],array(CURLOPT_BUFFERSIZE => 10)),true);
    }
    public function deleteTopik($id){
        // json_decode($this->curl->simple_delete('http://10.5.12.26/skripsi/api/Skripsi/',array("id" => $id),array(CURLOPT_BUFFERSIZE => 10)),true);
        json_decode($this->curl->simple_delete('http://localhost/microservice/skripsi/api/Skripsi/',array("id" => $id),array(CURLOPT_BUFFERSIZE => 10)),true);
    }
}