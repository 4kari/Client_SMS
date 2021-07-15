<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publik extends CI_Controller
{
	function __construct() {
		parent::__construct();
		
		}
	public function index()
	{
		$data['judul'] = 'Portal SMS UTM';
		$this->load->view('publik/header', $data);
		$this->load->view('publik/index');
		$this->load->view('publik/footer');
	}

}
