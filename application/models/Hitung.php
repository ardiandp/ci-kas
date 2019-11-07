<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hitung extends CI_Model {

    public function hitungjumlah() {
        $this->db->select_sum('jumlah');
        $query = $this->db->get('kas');
        if ($query->num_rows()>0) {
            return $query->row()->jumlah;
        } else {
            return 0;
        }
    }

    public function hitungkeluar() {
        $this->db->select_sum('keluar');
        $query = $this->db->get('kas');
        if ($query->num_rows()>0) {
            return $query->row()->keluar;
        } else {
            return 0;
        }
    }

    public function hapus_kasmasuk($kode){
        $hsl=$this->db->query("DELETE FROM kas where kode='$kode'");
        return $hsl;
    }
    
    // FUNGSI CRUD
    // fungsi untuk mengambil data dari database
    function get_data($table){
        return $this->db->get($table);
    }

    // fungsi untuk menginput data ke database
    function insert_data($data,$table){
        $this->db->insert($table,$data);
    }

    // fungsi untuk mengedit data
    function edit_data($where,$table){
        return $this->db->get_where($table,$where);
    }

    // fungsi untuk mengupdate atau mengubah data di database
    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    // fungsi untuk menghapus data dari database
    function delete_data($where,$table){
        $this->db->delete($table,$where);
    }
    // AKHIR FUNGSI CRUD
}

/* End of file getkod_model.php */
/* Location: ./application/models/getkod_model.php */