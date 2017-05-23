	function loadmodul(){
	var kd_sistem  = $('#kode_sistem').val();
	var kd_subarea = $('#kode_kab').val();
	var kd	   	   = kd_sistem.substring(kd_sistem.length-8,10);
	$.ajax({
			type: "POST",
			url: baseurl+'app/list_modul',
			data: {kd_sistem:kd,kd_subarea:kd_subarea},
			dataType: 'html',
			success: function(data) { 
			document.getElementById('cmodul').innerHTML = data;
			},
	});
			//return false;
	}

	function loadwil(){
	var prop = $('#kode_prop').val(); 
	$.ajax({
			type: "POST",
			url: baseurl+'app/list_wilayah',
			data: "prop="+ prop ,
			dataType: 'html',

						success: function(data) {
						  document.getElementById('kode_kab').innerHTML = data;
			},
			});
			//return false;
	}
	
	function loadarea(){
	var kd_area = $('#kode_prop').val(); 
	$.ajax({
			type: "POST",
			url: baseurl+'app/list_area',
			data: "kd_area="+ kd_area ,
			dataType: 'html',

						success: function(data) {
						  document.getElementById('kode_kab').innerHTML = data;
			},
			});
			//return false;
	}
	
	function loadareawil(){
	var kd_area = $('#kode_prop').val(); 
	$.ajax({
			type: "POST",
			url: baseurl+'app/list_area_wilayah',
			data: "kd_area="+ kd_area ,
			dataType: 'html',
				success: function(data) {
				  document.getElementById('kode_kab').innerHTML = data;
			},
			});
			//return false;
	}
	
	function loadnmarea(){
	var kd_subarea = $('#kode_kab').val();
		$.ajax({
			type: "POST",
			url : baseurl+'app/loadnmsubarea',
			data: "kd_subarea="+ kd_subarea ,
			dataType :'html',
			success : function(data){
				$('.nmsubarea').val(data);
			},
			
		});
	}
	
	function mloadarea(){
	var kd_area = $('#kd_area').val(); 
	$.ajax({
			type: "POST",
			url: baseurl+'app/list_area',
			data: "kd_area="+ kd_area ,
			dataType: 'html',
				success: function(data) {
						  //document.getElementById('kd_subarea').innerHTML = kd_area;
			},
			});
			//return false;
	}
 
	function loadsistem(){
	var kd_area = $('#kode_prop').val(); 
	var kd_subarea = $('#kode_kab').val(); 
	$.ajax({
			type: "POST",
			url: baseurl+'app/list_sistem_monitor',
			data: {kd_area:kd_area,kd_subarea:kd_subarea},//"kd_area="+ kd_area ,
			dataType: 'html',
						success: function(data) {
						  document.getElementById('kode_sistem').innerHTML = data;
			},
			});
			//return false;
	}
	
	$('#btn_wilayah').on('click',function(e){
			var kd = $('#kode_wilayah').val();
			$("#modalsistem").find(".modal-body").load("app/bodysistem?id="+kd);
			$("#modalsistem").modal({backdrop:"static"});

	});
	function lodsys(){
	var cwil = $('#cwil').val();
	$.ajax({
			type: "POST",
			url: baseurl+'app/list_system',
			data: "cwil="+ cwil ,
			dataType: 'html',

						success: function(data) {
						  document.getElementById('csystem').innerHTML = data;
			},
			});
			//return false;
	}
	
    $('input[type="radio"]').click(function(){
    if($(this).attr("id")=="troble"){
        $(".ketfitur").hide();
        $(".cmod").show();
        $("#ketfitur").prop('required',false);
        //$("#cmodul").prop('required',true);
    }
   if($(this).attr("id")=="upfitur"){
        $(".ketfitur").show();
        $(".cmod").show();
        $("#ketfitur").prop('required',true);
        //$("#cmodul").prop('required',true);
    }
    if($(this).attr("id")=="upmodul"){
        $(".ketfitur").hide();
        $(".cmod").hide();
        $("#ketfitur").prop('required',false);
       //$("#cmodul").prop('required',false);
        
    }
        
    });

function spare(){
    if($('#csystem').val()=='SYS-001'){
        $('.det').show();
        $('.subs').prop ('required',true);
    }else{
        $('.det').hide ();
        $('.subs').prop ('required',false);
    }
}

	$('#kode_sistem').click(function(){
		var kd_sistem = $('#kode_sistem').val();
		var kd = kd_sistem.substring(kd_sistem.length-8,10);
		$('.nosub').val($('#kode_kab').val());
		$('.nosis').val(kd);
		$.ajax({
			type:"POST",
			url: baseurl+'app/maxcr',
			data :{kd_area:$('#kode_prop').val(),kd_subarea:$('#kode_kab').val()},
			dataType: 'html',
			success: function(data){
				$('.nocr').val(data);
			},
			
		});
	});	
	$('#kode_proyek').click(function(){
		$('.nopro').val($('#kode_proyek').val());
	});	

 		
        

