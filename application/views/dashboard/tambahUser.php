<?php $this->load->view('head'); ?>

			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="icon-home home-icon"></i>
							<a href="#">Home</a>

							<span class="divider">
								<i class="icon-angle-right arrow-icon"></i>
							</span>
						</li>
						<li class="active"><?php echo ucfirst($this->uri->segment(1));?></li>
					</ul><!--.breadcrumb-->
				</div>

				<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Form User
						</h1>
					</div><!--/.page-header-->

					<div class="row-fluid">
	<div class="span3">
		<div class="widget-box">
			<div class="widget-header">
				<h4>Entry Data User</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="row-fluid">
						<form id="form-tambah-user" name="form-tambah-user" >
								<label>
									<input type="radio" checked value="all" name="period">
									<span class="lbl">ALL</span>
								</label>
								
								<div class="row-fluid">
											
											<label for="id-date-range-picker-1">
												<input type="radio" value="tgl" name="period">
												<span class="lbl">Tanggal : </span>
											</label>
										</div>

										<div class="control-group">
												<input class="span5 date-picker" id="id-date-picker-1" value="<?php echo date('d-m-Y'); ?>" name="start" type="text" data-date-format="dd-mm-yyyy" />
												<span class="add-on">
													<i class="icon-calendar"></i>
												</span>
												&nbsp; s / d &nbsp;
												<input class="span5 date-picker" id="id-date-picker-1" value="<?php echo date('d-m-Y'); ?>" name="end" type="text" data-date-format="dd-mm-yyyy" />
												<span class="add-on">
													<i class="icon-calendar"></i>
												</span>
								</div>
								<div class="control-group">
													<label >
													<input type="radio" value="bln" name="period">
													<span class="lbl">Bulan : </span>
													</label>
													<select name="bln" class="span5">
														<option value="01" />Januari
														<option value="02" />Februari
														<option value="03" />Maret
														<option value="04" />April
														<option value="05" />Mei
														<option value="06" />Juni
														<option value="07" />Juli
														<option value="08" />Agustus
														<option value="09" />September
														<option value="10" />Oktober
														<option value="11" />November
														<option value="12" />Desember
													</select>
													&nbsp;
													<select name="thn" class="span5">
														<option value="2010" />2010
														<option value="2011" />2011
														<option value="2012" />2012
														<option value="2013" />2013
														<option value="2014" />2014
														<option value="2015" />2015
														<option value="2016" />2016
														<option value="2017" />2017
														<option value="2018" />2018
														<option value="2019" />2019
														<option value="2020" />2020
													</select>
												</div>
							<div class="control-grup">
								<button class="btn" name="btn" value="PRINT" type="submit">
									<i class="icon-print bigger-125 icon-on-right"></i>
									PRINT
								</button>

							</div>
						</form>
					</div>
					
				</div>
			</div>
		</div>
	</div><!--/span-->
</div>

				</div><!--/.page-content-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url();?>assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo base_url();?>assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo base_url();?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<!--[if lte IE 8]>
		  <script src="<?php echo base_url();?>assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-tag.min.js"></script>

		<!--ace scripts-->

		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->
		<script type="text/javascript">
		$(document).ready(function(){
			$('#form-tambah-user').submit(function(){
			  var user_val = $('#username').val();
			  $.ajax({
			  	type:'post',
			  	url:'<?php echo site_url("setting/validasi"); ?>',
			  	data:{username : user_val },
			  	success:function(aksi){
			  		if(aksi == '1'){
			  			
			  			$.ajax({
							type:'POST',
							url: '<?php echo site_url("login/saveData"); ?>',
							data:$("#form-tambah-user").serialize(),
							success:function(){
							alert('Berhasil input');
							window.location = '<?php echo site_url("setting"); ?>';
							},error:function(){
								alert('Gagal Menambahkan Data');
							}

				});
			  		}else{
			  			if(alert("Nomor Ring Sudah Digunakan")){
			  			return (false);
			  			}
			  		}
			  	},error:function(){
								alert('Gagal Menambahkan Data');
				}
			  });
			  return (false);
			});
			function tambah(){
				
			}
		});
		</script>

	</body>
</html>