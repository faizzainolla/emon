<div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-print"></i>
	      				<h3>Laporan Change Request</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
					<select style="padding-right:10px;" class=" span3 populate placeholder select" name="kode_prop" id="kode_prop" onchange="loadarea();" required=''>
									<option value="">-- Pilih Area --</option>
								<?php foreach($prop as $row){ ?>
									<option value="<?php echo $row['kd_area'];?>"><?php echo $row['nm_area'];?></option>
									
								<?php }
									?>
					</select>&nbsp;&nbsp;&nbsp;  
		
					<select class="span3 populate placeholder select" name="kode_kab" id="kode_kab" required='' placeholder='Pilih' >
					</select>
					&nbsp;&nbsp;&nbsp;  
								<?php
													$now = date('Y');
													echo "<select style='padding-left:10px;' class='span1 populate placeholder select' name='thn_sistem' id='thn_sistem' required>";
													for($tahun=$now;$tahun>=$now-10;$tahun--){
														echo "<option value='".$tahun."' name='".$tahun."'>".$tahun."</option>";
													}
													echo "</select>";

												?>
												&nbsp;&nbsp;&nbsp;  
						<select class=" span2 populate placeholder select" name="bulan" required='' style="margin-left:10px" 
								 id="bulan">
								<option value="">-- Pilih Bulan --</option>
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
						</select>&nbsp;&nbsp;

					<button type="submit" class="btn btn-xs  btn-default" name="Filter" onclick="v_lap_cr()">
								<span>&nbsp;<i class="icon-search"></i>&nbsp;&nbsp;</span>
								Filter
					</button> 
					<br>
					<hr/><font color="red"><i>*Anda dapat kosongkan u/ filter tertentu</i></font>
					<div id='dg_lapcr' >
					</div><!-- tabeldata view -->


					</div><!-- /widget content -->
				</div><!-- /widget -->
</div>
					
				
				

			

