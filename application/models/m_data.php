<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

    class M_data extends CI_Model {
        public function __construct() {
            parent::__construct();
        }


	public function track() {  
				$bulan = date('m');
				$tahun = date('Y');
	
	 $query=$this->db->query("
			
			select * from (
			select ('1') as nomor,a.kd_area,a.kd_area as kode,a.nm_area as area,'' as nm_sistem,'' as kd_sistem,'' as bulan,'' as tahun,
			to_timestamp(2017-03-10) as tgl_terima,'' as jenis_data,'' as kapasitas,'' as status,'' as keterangan,'' as detail
			from ms_area a join ms_wilayah_child b on a.kd_area=b.kd_area GROUP BY a.kd_area,a.nm_area

			UNION
			
			select ('2') as nomor,a.kd_area,a.kd_subarea as kode,upper(a.nm_subarea) as area,'' as nm_sistem,'' as kd_sistem,'' as bulan,'' as tahun,
			to_timestamp(2017-03-10) as tgl_terima,'' as jenis_data,'' as kapasitas,'' as status,'' as keterangan,'' as detail 
			from ms_area_sub a join ms_wilayah_child b 
			on a.kd_area=b.kd_area and a.kd_subarea=b.kd_subarea GROUP BY a.kd_subarea,a.kd_area,a.nm_subarea

			UNION 

			select ('3') as nomor,a.kd_area,a.kd_subarea as kode,b.nm_area as area,a.nm_sistem,a.kd_sistem,
			(select bulan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='$bulan' and tahun='$tahun') as bulan,
			(select tahun from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='$bulan' and tahun='$tahun') as tahun,
			(select tgl_terima from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='$bulan' and tahun='$tahun') as tgl_terima,
			(select jenis_data from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='$bulan' and tahun='$tahun') as jenis_data,
			(select kapasitas from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='$bulan' and tahun='$tahun') as kapasitas,
			(select status from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='$bulan' and tahun='$tahun') as status,
			(select keterangan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='$bulan' and tahun='$tahun') as keterangan,
			'' as detail 
			from ms_wilayah_child a
			JOIN ms_wilayah b on a.kd_area=b.kd_area and a.kd_subarea=b.kd_subarea and a.kd_wilayah=b.kd_wilayah 

			)x ORDER BY kd_area ASC,kode ASC,nomor ASC 
			
			");
	
		$tabel ='';
          foreach($query->result_array() as $resulte)
        {
		if($resulte['nomor']=='1'){
		  $bold='<b>';
		  $spasi='';
		  $bold2='</b>';
		  $tgl= '';
		  $area="<h3 class='icon-map-marker'> ".$resulte['area'].'</h3>';
		  $bg='';
		  //$cstat ="";
          $cstat ="<a href='#' class='cstatx'  data-name='cstatx' data-type='select' data-subarea='".$resulte['kode']."'  data-sistem='".$resulte['kd_sistem']."' data-value='".$resulte['status']."'></a>";
		}
		if($resulte['nomor']=='2'){
		  $bold='<b>';
		  $spasi='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		  $bold2='</b>';
		  $tgl= '';
		  $area="<h4 class='icon-paper-clip'> ".$resulte['area'].'</h4>';
		  $bg='';
		  //$cstat ="";
          $cstat ="<a href='#' class='cstatx'  data-name='cstatx' data-type='select' data-subarea='".$resulte['kode']."'  data-sistem='".$resulte['kd_sistem']."' data-value='".$resulte['status']."'></a>";
		  }
		if($resulte['nomor']=='3'){
		  $bold='';
		  $spasi='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		  $bold2='';
		  $tgl= $this->TanggalIndo($resulte['tgl_terima']);
		  $area='';
		  $stat = $resulte['status'];
          $cstat ="<a href='#' class='cstatx'  data-name='cstatx' data-type='select' data-subarea='".$resulte['kode']."'  data-sistem='".$resulte['kd_sistem']."' data-value='".$resulte['status']."'></a>";
		
		  }
		  if($resulte['nomor']=='3'){
		    $tabel .="<tr>
                      <td>".$bold.$spasi.$area.$bold2."</td>";
					  }else{
		    $tabel .="<tr>
                      <td bgcolor='#EEEEEE'>".$bold.$spasi.$area.$bold2."</td>";
					  }
					  if($resulte['nomor']=='3'){ //&& 
						if($resulte['jenis_data']==''){
            $tabel .="<td bgcolor='#FA8072'>".$resulte['nm_sistem']."</td>
                      <td bgcolor='#FA8072'>-</td>
                      <td bgcolor='#FA8072'>".$resulte['jenis_data']."</td>";
            $tabel .="<td bgcolor='#FA8072'>".$resulte['kapasitas']."</td>";
            $tabel .="<td bgcolor='#FA8072'>-</td>";
            $tabel .="<td bgcolor='#FA8072'>".$resulte['keterangan']."</td>
					  <td bgcolor='#FA8072'>
					  <a class='vdetail fancybox.ajax' style='cursor: -webkit-zoom-in; cursor: -moz-zoom-in;text-decoration:none;' 
						data-subarea='".$resulte['kode']."' data-sistem='".$resulte['kd_sistem']."' data-jenis='".$resulte['jenis_data']."' 
						 data-bulan='".$resulte['bulan']."' data-tahun='".$resulte['tahun']."'
						data-toggle='tooltip' title='&nbsp;&nbsp;view detail&nbsp;&nbsp; '>
						<i class='icon-eye-open ' style='color:#e5e5e5;font-size:14px'></i>
						</a>&nbsp;&nbsp; <a class='delmonitor fancybox.ajax' style='cursor: pointer;text-decoration:none;' 
						data-subarea='".$resulte['kode']."' data-sistem='".$resulte['kd_sistem']."' data-jenis='".$resulte['jenis_data']."'>  
						<i class='icon-ban-circle' style='color:#e5e5e5;font-size:14px'></i></a>
					  </td>
					  </tr>";
						}else{
            $tabel .="<td bgcolor='#98FB98' >".$resulte['nm_sistem']."</td>
                      <td bgcolor='#98FB98' >".$tgl."</td>
                      <td bgcolor='#98FB98' >".$resulte['jenis_data']."</td>";
            $tabel .="<td bgcolor='#98FB98' >".$resulte['kapasitas']." Mb</td>";
            $tabel .="<td bgcolor='#98FB98' >".$cstat."</td>";
            $tabel .="<td bgcolor='#98FB98' >".$resulte['keterangan']."</td>
					  <td bgcolor='#98FB98' >
					  <a class='vdetail fancybox.ajax' style='cursor: -webkit-zoom-in; cursor: -moz-zoom-in;text-decoration:none;' 
						data-subarea='".$resulte['kode']."' data-sistem='".$resulte['kd_sistem']."' data-jenis='".$resulte['jenis_data']."' 
						data-bulan='".$resulte['bulan']."' data-tahun='".$resulte['tahun']."'
						data-toggle='tooltip' title='&nbsp;&nbsp;view detail&nbsp;&nbsp; '>
						<i class='icon-eye-open ' style='color:blue;font-size:14px'></i>
						</a>&nbsp;&nbsp; <a class='delmonitor fancybox.ajax' style='cursor: pointer;text-decoration:none;' 
						data-subarea='".$resulte['kode']."' data-sistem='".$resulte['kd_sistem']."' data-jenis='".$resulte['jenis_data']."'>  
					<i class='icon-ban-circle' style='color:blue;font-size:14px'></i></a>
					  </td>
					  </tr>";
						}
					  }else{
            $tabel .="<td bgcolor='#EEEEEE' >".$bg.$resulte['nm_sistem']."</td>
                      <td bgcolor='#EEEEEE' >".$tgl."</td>
                      <td bgcolor='#EEEEEE' >".$resulte['jenis_data']."</td>";
            $tabel .="<td bgcolor='#EEEEEE' >".$resulte['kapasitas']."</td>";
            $tabel .="<td bgcolor='#EEEEEE' >".$resulte['status']."</td>";
            $tabel .="<td bgcolor='#EEEEEE' >".$resulte['keterangan']."</td>
					  <td bgcolor='#EEEEEE' >".$resulte['detail']."</td>
					  </tr>";
					  }
         }
	    echo $tabel;
    }
	
    public function uptrack($kode,$area,$sistem)
    {
		$this->db->query("update e_monitor set status='1' where kd_subarea='$area' and kd_sistem='$sistem'");

    }
	
	///////////////////////// CHANGE REQUEST
	public function getCr($id)
    {
		$oto=$this->session->userdata('oto');
		$kd_subarea=$this->session->userdata('kd_subarea');
		$area=$this->session->userdata('kd_area');
		$ket=$this->session->userdata('ket');
	
		$where ="";
		if($oto=='3'){
			$where ="where a.kd_subarea='$kd_subarea'";
		}elseif($oto=='2'){
			$where ="where a.kd_area in ($ket)";
		}
     $q=$this->db->query("select a.kd_request,b.nm_subarea as nm_area,c.nm_sistem,a.tgl_request,a.jns_request,
							a.prioritas,a.gambar,a.kd_korwil as tenaga_ahli,a.status_cr as status,a.tgl_selesai
							from e_request a 
							join ms_area_sub b on a.kd_area=b.kd_area and a.kd_subarea=b.kd_subarea
							join ms_wilayah_child c on a.kd_area=c.kd_area and a.kd_subarea=c.kd_subarea and a.kd_sistem=c.kd_sistem
							
							$where");
		return $q->result_array();
    }
	
	public function crtrack() {  
		$oto=$this->session->userdata('oto');
		$kd_subarea=$this->session->userdata('kd_subarea');
		$area=$this->session->userdata('kd_area');
		$ket=$this->session->userdata('ket');
	
		$where ="";
		if($oto=='3'){
			$where ="where a.kd_area='$area'";
		}elseif($oto=='2'){
			$where ="where a.kd_area in ($ket)";
		}
		
		$query=$this->db->query("select a.kd_request,a.kd_subarea,a.kd_area,b.nm_subarea as nm_area,c.nm_sistem,a.tgl_request,a.jns_request,
							a.prioritas,a.gambar,a.kd_korwil as tenaga_ahli,a.status_cr as status,a.tgl_selesai
							from e_request a 
							join ms_area_sub b on a.kd_area=b.kd_area and a.kd_subarea=b.kd_subarea
							join ms_wilayah_child c on a.kd_area=c.kd_area and a.kd_subarea=c.kd_subarea and a.kd_sistem=c.kd_sistem
							$where order by a.tgl_request,a.status_cr");
	
		$tabel ='';
          foreach($query->result_array() as $row)
        {
			if($row['gambar']==''){
			$colimg="<i class='icon-picture ' style='font-size:14px'></i>";
		   }else{
			$colimg="<a class='single' href='../screenshoot/".$row['gambar']."' >
			<i class='icon-picture ' style='cursor: pointer; text-decoration:none;color:blue;font-size:14px'></i></a>";
		   }
			$delcr="<a><i class='delcr icon-remove' id='delcr' style='cursor: pointer; text-decoration:none;color:red;font-size:14px' data-pk='".$row['kd_request']."' data-subarea='".$row['kd_subarea']."'></i></a>";
		    
		   if($row['prioritas']==1){
			$prioreq="<center><i class='icon-warning-sign' style='color:red;font-size:20px'></i></center>";
		   }else{
			$prioreq="<center><i class='icon-info-sign' style='color:green;font-size:20px'></i></center>";
		   }
		   
			$colta ="<a href='#' class='tah'  data-name='user' data-type='select'  data-pk='".$row['kd_request']."' data-value='".$row['tenaga_ahli']."'></a>";
			$statcr ="<a href='#' class='statcr'  data-name='user' data-type='select'  data-pk='".$row['kd_request']."' data-subarea='".$row['kd_subarea']."' data-value='".$row['status']."'></a>";
			//$tglcr ="<a href='#' class='tglcr' id='tglcr' data-name='user' data-type='date' data-pk='".$row['kd_request']."' data-subarea='".$row['kd_subarea']."' data-value='".$row['status']."'></a>";
		    $tglcr	 = $row['tgl_selesai'];
			$tabel .="<tr>
						  <td>".$row['kd_request']."</td>";
				$tabel .="<td>".$row['nm_area']."</td>
						  <td>".$row['nm_sistem']."</td>
						  <td>".$row['tgl_request']."</td>";
				$tabel .="<td>".$prioreq."</td>";
				$tabel .="<td>".$colta."</td>";
				$tabel .="<td>".$statcr."</td>
						  <td>".$tglcr."</td>
						  <td>
							<center><a class='vdetailcr fancybox.ajax' style='cursor: -webkit-zoom-in; cursor: -moz-zoom-in;text-decoration:none;' 
							data-pk=".$row['kd_request']." data-area=".$row['kd_area']." data-subarea=".$row['kd_subarea']." 
							data-toggle='tooltip' title='&nbsp;&nbsp;view detail&nbsp;&nbsp;'>
							<i class='icon-eye-open ' style='color:blue;font-size:14px'></i></a>&nbsp;&nbsp;
							".$colimg."&nbsp;&nbsp;".$delcr."
							</center></td>	
					  </tr>";
         }
	    echo $tabel;
    }
	
    public function upta($id,$user)
    {
    $this->db->set('kd_korwil', $user);
    $this->db->set('kd_korwil', $user);
    $this->db->set('kd_korwil', $user);
    $this->db->where('kd_request',$id);
    $q = $this->db->update('e_request');
		if($q){
			$this->sendta($id);
		}	
    }
		
	public function sendta($id) {
	 $query = $this->db->query("select a.kd_area,b.nm_area,a.kd_sistem,c.nm_sistem,a.jns_request,
			a.uraian,b.nama_pic,b.cp_pic,b.email_pic,d.email_korwil 
			from e_request a 
			join ms_wilayah b on a.kd_wilayah=b.kd_wilayah and a.kd_area=b.kd_area and a.kd_subarea=b.kd_subarea
			join ms_wilayah_child c on a.kd_wilayah=c.kd_wilayah and a.kd_area=c.kd_area 
			join ms_korwil d on a.kd_korwil=d.kd_korwil
			and a.kd_subarea=c.kd_subarea and a.kd_sistem=c.kd_sistem
			where kd_request='$id'");
		foreach($query->result_array() as $row){
			$kd_area = $row['kd_area'];$nm_area = $row['nm_area'];
			$kd_sistem = $row['kd_sistem'];$nm_sistem = $row['nm_sistem'];
			$jns = $row['jns_request'];$uraian = $row['uraian'];
			$nama_pic = $row['nama_pic'];$cp_pic = $row['cp_pic'];
			$email_pic = trim($row['email_pic']);$email_korwil = trim($row['email_korwil']);
			if($jns=='1'){
				$jns_request="Permasalahan";
			}elseif($jns=='2'){
				$jns_request="Penambahan Fitur";
			}else{
				$jns_request="Penambahan Modul";
			}
		}	
	 
	 
        $ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "msm.monitoring@gmail.com";
        $config['smtp_pass'] = "@maja08pahit!";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        
        
        $ci->email->initialize($config);

        $ci->email->from('msm.monitoring@gmail.com', '.:MSM MONITORING:.');
        $list = array($email_korwil,'erdian1911@gmail.com');
        $ci->email->to($list);
        $ci->email->subject('CHANGE REQUEST');
        $ci->email->message("
		<h3><center>.:CHANGE REQUEST:.</center><h3><br/>
		<table>
			<tr>
				<td>Nama Daerah</td>
				<td>:</td>
				<td>$nm_area</td>
			</tr>
			<tr>
				<td>Nama Sistem</td>
				<td>:</td>
				<td>$nm_sistem</td>
			</tr>
			<tr>
				<td>Jenis Request</td>
				<td>:</td>
				<td>$jns_request</td>
			</tr>
			<tr>
				<td>Uraian</td>
				<td>:</td>
				<td>$uraian</td>
			</tr>
			<tr>
				<td>Nama PIC</td>
				<td>:</td>
				<td>$nama_pic</td>
			</tr>
			<tr>
				<td>Kontak PIC</td>
				<td>:</td>
				<td>$cp_pic/$email_pic</td>
			</tr>
			<tr>
				<td colspan='3'>*Mohon untuk mengecek portal e-monitoring anda untuk informasi lebih lanjut.</td>
			</tr>
		</table><br/><br/><br/><hr/>
		
		<a><center>
.:MSM E-MONITORING:.<br/>
Alamat: Jl. Majapahit No. 18-22, Petojo Selatan, Gambir, RT.14/RW.8, Petojo Sel., Jakarta Pusat, Kota Jakarta Pusat, DKI Jakarta 10160, Indonesia<br/>
Telepon: +62 21 3446663</center><a>
		
		");
		
        if ($this->email->send()) {
            echo 'Email sent.';
        } else {
            show_error($this->email->print_debugger());
        }
}

	public function sendwil($id) {
	 $query = $this->db->query("select a.kd_area,b.nm_area,a.kd_sistem,c.nm_sistem,a.jns_request,
			a.uraian,b.nama_pic,b.cp_pic,b.email_pic,d.email_korwil,d.nm_korwil 
			from e_request a 
			join ms_wilayah b on a.kd_wilayah=b.kd_wilayah and a.kd_area=b.kd_area and a.kd_subarea=b.kd_subarea
			join ms_wilayah_child c on a.kd_wilayah=c.kd_wilayah and a.kd_area=c.kd_area 
			join ms_korwil d on a.kd_korwil=d.kd_korwil
			and a.kd_subarea=c.kd_subarea and a.kd_sistem=c.kd_sistem
			where kd_request='$id'");
		foreach($query->result_array() as $row){
			$kd_area = $row['kd_area'];$nm_area = $row['nm_area'];
			$kd_sistem = $row['kd_sistem'];$nm_sistem = $row['nm_sistem'];
			$jns = $row['jns_request'];$uraian = $row['uraian'];
			$nama_pic = $row['nama_pic'];$cp_pic = $row['cp_pic'];
			$email_pic = trim($row['email_pic']);$email_korwil = trim($row['email_korwil']);$nm_korwil = $row['nm_korwil'];
			if($jns=='1'){
				$jns_request="Permasalahan";
			}elseif($jns=='2'){
				$jns_request="Penambahan Fitur";
			}else{
				$jns_request="Penambahan Modul";
			}
		}	
	 
	 
        $ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "msm.monitoring@gmail.com";
        $config['smtp_pass'] = "@maja08pahit!";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        
        
        $ci->email->initialize($config);

        $ci->email->from('msm.monitoring@gmail.com', '.:MSM MONITORING:.');
        $list = array($email_pic);
        $ci->email->to($list);
        $ci->email->subject('REPLY CHANGE REQUEST');
        $ci->email->message("
		<h3 align='left'>HOOREEEEE.!!!<h3><br/>
		<table>
			<tr>
				<td colspan='3'>Permohonan CHANGE REQUEST Anda sudah SELESAI, silahkan check portal e-monitoring anda, dengan rincian sbb:</td>
			</tr>
			<tr>
				<td>Kode CR</td>
				<td>:</td>
				<td>$id</td>
			</tr>
			<tr>
				<td>Nama Sistem</td>
				<td>:</td>
				<td>$nm_sistem</td>
			</tr>
			<tr>
				<td>Jenis Request</td>
				<td>:</td>
				<td>$jns_request</td>
			</tr>
			<tr>
				<td>Uraian</td>
				<td>:</td>
				<td>$uraian</td>
			</tr>
			<tr>
				<td>Nama TA</td>
				<td>:</td>
				<td>$nm_korwil</td>
			</tr>
			<tr>
				<td>E-mail TA</td>
				<td>:</td>
				<td>$email_korwil</td>
			</tr>
			<tr>
				<td colspan='3'>*Mohon untuk mengecek portal e-monitoring anda untuk informasi lebih lanjut.</td>
			</tr>
		</table><br/><br/><br/><hr/>
		
		<a><center>
.:MSM E-MONITORING:.<br/>
Alamat: Jl. Majapahit No. 18-22, Petojo Selatan, Gambir, RT.14/RW.8, Petojo Sel., Jakarta Pusat, Kota Jakarta Pusat, DKI Jakarta 10160, Indonesia<br/>
Telepon: +62 21 3446663</center><a>
		
		");
		
        if ($this->email->send()) {
            echo 'Email sent.';
        } else {
            show_error($this->email->print_debugger());
        }
}
	
	public function TanggalIndo($date){
		$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

		$tahun = substr($date, 0, 4);
		$bulan = substr($date, 5, 2);
		$tgl   = substr($date, 8, 2);

		$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;		
		return($result);
	}
	
    public function getWilArr()
    {
    $this->db->select('*');
    $q = $this->db->get('ms_wilayah');
    return $q->result_array();
    }//end get data 
	
	public function getMsWil($id)
    {
	$where="";
	if($id<>''){$where="where a.kd_wilayah='$id'";}else{$where="where a.kd_wilayah=''";}
     $q=$this->db->query("select a.*,b.nm_subarea as nm_area
						from ms_wilayah a 
						join ms_area_sub b 
						on a.kd_area=b.kd_area and a.kd_subarea=b.kd_subarea $where");
		return $q->result_array();
    }

	public function getMsWilGrid($id)
    {
		$oto=$this->session->userdata('oto');
		$kd_subarea=$this->session->userdata('kd_subarea');
		$area=$this->session->userdata('kd_area');
		$ket=$this->session->userdata('ket');
	
		$where ="";
		if($oto=='3'){
			$where ="where a.kd_subarea='$kd_subarea'";
		}elseif($oto=='2'){
			$where ="where a.kd_area in ($ket)";
		}

     $q=$this->db->query("select a.*,b.nm_subarea as nm_area from ms_wilayah a join ms_area_sub b on a.kd_area=b.kd_area and a.kd_subarea=b.kd_subarea $where");
		return $q->result_array();
    }
	
	public function getArea()
    {
		$oto=$this->session->userdata('oto');
		$area=$this->session->userdata('kd_area');
		$ket=$this->session->userdata('ket');
			$where ="";
		if($oto=='3'){
			$where ="where kd_area='$area'";
		}elseif($oto=='2'){
			$where ="where kd_area in ($ket)";
		}
		$this->db->select('*');
		$q = $this->db->query('select * from ms_area '.$where.' order by kd_area');//$this->db->get('ms_area');
		return $q->result_array();
    }//end get data 
	
    public function nmarea($kd_subarea)
    {
     $q=$this->db->query("SELECT nm_subarea FROM ms_area_sub where kd_subarea='$kd_subarea'");
     return $q->row_array();
    }
	
	 public function getAreaSub()
    {
		$this->db->select('*');
		$q = $this->db->query('select * from ms_area_sub order by kd_area');//$this->db->get('ms_area');
		return $q->result_array();
    }//end get data 
	
    public function getSis()
    {
     $q=$this->db->query("SELECT * FROM ms_sistem");
    return $q->result_array();
    }
	
    public function getTa()
    {
     $q=$this->db->query("SELECT * FROM ms_korwil");
    return $q->result_array();
    }
    
	public function getMod($kd_area,$kd_sistem)
    {
     $q=$this->db->query("SELECT a.*,b.nm_sistem FROM ms_modul a join ms_sistem b on a.kd_sistem=b.kd_sistem where a.kd_subarea='$kd_area' and a.kd_sistem='$kd_sistem' order by a.id_modul");
    return $q->result_array();
    }
    
	public function getProyek()
    {
		$oto=$this->session->userdata('oto');
		$area=$this->session->userdata('kd_area');
		$subarea=$this->session->userdata('kd_subarea');
			$where ="";
		if($oto=='2' || $oto=='3'){
			$where ="where kd_area='$area' and kd_subarea='$subarea'";
		}
		$this->db->select('*');
		$q = $this->db->query('select * from ms_pekerjaan '.$where.' order by kd_pekerjaan');//$this->db->get('ms_area');
		return $q->result_array();
    }
    public function getMax($kolom,$tabel)
    {
     $query=$this->db->query("select max(cast($kolom AS INT)) as max from $tabel");
	 //select max(cast(id_user AS INT)) as max from ms_user
      return $query->row_array();
    }

    public function getMaxSis($kolom,$tabel)
    {
     $query=$this->db->query("select max(right($kolom,4)) as max from $tabel");
      return $query->row_array();
    }
	
    public function getWil($kd)
    {
    $this->db->select('*');
    $this->db->where('kd_wilayah',$kd);
    $q = $this->db->get('ms_wilayah');
    return $q->row_array();
    }//end get data 
	
	public function getloadTa()
    {
		$this->db->select('*');
		$q = $this->db->query('select * from ms_korwil order by kd_korwil');
		return $q->result_array();
    }
	
    public function InData($tb,$data){ 
    $this->db->insert($tb, $data);
    }//end insert 
	
	public function UpData($tb,$kolom,$isi,$kolom2,$isi2){ 
    $this->db->set($kolom,$isi);
    $this->db->where($kolom2,$isi2);
    $q = $this->db->update($tb); 
    }
	public function Uptabta($kd_korwil,$id_korwil,$kd_areas){ 
	 
    $this->db->query("update ms_korwil set id_korwil='$id_korwil' where kd_korwil='$kd_korwil'");//
    }
    public function getWchild($id)
    {
	
	if($id<>''){$where="where a.kd_wilayah='$id'";}else{$where="where a.kd_wilayah=''";}

     $q=$this->db->query("SELECT a.* FROM ms_wilayah_child a
	 join ms_wilayah b on a.kd_area=b.kd_area and a.kd_subarea=b.kd_subarea $where");
    return $q->result_array();
    }

	
	public function InWilayah($post){
	$kd_wilayah		= htmlspecialchars($post['kode_wilayah'], ENT_QUOTES);
	$kd_area		= htmlspecialchars($post['kode_prop'], ENT_QUOTES);
	$kd_subarea		= htmlspecialchars($post['kode_kab'], ENT_QUOTES);
	$nm_area		= htmlspecialchars($post['nmsubarea'], ENT_QUOTES);
	$nama_pic		= htmlspecialchars($post['nama_pic'], ENT_QUOTES);
	$jabatan_pic	= htmlspecialchars($post['jabatan_pic'], ENT_QUOTES);
	$cp_pic			= htmlspecialchars($post['cp_pic'], ENT_QUOTES);
	$email_pic		= htmlspecialchars($post['email_pic'], ENT_QUOTES);
	$list_system	= $post['nm_sistem'];
	$keterangan		= htmlspecialchars($post['keterangan'], ENT_QUOTES);
	$list			= implode(',',$post['nm_sistem']);
	$itemx  		= ($post['nm_sistem']);
	$noauto	= 0;
		
		$zx=$this->db->query("delete from ms_wilayah where kd_area='$kd_area' and kd_subarea='$kd_subarea'");
		if($zx){
		$z=$this->db->query("insert into ms_wilayah values ('".$kd_wilayah."','".$kd_area."','".$kd_subarea."','".$nm_area."','".$nama_pic."','".$jabatan_pic."','".$cp_pic."','".$email_pic."','".$list."','".$keterangan."')");
		}
		if($z){
			$fx=$this->db->query("delete from ms_wilayah_child where kd_area='$kd_area' and kd_subarea='$kd_subarea'");
		}
			if($fx){
				for($i=0;$i<count($itemx);$i++){
					$f=$this->db->query("insert into ms_wilayah_child values ('".$kd_wilayah."','".$kd_area."','".$kd_subarea."','".substr($itemx[$i],0,8)."','".substr($itemx[$i],9,strlen($itemx[$i]))."')");
				}
			}

	}
	
	public function all_sistem($post){
	
	$kd_wilayah		= htmlspecialchars($post['kd_wilayah'], ENT_QUOTES);
	$kd_propinsi	= htmlspecialchars($post['kd_propinsi'], ENT_QUOTES);
	$kd_kabupaten	= htmlspecialchars($post['kd_kabupaten'], ENT_QUOTES);
	
	$q= $this->db->query("select * from ms_sistem");
	if($q->num_rows()>0){
		$tabel="<table style='font-size:12px;' style='display:none' 
                   class='table table-bordered table-striped table-hover table-heading table-datatable' id='datatable-22'>
                        <thead style='background-color: #e5e5e5;'>
                          <tr>
                            <th style='align:center;width:10px;' >Kode</th>
                            <th>Sistem</th>
                            <th class='text-center' width='10%'></th>
                          </tr>
                        </thead>
                        <tbody>";
						foreach($q->result_array() as $resulte){
			$tabel .="<tr>
						  <td class='text-center' width='10%'><input class='hide' type='text' name='kd_sis' id='kd_sis' value=".$resulte['kd_sistem'].">".$resulte['kd_sistem']."</td>
						  <td><input class='hide' type='text' name='nm_sis' id='nm_sis' value=".$resulte['nm_sistem'].">".$resulte['nm_sistem']."</td>
						  <td><input type='checkbox' name='item[]' id='item' value=".$resulte['nm_sistem']."></td>
					</tr>";
						}
																

		$tabel .= "</tbody>
               </table>";
		$tabel .= "
		<div class='hide'>
			  <input type='text' value='".$kd_wilayah."' name='kd_wilayah' id='kd_wilayah'>
			  <input type='text' value='".$kd_propinsi."' name='kd_propinsi' id='kd_propinsi'>
			  <input type='text' value='".$kd_kabupaten."' name='kd_kabupaten' id='kd_kabupaten'>
		</div>";	   
		echo $tabel;
	}else{
		echo "<center> <h5>Tidak ada data dengan kriteria filter, periksa kembali pilihan filter diatas..!</h5> </center>";

	}
}

	public function allimpl($post){
	
	$q= $this->db->query("select * from ms_area order by kd_area");
	if($q->num_rows()>0){
		$tabel="<table style='font-size:12px;' style='display:none' 
                   class='table table-bordered table-striped table-hover table-heading table-datatable' id='datatable-2203'>
                        <thead style='background-color: #e5e5e5;'>
                          <tr>
                            <th style='align:center;width:10px;' >Kode</th>
                            <th>Area</th>
                            <th class='text-center' width='10%'></th>
                          </tr>
                        </thead>
                        <tbody>";
						foreach($q->result_array() as $resulte){
			$tabel .="<tr>
						  <td class='text-center' width='10%'><input class='hide' type='text' name='kd_area' id='kd_area' value=".$resulte['kd_area'].">".$resulte['kd_area']."</td>
						  <td><input class='hide' type='text' name='nm_sis' id='nm_sis' value=".$resulte['nm_area'].">".$resulte['nm_area']."</td>
						  <td><input type='checkbox' name='item[]' id='item' value=".$resulte['kd_area']."></td>
					</tr>";
						}
																

		$tabel .= "</tbody>
               </table>";	   
		echo $tabel;
	}else{
		echo "<center> <h5>Tidak ada data dengan kriteria filter, periksa kembali pilihan filter diatas..!</h5> </center>";

	}
}	
	
    public function getAllUser()
    {	
		$oto=$this->session->userdata('oto');
		$kd_subarea=$this->session->userdata('kd_subarea');
		$area=$this->session->userdata('kd_area');
		$ket=$this->session->userdata('ket');
	
		$where ="";
		if($oto=='2'){
			$where ="and a.group='3' and a.kd_area in ($ket)";
		}
		
     $query=$this->db->query("SELECT a.id_user,a.user_name, a.nm_lengkap,a.jabatan, a.status,a.group, 
								b.nm_subarea as nm_wilayah, b.kd_subarea as kd_wilayah
								FROM ms_user a INNER JOIN ms_area_sub b 
								ON a.kd_area=b.kd_area  and a.kd_subarea=b.kd_subarea
								WHERE a.user_name is not null $where order by a.group");
      return $query->result_array();
    }//end get all data user
    
    public function upstatuser($id,$status)
    {
    $this->db->set('status', $status);
    $this->db->where('user_name',$id);
    $q = $this->db->update('ms_user');   
    }

    public function addfitur($data){
      $this->db->insert('ms_fitur', $data);

    }

    public function cek_pass($id,$passold){
  //cek password 
   $this->db->select('*');
                $this->db->from('ms_user');
                $this->db->where('password', $passold);
                $this->db->where('user_name', $id);
                $query = $this->db->get();
    
     return $query;
   }
   
    public function up_pass($id,$passnew){ 
   
        $this->db->set('password', $passnew);
        $this->db->where('user_name', $id);
        $this->db->update('ms_user');
  
   }

	public function lapmon($kdwil=null,$kdsys=null){
 

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

    //return $query->result_array();
    if($query->num_rows() >0 ){
    $v = "
    <div class='pull-right'>
      <a target='_blank' href='".base_url()."app/pdfmon/".$kdwil."/".$kdsys."'  class='btn btn-xs  btn-default'>
      <span>&nbsp;<i class='icon-print'></i>&nbsp;</span>
      Print to PDF</a>

     </div><br><br>

    <table style='font-size:11px;' style='display:none' 
     class='table table-bordered table-striped table-hover table-heading table-datatable' id='datatable-4'>
          <thead style='background-color: #e5e5e5;'>
            <tr>
              <th>Nama Modul</th>
              <th>Kode / Nama System</th>
              <th>Nama Wilayah</th>
              <th>Link</th>
              
              <th>Tanggal Perbaikan</th>
              <th>Keterangan</th>              
            </tr>
          </thead>
          <tbody>";
         
         foreach ($query->result_array() as $row)
          { 

            if($row['url']==''){
              $viewfitur ='';
              $viewlog ='';
              $bold ='<b>';
              $tglfix ='';

            }else{
             
              $bold='';
              $tglfix=$row['last_update'];
              }

            if($row['LEVEL']=='1' ){
              $spasi='&nbsp;';
              }
            if($row['LEVEL']=='2' ){
              $spasi='&nbsp;&nbsp;&nbsp;&nbsp;';
              }
            if($row['LEVEL']=='3'){
              $spasi='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
              }
            if($row['LEVEL']=='4'){
              $bold='';
              $spasi='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
              }
          
          $v .="<tr>";
          $v .="<td>".$bold.$spasi.$row['Menu']."</td>";
          $v .="<td>[".$row['kd_sistem']."]".$row['nmsys']."</td>";
          $v .="<td>".$row['nmwil']."</td>";
          $v .="<td>".$bold.$row['url']."</td>";
          $v .="<td>".$tglfix."</td>";
          $v .="<td></td>"; 
          $v .="</tr>";
           }
              
          
          $v .="  </tbody>
               </table>";
          echo $v;

      }else{
        echo "<center> <h5>Tidak ada data dengan kriteria filter, periksa kembali pilihan filter diatas..!</h5> </center>";
      }

    }//end lap_monitoring


	public function list_sistem($kd_area,$kd_subarea){
   
   $query=$this->db->query("SELECT a.* from ms_wilayah_child a where a.kd_area='$kd_area' and a.kd_subarea='$kd_subarea' order by kd_sistem  ");

  if($query->num_rows() >0 ){
      $tabel ="
	  <div class='widget-content'>
	 <div class='control-group'>
			<div class='controls'>	 
                  <table style='font-size:11px;' style='display:none' 
                   class='table table-bordered table-striped table-hover table-heading table-datatable' id='datatable-4'>
                        <thead style='background-color: #e5e5e5;'>
                          <tr>
                            <th width='80px'>Kode Area</th>
                            <th width='150px'>Kode Sistem</th>
                            <th>Nama Sistem</th>
                            <th width='100px;'>Tambah Modul</th>
                          </tr>
                        </thead>
                        <tbody>";
  foreach($query->result_array() as $resulte)
        {
           $tabel .="<tr>
                      <td>".$resulte['kd_subarea']."</td>
                      <td>".$resulte['kd_sistem']."</td>
                      <td align='center'>".$resulte['nm_sistem']."</td>";
            $tabel .="<td> 
						<a class='btn btn-success btn-label-center' 
						href='".base_url()."app/page_modul_form/".$resulte['kd_wilayah']."/".$resulte['kd_area']."/".$resulte['kd_subarea']."/".$resulte['kd_sistem']."/".$resulte['nm_sistem']."'>
						<span><i class='icon-list'></i></span></a>
					  </td>
					</tr>";
            
         }
            $tabel .= "</tbody>
         </table>
		 </div>
		 </div>
		 </div>";
    

       echo $tabel;
       }else{
        echo "<center> <h5>Tidak ada data dengan kriteria filter, periksa kembali pilihan filter diatas..!</h5> </center>";
      }


    }

}//end m_data

?>