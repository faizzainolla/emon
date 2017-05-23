 </div>
	    <!-- /row -->
	    </div> <!-- /container -->
	</div> <!-- /main-inner -->
</div> <!-- /main -->
    
    

    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>assets/plugins/jquery/jQuery-2.1.3.min.js"></script>
<script type="text/javascript">
	var baseurl = "<?php print base_url();?>";
</script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/summernote/summernote.js"></script>
<script src="<?php echo base_url();?>assets/js/devoops.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

<script src="<?php echo base_url();?>assets/js/Chart.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>assets/js/base.js"></script>
<script src="<?php echo base_url();?>assets/js/faq.js"></script>
<script src="<?php echo base_url();?>assets/plugins/editable/js/bootstrap-editable.js"></script> 

<!-- All functions for this theme + document.ready processing -->
 <script src="<?php echo base_url();?>assets/js/validboots.js"></script>




<script type="text/javascript">
	
var $results = $('#tbtrack'),
	    loadInterval = 30000;
	    refresh = 2000;
	   
	(function loader() {

	    $.get(baseurl+'app/track', function(html){

	            $results.hide(200, function() {
	                $results.empty();
	                $results.html(html);
	                $results.show(200, function() {
	                	console.log($results);
	                	 $('[data-toggle="tooltip"]').tooltip(); 

				        $.fn.editable.defaults.mode = 'popup';
				    $('.cstatx ').editable({
				        placement: 'top',
				        showbuttons: false ,
				        url :baseurl+'app/uptrack',
				        source: [
				        {value: 0, text: 'Belum'},
				        {value: 1, text: 'Sudah'}
				        ],success: function(response, newValue) {
								var val = $(this).data('value'); 
								var area = $(this).data('subarea');
								var sistem = $(this).data('sistem');
								$.ajax({
										url:baseurl+'app/uptrack',
									    data: {value: val,kd_subarea: area,kd_sistem: sistem},
										global: false,
										type: 'GET',
										dataType: 'json'
										
									});
							}
						});
								$(".vdetail").click(function() {
									var sub = $(this).data('subarea');
									var sis = $(this).data('sistem');
									var jns = $(this).data('jenis');
									var bln = $(this).data('bulan');
									var thn = $(this).data('tahun');
									if(jns=='-'){
										alert("Data belum diterima.!");
										return false;
									}
									    $.fancybox.open({
									    	maxWidth	: 600,
											maxHeight	: 700,
											fitToView	: false,
											width		: '70%',
											height		: '60%',
											autoSize	: false,
											closeClick	: false,
											openEffect	: 'none',
											closeEffect	: 'none',
									        href: baseurl+'app/vdetail_track?subarea='+sub+'&sistem='+sis+'&bulan='+bln+'&tahun='+thn,
									        type: "ajax"
									     
									});
						    	 });
								 
								$(".delmonitor").click(function() {
									var sub = $(this).data('subarea');
									var sis = $(this).data('sistem');
									var jns = $(this).data('jenis');
									if(jns=='-'){
										alert("Data belum diterima.!");
										return false;
									}
										var tanya = confirm("Apkah anda yakin ingin menghapus data ini.?");
										if (tanya==true){
										 $.ajax({
										    url : baseurl+'app/master_hapus_monitor',
											data:{db:'e_monitor',kolom1:'kd_subarea',isi1:sub,kolom2:'kd_sistem',isi2:sis},
											dataType:'json',
											type:'POST',
											success:function(data){
												 status = data.pesan;
														if (status=='1'){  
															alert('Data Sudah Dihapus.!');
															//setTimeout(loader, refresh);
															//$("#result").load("app/page_tracking_monitor");
															//"<?php echo site_url(); ?>app/page_tracking_monitor";
														} else {
															alert('Data Gagal Hapus.!');
														}
											} 
										   });
										}
						    	 }); 
								 
	                    setTimeout(loader, loadInterval);//refrehs data row
	                });
	            });
	    });
	}


	)();
	
	var $resultss = $('#crtrack'),
	    loadInterval = 30000;
	    refresh = 2000;
	   
	(function loader() {

	    $.get(baseurl+'app/crtrack', function(html){

	            $resultss.hide(200, function() {
	                $resultss.empty();
	                $resultss.html(html);
	                $resultss.show(200, function() {
	                	console.log($resultss);
	                	 $('[data-toggle="tooltip"]').tooltip(); 
						 
				function tah(){
				        	return $.ajax({
				        		url:baseurl+'app/addta',
				               //data: {value: data.id_user},
				               	global: false,
				                type: 'GET',
				                dataType: 'json'
				                
				        	});
				        }
					$.fn.editable.defaults.mode = 'popup';
	       			 var xtah = tah();
						xtah.success(function(data){
			        	$('.tah').editable({
					        placement: 'top',
					        url:baseurl+'app/upta',
					        showbuttons: false,
					        source: data,
					        success: function(response, newValue) {
					         	// setTimeout(loader, refresh);
					         }
					       
					    });
					   
			        });
					
					$.fn.editable.defaults.mode = 'popup';
				    $('.statcr ').editable({
				        placement: 'top',
				        showbuttons: false ,
				        url :baseurl+'app/upstatcr',
				        source: [
				        {value: 1, text: 'OG'},
				        {value: 2, text: 'OK'}
				        ]
				    }); 
						$('.delcr').click(function(){
							var kd_req = $(this).data('pk');
							var kd_sub = $(this).data('subarea');
							var del = confirm("Anda Yakin ingin menghapus CR ini?");
							if(del==true){
							$.ajax({
								type:"POST",
								url: baseurl+'app/master_hapus_wil',
								data: {db:'e_request',kolom:'kd_request',isi: kd_req},
								dataType: 'html',
								success: function(data){
									setTimeout(loader, refresh);
								},
								
							});
							}
						});
						
							$(".vdetailcr").click(function() {
									var pk = $(this).data('pk');
									var area = $(this).data('area');
									var subarea = $(this).data('subarea');
									    $.fancybox.open({
									    	maxWidth	: 600,
											maxHeight	: 700,
											fitToView	: false,
											width		: '70%',
											height		: '60%',
											autoSize	: false,
											closeClick	: false,
											openEffect	: 'none',
											closeEffect	: 'none',
									        href: baseurl+'app/vdetailcr?subarea='+subarea+'&area='+area+'&pk='+pk,
									        type: "ajax"
									     
									});
						    	 });
								 
						
	                    setTimeout(loader, loadInterval);//refrehs data row
	                });
	            });
	    });
	}


	)();
	
		 
 

	// Run Datables plugin and create 3 variants of settings
	function AllTables(){
		tabelbiasa();
		tabelcari();
		tabeltool();

		//tb-1();
		LoadSelect2Script(MakeSelect2);
	}
	
	function MakeSelect2(){
		
		$('.select').select2();
		$('.dataTables_filter').each(function(){
			$(this).find('label input[type=text]').attr('placeholder', 'Search');
		});
	}

	function fancy(){

		  $(".single").fancybox({
		maxWidth	: 900,
		maxHeight	: 900,
		fitToView	: false,
		width		: '90%',
		height		: '90%',
	    	helpers : {
	    		title : {
	    			type : 'over'
	    		}
	    	}
	    });



	}//end fancy

	function cvlog(){	     	
	$(".vlog").show();
	$(".addlog").hide();		
	}

	function caddfit(){
	$(".addlog").show();
	$(".vlog").hide();
	}


	function print(){
		var iduser = $('.rek').data('i');
		var tgl = $('#bulan').val();

		window.open(baseurl+'app/pdfkerja2/'+iduser+'/'+tgl, '_blank');
	}

 $(function() {
      $('.summernote').summernote({
   toolbar: [
        //[groupname, [button list]]

        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['fontsize', ['fontsize']],
       
    ],
        height: 100
     	 });
      });


