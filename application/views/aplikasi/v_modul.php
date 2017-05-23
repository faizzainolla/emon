<div class="span12">      		
<div class="widget ">

	<div class="widget-header">
		<i class="icon-cogs"></i>
		<h3>Modul Sistem Manajemen</h3>
	</div> <!-- /widget-header -->
	<?php $kd_modul = sprintf("%04d",$max['max']+1);?>
	<div class="widget-content">
		<select style="padding-right:10px;" class=" span3 populate placeholder select" name="kode_prop" id="kode_prop" onchange="loadarea();" required=''>
		<option>-- Pilih Area --</option>
		<?php 
		$isian=11;
		foreach($prop as $row){
			$isiarea  = $row['kd_area']." | ".$row['nm_area'];
			echo "<option value='".$row['kd_area']."'>".$isiarea."</option>";
		}
		?>
		</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
		
		<select class="span3 populate placeholder select" name="kode_kab" id="kode_kab" required='' placeholder='Pilih' >
		</select>&nbsp;&nbsp;

	<button type="submit" class="btn btn-xs  btn-default" name="Filter" onclick="v_modul()">
				<span>&nbsp;<i class="icon-search"></i>&nbsp;&nbsp;</span>
				Filter	
	</button>
	<br>
	<hr/>
		<div id='listsistem' ></div>
	</div>
	</div>
</div>
<script type="text/javascript">
function edit_wilayah(kd_wilayah,kd_area,kd_subarea,nm_area,list_system,nama_pic,jabatan_pic,cp_pic,keterangan){
	var kd_wilayah 	= $('#kode_wilayah').val();
	var nm_area 	= nm_area;
	var list_sistem = list_system;
	var nama_pic 	= nama_pic;
	var jabatan_pic = jabatan_pic;
	var cp_pic 		= cp_pic;
	
	
	$('#kode_prop').val(kd_area);
	$('#kode_wilayah').val(kd_wilayah);
	$('#list_sistem').val(list_sistem);
}

function v_modul(){
	$("#tabmodul").show();
	var area = $('#kode_prop').val(); 
	var subarea = $('#kode_kab').val(); 
	$.ajax({
			type: "POST",
			url: baseurl+'app/list_sistem',
            data:{area:area,subarea:subarea},
			dataType: 'html',
			success: function(data) {
			document.getElementById('listsistem').innerHTML = data;
			},
	});
}
	
$(function(){
	$("#tabmodul").hide();
});
</script>
