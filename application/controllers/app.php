<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Controller {
	public function __construct() {
    parent::__construct();

    $this->load->model(array('m_data'));
    $this->load->model(array('m_modal'));
    $this->load->library(array('session'));   
    $this->load->database();
    $this->load->helper(array('url','date'));
	$this->iduser = $this->session->userdata('iduser');
	$this->namauser = $this->session->userdata('nama_lengkap');
    $this->load->library('encrypt');
	if ($this->session->userdata('isLogin') != TRUE){
				$text='<div class="alert alert-warning alert-dismissable">
                   	   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  	   Silahkan login terlebih daulu
                 	   </div>';
              	$this->session->set_flashdata('cek', $text);
				redirect('login'); 
			}
		 
    } 
     

 public function index()
	{
		$this->dashboard();
	}
	
 public function master_hapus(){
		$db= $this->input->post('db');
		$kolom= $this->input->post('kolom');
		$isi= $this->input->post('isi');
		$sql = "delete from $db where $kolom=trim('$isi')";
        $asg = $this->db->query($sql);  
        
		if ($asg){
            if (!($asg)){
              $msg = array('pesan'=>'0');
              echo json_encode($msg);
               exit();
            } 
        } else {
            $msg = array('pesan'=>'0');
            echo json_encode($msg);
            exit();
        }
        $msg = array('pesan'=>'1');
        echo json_encode($msg);
	 
 }	
 
 public function master_hapus_monitor(){
	$db= $this->input->post('db');
	$kolom1= $this->input->post('kolom1');
	$isi1= $this->input->post('isi1');
	$kolom2= $this->input->post('kolom2');
	$isi2= $this->input->post('isi2');
	$sql = "delete from $db where $kolom1=trim('$isi1') and $kolom2=trim('$isi2')";
	$asg = $this->db->query($sql);  

	if ($asg){
	if (!($asg)){
	  $msg = array('pesan'=>'0');
	  echo json_encode($msg);
	   exit();
	} 
	} else {
	$msg = array('pesan'=>'0');
	echo json_encode($msg);
	exit();
	}
	$msg = array('pesan'=>'1');
	echo json_encode($msg);

	}

 public function master_hapus_wil(){
		$db= $this->input->post('db');
		$kolom= $this->input->post('kolom');
		$isi= $this->input->post('isi');
		$sql = "delete from $db where $kolom=trim('$isi')";
        $asg = $this->db->query($sql);  
			if($asg){
				$sqlc = "delete from ms_wilayah_child where $kolom=trim('$isi')";
				$asgc = $this->db->query($sqlc);  
			}
        
		if ($asg){
            if (!($asg)){
              $msg = array('pesan'=>'0');
              echo json_encode($msg);
               exit();
            } 
        } else {
            $msg = array('pesan'=>'0');
            echo json_encode($msg);
            exit();
        }
        $msg = array('pesan'=>'1');
        echo json_encode($msg);
	 
 }

 public function dashboard() {
	 $data=array('title'=>'e-Monitoring | MSM Consultant - Dashboard',
	 'page' =>'aplikasi/v_dashboard'
	 );
	 $this->load->view('temp/wrapper',$data);  
 }

 public function page_user() {
 	//$cekjab=$this->session->userdata('jabatan');
 	$oto=$this->session->userdata('oto');
	$kolom = "id_user";$tabel = "ms_user";
 	if($oto =='1' || $oto =='2'){
 	  $data=array('title'=>'e-Monitoring | MSM Consultant - User',
	 'prop'=>$this->m_data->getArea(),	
	 'ta'=>$this->m_data->getloadTa(),	
	 'wilayah'=>$this->m_data->getMsWil(),
	 'user'=> $this->m_data->getAllUser(),
	 'max'=> $this->m_data->getMax($kolom,$tabel),
	 'page' =>'aplikasi/v_user'
	 );
	 $this->load->view('temp/wrapper',$data);

 	}else{
 	
	 $data=array('title'=>'e-Monitoring | MSM Consultant - Forbidden Page',
	 'page' =>'temp/forbidden'
	 );
	 $this->load->view('temp/wrapper',$data);    
 	}
 } //end page_user

 public function insert_user(){
 			$tb='ms_user';
 			$submit='';
		 	$submit=$this->input->post('save');		
			$a = $this->input->post('list_daerah');
			$ax= str_ireplace(',',"','",$a); 	
			$kd_korwil = $this->input->post('kode_ta');
			$id_korwil = $this->input->post('id_user');
			$kd_areas   = "'".$ax."'";
			//print_r($kd_korwil.'--'.$id_korwil.'--'.$kd_areas); exit;
		 	$data =array(
				'id_user'=>$this->input->post('id_user'),
				'user_name'=>$this->input->post('username'),
				'nm_lengkap'=>$this->input->post('fullname'),	
				'password'=>md5($this->input->post('pass')),//	$this->encrypt->encode($this->input->post('pass')),
				'jabatan'=>$this->input->post('jabatan'),		
				'kd_area'=>$this->input->post('kode_prop'),	
				'kd_subarea'=>$this->input->post('kode_kab'),			
				'status'=>1,		
				'keterangan'=>"'".$ax."'",
				'group'=>$this->input->post('group')	
				
			);
			if(isset($submit)){
					$f=$this->m_data->InData($tb,$data);
					$a=$this->m_data->Uptabta($kd_korwil,$id_korwil,$kd_areas);
					
				 	$text='<div class="alert alert-success alert-dismissible" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <strong>Notif!</strong> Data berhasil disimpan.
				    </div>';
					$this->session->set_flashdata('notif', $text);
					redirect('app/page_user');   
				
		           
		    }else{

		    		$text='<div class="alert alert-warning alert-dismissible" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <strong>Notif!</strong> Data gagal disimpan.
				    </div>';
					$this->session->set_flashdata('notif', $text);
					redirect('app/page_user'); 
		    }
 }

 public function chpass(){
 	 $data=array('title'=>'e-Monitoring | MSM Consultant - Ganti Password',
	 'page' =>'aplikasi/v_chpass'
	 );
	 $this->load->view('temp/wrapper',$data);  
 }

 public function a_chpass(){
 	
 			 $id=$this->iduser;
			 $submit=$this->input->post('submit');
			 $passold=md5($this->input->post('passold'));
			 $passnew=md5($this->input->post('passnew'));
			 $vpassnew=md5($this->input->post('vpassnew'));
			 if(isset($submit)){
			 $cek=$this->m_data->cek_pass($id,$passold);
			 if($cek->num_rows()== 1){
					 	$this->m_data->up_pass($id,$passnew);
						$text='<div class="alert alert-success alert-dismissible" role="alert">
					    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
				        <strong>Notif!</strong> Password telah diubah, akan aktif setelah anda logout
					    </div>';
						$this->session->set_flashdata('notif', $text);
						redirect('app/chpass');
					}else{
						$text='<div class="alert alert-warning alert-dismissible" role="alert">
					    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
				        <strong>Notif!</strong> Password lama yang anda masukkan salah..!
					    </div>';
						$this->session->set_flashdata('notif', $text);
						redirect('app/chpass');
					}

			 }
			 
 }//end action chpass

 public function page_wilayah() {
	 $id 	= $this->uri->segment(3);
	 $kode 	= $this->uri->segment(4);
	 $kolom="kd_wilayah"; $tabel="ms_wilayah";
	 $data=array('title'=>'e-Monitoring | MSM Consultant - Wilayah Kerja',
	 'wilgrid'=>$this->m_data->getMsWilGrid(),
	 'page' =>'aplikasi/v_wilayah'
	 );
	 $this->load->view('temp/wrapper',$data);  
 }
 
 public function addwilayah($id) {
	
	 $id 	= $this->uri->segment(3);
	 $kode 	= $this->uri->segment(4);
	 $kolom="kd_wilayah"; $tabel="ms_wilayah";
	 $data=array(
	 'title'=>'e-Monitoring | MSM Consultant - Wilayah Kerja',
	 'prop'=>$this->m_data->getArea(),	
	 'kab'=>$this->m_data->getAreaSub(),	
	 'wilayah'=>$this->m_data->getMsWil($id),
	 'wilgrid'=>$this->m_data->getMsWilGrid($id),
	 'wchild'=>$this->m_data->getWchild($id),
	 'sistem'=>$this->m_data->getSis(),
	 'max'=>$this->m_data->getMax($kolom,$tabel),
	 'page' =>'aplikasi/v_wilayah_form'
	 ); 
	 $this->load->view('temp/wrapper',$data); 
 }
 
 public function insert_wilayah(){
 			$tb='ms_wilayah';
 			$submit='';
		 	$submit=$this->input->post('save');		 	
			$param = $this->input->post();
			if(isset($submit)){
					$this->m_data->InWilayah($param);
				 	$text='<div class="alert alert-success alert-dismissible" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <strong>Notif!</strong> Data berhasil disimpan.
				    </div>';
					$this->session->set_flashdata('notif', $text);
					redirect('app/page_wilayah');   
				
		           
		    }else{

		    		$text='<div class="alert alert-warning alert-dismissible" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <strong>Notif!</strong> Data gagal disimpan.
				    </div>';
					$this->session->set_flashdata('notif', $text);
					redirect('app/page_wilayah'); 
		    }
	
} 

 public function page_area() {
	 $data=array('title'=>'e-Monitoring | MSM Consultant - Area',
	 'area'=>$this->m_data->getArea(),	
	 'page' =>'aplikasi/v_area'
	 );
	 $this->load->view('temp/wrapper',$data);  
 }
 
 public function page_subarea() {
	 $kolom="kd_sistem"; $tabel="ms_sistem";
	 $data=array('title'=>'e-Monitoring | MSM Consultant - Sub Area',
	 'prop'=>$this->m_data->getArea(),	
	 'subarea'=>$this->m_data->getAreaSub(),	
	 'page' =>'aplikasi/v_subarea'
	 );
	 $this->load->view('temp/wrapper',$data);  
 }
 
 public function page_sistem() {
	 $kolom="kd_sistem"; $tabel="ms_sistem";
	 $data=array('title'=>'e-Monitoring | MSM Consultant - Sistem',
	 'sistem'=>$this->m_data->getSis(),	
	 'max'=>$this->m_data->getMaxSis($kolom,$tabel),	
	 'page' =>'aplikasi/v_sistem'
	 );
	 $this->load->view('temp/wrapper',$data);  
 } 
   
 public function page_ta() {
	 $kolom="kd_korwil"; $tabel="ms_korwil";
	 $data=array('title'=>'e-Monitoring | MSM Consultant - Tenaga Ahli',
	 'ta'=>$this->m_data->getTa(),	
	 'max'=>$this->m_data->getMaxSis($kolom,$tabel),	
	 'page' =>'aplikasi/v_ta'
	 );
	 $this->load->view('temp/wrapper',$data);  
 }
 
 public function ALLsistem(){
	$a=$this->input->post();
	$this->m_data->all_sistem($a);
	}
	
 public function allimpl(){
	$a=$this->input->post();
	$this->m_data->allimpl($a);
	}
	
 public function page_modul() {
	 $kolom="kd_modul"; $tabel="ms_modul";
	 $data=array('title'=>'e-Monitoring | MSM Consultant - Modul',
	 'sistem'=>$this->m_data->getSis(),	
	 'prop'=>$this->m_data->getArea(),	
	 'subarea'=>$this->m_data->getAreaSub(),	
	 'max'=>$this->m_data->getMaxSis($kolom,$tabel),	
	 'page' =>'aplikasi/v_modul'
	 );
	 $this->load->view('temp/wrapper',$data);  
 }

 public function dialog_modul(){
$a=$this->input->post();
	$this->m_modal->dialog_modul($a);
}
  
 public function page_modul_form() {
	 $kolom="kd_modul"; $tabel="ms_modul";
	 $kd_wilayah=$this->uri->segment(3);
	 $kd_area=$this->uri->segment(4);
	 $kd_subarea=$this->uri->segment(5);
	 $kd_sistem=$this->uri->segment(6);
	 $nm_sistem=$this->uri->segment(7);
	 $data=array('title'=>'e-Monitoring | MSM Consultant - Modul',
	 'modul'=>$this->m_data->getMod($kd_subarea,$kd_sistem),
	 'kode_wilayah'=>$kd_wilayah,
	 'kode_area'=>$kd_area,
	 'kode_subarea'=>$kd_subarea,
	 'kode_sistem'=>$kd_sistem,
	 'nm_sistem'=>$nm_sistem,
	 'max'=>$this->m_data->getMaxSis($kolom,$tabel),	
	 'page' =>'aplikasi/v_modul_form'
	 );
	 $this->load->view('temp/wrapper',$data);  
 }
 
 public function insert_modul_form(){
	 
 			$tb='ms_modul';
 			$submit='';
		 	$submit=$this->input->post('save');		 	
		 	$f=$this->input->post('f');	 	
			$kd_wilayah = $this->input->post('kode_wilayah');
			$kd_area = $this->input->post('kode_area');
			$kd_subarea = $this->input->post('kode_subarea');
			$kd_sistem = $this->input->post('kode_sistem');
			$nm_sistem = $this->input->post('nama_sistem');
			$sql=$this->db->query("select count(kd_modul) as maxi from ms_modul where kd_sistem='$kd_sistem' and kd_subarea='$kd_subarea'");
			$a= $sql->row();
			if(($a->maxi)=='0'){
			$id_modul= '0001';		
			}else{
			$id_modul= sprintf("%04d",($a->maxi)+1);
			}
			$id = $this->input->post('id_modul');
			$link_modul = $this->input->post('link_modul');
			$keterangan = $this->input->post('keterangan');
			//print_r($kd_wilayah."-".$kd_area."-".$kd_subarea); exit;
		 	$data =array(
				'kd_modul'=>htmlspecialchars($this->input->post('kode_modul'),ENT_QUOTES),
				'kd_wilayah'=>htmlspecialchars($this->input->post('kode_wilayah'),ENT_QUOTES),	
				'kd_area'=>htmlspecialchars($this->input->post('kode_area'),ENT_QUOTES),	
				'kd_subarea'=>htmlspecialchars($this->input->post('kode_subarea'),ENT_QUOTES),
				'kd_sistem'=>htmlspecialchars($this->input->post('kode_sistem'),ENT_QUOTES),	
				'id_modul'=>$this->input->post('kode_subarea').'.'.$this->input->post('kode_modul').'.'.$this->input->post('kode_sistem').'.'.$id_modul,
				'link_modul'=>htmlspecialchars($this->input->post('link_modul'),ENT_QUOTES),
				'thn_sistem'=>htmlspecialchars($this->input->post('thn_sistem'),ENT_QUOTES),	
				'cad'=>'',//htmlspecialchars($this->input->post('detail'),ENT_QUOTES),
				'keterangan'=>htmlspecialchars($this->input->post('keterangan'),ENT_QUOTES),
			);
			if(isset($submit)){
				switch($f){
				case 1;
					$a=$this->m_data->InData($tb,$data);
				break;
				case 2;					
					$a=$this->m_data->UpData($tb,'link_modul',$link_modul,'id_modul',$id);
				break;
			}
					
				 	$text='<div class="alert alert-success alert-dismissible" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <strong>Notif!</strong> Data berhasil disimpan.
				    </div>';
					$this->session->set_flashdata('notif', $text);
					redirect('app/page_modul_form/'.$kd_wilayah.'/'.$kd_area.'/'.$kd_subarea.'/'.$kd_sistem.'/'.$nm_sistem);   
		           
		    }else{

		    		$text='<div class="alert alert-warning alert-dismissible" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <strong>Notif!</strong> Data gagal disimpan.
				    </div>';
					$this->session->set_flashdata('notif', $text);
					redirect('app/page_modul_form/'.$kd_wilayah.'/'.$kd_area.'/'.$kd_subarea.'/'.$kd_sistem.'/'.$nm_sistem); 
		    }
	
}
 
 public function list_sistem(){
	$area=$this->input->post('area');
	$subarea=$this->input->post('subarea');
	$this->m_data->list_sistem($area,$subarea);
 }

 public function dialog_area(){
	$a=$this->input->post();
		$this->m_modal->dialog_area($a);
	}
 
 public function insert_area(){
 			$tb='ms_area';
 			$submit='';
		 	$submit=$this->input->post('save');		
		 	$f=$this->input->post('f');	 	
		 	$data =array(
				'kd_area'=>htmlspecialchars($this->input->post('kode_area'),ENT_QUOTES),
				'nm_area'=>htmlspecialchars($this->input->post('nama_area'),ENT_QUOTES),	
			);
			if(isset($submit)){
			switch($f){
				case 1;
					$a=$this->m_data->InData($tb,$data);
				break;
				case 2;					
					$a=$this->m_data->UpData($tb,'nm_area',$this->input->post('nama_area'),'kd_area',$this->input->post('kode_area'));
				break;
			}
				 	$text='<div class="alert alert-success alert-dismissible" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <strong>Notif!</strong> Data berhasil disimpan.
				    </div>';
					$this->session->set_flashdata('notif', $text);
					redirect('app/page_area');   
				
		           
		    }else{

		    		$text='<div class="alert alert-warning alert-dismissible" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <strong>Notif!</strong> Data gagal disimpan.
				    </div>';
					$this->session->set_flashdata('notif', $text);
					redirect('app/page_area'); 
		    }
	
}
 
 public function dialog_subarea(){
	$a=$this->input->post();
		$this->m_modal->dialog_subarea($a);
	}
 
 public function insert_subarea(){
 			$tb='ms_area_sub';
 			$submit='';
		 	$submit=$this->input->post('save');		
		 	$f=$this->input->post('f');	 	
		 	$data =array(
				'kd_area'=>htmlspecialchars($this->input->post('kode_area'),ENT_QUOTES),
				'kd_subarea'=>htmlspecialchars($this->input->post('kode_subarea'),ENT_QUOTES),	
				'nm_subarea'=>htmlspecialchars($this->input->post('nama_subarea'),ENT_QUOTES),	

			);
			if(isset($submit)){
			switch($f){
				case 1;
					$a=$this->m_data->InData($tb,$data);
				break;
				case 2;					
					$a=$this->m_data->UpData($tb,'nm_subarea',$this->input->post('nama_subarea'),'kd_subarea',$this->input->post('kode_subarea'));
				break;
			}
				 	$text='<div class="alert alert-success alert-dismissible" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <strong>Notif!</strong> Data berhasil disimpan.
				    </div>';
					$this->session->set_flashdata('notif', $text);
					redirect('app/page_subarea');   
				
		           
		    }else{

		    		$text='<div class="alert alert-warning alert-dismissible" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <strong>Notif!</strong> Data gagal disimpan.
				    </div>';
					$this->session->set_flashdata('notif', $text);
					redirect('app/page_subarea'); 
		    }
	
} 

 public function dialog_sistem(){
	$a=$this->input->post();
		$this->m_modal->dialog_sistem($a);
	}
	
 public function insert_sistem(){
	 
 			$tb='ms_sistem';
 			$submit='';
		 	$submit=$this->input->post('save');		 	
		 	$f=$this->input->post('f');	 	
		 	$data =array(
				'kd_sistem'=>htmlspecialchars($this->input->post('kode_sistem'),ENT_QUOTES),
				'nm_sistem'=>htmlspecialchars($this->input->post('nama_sistem'),ENT_QUOTES),	
				'detail'=>htmlspecialchars($this->input->post('detail'),ENT_QUOTES),	
			);
			if(isset($submit)){
			switch($f){
				case 1;
					$a=$this->m_data->InData($tb,$data);
				break;
				case 2;					
					$a=$this->m_data->UpData($tb,'nm_sistem',$this->input->post('nama_sistem'),'kd_sistem',$this->input->post('kode_sistem'));
				break;
			}
				
				 	$text='<div class="alert alert-success alert-dismissible" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <strong>Notif!</strong> Data berhasil disimpan.
				    </div>';
					$this->session->set_flashdata('notif', $text);
					redirect('app/page_sistem');   
				
		           
		    }else{

		    		$text='<div class="alert alert-warning alert-dismissible" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <strong>Notif!</strong> Data gagal disimpan.
				    </div>';
					$this->session->set_flashdata('notif', $text);
					redirect('app/page_sistem'); 
		    }
	
}

 public function dialog_ta(){
	$a=$this->input->post();
	$this->m_modal->dialog_ta($a);
	}
	
 public function insert_ta(){
	 
 			$tb='ms_korwil';
 			$submit='';
		 	$submit=$this->input->post('save');		 	
		 	$f=$this->input->post('f');	 	
			$a = $this->input->post('list_daerah');
			$ax= str_ireplace(',',"','",$a);
		 	$data =array(
				'kd_korwil'=>htmlspecialchars($this->input->post('kode_ta'),ENT_QUOTES),
				'nm_korwil'=>htmlspecialchars($this->input->post('nama_ta'),ENT_QUOTES),	
				'email_korwil'=>htmlspecialchars($this->input->post('email_ta'),ENT_QUOTES),
				'contact_korwil'=>htmlspecialchars($this->input->post('contact_ta'),ENT_QUOTES),
				'kd_area'=>"'".$ax."'",//htmlspecialchars($this->input->post('list_daerah'),ENT_QUOTES),
				'id_korwil'=>"",	
			);
			if(isset($submit)){
			switch($f){
				case 1;
					$a=$this->m_data->InData($tb,$data);
				break;
				case 2;					
					$a=$this->m_data->UpTa($tb,'nm_sistem',$this->input->post('nama_sistem'),'kd_sistem',$this->input->post('kode_sistem'));
				break;
			}
				
				 	$text='<div class="alert alert-success alert-dismissible" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <strong>Notif!</strong> Data berhasil disimpan.
				    </div>';
					$this->session->set_flashdata('notif', $text);
					redirect('app/page_ta');   
				
		           
		    }else{

		    		$text='<div class="alert alert-warning alert-dismissible" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <strong>Notif!</strong> Data gagal disimpan.
				    </div>';
					$this->session->set_flashdata('notif', $text);
					redirect('app/page_ta'); 
		    }
	
}
 
 public function page_monitoring() {
	 $kolom="kd_monitor";$tabel="e_monitor";
	 $data=array('title'=>'e-Monitoring | MSM Consultant - Monitoring & Data',
	 'prop'=>$this->m_data->getArea(),
	 'sistem'=>$this->m_data->getSis(),
	 'max'=>$this->m_data->getMaxSis($kolom,$tabel),
	 'page' =>'aplikasi/v_monitoring'
	 );
	 $this->load->view('temp/wrapper',$data);  
 }

 public function insert_monitoring(){
			$tb='e_monitor';
 			$submit='';
		 	$submit=$this->input->post('save');		 
 			$username=$this->session->userdata('username');	
			$ekd = explode('#',$this->input->post('kode_sistem'));
			$kd_wilayah = $ekd[0];
			$kd_sistem = $ekd[1];
 			$now= date('Y-m-d H:i:s');	
		 	$data =array(
				'kd_monitor'=>htmlspecialchars($this->input->post('kode_monitor'),ENT_QUOTES),
				'kd_wilayah'=>$kd_wilayah,
				'kd_area'=>htmlspecialchars($this->input->post('kode_prop'),ENT_QUOTES),
				'kd_subarea'=>htmlspecialchars($this->input->post('kode_kab'),ENT_QUOTES),
				'kd_sistem'=>$kd_sistem,
				'bulan'=>htmlspecialchars($this->input->post('bulan'),ENT_QUOTES),
				'tahun'=>htmlspecialchars($this->input->post('tahun'),ENT_QUOTES),
				'tgl_terima'=>htmlspecialchars($this->input->post('tgl_terima'),ENT_QUOTES),
				'via_pengiriman'=>htmlspecialchars($this->input->post('radio'),ENT_QUOTES),
				'jenis_data'=>htmlspecialchars($this->input->post('jns_data'),ENT_QUOTES),
				'kapasitas'=>htmlspecialchars($this->input->post('kapasitas'),ENT_QUOTES),
				'status'=>0,
				'keterangan'=>htmlspecialchars($this->input->post('keterangan'),ENT_QUOTES),
				'username'=>$username,
				'input_time'=>$now,
			);
			if(isset($submit)){
					$a=$this->m_data->InData($tb,$data);
				
				 	$text='<div class="alert alert-success alert-dismissible" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <strong>Notif!</strong> Data berhasil disimpan.
				    </div>';
					$this->session->set_flashdata('notif', $text);
					redirect('app/page_monitoring');   
				
		           
		    }else{

		    		$text='<div class="alert alert-warning alert-dismissible" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <strong>Notif!</strong> Data gagal disimpan.
				    </div>';
					$this->session->set_flashdata('notif', $text);
					redirect('app/page_monitoring'); 
		    }
	
	}
 
 public function page_request() {
	 $data=array('title'=>'e-Monitoring | MSM Consultant - Request',
	 'page' =>'aplikasi/v_request'
	 );
	 $this->load->view('temp/wrapper',$data);  
 }	

 public function page_tracking_monitor(){
	 $data=array('title'=>'e-Monitoring | MSM Consultant - Request',
	 'page' =>'aplikasi/v_tracking_monitor'
	 );
	 $this->load->view('temp/wrapper',$data);  
 } 
 
 public function track(){
	$this->m_data->track();
}

 public function uptrack(){
			$date	=date('Y-m-d H:i:s');
			$kode	=$_GET['value'];
			$area	=$_GET['kd_subarea'];
			$sistem	=$_GET['kd_sistem'];
			$this->m_data->uptrack($kode,$area,$sistem);
}

 public function vdetail_track(){
 	$fitur="";
 	$note="";
 	$kd_subarea=$_GET['subarea'];
 	$kd_sistem=$_GET['sistem'];
 	$bulan=$_GET['bulan'];
 	$tahun=$_GET['tahun'];
 	$query=$this->db->query("
		select a.kd_monitor,b.nm_area,upper(c.nm_subarea) as nm_subarea,
		e.nm_sistem,d.nama_pic,d.cp_pic,a.bulan,a.tahun,
		a.tgl_terima,a.via_pengiriman,a.jenis_data,a.kapasitas,a.status
		 
		from e_monitor a 
		join ms_area b on a.kd_area=b.kd_area
		join ms_area_sub c on a.kd_area=c.kd_area and a.kd_subarea=c.kd_subarea
		join ms_wilayah d on a.kd_wilayah=d.kd_wilayah and a.kd_area=d.kd_area and a.kd_subarea=d.kd_subarea
		join ms_wilayah_child e on a.kd_wilayah=e.kd_wilayah and a.kd_area=e.kd_area and a.kd_subarea=e.kd_subarea and a.kd_sistem=e.kd_sistem
		where a.kd_subarea='$kd_subarea' and a.kd_sistem='$kd_sistem' and a.bulan='$bulan' and a.tahun='$tahun'");
 		$row=$query->row_array();
		  if($row['jenis_data']==''){
 			$note="<tr><td colspan='3' style='width:30%'><font style='color:red'>*Catatan:  Mohon menghubungi PIC yang bersangkutan untuk mengirim data dan aplikasi perbulan </font></td>
				   </tr>";
 		}
		
		if($row['status']=='0'){
			$status = "Belum di Backup";
		}else{
			$status = "Sudah di Backup";
		}
		
		if($row['via_pengiriman']=='1'){
			$via = "E-mail";
		}else{
			$via = "CD/DVD";
		}
		$tgl = $this->m_data->TanggalIndo($row['tgl_terima']);
		$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

 	$vdet ="
 			<legend> Detail Tracking | Kode Tracking ".$row['kd_monitor']." </legend>
 			<table style='width:100%;border:none'>
 				<tr><td style='width:30%'>Nama Sistem</td><td>:</td>
				<td>".$row['nm_sistem']."</td></tr>
				<tr><td style='width:30%'>Area</td><td>:</td>
				<td>".$row['nm_area']." | ".$row['nm_subarea']."</td></tr>
 				<tr><td style='width:30%'>Nama PIC</td><td>:</td>
				<td>".$row['nama_pic']."</td></tr>
 				<tr><td style='width:30%'>Contact PIC</td><td>:</td>
				<td>".$row['cp_pic']."</td></tr>
				<tr><td style='width:30%'>Bulan & Tahun Kirim</td><td>:</td>
				<td>".$BulanIndo[(int)$row['bulan']+1]."  ".$row['tahun']."</td></tr>
				<tr><td style='width:30%'>Tanggal diterima</td><td>:</td>
				<td>".$tgl."</td></tr>
				<tr><td style='width:30%'>Via Pengiriman</td><td>:</td>
				<td>".$via."</td></tr>
				<tr><td style='width:30%'>Jenis Data</td><td>:</td>
				<td>".$row['jenis_data']."</td></tr>
				<tr><td style='width:30%'>Kapasitas</td><td>:</td>
				<td>".$row['kapasitas']." Mb</td></tr>
				<tr><td style='width:30%'>Status</td><td>:</td>
				<td>".$status."</td></tr>
				".$note."
			</table>";
 	echo $vdet;
 }

 public function vdetailcr(){
 	$fitur="";
 	$note="";
 	$kd_request=$_GET['pk'];
 	$kd_area=$_GET['area'];
 	$kd_subarea=$_GET['subarea'];
	
 	$query=$this->db->query("
		select a.kd_request,a.kd_area,a.kd_subarea,c.nm_sistem,b.nm_area,a.ket_modul,e.link_modul,a.uraian,
		b.nama_pic,b.cp_pic,a.tgl_request,a.tgl_selesai,d.nm_korwil,a.status_cr,
		d.contact_korwil,d.email_korwil
		from e_request a
		join ms_wilayah b on a.kd_area=b.kd_area and a.kd_subarea=b.kd_subarea
		join ms_wilayah_child c on b.kd_wilayah=c.kd_wilayah and a.kd_area=c.kd_area and a.kd_subarea=c.kd_subarea and a.kd_sistem=c.kd_sistem
		left join ms_modul e on a.kd_area=e.kd_area and a.kd_subarea=e.kd_subarea and a.kd_sistem=e.kd_sistem  and a.kd_modul=e.kd_modul
		left join ms_korwil d on a.kd_korwil=d.kd_korwil  
		where a.kd_area='$kd_area' 
		and a.kd_subarea='$kd_subarea' 
		and a.kd_request='$kd_request'");
 		$row=$query->row_array();
		  if($row['nm_korwil']==''){
 			$note="<tr><td colspan='3' style='width:30%'><font style='color:red'>*Catatan:  Mohon segera mengisi Tenaga Ahli yang bersangkutan agar bisa segera dibantu.[Adm] </font></td>
				   </tr>";
 		}
		  if($row['ket_modul']!=''){
 			$ket_modul="<tr><td style='width:30%'>Keterangan Modul</td><td>:</td>
				<td>".$row['ket_modul']."</td></tr>";
 		}
		 if($row['link_modul']!=''){
 			$link_modul="<tr><td style='width:30%'>Link Modul</td><td>:</td>
				<td>".$row['link_modul']."</td></tr>";
 		}
		
		 if($row['status_cr']==0){
			$status = "Belum ada progress";
		}elseif($row['status_cr']==1){
			$status = "On Going";
		}else{
			$status = "Selesai";
		}
		
		$tgl = $this->m_data->TanggalIndo($row['tgl_terima']);
		$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

 	$vdet ="
 			<legend> Detail Change Request | Kode ".$row['kd_request']." </legend>
 			<table style='width:100%;border:none'>
				<tr><td style='width:30%'>Area</td><td>:</td>
				<td>".$row['nm_area']."</td></tr>
 				<tr><td style='width:30%'>Nama Sistem</td><td>:</td>
				<td>".$row['nm_sistem']."</td></tr>
				".$link_modul."
				".$ket_modul."
 				<tr><td style='width:30%'>Uraian</td><td>:</td>
				<td>".$row['uraian']."</td></tr>
 				<tr><td style='width:30%'>Nama PIC</td><td>:</td>
				<td>".$row['nama_pic']."</td></tr>
 				<tr><td style='width:30%'>Contact PIC</td><td>:</td>
				<td>".$row['cp_pic']."</td></tr>
				<tr><td style='width:30%'>Tanggal CR</td><td>:</td>
				<td>".$row['tgl_request']."</td></tr>
				<tr><td style='width:30%'>Estimasi Selesai</td><td>:</td>
				<td>".$row['tgl_selesai']."</td></tr>
				<tr><td style='width:30%'>Tenaga Ahli</td><td>:</td>
				<td>".$row['nm_korwil']."</td></tr>
				<tr><td style='width:30%'>CP/E-mail Tenaga Ahli</td><td>:</td>
				<td>".$row['contact_korwil'].' / '.$row['email_korwil']."</td></tr>
				<tr><td style='width:30%'>Status Pengerjaan</td><td>:</td>
				<td>".$status."</td>".$note."
			</table>";
 	echo $vdet;
 }
 
 public function page_cr() {
 	 $oto=$this->session->userdata('oto');
 	 $kd_area	 =$this->session->userdata('kd_area');
 	 $kd_subarea =$this->session->userdata('kd_subarea');
	 $data=array('title'=>'e-Monitoring | MSM Consultant - Change Request',
	 'listcr'=>$this->m_data->getCr(),
	 'oto'=> $oto,
	 'nm_area'=> $this->m_data->nmarea($kd_subarea),//$this->m_data->nmarea($kd_subarea),
	 'page' =>'aplikasi/v_cr'
	 );
	 $this->load->view('temp/wrapper',$data);  
 }
 
 public function page_cr_form() {
	
	 $kolom="kd_wilayah"; $tabel="ms_wilayah";
	 $data=array(
	 'title'=>'e-Monitoring | MSM Consultant - Form Change Request',
	 'prop'=>$this->m_data->getArea(),	
	 'proyek'=>$this->m_data->getProyek(),
	 'kab'=>$this->m_data->getAreaSub(),	
	 'sistem'=>$this->m_data->getSis(),
	 'page' =>'aplikasi/v_cr_form'
	 ); 
	 $this->load->view('temp/wrapper',$data); 
 }

 public function maxcr(){
		$kd_area    = htmlspecialchars($this->input->post('kd_area'),ENT_QUOTES);
		$kd_subarea = htmlspecialchars($this->input->post('kd_subarea'),ENT_QUOTES);
		$query1=$this->db->query("select coalesce(max(no_urut),'0') as maxi from e_request where kd_area='$kd_area' and kd_subarea='$kd_subarea'")->row();
        echo sprintf("%04d",$query1->maxi+1);
    	$query1->free_result();   
}

 public function loadnmsubarea(){
	$kd_subarea = htmlspecialchars($this->input->post('kd_subarea'),ENT_QUOTES);
	$query="select nm_subarea from ms_area_sub where kd_subarea='$kd_subarea'";
	$q= $this->db->query($query)->row();
	echo $q->nm_subarea;
}

 public function insert_request(){
	$tb='e_request';
	$username=$this->session->userdata('iduser');
	$kd_wilayah = substr($this->input->post('kode_sistem'),0,1);
	$kd_kab		= $this->input->post('kode_kab');
	$kd_sistem  = $this->input->post('kode_sistem_cr');
	$submit=$this->input->post('save');		 
	$maxid=$this->input->post('no_urut_cr');
			if(isset($submit)){
			$filename = $_FILES["userfile"]["name"];
					$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
					$file_ext = substr($filename, strripos($filename, '.')); // get file name
					// Rename file
			   if($filename ==''){
			   	$newfilename='';
			   }else{
					$newfilename = $kd_kab."_".$kd_sistem."_".$maxid.$file_ext;
			   }
			   $file =  array(
                  'file_name'       => $newfilename,
                  'upload_path'     => "./screenshoot",
                  'allowed_types'   => "|jpg|jpeg",
                  'overwrite'       => TRUE,
                  'max_size'        => "5242880",  // Can be set to particular file size
                  'max_height'      => "2000",
                  'max_width'       => "2000"  
                );
			   $data =array(
					'kd_request'=>$this->input->post('no_urut_cr').'/'.$this->input->post('kode_subarea_cr').'/'.$this->input->post('kode_sistem_cr').'/'.$this->input->post('kode_proyek_cr'),
					'kd_wilayah'=>$kd_wilayah,
					'kd_area'=>$this->input->post('kode_prop'),
					'kd_subarea'=>$this->input->post('kode_kab'),
					'kd_sistem'=>$this->input->post('kode_sistem_cr'),
					'kd_proyek'=>$this->input->post('kode_proyek_cr'),	
					'kd_modul'=>$this->input->post('cmodul'),			
					'jns_request'=>$this->input->post('radio'),
					'ket_modul'=>$this->input->post('ketfitur'),
					'tgl_request'=>$this->input->post('tgl_request'),
					'prioritas'=>$this->input->post('prioritas'),
					'uraian'=>$this->input->post('uraian'),
					'gambar'=>$newfilename,
					'username'=>$username,
					'tgl_input'=>date('Y-m-d h:i:s'),
					'no_urut'=>$this->input->post('no_urut_cr'),
					'kd_korwil'=>'',
					'status_cr'=>0,
					'tgl_selesai'=>$this->input->post('tgl_request_estimate')
					);

			   if($filename ==''){

			   		 	$a=$this->m_data->InData($tb,$data);

						$text='<div class="alert alert-success alert-dismissible" role="alert">
					    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <strong>Notif!</strong> Data berhasil diinput.
					    </div>';
						$this->session->set_flashdata('notif', $text);
						redirect('app/page_cr','refresh');
			   }else{
					   	$this->load->library('upload', $file);
						if($this->upload->do_upload())
						{
						    $a=$this->m_data->InData($tb,$data);
							
							$text='<div class="alert alert-success alert-dismissible" role="alert">
						    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <strong>Notif!</strong> Data berhasil diinput.
						    </div>';
							$this->session->set_flashdata('notif', $text);
							redirect('app/page_cr','refresh');	
						}
						else
						{
							$t= $this->upload->display_errors();
							$text='<div class="alert alert-warning alert-dismissible" role="alert">
							    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <strong>Notif!</strong>'.$t.'
							    </div>';
							$this->session->set_flashdata('notif', $text);
							redirect('app/page_cr','refresh');			           
				   		 }

			   }
			   
 			}
}	

 public function crtrack(){
	$this->m_data->crtrack();
}

/*  public function addta() {
		$oto = $this->session->userdata('oto');
        $sql = $this->db->query("SELECT kd_korwil as value, nm_korwil as text from ms_korwil");
        $result = $sql->result();
        echo json_encode($result);
      
 	} */
 
  public function addta() {
		$oto = $this->session->userdata('oto');
		$kd_area = $this->session->userdata('kd_area');
		if($oto=='3'){
        $sql = $this->db->query("SELECT a.kd_korwil as value, a.nm_korwil as text from ms_korwil a join ms_user b on a.id_korwil=b.id_user where b.keterangan like '%$kd_area%'");
		}else{
        $sql = $this->db->query("SELECT kd_korwil as value, nm_korwil as text from ms_korwil");
		}
        $result = $sql->result();
        echo json_encode($result);
      
 	}
 
 public function upta(){
			$id=$this->input->post('pk');
			$user=$this->input->post('value');
			$this->m_data->upta($id,$user);
 	}

 public function upstatcr() {
	 
		$date	=date('Y-m-d H:i:s');
		$kd_request	=$this->input->post('pk');
		$area	=$this->input->post('subarea');
		$status	=$this->input->post('value');
		$q=$this->db->query("update e_request set status_cr='$status' where kd_request='$kd_request'");
		if($q){
			if($status=='2'){
			$this->m_data->sendwil($kd_request);}
		}
 	}	
	
 public function upstatuser() {
		 	
			$id=$this->input->post('pk');
			$status=$this->input->post('value');
			$this->m_data->upstatuser($id,$status);
			
 	}//end upstat User

 public function logout() {
               $this->session->sess_destroy();
               redirect('monitor');
  } //end logout

 public function list_modul(){

  	if(isset($_POST['kd_sistem']))
		{
		$kd_sistem	=$_POST['kd_sistem'];
		$kd_subarea	= $_POST['kd_subarea'];
			$op ="<option selected value=''>Pilih Menu/Modul</option>";
			$query = $this->db->query("SELECT * FROM ms_modul where kd_sistem='$kd_sistem' and kd_subarea='$kd_subarea' order by kd_modul "); //
			foreach($query->result_array() as $d){
				if($d['link_modul']!=''){
					$s=' | URL :  ';
				}
		    	
		        $op .="<option value=".$d['kd_modul'].">".ucwords(strtoupper($d['kd_sistem'])).$s.$d['link_modul']."</option>";
		   
		    }

		    echo $op;

		}
		else{
			echo '<option>Tidak Ada Modul</option>';
		}
  	
	
	}//end list modul
	
 public function list_wilayah(){

  	if(isset($_POST['prop']))
		{
		$prop=$_POST['prop'];

			$op ="<option selected value=''>--Pilih Kab/Kota--</option>";
			$query = $this->db->query("SELECT * FROM ms_kabupaten where id_prop='$prop' order by id_kabupaten_kota ");
			foreach($query->result_array() as $d){
		        $op .="<option value=".$d['id_kabupaten_kota'].">".$d['id_kabupaten_kota']." | ".ucwords(strtolower($d['deskripsi_kabupaten_kota']))."</option>";
		   
		    }

		    echo $op;

		}
		else{
			echo '<option>kosong</option>';
		}
	}
	
 public function list_area(){

  	if(isset($_POST['kd_area']))
		{
		$kd_area=$_POST['kd_area'];

			$op ="<option selected value=''>--Pilih Sub Area--</option>";
			$query = $this->db->query("SELECT * FROM ms_area_sub where kd_area='$kd_area' order by kd_subarea ");
			foreach($query->result_array() as $d){
		        $op .="<option value=".$d['kd_subarea'].">".$d['kd_subarea']." | ".ucwords(strtolower($d['nm_subarea']))."</option>";
		   
		    }

		    echo $op;

		}
		else{
			echo '<option>kosong</option>';
		}
	}
	
 public function list_area_wilayah(){
  	if(isset($_POST['kd_area']))
		{
		$kd_area=$_POST['kd_area'];

			$op ="<option selected value=''>--Pilih Sub Area--</option>";
			$query = $this->db->query("SELECT * FROM ms_area_sub where kd_area='$kd_area' order by kd_subarea ");
			foreach($query->result_array() as $d){
		        $op .="<option value=".$d['kd_subarea']." > ".$d['kd_subarea']." | ".ucwords(strtolower($d['nm_subarea']))."</option>";
		   
		    }
		    echo $op;

		}
		else{
			echo '<option>kosong</option>';
		}
	}
	
 public function list_sistem_monitor(){
  	if(isset($_POST['kd_area']))
		{
		$kd_area=$_POST['kd_area'];
		$kd_subarea=$_POST['kd_subarea'];
			$op ="<option selected value=''>--Pilih Sistem--</option>";
			$query = $this->db->query("SELECT * FROM ms_wilayah_child where kd_area='$kd_area' and kd_subarea='$kd_subarea' order by kd_sistem ");
			foreach($query->result_array() as $d){
		        $op .="<option value=".$d['kd_wilayah'].'#'.$d['kd_sistem'].">".$d['kd_sistem']." | ".ucwords(strtolower($d['nm_sistem']))."</option>";
		   
		    }

		    echo $op;

		}
		else{
			echo '<option>kosong</option>';
		}
	}
	
 public function chart1(){
	/* $wil='';
	$done='';
	$ongoing=''; */

		//$where = "WHERE list_system LIKE '%sys%'";
	  /*   $query = $this->db->query("
	    	SELECT a.kd_wilayah, a.alias AS wilayah,  
			(SELECT COUNT(id) FROM ms_req b WHERE b.kd_wilayah =a.kd_wilayah AND b.statusver = '2') AS selesai,
			(SELECT COUNT(id) FROM ms_req b WHERE b.kd_wilayah =a.kd_wilayah AND b.statusver <> '2') AS ongoing
			FROM  ms_wilayah a 
			ORDER BY kd_wilayah"); */
		  $query = $this->db->query("
	    	SELECT '' as kd_wilayah, '' as alias AS wilayah,'' AS selesai,'' AS ongoing
			FROM ms_wilayah ");	
// $result = $query->result();

	    	$main_array = array();

	    	$data_wilayah = array();
	    	foreach($query->result_array() as $resulte){
		    	/*$data[] = array(
		    		'wilayah' => $resulte['wilayah']
	    		);*/
				array_push($data_wilayah, $resulte['wilayah']);
	    	}

	    	array_push($main_array, $data_wilayah);


	    	$data_selesai = array();
	    	foreach($query->result_array() as $resulte){
		    	/*$data[] = array(
		    		'wilayah' => $resulte['wilayah']
	    		);*/
				array_push($data_selesai, $resulte['selesai']);
	    	}

	    	array_push($main_array, $data_selesai);


	    	$data_ongoing = array();
	    	foreach($query->result_array() as $resulte){
		    	/*$data[] = array(
		    		'wilayah' => $resulte['wilayah']
	    		);*/
				array_push($data_ongoing, $resulte['ongoing']);
	    	}

	    	array_push($main_array, $data_ongoing);



	    	/*echo "<pre>";
	    	print_r($main_array);
	    	echo "</pre>";*/


        echo json_encode($main_array);
	   
    
    

}//end chart1
/***************************LAPORAN*******************************/
 public function lapmonitoring() {
	 $data=array('title'=>'e-Monitoring | MSM Consultant - Laporan Monitoring',
	 'page' =>'aplikasi/v_lapmonitoring',
	 'wilayah'=>$this->m_data->getWilArr()
	 );
	 $this->load->view('temp/wrapper',$data);  
 }

 public function lapcr() {
	 $data=array('title'=>'e-Monitoring | MSM Consultant - Laporan Monitoring',
	 'page' =>'aplikasi/v_lapcr',
	 'prop'=>$this->m_data->getArea(),	
	 'subarea'=>$this->m_data->getAreaSub(),	
	 );
	 $this->load->view('temp/wrapper',$data);  
 }
 
 public function vlapcr(){
		$area=$this->input->post('area');
		$subarea=$this->input->post('subarea');
		$tahun=$this->input->post('tahun');
		$bulan=$this->input->post('bulan');
		
		$where1="";$where2="";$where3="";$where4="";
		if($area!=''){
		$where1="and a.kd_area='$area'";
		}if($subarea!=''){
		$where2="and a.kd_subarea='$subarea'";
		}if($tahun!=''){
		$where3="and EXTRACT(YEAR FROM a.tgl_request)='$tahun'";
		}if($bulan!=''){
		$where4="and EXTRACT(MONTH FROM a.tgl_request)='$bulan'";
		}
		$query=$this->db->query("
         select a.kd_area,a.kd_subarea,b.nm_subarea,c.nm_sistem,a.tgl_request,
				(case 
				when a.jns_request='1' THEN 'Permasalahan'
				when a.jns_request='2' THEN 'Penambahan Fitur'
				else 'Penambahan modul'
				end
				) as jns_request,a.uraian,a.tgl_selesai,a.kd_korwil,

				(case 
				when a.status_cr='' THEN 'Belum Diproses'
				when a.status_cr='0' THEN 'Proses'
				else 'Selesai'
				end
				) as status_cr
				from e_request a
				join ms_area_sub b on a.kd_subarea=b.kd_subarea and a.kd_area=b.kd_area
				join ms_sistem c on a.kd_sistem=c.kd_sistem
				$where1 $where2 $where3 $where4
				ORDER BY a.kd_area");
	
	if($query->num_rows() >0 ){
      $tabel ="<div class='pull-right'>
                   <a target='_blank' href='".base_url()."app/lap_pdfcr?area=$area&subarea=$subarea&tahun=$tahun&bulan=$bulan'  class='btn btn-xs  btn-default'>
                   <span>&nbsp;<i class='icon-print'></i>&nbsp;</span>
                   Print to PDF</a>

                   </div><br><br>

                  <table style='font-size:11px;' style='display:none' 
                   class='table table-bordered table-striped table-hover table-heading table-datatable' id='datatable-4'>
                        <thead style='background-color: #e5e5e5;'>
                          <tr>
                            <th>No</th>
                            <th>Nama Daerah</th>
                            <th>Nama Sistem</th>
                            <th>Tanggal CR</th>
                            <th>Jenis CR</th>
                            <th>Uraian CR</th>
                            <th>Tanggal Estimasi <br> Permohonan CR</th>
                            <th>Tenaga Ahli</th>
                            <th>Status Pengerjaan</th>
                          </tr>
                        </thead>
                        <tbody>";

		$i=1;
          foreach($query->result_array() as $resulte)
        {
       
			$kd=$resulte['kd_area'];
			if($resulte['kd_korwil']!=''){
				$k = $this->db->query("select nm_korwil from ms_korwil where kd_korwil='".$resulte['kd_korwil']."'");
			}else{
				$k = $this->db->query("select nm_lengkap as nm_korwil from ms_user where keterangan like '%$kd%'");
			}
			$korwil=$k->row_array();
			$tabel .="<tr>
                      <td>".$i."</td>
                      <td>".$resulte['nm_subarea']."</td>
                      <td>".$resulte['nm_sistem']."</td>
                      <td>".$this->TanggalIndo($resulte['tgl_request'])."</td>";
            $tabel .="<td>".$resulte['jns_request']."</td>";
            $tabel .="<td>".$resulte['uraian']."</td>";
            $tabel .="<td>".$this->TanggalIndo($resulte['tgl_selesai'])."</td>";
            $tabel .="<td>".$korwil['nm_korwil']."</td>";
            $tabel .="<td>".$resulte['status_cr']."</td>
       

            </tr>";
            $i++;
         }
            $tabel .= "</tbody>
               </table>";
    

       echo $tabel;
       }else{
        echo "<center> <h5>Tidak ada Change Request dengan kriteria filter, periksa kembali pilihan filter diatas..!</h5> </center>";
      }

	}
	
 public function lap_pdfcr() {
		$this->load->library('pdfgenerator');
		$area=$this->input->get('area');
		$subarea=$this->input->get('subarea');
		$tahun=$this->input->get('tahun');
		$bulan=$this->input->get('bulan');
		
		$where1="";$where2="";$where3="";$where4="";
		if($area!=''){
		$where1="and a.kd_area='$area'";
		}if($subarea!=''){
		$where2="and a.kd_subarea='$subarea'";
		}if($tahun!=''){
		$where3="and EXTRACT(YEAR FROM a.tgl_request)='$tahun'";
		}if($bulan!=''){
		$where4="and EXTRACT(MONTH FROM a.tgl_request)='$bulan'";
		} 
	 	$query=$this->db->query("
         select a.kd_area,a.kd_subarea,b.nm_subarea,c.nm_sistem,a.tgl_request,
				(case 
				when a.jns_request='1' THEN 'Permasalahan'
				when a.jns_request='2' THEN 'Penambahan Fitur'
				else 'Penambahan modul'
				end
				) as jns_request,a.uraian,a.tgl_selesai,a.kd_korwil,

				(case 
				when a.status_cr='' THEN 'Belum Diproses'
				when a.status_cr='0' THEN 'Proses'
				else 'Selesai'
				end
				) as status_cr
				from e_request a
				join ms_area_sub b on a.kd_subarea=b.kd_subarea and a.kd_area=b.kd_area
				join ms_sistem c on a.kd_sistem=c.kd_sistem
				$where1 $where2 $where3 $where4
				ORDER BY a.kd_area");
				
				
		$data=array('title'=>'e-Monitoring | MSM Consultant - Cetak PDF Laporan Change Request',
		 'q'=>$query,
		 'aa'=>$aa,
		 'bb'=>$subarea
		 );
			$html = $this->load->view('laporan/lap_cr', $data, true);
			$this->pdfgenerator->generate($html,'rekap_cr'); 
				
 }	
 	
 public function laprequest() {
	 $data=array('title'=>'e-Monitoring | MSM Consultant - Laporan Request',
	 'page' =>'aplikasi/v_laprequest',
	 'wilayah'=>$this->m_data->getWilArr()
	 );
	 $this->load->view('temp/wrapper',$data);  
 }

 public function pdfmon() {
	$this->load->library('pdfgenerator');
	$kdwil='';
 	$kdsys='';
	$kdwil=$this->uri->segment(3);
	$kdsys=$this->uri->segment(4);
	$query=$this->db->query("SELECT a.id, upper(a.title) AS Menu, a.url,a.LEVEL,a.parent_id,a.kd_wilayah,a.kd_sistem, a.last_update,b.kd_system, b.nm_system AS nmsys,c.nm_wilayah AS nmwil FROM ms_menu a INNER JOIN ms_system b ON a.kd_sistem = b.kd_system 
		INNER JOIN ms_wilayah c ON a.kd_wilayah = c.kd_wilayah WHERE a.kd_sistem = '$kdsys' AND c.kd_wilayah ='$kdwil' AND LEVEL='1'
		UNION ALL
		SELECT a.id, upper(a.title) AS Menu, a.url,a.LEVEL,a.parent_id,a.kd_wilayah,a.kd_sistem, 
		a.last_update,b.kd_system, b.nm_system AS nmsys,c.nm_wilayah AS nmwil FROM ms_menu a INNER JOIN ms_system b ON a.kd_sistem = b.kd_system 
		INNER JOIN ms_wilayah c ON a.kd_wilayah = c.kd_wilayah WHERE a.kd_sistem = '$kdsys' AND c.kd_wilayah ='$kdwil' AND LEVEL='2'
		UNION ALL
		SELECT a.id, upper(a.title) AS Menu, a.url,a.LEVEL,a.parent_id,a.kd_wilayah,a.kd_sistem, 
		a.last_update,b.kd_system, b.nm_system AS nmsys,c.nm_wilayah AS nmwil FROM ms_menu a INNER JOIN ms_system b ON a.kd_sistem = b.kd_system 
		INNER JOIN ms_wilayah c ON a.kd_wilayah = c.kd_wilayah WHERE a.kd_sistem = '$kdsys' AND c.kd_wilayah ='$kdwil' AND LEVEL='3'
		UNION ALL
		SELECT a.id, upper(a.title) AS Menu, a.url,a.LEVEL,a.parent_id,a.kd_wilayah,a.kd_sistem, 
		a.last_update,b.kd_system, b.nm_system AS nmsys,c.nm_wilayah AS nmwil FROM ms_menu a INNER JOIN ms_system b ON a.kd_sistem = b.kd_system 
		INNER JOIN ms_wilayah c ON a.kd_wilayah = c.kd_wilayah WHERE a.kd_sistem = '$kdsys' AND c.kd_wilayah ='$kdwil' AND LEVEL='4'
		ORDER BY id");
	 $data=array('title'=>'e-Monitoring | MSM Consultant - Cetak PDF Laporan monitoring',
	 'q'=>$query
	 );
	    $html = $this->load->view('laporan/lap_mon', $data, true);
	    $this->pdfgenerator->generate($html,'monpdf'); 
 }

 public function conv_bulan($bulan){
switch ($bulan){
case 1: return "Januari"; break;
case 2: return "Februari"; break;
case 3: return "Maret"; break;
case 4: return "April"; break;
case 5: return "Mei"; break;
case 6: return "Juni"; break;
case 7: return "Juli"; break;
case 8: return "Agustus"; break;
case 9: return "September";break;
case 10: return "Oktober"; break;
case 11: return "November"; break;
case 12: return "Desember"; break;
}
}//end conv_bulan

 public function conv_hari($hari){
switch ($hari){
case "Sunday"	: return "Minggu"; break;
case "Monday"	: return "Senin"; break;
case "Tuesday"	: return "Selasa"; break;
case "Wednesday": return "Rabu"; break;
case "Thursday"	: return "Kamis"; break;
case "Friday"	: return "Jum'at"; break;
case "Saturday"	: return "Sabtu"; break;

}
}//end conv_hari
	public function TanggalIndo($date){
		$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

		$tahun = substr($date, 0, 4);
		$bulan = substr($date, 5, 2);
		$tgl   = substr($date, 8, 2);

		$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;		
		return($result);
	}
}/* End of file app.php
/* Location: ./application/controllers/app.php */