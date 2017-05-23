 <div class="span12">      		
<div class="widget ">
	<div class="widget-header">
		<i class="icon-cogs"></i>
		<h3>Modul Sistem Manajemen</h3>
	</div> <!-- /widget-header -->
	
	<?php $kd_modul = sprintf("%04d",$max['max']+1);?>
	
	<div class="widget-content">
	 <div class="control-group">
			<div class="controls">
			<div class="accordion" id="accordion2">
				<div class="accordion-group">
					<div class="accordion-heading">
					   <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                    Input Modul Sistem
                        </a>
					</div>
					<div id="collapseOne" class="accordion-body collapse in">
                                  <div class="accordion-inner">
                                <?php echo $this->session->flashdata('notif')?>
								<form class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>app/insert_modul_form/"<?php echo $kode_wilayah;?>"/"<?php echo $kode_area;?>"/"<?php echo $kode_subarea;?>"/"<?php echo $kode_sistem;?>"/"<?php echo $nm_sistem;?> >
									<fieldset>
										<div class="control-group">											
											<label class="control-label">Kode Modul</label>
											<div class="controls">
												<input readonly="true" type="text" class="span1" name="kode_modul" value="MOD-<?php echo $kd_modul;?>" required>
												<input readonly="true" type="text" class="span1 hide" name="kode_wilayah" value="<?php echo $kode_wilayah;?>" >
												<input readonly="true" type="text" class="span1 hide" name="kode_area" value="<?php echo $kode_area;?>" >
												<input readonly="true" type="text" class="span1 hide" name="kode_subarea" value="<?php echo $kode_subarea;?>" >
											</div> <!-- /controls -->				
										</div>
										<div class="control-group">											
											<label class="control-label">Kode Sistem</label>
											<div class="controls">
												<input readonly="true" type="text" class="span1" name="kode_sistem" value="<?php echo $kode_sistem;?>" required>
											</div> <!-- /controls -->				
										</div>
										<div class="control-group">											
											<label class="control-label">Nama Sistem</label>
											<div class="controls">
												<input readonly="true" type="text" class="span3" name="nama_sistem" value="<?php echo $nm_sistem;?>" required>
												<input type="text" class="span4 hide" name="f" value='1'>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										<div class="control-group">											
											<label class="control-label">Tahun Sistem</label>
											<div class="controls">
											<?php
													$now = date('Y');
													echo "<select class='span1 populate placeholder select' name='thn_sistem' id='thn_sistem' required>";
													for($tahun=$now;$tahun>=$now-20;$tahun--){
														echo "<option value='".$tahun."' name='".$tahun."'>".$tahun."</option>";
													}
													echo "</select>";

												?>
											</div> <!-- /controls -->				
										</div>  
										<div class="control-group">											
											<label class="control-label">Link Modul</label>
											<div class="controls">
												<input type="text" class="span4"  name="link_modul" required>
											</div> <!-- /controls -->				
										</div>
										<div class="control-group">											
											<label class="control-label">Keterangan</label>
											<div class="controls">
												<Textarea type="text" class="span5"  name="keterangan"></textarea>
											</div> <!-- /controls -->				
										</div>                                     
									</fieldset>
									<div class="form-actions">
											<button type="submit" class="btn btn-primary btn-label-left" name="save">
											<span><i class="icon-save"> Simpan</i></span></button>
											<a type="reset" class="btn btn-danger btn-label-left" href="<?php echo base_url();?>app/page_modul" >
											<span><i class="icon-ban-circle"> Cancel</i></span></a>
									</div>
								</form>
									
										
									
                              </div>
                            </div>
				</div>
			<div class="accordion-group">
							<div class="accordion-heading">
							  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
								List Modul <?php echo $nm_sistem;?>
							  </a>
							</div>
				<div id="collapseTwo" class="accordion-body collapse">
					<div class="accordion-inner">
							<table style='font-size:11px' class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-2">
								<thead>
									<tr>
										<th width="200px;">Id Link</th>
										<th>Link Modul</th>
										<th>Keterangan</th>
										<th width="80px;">Aksi</th>
									</tr>
								</thead>
								<tbody>
								<!-- Start: list_row -->
									<?php 
									foreach($modul as $row){
										
									?>
									<tr>
										<td><?php echo $row['id_modul'];?></td>
										<td><?php echo $row['link_modul'];?></td>
										<td><?php echo $row['keterangan'];?></td>
										<td><button type="submit" class="btn btn-danger btn-label-center" name="save" onclick="javascript:master_hapus('ms_modul','id_modul','<?php echo $row['id_modul'] ?>')">
											<span><i class="icon-remove"></i></span></button>
											<button type="submit" class="btn btn-success btn-label-center" name="save" onclick="javascript:edit_modul('<?php echo $row['kd_wilayah'] ?>','<?php echo $row['kd_area'] ?>','<?php echo $row['kd_subarea'] ?>','<?php echo $row['kd_sistem'] ?>','<?php echo $row['nm_sistem'] ?>','<?php echo $row['id_modul'] ?>','<?php echo $row['link_modul'] ?>','<?php echo $row['keterangan'] ?>')">
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
<div id="dialog-modul" title="Edit Link Modul" <?php echo $nm_sistem?> >
	<div class="widget-content">
	<form class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>app/insert_modul_form">
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