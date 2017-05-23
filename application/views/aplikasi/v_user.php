<div class="span12">      		
<div class="widget ">
<div class="widget-header">
	<i class="icon-user"></i><h3>User Manajemen</h3>
</div> <!-- /widget-header -->
	<div class="widget-content">
	 <div class="control-group">
						<label class="control-label"></label>
							<div class="controls">
							 <div class="accordion" id="accordion2">
                              <div class="accordion-group">
                                <div class="accordion-heading">
                                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                    Input User
                                  </a>
                                </div>
                                <div id="collapseOne" class="accordion-body collapse in">
                                  <div class="accordion-inner">
                                <?php echo $this->session->flashdata('notif')?>
								<form class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>app/insert_user">
									<fieldset>
										<div class="control-group">											
											<label class="control-label">Nama Lengkap</label>
											<div class="controls">
												<input type="text" class="span4" name="fullname" required>
												<input type="text" class="span1 hide" name="id_user" value="<?php echo $max['max']+1;?>"/>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
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
												<select class="span3 populate placeholder select" name="kode_kab" id="kode_kab" required='' placeholder='Pilih' >
												
												</select>

											</div> <!-- /controls -->						
										</div> <!-- /control-group -->

										<div class="control-group">											
											<label class="control-label">Jabatan</label>
											<div class="controls">
											<select class="span3 populate placeholder select" name="jabatan">
												<option value="">-- Pilih Jabatan --</option>
												<option value="AD">Management</option>
												<option value="1">Helpdesk</option>
												<option value="2">Asisten Programmer</option>
												<option value="3">Koordinator</option>
												<option value="4">Implementator</option>
												<option value="5">Junior Supervisor Programmer</option>
												<option value="6">Residen Consultant</option>
												<option value="7">ADM Tender</option>
												<option value="8">Bendahara</option>
												<option value="9">Sekretaris</option>
												<option value="10">Programmer</option>
												<option value="11">Akuntan</option>
												<option value="12">Projek Manager</option>
												<option value="13">Quality Asurance</option>

												</select>
												
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="control-group">											
											<label class="control-label">Username</label>
											<div class="controls">
												<input type="text" class="span4"  name="username" required>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="control-group">											
											<label class="control-label">Password</label>
											<div class="controls">
												<input type="password" class="span4"  name="pass" required>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
									</fieldset>
									<div class="control-group">											
											<label class="control-label">Group</label>
											<div class="controls">
											<select class=" span2 populate placeholder select" name="group" id="group" onchange="cekgroup();" required=''>
												<option value="">-- Pilih Group --</option>
												<?php
												$oto = $this->session->userdata('oto');
												if($oto=='2'){
												echo "
												<option value='3'>Daerah</option>
												";
												}else{
												echo "
												<option value='1'>Admin</option>
												<option value='2'>Korwil</option>
												<option value='3'>Daerah</option>
												";
												}
												?>
											</select>
											</div> <!-- /controls -->				
									</div>
									<div class="control-group" id="div_ta">											
										<label class="control-label">Kode TA</label>
										<div class="controls">
											<select class=" span3 populate placeholder select" name="kode_ta" id="kode_ta" required=''>
											<option value="">-- Pilih TA --</option>
											<?php foreach($ta as $row){
												echo "<option value='".$row['kd_korwil']."'>".$row['kd_korwil']." | ".$row['nm_korwil']."</option>";
											}
											?>
											</select>
										</div> <!-- /controls -->				
									</div>
									<div class="control-group" id="div_koor">											
										<label class="control-label">Daerah Koordinasi</label>
										<div class="controls">
											<textarea type="text" class="allimpl span4" name="list_daerah" id="list_daerah"></textarea>
											<button type="button" class="btn btn-success btn-sm" id="btn_area"><i class="icon-list"></i></button>
										</div> 						
									</div> 
									<div class="adduser form-actions" style="align:center!important;text-align: center;padding-right: 602px !important;">
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
				Data User
			  </a>
			</div>
           <div id="collapseTwo" class="accordion-body collapse">
            <div class="accordion-inner">
                    <table style='font-size:11px' class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
					<thead>
						<tr>
							<th>Nama User</th>
							<th>Wilayah Kerja</th>
							<th>Group</th>
							<th>Status</th>
							<th width="40px;">Aksi</th>
						</tr>
					</thead>
					<tbody>
					<!-- Start: list_row -->
						<?php 
						foreach($user as $row){
	 						if($row['jabatan']=='1'){
								$jab='Helpdesk';
							}
							if($row['jabatan']=='2'){
								$jab='Asisten Programmer';
							}
							if($row['jabatan']=='3'){
								$jab='Koordinator';
							}
							if($row['jabatan']=='4'){
								$jab='Implementator';
							}
							if($row['jabatan']=='5'){
								$jab='Junior Supervisor Programmer';
							}
							if($row['jabatan']=='6'){
								$jab='Residen Consultant';
							}
							if($row['jabatan']=='7'){
								$jab='Adm Tender';
							}
							if($row['jabatan']=='8'){
								$jab='Bendahara';
							}
							if($row['jabatan']=='9'){
								$jab='Sekretaris';
							}
							if($row['jabatan']=='10'){
								$jab='Programmer';
							}
							if($row['jabatan']=='11'){
								$jab='Akuntan';
							}
							if($row['jabatan']=='12'){
								$jab='Projek Manager';
							}
							if($row['jabatan']=='13'){
								$jab='QA';
							}
							
							if($row['group']=='1'){
								$group='Admin';
							}
							if($row['group']=='2'){
								$group='Koordinator Daerah';
							}
							if($row['group']=='3'){
								$group='PIC Daerah';
							}
						?>
						<tr>
							<td>
							<?php echo strtoupper($row['nm_lengkap']);?></td>
							<td><?php echo strtoupper($row['nm_wilayah']);?></td>
							<td><?php echo $group;?></td>
							<td>
							<a href="#" class="statuser" data-name="status" data-type="select" 
							data-pk="<?php echo $row['user_name'];?>" 
							data-value="<?php echo $row['status'];?>"></a>
							</td>
							<td>
								<button type="submit" class="btn btn-danger btn-label-center" name="save" onclick="javascript:master_hapus('ms_user','id_user','<?php echo $row['id_user'] ?>')">
								<span><i class="icon-remove"></i></span></button>
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
		</div> <!-- /controls -->	
	 </div> <!-- /control-group -->
	</div> <!-- /widget-content -->
</div> <!-- /widget -->
	     
<!--POP UP-->
<div id="dialog-allimpl" class="poparea" title="List Daerah" >
	<div class="widget-content" style="height:490px;">
			<div id='allimpl' ></div>
			<div class="form-actions" align="center">
					<button type="submit" id="ins_allimpl" class="btn btn-primary btn-label-left" name="save">
					<span><i class="icon-save"> Pilih</i></span></button>
					<button type="reset" onclick="javascript:keluar();" class="btn btn-danger btn-label-left">
					<span><i class="icon-ban-circle"> Cancel</i></span></button>
			</div>
	</div>
</div>	

<style>

.poparea {
    height: 530px!important;
    width: auto;
    min-height: 0px;
    max-height: none;
}

.adduser {
    padding-left: 100px!important;
	align:center!important;
}
.pagination {
    height: 1px;
    margin: 3px;
    padding-left: 100px!important;
}

.form-actions {
    padding: 10px 10px 10px!important;
    margin-top: 5px;
    margin-bottom: 5px;
    background-color: #eeeeee;
    border-top: 1px solid #ddd;
    *zoom: 1;
}
</style>