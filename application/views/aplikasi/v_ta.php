<div class="span12">      		
<div class="widget ">
	<div class="widget-header">
		<i class="icon-group"></i>
		<h3>Tenaga Ahli Manajemen</h3>
	</div> <!-- /widget-header -->
	
	<?php $kd_ta = sprintf("%04d",$max['max']+1);?>
	
	<div class="widget-content">
	 <div class="control-group">
			<div class="controls">
			<div class="accordion" id="accordion2">
				<div class="accordion-group">
					<div class="accordion-heading">
					   <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                    Input Tenaga Ahli
                        </a>
					</div>
					<div id="collapseOne" class="accordion-body collapse in">
                                  <div class="accordion-inner">
                                <?php echo $this->session->flashdata('notif')?>
								<form class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>app/insert_ta">
									<fieldset>
										<div class="control-group">											
											<label class="control-label">Kode TA</label>
											<div class="controls">
												<input readonly="true" type="text" class="span1" name="kode_ta" value="KOR-<?php echo $kd_ta;?>" required>
											</div> <!-- /controls -->				
										</div>
										<div class="control-group">											
											<label class="control-label">Nama TA</label>
											<div class="controls">
												<input type="text" class="span4"  name="nama_ta" required>
												<input type="text" class="span4 hide" name="f" value='1'>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										      
										<div class="control-group">											
											<label class="control-label">E-mail TA</label>
											<div class="controls">
												<input type="text" class="span3"  name="email_ta" required>
												<input type="text" class="span4 hide" name="f" value='1'>
											</div> <!-- /controls -->				
										</div>    
										<div class="control-group">											
											<label class="control-label">Contact TA</label>
											<div class="controls">
												<input type="text" class="span3"  name="contact_ta">
											</div> <!-- /controls -->				
										</div> 
										<div class="control-group" id="div_koor">											
											<label class="control-label">Daerah Koordinasi</label>
											<div class="controls">
												<textarea type="text" class="allimpl span4" name="list_daerah" id="list_daerah"></textarea>
												<button type="button" class="btn btn-success btn-sm" id="btn_area"><i class="icon-list"></i></button>
											</div> 						
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
								Data Tenaga Ahli
							  </a>
							</div>
				<div id="collapseTwo" class="accordion-body collapse">
					<div class="accordion-inner">
							<table style='font-size:11px' class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-2">
								<thead>
									<tr>
										<th width="100px;"><center>Kode TA</center></th>
										<th>Nama TA</th>
										<th>E-mail</th>
										<th>Contact</th>
										<th width="80px;">Aksi</th>
									</tr>
								</thead>
								<tbody>
								<!-- Start: list_row -->
									<?php 
									foreach($ta as $row){
										
									?>
									<tr>
										<td><center><?php echo $row['kd_korwil'];?></center></td>
										<td><?php echo $row['nm_korwil'];?></td>
										<td><?php echo $row['email_korwil'];?></td>
										<td><?php echo $row['contact_korwil'];?></td>
										<td><button type="submit" class="btn btn-danger btn-label-center" name="save" onclick="javascript:master_hapus('ms_korwil','kd_korwil','<?php echo $row['kd_korwil'] ?>')">
											<span><i class="icon-remove"></i></span></button>
											<button type="submit" class="btn btn-success btn-label-center" name="save" onclick="javascript:edit_ta('<?php echo $row['kd_korwil'] ?>','<?php echo $row['nm_korwil'] ?>','<?php echo $row['email_korwil'] ?>','<?php echo $row['contact_korwil'] ?>')">
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
<div id="dialog-ta" title="Edit Tenaga Ahli" >
	<div class="widget-content">
	<form class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>app/insert_ta">
		<div id='dialogta'></div>
		<div class="form-actions">
					<button type="submit" class="btn btn-primary btn-label-left" name="save">
					<span><i class="icon-save"> Simpan</i></span></button>
					<button onclick="javascript:keluar();" type="reset" class="btn btn-danger btn-label-left" >
					<span><i class="icon-ban-circle"> Cancel</i></span></button>
		</div>
	</form>
	</div>
</div>		
<!--POP UP-->
<div id="dialog-allimpl" title="List Daerah" style="height:200px;">
	<div class="widget-content">
			<div id='allimpl' ></div>
			<div class="form-actions" align="center">
					<button type="submit" id="ins_allimpl" class="btn btn-primary btn-label-left" name="save">
					<span><i class="icon-save"> Pilih</i></span></button>
					<button type="reset" onclick="javascript:keluar();" class="btn btn-danger btn-label-left">
					<span><i class="icon-ban-circle"> Cancel</i></span></button>
			</div>
	</div>
</div>	