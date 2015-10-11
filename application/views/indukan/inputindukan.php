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
					<div class="row-fluid">
	<div class="span3">
		<div class="widget-box">
			<div class="widget-header">
				<h4>Entry Data Anakan</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="row-fluid">
						<form id="form-tambah-anakan" name="form-tambah-anakan" action="<?php echo site_url('indukan/saveData'); ?>" method="POST">
									<input type="hidden" name="id_indukan" value="0" />
								<div class="row-fluid">
														<label for="form-field-select-1">Ring Jantan</label>
														<select class="chzn-select2" name="jantan" id="jantan" data-placeholder="Pilih Jantan">
															<option value="" />
															<?php foreach($anakan_jantan as $row){ ?>
															<option value="<?php echo $row->nomor_ring ;?>" /><?php echo $row->nomor_ring ;?>
															<?php } ?>
															<?php foreach($burung_jantan as $row){ ?>
															<option value="<?php echo $row->nomor_ring ;?>" /><?php echo $row->nomor_ring ;?>
															<?php } ?>
														</select>
								</div>
								<div>
									&nbsp;
								</div>
								<div class="row-fluid">
														<label for="form-field-select-2">Ring Betina</label>
														<select class="chzn-select2" name="betina" id="betina" data-placeholder="Pilih Betina">
															<option value="" />
															<?php foreach($anakan_betina as $row){ ?>
															<option value="<?php echo $row->nomor_ring ;?>" /><?php echo $row->nomor_ring ;?>
															<?php } ?>
															<?php foreach($burung_betina as $row){ ?>
															<option value="<?php echo $row->nomor_ring ;?>" /><?php echo $row->nomor_ring ;?>
															<?php } ?>
														</select>
								</div>
								<div>
									&nbsp;
								</div>
								<div class="row-fluid">
														<label for="form-field-select-3">Kandang</label>
														<select class="chzn-select2" name="kandang" id="kandang" data-placeholder="Pilih Kandang">
															<option value="" />
															<?php foreach($kandang as $row){ ?>
															<option value="<?php echo $row->id_kandang ;?>" /><?php echo $row->nama_kandang ;?>
															<?php } ?>
														</select>
								</div>
								<div>
									&nbsp;
								</div>
							<div class="row-fluid">
														<label for="form-field-9">Keterangan</label>
														<textarea class="span12 limited" name="keterangan" id="form-field-9" data-maxlength="50"></textarea>
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
								<a href="<?php echo site_url('indukan'); ?>">
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
		<script src="<?php echo base_url();?>assets/js/chosen.jquery.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-tag.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.inputlimiter.1.3.1.min.js"></script>

		<!--ace scripts-->

		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->

		<script type="text/javascript">
			$(function() {			
				
				$(".chzn-select1").chosen();
				$(".chzn-select2").chosen();
				$(".chzn-select3").chosen(); 
				
				$('textarea[class*=limited]').each(function() {
					var limit = parseInt($(this).attr('data-maxlength')) || 100;
					$(this).inputlimiter({
						"limit": limit,
						remText: '%n character%s remaining...',
						limitText: 'max allowed : %n.'
					});
				});
				
			});
		</script>
	</body>
</html>
