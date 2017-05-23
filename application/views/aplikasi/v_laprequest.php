<div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-print"></i>
	      				<h3>Laporan Request</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
					<select class=" span3 populate placeholder select" name="wilayah" required='' id="cwil" onchange="lodsys(this.value)">
									<option value="">-- Pilih Wilayah --</option>
								<?php foreach($wilayah as $row){ ?>
									<option value="<?php echo $row['kd_wilayah'];?>"><?php echo $row['nm_wilayah'];?></option>
									
								<?php }
									?>
					</select>&nbsp;&nbsp;&nbsp;  

						<select class=" span2 populate placeholder select" name="bulan" required='' style="margin-left:10px" 
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
						</select>&nbsp;&nbsp;

					<button type="submit" class="btn btn-xs  btn-default" name="Filter" onclick="v_lap_request()">
								<span>&nbsp;<i class="icon-search"></i>&nbsp;&nbsp;</span>
								Filter
					</button>
					<br>
					<hr/>
					<div id='tabeldata' >
					</div><!-- tabeldata view -->


					</div><!-- /widget content -->
				</div><!-- /widget -->
</div>
					
				
				

			

