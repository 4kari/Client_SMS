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
		$data['validasi'] = $this->dosenM->getValidasi();
		
		$this->load->view('template/header',$data);
		$this->load->view('dosen/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('dosen/data_skripsi');
		$this->load->view('template/footer');
	}
	
	public function data_bimbingan(){
		$data['judul'] = 'Bimbingan';
		$data['aktor']="Mahasiswa";
		$data['user'] = $this->session->userdata['nama'];
		$data['aktor']="Dosen";
		$data['posting'] = $this->dosenM->getPosting($this->session->userdata['username'],1);

		$this->load->view('template/header',$data);
		$this->load->view('dosen/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('dosen/data_bimbingan');
		$this->load->view('template/footer');
	}
	public function data_sempro(){
		$data['judul'] = 'Sempro';
		$data['aktor']="Mahasiswa";
		$data['user'] = $this->session->userdata['nama'];
		$data['aktor']="Dosen";
		$data['posting'] = $this->dosenM->getPosting($this->session->userdata['username'],2);

		$this->load->view('template/header',$data);
		$this->load->view('dosen/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('dosen/data_sempro');
		$this->load->view('template/footer');
	}
	public function data_sidang(){
		$data['judul'] = 'Sidang';
		$data['aktor']="Mahasiswa";
		$data['user'] = $this->session->userdata['nama'];
		$data['aktor']="Dosen";
		$data['posting'] = $this->dosenM->getPosting($this->session->userdata['username'],3);

		$this->load->view('template/header',$data);
		$this->load->view('dosen/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('dosen/data_sidang');
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
		
		$this->load->view('template/header',$data);
		$this->load->view('dosen/template/gila');
		$this->load->view('dosen/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('dosen/detail_bimbingan');
		$this->load->view('template/footer');
	}
	public function detail_sempro($id_post){
		$data['judul'] = 'Sempro';
		$data['aktor']="Dosen";
		$data['user'] = $this->session->userdata['nama'];
		$data['posting'] = $this->dosenM->getBimbingan($id_post);
		if($data['posting']){
			$data['komentar'] = $this->dosenM->getKomentar($data['posting']['id']);
		}

		$this->load->view('template/header',$data);
		$this->load->view('dosen/template/gila');
		$this->load->view('dosen/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('dosen/detail_sempro');
		$this->load->view('template/footer');
	}
	public function detail_sidang($id_post){
		$data['judul'] = 'Sidang';
		$data['aktor']="Dosen";
		$data['user'] = $this->session->userdata['nama'];
		$data['posting'] = $this->dosenM->getBimbingan($id_post);
		if($data['posting']){
			$data['komentar'] = $this->dosenM->getKomentar($data['posting']['id']);
		}
		
		$this->load->view('template/header',$data);
		$this->load->view('dosen/template/gila');
		$this->load->view('dosen/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('dosen/detail_sidang');
		$this->load->view('template/footer');
	}
	public function komentar(){
		$this->dosenM->addKomentar();
		$page = $this->input->post('page');
		redirect($page);
	}
	public function validasi(){
		$data=[
			'id'=>$this->input->get('id'),
			'sebagai'=>$this->input->get('sebagai'),
			'nip'=>$this->session->userdata['username']
		];
		$this->dosenM->validasi($data);
		redirect('dosen/data_skripsi');
	}

}
