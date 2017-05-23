
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="<?php echo base_url();?>app">
				E-Monitoring			
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<li class="dropdown">						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i>
							Account
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url();?>app/chpass"><i class="icon-lock"></i> Ganti password</a></li>
							<li><a href="<?php echo base_url();?>app/logout"><i class="icon-signout"></i> Logout</a></li>
						</ul>						
					</li>
				</ul>	
				<!-- <form class="navbar-search pull-right">
					<input type="text" class="search-query" placeholder="Search">
				</form> -->
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->
    
<div class="subnavbar">
	<div class="subnavbar-inner">
		<div class="container">
			<ul class="mainnav">
				<li>
					<a href="<?php echo base_url();?>">
						<i class="icon-home" style='color:#9ACD32;'></i>
						<span>Beranda</span>
					</a>	    				
				</li>
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-hdd" style='color:#FF1000;'></i>
						<span>Master</span>
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
					<?php
						$oto=$this->session->userdata('oto');
						switch($oto){
							case 1;
								echo "
								<li><a href='".base_url()."app/page_ta'><i class='icon-group' style='color:blue;'></i> Tenaga Ahli</a></li>
								<li><a href='".base_url()."app/page_area'><i class='icon-flag' style='color:blue;'></i> Area</a></li>
								<li><a href='".base_url()."app/page_subarea'><i class='icon-flag' style='color:blue;'></i> Sub Area</a></li>
								<li><a href='".base_url()."app/page_sistem'><i class='icon-cogs' style='color:blue;'></i> Sistem</a></li>
								<li><a href='".base_url()."app/page_modul'><i class='icon-cogs' style='color:blue;'></i> Modul Sistem</a></li>
								<li><a href='".base_url()."app/page_wilayah'><i class='icon-map-marker' style='color:blue;'></i> Wilayah Kerja</a></li>
								<li><a href='".base_url()."app/page_user'><i class='icon-user' style='color:blue;'></i> User</a></li>";
							break;
							
							case 2;
								echo "
								<li><a href='".base_url()."app/page_sistem'><i class='icon-cogs' style='color:blue;'></i> Sistem</a></li>
								<li><a href='".base_url()."app/page_modul'><i class='icon-cogs' style='color:blue;'></i> Modul Sistem</a></li>
								<li><a href='".base_url()."app/page_wilayah'><i class='icon-map-marker' style='color:blue;'></i> Wilayah Kerja</a></li>
								<li><a href='".base_url()."app/page_user'><i class='icon-user' style='color:blue;'></i> User</a></li>
								";
							break;
							
							case 3;
								echo "
								<li><a href='".base_url()."app/page_modul'><i class='icon-cogs' style='color:blue;'></i> Modul Sistem</a></li>
								";
							break;
						}

					?>
					
                    </ul>    				
				</li>
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="shortcut-icon icon-bar-chart" style='color:#40E0D0;'></i>
						<span>Monitoring</span>
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<?php
						$oto=$this->session->userdata('oto');
						switch($oto){
							case 1;
								echo "
									<li><a href='".base_url()."app/page_monitoring'><i class='icon-edit' style='color:blue;'></i> Input Monitoring</a></li>
									<li><a href='".base_url()."app/page_tracking_monitor'><i class='icon-random' style='color:blue;'></i> Tracking Monitoring</a></li>
									<li><a href='".base_url()."app/page_cr'><i class='icon-bullhorn' style='color:blue;'></i> Change Request</a></li>
								";

								break;
							
							case 2;
								echo "
									<li><a href='".base_url()."app/page_cr'><i class='icon-bullhorn' style='color:blue;'></i> Change Request</a></li>
								";
							break;
							
							case 3;
								echo "
									<li><a href='".base_url()."app/page_cr'><i class='icon-bullhorn' style='color:blue;'></i> Change Request</a></li>
								";
							break;
						}
						?>
                    </ul>   				
				</li>
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-paste" style='color:#F4A460;'></i>
						<span>Laporan</span>
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
                        <?php 
						$oto=$this->session->userdata('oto');
												switch($oto){
							case 1;
								echo "
								<li><a href='".base_url()."app/lapmonitoring'><i class='icon-bar-chart' style='color:blue;'></i> Rekap Monitoring  </a></li>
							    <li><a href='".base_url()."app/lapcr'><i class='icon-book' style='color:blue;'></i> Rekap Change Request </a></li>
							    ";
								break;
							case 2;
								echo "
							    <li><a href='".base_url()."app/lapcr'><i class='icon-book' style='color:blue;'></i> Rekap Change Request </a></li>
								";
							break;
							case 3;
								echo "
							    <li><a href='".base_url()."app/lapcr'><i class='icon-book' style='color:blue;'></i> Rekap Change Request </a></li>
								";
							break;
						}
						

                        ?>
						
                    </ul>    				
				</li>
				<?php
				$oto=$this->session->userdata('oto');
				 if($oto=='3'){
					echo "
						<li>					
							<a class='single' href='assets/help/alur.PNG' >
								<i class='icon-book' style='color:blue;'></i>
								<span>Bantuan</span>
							</a>  									
						</li>
					"; 
				 }
				?>
			</ul>
				<?php
				date_default_timezone_set("Asia/Jakarta");
				$b = time();
				$hour = date("G",$b);
				if ($hour>=0 && $hour<=11)
				{$salam= "Selamat Pagi ";}
				elseif ($hour >=12 && $hour<=14)
				{$salam= "Selamat Siang ";}
				elseif ($hour >=15 && $hour<=17)
				{$salam= "Selamat Sore ";}
				elseif ($hour >=17 && $hour<=18)
				{$salam= "Selamat Petang ";}
				elseif ($hour >=19 && $hour<=23)
				{$salam= "Selamat Malam ";}

				?>
				<ul class="nav pull-right">
					<li>	
						<a class="user" >
							<i class="icon-user" style></i>
							<?php echo $salam; ?> <?php echo strtoupper($this->session->userdata('nama_lengkap'));?>
						</a>					
					</li>
				</ul>
		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    
    
<div class="main">
	<div class="main-inner">
	    <div class="container">
	    <div class="row">