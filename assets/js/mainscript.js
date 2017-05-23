/****faiz jkt 31/01/2017****/
	
//---Master Area
	function master_hapus(db,kolom,isi){
		var tanya = confirm("Apkah anda yakin ingin menghapus data ini?");
		if (tanya==true){
		 $.ajax({
            url : baseurl+'app/master_hapus',
            data:{db:db,kolom:kolom,isi:isi},
            dataType:'json',
            type:'POST',
            success:function(data){
				 status = data.pesan;
                        if (status=='1'){  
						//$('#tbody').html(response);
							alert('Data Sudah Dihapus.!');
							$('.table').ajax.reload();
                        } else {
                            alert('Data Gagal Hapus.!');
                        }
            } 
           });
		}
		
	}
	
//---Master Hapus Wilayah
	function master_hapus_wil(db,kolom,isi){
		var tanya = confirm("Apkah anda yakin ingin menghapus data ini?");
		if (tanya==true){
		 $.ajax({
            url : baseurl+'app/master_hapus_wil',
            data:{db:db,kolom:kolom,isi:isi},
            dataType:'json',
            type:'POST',
            success:function(data){
				 status = data.pesan;
                        if (status=='1'){  
							alert('Data Sudah Dihapus.!');
                        } else {
                            alert('Data Gagal Hapus.!');
                        }
            } 
           });
		}
		
	}	
	function edit_area(kode,nama){
		$("#dialog-area").dialog('open');	
		var kd = kode.trim();		
		var nm = nama;		
		 $.ajax({
            url : baseurl+'app/dialog_area',
            data:{kode:kd,nama:nm},
            dataType:'html',
            type:'POST',
            success:function(data){
            	$('#dialogarea').html(data)
            } 
           });
	}
	 
	function edit_subarea(id,kode,nama){
		$("#dialog-subarea").dialog('open');
		var id = id.trim();			
		var kd = kode.trim();		
		var nm = nama;		
		 $.ajax({
            url : baseurl+'app/dialog_subarea',
            data:{id:id,kode:kd,nama:nm},
            dataType:'html',
            type:'POST',
            success:function(data){
            	$('#dialogsubarea').html(data)
            } 
           });
	} 
	
	function edit_sistem(kode,nama,detail){
		$("#dialog-sistem").dialog('open');	
		var kd = kode.trim();		
		var nm = nama;	
		var dt = detail;		
		 $.ajax({
            url : baseurl+'app/dialog_sistem',
            data:{kode:kd,nama:nm,detail:dt},
            dataType:'html',
            type:'POST',
            success:function(data){
            	$('#dialogsistem').html(data)
            } 
           });
	}
		
	function edit_ta(kode,nama,email,contact){
		$("#dialog-ta").dialog('open');	
		var kd = kode.trim();		
		var nm = nama;	
		var em = email;	
		var cp = contact;	
		 $.ajax({
            url : baseurl+'app/dialog_ta',
            data:{kode:kd,nama:nm,email:em,contact:cp},
            dataType:'html',
            type:'POST',
            success:function(data){
            	$('#dialogta').html(data)
            } 
           });
	}
	
	function edit_modul(wil,area,subarea,sistem,nmsistem,kode,nama,detail){
		$("#dialog-modul").dialog('open');	
		var wil = wil.trim();		
		var area = area.trim();		
		var subarea = subarea.trim();		
		var sistem = sistem.trim();	
		var nmsistem = nmsistem;		
		var kd = kode.trim();		
		var nm = nama;	
		var dt = detail;		
		 $.ajax({
            url : baseurl+'app/dialog_modul',
            data:{wilayah:wil,area:area,subarea:subarea,kode:kd,sistem:sistem,nmsistem:nmsistem,nama:nm,detail:dt},
            dataType:'html',
            type:'POST',
            success:function(data){
            	$('#dialogsistem').html(data)
            } 
           });
	}
	function keluar(){
		$("#dialog-area").dialog('close');	
		$("#dialog-subarea").dialog('close');	
		$("#dialog-sistem").dialog('close');	
		$("#dialog-modul").dialog('close');
		$("#dialog-wilayah").dialog('close');
		$("#dialog-ta").dialog('close');
		$("#dialog-allimpl").dialog('close');
	} 
