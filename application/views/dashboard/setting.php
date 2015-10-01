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
						<li class="active">Widgets</li>
					</ul><!--.breadcrumb-->

				</div>

				<div class="page-content">
					<div class="page-header position-relative">
						<h1>Pengaturan
							<small>
								<i class="icon-double-angle-right"></i>
								Manajemen Pengguna
							</small>
						</h1>
					</div><!--/.page-header-->

								<div class="span11">
									<div class="widget-box">
										<div class="widget-header header-color-blue">
											<h5 class="bigger lighter">
												Data User 
												<a href="setting/inputan">
												<button class="btn btn-small btn-primary" style="border:1px solid white">
												<i class="icon-plus"></i>
												Tambah
												</button>
												</a>
											</h5>
										</div>

										<div class="widget-body">
											<div class="widget-main no-padding">
												<table class="table table-striped table-bordered table-hover">
													<thead>
														<tr>
															<th>
																<i class="icon-user"></i>
																User
															</th>
															<th>
																Nama Lengkap
															</th>
															<th>
																<i>@</i>
																Email
															</th>
															<th class="hidden-480">Status</th>
															<th>
																Action
															</th>
														</tr>
													</thead>

													<tbody>
														<?php foreach ($user as $user) { ?>
															<tr>
																<td class=""><?php echo $user->username; ?></td>
																<td><?php echo ucwords(strtolower($user->nama_lengkap)) ; ?></td>
																<td>
																	<a href="#"><?php echo $user->email; ?></a>
																</td>

																<td class="hidden-480">
																	<?php if($user->level == 1){ ?>
																		<span class="label label-warning">Owner</span>
																	<?php }else{ ?>
																		<span class="label label-warning">Karyawan</span>
																	<?php }?>
																	
																</td>
																<td class="td-actions">
												<div class="hidden-phone visible-desktop action-buttons">
													<a class="green" href="login/get?id=<?php echo $user->user_id; ?>" role="button" data-toggle="modal">
														<i class="icon-pencil bigger-130"></i>
													</a>

													<a class="red delbutton" id="<?php echo $user->user_id; ?>" href="#">
														<i class="icon-trash bigger-130"></i>
													</a>
												</div>

													<div class="hidden-desktop visible-phone">
														<div class="inline position-relative">
															<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
																<i class="icon-caret-down icon-only bigger-120"></i>
															</button>

															<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
																<li>
																	<a href="login/get?id=<?php echo $user->user_id; ?>"  class="tooltip-success editan"  data-rel="tooltip" title="Edit">
																		<span class="green">
																			<i class="icon-edit bigger-120"></i>
																		</span>
																	</a>
																</li>

																<li>
																	<a href="#" class="tooltip-error delbutton" id="<?php echo $user->user_id; ?>" data-rel="tooltip" title="Delete">
																		<span class="red">
																			<i class="icon-trash bigger-120"></i>
																		</span>
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</td>
															</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div><!--/span-->
							</div><!--/row-->
								
							</div><!--PAGE CONTENT ENDS-->
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

		<script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.slimscroll.min.js"></script>

		<!--ace scripts-->

		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->

		<script type="text/javascript">
			$(document).ready(function() {

			$(".delbutton").click(function(){
 
				 //Save the link in a variable called element
				 var element = $(this);
				 
				 //Find the id of the link that was clicked
				 var del_id = element.attr("id");
				 
				 //Built a url to send
				 var info = 'id=' + del_id;
				 if(confirm("Anda yakin akan menghapus?"))
				 {
				 $.ajax({
				 type: "POST",
				 url : "<?php echo site_url('login/delete')?>",
				 data: info,
				 success: function(){
				 	$(this).parents(".record").animate({ opacity: "hide" }, "slow");
					window.location = '<?php echo site_url("setting"); ?>';
				 }
				 });				 
				 }
				 
				 return false;
				 
				});
			

			});
		</script>
	</body>
</html>
