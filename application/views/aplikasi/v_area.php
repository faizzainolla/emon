<div class="span12">      		
<div class="widget ">
	<div class="widget-header">
		<i class="icon-flag"></i>
		<h3>Area Manajemen</h3>
	</div> <!-- /widget-header -->
	<div class="widget-content">
	 <div class="control-group">
			<div class="controls">
			<div class="accordion" id="accordion2">
				<div class="accordion-group">
					<div class="accordion-heading">
					   <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                    Input Area
                        </a>
					</div>
					<div id="collapseOne" class="accordion-body collapse in">
                                  <div class="accordion-inner">
                                <?php echo $this->session->flashdata('notif')?>
								<form class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>app/insert_area">
									<fieldset>
										<div class="control-group">											
											<label class="control-label">Kode Area</label>
											<div class="controls">
												<input type="text" class="span1" name="kode_area" value="" required>
											</div> <!-- /controls -->				
										</div>
										<div class="control-group">											
											<label class="control-label">Nama Area</label>
											<div class="controls">
												<input type="text" class="span4"  name="nama_area" required>
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
								Data Area
							  </a>
							</div>
				<div id="collapseTwo" class="accordion-body collapse">
					<div class="accordion-inner">
							<table style='font-size:11px;align:center;' class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-2">
								<thead>
									<tr>
										<th>Kode Area</th>
										<th>Nama Area</th>
										<th width="80px;">Aksi</th>
									</tr>
								</thead>
								<tbody>
								<!-- Start: list_row -->
									<?php 
									foreach($area as $row){
										
									?>
									<tr>
										<td><?php echo $row['kd_area'];?></td>
										<td><?php echo $row['nm_area'];?></td>
										<td><button type="submit" class="btn btn-danger btn-label-center" name="save" onclick="javascript:master_hapus('ms_area','kd_area','<?php echo $row['kd_area'] ?>')">
											<span><i class="icon-remove"></i></span></button>
											<button type="submit" class="btn btn-success btn-label-center" name="save" onclick="javascript:edit_area('<?php echo $row['kd_area'] ?>','<?php echo $row['nm_area'] ?>')">
											<span><i class="icon-pencil"></i></span></button>
										</td>
										
									</tr>
									<?php };?>
									<!--tr>
										<td colspan='3'>
											<?php
									/* 		$batas = 10;
											$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";
											 
											if ( empty( $pg ) ) {
											$posisi = 0;
											$pg = 1;
											} else {
											$posisi = ( $pg - 1 ) * $batas;
											}
											
											 $q = $this->db->query("select count(*) as total FROM ms_area");
											$cq = $q->row();$jml = $cq->total;
											$JmlHalaman = ceil($jml/$batas); //ceil digunakan untuk pembulatan keatas
											//Navigasi ke previous
											if ( $pg > 1 ) {
											$link = $pg-1;
											$prev = "<a href='?pg=$link'>previous </a>";
											} else {
											$prev = "previous ";
											}
											//Navigasi nomor
											$nmr = '';
											for ( $i = 1; $i<= $JmlHalaman; $i++ ){
											 
											if ( $i == $pg ) {
											$nmr .= $i . " ";
											} else {
											$nmr .= "<a href='?pg=$i'>$i</a> ";
											}
											}
											//Navigasi ke selanjutnya
											if ( $pg < $JmlHalaman ) {
											$link = $pg + 1;
											$next = " <a href='?pg=$link'>next</a>";
											} else {
											$next = " next";
											}
											 
											//Tampilkan navigasi
											echo $prev . $nmr . $next; */
											?>
										
										
										</td>
									</tr-->
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
<div id="dialog-area" title="Edit Area" >
	<div class="widget-content">
	<form class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>app/insert_area">
		<div id='dialogarea'></div>
		<div class="form-actions">
					<button type="submit" class="btn btn-primary btn-label-left" name="save">
					<span><i class="icon-save"> Simpan</i></span></button>
					<button onclick="javascript:keluar();" type="reset" class="btn btn-danger btn-label-left" >
					<span><i class="icon-ban-circle"> Cancel</i></span></button>
		</div>
	</form>
	</div>
</div>

				