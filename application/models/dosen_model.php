<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dosen_model extends CI_Model
{
    public function data_diri($username){
        $data = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/Dosen/', array(CURLOPT_BUFFERSIZE => 10)),true);
        for ($i=0;$i<count($data['data']);$i++){
            if ($data['data'][$i]['username']==$username){
                $data['data']=$data['data'][$i];
                break;
            }
        }
        return $data['data'];
    }
}