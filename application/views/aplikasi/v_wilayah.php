<div class="span12">      		
<div class="widget ">
	<div class="widget-header">
		<i class="icon-map-marker"></i>
		<h3>Wilayah Manajemen</h3>
	</div> <!-- /widget-header -->
	<div class="widget-content">
	 <div class="control-group">
			<div class="controls">	 
				<div class="inline">
				<a class="btn btn-info btn-label-right" href="<?php echo base_url();?>app/addwilayah/"<?php echo $row['kd_wilayah'];?> >
				<span><i class="icon-plus"> Tambah</i></span></a>
				</div>						<div class="help-block with-errors"></div>
			 
						<div>
							<table style='font-size:11px' class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-2">
							
								<thead>
									<tr>
										<th>Kode Area</th>
										<th>Nama Wilayah</th>
										<th>List System</th>
										<th>PIC</th>
										<th>Contact PIC</th>
										<th width="80px;">Aksi</th>
									</tr>
								</thead>
								<tbody>
								<!-- Start: list_row -->
									<?php 
									foreach($wilgrid as $row){
										
									?>
									<tr>
										<td><?php echo $row['kd_subarea'];?></td>
										<td><?php echo $row['nm_area'];?></td>
										<td><?php echo $row['list_system'];?></td>
										<td><?php echo $row['nama_pic'];?></td>
										<td><?php echo $row['cp_pic'];?></td>
										<td><button type="submit" class="btn btn-danger btn-label-center" name="save" onclick="javascript:master_hapus_wil('ms_wilayah','kd_wilayah','<?php echo $row['kd_wilayah'] ?>')">
											<span><i class="icon-remove"></i></span></button>
											<a class="btn btn-success btn-label-center" href="<?php echo base_url();?>app/addwilayah/<?php echo $row['kd_wilayah'];?>/22">
											<span><i class="icon-pencil"></i></span></a>
										</td>
										
									</tr>
									<?php };?>
								<!-- End: list_row -->
								</tbody>
							</table>
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
