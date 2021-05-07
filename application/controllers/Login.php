<?php

class Login extends CI_Controller{
    public function index(){
        if($this->session->userdata('role_user') == null){
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if($this->form_validation->run() == false){
                $this->load->view('login');
            }else{
                $auth = $this->model_auth->cek_login();
				$password = $this->input->post('password');
                if($auth->password !== $password){
                    $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                                Password yang anda masukkan salah!!
                                </div>'
                    );
                    redirect("");
                }else{
                    redirect("")
                }
            }
        }else{
            switch($this->session->userdata('role_user')){
                
            }
        }
    }
}

?>