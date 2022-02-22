<?php
defined('BASEPATH') or exit('No direct script access allowed');

class koordinator_model extends CI_Model
{
    // protected $ipSkripsi='http://10.5.12.24/skripsi/api/';
    // protected $ipPenjadwalan='http://10.5.12.82/penjadwalan/api/';
    // protected $ipDiskusi='http://10.5.12.56/diskusi/api/';
    // protected $ipUser='http://10.5.12.18/user/api/';

    protected $ipSkripsi='http://localhost:8080/microservice/skripsi/api/';
    protected $ipPenjadwalan='http://localhost:8080/microservice/penjadwalan/api/';
    protected $ipDiskusi='http://localhost:8080/microservice/diskusi/api/';
    protected $ipUser='http://localhost:8080/microservice/user/api/';
    
    public function getDosen()
    {
        $dosen = json_decode($this->curl->simple_get($this->ipUser.'Dosen/'),true);
        return $dosen['data'];
    }
    public function getRuangan()
    {
        $ruangan = json_decode($this->curl->simple_get($this->ipPenjadwalan.'Ruangan/', array(CURLOPT_BUFFERSIZE => 10)),true);
        if($ruangan){
            return $ruangan['data'];
        }else{
            return $ruangan;
        }
    }
    public function getPeriode()
    {
        $periode = json_decode($this->curl->simple_get($this->ipPenjadwalan.'periode/', array(CURLOPT_BUFFERSIZE => 10)),true);
        if($periode){
            return $periode['data'];
        }else{
            return $periode;
        }
    }
    public function getWaktu()
    {
        $waktu = json_decode($this->curl->simple_get($this->ipPenjadwalan.'waktu/', array(CURLOPT_BUFFERSIZE => 10)),true);
        if($waktu){
            return $waktu['data'];
        }else{
            return $waktu;
        }
    }
    

    public function getMahasiswa()
    {
        $mhs = json_decode($this->curl->simple_get($this->ipUser.'Mahasiswa/'),true);
        return $mhs['data'];
    }
    public function getAjuTopik()
    {
        $skripsi = json_decode($this->curl->simple_get($this->ipSkripsi.'Skripsi/',array('status'=>0)),true);
        if ($skripsi){
            return $skripsi['data'];
        }else{
            return NULL;
        }
    }
    public function getTopik(){
        $data = json_decode($this->curl->simple_get($this->ipSkripsi.'topik/', array(CURLOPT_BUFFERSIZE => 10)),true);
        return $data['data'];
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
        json_decode($this->curl->simple_put($this->ipSkripsi.'Skripsi/',$data,array(CURLOPT_BUFFERSIZE => 10),),true);
    }
    public function valTopik($id){
        $skripsi = json_decode($this->curl->simple_get($this->ipSkripsi.'Skripsi/',array("id" => $id),array(CURLOPT_BUFFERSIZE => 10)),true)['data'][0];
        $skripsi['status']="1";
        json_decode($this->curl->simple_put($this->ipSkripsi.'Skripsi/',$skripsi,array(CURLOPT_BUFFERSIZE => 10)),true);

        $dp1=json_decode($this->curl->simple_get($this->ipUser.'Dosen/',array('nip'=> $skripsi['pembimbing_1']),array(CURLOPT_BUFFERSIZE => 10)),true)['data'];
        $dp1['nipbaru']=$dp1['nip'];$dp1['beban']+=1;
        json_decode($this->curl->simple_put($this->ipUser.'Dosen/',$dp1,array(CURLOPT_BUFFERSIZE => 10)),true);

        $dp2=json_decode($this->curl->simple_get($this->ipUser.'Dosen/',array("nip" => $skripsi['pembimbing_2']),array(CURLOPT_BUFFERSIZE => 10)),true)['data'];
        $dp2['nipbaru']=$dp2['nip'];$dp2['beban']+=1;
        json_decode($this->curl->simple_put($this->ipUser.'Dosen/',$dp2,array(CURLOPT_BUFFERSIZE => 10)),true);

        $data=[
            'id_skripsi' => $skripsi['id'],
            'tipe' => 1,
            'file' => "",
            'tanggal_dibuat' => time()
        ];
        json_decode($this->curl->simple_post($this->ipDiskusi.'posting/',$data,array(CURLOPT_BUFFERSIZE => 10)),true);
    }
    public function deleteTopik($id){
        json_decode($this->curl->simple_delete($this->ipSkripsi.'Skripsi/',array("id" => $id),array(CURLOPT_BUFFERSIZE => 10)),true);
    }

    public function getPendaftar(){
        $validasi = json_decode($this->curl->simple_get($this->ipSkripsi.'Kelola_Pendaftar/', array(CURLOPT_BUFFERSIZE => 10)),true);
        if($validasi){
            return $validasi['data'];
        }else{
            return $validasi;
        }
    }
    public function Splitter($pendaftar,$tipe){
        $data=[];
        if($pendaftar){
            foreach($pendaftar as $p){
                if($p['tipe']==$tipe){
                    array_push($data,$p);
                }
            }
        }
        return $data;
    }

    public function TambahJadwal($id,$tipe){
        $data=[
            'id_skripsi'=>$id,
            'tipe'=>$tipe-1
        ];
        json_decode($this->curl->simple_post($this->ipPenjadwalan.'Kelola_Jadwal/',$data,array(CURLOPT_BUFFERSIZE => 10)),true);
    }
    public function getJSempro(){
        $sempro = json_decode($this->curl->simple_get($this->ipPenjadwalan.'Kelola_Jadwal/',array('tipe'=>"1"), array(CURLOPT_BUFFERSIZE => 10)),true);
        if($sempro){return $sempro['data'];}
        else{return $sempro;}
    }
    public function getJSidang(){
        $sidang = json_decode($this->curl->simple_get($this->ipPenjadwalan.'Kelola_Jadwal/',array('tipe'=>"2"), array(CURLOPT_BUFFERSIZE => 10)),true);
        if($sidang){return $sidang['data'];}
        else{return $sidang;}
    }
    public function getJadwal(){
        $jadwal = json_decode($this->curl->simple_get($this->ipPenjadwalan.'Jadwal/', array(CURLOPT_BUFFERSIZE => 10)),true);
        if($jadwal){return $jadwal['data'];}
        else{return $jadwal;}
    }
    public function updateJadwal($data){
        json_decode($this->curl->simple_put($this->ipPenjadwalan.'Kelola_Jadwal/',$data,array(CURLOPT_BUFFERSIZE => 10)),true);
    }
    public function startAcara($data){
        json_decode($this->curl->simple_post($this->ipPenjadwalan.'Acara/',$data,array(CURLOPT_BUFFERSIZE => 10)),true);
    }
}