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
		$data['judul'] = 'Data pengajuan topik';
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
	public function jadwal_skripsi(){
		$data['judul'] = 'Data Pendaftar Skripsi';
		$data['user'] = $this->session->userdata('username');
		$data['aktor']="Koordinator";
		$data['sempro']= $this->koorM->getJSempro();
		$data['sidang'] = $this->koorM->getJSidang();

		$this->load->view('template/header',$data);
		$this->load->view('koordinator/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('koordinator/index');
		$this->load->view('template/footer');
	}
	public function dosen(){
		$data['judul'] = 'Data Dosen';
		$data['user'] = $this->session->userdata('username');
		$data['data'] = $this->koorM->getDosen();
		$data['aktor']="Koordinator";
		//mendapatkan data users
		// get semua user

		$this->load->view('template/header',$data);
		$this->load->view('Koordinator/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('Koordinator/dosen');
		$this->load->view('template/footer');
	}
	public function mahasiswa(){
		$data['judul'] = 'Data Mahasiswa';
		$data['user'] = $this->session->userdata('username');
		$data['data'] = $this->koorM->getMahasiswa();
		$data['aktor']="Koordinator";

		//mendapatkan data users
		// get semua user

		$this->load->view('template/header',$data);
		$this->load->view('Koordinator/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('Koordinator/mahasiswa');
		$this->load->view('template/footer');
	}
}