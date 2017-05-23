<div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-bullhorn"></i>
	      				<h3>Form Change Request</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
				<?php echo $this->session->flashdata('notif')?>
							<form class="form-horizontal" id="tickform" enctype="multipart/form-data" role="form" method="post" action="<?php echo base_url();?>app/insert_request">
									<fieldset>
										<div class="control-group">											
											<label class="control-label">Area</label>
											<div class="controls">
												<select class=" span3 populate placeholder select" name="kode_prop" id="kode_prop" onchange="loadarea();" required=''>
												<option value="">-- Pilih Area --</option>
												<?php foreach($prop as $row){
													echo "<option value='".$row['kd_area']."'>".$row['kd_area']." | ".$row['nm_area']."</option>";
												}
												?>
												</select>
											</div> <!-- /controls -->				
										</div>
										<div class="control-group cmodx">											
											<label class="control-label">Sub Area</label>
											<div class="controls">
												<select class="span3 populate placeholder select" name="kode_kab" id="kode_kab" onchange="loadsistem();"required='' >
												
												</select>

											</div> 				
										</div> 
										<div class="control-group cmodx">											
											<label class="control-label">Sistem</label>
											<div class="controls">
												<select class="span3 populate placeholder select" name="kode_sistem" id="kode_sistem"  placeholder='Pilih' onchange="loadmodul();">
												</select>
											</div > 					
										</div>
										<div class="control-group">											
											<label class="control-label">Kode Proyek</label>
											<div class="controls">
												<select class=" span3 populate placeholder select" name="kode_proyek" id="kode_proyek" >
												<option value="">-- Pilih Kode --</option>
												<?php foreach($proyek as $row){
													echo "<option value='".$row['kd_pekerjaan']."'>".$row['kd_pekerjaan']." | ".$row['nm_pekerjaan']."</option>";
												}
												?>
												</select>
											</div>			
										</div>
										<div class="control-group">											
											<label class="control-label">No CR</label>
											<div class="controls">
												<input readonly="" type="text" style="width:30px" class="form-control nocr" name='no_urut_cr' value=""> / <input readonly="" type="text" style="width:30px" class="form-control nosub" name='kode_subarea_cr' value=""> / <input readonly="" type="text" class="form-control nosis"  style="width:70px" name='kode_sistem_cr' value=""> / <input type="text"  style="width:100px" class="form-control nopro" name='kode_proyek_cr' value="">
											</div>			
										</div>
										<div class="control-group">											
											<label class="control-label">Jenis Request</label>
											<div class="controls">
												<div class="col-lg-3 col-md-3 col-sm-3" >
												<input type="radio" name="radio" id="troble" value="1" checked="" > Permasalahan
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3" >
												<input type="radio" name="radio" id="upfitur" value="2" > Penambahan Fitur
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3" >
												<input type="radio" name="radio" id="upmodul" value="3" > Penambahan modul
												</div>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->


										<div class="control-group cmod">											
											<label class="control-label">Modul</label>
											<div class="controls">
												<select class="span3 populate placeholder select" name="cmodul" id="cmodul"  placeholder='Pilih'>
												</select>
											</div > 					
										</div>


										<div style="display: none" class="ketfitur">
										<div class="control-group">											
											<label class="control-label">Keterangan Fitur</label>
											<div class="controls">
												<textarea class="form-control span5" rows="2" id="ketfitur" name="ketfitur" ></textarea>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										</div>

										<div class="control-group">											
											<label class="control-label">Tgl Request</label>
											<div class="controls">
											 <div class="input-prepend input-append">
                                                 
                                                  <input type="text" style="width:100px;" class="span2 form-control" id="datetime_example" placeholder="" name="tgl_request" required=''>
                                                  <span class="add-on"><i class="icon-calendar"></i></span>
                                                </div>
												
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="control-group">											
											<label class="control-label">Tgl Estimasi CR</label>
											<div class="controls">
											 <div class="input-prepend input-append">
                                                 
                                                  <input type="text" style="width:100px;" class="span2 form-control" id="datetime_cr" placeholder="" name="tgl_request_estimate" required=''>
                                                  <span class="add-on"><i class="icon-calendar"></i></span>
                                                </div>
												
											</div> <!-- /controls -->				
										</div>
										<div class="control-group">											
											<label class="control-label">Prioritas</label>
											<div class="controls">
												<select class="populate placeholder " name="prioritas" required=''>
												<option value="">-- Pilih Prioritas --</option>
												<option value='1' >Urgent</option>
												<option value='2' >Biasa</option>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="control-group">											
											<label class="control-label">Uraian</label>
											<div class="controls" style="width: 600px;">
												<textarea class="summernote form-control" rows="3" id="" name="uraian" ></textarea>												
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="control-group">											
											<label class="control-label">Lampiran Gambar</label>
											<div class="controls">
												<input type="file" name="userfile" id="file" />
												<small style='color:red'>max upload : 5Mb | format : jpg, jpeg.</small>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->



									</fieldset>
									<div class="form-actions">
											<button type="submit" class="btn btn-primary btn-label-left" id='save' name="save">
											<span><i class="fa fa-save"> Simpan</i></span></button>
											<a class="btn btn-danger btn-label-left" href="<?php echo base_url();?>app/page_cr">
											<span><i class="fa fa-ban"> Cancel</i></span></a>
									</div>
								</form>
					</div>
				</div>
</div>