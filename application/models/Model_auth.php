<?php

class Model_auth extends CI_Model{
    public function cek_login(){
        $email = set_value('email');

        $result = $this->db->where('email_user', $email)
                           ->limit(1)
                           ->get('tbl_user');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
    }
}

?>