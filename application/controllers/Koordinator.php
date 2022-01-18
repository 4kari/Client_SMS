<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Koordinator extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') != 2) {
            redirect('Auth');
		}
		$this->load->model('koordinator_model', 'koorM');
		// $this->load->model('dosen_model', 'dosenM');
	}

	public function index()
	{
		$data['judul'] = 'Kelola Topik';
		$data['user'] = $this->session->userdata('username');
		$data['aktor']="Koordinator";
		$data['dosen']= $this->koorM->getDosen();
		$data['topik'] = $this->koorM->getTopik();

		$this->load->view('template/header',$data);
		$this->load->view('koordinator/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('koordinator/index');
		$this->load->view('template/footer');
	}
	public function validasi_topik($id){
		$this->koorM->valTopik($id);
		redirect("Koordinator");
		//ubah status skripsi jadi 1
	}
	public function hapus_topik($id){
		$this->koorM->deleteTopik($id);
		redirect("Koordinator");
		//hapus data skripsi
	}
	public function ubah_topik(){
		$this->koorM->updateTopik();
		redirect("Koordinator");
	}
	public function kelola_pendaftar(){
		$data['judul'] = 'Kelola_Pendaftar';
		$data['user'] = $this->session->userdata('username');
		$data['aktor']="Koordinator";
		$pendaftar= $this->koorM->getPendaftar();
		$data['sempro']=$this->koorM->Splitter($pendaftar,2);
		$data['sidang']=$this->koorM->Splitter($pendaftar,3);


		$this->load->view('template/header',$data);
		$this->load->view('koordinator/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('koordinator/kelola_daftar');
		$this->load->view('template/footer');
	}
	public function jadwalkan(){
		$id_skripsi=$this->input->get('id');
		$tipe=$this->input->get('tipe');
		$this->koorM->TambahJadwal($id_skripsi,$tipe);
		redirect('Koordinator/kelola_pendaftar');
	}
 
	public function jadwal_sempro(){
		$data['judul'] = 'Data Pendaftar Skripsi';
		$data['user'] = $this->session->userdata('username');
		$data['aktor']="Koordinator";
		$data['sempro']= $this->koorM->getJSempro();
		$data['dosen']= $this->koorM->getDosen();
		$data['ruangan']= $this->koorM->getRuangan();
		$data['periode']= $this->koorM->getPeriode();
		$data['waktu']= $this->koorM->getWaktu();
		
		$this->load->view('template/header',$data);
		$this->load->view('koordinator/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('koordinator/jadwal_sempro');
		$this->load->view('template/footer');
	}
	public function jadwal_sidang(){
		$data['judul'] = 'Data Pendaftar Skripsi';
		$data['user'] = $this->session->userdata('username');
		$data['aktor']="Koordinator";
		$data['sidang'] = $this->koorM->getJSidang();
		$data['dosen']= $this->koorM->getDosen();
		$data['ruangan']= $this->koorM->getRuangan();
		$data['periode']= $this->koorM->getPeriode();
		$data['waktu']= $this->koorM->getWaktu();
		$this->load->view('template/header',$data);
		$this->load->view('koordinator/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('koordinator/jadwal_sidang');
		$this->load->view('template/footer');
	}
	
	public function editJadwal($id){
		$data=[
			'id' => $id,
			'penguji_1' => $this->input->post('penguji1'),
			'penguji_2' => $this->input->post('penguji2'),
			'penguji_3' => $this->input->post('penguji3'),
			'ruangan' => $this->input->post('ruangan'),
			'periode' => $this->input->post('periode'),
			'waktu' => $this->input->post('waktu')
		];
		$this->koorM->updateJadwal($data);
		redirect($this->input->post('page'));
	}
	public function mulai_acara(){
		$data=[
            'id'=>$this->input->get('id')
        ];
		$page=$this->input->get('page');
		$this->koorM->startAcara($data);
		redirect($page);
	}
	public function dosen(){
		$data['judul'] = 'Dosen';
		$data['user'] = $this->session->userdata('username');
		$data['aktor']="Koordinator";
		$data['dosen']= $this->koorM->getDosen();

		$this->load->view('template/header',$data);
		$this->load->view('koordinator/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('koordinator/dosen');
		$this->load->view('template/footer');
	}
	public function lihat_sempro(){
		$data['judul'] = 'Lihat Sempro';
		$data['user'] = $this->session->userdata('username');
		$data['aktor']="Koordinator";
		$data['Jsempro']= $this->koorM->getJadwal();

		$this->load->view('template/header',$data);
		$this->load->view('koordinator/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('koordinator/sempro');
		$this->load->view('template/footer');
	}
	
	public function lihat_sidang(){
		$data['judul'] = 'Lihat Sidang';
		$data['user'] = $this->session->userdata('username');
		$data['aktor']="Koordinator";
		$data['Jsidang']= $this->koorM->getJadwal();

		$this->load->view('template/header',$data);
		$this->load->view('koordinator/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('koordinator/sidang');
		$this->load->view('template/footer');
	}
}