<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="utf-8">
   <title><?php echo $title;?></title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/pages/dashboard.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/plugins/editable/css/bootstrap-editable.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/plugins/select2/select2.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/msm.png" />
  <!--AUTO SCROLL-->
 <style>
#container {
    position:relative;
    height:4000px;
 }
#container h2 {
    padding:50px 0;
    text-align:center;
 }
#container h2:last-of-type {
    position:absolute;
    bottom:0;
    width:100%;
 } 
 
</style>
<style>
h5 {
    font-size: 12px;
	padding-bottom: 10px;
}
</style>
<script style="text/javascript">
/* (function() {
   'use strict';

   var dbh,sto,num=50,temp=0,scrolldelay=4000;

function init(){ 
    dbh=document.body.offsetHeight;
    pageScroll();
 }

function pageScroll() {
    window.scrollBy(0,num);
    temp+=num;
if((temp>=dbh)||(temp<=0)){
    num=-num;
 }
   sto=setTimeout(function(){pageScroll();},scrolldelay);
 }
   window.addEventListener?
   window.addEventListener('load',init,false):
   window.attachEvent('onload',init);
})(); */



</script>

<!--TAB-->
<style>
body {font-family: "Lato", sans-serif;}

/* Style the tab */
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}


</style>
<!--BORDER-->
<style>
table, td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    width: 100%;
}

table, td,th {
    text-align: center;
    text-valign: middle;
}
</style>  
 
<!--HEAD COLOR-->
<style>
.navbar-inner {
	background-color: #04ac53;
    background-image: url(./assets/img/banner_emon.jpg)!important;
    background-attachment: scroll;
    background-clip: border-box;
    background-origin: padding-box;
    background-position-x: 10%!important;
    background-position-y: 80%!important;
    background-size: 1350px 70px!important;
}
</style>
 </head>
		<!--editable-->
		
<body>
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner" >
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="<?php echo base_url();?>app">
				E-Monitoring			
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<li class="dropdown">						
						<a href="<?php echo base_url();?>login" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-key"></i>
							Login
						</a>						
					</li>
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->
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

$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");			
 ?>	
 
<div class="tab">
	<button class="tablinks" onclick="openCity(event, 'bulanan')" id="defaultOpen">Bulan <?php echo $BulanIndo[(int)date('m')-1]; ?></button>
	<button class="tablinks" onclick="openCity(event, 'tahunan')">Tahun <?php echo date('Y');?></button>
</div>
			
