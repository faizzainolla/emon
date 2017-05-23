<div class="span12">      		
<div class="widget ">
	<div class="widget-header">
		<i class="icon-flag"></i>
		<h3>Sub Area Manajemen</h3>
	</div> <!-- /widget-header -->
	<div class="widget-content">
	 <div class="control-group">
			<div class="controls">
			<div class="accordion" id="accordion2">
				<div class="accordion-group">
					<div class="accordion-heading">
					   <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                    Sub Area Sistem
                        </a>
					</div>
					<div id="collapseOne" class="accordion-body collapse in">
                                  <div class="accordion-inner">
                                <?php echo $this->session->flashdata('notif')?>
								<form class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>app/insert_subarea">
									<fieldset>
										<div class="control-group">											
											<label class="control-label">Area</label>
											<div class="controls">
												<select class=" span3 populate placeholder select" name="kode_area" id="kode_area" onchange="mloadarea();" required=''>
												<option value="">-- Pilih Area --</option>
												<?php foreach($prop as $row){
													echo "<option value='".$row['kd_area']."'>".$row['kd_area']." | ".$row['nm_area']."</option>";
												}
												?>
												</select>
											</div> <!-- /controls -->				
										</div>
										<div class="control-group cmod">											
											<label class="control-label">Kode Sub Area</label>
											<div class="controls">
												<input type="text" class="span2" id="kode_subarea" name="kode_subarea" required>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										<div class="control-group">											
											<label class="control-label">Nama Sub Area</label>
											<div class="controls">
												<input type="text" class="span4"  name="nama_subarea" required>
												<input type="text" class="span4 hide" name="f" value='1'>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->                                     
									</fieldset>
									<div class="form-actions">
											<button type="submit" class="btn btn-primary btn-label-left" name="save">
											<span><i class="icon-save"> Simpan</i></span></button>
											<button type="reset" class="btn btn-danger btn-label-left">
											<span><i class="icon-ban-circle"> Cancel</i></span></button>
									</div>
								</form>
									
										
									
                              </div>
                            </div>
				</div>
			<div class="accordion-group">
							<div class="accordion-heading">
							  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
								Data Sub Area
							  </a>
							</div>
				<div id="collapseTwo" class="accordion-body collapse">
					<div class="accordion-inner">
							<table style='font-size:11px' class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-2">
								<thead>
									<tr>
										<th>Kode Area</th>
										<th>Kode Sub Area</th>
										<th>Nama Sub Area</th>
										<th width="80px;">Aksi</th>
									</tr>
								</thead>
								<tbody>
								<!-- Start: list_row -->
									<?php 
									foreach($subarea as $row){
										
									?>
									<tr>
										<td width="100px;"><?php echo $row['kd_area'];?></td>
										<td width="150px;"><?php echo $row['kd_subarea'];?></td>
										<td><?php echo $row['nm_subarea'];?></td>
										<td><button type="submit" class="btn btn-danger btn-label-center" name="save" onclick="javascript:master_hapus('ms_area_sub','kd_subarea','<?php echo $row['kd_subarea'] ?>')">
											<span><i class="icon-remove"></i></span></button>
											<button type="submit" class="btn btn-success btn-label-center" name="save" onclick="javascript:edit_subarea('<?php echo $row['kd_area'] ?>','<?php echo $row['kd_subarea'] ?>','<?php echo $row['nm_subarea'] ?>')">
											<span><i class="icon-pencil"></i></span></button>
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
		</div>
	 </div>
</div>
<!--POP UP-->
<div id="dialog-subarea" title="Edit Sub Area" >
	<div class="widget-content">
	<form class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>app/insert_subarea">
		<div id='dialogsubarea'></div>
		<div class="form-actions">
					<button type="submit" class="btn btn-primary btn-label-left" name="save">
					<span><i class="icon-save"> Simpan</i></span></button>
					<button onclick="javascript:keluar();" type="reset" class="btn btn-danger btn-label-left" >
					<span><i class="icon-ban-circle"> Cancel</i></span></button>
		</div>
	</form>
	</div>
</div>
				