//---script tabel sistem di view v_wilayah
   $(document).ready(function() {
          $("#dialog-wilayah").dialog({
            height: 400,
            width: 600,
            modal: true, 
            background:'#2da305',           
            autoOpen:false                
          });    

          $("#dialog-area").dialog({
            height: 300,
            width: 600,
            modal: true, 
            background:'#2da305',           
            autoOpen:false                
          });   
          $("#dialog-subarea").dialog({
            height: 350,
            width: 600,
            modal: true, 
            background:'#2da305',           
            autoOpen:false                
          });
		  
          $("#dialog-sistem").dialog({
            height: 400,
            width: 600,
            modal: true, 
            background:'#2da305',           
            autoOpen:false                
          }); 
          $("#dialog-modul").dialog({
            height: 350,
            width: 600,
            modal: true, 
            background:'#2da305',           
            autoOpen:false                
          });
          $("#dialog-ta").dialog({
            height: 400,
            width: 600,
            modal: true, 
            background:'#2da305',           
            autoOpen:false                
          });
          $("#dialog-allimpl").dialog({
            height: 350,
            width: 600,
            modal: true, 
            background:'#2da305',           
            autoOpen:false                
          });
		  
     }); 
	 
	
	$("#sis_simpan").on('click',function(e){
		$("#dialog-wilayah").dialog('close');
		 var kd_wilayah   = $('#kode_wilayah').val();	
		 var kd_propinsi  = $('#kode_prop').val();	
		 var kd_kabupaten = $('#kode_kab').val();	
		 var list_sistem = new Array();
		   $.each($("input[name='item[]']:checked"), function() {
				list_sistem.push($(this).val());
		   });
		   $('#list_sistem').val(list_sistem);
		   
		   var data = new Array();
			$.each($("input[name='item[]']:checked").closest("td").siblings("td"),function () {
            data.push($(this).text());
			});
			a2 = data.join("||");
			$.ajax({
				type: 'POST',
				dataType:"json",
				data:{chil:a2,kdwil:kd_wilayah,kdprop:kd_propinsi,kdkab:kd_kabupaten,save:1},
				url: baseurl+'app/insert_cild_sistem',
				success:function(data){
				}
			
			}); 
		  
	});   
	
	$('#div_koor').hide();
	$('#div_ta').hide();
	function cekgroup(){
		var group = $('#group').val();
		if(group==2){
			$('#div_koor').show();
			$('#div_ta').show();
			$('#list_daerah').prop('required',true);
			$('#kode_ta').prop('required',true);
		}else{
			$('#div_koor').hide();
			$('#div_ta').hide();
			$('#list_daerah').prop('required',false);
			$('#kode_ta').prop('required',false);
		}
	}	

	
	$('#btn_area').on('click',function(e){	
	var kd_ta = $('#kode_ta').val();
	$("#dialog-allimpl").dialog('open');
		 $.ajax({
            url : baseurl+'app/allimpl',
            data:{kd_ta:kd_ta},
            dataType:'html',
            type:'POST',
            success:function(data){
            	$('#allimpl').html(data)
            	$('#datatable-2203').dataTable( {
					  "bFilter": false,
			          "bSort": false ,
			          "bInfo": false,
			          "paging": true,
					"sDom": "<'box-content'<'clearfix'>>rt<'box-content'<'col-sm-6'i><'col-sm-6 text-right'p><'clearfix'>>",
					
				});

 
            } 
           });

	});
	
 $("#ins_allimpl").on('click', function(e){
		 var allarea = new Array();
		   $.each($("input[name='item[]']:checked"), function() {
				allarea.push($(this).val());
		   });
		   $('.allimpl').val(allarea);
		   $("#dialog-allimpl").dialog('close');
	});
	
	$("#btn_wilayah").on('click', function(e){
		 var kd_wilayah   = $('#kode_wilayah').val();	
		 var kd_propinsi  = $('#kode_prop').val();	
		 var kd_kabupaten = $('#kode_kab').val();	
		 if(kd_propinsi==''){
			 alert("Mohon isi dahulu wilayah.!!");
			 return;
		 }
		$("#dialog-wilayah").dialog('open');
		 $.ajax({
            url : baseurl+'app/ALLsistem',
            data:{kd_wilayah:kd_wilayah,kd_propinsi:kd_propinsi,kd_kabupaten:kd_kabupaten},
            dataType:'html',
            type:'POST',
            success:function(data){
            	$('#tabelsistem').html(data)
            	$('#datatable-22').dataTable( {
					  "bFilter": false,
			          "bSort": false ,
			          "bInfo": false,
			          "paging": true,
					  //"scrollX": true,
					"sDom": "<'box-content'<'clearfix'>>rt<'box-content'<'col-sm-6'i><'col-sm-6 text-right'p><'clearfix'>>",
					
				});

 
            } 
           });
	});
	
	
	$("#AddWilayah").on('click', function(e){ 
		/* $.ajax({
            url : baseurl+'app/addwilayah',
            data:{kode:1},
            dataType:'html',
            type:'POST',
            success:function(data){} 
           }); */
		   $("#").load("app/addwilayah");
	});

	