<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kas extends CI_Model {

	public function hitungjumlah(){
		$this->db->select_sum('jumlah');
		$query = $this->db->get('kas');
		if($query->num_rows()>0){
			return $query->row()->jumlah;
		}
		else
		{
			return 0;
		}
	}

	public function hitungkeluar(){
		$this->db->select_sum('keluar');
		$query =  $this->db->get('kas');
		if($query->num_rows()>0){
			return $query->row()->keluar;
		}
		else
		{
			return 0;
		}
	}

}

/* End of file Kas.php */
/* Location: ./application/models/Kas.php */