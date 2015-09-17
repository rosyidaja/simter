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
									<div class="span11">
										<div class="widget-box">
											<div class="widget-header">
												<h4>Select Box</h4>

												<span class="widget-toolbar">
													<a href="#" data-action="settings">
														<i class="icon-cog"></i>
													</a>

													<a href="#" data-action="reload">
														<i class="icon-refresh"></i>
													</a>

													<a href="#" data-action="collapse">
														<i class="icon-chevron-up"></i>
													</a>

													<a href="#" data-action="close">
														<i class="icon-remove"></i>
													</a>
												</span>
											</div>
											<div class="widget-body">
												<div class="widget-main">
													<div class="row-fluid">
														<?php echo $result; ?>
													</div>
												</div>
											</div>
										</div>	
									</div>				
						</div><!--/.span-->
					</div><!--/.row-fluid-->

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
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/treemenu/js/jquery.js"></script>

		<!--inline scripts related to this page-->
	</body>
	<script type="text/javascript">
	  $(document).ready(function(){
      $("ul.tv") // Find all unordered lists with class of "tv"
          .find("li:last-child").addClass("tvil").end() // Apply class "TVIL aka TreeView Item - Last"
          .find("li.tvclosed[ul]").addClass("tvie").swapClass("tvil", "tvile").append("<div class=\"tvca\">").end()
          .find("li[ul]").not(".tvclosed").addClass("tvopen").addClass("tvic").swapClass("tvil", "tvilc").append("<div class=\"tvca\">").end()
          .find("li.tvclosed>div.tvca").toggle(
                  function(){ $(this).parent("li").swapClass("tvic", "tvie").swapClass("tvilc", "tvile").find(">ul").slideDown("normal"); },
                  function(){ $(this).parent("li").swapClass("tvic", "tvie").swapClass("tvilc", "tvile").find(">ul").slideUp("normal"); }
              ).end()
          .find("li.tvopen>div.tvca").toggle(
                  function(){ $(this).parent("li").swapClass("tvic", "tvie").swapClass("tvilc", "tvile").find(">ul").slideUp("normal"); },
                  function(){ $(this).parent("li").swapClass("tvic", "tvie").swapClass("tvilc", "tvile").find(">ul").slideDown("normal"); }
              ); 
	  	
		});
		
		$.fn.swapClass = function(c1,c2) {
			return this.each(function() {
				if ($.hasWord(this, c1)) {
					$(this).removeClass(c1);
					$(this).addClass(c2);
				} else if ($.hasWord(this, c2)) {
					$(this).removeClass(c2);
					$(this).addClass(c1);
				}					
			});
		};
	</script>
</html>
