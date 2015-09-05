<div class="row-fluid">
	<div class="span3">
		<div class="widget-box">
			<div class="widget-header">
				<h4>Entry Data Kandang</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="row-fluid">
						<form id="form-tambah-kandang" name="form-tambah-kandang" method="POST">
							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama Kandang</label>

								<div class="controls">
									<input type="text" name="nama_kandang" id="nama_kandang" placeholder="Nama Kandang" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Kode Kandang</label>

								<div class="controls">
									<input type="text" name="kode_kandang" id="kode_kandang" placeholder="kode Kandang" required/>
								</div>
							</div>
							<div class="control-grup">
								<label class="control-label"  for="form-field-1">Status Kandang :&nbsp;</label>
								<label style="float:left;">
									<input name="status" value="k" type="radio" />
									<span class="lbl">Kosong &nbsp;</span>
								</label>
								<label>
									<input name="status" value="t" type="radio" />
									<span class="lbl">Terpakai</span>
								</label>
							</div>
							<div class="control-grup">
								<button class="btn btn-info" id="tes" type="button">
									<i class="icon-ok bigger-110"></i>
									Submit
								</button>

								&nbsp; &nbsp; &nbsp;
								<button class="btn" id="tutup" type="reset">
									<i class="icon-undo bigger-110"></i>
									Cancel
								</button>
							</div>
						</form>
					</div>
					
				</div>
			</div>
		</div>
	</div><!--/span-->
</div>