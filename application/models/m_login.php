<?php
class M_login extends CI_Model {
     function __construct(){    
     parent::__construct();  
     }
     function cek_account($username, $pass){
     	 $this->db->select('*');   
         $this->db->from('m_user');   
         $this->db->where('username', $username);
         $this->db->where('password', $pass); 

     	 return $this->db->get();
     }
    
}