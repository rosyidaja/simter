<?php
class M_login extends CI_Model {
     function __construct(){    
     parent::__construct();  
     }
     function cek_account($username, $pass){
     	 $this->db->select('*');   
         $this->db->from('user');   
         $this->db->where('username', $username);
         $this->db->where('password', md5($password)); 

     	 return $this->db->get();
     }
    
}