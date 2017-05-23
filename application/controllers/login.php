<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
    parent::__construct();

    $this->load->model(array('m_login'));
    $this->load->library(array('session'));   
    $this->load->database();
    $this->load->helper(array('url'));
    $this->load->library('encrypt');
		if ($this->session->userdata('isLogin') == TRUE){
				redirect('app'); 
            }
		
      }  
      
   

	public function index()
	{
		 $data=array('title'=>'e-Monitoring | MSM Consultant - Login'
		 );
		 $this->load->view('v_login',$data); 
		
	}

	 public function a_login() {
	 if (isset($_POST['login'])){
	 	$username=$this->input->post('username');
	    $data = array(
		  'username' => $this->input->post('username'),
		  'password' => md5($this->input->post('password'))// $this->encrypt->encode($this->input->post('password'))                                     
	                                      
		 	
		  );}
				$cek=$this->m_login->cekLogin($data);
	              if($cek->num_rows() <> 0) {
				  	$user=$this->m_login->userData($username);
				  	if($user->status !='1'){
				  		$text='
					   <div class="alert alert-warning alert-dismissable">
                   	   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      
                  	  Akun tidak aktif, hubungi admin.
                 	   </div>';
		              	$this->session->set_flashdata('cek', $text);
						redirect('login');      
				  	}
				  	 $this->session->set_userdata(array(
				  	
	                'iduser' => $user->user_name,
	                'nama_lengkap' => $user->nm_lengkap,	                
	                'jabatan' => $user->jabatan,
	                'kd_area' => $user->kd_area,
	                'kd_subarea' => $user->kd_subarea,
	                'ket' => $user->keterangan,
	                'oto' => $user->group,
	                'isLogin' => TRUE
	          		  ));


				redirect('/');
                
                }else {
				$text='
					   <div class="alert alert-warning alert-dismissable">
                   	   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      
                  	   Username atau Password salah.
                 	   </div>';
              	$this->session->set_flashdata('cek', $text);
				redirect('login');        
                } 
 }//login


}

/* End of file login.php */
/* Location: ./application/controllers/login.php */