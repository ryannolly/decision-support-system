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
        $this->load->view('Admin/Template_admin/header');
        $this->load->view('Admin/Template_admin/sidebar');
        $this->load->view('Admin/dashboard');
        $this->load->view('Admin/Template_admin/footer');
    }
}

?>