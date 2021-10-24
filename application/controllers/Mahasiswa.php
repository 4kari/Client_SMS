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
		$this->load->view('mahasiswa/index2');
		$this->load->view('template/footer');
	}

	public function topik(){
		$data['judul'] = 'Ajukan Topik';
		$data['aktor']="Mahasiswa";
		// $data['user'] = "mhs";
		$data['dosen'] = $this->mhsM->getDosen(); // belum dibuat
		$data['topik'] = $this->mhsM->getTopik(); // belum dibuat
		$data['user'] = $this->session->userdata('nama');

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

	public function bimbingan(){
		$data['judul'] = 'Bimbingan Dosen';
		$data['aktor']="Mahasiswa";
		$data['user'] = $this->session->userdata['nama'];
		$data['skripsi'] = $this->mhsM->getSkripsi($this->session->userdata['username']);
		$data['skripsi']=$data['skripsi'][count($data['skripsi'])-1];
		if ($data['skripsi']['status']>=1){
			if($data['skripsi']){$data['posting'] = $this->mhsM->getBimbingan($data['skripsi']['id']);}
			if($data['posting']){$data['komentar'] = $this->mhsM->getkomentar($data['posting']['id']);}
		}
		
		$this->load->view('template/header',$data);
		$this->load->view('mahasiswa/template/gila');
		$this->load->view('mahasiswa/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('mahasiswa/bimbingan');
		$this->load->view('template/footer');
	}
}