$(document).ready(function() {


	//validator
	LoadBootstrapValidatorScript(chpassValidator);	
	LoadFancyboxScript(fancy);
	// Initialize datepicker

	// Load Timepicker plugin
	LoadTimePickerScript(AllTimePickers);
	// Load required scripts and draw graphs

	LoadDataTablesScripts(AllTables);
	// Add Drag-n-Drop feature

});

/******************MENU LAPORAN*********************/
    function v_lap_cr(){
    var area 	= $('#kode_prop').val();
    var subarea = $('#kode_kab').val();
    var tahun 	= $('#thn_sistem').val();
    var bulan   = $('#bulan').val();
	var oto 	= <?php echo $this->session->userdata('oto');?>;
		if(oto!='1' && area==''){
			alert("Anda tidak dapat mencetak keseluruhan, Wajib Memilih Area.!");
			return true;
		}
            $.ajax({
            url : baseurl+'app/vlapcr',
            data:{area:area, subarea:subarea,tahun:tahun,bulan:bulan},
            dataType:'html',
            type:'POST',
            success:function(data){

            	$('#dg_lapcr').html(data)
            	$('#datatable-4').dataTable( {
		
		          // "bFilter": false,
			          "bSort": false ,
			          "bInfo": false,
			          "paging": true,
					// "scrollX": true,
					"sDom": "<'box-content'<'clearfix'>>rt<'box-content'<'col-sm-6'i><'col-sm-6 text-right'p><'clearfix'>>",
					
					
				});

 
            } 
           });
            
    }
</script>
<script src="<?php echo base_url();?>assets/js/ex-editable.js"></script>
<script src="<?php echo base_url();?>assets/js/library.js"></script>
<script src="<?php echo base_url();?>assets/js/mainscript.js"></script>


</body>
</html>


