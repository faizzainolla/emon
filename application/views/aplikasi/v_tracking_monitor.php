<div class="span12">   
	<div class="widget ">
			<div class="widget-header">
				<i class="icon-random"></i>
				<h3>Data Tracking Bulan <?php 
				$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

				echo $BulanIndo[(int)date('m')-1];?> </h3>
			</div> <!-- /widget-header -->
					
			<div class="widget-content">
			<table style='font-size:11px;' class='table table-bordered table-hover table-heading table-datatable' id='datatable-1'>
         	  <thead style="background-color: #e5e5e5;">
	            <tr>
	              <th width="280px">Nama Daerah</th>
	              <th>Nama Sistem</th>
	              <th width="100px">Tanggal diterima</th>
	              <th width="100px">Jenis Data</th>
	              <th width="50px">Kapasitas</th>
	              <th width="10px">Status Backup</th>
	              <th>Keterangan</th>
	              <th width="40px"></th>
	              
	            </tr>
          	   </thead>
          	   <tbody id="tbtrack"></tbody>
          	</table>
          	   <small><i class="icon-sign-blank" style='color:#98FB98;font-size:14px'></i> Data Sudah diterima QA.</small>
          	   <br>
          	   <small><i class="icon-sign-blank" style='color:#FA8072;font-size:14px'></i> Data Belum diterima QA.</small>
          	   <br>
          	   <small>* Default refresh otomatis setiap 30 detik.</small><br>
			</div>
			<div id='diaHTMLEd' style='display:none'>
			  <div id='divRTE'></div>
			  <!--iframe src='xrte.html' height='300' width='500'></iframe-->
			</div>
	</div>
</div>             
<script type="text/javascript">
</script>