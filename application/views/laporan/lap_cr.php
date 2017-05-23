<!DOCTYPE html>
<html>
<head>
   <title><?php echo $title;?></title>
  <style type="text/css">
@page {
  margin: 1cm 1cm 1cm 1cm ;
}
body {
  font-family: sans-serif;
  margin: 2cm 0;
  text-align: justify;
}
#header,
#footer {
  position: fixed;
  left: 0;
  right: 0;
  color: #aaa;
  font-size: 0.7em;
}
#header {
  top: 0;
  border-bottom: 0.1pt solid #aaa;
}
#footer {
  bottom: 0;
  border-top: 0.1pt solid #aaa;
}


.page-number {
  text-align: center;
}
.page-number:before {
  content: "Halaman " counter(page);
}
hr {
  page-break-after: always;
  border: 0;
}
    #outtable{
      padding: 20px;
      border:1px solid #e3e3e3;
      width:600px;
      border-radius: 5px;
    }
 
    .short{
      width: 50px;
    }
 
    .normal{
      width: 150px;
    }
 
    table{
      border-collapse: collapse;
      font-family: arial;
      color:#5E5B5C;
      width: 100%;
    }
 
    thead th{
      text-align: left;
      padding: 10px;
    font-weight: bold;
    font-size: 1.1em;
    }
 
    tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 10px;
    font-size: 1.1em;
    }
 
 
    tbody tr:hover{
      background: #EAE9F5
    }
    .cn{
    top:12px;
    left: 60px;
    position: fixed;
    font-size: 1em;
    color: #215;
    font-weight: bold;

  }
    .ca{
    top:25px;
    left: 60px;
    position: fixed;
    font-size: 0.8em;
  }
   .ct{
    top:35px;
    left: 60px;
    position: fixed;
    font-size: 0.8em;
  }
    .nmwil{
   
    font-size: 0.7em;
    font-weight: bold;

  }
   .kop{
      text-align: Center;
    font-size: 0.7em;
    font-weight: bold;
    }

  </style>
</head>
<body>
<div id="header">
    <img src="<?php echo base_url()?>assets/img/msm.png" width='50px' style="margin-top:10px;"/>
    <div class="cn">MSM Consultant</div>
    <div class="ca">Jl. Majapahit No 18-22, Petojo Selatan, Gambir, RT.14/RW.8, Petojo Sel., Jakarta Pusat, Kota Jakarta Pusat, DKI Jakarta 10160, Indonesia</div>
    <div class="ct">Tlp. +62 21 3446663, Website : www.msmgroup.co.id</div>
    <div>&nbsp;</div>
   
</div>
 <div class="kop"> LAPORAN REKAP CHANGE REQUEST AREA MSM </div>
  <div class="nmwil"> <?php 
  /*  $wil = $q->row_array();
   echo "Wilayah Kerja : ". $wil['nmwil'];
   echo "<br>Periode : ". $bulan;
   */?> </div>
  <div>&nbsp;</div>

  

  <?php 
function tanggal_indo($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}

	 $tabel =" <table style='font-size:8px; width='100%' class='table table-bordered' >
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

         $no=1;
          foreach($q->result_array() as $resulte)
        {
		$tgl_cr = substr($resulte['tgl_request'],0,10);
		$tgl_es = substr($resulte['tgl_selesai'],0,10);
		$kd=$resulte['kd_area'];
			if($resulte['kd_korwil']!=''){
				$k = $this->db->query("select nm_korwil from ms_korwil where kd_korwil='".$resulte['kd_korwil']."'");
			}else{
				$k = $this->db->query("select nm_lengkap as nm_korwil from ms_user where keterangan like '%$kd%'");
			}
			$korwil=$k->row_array();
			$tabel .="<tr>
                      <td>".$no++." </td>
                      <td>".$resulte['nm_subarea']."</td>
                      <td>".$resulte['nm_sistem']."</td>
                      <td>".tanggal_indo($tgl_cr)."</td>";
            $tabel .="<td>".$resulte['jns_request']."</td>";
            $tabel .="<td>".$resulte['uraian']."</td>";
            $tabel .="<td>".tanggal_indo($tgl_es)."</td>";
            $tabel .="<td>".$korwil['nm_korwil']."</td>";
            $tabel .="<td>".$resulte['status_cr']."</td>
            </tr>";
            
         }
            $tabel .= "</tbody>
               </table>";
			   echo $tabel;
    
       ?>
        <div id='footer'>
          <div >
            <?php echo "<i>Laporan Rekap Change Request E-Monitoring | MSM Consultant</i>"?>
          </div>
       </div>
</body>
</html>