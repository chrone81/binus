<?php
class LoginModel extends CI_Model{
    public function getPengguna($username,$password){
        $query="SELECT * FROM tbpengguna WHERE username='".$username."' AND password='".$password."'";
        return $this->db->query($query)->result_array();
    }
}