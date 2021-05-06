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
				$hashed = hash("sha512", $this->input->post('password').$auth->salt_user);
                if($auth->password_user !== $hashed){
                    $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                                Password yang anda masukkan salah!!
                                </div>'
                    );
                    redirect("");
                }else{
                    $this->session->set_userdata('id_user', $auth->id_user);
                    $this->session->set_userdata('role_user', $auth->role_user);
                    $this->session->set_userdata('nama_user', $auth->nama_user);
                    $this->session->set_userdata('nip_user', $auth->nip_user);
                    $this->session->set_userdata('fakultas', $auth->fakultas);

                    switch($auth->role_user){
                        
                    }
                }
            }
        }else{
            switch($this->session->userdata('role_user')){
                
            }
        }
    }
}

?>