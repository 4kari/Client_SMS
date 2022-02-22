<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mahasiswa_model extends CI_Model
{
    // protected $ipSkripsi='http://10.5.12.24/skripsi/api/';
    // protected $ipPenjadwalan='http://10.5.12.82/penjadwalan/api/';
    // protected $ipDiskusi='http://10.5.12.56/diskusi/api/';
    // protected $ipUser='http://10.5.12.18/user/api/';

    protected $ipSkripsi='http://localhost:8080/microservice/skripsi/api/';
    protected $ipPenjadwalan='http://localhost:8080/microservice/penjadwalan/api/';
    protected $ipDiskusi='http://localhost:8080/microservice/diskusi/api/';
    protected $ipUser='http://localhost:8080/microservice/user/api/';
    
    public function data_diri($username){
        $data = json_decode($this->curl->simple_get($this->ipUser.'Mahasiswa/',array('nim'=>$username), array(CURLOPT_BUFFERSIZE => 10)),true);
        return $data['data'];
    }
    public function getTimeline(){
        $status = $this->getStatus();
        $data=[];
        $index=[0,1,2,5];
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
        $data = json_decode($this->curl->simple_get($this->ipSkripsi.'status/', array(CURLOPT_BUFFERSIZE => 10)),true);
        return $data['data'];
    }
    public function getTopik(){
        $data = json_decode($this->curl->simple_get($this->ipSkripsi.'topik/', array(CURLOPT_BUFFERSIZE => 10)),true);
        return $data['data'];
    }
    public function getDosen(){
        $data = json_decode($this->curl->simple_get($this->ipUser.'dosen/', array(CURLOPT_BUFFERSIZE => 10)),true);
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
            $post = json_decode($this->curl->simple_post($this->ipSkripsi.'skripsi/',$data, array(CURLOPT_BUFFERSIZE => 10)),true);
        }else{
            //gagal
        }
    }
    public function getSkripsi($nim){
        $skripsi = json_decode($this->curl->simple_get($this->ipSkripsi.'Skripsi/',array('nim'=>$nim), array(CURLOPT_BUFFERSIZE => 10)),true);
        if ($skripsi){
            return($skripsi['data']);
        }else{
            return NULL;
        }
    }
    public function updateBerkas($data){
        $skripsi = json_decode($this->curl->simple_get($this->ipSkripsi.'Skripsi/',array('id'=>$data['id']), array(CURLOPT_BUFFERSIZE => 10)),true)['data'][0];
        $skripsi['berkas']=$data['berkas'];
        $skripsi = json_decode($this->curl->simple_put($this->ipSkripsi.'Skripsi/',$skripsi, array(CURLOPT_BUFFERSIZE => 10)),true);
    }
    public function updateJudul($data){
        $skripsi = json_decode($this->curl->simple_get($this->ipSkripsi.'Skripsi/',array('id'=>$data['id']), array(CURLOPT_BUFFERSIZE => 10)),true)['data'][0];
        $skripsi['judul']=$data['judul'];
        $skripsi = json_decode($this->curl->simple_put($this->ipSkripsi.'Skripsi/',$skripsi, array(CURLOPT_BUFFERSIZE => 10)),true);
    }
    public function getDiskusi($id,$tipe){
        $diskusi = json_decode($this->curl->simple_get($this->ipDiskusi.'Posting/',array('id_skripsi'=>$id), array(CURLOPT_BUFFERSIZE => 10)),true);
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
        $komentar = json_decode($this->curl->simple_get($this->ipDiskusi.'Komentar/',array('id_post'=>$id), array(CURLOPT_BUFFERSIZE => 10)),true);
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
        json_decode($this->curl->simple_post($this->ipDiskusi.'komentar/',$data, array(CURLOPT_BUFFERSIZE => 10)),true);
    }
    public function getValidasi($id,$tipe){
        $validasi = json_decode($this->curl->simple_get($this->ipSkripsi.'Validasi/',array('id_skripsi'=>$id), array(CURLOPT_BUFFERSIZE => 10)),true);
        if ($validasi){
            foreach($validasi['data'] as $v){
                if($v['tipe']==$tipe){return $v;}
            }
        }else{
            return NULL;
        }
    }
    public function ajukanSidang($id,$tipe){
        $validasi = json_decode($this->curl->simple_post($this->ipSkripsi.'Validasi/',array('id_skripsi'=>$id, 'tipe'=>$tipe), array(CURLOPT_BUFFERSIZE => 10)),true);
    }
    public function getJadwal($id,$tipe){
        // sementara
        $jadwal = json_decode($this->curl->simple_get($this->ipPenjadwalan.'jadwal/',array('id_skripsi'=>$id), array(CURLOPT_BUFFERSIZE => 10)),true);
        if($jadwal){
            foreach($jadwal['data'] as $j){
                if($j['tipe']==$tipe){
                    return $j;
                }
            }
        }else{
            return NULL;
        }

        // $jadwal = json_decode($this->curl->simple_get($this->ipSkripsi.'jadwal/',array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10)),true);
        // if($jadwal){
        //     return $jadwal['data'];
        // }else{
        //     return NULL;
        // }
    }
    public function changeFoto($nim){
        $ekstensi_diperbolehkan	= array('png','jpg');
		$nama = $_FILES['gambar']['name'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['gambar']['size'];
		$file_tmp = $_FILES['gambar']['tmp_name'];	

		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			if($ukuran < 1044070){			
				move_uploaded_file($file_tmp, 'assets/img/profile/'.$nama);
				// $query = mysql_query("INSERT INTO upload VALUES(NULL, '$nama')");
				if($query){
					// echo 'FILE BERHASIL DI UPLOAD';
				}else{
					// echo 'GAGAL MENGUPLOAD GAMBAR';
				}
			}else{
				// echo 'UKURAN FILE TERLALU BESAR';
			}
		}else{
			// echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
		}
    }
    public function changePass($username,$data){
        $data['username']=$username;
        $user = json_decode($this->curl->simple_put($this->ipUser.'password/',$data, array(CURLOPT_BUFFERSIZE => 10)),true);
    }
}