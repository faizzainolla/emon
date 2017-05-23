
<div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-bar-chart"></i>
	      				<h3>Form Monitoring</h3>
	  				</div> <!-- /widget-header -->
					
				<?php $kd_monitor = sprintf("%04d",$max['max']+1);?>
					<div class="widget-content">
				<?php echo $this->session->flashdata('notif')?>
							<form class="form-horizontal" id="tickform" enctype="multipart/form-data" role="form" method="post" action="<?php echo base_url();?>app/insert_monitoring">
									<fieldset>
							<div class="control-group">											
								<label class="control-label">Kode Monitoring</label>
								<div class="controls">
									<input readonly="true" type="text" class="span1" value="MON-<?php echo $kd_monitor;?>" name="kode_monitor" required>
								</div> <!-- /controls -->				
							</div>
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
							<div class="control-group cmod">											
								<label class="control-label">Sub Area</label>
								<div class="controls">
									<select class="span3 populate placeholder select" name="kode_kab" id="kode_kab" onchange="loadsistem();"required='' >
									
									</select>

								</div> 				
							</div> 
						
							<div class="control-group cmod">											
								<label class="control-label">Sistem</label>
								<div class="controls">
									<select class="span2 populate placeholder select" name="kode_sistem" id="kode_sistem"  placeholder='Pilih'>
									</select>
								</div > 					
							</div>
							<div class="control-group" >											
								<label class="control-label">Metode Pengiriman</label>
								<div class="controls">
									<div class="col-lg-4 col-md-4 col-sm-4" >
									<input type="radio" name="radio" id="email" value="1" checked="" > E-mail&nbsp;
									<input type="radio" name="radio" id="cd" value="2" > CD/DVD
									</div>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label">Bulan & Tahun </label>
											<div class="controls">
												<select class="populate placeholder select" id="bulan" name="bulan" required='' style="width:150px" 
																 id="bulan">
																 <option value="01">Januari</option>
																 <option value="02">Februari</option>
																 <option value="03">Maret</option>
																 <option value="04">April</option>
																 <option value="05">Mei</option>
																 <option value="06">Juni</option>
																 <option value="07">Juli</option>
																 <option value="08">Agustus</option>
																 <option value="09">September</option>
																 <option value="10">Oktober</option>
																 <option value="11">November</option>
																 <option value="12">Desember</option>
												</select>&nbsp;
												<select class="populate placeholder select" id="tahun" name="tahun" 
												required='' style="width:150px">
														 <option></option>
															<?php
											
																$now=date('Y');
																for ($a=$now;$a>=$now-20;$a--)
																{
																	 echo "<option class='form-control pull-right' name='a' value='$a'>$a</option>";
																}
															
															?>
												</select>&nbsp;&nbsp;
											</div> <!-- /controls -->				
										</div>
							
										<div class="control-group">											
											<label class="control-label">Tanggal Diterima</label>
											<div class="controls">
											 <div class="input-prepend input-append">
                                                  <input type="text" style="width:100px;" class="span2 form-control" id="datetime_example" placeholder="" name="tgl_terima" required=''>
                                                  <span class="add-on"><i class="icon-calendar"></i></span>
                                             </div>
												
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="control-group">											
											<label class="control-label">Jenis data dikirim</label>
											<div class="controls">
												<select class="span2 populate placeholder " name="jns_data" required=''>
												<option value="">-- Pilih Data --</option>
												<option>Aplikasi</option>
												<option>Database</option>
												<option>Aplikasi+Database</option>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										<div class="control-group">											
											<label class="control-label">Kapasitas</label>
											<div class="controls">
												<input placeholder="exp: 1000" maxlength="5" type="text" class="span1" value="" name="kapasitas"> MB
											</div> <!-- /controls -->				
										</div>
										<div class="control-group">											
											<label class="control-label">Keterangan</label>
											<div class="controls">
												<textarea class="form-control span3" rows="2" style="height:50px" id="" name="keterangan" ></textarea>
											</div> <!-- /controls -->				
										</div> 
									</fieldset>
									<div class="form-actions">
											<button type="submit" class="btn btn-primary btn-label-left" id='save' name="save">
											<span><i class="icon-save"> Simpan</i></span></button>
											<button type="reset" class="btn btn-danger btn-label-left">
											<span><i class="icon-ban-circle"> Cancel</i></span></button>
									</div>
								</form>
					</div>
				</div>
</div>

<script type="text/javascript">
    $(function(){   

	});
</script>