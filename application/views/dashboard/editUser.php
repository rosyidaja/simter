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
								<input type="hidden" name="user_id" value="<?php echo $user->user_id; ?>"/>
								<div class="row-fluid">
									<label for="form-field-select-1">Username</label>
									<div class="controls">
										<input type="text" name="username" id="username" readonly value="<?php echo $user->username; ?>" placeholder="Username" maxlength="50" required/>
									</div>
								</div>
								<div class="row-fluid">
									<label for="form-field-select-2">Password</label>
									<div class="controls">
										<input type="password" name="password" id="password" value="<?php echo $user->password; ?>" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Harus mengandung huruf Kapital dan Angka Panjang minimal 6 huruf" required/>
									</div>
								</div>
								<div class="row-fluid">
									<label for="form-field-select-3">Nama Lengkap</label>
									<div class="controls">
										<input type="text" name="nama_lengkap" id="nama_lengkap" value="<?php echo $user->nama_lengkap; ?>" placeholder="Nama Lengkap" maxlength="50" required/>
									</div>
								</div>
								<div class="row-fluid">
									<label for="form-field-select-3">E-Mail</label>
									<div class="controls">
										<input type="email" name="email" id="email" value="<?php echo $user->email; ?>" placeholder="E-Mail"  required/>
									</div>
								</div>
								<div class="row-fluid">
									<label for="form-field-select-3">Alamat</label>
									<div class="controls">
										<textarea name="alamat" id="alamat" col="3" row="2"><?php echo $user->alamat; ?></textarea>
									</div>
								</div>
								<div class="control-group">
									<?php if($user->level == 1){ ?>
													<label class="control-label" style="clear:both;">Level</label>
													<label style="float:left;margin-right:50px;">
													<input type="radio" checked value="1" name="level">
													<span class="lbl">Admin</span>
													</label>
													<label >
													<input type="radio" value="2" name="level">
													<span class="lbl">Karyawan</span>
													</label>
									<?php }else{?>
													<label class="control-label" style="clear:both;">Level</label>
													<label style="float:left;margin-right:50px;">
													<input type="radio"  value="1" name="level">
													<span class="lbl">Admin</span>
													</label>
													<label >
													<input type="radio" checked value="2" name="level">
													<span class="lbl">Karyawan</span>
													</label>
									<?php }?>
												</div>
								<div>
									&nbsp;
								</div>
							
								<div>
									&nbsp;
								</div>
							<div class="control-grup">
								<button class="btn btn-info" type="submit">
									<i class="icon-ok bigger-110"></i>
									Submit
								</button>

								&nbsp; &nbsp; &nbsp;
								<a href="<?php echo site_url('setting'); ?>">
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
		$(document).ready(function(){
			$('#form-tambah-user').submit(function(){
			  
			  			
			  			$.ajax({
							type:'POST',
							url: '<?php echo site_url("login/saveData"); ?>',
							data:$("#form-tambah-user").serialize(),
							success:function(){
							alert('Update Berhasil');
							window.location = '<?php echo site_url("setting"); ?>';
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
