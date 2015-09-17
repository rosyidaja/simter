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

						<div id="inputan" style="display:none;">
							<?php $this->load->view('kandang/inputkandang'); ?>		
						</div>
					
				
				<div id="editan">
					<div class="modal-c hide" tabindex="-1">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="blue bigger">Edit Data Master</h4>
													</div>
										<div class="modal-body overflow-visible" style="width:100%;">

											</div>
												<div class="modal-footer">
														<button class="btn btn-small btn-primary" id="update">
															<i class="icon-ok"></i>
															Update
														</button>
														<button class="btn btn-small" data-dismiss="modal">
															<i class="icon-remove"></i>
															Cancel
														</button>
													</div>
							</div><!--PAGE CONTENT ENDS-->
				</div>
							<div class="row-fluid">
								<div class="table-header">
									Data Master Kandang
									<button id="tambah" class="btn btn-small btn-primary" style="border:1px solid white">
									<i class="icon-plus"></i>
									Tambah
									</button>
								</div>
								<table id="sample-table-2" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">
												NO
											</th>
											<th>
												Nama Kandang
											</th>
											<th>
												kode Kandang
											</th>
											<th>
												Status
											</th>
											<th>
												Action
											</th>
										</tr>
									</thead>

									<tbody>
										<?php $i=0; ?>
										<?php foreach($kandang as $row){ 
											$i++;
											?>
											<!-- tabele  -->
											<tr class="record">
												<td><?php echo $i; ?></td>
												<td>
													<?php echo $row->nama_kandang; ?>
												</td>
												<td>
													<?php echo $row->kode_warna; ?>
												</td>
												<td>
													<?php if($row->status == 'k'){
														echo "Kosong";
													}else{
														echo "Terpakai";
													}  ?> 
												</td>
												<td class="td-actions">
												<div class="hidden-phone visible-desktop action-buttons">
													<a class="green editan" href="#" id="<?php echo $row->id_kandang; ?>" role="button" data-toggle="modal">
														<i class="icon-pencil bigger-130"></i>
													</a>

													<a class="red delbutton" id="<?php echo $row->id_kandang; ?>" href="#">
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
																<a href="#" id="<?php echo $row->id_kandang; ?>" class="tooltip-success editan"  data-rel="tooltip" title="Edit">
																	<span class="green">
																		<i class="icon-edit bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="#" class="tooltip-error delbutton" id="<?php echo $row->id_kandang; ?>" data-rel="tooltip" title="Delete">
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
										<?php }?>
									</tbody>
								</table>
							</div>
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

		<!--basic scripts-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

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

		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-tag.min.js"></script>
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
				 url : "<?php echo site_url('kandang/delete')?>",
				 data: info,
				 success: function(){
				 	$(this).parents(".record").animate({ opacity: "hide" }, "slow");
					window.location = '<?php echo site_url("kandang"); ?>';
				 }
				 });
				 
				 
				 
				 }
				 
				 return false;
				 
				});
			$(".editan").click(function(event) {
				 //Save the link in a variable called element
				 var element = $(this);
				 
				 //Find the id of the link that was clicked
				 var del_id = element.attr("id");
				 $(".modal-c").modal('show');
				 //Built a url to send
				 var info = 'id=' + del_id;
				 $.ajax({
				 	type:'POST',
				 	url:"<?php echo site_url('kandang/get')?>",
				 	data:info,
				 	success:function(data){
				 		$(".modal-body").html(data);
				 	}
				 });
			});
			$('#update').click(function(event) {
				$.ajax({
					type:'POST',
					url:'<?php echo base_url()."index.php/kandang/edit" ?>',
					data:$("#form-edit-kandang").serialize(),
					success:function(){
						$(".modal-c").modal('hide');
						alert("Berhasil Update");
						window.location = '<?php echo site_url("kandang"); ?>';
					}
				});
			});
			$("#tambah").click(function(event) {
				$("#inputan").show("slow");
			});

			$('#tutup').click(function(event) {
				$("#inputan").hide("slow");
			});

			$("#tes").click(function(){
					$("#inputan").hide("slow");
					$.ajax({
					type:'POST',
					url:'<?php echo base_url()."index.php/kandang/tambahData" ?>',
					data:$("#form-tambah-kandang").serialize(),
					success:function(){
					alert('Berhasil input');
					window.location = '<?php echo site_url("kandang"); ?>';
					},error:function(data) {
						$('#sample-table-2').alert("error");
					}
					});
				});

			});
			
			
				$(function() {
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null,null, 
				  { "bSortable": false }
				] } );
			
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				$('#modal-form').on('show', function () {
					$(this).find('.chzn-container').each(function(){
						$(this).find('a:first-child').css('width' , '150px');
						$(this).find('.chzn-drop').css('width' , '160px');
						$(this).find('.chzn-search input').css('width' , '150px');
					});
				})
			})
		</script>
	</body>
</html>
