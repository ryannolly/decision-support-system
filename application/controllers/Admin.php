<?php

class Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('id_user') == null){
            $this->session->set_flashdata('pesan',
                '<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    Silahkan untuk login terlebih dahulu!
                </div>'
            );  
            $userdata = array('id_user', 'nama_admin');
            $this->session->unset_userdata($userdata);
            redirect('login');
        }

    }

    public function index(){
        $data['jumlah_siswa']       = $this->model_siswa->tampil_jumlah_siswa();
        $data['jumlah_siswa_nilai'] = $this->model_siswa->tampil_jumlah_nilai_terisi('tbl_nilai_non_keagamaan');

        $this->load->view('Admin/Template_admin/header');
        $this->load->view('Admin/Template_admin/sidebar');
        $this->load->view('Admin/dashboard', $data);
        $this->load->view('Admin/Template_admin/footer');
    }

    public function lihat_data_siswa(){
        $data['data_siswa']    = $this->model_siswa->tampil_data_siswa()->result();

        $this->load->view('Admin/Template_admin/header');
        $this->load->view('Admin/Template_admin/sidebar');
        $this->load->view('Admin/lihat_data_siswa', $data);
        $this->load->view('Admin/Template_admin/footer');
    }

    public function input_data_siswa(){
        $this->load->view('Admin/Template_admin/header');
        $this->load->view('Admin/Template_admin/sidebar');
        $this->load->view('Admin/input_data_siswa');
        $this->load->view('Admin/Template_admin/footer');
    }

    public function input_data_siswa_aksi(){
        $nomor_induk    = $this->input->post('nomor_induk');
        $nisn           = $this->input->post('nisn');
        $nama_siswa     = $this->input->post('nama_siswa');
        $tempat_lahir   = $this->input->post('tempat_lahir');
        $jenis_kelamin  = $this->input->post('jenis_kelamin');
        $tanggal_lahir = date('Y-m-d', strtotime($this->input->post("tanggal_lahir")));

        $data = array(
            'induk'         => $nomor_induk,
            'nisn'          => $nisn,
            'nama_siswa'    => $nama_siswa,
            'tempat_lahir'  => $tempat_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'tanggal_lahir' => $tanggal_lahir
        );

        $this->model_siswa->tambah_data_siswa($data, 'tbl_data_siswa');

        $this->session->set_flashdata('message','
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Data siswa telah berhasil ditambah!!
            </div>
        ');
        redirect('admin/index');
    }

    public function input_nilai_non_keagamaan(){
        $data['data_siswa']    = $this->model_siswa->tampil_data_siswa()->result();
        $no = 0;
        foreach($data['data_siswa'] as $ds){
            if($this->model_siswa->cek_nilai($ds->nisn, 'tbl_nilai_non_keagamaan')){
                //Masukkan dulu data nilai sama data udah ngisi apa belum disini
                $nilai = $this->model_siswa->panggil_rerata($ds->nisn, 'tbl_nilai_non_keagamaan');
                $mapel = array();
                $nilai_mapel = array();
                $dataNilai = $this->model_siswa->tampil_data_nilai($ds->nisn, 'tbl_nilai_non_keagamaan');
                foreach($dataNilai as $dn){
                    array_push($mapel, $dn->mapel);
                    array_push($nilai_mapel, $dn->nilai);
                }

                $dataTambahan = array(
                    'is_terisi' => 1,
                    'rerata'    => $nilai,
                    'mapel'     => $mapel,
                    'nilai'     => $nilai_mapel
                );
                $data['data_siswa'][$no++] = (object) array_merge((array) $ds, $dataTambahan);
            }else{
                $mapel = array();
                $nilai_mapel = array();
                $dataTambahan = array(
                    'is_terisi' => 0,
                    'rerata'    => 0,
                    'mapel'     => $mapel,
                    'nilai'     => $nilai_mapel
                );
                $data['data_siswa'][$no++] = (object) array_merge((array) $ds, $dataTambahan);
            }
        }

        $this->load->view('Admin/Template_admin/header');
        $this->load->view('Admin/Template_admin/sidebar');
        $this->load->view('Admin/input_nilai_non_keagamaan', $data);
        $this->load->view('Admin/Template_admin/footer');
    }

    public function input_nilai_non_keagamaan_isi($nisn = 0){
        if($nisn == 0){
            redirect('admin/index');
        }
        $data['nisn']   = $nisn;
        $data['nama']   = $this->model_siswa->get_nama_from_nisn($nisn);
        $this->load->view('Admin/Template_admin/header');
        $this->load->view('Admin/Template_admin/sidebar');
        $this->load->view('Admin/input_nilai_non_keagamaan_isi', $data);
        $this->load->view('Admin/Template_admin/footer');
    }

    public function input_nilai_non_keagamaan_isi_aksi(){
        $nisn                       = $this->input->post('nisn');
        $nilai_pkn                  = $this->input->post('nilai_pkn');
        $nilai_bahasa_indonesia     = $this->input->post('nilai_bahasa_indonesia');
        $nilai_matematika           = $this->input->post('nilai_matematika');
        $nilai_ipa                  = $this->input->post('nilai_ipa');
        $nilai_ips                  = $this->input->post('nilai_ips');
        $nilai_seni_budaya          = $this->input->post('nilai_seni_budaya');
        $nilai_penjasorkes          = $this->input->post('nilai_penjasorkes');
        $nilai_bahasa_inggris       = $this->input->post('nilai_bahasa_inggris');

        $data_nilai = array($nilai_pkn, $nilai_bahasa_indonesia, $nilai_matematika, $nilai_ipa, $nilai_ips, $nilai_seni_budaya, $nilai_penjasorkes, $nilai_bahasa_inggris);
        $data_mapel = array("PKN", "Bahasa Indonesia", "Matematika", "IPA", "IPS", "Seni Budaya", "Penjasorkes", "Bahasa Inggris");
        $idx = 0;
        foreach($data_mapel as $mapel){
            $data = array(
                'nisn'      => $nisn,
                'mapel'     => $mapel,
                'nilai'     => $data_nilai[$idx++]
            );

            $this->model_siswa->tambah_data_siswa($data, 'tbl_nilai_non_keagamaan');
        }
        $this->session->set_flashdata('message','
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Nilai siswa telah berhasil ditambah!!
            </div>
        ');
        redirect('admin/input_nilai_non_keagamaan');
    }

    public function hapus_nilai_non_keagamaan($nisn){
        $where = array(
            'nisn'  => $nisn
        );

        $this->model_siswa->hapus_nilai($where, 'tbl_nilai_non_keagamaan');
        $this->session->set_flashdata('message','
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Nilai siswa telah berhasil dihapus!
            </div>
        ');
        redirect('admin/input_nilai_non_keagamaan');
    }

    public function input_nilai_keagamaan(){
        $data['data_siswa']    = $this->model_siswa->tampil_data_siswa()->result();
        $no = 0;
        foreach($data['data_siswa'] as $ds){
            if($this->model_siswa->cek_nilai($ds->nisn, 'tbl_nilai_keagamaan')){
                //Masukkan dulu data nilai sama data udah ngisi apa belum disini
                $nilai = $this->model_siswa->panggil_rerata($ds->nisn, 'tbl_nilai_keagamaan');
                $mapel = array();
                $nilai_mapel = array();
                $dataNilai = $this->model_siswa->tampil_data_nilai($ds->nisn, 'tbl_nilai_keagamaan');
                foreach($dataNilai as $dn){
                    array_push($mapel, $dn->mapel);
                    array_push($nilai_mapel, $dn->nilai);
                }

                $dataTambahan = array(
                    'is_terisi' => 1,
                    'rerata'    => $nilai,
                    'mapel'     => $mapel,
                    'nilai'     => $nilai_mapel
                );
                $data['data_siswa'][$no++] = (object) array_merge((array) $ds, $dataTambahan);
            }else{
                $mapel = array();
                $nilai_mapel = array();
                $dataTambahan = array(
                    'is_terisi' => 0,
                    'rerata'    => 0,
                    'mapel'     => $mapel,
                    'nilai'     => $nilai_mapel
                );
                $data['data_siswa'][$no++] = (object) array_merge((array) $ds, $dataTambahan);
            }
        }

        $this->load->view('Admin/Template_admin/header');
        $this->load->view('Admin/Template_admin/sidebar');
        $this->load->view('Admin/input_nilai_keagamaan', $data);
        $this->load->view('Admin/Template_admin/footer');
    }

    public function input_nilai_keagamaan_isi($nisn = 0){
        if($nisn == 0){
            redirect('admin/index');
        }
        $data['nisn']   = $nisn;
        $data['nama']   = $this->model_siswa->get_nama_from_nisn($nisn);
        $this->load->view('Admin/Template_admin/header');
        $this->load->view('Admin/Template_admin/sidebar');
        $this->load->view('Admin/input_nilai_keagamaan_isi', $data);
        $this->load->view('Admin/Template_admin/footer');
    }

    public function input_nilai_keagamaan_isi_aksi(){
        $nisn                       = $this->input->post('nisn');
        $nilai_hadist               = $this->input->post('nilai_hadist');
        $nilai_akidah_ahlak         = $this->input->post('nilai_akidah_ahlak');
        $nilai_fikih                = $this->input->post('nilai_fikih');
        $nilai_ski                  = $this->input->post('nilai_ski');
        $nilai_bahasa_arab          = $this->input->post('nilai_bahasa_arab');

        $data_nilai = array($nilai_hadist, $nilai_akidah_ahlak, $nilai_fikih, $nilai_ski, $nilai_bahasa_arab);
        $data_mapel = array("Al-Qur'an Hadist", "Akidah Ahlak", "Fikih", "SKI", "Bahasa Arab");
        $idx = 0;
        foreach($data_mapel as $mapel){
            $data = array(
                'nisn'      => $nisn,
                'mapel'     => $mapel,
                'nilai'     => $data_nilai[$idx++]
            );

            $this->model_siswa->tambah_data_siswa($data, 'tbl_nilai_keagamaan');
        }
        $this->session->set_flashdata('message','
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Nilai siswa telah berhasil ditambah!!
            </div>
        ');
        redirect('admin/input_nilai_keagamaan');
    }

    public function hapus_nilai_keagamaan($nisn){
        $where = array(
            'nisn'  => $nisn
        );

        $this->model_siswa->hapus_nilai($where, 'tbl_nilai_keagamaan');
        $this->session->set_flashdata('message','
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Nilai siswa telah berhasil dihapus!
            </div>
        ');
        redirect('admin/input_nilai_keagamaan');
    }

    public function input_absensi(){
        $data['data_siswa']    = $this->model_siswa->tampil_data_siswa()->result();
        $no = 0;
        foreach($data['data_siswa'] as $ds){
            if($this->model_siswa->cek_nilai($ds->nisn, 'tbl_absensi')){
                //Masukkan dulu data nilai sama data udah ngisi apa belum disini
                $mapel = array();
                $nilai_mapel = array();
                $nilai_absensi = $this->model_siswa->tampil_data_nilai($ds->nisn, 'tbl_absensi');
                $nilai_absensi = $nilai_absensi[0]->nilai_absensi;
                $dataTambahan = array(
                    'is_terisi'         => 1,
                    'nilai_absensi'     => $nilai_absensi,
                );
                $data['data_siswa'][$no++] = (object) array_merge((array) $ds, $dataTambahan);
            }else{
                $dataTambahan = array(
                    'is_terisi'         => 0,
                    'nilai_absensi'     => 0    
                );
                $data['data_siswa'][$no++] = (object) array_merge((array) $ds, $dataTambahan);
            }
        }

        $this->load->view('Admin/Template_admin/header');
        $this->load->view('Admin/Template_admin/sidebar');
        $this->load->view('Admin/input_absensi', $data);
        $this->load->view('Admin/Template_admin/footer');
    }

    public function input_absensi_isi($nisn = 0){
        if($nisn == 0){
            redirect('admin/index');
        }
        $data['nisn']   = $nisn;
        $data['nama']   = $this->model_siswa->get_nama_from_nisn($nisn);
        $this->load->view('Admin/Template_admin/header');
        $this->load->view('Admin/Template_admin/sidebar');
        $this->load->view('Admin/input_absensi_isi', $data);
        $this->load->view('Admin/Template_admin/footer');
    }

    public function input_absensi_isi_aksi(){
        $nisn                       = $this->input->post('nisn');
        $nilai_absensi               = $this->input->post('nilai_absensi');
        $data = array(
            'nisn'              => $nisn,
            'nilai_absensi'     => $nilai_absensi
        );

        $this->model_siswa->tambah_data_siswa($data, 'tbl_absensi');
        $this->session->set_flashdata('message','
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Absensi siswa telah berhasil ditambah!
            </div>
        ');
        redirect('admin/input_absensi');
    }

    public function hapus_nilai_absensi($nisn = 0){
        $where = array(
            'nisn'  => $nisn
        );

        $this->model_siswa->hapus_nilai($where, 'tbl_absensi');
        $this->session->set_flashdata('message','
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Absensi siswa telah berhasil dihapus!
            </div>
        ');
        redirect('admin/input_absensi');
    }
    
    public function input_nilai_perilaku(){
        $data['data_siswa']    = $this->model_siswa->tampil_data_siswa()->result();
        $no = 0;
        foreach($data['data_siswa'] as $ds){
            if($this->model_siswa->cek_nilai($ds->nisn, 'tbl_nilai_perilaku')){
                //Masukkan dulu data nilai sama data udah ngisi apa belum disini
                $dataNilai = $this->model_siswa->tampil_data_nilai($ds->nisn, 'tbl_nilai_perilaku');

                $dataTambahan = array(
                    'is_terisi'         => 1,
                    'nilai_kelakuan'    => $dataNilai[0]->nilai_kelakuan,
                    'nilai_kerajinan'   => $dataNilai[0]->nilai_kerajinan,
                    'nilai_kedisiplinan'=> $dataNilai[0]->nilai_kedisiplinan,
                    'nilai_kerapian'    => $dataNilai[0]->nilai_kerapian
                );

                $data['data_siswa'][$no++] = (object) array_merge((array) $ds, $dataTambahan);
            }else{
                $dataTambahan = array(
                    'is_terisi' => 0,
                    'nilai_kelakuan'    => 0,
                    'nilai_kerajinan'   => 0,
                    'nilai_kedisiplinan'=> 0,
                    'nilai_kerapian'    => 0
                );
                $data['data_siswa'][$no++] = (object) array_merge((array) $ds, $dataTambahan);
            }
        }

        $this->load->view('Admin/Template_admin/header');
        $this->load->view('Admin/Template_admin/sidebar');
        $this->load->view('Admin/input_nilai_perilaku', $data);
        $this->load->view('Admin/Template_admin/footer');
    }

    public function input_nilai_perilaku_isi($nisn = 0){
        if($nisn == 0){
            redirect('admin/index');
        }
        $data['nisn']   = $nisn;
        $data['nama']   = $this->model_siswa->get_nama_from_nisn($nisn);
        $this->load->view('Admin/Template_admin/header');
        $this->load->view('Admin/Template_admin/sidebar');
        $this->load->view('Admin/input_nilai_perilaku_isi', $data);
        $this->load->view('Admin/Template_admin/footer');
    }

    public function input_nilai_perilaku_isi_aksi(){
        $nisn                       = $this->input->post('nisn');
        $nilai_kelakuan             = $this->input->post('nilai_kelakuan');
        $nilai_kerajinan            = $this->input->post('nilai_kerajinan');
        $nilai_kedisiplinan         = $this->input->post('nilai_kedisiplinan');
        $nilai_kerapian             = $this->input->post('nilai_kerapian');

        $data = array(
            'nisn'              => $nisn,
            'nilai_kelakuan'    => $nilai_kelakuan,
            'nilai_kerajinan'   => $nilai_kerajinan,
            'nilai_kedisiplinan'=> $nilai_kedisiplinan,
            'nilai_kerapian'    => $nilai_kerapian
        );

        $this->model_siswa->tambah_data_siswa($data, 'tbl_nilai_perilaku');

        $this->session->set_flashdata('message','
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Nilai perilaku siswa telah berhasil ditambah!!
            </div>
        ');
        redirect('admin/input_nilai_perilaku');
    }

    public function hapus_nilai_perilaku($nisn = 0){
        $where = array(
            'nisn'  => $nisn
        );

        $this->model_siswa->hapus_nilai($where, 'tbl_nilai_perilaku');
        $this->session->set_flashdata('message','
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Absensi siswa telah berhasil dihapus!
            </div>
        ');
        redirect('admin/input_nilai_perilaku');
    }

    public function lihat_siswa_terbaik(){
        //Ambil terlebih dahulu jumlah siswa
        $jumlah_siswa = $this->model_siswa->tampil_jumlah_siswa();
        //Ambil jumlah siswa yang udah terisi nilai non keagamaannya
        $jumlah_nilai_non_keagamaan = $this->model_siswa->tampil_jumlah_nilai_terisi('tbl_nilai_non_keagamaan');
        //Ambil jumlah siswa yang udah terisi nilai keagamaannya
        $jumlah_nilai_keagamaan     = $this->model_siswa->tampil_jumlah_nilai_terisi('tbl_nilai_keagamaan');
        //Ambil jumlah nilai absensi siswa yang udah terisi nilainya
        $jumlah_nilai_absensi       = $this->model_siswa->tampil_jumlah_nilai_terisi('tbl_absensi');
        //Ambil jumlah nilai perilaku siswa yang udah terisi nilainya
        $jumlah_nilai_perilaku      = $this->model_siswa->tampil_jumlah_nilai_terisi('tbl_nilai_perilaku');

        if($jumlah_siswa == $jumlah_nilai_non_keagamaan AND $jumlah_siswa == $jumlah_nilai_keagamaan AND $jumlah_siswa == $jumlah_nilai_absensi && $jumlah_siswa == $jumlah_nilai_perilaku){
            $is_bisa = TRUE;
        }else{
            $is_bisa = FALSE;
        }

        $data = array(
            'is_bisa' => $is_bisa
        );

        $this->load->view('Admin/Template_admin/header');
        $this->load->view('Admin/Template_admin/sidebar');
        $this->load->view('Admin/lihat_siswa_terbaik', $data);
        $this->load->view('Admin/Template_admin/footer');
    }

    public function lihat_detail_siswa_terbaik(){
        //Ambil terlebih dahulu jumlah siswa
        $jumlah_siswa = $this->model_siswa->tampil_jumlah_siswa();
        //Ambil jumlah siswa yang udah terisi nilai non keagamaannya
        $jumlah_nilai_non_keagamaan = $this->model_siswa->tampil_jumlah_nilai_terisi('tbl_nilai_non_keagamaan');
        //Ambil jumlah siswa yang udah terisi nilai keagamaannya
        $jumlah_nilai_keagamaan     = $this->model_siswa->tampil_jumlah_nilai_terisi('tbl_nilai_keagamaan');
        //Ambil jumlah nilai absensi siswa yang udah terisi nilainya
        $jumlah_nilai_absensi       = $this->model_siswa->tampil_jumlah_nilai_terisi('tbl_absensi');
        //Ambil jumlah nilai perilaku siswa yang udah terisi nilainya
        $jumlah_nilai_perilaku      = $this->model_siswa->tampil_jumlah_nilai_terisi('tbl_nilai_perilaku');

        if($jumlah_siswa == $jumlah_nilai_non_keagamaan AND $jumlah_siswa == $jumlah_nilai_keagamaan AND $jumlah_siswa == $jumlah_nilai_absensi && $jumlah_siswa == $jumlah_nilai_perilaku){
            $is_bisa = TRUE;
        }else{
            $is_bisa = FALSE;
        }

        $data = array(
            'is_bisa' => $is_bisa
        );

        $this->load->view('Admin/Template_admin/header');
        $this->load->view('Admin/Template_admin/sidebar');
        $this->load->view('Admin/lihat_detail_siswa_terbaik', $data);
        $this->load->view('Admin/Template_admin/footer');
    }
}

?>