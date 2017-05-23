<div class="span12">      		
<div class="widget ">
	<div class="widget-header">
		<i class="icon-cogs"></i>
		<h3>Sistem Manajemen</h3>
	</div> <!-- /widget-header -->
	
	<?php $kd_sistem = sprintf("%04d",$max['max']+1);?>
	
	<div class="widget-content">
	 <div class="control-group">
			<div class="controls">
			<div class="accordion" id="accordion2">
				<div class="accordion-group">
					<div class="accordion-heading">
					   <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                    Input Sistem
                        </a>
					</div>
					<div id="collapseOne" class="accordion-body collapse in">
                                  <div class="accordion-inner">
                                <?php echo $this->session->flashdata('notif')?>
								<form class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>app/insert_sistem">
									<fieldset>
										<div class="control-group">											
											<label class="control-label">Kode Sistem</label>
											<div class="controls">
												<input readonly="true" type="text" class="span1" name="kode_sistem" value="SYS-<?php echo $kd_sistem;?>" required>
											</div> <!-- /controls -->				
										</div>
										<div class="control-group">											
											<label class="control-label">Nama Sistem</label>
											<div class="controls">
												<input type="text" class="span4"  name="nama_sistem" required>
												<input type="text" class="span4 hide" name="f" value='1'>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										      
										<div class="control-group">											
											<label class="control-label">Detail</label>
											<div class="controls">
												<Textarea type="text" class="span5"  name="detail"></textarea>
											</div> <!-- /controls -->				
										</div>                                     
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
								Data Sistem
							  </a>
							</div>
				<div id="collapseTwo" class="accordion-body collapse">
					<div class="accordion-inner">
							<table style='font-size:11px' class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-2">
								<thead>
									<tr>
										<th>Kode Sistem</th>
										<th>Nama Sistem</th>
										<th>Detail</th>
										<th width="80px;">Aksi</th>
									</tr>
								</thead>
								<tbody>
								<!-- Start: list_row -->
									<?php 
									foreach($sistem as $row){
										
									?>
									<tr>
										<td><?php echo $row['kd_sistem'];?></td>
										<td><?php echo $row['nm_sistem'];?></td>
										<td><?php echo $row['detail'];?></td>
										<td><button type="submit" class="btn btn-danger btn-label-center" name="save" onclick="javascript:master_hapus('ms_sistem','kd_sistem','<?php echo $row['kd_sistem'] ?>')">
											<span><i class="icon-remove"></i></span></button>
											<button type="submit" class="btn btn-success btn-label-center" name="save" onclick="javascript:edit_sistem('<?php echo $row['kd_sistem'] ?>','<?php echo $row['nm_sistem'] ?>','<?php echo $row['detail'] ?>')">
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
<div id="dialog-sistem" title="Edit Sistem" >
	<div class="widget-content">
	<form class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>app/insert_sistem">
		<div id='dialogsistem'></div>
		<div class="form-actions">
					<button type="submit" class="btn btn-primary btn-label-left" name="save">
					<span><i class="icon-save"> Simpan</i></span></button>
					<button onclick="javascript:keluar();" type="reset" class="btn btn-danger btn-label-left" >
					<span><i class="icon-ban-circle"> Cancel</i></span></button>
		</div>
	</form>
	</div>
</div>		