<div id="bulanan" class="tabcontent " style="width:1325px;align:center;padding-right:0px;">      		
		<div class="widget-header">
			<i class="icon-random"></i>
			<h3>Tracking Project Daerah</h3>
		</div> <!-- /widget-header -->
			<div  class=" widget-content">
			<table style='font-size:12px;' class='table table-bordered table-hover table-heading table-datatable' id='datatable-1'>
         	  <thead style="background-color: #e5e5e5;">
				<!--meta http-equiv="refresh" content="30"-->
	            <tr>
	              <th width="250px"><center><h5>Nama Daerah</h5></center></th>
	              <th width="130px"><center><h5>Sistem</h5></center></th>
	              <th width="100px"><center><h5>Tgl Terima</h5></center></th>
				  <th width="20px"><center><h5>Apl</h5></center></th>
				  <th width="20px"><center><h5>Db</h5></center></th>
	              <th width="70px"><center><h5>Kapasitas</h5></center></th>
	              <th width="80px"><center><h5>Status Backup</h5></center></th>
	              <th><center><h5>Keterangan</h5></center></th>
	              
	            </tr>
          	   </thead>
          	   <tbody>
				<?php
				
				$conn_string = "host=localhost port=5432 dbname=e-monitoring user=postgres password=faizpg";
				$connection = pg_connect($conn_string);
				if(date('m')!=1){
				$bulanan = sprintf("%02d",date('m')-1);
				}else{
				$bulanan = 12;
				}
				//$bulan = date('m');
				$tahun = date('Y');
					 $query="select * from (
						select ('1') as nomor,a.kd_area,a.kd_area as kode,a.nm_area as area,'' as nm_sistem,'' as kd_sistem,'' as bulan,'' as tahun,
						to_timestamp(1991-03-22) as tgl_terima,'' as jenis_data,'' as kapasitas,'' as status,'' as keterangan,'' as detail
						from ms_area a join ms_wilayah_child b on a.kd_area=b.kd_area GROUP BY a.kd_area,a.nm_area

						UNION
						
						select ('2') as nomor,a.kd_area,a.kd_subarea as kode,upper(a.nm_subarea) as area,'' as nm_sistem,'' as kd_sistem,'' as bulan,'' as tahun,
						to_timestamp(1991-03-22) as tgl_terima,'' as jenis_data,'' as kapasitas,'' as status,'' as keterangan,'' as detail 
						from ms_area_sub a join ms_wilayah_child b 
						on a.kd_area=b.kd_area and a.kd_subarea=b.kd_subarea GROUP BY a.kd_subarea,a.kd_area,a.nm_subarea

						UNION 

						select ('3') as nomor,a.kd_area,a.kd_subarea as kode,b.nm_area as area,a.nm_sistem,a.kd_sistem,
						(select bulan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='$bulanan' and tahun='$tahun') as bulan,
						(select tahun from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='$bulanan' and tahun='$tahun') as tahun,
						(select tgl_terima from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='$bulanan' and tahun='$tahun') as tgl_terima,
						(select jenis_data from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='$bulanan' and tahun='$tahun') as jenis_data,
						(select kapasitas from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='$bulanan' and tahun='$tahun') as kapasitas,
						(select status from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='$bulanan' and tahun='$tahun') as status,
						(select keterangan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='$bulanan' and tahun='$tahun') as keterangan,
						'' as detail 
						from ms_wilayah_child a
						JOIN ms_wilayah b on a.kd_area=b.kd_area and a.kd_subarea=b.kd_subarea and a.kd_wilayah=b.kd_wilayah 

						)x ORDER BY kd_area ASC,kode ASC,nomor ASC";
				 $result = pg_query($connection, $query) or die('Query failed: ' . pg_last_error());
				 while ($resulte = pg_fetch_array($result, null, PGSQL_ASSOC)) {
				
		if($resulte['nomor']=='1'){
		  $bold='<b>';
		  $spasi='';
		  $bold2='</b>';
		  $tgl= '';
		  $area="<h4 class='icon-map-marker'> ".$resulte['area'].'</h5>';
		  $bg='';
		  $cstat ="";
		} 
		if($resulte['nomor']=='2'){
		  $bold='<b>';
		  $spasi='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		  $bold2='</b>';
		  $tgl= '';
		  $area=$resulte['area'];
		  $bg='';
		  $cstat ="";
		  }
		if($resulte['nomor']=='3'){
		  $bold='';
		  $spasi='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		  $bold2='';
		  $tgl = substr($resulte['tgl_terima'],0,10);
		  
		  $area='';
		  $stat = $resulte['status'];
          $cstat ="<a href='#' class='cstat' data-type='select' data-subarea='".$resulte['kode']."' data-sistem='".$resulte['kd_sistem']."' data-value='".$resulte['status']."'></a>";
		
		  } 
					
			if($resulte['status']==0){
				$status='Belum';
			}else{
				$status='Backup';
			}
		
		if(substr($resulte['jenis_data'],0,2)=='Ap' && strlen($resulte['jenis_data'])>10){
			$ap = "<i class='icon-ok' style='color:blue;'></i>";
			$db = "<i class='icon-ok' style='color:blue;'></i>";
		}elseif(substr($resulte['jenis_data'],0,2)=='Ap' && strlen($resulte['jenis_data'])<15){
			$ap = "<i class='icon-ok' style='color:blue;'></i>";
			$db = "<i class='icon-remove' style='color:red;'></i>";
		}else{
			$ap = "<i class='icon-remove' style='color:red;'></i>";
			$db = "<i class='icon-ok' style='color:blue;'></i>";
		}	
			
		?>
			
			<?php if($resulte['nomor']=='3'){?>
			
					<?php if($resulte['jenis_data']==''){?>
						<tr>
							  <td ><?php  ?></td>
							  <td bgcolor='#FA8072' ><?php echo $resulte['nm_sistem'];?></td>
							  <td bgcolor='#FA8072' ><?php echo '-' ?></td>
							  <td bgcolor='#FA8072' ><?php echo $resulte['jenis_data'];?></td>
							  <td bgcolor='#FA8072' ><?php echo '-'?></td>
							  <td bgcolor='#FA8072' ><?php echo '-'?></td>
							  <td bgcolor='#FA8072' ><?php echo '-'?></td>
							  <td bgcolor='#FA8072' ><?php echo $resulte['detail'];?></td>
						</tr>
					<?php }else{?>
						<tr>
							  <td ><?php  ?></td>
							  <td bgcolor='#98FB98' ><?php echo $resulte['nm_sistem'];?></td>
							  <td bgcolor='#98FB98' ><?php echo tanggal_indo($tgl);?></td>
							  <td bgcolor='#98FB98' ><center><?php echo $ap;?></center></td>
							  <td bgcolor='#98FB98' ><center><?php echo $db;?></center></td>
							  <td bgcolor='#98FB98' ><?php echo $resulte['kapasitas'];?> Mb</td>
							  <td bgcolor='#98FB98' ><center><?php echo $status;?></center></td>
							  <td bgcolor='#98FB98' ><?php echo $resulte['keterangan'];?></td>
						</tr>
					<?php }?>
			<?php }else{?>
				<?php if($resulte['nomor']=='1'){?>
						<tr>
							  <td bgcolor='#EEEEEE'><h3 class='icon-map-marker'> <?php echo $resulte['area'];?></h3></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['nm_sistem'];?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['jenis_data'];?></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['kapasitas'];?></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['status'];?></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['keterangan'];?></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['detail'];?></td>
						</tr>
					<?php }else{?>
						<tr>
							  <td bgcolor='#EEEEEE'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h4 class='icon-paper-clip'>&nbsp;&nbsp;<?php echo $resulte['area'];?></h5></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['nm_sistem'];?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['jenis_data'];?></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['kapasitas'];?></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['status'];?></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['keterangan'];?></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['detail'];?></td>
						</tr>
					<?php }?>
			<?php }?>
		<?php }?>
			  
			   </tbody>
          	</table>
          	   <small><i class="icon-sign-blank" style='color:#98FB98;font-size:10px'></i> Data Sudah diterima QA.</small>
          	   <br>
          	   <small><i class="icon-sign-blank" style='color:#FA8072;font-size:10px'></i> Data Belum diterima QA.</small>
          	   <br>
          	   <small>* Default refresh otomatis setiap 30 detik.</small><br>
			</div>
 </div>
 
