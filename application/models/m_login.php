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
     function saveData($data,$user,$date,$id_user){
        if($id_user == 0){
            $data['create_by'] = $user;
            $data['create_date'] = $date;
            $this->db->insert('m_user',$data);
        }else{
            $data['update_by'] = $user;
            $data['update_date'] = $date;
            $this->db->set('user_revised', '(user_revised+1)', FALSE);
            $this->db->where('user_id', $id_user);
            $this->db->update('m_user', $data);
        }
    }

    function select_id($id){
        $sql = "SElect * from m_user where user_id = '$id' ";
        $query = $this->db->query($sql);
        return $query->row();

    }

    function delete($data){
        $this->db->delete('m_user',$data);
    }
    
}