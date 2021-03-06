<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') != 4) {
            redirect('Auth');
		}
		$this->load->model('mahasiswa_model', 'mhsM');
		
	}

	public function index()
	{
		$username = (int)$this->session->userdata('username');
		$data['judul'] = 'Beranda';
		$data['aktor']="Mahasiswa";
		//PC
		$data['data'] = $this->mhsM->data_diri($username);
		$data['skripsi'] = $this->mhsM->getSkripsi($username);
		if ($data['skripsi']){ $data['skripsi'] = $data['skripsi'][count($data['skripsi'])-1];}
		$data['status'] = $this->mhsM->getTimeline();
		$this->session->set_userdata(['nama' => $data['data']['nama']]);
		$data['user'] = $this->session->userdata['nama'];
		
		//laptop
		// $data['user'] = "mhs";

		$this->load->view('template/header',$data);
		$this->load->view('mahasiswa/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('mahasiswa/index');
		$this->load->view('template/footer');
	}

	public function topik(){
		$data['judul'] = 'Ajukan Topik';
		$data['aktor']="Mahasiswa";
		// $data['user'] = "mhs";
		$data['dosen'] = $this->mhsM->getDosen(); // belum dibuat
		$data['topik'] = $this->mhsM->getTopik(); // belum dibuat
		$data['user'] = $this->session->userdata('nama');
		$data['skripsi'] = $this->mhsM->getSkripsi($this->session->userdata['username']);

		$this->load->view('template/header',$data);
		$this->load->view('mahasiswa/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('mahasiswa/topik');
		$this->load->view('template/footer');
	}
	public function ajukan_topik(){
		$topik = $this->input->post('topik');
		$dosbing1 = $this->input->post('dosbing1');
		$dosbing2 = $this->input->post('dosbing2');
		$this->mhsM->addTopik($topik,$dosbing1,$dosbing2);
		redirect("Mahasiswa");
	}

	public function skripsi(){
		$data['judul'] = 'Data Skripsi';
		$data['aktor']="Mahasiswa";
		$data['user'] = $this->session->userdata['nama'];
		$data['skripsi'] = $this->mhsM->getSkripsi($this->session->userdata['username']);
		$this->load->view('template/header',$data);
		$this->load->view('mahasiswa/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('mahasiswa/skripsi');
		$this->load->view('template/footer');
	}

	public function perbaikiBerkas($id){
		$link = $this->input->post('berkas');
		$data = [
			'id'=>$id,
			'berkas'=>$link
		];
		$this->mhsM->updateBerkas($data);
		redirect("mahasiswa/skripsi/");
	}

	public function perbaikiJudul($id){
		$judul = $this->input->post('judul');
		$data = [
			'id'=>$id,
			'judul'=>$judul
		];
		$this->mhsM->updateJudul($data);
		redirect("mahasiswa/skripsi/");
	}

	public function bimbingan(){
		$data['judul'] = 'Bimbingan Dosen';
		$data['aktor']="Mahasiswa";
		$data['user'] = $this->session->userdata['nama'];
		$data['skripsi'] = $this->mhsM->getSkripsi($this->session->userdata['username']);
		if($data['skripsi']){$data['skripsi']=$data['skripsi'][count($data['skripsi'])-1];}
		if($data['skripsi']){
			if ($data['skripsi']['status']>=1){
				$data['posting'] = $this->mhsM->getDiskusi($data['skripsi']['id'],1);
				if($data['posting']){
					$data['komentar'] = $this->mhsM->getkomentar($data['posting']['id']);
				}
			}
		}
		
		$this->load->view('template/header',$data);
		$this->load->view('mahasiswa/template/gila');
		$this->load->view('mahasiswa/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('mahasiswa/bimbingan');
		$this->load->view('template/footer');
	}

	public function sempro(){
		$data['judul'] = 'Sempro';
		$data['aktor']="Mahasiswa";
		$data['user'] = $this->session->userdata['nama'];
		$data['skripsi'] = $this->mhsM->getSkripsi($this->session->userdata['username']);
		if($data['skripsi']){$data['skripsi']=$data['skripsi'][count($data['skripsi'])-1];}
		if($data['skripsi']){
			if ($data['skripsi']['status']>=1){
				$data['posting'] = $this->mhsM->getDiskusi($data['skripsi']['id'],2);
				if($data['posting']){
					$data['komentar'] = $this->mhsM->getkomentar($data['posting']['id']);
				}
			}
		}
		
		$this->load->view('template/header',$data);
		$this->load->view('mahasiswa/template/gila');
		$this->load->view('mahasiswa/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('mahasiswa/sempro');
		$this->load->view('template/footer');
	}

	public function sidang(){
		$data['judul'] = 'Sidang';
		$data['aktor']="Mahasiswa";
		$data['user'] = $this->session->userdata['nama'];
		$data['skripsi'] = $this->mhsM->getSkripsi($this->session->userdata['username']);
		if($data['skripsi']){$data['skripsi']=$data['skripsi'][count($data['skripsi'])-1];}
		if($data['skripsi']){
			if ($data['skripsi']['status']>=1){
				$data['posting'] = $this->mhsM->getDiskusi($data['skripsi']['id'],3);
				if($data['posting']){
					$data['komentar'] = $this->mhsM->getkomentar($data['posting']['id']);
				}
			}
		}
		
		$this->load->view('template/header',$data);
		$this->load->view('mahasiswa/template/gila');
		$this->load->view('mahasiswa/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('mahasiswa/sidang');
		$this->load->view('template/footer');
	}

	public function komentar(){
		$this->mhsM->addKomentar();
		$page = $this->input->post('page');
		redirect($page);
	}
	public function daftar_sempro(){
		$data['judul'] = 'Daftar Sempro';
		$data['aktor']="Mahasiswa";
		$data['user'] = $this->session->userdata('nama');
		$data['skripsi'] = $this->mhsM->getSkripsi($this->session->userdata['username']);
		if($data['skripsi']){
			$data['skripsi']=$data['skripsi'][count($data['skripsi'])-1];
			$data['validasi']=$this->mhsM->getValidasi($data['skripsi']['id'],2);
			$data['jadwal']=$this->mhsM->getJadwal($data['skripsi']['id'],1);
			$data['posting'] = $this->mhsM->getDiskusi($data['skripsi']['id'],2);
		}
		
		$this->load->view('template/header',$data);
		$this->load->view('mahasiswa/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('mahasiswa/daftar_sempro');
		$this->load->view('template/footer');
	}
	public function daftar_sidang(){
		$data['judul'] = 'Daftar Sidang';
		$data['aktor']="Mahasiswa";
		$data['user'] = $this->session->userdata('nama');
		$data['skripsi'] = $this->mhsM->getSkripsi($this->session->userdata['username']);
		if($data['skripsi']){
			$data['skripsi']=$data['skripsi'][count($data['skripsi'])-1];
			$data['validasi']=$this->mhsM->getValidasi($data['skripsi']['id'],3);
			$data['jadwal']=$this->mhsM->getJadwal($data['skripsi']['id'],2);
			$data['posting'] = $this->mhsM->getDiskusi($data['skripsi']['id'],3);
		}else{
			$data['posting']=null;
			$data['validasi']=null;
		}
		$this->load->view('template/header',$data);
		$this->load->view('mahasiswa/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('mahasiswa/daftar_sidang');
		$this->load->view('template/footer');
	}
	public function ajukanSidang(){
		$id = $this->input->post('id');
		$tipe=$this->input->post('tipe');
		$this->mhsM->ajukanSidang($id,$tipe);
		redirect("Mahasiswa");
	}

	//belum pasti sebaiknya harus simpan data dimana
	public function UbahFoto($nim){
		$this->mhsM->changeFoto($nim);
		redirect ('Mahasiswa');
	}
	public function ubah_password($username){
		$this->mhsM->changePass($username,$this->input->post());
		redirect ('Mahasiswa');
	}
}