<div id="tahunan" class="tabcontent " style="width:1325px;align:center;padding-right:0px;">		
		<div class="widget-header">
			<i class="icon-random"></i>
			<h3>Tracking Project Daerah</h3>
		</div> <!-- /widget-header -->
			<div  class=" widget-content">
			<table style='font-size:14px;' class='table table-bordered table-hover table-heading table-datatable' id='datatable-1'>
         	  <thead style="background-color: #e5e5e5;">
	            <tr>
	              <th rowspan="2" ><center><h5>Nama Daerah</h5></center></th>
	              <th rowspan="2" ><center><h5>Sistem</h5></center></th>
				  <th colspan="2" scope="colgroup"><center>Jan</center></th>
				  <th colspan="2" scope="colgroup"><center>feb</center></th>
				  <th colspan="2" scope="colgroup"><center>Mar</center></th>
				  <th colspan="2" scope="colgroup"><center>Apr</center></th>
				  <th colspan="2" scope="colgroup"><center>Mei</center></th>
				  <th colspan="2" scope="colgroup"><center>Jun</center></th>
				  <th colspan="2" scope="colgroup"><center>Jul</center></th>
				  <th colspan="2" scope="colgroup"><center>Ags</center></th>
				  <th colspan="2" scope="colgroup"><center>Sep</center></th>
				  <th colspan="2" scope="colgroup"><center>Okt</center></th>
				  <th colspan="2" scope="colgroup"><center>Nov</center></th>
				  <th colspan="2" scope="colgroup"><center>Des</center></th>
	              <th rowspan="2" ><center><h5>Keterangan</h5></center></th>
	            </tr>
				
				  <tr>
					<th scope="col">Apl</th>
					<th scope="col">Db</th>
					<th scope="col">Apl</th>
					<th scope="col">Db</th>
					<th scope="col">Apl</th>
					<th scope="col">Db</th>
					<th scope="col">Apl</th>
					<th scope="col">Db</th>
					<th scope="col">Apl</th>
					<th scope="col">Db</th>
					<th scope="col">Apl</th>
					<th scope="col">Db</th>
					<th scope="col">Apl</th>
					<th scope="col">Db</th>
					<th scope="col">Apl</th>
					<th scope="col">Db</th>
					<th scope="col">Apl</th>
					<th scope="col">Db</th>
					<th scope="col">Apl</th>
					<th scope="col">Db</th>
					<th scope="col">Apl</th>
					<th scope="col">Db</th>
					<th scope="col">Apl</th>
					<th scope="col">Db</th>
				  </tr>
				
          	   </thead>
          	   <tbody>
				<?php
				
				$conn_string = "host=localhost port=5432 dbname=e-monitoring user=postgres password=faizpg";
				$connection = pg_connect($conn_string);
				
					 $query="select * from (
						select ('1') as nomor,a.kd_area,a.kd_area as kode,a.nm_area as area,'' as nm_sistem,'' as kd_sistem,
						
						'' as bulan1,to_timestamp(1991-03-22) as tgl_terima1,'' as jenis_data1,'' as kapasitas1,'' as status1,'' as keterangan1,
						'' as bulan2,to_timestamp(1991-03-22) as tgl_terima2,'' as jenis_data2,'' as kapasitas2,'' as status2,'' as keterangan2,
						'' as bulan3,to_timestamp(1991-03-22) as tgl_terima3,'' as jenis_data3,'' as kapasitas3,'' as status3,'' as keterangan3,
						'' as bulan4,to_timestamp(1991-03-22) as tgl_terima4,'' as jenis_data4,'' as kapasitas4,'' as status4,'' as keterangan4,
						'' as bulan5,to_timestamp(1991-03-22) as tgl_terima5,'' as jenis_data5,'' as kapasitas5,'' as status5,'' as keterangan5,
						'' as bulan6,to_timestamp(1991-03-22) as tgl_terima6,'' as jenis_data6,'' as kapasitas6,'' as status6,'' as keterangan6,
						'' as bulan7,to_timestamp(1991-03-22) as tgl_terima7,'' as jenis_data7,'' as kapasitas7,'' as status7,'' as keterangan7,
						'' as bulan8,to_timestamp(1991-03-22) as tgl_terima8,'' as jenis_data8,'' as kapasitas8,'' as status8,'' as keterangan8,
						'' as bulan9,to_timestamp(1991-03-22) as tgl_terima9,'' as jenis_data9,'' as kapasitas9,'' as status9,'' as keterangan9,
						'' as bulan10,to_timestamp(1991-03-22) as tgl_terima10,'' as jenis_data10,'' as kapasitas10,'' as status10,'' as keterangan10,
						'' as bulan11,to_timestamp(1991-03-22) as tgl_terima11,'' as jenis_data11,'' as kapasitas11,'' as status11,'' as keterangan11,
						'' as bulan12,to_timestamp(1991-03-22) as tgl_terima12,'' as jenis_data12,'' as kapasitas12,'' as status12,'' as keterangan12,
						
						'' as detail
						from ms_area a join ms_wilayah_child b on a.kd_area=b.kd_area GROUP BY a.kd_area,a.nm_area

						UNION
						
						select ('2') as nomor,a.kd_area,a.kd_subarea as kode,upper(a.nm_subarea) as area,'' as nm_sistem,'' as kd_sistem,
						
						'' as bulan1,to_timestamp(1991-03-22) as tgl_terima1,'' as jenis_data1,'' as kapasitas1,'' as status1,'' as keterangan1,
						'' as bulan2,to_timestamp(1991-03-22) as tgl_terima2,'' as jenis_data2,'' as kapasitas2,'' as status2,'' as keterangan2,
						'' as bulan3,to_timestamp(1991-03-22) as tgl_terima3,'' as jenis_data3,'' as kapasitas3,'' as status3,'' as keterangan3,
						'' as bulan4,to_timestamp(1991-03-22) as tgl_terima4,'' as jenis_data4,'' as kapasitas4,'' as status4,'' as keterangan4,
						'' as bulan5,to_timestamp(1991-03-22) as tgl_terima5,'' as jenis_data5,'' as kapasitas5,'' as status5,'' as keterangan5,
						'' as bulan6,to_timestamp(1991-03-22) as tgl_terima6,'' as jenis_data6,'' as kapasitas6,'' as status6,'' as keterangan6,
						'' as bulan7,to_timestamp(1991-03-22) as tgl_terima7,'' as jenis_data7,'' as kapasitas7,'' as status7,'' as keterangan7,
						'' as bulan8,to_timestamp(1991-03-22) as tgl_terima8,'' as jenis_data8,'' as kapasitas8,'' as status8,'' as keterangan8,
						'' as bulan9,to_timestamp(1991-03-22) as tgl_terima9,'' as jenis_data9,'' as kapasitas9,'' as status9,'' as keterangan9,
						'' as bulan10,to_timestamp(1991-03-22) as tgl_terima10,'' as jenis_data10,'' as kapasitas10,'' as status10,'' as keterangan10,
						'' as bulan11,to_timestamp(1991-03-22) as tgl_terima11,'' as jenis_data11,'' as kapasitas11,'' as status11,'' as keterangan11,
						'' as bulan12,to_timestamp(1991-03-22) as tgl_terima12,'' as jenis_data12,'' as kapasitas12,'' as status12,'' as keterangan12,
						
						'' as detail 
						from ms_area_sub a join ms_wilayah_child b 
						on a.kd_area=b.kd_area and a.kd_subarea=b.kd_subarea GROUP BY a.kd_subarea,a.kd_area,a.nm_subarea

						UNION 

						select ('3') as nomor,a.kd_area,a.kd_subarea as kode,b.nm_area as area,a.nm_sistem,a.kd_sistem,
						
						(select bulan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='01' and tahun='$tahun') as bulan1,
						(select tgl_terima from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='01' and tahun='$tahun') as tgl_terima1,
						(select jenis_data from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='01' and tahun='$tahun') as jenis_data1,
						(select kapasitas from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='01' and tahun='$tahun') as kapasitas1,
						(select status from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='01' and tahun='$tahun') as status1,
						(select keterangan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='01' and tahun='$tahun') as keterangan1,
						
						(select bulan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='02' and tahun='$tahun') as bulan2,
						(select tgl_terima from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='02' and tahun='$tahun') as tgl_terima2,
						(select jenis_data from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='02' and tahun='$tahun') as jenis_data2,
						(select kapasitas from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='02' and tahun='$tahun') as kapasitas2,
						(select status from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='02' and tahun='$tahun') as status2,
						(select keterangan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='02' and tahun='$tahun') as keterangan2,
						
						(select bulan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='03' and tahun='$tahun') as bulan3,
						(select tgl_terima from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='03' and tahun='$tahun') as tgl_terima3,
						(select jenis_data from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='03' and tahun='$tahun') as jenis_data3,
						(select kapasitas from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='03' and tahun='$tahun') as kapasitas3,
						(select status from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='03' and tahun='$tahun') as status3,
						(select keterangan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='03' and tahun='$tahun') as keterangan3,
						
						(select bulan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='04' and tahun='$tahun') as bulan4,
						(select tgl_terima from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='04' and tahun='$tahun') as tgl_terima4,
						(select jenis_data from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='04' and tahun='$tahun') as jenis_data4,
						(select kapasitas from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='04' and tahun='$tahun') as kapasitas4,
						(select status from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='04' and tahun='$tahun') as status4,
						(select keterangan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='04' and tahun='$tahun') as keterangan4,
						
						(select bulan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='05' and tahun='$tahun') as bulan5,
						(select tgl_terima from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='05' and tahun='$tahun') as tgl_terima5,
						(select jenis_data from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='05' and tahun='$tahun') as jenis_data5,
						(select kapasitas from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='05' and tahun='$tahun') as kapasitas5,
						(select status from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='05' and tahun='$tahun') as status5,
						(select keterangan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='05' and tahun='$tahun') as keterangan5,
						
						(select bulan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='06' and tahun='$tahun') as bulan6,
						(select tgl_terima from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='06' and tahun='$tahun') as tgl_terima6,
						(select jenis_data from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='06' and tahun='$tahun') as jenis_data6,
						(select kapasitas from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='06' and tahun='$tahun') as kapasitas6,
						(select status from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='06' and tahun='$tahun') as status6,
						(select keterangan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='06' and tahun='$tahun') as keterangan6,
						
						(select bulan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='07' and tahun='$tahun') as bulan7,
						(select tgl_terima from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='07' and tahun='$tahun') as tgl_terima7,
						(select jenis_data from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='07' and tahun='$tahun') as jenis_data7,
						(select kapasitas from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='07' and tahun='$tahun') as kapasitas7,
						(select status from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='07' and tahun='$tahun') as status7,
						(select keterangan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='07' and tahun='$tahun') as keterangan7,
						
						(select bulan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='08' and tahun='$tahun') as bulan8,
						(select tgl_terima from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='08' and tahun='$tahun') as tgl_terima8,
						(select jenis_data from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='08' and tahun='$tahun') as jenis_data8,
						(select kapasitas from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='08' and tahun='$tahun') as kapasitas8,
						(select status from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='08' and tahun='$tahun') as status8,
						(select keterangan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='08' and tahun='$tahun') as keterangan8,
						
						(select bulan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='09' and tahun='$tahun') as bulan9,
						(select tgl_terima from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='09' and tahun='$tahun') as tgl_terima9,
						(select jenis_data from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='09' and tahun='$tahun') as jenis_data9,
						(select kapasitas from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='09' and tahun='$tahun') as kapasitas9,
						(select status from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='09' and tahun='$tahun') as status9,
						(select keterangan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='09' and tahun='$tahun') as keterangan9,
						
						(select bulan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='10' and tahun='$tahun') as bulan10,
						(select tgl_terima from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='10' and tahun='$tahun') as tgl_terima10,
						(select jenis_data from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='10' and tahun='$tahun') as jenis_data10,
						(select kapasitas from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='10' and tahun='$tahun') as kapasitas10,
						(select status from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='10' and tahun='$tahun') as status10,
						(select keterangan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='10' and tahun='$tahun') as keterangan10,
						
						(select bulan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='11' and tahun='$tahun') as bulan11,
						(select tgl_terima from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='11' and tahun='$tahun') as tgl_terima11,
						(select jenis_data from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='11' and tahun='$tahun') as jenis_data11,
						(select kapasitas from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='11' and tahun='$tahun') as kapasitas11,
						(select status from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='11' and tahun='$tahun') as status11,
						(select keterangan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='11' and tahun='$tahun') as keterangan11,
						
						(select bulan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='12' and tahun='$tahun') as bulan12,
						(select tgl_terima from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='12' and tahun='$tahun') as tgl_terima12,
						(select jenis_data from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='12' and tahun='$tahun') as jenis_data12,
						(select kapasitas from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='12' and tahun='$tahun') as kapasitas12,
						(select status from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='12' and tahun='$tahun') as status12,
						(select keterangan from e_monitor where kd_area=a.kd_area and kd_subarea=b.kd_subarea and kd_sistem=a.kd_sistem and bulan='12' and tahun='$tahun') as keterangan12,
						
						'' as detail 
						from ms_wilayah_child a
						JOIN ms_wilayah b on a.kd_area=b.kd_area and a.kd_subarea=b.kd_subarea and a.kd_wilayah=b.kd_wilayah 

						)x ORDER BY kd_area ASC,kode ASC,nomor ASC";
				
				 $result = pg_query($connection, $query) or die('Query failed: ' . pg_last_error());
				 while ($resulte = pg_fetch_array($result, null, PGSQL_ASSOC)) {
				
		if($resulte['nomor']=='1'){
		  $bold='<b>';
		  $spasi='';
		  $bold2='</b>';
		  $tgl= '';
		  $area="<h4 class='icon-map-marker'> ".$resulte['area'].'</h5>';
		  $bg='';
		  $cstat ="";
		} 
		if($resulte['nomor']=='2'){
		  $bold='<b>';
		  $spasi='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		  $bold2='</b>';
		  $tgl= '';
		  $area=$resulte['area'];
		  $bg='';
		  $cstat ="";
		  }
		if($resulte['nomor']=='3'){
		  $bold='';
		  $spasi='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		  $bold2='';
		  $tgl = substr($resulte['tgl_terima'],0,10);
		  
		  $area='';
		  $stat = $resulte['status'];
          $cstat ="<a href='#' class='cstat' data-type='select' data-subarea='".$resulte['kode']."' data-sistem='".$resulte['kd_sistem']."' data-value='".$resulte['status']."'></a>";
		
		  } 
					
		/* 	if($resulte['status']==0){
				$status='Belum';
			}else{
				$status='Backup';
			} */
		if($resulte['jenis_data1']==''){
			$ap1 = "<i class='icon-remove' style='color:red;'></i>";
			$db1 = "<i class='icon-remove' style='color:red;'></i>";
		}elseif(substr($resulte['jenis_data1'],0,2)=='Ap' && strlen($resulte['jenis_data1'])>10){
			$ap1 = "<i class='icon-ok' style='color:green;'></i>";
			$db1 = "<i class='icon-ok' style='color:green;'></i>";
		}elseif(substr($resulte['jenis_data1'],0,2)=='Ap' && strlen($resulte['jenis_data1'])<15){
			$ap1 = "<i class='icon-ok' style='color:green;'></i>";
			$db1 = "<i class='icon-remove' style='color:red;'></i>";
		}else{
			$ap1 = "<i class='icon-remove' style='color:red;'></i>";
			$db1 = "<i class='icon-ok' style='color:green;'></i>";
		}	
			
		if($resulte['jenis_data2']==''){
			$ap2 = "<i class='icon-remove' style='color:red;'></i>";
			$db2 = "<i class='icon-remove' style='color:red;'></i>";
		}elseif(substr($resulte['jenis_data2'],0,2)=='Ap' && strlen($resulte['jenis_data2'])>10){
			$ap2 = "<i class='icon-ok' style='color:green;'></i>";
			$db2 = "<i class='icon-ok' style='color:green;'></i>";
		}elseif(substr($resulte['jenis_data2'],0,2)=='Ap' && strlen($resulte['jenis_data2'])<15){
			$ap2 = "<i class='icon-ok' style='color:green;'></i>";
			$db2 = "<i class='icon-remove' style='color:red;'></i>";
		}else{
			$ap2 = "<i class='icon-remove' style='color:red;'></i>";
			$db2 = "<i class='icon-ok' style='color:green;'></i>";
		}	
			
		if($resulte['jenis_data3']==''){
			$ap3 = "<i class='icon-remove' style='color:red;'></i>";
			$db3 = "<i class='icon-remove' style='color:red;'></i>";
		}elseif(substr($resulte['jenis_data3'],0,2)=='Ap' && strlen($resulte['jenis_data3'])>10){
			$ap3 = "<i class='icon-ok' style='color:green;'></i>";
			$db3 = "<i class='icon-ok' style='color:green;'></i>";
		}elseif(substr($resulte['jenis_data3'],0,2)=='Ap' && strlen($resulte['jenis_data3'])<15){
			$ap3 = "<i class='icon-ok' style='color:green;'></i>";
			$db3 = "<i class='icon-remove' style='color:red;'></i>";
		}else{
			$ap3 = "<i class='icon-remove' style='color:red;'></i>";
			$db3 = "<i class='icon-ok' style='color:green;'></i>";
		}	
			
		if($resulte['jenis_data4']==''){
			$ap4 = "<i class='icon-remove' style='color:red;'></i>";
			$db4 = "<i class='icon-remove' style='color:red;'></i>";
		}elseif(substr($resulte['jenis_data4'],0,2)=='Ap' && strlen($resulte['jenis_data4'])>10){
			$ap4 = "<i class='icon-ok' style='color:green;'></i>";
			$db4 = "<i class='icon-ok' style='color:green;'></i>";
		}elseif(substr($resulte['jenis_data4'],0,2)=='Ap' && strlen($resulte['jenis_data4'])<15){
			$ap4 = "<i class='icon-ok' style='color:green;'></i>";
			$db4 = "<i class='icon-remove' style='color:red;'></i>";
		}else{
			$ap4 = "<i class='icon-remove' style='color:red;'></i>";
			$db4 = "<i class='icon-ok' style='color:green;'></i>";
		}	
			
		if($resulte['jenis_data5']==''){
			$ap5 = "<i class='icon-remove' style='color:red;'></i>";
			$db5 = "<i class='icon-remove' style='color:red;'></i>";
		}elseif(substr($resulte['jenis_data5'],0,2)=='Ap' && strlen($resulte['jenis_data5'])>10){
			$ap5 = "<i class='icon-ok' style='color:green;'></i>";
			$db5 = "<i class='icon-ok' style='color:green;'></i>";
		}elseif(substr($resulte['jenis_data5'],0,2)=='Ap' && strlen($resulte['jenis_data5'])<15){
			$ap5 = "<i class='icon-ok' style='color:green;'></i>";
			$db5 = "<i class='icon-remove' style='color:red;'></i>";
		}else{
			$ap5 = "<i class='icon-remove' style='color:red;'></i>";
			$db5 = "<i class='icon-ok' style='color:green;'></i>";
		}	
			
		if($resulte['jenis_data6']==''){
			$ap6 = "<i class='icon-remove' style='color:red;'></i>";
			$db6 = "<i class='icon-remove' style='color:red;'></i>";
		}elseif(substr($resulte['jenis_data6'],0,2)=='Ap' && strlen($resulte['jenis_data6'])>10){
			$ap6 = "<i class='icon-ok' style='color:green;'></i>";
			$db6 = "<i class='icon-ok' style='color:green;'></i>";
		}elseif(substr($resulte['jenis_data6'],0,2)=='Ap' && strlen($resulte['jenis_data6'])<15){
			$ap6 = "<i class='icon-ok' style='color:green;'></i>";
			$db6 = "<i class='icon-remove' style='color:red;'></i>";
		}else{
			$ap6 = "<i class='icon-remove' style='color:red;'></i>";
			$db6 = "<i class='icon-ok' style='color:green;'></i>";
		}	
			
		if($resulte['jenis_data7']==''){
			$ap7 = "<i class='icon-remove' style='color:red;'></i>";
			$db7 = "<i class='icon-remove' style='color:red;'></i>";
		}elseif(substr($resulte['jenis_data7'],0,2)=='Ap' && strlen($resulte['jenis_data7'])>10){
			$ap7 = "<i class='icon-ok' style='color:green;'></i>";
			$db7 = "<i class='icon-ok' style='color:green;'></i>";
		}elseif(substr($resulte['jenis_data7'],0,2)=='Ap' && strlen($resulte['jenis_data7'])<15){
			$ap7 = "<i class='icon-ok' style='color:green;'></i>";
			$db7 = "<i class='icon-remove' style='color:red;'></i>";
		}else{
			$ap7 = "<i class='icon-remove' style='color:red;'></i>";
			$db7 = "<i class='icon-ok' style='color:green;'></i>";
		}	
			
		if($resulte['jenis_data8']==''){
			$ap8 = "<i class='icon-remove' style='color:red;'></i>";
			$db8 = "<i class='icon-remove' style='color:red;'></i>";
		}elseif(substr($resulte['jenis_data8'],0,2)=='Ap' && strlen($resulte['jenis_data8'])>10){
			$ap8 = "<i class='icon-ok' style='color:green;'></i>";
			$db8 = "<i class='icon-ok' style='color:green;'></i>";
		}elseif(substr($resulte['jenis_data8'],0,2)=='Ap' && strlen($resulte['jenis_data8'])<15){
			$ap8 = "<i class='icon-ok' style='color:green;'></i>";
			$db8 = "<i class='icon-remove' style='color:red;'></i>";
		}else{
			$ap8 = "<i class='icon-remove' style='color:red;'></i>";
			$db8 = "<i class='icon-ok' style='color:green;'></i>";
		}	
			
		if($resulte['jenis_data9']==''){
			$ap9 = "<i class='icon-remove' style='color:red;'></i>";
			$db9 = "<i class='icon-remove' style='color:red;'></i>";
		}elseif(substr($resulte['jenis_data9'],0,2)=='Ap' && strlen($resulte['jenis_data9'])>10){
			$ap9 = "<i class='icon-ok' style='color:green;'></i>";
			$db9 = "<i class='icon-ok' style='color:green;'></i>";
		}elseif(substr($resulte['jenis_data9'],0,2)=='Ap' && strlen($resulte['jenis_data9'])<15){
			$ap9 = "<i class='icon-ok' style='color:green;'></i>";
			$db9 = "<i class='icon-remove' style='color:red;'></i>";
		}else{
			$ap9 = "<i class='icon-remove' style='color:red;'></i>";
			$db9 = "<i class='icon-ok' style='color:green;'></i>";
		}	
			
		if($resulte['jenis_data10']==''){
			$ap10 = "<i class='icon-remove' style='color:red;'></i>";
			$db10 = "<i class='icon-remove' style='color:red;'></i>";
		}elseif(substr($resulte['jenis_data10'],0,2)=='Ap' && strlen($resulte['jenis_data10'])>10){
			$ap10 = "<i class='icon-ok' style='color:green;'></i>";
			$db10 = "<i class='icon-ok' style='color:green;'></i>";
		}elseif(substr($resulte['jenis_data10'],0,2)=='Ap' && strlen($resulte['jenis_data10'])<15){
			$ap10 = "<i class='icon-ok' style='color:green;'></i>";
			$db10 = "<i class='icon-remove' style='color:red;'></i>";
		}else{
			$ap10 = "<i class='icon-remove' style='color:red;'></i>";
			$db10 = "<i class='icon-ok' style='color:green;'></i>";
		}	
			
		if($resulte['jenis_data11']==''){
			$ap11 = "<i class='icon-remove' style='color:red;'></i>";
			$db11 = "<i class='icon-remove' style='color:red;'></i>";
		}elseif(substr($resulte['jenis_data11'],0,2)=='Ap' && strlen($resulte['jenis_data11'])>10){
			$ap11 = "<i class='icon-ok' style='color:green;'></i>";
			$db11 = "<i class='icon-ok' style='color:green;'></i>";
		}elseif(substr($resulte['jenis_data11'],0,2)=='Ap' && strlen($resulte['jenis_data11'])<15){
			$ap11 = "<i class='icon-ok' style='color:green;'></i>";
			$db11 = "<i class='icon-remove' style='color:red;'></i>";
		}else{
			$ap11 = "<i class='icon-remove' style='color:red;'></i>";
			$db11 = "<i class='icon-ok' style='color:green;'></i>";
		}	
			
		if($resulte['jenis_data12']==''){
			$ap12 = "<i class='icon-remove' style='color:red;'></i>";
			$db12 = "<i class='icon-remove' style='color:red;'></i>";
		}elseif(substr($resulte['jenis_data12'],0,2)=='Ap' && strlen($resulte['jenis_data12'])>10){
			$ap12 = "<i class='icon-ok' style='color:green;'></i>";
			$db12 = "<i class='icon-ok' style='color:green;'></i>";
		}elseif(substr($resulte['jenis_data12'],0,2)=='Ap' && strlen($resulte['jenis_data12'])<15){
			$ap12 = "<i class='icon-ok' style='color:green;'></i>";
			$db12 = "<i class='icon-remove' style='color:red;'></i>";
		}else{
			$ap12 = "<i class='icon-remove' style='color:red;'></i>";
			$db12 = "<i class='icon-ok' style='color:green;'></i>";
		}
		?>
			
			<?php if($resulte['nomor']=='3'){?>
						<tr>
							  <td ><center><?php  ?></td>
							  <td ><?php echo $resulte['nm_sistem'];?></td>
							  <td ><center><?php echo $ap1;?></center></td>
							  <td ><center><?php echo $db1;?></center></td>
							  <td ><center><?php echo $ap2;?></center></td>
							  <td ><center><?php echo $db2;?></center></td>
							  <td ><center><?php echo $ap3;?></center></td>
							  <td ><center><?php echo $db3;?></center></td>
							  <td ><center><?php echo $ap4;?></center></td>
							  <td ><center><?php echo $db4;?></center></td>
							  <td ><center><?php echo $ap5;?></center></td>
							  <td ><center><?php echo $db5;?></center></td>
							  <td ><center><?php echo $ap6;?></center></td>
							  <td ><center><?php echo $db6;?></center></td>
							  <td ><center><?php echo $ap7;?></center></td>
							  <td ><center><?php echo $db7;?></center></td>
							  <td ><center><?php echo $ap8;?></center></td>
							  <td ><center><?php echo $db8;?></center></td>
							  <td ><center><?php echo $ap9;?></center></td>
							  <td ><center><?php echo $db9;?></center></td>
							  <td ><center><?php echo $ap10;?></center></td>
							  <td ><center><?php echo $db10;?></center></td>
							  <td ><center><?php echo $ap11;?></center></td>
							  <td ><center><?php echo $db11;?></center></td>
							  <td ><center><?php echo $ap12;?></center></td>
							  <td ><center><?php echo $db12;?></center></td>
							  <td ><center><?php ?></center></td>
						</tr>
			<?php }else{?>
				<?php if($resulte['nomor']=='1'){?>
						<tr>
							  <td bgcolor='#EEEEEE'><h4 class='icon-map-marker'> <?php echo $resulte['area'];?></h5></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['nm_sistem'];?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['jenis_data'];?></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['kapasitas'];?></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['status'];?></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['keterangan'];?></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['detail'];?></td>
						</tr>
					<?php }else{?>
						<tr>
							  <td bgcolor='#EEEEEE'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h4 class='icon-paper-clip'>&nbsp;&nbsp;<?php echo $resulte['area'];?></h5></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['nm_sistem'];?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php  ?></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['jenis_data'];?></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['kapasitas'];?></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['status'];?></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['keterangan'];?></td>
							  <td bgcolor='#EEEEEE' ><?php echo $resulte['detail'];?></td>
						</tr>
					<?php }?>
			<?php }?>
		<?php }?>
			  
			   </tbody>
          	</table>
          	   <small><i class="icon-sign-blank" style='color:#98FB98;font-size:10px'></i> Data Sudah diterima QA.</small>
          	   <br>
          	   <small><i class="icon-sign-blank" style='color:#FA8072;font-size:10px'></i> Data Belum diterima QA.</small>
          	   <br>
          	   <small>* Default refresh otomatis setiap 30 detik.</small><br>
			</div>
</div>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

</body>
	
	