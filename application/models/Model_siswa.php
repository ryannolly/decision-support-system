<?php

class Model_siswa extends CI_Model{
    public function tampil_data_siswa(){
        return $this->db->order_by('nama_siswa', 'ASC')->get('tbl_data_siswa');
    }

    public function tampil_data_nilai($nisn, $table){
        return $this->db->where('nisn', $nisn)->get($table)->result();
    }

    public function tambah_data_siswa($data, $table){
        $this->db->insert($table, $data);
    }

    public function tampil_jumlah_siswa(){
        return $this->db->count_all_results('tbl_data_siswa');
    }

    public function get_nama_from_nisn($nisn){
        $result = $this->db->where('nisn', $nisn)
                           ->limit(1)
                           ->get('tbl_data_siswa');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
    }

    public function cek_nilai($nisn, $tbl){
        $result = $this->db->where('nisn', $nisn)
                           ->limit(1)
                           ->get($tbl);
        if($result->num_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function hapus_nilai($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function tampil_jumlah_nilai_terisi($tabel){
        $query = $this->db->query("SELECT COUNT(DISTINCT nisn) as banyakNilai FROM ".$tabel)->row();
        return $query->banyakNilai;
    }

    public function panggil_rerata($nisn, $table){
        $this->db->select('nisn');
        $this->db->select_avg('nilai');
        $this->db->group_by('nisn');
        $this->db->where('nisn', $nisn);
        $result = $this->db->get($table);
        if($result->num_rows() > 0){
            $query =  $result->row();
            return $query->nilai;
        }else{
            return 0;
        }
    }
}

?>