<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

    class M_modal extends CI_Model {
        public function __construct() {
            parent::__construct();
        }

/********AREA*******/				
public function dialog_area($post){
	
	$kode	= htmlspecialchars($post['kode'], ENT_QUOTES);
	$nama	= htmlspecialchars($post['nama'], ENT_QUOTES);
	
		if($kode<>''){
		
			$tabel="<fieldset>
				<div class='control-group'>											
					<label class='control-label'>Kode Area</label>
					<div class='controls'>
						<input type='text' class='span1' name='kode_area' value='".$kode."' required>
					</div>		
				</div>
				<div class='control-group'>											
					<label class='control-label'>Nama Area</label>
					<div class='controls'>
						<input type='text' class='span4'  name='nama_area' value='".$nama."' required>
						<input type='text' class='span4 hide'  name='f' value='2'>
					</div>				
				</div>";
		$tabel .= "</fieldset>";	 
				
		echo $tabel;
	}else{
		echo "<center> <h5>Tidak ada data yang Anda pilih, periksa kembali pilihan data..!</h5> </center>";
	}
	}

/********SUB AREA*******/				
public function dialog_subarea($post){
	
	$id	= htmlspecialchars($post['id'], ENT_QUOTES);
	$kode	= htmlspecialchars($post['kode'], ENT_QUOTES);
	$nama	= htmlspecialchars($post['nama'], ENT_QUOTES);
	
		if($kode<>''){
		
			$tabel="<fieldset>
				<div class='control-group'>											
					<label class='control-label'>Kode Area</label>
					<div class='controls'>
						<input type='text' readonly='true' class='span1' name='kode_area' value='".$id."' required>
					</div>		
				</div>
				<div class='control-group'>											
					<label class='control-label'>Kode Sub Area</label>
					<div class='controls'>
						<input type='text' readonly='true' class='span1' name='kode_subarea' value='".$kode."' required>
					</div>		
				</div>
				<div class='control-group'>											
					<label class='control-label'>Nama Area</label>
					<div class='controls'>
						<input type='text' class='span4'  name='nama_subarea' value='".$nama."' required>
						<input type='text' class='span4 hide'  name='f' value='2'>
					</div>				
				</div>";
		$tabel .= "</fieldset>";	 
				
		echo $tabel;
	}else{
		echo "<center> <h5>Tidak ada data yang Anda pilih, periksa kembali pilihan data..!</h5> </center>";
	}
	}
	
/********SUB SISTEM*******/	
	public function dialog_sistem($post){
	
	$kd_sistem	= htmlspecialchars($post['kode'], ENT_QUOTES);
	$nm_sistem	= htmlspecialchars($post['nama'], ENT_QUOTES);
	$detail		= htmlspecialchars($post['detail'], ENT_QUOTES);
	
		if($kd_sistem<>''){
		
			$tabel="<fieldset>
				<div class='control-group'>											
					<label class='control-label'>Kode Sistem</label>
					<div class='controls'>
						<input type='text' readonly='true' class='span1' name='kode_sistem' value='".$kd_sistem."' required>
					</div>		
				</div>
				<div class='control-group'>											
					<label class='control-label'>Nama Sistem</label>
					<div class='controls'>
						<input type='text' class='span2' name='nama_sistem' value='".$nm_sistem."' required>
					</div>		
				</div>
				<div class='control-group'>											
					<label class='control-label'>Detail</label>
					<div class='controls'>
						<textarea type='text' class='span4'  name='nama_subarea' value=".$detail." required>".$detail."</textarea>
						<input type='text' class='span4 hide' name='f' value='2'>
					</div>				
				</div>";
		$tabel .= "</fieldset>";	 
				
		echo $tabel;
	}else{
		echo "<center> <h5>Tidak ada data yang Anda pilih, periksa kembali pilihan data..!</h5> </center>";
	}
	}	
	/********SUB TENAGA AHLI*******/	
	public function dialog_ta($post){
	
	$kd_korwil			= htmlspecialchars($post['kode'], ENT_QUOTES);
	$nm_korwil			= htmlspecialchars($post['nama'], ENT_QUOTES);
	$email_korwil		= htmlspecialchars($post['email'], ENT_QUOTES);
	$contact_korwil		= htmlspecialchars($post['contact'], ENT_QUOTES);
	
		if($kd_korwil<>''){
		
			$tabel="<fieldset>
				<div class='control-group'>											
					<label class='control-label'>Kode TA</label>
					<div class='controls'>
						<input type='text' readonly='true' class='span1' name='kode_ta' value='".$kd_korwil."' required>
					</div>		
				</div>
				<div class='control-group'>											
					<label class='control-label'>Nama TA</label>
					<div class='controls'>
						<input type='text' class='span2' name='nama_ta' value='".$nm_korwil."' required>
					</div>		
				</div>
				<div class='control-group'>											
					<label class='control-label'>E-mail TA</label>
					<div class='controls'>
						<input type='text' class='span3' name='email_ta' value='".$email_korwil."' required>
						<input type='text' class='span4 hide' name='f' value='2'>
					</div>		
				</div>
				<div class='control-group'>											
					<label class='control-label'>Contact TA</label>
					<div class='controls'>
						<input type='text' class='span2' name='contact_ta' value='".$contact_korwil."' required>
					</div>		
				</div>";
		$tabel .= "</fieldset>";	 
				
		echo $tabel;
	}else{
		echo "<center> <h5>Tidak ada data yang Anda pilih, periksa kembali pilihan data..!</h5> </center>";
	}
	}
/********MODUL*******/	
		public function dialog_modul($post){
	
	$kode_wilayah	= htmlspecialchars($post['wilayah'], ENT_QUOTES);
	$kode_area	= htmlspecialchars($post['area'], ENT_QUOTES);
	$kode_subarea	= htmlspecialchars($post['subarea'], ENT_QUOTES);
	$kode_sistem	= htmlspecialchars($post['sistem'], ENT_QUOTES);
	$nama_sistem	= htmlspecialchars($post['nmsistem'], ENT_QUOTES);
	$id_modul	= htmlspecialchars($post['kode'], ENT_QUOTES);
	$link_modul	= htmlspecialchars($post['nama'], ENT_QUOTES);
	$keterangan	= htmlspecialchars($post['detail'], ENT_QUOTES);
	
		if($id_modul<>''){
		
			$tabel="<fieldset>
				<div class='control-group hide'>											
					<label class='control-label'>Kode Wilayah</label>
					<div class='controls'>
						<input type='text' readonly='true' class='span1' name='kode_wilayah' value='".$kode_wilayah."' required>
					</div>		
				</div>
				<div class='control-group hide'>											
					<label class='control-label'>Kode Area</label>
					<div class='controls'>
						<input type='text' readonly='true' class='span1' name='kode_area' value='".$kode_area."' required>
					</div>		
				</div>
				<div class='control-group hide'>											
					<label class='control-label'>Kode Subarea</label>
					<div class='controls'>
						<input type='text' readonly='true' class='span1' name='kode_subarea' value='".$kode_subarea."' required>
					</div>		
				</div>
				<div class='control-group hide'>											
					<label class='control-label'>Kode Sistem</label>
					<div class='controls'>
						<input type='text' readonly='true' class='span1' name='kode_sistem' value='".$kode_sistem."' required>
					</div>		
				</div>
				<div class='control-group hide'>											
					<label class='control-label'>Nama Sistem</label>
					<div class='controls'>
						<input type='text' readonly='true' class='span1' name='nama_sistem' value='".$nama_sistem."' required>
					</div>		
				</div>
				<div class='control-group hide'>											
					<label class='control-label'>Id Modul</label>
					<div class='controls'>
						<input type='text' readonly='true' class='span1' name='id_modul' value='".$id_modul."' required>
					</div>		
				</div>
				<div class='control-group'>											
					<label class='control-label'>Link Modul</label>
					<div class='controls'>
						<input type='text' class='span3' name='link_modul' value='".$link_modul."' required>
					</div>		
				</div>
				<div class='control-group'>											
					<label class='control-label'>Keterangan</label>
					<div class='controls'>
						<textarea type='text' class='span4' name='keterangan' value=".$keterangan." required>".$keterangan."</textarea>
						<input type='text' class='span4 hide' name='f' value='2'>
					</div>				
				</div>";
		$tabel .= "</fieldset>";	 
				
		echo $tabel;
	}else{
		echo "<center> <h5>Tidak ada data yang Anda pilih, periksa kembali pilihan data..!</h5> </center>";
	}
	}
}
?>