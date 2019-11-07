<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kas');
		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user',['username' => $this->session->userdata('username')])->row_array();
		$data['totaljumlah'] = $this->kas->hitungjumlah();
		$data['totalkeluar'] = $this->kas->hitungkeluar();
		$data['title'] = 'Data Kas';
		$this->load->view('backend/template/header', $data, FALSE);
		$this->load->view('backend/template/sidebar', $data, FALSE);
		$this->load->view('backend/kas', $data, FALSE);
		$this->load->view('backend/template/footer', $data, FALSE);
		
	}

}

/* End of file Keuangan.php */
/* Location: ./application/controllers/Keuangan.php */