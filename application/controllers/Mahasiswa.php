<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') != 4) {
            // redirect('Auth');
		}
		$this->load->model('mahasiswa_model', 'userM');
		
	}

	public function index()
	{
		$data['judul'] = 'Beranda';
		$data['aktor']="Mahasiswa";
		//PC
		// $data['data'] = $this->userM->data_diri($this->session->userdata('username'));
		// $this->session->set_userdata(['nama' => $data['data']['nama']]);
		// $data['user'] = $this->session->userdata['nama'];
		
		//laptop
		$data['user'] = "mhs";

		$this->load->view('template/header',$data);
		$this->load->view('mahasiswa/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('mahasiswa/index');
		$this->load->view('template/footer');
	}

	public function topik(){
		$data['judul'] = 'Ajukan Topik';
		$data['aktor']="Mahasiswa";
		$data['user'] = "mhs";
		// $data['user'] = $this->session->userdata('nama');

		$this->load->view('template/header',$data);
		$this->load->view('mahasiswa/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('mahasiswa/topik');
		$this->load->view('template/footer');
	}

	public function skripsi(){
		$data['judul'] = 'Data Skripsi';
		$data['aktor']="Mahasiswa";
		$data['user'] = "mhs";
		// $data['user'] = $this->session->userdata('username');

		$this->load->view('template/header',$data);
		$this->load->view('mahasiswa/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('mahasiswa/skripsi');
		$this->load->view('template/footer');
	}

	public function bimbingan(){
		$data['judul'] = 'Bimbingan Dosen';
		$data['aktor']="Mahasiswa";
		$data['user'] = "mhs";
		// $data['user'] = $this->session->userdata('username');

		$this->load->view('template/header',$data);
		$this->load->view('mahasiswa/template/gila');
		$this->load->view('mahasiswa/template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('mahasiswa/bimbingan');
		$this->load->view('template/footer');
	}

	public function updateU($id)
	{
		var_dump($this->input->post('level'));
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		);

		$this->db->where('id', $id);
		$this->db->update('user', $data);
		$this->session->set_flashdata('pesan', 'Edit Data User berhasil');
		redirect('admin/index');
	}
	function daftarDosen()
	{
		// $this->session->unset_userdata('keyword');
		// $data['judul'] = 'Daftar Dosen';
		// $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		// $userid = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		// $data['profil'] = $this->db->get_where('admin', ['username' => $userid['id']])->row_array();
		// $data['prodi'] = $this->db->get('prodi')->result_array();
		// $data['username'] = $this->db->get_where('user', ['level_id' => '3'])->result_array();
		

		// $data['dosen'] = $this->dosenM->DosenProdi($data['profil']['prodi']);

		// $this->form_validation->set_rules('nip', 'nipdosen', 'required');
		// $this->form_validation->set_rules('nama', 'namadosen', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('admin/daftarDosen', $data);
			$this->load->view('template/footer');
		} else {
			if ($this->db->get_where('user', ['username' => $this->input->post('nip')])->row_array() == null) {
				$usr = [
					'username' => $this->input->post('nip'),
					'password' => password_hash($this->input->post('nip'), PASSWORD_DEFAULT),
					'level_id' => 3
				];
				$this->db->insert('user', $usr);
			}
			if ($this->db->get_where('dosen', ['nip' => $this->input->post('nip')])->row_array() == null) {
				$data = [
					'nip' => $this->input->post('nip'),
					'nama' => $this->input->post('nama'),
					'gambar' => "default.jpg",
					'username' => $this->db->get_where('user', ['username' => $this->input->post('nip')])->row_array()['id'],
					'prodi' =>  $this->db->get_where('admin', ['username' => $userid['id']])->row_array()['prodi'],
					'email' => $this->input->post('email'),
					'tgl_buat' => time()
				];
				$this->db->insert('dosen', $data);
				$this->session->set_flashdata('pesan', '1 User Dosen berhasil ditambahkan');
			} else {
				// gagal karena nip sudah digunakan
				$this->session->set_flashdata('pesan', 'Menambahkan Dosen gagal');
			}
			redirect('admin/daftarDosen');
		}
	}

	public function updateDosen($id)
	{
		$this->form_validation->set_rules('nip', 'nip', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');

		$data = array(
			'nip' => $this->input->post('nip'),
			'nama' => $this->input->post('nama')
		);

		$this->db->where('nip', $id);
		$this->db->update('dosen', $data);
		$this->session->set_flashdata('pesan', 'Edit data user Dosen berhasil');
		redirect('admin/daftarDosen');
	}

	public function deleteDosen($id)
	{
		$this->db->delete('dosen', array('nip' => $id));
		$this->session->set_flashdata('pesan', '1 User Dosen berhasil dihapus');
		redirect('admin/daftarDosen');
	}

	function daftarMahasiswa()
	{
		$this->session->unset_userdata('keyword');
		$data['judul'] = 'Daftar Mahasiswa';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$userid = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['profil'] = $this->db->get_where('admin', ['username' => $userid['id']])->row_array();

		$this->load->model('mahasiswa_model', 'mahasiswaM');
		$data['prodi'] = $this->db->get('prodi')->result_array();
		$data['username'] = $this->db->get_where('user', ['level_id' => '4'])->result_array();
		$data['mahasiswa'] = $this->mahasiswaM->MahasiswaProdi($data['profil']['prodi']); //dapatkan data berdasarkan id prodi

		$this->form_validation->set_rules('nim', 'nimmahasiswa', 'required');
		$this->form_validation->set_rules('nama', 'namamahasiswa', 'required');

		// nanti di cek
		if ($this->input->post('username') == NULL) {
			$username = 'NULL';
		} else {
			$username = $this->input->post('username');
		}
		// 
		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('admin/daftarMahasiswa', $data);
			$this->load->view('template/footer');
		} else {
			if (substr($this->input->post('nim'), 3, 4) == $this->db->get_where('admin', ['username' => $userid['id']])->row_array()['prodi']) {
				if ($this->db->get_where('user', ['username' => $this->input->post('nim')])->row_array() == null) {
					$data = [
						'username' => $this->input->post('nim'),
						'password' => password_hash($this->input->post('nim'), PASSWORD_DEFAULT),
						'level_id' => 4
					];
					$this->db->insert('user', $data);
				}
				if ($this->db->get_where('mahasiswa', ['nim' => $this->input->post('nim')])->row_array() == null) {
					$data2 = [
						'nim' => $this->input->post('nim'),
						'nama' => $this->input->post('nama'),
						'gambar' => 'default.jpg',
						'prodi' => substr($this->input->post('nim'), 3, 4),
						'email' => $this->input->post('email'),
						'username' => $this->db->get_where('user', ['username' => $this->input->post('nim')])->row_array()['id'],
						'tgl_buat' => time()
					];
					$this->db->insert('mahasiswa', $data2);
					$this->session->set_flashdata('pesan', '1 User Mahasiswa berhasil ditambahkan');
				} else {
					// gagal karena nim digunakan
					$this->session->set_flashdata('pesan', 'Menambahkan Mahasiswa gagal');
				}
			} else {
				// ditambahkan flashdata untuk data gagal diinputkan karena prodi tidak sesuai
				$this->session->set_flashdata('pesan', 'Menambahkan Mahasiswa gagal prodi');
			}
			redirect('admin/daftarMahasiswa');
		}
	}

	public function updateMahasiswa($id)
	{
		if (substr($this->input->post('nim'), 3, 4) == $this->db->get_where('admin', ['username' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()['id']])->row_array()['prodi']) {
			$this->form_validation->set_rules('nim', 'nim', 'required');
			$this->form_validation->set_rules('nama', 'nama', 'required');
			if ($this->db->get_where('user', ['username' => $this->input->post('nim')])->row_array() == null) {
				$data = array(
					'username' => $this->input->post('nim'),
					'password' => password_hash($this->input->post('nim'), PASSWORD_DEFAULT),
					'level_id' => 4
				);
				$this->db->insert('user', $data);
			}
			if ($this->db->get_where('mahasiswa', ['nim' => $this->input->post('nim')])->row_array() == null || $this->input->post('nim') == $id) {
				$data = array(
					'nim' => $this->input->post('nim'),
					'nama' => $this->input->post('nama'),
					'username' => $this->db->get_where('user', ['username' => $this->input->post('nim')])->row_array()['id']
				);
				$this->db->where('nim', $id);
				$this->db->update('mahasiswa', $data);
				$this->session->set_flashdata('pesan', 'Edit data Mahasiswa berhasil');
				if ($this->input->post('nim') != $id) {
					$this->db->delete('user', array('username' => $id));
				}
			} else {
				// gagal nim telah digunakan
				$this->session->set_flashdata('pesan', 'Menambahkan Mahasiswa gagal');
			}
		} else {
			// gagal prodi tidak sesuai
			$this->session->set_flashdata('pesan', 'Menambahkan Mahasiswa gagal prodi');
		}
		redirect('admin/daftarMahasiswa');
	}

	public function deleteMahasiswa($id)
	{
		$this->db->delete('mahasiswa', array('nim' => $id));
		$this->session->set_flashdata('pesan', '1 user Mahasiswa berhasil dihapus');
		redirect('admin/daftarMahasiswa');
	}

	public function daftarSkripsi()
	{
		$this->session->unset_userdata('keyword');
		$data['judul'] = 'Daftar Skripsi';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$userid = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['profil'] = $this->db->get_where('admin', ['username' => $userid['id']])->row_array();
		$this->load->model('skripsi_model', 'skripsiM');
		$data['level'] = $this->db->get('user_level')->result_array();
		//$data['user'] = $this->db->from('user');

		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		$this->db->like('nim', $data['keyword']);
		$this->db->from('skripsi');
		// $this->db->where('level_id != 1 AND level_id != 2');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['base_url'] = 'http://localhost/sms-utm/admin/daftarSkripsi';

		$config['per_page'] = 5;

		$this->pagination->initialize($config);

		if ($this->uri->segment(3) !== null) {
			$data['start'] = $this->uri->segment(3);
		} else {
			$data['start'] = 0;
		}

		$data['skripsi'] = $this->skripsiM->getSkripsi($config['per_page'], $data['start'], $data['keyword'], $data['user']['level_id']);
		$data['penguji'] = $this->skripsiM->getPenguji();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/daftarSkripsi', $data);
		$this->load->view('template/footer');
	}

	public function updateSkripsi($id)
	{
		$this->form_validation->set_rules('judul', 'judul', 'required');

		$data = array(
			'judul' => $this->input->post('judul'),
		);

		$this->db->where('nim', $id);
		$this->db->update('skripsi', $data);
		$this->session->set_flashdata('pesan', 'Edit data Skripsi berhasil');
		redirect('admin/daftarSkripsi');
	}

	public function deleteSkripsi($id)
	{
		$this->db->delete('skripsi', array('id' => $id));
		$this->session->set_flashdata('pesan', 'Skripsi berhasil dihapus');
		redirect('admin/daftarSkripsi');
	}

	public function updatePenguji($id)
	{
		if ($this->input->post('penguji3') != "") {
			$data = array(
				'dosen_uji3' => $this->input->post('penguji3')
			);
			$this->db->where('id', $id);
			$this->db->update('skripsi', $data);
			$this->session->set_flashdata('pesan', 'Dosen penguji berhasil ditambahkan');
		}
		if ($this->input->post('penguji2') != "") {
			$data = array(
				'dosen_uji2' => $this->input->post('penguji2')
			);
			$this->db->where('id', $id);
			$this->db->update('skripsi', $data);
			$this->session->set_flashdata('pesan', 'Dosen penguji berhasil ditambahkan');
		}
		if ($this->input->post('penguji1') != "") {
			$data = array(
				'dosen_uji1' => $this->input->post('penguji1')
			);
			$this->db->where('id', $id);
			$this->db->update('skripsi', $data);
			$this->session->set_flashdata('pesan', 'Dosen penguji berhasil ditambahkan');
		}
		redirect('admin/daftarSkripsi');
	}

	public function level()
	{
		$data['judul'] = 'Level';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['level'] = $this->db->get('user_level')->result_array();

		$this->form_validation->set_rules('level', 'Level', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('admin/level', $data);
			$this->load->view('template/footer');
		} else {
			$this->db->insert('user_level', ['level' => $this->input->post('level')]);
			$this->session->set_flashdata('pesan', 'Level baru berhasil ditambahkan');
			redirect('admin/level');
		}
	}

	public function update($id)
	{
		$data = array(
			'level' => $this->input->post('levelU')
		);

		$this->db->where('id', $id);
		$this->db->update('user_level', $data);
		$this->session->set_flashdata('pesan', 'Edit data Level');
		redirect('admin/level');
	}

	public function delete($id)
	{
		$this->db->delete('user_level', array('id' => $id));
		$this->session->set_flashdata('pesan', 'Level berhasil dihapus');
		redirect('admin/level');
	}

	function get_file()
	{
		$id = $this->uri->segment(3);
		$get_db = $this->m_files->get_file_byid($id);
		$q = $get_db->row_array();
		$file = $q['file_data'];
		var_dump($file);
		$path = './asset/files/ktp/' . $file;
		$data = file_get_contents($path);
		$name = $file;
		force_download($name, $data);
	}

	function getUserlist()
	{
		$data['judul'] = 'User Lists';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['profil'] = $this->db->get_where('admin', ['username' => $data['user']['id']])->row_array();

		$this->load->model('user_model', 'userM');
		$data['level'] = $this->db->get('user_level')->result_array();
		//$data['user'] = $this->db->from('user');

		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		$this->db->like('username', $data['keyword']);
		$this->db->from('user');
		$this->db->where('level_id != 1 AND level_id != 2');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['base_url'] = 'http://localhost/sms-utm/admin/getUserlist';

		$config['per_page'] = 5;

		$this->pagination->initialize($config);

		if ($this->uri->segment(3) !== null) {
			$data['start'] = $this->uri->segment(3);
		} else {
			$data['start'] = 0;
		}

		$data['users'] = $this->userM->getUsers($config['per_page'], $data['start'], $data['keyword'], $data['user']['level_id']);

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('template/footer');
	}

	public function deleteU($id)
	{
		try{
			$this->db->delete('user', array('id' => $id));
			$this->session->set_flashdata('pesan', '1 User berhasil dihapus');
			redirect('admin/index');
		} catch(Exception $e){
		//$this->session->set_flashdata('pesan', 'Hapus User gagal');
		}
	}

	public function JadwalSempro()
	{
		$this->session->unset_userdata('keyword');
		$data['judul'] = 'Jadwal Sempro';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$userid = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['profil'] = $this->db->get_where('admin', ['username' => $userid['id']])->row_array();
		$this->load->model('jadwal_model', 'jadwalM');
		$this->load->model('skripsi_model', 'skripsiM');
		$data['level'] = $this->db->get('user_level')->result_array();
		//$data['user'] = $this->db->from('user');

		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		$this->db->like('s.judul', $data['keyword']);
		$this->db->from('jadwal_sempro js, skripsi s');
		$this->db->where('s.id = js.id_skripsi');
		// $this->db->where('level_id != 1 AND level_id != 2');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['base_url'] = 'http://localhost/sms-utm/admin/JadwalSempro';

		$config['per_page'] = 5;

		$this->pagination->initialize($config);

		if ($this->uri->segment(3) !== null) {
			$data['start'] = $this->uri->segment(3);
		} else {
			$data['start'] = 0;
		}

		$data['JSemp'] = $this->jadwalM->getJadwalSempro($config['per_page'], $data['start'], $data['keyword'], $data['user']['level_id'], null, null);
		$data['penguji'] = $this->skripsiM->getPenguji();
		$data['dosen'] = $this->db->get('dosen')->result_array();
		$data['skripsi'] = $this->db->get('skripsi')->result_array();

		$this->form_validation->set_rules('judul', 'judul', 'required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('waktu', 'waktu', 'required');
		$this->form_validation->set_rules('periode', 'periode', 'required');
		$this->form_validation->set_rules('penguji1', 'penguji1', 'required');
		$this->form_validation->set_rules('penguji2', 'penguji2', 'required');
		$this->form_validation->set_rules('penguji3', 'penguji3', 'required');
		$this->form_validation->set_rules('ruangan', 'ruangan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/topbar');
			$this->load->view('admin/JadwalSempro');
			$this->load->view('template/footer');
		} else {
			// if ($this->db->get_where('jadwal_sempro', ['id_skripsi' => $this->input->post('judul')])->row_array() == null) {
			$data = [
				'id_skripsi' => $this->input->post('judul'),
				'tanggal' => $this->input->post('tanggal'),
				'waktu' => $this->input->post('waktu'),
				'periode' => $this->input->post('periode'),
				'penguji_1' => $this->input->post('penguji1'),
				'penguji_2' => $this->input->post('penguji2'),
				'penguji_3' => $this->input->post('penguji3'),
				'ruangan' => $this->input->post('ruangan'),
			];
			$id_skripsi = $this->db->get_where('skripsi', ['id' => $this->input->post('judul')])->row_array()['id'];
			$this->db->insert('jadwal_sempro', $data);
			echo $id_skripsi;
			$data = [
				'status' => '2'
			];
			$this->db->where('id', $id_skripsi);
			$this->db->update('skripsi', $data);
			$this->session->set_flashdata('pesan', 'Jadwal Sempro baru berhasil ditambahkan');
			// } else {
			// 	// gagal
			// 	$this->session->set_flashdata('pesan', 'Gagal menambahkah Jadwal Sempro');
			// }
			redirect('admin/JadwalSempro');
		}
	}

	public function EditJadwalSempro($id)
	{
		$post = $this->input->post();
		if ($post['penguji1'] == '') {
			$post['penguji1'] = NULL;
		}
		if ($post['penguji2'] == '') {
			$post['penguji2'] = NULL;
		}
		if ($post['penguji3'] == '') {
			$post['penguji3'] = NULL;
		}
		$data = array(
			'id_skripsi' => $post['judul'],
			'tanggal' => $post['tanggal'],
			'waktu' => $post['waktu'],
			'periode' => $post['periode'],
			'penguji_1' => $post['penguji1'],
			'penguji_2' => $post['penguji2'],
			'penguji_3' => $post['penguji3'],
			'ruangan' => $post['ruangan']
		);

		$this->db->where('id', $id);
		$this->db->update('jadwal_sempro', $data);
		$this->session->set_flashdata('pesan', 'Edit Jadwal Sempro berhasil');
		redirect('admin/JadwalSempro');
	}

	public function deleteJadwalSempro($id)
	{
		$id_skripsi = $this->db->get_where('jadwal_sempro', ['id' => $id])->row_array()['id_skripsi'];
		$this->db->delete('jadwal_sempro', array('id' => $id));
		//
		$this->db->where('id', $id_skripsi);
		$this->db->update('skripsi', ['status' => 1]);
		//
		$this->session->set_flashdata('pesan', '1 Jadwal Sempro berhasil dihapus');
		redirect('admin/JadwalSempro');
	}

	public function JadwalSidang()
	{
		$this->load->model('bimbingan_model', 'bimbinganM');
		$this->session->unset_userdata('keyword');
		$data['judul'] = 'Jadwal Sidang';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$userid = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['profil'] = $this->db->get_where('admin', ['username' => $userid['id']])->row_array();
		$this->load->model('jadwal_model', 'jadwalM');
		$this->load->model('skripsi_model', 'skripsiM');
		$data['level'] = $this->db->get('user_level')->result_array();
		//$data['user'] = $this->db->from('user');

		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		$this->db->like('s.judul', $data['keyword']);
		$this->db->from('jadwal_sidang js, skripsi s');
		$this->db->where('s.id = js.id_skripsi');
		// $this->db->where('level_id != 1 AND level_id != 2');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['base_url'] = 'http://localhost/sms-utm/admin/JadwalSidang';

		$config['per_page'] = 5;

		$this->pagination->initialize($config);

		if ($this->uri->segment(3) !== null) {
			$data['start'] = $this->uri->segment(3);
		} else {
			$data['start'] = 0;
		}

		$data['JSid'] = $this->jadwalM->getJadwalSidang($config['per_page'], $data['start'], $data['keyword'], $data['user']['level_id'], null, null);
		$data['penguji'] = $this->skripsiM->getPenguji();
		$data['dosen'] = $this->db->get('dosen')->result_array();
		$data['skripsi'] = $this->db->get('skripsi')->result_array();

		$this->form_validation->set_rules('judul', 'judul', 'required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('waktu', 'waktu', 'required');
		$this->form_validation->set_rules('periode', 'periode', 'required');
		$this->form_validation->set_rules('penguji1', 'penguji1', 'required');
		$this->form_validation->set_rules('penguji2', 'penguji2', 'required');
		$this->form_validation->set_rules('penguji3', 'penguji3', 'required');
		$this->form_validation->set_rules('ruangan', 'ruangan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/topbar');
			$this->load->view('admin/JadwalSidang');
			$this->load->view('template/footer');
		} else {
			$skripsi = $this->db->get_where('skripsi', ['id' => $this->input->post('judul')])->row_array();
			$jumlahB = count($this->bimbinganM->getCatatan($skripsi['nim'], '4'));
			if ($jumlahB == 6) {
				$data = [
					'id_skripsi' => $this->input->post('judul'),
					'tanggal' => $this->input->post('tanggal'),
					'waktu' => $this->input->post('waktu'),
					'periode' => $this->input->post('periode'),
					'penguji_1' => $this->input->post('penguji1'),
					'penguji_2' => $this->input->post('penguji2'),
					'penguji_3' => $this->input->post('penguji3'),
					'ruangan' => $this->input->post('ruangan'),
				];
				$this->db->insert('jadwal_sidang', $data);
				$this->db->where('id', $this->input->post('judul'));
				$this->db->update('skripsi', ['status' => 5]);
				$this->session->set_flashdata('pesan', 'Jadwal Sidang baru berhasil ditambahkan');
			} else {
				// gagal
				$this->session->set_flashdata('pesan', 'Gagal menambahkah Jadwal Sidang');
			}
			redirect('admin/JadwalSidang');
		}
	}

	public function EditJadwalSidang($id)
	{
		$data = array(
			'tanggal' => $this->input->post('tanggal'),
			'waktu' => $this->input->post('waktu'),
			'periode' => $this->input->post('periode'),
			'penguji_1' => $this->input->post('penguji1'),
			'penguji_2' => $this->input->post('penguji2'),
			'penguji_3' => $this->input->post('penguji3'),
			'ruangan' => $this->input->post('ruangan'),
		);

		$this->db->where('id', $id);
		$this->db->update('jadwal_sidang', $data);

		//perubahan status
		$sidang = $this->db->get_where('jadwal_sidang', ['id' => $id])->row_array();
		$this->db->where('id', $sidang['id_skripsi']);
		$this->db->update('skripsi', ['status' => 5]);

		$this->session->set_flashdata('pesan', 'Edit Jadwal Sidang berhasil');
		redirect('admin/JadwalSidang');
	}

	public function deleteJadwalSidang($id)
	{
		$id_skripsi = $this->db->get_where('jadwal_sidang', ['id' => $id])->row_array()['id_skripsi'];
		$this->db->delete('jadwal_sidang', array('id' => $id));
		//
		$this->db->where('id', $id_skripsi);
		$this->db->update('skripsi', ['status' => 3]);
		//
		$this->session->set_flashdata('pesan', '1 Jadwal Sidang berhasil dihapus');
		redirect('admin/JadwalSidang');
	}
}
