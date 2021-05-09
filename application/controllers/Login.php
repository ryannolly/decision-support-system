<?php

class Login extends CI_Controller{
    public function index(){
        if($this->session->userdata('id_user') == null){
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
                    $this->session->set_userdata('id_user', $auth->id);
                    $this->session->set_userdata('nama_admin', $auth->nama_admin);
                    redirect("admin");
                }
            }
        }else{
            redirect('admin');  
        }
    }

    public function logout(){
        $userdata = array('id_user', 'nama_admin');
        $this->session->unset_userdata($userdata);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         <h4><i class="icon fa fa-check"></i> Alert!</h4>
                         Anda telah berhasil logout!
                         </div>'
                    );
        redirect('');
    }
}

?>