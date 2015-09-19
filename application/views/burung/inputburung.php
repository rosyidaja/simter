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
							Form Elements
							<small>
								<i class="icon-double-angle-right"></i>
								Common form elements and layouts
							</small>
						</h1>
					</div><!--/.page-header-->

					<div class="row-fluid">
	<div class="span3">
		<div class="widget-box">
			<div class="widget-header">
				<h4>Entry Data Burung</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="row-fluid">
						<form id="form-tambah-burung" name="form-tambah-burung" action="<?php ?>" method="POST" onsubmit="return validasi_input(this)">
								<input type="hidden" name="id_burung" value="0"/>
								<div class="row-fluid">
									<label for="form-field-select-1">Nomor Ring</label>
									<div class="controls">
										<input type="text" name="nomor_ring" id="nomor_ring" placeholder="Nomor Ring" maxlength="50" required/>
									</div>
								</div>
								<div>
									&nbsp;
								</div>
								<div class="row-fluid">
									<label for="form-field-select-2">Ring Jantan</label>
									<div class="controls">
										<input type="text" name="ring_jantan" id="nama_kandang" placeholder="Ring Jantan" maxlength="50" required/>
									</div>
								</div>
								<div>
									&nbsp;
								</div>
								<div class="row-fluid">
									<label for="form-field-select-3">Ring Betina</label>
									<div class="controls">
										<input type="text" name="ring_betina" id="nama_kandang" placeholder="Ring Betina" maxlength="50" required/>
									</div>
								</div>
								<div>
									&nbsp;
								</div>
							
								<div>
									&nbsp;
								</div>
							<div class="control-grup">
								<button onclick="validasi_input()" class="btn btn-info" type="button">
									<i class="icon-ok bigger-110"></i>
									Submit
								</button>

								&nbsp; &nbsp; &nbsp;
								<a href="<?php echo site_url('burung'); ?>">
								<button class="btn" type="button">
									<i class="icon-undo bigger-110"></i>
									Cancel
								</button>
							</a>
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
			function validasi_input(){
			  var user_val = $('#nomor_ring').val();
			  $.ajax({
			  	type:'post',
			  	url:'<?php echo site_url("burung/validasi"); ?>',
			  	data:{username : user_val },
			  	success:function(aksi){
			  		if(aksi == '1'){
			  			
			  			$.ajax({
							type:'POST',
							url: '<?php echo site_url("burung/saveData"); ?>',
							data:$("#form-tambah-burung").serialize(),
							success:function(){
							alert('Berhasil input');
							window.location = '<?php echo site_url("burung"); ?>';
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
			}
			function tambah(){
				
			}
		</script>

	</body>
</html>
