<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') != 3) {
            redirect('Auth');
		}
		$this->load->model('dosen_model', 'dosenM');
		
	}

	public function index()
	{
		$data['judul'] = 'Beranda';
		$data['data'] = $this->dosenM->data_diri($this->session->userdata('username'));
		$this->session->set_userdata(['nama' => $data['data']['nama']]);
		$data['user'] = $this->session->userdata['nama'];
		$data['aktor']="Dosen";

		$this->load->view('template/header',$data);
		$this->load->view('dosen/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('dosen/index');
		$this->load->view('template/footer');
	}
	public function data_skripsi(){
		$data['judul'] = 'Data Skripsi';
		$data['aktor']="Mahasiswa";
		$data['user'] = $this->session->userdata['nama'];
		$data['aktor']="Dosen";
		$data['posting'] = $this->dosenM->getPosting($this->session->userdata['username']);

		$this->load->view('template/header',$data);
		$this->load->view('dosen/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('dosen/data_skripsi');
		$this->load->view('template/footer');
	}
	public function detail_bimbingan($id_post){
		$data['judul'] = 'Bimbingan';
		$data['aktor']="Dosen";
		$data['user'] = $this->session->userdata['nama'];
		$data['posting'] = $this->dosenM->getBimbingan($id_post);
		if($data['posting']){
			$data['komentar'] = $this->dosenM->getKomentar($data['posting']['id']);
		}
		// $data['skripsi']=$data['skripsi'][count($data['skripsi'])-1];
		// if($data['skripsi']){
		// 	if ($data['skripsi']['status']>=1){
		// 		$data['posting'] = $this->mhsM->getBimbingan($data['skripsi']['id']);
		// 		if($data['posting']){
		// 			$data['komentar'] = $this->mhsM->getkomentar($data['posting']['id']);
		// 		}
		// 	}
		// }
		
		$this->load->view('template/header',$data);
		$this->load->view('dosen/template/gila');
		$this->load->view('dosen/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('dosen/bimbingan');
		$this->load->view('template/footer');
	}
}
