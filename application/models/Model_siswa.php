<?php

class Model_siswa extends CI_Model{
    public function tampil_data_siswa(){
        return $this->db->order_by('nama_siswa', 'ASC')->get('tbl_data_siswa');
    }

    public function tambah_data_siswa($data, $table){
        $this->db->insert($table, $data);
    }

    public function tampil_jumlah_siswa(){
        return $this->db->count_all_results('tbl_data_siswa');
    }
}

?>