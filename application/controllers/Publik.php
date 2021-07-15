<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publik extends CI_Controller
{
	public function index()
	{
		$data['judul'] = 'Portal SMS UTM';
		$this->load->view('publik/index', $data);
	}
	
}
