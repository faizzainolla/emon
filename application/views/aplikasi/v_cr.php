<div class="span12">      		
<div class="widget ">
	<div class="widget-header">
		<i class="icon-bullhorn"></i>
		<h3>Change Request <?php 
		$oto=$this->session->userdata('oto');
		if($oto=='3'){echo $nm_area['nm_subarea'];}
		?></h3>
	</div> <!-- /widget-header -->
	<div class="widget-content">
	 <div class="control-group">
			<div class="controls">	 
				<div class="inline">
				<a class="btn btn-info btn-label-right" href="<?php echo base_url();?>app/page_cr_form/" >
				<span><i class="icon-plus"> Tambah</i></span></a>
				</div>						
				<div class="help-block with-errors"></div>
			 
						<div>
							<table style='font-size:11px' class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-25">
							
								<thead>
									<tr>
										<th width="150px;"><center>No CR</center></th>
										<th width="150px;">Nama Daerah</th>
										<th width="150px;">Nama Sistem</th>
										<th width="50px;">Tanggal Request</th>
										<th width="30px;">Tipe Request</th>
										<th width="100px;">Tenaga Ahli</th>
										<th width="50px;">Status Pengerjaan</th>
										<th width="50px;">Estimasi Selesai</th>
										<th width="50px;"><center>Aksi</center></th>
									</tr>
								</thead>
							<tbody id="crtrack"></tbody>
							</table>
								<div>
									<small>* Info Request: <i class="icon-warning-sign" style='color:red;font-size:14px'></i> Urgent
									 | <i class="icon-info-sign" style='color:green;font-size:14px'></i> Biasa</small>
								</div>
				</div>
		</div>
		</div>
	 </div>
</div>
<!--POP UP-->
<div id="dialog-wilayah" title="List Sistem" >
	<div class="widget-content">
			<div id='tabelsistem' ></div>
			<div class="form-actions" align="center">
					<button type="submit" id="sis_simpan" class="btn btn-primary btn-label-left" name="save">
					<span><i class="icon-save"> Pilih</i></span></button>
					<button type="reset" onclick="javascript:keluar();" class="btn btn-danger btn-label-left">
					<span><i class="icon-ban-circle"> Cancel</i></span></button>
			</div>
	</div>
</div>	

<script type="text/javascript">
function edit_wilayah(kd_wilayah,kd_area,kd_subarea,nm_area,list_system,nama_pic,jabatan_pic,cp_pic,keterangan){
	var kd_wilayah 	= $('#kode_wilayah').val();
	var nm_area 	= nm_area;
	var list_sistem = list_system;
	var nama_pic 	= nama_pic;
	var jabatan_pic = jabatan_pic;
	var cp_pic 		= cp_pic;
	
	
	$('#kode_prop').val(kd_area);
	$('#kode_wilayah').val(kd_wilayah);
	$('#list_sistem').val(list_sistem);
}
	
$(function(){
	
});
</script>
