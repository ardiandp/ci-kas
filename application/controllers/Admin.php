<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('hitung');
		$this->load->helper('tanggal');
		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['totaljumlah'] = $this->hitung->hitungjumlah();
		$data['totalkeluar'] = $this->hitung->hitungkeluar();
		$data['title'] = 'Dashboard Admin';
		$this->load->view('backend/template/header', $data);
		$this->load->view('backend/template/sidebar', $data);
		$this->load->view('backend/dashboard', $data);
		$this->load->view('backend/template/footer');
	}

	public function kasmasuk()
	{
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['totaljumlah'] = $this->hitung->hitungjumlah();
		$data['title'] = 'KAS MASUK';
		$data['kasmasuk'] = $this->db->query("SELECT * FROM kas WHERE jenis = 'masuk'")->result_array();
		$this->load->view('backend/template/header', $data);
		$this->load->view('backend/template/sidebar', $data);
		$this->load->view('backend/kasmasuk',$data);
		$this->load->view('backend/template/footer');
	}

	public function kaskeluar()
	{
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['totalkeluar'] = $this->hitung->hitungkeluar();
		$data['title'] = 'KAS KELUAR';
		$data['kaskeluar'] = $this->db->query("SELECT * FROM kas WHERE jenis = 'keluar'")->result_array();
		$this->load->view('backend/template/header', $data);
		$this->load->view('backend/template/sidebar', $data);
		$this->load->view('backend/kaskeluar', $data);
		$this->load->view('backend/template/footer');
	}

	public function rekapdata()
	{
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['totaljumlah'] = $this->hitung->hitungjumlah();
		$data['totalkeluar'] = $this->hitung->hitungkeluar();
		$data['title'] = 'REKAPITULASI DATA';
		$data['rekap'] = $this->db->query("SELECT * FROM kas")->result_array();
		$this->load->view('backend/template/header', $data);
		$this->load->view('backend/template/sidebar', $data);
		$this->load->view('backend/rekapdata', $data);
		$this->load->view('backend/template/footer');
	}

	public function tentangkas()
	{
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'TENTANG KAS';
		$this->load->view('backend/template/header', $data);
		$this->load->view('backend/template/sidebar', $data);
		$this->load->view('backend/tentang');
		$this->load->view('backend/template/footer');
	}


	public function tambahkas(){
		$data = array(
			'kode'	=> $this->input->post('kode'),
			'keterangan'	=> $this->input->post('ket'),
			'tgl'	=> $this->input->post('tgl'),
			'jumlah'	=> $this->input->post('jml'),
			'jenis'	=> 'masuk',
			'keluar' => '0'
			 );
		// die(print_r($data));
		$this->db->insert('kas', $data);
		redirect('admin/kasmasuk');
	}

	public function keluarkas(){
		$data = array(
			'kode'	=> $this->input->post('kode'),
			'keterangan'	=> $this->input->post('ket'),
			'tgl'	=> $this->input->post('tgl'),
			'jumlah'	=> '0',
			'jenis'	=> 'keluar',
			'keluar' => $this->input->post('jml')
			 );
		// die(print_r($data));
		$this->db->insert('kas', $data);
		redirect('admin/kaskeluar');
	}

	public function kasmasuk_hapus($id)
	{
		$where = array(
			'kode' => $id
		);

		$this->hitung->delete_data($where,'kas');

		redirect(base_url().'admin/kasmasuk');
	}

	public function kaskeluar_hapus($id)
	{
		$where = array(
			'kode' => $id
		);

		$this->hitung->delete_data($where,'kas');

		redirect(base_url().'admin/kaskeluar');
	}

	public function kasmasuk_update()
	{
		/*$this->form_validation->set_rules('kode','Kode','required');

		if($this->form_validation->run() != false){*/

			$id = $this->input->post('kode');

			$ket = $this->input->post('ket');
			$tgl = $this->input->post('tgl');
			$jml = $this->input->post('jml');
			$masuk = "masuk";
			$nol = "0";

			$where = array(
				'kode' => $id
			);

			$data = array(
				'keterangan' => $ket,
				'tgl' => $tgl,
				'jumlah' => $jml,
				'jenis' => $masuk,
				'keluar' => $nol
			);

			$this->hitung->update_data($where, $data,'kas');

			redirect(base_url().'admin/kasmasuk');
			
		/*}else{

			$id = $this->input->post('kode');
			$where = array(
				'kode' => $id
			);
			$data['kas'] = $this->hitung->edit_data($where,'kas')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_kategori_edit',$data);
			$this->load->view('dashboard/v_footer');
		}*/
	}

	public function kaskeluar_update()
	{
		/*$this->form_validation->set_rules('kode','Kode','required');

		if($this->form_validation->run() != false){*/

			$id = $this->input->post('kode');

			$ket = $this->input->post('ket');
			$tgl = $this->input->post('tgl');
			$jml = $this->input->post('jml');
			$keluar = "keluar";
			$nol = "0";

			$where = array(
				'kode' => $id
			);

			$data = array(
				'keterangan' => $ket,
				'tgl' => $tgl,
				'jumlah' => $nol,
				'jenis' => $keluar,
				'keluar' => $jml
			);

			$this->hitung->update_data($where, $data,'kas');

			redirect(base_url().'admin/kaskeluar');
			
		/*}else{

			$id = $this->input->post('kode');
			$where = array(
				'kode' => $id
			);
			$data['kas'] = $this->hitung->edit_data($where,'kas')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_kategori_edit',$data);
			$this->load->view('dashboard/v_footer');
		}*/
	}

	public function test()
	{
		echo "test <br>";
		$waktu=3601;
		echo waktu($waktu);
		$tanggal=date('Y-m-d');
		echo formatHariTanggal($tanggal);
	}



}
