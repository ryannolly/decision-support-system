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
        $data['jumlah_siswa']   = $this->model_siswa->tampil_jumlah_siswa();

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
}

?>