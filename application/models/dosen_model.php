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
    public function getPosting($nip,$tipe=NULL){
        $posting = json_decode($this->curl->simple_get('http://localhost/microservice/diskusi/api/Posting/',array('nip'=>$nip), array(CURLOPT_BUFFERSIZE => 10)),true);
        // $posting[$i] = json_decode($this->curl->simple_get('http://10.5.12.56/diskusi/api/Posting/',array('nip'=>$nip), array(CURLOPT_BUFFERSIZE => 10)),true);
        if ($posting){
            if($tipe){
                $hasil=[];
                foreach($posting['data'] as $p){
                    if($p['tipe']==$tipe){
                        array_push($hasil,$p);
                    }
                }
            }else{
                $hasil=[[],[],[]];
                foreach($posting['data'] as $p){
                    if($p['tipe']==1){
                        array_push($hasil[0],$p);
                    }
                    if($p['tipe']==2){
                        array_push($hasil[1],$p);
                    }
                    if($p['tipe']==3){
                        array_push($hasil[2],$p);
                    }
                }
            }
            return $hasil;
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
    public function getPosisi($nip,$id){
        $skripsi = json_decode($this->curl->simple_get('http://localhost/microservice/skripsi/api/skripsi/', array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10)),true);
        // $validasi = json_decode($this->curl->simple_get('http://10.5.12.21/skripsi/api/skripsi/', array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10)),true);

        if($skripsi){
            $skripsi=$skripsi['data'][0];
            $validasi=null;
            if($nip==$skripsi['pembimbing_1']){$validasi="pembimbing_1";}
            if($nip==$skripsi['pembimbing_2']){$validasi="pembimbing_2";}
            if($nip==$skripsi['penguji_1']){$validasi="penguji_1";}
            if($nip==$skripsi['penguji_2']){$validasi="penguji_2";}
            if($nip==$skripsi['penguji_3']){$validasi="penguji_3";}
        }
        return $validasi;
    }
    public function getDiskusi($id){
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
        // json_decode($this->curl->simple_put('http://10.5.12.21/skripsi/api/Validasi/',$validasi[0], array(CURLOPT_BUFFERSIZE => 10)),true);
    }
    public function validasi_Acara($data){
        
        // get validasi
        $validasi = $this->getValAcara($data['id'],$data['tipe']);
        // isikan nip dosen ke kolom $sebagai pada tabel validasi
        
        $validasi[$data['posisi']]=$data['nip'];
        
        // update data
        json_decode($this->curl->simple_put('http://localhost/microservice/penjadwalan/api/Validasi/',$validasi, array(CURLOPT_BUFFERSIZE => 10)),true);
        // json_decode($this->curl->simple_put('http://10.5.12.21/penjadwalan/api/Validasi/',$validasi[0], array(CURLOPT_BUFFERSIZE => 10)),true);
    }
    public function getValAcara($id_skripsi,$tipe){
        // cari jadwal pakai id skripsi dulu
        $jadwal = json_decode($this->curl->simple_get('http://localhost/microservice/penjadwalan/api/Jadwal/',array('id_skripsi'=>$id_skripsi), array(CURLOPT_BUFFERSIZE => 10)),true);
        // $jadwal = json_decode($this->curl->simple_get('http://10.5.12.47/penjadwalan/api/Jadwal/',array('id_skripsi'=>$id_skripsi), array(CURLOPT_BUFFERSIZE => 10)),true);
        if($jadwal){
            foreach($jadwal['data'] as $j){
                if($j['tipe']==$tipe){
                    $jadwal=$j;
                    break;
                }
            }
            // cari validasi pakai id jadwal
            $validasi = json_decode($this->curl->simple_get('http://localhost/microservice/penjadwalan/api/Validasi/',array('id_jadwal'=>$jadwal['id']), array(CURLOPT_BUFFERSIZE => 10)),true);
            // $validasi = json_decode($this->curl->simple_get('http://10.5.12.47/penjadwalan/api/Validasi/',array('id_jadwal'=>$jadwal['data']['id']), array(CURLOPT_BUFFERSIZE => 10)),true);
        }else{
            $validasi=null;
        }
        if($validasi){
            return $validasi['data'][0];
        }else{
            return $validasi;
        }
    }
    public function getPenilaian($nip,$id){
        $data=[
            'penilai' => $nip,
            'id' => $id
        ];
        $penilaian = json_decode($this->curl->simple_get('http://localhost/microservice/skripsi/api/Penilaian/', $data , array(CURLOPT_BUFFERSIZE => 10)),true);
        // $penilaian = json_decode($this->curl->simple_get('http://10.5.12.21/skripsi/api/Penilaian/', $data , array(CURLOPT_BUFFERSIZE => 10)),true);
        if($penilaian){
            return $penilaian['data'];
        }else{
            return $penilaian;
        }
    }
    public function getSasaran($tipe){
        $sasaran = json_decode($this->curl->simple_get('http://localhost/microservice/skripsi/api/sasaran/', array('tipe'=>$tipe) , array(CURLOPT_BUFFERSIZE => 10)),true);
        // $sasaran = json_decode($this->curl->simple_get('http://10.5.12.21/skripsi/api/sasaran/', array('tipe'=>$tipe) , array(CURLOPT_BUFFERSIZE => 10)),true);
        return $sasaran['data'];
    }
}