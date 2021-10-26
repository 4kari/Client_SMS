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
    public function getPosting($skripsi){
        $posting=$skripsi;
        for ($i=0;$i<count($skripsi);$i++){
            $posting[$i] = json_decode($this->curl->simple_get('http://localhost/microservice/diskusi/api/Posting/',array('id_skripsi'=>$skripsi[$i]['id']), array(CURLOPT_BUFFERSIZE => 10)),true);
            // $posting[$i] = json_decode($this->curl->simple_get('http://10.5.12.56/diskusi/api/Posting/',array('id_skripsi'=>$id), array(CURLOPT_BUFFERSIZE => 10)),true);
        }
        if ($posting){
            return($posting);
        }else{
            return NULL;
        }
    }
}