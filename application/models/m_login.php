<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

    class M_login extends CI_Model {
        public function __construct() {
            parent::__construct();
        }
  
        public function cekLogin($data) {
               /*  $this->db->select('*');
                $this->db->from('ms_user');
                $this->db->where('user_name', $data['username']);
                $this->db->where('password', $data['password']);
               
       
                $query = $this->db->get(); */
			$query=	$this->db->query("select * from ms_user where user_name='".$data['username']."' and password='".$data['password']."'");
            return $query;
          }
  
          public function userData($username) {
               $this->db->select('user_name');
               $this->db->select('nm_lengkap');
               $this->db->select('jabatan');
               $this->db->select('kd_area');
               $this->db->select('kd_subarea');
               $this->db->select('status');     
               $this->db->select('keterangan');        
               $this->db->select('group');           
               $this->db->where('user_name', $username);
               $query = $this->db->get('ms_user');
   
               return $query->row();
          }
  
    }  

?>