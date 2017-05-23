<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Monitor extends CI_Controller {

	public function __construct() {
    parent::__construct();

    $this->load->model(array('m_login'));
    $this->load->model(array('m_data'));
    $this->load->model(array('m_modal'));
    $this->load->library(array('session'));   
    $this->load->database();
    $this->load->helper(array('url'));
		if ($this->session->userdata('isLogin') == TRUE){
				redirect('app'); 
            }
		
      }  
      
	public function index()
	{
		 $data=array('title'=>'e-Monitoring | MSM Consultant - Login'
		 );
		 $this->load->view('aplikasi/v_monitor',$data); 
		
	}

	 public function a_login() {
	 if (isset($_POST['login'])){
	 	$username=$this->input->post('username');
	    $data = array(
		  'username' => $this->input->post('username'),
		  'password'    => md5($this->input->post('password'))                                      
	                                      
		 	
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
	                'kd_wil' => $user->kd_wilayah,
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
 }
 
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */